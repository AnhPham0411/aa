@extends('admin.index')
@section('main')
    <h2>Sửa loại sản phẩm {{ $cat->Ten_loai }} </h2>
    <form action="{{ route('admin-postedit-LSP', $cat->Ma_LSP) }}" method="POST" role="form" style="width: 70%">
        @csrf
        <div class="form-group">
            <label for="">Tên loại sản phẩm</label>
            <input class="form-control" name="Ten_loai" placeholder="Tên loại sản phẩm" value=" {{ $cat->Ten_loai }}">
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
