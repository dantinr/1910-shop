<?php

namespace App\Http\Middleware;

use Closure;
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
        $token = $request->cookie('token');
        $token_key = 'h:login_info:'.$token;
        $uid = Redis::hGet($token_key,'uid');

        if($uid)        // 登录有效
        {
            $_SERVER['uid'] = $uid;
        }else{
            $_SERVER['uid'] = 0;
        }

        return $next($request);
    }
}
