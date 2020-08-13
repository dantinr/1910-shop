<?php

namespace App\Http\Controllers\Goods;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RankController extends Controller
{

    /**
     * 排行榜 默认为 浏览排行
     * 浏览排行 ss:goods_view:count
     * 购买排行 ss:goods_buy:count
     * 收藏排行 ss:goods_fav:count
     */
    public function index(Request $request)
    {
        $type = $request->get('type',1);      // 1浏览排行 2购买排行 3收藏排行

        switch ($type)
        {
            case 1 :
                $list = $this->viewList();
                break;
            case 2 :
                $list = $this->buyList();
                break;
            case 3 :
                $list = $this->favList();
                break;
            default :
                $list =  $this->viewList();
                break;
        }

        $data = [
            'list'  => $list
        ];

        return view('goods.rank',$data);
    }

    /**
     * 浏览排行
     */
    protected function viewList()
    {

    }

    /**
     * 购买排行
     */
    protected function buyList()
    {

    }

    /**
     * 收藏排行
     */
    protected function favList()
    {

    }
}
