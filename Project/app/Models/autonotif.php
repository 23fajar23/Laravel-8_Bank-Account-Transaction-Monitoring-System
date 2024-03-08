<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autonotif extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'username',
        'api_key',
        'kategori',
        'otoritas',
        'message',
        'status'
    ];
}
