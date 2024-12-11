@extends('admin.layouts.app')
@section('content')



@if(session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
        {{ session('success') }}
    </div>
@endif

<form  method="post" action="{{ url('/edit/newproduct/'.$data->id) }}" class="form-horizontal form-material" enctype="multipart/form-data">
   @csrf
    <div class="form-group">       
        <label for="name">Title(*)</label>
        <input type="text" id="name" name="title" value="{{$data->name}}" required>
    </div>
   <div class="form-group">
                
  <input class="btn btn-success" type="file" class="form-control form-control-line" name="image" required>
  
   </div>

   <div class="form-group">
      <label for="description">Description:</label>
      <textarea name="description" class="form-control">{{$data->description}}</textarea>
   </div>

   <div class="form-group">
    <label>price</label>
    <textarea name="price" class="form-control" id="price">{{$data->price}}</textarea>
   </div>
   <div class="form-group">
    <label>introduce</label>
    <textarea name="introduce" class="form-control" id="introduce">{{$data->introduce}}</textarea>
   </div>

   <div class="form-group">
     <button  class="btn btn-success">chỉnh sữa</button>
   </div>
</form> 
</div>
@endsection;