<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamLeader extends TenantModel
{
    use HasFactory;
    protected $fillable = ['user_id', 'project_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function teamMembers()
    {
        return $this->hasMany(AssignedTask::class, 'project_id', 'project_id')->with('employee');
        // Assuming `employee` is the relation in AssignedTask to fetch employee details
    }

}
