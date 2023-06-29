@extends('admin.index')
@section('main')
    <h2>Thêm danh mục kích cỡ</h2>
    <form action="{{ route('post_sanphammoi') }}" method="POST" role="form" style="width: 70%">
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
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
@endsection
