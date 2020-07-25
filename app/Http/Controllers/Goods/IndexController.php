<?php

namespace App\Http\Controllers\Goods;

use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
use http\Env\Response;
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
        $key = 'h:goods_info:'.$goods_id;       //商品hash key

        $goods_info = Redis::hgetAll($key);

        if($goods_info)         //TODO 有缓存
        {

        }else{      //无缓存

            $g = GoodsModel::find($goods_id);           // 查库 获取商品信息

            //商品部存在
            if(empty($g))
            {
                $data = [
                    'msg'   => '商品不存在'
                ];
                return view('error.404',$data);
            }

            $goods_info = $g->toArray();
            Redis::hMset($key,$goods_info);            //缓存商品信息
            Redis::expire($key,600);                //缓存时间 10分钟
        }

        //记录商品浏览量  商品浏览排行
        $redis_key = 'ss:goods_view:count';         //商品浏览排行 Sorted Sets
        Redis::zIncrBy($redis_key,1,$goods_id);


        $data = [
            'goods' => $goods_info
        ];
        return view('goods.index',$data);


    }

    /**
     * 浏览排名
     */
    public function viewRank()
    {
        $key = 'ss:goods_view:count';       //排行榜有序集合

        $list = Redis::zRevRange($key,0,-1,['withscores'=>true]);
        echo '<pre>';print_r($list);echo '</pre>';
        foreach($list as $k=>$v)
        {
            //商品信息
            $key = 'h:goods_info:'.$k;
            $goods[] = Redis::hGetAll($key);
        }

        echo '<pre>';print_r($goods);echo '</pre>';





    }

}
