<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    //定义与模型关联的数据表
    protected $table = "orders";
    //可以被批量赋值的属性
    protected $fillable = ["id", "uid", "money", "create", "overdue", "status"];

    //状态 status:0->已过期,1->可用,2->已使用
    public function getStatusAttribute($value)
    {
        $status = [
            0 => '已过期',
            1 => '可用',
            2 => '已使用'
        ];
        return $status[$value];
    }
}
