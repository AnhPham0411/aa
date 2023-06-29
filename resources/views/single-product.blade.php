@extends('index')
@section('main')
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/coloshop-master/styles/bootstrap4/bootstrap.min.css">
    <link href="{{ url('/') }}/coloshop-master/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/coloshop-master/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/coloshop-master/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/coloshop-master/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" href="{{ url('/') }}/coloshop-master/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/coloshop-master/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/coloshop-master/styles/single_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/coloshop-master/styles/single_responsive.css">
    <div class="container single_product_container">
        <div class="row">
            <div class="col">
                @php
                    $i = 3;
                @endphp
                @if (count($img) >= 2)
                    @php
                        $i = 1;
                    @endphp
                @endif
                <!-- Breadcrumbs -->

                <br>

            </div>
        </div>
        <br>
        <h3>Thông tin chi tiết sản phẩm </h3>
        <br>
        <div class="row">
            <div class="col-lg-7">
                <div class="single_product_pics">
                    <div class="row">
                        <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
                            <div class="single_product_thumbnails">
                                <ul>
                                    @if (count($img) >= 2)
                                        @foreach ($img as $anh)
                                            <li><img src="{{ $anh->Ten_file_anh }}" alt=""
                                                    data-image="{{ $anh->Ten_file_anh }}"></li>
                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 image_col order-lg-2 order-1">
                            <div class="single_product_image">

                                <div class="single_product_image_background" style="">
                                    @foreach ($img as $anh)
                                        @if ($anh->Trang_thai == 1)
                                            <img src="{{ $anh->Ten_file_anh }}" alt="" width="300px">
                                        @endif
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <form action="{{ route('cart.add', $sanpham->Ma_SP) }}" method="POST">
                    @csrf
                    <div class="product_details">
                        <div class="product_details_title">
                            <h2>{{ $sanpham->Ten_sp }}</h2>
                            <p>{{ $sanpham->Mo_ta }}</p>
                        </div>
                        {{-- <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                        <span class="ti-truck"></span><span>free delivery</span>
                    </div> --}}
                        <div class="original_price">{{ $sanpham->Gia_cu }}</div>
                        <div class="product_price">{{ $sanpham->Gia_moi }}</div>
                        <ul class="star_rating">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                        </ul>
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Màu sắc</label>
                            <div class="col-sm-5">
                                <select class="form-select" aria-label="Default select example" name="Ma_MS">
                                    <option>-- Chọn Danh Mục --</option>
                                    @foreach ($mausac as $loai)
                                        <option value="{{ $loai->Ma_MS }}">
                                            {{ $loai->Ten_MS }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Chọn size</label>
                            <div class="col-sm-5">
                                <select class="form-select" aria-label="Default select example" name="Ma_KC">
                                    <option>-- Chọn Danh Mục --</option>
                                    @foreach ($kichco as $loai)
                                        <option value="{{ $loai->Ma_KC }}">
                                            {{ $loai->Ten_KC }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                            {{-- <span>Quantity:</span>
                        <div class="quantity_selector">
                            <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                            <span id="quantity_value">1</span>
                            <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </div> --}}
                            <button style="margin: 15px;width: 100px;" type="submit"> Add
                                to cart</button>
                            {{-- <div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div> --}}
                        </div>
                </form>
            </div>
        </div>
    </div>

    </div>

    <!-- Tabs -->

    <div class="tabs_section_container">

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabs_container">
                        <ul
                            class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
                            <li class="tab active" data-active-tab="tab_1"><span>Description</span></li>
                            <li class="tab" data-active-tab="tab_2"><span>Additional Information</span></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <!-- Tab Description -->

                    <div id="tab_1" class="tab_container active">
                        <div class="row">
                            <div class="col-lg-5 desc_col">
                                <div class="tab_title">
                                    <h4>Description</h4>
                                </div>
                                <div class="tab_text_block">
                                    <h2>{{ $sanpham->Ten_sp }}</h2>
                                    <p>{{ $sanpham->Thong_tin }}</p>
                                </div>
                                <div class="tab_image">
                                    <img src="
                                    @foreach ($img as $anh)
                                    @if ($i == 1 && $anh->Trang_thai == 0) {{ $anh->Ten_file_anh }}
                                    @endif @endforeach
                                    "
                                        alt="" width="">
                                </div>

                            </div>
                            <div class="col-lg-5 offset-lg-2 desc_col">
                                <div class="tab_image">
                                    <img src="images/desc_2.jpg" alt="">
                                </div>

                                <div class="tab_image desc_last">
                                    <img src="images/desc_3.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Additional Info -->

                    <div id="tab_2" class="tab_container">
                        <div class="row">
                            <div class="col additional_info_col">
                                <div class="tab_title additional_info_title">
                                    <h4>Additional Information</h4>
                                </div>
                                <p>COLOR:
                                    @foreach ($mausac as $loai)
                                        <span>{{ $loai->Ten_MS }},</span>
                                    @endforeach
                                </p>
                                <p>SIZE:
                                    @foreach ($kichco as $loai)
                                        <span>{{ $loai->Ten_KC }},</span>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Reviews -->



                </div>
            </div>
        </div>

    </div>

    <!-- Benefit -->

    <div class="benefit">
        <div class="container">
            <div class="row benefit_row">
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>free shipping</h6>
                            <p>Suffered Alteration in Some Form</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>cach on delivery</h6>
                            <p>The Internet Tend To Repeat</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>45 days return</h6>
                            <p>Making it Look Like Readable</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>opening all week</h6>
                            <p>8AM - 09PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
