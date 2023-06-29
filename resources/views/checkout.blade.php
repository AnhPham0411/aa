@extends('index')
@section('main')
    <br><br>
    <br><br>
    <br><br>

    <div class="row" style="margin: 50px">
        <div class="col-md-4">
            <h2>Thông tin đặt hàng </h2>
            @if (count($cart->items) > 0)
                <form action="" method="POST" role="form">
                    @csrf
                    <div class="form-group"> <label for="">Họ và tên</label> <input type="text"
                            class="form-control @error('Hoten_nguoinhan') is-invalid @enderror" name="Hoten_nguoinhan"
                            value="{{ $customer->name }}">
                        @error('Hoten_nguoinhan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group"> <label for="">Địa chỉ email</label> <input type="text"
                            class="form-control @error('Diachi_email') is-invalid @enderror" name="Diachi_email"
                            value="{{ $customer->email }}">
                        @error('Diachi_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group"> <label for="">Số điện thoại</label> <input type="text"
                            class="form-control @error('Dienthoai_nguoinhan') is-invalid @enderror"
                            name="Dienthoai_nguoinhan" value="{{ $customer->phone }}">
                        @error('Dienthoai_nguoinhan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group"> <label for="">Địa chỉ giao hàng</label> <input type="text"
                            class="form-control @error('Diachi_nguoinhan') is-invalid @enderror" name="Diachi_nguoinhan"
                            value="{{ $customer->address }}">
                        @error('Diachi_nguoinhan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> <button type="submit" class="btn btn-primary">Đặt hàng</button>
                </form>
            @endif
        </div>
        <div class="col-md-8">
            <h2>Giỏ hàng, Số lượng: {{ $cart->totalQuantity }}, Tổng tiền: {{ number_format($cart->totalPrice) }}
                đ </h2>
            @if (count($cart->items) > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">STT</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>

                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart->items as $item)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ number_format($item->price) }} đ</td>
                                <td><img src="{{ $item->image }}" alt="" width="150px"></td>
                                <td>
                                    <form action="{{ route('cart.update', $item->id) }}"> <input type="number"
                                            name="quantity" value="{{ $item->quantity }}"
                                            style="width:80px; text-align: center"> <button
                                            class="btn btn-sm btn-success">Update</button>
                                    </form>
                                </td>
                                <td>{{ number_format($item->quantity * $item->price) }} đ</td>
                                <td><a href="{{ route('cart.delete', $item->id) }}" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Bạn có chắc không?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button> <strong>Giỏ hàng rỗng</strong> Giỏ hàng đang rỗng, <a
                        href="{{ route('home.index') }}">hãy click
                        vào đây</a> để tiếp tục mua hàng
                </div>
            @endif
        </div>
    </div>
@stop()
