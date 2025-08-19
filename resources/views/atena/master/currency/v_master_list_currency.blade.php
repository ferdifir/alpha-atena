@extends('template.app')

@section('content')
    <div class="easyui-layout" style="width:100%;height:100%;">
        <div class="btn-group-transaksi" data-options="region: 'west'" style="width: 50px">
            <a id="btn_tambah" href="#" title="Tambah" class="easyui-linkbutton easyui-tooltip" onclick="before_add()">
                <img src="{{ asset('assets/images/add.png') }}">
            </a>
            <a id="btn_hapus" href="#" title="Hapus" class="easyui-linkbutton easyui-tooltip"
                onclick="before_delete()">
                <img src="{{ asset('assets/images/cancel.png') }}">
            </a>
            <a id="btn_refresh" href="#" title="Refresh Data" class="easyui-linkbutton easyui-tooltip"
                onclick="refresh_data()">
                <img src="{{ asset('assets/images/refresh.png') }}">
            </a>
        </div>
        <div data-options="region: 'center'">
            <div id="tab_transaksi" class="easyui-tabs" style="width:100%;height:100%;">
                <div title="Grid" id="Grid">
                    <div class="easyui-layout" style="width:100%;height:100%" fit="true">
                        <div data-options="region:'center',">
                            <table id="table_data" idField="idcurrency"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FORM SUBMIT KIRIM DATA UNTUK TAMBAH DAN UBAH -->
    {{-- <form method="post" action="atena/Master/Data/Currency/getFormLink/" target="Form"
        id="form_data">
        <input type="hidden" id="mode" name="mode">
        <input type="hidden" id="view" name="view">
        <input type="hidden" id="data" name="data">
    </form> --}}
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-filter/datagrid-filter.js') }}">
    </script>
    <script>
        var counter = 0;

        function disable_button() {
            $('#btn_refresh').linkbutton('disable');
            $('#btn_hapus').linkbutton('disable');
        }

        function enable_button() {
            $('#btn_refresh').linkbutton('enable');
            $('#btn_hapus').linkbutton('enable');
        }

        $(document).ready(function() {
            //WAKTU BATAL DI GRID, tidak bisa close
            //PRINT GRID
            $("#table_data").datagrid({
                onSelect: function() {
                    row = $('#table_data').datagrid('getSelected');
                }
            });

            //PRINT TAB
            $("#tab_transaksi").tabs({
                onSelect: function() {
                    var tab_title = $('#tab_transaksi').tabs('getSelected').panel('options').title;

                    if (tab_title == 'Grid') {
                        enable_button();
                    }
                }
            });

            buat_table();
          tutupLoader();
        });

        shortcut.add('F2', function() {
            before_add();
        });
        shortcut.add('F4', function() {
            before_edit();
        });
        shortcut.add('F8', function() {
            simpan();
        });

        function before_add() {
            $('#mode').val('tambah');
            get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
                if (data.data.tambah == 1) {
                    parent.buka_submenu(null, 'Tambah Mata Uang',
                        '{{ route('atena.master.currency.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
                        'fa fa-plus');
                } else {
                    $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
                }
            });
        }

        function before_edit() {
            $('#mode').val('ubah');
            get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
                if (data.data.ubah == 1 || data.data.hakakses == 1) {
                    parent.buka_submenu(null, row.namacurrency,
                        '{{ route('atena.master.currency.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' +
                        row.uuidcurrency,
                        'fa fa-pencil');
                } else {
                    $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
                }
            });
        }

        function before_delete() {
            $('#mode').val('hapus');
            get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
                if (data.data.hapus == 1) {
                    hapus();
                } else {
                    $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
                }
            });
        }

        function hapus() {
            if (row) {
                $.messager.confirm('Confirm', 'Anda Yakin Menghapus Data Ini ?',async function(r) {
                    if (r) {
                        try {
                            const response = await fetch(link_api.hapusCurrency, {
                                method: 'POST',
                                headers: {
                                    'Authorization': 'bearer {{ session('TOKEN') }}',
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    uuidcurrency: row.uuidcurrency,
                                    kodecurrency: row.kodecurrency,
                                }),
                            }).then(response => {
                                if (!response.ok) {
                                    throw new Error(
                                        `HTTP error! status: ${response.status} from ${url}`);
                                }
                                return response.json();
                            })

                            if (response.success) {
                                $.messager.alert('Info', response.message, 'info');
                                refresh_data();
                            } else {
                                $.messager.alert('Error', response.message, 'error');
                            }
                        } catch (error) {
                            $.messager.alert('Error', error, 'error');
                        }
                    }
                });
            }
        }

        function buat_table() {
            $('#table_data').datagrid({
                remoteFilter: true,
                fit: true,
                singleSelect: true,
                striped: true,
                pagination: true,
                pageSize: 20,
                clientPaging: false,
                // url:link_api.loadDataGridCurrency,
                onBeforeLoad: function(param) {
                    var dg = $(this);

                    // Tampilkan loading manual
                    dg.datagrid('loading');
                    var opts = $(this).datagrid('options');
                    $.ajax({
                        type: opts.method,
                        url: link_api.loadDataGridCurrency,
                        data: param,
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('Authorization',
                                'bearer {{ session('TOKEN') }}'
                            );
                        },
                        success: function(data) {
                            $('#table_data').datagrid('loadData', data.data);
                        },
                        complete: function() {
                            // Sembunyikan loading
                            dg.datagrid('loaded');
                        }
                    });
                    return false; // Supaya EasyUI tidak melakukan AJAX ganda
                },
                rowStyler: function(index, row) {
                    if (row.status == 0) return 'background-color:#a8aea6';
                },
                frozenColumns: [
                    [{
                            field: 'idcurrency',
                            hidden: true
                        },
                        {
                            field: 'kodecurrency',
                            title: 'Kode',
                            width: 80,
                            sortable: true,
                        },
                        {
                            field: 'namacurrency',
                            title: 'Nama',
                            width: 200,
                            sortable: true,
                        },
                    ]
                ],
                columns: [
                    [{
                            field: 'simbol',
                            title: 'Simbol',
                            width: 60,
                            sortable: true,
                        },
                        {
                            field: 'userbuat',
                            title: 'User Entry',
                            width: 150,
                            sortable: true
                        },
                        {
                            field: 'tglentry',
                            title: 'Tgl. Input',
                            width: 120,
                            sortable: true,
                            formatter: ubah_tgl_indo,
                            align: 'center',
                        },
                        {
                            field: 'status',
                            title: 'Aktif',
                            align: 'center',
                            sortable: true,
                            formatter: format_checked,
                        }
                    ]
                ],
                onDblClickRow: function(index, row) {
                    before_edit();
                },
            }).datagrid('enableFilter',[{
                field: 'status',
                type: 'combobox',
                options: {
                    data: [{
                        value: '',
                        text: 'All'
                    }, {
                        value: "1",
                        text: 'Aktif'
                    }, {
                        value: "0",
                        text: 'Non-aktif'
                    }],
                    onChange: function(value) {
                        if (value == '') {
                            $('#table_data').datagrid('removeFilterRule', 'status');
                        } else {
                            $('#table_data').datagrid('addFilterRule', {
                                field: 'status',
                                op: 'equal',
                                value: value
                            });
                        }
                        $('#table_data').datagrid('doFilter');
                    }
                }
            }]);
        }

        function refresh_data() {
            $('#table_data').datagrid('reload');
        }

        function changeTitleTab(mode) {
            //DAPATKAN INDEXNYA untuk DIGANTI TITLE
            var tab = $('#tab_transaksi').tabs('getSelected');
            var tabIndex = $('#tab_transaksi').tabs('getTabIndex', tab);
            var tabForm = $('#tab_transaksi').tabs('getTab', tabIndex);

            if (mode == 'tambah') {
                $('#tab_transaksi').tabs('update', {
                    tab: tabForm,
                    type: 'header',
                    options: {
                        title: 'Tambah'
                    }
                });
            } else if (mode == 'ubah') {
                $('#tab_transaksi').tabs('update', {
                    tab: tabForm,
                    type: 'header',
                    options: {
                        title: 'Ubah'
                    }
                });
            }
        }

        function tutupTab() {
            //DAPATKAN TAB dan INDEXNYA untuk DIHAPUS
            var tab = $('#tab_transaksi').tabs('getSelected');
            var index = $('#tab_transaksi').tabs('getTabIndex', tab);
            if (index != 0) {
                $('#tab_transaksi').tabs('close', index);
            }
        }

        function reload() {
            //PELU BUAT SIMPEN INDEX
            $('#table_data').datagrid('reload');
        }
    </script>
@endpush
