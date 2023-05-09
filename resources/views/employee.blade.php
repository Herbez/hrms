@extends('layouts.master')

@section('headtitle','Employee')

@section('title',' Employees Register')

@section('contents')

<div class="content"> 
    <div class="container-fluid">
        <div class="row">

            <div class="header" >
                @if ($message=Session::get('success'))
                <div class="alert alert-success" style="width: 31%; height:10%; margin-left:16px;" role="alert"><h5>{{ $message }} 
                    
                <button type="button" class="close" data-dismiss="alert">x</button>
                </h5></div>   

                @elseif ($message=Session::get('info'))
                <div class="alert alert-primary" style="width: 31%; height:10%; margin-left:16px;" role="alert"><h5>{{ $message }} 
                <button type="button" class="close" data-dismiss="alert">x</button>
                </h5></div>  
                        
                @elseif ($message=Session::get('danger'))
                <div class="alert alert-danger" style="width: 31%; height:10%; margin-left:16px;" role="alert"><h5>{{ $message }} 
                <button type="button" class="close" data-dismiss="alert">x</button>
                </h5></div> 

                @endif
            </div>
                
                <div class="col-lg-4 col-md-5">
                    <div class="card">
                            <div class="header">
                                <h4 class="title">Employee Register</h4>
                                    </div>
                                    <div class="content" style="padding:1rem;">
                                    <form action="employee/save" method="POST">
                                        @csrf
                                        <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>FirstName</label>
                                            <input type="text" class="form-control border-input" name="first_name">
                                            @error('first_name')
                                                <span class="text-danger"  role="alert">
                                                    {{$message}} 
                                                </span>
                                            @enderror
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" class="form-control border-input" name="last_name">
                                    @error('last_name')
                                        <span class="text-danger"  role="alert">
                                            {{$message}} 
                                        </span>
                                    @enderror
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date of Birth</label>
                                    <input type="date" class="form-control border-input" name="date_of_birth">
                                    @error('date_of_birth')
                                        <span class="text-danger"  role="alert">
                                            {{$message}} 
                                        </span>
                                    @enderror
                                </div>
                                </div>
                            </div>


                            <div class="row">

                                {{-- @foreach ($job as $key=> $job_title) --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Job Title </label>
                                        <select  class="form-control border-input" name="job_title">
                                            <option value="" >Select job title</option>
                                            @if (!is_null($job_titles))
                                            @foreach ($job_titles as $job_title )
                                            <option value="{{$job_title->id}}">
                                            {{$job_title->job_title_name}}</option>
                                            @endforeach
                                            @endif

                                        </select>
                                        @error('job_title')
                                        <span class="text-danger"  role="alert">
                                            {{$message}} 
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Department  </label>
                                        <select  class="form-control border-input" name="department">
                                            <option value="">Select department</option>
                                            @if (!is_null($departments))
                                            @foreach ($departments as $department )
                                            <option value="{{$department->id}}">
                                            {{$department->department_name}}</option>
                                            @endforeach

                                            @endif
                                        </select>
                                        @error('department')
                                        <span class="text-danger"  role="alert">
                                            {{$message}} 
                                        </span> 
                                    @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Add Employee</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-5">
                <div class="card">
                    <div class="header">
                        <h4 class="title">List of Employees </h4>
                    </div>
                    <div class="content">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Date of Birth</th>
                                <th>Job Title</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                            <tbody>
                                @foreach ($employees as $key=> $employee )
                                @if (!is_null($employee->department_id))
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$employee->first_name}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>{{$employee->date_of_birth}}</td>
                                    <td>@if (!is_null($employee->job_title_id))
                                        {{$employee->getJobTitleData->job_title_name}}
                                    @endif</td>
                                    <td>
                                        @if (!is_null($employee->department_id))
                                        {{$employee->getDepartmentData->department_name}}
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            {{-- <a href="employee/edit/{{Crypt::encrypt($employee->id)}}" style="color:blue"><i class="fa fa-pencil"></i></a> |
                                             <a href="#!" onclick="document.getElementById('delete-{{$employee->id}}').submit()"
                                                style="color:red"><i class="fa fa-trash"></i></a> 
                                                <form action="/employee/delete/{{Crypt::encrypt($employee->id)}}"
                                                    method="post"
                                                    onsubmit="return confirm('are you sure?')"
                                                    id="delete-{{$employee->id}}"
                                                    >
                                                    @csrf
                                                    @method('DELETE')
                                              </form> --}}
                                              <div style="display: inline-flex;">
                                                <a href="employee/edit/{{Crypt::encrypt($employee->id)}}" class="btn btn-md btn-primary " style="margin-right: .3rem">Edit</a>
                                                <a href="/employee/delete/{{Crypt::encrypt($employee->id)}}" class="btn btn-md btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                @endif

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-5">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Waiting List </h4>
                    </div>
                    <div class="content">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Date of Birth</th>
                                <th>Job Title</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                            <tbody>
                                @foreach ($employees as $key=> $employee )
                                @if (is_null($employee->department_id))
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$employee->first_name}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>{{$employee->date_of_birth}}</td>
                                    <td>@if (!is_null($employee->job_title_id))
                                        {{$employee->getJobTitleData->job_title_name}}
                                    @endif</td>
                                    <td>{{$employee->department_id}}</td>                 
                                    
                                    <td>
                                        {{-- <div>
                                            <a href="employee/edit/{{Crypt::encrypt($employee->id)}}" style="color:blue"><i class="fa fa-pencil"></i></a> |
                                             <a href="#!" onclick="document.getElementById('delete-{{$employee->id}}').submit()"
                                                style="color:red"><i class="fa fa-trash"></i></a> 
                                                <form action="/employee/delete/{{Crypt::encrypt($employee->id)}}"
                                                    method="post"
                                                    onsubmit="return confirm('are you sure?')"
                                                    id="delete-{{$employee->id}}"
                                                    >
                                                    @csrf
                                                    @method('DELETE')
                                              </form>
                                        </div> --}}
                                        <div style="display: inline-flex;">
                                            <a href="/employee/edit/{{Crypt::encrypt($employee->id)}}" class="btn btn-md btn-primary " style="margin-right: .3rem">Edit</a>
                                            <a href="/employee/delete/{{Crypt::encrypt($employee->id)}}" class="btn btn-md btn-danger">Delete</a>
                                        </div>
                                    </td>
                                    </tr>
                                @endif

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection