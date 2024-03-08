<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'referal_bank',
        'no_rekening',
        'service',
        'deskripsi',
        'tipe',
        'tgl_transaksi',
        'nominal',
        'saldo',
    ];
}
