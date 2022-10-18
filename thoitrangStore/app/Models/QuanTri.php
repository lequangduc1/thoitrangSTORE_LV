<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class QuanTri extends Authenticatable
{
    use HasFactory;

    protected $table = 'quantri';

    protected $fillable = [
        'ten',
        'email',
        'password',
        'phone',
        'diachi',
        'quyen',
        'trangthai'
    ];

}
