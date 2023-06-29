<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // khai báo các trường dữ liệu
    protected $table = 'hoa_don';
    protected $primaryKey = 'Id_hoa_don';
    protected $fillable = ['Id_hoa_don', 'Hoten_nguoinhan', 'Diachi_nguoinhan', 'Diachi_email', 'Dienthoai_nguoinhan', 'Ngay_giao_hang', 'Trang_thai', 'Ma_KH', 'Ma_PTVC', 'Ma_PTTT'];
}