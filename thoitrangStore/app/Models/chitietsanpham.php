<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietsanpham extends Model
{
    use HasFactory;
    protected $table = 'chitietsanpham';

    public function sanpham(){
        return $this->belongsTo(sanpham::class, 'idsanpham', 'id');
    }

    public function color(){
        return $this->belongsTo(mausanpham::class, 'idmau', 'id');
    }
}
