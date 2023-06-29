<!doctype html>
<html lang="en">

<head>
    <title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ url('/') }}/loginadmin/css/style.css">

</head>

<body>
    <section class="ftco-section" style="padding-top: 20px;padding-bottom: 0px">
        <div class="container" style="margin-top: 0">
            {{-- <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login #04</h2>
                </div>
            </div> --}}
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img"
                            style="background-image: url(https://genzrelax.com/wp-content/uploads/2023/02/gai-xinh-nguc-to-14.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">ADMIN</h3>
                                </div>
                                {{-- <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-facebook"></span></a>
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-twitter"></span></a>
                                    </p>
                                </div> --}}
                            </div>
                            <form action="{{ route('admin_post_register') }}" class="signin-form" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Name</label>
                                    <div class="">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="email">email</label>
                                    <div class="">
                                        <input id="email" type="text"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">password</label>
                                    <div class="">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            value="{{ old('password') }}" required />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password-confirm">password</label>
                                    <div class="">
                                        <input id="password-confirm" type="password"
                                            class="form-control @error('password-confirm') is-invalid @enderror"
                                            name="password-confirm" value="{{ old('password-confirm') }}" required />
                                        @error('password-confirm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded submit px-3">Register
                                    </button>
                                </div>
                                {{-- <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div> --}}
                            </form>
                            <a href="{{ route('admin_register') }}">register</a>
                            {{-- <p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ url('/') }}/loginadmin/js/jquery.min.js"></script>
    <script src="{{ url('/') }}/loginadmin/js/popper.js"></script>
    <script src="{{ url('/') }}/loginadmin/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/loginadmin/js/main.js"></script>

</body>

</html>
