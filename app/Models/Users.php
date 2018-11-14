<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // 模型对应的数据表
    protected $table = 'users';
    // 关闭自动维护时间戳
    public $timestamps = false;

    // 获取会员模块对应的详情信息
    public function info()
    {
    	return $this->hasOne('App\Models\Usersinfo', 'uid');
    }

    // 获取会员模块对应的收货地址信息
    public function getaddress()
    {
    	return $this->hasMany('App\Models\Usersaddress', 'uid');
    }
}
