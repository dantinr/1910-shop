<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OrderModel extends Model
{
    public $table = 'p_order_info';
    public $primaryKey = 'order_id';
    public $timestamps = false;


    /**
     * 生成订单编号 规则： SN . uid.timestamp.mt_rand().mt_rand()
     */
    public static function generateOrderSN($uid=0)
    {
        return 'SN'.$uid.date('ymdhi').mt_rand(11111,99999).mt_rand(11111,99999);
    }

}
