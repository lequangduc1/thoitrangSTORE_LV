<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class khachhang extends Authenticatable
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
        'google_id',
        'create_at',
        'updated_at',
    ];

}
