<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log_activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'activity',
        'kategori',
        'status',
        'date',
        'deskripsi'
    ];
}
