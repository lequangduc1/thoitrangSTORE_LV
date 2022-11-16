<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phieunhap extends Model
{
    use HasFactory;

    protected $table = 'phieunhap';

    protected $fillable = [
        'tongtien',
        'tencuahang',
        'trangthai',
        'created_at',
        'updated_at',
    ];
}
