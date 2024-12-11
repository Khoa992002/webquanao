<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
    use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\MenuController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Frontend\GiohangController;
use App\Http\Controllers\Frontend\DanhGiaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('menu', [MenuController::class, 'index'])->name('menu');

Route::get('member', [MemberController::class, 'GetLogin']);
Route::post('member', [MemberController::class, 'PostLogin']);
Route::get('member/logout', [MemberController::class, 'Logout']);
Route::get('dangkytaikhoan', [MemberController::class, 'GetRegister']);
Route::post('dangkytaikhoan/new', [MemberController::class, 'PostRegister']);
//xử lý trang cá nhân
Route::get('/trangcanhan', [MemberController::class, 'LenTrangCaNhan']);
Route::post('/capnhattrangcanhan', [MemberController::class, 'SuaTrangCaNhan']);

//xử lý chi tiết sản phẩm
Route::get('/chitietsanpham/{id}', [MenuController::class, 'ChiTietSanPham'])->name('chitietsanpham');

//xu lý tiềm kiêm sản phẩm bằng tab
Route::post('/Product/Timkiem', [MenuController::class, 'TiemKiemSanPhamBangTab']);

//xử lý mua hàng
Route::post('/Product/Cart', [GiohangController::class, 'ThemSanPham']);

//xử lý đánh giá
Route::post('/product/rate', [DanhGiaController::class, 'rateProduct'])->name('product.rate');
Route::post('/product/cmt', [DanhGiaController::class, 'CmtChinh'])->name('product.cmt');
//xử lý giỏ hàng
Route::get('giohang', [GiohangController::class, 'GioHang']);


Auth::routes();

//admin
Route::get('/admin/dashboard',[DashboardController::class, 'index']);
//quan li san phâm admin
Route::get('admin/product', [ProductController::class, 'index'])->name('admin.product');
Route::get('admin/product/addproduct', [ProductController::class, 'ThemSanPham'])->name('product.addproduct');
Route::post('/add/newproduct', [ProductController::class, 'ThemSanPhamMoi'])->name('newproduct');
Route::get('/edit/{id}', [ProductController::class, 'SuaSanPham'])->name('edit');   
Route::post('/edit/newproduct/{id}', [ProductController::class, 'SuaSanPham2'])->name('editproduct');

