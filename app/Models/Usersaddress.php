<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usersaddress extends Model
{
    // 模型类对应的数据表
    protected $table = 'users_address';
    // 关闭自动维护时间戳
    public $timestamps = false;
    
    //修改器方法 可以自动处理获取到的数据 Status 数据表字段 getAttribute()获取字段属性值
    public function getStatusAttribute ($value)
    {
    	//自动处理
    	$status = [0 => '默认地址', 1 => '否'];
    	//返回数据
    	return $status[$value];
    }
}
