@extends('admin.index')
@section('main')
    <h2>Thêm danh mục danh mục</h2>
    <form action="{{ route('admin-product-postedit', $cat->Ma_SP) }}" method="POST" role="form">
        @csrf
        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input class="form-control" name="Ten_sp" placeholder="Tên sản phẩm" value="{{ $cat->Ten_sp }}">
        </div>
        <div class="form-group">
            <label for="">Giá Nhập</label>
            <input class="form-control" name="Gia_nhap" placeholder="Giá Nhập" value="{{ $cat->Gia_nhap }}">
        </div>
        <div class="form-group">
            <label for="">Giá cũ</label>
            <input class="form-control" name="Gia_cu" placeholder="Giá cũ" value="{{ $cat->Gia_cu }}">
        </div>
        <div class="form-group">
            <label for="">Giá mới</label>
            <input class="form-control" name="Gia_moi" placeholder="Giá mới" value="{{ $cat->Gia_moi }}">
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <input class="form-control" name="Mo_ta" placeholder="Mô tả" value="{{ $cat->Mo_ta }}">
        </div>
        <div class="form-group">
            <label for="">Thông tin</label>
            <input class="form-control" name="Thong_tin" placeholder="Thông tin" value="{{ $cat->Thong_tin }}">
        </div>

        <div class="form-group">
            <label class="col-sm-2 col-form-label">Loại sản phẩm</label>
            <div class="col-sm-5">
                <select class="form-select" aria-label="Default select example" name="Ma_LSP">
                    <option>-- Chọn Danh Mục --</option>
                    @foreach ($loai_san_pham as $loai)
                        <option value="{{ $loai->Ma_LSP }}">
                            {{ $loai->Ten_loai }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Nhãn Hiệu</label>
            <div class="col-sm-5">
                <select class="form-select" aria-label="Default select example" name="Ma_NH">
                    <option>-- Chọn Danh Mục --</option>
                    @foreach ($Nhan_hieu as $nhan)
                        <option value="{{ $nhan->Ma_NH }}">
                            {{ $nhan->Ten_nhan_hieu }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="">Trạng thái</label>
            <div class="radio">
                <label>
                    <input type="radio" name="Trang_thai" value="1" checked>
                    Hiển thị
                </label>
                <label>
                    <input type="radio" name="Trang_thai" value="0">
                    Ẩn
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
@endsection
