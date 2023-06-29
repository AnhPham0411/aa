<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'Hinh_anh';
    protected $primaryKey = 'Ma_HA';
    protected $fillable = ['Ma_HA', 'Ten_file_anh', 'Trang_thai', 'Ma_SP', 'created_at', 'updated_at'];
}