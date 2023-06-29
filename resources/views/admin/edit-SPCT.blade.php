@extends('admin.index')
@section('main')
<h2>Sửa danh mục kích cỡ {{ $cat->Ten_KC }}</h2>
<form action="{{ route('admin-postedit-NH', $cat->Ma_KC) }}" method="POST" role="form" style="width: 70%">
    @csrf
    <div class="form-group">
        <label for="">Tên màu sắc</label>
        <input class="form-control" name="Ten_KC" placeholder="kích cỡ" value="{{ $cat->Ten_KC }}">
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