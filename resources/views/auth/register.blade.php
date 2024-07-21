<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/assets/img/favicon.png') }}">
        <title>Register as User</title>
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
                    <h3 class="account-title">Register</h3>
                    <div class="account-box">
                        <div class="account-wrapper">
                            <div class="account-logo">
                                <a href="index.html">
                                    <img src="{{ url('public/assets/img/logo2.png') }}" alt="Preadmin">
                                </a>
                            </div>
                            <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group form-focus">
            <label class="focus-label">Name</label>
            <input class="form-control floating" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="form-group form-focus">
            <label class="focus-label">Phone</label>
            <input class="form-control floating" type="number" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>

            <div class="form-group form-focus">
            <label class="focus-label">Email</label>
            <input class="form-control floating" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
            </div>

            <div class="form-group form-focus">
            <label class="focus-label">Password</label>
            <input class="form-control floating" type="password" name="password" :value="old('password')" required autofocus autocomplete="password" />
            </div>

            <div class="form-group form-focus">
            <label class="focus-label">Confirm Password</label>
            <input class="form-control floating" type="password" name="password_confirmation" :value="old('password_confirmation')" required autofocus autocomplete="password_confirmation" />
            </div>

            <div class="form-group text-center">
                <button class="btn btn-primary btn-block account-btn" type="submit">Register</button>
            </div>

{{--             @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif --}}

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
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