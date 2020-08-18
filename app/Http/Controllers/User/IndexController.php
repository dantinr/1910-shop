<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    /**
     * 注册页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reg()
    {
        return view('user.reg');
    }

    /**
     * 注册逻辑
     */
    public function regDo(Request $request)
    {

        $user_name = $request->post('user_name');
        $user_email = $request->post('user_email');
        $pass1 = $request->post('user_pass1');       //密码
        $pass2 = $request->post('user_pass2');       //确认密码

        // TODO 验证密码是否一致

        // TODO 检测Email是否存在

        // TODO 验证用户名是否存在

        //生成密码
        $password = password_hash($pass1,PASSWORD_BCRYPT);

        $data = [
            'user_name' => $user_name,
            'email'     => $user_email,
            'password'  => $password
        ];

        //入库
        $uid = UserModel::insertGetId($data);

        //登录成功跳转至登录页面 或 跳转至个人中心
        $data = [
            'redirect'  => '/user/login',
            'msg'       => "注册成功，正在跳转至登录页面"
        ];

        return view('302',$data);
    }


    /**
     * 登录页面
     */
    public function login(){
        if($_SERVER['uid']>0)       //已登录
        {
            $data = [
                'msg'       => '已登录，正在跳转',
                'redirect'  => '/',         //默认跳转至首页
            ];
            return view('302',$data);
        }else{
            return view('user.login');
        }
    }

    /**
     * 网站登录
     * @param Request $request
     */
    public function loginDo(Request $request){

        $info = $request->post('info');       //用户可输入 用户名 或 Email 或 手机号
        $pass = $request->post('pass');

        //用户名 Email 登录
        $u = UserModel::where(['email'=>$info])->orWhere(['user_name'=>$info])->first();
        //用户不存在
        if(empty($u))
        {
            $data = [
                'redirect'  => '/user/login',
                'msg'       => "用户名或密码不正确，请重新登录"
            ];
            return view('302',$data);
        }

        //验证密码
        if( password_verify($pass,$u->password) )
        {
            //执行登录
            $token = UserModel::webLogin($u->user_id,$u->user_name);
            Cookie::queue('token',$token,120,'/');      //120分钟

            $data = [
                'redirect'  => '/',
                'msg'       => "登录成功，正在跳转"
            ];

            return view('302',$data);
        }else{
            $data = [
                'redirect'  => '/user/login',
                'msg'       => "用户名或密码不正确，请重新登录"
            ];
            return view('302',$data);
        }
    }

    /**
     * 个人中心
     */
    public function center()
    {

       if( session()->has('uid') )
       {
           $data = [
               'user_name'  => 'zhangsan'
           ];
           return view('user.center',$data);

       }else{
           $data = [
               'redirect'   => '/user/login',
               'msg'        => '请先登录'
           ];

           return view('302',$data);
       }

    }

    /**
     * github 登录跳转
     * 2020年8月13日17:45:51
     */
    public function githubLogin()
    {
        $url = 'https://github.com/login/oauth/authorize?client_id='.env('OAUTH_GITHUB_ID').'&redirect_uri='.env('APP_URL').'/oauth/github';
        return redirect($url);
    }

    /**
     * 用户退出
     * 2020年8月17日14:46:35
     */
    public function logOut()
    {
        //判断登录状态
        if( $_SERVER['uid'] )
        {
            UserModel::webLogOut();
        }

        $data = [
            'redirect'  => '/',
            'msg'       => '已退出登录，正在跳转'
        ];
        return view('302',$data);


    }


}
