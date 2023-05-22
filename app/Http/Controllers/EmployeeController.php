<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\JobTitle;
use Illuminate\Support\Facades\Crypt;


class EmployeeController extends Controller
{
    //
    function getAllEmployee(){

        $employees=Employee::with('getDepartmentData','getJobTitleData','getAttendenceData')->get();
        $job_titles=JobTitle::all();
        $departments=Department::all();
        return view('employee',[
            'employees'=>$employees,
            'job_titles'=>$job_titles,
            'departments'=>$departments,

        ]);


        return view('employees',[
            'employee'=>$employees,
            'jobs'=>$jobs,
            'depart'=>$depart,
            'withMarks'=>$employeesWithMarks,
        ]);
    }

    function saveEmployee(Request $request){
        $validated = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'date_of_birth'=>'required',
            'job_title'=>'required',

        ]);

        Employee::create([
        'first_name'=> $request->first_name,
        'last_name'=> $request->last_name,
        'date_of_birth'=> $request->date_of_birth,
        'job_title_id'=> $request->job_title,
        'department_id'=> $request->department,

        ]);
        return redirect('/employee')->with('success','Employee Added Successfully !');
    }

    function deleteEmployee($id){
        Employee::findOrFail(Crypt::decrypt($id))->delete();
        return redirect('/employee')->with('danger','Employee Deleted Successfully !');
    }

    function editEmployee($id){
        $job_titles=JobTitle::all();
        $departments=Department::all();
        return view('edit-employee',[
            'employee'=>Employee::findOrFail(Crypt::decrypt($id)),
            'job_titles'=>$job_titles,
            'departments'=>$departments,

        ]);
    }

    function updateEmployee(Request $request){
        Employee::where('id',Crypt::decrypt($request->employee_id))->update([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'date_of_birth'=> $request->date_of_birth,
            'job_title_id'=> $request->job_title,
            'department_id'=> $request->department,

            ]);
            return redirect('/employee')->with('info','Employee Updated Successfully !');
    }


}
