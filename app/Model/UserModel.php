<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserModel extends Model
{
    public $table = 'p_users';
    public $primaryKey = 'user_id';
    public $timestamps = false;


    /**
     * 生成用户token
     */
    public static function generateToken($uid)
    {
        $str =  $uid . Str::random(5) . time() . mt_rand(1111,9999999);
        return strtoupper(substr(Str::random(5) . md5($str),1,20));
    }

}
