<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function login_user()
    {
        // gọi view hiện hị form đăng nhập
        // dd("check login");
        return view('login');
    }
    public function post_login_user(Request $request)
    {

        //$login_data = $request->only('email','password');
        $login_data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        // dd($login_data);
        $check_login = Auth::guard('loginn')->attempt($login_data);

        if (!$check_login) {

            return redirect()->back()->with('error', 'Đăng nhập không thành công vui lòng thử lại');
        }


        // dd(Auth::guard('loginn'));
        // dd(auth('loginn'));
        return redirect()->route('index');
    }
    public function register_user()
    {
        // gọi view hiện hị form đăng ký
        return view('register');
    }
    public function post_register_user(Request $request)
    {

        $rules = [
            'name' => 'required|max:100',
            'email' => 'required|unique:khach_hang|max:100',
            'password' => 'required|min:6|max:12',
            'password-confirm' => 'required|same:password',
        ];

        $message = [
            // 'name.required' => 'Vui lòng nhập họ tên'
        ];

        $request->validate($rules, $message);
        // Lưu thông in vào bảng customer
        // dd($request);
        $add = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        // kiểm tra thêm mới thành công hay không
        // dd("check rg o day");
        if (!$add) {
            return redirect()->back()->with('error', 'Đăng ký không thành công vui lòng thử lại');
        }
        return redirect()->route('userlogin');
    }
    public function logout(Request $request)
    {
        // Auth::logout();
        // $request->session()->invalidate();

        Auth::guard('cus')->logout();


        return view('admin.index');
    }

    //admin
    public function login_admin()
    {
        // gọi view hiện hị form đăng nhập
        // dd("check login");
        return view('admin.login');
    }
    public function post_login_admin(Request $request)
    {

        //$login_data = $request->only('email','password');

        $login_data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // dd($login_data);
        $check_login = Auth::guard('cus')->attempt($login_data);
        if (!$check_login) {

            return redirect()->back()->with('error', 'Đăng nhập không thành công vui lòng thử lại');
        }

        // dd('aaaaa');
        return redirect()->route('admin');
    }
    public function register_admin()
    {
        // gọi view hiện hị form đăng nhập
        // dd("check login");
        return view('admin.register');
    }
    public function post_register_admin(Request $request)
    {
        // validae dữ liệu trên form

        $rules = [
            'name' => 'required|max:100',
            'email' => 'required|unique:user|max:100',
            'password' => 'required|min:6|max:12',
            'password-confirm' => 'required|same:password',
        ];

        $message = [
            // 'name.required' => 'Vui lòng nhập họ tên'
        ];

        $request->validate($rules, $message);
        // Lưu thông in vào bảng customer

        $add = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        // kiểm tra thêm mới thành công hay không
        // dd("check rg o day");
        if (!$add) {
            return redirect()->back()->with('error', 'Đăng ký không thành công vui lòng thử lại');
        }
        return redirect()->route('admin.login');
    }

    public function post_updateinfo(Request $request)
    {

        $user = Auth::guard('loginn')->user();
        // dd($request);
        // Kiểm tra xác thực đăng nhập
        if (!$user) {
            return redirect()->back()->with('error', 'Bạn chưa đăng nhập');
        }

        // Lấy dữ liệu từ request
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('Dien_thoai');
        $address = $request->input('Dia_chi');

        // Cập nhật thông tin người dùng
        $user->name = $name;
        $user->email = $email;
        $user->Dien_thoai = $phone;
        $user->Dia_chi = $address;


        $user->save();
        // dd($user);
        return redirect()->route('info')->with('success', 'Cập nhật thông tin thành công');
    }
}