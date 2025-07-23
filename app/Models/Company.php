<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'contact',
        'password',
        'database',
        'address',
        'registration_date',
        'logo',
        'website_url',
        'description',
        'package_id',
        'industry_type',
    ];

    public function packageDetails()
    {
        return $this->belongsTo(Package::class,'package_id');
    }

}
