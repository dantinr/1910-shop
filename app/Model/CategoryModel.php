<?php

namespace App\Model;

use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use ModelTree;

    public $table = 'p_category';
    public $primaryKey = 'cat_id';

    public $timestamps = false;


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');        //父级分类
        $this->setOrderColumn('sort_order');        //排序字段
        $this->setTitleColumn('cat_name');
    }

}
