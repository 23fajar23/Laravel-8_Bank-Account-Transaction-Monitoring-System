<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class track_message extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'api_key',
        'username',
        'phone',
        'message',
        'status',
    ];
}
