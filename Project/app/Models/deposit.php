<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deposit extends Model
{
    use HasFactory;
    // Invoice
    protected $fillable = [
        'uid',
        'nominal',
        'kode_unik',
        'tagihan',
        'nama_rekening',
        'no_rekening',
        'service',
        'date',
        'expired',
        'status'
    ];
}
