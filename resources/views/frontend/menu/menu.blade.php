@extends('frontend.layouts.app')
@section('content')   
<section class="tm-welcome-section">
  
  <div class="container tm-position-relative">
    <div class="tm-lights-container">
      <img src="frontend/img/light.png" alt="Light" class="light light-1">
      <img src="frontend/img/light.png" alt="Light" class="light light-2">
      <img src="frontend/img/light.png" alt="Light" class="light light-3">  
    </div>        
    <div class="row tm-welcome-content">
      <h2 class="white-text tm-handwriting-font tm-welcome-header"><img src="frontend/img/header-line.png" alt="Line" class="tm-header-line">&nbsp;Our Menus&nbsp;&nbsp;<img src="frontend/img/header-line.png" alt="Line" class="tm-header-line"></h2>
      <h2 class="gold-text tm-welcome-header-2">Cafe House</h2>
      <p class="gray-text tm-welcome-description">Cafe House template is a mobile-friendly responsive <span class="gold-text">Bootstrap v3.3.5 layout</span> by <span class="gold-text">templatemo</span>. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculusnec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
      <a href="#main" class="tm-more-button tm-more-button-welcome">Read More</a>      
    </div>
    <img src="frontend/img/table-set.png" alt="Table Set" class="tm-table-set img-responsive">  
  </div>      
</section>
<div class="tm-main-section light-gray-bg">
  <div class="container" id="main">
    <section class="tm-section row">
      <div class="col-lg-9 col-md-9 col-sm-8">
        <h2 class="tm-section-header gold-text tm-handwriting-font">Variety of Menus</h2>
        <h2>Cafe House</h2>
        <p class="tm-welcome-description">This is free HTML5 website template from <span class="blue-text">template</span><span class="green-text">mo</span>. Fndimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Ettiam sit amet orci eget eros faucibus tincidunt.</p>
        <a href="#" class="tm-more-button margin-top-30">Read More</a> 
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 tm-welcome-img-container">
        <div class="inline-block shadow-img">
          <img src="frontend/img/1.jpg" alt="Image" class="img-circle img-thumbnail">  
        </div>              
      </div>            
    </section>          
    <section class="tm-section row">
      <div class="col-lg-12 tm-section-header-container margin-bottom-30">
        <h2 class="tm-section-header gold-text tm-handwriting-font"><img src="frontend/img/logo.png" alt="Logo" class="tm-site-logo"> Our Menus</h2>
        <div class="tm-hr-container"><hr class="tm-hr"></div>
      </div>
      <div>
            <div class="col-lg-3 col-md-3">
              <div class="tm-position-relative margin-bottom-30"> 
              <form id="coffeeForm">
                 @csrf <!-- Đảm bảo bạn có token CSRF -->             
                <nav class="tm-side-menu">
                  <ul>
                
                    <li><a value="Caffee Americano" href="#">Caffee Americano</a></li>
                    <li><a value="Caffee latte" href="#">Caffee latte</a></li>
                    <li><a value="Coffee milk   " href="#">Coffee milk</a></li>
                    <li><a value="Coffe mocha" href="#">Café mocha</a></li>
                    <li><a value="Cappuccino" href="#">Cappuccino</a></li>
                    <li><a  value="Espresso" href="#">Espresso</a></li>
                    <li><a  value="Iced coffee" href="#">Iced coffee</a></li>
                    <li><a  value="Instant coffee" href="#">Instant coffee</a></li>
                    <li><a  value="Mocha" href="#">Mocha</a></li>
                    <li><a value="black coffee" href="#">black coffee</a></li>
                  </ul>              
                </nav>  
                </form>  
                <img src="frontend/img/vertical-menu-bg.png" alt="Menu bg" class="tm-side-menu-bg">
              </div>  
            </div>            
        <div class="tm-menu-product-content col-lg-9 col-md-9"> <!-- menu content -->
          <!-- menu.blade.php -->

@foreach ($data as $product)
<div class="tm-product">
  
   <img src="{{ asset('admin/upload/product/' . $product->image) }}" data-image="{{ asset('admin/upload/product/' . $product->image) }}" style="width: 100px; height: 100px;">
    <div class="tm-product-text">
        <a href="{{ route('chitietsanpham', ['id' => $product->id]) }}" class="tm-product-title">{{ $product->name }}</a>
       
        <p class="tm-product-description">{{ $product->introduce }}</p>
    </div>
    <div class="tm-product-price">
        <a class="tm-product-price-link tm-handwriting-font add-to-cart"   data-name="{{$product->name}}" data-id="{{$product->id}}" data-price="{{$product->price}}" data-image="{{$product->image}}">
            <span class="tm-product-price-currency">${{ $product->price }}</span>
        </a>

    
    </div>

</div>
@endforeach

        
        </div>
      </div>          
    </section>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
<script type="text/javascript">
    $(document).ready(function() {
        $(".add-to-cart").click(function(event) {
            event.preventDefault();
            // Lấy thông tin product
            var productName = $(this).data('name');
            var productId = $(this).data('id');
            var productPrice = $(this).data('price');
            var productImage = $(this).data('image'); 
            
            
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var checkLogin = "{{Auth::check()}}";
            var data = {
                productId: productId,
                productImage: productImage, 
                productName: productName,
                productPrice: productPrice, 
            };

            if (checkLogin) {
                $.ajax({
                    type: "POST",
                    url: '{{url("/Product/Cart")}}',
                    data: data,
                    success: function(response) {
                        console.log(response);
                    }
                });
            } else {
                alert("Vui lòng đăng nhập để thực hiện mua hàng");
            }
        }); 
         $('nav.tm-side-menu ul li a').click(function(e) {
            e.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

            // Lấy giá trị (loại cà phê) từ thuộc tính value của thẻ a
            var category = $(this).attr('value');
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            // Gửi yêu cầu AJAX đến Laravel với dữ liệu là loại cà phê
            $.ajax({
                type: 'POST', // Phương thức POST
                url: '{{url("/Product/Timkiem")}}', // Route xử lý yêu cầu
                data: { category: category ,}, // Dữ liệu gửi đi
                       success: function(response) {
                         var products = response.products;
                         displayProducts(products);
                 // Xử lý dữ liệu trả về từ Laravel, ví dụ: hiển thị danh sách sản phẩm
                console.log(response);
                        },
                        error: function(xhr, status, error) {
                console.error(error);
                // Hiển thị thông báo lỗi cho người dùng
                alert('Đã xảy ra lỗi khi tìm kiếm sản phẩm.');
                }
            });
        });
        function displayProducts(products) {
    // Xóa sản phẩm cũ
   // Chọn phần tử container sản phẩm
var productContainer = $(".tm-menu-product-content");

// Xóa sản phẩm cũ
productContainer.empty();

// Kiểm tra xem products có được định nghĩa và là một mảng không
if (Array.isArray(products) && products.length > 0) {
    // Duyệt qua mỗi sản phẩm trong danh sách và hiển thị chúng
    products.forEach(function(product) {
       
      var imagePath = $(this).data('image');
        var productHTML =
            '<div class="tm-product">' +
            '    <img src="' + imagePath +  '" style="width: 100px; height: 100px;">' +
            '    <div class="tm-product-text">' +
            '        <a href="/chitietsanpham/' + product.id + '" class="tm-product-title">' + product.name + '</a>' +
            '        <p class="tm-product-description">' + product.introduce + '</p>' +
            '    </div>' +
            '    <div class="tm-product-price">' +
            '        <a class="tm-product-price-link tm-handwriting-font add-to-cart" data-name="' + product.name + '" data-id="' + product.id + '" data-price="' + product.price + '" data-image="' + product.image + '">' +
            '            <span class="tm-product-price-currency">$' + product.price + '</span>' +
            '        </a>' +
            '    </div>' +
            '</div>';

        // Thêm sản phẩm mới vào container
        productContainer.append(productHTML);
    });
} else {
    // Nếu không có sản phẩm nào được trả về, hiển thị thông báo hoặc xử lý khác
    console.error("Error: No products found.");
    // Hiển thị thông báo cho người dùng
    productContainer.append('<p>Không có sản phẩm phù hợp.</p>');
}

}

       
     
    });
</script>
    

@endsection   