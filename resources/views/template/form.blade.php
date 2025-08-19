<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/jquery-easyui/themes/metro-blue/easyui.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/jquery-easyui/themes/icon.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/loader.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/menu-accordion.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Acme|Heebo|Hind|Nunito+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    </head>

    <body style="padding-left: 16px">
        <!-- Loading start -->
        <div id="mask-loader">
            <div style="text-align: center">
                <svg class="loader-spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                    <circle class="loader-path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
                </svg>
            </div>
        </div>
        <!-- Loading end -->

        <!-- Loading simpan start -->
        <div id="mask-loader-simpan" hidden>
            <div style="text-align: center" class="wrapper">
                <div>
                    <svg class="loader-spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                        <circle class="loader-path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
                    </svg>

                    <h1 style="font-size: 16px">Proses menyimpan ...</h1>
                </div>
            </div>
        </div>
        <!-- Loading simpan end -->

        @yield('content')

        <!-- SET GLOBAL BASE URL DAN PERUSAHAAN -->
        <script>
            var base_url = '{{ url('') }}/';
            var decimaldigitqty = {{ session('DECIMALDIGITQTY') }};
            var decimaldigitamount = {{ session('DECIMALDIGITAMOUNT') }};
            var csrf_token = '{{ csrf_token() }}';
        </script>

        <script type="text/javascript" src="{{ asset('assets/jquery-easyui/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/jquery-easyui/jquery.easyui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extra/jquery.easyui.theme.v1.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-cellediting/datagrid-cellediting.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/function.js?time=' . time()) }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/accounting.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/jquery.PrintArea.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/menu-accordion.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/jquery.mask.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/globalvariable.js') }}"></script>
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
                    const parsed = JSON.parse(data);
                    return JSON.stringify(parsed.data);
                }
            });
        </script>
        @stack('js')
    </body>
</html>
