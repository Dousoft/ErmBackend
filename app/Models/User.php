<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\Leave;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        // Common Fields
        'name',
        'email',
        'contact',
        'password',
        'role',
        'address',

        // Employee-specific Fields
        'photo',
        'officialID',
        'designation',
        'officeLocation',
        'department',
        'education',
        'pan',
        'aadhar',
        'passbook',
        'offerLetter',
        'PFNO',
        'ESINO',
        'joiningDate',
        'leavingDate',
        'jobStatus',
        'about',
        'salary',
        'dob',
        'otp',
        'otp_expires_at',

        // Company-specific Fields
        'database',
        'registration_date',
        'logo',
        'website_url',
        'description',
        'package_id',
        'industry_type',
        'company_status',
    ];

    public function packageDetails()
    {
        return $this->belongsTo(Package::class,'package_id');
    }




    // public function leaves()
    // {
    //     return $this->hasMany(Leave::class);
    // }

    // public function assignedTasks()
    // {
    //     return $this->hasMany(AssignedTask::class, 'empId');
    // }

    //  // A user can be a team leader of multiple projects
    //  public function teamLeaderProjects()
    //  {
    //      return $this->hasMany(TeamLeader::class, 'user_id');
    //  }
}
