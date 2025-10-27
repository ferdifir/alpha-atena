<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>@stack('title')</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/jquery-easyui/themes/metro-blue/easyui.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/jquery-easyui/themes/icon.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/menu-accordion.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome/all.min.css') }}" />
  <link href="https://fonts.googleapis.com/css?family=Acme|Heebo|Hind|Nunito+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/loader.css') }}" />
  @stack('css')
  <!-- SET GLOBAL BASE URL -->
  <script>
    var base_url = '{{ url('') }}/';
    var decimaldigitqty = '';
    var decimaldigitamount = '';
    var csrf_token = '{{ csrf_token() }}';
  </script>
</head>

<body>
  <!-- Loading start -->
  <div id="mask-loader">
    <svg class="loader-spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
      <circle class="loader-path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33"
        r="30"></circle>
    </svg>
  </div>
  <!-- Loading end -->

  @yield('content')

  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/jquery.easyui.min.js') }}"></script>
  {{-- <script type="text/javascript" src="{{ asset('assets/jquery-easyui/jquery.easyui.theme.v1.js') }}"></script> --}}
  {{-- <script type="text/javascript" src="{{ asset('assets/jquery-easyui/plugins/datagrid-cellediting.js') }}"></script> --}}
  <script type="text/javascript" src="{{ asset('assets/js/function.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/accounting.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/jquery.PrintArea.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/menu-accordion.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/globalvariable.js') }}"></script>
  <script src="{{ asset('assets/js/api-url.js') }}"></script>
  @stack('js')
</body>

</html>
