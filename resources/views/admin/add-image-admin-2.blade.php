@extends('admin.index')
@section('main')
    <h2>Sửa ảnh</h2>
    <form method="POST" action="{{ route('uploadImage') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Choose an image:</label>
            <input type="file" class="form-control-file" id="images" name="images">
            <img src="{{ asset($cat1->Ten_file_anh) }}" alt="Image" width="150px">
        </div>
        <div class="form-group">
            <label for="">Trạng thái</label>
            <div class="radio">
                @if ($cat1->Trang_thai == 1)
                    <label>
                        <input type="radio" name="Trang_thai" value="1" checked>
                        Ảnh chính
                    </label>
                @else
                    <label>
                        <input type="radio" name="Trang_thai" value="0" checked>
                        Ảnh phụ
                    </label>
                @endif


            </div>
        </div>
        <div class="form-group" style="">
            <label class="col-sm-2 col-form-label">Sản phẩm</label>
            <div class="col-sm-5">
                <select class="form-select" aria-label="Default select example" name="Ma_SP" id="product-select">
                    <option>-- Chọn sản phẩm --</option>

                    <option value="{{ $pro->Ma_SP }}" selected>
                        {{ $pro->Ten_sp }}
                    </option>

                </select>
            </div>
        </div>
        <div id="product-details"></div>
        <img id="product-image" src="" alt="">
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
@endsection
