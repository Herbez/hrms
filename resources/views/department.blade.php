
@extends('layouts.master')

@section('headtitle','Department')

@section('title','DEPARTMENT')

@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="header">
                    @if ($message=Session::get('success'))
                    <div class="alert alert-success" role="alert"><h5>{{ $message }} 
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    </h5></div>   
    
                    @elseif ($message=Session::get('info'))
                    <div class="alert alert-info" role="alert"><h5>{{ $message }} 
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    </h5></div>  
                            
                    @elseif ($message=Session::get('danger'))
                    <div class="alert alert-danger" role="alert"><h5>{{ $message }} 
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
                            <form action="/department/save" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control border-input" name="dep_name">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea rows="5" class="form-control border-input" name="description"></textarea>
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
                                                <a href={{"department/edit/".$depart->id }} style="color:blue"><i class="fa fa-pencil"></i></a> |
                                               <a href={{"department/delete/".$depart->id }} style="color:red"> <i class="fa fa-trash"></i></a>
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
