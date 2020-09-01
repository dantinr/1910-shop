<?php

namespace App\Http\Controllers\Prize;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    /**
     * 抽奖
     * 2020年8月29日14:52:15
     */
    public function index()
    {
        $data = [];
        return view("prize.index");
    }

}
