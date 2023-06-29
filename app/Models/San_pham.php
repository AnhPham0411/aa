<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class San_pham extends Authenticatable
{
    use Notifiable;

    protected $table = 'San_pham';
    protected $primaryKey = 'Ma_SP';

    protected $fillable = [
        'Ma_SP',
        'Ten_sp',
        'Mo_ta',
        'Thong_tin',
        'Gia_nhap',
        'Gia_cu',
        'Gia_moi',
        'Luot_xem',
        'Ngay_cap_nhat',
        'Thong_tin',
        'Trang_thai',
        'Ma_LSP',
        'Ma_Nh',
    ];


}