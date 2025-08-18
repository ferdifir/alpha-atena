@extends('template.app')

@section('content')
    <style>
        .tree-icon {
            display: none;
        }
    </style>
    <div class="easyui-layout" style="width:100%;height:100%;">
        {{-- <div style="height:30px; padding:5px; background-color:white;">
            <label class="font-header-menu"> Grid</label>
        </div> --}}

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
                {{-- <div title="Grid" id="Grid">
                    <div class="easyui-tabs" plain='true' fit="true"
                        data-options="
					onSelect:function(title) {
						if (title=='Tree View') {
							$('#tv_kode_perkiraan').tree('reload')
						}
					}"> --}}
                <div title="Grid View">
                    <div class="easyui-layout" style="width:100%;height:100%" fit="true">
                        <div data-options="region:'center',">
                            <table id="table_data" idField="kodeperkiraan"></table>
                        </div>
                    </div>
                </div>
                <div title="Tree View">
                    <div class="easyui-layout" style="width:100%;height:100%" fit="true">
                        <div data-options="region:'center',">
                            <div id="tv_kode_perkiraan" style="height:454px"></div>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
    </div>

    <!-- FORM SUBMIT KIRIM DATA UNTUK TAMBAH DAN UBAH -->
    <form method="get" action="{{ route('atena.master.perkiraan.form', ['kodemenu' => $kodemenu]) }}" target="Form"
        id="form_data">
        @csrf
        <input type="hidden" id="mode" name="mode">
        <input type="hidden" id="view" name="view">
        <input type="hidden" id="data" name="data">
    </form>
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-filter/datagrid-filter.js') }}">
    </script>
    <script>
        var counter = 0;
        $(document).ready(async function() {
            bukaLoader();
            let check=false;
            await getConfig("KODEPERKIRAAN", "MPERKIRAAN", 'bearer {{ session('TOKEN') }}',
                function(response) {
                    if (response.success) {
                        config = response.data;
                        check=true;
                    } else {
                        if ((response.message ?? "").toLowerCase() == "Token tidak valid") {
                            window.alert("Login session sudah habis. Silahkan Login Kembali");
                        } else {
                            $.messager.alert('Error', error, 'error');
                        }
                    }
                },function(error){
                    $.messager.alert('Error', "Request Config Error", 'error');
                });
            if(!check)return;
            tutupLoader();
            $("#table_data").datagrid({
                onSelect: function() {
                    row = $('#table_data').datagrid('getSelected');
                }
            });

            $("#tab_transaksi").tabs({
                onSelect: function() {
                    var tab_title = $('#tab_transaksi').tabs('getSelected').panel('options').title

                    if (tab_title == 'Grid View') {
                        enable_button();
                    } else {
                        disable_button();
                    }
                }
            });

            // create_form_login();
            buat_table();
            await buat_tree();
        });

        async function buat_tree() {
            var dataTree = [];

            try {
                const response = await fetch(link_api.treeMasterPerkiraan, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status} from ${url}`);
                    }
                    return response.json();
                })
                if (response.success) {
                    var dataTree1 = [];
                    response.data.forEach(data1 => {
                        var dataTree2 = [];
                        if (data1.children.length > 0) {
                            data1.children.forEach(data2 => {
                                var dataTree3 = [];
                                if (data2.children.length > 0) {
                                    data2.children.forEach(data3 => {
                                        dataTree3.push({
                                            "id": data3.uuidperkiraan,
                                            "text": data3.text,
                                            "state": "opened",
                                            "children": [],
                                        });
                                    });
                                }
                                dataTree2.push({
                                    "id": data2.uuidperkiraan,
                                    "text": data2.text,
                                    "state": "opened",
                                    "children": dataTree3
                                });
                            });
                        }
                        dataTree1.push({
                            "id": data1.uuidperkiraan,
                            "text": data1.text,
                            "state": "opened",
                            "children": dataTree2
                        });
                    });
                    dataTree = dataTree1;
                } else {
                    $.messager.alert('Error', response.message, 'error');
                }


            } catch (error) {
                $.messager.alert('Error', error, 'error');
                console.log(error);
            }

            $('#tv_kode_perkiraan').tree({
                lines: true,
                animate: false,
                data: dataTree,
            });
        }

        shortcut.add('F2', function() {
            before_add();
        });
        shortcut.add('F4', function() {
            before_edit();
        });

        function disable_button() {
            $('#btn_refresh').linkbutton('disable')
            $('#btn_hapus').linkbutton('disable')
        }

        function enable_button() {
            $('#btn_refresh').linkbutton('enable')
            $('#btn_hapus').linkbutton('enable')
        }

        function before_add() {
            $('#mode').val('tambah');
            get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}',function(data) {
                if (data.success && data.data.tambah == 1) {
                    parent.buka_submenu(null, 'Tambah Perkiraan Akuntansi',
                        '{{ route('atena.master.perkiraan.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
                        'fa fa-plus')

                } else {
                    $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
                }
            });
        }

        function before_edit() {
            $('#mode').val('ubah');
            get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}',function(data) {
                if (data.success && (data.data.ubah == 1 || data.data.hakakses == 1)) {
                    counter++;

                    //PELU BUAT SIMPEN INDEX
                    var row = $('#table_data').datagrid('getSelected');
                    parent.buka_submenu(null, row.namaperkiraan,
                        '{{ route('atena.master.perkiraan.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' +
                        row.uuidperkiraan,
                        'fa fa-pencil');
                } else {
                    $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
                }
            });
        }

        function before_delete() {
            $('#mode').val('hapus');
            get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
                if (data.success && data.data.hapus == 1) {
                    hapus();
                } else {
                    $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
                }
            });
        }

        function hapus() {
            if (row) {
                $.messager.confirm('Confirm', 'Anda Yakin Menghapus Data Ini ?', async function(r) {
                    if (r) {
                        try {
                            const response = await fetch(link_api.hapusPerkiraan, {
                                method: 'POST',
                                headers: {
                                    'Authorization': 'bearer {{ session('TOKEN') }}',
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    uuidperkiraan: row.uuidperkiraan
                                }),
                            }).then(response => {
                                if (!response.ok) {
                                    throw new Error(
                                        `HTTP error! status: ${response.status} from ${url}`);
                                }
                                return response.json();
                            })

                            if (response.success) {
                                // tutupTab();
                                refresh_data();
                                // $('#INDUK').combogrid('grid').datagrid('reload');
                            } else {
                                $.messager.alert('Error', msg.message, 'error');
                            }
                        } catch (error) {
                            $.messager.alert('Error', error, 'error');
                        }
                    }
                });
            }
        }

        function buat_table() {
            var dg = $('#table_data').datagrid({
                remoteFilter: true,
                fit: true,
                singleSelect: true,
                striped: true,
                nowrap: false,
                pagination: true,
                clientPaging:false,
                pageSize: 20,
                sortName: 'kodeperkiraan',
                remoteFilter: true,
                queryParams: {
                    _token: csrf_token
                },
                rowStyler: function(index, row) {
                    if (row.status == 0) {
                        return 'background-color: #a8aea6';
                    }
                },
                onBeforeLoad: function(param) {
                    var dg = $(this);

                    // Tampilkan loading manual
                    dg.datagrid('loading');
                    var opts = $(this).datagrid('options');
                    $.ajax({
                        type: opts.method,
                        url: link_api.loadDataGridMasterPerkiraan,
                        data: param,
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('Authorization',
                                'bearer {{ session('TOKEN') }}'
                            );
                        },
                        success: function(data) {
                            $('#table_data').datagrid('loadData', data.data??[]);
                            if(data.success==false){
                                $.messager.alert('Error', data.message, 'error');
                            }
                        },
                        complete: function() {
                            // Sembunyikan loading
                            dg.datagrid('loaded');
                        }
                    });
                    return false; // Supaya EasyUI tidak melakukan AJAX ganda
                },
                frozenColumns: [
                    [{
                            field: 'uuidperkiraan',
                            hidden: true
                        },
                        {
                            field: 'kodeperkiraan',
                            title: 'Kode',
                            width: 70,
                            sortable: true,
                        },
                        {
                            field: 'namaperkiraan',
                            title: 'Nama',
                            width: 200,
                            sortable: true,
                        },
                    ]
                ],
                columns: [
                    [{
                            field: 'kelompok',
                            title: 'Kelompok',
                            width: 100,
                            sortable: true,
                        },
                        {
                            field: 'saldo',
                            title: 'Saldo',
                            width: 60,
                            sortable: true,
                        },
                        {
                            field: 'induk',
                            title: 'Induk',
                            width: 60,
                        },
                        {
                            field: 'namainduk',
                            title: 'Induk',
                            width: 60,
                            hidden: true
                        },
                        {
                            field: 'tipe',
                            title: 'Tipe',
                            width: 90,
                            sortable: true,
                        },
                        {
                            field: 'kasbank',
                            title: 'Kas/Bank',
                            width: 80,
                            sortable: true,
                            formatter: function(val) {
                                if (val == 0) return '';
                                else if (val == 1) return 'Kas';
                                else if (val == 2) return 'Bank';
                            }
                        },
                        {
                            field: 'kodekasbank',
                            title: 'Kode Kas/Bank',
                            width: 100,
                            hidden: true,
                        },
                        {
                            field: 'simbol',
                            title: 'Currency',
                            width: 70,
                            sortable: true,
                        },
                        {
                            field: 'akunpiutang',
                            title: 'Akun Piutang',
                            width: 100,
                            sortable: true,
                            formatter: format_checked,
                            align: 'center',
                        },
                        {
                            field: 'akunhutang',
                            title: 'Akun Hutang',
                            width: 100,
                            sortable: true,
                            formatter: format_checked,
                            align: 'center',
                        },
                        {
                            field: 'userbuat',
                            title: 'User',
                            width: 120,
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
            }).datagrid('enableFilter', [{
                field: 'akunpiutang',
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
                            dg.datagrid('removeFilterRule', 'akunpiutang');
                        } else {
                            dg.datagrid('addFilterRule', {
                                field: 'akunpiutang',
                                op: 'equal',
                                value: value
                            });
                        }
                        dg.datagrid('doFilter');
                    }
                }
            }, {
                field: 'akunhutang',
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
                            dg.datagrid('removeFilterRule', 'akunhutang');
                        } else {
                            dg.datagrid('addFilterRule', {
                                field: 'akunhutang',
                                op: 'equal',
                                value: value
                            });
                        }
                        dg.datagrid('doFilter');
                    }
                }
            },{
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
                            dg.datagrid('removeFilterRule', 'status');
                        } else {
                            dg.datagrid('addFilterRule', {
                                field: 'status',
                                op: 'equal',
                                value: value
                            });
                        }
                        dg.datagrid('doFilter');
                    }
                }
            },  ]);
        }

        function refresh_data() {
            $('#table_data').datagrid('reload');
            //JIKA BERADA PADA TAB FORM TAMBAH / UBAH
            // if ($('#tab_transaksi').tabs('getSelected').panel('options').title == "Tambah" || $('#tab_transaksi').tabs(
            //         'getSelected').panel('options').title == "Ubah") {
            //     row = {
            //         uuidperkiraan: "",
            //         kodeperkiraan: '',
            //     };

            //     $("#mode").val("tambah");
            //     $("#view").val('{{ route('atena.master.perkiraan.form', ['kodemenu' => $kodemenu]) }}');
            //     $("#data").val('');

            //     var tab_name = $('#tab_transaksi').tabs('getSelected').panel('options').title;

            //     if (tab_name == "Tambah") { //TAMBAH LANGSUNG AMBIL DARI ID

            //         var counterTambah = $('#tab_transaksi').tabs('getSelected').panel('options').id;
            //         tab_name = tab_name + "_" + counterTambah;
            //     } else { //UBAH DIAMBIL DARI ID POTONGAN
            //         var trans = $('#tab_transaksi').tabs('getSelected').panel('options').id.split("|");
            //         var counterTambah = trans[2];
            //         tab_name = tab_name + "_" + counterTambah;

            //     }

            //     var tab_title = 'Tambah';

            //     var tab = $('#tab_transaksi').tabs('getSelected');
            //     var tabIndex = $('#tab_transaksi').tabs('getTabIndex', tab);

            //     var tabTrans = $('#tab_transaksi').tabs('getTab', tabIndex);
            //     $('#form_data').attr('target', tab_name);

            //     $('#tab_transaksi').tabs('update', {
            //         tab: tabTrans,
            //         type: 'header',
            //         options: {
            //             title: tab_title,
            //             content: '<iframe frameborder="0" class="tab_form" id="' + counterTambah + '" name="' +
            //                 tab_name + '" ></iframe>',
            //             closable: true
            //         }
            //     });
            //     $('#form_data').submit();

            // } else {
            //     //JIKA DI TAB GRID
            //     $('#table_data').datagrid('reload');
            // }

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
            if ($('#tab_transaksi').tabs('getSelected').panel('options').title != "Grid") {
                $('#tab_transaksi').tabs('close', index);
            }
        }

        function reload() {
            //PELU BUAT SIMPEN INDEX
            var row = $('#table_data').datagrid('getSelected');

            if ($('#tab_transaksi').tabs('getSelected').panel('options').title == "Ubah") {
                //INDEX TAB
                var tab_name = $('#tab_transaksi').tabs('getSelected').panel('options').title;

                //ROW ID dan KODE
                var trans = $('#tab_transaksi').tabs('getSelected').panel('options').id.split("|");
                var counterTambah = trans[2];
                tab_name = tab_name + "_" + counterTambah;

                $("#mode").val("ubah");
                $("#view").val('{{ route('atena.master.perkiraan.form', ['kodemenu' => $kodemenu]) }}');
                $("#data").val(trans[0]);

                var tab = $('#tab_transaksi').tabs('getSelected');
                var tabIndex = $('#tab_transaksi').tabs('getTabIndex', tab);
                var tabTrans = $('#tab_transaksi').tabs('getTab', tabIndex);
                var tab_title = 'Ubah';
                $('#form_data').attr('target', tab_name);

                $('#tab_transaksi').tabs('update', {
                    tab: tabTrans,
                    type: 'header',
                    options: {
                        title: tab_title,
                        content: '<iframe frameborder="0" class="tab_form" id="' + counterTambah + '" name="' +
                            tab_name + '" ></iframe>',
                        closable: true
                    }
                });
                $('#form_data').submit();
            }

            $('#table_data').datagrid('reload');
        }
    </script>
@endpush
