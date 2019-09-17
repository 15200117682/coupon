<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\ModelTree;

class CateModel extends Model
{
    use ModelTree;
    protected $table="category";
    public $timestamps=false;
    public $primaryKey="c_id";

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('p_id');
        $this->setOrderColumn('order');
        $this->setTitleColumn('c_name');
    }
}
