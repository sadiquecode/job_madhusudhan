@include('theme_1.layouts.head')

  <!-- Main content -->
  <main id="sign-up-section" class="py-5 px-4 px-md-0 my-md-7 pb-md-7">
    <!-- Title -->
    <div class="container text-center">
      <h1 class="fw-medium mb-0 fs-2">Join <span class="text-primary">TEACH</span><span class="text-warning">ME</span>
        Today</h1>
    </div>


    


    <form class="container mt-5 rounded-5 p-2 px-3 px-md-5 pb-5 pb-md-6 box-shadow-xl bg-white" style="max-width: 700px;" name="sign-up-form" method="POST" action="{{ route('register') }}">
      @csrf
      @include('theme_1.userprofile.message')
      <div class="mx-md-5 mt-5">
        <div class="mb-3">
          <label for="type" class="text-muted d-block mb-3">What describes you the best?</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="role" id="type-student" value="student" checked>
            <label class="form-check-label" for="type-student">Student</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="role" id="type-tutor" value="tutor">
            <label class="form-check-label" for="type-tutor">Tutor</label>
          </div>
        </div>
        <!-- Name -->
        <div class="mb-3">
          <label for="sign-up-name" class="text-muted">Name</label>
          <input class="form-control form-control-lg mt-2 rounded-3" id="sign-up-name" name="name" :value="old('name')" required autofocus autocomplete="name">
        </div>
        <!-- Email -->
        <div class="mb-3">
          <label for="sign-up-email" class="text-muted">Email</label>
          <input type="email" class="form-control form-control-lg mt-2 rounded-3" id="sign-up-email" name="email"
            :value="old('email')" required autofocus autocomplete="email">
        </div>
        <!-- Password -->
        <div class="mb-3">
          <div class="d-flex justify-content-between">
            <label for="sign-up-password" class="text-muted">Password</label>
            <button class="btn btn-sm shadow-none text-black-50" type="button" data-tm-target="#sign-up-password"
              data-tm-toggle="password"><i class="fa-solid fa-eye me-1"></i><span>Show</span></button>
          </div>
          <input type="password" class="form-control form-control-lg mt-2 rounded-3" name="password" id="sign-up-password" :value="old('password')" required autofocus autocomplete="password">
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between">
            <label for="sign-up-password" class="text-muted">Confirm Password</label>
            <button class="btn btn-sm shadow-none text-black-50" type="button" data-tm-target="#sign-up-cpassword"
              data-tm-toggle="password"><i class="fa-solid fa-eye me-1"></i><span>Show</span></button>
          </div>
          <input type="password" class="form-control form-control-lg mt-2 rounded-3" name="password_confirmation" id="sign-up-cpassword" :value="old('password_confirmation')" required autofocus autocomplete="password_confirmation">
        </div>

        <!-- Sign-up Button -->
        <button class="w-100 mb-3 btn btn-lg rounded-3 btn-primary py-3 fw-medium" type="submit">Sign Up</button>
        <small class="text-black fs-6 mb-2">By continuing, you agree to the <a href="{{ url('terms-of-use') }}" class="text-warning-hover">Terms of use</a> and <a href="{{ url('privacy-policy') }}" class="text-warning-hover">Privacy Policy</a>.</small>
      </div>

      <!-- Forgot Password -->
      <div class="mx-md-5 mt-4 d-flex justify-content-end">
        <a href="{{ url('login') }}" class="text-warning-hover">Already have an account?</a>
      </div>
    </form>
  </main>

  @include('theme_1.layouts.footer')