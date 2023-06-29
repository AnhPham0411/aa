@extends('index')
@section('main')
    <br>
    <br>
    <br>
    <div class="main-content">
        <div style="margin: 50px">
            <div style="width: 800px;height: 250px;border: #9DBFAF">
                <form action="{{ route('post_search') }}" method="GET">
                    @csrf
                    <div class="wrap">
                        <div class="search" style="width: 500px;">
                            <input type="text" class="searchTerm" name='keyword' placeholder="What are you looking for?"
                                style="height: 36px;width: 255px;" value="{{ $keyword }}">
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>

                </form>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (count($sanphamtimkiem) <= 0)
                        <h3>Không có sản phẩm nào được tìm thấy</h3>
                    @else
                        <table class="table table-bordered" id="dataTable" width="550px" cellspacing="0">
                            <thead>
                                <tr>

                                    <th>Ten_SP</th>
                                    {{-- <th>Mo_ta</th>
                                    <th>Thong_tin</th> --}}
                                    <th>Image</th>

                                    <th>Gia_moi</th>
                                    {{-- <th>Luot_xem</th> --}}
                                    <th>xem thông tin</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>

                                    <th>Ten_SP</th>
                                    {{-- <th>Mo_ta</th>
                                    <th>Thong_tin</th> --}}
                                    <th>Image</th>

                                    <th>Gia_moi</th>
                                    {{-- <th>Luot_xem</th> --}}
                                    <th>xem thông tin</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($sanphamtimkiem as $cat)
                                    <tr>

                                        <td>{{ $cat->Ten_sp }}</td>
                                        {{-- <td>{{ $cat->Mo_ta }}</td>
                                        <td>{{ $cat->Thong_tin }}</td> --}}
                                        <td><img src="{{ $cat->Hinh_anh }}" alt="" width="100px"></td>

                                        <td>{{ $cat->Gia_moi }}</td>
                                        {{-- <td>{{ $cat->Luot_xem }}</td> --}}
                                        <td><button style="color: black"><a href="{{ route('single', $cat->Ma_SP) }}">Thông
                                                    tin chi tiết</a></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <!-- Products -->

        </div>
    </div>
    <!-- Benefit -->

    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);

        body {
            background: #f2f2f2;
            font-family: 'Open Sans', sans-serif;
        }

        .search {
            width: 100%;
            position: relative;
            display: flex;
        }

        .searchTerm {
            width: 100%;
            border: 3px solid #00B4CC;
            border-right: none;
            padding: 5px;
            height: 20px;
            border-radius: 5px 0 0 5px;
            outline: none;
            color: #9DBFAF;
        }

        .searchTerm:focus {
            color: #00B4CC;
        }

        .searchButton {
            width: 40px;
            height: 36px;
            border: 1px solid #00B4CC;
            background: #00B4CC;
            text-align: center;
            color: #fff;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-size: 20px;
        }

        /*Resize the wrap to see the search bar change!*/
        .wrap {
            width: 30%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
@stop
