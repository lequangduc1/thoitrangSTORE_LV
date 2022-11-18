<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietphieunhap extends Model
{
    use HasFactory;
    protected $table = 'chitietphieunhap';

    protected $fillable = [
        'idphieunhap',
        'idchitietsanpham',
        'soluongnhap',
        'gianhap',
        'created_at',
        'updated_at',
    ];

    public function phieunhaps(){
        return $this->belongsTo(phieunhap::class,'idphieunhap');
    }
    public function chitietsanphams(){
        return $this->belongsTo(chitietsanpham::class,'idchitietsanpham');
    }
}
