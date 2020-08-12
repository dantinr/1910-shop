<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{


    public $now;
    public $uuid;

    public function __construct()
    {
        $this->now = time();
        $this->uuid = $_COOKIE['uuid'];     //用户标识
    }

    /**
     * 购物车
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $redis_cart_ss1 = 'ss:cart:goods:'.$this->uuid;         //商品
        $redis_cart_ss2 = 'ss:cart:goods_num:'.$this->uuid;     //商品个数

        $cart_goods = Redis::zrevRange($redis_cart_ss1,0,-1,true);      //按添加购物车顺序显示商品

        if(empty($cart_goods))      //空购物车
        {
            return view('cart.empty');
        }

        //获取商品个数

        foreach($cart_goods as $k=>$v)
        {
            $g[$k]['id'] = $k;
            $g[$k]['num'] = Redis::zScore($redis_cart_ss2,$k);

            //获取商品信息
            $g_info = GoodsModel::detail($k);
            $goods[] = array_merge($g[$k],$g_info);
        }

        $data = [
            'goods' => $goods
        ];

        return view('cart.index',$data);
    }

    /**
     * 添加
     */
    public function add(Request $request)
    {
        $goods_id = intval($request->get('id'));        //商品ID
        $num = intval($request->get('num',1));  //购买商品个数

        //判断是否有此商品
        $g = GoodsModel::find($goods_id);
        if($g == NULL)      //商品不存在
        {
            return [
                'errno' => 40004,
                'msg'   => '商品不存在'
            ];
        }

        // TODO 判断商品是否下架 已删除


        $uuid = $_COOKIE['uuid'];           //获取客户端标识
        $redis_cart_ss1 = 'ss:cart:goods:'.$uuid;     //商品
        $redis_cart_ss2 = 'ss:cart:goods_num:'.$uuid;   //商品个数

        //获取商品信息
        if(Redis::zScore($redis_cart_ss1,$goods_id) == false){
            //echo "第一次添加到购物车";echo '</br>';
            Redis::zAdd($redis_cart_ss1,$this->now,$goods_id);
        }
        $num = Redis::zIncrBy($redis_cart_ss2,$num,$goods_id);    //增加购物车商品数量

        $response = [
            'errno' => 0,
            'msg'   => 'ok'
        ];

        return $response;
    }

    /**
     * 删除
     */
    public function del()
    {

    }
}
