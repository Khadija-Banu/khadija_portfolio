@extends('backend.b_master')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">List of About</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{route('b_master')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">List of About</li>
        </ol>
        
        <table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Title1</th>
      <th scope="col">Title2</th>
      <th scope="col">Image</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    @if(count($abouts)>0)
    @foreach($abouts as $about)

    <tr>
      <th scope="row">{{$about->id}}</th>
   
      <td>{{$about->title1}}</td>
      <td>{{Str::limit(strip_tags($about->title2),10)}}</td>
      <td>
        <img src="{{url($about->image)}}" alt="" style="height:10vh">
      </td>
      <td>{{Str::limit(strip_tags($about->description),10)}}</td>
      <td>
          <div class="row">
                <div class="col-sm-2">
                    <a href="{{route('b_about_edit',$about->id)}}"  class="btn btn-primary">Edit</a>
                    <a class="btn btn-sm btn-danger" href="{{route('b_about_delete',$about->id)}}">Delete</a>
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