@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible">
        <strong>Error!</strong> {{$error}} 
        <button type="button" class="close" data-dismiss="alert">&times;</button>
           
        </div>
    @endforeach
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible">
    <strong>Error!</strong> {{session('error')}} 
    <button type="button" class="close" data-dismiss="alert">&times;</button>           
    </div>
@endif

@if(session('success'))
    <div class="alert alert-primary alert-dismissible">
    <strong>Success!</strong> {{session('success')}} 
    <button type="button" class="close" data-dismiss="alert">&times;</button>           
    </div>
@endif

