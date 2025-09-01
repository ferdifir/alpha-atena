<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($menu) ? $menu : 'Aplikasi Usaha Optik Online' }}</title>
    <link rel="icon" href="{{ asset('assets/images/logo_app_white.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/jquery-easyui/themes/metro-blue/easyui.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/jquery-easyui/themes/icon.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nav-modul.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/loader.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/menu-accordion.css') }}" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Acme|Heebo|Hind|Nunito+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:900|Heebo:900&display=swap" rel="stylesheet">
    @stack('css')
    <style>
        .icon-wa {
            background-image: url('{{ asset('assets/images/whatsapp.png') }}');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center center;
        }
    </style>

    <script>
        var base_url = '{{ url('') }}/';
        // var decimaldigitqty = {{ session('DECIMALDIGITQTY') }};
        // var decimaldigitamount = {{ session('DECIMALDIGITAMOUNT') }};
        var decimaldigitqty = 2;
        var decimaldigitamount = 2;
        var csrf_token = '{{ csrf_token() }}';
        var warna_status_s = '{{ session('WARNA_STATUS_S') }}';
        var warna_status_p = '{{ session('WARNA_STATUS_P') }}';
        var warna_status_d = '{{ session('WARNA_STATUS_D') }}';
    </script>
</head>

<body class="easyui-layout">

    <!-- Loading start -->
    <div id="mask-layout-loader">
        <svg class="loader-spinner" width="65px" height="65px" viewBox="0 0 66 66"
            xmlns="http://www.w3.org/2000/svg">
            <circle class="loader-path" fill="none" stroke-width="6" stroke-linecap="round" cx="33"
                cy="33" r="30"></circle>
        </svg>
    </div>
    <!-- Loading end -->

    <!-- Region center start -->
    <div data-options="region:'center',border: false" id="v_modul">
        <!-- Loading simpan start -->
        <div id="mask-loader" hidden>
            <div style="text-align: center" class="wrapper">
                <div>
                    <svg class="loader-spinner" width="65px" height="65px" viewBox="0 0 66 66"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle class="loader-path" fill="none" stroke-width="6" stroke-linecap="round"
                            cx="33" cy="33" r="30"></circle>
                    </svg>
                </div>
            </div>
        </div>
        <!-- Loading simpan end -->
        @yield('content')

    </div>

    <script type="text/javascript" src="{{ asset('assets/jquery-easyui/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/jquery-easyui/jquery.easyui.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/jquery-easyui/extension/datagrid-cellediting/datagrid-cellediting.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/function.js?time=' . time()) }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/accounting.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.PrintArea.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/globalvariable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-filter/datagrid-filter.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.mask.js') }}"></script>

    {{-- <script type="text/javascript" src="{{ asset('assets/js/menu-accordion.js') }}"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('assets/jquery-easyui/plugins/datagrid-filter.js') }}"></script> --}}
    <script>
        const originalOpen = XMLHttpRequest.prototype.open;
        const originalSend = XMLHttpRequest.prototype.send;
        XMLHttpRequest.prototype.open = function(method, url, async, user, password) {
            originalOpen.apply(this, arguments);
            const token = '{{ session('TOKEN') }}';
            this.setRequestHeader('Authorization', 'bearer ' + token);
        };

        $.ajaxSetup({
            dataFilter: function(data, type) {
                if (type == 'json') {
                    const parsed = JSON.parse(data);
                    return JSON.stringify(parsed.data);
                }
            }
        });
        $(document).ready(function() {
            // Menghapus loading ketika halaman sudah dimuat
            setTimeout(function() {
                $('#mask-layout-loader').fadeOut(500, function() {
                    $(this).remove()
                })
            }, 150)
        });
    </script>

    @stack('js')
</body>

</html>
