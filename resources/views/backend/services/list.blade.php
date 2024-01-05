@extends('backend.b_master')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">List of Services</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{route('b_master')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">List of Services</li>
        </ol>
        
        <table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Icon</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    @if(count($services)>0)
    @foreach($services as $service)

    <tr>
      <th scope="row">{{$service->id}}</th>
      <td>{{$service->icon}}</td>
      <td>{{$service->title}}</td>
      <td>{{Str::limit(strip_tags($service->description),20)}}</td>
      <td>
          <div class="row">
                <div class="col-sm-2">
                    <a href="{{route('b_service_edit',$service->id)}}"  class="btn btn-primary">Edit</a>
                    <a class="btn btn-sm btn-danger" href="{{route('b_service_delete',$service->id)}}">Delete</a>
                </div>
              
          </div>
      </td>
    </tr>
   
    @endforeach
    @endif
  </tbody>
</table>
    </div>
   



@endsection