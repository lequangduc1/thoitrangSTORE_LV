<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';

    protected $fillable = [
        'macodesanpham',
        'ten_sp',
        'mota',
        'trangthai',
        'updated_at',
        'created_at',
    ];
}
