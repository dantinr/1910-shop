<?php

namespace App\Http\Controllers\Goods;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RankController extends Controller
{

    public function index()
    {
        return view('goods.rank');
    }
}
