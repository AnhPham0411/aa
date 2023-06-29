<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use DB;

class OrderController extends Controller
{
    /** Phương thức hiển thị form đặt hàng */
    public function checkout(Cart $cart)
    {
        $customer = auth('loginn')->user();
        // dd($cart);

        return view('checkout', compact('cart', 'customer'));
    }
    /**
     * Phương thức lưu đơn ahngf
     */
    public function post_checkout(Request $req, Cart $cart)
    {
        $data = $req->only('Id_hoa_don', 'Hoten_nguoinhan', 'Diachi_nguoinhan', 'Dienthoai_nguoinhan', 'Ngay_giao_hang', 'Ma_PTVC', 'Ma_PTTT');
        $data['customer_id'] = auth('loginn')->id();
        $data['Ma_KH'] = auth('loginn')->id();
        $data['Diachi_email'] = DB::table('khach_hang')->where('MaKH', $data['Ma_KH'])->select('email')->first()->email;
        $data['Trang_thai'] = 1;
        // dd($data);
        // lưu thông tin vào bagnr orders
        if ($order = Order::create($data)) {
            // dd('loi');
            // duyệt gỏ hàng lưu vào order_details
            foreach ($cart->items as $item) {
                $detail = [
                    'Ma_HD' => $order->Id_hoa_don,
                    'Ma_SPCT' => 1,
                    'Gia_ban' => $item->price,
                    'So_luong_ban' => $item->quantity,
                ];
                // dd($detail);
                OrderDetail::create($detail);
            }
            // hủy giỏ hàng, cho về rỗng
            $cart->clear();
            return redirect()->route('order.success');
        }
        return redirect()->back()->with('no', 'Có lỗi, vui lòng thử lại');
    }
    // phương thức hiển thị danh sách đơn hàng
    public function history()
    {
        $customer = auth('customer')->user();
        return view('order_history', compact('customer'));
    }
    // phương thức hiển thị chi tiết đơn hàng
    public function detail(Order $order)
    {
        $customer = auth('customer')->user();
        return view('order_detail', compact('order', 'customer'));
    }
    public function order_success()
    {
        $order = DB::table('hoa_don')->orderBy('Id_hoa_don', 'desc')->first();
        // dd($order);
        return view('ordersucces', compact('order'));
    }
}