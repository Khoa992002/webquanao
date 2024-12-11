@extends('frontend.layouts.app')
@section('content')   

 <div class="divtrangchitietssanphm">

        <div class="hinhanh">
           <img style="width:1000px;height: 400px" src="{{ asset('admin/upload/product/' . $chitietsanpham['image']) }}" alt="Product Image">

        </div>
        <div class="ten">
            <h1>{{ $chitietsanpham->name }}</h1>
            <p class="gia">giá : {{$chitietsanpham->price}} $</p>
            <p class="mota">{{ $chitietsanpham->description }}</p>
           
            <button style=" background-color: #8B4513; /* Màu nâu */ color: white; /* Màu chữ */" class="mua">Thêm vào giỏ hàng</button>

        </div>
       
    </div>
     <div class="rate">
                <div class="vote">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($average_rate >= $i)
                                <div class="star_{{ $i }} ratings_stars ratings_hover"><input value="{{ $i }}" type="hidden"></div>
                            @else
                                <div class="star_{{ $i }} ratings_stars"><input value="{{ $i }}" type="hidden"></div>
                            @endif
                        @endfor
                        <span class="rate-np">{{ round($average_rate, 1) }}</span>
                </div> 
            </div>
    <div class="response-area">
                        
                        <ul class="media-list">
                             @foreach($comments as $comment)
                                @if($comment->level==0)
                            <li class="media">
                                
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="images/blog/man-two.jpg" alt="">
                                </a>
                                <div class="media-body">
                                    <ul class="sinlge-post-meta">
                                        <li style="display: inline-block; margin-right: 10px;"><i class="fa fa-user"></i>{{$comment->name}}</li>
                                        <li style="display: inline-block; margin-right: 10px;"><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                        <li style="display: inline-block; margin-right: 10px;"><i class="fa fa-calendar"></i>{{$comment->created_at}}</li>
                                    </ul>
                                    <p>{{$comment->cmt}}</p>
                                    <a id="{{$comment->id}}" style="background-color: #8B4513; color: white;" class="btn btn-primary cmt" href="#"><i class="fa fa-reply "></i>Replay</a>

                                </div>
                            </li>
                            @endif
                            @foreach($comments as $value)
                                @if($value->level == $comment->id) 
                            <li style="margin-left: 50px;" class="media second-media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="images/blog/man-three.jpg" alt="">
                                </a>
                                <div class="media-body">
                                    <ul style="display: inline-block; margin-right: 10px;" class="sinlge-post-meta">
                                        <li style="display: inline-block; margin-right: 10px;"><i class="fa fa-user"></i>{{$value->name}}</li>
                                        <li style="display: inline-block; margin-right: 10px;"><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                        <li style="display: inline-block; margin-right: 10px;"><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                                    </ul>
                                    <p>{{$value->cmt}}</p>
                                    <a id="{{$value->id}}"  style=" background-color: #8B4513; /* Màu nâu */ color: white; /* Màu chữ */" class="btn btn-primary"  class="btn btn-primary cmt" ><i class="fa fa-reply "></i>Replay</a>
                                </div>
                            </li>
                            @endif

                            
                              @endforeach
                            @endforeach
                                                        
                        </ul>                   
                    </div>
     <!-- repcmt                        -->
       <form method="post" action="{{ url('/product/cmt') }}">
                         @if(session('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                {{session('success')}}
                            </div>
                        @endif
                        @CSRF
                        <div class="replay-box">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h2>Leave a replay</h2>
                                        <input type="hidden" name="id_product" value="{{ $chitietsanpham->id }}">
                                        <div class="text-area">
                                            <div class="blank-arrow">
                                                <label>Your Name</label>
                                            </div>
                                            <span>*</span>
                                            <textarea name="message" rows="11"></textarea>
                                            <p class="err1"></p>
                                             <!-- xử lý ẩn để cho level = 0 -->
                                            <input type="hidden" name="level" class="level" value="0">
                                            <button type="submit" class="btn btn-primary">Post Comment</button>
                                    </div>
                                </div>
                        </div>

                        
                    </form> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
    <script type="text/javascript">
        // xử lý đnáh giá 
   $(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //vote
        $('.ratings_stars').hover(
            // Handles the mouseover
            function() {
                $(this).prevAll().andSelf().addClass('ratings_hover');
                // $(this).nextAll().removeClass('ratings_vote'); 
            },
            function() {
                $(this).prevAll().andSelf().removeClass('ratings_hover');
                // set_votes($(this).parent());
            }
        );

    $('.ratings_stars').click(function(){
        var id_product = "{{$chitietsanpham->id}}";

        // // goi php vao 
        var checkLogin = "{{Auth::check()}}";
        //kiểm tra xem người dùng đã đăng nhập chưa

        if (checkLogin) {
            var rate = $(this).find("input").val();
            alert(rate);
            if ($(this).hasClass('ratings_over')) {
                $('.    ').removeClass('ratings_over');
                $(this).prevAll().andSelf().addClass('ratings_over');
            } else {
                $(this).prevAll().addBack().addClass('ratings_over');
            }

            // phân tích xem rate có gì để tạo bảng đúng?
            // id, rate, id_blog, id_user
            // dùng ajax gửi qua controller và insert table rate
            $.ajax({
                type: 'POST',
                url: '{{url("/product/rate")}}',
                data: {
                    rate: rate,
                    id_product: id_product,
                },
                success: function (data) {
                    console.log(data.success);
                }
            });

        } else {
            alert("Vui lòng đăng nhập để đánh giá.");
        }
    });
      $("form").submit(function () {
           
            var getMess = $("textarea[name='message']").val();
            var checkLogin = "{{Auth::Check()}}";
            
            var id_product = {{ $chitietsanpham->id }};

            var x = 1;
             if (checkLogin) {
               if (getMess == "") {
                $("p.err1").text("vui lòng nhập cmt")
                x = 2;
                return false;
            } else {
                $("p.err1").text("")
            }
            } else {
                alert("vui lòng đăng nhập để cmt");
                x = 2;
            }
           
            if (x === 1) {
                return true;
            }

            return false;

        });
        $(".cmt").click(function(){
            var idCm = $(this).attr('id');
            $("input.level").val(idCm);

            
    
       });
});

    </script>         
            




@endsection