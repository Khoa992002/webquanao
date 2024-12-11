<?php
namespace App\Http\Controllers\frontend;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Rate;
use App\Models\OrderDetail;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class DanhGiaController extends Controller
{
    public function rateProduct(Request $request)
{ 
    if(Auth::check()){
            
            $rate= new Rate();
            $rate->rate = $request->input('rate');
            $rate->id_product = $request->input('id_product');
            $rate->id_user = Auth::id(); 
            $rate->save();
                return response()->json(['success' => 'Rating saved successfully']);
             } else {
                return response()->json(['error' => 'User not authenticated'], 401);
             }
}
    public function CmtChinh(Request $request)
    {
        //lây tất cả dữ liệu
        $data = $request->all();

       
       

        // Create a new Comment instance
        $comment = new Comment();

        // Assign values to the comment object
        $comment->cmt = $request->input('message');
        $comment->id_product = $request->input('id_product');
        $comment->avatar = Auth()->user()->avatar;
        $comment->name = Auth()->user()->name;
        $comment->id_user = Auth::id();
        $comment->level =$request->input('level');
   
        // Save the comment to the database
        $comment->save();
         return redirect()->back()->with('success', __('cmt thanh cong.'));
    }
  
}
