<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <!-- Bootstrap core CSS     -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('backend/css/material-dashboard.min.css') }}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('backend/css/demo.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />
    <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet' type='text/css'>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> --}}
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    @stack('css')
</head>
<body>
    <div id="app">
        <div class="wrapper">
            @if (Request::is('admin*'))
                @include('layouts.partial.sidebar')

            @endif

    <div class="main-panel">
        @if (Request::is('admin*'))
            @include('layouts.partial.navbar')
        @endif


       @yield('content')


    </div>
  </div>

    </div>

   <!-- Scripts -->
    <!--   Core JS Files   -->
    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/js/material.min.js') }}" type="text/javascript"></script>
    <!--  Charts Plugin -->
    <script src="{{ asset('backend/js/chartist.min.js') }}"></script>
    <!--  Dynamic Elements plugin -->
    <script src="{{ asset('backend/js/arrive.min.js') }}"></script>
    <!--  PerfectScrollbar Library -->
    <script src="{{ asset('backend/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('backend/js/bootstrap-notify.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="{{ asset('backend/js/material-dashboard.js') }}"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('backend/js/demo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script>
        @if(Session::has('success')) {
            toastr.success("{{Session::get('success')}}")
        }
        @endif
    </script>

    @stack('scripts')
</body>
</html>
