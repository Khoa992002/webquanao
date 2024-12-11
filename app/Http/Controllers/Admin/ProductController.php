<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    { 
        $data = Product::paginate(5);
        return view('admin.product.product',compact('data'));
    } 
    public function ThemSanPham()
    { 
        return view('admin.product.addproduct');
    } 
    public function ThemSanPhamMoi(Request $request)
    { 
        $data=$request->all();
        

        $product = new Product();
        $product->name = $request->input('name');
        $product->classify = $request->input('classify');
        $product->description= $request->input('description');
        $product->introduce= $request->input('introduce');
        $image = $request->file('image');
        $product->price =$request->input('price');
        //lưu ảnh vào db
        if ($image) {
            $imageName = $image->getClientOriginalName();
            $image->move('admin/upload/product', $imageName);
            $product->image = $imageName;
        }
          $product->save();

        return redirect()->back()->with('success', __('Update profile success.'));

    }
    public function SuaSanPham($id){

        if (!empty($id)) {
            // Get data by ID from the database
            $data = Product::where('id', $id)->first();
            return view('admin.product.edit', compact('data'));
        } else {
            return view('country')->with('success', __('Người dùng không tồn tại'));
        }

    } 
     public function SuaSanPham2(Request $request,$id)
     {
       $data = $request->all();
       $product = Product::find($id);

        // Get data from request
        $product->name = $request->input('title');
        $product->description = $request->input('description');
         $product->price = $request->input('price');
          $product->introduce = $request->input('introduce');
           $product->image = $request->input('image');

        // Save new image to the database
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move('admin/upload/product', $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->back()->with('success', __('Update profile success.'));
     }
}
