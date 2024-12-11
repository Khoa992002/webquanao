@extends('frontend.layouts.app')

@section('content')
    <div class="tm-main-section light-gray-bg">
        <div class="container" id="main">
            <section class="tm-section row">
            	@if(auth()->check() && auth()->user())
                <h2 class="col-lg-12 margin-bottom-30">CẬP NHẬT THÔNG TIN CÁ NHÂN CỦA BẠN</h2>
                <form action="{{ url('/capnhattrangcanhan') }}" method="post" class="tm-contact-form" enctype="multipart/form-data">
                	@csrf
                    <div class="col-lg-6 col-md-6">
                        <!-- Khung hiển thị ảnh đại diện -->
                        <div class="form-group">
                            <img style="width: 100px; height: 100px; border-radius: 50%;" src="{{ asset('frontend/avatar/' . $member['avatar']) }}" alt="Avatar" class="avatar-preview">
                            <!-- Nút cho phép người dùng chọn ảnh mới -->
                            <input type="file" name="avatar" class="form-control" placeholder="Click vào đây để đổi avatar">    
                        </div>
                        <!-- Các trường thông tin liên hệ -->
                        <div class="form-group">
                            <input type="name" id="contact_name" name="name" class="form-control" placeholder="NAME" value="{{ $member['name'] }}"/>
                        </div>
                        <div class="form-group">
                            <input type="email" id="contact_email" name="email" class="form-control" placeholder="EMAIL" value="{{ $member['email'] }}" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="PHONE" value="{{ $member['phone'] }}" />

                        </div>
                        <div class="form-group">
                            <input type="text" id="contact_subject" name="address" class="form-control" placeholder="ADDRESS" value="{{ $member['address'] }}" />
                        </div>
                        <div class="form-group">
                            <input type="text" id="contact_subject" name="password" class="form-control" placeholder="hãy nhập mật khâu mới nếu bạn muốn thay đổi hoặc không" />
                        </div>
                        <div class="form-group">
                            <button class="tm-more-button" type="submit" name="submit">Cập nhật thông tin của bạn
                            </button>
                        </div>
                    </div>

                    <!-- Khung hiển thị bản đồ -->
                    <div class="col-lg-6 col-md-6">
                        <div id="google-map"></div>
                    </div>
                </form>
                @else
                <!-- Hiển thị thông báo hoặc chuyển hướng người dùng về trang đăng nhập -->
                <div class="alert alert-danger" role="alert" style="width: 900px; background-color: #f8d7da; border-color: #f5c6cb; color: #721c24;">
                   <strong>Thông báo:</strong> Bạn chưa đăng nhập tài khoản. Vui lòng đăng nhập để tiếp tục.
                </div>

               @endif
            </section>
        </div>
    </div> 
@endsection
