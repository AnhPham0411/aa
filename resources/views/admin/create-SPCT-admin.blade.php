@extends('admin.index')
@section('main')
    <h2>Thêm danh mục kích cỡ</h2>
    <form action="{{ route('admin-createpost-SPCT') }}" method="POST" role="form" style="width: 70%">
        @csrf

        <div class="form-group" style="">
            <label class="col-sm-2 col-form-label">Sản phẩm</label>
            <div class="col-sm-5">
                <select class="form-select" aria-label="Default select example" name="Ma_SP" id="product-select">
                    <option>-- Chọn sản phẩm --</option>
                    @foreach ($sanpham as $nhan)
                        <option value="{{ $nhan->Ma_SP }}">
                            {{ $nhan->Ten_sp }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group" style="">
            <label class="col-sm-2 col-form-label">Kích cỡ</label>
            <div class="col-sm-5">
                <select class="form-select" aria-label="Default select example" name="Ma_KC" id="product-select">
                    <option>-- Chọn Kích cỡ --</option>
                    @foreach ($kichco as $nhan)
                        <option value="{{ $nhan->Ma_KC }}">
                            {{ $nhan->Ten_KC }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group" style="">
            <label class="col-sm-2 col-form-label">Màu sắc</label>
            <div class="col-sm-5">
                <select class="form-select" aria-label="Default select example" name="Ma_MS" id="product-select">
                    <option>-- Chọn Màu sắc --</option>
                    @foreach ($mausac as $nhan)
                        <option value="{{ $nhan->Ma_MS }}">
                            {{ $nhan->Ten_MS }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="">số lượng</label>
            <input class="form-control" name="So_luong" placeholder="So_luong">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
@endsection
