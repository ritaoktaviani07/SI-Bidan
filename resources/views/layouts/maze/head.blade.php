<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }} | @yield('title_page')</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('vendor/maze/css/main/app.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/maze/css/main/app-dark.css') }}">
  <link rel="shortcut icon" href="{{ asset('vendor/maze/images/logo/favicon.svg') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('vendor/maze/images/logo/favicon.png') }}" type="image/png">
  @yield('css')
</head>