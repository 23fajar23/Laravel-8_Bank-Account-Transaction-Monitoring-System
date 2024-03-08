<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company_mib extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'referal_rekening',
        'company_id'
    ];
}
