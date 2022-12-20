<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khuyenmai extends Model
{
    use HasFactory;

    protected $table = 'khuyenmai';

    protected $fillable = [
        'ten_km',
        'ma_km',
        'phantramgiam',
        'soluong',
        'conlai',
        'ngaybatdau_km',
        'ngayketthuc_km',
        'trangthai',
        'create_by',
        'updated_by',
        'create_at',
        'updated_at',
    ];

}
