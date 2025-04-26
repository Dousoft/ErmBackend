<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends TenantModel
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'month',
        'givenBy',
        'rating',
        'comments',
    ];
}
