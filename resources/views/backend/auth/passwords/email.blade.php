{{--  @extends('backend.auth.master')

@section('stylesheets')
<style>

.bg-login-image {
  background: url("{{ asset('public/admin/img/bg-login-image.png') }}");
  background-position: center;
  background-size: cover;
}
</style>
@endsection

@section('content')
<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
              </div>
              @if (Session::has('status'))
              <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {!! Session::get('status') !!}
              </div>
              @endif
              <form class="user"  method="POST" action="{{ route('admin.password.email') }}">
                @csrf

                <div class="form-group">
                  <input type="email" class="form-control form-control-user {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter Email Address..."  value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>
                
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Send Password Reset Link
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="{{ route('admin.login') }}">Login</a>

                <br>
                <br>
                <p>©{{ date('Y') }} All Rights Reserved. Hire Gallaxy</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
@endsection  --}}

@extends('backend.auth.auth_master')

@section('title')
    Forget Password | Akij Career 
@endsection

@section('login-content')
    <div class="authentication-box">
                        
        <div class="card mt-0">
            <div class="card-body">
            <div class="text-center mb-2"><img src="{{ asset('public/backend/images/logo-sm.png') }}" alt=""></div>
            <div class="text-center">
                <h4>Forget Password</h4>
            </div>
            <form class="theme-form" action="{{ route('admin.password.email') }}" method="post">
                @csrf
                @include('backend.layouts.partials.messages')
                @if (Session::has('success'))
                <div class="row justify-content-center">
                  <div class="col-md-12">
                    <div class="alert alert-success">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      {!! Session::get('success') !!}
                    </div>
                  </div>
                </div>
                @endif
                <div class="form-group">
                    <input class="form-control" type="text" name="email" id="email" required placeholder="Enter your email address">
                </div>

                <div class="form-group form-row mt-3 mb-0">
                    <button class="btn btn-primary btn-block" type="submit">
                      Send Password Reset Link
                    </button>
                </div>

                <div class="form-group form-row mt-3 mb-0 float-right ">
                    <p class="width-100">
                        <a href="{{ route('admin.login') }}">Check Login</a>
                    </p>
                </div>
                <div class="clearfix"></div>
            </form>
            </div>
        </div>
    </div> <!-- end authentication box -->
@endsection
