<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Comment;

class MenuController extends Controller
{
    public function index()
    {
        $data = Product::orderBy('created_at', 'desc')->get();
        return view('frontend/menu/menu', compact('data'));
    }
    public function ChiTietSanPham($id)
    {
        $chitietsanpham = Product::find($id);
        $average_rate = Rate::where('id_product',$id)->avg('rate');
        $comments = Comment::where('id_product', $id)->get();   
        
        return view('frontend/menu/chitietsanpham',compact('chitietsanpham','average_rate','comments'));
    }
    public function TiemKiemSanPhamBangTab(Request $request)
    {
         $category = $request->input('category');

    // Tìm kiếm sản phẩm theo loại cà phê
        $products = Product::where('classify', $category)->get();

        return response()->json(['products' => $products->toArray()]);
        
    }
  
}
