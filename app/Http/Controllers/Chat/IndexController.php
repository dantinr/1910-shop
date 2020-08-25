<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    protected $mongo_client;

    public function __construct()
    {
        $user = env('MONGODB_USER');
        $pass = env('MONGODB_PASS');
        $this->mongo_client = new \MongoDB\Client("mongodb://{$user}:{$pass}@127.0.0.1:27017/shop1910");
    }

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

        //连接Mongo
        $collection = $this->mongo_client->selectDatabase('shop1910')->selectCollection('chat_msg');

        $list = $collection->find([],['limit'=>4]);

        foreach($list as $k=>$v){
            echo $v->_id;echo '</br>';
            echo $v->msg;echo '</br>';
            echo $v->time;echo '</br>';
        }

        echo '<hr>';

        return view('chat.index');
    }
}
