<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Department;
use App\Models\JobTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AttendanceController extends Controller
{
    //
    

    function getEmployeeAttendence(){
        $employees=Employee::with('getDepartmentData','getJobTitleData')->whereDate('updated_at','!=',Carbon::today()->format("Y-m-d"))->get();
        $employees_money=Employee::with('getDepartmentData','getJobTitleData')->get();
        //dd($employees);
        $jobs=JobTitle::all();
        $departments=Department::all();
        return view('attendance',[
            'employee'=>$employees,
            'jobs'=>$jobs,
            'depart'=>$departments,
            'emp_money'=>$employees_money,
        ]);
    }

    function pay($id){

        $findEmployee = Employee::where('id',$id)->update([
            'marks'=>'0'
        ]);
                return redirect()->back();
            }

    function present($id)
        {
            $findEmployee = Employee::where('id',$id)->update([
                'marks'=>DB::raw('marks + 1')
            ]);

            return redirect()->back();

        }
    function absent($id)
    {
        $findEmployee = Employee::where('id',$id)->update([
            'marks'=>DB::raw('marks + 0')
        ]);

        return redirect()->back();

    }
}
