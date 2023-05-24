<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\JobTitle;
use App\Models\User;

use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{

    function getAllUser(){
        return view('user',['users'=>User::all()]);
    }

    function deleteUser($id){
        User::findOrFail(Crypt::decrypt($id))->delete();
        return redirect('/User')->with('danger','User Deleted Successfully !');
    }

}
