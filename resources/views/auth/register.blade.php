@extends('layouts.maze.auth')
@section('title_page', 'Register')

@section('css')
  <link rel="stylesheet" href="{{ asset('vendor/maze/css/pages/auth.css') }}">
@endsection

@section('content')
<div id="auth">
  <div class="row h-100">

    <div class="col-lg-5 col-12">
      <div id="auth-left">
        {{-- <div class="auth-logo">
          <a href="{{ route('landing') }}"><img src="{{ asset('vendor/maze/images/logo/logo.svg') }}" alt="Logo"></a>
        </div> --}}
        <h1 class="auth-subtitle">{{ __('Register') }}</h1>
        <p class="auth mb-5">{{ __('Masukkan data Anda untuk mendaftar ke website kami.') }}</p>
        
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-l @error('name') is-invalid @enderror" placeholder="{{ __('Nama Anda') }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            <div class="form-control-icon">
              <i class="bi bi-person"></i>
            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group position-relative has-icon-left mb-4">
            <input type="email" class="form-control form-control-l @error('email') is-invalid @enderror" placeholder="{{ __('Email Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <div class="form-control-icon">
              <i class="bi bi-envelope"></i>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-l @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">
            <div class="form-control-icon">
              <i class="bi bi-shield-lock"></i>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-l" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autocomplete="new-password">
            <div class="form-control-icon">
              <i class="bi bi-shield-lock"></i>
            </div>
          </div>

          <button class="btn btn-primary btn-block btn-md shadow-lg mt-5" type="submit">
            {{ __('Register') }}
          </button>
        
        </form>

        <div class="text-center mt-5 text-sm ">
          @if (Route::has('login'))
          <p class="text-gray-600">{{ __('Sudah punya akun?') }} <a href="{{ route('login') }}" class="font-bold">{{ __('Login') }}</a>.</p>
          @endif
        </div>

      </div>
    </div>
    
    <div class="col-lg-7 d-none d-lg-block">
      <div id="auth-right"></div>
    </div>
  </div>
</div>
@endsection
