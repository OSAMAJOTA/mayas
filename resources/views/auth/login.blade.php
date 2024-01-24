<!DOCTYPE html>
<html lang="en">
<head>
    <title>تسجيل الدخول </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->

    <link href="{{URL::asset('assets/loglog/images/icons/favicon.ico')}}" rel="stylesheet">
    <!--===============================================================================================-->


    <link href="{{URL::asset('assets/loglog/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--===============================================================================================-->

    <link href="{{URL::asset('assets/loglog/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
    <!--===============================================================================================-->

    <link href="{{URL::asset('assets/loglog/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}" rel="stylesheet">

    <!--===============================================================================================-->

    <link href="{{URL::asset('assets/loglog/vendor/animate/animate.css')}}" rel="stylesheet">

    <!--===============================================================================================-->

    <link href="{{URL::asset('assets/loglog/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet">

    <!--===============================================================================================-->

    <link href="{{URL::asset('assets/loglog/vendor/animsition/css/animsition.min.css')}}" rel="stylesheet">
    <!--===============================================================================================-->

    <link href="{{URL::asset('assets/loglog/vendor/select2/select2.min.css')}}" rel="stylesheet">
    <!--===============================================================================================-->

    <link href="{{URL::asset('assets/loglog/vendor/daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!--===============================================================================================-->

    <link href="{{URL::asset('assets/loglog/css/util.css')}}" rel="stylesheet">

    <link href="{{URL::asset('assets/loglog/css/main.css')}}" rel="stylesheet">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('assets/loglog/images/bg-01.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
                    <img src="assets/img/miyaslogo.png" width="100px" height="100px"><br>

					Account Login
                      @error('email')
                        <span class=" alert-danger" role="alert">
                                        <h6>{{ $message }}</h6>
                                    </span>
                        @enderror
				</span>

            <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="wrap-input100 validate-input" data-validate = "Enter email">
                    <input class="input100 @error('email') is-invalid @enderror " name="email" placeholder="email" value="{{ old('email') }}">

                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                    @error('password')
                    <span class="alert-danger" role="alert">
                                           <h5>{{ $message }}</h5>
                                    </span>
                    @enderror
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->

<script src="{{URL::asset('assets/loglog/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->

<script src="{{URL::asset('assets/loglog/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->

<script src="{{URL::asset('assets/loglog/vendor/bootstrap/js/popper.js')}}"></script>

<script src="{{URL::asset('assets/loglog/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->

<script src="{{URL::asset('assets/loglog/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->

<script src="{{URL::asset('assets/loglog/vendor/daterangepicker/moment.min.js')}}"></script>

<script src="{{URL::asset('assets/loglog/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->

<script src="{{URL::asset('assets/loglog/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->

<script src="{{URL::asset('assets/loglog/js/main.js')}}"></script>

</body>
</html>
