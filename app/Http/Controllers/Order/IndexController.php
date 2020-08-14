<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
use Illuminate\Http\Request;
use App\Model\CartModel;
use App\Model\OrderModel;
use App\Model\OrderGoodsModel;

class IndexController extends Controller
{
    /**
     * 生成订单
     */
    public function create()
    {
        if($_SERVER['uid']==0)      // 未登录
        {
            header('Refresh:2;url=/user/login');
            echo "请先登录,正在跳转";
            die;
        }

        $uid = $_SERVER['uid'];                    //获取用户uid
        //获取购物车商品
        $cart_goods = CartModel::goods();
        if(empty($cart_goods))      //空购物车
        {
            return view('cart.empty');
        }

        // TODO 判断库存

        //计算订单价格  商品个数X商品单价
        $total = 0;     //订单总价
        foreach($cart_goods as $k=>$v){
            //TODO 商品信息可从缓存中获取 或库中获取
            $price = GoodsModel::find($k)->shop_price;      //获取商品单价
            $total += $price * $v;      //订单总价

        }

        //订单入库，订单商品入库
        $order_sn = OrderModel::generateOrderSN($uid);

        $order_info = [
            'order_sn'      => $order_sn,
            'user_id'       => $uid,
            'pay_status'    => 0,           //未支付
            'order_amount'  => $total,      //订单总金额
            'add_time'      => time(),      //订单创建时间
            // 其它字段
        ];

        $oid = OrderModel::insertGetId($order_info);     //订单信息入库


        //订单商品入库
        foreach($cart_goods as $k=>$v){
            //TODO 商品信息可从缓存中获取 或库中获取
            $g = GoodsModel::select("goods_name","goods_sn","shop_price as goods_price")->find($k)->toArray();
            $g['goods_id'] = $k;
            $g['goods_number'] = $v;        //购买数量
            $g['order_id'] = $oid;        //订单ID

            OrderGoodsModel::insertGetId($g);echo '</br>';
        }

        //生成订单后清空购物车
        CartModel::clear();

        //跳转支付
        $redirect = '/pay/checkout?oid='.$oid;
        return redirect($redirect);
    }
}
