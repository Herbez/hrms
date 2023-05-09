@extends('layouts.master')

@section('headtitle','JobTitle')

@section('title','JOB TITLE')

@section('contents') 
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="header">
                    @if ($message=Session::get('success'))
                    <div class="alert alert-success" style="width: 39%; height:10%; margin-left:17px;" role="alert"><h5>{{ $message }}
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    </h5></div>   
    
                    @elseif ($message=Session::get('info'))
                    <div class="alert alert-info" style="width: 39%; height:10%; margin-left:17px;" role="alert"><h5>{{ $message }} 
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    </h5></div>  
                            
                    @elseif ($message=Session::get('danger'))
                    <div class="alert alert-danger" style="width: 39%; height:10%; margin-left:17px;" role="alert"><h5>{{ $message }} 
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    </h5></div> 
    
                    @endif
                </div>
    
                <div class="col-lg-5 col-md-5">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Create Job Title</h4>
                        </div>
                    

                    <div class="content">
                            <form action="/jobTitle/save" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control border-input" name="title">
                                            @error('job_title_name')
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
                                            <label>Description</label>
                                            <textarea rows="5" class="form-control border-input" name="description"></textarea>
                                            @error('description')
                                                <span class="text-danger"  role="alert">
                                                    {{$message}} 
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Save title</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>


               <div class="col-lg-7 col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Job Title List</h4>
                        </div>
                        
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>options</th>
                                    
                                </thead> 
                                <tbody>
                                    @foreach ($job_titles as $key=> $job_title)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td> {{ $job_title->job_title_name }} </td>
                                            <td> {{ $job_title->description }} </td>
                                            <td>
                                             {{-- <a href="jobTitle/edit/{{Crypt::encrypt($job_title->id)}}" style="color:blue"><i class="fa fa-pencil"></i></a> |
                                             <a href="#!" onclick="document.getElementById('delete-{{$job_title->id}}').submit()"
                                                style="color:red"><i class="fa fa-trash"></i></a> 
                                                <form action="/jobTitle/delete/{{Crypt::encrypt($job_title->id)}}"
                                                    method="post"
                                                    onsubmit="return confirm('are you sure?')"
                                                    id="delete-{{$job_title->id}}"
                                                    >
                                                    @csrf
                                                    @method('DELETE')
                                              </form> --}}
                                              <div style="display: inline-flex;">
                                                <a href="/jobTitle/edit/{{Crypt::encrypt($job_title->id)}}" class="btn btn-md btn-primary " style="margin-right: .3rem">Edit</a>
                                                <a href="/jobTitle/delete/{{Crypt::encrypt($job_title->id)}}" class="btn btn-md btn-danger">Delete</a>
                                            </div>
                                              
                                            </td>
                                        </tr>
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
