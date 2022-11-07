<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sanpham;
use App\Models\mausanpham;
use App\Models\kickthuocsanpham;
class chitietsanpham extends Model
{
    use HasFactory;
    protected $table = 'chitietsanpham';
    protected $fillable = [
        'idsanpham',
        'idloaisanpham',
        'idsize',
        'idmau',
        'idbinhluan',
        'soluong',
        'anhsanpham',
        'giasanpham',
        'created_at',
        'updated_at',
    ];

    public function sanphams(){
        return $this->belongsTo(sanpham::class,'idsanpham');
    }
    public function maus(){
        return $this->belongsTo(mausanpham::class,'idmau');
    }
    public function sizes(){
        return $this->belongsTo(kickthuocsanpham::class,'idsize');
    }
}
