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
