<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test1','TestController@test1');
Route::get('/test2',function(){
    echo __FILE__;
});

Route::get('/','Index\IndexController@home');       //首页

Route::get('/user/reg','User\IndexController@reg');            //注册
Route::post('/user/reg','User\IndexController@regDo');            //注册

Route::get('/user/login','User\IndexController@login');            //注册
Route::post('/user/login','User\IndexController@loginDo');            //注册
Route::get('/user/center','User\IndexController@center');            //用户中心

Route::get('/goods','Goods\IndexController@index');            //商品详情

Route::get('/goods/view/rank','Goods\IndexController@viewRank');    //商品浏览排行榜

//购物车
Route::prefix('/cart')->group(function(){
    Route::get('/index','Cart\IndexController@index');          //购物车页面
    Route::get('/add','Cart\IndexController@add');              //添加
    Route::get('/del','Cart\IndexController@del');              //删除
});

//订单
Route::prefix('/order')->group(function(){
    Route::get('/create','Order\IndexController@create');      //生成订单
});

Route::get('/top10','Goods\RankController@index');          //排行榜

//支付
Route::prefix('/pay')->group(function(){
    Route::get('/index','Pay\IndexController@index');           //支付页面
});

//计划任务
Route::prefix('/cron')->group(function(){
    Route::get('/codec','Cron\VideoCron@codec');            //定时转码
});





