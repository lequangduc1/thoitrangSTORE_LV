<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'donhang';

    protected $fillable = [
        'makhachhang',
        'makhuyenmai',
        'tongtien_dh',
        'diachinhanhang',
        'dienthoainhanhang',
        'nguoinhan',
        'trangthai_dh',
        'phuongthuc_tt',
        'trangthai_tt',
        'ghichu'
    ];

    public function customer(){
        return $this->belongsTo(khachhang::class, 'makhachhang');
    }

    public function orderDetail(){
        return $this->hasMany(ChiTietDonHang::class,'madonhang','id');
    }


}
