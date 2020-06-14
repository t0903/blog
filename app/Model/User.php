<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //1、用户模型关联表
    public $table = "user";

    //2.关联主键
    public $primaryKey = 'user_id';

    /**
     * 3.允许被批量操作的字段
     *
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'user_name', 'user_password',
//    ];
    //不需要被批量操作的字段
    public $guarded = [];

    //4.禁用时间戳
    public $timestamps = false;
}
