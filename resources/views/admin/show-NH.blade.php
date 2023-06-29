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
                <h6 class="m-0 font-weight-bold text-primary">Bảng nhãn hiệu</h6>
                <a href="{{ route('admin-create-NH') }}" class="btn btn-xs btn-primary" style="margin-left:20px ">Thêm
                    mới nhãn hiệu</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ma_NH</th>
                                <th>Ten_nhan_hieu</th>
                                <th>Trang_thai</th>
                                <th>Setting</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Ma_NH</th>
                                <th>Ten_nhan_hieu</th>
                                <th>Trang_thai</th>
                                <th>Setting</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($nhan_hieu as $cat)
                                <tr>
                                    <td>{{ $cat->Ma_NH }}</td>
                                    <td>{{ $cat->Ten_nhan_hieu }}</td>
                                    <td>
                                        @if ($cat->Trang_thai == 1)
                                            Hiển thị
                                        @elseif ($cat->Trang_thai == 0)
                                            Ẩn
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin-delete-NH', $cat->Ma_NH) }}" method="POST">
                                            @method('DELETE') @csrf
                                            <button class="btn btn-xs btn-danger">Xóa</button>
                                            <a href="{{ route('admin-edit-NH', $cat->Ma_NH) }}"
                                                class="btn btn-xs btn-primary">Sửa</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="max-width: 200px;">
                        {{ $nhan_hieu->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
@endsection
