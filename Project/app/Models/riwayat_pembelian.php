<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat_pembelian extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'nama_paket',
        'jenis',
        'service',
        'no_rekening',
        'harga',
        'durasi',
        'tgl_pembelian',
        'status'
    ];
}
