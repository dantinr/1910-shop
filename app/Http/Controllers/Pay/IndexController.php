<?php

namespace App\Http\Controllers\Pay;

use App\Http\Controllers\Controller;
use App\Model\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{

    /**
     * 结算
     */
    public function checkout()
    {
        return view('pay.checkout');
    }


    /**
     * 支付
     */
    public function create(Request $request)
    {

        $order_id = $request->get('oid');               // 支付的订单id
        $pay_type = $request->get('pay_type',1);        //支付方式  1支付宝  2微信

        if($pay_type==1)
        {
            $redirect_url = $this->aliPay($order_id);
        }else{
            $redirect_url = $this->wxPay($order_id);
        }

        //echo $redirect_url;die;
        return redirect($redirect_url);

    }

    /**
     * 支付宝支付
     */
    protected function aliPay($order_id)
    {

        //根据订单查询到订单信息  订单号  订单金额
        $o = OrderModel::find($order_id);

        if(empty($o))       //订单不存在
        {
            echo "无此订单";
            die;
        }

        //echo '<pre>';print_r($o->toArray());echo '</pre>';
        //调用 支付宝支付接口

        // 1 请求参数
        $param2 = [
            'out_trade_no'      => $o->order_id,     //商户订单号
            'product_code'      => 'FAST_INSTANT_TRADE_PAY',
            'total_amount'      => $o->order_amount,    //订单总金额
            'subject'           => 'Mstore-测试订单-'.Str::random(16),
        ];

        // 2 公共参数
        $param1 = [
            'app_id'        => '2016092500593666',
            'method'        => 'alipay.trade.page.pay',
            'return_url'    => 'https://1910liwei.comcto.com/pay/alireturn',   //同步通知地址
            'charset'       => 'utf-8',
            'sign_type'     => 'RSA2',
            'timestamp'     => date('Y-m-d H:i:s'),
            'version'       => '1.0',
            'notify_url'    => 'https://1910liwei.comcto.com/pay/alinotify',   // 异步通知
            'biz_content'   => json_encode($param2),
        ];


        // 计算签名
        ksort($param1);

        $str = "";
        foreach($param1 as $k=>$v)
        {
            $str .= $k . '=' . $v . '&';
        }
        $str = rtrim($str,'&');     // 拼接待签名的字符串
        $sign = $this->sign($str);

        //沙箱测试地址
        $url = 'https://openapi.alipaydev.com/gateway.do?'.$str.'&sign='.urlencode($sign);
        return $url;
    }

    /**
     * 支付宝支付签名
     * @param $data
     * @return string
     */
    protected function sign($data)
    {
        $priKey = file_get_contents(storage_path('keys/alipay_priv.key'));
        $res = openssl_get_privatekey($priKey);

        ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');

        openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);
        openssl_free_key($res);
        $sign = base64_encode($sign);
        return $sign;
    }

    /**
     * 微信支付
     */
    protected function wxPay()
    {

    }


    /**
     * 支付宝异步通知
     */
    public function aliNotify()
    {
        $data = $_POST;
        Log::channel('alipay')->info($data);

        if( $this->checkSign($data)==0 )     //验签失败
        {
            // TODO 处理失败情况
        }else{
            //判断交易状态  trade_status
            if($data['trade_status']=='TRADE_SUCCESS')
            {
                //判断订单支付状态 如果未支付 更新为支付状态 记录支付时间 支付金额
                $order_id = $data['out_trade_no'];
                $o = OrderModel::find($order_id);

                if($o->pay_status==0)       //未支付  已支付过无需处理
                {
                    $update = [
                        'pay_type'      => 1,                               // 1支付宝 2微信
                        'pay_status'    => 1,                               // 0未支付 1已支付
                        'pay_time'      => time(),                          // 支付时间
                        'money_paid'       => $data['buyer_pay_amount'],    //用户支付的金额
                        'plat_oid'      => $data['trade_no'],               // 支付宝订单号
                    ];

                    OrderModel::where(['order_id'=>$order_id])->update($update);
                }

            }
        }

        //响应支付宝状态  success
        echo "success";

    }

    /**
     * 支付宝同步通知
     */
    public function aliReturn()
    {
        $data = [
            'msg'   => "订单： ". $_GET['out_trade_no'] . "支付成功"
        ];
        return view('ok',$data);
    }


    /**
     * 支付宝验签
     * @param $str
     */
    public function checkSign($data)
    {

        $sign = $data['sign'];
        unset($data['sign']);
        unset($data['sign_type']);

        // 计算签名
        ksort($data);

        $str = "";
        foreach($data as $k=>$v)
        {
            $str .= $k . '=' . $v . '&';
        }
        $str = rtrim($str,'&');     // 拼接待签名的字符串

        $priKey = file_get_contents(storage_path('keys/ali_pub.key'));
        $pub_id = openssl_get_publickey($priKey);
        return openssl_verify($str,base64_decode($sign),$pub_id,OPENSSL_ALGO_SHA256);

    }

}
