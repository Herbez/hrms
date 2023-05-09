@extends('layouts.master')

@section('headtitle','User')

@section('title','USERS')

@section('contents')



    @if ($message=Session::get('danger'))
        <div class="alert alert-danger" style="width: 23%; height:10%; margin-left:25px;" role="alert"><h5>{{ $message }} 
            <button type="button" class="close" data-dismiss="alert">x</button>
            </h5>
        </div> 

    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                @foreach ($users as $key=> $user)
                @if (($user->name!="Admin"))
                    <div class="col-lg-3 col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/background.jpg" alt="..." />
                            </div>
                            <div class="content">
                                <div  class="text-center">
                                <h4 class="title">{{ $user->name }}<br />
                                        <a href="#"><small>{{ $user->email }}</small></a>
                                        
                                    </h4>
                                </div>
                                <p class="description text-center">
                                    <a href="/User/delete/{{Crypt::encrypt($user->id)}}" class="btn btn-md btn-danger">Delete</a>
                                </p>
                            </div>
                            <hr>
                            
                        </div>
                        
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

@endsection
