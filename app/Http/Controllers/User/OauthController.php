<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use function GuzzleHttp\Psr7\parse_query;

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
        $token = $this->getToken($code);
        $user_info = $this->getGithubUserInfo($token);
        echo '<pre>';print_r($user_info);echo '</pre>';
    }


    /**
     * 根据code 换取 token
     */
    protected function getToken($code)
    {
        $url = 'https://github.com/login/oauth/access_token';

        //post 接口  Guzzle or  curl
        $client = new Client();
        $response = $client->request('POST',$url,[
            'form_params'   => [
                'client_id'         => env('OAUTH_GITHUB_ID'),
                'client_secret'     => env('OAUTH_GITHUB_SEC'),
                'code'              => $code
            ]
        ]);
        parse_str($response->getBody(),$str); // 返回字符串 access_token=59a8a45407f1c01126f98b5db256f078e54f6d18&scope=&token_type=bearer
        return $str['access_token'];
    }


    /**
     * 获取github个人信息
     * @param $token
     */
    protected function getGithubUserInfo($token)
    {
        $url = 'https://api.github.com/user';
        //GET 请求接口
        $client = new Client();
        $response = $client->request('GET',$url,[
            'headers'   => [
                'Authorization' => $token . ' OAUTH-TOKEN'
            ]
        ]);
        echo $response->getBody();
    }
}
