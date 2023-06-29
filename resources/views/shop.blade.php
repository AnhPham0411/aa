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
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/coloshop-master/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/coloshop-master/styles/categories_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/coloshop-master/styles/categories_responsive.css">
    <div class="container product_section_container">
        <div class="row">
            <div class="col product_section clearfix">
                <br>
                <!-- Breadcrumbs -->

                {{-- <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="index.html"><i class="fa fa-angle-right"
                                    aria-hidden="true"></i>Men's</a>
                        </li>
                    </ul>
                </div> --}}

                <!-- Sidebar -->

                {{-- <div class="sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Product Category</h5>
                        </div>
                        <ul class="sidebar_categories">
                            <li><a href="#">Men</a></li>
                            <li class="active"><a href="#"><span><i class="fa fa-angle-double-right"
                                            aria-hidden="true"></i></span>Women</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">New Arrivals</a></li>
                            <li><a href="#">Collection</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>

                    <!-- Price Range Filtering -->


                </div> --}}

                <!-- Main Content -->

                <div class="main_content">

                    <!-- Products -->

                    <div class="products_iso">
                        <div class="row">
                            <div class="col">

                                <!-- Product Sorting -->

                                <div class="product_sorting_container product_sorting_container_top">
                                    <ul class="product_sorting">
                                        <li>
                                            <span class="type_sorting_text">Default Sorting</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_type">
                                                <li class="type_sorting_btn"
                                                    data-isotope-option='{ "sortBy": "original-order" }'>
                                                    <span>Default Sorting</span>
                                                </li>
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'>
                                                    <span>Price</span>
                                                </li>
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'>
                                                    <span>Product
                                                        Name</span>
                                                </li>
                                            </ul>
                                        </li>
                                        {{-- <li>
                                            <span>Show</span>
                                            <span class="num_sorting_text">6</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_num">
                                                <li class="num_sorting_btn"><span>6</span></li>
                                                <li class="num_sorting_btn"><span>12</span></li>
                                                <li class="num_sorting_btn"><span>24</span></li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                    {{-- <div class="pages d-flex flex-row align-items-center">
                                        <div class="page_current">
                                            <span>1</span>
                                            <ul class="page_selection">
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                            </ul>
                                        </div>
                                        <div class="page_total"><span>of</span> 3</div>
                                        <div id="next_page" class="page_next"><a href="#"><i
                                                    class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div> --}}

                                </div>

                                <!-- Product Grid -->

                                <div class="product-grid">
                                    @if (count($sanpham) <= 0)
                                        <h2>Trang này không có sản phẩm nào</h2>
                                    @else
                                        @php
                                            $a = $page - 1;
                                            $i = ceil(count($sanpham) / 12);
                                        @endphp
                                        @for ($f = $a * 12; $f < ($a + 1) * 12; $f++)
                                            @php
                                                $cat = isset($sanpham[$f]) ? $sanpham[$f] : null;
                                            @endphp

                                            @if ($cat)
                                                <div class="product-item men">
                                                    <div class="product discount product_filter">
                                                        <div class="product_image" style="height: 200px">
                                                            <img src="{{ $cat->Hinh_anh }}" alt="">
                                                        </div>
                                                        <div class="favorite favorite_left"></div>
                                                        {{-- <div
                                                            class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                                            <span>-$20{{ $f }}</span>
                                                        </div> --}}
                                                        <div class="product_info">
                                                            <h6 class="product_name">
                                                                <a
                                                                    href="{{ route('single', $cat->Ma_SP) }}">{{ $cat->Ten_sp }}</a>
                                                            </h6>
                                                            <div class="product_price">
                                                                ${{ $cat->Gia_moi }}<span>{{ $cat->Gia_cu }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="red_button add_to_cart_button">
                                                        <a href="{{ route('single', $cat->Ma_SP) }}">Thông tin chi tiết
                                                            sản phẩm</a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endfor
                                    @endif
                                    <!-- Product 1 -->


                                    <!-- Product 2 -->



                                    <!-- Product Sorting -->



                                </div>
                                <div class="product_sorting_container product_sorting_container_bottom clearfix">
                                    {{-- <ul class="product_sorting">
                                        <li>
                                            <span>Show:</span>
                                            <span class="num_sorting_text">04</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_num">
                                                <li class="num_sorting_btn"><span>01</span></li>
                                                <li class="num_sorting_btn"><span>02</span></li>
                                                <li class="num_sorting_btn"><span>03</span></li>
                                                <li class="num_sorting_btn"><span>04</span></li>
                                            </ul>
                                        </li>
                                    </ul> --}}
                                    {{-- <span class="showing_results">Showing 1-3 of 12 results</span> --}}
                                    <div class="pages d-flex flex-row align-items-center">
                                        <div class="page_current">
                                            <span>1</span>
                                            <ul class="page_selection">
                                                @for ($e = 1; $e <= $i; $e++)
                                                    <li><a
                                                            href="{{ route('shop', ['page' => $e]) }}">{{ $e }}</a>
                                                    </li>
                                                @endfor

                                                {{-- <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li> --}}
                                            </ul>
                                        </div>
                                        <div class="page_total"><span>of</span> {{ $i }}</div>
                                        <div id="next_page_1" class="page_next"><a
                                                href="{{ route('shop', ['page' => $page + 1]) }}"><i
                                                    class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
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
