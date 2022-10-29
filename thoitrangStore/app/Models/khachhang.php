<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    use HasFactory;
    protected $table = 'khachhang';

    protected $fillable = [
        'hovaten',
        'email',
        'diachi',
        'sodienthoai',
        'password',
        'trangthai',
        'create_at',
        'updated_at',
    ];
}
