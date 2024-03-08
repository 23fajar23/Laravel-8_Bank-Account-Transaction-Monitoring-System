<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bank_deposit extends Model
{
    use HasFactory;
    protected $fillable = [
        'service',
        'no_rekening',
        'nama_rekening',
        'company_id',
        'username_ibank',
        'password_ibank',
        'status',
        'mutasi'
    ];
}
