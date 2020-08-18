<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    //定义关联的数据表 
    protected $table = 'bookmark';
    // //定义主键 (可选)
    // protected $primaryKey = 'username';
    //定义禁止操作时间 
    public $timestamps = false; 
    //设置允许写入字段
    protected $fillable = ['username','bm_URL'];
}
