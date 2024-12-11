<div class="tm-top-header">
    
    <div class="container">
        <div class="row">
            <div class="tm-top-header-inner">
                <div class="tm-logo-container">
                    <img src="frontend/img/logo.png" alt="Logo" class="tm-site-logo">
                    <h1 class="tm-site-name tm-handwriting-font">Cafe House</h1>
                </div>
                <div class="mobile-menu-icon">
                    <i class="fa fa-bars"></i>
                </div>
                <nav class="tm-nav">
                    <ul>
                        <li><a href="{{url('home')}} " class="active">Home</a></li>
                        <li><a href="today-special.html">Today Special</a></li>
                        <li><a href="{{url('menu')}}">Menu</a></li>
                        <li><a href="{{url('trangcanhan')}}">Trang cá nhân</a></li>
                        @if (Auth::check())
                <li><a href="{{url('member/logout')}}"><i class="fa fa-lock"></i> đăng xuất</a></li>
                @else
                <li><a href="{{url('member')}}"><i class="fa fa-lock"></i> đăng nhập</a></li>
                @endif
                        <li class="material-icons"><a href="{{url('giohang')}}">GIỏ hàng</a></li>

                        @if(auth()->check())
                            <li>
                                <div>
                                    <span>xin chào {{ auth()->user()->name }}</span>
                                    <!-- Hiển thị các tùy chọn khác như đăng xuất, chỉnh sửa thông tin cá nhân, vv -->
                                </div>
                            </li>
                        @else
                            
                        @endif


                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

