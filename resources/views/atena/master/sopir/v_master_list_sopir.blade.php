@extends('template.app')

@section('content')
    <div class="easyui-layout" fit="true">
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
            <div class="easyui-layout" style="width:100%;height:100%" fit="true">
                <div data-options="region:'center',">
                    <table id="table_data" idField="idsopir"></table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        var counter = 0;

        function enable_button() {
            $('#btn_refresh').linkbutton('enable');
            $('#btn_hapus').linkbutton('enable');
        }

        $(document).ready(async function() {

            bukaLoader();
            let check = false;

            let config = {};
            await getConfig('KODESOPIR', 'MSOPIR', 'bearer {{ session('TOKEN') }}',
                function(response) {
                    if (response.success) {
                        config = response.data;
                        check = true;
                    } else {
                        if ((response.message ?? "").toLowerCase() == "token tidak valid.") {
                            window.alert("Login session sudah habis. Silahkan Login Kembali");
                        } else {
                            $.messager.alert('Error', error, 'error');
                        }
                    }
                },
                function(error) {
                    $.messager.alert('Error', "Request Config Error", 'error');
                });
            if (!check) return;
            tutupLoader();
            //WAKTU BATAL DI GRID, tidak bisa close
            //PRINT GRID
            $("#table_data").datagrid({
                onSelect: function() {
                    row = $('#table_data').datagrid('getSelected');
                }
            });

            buat_table();
        });

        shortcut.add('F2', function() {
            before_add();
        });
        shortcut.add('F4', function() {
            before_edit();
        });

        function before_add() {
            $('#mode').val('tambah');
            get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
                if (data.data.tambah == 1) {
                    parent.buka_submenu(null, 'Tambah Sopir',
                        '{{ route('atena.master.sopir.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
                        'fa fa-plus')
                } else {
                    $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
                }
            });
        }

        function before_edit() {
            $('#mode').val('ubah');
            get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
                if (data.data.ubah == 1 || data.data.hakakses == 1) {

                    var row = $('#table_data').datagrid('getSelected');
                    parent.buka_submenu(null, row.namasopir,
                        '{{ route('atena.master.sopir.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' +
                        row.uuidsopir,
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
            var row = $('#table_data').datagrid('getSelected');
            if (row) {
                $.messager.confirm('Confirm', 'Anda Yakin Menghapus Data Ini ?', async function(r) {
                    if (r) {
                        bukaLoader();
                        try {
                            let url = link_api.hapusSopir;
                            const response = await fetch(url, {
                                method: 'POST',
                                headers: {
                                    'Authorization': 'bearer {{ session('TOKEN') }}',
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    uuidsopir: row.uuidsopir,
                                    kode: row.kodesopir,
                                }),
                            }).then(response => {
                                if (!response.ok) {
                                    throw new Error(
                                        `HTTP error! status: ${response.status} from ${url}`);
                                }
                                return response.json();
                            })

                            if (response.success) {
                                refresh_data();
                                $.messager.alert('Info', response.message, 'info');
                            } else {
                                $.messager.alert('Error', response.message, 'error');
                            }
                        } catch (error) {
        $.messager.alert("error", getTextError(error), "error");
                        }
                        tutupLoader();
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
                url: link_api.loadDataGridSopir,
                rowStyler: function(index, row) {
                    if (row.status == 0) return 'background-color:#a8aea6';
                },
                onLoadSuccess: function() {
                    $('#table_data').datagrid('unselectAll');
                },
                frozenColumns: [
                    [{
                            field: 'uuidsopir',
                            hidden: true
                        },
                        {
                            field: 'kodesopir',
                            title: 'Kode',
                            width: 80,
                            sortable: true,
                        },
                        {
                            field: 'namasopir',
                            title: 'Nama',
                            width: 200,
                            sortable: true,
                        },
                    ]
                ],
                columns: [
                    [{
                            field: 'alamat',
                            title: 'Alamat',
                            width: 150,
                            sortable: true,
                        },
                        {
                            field: 'kota',
                            title: 'Kota',
                            width: 100,
                            sortable: true,
                        },
                        {
                            field: 'telp',
                            title: 'Telp',
                            width: 100,
                            sortable: true,
                        },
                        {
                            field: 'hp',
                            title: 'HP',
                            width: 100,
                            sortable: true,
                        },
                        //{field:'JENISKENDARAAN',title:'Jenis Kendaraan',width:100, sortable:true,},
                        //{field:'NOPOLISI',title:'No Polisi',width:100, sortable:true,},
                        {
                            field: 'catatan',
                            title: 'Catatan',
                            width: 250,
                            sortable: true,
                        },
                        {
                            field: 'userbuat',
                            title: 'User Entry',
                            width: 75,
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
            }).datagrid('enableFilter', [
        {
          field: 'tglentry',
          type: 'datebox',
          options: {
            onChange: function(value) {
              if (value) {
                $('#table_data').datagrid('addFilterRule', {
                  field: 'tglentry',
                  op: 'contains',
                  value: value.trim(),
                });
              } else {
                $('#table_data').datagrid('removeFilterRule', 'tglentry');
              }
              $('#table_data').datagrid('doFilter');
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


        function reload() {
            $('#table_data').datagrid('reload');
        }
    </script>
@endpush
