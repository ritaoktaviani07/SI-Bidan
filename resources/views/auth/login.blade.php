@extends('layouts.maze.auth')
@section('title_page', 'Login')

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
        <h1 class="auth-subtitle">{{ __('Login') }}</h1>
        <p class="auth mb-5">{{ __('Login dengan data yang Anda masukkan saat pendaftaran.') }}</p>

        <form method="POST" action="{{ route('login') }}">
          @csrf

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

          <div class="form-check form-check-lg d-flex align-items-end">
            <input class="form-check-input me-2" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label text-gray-600" for="remember">
              {{ __('Remember Me') }}
            </label>
          </div>

          <button class="btn btn-primary btn-block btn-sm shadow-lg mt-5" type="submit">
            {{ __('Login') }}
          </button>

        </form>

        <div class="text-center mt-5 text-sm ">
          @if (Route::has('register'))
          <p class="text-gray-600">{{ __('Belum punya akun?') }} <a href="{{ route('register') }}" class="font-bold">{{ __('Register') }}</a>.</p>
          @endif

          @if (Route::has('password.request'))
          <p><a class="font-bold" href="{{ route('password.request') }}">{{ __('Anda Lupa Password?') }}</a>.</p>
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
