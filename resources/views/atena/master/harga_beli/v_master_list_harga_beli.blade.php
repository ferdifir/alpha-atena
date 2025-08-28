@extends('template.app')

@section('content')
    <div class="easyui-layout" fit="true">
        <div class="btn-group-transaksi" data-options="region: 'west'" style="width: 50px">
            <a id="btn_refresh" title="Refresh Data" class="easyui-linkbutton easyui-tooltip" onclick="refresh_data()">
                <img src="{{ asset('assets/images/refresh.png') }}">
            </a>
        </div>
        <div data-options="region: 'center'">
            <div id="tab_transaksi" class="easyui-tabs" style="width:100%;height:100%;">
                <div title="Grid" id="Grid">
                    <table style="padding:0px;" border="0">
                        <tr>
                            <td>
                                <div class="easyui-layout" style="width:750px;height:150px; display: inline-block;">
                                    <table id="table_supplier" name="table_supplier"></table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="easyui-layout" style="width:750px;height:150px; display: inline-block;">
                                    <table id="table_supbarang" name="table_supbarang"></table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="easyui-layout" style="width:750px;height:195px; display: inline-block;">
                                    <table id="table_hargabeli" name="table_hargabeli"></table>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript"
        src="{{ asset('assets/jquery-easyui/extension/datagrid-cellediting/datagrid-cellediting.js') }}"></script>
    <script>
        var config = {};
        var kodehargabeli;
        var rowEdit;

        function disable_button() {
            $('#btn_refresh').linkbutton('disable');
            $('#btn_hapus').linkbutton('disable');
        }

        function enable_button() {
            $('#btn_refresh').linkbutton('enable');
            $('#btn_hapus').linkbutton('enable');
        }

        $(document).ready(async function() {
            tutupLoader();
            // let check = false;
            // await getConfig('KODEHARGABELI', 'MHARGABELI', 'bearer {{ session('TOKEN') }}',
            //     function(response) {
            //         if (response.success) {
            //             config = response.data;
            //             check = true;
            //         } else {
            //             if ((response.message ?? "").toLowerCase() == "token tidak valid") {
            //                 window.alert("Login session sudah habis. Silahkan Login Kembali");
            //             } else {
            //                 $.messager.alert('Error', error, 'error');
            //             }
            //         }
            //     },
            //     function(error) {
            //         $.messager.alert('Error', "Request Config Error", 'error');
            //     });
            // if (!check) return;
            $('#v-cust-induk').hide();

            $("#form_input").dialog({
                onOpen: function() {
                    $('#form_input').form('clear');
                },
                buttons: '#dlg-buttons'
            }).dialog('close');

            $("#table_supplier").datagrid({
                width: '100%',
                height: '100%',
                clickToEdit: false,
                dblclickToEdit: true,
                singleSelect: true,
                rownumbers: true,
                data: [],
                url: link_api.loadDataGridMasterSupplier,
                onLoadSuccess: function() {
                    $('#table_data').datagrid('unselectAll');
                },
                columns: [
                    [{
                            field: 'uuidsupplier',
                            hidden: true
                        },
                        {
                            field: 'namasupplier',
                            title: 'Nama Supplier',
                            width: 240,
                        },
                        {
                            field: 'kodesupplier',
                            title: 'Kode Supplier',
                            width: 100,
                        },
                        {
                            field: 'alamat',
                            title: 'Alamat',
                            width: 250,
                        },
                        {
                            field: 'kota',
                            title: 'Kota',
                            width: 120,
                        },

                    ]
                ],
                onSelect: function(index, row) {
                    var idsup = row.uuidsupplier;
                    $('#table_supbarang').datagrid('load', {
                        uuidsupplier: idsup
                    });
                    $('#table_hargabeli').datagrid('load', []);
                },
            });

            $("#table_supbarang").datagrid({
                width: '100%',
                height: '100%',
                clickToEdit: false,
                dblclickToEdit: true,
                singleSelect: true,
                rownumbers: true,
                url: link_api.loadHargaBeliSupplierBarang,
                onLoadSuccess: function() {
                    $('#table_data').datagrid('unselectAll');
                },
                columns: [
                    [{
                            field: 'uuidsupplier',
                            hidden: true
                        },
                        {
                            field: 'uuidbarang',
                            hidden: true
                        },
                        {
                            field: 'kodesupplier',
                            title: 'Kode Supplier',
                            width: 150,
                        },
                        {
                            field: 'kodebarang',
                            title: 'Kode Barang',
                            width: 150,
                        },
                        {
                            field: 'namabarang',
                            title: 'Nama',
                            width: 300,
                        },
                    ]
                ],
                onSelect: function(index, row) {
                    var idbrg = row.uuidbarang;
                    var idsup = row.uuidsupplier;
                    $('#table_hargabeli').datagrid('load', {
                        uuidbarang: idbrg,
                        uuidsupplier: idsup
                    });
                },
            });

            function getRowIndex(target) {
                var tr = $(target).closest('tr.datagrid-row');
                return parseInt(tr.attr('datagrid-row-index'));
            }

            var indexDetail = 0;

            $("#table_hargabeli").datagrid({
                width: '100%',
                height: '100%',
                clickToEdit: false,
                dblclickToEdit: true,
                singleSelect: true,
                rownumbers: true,
                url: link_api.loadHargaBeli,
                onLoadSuccess: function() {
                    $('#table_data').datagrid('unselectAll');
                },
                toolbar: [{
                    text: 'Tambah',
                    iconCls: 'icon-add',
                    handler: function() {
                        var index = $("#table_hargabeli").datagrid('getRows').length;
                        $("#table_hargabeli").datagrid('appendRow', {
                            kodebarang: '',
                            tglaktif: "<?= date('Y-m-d') ?>",
                            harga: 0,

                        }).datagrid('gotoCell', {
                            index: index,
                            field: 'kodebarang'
                        });

                        getRowIndex(target);
                    }
                }, {
                    text: 'Hapus',
                    iconCls: 'icon-remove',
                    handler: async function() {
                        var row = $("#table_hargabeli").datagrid('getRows')[indexDetail];
                        bukaLoader();
                        try {
                            let url = link_api.hapusHargaBeli;
                            const response = await fetch(url, {
                                method: 'POST',
                                headers: {
                                    'Authorization': 'bearer {{ session('TOKEN') }}',
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    uuidhargabeli: row.uuidhargabeli,
                                }),
                            }).then(response => {
                                if (!response.ok) {
                                    throw new Error(
                                        `HTTP error! status: ${response.status} from ${url}`
                                    );
                                }
                                return response.json();
                            })

                            if (response.success) {
                                $("#table_hargabeli").datagrid('deleteRow', indexDetail);
                            } else {
                                $.messager.alert('Error', response.message, 'error');
                            }
                        } catch (error) {
                            $.messager.alert('Error', error, 'error');
                        }
                        tutupLoader();
                    }
                }],
                columns: [
                    [{
                            field: 'uuidhargabeli',
                            hidden: true
                        },
                        {
                            field: 'uuidsupplier',
                            hidden: true
                        },
                        {
                            field: 'uuidbarang',
                            hidden: true
                        },
                        {
                            field: 'kodebarang',
                            title: 'Kode Barang',
                            width: 150,
                        },
                        {
                            field: 'tglaktif',
                            title: 'Tanggal Aktif',
                            align: 'center',
                            width: 150,
                            editor: {
                                type: 'datebox',
                            }
                        },
                        {
                            field: 'harga',
                            title: 'Harga',
                            width: 150,
                            align: 'right',
                            formatter: format_amount,
                            editor: {
                                type: 'numberbox',
                            }
                        },
                    ]
                ],
                onClickRow: function(index, row) {
                    indexDetail = index;
                },
                onSelectCell: function(index, field) {
                    if (field == 'kodebarang') {
                        var row = $(this).datagrid('getRows')[index];
                        if (row.kodebarang == '') {
                            var rowItem = $('#table_supbarang').datagrid('getSelected');
                            var rowItem2 = $('#table_supplier').datagrid('getSelected');
                            if (rowItem) {
                                $(this).datagrid('updateRow', {
                                    index: index,
                                    row: {
                                        kodebarang: rowItem.kodebarang,
                                        uuidbarang: rowItem.uuidbarang,
                                        uuidsupplier: rowItem2.uuidsupplier,
                                    }
                                });
                            }
                        }
                    }
                },
                onEndEdit: async function(index, row, changes) {
                    var cell = $(this).datagrid('cell');
                    var ed = get_editor('#table_hargabeli', index, cell.field);
                    var row_update = {};

                    if (jQuery.isEmptyObject(row) == false) {
                        if (row.kodebarang != "" && row.harga != 0) {
                            bukaLoader();
                            try {
                                let url = link_api.updateHargaBeli;
                                const response = await fetch(url, {
                                    method: 'POST',
                                    headers: {
                                        'Authorization': 'bearer {{ session('TOKEN') }}',
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify({
                                        harga: row.harga,
                                        kodebarang: row.kodebarang,
                                        tglaktif:row.tglaktif,
                                        uuidbarang: row.uuidbarang,
                                        uuidsupplier: row.uuidsupplier,
																				uuidhargabeli:row.uuidhargabeli??"",
                                    }),
                                }).then(response => {
                                    if (!response.ok) {
                                        throw new Error(
                                            `HTTP error! status: ${response.status} from ${url}`
                                        );
                                    }
                                    return response.json();
                                })

                                if (response.success) {
                                    $("#table_hargabeli").datagrid('deleteRow', indexDetail);
                                } else {
                                    $.messager.alert('Error', response.message, 'error');
                                }
                            } catch (error) {
                                $.messager.alert('Error', error, 'error');
                            }
                            tutupLoader();
                        }
                        var rowItem = $('#table_supbarang').datagrid('getSelected');
                        var idbrg = rowItem.uuidbarang;
                        var idsup = rowItem.uuidsupplier;
                        $('#table_hargabeli').datagrid('load', {
                            uuidbarang: idbrg,
                            uuidsupplier: idsup
                        });
                    }
                },
                onAfterDeleteRow: async function(index, row) {
                    bukaLoader();
                    try {
                        let url = link_api.hapusHargaBeli;
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'bearer {{ session('TOKEN') }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                uuidhargabeli: row.uuidhargabeli,
                            }),
                        }).then(response => {
                            if (!response.ok) {
                                throw new Error(
                                    `HTTP error! status: ${response.status} from ${url}`
                                );
                            }
                            return response.json();
                        })

                        if (response.success) {
                            $("#table_hargabeli").datagrid('deleteRow', indexDetail);
                        } else {
                            $.messager.alert('Error', response.message, 'error');
                        }
                    } catch (error) {
                        $.messager.alert('Error', error, 'error');
                    }
                    tutupLoader();
                },
            }).datagrid('enableCellEditing');
        });

        $("#btn_tambah").click(function() {
            before_add();
        });
        $("#btn_ubah").click(function() {
            before_edit();
        });
        $("#btn_batal").click(function() {
            batal();
        });

        $("#btn_hapus").click(function() {
            before_delete();
        });
        $("#btn_refresh").click(function() {
            $('#table_supplier').datagrid('reload');
            $('#table_supbarang').datagrid('reload');
            $('#table_hargabeli').datagrid('reload');
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
                    tambah();
                } else {
                    $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
                }
            });
        }

        function before_edit() {
            $('#mode').val('ubah');
            get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
                if (data.data.ubah == 1) {
                    ubah();
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

        var idTrans = "";

        // function verify() {
        //     var isValid = $('#form_input').form('validate');
        //     if (isValid) {
        //         mode = $('[name=mode]').val();
        //         verifyuser = $('[name=verifyuser]').val();
        //         $.ajax({
        //             type: 'POST',
        //             url: base_url + 'Fingerprint/verifySimpan',
        //             data: $('#form_input :input').serialize() + "&VERIFYUSER=" + verifyuser +
        //                 "&LINK=atena/Master/Data/Supplier/simpan",
        //             dataType: 'json',
        //             success: function(msg) {
        //                 if (msg.success) {
        //                     idTrans = msg.idTrans;
        //                     //buka window flexcode
        //                     location.href = msg.link;
        //                     Server.connect();
        //                 }
        //             }
        //         });
        //     }
        // }
    </script>
@endpush
