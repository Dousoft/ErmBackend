<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends TenantModel
{
    use HasFactory;

    protected $fillable = ['name', 'website', 'description'];
}
