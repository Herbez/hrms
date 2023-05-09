<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Department;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable=[
        'employee_id',
        'attendance_date',
        'attendance_status',
   ];
   public function getEmployeeData(){
        return $this->belongsTo(Employee::class,'employee','id');
   }

   public function getDepartmentData(){
       return $this->belongsTo(Department::class,'department','id');
   }

   public function AttendenceData(){
       return $this->belongsTo(Attendence::class,'attendence','employee_id');
   }
}
