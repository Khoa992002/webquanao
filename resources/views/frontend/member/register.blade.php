@extends('frontend.layouts.app')
@section('content')
<div class="col-sm-4">
	   @if(session('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                {{session('success')}}
                            </div>
                        @endif
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form method="post" action="{{ url('dangkytaikhoan/new') }} " enctype="multipart/form-data">
							@csrf
							<input type="text" name="name" placeholder="Name"/>
							<input type="email" name="email" placeholder="Email Address"/>
							<input type="password" name="password" placeholder="Password"/>
							<input type="number" name="phone" placeholder="phone"/>
							<select class="form-control form-control-line" value=""  name="address">
                                                <option>London</option>
                                                <option>VietNam</option>
                                                <option>Usa</option>
                                                <option>Canada</option>
                                                <option>Thailand</option>
                                            </select>
                             <input class="form-control form-control-line" type="file" name="avatar">               
							<button type="submit" class="btn btn-default">Signup</button>
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
					</div><!--/sign up form-->
				</div>

@endsection