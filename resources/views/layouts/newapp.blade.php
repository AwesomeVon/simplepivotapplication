<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">

    <title id="headerHTML">Exam</title>

    <script src="/js/jquery.min.js"></script>

    <script src="{{ asset('js/sweetalert.min.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/linear.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
   
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/solid.min.css') }}" rel="stylesheet">
    <script type="text/javascript">
        var BASE_URL = '{{ url('/') }}';
        var CSRF_TOKEN = '{{ csrf_token() }}';
        var ASSETS = '{{ asset('/') }}';
    </script>
    <script src="/js/grc.js"></script>
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
  @guest
  @else
 {{-- @include('layouts._addons._sidebar') --}}

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

 {{-- @include('layouts._addons._navbar') --}}
      @endguest
        <!-- Begin Page Content -->
   
   @yield('content')

   

      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

</body>
<script src="http://gull-html-laravel.ui-lib.com/assets/js/es5/dashboard.v1.script.js"></script>
<script src="http://gull-html-laravel.ui-lib.com/assets/js/script.js"></script>
<script src="http://gull-html-laravel.ui-lib.com/assets/js/sidebar.large.script.js"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/jquery.cookie.js')}}"> </script>
<script src="{{ asset('js/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/jquery.inputmask.bundle.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{ asset('js/template/customizer.script.js') }}"></script>
<script src="{{ asset('js/template/dashboard.v1.script.js') }}"></script>
<script src="{{ asset('js/dashboard.min.js') }}"></script>

  @guest
  @else
  <script src="{{ URL::asset('/js/modules/fSpCeZBJdDLaZZjcRJsEacd.js') }}"></script>
  @endguest
</html>
