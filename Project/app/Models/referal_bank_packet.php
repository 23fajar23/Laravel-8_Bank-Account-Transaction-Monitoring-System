<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class referal_bank_packet extends Model
{
    use HasFactory;
    protected $fillable = [
        'referal_id',
        'service'
    ];
}
