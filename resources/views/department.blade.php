
@extends('layouts.master')

@section('headtitle','Department')

@section('title','DEPARTMENT')

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
                            <h4 class="title">Create a Department</h4>
                        </div>
                        
                        <div class="content">
                            <form action="/department/save" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control border-input" name="department_name">
                                            @error('department_name')
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
                                    <button type="submit" class="btn btn-info btn-fill btn-wd" >Save Department</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>

                
                <div class="col-lg-7 col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Departments List</h4>
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
                                    @foreach ($departs as $key=> $depart)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td> {{ $depart->department_name }} </td>
                                            <td> {{ $depart->description }} </td>
                                            <td>
                                                <a href={{"department/edit/".$depart->id }}  class="btn btn-md btn-primary " style="margin-right: .3rem">Edit</a>
                                               <a href={{"department/delete/".$depart->id }} class="btn btn-md btn-danger">Delete</a>
                                               
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
