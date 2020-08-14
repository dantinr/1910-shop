<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;
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

        // TODO 验证密码是否一致

        // TODO 检测Email是否存在

        $pass = $request->post('pass1');

        //生成密码
        $password = password_hash($pass,PASSWORD_BCRYPT);


        $data = [
            'user_name' => Str::random(10),
            'email' => $request->post('email'),
            'password'  => $password
        ];

        //入库
        $uid = UserModel::insertGetId($data);

        //登录成功跳转
        return redirect("/user/login");

    }


    public function login(){
        return view('user.login');
    }

    public function loginDo(Request $request){
        //echo '<pre>';print_r($_POST);echo '</pre>';
        //注册逻辑
        $email = $request->post('email');
        $pass = $request->post('pass');

        //验证用户
        $u = UserModel::where(['email'=>$email])->first();
        //echo '<pre>';print_r($u->toArray());echo '</pre>';

        //验证密码
        if( password_verify($pass,$u->password) )
        {
            //将登录信息保存至session
            session(['uid'=>$u->user_id]);      //将uid写进session
            echo "登录成功";
        }else{
            echo "登录失败";
        }
    }

    /**
     * 个人中心
     */
    public function center()
    {

       if( session()->has('uid') )
       {
            echo "欢迎来到个人中心";
       }else{
           echo "请先登录";
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


}
