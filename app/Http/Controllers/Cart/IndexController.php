<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{

    /**
     * 购物车
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('cart.index');
    }

    /**
     * 添加
     */
    public function add(Request $request)
    {
        $goods_id = intval($request->get('id'));
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
