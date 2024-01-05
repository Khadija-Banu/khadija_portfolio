@extends('backend.b_master')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Main</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{route('b_master')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Main</li>
        </ol>
    <form action="{{route('b_main_update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- {{method_field('PUT')}} -->
        <div class="row ">
            <div class="form-group col-md-3 mt-3">
                <h3>Background Image</h3>
                <img style="height:30vh" class="img-thumbnail" src="{{$main->bc_img}}" alt="">
                <input type="file" id="bc_img" name="bc_img" class="mt-2">
            </div>
            <div class="form-group col-md-4 mt-3">
                <div class="mb-3">
                    <label for="title"><h4>Title</h4></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$main->title}}"> 
                </div>
                <div class="mb-5">
                    <label for="sub_title"><h4>Sub Title</h4></label>
                    <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{$main->sub_title}}">
                </div>
                <div>
                    <h4>Upload Resume</h4>
                    <input type="file" id="resume" name="resume">
                </div>
            </div>
            <button class="btn btn-primary mt-5" type="submit" name="submit">Submit</button>
        </div>
    </form>
    </div>
   



@endsection