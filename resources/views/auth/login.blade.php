<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/assets/img/favicon.png') }}">
        <title>User Login</title>
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/plugins/fontawesome/css/all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/theme-light.css') }}">
        <!--[if lt IE 9]>
        <script src="{{ url('public/assets/js/html5shiv.min.js') }}"></script>
        <script src="{{ url('public/assets/js/respond.min.js') }}"></script>
        <![endif]-->
    </head>
    <body>
        <div class="main-wrapper">
            <div class="account-page">
                <div class="container">
                    <h3 class="account-title">Login</h3>
                    <div class="account-box">
                        <div class="account-wrapper">
                            <div class="account-logo">
                                <a href="index.html">
                                    <img src="{{ url('public/assets/img/logo2.png') }}" alt="Preadmin">
                                </a>
                            </div>
                            <x-validation-errors class="mb-4" />
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group form-focus">
                                <label class="focus-label">Username or Email</label>
                                <input class="form-control floating" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                </div>
                                <div class="form-group form-focus">
                                    <label class="focus-label">Password</label>
                                    <input class="form-control floating" type="password" name="password" required autocomplete="current-password" />
                                </div>

                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-block account-btn" type="submit">Login</button>
                                </div>
                                <div class="text-center d-none">
                                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                                </div>
                                <div class="form-group text-center">
                                    <a class="btn btn-danger btn-block account-btn text-white" href="{{ route('register') }}">Register</a>
                                </div>

                                <div class="form-group flex items-center justify-end mt-4 d-none">
                                    @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                    @endif
                                    <x-button class="ml-4">
                                    {{ __('Log in') }}
                                    </x-button>
                                </div>

                                <div class="form-group text-center ">
                                    <a class="btn btn-info btn-block account-btn text-white" href="{{ url('login/facebook') }}">Facebook</a>
                                </div>

                                <div class="form-group text-center text-white">
                                    <a class="btn btn-warning btn-block account-btn text-white" href="{{ url('login/google') }}">Google</a>
                                </div>

                                {{-- <div class="flex items-center justify-end mt-4">
                                    <a class="ml-1 btn btn-primary" href="{{ url('login/facebook') }}" style="margin-top: 0px !important;background: blue;color: #ffffff;padding: 5px;border-radius:7px;" id="btn-fblogin">
                                        <i class="fa fa-facebook" aria-hidden="true"></i> Login with Facebook
                                    </a>
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <a class="ml-1 btn btn-primary" href="{{ url('login/google') }}" style="margin-top: 0px !important;background: yellow;color: black;padding: 5px;border-radius:7px;" id="btn-fblogin">
                                        <i class="fa fa-facebook-square" aria-hidden="true"></i> Login with Google
                                    </a>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ url('public/assets/js/jquery-3.5.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/assets/js/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/assets/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/assets/js/app.js') }}"></script>
    </body>
</html>