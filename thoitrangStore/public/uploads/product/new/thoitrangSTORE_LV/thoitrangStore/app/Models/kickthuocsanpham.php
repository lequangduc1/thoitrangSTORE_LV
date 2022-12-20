<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kickthuocsanpham extends Model
{
    use HasFactory;

    protected $table = 'size';

    protected $fillable = [
        'tensize',
        'trangthai',
        'created_at',
        'updated_at',
    ];
}
