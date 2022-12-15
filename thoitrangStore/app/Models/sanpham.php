<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';

    public function chitiet(){
        return $this->hasMany(chitietsanpham::class, 'idsanpham', 'id');
    }

    public function loaisanpham() {
        return $this->belongsTo(loaisanpham::class, 'idloaisanpham', 'id');
    }

    protected $fillable = [
        'ten_sp',
        'email',
        'password',
        'phone',
        'diachi',
        'macodesanpham',
        'mota',
        'trangthai'
    ];
}
