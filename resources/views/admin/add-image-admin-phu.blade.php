@extends('admin.index')
@section('main')
    <h2>Thêm ảnh phụ</h2>
    <form method="POST" action="{{ route('uploadImage') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Choose an image:</label>
            <input type="file" class="form-control-file" id="images" name="images">
        </div>
        <div class="form-group">
            <label for="">Trạng thái</label>
            <div class="radio">
                {{-- <label>
                    <input type="radio" name="Trang_thai" value="1" checked>
                    Ảnh chính
                </label> --}}
                <label>
                    <input type="radio" name="Trang_thai" value="0" checked>
                    Ảnh phụ
                </label>
            </div>
        </div>
        <div class="form-group" style="">
            <label class="col-sm-2 col-form-label">Sản phẩm</label>
            <div class="col-sm-5">
                <select class="form-select" aria-label="Default select example" name="Ma_SP" id="product-select">
                    <option>-- Chọn sản phẩm --</option>
                    @foreach ($img as $nhan)
                        <option value="{{ $nhan->Ma_SP }}">
                            {{ $nhan->Ten_sp }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
@endsection
