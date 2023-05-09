<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\JobTitle;
use App\Models\Attendance;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'job_title_id',
        'department_id',
    ];
    public function getDepartmentData(){
        return $this->belongsTo(Department::class,'department_id','id');
    }
    public function getJobTitleData(){
        return $this->belongsTo(JobTitle::class,'job_title_id','id');
    }
    public function getAttendenceData(){
        return $this->belongsTo(Attendance::class,'employee_id','id');
    }
} 
