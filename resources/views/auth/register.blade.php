
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Digital Artist</title>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    {{--    <link rel="icon" href="../files/assets/images/favicon.ico" type="image/x-icon">--}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset(url('css/bootstrap.min.css')) !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset(url('css/style.css')) !!}">
</head>

<body class="fix-menu">
<!-- Pre-loader start -->

{{--<div class="theme-loader">--}}
{{--    <div class="loader-track">--}}
{{--        <div class="loader-bar"></div>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- Pre-loader end -->

<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                <div class="login-card card-block auth-body mr-auto ml-auto">
                <form class="md-float-material" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="auth-box" style="background-color:#31363994">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <!-- <img src="{{asset('images/desh-consumer-logo.png')}}" alt="logo.png"> -->
                                    <h3 class="text-left txt-primary" style="color:white;">Register</h3>
                                </div>
                            </div>
                            <hr>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end " >{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <!-- end of form -->
                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>

<script  src="{!! asset(url('js/jquery.min.js')) !!}"></script>
<script  src="{!! asset(url('js/jquery-ui.min.js')) !!}"></script>
<script  src="{!! asset(url('js/popper.min.js')) !!}"></script>
<script  src="{!! asset(url('js/bootstrap.min.js')) !!}"></script>
<script  src="{!! asset(url('js/common-pages.js')) !!}"></script>
</body>

</html>
