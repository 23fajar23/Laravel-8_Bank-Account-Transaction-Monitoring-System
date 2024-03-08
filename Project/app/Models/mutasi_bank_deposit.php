<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mutasi_bank_deposit extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_rekening',
        'service',
        'deskripsi',
        'tipe',
        'tgl_transaksi',
        'nominal',
        'saldo'
    ];
}
