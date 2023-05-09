<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobTitleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

//Home page
Route::get('/', [UserController::class,'getAllData'])->middleware('auth');

//Users
Route::get('/User', [UserController::class, 'getAllUser'])->middleware('auth');
Route::get('/User/delete/{id}', [UserController::class,'deleteUser'])->middleware('auth');


// JobTitle
Route::get('jobTitle', [JobTitleController::class, 'getAllJobTitle'])->middleware('auth');
Route::post('/jobTitle/save', [JobTitleController::class,'saveJobTitle'])->middleware('auth');
Route::get('/jobTitle/delete/{id}', [JobTitleController::class,'deleteJobTitle'])->middleware('auth');
Route::get('/jobTitle/edit/{id}', [JobTitleController::class,'editJobTitle'])->middleware('auth');
Route::post('/jobTitle/update', [JobTitleController::class,'updateJobTitle'])->middleware('auth');

//Department
Route::get('department', [DepartmentController::class, 'getAllDepartments'])->middleware('auth');
Route::post('/department/save', [DepartmentController::class, 'saveDepartment'])->middleware('auth');
Route::get('department/delete/{id}', [DepartmentController::class,'deleteDepartmentData'])->middleware('auth');
Route::get('department/edit/{id}', [DepartmentController::class,'editDepartmentData'])->middleware('auth');
Route::post('department/update', [DepartmentController::class,'updateDepartmentData'])->middleware('auth');


//Employee
Route::get('employee', [EmployeeController::class, 'getAllEmployee'])->middleware('auth');
Route::post('/employee/save', [EmployeeController::class,'saveEmployee'])->middleware('auth');
Route::get('/employee/delete/{id}', [EmployeeController::class,'deleteEmployee'])->middleware('auth');
Route::get('/employee/edit/{id}', [EmployeeController::class,'editEmployee'])->middleware('auth');
Route::post('/employee/update', [EmployeeController::class,'updateEmployee'])->middleware('auth');

//Attendance
Route::get('/attendance', [ AttendanceController::class,'getEmployeeAttendence'])->middleware('auth');
Route::get('/attendance/present/{id}', [ AttendanceController::class,'present'])->middleware('auth');
Route::get('/attendance/absent/{id}', [ AttendanceController::class,'absent'])->middleware('auth');
Route::get('/attendance/pay/{id}', [ AttendanceController::class,'pay'])->middleware('auth');



// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
