<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    /**
     * 聊天室
     * 2020年8月24日18:25:23
     */
    public function index()
    {
        if($_SERVER['uid']==0){
            $data = [
                'redirect'  => '/user/login',
                'msg'       => "请先登录"
            ];
            return view('302',$data);
        }
        return view('chat.index');
    }
}
