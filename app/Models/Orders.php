<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //定义与模型关联的数据表
    protected $table = "orders";
    //主键
    protected $primaryKey = "id";
    //可以被批量赋值的属性
    protected $fillable = ["id", "uid", "uaid", "time", "total", "status"];

    //状态 status:0->待发货,1->已发货,2->派送中,3->已完成
    public function getStatusAttribute($value)
    {
        $status = [
            0 => '待发货',
            1 => '已发货',
            2 => '派送中',
            3 => '已完成'
        ];
        return $status[$value];
    }
}
