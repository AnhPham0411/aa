<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\San_pham;
use App\Models\Image;
use App\Helper\Cart;
use Illuminate\Support\Facades\DB;
use Session;

class CartController extends Controller
{
    public function add(Request $request, San_pham $product, Cart $cart, Image $img, $id)
    {
        $mausac = $request->Ma_MS;
        $mausac1 = DB::table('Mau_sac')
            ->where('Ma_MS', $mausac)->select('Ten_MS')->first();
        $kichco = $request->Ma_KC;
        $kichco1 = DB::table('kich_co')
            ->where('Ma_KC', $kichco)->select('Ten_KC')->first();
        // dd($mausac1, $kichco1);
        $product = San_pham::find($id);
        $img = Image::where('Ma_SP', $id)->where('Trang_thai', 1)->first();
        // dd($img);
        // dd($product);
        $quantity = request('quantity', 1);
        $quantity = $quantity > 0 ? $quantity : 1;
        // gọi phương thức add và truyền tham số tương ứng
        $cart->add($product, $quantity, $img, $mausac1, $kichco1);
        // Chuyển hướng qua danh sách giỏ hàng
        // dd($product);

        $product = San_pham::find($id);
        return redirect()->route('cart.view');
        // return view('index', compact('cart'));

    }
    public function delete($id, Cart $cart)
    {
        // gọi phương thức delete và truyền tham số tương ứng
        $cart->delete($id);
        // Chuyển hướng qua danh sách giỏ hàng
        return redirect()->route('cart.view');
    }
    public function update($id, Cart $cart)
    {
        // gọi phương thức update và truyền tham số tương ứng
        $quantity = request('quantity', 1);
        $quantity = $quantity > 0 ? $quantity : 1;
        $cart->update($id, $quantity);
        // Chuyển hướng qua danh sách giỏ hàng
        return redirect()->route('cart.view');
    }
    public function clear(Cart $cart)
    {
        // gọi phương thức clear
        $cart->clear();
        // Chuyển hướng qua danh sách giỏ hàng
        return redirect()->route('cart.view');
    }
    public function view(Cart $cart)
    {
        // dd($cart);
        // Truyền dữ liệu qua view 'cart-view
        return view('cart-view', compact('cart'));
    }
}