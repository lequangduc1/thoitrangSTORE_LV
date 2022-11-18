<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;

    protected $table = 'chitietdonhang';

    protected $fillable = [
        'madonhang',
        'machitietsanpham',
        'masanpham',
        'dongia',
        'soluong_sp'
    ];

    public function product(){
        return $this->belongsTo(sanpham::class, 'masanpham');
    }

    public function productDetail(){
        return $this->belongsTo(chitietsanpham::class,'machitietsanpham');
    }
}
