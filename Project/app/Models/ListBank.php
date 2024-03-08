<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListBank extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'service',
        'no_rekening',
        'nama_paket',
        'referal_paket_id',
        'harga',
        'jenis',
        'date',
        'date_expired',
        'username_ibank',
        'password_ibank',
        'status'
    ];
}
