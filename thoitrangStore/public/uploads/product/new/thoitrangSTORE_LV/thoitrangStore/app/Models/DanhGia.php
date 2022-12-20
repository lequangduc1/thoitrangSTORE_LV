<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;

    protected $table = 'danhgia';

    protected $fillable = [
        'masanpham',
        'noidung',
        'trangthai'
    ];

    public function khachhang()
    {
        return $this->hasMany(khachhang::class, 'id', 'makhachhang');
    }

    public function chitietsanpham()
    {
        return $this->belongsTo(chitietsanpham::class, 'masanpham', 'id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }
}
