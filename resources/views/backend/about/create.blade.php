@extends('backend.b_master')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{route('b_master')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('b_about_store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- {{method_field('PUT')}} -->
        <div class="row ">
            <div class="form-group col-md-6 mt-3">
                <div class="">
                    <label for="title1"><h4>Title1</h4></label>
                    <input type="text" class="form-control" id="title1" name="title1" > 
                </div>
                <div class="">
                    <label for="title2"><h4>Title2</h4></label>
                    <input type="text" class="form-control" id="title2" name="title2" > 
                </div>
                <div class="mt-3 ">
                    <h3>Big Image</h3>
                    <img  class="img-fluid" src="{{asset('ui/b_dashboard/assets/img/big.png')}}" alt="">
                    <input type="file"  name="image" class="mt-2">
                </div>
                <div class="mt-3">
                    <label for="description"><h4>Description</h4></label>
                    <textarea type="text" class="form-control" id="description" name="description" ></textarea>
                </div>
               
            </div>
            <button class="btn btn-primary mt-3" type="submit" name="submit">Submit</button>
        </div>
    </form>
    </div>
   
@endsection