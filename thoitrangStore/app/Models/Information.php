<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'thongtinshop';

    protected $fillable = [
        'ten_shop',
        'logo',
        'favicon',
        'dien_thoai',
        'dia_chi',
        'email',
        'iframe'
    ];
}
