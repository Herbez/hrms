<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobTitleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', function () { 
    return view('welcome');
});




// JobTitle
Route::get('jobTitle', [JobTitleController::class, 'getAllJobTitle']);
Route::post('/jobTitle/save', [JobTitleController::class,'saveJobTitle']);
Route::delete('/jobTitle/delete/{id}', [JobTitleController::class,'deleteJobTitle']);
Route::get('/jobTitle/edit/{id}', [JobTitleController::class,'editJobTitle']);
Route::post('/jobTitle/update', [JobTitleController::class,'updateJobTitle']);

//Department
Route::get('department', [DepartmentController::class, 'getAllDepartments']);
Route::post('/department/save', [DepartmentController::class, 'saveDepartment']);
Route::get('department/delete/{id}', [DepartmentController::class,'deleteDepartmentData']);
Route::get('department/edit/{id}', [DepartmentController::class,'editDepartmentData']);
Route::post('department/update', [DepartmentController::class,'updateDepartmentData']);


//Employee
Route::get('employee', [EmployeeController::class, 'getAllEmployee']);
Route::post('/employee/save', [EmployeeController::class,'saveEmployee']);
Route::delete('/employee/delete/{id}', [EmployeeController::class,'deleteEmployee']);
Route::get('/employee/edit/{id}', [EmployeeController::class,'editEmployee']);
Route::post('/employee/update', [EmployeeController::class,'updateEmployee']);
