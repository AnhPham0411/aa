@extends('admin.index')
@section('main')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow 1" style="width: 100%; margin-left: 0px">
            <div class="card-header py-6" style="display: flex;">
                <h6 class="m-0 font-weight-bold text-primary">Bảng ảnh sản phẩm</h6>
                <a href="{{ route('insertimage') }}" class="btn btn-xs btn-primary" style="margin-left:20px ">Thêm
                    mới ảnh chính</a>
                <a href="{{ route('insertimage2') }}" class="btn btn-xs btn-primary" style="margin-left:20px ">Thêm
                    mới ảnh phụ</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ma Hinh Anh</th>
                                <th>Ảnh</th>
                                <th>Tên file</th>
                                <th>Trạng thái</th>
                                <th>Mã SP</th>
                                <th>Setting</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Ma Hinh Anh</th>
                                <th>Ảnh</th>
                                <th>Tên file</th>
                                <th>Trạng thái</th>
                                <th>Mã SP</th>
                                <th>Setting</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($images as $image)
                                <tr>
                                    <th>{{ $image->Ma_HA }}</th>
                                    <td><img src="{{ asset($image->Ten_file_anh) }}" alt="Image" width="150px">
                                    </td>
                                    <td>{{ $image->Ten_file_anh }}</td>
                                    <td>
                                        @if ($image->Trang_thai == 1)
                                            Ảnh chính
                                        @elseif ($image->Trang_thai == 0)
                                            Ảnh phụ
                                        @endif
                                    </td>
                                    <td>{{ $image->Ma_SP }}</td>
                                    <td>

                                        <form action="{{ route('admin-delete-img', $image->Ma_HA) }}" method="POST">
                                            @method('DELETE') @csrf
                                            <button class="btn btn-xs btn-danger">Xóa</button>
                                            <a href="{{ route('insertimage3', $image->Ma_HA) }}"
                                                class="btn btn-xs btn-primary">Sửa</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div style="max-width: 200px;">
                        {{ $images->links() }}
                    </div> --}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
@endsection
