<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Department;
use App\Models\JobTitle;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usertype=Auth::user()->usertype;

        if ($usertype=='1') {

            return view('adminPanel',[
                'user'=>User::All(),
                'count_user'=>User::count(),
                'count_department'=>Department::count(),
                'count_job_title'=>JobTitle::count(),
                'count_employee'=>Employee::count(),
                ]);
        }else {
            return view('home');

        }
    }
}
