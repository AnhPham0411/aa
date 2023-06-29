@extends('admin.index')
@section('main')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow 1" style="width: 100%; margin-left: 0px">
            <div class="card-header py-6" style="display: flex;">
                <h6 class="m-0 font-weight-bold text-primary">Bảng order</h6>
            </div>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="orderTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id_hoa_don</th>
                                <th>Hoten_nguoinhan</th>
                                <th>Diachi_nguoinhan</th>
                                <th>Dienthoai_nguoinhan</th>
                                <th>Diachi_email</th>
                                <th>Kich_co</th>
                                <th>Mau_sac</th>
                                <th>So_luong</th>
                                <th>Gia_ban</th>
                                <th>Trang_thai</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id_hoa_don</th>
                                <th>Hoten_nguoinhan</th>
                                <th>Diachi_nguoinhan</th>
                                <th>Dienthoai_nguoinhan</th>
                                <th>Diachi_email</th>
                                <th>Kich_co</th>
                                <th>Mau_sac</th>
                                <th>So_luong</th>
                                <th>Gia_ban</th>
                                <th>Trang_thai</th>
                                <th>setting</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($order as $or)
                                @php
                                    $hdct = DB::table('Ct_hoa_don')
                                        ->join('San_pham_ct', 'Ct_hoa_don.Ma_SPCT', '=', 'San_pham_ct.Ma_SPCT')
                                        ->where('Ma_HD', $or->Ma_HD)
                                        ->select('Ma_MS', 'Ma_KC')
                                        ->get();
                                    $mausac = DB::table('Mau_sac')
                                        ->where('Ma_MS', $hdct->first()->Ma_MS)
                                        ->first();
                                    $kichco = DB::table('kich_co')
                                        ->where('Ma_KC', $hdct->first()->Ma_KC)
                                        ->first();
                                @endphp
                                <tr>
                                    <td>{{ $or->Ma_HD }}</td>
                                    <td>{{ $or->Hoten_nguoinhan }}</td>
                                    <td>{{ $or->Diachi_nguoinhan }}</td>
                                    <td>{{ $or->Dienthoai_nguoinhan }}</td>
                                    <td>{{ $or->Diachi_email }}</td>
                                    <td>{{ $mausac->Ten_MS }}</td>
                                    <td>{{ $kichco->Ten_KC }}</td>
                                    <td>{{ $or->So_luong_ban }}</td>
                                    <td>{{ $or->Gia_ban }}</td>
                                    <td>

                                        @if ($or->Trang_thai == 1)
                                            Xác thực
                                        @elseif ($or->Trang_thai == 0)
                                            Đang giao
                                        @endif
                                    </td>
                                    <td>
                                        @if ($or->Trang_thai == 1)
                                            <button>
                                                <a href="{{ route('duyetdon', $or->Ma_HD) }}">duyệt đơn</a></button>
                                        @endif
                                        <button><a href="{{ route('xoadon', $or->Ma_HD) }}">xóa đơn</a></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#orderTable').DataTable();
        });
    </script>
@endsection
