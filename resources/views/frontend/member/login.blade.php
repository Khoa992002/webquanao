@extends('frontend.layouts.app')
@section('content')


	<div class="col-sm-4 col-sm-offset-1">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
            {{ session('success') }}
        </div>
    @endif
    <div class="login-form"><!--login form-->
        <h2>Đăng nhập tài khoản của bạn</h2>
        <form action="{{ url('/member') }}" method="post">
    @csrf
     <input class="form-control" type="text" name="email" placeholder="Email" required />
   
    <input class="form-control" type="password" name="password" placeholder="Password" required />
    <span>
        <input type="checkbox" class="checkbox" name="remember_me" id="remember_me"> 
        Remember me
    </span>
    <button type="submit" class="tm-more-button">Login</button>
</form>

        <p>Nếu bạn chưa có tài khoản, hãy <a href="{{ url('/dangkytaikhoan') }}">đăng ký ở đây</a>.</p>
    </div><!--/login form-->
</div>



@endsection
