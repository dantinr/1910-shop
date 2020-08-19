<?php

namespace App\Http\Controllers;

use App\Model\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use DB;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use App\Model\CartModel;

class TestController extends Controller
{

    public function test1()
    {

        CartModel::cartNum();die;

        $url = 'https://api.github.com/user';
        $token = '7e59cb7e5c0debab9b77472e6c33b73bc16c62ee';
        $token = 'cccccc';
        $client = new Client();
        $response = $client->request('GET',$url,[
            'headers'   => [
                'Authorization' => $token . ' OAUTH-TOKEN'
            ]
        ]);
        echo $response->getBody();

    }

    public function test2()
    {
        $uid = 8888;
        $token =  $uid . Str::random(5) . time() . mt_rand(1111,9999999);
        $token = strtoupper(substr(Str::random(5) . md5($token),1,20));
        echo $token;die;
        $new_user = [
            'user_name' => Str::random(10)
        ];
        $uid = UserModel::insertGetId($new_user);
        var_dump($uid);
    }
}
