<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redis;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $_SERVER['uid'] = 0;        //默认未登录
        $token = Cookie::get('token');

        //当前url
        $current_uri = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $_SERVER['current_url'] = $current_uri;

        if($token)
        {
            $token_key = 'h:login_info:'.$token;
            $u = Redis::hGetAll($token_key);

            if(isset($u['uid']))        // 登录有效
            {
                $_SERVER['uid'] = $u['uid'];
                $_SERVER['user_name'] = $u['user_name'];
                $_SERVER['token'] = $token;
            }
        }


        return $next($request);
    }
}
