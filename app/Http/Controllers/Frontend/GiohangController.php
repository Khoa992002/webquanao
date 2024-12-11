<?php
namespace App\Http\Controllers\frontend;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class GiohangController extends Controller
{
     public function ThemSanPham(Request $request)
    { 
        
       // Lấy ID người dùng hiện tại nếu đã đăng nhập
    $userId = Auth::id();

    // Lấy thông tin giỏ hàng của người dùng hiện tại
    $giohang = OrderDetail::where('product_id', $request->input('productId'))
                          ->where('order_id', $userId)
                          ->first();


    // Tạo mới đối tượng nếu sản phẩm chưa tồn tại trong giỏ hàng
    if (!$giohang) {
        $giohang = new OrderDetail();
        $giohang->order_id = $userId;
        $giohang->image = $request->input('productImage');
        $giohang->price = $request->input('productPrice');
        $giohang->name = $request->input('productName');
        $giohang->quantity = 1;
        $giohang->product_id = $request->input('productId');

        $giohang->save();
    } else {
        // Tăng số lượng nếu sản phẩm đã tồn tại trong giỏ hàng
        $giohang->quantity++;
        
    }
     // Tính toán và cập nhật giá trị cho cột total_price
    //$giohang->total_price = $giohang->quantity * $giohang->price;

    // Lưu giỏ hàng
    $giohang->save();
    }

      public function GioHang()
    {
        if (Auth::check()) {
        // Lấy ID người dùng hiện tại nếu đã đăng nhập
        $userId = Auth::id();

        // Lấy thông tin giỏ hàng của người dùng hiện tại
        $cart2 = session()->get('cart', []);
        $StotalPrice = OrderDetail::where('order_id', $userId)->sum('total_price');
        
      
        $cart = OrderDetail::where('order_id', $userId)->get();

        // Trả về view hiển thị giỏ hàng với dữ liệu
        return view('frontend.giohang.giohang', compact('cart','cart2','StotalPrice'));
    } else {
        // Nếu người dùng chưa đăng nhập, có thể chuyển hướng hoặc hiển thị thông báo
        return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để xem giỏ hàng.');
    }
       
    }
}
