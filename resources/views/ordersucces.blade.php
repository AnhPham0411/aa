@extends('index')
@section('main')
    <br>
    <br>
    <br>
    <br><br>
    <br>
    <br>
    <div class="container-fluid">
        <div class="container text-center">
            <h1>Thank you.</h1>
            <p class="lead w-lg-50 mx-auto">Your order has been placed successfully.</p>
            {{-- <p class="w-lg-50 mx-auto">Your order number is <a href="#" style="color: red">{{ $order->Id_hoa_don }}</a>.
                We will
                immediatelly
                process
                your and it will be delivered in 2 - 5 business days.</p> --}}
        </div>
        {{-- <div class="container">
            <h2 class="h5 mb-5 text-center">You may also like these products</h2>
            <div class="row">
                <div class="col-lg-3">
                    <div class="card text-center mb-3">
                        <div class="py-5 px-4">
                            <img src="https://www.bootdey.com/image/280x280/6495ED/000000" alt=""
                                class="img-fluid mb-4" />
                            <h3 class="fs-6 text-truncate"><a href="#" class="stretched-link text-reset">Smartphone 5G
                                    Black 12GB RAM+512GB NEW</a></h3>
                            <span class="text-success">$799.00</span> <del class="text-muted">$650.83</del>
                        </div>
                        <div class="bg-danger text-white small position-absolute end-0 top-0 px-2 py-2 lh-1 text-center">
                            <span class="d-block">10%</span>
                            <span class="d-block">OFF</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-center position-relative mb-3">
                        <div class="py-5 px-4">
                            <img src="https://www.bootdey.com/image/280x280/FFB6C1/000000" alt=""
                                class="img-fluid mb-4" />
                            <h3 class="fs-6 text-truncate"><a href="#" class="stretched-link text-reset">Wireless
                                    Headphones with Noise Cancellation Tru Bass Bluetooth HiFi</a></h3>
                            <span class="text-success">$250.00</span> <del class="text-muted">$250</del>
                        </div>
                        <div class="bg-danger text-white small position-absolute end-0 top-0 px-2 py-2 lh-1 text-center">
                            <span class="d-block">25%</span>
                            <span class="d-block">OFF</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-center mb-3">
                        <div class="py-5 px-4">
                            <img src="https://www.bootdey.com/image/280x280/008B8B/000000" alt=""
                                class="img-fluid mb-4" />
                            <h3 class="fs-6 text-truncate"><a href="#" class="stretched-link text-reset">Smartwatch
                                    IP68 Waterproof GPS and Bluetooth Support</a></h3>
                            <span class="text-success">$29.00</span> <del class="text-muted">$14.50</del>
                        </div>
                        <div class="bg-danger text-white small position-absolute end-0 top-0 px-2 py-2 lh-1 text-center">
                            <span class="d-block">50%</span>
                            <span class="d-block">OFF</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-center mb-3">
                        <div class="py-5 px-4">
                            <img src="https://www.bootdey.com/image/280x280/00CED1/000000" alt=""
                                class="img-fluid mb-4" />
                            <h3 class="fs-6 text-truncate"><a href="#" class="stretched-link text-reset">Men's Running
                                    Shoes</a></h3>
                            <span class="text-success">$110.00</span> <del class="text-muted">$85.23</del>
                        </div>
                        <div class="bg-danger text-white small position-absolute end-0 top-0 px-2 py-2 lh-1 text-center">
                            <span class="d-block">25%</span>
                            <span class="d-block">OFF</span>
                        </div>
                    </div>
                </div>
            </div> --}}
    </div>
    </div>
    <style>
        body {
            margin-top: 20px;
        }

        .text-center {
            text-align: center !important;
        }

        .mb-5 {
            margin-bottom: 3rem !important;
        }

        .mx-auto {
            margin-right: auto !important;
            margin-left: auto !important;
        }

        .text-reset {
            --bs-text-opacity: 1;
            color: inherit !important;
        }

        a {
            color: #5465ff;
            text-decoration: none;
        }

        body {
            background: #eee;
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, 0.125);
            border-radius: 1rem;
        }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.5rem 1.5rem;
        }
    </style>
@stop
