<?php

namespace App\Http\Controllers\Goods;

use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{

    /**
     * 商品详情页
     */
    public function index(Request $request)
    {

        $goods_id = $request->get('id');
        //判断是否缓存
        $key = 'h:goods_info:'.$goods_id;

        $goods_info = Redis::hgetAll($key);
        if($goods_info)
        {
            echo "有缓存";
            echo '<pre>';print_r($goods_info);echo '</pre>';
        }else{
            echo "无缓存";
            echo $goods_id;echo '</br>';
            $g = GoodsModel::find($goods_id);
            $arr = $g->toArray();
            echo '<pre>';print_r($arr);echo '</pre>';echo '<hr>';
            Redis::hMset($key,$arr);
            Redis::expire($key,60);
        }





    }

}
