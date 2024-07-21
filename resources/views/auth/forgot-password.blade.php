@include('theme_1.layouts.head')
  <!-- Main content -->
  <main id="login-section" class="py-5 px-4 px-md-0 my-md-7 pb-md-7">
    <!-- Title -->
    <div class="container text-center">
      <h1 class="fw-medium mb-0 fs-2">Forgot Password</h1>
    </div>

    

    <form class="container mt-5 rounded-5 p-2 px-3 px-md-5 pb-3 box-shadow-xl bg-white" style="max-width: 700px;" name="login-form" action="{{ route('forgotpassword.email') }}" method="POST">
        @csrf
        @include('theme_1.userprofile.message')
      <div class="mx-md-5 mt-5">
        <!-- Email or Phone -->
        <div class="mb-3">
          <label for="login-email-or-phone" class="text-muted">Your Email</label>
          <input class="form-control form-control-lg mt-2 rounded-3" id="login-email-or-phone" name="email" :value="old('email')" required autofocus autocomplete="username">
        </div>

        <!-- Login Button -->
        <button class="w-100 mb-3 btn btn-lg rounded-3 btn-primary py-3 fw-medium" type="submit">Send Reset Link</button>
        
      </div>

      <!-- Forgot Password -->
      <div class="mx-md-5 mt-4 d-flex justify-content-end">
        <a href="{{ url('login') }}" class="text-warning-hover" style="text-decoration: none;">< Back to login</a>
      </div>

    </form>
  </main>

  @include('theme_1.layouts.footer')