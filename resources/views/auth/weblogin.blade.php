
@include('theme_1.layouts.head')
  <!-- Main content -->
  <main id="login-section" class="py-5 px-4 px-md-0 my-md-7 pb-md-7">
    <!-- Title -->
    <div class="container text-center">
      <h1 class="fw-medium mb-0 fs-2">Sign in to <span class="text-primary">TEACH</span><span
          class="text-warning">ME</span></h1>
    </div>

    

    <form class="container mt-5 rounded-5 p-2 px-3 px-md-5 pb-3 box-shadow-xl bg-white" style="max-width: 700px;" name="login-form" action="{{ route('login') }}" method="POST">
        @csrf
        @include('theme_1.userprofile.message')
      <div class="mx-md-5 mt-5">
        <!-- Email or Phone -->
        <div class="mb-3">
          <label for="login-email-or-phone" class="text-muted">Email or phone number</label>
          <input class="form-control form-control-lg mt-2 rounded-3" id="login-email-or-phone" name="email" :value="old('email')" required autofocus autocomplete="username">
        </div>
        <!-- Password -->
        <div class="mb-3">
          <div class="d-flex justify-content-between">
            <label for="login-password" class="text-muted">Your password</label>
            <button class="btn btn-sm shadow-none text-black-50" type="button" data-tm-target="#login-password"
              data-tm-toggle="password"><i class="fa-solid fa-eye me-1"></i><span>Show</span></button>
          </div>
          <input type="password" class="form-control form-control-lg mt-2 rounded-3" name="password" id="login-password" :value="old('password')" required autofocus autocomplete="password">
        </div>

        <!-- Login Button -->
        <button class="w-100 mb-3 btn btn-lg rounded-3 btn-primary py-3 fw-medium" type="submit">Log in</button>
        <small class="text-black fs-6 mb-2">By continuing, you agree to the <a href="{{ url('terms-of-use') }}" class="text-warning-hover">Terms of
            use</a> and <a href="{{ url('privacy-policy') }}" class="text-warning-hover">Privacy Policy</a>.</small>
      </div>

      <!-- Forgot Password -->
      <div class="mx-md-5 mt-4 d-flex justify-content-end">
        <a href="{{ url('forgotpassword') }}" class="text-warning-hover">Forgot your password?</a>
      </div>

      <!-- New to our community heading -->
      <div class="d-flex align-items-center gap-3 my-4">
        <hr class="flex-grow-1">
        <p class="text-muted m-0">Don't have an account</p>
        <hr class="flex-grow-1">
      </div>

      <!-- Sign up Button -->
      <div class="pb-4 mx-md-5">
        <a href="{{ url('register') }}" class="w-100 btn btn-outline-secondary rounded-3 fw-medium py-3">
          Create an account
        </a>
      </div>
    </form>
  </main>

  @include('theme_1.layouts.footer')