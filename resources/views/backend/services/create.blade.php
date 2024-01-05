@extends('backend.b_master')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{route('b_master')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('b_service_store')}}" method="post" enctype="multipart/form-data">
        @csrf
        
            <div class="row ">
                <div class="form-group col-md-6  mt-3">
                    <div class="mb-3">
                        <label for="icon"><h4>Font Awesome Icon</h4></label>
                        <input type="text" id="icon" name="icon" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="title"><h4>Title</h4></label>
                        <input type="text" class="form-control" id="title" name="title" > 
                    </div>
                    <div class="mb-2">
                        <label for="description"><h4>Description</h4></label>
                        <textarea type="text" class="form-control" id="description" name="description" ></textarea>
                    </div>
                    <button class="btn btn-primary mt-2" type="submit" name="submit">Submit</button>
                </div>
                
            </div>
        </form>
    </div>
   
@endsection