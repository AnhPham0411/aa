@extends('admin.index')
@section('main')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official
            DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow 1" style="width: 100%; margin-left: 0px">
            <div class="card-header py-6" style="display: flex;">
                <h6 class="m-0 font-weight-bold text-primary">Bảng sản phẩm chi tiết</h6>
                <a href="{{ route('admin-create-SPCT') }}" class="btn btn-xs btn-primary" style="margin-left:20px ">Thêm
                    mới sản phẩm chi tiết</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ma_SPCT</th>
                                <th>Kích cỡ</th>
                                <th>Màu Sắc</th>
                                <th>Sản phẩm</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Ma_SPCT</th>
                                <th>Kích cỡ</th>
                                <th>Màu Sắc</th>
                                <th>Sản phẩm</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($sanphamchitiet as $cat)
                                <tr>
                                    <td>{{ $cat->Ma_SPCT }}</td>
                                    <td>{{ $cat->Ma_KC }}</td>
                                    <td>{{ $cat->Ma_MS }}</td>
                                    <td>{{ $cat->Ma_SP }}</td>
                                    <td>
                                        <form action="{{ route('admin-delete-NH', $cat->Ma_SPCT) }}" method="POST">
                                            @method('DELETE') @csrf
                                            <button class="btn btn-xs btn-danger">Xóa</button>
                                            <a href="{{ route('admin-edit-NH', $cat->Ma_SPCT) }}"
                                                class="btn btn-xs btn-primary">Sửa</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div style="max-width: 200px;">
                    {{ $kich_co->links() }}
                </div> --}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
@endsection
