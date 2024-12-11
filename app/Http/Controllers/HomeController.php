<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend/home');
    }
    public function soluonggiohang(){

     $userId = Auth::id();

    // Lấy thông tin giỏ hàng của người dùng hiện tại
    $giohang = OrderDetail::where('order_id', $userId)->first();

    // Nếu không có giỏ hàng, tổng số lượng sẽ là 0
    $totalQuantity = 0;
    foreach($giohang as $item) {
        $totalQuantity += $item->quantity;
    }

      return view('frontend/layouts/header')->with('totalQuantity', $totalQuantity);
                         

    }
}
