<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
     public function GetLogin()
    {
        return view('frontend/member/login');
    }

      public function PostLogin(Request $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0
        ];

        $member = false;
        if ($request->remember_me) {
            $member = true;
        }

        if (Auth::attempt($login,$member)) {
             return redirect('/home');
        } else {
            return redirect()->back()->with('success', __('email hoặc password không chính xác'));
        }
    }

     public function GetRegister()
    {
        return view('frontend/member/register');
    }
    public function PostRegister(Request $request)
    {
         $data=$request->all();
         $user = new User();
         $user->name=$request->name;
         $user->email=$request->email;
         $user->password= bcrypt($request->password);
         $user->phone = $request->phone;
         $user->address= $request->address;
         $user->level = 0;

        if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        $imageName = $avatar->getClientOriginalName();
        $avatar->move('frontend/avatar', $imageName);
        $user->avatar = $imageName;
    }

         

        $user->save();

        return redirect()->back()->with('success', __('đăng ký thành công.'));



    }
     public function Logout(Request $request){

    Auth::logout();
    return redirect()->back()->with('success', __('đăng xuất thành công')); // Điều hướng về trang chủ hoặc trang nào đó sau khi đăng xuất

     }
     public function LenTrangCaNhan(Request $request)
   {
        
        $user = Auth::user();
        $member = null; // Khai báo biến $member ở ngoài phạm vi của khối if

        if ($user) {
        // Thực hiện truy vấn để lấy thông tin người dùng từ bảng 'users'
         $member = User::find($user->id);
        // Tiếp tục xử lý dữ liệu hoặc hiển thị trang cá nhân của người dùng
        } else {
         with('BẠN CHƯA ĐĂNG NHẬP TÀI KHOẢN NHÉ');
        }

         return view('frontend/member/trangcanhan', compact('member'));


    
   }
     public function SuaTrangCaNhan(Request $request)
     {
          $data = $request->all();

      
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $file = $request->avatar;
      

        // Kiểm tra xem có tệp avatar được tải lên không
        if(!empty($file)){
            unset($data['password']);
            $data['avatar'] = $file->getClientOriginalName();
        }

        
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }else{
            $data['password'] = $user->password;
        }
       
        if ($user->update($data)) {
            if(!empty($file)){
                $file->move('frontend/avatar', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Update profile success.'));
        } else {
            return redirect()->back()->withErrors('Update profile error.');
        }
     }
    }
