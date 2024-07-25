<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/assets/img/images (1).png') }}">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/style.css') }}">
    <!--[if lt IE 9]>
        <script src="{{ url('public/assets/js/html5shiv.min.js') }}"></script>
        <script src="{{ url('public/assets/js/respond.min.js') }}"></script>
    <![endif]-->

        <style>
            .account-logo img{
                width:150px !important;
                height:50px !important;
            }
        </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container">
                <!-- <h3 class="account-title">Login</h3> -->
                <div class="account-box">
                    <div class="account-wrapper">
                        <div class="account-logo" style="color:black; font-size:30px; font-family: Arial, sans-serif; font-weight:bold !important;">
                            <a href="{{ url('/') }}"></a>
                            Jobee!
                                <!-- <img src="" alt="Preadmin"> -->
                            </a><br>
                        </div>
                        <x-validation-errors class="mb-4" />
                        {{-- @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif --}}


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
                                <button class="btn btn-info btn-block account-btn" type="submit">Login</button>
                            </div>
                            <div class="text-center d-none">
                                <a href="forgot-password.html">Forgot your password?</a>
                            </div>
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