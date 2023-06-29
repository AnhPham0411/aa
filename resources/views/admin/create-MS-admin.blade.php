@extends('admin.index')
@section('main')
    <h2>Thêm danh mục màu sắc</h2>
    <form action="{{ route('admin-createpost-MS') }}" method="POST" role="form" style="width: 70%">
        @csrf
        <div class="form-group">
            <label for="">Tên màu</label>
            <input class="form-control" name="Ten_MS" placeholder="Tên màu sắc">
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
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
@endsection
