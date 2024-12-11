@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
                      @if(session('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                {{session('success')}}
                            </div>
                        @endif

<div class="container-fluid">

 <form  method="post"   action="{{ url('/add/newproduct') }}" class="form-horizontal form-material" enctype="multipart/form-data">
   @csrf
	<div class="form-group">       
        <label for="name">Title(*)</label>
        <input type="text" id="name" name="name">
    </div>
    <div class="form-group">
                <label class="col-sm-12">Select Country</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-line" name="classify">
                        <option>Camera Analog</option>
                        <option>Camera CCD</option>
                        <option>CCamera CMOS</option>
                        <option>Camera có dây</option>
                        <option>Camera IP</option>
                        <option>Camera không dây</option>
                        <option>Camera Dome</option>
                        <option>Camera Bullet</option>
                        <option>Box camera</option>
                        <option>Camera PTZ</option>
                    </select>
                </div>
            </div>
   <div class="form-group">
                
   <input  class="btn btn-success" type="file" class="form-control form-control-line" name="image" >
  
   </div>

   <div class="form-group">
      <label for="introduce">Giới Thiệu:</label>
      <textarea type="description" name="description" class="form-control"></textarea>
   </div>
   <div class="form-group">

	<label>price</label>
	<textarea name="price" class="form-control" id="price" name="price"></textarea>
   </div>
   <div class="form-group">

	<label>introduce</label>
	<textarea name="introduce" class="form-control" id="introduce" name="introduce"></textarea>
   </div>

   <div class="form-group">
   	 <button  class="btn btn-success">Create blog</button>
   </div>
</form>	

 @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                    
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                        @endif
</div>
  

@endsection