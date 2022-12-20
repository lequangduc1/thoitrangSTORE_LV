<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyCustomer extends Model
{
    use HasFactory;

    protected $table = 'verify_customers';

    protected $fillable = [
        'customer_id',
        'token'
    ];

    public function customer()
    {
        return $this->belongsTo(khachhang::class, 'customer_id', 'id');
    }
}
