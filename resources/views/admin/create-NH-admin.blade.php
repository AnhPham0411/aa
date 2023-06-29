@extends('admin.index')
@section('main')
    <h2>Thêm danh mục danh mục</h2>
    <form action="{{ route('admin-createpost-NH') }}" method="POST" role="form" style="width: 70%">
        @csrf
        <div class="form-group">
            <label for="">Tên nhãn hiệu</label>
            <input class="form-control" name="Ten_nhan_hieu" placeholder="Tên nhãn hiệu">
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
