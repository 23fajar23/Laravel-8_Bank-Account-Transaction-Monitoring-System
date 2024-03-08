<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class integrasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'status',
        'api_key',
        'api_signature',
        'url'
    ];
}
