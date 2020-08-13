<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use DB;
use GuzzleHttp\Client;

class TestController extends Controller
{

    public function test1()
    {


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

    }
}
