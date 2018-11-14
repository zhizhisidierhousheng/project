<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usersinfo extends Model
{
    // 模型类对应的数据表
    protected $table = 'users_info';
    // 关闭自动更新时间戳
    public $timestamps = false;

}
