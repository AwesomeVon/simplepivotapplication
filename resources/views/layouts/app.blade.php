<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <title id="e39gh5D3kt"></title>
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

      <script src="{{ asset('js/jq32.min.js') }}"></script>
      <script src="{{ asset('js/grc.js') }}"></script>
      <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.css">
      <script type="text/javascript" charset="utf8" src="./js/jquery.dataTables.js"></script>
      <script type="text/javascript">
         $(document).ready(function () {
             $('#dataTable').DataTable({
                  "ordering": false,
                  "aLengthMenu": [[10, 20, 50, 100, -1], [10, 20, 50, 100, "All"]],
                  "iDisplayLength": 20
             });
         });
      </script>

      <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/tm-icon.css') }}" rel="stylesheet">
      {{--   
      <link href="{{ asset('css/theme/tm-icon.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/ns-select.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/owl-carousel.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/gij.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/all.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/tg-input.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/dt-picker.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/vc-map.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/scrollable.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/jq-datatable.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/dt-responsive.min.css') }}" rel="stylesheet">
      
      --}}
       <link href="{{ asset('css/theme/all.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/sm-bs4.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/morris.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/mt-icon.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/mt-menu.css') }}" rel="stylesheet">
      <link href="{{ asset('css/theme/style1.css') }}" rel="stylesheet">
      <script type="text/javascript">
         var BASE_URL = '{{ url('/') }}';
         var CSRF_TOKEN = '{{ csrf_token() }}';
         var ASSETS = '{{ asset('/') }}';
      </script>
      <script src="{{ asset('js/sweetalert.min.js')}}"></script>
      <script src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>
      <script src="{{ asset('js/swal2.min.js')}}"></script>
      <script src="{{ asset('js/select2.min.js')}}"></script>
   </head>
   <body class="crm_body_bg">
      <div class="pcoded-main-container">
         <div class="pcoded-content">
            @include('layouts._addons._header')
            @include('layouts._addons._menu')
            @yield('content')
         </div>
         @yield('script')
      </div>
      <script src="{{ asset('js/ui/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/theme/popper.min.js')}}"></script>
      <script src="{{ asset('js/theme/mt-menu.js')}}"></script>
      
      <script src="{{ asset('js/theme/jq-waypoint.min.js')}}"></script>
      <script src="{{ asset('js/theme/jq-chart.min.js')}}"></script>
      <script src="{{ asset('js/theme/jq-counterup.min.js')}}"></script>
      <script src="{{ asset('js/theme/ns-select.min.js')}}"></script>
      <script src="{{ asset('js/theme/chart.min.js')}}"></script>
      <script src="{{ asset('js/theme/chart-roundedbar.min.js')}}"></script>
      <script src="{{ asset('js/theme/jq-barfiller.js')}}"></script>
      <script src="{{ asset('js/theme/tags-input.js')}}"></script>
      <script src="{{ asset('js/theme/sm-bs4.js')}}"></script>
      <script src="{{ asset('js/theme/am-chart.js')}}"></script>
      <script src="{{ asset('js/theme/perfect-scrollbar.min.js')}}"></script>
      <script src="{{ asset('js/theme/scrollable-custom.js')}}"></script>
      <script src="{{ asset('js/theme/core.js')}}"></script>
      <script src="{{ asset('js/theme/animated.js')}}"></script>
      <script src="{{ asset('js/theme/r.js')}}"></script>
      <script src="{{ asset('js/theme/chart-custom.js')}}"></script>
      <script src="{{ asset('js/theme/dashboard-int.js')}}"></script>
      <script src="{{ asset('js/theme/custom.js')}}"></script>
      <script src="{{ asset('js/ui/ripple.js') }}"></script>
      <script src="{{ asset('js/ui/pcoded.min.js') }}"></script>
      <script src="{{ asset('js/timeago.js') }}" type="text/javascript"></script>
      @yield('scripts')
   </body>
</html>