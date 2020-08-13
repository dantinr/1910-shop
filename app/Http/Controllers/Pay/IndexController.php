<?php

namespace App\Http\Controllers\Pay;

use App\Http\Controllers\Controller;
use App\Model\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'out_trade_no'      => $o->order_sn,     //商户订单号
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

    }

    /**
     * 支付宝同步通知
     */
    public function aliReturn()
    {
        echo '<pre>';print_r($_GET);echo '</pre>';
    }

}
