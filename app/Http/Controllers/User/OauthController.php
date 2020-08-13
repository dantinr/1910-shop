<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OauthController extends Controller
{

    /**
     * github登录 回跳地址
     */
    public function github()
    {
        // 接收code
        $code = $_GET['code'];

        //换取access_token
        $this->getToken($code);
        echo '<pre>';print_r($_GET);echo '</pre>';die;
    }


    /**
     * 根据code 换取 token
     */
    protected function getToken($code)
    {
        $url = 'https://github.com/login/oauth/access_token';

        //post 接口  Guzzle or  curl
        $token = "";
        // 拿到token  获取用户信息

        $this->getGithubUserInfo($token);
    }


    protected function getGithubUserInfo($token)
    {
        $url = 'https://api.github.com/user';
        //GET 请求接口
    }
}
