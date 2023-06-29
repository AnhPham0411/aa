<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'Ct_hoa_don';
    protected $primaryKey = 'Ma_HD';
    protected $fillable = ['Ma_HD', 'Ma_SPCT', 'So_luong_ban', 'Gia_ban', 'Tra_lai'];
}