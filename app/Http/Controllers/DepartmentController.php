<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;


class DepartmentController extends Controller
{
    //
    public function getAllDepartments(){

        $data = Department::all();
        return view('department', ['departs'=>$data]);
    }

    public function saveDepartment(Request $request){
        Department::create([
            'department_name'=>$request->department_name,
            'description'=>$request->description,
        ]);
        return redirect()->back()->with('success','Department Added Successfully !');
    }

    public function editDepartmentData($id){
        $data = Department::find($id);
        return view('edit-department', ['departs'=>$data]);
    }

    public function updateDepartmentData(Request $req){
        $data = Department::find($req->department_id);
        $data->department_name = $req->department_name;
        $data->description = $req->description;
        $data->save();
        return redirect('department')->with('info','Department Updated Successfully !');
    }

    public function deleteDepartmentData($id){
        $data = Department::find($id);
        $data->delete();
        return redirect('department')->with('danger','Department Deleted Successfully !');

    }
}
