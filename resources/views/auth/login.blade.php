@extends('user.layouts.auth')
@section('content')
  <!-- Header -->
  <div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
      <div class="header-body text-center mb-2 mt--3 pb-5">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-6">
            <h1 class="text-white">Welcome to HAWK</h1>
            <p class="text-lead text-light">You are safe here</p>
          </div>
        </div>
      </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
      <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </div>
  <!-- register -->
  <div class="container mt--8 pb-5">
    <!-- Table -->
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              Login Now
            </div>

            <form role="form" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              {{-- email --}}
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Email" type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
              </div>
              {{-- password --}}
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input id="password" class="form-control" placeholder="Password" type="password" name="password" required>
                </div>
              </div>
              {{-- auto remember me --}}
              <input type="checkbox" name="remember" checked hidden>
              <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
