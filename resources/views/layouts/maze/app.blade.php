<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.maze.head')

<body>
  <div id="app">
    <div id="main" class="layout-horizontal">
      
      @include('layouts.maze.header')
  
      @yield('content')
  
      @include('layouts.maze.footer')
    
    </div>
  </div>
  <script src="{{ asset('vendor/maze/js/bootstrap.js') }}"></script>
  {{-- <script src="maze/js/app.js"></script> --}}
  
  @yield('js')
  @include('sweetalert::alert')

</body>

</html>