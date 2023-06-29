@extends('admin.index')
@section('main')
    <div class="container-fluid">

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
        <!-- Page Heading -->
        {{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow 1" style="width: 100%; margin-left: 0px">
            <div class="card-header py-6" style="display: flex;">
                <h6 class="m-0 font-weight-bold text-primary">Bảng sản phẩm (hiện đang có @php
                    echo count($sanpham);
                @endphp sản phẩm)
                </h6>
                <a href="{{ route('admin-product-create') }}" class="btn btn-xs btn-primary" style="margin-left:20px ">them
                    moi</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="mytable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ma_SP</th>
                                <th>Ten_SP</th>
                                {{-- <th>Mo_ta</th>
                                <th>Thong_tin</th> --}}
                                <th>Image</th>
                                <th>Gia_nhap</th>
                                <th>Gia_cu</th>
                                <th>Gia_moi</th>
                                {{-- <th>Luot_xem</th> --}}
                                <th>Ngay_cap_nhat</th>
                                {{-- <th>Trang_thai</th> --}}
                                <th>Loai_san_pham</th>
                                <th>Nhan_hieu</th>
                                <th>Setting</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Ma_SP</th>
                                <th>Ten_SP</th>
                                {{-- <th>Mo_ta</th>
                                <th>Thong_tin</th> --}}
                                <th>Image</th>
                                <th>Gia_nhap</th>
                                <th>Gia_cu</th>
                                <th>Gia_moi</th>
                                {{-- <th>Luot_xem</th> --}}
                                <th>Ngay_cap_nhat</th>
                                {{-- <th>Trang_thai</th> --}}
                                <th>Loai_san_pham</th>
                                <th>Nhan_hieu</th>
                                <th>Setting</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($sanpham as $cat)
                                <tr>
                                    <td>{{ $cat->Ma_SP }}</td>
                                    <td>{{ $cat->Ten_sp }}</td>
                                    {{-- <td>{{ $cat->Mo_ta }}</td>
                                    <td>{{ $cat->Thong_tin }}</td> --}}
                                    <td><img src="{{ $cat->Hinh_anh }}" alt="" width="100px"></td>
                                    <td>{{ $cat->Gia_nhap }}</td>
                                    <td>{{ $cat->Gia_cu }}</td>
                                    <td>{{ $cat->Gia_moi }}</td>
                                    {{-- <td>{{ $cat->Luot_xem }}</td> --}}
                                    <td>{{ $cat->Ngay_cap_nhat }}</td>
                                    {{-- <td>{{ $cat->Trang_thai }}</td> --}}
                                    <td>{{ $cat->Ten_loai_san_pham }}</td>
                                    <td>{{ $cat->Ten_nhan_hieu }}</td>
                                    <td>
                                        <form action="{{ route('admin-product-delete', $cat->Ma_SP) }}" method="POST">
                                            @method('DELETE') @csrf
                                            <button class="btn btn-xs btn-danger">Xóa</button>
                                            <a href="{{ route('admin-product-edit', $cat->Ma_SP) }}"
                                                class="btn btn-xs btn-primary">Sửa</a>
                                            @if ($cat->Hinh_anh == null)
                                                <a href="{{ route('insertimage1', $cat->Ma_SP) }}"
                                                    class="btn btn-xs btn-primary">Thêm ảnh chính</a>
                                            @endif

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="pagination">
                        {{ $sanpham->links() }}
                    </div> --}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <script>
        $(document).ready(function() {
            $("#mytable #checkall").click(function() {
                if ($("#mytable #checkall").is(':checked')) {
                    $("#mytable input[type=checkbox]").each(function() {
                        $(this).prop("checked", true);
                    });

                } else {
                    $("#mytable input[type=checkbox]").each(function() {
                        $(this).prop("checked", false);
                    });
                }
            });

            $("[data-toggle=tooltip]").tooltip();
        });
    </script>
@endsection
