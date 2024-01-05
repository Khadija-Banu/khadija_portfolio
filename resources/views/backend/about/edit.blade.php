@extends('backend.b_master')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Update</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{route('b_master')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Update</li>
        </ol>
        <form action="{{route('b_about_update',$about->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- {{method_field('PUT')}} -->
        <div class="row ">
            <div class="form-group col-md-6 mt-3">
                <div class="">
                    <label for="title1"><h4>Title1</h4></label>
                    <input type="text" class="form-control" id="title1" name="title1" value="{{$about->title1}}" > 
                </div>
                <div class="mt-3">
                    <label for="title2"><h4>Title2</h4></label>
                    <input type="text" class="form-control" id="title2" name="title2" value="{{$about->title2}}" >
                </div>
                <div class="form-group ">
                    <h3>Image</h3>
                    <img style="height:20vh"  src="{{url($about->image)}}" alt="" >
                    <input type="file"  name="image" class="mt-2">
                </div>
                <div class="mt-3">
                    <label for="description"><h4>Description</h4></label>
                    <textarea type="text" class="form-control" id="description" name="description" >{{$about->description}}</textarea>
                </div> 
            </div>
            <button class="btn btn-primary mt-3" type="submit" name="submit">Submit</button>
        </div>
    </form>
    </div>
   



@endsection