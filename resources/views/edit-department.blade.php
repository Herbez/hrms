@extends('layouts.master')

@section('title','Department')

@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Department</h4>
                        </div>
                        <div class="content">
                            <form action="/department/update" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Department Name</label>
                                            <input type="hidden" name="department_id"
                                                    value="{{$departs['id']}}">
                                            <input id="title" type="text"
                                                    class="form-control border-input"
                                                    name="department_name"
                                                    value="{{$departs['department_name']}}"
                                                    >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" rows="5" class="form-control border-input" name="description"> {{$departs['description']}} </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Update Department</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
