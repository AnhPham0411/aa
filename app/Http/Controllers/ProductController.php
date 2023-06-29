<?php
namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class Productcontroller extends Controller
{
    public function returndata()
    {

        $sanpham = DB::table('San_pham')
            ->join('Nhan_hieu', 'Nhan_hieu.Ma_NH', '=', 'San_pham.Ma_NH')
            ->join('Loai_san_pham', 'Loai_san_pham.Ma_LSP', '=', 'San_pham.Ma_LSP')
            ->leftJoin('Hinh_anh', function ($join) {
                $join->on('Hinh_anh.Ma_SP', '=', 'San_pham.Ma_SP')
                    ->where('Hinh_anh.Trang_thai', '=', 1);
            })
            ->select(
                'San_pham.*',
                'Nhan_hieu.Ten_nhan_hieu as Ten_nhan_hieu',
                'Loai_san_pham.Ten_loai as Ten_loai_san_pham',
                'Hinh_anh.Ten_file_anh as Hinh_anh'
            )
            ->get();
        // ->paginate(10);
        // $sanpham->appends(request()->query());

        return view('admin.show-product', compact('sanpham'));
    }
    public function posteidt($Ma_SP, Request $request)
    {

        DB::table('San_pham')->where('Ma_SP', $Ma_SP)->update($request->only('Ten_SP', 'Mo_ta', 'Thong_tin', 'Gia_nhap', 'Gia_cu', 'Gia_Moi', 'Ma_LSP', 'Ma_NH'));
        return redirect()->route('admin-product'); // chuyển hướng về danh sách
    }
    public function delete($id)
    {
        DB::table('San_pham')->where('Ma_SP', $id)->delete(); // return true, false
        return redirect()->route('admin-product'); // chuyển hướng về danh sách
    }
    public function edit($id)
    {
        $loai_san_pham = DB::table('Loai_san_pham')->get();
        $Nhan_hieu = DB::table('Nhan_hieu')->get();
        $Ma_SP = $id;
        /** SELECT * FROM categories WHERE id = $id */
        $cat = DB::table('San_pham')->where('Ma_SP', $Ma_SP)->first();
        /** Gửi dữ liệu qua form edit.blade.php*/
        // dd($cat);
        return view('admin.edit-product-admin', compact('cat'), ['loai_san_pham' => $loai_san_pham, 'Nhan_hieu' => $Nhan_hieu]);
    }
    public function update($Ma_SP, Request $request)
    {
        $rules = [
            'name' => 'required|unique:San_pham'
        ];
        $messages = [
            'name.required' => 'Tên danh mục không để trống',
            'name.unique' => 'Tên danh mục đã được sử dụng',
        ];
        $request->validate($rules, $messages);

        DB::table('San_pham')->where('Ma_SP', $Ma_SP)->update($request->only('Ten_SP', 'Mo_ta', 'Thong_tin', 'Gia_nhap', 'Gia_cu', 'Gia_Moi', 'Ma_LSP', 'Ma_NH'));
        return redirect()->route('admin-product'); // chuyển hướng về danh sách
    }
    public function create()
    {
        $loai_san_pham = DB::table('Loai_san_pham')->get();
        $Nhan_hieu = DB::table('Nhan_hieu')->get();
        return view('admin.create-product-admin', ['loai_san_pham' => $loai_san_pham, 'Nhan_hieu' => $Nhan_hieu]);
    }
    public function postcreate(Request $request)
    {
        $now = Carbon::now()->toDateString();

        $data = [
            'Ngay_cap_nhat' => $now,
        ];
        //chuyển thành cùng 1 mảng
        $data = array_merge($data, $request->only('Ten_SP', 'Mo_ta', 'Thong_tin', 'Gia_nhap', 'Gia_cu', 'Gia_moi', 'Ma_LSP', 'Ma_NH', 'Trang_thai'));

        DB::table('San_pham')->insert($data);

        return redirect()->route('admin-product');
    }
    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    //     $products = DB::table('hotels')->where('name', 'LIKE', "%$query%")
    //         ->get();
    //     return view('customer.search', compact('products'));
    // }

    //Nhãn hiệu
    public function create_NH()
    {
        return view('admin.create-NH-admin');
    }
    public function postcreate_NH(Request $request)
    {
        // $request->only() lấy dữ liệu từ form giống với $_POST
        //Category::create(); // như lệnh INSERT INTO category
        DB::table('Nhan_hieu')->insert($request->only('Ten_nhan_hieu', 'Trang_thai'));
        return redirect()->route('show-NH'); // chuyển hướng về danh sách
    }
    public function show_NH()
    {
        $nhan_hieu = DB::table('Nhan_hieu')
            ->paginate(10);
        return view('admin.show-NH', compact('nhan_hieu'));
    }
    public function delete_NH($Ma_NH)
    {
        DB::table('Nhan_hieu')->where('Ma_NH', $Ma_NH)->delete(); // return true, false
        return redirect()->route('show-NH'); // chuyển hướng về danh sách
    }
    public function edit_NH($Ma_NH)
    {
        /** SELECT * FROM categories WHERE id = $id */
        $cat = DB::table('Nhan_hieu')->where('Ma_NH', $Ma_NH)->first();
        /** Gửi dữ liệu qua form edit.blade.php*/
        return view('admin.edit-NH', compact('cat'));
    }
    public function posteidt_NH($Ma_NH, Request $request)
    {
        $rules = [
            'Ten_nhan_hieu' => 'required|unique:Nhan_hieu'
        ];
        $messages = [
            'Ten_nhan_hieu.required' => 'Tên danh mục không để trống',
            'Ten_nhan_hieu.unique' => 'Tên danh mục đã được sử dụng',
        ];
        $request->validate($rules, $messages);

        DB::table('Nhan_hieu')->where('Ma_NH', $Ma_NH)->update($request->only('Ten_nhan_hieu', 'Trang_thai'));
        return redirect()->route('show-NH'); // chuyển hướng về danh sách
    }

    //Loại sản phẩm
    public function create_LSP()
    {
        return view('admin.create-LSP-admin');
    }
    public function postcreate_LSP(Request $request)
    {
        // $request->only() lấy dữ liệu từ form giống với $_POST
        //Category::create(); // như lệnh INSERT INTO category
        DB::table('Loai_san_pham')->insert($request->only('Ten_loai', 'Trang_thai'));
        return redirect()->route('show-LSP'); // chuyển hướng về danh sách
    }
    public function show_LSP()
    {
        $Loai_san_pham = DB::table('Loai_san_pham')
            ->paginate(10);
        return view('admin.show-LSP', compact('Loai_san_pham'));
    }
    public function delete_LSP($Ma_LSP)
    {
        DB::table('Loai_san_pham')->where('Ma_LSP', $Ma_LSP)->delete(); // return true, false
        return redirect()->route('show-LSP'); // chuyển hướng về danh sách
    }
    public function edit_LSP($Ma_LSP)
    {
        /** SELECT * FROM categories WHERE id = $id */
        $cat = DB::table('Loai_san_pham')->where('Ma_LSP', $Ma_LSP)->first();
        /** Gửi dữ liệu qua form edit.blade.php*/
        return view('admin.edit-LSP', compact('cat'));
    }
    public function posteidt_LSP($Ma_LSP, Request $request)
    {
        $rules = [
            'Ten_loai' => 'required|unique:Loai_san_pham'
        ];
        $messages = [
            'Ten_loai.required' => 'Tên danh mục không để trống',
            'Ten_loai.unique' => 'Tên danh mục đã được sử dụng',
        ];
        $request->validate($rules, $messages);

        DB::table('Loai_san_pham')->where('Ma_LSP', $Ma_LSP)->update($request->only('Ten_loai', 'Trang_thai'));
        return redirect()->route('show-LSP'); // chuyển hướng về danh sách
    }


    //Màu sắc
    public function create_MS()
    {
        return view('admin.create-MS-admin');
    }
    public function postcreate_MS(Request $request)
    {
        // $request->only() lấy dữ liệu từ form giống với $_POST
        //Category::create(); // như lệnh INSERT INTO category
        DB::table('Mau_sac')->insert($request->only('Ten_MS', 'Trang_thai'));
        return redirect()->route('show-MS'); // chuyển hướng về danh sách
    }
    public function show_MS()
    {
        $Mau_sac = DB::table('Mau_sac')
            ->paginate(10);
        return view('admin.show-MS', compact('Mau_sac'));
    }
    public function delete_MS($Ma_MS)
    {
        DB::table('Mau_sac')->where('Ma_MS', $Ma_MS)->delete(); // return true, false
        return redirect()->route('show-MS'); // chuyển hướng về danh sách
    }
    public function edit_MS($Ma_MS)
    {
        /** SELECT * FROM categories WHERE id = $id */
        $cat = DB::table('Mau_sac')->where('Ma_MS', $Ma_MS)->first();
        /** Gửi dữ liệu qua form edit.blade.php*/
        return view('admin.edit-MS', compact('cat'));
    }
    public function posteidt_MS($Ma_MS, Request $request)
    {
        $rules = [
            'Ten_MS' => 'required|unique:Mau_sac'
        ];
        $messages = [
            'Ten_MS.required' => 'Tên danh mục không để trống',
            'Ten_MS.unique' => 'Tên danh mục đã được sử dụng',
        ];
        $request->validate($rules, $messages);

        DB::table('Mau_sac')->where('Ma_MS', $Ma_MS)->update($request->only('Ten_MS', 'Trang_thai'));
        return redirect()->route('show-MS'); // chuyển hướng về danh sách
    }

    //kích cỡ
    public function create_KC()
    {
        return view('admin.create-KC-admin');
    }
    public function postcreate_KC(Request $request)
    {
        // $request->only() lấy dữ liệu từ form giống với $_POST
        //Category::create(); // như lệnh INSERT INTO category
        DB::table('kich_co')->insert($request->only('Ten_KC', 'Trang_thai'));
        return redirect()->route('show-KC'); // chuyển hướng về danh sách
    }
    public function show_KC()
    {
        $kich_co = DB::table('kich_co')
            ->get();
        return view('admin.show-KC', compact('kich_co'));
    }
    public function delete_KC($Ma_KC)
    {
        DB::table('kich_co')->where('Ma_KC', $Ma_KC)->delete(); // return true, false
        return redirect()->route('show-KC'); // chuyển hướng về danh sách
    }
    public function edit_KC($Ma_KC)
    {
        /** SELECT * FROM categories WHERE id = $id */
        $cat = DB::table('kich_co')->where('Ma_KC', $Ma_KC)->first();
        /** Gửi dữ liệu qua form edit.blade.php*/
        return view('admin.edit-KC', compact('cat'));
    }
    public function posteidt_KC($Ma_KC, Request $request)
    {
        $rules = [
            'Ten_KC' => 'required|unique:kich_co'
        ];
        $messages = [
            'Ten_KC.required' => 'Tên danh mục không để trống',
            'Ten_KC.unique' => 'Tên danh mục đã được sử dụng',
        ];
        $request->validate($rules, $messages);

        DB::table('kich_co')->where('Ma_KC', $Ma_KC)->update($request->only('Ten_KC', 'Trang_thai'));
        return redirect()->route('show-KC'); // chuyển hướng về danh sách
    }


    //image
    public function insertImage()
    {
        $img = DB::table('San_pham')
            ->join('Hinh_anh', 'Hinh_anh.Ma_SP', '=', 'San_pham.Ma_SP')
            ->select(
                'San_pham.Ma_SP',
                'San_pham.Ten_sp',
                'Hinh_anh.Trang_thai as Trang_thai'
            )->get();
        // dd($img);

        return view('admin.add-image-admin', compact('img'));
    }
    public function insertImagephu()
    {
        $img = DB::table('San_pham')
            ->get();
        return view('admin.add-image-admin-phu', compact('img'));
    }
    public function showImages()
    {
        // Lấy danh sách ảnh từ cơ sở dữ liệu
        $images = Image::get();
        // dd($images);


        return view('admin.show-image-admin', compact('images'));
    }
    public function uploadImage(Request $request)
    {
        // Kiểm tra xem có tệp tin được gửi trong yêu cầu hay không
        $rules = ['images' => 'required|mimes:jpg,jpeg,png,gif'];
        $mesages = [
            'images.required' => 'Vui lòng chọn một file',
            'images.mimes' => 'Định dạng file cho phép là: jpg, png, gif',
        ];

        $request->validate($rules, $mesages);

        $file_name = $request->images->getClientOriginalName();
        $request->images->move(public_path('images'), $file_name);
        $path = "/images/" . $file_name;
        $image = new Image();
        $image->Ten_file_anh = $path;
        $image->Trang_thai = $request->input('Trang_thai');
        $image->Ma_SP = $request->input('Ma_SP');
        $image->save();
        return redirect()->route('showImages');
    }
    public function insertImage1($Ma_SP)
    {
        /** SELECT * FROM categories WHERE id = $id */
        $cat = DB::table('San_pham')->where('Ma_SP', $Ma_SP)->first();
        $cat1 = DB::table('Hinh_anh')->where('Ma_SP', $Ma_SP)->first();

        /** Gửi dữ liệu qua form edit.blade.php*/
        return view('admin.admin-img-edit', compact('cat', 'cat1'));
    }
    public function insertImage2($Ma_HA)
    {
        /** SELECT * FROM categories WHERE id = $id */
        $cat1 = DB::table('Hinh_anh')->where('Ma_HA', $Ma_HA)->first();
        $a = $cat1->Ma_SP;
        $pro = DB::table('San_pham')->where('Ma_SP', $a)->first();
        // dd($cat1, $pro);
        /** Gửi dữ liệu qua form edit.blade.php*/
        return view('admin.add-image-admin-2', compact('cat1', 'pro'));
    }
    public function delete_HA($Ma_HA)
    {
        DB::table('Hinh_anh')->where('Ma_HA', $Ma_HA)->delete(); // return true, false
        return redirect()->route('showImages'); // chuyển hướng về danh sách
    }


    //home
    public function returndata_home(Request $request)
    {

        $sanpham = DB::table('San_pham')
            ->join('Nhan_hieu', 'Nhan_hieu.Ma_NH', '=', 'San_pham.Ma_NH')
            ->join('Loai_san_pham', 'Loai_san_pham.Ma_LSP', '=', 'San_pham.Ma_LSP')
            ->join('Hinh_anh', function ($join) {
                $join->on('Hinh_anh.Ma_SP', '=', 'San_pham.Ma_SP')
                    ->where('Hinh_anh.Trang_thai', '=', 1);
            })
            ->select(
                'San_pham.*',
                'Nhan_hieu.Ten_nhan_hieu as Ten_nhan_hieu',
                'Loai_san_pham.Ten_loai as Ten_loai_san_pham',
                'Hinh_anh.Ten_file_anh as Hinh_anh'
            )
            ->get();
        // ->paginate(10);
        $page = $request->input('page');
        // dd($page);
        // dd($sanpham);
        return view('shop', compact('sanpham', 'page'));

    }
    public function returndata_single($Ma_SP)
    {

        $sanpham = DB::table('San_pham')
            ->join('Nhan_hieu', 'Nhan_hieu.Ma_NH', '=', 'San_pham.Ma_NH')
            ->join('Loai_san_pham', 'Loai_san_pham.Ma_LSP', '=', 'San_pham.Ma_LSP')

            ->where('San_pham.Ma_SP', $Ma_SP)
            ->select(
                'San_pham.*',
                'Nhan_hieu.Ten_nhan_hieu as Ten_nhan_hieu',
                'Loai_san_pham.Ten_loai as Ten_loai_san_pham',

            )

            ->first();
        $maloai = DB::table('San_pham')
            ->where('Ma_SP', $Ma_SP)
            ->value('Ma_LSP');
        $mausac = DB::table('Mau_sac')
            ->get();
        $kichco = DB::table('kich_co')
            ->where('Ma_LSP', $maloai)->get();
        $img = DB::table('Hinh_anh')
            ->where('Hinh_anh.Ma_SP', $Ma_SP)->get();
        // ->paginate(10);
        // dd($sanpham, $img, $kichco, $mausac);
        // dd($img);
        return view('single-product', compact('sanpham', 'img', 'mausac', 'kichco'));

    }

    public function home()
    {
        // $sanphammoi = DB::table('San_pham')
        //     ->join('Nhan_hieu', 'Nhan_hieu.Ma_NH', '=', 'San_pham.Ma_NH')
        //     ->join('Loai_san_pham', 'Loai_san_pham.Ma_LSP', '=', 'San_pham.Ma_LSP')
        //     ->join('Hinh_anh', function ($join) {
        //         $join->on('Hinh_anh.Ma_SP', '=', 'San_pham.Ma_SP')
        //             ->where('Hinh_anh.Trang_thai', '=', 1);
        //     })
        //     ->select(
        //         'San_pham.*',
        //         'Nhan_hieu.Ten_nhan_hieu as Ten_nhan_hieu',
        //         'Loai_san_pham.Ten_loai as Ten_loai_san_pham',
        //         'Hinh_anh.Ten_file_anh as Hinh_anh'
        //     )->orderBy('Ma_SP', 'desc')->limit(5)->get();
        // dd($sanphammoi);
        $sanphammoi = DB::table('San_pham')
            ->join('Nhan_hieu', 'Nhan_hieu.Ma_NH', '=', 'San_pham.Ma_NH')
            ->join('Loai_san_pham', 'Loai_san_pham.Ma_LSP', '=', 'San_pham.Ma_LSP')
            ->join('San_pham_moi', 'San_pham.Ma_SP', '=', 'San_pham_moi.Ma_sp')
            ->join('Hinh_anh', function ($join) {
                $join->on('Hinh_anh.Ma_SP', '=', 'San_pham.Ma_SP')
                    ->where('Hinh_anh.Trang_thai', '=', 1);
            })
            ->select(
                'San_pham.*',
                'Nhan_hieu.Ten_nhan_hieu as Ten_nhan_hieu',
                'Loai_san_pham.Ten_loai as Ten_loai_san_pham',
                'Hinh_anh.Ten_file_anh as Hinh_anh'
            )->orderBy('Ma_SP', 'desc')->limit(5)->get();
        // dd($sanphammoi);

        return view('home', compact('sanphammoi'));
    }

    //search
    public function post_search(Request $request)
    {
        $keyword = $request->input('keyword');

        $perPage = 12; // Số lượng sản phẩm hiển thị trên mỗi trang
        $page = $request->query('page', 1); // Trang hiện tại, mặc định là 1

        $totalProducts = DB::table('San_pham')
            ->where('Ten_sp', 'like', "%$keyword%")
            ->orWhere('Mo_ta', 'like', "%$keyword%")
            ->count(); // Tổng số sản phẩm

        $totalPages = ceil($totalProducts / $perPage); // Tổng số trang

        $offset = ($page - 1) * $perPage; // Vị trí bắt đầu của kết quả truy vấn

        $sanphamtimkiem = DB::table('San_pham')
            ->join('Nhan_hieu', 'Nhan_hieu.Ma_NH', '=', 'San_pham.Ma_NH')
            ->join('Loai_san_pham', 'Loai_san_pham.Ma_LSP', '=', 'San_pham.Ma_LSP')

            ->join('Hinh_anh', function ($join) {
                $join->on('Hinh_anh.Ma_SP', '=', 'San_pham.Ma_SP')
                    ->where('Hinh_anh.Trang_thai', '=', 1);
            })
            ->select(
                'San_pham.*',
                'Nhan_hieu.Ten_nhan_hieu as Ten_nhan_hieu',
                'Loai_san_pham.Ten_loai as Ten_loai_san_pham',
                'Hinh_anh.Ten_file_anh as Hinh_anh'
            )
            ->where('Ten_sp', 'like', "%$keyword%")
            ->orWhere('Mo_ta', 'like', "%$keyword%")
            ->offset($offset)
            ->limit($perPage)
            ->get();

        return view('research', compact('sanphamtimkiem', 'totalPages', 'page', 'keyword'));
    }

    //order
    public function order()
    {
        $order = DB::table('hoa_don')
            ->join('Ct_hoa_don', 'Ct_hoa_don.Ma_HD', '=', 'hoa_don.Id_hoa_don')

            ->get();
        // dd($order);
        return view('admin.order', compact('order'));
    }

    public function duyetdon($id)
    {
        // dd($id);
        DB::table('hoa_don')
            ->where('Id_hoa_don', $id) // Lọc các bản ghi có Id_hoa_don = $id
            ->update(['Trang_thai' => 0]); // Cập nhật trạng thái thành 1

        return redirect()->route('order');
    }

    public function xoadon($id)
    {
        $Id_hoa_don = $id;

        DB::table('hoa_don')->where('Id_hoa_don', $Id_hoa_don)->delete();

        return redirect()->back()->with('success', 'Xóa đơn hàng thành công');
    }


    //sanpham moi
    public function show_sanphammoi()
    {
        $sanpham = DB::table('San_pham')
            ->join('San_pham_moi', 'San_pham_moi.Ma_SP', '=', 'San_pham.Ma_SP')
            ->join('Hinh_anh', function ($join) {
                $join->on('Hinh_anh.Ma_SP', '=', 'San_pham.Ma_SP')
                    ->where('Hinh_anh.Trang_thai', '=', 1);
            })
            ->select(
                'San_pham.*',
                'San_pham_moi.id',
                'Hinh_anh.Ten_file_anh as Hinh_anh'
            )
            ->get();
        return view('admin.show-sanphammoi', compact('sanpham'));
    }
    public function sanphammoi()
    {
        $sanpham = DB::table('San_pham')
            ->get();
        return view('admin.create-sanphammoi-admin', compact('sanpham'));
    }
    public function post_sanphammoi(Request $request)
    {
        // $request->only() lấy dữ liệu từ form giống với $_POST
        //Category::create(); // như lệnh INSERT INTO category
        DB::table('San_pham_moi')->insert($request->only('Ma_SP'));
        return redirect()->route('show-sanphammoi'); // chuyển hướng về danh sách
    }

    //sanpham chi tiet

    public function create_SPCT()
    {
        $sanpham = DB::table('San_pham')->get();
        $mausac = DB::table('Mau_sac')->get();
        $kichco = DB::table('kich_co')->get();
        return view('admin.create-SPCT-admin', compact('sanpham', 'mausac', 'kichco'));
    }
    public function postcreate_SPCT(Request $request)
    {
        // $request->only() lấy dữ liệu từ form giống với $_POST
        //Category::create(); // như lệnh INSERT INTO category
        DB::table('kich_co')->insert($request->only('Ten_KC', 'Trang_thai'));
        return redirect()->route('show-SPCT'); // chuyển hướng về danh sách
    }
    public function show_SPCT()
    {
        $sanphamchitiet = DB::table('San_pham_ct')
            ->get();
        return view('admin.show-SPCT', compact('sanphamchitiet'));
    }
    public function delete_SPCT($Ma_KC)
    {
        DB::table('kich_co')->where('Ma_KC', $Ma_KC)->delete(); // return true, false
        return redirect()->route('show-SPCT'); // chuyển hướng về danh sách
    }
    public function edit_SPCT($Ma_KC)
    {
        /** SELECT * FROM categories WHERE id = $id */
        $cat = DB::table('kich_co')->where('Ma_KC', $Ma_KC)->first();
        /** Gửi dữ liệu qua form edit.blade.php*/
        return view('admin.edit-SPCT', compact('cat'));
    }
    public function posteidt_SPCT($Ma_KC, Request $request)
    {
        $rules = [
            'Ten_KC' => 'required|unique:kich_co'
        ];
        $messages = [
            'Ten_KC.required' => 'Tên danh mục không để trống',
            'Ten_KC.unique' => 'Tên danh mục đã được sử dụng',
        ];
        $request->validate($rules, $messages);

        DB::table('kich_co')->where('Ma_KC', $Ma_KC)->update($request->only('Ten_KC', 'Trang_thai'));
        return redirect()->route('show-SPCT'); // chuyển hướng về danh sách
    }


    //khach hang
    public function create_KH()
    {
        return view('admin.create-KH-admin');
    }
    public function postcreate_KH(Request $request)
    {
        // $request->only() lấy dữ liệu từ form giống với $_POST
        //Category::create(); // như lệnh INSERT INTO category
        DB::table('kich_co')->insert($request->only('Ten_KH', 'Trang_thai'));
        return redirect()->route('show-KH'); // chuyển hướng về danh sách
    }
    public function show_KH()
    {
        $khachhang = DB::table('khach_hang')
            ->get();
        return view('admin.show-KH', compact('khachhang'));
    }
    public function delete_KH($Ma_KH)
    {
        DB::table('khach_hang')->where('MaKH', $Ma_KH)->delete(); // return true, false
        return redirect()->route('show-KH'); // chuyển hướng về danh sách
    }
    public function edit_KH($Ma_KH)
    {
        /** SELECT * FROM categories WHERE id = $id */
        $cat = DB::table('kich_co')->where('Ma_KH', $Ma_KH)->first();
        /** Gửi dữ liệu qua form edit.blade.php*/
        return view('admin.edit-KH', compact('cat'));
    }
    public function posteidt_KH($Ma_KC, Request $request)
    {
        $rules = [
            'Ten_KH' => 'required|unique:kich_co'
        ];
        $messages = [
            'Ten_KH.required' => 'Tên danh mục không để trống',
            'Ten_KH.unique' => 'Tên danh mục đã được sử dụng',
        ];
        $request->validate($rules, $messages);

        DB::table('kich_co')->where('Ma_KKH', $Ma_KH)->update($request->only('Ten_KC', 'Trang_thai'));
        return redirect()->route('show-KH'); // chuyển hướng về danh sách
    }
}