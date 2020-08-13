<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderGoodsModel extends Model
{
    public $table = 'p_order_goods';
    public $primaryKey = 'rec_id';
    public $timestamps = false;
}
