<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $fillable = ['name','email','password','database'];

}
