@extends('layouts.master')

@section('headtitle','Employee')

@section('title','Edit Employee')

@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6 col-md-16">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Employee</h4>
                        </div>
                            <div class="content" >
                                      <form action="/employee/update" method="POST">
                                        @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>FirstName</label>
                                            <input type="hidden" name="employee_id"
                                                    value="{{Crypt::encrypt($employee->id)}}">
                                            <input type="text" class="form-control border-input" name="first_name"
                                            value="{{$employee->first_name}}">
                                        </div>
                                    </div>
                                 </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" class="form-control border-input" name="last_name"
                                    value="{{$employee->last_name}}">
                                </div>
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date of Birth</label>
                                    <input type="date" class="form-control border-input" name="date_of_birth"
                                    value="{{$employee->date_of_birth}}">
                                </div>
                                </div>
                            </div>


                            <div class="row">

                                {{-- @foreach ($job as $key=> $job_title) --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Job Title </label>
                                        <select  class="form-control border-input" name="job_title">
                                            {{-- <option value="{{$employee->job_title_id}}">
                                                {{$employee->getJobTitleData->job_title_name}}
                                            </option> --}}
                                            @if (!is_null($job_titles))
                                            @foreach ($job_titles as $job_title )
                                            <option value="{{$job_title->id}}">
                                            {{$job_title->job_title_name}}</option>
                                            @endforeach
                                            @endif

                                           

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Department  </label>
                                        <select  class="form-control border-input" name="department">
                                            {{-- <option value="{{$employee->department_id}}">
                                                {{$employee->getDepartmentData->department_name}}
                                            </option> --}}
                                            @if (!is_null($departments))
                                            @foreach ($departments as $department )
                                            <option value="{{$department->id}}">
                                            {{$department->department_name}}</option>
                                            @endforeach
                                            @endif
                                    
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update Employee</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>

                    </div>
                </div> 
            </div>
        </div>
    </div>
@endsection