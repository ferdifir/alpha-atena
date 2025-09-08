@extends('template.form')

@section('content')
    <!--FORM INPUT -->
    <div id="form_input" class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false">
            <div class="easyui-layout" fit="true">
                <div data-options="region:'center',border:false ">
                    <div class="easyui-layout" style="height:100%" id="trans_layout">
                        <script>
                            if (screen.height < 450) $("#trans_layout").css('height', "450px");
                        </script>
                        <div data-options="region:'north',border:false" style="width:100%; height:140px;">
                            <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;">
                            </div>
                            <table>
                                <input type="hidden" id="mode" name="mode">
                                <tr>
                                    <td valign="top">
                                        <fieldset style="height:120px;">
                                            <legend id="label_laporan">Info Transaksi</legend>
                                            <table border="0">
                                                <tr>
                                                    <td id="label_form">No. Terima Transfer</td>
                                                    <td id="label_form"><input name="kodeterimatransfer"
                                                            id="KODETERIMATRANSFER" class="label_input" style="width:190px">
                                                        <input type="hidden" id="IDTERIMATRANSFER"
                                                            name="uuidterimatransfer">
                                                        <input type="hidden" id="TGLENTRY" name="tglentry">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="label_form">Lokasi Tujuan</td>
                                                    <td id="label_form"><input name="uuidlokasitujuan" id="IDLOKASITUJUAN"
                                                            style="width:190px"></td>
                                                    <input type="hidden" id="KODELOKASITUJUAN" name="kodelokasitujuan">
                                                </tr>
                                                <tr>
                                                    <td id="label_form">Tgl. Trans
                                                    <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date"
                                                            style="width:190px"></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                    </td>
                                    <td valign="top">
                                        <fieldset style="height:120px;" id="field_referensi">
                                            <legend id="label_laporan">Referensi</legend>
                                            <table border="0">
                                                <tr @if ($transaksi != 'HEADER') hidden @endif>
                                                    <td id="label_form" align="left" name="nolokasi">No. Transfer</td>
                                                    <td id="label_form" align="right"><input name="uuidtransfer"
                                                            id="IDTRANSFER" style="width:190px"></td>
                                                    <input type="hidden" id="KODETRANSFER" name="kodetransfer">
                                                </tr>
                                                <tr>
                                                    <td id="label_form" align="left">Lokasi Asal</td>
                                                    <td align="right">
                                                        <input name="uuidlokasiasal" class="label_input" id="IDLOKASIASAL"
                                                            style="width:190px" readonly>
                                                        <input type="hidden" id="KODELOKASIASAL" name="kodelokasiasal">
                                                    </td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                    </td>
                                    <td valign="bottom">
                                        <table border="0">
                                            <tr></tr>
                                            <tr>
                                                <td valign="bottom">
                                                    <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                                                        style="width:300px; height:85px" data-options="validType:'length[0, 500]'"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label id="label_form" style="font-size:17pt;margin:3px;">Barcode
                                                        <input name="BARCODE" class="label_input" id="BARCODE"
                                                            style="width:200px;height:30px;"></label>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div data-options="region:'center',border:false">
                            <table id="table_data_detail" fit="true"></table>
                            <input type="hidden" id="data_detail" name="data_detail">
                        </div>
                        <div data-options="region:'south',border:false" style="width:100%; height:35px;">
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="left" id="label_form"><label style="font-weight:normal"
                                            id="label_form">User Input :</label> <label id="lbl_kasir"></label> <label
                                            style="font-weight:normal" id="label_form">| Tgl. Input :</label> <label
                                            id="lbl_tanggal"></label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
            <br>
            <a title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false" id='btn_simpan_modal'
                onclick="$('#window_button_simpan').window('open')"><img
                    src="{{ asset('assets/images/simpan.png') }}"></a>


            <br><br>
            <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
                onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
        </div>
    </div>

    <div id="window_button_simpan" class="easyui-window" title="Konfirmasi" data-options="modal:true,closed:true"
        style="height:164cm;padding:15px 10px 10px 10px;top:20px">
        <center>
            <div id="button_simpan">

                <a title="Simpan" class="easyui-linkbutton button_add" id='simpan_saja' onclick="simpan(this.id)"
                    style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan</a><br><br>
                <a title="Simpan & Cetak" class="easyui-linkbutton button_add_print" id='simpan_cetak'
                    onclick="simpan(this.id)"
                    style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan &
                    Cetak</a>

                <div>
        </center>
    </div>

    <div id="form_cetak" title="Preview" style="width:660px; height:450px">
        <div id="area_cetak"></div>
    </div>
@endsection

@push('js')
    <script>
        var row = {};
        var cekbtnsimpan = true;
        var idtrans = "";
        $(document).ready(async function() {
            let check = false;
            await getConfig('KODETERIMATRANSFER', 'TTERIMATRANSFER', 'bearer {{ session('TOKEN') }}',
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

            if (config.value == "AUTO") {
                $('#KODETERIMATRANSFER').textbox({
                    prompt: "Auto Generate",
                    readonly: true,
                    required: false
                });
            } else {
                $('#KODETERIMATRANSFER').textbox({
                    prompt: "",
                    readonly: false,
                    required: true
                });
                $('#KODETERIMATRANSFER').textbox('clear').textbox('textbox').focus();
            }

            $("#form_cetak").window({
                collapsible: false,
                minimizable: false,
                tools: [{
                    text: '',
                    iconCls: 'icon-print',
                    handler: function() {
                        $("#area_cetak").printArea({
                            mode: 'iframe'
                        });

                        $("#form_cetak").window({
                            closed: true
                        });
                    }
                }, {
                    text: '',
                    iconCls: 'icon-excel',
                    handler: function() {
                        export_excel('Faktur Terima Transfer', $("#area_cetak").html());
                        return false;
                    }
                }]
            }).window('close');

            $('#TGLTRANS').datebox({
                onChange: function(newValue, oldValue) {
                    var time_terima_transfer = Date.parse(newValue);
                    var row_transfer = $('#IDTRANSFER').combogrid('grid').datagrid('getSelected');

                    if (row_transfer) {
                        var time_transfer = Date.parse(row_transfer.tglkirim);

                        if (time_terima_transfer < time_transfer) {
                            $.messager.alert('Error',
                                'Tanggal terima transfer tidak boleh sebelum tanggal kirim transfer',
                                'error');

                            $(this).datebox('setValue', oldValue);

                            return false;
                        }
                    }
                }
            });

            var lebar = $('.panel').width();
            var tabsimpan = 50;
            var modalsimpan = 174;
            var spasi = 10;

            var left = lebar - (tabsimpan + modalsimpan) + spasi;

            $("#window_button_simpan").css({
                "width": modalsimpan
            });

            $("#window_button_simpan").window({
                collapsible: false,
                minimizable: false,
                maximizable: false,
                resizable: true,
                draggable: true,
                left: left
            });

            browse_data_lokasiasal('#IDLOKASIASAL');
            browse_data_lokasitujuan('#IDLOKASITUJUAN');
            browse_data_syaratbayar('#KODESYARATBAYAR');
            browse_data_transfer('#IDTRANSFER');

            buat_table_detail();

            @if ($mode == 'tambah')
                //TAMBAH CHECK AKSES CETAK
                await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
                    var UT = data.data.cetak;
                    if (UT == 1) {
                        $('#simpan_cetak').css('filter', '');
                    } else {
                        $('#simpan_cetak').css('filter', 'grayscale(100%)');
                        $('#simpan_cetak').removeAttr('onclick');
                    }
                }, false);
                await tambah();
            @elseif ($mode == 'ubah')
                await ubah();
            @endif

            tutupLoader();

        })

        shortcut.add('F8', function() {
            simpan();
        });

        function tutup() {
            parent.tutupTab();
        }

        async function cetak(uuidtrans) {
            try {
                $("#window_button_cetak").window('close');
                let url = link_api.cetakInventoryTransfer + uuidtrans;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidtrans: uuidtrans,
                    }),
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(
                            `HTTP error! status: ${response.status} from ${url}`
                        );
                    }
                    return response.text();
                })


                $("#area_cetak").html(response);
                $("#form_cetak").window('open');
            } catch (error) {
                var textError = getTextError(error);
                $.messager.alert('Error', getTextError(error), 'error');
            }

        }

        async function tambah() {
            $('#mode').val('tambah');


            $('#lbl_kasir, #lbl_tanggal').html('');
            $('#TGLTRANS').datebox('readonly', false);
            $('#IDTRANSFER').combogrid('readonly', false);


            $('#IDLOKASIASAL').combogrid('clear');
            $('#IDLOKASITUJUAN').combogrid('clear');
            $('#KODESYARATBAYAR').combogrid('clear');
            $('#IDTRANSFER').combogrid('clear');

            $('#IDLOKASITUJUAN').combogrid('readonly', false);
            idtrans = "";

            try {
                let url = link_api.getLokasiDefault;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({}),
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(
                            `HTTP error! status: ${response.status} from ${url}`);
                    }
                    return response.json();
                })

                if (response.success) {
                    var dataLokasi = response.data ?? {};
                    if ((dataLokasi.uuidlokasi ?? "") != "" && (dataLokasi.lokasidefault ?? 1) == 1) {
                        $('#IDLOKASI').combogrid('setValue', dataLokasi.uuidlokasi);
                        $("#KODELOKASI").val(dataLokasi.kodelokasi);
                    }
                } else {
                    $.messager.alert('Error', response.message, 'error');
                }
            } catch (error) {
                var textError = getTextError(error);
                $.messager.alert('Error', getTextError(error), 'error');
            }

            clear_plugin();
            reset_detail();
        }

        async function ubah() {
            $('#mode').val('ubah');
            try {
                let url = link_api.loadDataHeaderInventoryTerimaTransfer;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidterimatransfer: '{{ $data }}',
                        mode: "ubah",
                    }),
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status} from ${url}`);
                    }
                    return response.json();
                })
                if (response.success) {
                    row = response.data;
                } else {
                    $.messager.alert('Error', response.message, 'error');
                }
            } catch (error) {
                var textError = getTextError(error);
                $.messager.alert('Error', getTextError(error), 'error');
            }
            if (row) {

                await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {
                    var UT = data.data.cetak;
                    if (UT == 1) {
                        $('#simpan_cetak').css('filter', '');
                    } else {
                        $('#simpan_cetak').css('filter', 'grayscale(100%)');
                        $('#simpan_cetak').removeAttr('onclick');
                    }
                    UT = data.data.ubah;
                    var statusTrans = await getStatusTrans(link_api
                        .getStatusTransaksiInventoryTerimaTransfer,
                        'bearer {{ session('TOKEN') }}', {
                            uuidterimatransfer: row.uuidterimatransfer
                        });
                    $(".form_status").html(status_transaksi(statusTrans));
                    if (UT == 1 && statusTrans == 'I') {
                        $('#btn_simpan_modal').css('filter', '');
                        $('#mode').val('ubah');
                    } else {
                        $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                        $('#btn_simpan_modal').removeAttr('onclick');
                    }
                    $("#form_input").form('load', row);
                    $('#IDLOKASITUJUAN').combogrid('readonly');
                    $('#TGLTRANS').datebox('readonly', false);
                    $('#IDTRANSFER').combogrid('readonly');

                    $('#IDTRANSFER').combogrid('setValue', {
                        uuidtransfer: row.uuidtransfer,
                        kodetransfer: row.kodetransfer
                    });

                    idtrans = row.uuidterimatransfer;
                    await load_data(row.uuidtransfer);


                    $('#lbl_kasir').html(row.userbuat);
                    $('#lbl_tanggal').html(row.tglentry);

                });
            }
        }

        async function simpan(jenis_simpan) {
            var mode = $("#mode").val();

            $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

            var datanya = $("#form_input :input").serialize();
            var isValid = $('#form_input').form('validate');

            // cek detail transaksi apakah ada barang yang sama, maka munculkan warning
            if (isValid) {
                var barang = [];
                var rows = $('#table_data_detail').datagrid('getRows');
                for (var i = 0; i < rows.length; i++) {
                    var nama = rows[i].namabarang;
                    if ($.inArray(nama, barang) == -1) { // not found
                        barang.push(nama);
                    } else {
                        $.messager.alert('Error', 'Ada Barang Yang Terinput 2x<br>Cek Barang ' + nama, 'error');
                        isValid = false;
                        break;
                    }
                }
            }

            $('#window_button_simpan').window('close');

            if (isValid) {
                isValid = cek_datagrid($('#table_data_detail'));
            }

            if (isValid && (mode == 'tambah' || mode == 'ubah')) {
                tampilLoaderSimpan();
                var mode = '{{ $mode }}';
                try {
                    let headers = {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                    };
                    let requestBody = null;
                    var unindexed_array = $('#form_input :input').serializeArray();

                    var body = {};
                    $.map(unindexed_array, function(n, i) {
                        if (n['name'] == "data_detail") {
                            body[n['name']] = $('#table_data_detail').datagrid('getRows');
                        } else {
                            body[n['name']] = n['value'];
                        }
                    });
                    body['jenis_simpan'] = jenis_simpan;
                    // Cek apakah body adalah instance dari FormData
                    if (body instanceof FormData) {
                        // Jika FormData, jangan set 'Content-Type'. Browser akan melakukannya secara otomatis.
                        requestBody = body;
                    } else {
                        // Default: Jika bukan FormData, asumsikan itu JSON.
                        headers['Content-Type'] = 'application/json';
                        requestBody = body ? JSON.stringify(body) : null;
                    }
                    let url = link_api.simpanInventoryTerimaTransfer
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: headers,
                        body: requestBody,
                    }).then(response => {
                        if (!response.ok) {
                            throw new Error(
                                `HTTP error! status: ${response.status} from ${url}`);
                        }
                        return response.json();
                    })
                    if (response.success) {
                        if (mode == 'tambah') {
                            $.messager.alert('Info', 'Simpan Data Sukses', 'info');
                            await tambah();
                        } else {
                            //tutup tab dan refresh data di function
                            $.messager.alert('Info', 'Transaksi Sukses', 'info');
                            await ubah();
                        }
                        if (jenis_simpan == 'simpan_cetak') {
                            cetak(response.data.uuidterimatransfer);
                        }
                    } else {
                        $.messager.alert('Error', response.message, 'error');
                    }
                } catch (error) {
                    var textError = getTextError(error);
                    $.messager.alert('Error', getTextError(error), 'error');
                }
                tutupLoaderSimpan();
            }
        }

        function reset_detail() {
            $('#table_data_detail').datagrid('loadData', []);
            $('#table_data_detail_po').datagrid('loadData', []);
        }

        async function load_data(idtrans) {
            try {
                let url = link_api.loadDataInventoryTransfer;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidtransfer: idtrans,
                        mode: "ubah",
                    }),
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status} from ${url}`);
                    }
                    return response.json();
                })
                if (response.success) {
                    $('#table_data_detail').datagrid('loadData', response.data ?? []);
                } else {
                    $.messager.alert('Error', response.message, 'error');
                }
            } catch (error) {
                var textError = getTextError(error);
                $.messager.alert('Error', getTextError(error), 'error');
            }
        }

        async function load_detail(idtrans) {
            bukaLoader();
            try {
                let url = link_api.loadDataDetailInventoryTerimaTransfer;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidtransfer: idtrans,
                        tgltrans: $('#TGLTRANS').datebox('getValue')
                    }),
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status} from ${url}`);
                    }
                    return response.json();
                })
                if (response.success) {
                    $('#table_data_detail').datagrid('loadData', response.data ?? []);
                } else {
                    $.messager.alert('Error', response.message, 'error');
                }
            } catch (error) {
                var textError = getTextError(error);
                $.messager.alert('Error', getTextError(error), 'error');
            }
            tutupLoader();
        }

        /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */
        function browse_data_lokasitujuan(id) {
            $(id).combogrid({
                panelWidth: 400,
                url: link_api.browseLokasi,
                idField: 'uuidlokasi',
                textField: 'nama',
                mode: 'local',
                sortName: 'nama',
                sortOrder: 'asc',
                required: true,
                columns: [
                    [{
                            field: 'uuidlokasi',
                            hidden: true
                        },
                        {
                            field: 'kode',
                            title: 'Kode',
                            width: 150,
                            sortable: true
                        },
                        {
                            field: 'nama',
                            title: 'Nama',
                            width: 200,
                            sortable: true
                        },
                    ]
                ],
                onSelect: function(index, row) {
                    //$(id).combogrid('options').onChange.call();
                    $("#KODELOKASITUJUAN").val(row.kode);
                    //var url = base_url + "atena/Inventori/Transaksi/BarangMasuk/comboGridTerimaTransfer/" + row.id;
                    var url = link_api.browseInventoriTerimaTransfer;
                    $("#IDTRANSFER").combogrid('grid').datagrid('options').url = url;
                    $("#IDTRANSFER").combogrid('clear');
                    $("#IDTRANSFER").combogrid('grid').datagrid('load', {
                        q: '',
                        uuidlokasitujuan: row.uuidlokasi,
                    });
                }
            });
        }

        function browse_data_lokasiasal(id) {
            $(id).combogrid({
                panelWidth: 380,
                url: link_api.browseLokasi,
                idField: 'uuidlokasi',
                textField: 'nama',
                mode: 'local',
                sortName: 'nama',
                sortOrder: 'asc',
                columns: [
                    [{
                            field: 'uuidlokasi',
                            hidden: true
                        },
                        {
                            field: 'kode',
                            title: 'Kode',
                            width: 150,
                            sortable: true
                        },
                        {
                            field: 'nama',
                            title: 'Nama',
                            width: 200,
                            sortable: true
                        },
                    ]
                ]
            });
        }

        function browse_data_syaratbayar(id) {
            $(id).combogrid({
                panelWidth: 300,
                url: link_api.browseSyaratBayar,
                idField: 'kode',
                textField: 'nama',
                mode: 'local',
                sortName: 'selisih',
                sortOrder: 'asc',
                required: true,
                selectFirstRow: true,
                columns: [
                    [{
                            field: 'nama',
                            title: 'Name',
                            width: 170,
                            sortable: true
                        },
                        {
                            field: 'selisih',
                            title: 'Diff Days',
                            width: 100,
                            sortable: true
                        },
                    ]
                ],
                onSelect: function(index, row) {
                    ////$(id).combogrid('options').onChange.call();
                },
                onChange: function(newVal, oldVal) {
                    var row = $(id).combogrid('grid').datagrid('getSelected');
                    if ($('#mode').val() != '' && row) {
                        get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), row
                            .selisih)
                    }
                },
            });
        }

        function browse_data_transfer(id) {
            $(id).combogrid({
                panelWidth: 730,
                idField: 'uuidtransfer',
                textField: 'kodetransfer',
                mode: 'remote',
                @if ($transaksi == 'HEADER')
                    required: true,
                @endif
                columns: [
                    [{
                            field: 'uuidtransfer',
                            hidden: true
                        },
                        {
                            field: 'kodetransfer',
                            title: 'Kode Transfer',
                            width: 150
                        },
                        //{field:'idbbm',hidden:true},
                        //{field:'kodebbm',title:'Kode BBM',width:150},
                        {
                            field: 'uuidlokasiasal',
                            hidden: true
                        },
                        {
                            field: 'kodelokasi',
                            title: 'Lokasi Asal',
                            width: 80
                        },
                        {
                            field: 'namalokasi',
                            title: 'Nama Lokasi Asal',
                            width: 150
                        },
                        {
                            field: 'tgltrans',
                            title: 'Tgl Transfer',
                            width: 90
                        },
                        {
                            field: 'username',
                            title: 'User',
                            width: 90
                        },
                    ]
                ],
                onSelect: function(index, row) {
                    reset_detail();

                    if ($('#mode').val() != '') {
                        $("#IDLOKASIASAL").combogrid('setValue', row.uuidlokasiasal);

                        if (row.tglkirim > $('#TGLTRANS').datebox('getValue')) {
                            $.messager.alert('Error',
                                'Tanggal terima transfer tidak boleh sebelum tanggal transfer', 'error');

                            $(this).combogrid('clear');

                            return false;
                        }

                        $("#KODETRANSFER").val(row.kodetransfer);

                        load_detail(row.uuidtransfer);
                    }
                }
            });
        }

        function buat_table_detail() {
            var dg = '#table_data_detail';

            $(dg).datagrid({
                clickToEdit: false,
                dblclickToEdit: true,
                showFooter: true,
                singleSelect: true,
                rownumbers: true,
                data: [],
                columns: [
                    [{
                            field: 'idbarang',
                            hidden: true
                        },
                        {
                            field: 'kodebarang',
                            title: 'Kode Barang',
                            width: 110
                        },
                        {
                            field: 'namabarang',
                            title: 'Nama Barang',
                            width: 300
                        },
                        @if (session('SHOWBARCODE') == 'YA')
                            {
                                field: 'barcodesatuan1',
                                title: 'Barcode Sat. 1',
                                width: 120
                            },
                        @endif
                        @if (session('SHOWPARTNUMBER') == 'YA')
                            {
                                field: 'partnumber',
                                title: 'Part Number',
                                width: 120
                            },
                        @endif {
                            field: 'jml',
                            title: 'Jumlah',
                            align: 'right',
                            width: 80,
                            formatter: format_qty
                        },
                        {
                            field: 'satuan',
                            title: 'Satuan',
                            width: 80,
                            align: 'center'
                        },
                        {
                            field: 'catatan',
                            title: 'Catatan',
                            width: 400
                        },
                    ]
                ],
                onCellEdit: function(index, field, val) {
                    var row = $(this).datagrid('getRows')[index];
                    var ed = get_editor('#table_data_detail', index, field);
                },
                onEndEdit: function(index, row, changes) {
                    var cell = $(this).datagrid('cell');
                    var ed = get_editor('#table_data_detail', index, cell.field);
                    var row_update = {};

                    if (jQuery.isEmptyObject(row_update) == false) {
                        $(this).datagrid('updateRow', {
                            index: index,
                            row: row_update
                        });
                    }
                },
                onLoadSuccess: function(data) {
                    hitung_grandtotal();
                },
                onAfterDeleteRow: function(index, row) {
                    hitung_grandtotal();
                },
                onAfterEdit: function(index, row, changes) {
                    hitung_subtotal_detail(index, row);
                    hitung_grandtotal();
                }
            }).datagrid('enableCellEditing');
        }

        async function insert_barang(barcodesatuan1) {

            var barcodesatuan1string = barcodesatuan1;
            var barcodesatuan1qty = 1;

            if (barcodesatuan1.includes('*')) {
                var barcodesatuan1split = barcodesatuan1.split('*');
                barcodesatuan1qty = parseInt(barcodesatuan1split[0]);
                barcodesatuan1string = barcodesatuan1split[1];
            }
            try {
                let url = link_api.loadDataBarangBarcode;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        barcode: barcodesatuan1string,
                    }),
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(
                            `HTTP error! status: ${response.status} from ${url}`);
                    }
                    return response.json();
                })
                if (response.success && response.data != null) {
                    if ($("#KODECUSTOMER").combogrid('getValue') == "") {
                        $.messager.show({
                            title: 'Warning',
                            msg: 'Customer Belum Diisi',
                            timeout: {{ session('TIMEOUT') }},
                        });

                    } else {
                        data = response.data;

                        var uuidbarang = data ? data.uuidbarang : '';
                        var kode = data ? data.kode : '';
                        var nama = data ? data.nama : '';
                        var satuan = data ? data.satuan : '';
                        var satuanutama = data ? data.satuanutama : '';
                        var konversi = data ? data.konversi : '';
                        var harga = data.hargajualmax ? data.hargajualmax : 0;
                        var kodemerk = data ? data.kodemerk : 0;
                        var subtotal = harga * barcodesatuan1qty;
                        var kodebrg = data ? data.kode : '';
                        var jml = barcodesatuan1qty;
                        var discpersen = data.discpersen ? data.discpersen : 0;
                        var disc = data.disc ? data.disc : 0;
                        var disckurs = data.disckurs ? data.disckurs : 0;
                        var pakaippn = data.pakaippn ? data.pakaippn : '';
                        var ppnpersen = data.ppnpersen ? data.ppnpersen : 0;
                        var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
                        var partnumber = data.partnumber ? data.partnumber : '';

                        pakaippn = '{{ session('DEFAULTPAKAIPPN') }}';
                        if (pakaippn == 0) pakaippn = "TIDAK";
                        else if (pakaippn == 1) pakaippn = "EXCL";
                        else if (pakaippn == 2) pakaippn = "INCL";

                        var daftar_barang = $('#table_data_detail').datagrid('getRows');
                        var data = null
                        var ada = false;
                        // mencari daftar barang yang sudah ada
                        for (var i in daftar_barang) {
                            if (daftar_barang[i].idbarang == id) {

                                data = {
                                    jmlpenjualan: (daftar_barang[i].jmlpenjualan + barcodesatuan1qty),
                                    satuan_lama: satuan,
                                    satuanutama: satuanutama,
                                    satuan: satuan,
                                }

                                $('#table_data_detail').datagrid('updateRow', {
                                    index: i,
                                    row: data
                                }).datagrid('gotoCell', {
                                    index: i,
                                    field: 'kodebarang'
                                });

                                ada = true;
                                hitung_subtotal_detail(i, daftar_barang[i]);

                            }
                        }

                        if (!ada) {
                            if ($('#IDLOKASI').combogrid('getValue') != '') {
                                try {
                                    let url = link_api.getStokBarangSatuan;
                                    const response = await fetch(url, {
                                        method: 'POST',
                                        headers: {
                                            'Authorization': 'bearer {{ session('TOKEN') }}',
                                            'Content-Type': 'application/json',
                                        },
                                        body: JSON.stringify({
                                            uuidbarang: uuidbarang,
                                            uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
                                            satuan: satuan,
                                            tgltrans: $('#TGLTRANS').datebox('getValue')
                                        }),
                                    }).then(response => {
                                        if (!response.ok) {
                                            throw new Error(
                                                `HTTP error! status: ${response.status} from ${url}`);
                                        }
                                        return response.json();
                                    })
                                    if (response.success) {
                                        var row = {
                                            idbarang: uuidbarang,
                                            kodebarang: kode,
                                            namabarang: nama,
                                            barcodesatuan1: barcodesatuan1,
                                            partnumber: partnumber,
                                            kodemerk: kodemerk,
                                            tutup: 0,
                                            satuan_lama: satuan,
                                            satuanutama: satuanutama,
                                            satuan: satuan,
                                            konversi: konversi,
                                            jml: 0,
                                            jmlpenjualan: jml,
                                            jmlstok: response.data.saldoqty ?? 0,
                                            harga: harga,
                                            idcurrency: "{{ session('IDCURRENCY') }}",
                                            currency: "{{ session('SIMBOLCURRENCY') }}",
                                            nilaikurs: 1,
                                            discpersen: discpersen,
                                            disc: disc,
                                            disckurs: disckurs,
                                            subtotal: subtotal,
                                            pakaippn: pakaippn,
                                        }
                                        $('#table_data_detail').datagrid('appendRow', row);

                                        hitung_subtotal_detail($('#table_data_detail').datagrid(
                                            'getRows').length - 1, row);
                                    } else {
                                        $.messager.alert('Error', response.message, 'error');
                                    }
                                } catch (error) {
                                    var textError = getTextError(error);
                                    $.messager.alert('Error', getTextError(error), 'error');
                                }
                            }

                            hitung_grandtotal();
                            $('#BARCODE').textbox('textbox').focus();
                        }
                    }
                } else {
                    $.messager.alert('Error', response.message, 'error');
                }
            } catch (error) {
                var textError = getTextError(error);
                $.messager.alert('Error', getTextError(error), 'error');
            }
        }

        function hitung_subtotal_detail(index, row) {
            // hitung diskon lebih dahulu
            var data = {};
            var dg = $('#table_data_detail');
            dg.datagrid('updateRow', {
                index: index,
                row: data
            });
            // cek jika ada barang yang sama
            var rows = dg.datagrid('getRows');
            for (var i = 0; i < rows.length; i++) {
                if (index != i && (rows[i].namabarang != "" && row.namabarang == rows[i].namabarang)) {
                    $.messager.show({
                        title: 'Warning',
                        msg: 'Barang Yang Diinput Tidak Boleh Sama Dalam Satu Detail Transaksi',
                        timeout: {{ session('TIMEOUT') }},
                    });

                    dg.datagrid('deleteRow', index);
                    break;
                }
            }
        }

        function hitung_grandtotal() {
            var data = $("#table_data_detail").datagrid('getRows');
            var footer = {
                jml: 0,
            }
            for (var i = 0; i < data.length; i++) {
                footer.jml += parseFloat(data[i].jml);
            }

            $('#table_data_detail').datagrid('reloadFooter', [footer]);
        }

        function clear_plugin() {
            $('.combogrid-f').each(function() {
                $(this).combogrid('grid').datagrid('load', {
                    q: ''
                });
            });

            $('.number').numberbox('setValue', 0);

            $("#TGLTRANS, #TGLKIRIM, #TGLJATUHTEMPO").datebox('setValue', date_format());
            $("#TGLJATUHTEMPO").datebox('readonly');
        }
    </script>
@endpush
