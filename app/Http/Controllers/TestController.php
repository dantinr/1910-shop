<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use DB;

class TestController extends Controller
{

    public function test1()
    {
        $goods_info = [
            'goods_id'  => 12345,
            'goods_name'    => 'IPhoneX',
            'price'     =>  800000,
            'add_time'  => 123123123
        ];

        $key = 'goods_12345';

        Redis::hmset($key,$goods_info);
    }
}
