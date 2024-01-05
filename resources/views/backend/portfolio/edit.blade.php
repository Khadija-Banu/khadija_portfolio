@extends('backend.b_master')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Update</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{route('b_master')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Update</li>
        </ol>
        <form action="{{route('b_portfolio_update',$portfolio->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- {{method_field('PUT')}} -->
        <div class="row ">
            <div class="form-group col-md-6 mt-3">
                <div class="">
                    <label for="title"><h4>Title</h4></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$portfolio->title}}" > 
                </div>
                <div class="mt-3">
                    <label for="sub_title"><h4>Sub Title</h4></label>
                    <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{$portfolio->sub_title}}" >
                </div>
                <div class="mt-3">
                    <label for="description"><h4>Description</h4></label>
                    <textarea type="text" class="form-control" id="description" name="description" >{{$portfolio->description}}</textarea>
                </div>
                <div class="mt-3">
                    <label for="client"><h4>Client</h4></label>
                    <input type="text" class="form-control" id="client" name="client" value="{{$portfolio->client}}"> 
                </div>
                <div class="mt-3">
                    <label for="category"><h4>Category</h4></label>
                    <input type="text" class="form-control" id="category" name="category" value="{{$portfolio->category}}">
                </div>
            </div>
            <div class="form-group col-md-6 mt-3">
                <div class="form-group ">
                    <h3>Big Image</h3>
                    <img style="height:20vh"  src="{{url($portfolio->big_image)}}" alt="" >
                    <input type="file"  name="big_image" class="mt-2">
                </div>
                <div class="form-group ">
                    <h3>Small Image</h3>
                    <img style="height:10vh"  src="{{url($portfolio->small_image)}}" alt="" >
                    <input type="file"  name="small_image" class="mt-2">
                </div>
                
            </div>
            <button class="btn btn-primary mt-3" type="submit" name="submit">Submit</button>
        </div>
    </form>
    </div>
   



@endsection