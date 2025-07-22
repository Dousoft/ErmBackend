<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'package_name',
        'price',
        'features',
        'user_limit',
        'tenure',
        'package_type',
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
