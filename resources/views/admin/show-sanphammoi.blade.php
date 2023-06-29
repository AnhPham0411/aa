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
                <h6 class="m-0 font-weight-bold text-primary">Bảng sản phẩm (hiện đang có @php
                    echo count($sanpham);
                @endphp sản phẩm)
                </h6>
                <a href="{{ route('sanphammoi') }}" class="btn btn-xs btn-primary" style="margin-left:20px ">them
                    moi</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ma_SP</th>
                                <th>Ten_SP</th>
                                {{-- <th>Mo_ta</th>
                                <th>Thong_tin</th> --}}
                                <th>Image</th>

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

                                    <td>
                                        <form action="{{ route('sanphammoi-delete', $cat->id) }}" method="POST">
                                            @method('DELETE') @csrf
                                            <button class="btn btn-xs btn-danger">Xóa</button>
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
@endsection
