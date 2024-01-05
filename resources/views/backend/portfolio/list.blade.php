@extends('backend.b_master')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">List of Portfolio</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{route('b_master')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">List of Portfolio</li>
        </ol>
        
        <table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Title</th>
      <th scope="col">Sub Title</th>
      <th scope="col">Big Image</th>
      <th scope="col">Small Image</th>
      <th scope="col">Description</th>
      <th scope="col">Client</th>
      <th scope="col">Category</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    @if(count($portfolios)>0)
    @foreach($portfolios as $portfolio)

    <tr>
      <th scope="row">{{$portfolio->id}}</th>
   
      <td>{{$portfolio->title}}</td>
      <td>{{Str::limit(strip_tags($portfolio->sub_title),10)}}</td>
      <td>
        <img src="{{url($portfolio->big_image)}}" alt="" style="height:10vh">
      </td>
      <td>
        <img src="{{url($portfolio->small_image)}}" alt="" style="height:10vh">
      </td>
      <td>{{Str::limit(strip_tags($portfolio->description),10)}}</td>
      <td>{{$portfolio->client}}</td>
      <td>{{$portfolio->category}}</td>
      <td>
          <div class="row">
                <div class="col-sm-2">
                    <a href="{{route('b_portfolio_edit',$portfolio->id)}}"  class="btn btn-primary">Edit</a>
                    <a class="btn btn-sm btn-danger" href="{{route('b_portfolio_delete',$portfolio->id)}}">Delete</a>
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