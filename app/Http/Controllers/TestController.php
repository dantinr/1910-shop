<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use DB;

class TestController extends Controller
{

    public function test1()
    {
        $data = DB::table('p_goods')->first();
        var_dump($data);
    }
}
