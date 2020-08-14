<?php

namespace App\Http\Controllers\Goods;

use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
use App\Model\VideoModel;
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

        $uid = 8888;
        $goods_id = $request->get('id');

        $redis_fav_key = 'ss:fav_goods:'.$uid;      //商品收藏有序集合

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

        //获取视频信息
        $v = VideoModel::where(['goods_id'=>$goods_id])->first();
        if($v)
        {
            $goods_info['m3u8'] = $v->m3u8;
        }else{
            $goods_info['m3u8'] = "video/default.mp4";        //默认视频
        }

        //记录商品浏览量  商品浏览排行
        $redis_key = 'ss:goods_view:count';         //商品浏览排行 Sorted Sets
        Redis::zIncrBy($redis_key,1,$goods_id);

        //判断商品是否已收藏
        $fav = intval(Redis::zScore($redis_fav_key,$goods_id));     // 0 未收藏 1已收藏
        $goods_info['fav'] = $fav;

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

    /**
     * 收藏商品
     */
    public function fav(Request $request)
    {
        $uid = 8888;
        $goods_id = $request->get('id',0);                //商品ID

        //判断商品是否存在
        $g = GoodsModel::find($goods_id);
        if(empty($goods_id) || empty($g)){
            $response = [
                'errno' => 300001,
                'msg'   => '收藏失败，请检查商品信息',
            ];
            return $response;
        }

        $redis_fav_key = 'ss:fav_goods:'.$uid;              //redis 用户收藏有序集合
        //判断是否已收藏
        if(Redis::zScore($redis_fav_key,$goods_id))
        {
            $response = [
                'errno' => 300002,
                'msg'   => '已收藏',
            ];
        }else{
            Redis::zAdd($redis_fav_key,time(),$goods_id);
            $response = [
                'errno' => 0,
                'msg'   => '收藏成功',
            ];

            //加入收藏排行榜
            $redis_goods_fav_list_key = 'ss:fav_goods_rank';
            Redis::zIncrBy($redis_goods_fav_list_key,1,$goods_id);


        }

        return $response;
    }

}
