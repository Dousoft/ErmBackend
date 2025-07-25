<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndustryTypeRole extends Model
{
    protected $fillable = [
        'industry_type_id',
        'role',
    ];
}
