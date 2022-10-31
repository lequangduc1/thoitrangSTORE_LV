<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    use HasFactory;

    protected $table = 'loaisanpham';

    protected $fillable = [
        'tenloai',
        'trangthai',
        'created_at',
        'updated_at',
    ];
}
