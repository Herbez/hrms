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


               <div class="col-lg-6 col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Users List</h4>
                    </div>

                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>


                            </thead>
                            <tbody>
                                @foreach ($users as $key=> $user)
                                @if (($user->email!="adminhrms@gmail.com"))
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td> {{ $user->name }} </td>
                                        <td> {{ $user->email }} </td>
                                        <td> </td>
                                        <td> </td>
                                        <td>
                                          <div style="display: inline-flex;">
                                            <a href="/User/delete/{{Crypt::encrypt($user->id)}}" class="btn btn-md btn-danger">Delete</a>
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
    </div>

@endsection
