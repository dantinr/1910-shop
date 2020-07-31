<?php

namespace App\Admin\Actions\Goods;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Video extends RowAction
{
    public $name = '上传视频';


    public function href()
    {
        $goods_id = $this->getRow()->getKey('goods_id');
        return '/admin/video/create?id='.$goods_id;
    }

    public function handle(Model $model)
    {

    }

}
