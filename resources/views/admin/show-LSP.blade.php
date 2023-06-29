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
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                <a href="{{ route('admin-create-LSP') }}" class="btn btn-xs btn-primary" style="margin-left:20px ">them
                    moi</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ma_NH</th>
                                <th>Ten_loai_san_pham</th>
                                <th>Trang_thai</th>
                                <th>Setting</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Ma_NH</th>
                                <th>Ten_loai_san_pham</th>
                                <th>Trang_thai</th>
                                <th>Setting</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($Loai_san_pham as $cat)
                                <tr>
                                    <td>{{ $cat->Ma_LSP }}</td>
                                    <td>{{ $cat->Ten_loai }}</td>
                                    <td>{{ $cat->Trang_thai }}</td>
                                    <td>
                                        <form action="{{ route('admin-delete-LSP', $cat->Ma_LSP) }}" method="POST">
                                            @method('DELETE') @csrf
                                            <button class="btn btn-xs btn-danger">Xóa</button>
                                            <a href="{{ route('admin-edit-LSP', $cat->Ma_LSP) }}"
                                                class="btn btn-xs btn-primary">Sửa</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="max-width: 200px;">
                        {{ $Loai_san_pham->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
@endsection
