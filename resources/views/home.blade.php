@extends('homeLayouts.master')

@section('headtitle','Dashboard')

@section('title','DASHBOARD')


@section('contents')

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Welcome HUMAN RESOURCE MANAGEMENT SYSTEM </h4>
                    </div>
                    <div class="content">

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h3 class="text-primary">GOOD MORNING, {{ Auth::user()->name }}!</h3>

                        <h3 class="text-secondary"> Here's what happening with your Account today.</h3>
                        <div class="content">
                        <h5 class="bg-secondary">Today's Attendance:</h5>
                        <hr>
                        <h5><b> No Status!</b><h5>
                        </div>
                    </div>
                    <div class="content">

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
