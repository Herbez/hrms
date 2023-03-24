@extends('layouts.master')

@section('headtitle','Attendance')

@section('title',' ATTENDANCE')

@section('contents')
<div class="content"> 
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-8 col-md-6">
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
                                    <td>{{$employee->last_tname}}</td>
                                    <td>{{$employee->date_of_birth}}</td>
                                    <td>@if (!is_null($employee->job_title_id))
                                        {{$employee->getJobTitle->job_title_name}}
                                    @endif</td>
                                    <td>
                                        @if (!is_null($employee->department_id))
                                        {{$employee->getDepartmentName->department_name}}
                                        @endif
                                    </td>
                                    <td>
                                        <div style="display: inline-flex;">
                                            <a href="{{url('/employee/present/'.$emp_row->id)}}" class="btn btn-sm btn-primary " style="margin-right: .3rem">Present</a>
                                            <a href="{{url('/employee/absent/'.$emp_row->id)}}" class="btn btn-sm btn-danger">Absent</a>
                                        </div>
                                    </td>
                                    </tr>
                                @endif

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h4 class="title">ATTENDANCE RECORD </h4>
                    </div>
                    <div class="content">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Firstname</th>
                                <th>Lastname</th>

                                <th>Job Title</th>
                                <th>Department</th>
                                <th>Days</th>
                                <th>Amount</th>
                                <th>Paid</th>
                            </tr>
                            <tbody>
                                @foreach ($withMarks as  $key=> $withMark )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$withMark->firstname}}</td>
                                    <td>{{$withMark->laststname}}</td>
                                    <td>@if (!is_null($withMark->job_title_id))
                                        {{$withMark->getJobTitle->job_title_name}}
                                    @endif</td>
                                    <td>
                                        @if (!is_null($withMark->department_id))
                                        {{$withMark->getDepartmentName->department_name}}
                                        @endif
                                    </td>

                                    <td>{{$withMark->marks}}</td>
                                    <td>{{$withMark->marks * 5000}} Rwf</td>
                                    <td><div style="display: inline-flex;">
                                        <a href="{{url('/employee/pay/'.$withMark->id)}}" class="btn btn-sm btn-primary " style="margin-right: .3rem">Paid</a>
                                        </div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-4">
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
                                    <input type="text" class="form-control border-input" name="add_firstname">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" class="form-control border-input" name="add_laststnam">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date of Birth</label>
                                    <input type="date" class="form-control border-input" name="date_of_birth">
                                </div>
                                </div>
                            </div>


                            <div class="row">

                                {{-- @foreach ($job as $key=> $job_title) --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Job Title </label>
                                        <select  class="form-control border-input" name="job_title">
                                            <option value="" >select job title</option>
                                            @if (!is_null($jobs))
                                            @foreach ($jobs as $jbt )
                                            <option value="{{$jbt->id}}">{{$jbt->job_title_name}}</option>

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
                                        <select  class="form-control border-input" name="depart">
                                            <option value="">select department</option>
                                            @if (!is_null($depart))
                                            @foreach ($depart as $dpt )
                                            <option value="{{$dpt->id}}">{{$dpt->department_name}}</option>

                                            @endforeach

                                            @endif
                                        </select>
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


        </div>
    </div>
</div>
@endsection
