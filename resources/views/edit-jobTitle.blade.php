@extends('layouts.master')

@section('title','Job Title')

@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6 col-md-16">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Job Title</h4>
                        </div>
                        
                        <div class="content">
                            <form action="/jobTitle/update" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="hidden" name="job_title_id"
                                                    value="{{Crypt::encrypt($job_title->id)}}">
                                            <input id="title" type="text"
                                                    class="form-control border-input"
                                                    name="job_title_name"
                                                    value="{{$job_title->job_title_name}}"
                                                    >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" rows="5" class="form-control border-input" name="description">{{$job_title->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Update title</button>
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
