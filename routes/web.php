<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//admin
//->middleware('adminMD')
Route::get('admin/login', [CustomerController::class, 'login_admin'])->name('admin.login');
//Phương thức post để thực hiện login khi submit form
Route::post('admin/login', [CustomerController::class, 'post_login_admin'])->name('admin_post_login');
Route::get('admin/register', [CustomerController::class, 'register_admin'])->name('admin_register');
//Phương thức post để thực hiện register khi submit form
Route::post('admin/register', [CustomerController::class, 'post_register_admin'])->name('admin_post_register');
Route::prefix('admin')->middleware('check.auth')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('/home', function () {
        return view('admin.index');
    })->name('admin');

    // Phương thức get hiển thị form register


    //product
    Route::get('/show-product', [Productcontroller::class, 'returndata'])->name('admin-product');
    //delete
    Route::delete('show-product/{id}', [Productcontroller::class, 'delete'])->where([
        "id"
        => "[0-9]+"
    ])->name('admin-product-delete');
    Route::get('show-product/edit/{id}', [Productcontroller::class, 'edit'])->name('admin-product-edit');
    Route::post('show-product/postedit/{id}', [Productcontroller::class, 'posteidt'])->name('admin-product-postedit');
    Route::put('show-product/{id}', [Productcontroller::class, 'update'])->name('admin-product-update');
    Route::get('/create', [Productcontroller::class, 'create'])->name('admin-product-create');
    Route::post('/postcreate', [Productcontroller::class, 'postcreate'])->name('admin-product-createpost');
    //nhãn hiệu
    Route::get('/show-NH', [Productcontroller::class, 'show_NH'])->name('show-NH');
    Route::get('/create-NH', [Productcontroller::class, 'create_NH'])->name('admin-create-NH');
    Route::post('/postcreate-NH', [Productcontroller::class, 'postcreate_NH'])->name('admin-createpost-NH');
    Route::get('/edit-NH/{Ma_Nh}', [Productcontroller::class, 'edit_NH'])->name('admin-edit-NH');
    Route::post('/postedit-NH/{Ma_NH}', [Productcontroller::class, 'posteidt_NH'])->name('admin-postedit-NH');
    Route::delete('show-NH-delete/{Ma_NH}', [Productcontroller::class, 'delete_NH'])->where([
        "Ma_NH"
        => "[0-9]+"
    ])->name('admin-delete-NH');

    //Loại sản phẩm
    Route::get('/show-LSP', [Productcontroller::class, 'show_LSP'])->name('show-LSP');
    Route::get('/create-LSP', [Productcontroller::class, 'create_LSP'])->name('admin-create-LSP');
    Route::post('/postcreate-LSP', [Productcontroller::class, 'postcreate_LSP'])->name('admin-createpost-LSP');
    Route::get('/edit-LSP/{Ma_LSP}', [Productcontroller::class, 'edit_LSP'])->name('admin-edit-LSP');
    Route::post('/postedit-LSP/{Ma_LSP}', [Productcontroller::class, 'posteidt_LSP'])->name('admin-postedit-LSP');
    Route::delete('show-LSP-delete/{Ma_LSP}', [Productcontroller::class, 'delete_LSP'])->where([
        "Ma_LSP"
        => "[0-9]+"
    ])->name('admin-delete-LSP');

    //Màu sắc
    Route::get('/show-MS', [Productcontroller::class, 'show_MS'])->name('show-MS');
    Route::get('/create-MS', [Productcontroller::class, 'create_MS'])->name('admin-create-MS');
    Route::post('/postcreate-MS', [Productcontroller::class, 'postcreate_MS'])->name('admin-createpost-MS');
    Route::get('/edit-MS/{Ma_MS}', [Productcontroller::class, 'edit_MS'])->name('admin-edit-MS');
    Route::post('/posteditMS/{Ma_MS}', [Productcontroller::class, 'posteidt_MS'])->name('admin-postedit-MS');
    Route::delete('show-LSP-delete/{Ma_MS}', [Productcontroller::class, 'delete_MS'])->where([
        "Ma_MS"
        => "[0-9]+"
    ])->name('admin-delete-MS');


    //kích cỡ
    Route::get('/show-KC', [Productcontroller::class, 'show_KC'])->name('show-KC');
    Route::get('/create-KC', [Productcontroller::class, 'create_KC'])->name('admin-create-KC');
    Route::post('/postcreate-KC', [Productcontroller::class, 'postcreate_KC'])->name('admin-createpost-KC');
    Route::get('/edit-MS/{Ma_KC}', [Productcontroller::class, 'edit_KC'])->name('admin-edit-KC');
    Route::post('/posteditMS/{Ma_KC}', [Productcontroller::class, 'posteidt_KC'])->name('admin-postedit-KC');
    Route::delete('show-LSP-delete/{Ma_KC}', [Productcontroller::class, 'delete_KC'])->where([
        "Ma_KC"
        => "[0-9]+"
    ])->name('admin-delete-KC');


    //image
    //them anh chinh
    Route::get('/add-image-admin', [Productcontroller::class, 'insertimage'])->name('insertimage');
    //them anh phu
    Route::get('/add-image-admin-2', [Productcontroller::class, 'insertimagephu'])->name('insertimage2');
    Route::post('/upload-image', [Productcontroller::class, 'uploadImage'])->name('uploadImage');
    //show abg
    Route::get('/show-image-admin', [Productcontroller::class, 'showImages'])->name('showImages');
    //thêm ảnh chính từ show product
    Route::get('/admin-img-edit/{Ma_SP}', [Productcontroller::class, 'insertimage1'])->name('insertimage1');
    //sua anh trong show image
    Route::get('/admin-img-edit-2/{Ma_HA}', [Productcontroller::class, 'insertimage2'])->name('insertimage3');
    Route::delete('show-image-admin/{Ma_HA}', [Productcontroller::class, 'delete_HA'])->where([
        "Ma_HA"
        => "[0-9]+"
    ])->name('admin-delete-img');

    //order
    Route::get('/order', [Productcontroller::class, 'order'])->name('order');
    Route::get('/duyetdon/{id}', [ProductController::class, 'duyetdon'])->name('duyetdon');
    Route::get('/xoadon/{id}', [ProductController::class, 'xoadon'])->name('xoadon');

    //themsanphammoi o main
    Route::get('/show-sanphammoi', [Productcontroller::class, 'show_sanphammoi'])->name('show-sanphammoi');
    Route::get('/sanphammoi', [Productcontroller::class, 'sanphammoi'])->name('sanphammoi');
    Route::post('/post_sanphammoi', [Productcontroller::class, 'post_sanphammoi'])->name('post_sanphammoi');
    Route::delete('sanphammoi-delete/{id}', [Productcontroller::class, 'sanphammoi-delete'])->where([
        "id"
        => "[0-9]+"
    ])->name('sanphammoi-delete');

    //san pham chi tiet
    Route::get('/show-SPCT', [Productcontroller::class, 'show_SPCT'])->name('show-SPCT');
    Route::get('/create-SPCT', [Productcontroller::class, 'create_SPCT'])->name('admin-create-SPCT');
    Route::post('/postcreate-SPCT', [Productcontroller::class, 'postcreate_SPCT'])->name('admin-createpost-SPCT');
    Route::get('/edit-SPCT/{Ma_SP}', [Productcontroller::class, 'edit_SPCT'])->name('admin-edit-SPCT');
    Route::post('/postedit-SPCT/{Ma_SP}', [Productcontroller::class, 'posteidt_SPCT'])->name('admin-postedit-SPCT');
    Route::delete('show-SPCT-delete/{Ma_SP}', [Productcontroller::class, 'delete_SPCT'])->where([
        "Ma_NH"
        => "[0-9]+"
    ])->name('admin-delete-SPCT');

    //khach hang
    Route::get('/show-KH', [Productcontroller::class, 'show_KH'])->name('show-KH');
    Route::get('/create-KH', [Productcontroller::class, 'create_KH'])->name('admin-create-KH');
    Route::post('/postcreate-KH', [Productcontroller::class, 'postcreate_KH'])->name('admin-createpost-KH');
    Route::get('/edit-KH/{MaKH}', [Productcontroller::class, 'edit_KH'])->name('admin-edit-KH');
    Route::post('/posteditKH/{MaKH}', [Productcontroller::class, 'posteidt_KH'])->name('admin-postedit-KH');
    Route::delete('show-KH-delete/{MaKH}', [Productcontroller::class, 'delete_KH'])->where([
        "Ma_KC"
        => "[0-9]+"
    ])->name('admin-delete-KH');



    //
    Route::post('logout', [CustomerController::class, 'logout'])->name('logout');

});
// Route::group(['prefix' => 'admin']->middleware('check.auth')->group( function () {

// });
// Route::get('admin/product', function () {
//     return view('admin.product');
// })->name('admin-product');
Route::get('/a', function () {
    return view('index');
})->name('index');
Route::get('', [Productcontroller::class, 'home'])->name('home');
Route::get('shop', [Productcontroller::class, 'returndata_home'])->name('shop');
Route::get('single-product/{Ma_SP}', [Productcontroller::class, 'returndata_single'])->name('single');

Route::get('login', [CustomerController::class, 'login_user'])->name('userlogin');
//Phương thức post để thực hiện login khi submit form
Route::post('login', [CustomerController::class, 'post_login_user'])->name('user_post_login');
// Phương thức get hiển thị form reguser
Route::get('register', [CustomerController::class, 'register_user'])->name('userregister');
//Phương thức post để thực hiện register khi submit form
Route::post('register', [CustomerController::class, 'post_register_user'])->name('user_post_register');


//add cart /cart
Route::post('add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::get('update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('view', [CartController::class, 'view'])->name('cart.view');

//order
// Hiển thị form nhập thông tin mua hàng
Route::get('checkout', [OrderController::class, 'checkout'])->name('order.checkout');
// Tạo đơn hàng, lưu thông tin vào CSDL
Route::post('checkout', [OrderController::class, 'post_checkout']);
// khi đặt hàng thành công thì chuyển hướng về daay
Route::get('order-success', [OrderController::class, 'order_success'])->name('order.success');
// danh sách đơn hàng đã giao dịch
Route::get('history', [OrderController::class, 'history'])->name('order.history');
// chi tiết các sản phẩm trong đơn hàng
Route::get('detail/{order}', [OrderController::class, 'detail'])->name('order.detail');
//search
Route::get('/search', function () {
    return view('search');
})->name('search');

Route::get('/post_search', [ProductController::class, 'post_search'])->name('post_search');

//info
Route::get('/info', function () {
    return view('info');
})->name('info');
Route::get('/updateinfo', function () {
    return view('updateinfo');
})->name('updateinfo');
Route::post('/post_updateinfo', [CustomerController::class, 'post_updateinfo'])->name('post_updateinfo');