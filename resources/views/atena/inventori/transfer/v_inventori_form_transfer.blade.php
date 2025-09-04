@extends('template.form')

@section('content')
    <div id="form_input" class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false">
            <div class="easyui-layout" fit="true">
                <div data-options="region:'center',border:false ">
                    <div class="easyui-layout" style="height:100%" id="trans_layout">
                        <script>
                            if (screen.height < 450) {
                                $("#trans_layout").css('height', "450px");
                            }
                        </script>
                        <div data-options="region:'north',border:false" style="width:100%; height:200px">
                            <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;">
                            </div>

                            <table width="100%">
                                <input type="hidden" id="mode" name="mode">
                                <tr>
                                    <td>
                                        <table>
                                            <tr>
                                                <td valign="top">
                                                    <fieldset style="height:180px">
                                                        <legend id="label_laporan">Info Transaksi</legend>
                                                        <table border="0">
                                                            {{-- <input name="idperusahaan" id="IDPERUSAHAAN" style="width:190px"
                                                                type="hidden"> --}}
                                                            <tr>
                                                                <td id="label_form">No. Transfer</td>
                                                                <td id="label_form"><input name="kodetransfer"
                                                                        id="KODETRANSFER" class="label_input"
                                                                        style="width:190px">
                                                                    <input type="hidden" id="IDTRANSFER"
                                                                        name="uuidtransfer">
                                                                    <input type="hidden" id="TGLENTRY" name="tglentry">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td id="label_form">Lokasi Asal</td>
                                                                <td id="label_form"><input name="uuidlokasiasal"
                                                                        id="IDLOKASIASAL" style="width:190px"></td>
                                                                <input type="hidden" id="KODELOKASIASAL"
                                                                    name="kodelokasiasal">
                                                            </tr>
                                                            <tr>
                                                                <td id="label_form">Lokasi Tujuan</td>
                                                                <td id="label_form"><input name="uuidlokasitujuan"
                                                                        id="IDLOKASITUJUAN" style="width:190px"></td>
                                                                <input type="hidden" id="KODELOKASITUJUAN"
                                                                    name="kodelokasitujuan">
                                                            </tr>
                                                            <tr>
                                                                <td id="label_form">No. PR</td>
                                                                <td id="label_form">
                                                                    <input name="uuidpr" id="IDPR"
                                                                        style="width:190px">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td id="label_form">Tgl. Trans
                                                                <td id="label_form"><input name="tgltrans" id="TGLTRANS"
                                                                        class="date" style="width:190px"></td>
                                                            </tr>
                                                            <tr>
                                                                <td id="label_form">Tgl. Kirim</td>
                                                                <td id="label_form"><input name="tglkirim" id="TGLKIRIM"
                                                                        class="date" style="width:190px"></td>
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
                                                                <label id="label_form"
                                                                    style="font-size:17pt;margin:3px;">Barcode
                                                                    <input name="BARCODE" class="label_input" id="BARCODE"
                                                                        style="width:200px;height:30px;">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div data-options="region:'center',border:false">
                            <table id="table_data_detail" fit="true"></table>
                        </div>
                        <input type="hidden" id="data_detail" name="data_detail">
                        <div data-options="region:'south',border:false" style="width:100%; height:35px;">
                            <table id="trans_footer" width="100%">
                                <tr>
                                    <td align="left" id="label_form"><label style="font-weight:normal"
                                            id="label_form">User Input :</label> <label id="lbl_kasir"></label> <label
                                            style="font-weight:normal" id="label_form">| Tgl. Input :</label> <label
                                            id="lbl_tanggal"></label></td>
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

    <div id="fm-catatan-barang" title="Catatan Barang">
        <table style="padding:5px">
            <tr>
                <td>
                    <textarea prompt="Tekan 'Ctrl + Enter' untuk simpan catatan
Tekan 'esc' untuk tutup dialog " name="catatanbarang"
                        class="label_input" id="CATATANBARANG" multiline="true" style="width:300px; height:155px"
                        data-options="validType:'length[0, 500]'"></textarea>
                </td>
            </tr>
        </table>
    </div>

    <div id="window_button_simpan" class="easyui-window" title="Konfirmasi" data-options="modal:true,closed:true"
        style="height:164cm;padding:15px 10px 10px 10px;top:20px">
        <center>
            <div id="button_simpan">

                <a title="Simpan" class="easyui-linkbutton button_add" id='simpan_saja' onclick="simpan('simpan')"
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
        var config = {};
        var cekbtnsimpan = true;
        var idtrans = '';
        $(document).ready(async function() {
            let check = false;
            await getConfig('KODETRANSFER', 'TTRANSFER', 'bearer {{ session('TOKEN') }}',
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
            if (config.value == "AUTO") {
                $('#KODETRANSFER').textbox({
                    prompt: "Auto Generate",
                    readonly: true,
                    required: false
                });
            } else {
                $('#KODETRANSFER').textbox({
                    prompt: "",
                    readonly: false,
                    required: true
                });
                $('#KODETRANSFER').textbox('clear').textbox('textbox').focus();
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
                        export_excel('Faktur Transfer', $("#area_cetak").html());
                        return false;
                    }
                }]
            }).window('close');

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

            // get_status_trans("atena/Inventori/Transaksi/TransferPersediaan", row.idtransfer, function(data) {
            //     $(".form_status").html(status_transaksi(data.status));
            // });

            browse_data_syaratbayar('#KODESYARATBAYAR');
            browse_data_lokasiasal('#IDLOKASIASAL');
            browse_data_lokasitujuan('#IDLOKASITUJUAN');
            browse_data_pr('#IDPR');

            $("#fm-catatan-barang").dialog({
                onOpen: function() {
                    $('#fm-catatan-barang').form('clear');
                },
                buttons: [{
                    text: 'Simpan',
                    iconCls: 'icon-save',
                    handler: function() {
                        simpan_catatan_barang($('#CATATANBARANG').textbox('getValue'));
                    },
                }],
                modal: true,
            }).dialog('close');

            $('#CATATANBARANG').textbox('textbox').bind('keydown', function(e) {
                if (e.keyCode == 13 && e.ctrlKey) { // when press ENTER key, accept the inputed value.
                    simpan_catatan_barang($(this).val());
                } else if (e.keyCode == 27) {
                    $("#fm-catatan-barang").dialog('close')
                }
            });

            $('#TGLTRANS').datebox({
                onSelect: function(newValue, oldValue) {
                    var time_transfer = Date.parse(newValue.getFullYear() + '-' + zero_prefix(
                        newValue
                        .getMonth() + 1) + '-' + zero_prefix(newValue.getDate()));
                    var row_pr = $('#IDPR').combogrid('grid').datagrid('getSelected');

                    if (row_pr) {
                        var time_pr = Date.parse(row_pr.tgltrans);

                        if (time_transfer < time_pr) {
                            $.messager.alert('Error',
                                'Tanggal transfer tidak boleh sebelum tanggal PR',
                                'error');

                            $(this).datebox('setValue', oldValue);

                            return false;
                        }
                    }

                    if ($('#mode').val() == 'tambah') {
                        hitung_stok();
                    }
                }
            });

            $('#BARCODE').textbox('textbox').bind('keydown', function(e) {
                if (e.keyCode == 13) { // when press ENTER key, accept the inputed value.
                    insert_barang($(this).val());
                    $(this).val('');
                }
            });

            buat_table_detail();


            @if ($mode == 'tambah')
                await tambah();
            @elseif ($mode == 'ubah')
                await ubah();
            @endif

            tutupLoader();

        })

        shortcut.add('F8', function() {
            simpan("simpan");
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
                        uuidtrans: row.uuidtrans,
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
            // parent.changeTitleTab($('#mode').val());

            enableAddRow();

            $('#lbl_kasir, #lbl_tanggal').html('');
            $('#TGLTRANS').datebox('readonly', false);

            $('#IDLOKASIASAL').combogrid('readonly', false);
            $('#IDLOKASITUJUAN').combogrid('readonly', false);
            $('#IDPR').combogrid('readonly', false);
            $('#IDLOKASIASAL').combogrid('clear');
            $('#IDLOKASITUJUAN').combogrid('clear');
            $('#IDPR').combogrid('clear');

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
                let url = link_api.loadDataHeaderInventoryTransfer;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidtransfer: '{{ $data }}',
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
                $('#lbl_kasir').html(row.userbuat);
                $('#lbl_tanggal').html(row.tglentry);

                await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {
                    var UT = data.data.ubah;

                    var statusTrans = await getStatusTrans(link_api.getStatusTransaksiInventoryTransfer,
                        'bearer {{ session('TOKEN') }}', {
                            uuidtransfer: row.uuidtransfer
                        });

                    $(".form_status").html(status_transaksi(statusTrans));
                    if (UT == 1 && statusTrans == 'I') {
                        //document.getElementById('btn_simpan_all').onclick = simpan; 
                        $('#btn_simpan_modal').css('filter', '');
                        $('#mode').val('ubah');
                    } else {
                        document.getElementById('btn_simpan_modal').onclick = '';
                        $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                        $('#btn_simpan_modal').removeAttr('onclick');
                    };

                    $("#form_input").form('load', row);
                    $('#IDLOKASIASAL').combogrid('readonly');
                    $('#IDLOKASITUJUAN').combogrid('readonly');
                    $('#IDPR').combogrid('readonly', true);
                    $('#TGLTRANS').datebox('readonly', false);

                    if (row.uuidpr != 0) {
                        disableAddRow();
                        $('#IDPR').combogrid('setValue', {
                            uuidpr: row.uuidpr,
                            kodepr: row.kodepr
                        });
                    } else {
                        $('#IDPR').combogrid('clear');
                        enableAddRow();
                    }

                    idtrans = row.uuidtransfer;
                    await load_data(row.uuidtransfer);

                });
            }
        }

        async function simpan(jenis_simpan) {
            var mode = $("#mode").val();

            $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

            var datanya = $("#form_input :input").serialize();
            var isValid = $('#form_input').form('validate');

            $('#window_button_simpan').window('close');
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
                    let url = link_api.simpanInventoryTransfer;
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
                            cetak(response.data.uuidtransfer);
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

        async function load_data_detail_pr(uuidpr) {
            bukaLoader();
            try {
                let url = link_api.loadDataDetailPermintaanBarang;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidpr: uuidpr,
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
                    hitung_grandtotal();
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
        function browse_data_lokasiasal(id) {
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
                    $("#KODELOKASIASAL").val(row.kode);
                },
                onLoadSuccess: function(data) {
                    if (data.total == 1) {
                        var rows = data.rows;
                        $(this).combogrid('setValue', rows[0].kode).combogrid('readonly');
                    }
                }
            });
        }

        function browse_data_lokasitujuan(id) {
            $(id).combogrid({
                panelWidth: 400,
                url: link_api.browseLokasiTransfer,
                idField: 'uuidlokasi',
                textField: 'namalokasi',
                mode: 'local',
                sortName: 'namalokasi',
                sortOrder: 'asc',
                required: true,
                columns: [
                    [{
                            field: 'uuidlokasi',
                            hidden: true
                        },
                        {
                            field: 'kodelokasi',
                            title: 'Kode',
                            width: 150,
                            sortable: true
                        },
                        {
                            field: 'namalokasi',
                            title: 'Nama',
                            width: 200,
                            sortable: true
                        },
                    ]
                ],
                onSelect: function(index, row) {
                    //$(id).combogrid('options').onChange.call();
                    $("#KODELOKASITUJUAN").val(row.kode);

                    var lokasi = $('#IDLOKASITUJUAN').combogrid('getValue');
                    var lokasipengirim = $('#IDLOKASIASAL').combogrid('getValue');

                    $('#IDPR').combogrid('grid').datagrid('options').url = link_api
                        .broswePermintaanBarangTransfer;
                    $('#IDPR').combogrid('grid').datagrid('load', {
                        lokasi: lokasi,
                        lokasikirim: lokasipengirim,
                    });
                },
                onLoadSuccess: function(data) {
                    if (data.total == 1) {
                        var rows = data.rows;
                        $(this).combogrid('setValue', rows[0].kodelokasi).combogrid('readonly');
                    }
                }
            });
        }

        async function hitung_stok() {
            var rows = $('#table_data_detail').datagrid('getRows');

            if (rows.length == 0) {
                return false;
            }

            if ($('#IDLOKASIASAL').combogrid('getValue') == '') {
                return false;
            }
            try {
                let url = link_api.hitungStokTransaksiBarang;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidlokasi: $('#IDLOKASIASAL').combogrid('getValue'),
                        tgltrans: $('#TGLTRANS').datebox('getValue'),
                        data_detail: JSON.stringify(rows)
                    }),
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status} from ${url}`);
                    }
                    return response.json();
                })
                if (response.success) {
                    for (var i = 0; i < response.data.length; i++) {
                        $('#table_data_detail').datagrid('updateRow', {
                            index: i,
                            row: {
                                jmlstok: response.data[i].jmlstok
                            }
                        });
                    }
                } else {
                    $.messager.alert('Error', response.message, 'error');
                }
            } catch (error) {
                var textError = getTextError(error);
                $.messager.alert('Error', getTextError(error), 'error');
            }
        }

        function browse_data_pr(id) {
            $(id).combogrid({
                panelWidth: 600,
                mode: 'remote',
                idField: 'uuidpr',
                textField: 'kodepr',
                columns: [
                    [{
                            field: 'idpr',
                            hidden: true
                        },
                        {
                            field: 'kodepr',
                            title: 'Kode',
                            width: 150
                        },
                        {
                            field: 'kodelokasi',
                            title: 'Kode Lokasi',
                            width: 120
                        },
                        {
                            field: 'tgltrans',
                            title: 'Tgl Trans',
                            width: 80,
                            align: 'center'
                        },
                        {
                            field: 'username',
                            title: 'User',
                            width: 150
                        },
                    ]
                ],
                onSelect: function(index, row) {
                    var time_transfer = Date.parse($('#TGLTRANS').datebox('getValue'));
                    var time_pr = Date.parse(row.tgltrans);

                    if (time_transfer < time_pr) {
                        $.messager.alert('Error',
                            'Tanggal transfer tidak boleh sebelum tanggal PR yang dipilih', 'error');

                        $('#IDPR').combogrid('clear');

                        return false;
                    }

                    $('#table_data_detail').datagrid('loadData', []);

                    load_data_detail_pr(row.uuidpr);

                    disableAddRow();
                }
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

        function simpan_catatan_barang(catatanBarang) {
            // post to detail grid
            var dg = $('#table_data_detail');
            var cell = dg.datagrid('cell');
            if (cell) {
                dg.datagrid('updateRow', {
                    index: cell.index,
                    row: {
                        catatan: catatanBarang.toUpperCase()
                    }
                }).datagrid('gotoCell', {
                    index: cell.index,
                    field: cell.field
                });

                $("#fm-catatan-barang").dialog('close')
            }
        }

        function getRowIndex(target) {
            var tr = $(target).closest('tr.datagrid-row');
            return parseInt(tr.attr('datagrid-row-index'));
        }

        var indexDetail = 0; // UNTUK TOMBOL EDIT

        function buat_table_detail() {
            var dg = '#table_data_detail';

            $(dg).datagrid({
                clickToEdit: false,
                dblclickToEdit: true,
                showFooter: true,
                singleSelect: true,
                rownumbers: true,
                data: [],
                toolbar: [{
                        text: 'Tambah',
                        iconCls: 'icon-add',
                        handler: function() {
                            if ($('#IDPR').combogrid('getValue') != '') {
                                $.messager.alert('Error',
                                    'Tidak bisa menambah data, karena mengacu pada Permintaan Barang',
                                    'warning');

                                return false;
                            }

                            var index = $(dg).datagrid('getRows').length;
                            $(dg).datagrid('appendRow', {
                                kodebarang: '',
                                terpenuhi: 0,
                            }).datagrid('gotoCell', {
                                index: index,
                                field: 'kodebarang'
                            });
                        }
                    }, {
                        text: 'Hapus',
                        iconCls: 'icon-remove',
                        handler: function() {
                            if ($('#IDPR').combogrid('getValue') != '') {
                                $.messager.alert('Error',
                                    'Tidak bisa menghapus data, karena mengacu pada Permintaan Barang',
                                    'warning');

                                return false;
                            }

                            $(dg).datagrid('deleteRow', indexDetail);
                            hitung_grandtotal();
                        }
                    }
                    // ,{
                    // text:'Ubah',
                    // iconCls:'icon-edit',
                    // handler:function(){
                    // $(dg).datagrid('editCell', {
                    // index: indexDetail,
                    // field: 'kodebarang'
                    // });
                    // }
                    // }
                ],
                // view           : detailview,
                // detailFormatter: function(index,row){
                // return '<div style="padding:2px;position:relative;"><table class="ddv"></table></div>';
                // },
                columns: [
                    [{
                            field: 'uuidbarang',
                            hidden: true
                        },
                        {
                            field: 'pakaipo',
                            hidden: true,
                        },
                        {
                            field: 'checkpakaipo',
                            title: 'PR Pakai PO',
                            align: 'center',
                            formatter: function(val, row, index) {
                                return '<input class="ck-pakaipo" type="checkbox" ' + (row.pakaipo == 1 ?
                                    'checked' : '') + ' id="ck-' + index + '"  disabled/>';
                            }
                        },
                        {
                            field: 'kodebarang',
                            title: 'Kode Barang',
                            width: 85,
                            editor: {
                                type: 'combogrid',
                                options: {
                                    panelWidth: 670,
                                    mode: 'remote',
                                    required: true,
                                    idField: 'kode',
                                    textField: 'kode',
                                    url: link_api.browseBarang,
                                    onBeforeLoad: function(param) {
                                        if ('undefined' === typeof param.q || param.q.length == 0) {
                                            return false;
                                        }
                                    },
                                    columns: [
                                        [{
                                                field: 'uuidbarang',
                                                hidden: true
                                            },
                                            {
                                                field: 'kode',
                                                title: 'Kode',
                                                width: 150
                                            },
                                            {
                                                field: 'nama',
                                                title: 'Nama',
                                                width: 250
                                            },
                                            {
                                                field: 'satuanutama',
                                                title: 'Satuan',
                                                width: 60
                                            },
                                            {
                                                field: 'barcodesatuan1',
                                                title: 'Barcode Sat. 1',
                                                width: 120
                                            },
                                            {
                                                field: 'partnumber',
                                                title: 'Part Number',
                                                width: 120
                                            },
                                            {
                                                field: 'namamerk',
                                                title: 'Merk',
                                                width: 100
                                            },
                                            {
                                                field: 'hargabeli',
                                                title: 'Harga Beli',
                                                align: 'right',
                                                width: 80,
                                                formatter: format_amount
                                            },
                                            {
                                                field: 'kategori',
                                                title: 'Kategori',
                                                width: 200
                                            },
                                        ]
                                    ],
                                }
                            }
                        },
                        {
                            field: 'namabarang',
                            title: 'Nama',
                            width: 300,
                        },
                        @if (session('SHOWBARCODE') == 'YA')
                            {
                                field: 'barcodesatuan1',
                                title: 'Barcode Sat. 1',
                                width: 180
                            },
                        @endif
                        @if (session('SHOWPARTNUMBER') == 'YA')
                            {
                                field: 'partnumber',
                                title: 'Part Number',
                                width: 180
                            },
                        @endif {
                            field: 'jmlstok',
                            title: 'Stok',
                            align: 'right',
                            width: 80,
                            formatter: format_qty
                        }, {
                            field: 'jml',
                            title: 'Jumlah',
                            align: 'right',
                            width: 80,
                            formatter: format_qty,
                            editor: {
                                type: 'numberbox',
                            }
                        }, {
                            field: 'terpenuhi',
                            title: 'Terpenuhi',
                            align: 'right',
                            width: 80,
                            formatter: format_qty
                        }, {
                            field: 'sisa',
                            title: 'Sisa',
                            align: 'right',
                            width: 80,
                            formatter: format_qty
                        }, {
                            field: 'satuan_lama',
                            title: 'Satuan',
                            width: 45,
                            align: 'center',
                            hidden: true
                        }, {
                            field: 'satuan',
                            title: 'Satuan',
                            width: 80,
                            align: 'center',
                            editor: {
                                type: 'combogrid',
                                options: {
                                    panelWidth: 100,
                                    panelHeight: 130,
                                    mode: 'remote',
                                    required: true,
                                    idField: 'satuan',
                                    textField: 'satuan',
                                    columns: [
                                        [{
                                            field: 'satuan',
                                            title: 'Satuan',
                                            width: 80
                                        }, ]
                                    ],
                                }
                            }
                        }, {
                            field: 'catatan',
                            title: 'Catatan',
                            width: 400,
                            editor: {
                                type: 'validatebox',
                            },
                            formatter: format_textarea
                        },
                    ]
                ],
                //UNTUK TOMBOL EDIT
                onClickRow: function(index, row) {
                    indexDetail = index;
                },
                onBeforeCellEdit: function(index, field) {
                    var row = $(this).datagrid('getRows')[index];

                    if (field == 'catatan') {
                        $("#fm-catatan-barang").dialog('open');
                        $('#CATATANBARANG').textbox('setValue', row.catatan).textbox('textbox').focus();
                        return false;
                    }
                },
                onCellEdit: function(index, field, val) {
                    var row = $(this).datagrid('getRows')[index];
                    var ed = get_editor('#table_data_detail', index, field);
                    if (field == 'kodebarang') {
                        ed.combogrid('showPanel');
                    } else if (field == 'satuan') {
                        ed.combogrid('grid').datagrid('options').url = link_api.loadSatuanBarang;
                        ed.combogrid('grid').datagrid('load', {
                            q: '',
                            uuidbarang: row.uuidbarang
                        });
                        ed.combogrid('showPanel');
                    }
                },
                onEndEdit: async function(index, row, changes) {
                    bukaLoader();
                    var cell = $(this).datagrid('cell');
                    var ed = get_editor('#table_data_detail', index, cell.field);
                    var row_update = {};

                    switch (cell.field) {
                        case 'kodebarang':
                            var data = ed.combogrid('grid').datagrid('getSelected');

                            var uuidbarang = data ? data.uuidbarang : '';
                            var nama = data ? data.nama : '';
                            var satuan = data ? data.satuanutama : '';
                            var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
                            var partnumber = data.partnumber ? data.partnumber : '';

                            row_update = {
                                uuidbarang: uuidbarang,
                                namabarang: nama,
                                barcodesatuan1: barcodesatuan1,
                                partnumber: partnumber,
                                satuan_lama: satuan,
                                satuan: satuan,
                                jml: 1
                            };
                            break;
                        case 'satuan':
                            // get_konversi (ed.combogrid('grid').datagrid('getRows'), changes.satuan, row.satuan_lama);
                            // if (satuan_baru != 0 || satuan_lama != 0  && changes.satuan) {
                            // 	row_update = {
                            // 		jml		   : (satuan_baru>satuan_lama) ? row.jml*konversi_baru : row.jml/konversi_lama,
                            // 		satuan_lama: changes.satuan
                            // 	};
                            // }

                            var stok = row.jmlstok;
                            try {
                                let url = link_api.getStokBarangSatuan;
                                const response = await fetch(url, {
                                    method: 'POST',
                                    headers: {
                                        'Authorization': 'bearer {{ session('TOKEN') }}',
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify({
                                        uuidbarang: row.uuidbarang,
                                        uuidlokasi: $('#IDLOKASIASAL').combogrid('getValue'),
                                        satuan: row.satuan,
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
                                    stok = response.data.saldoqty ?? stok;
                                    row_update['jmlstok'] = stok;
                                } else {
                                    $.messager.alert('Error', response.message, 'error');
                                }
                            } catch (error) {
                                var textError = getTextError(error);
                                $.messager.alert('Error', getTextError(error), 'error');
                            }

                            break;
                    }
                    if (jQuery.isEmptyObject(row_update) == false) {
                        $(this).datagrid('updateRow', {
                            index: index,
                            row: row_update
                        });
                    }
                    tutupLoader();
                },
                onExpandRow: function(index, row) {
                    // var ddv = $(this).datagrid('getRowDetail',index).find('table.ddv');
                    // ddv.datagrid({
                    // url         : base_url+"atena/Inventori/Transaksi/BarangKeluar/InformasiTransReferensi",
                    // method      : 'post',
                    // queryParams : {idtrans:idtrans,idbarang:row.idbarang,jenis:'TRANSFER'},
                    // fitColumns  : true,
                    // singleSelect: true,
                    // rownumbers  : true,
                    // loadMsg     : '',
                    // height      : 'auto',
                    // columns     : [[
                    // {field:'kodebbk',title:'No BBK',width:120,},
                    // {field:'tgltrans',title:'Tgl. BBK',align:'center',width:85,},
                    // {field:'jml',title:'Jumlah',align:'right',width:50,formatter:format_amount,editor:{type:'numberbox',}},
                    // {field:'satuan',title:'Satuan',width:45,align:'left'},	
                    // {field:'username',title:'User',width:70,align:'left'},	

                    // ]],
                    // onResize: function() {
                    // $(dg).datagrid('fixDetailRowHeight',index);
                    // },
                    // onLoadSuccess: function() {
                    // setTimeout( function() {
                    // $(dg).datagrid('fixDetailRowHeight',index);
                    // },0);
                    // }
                    // });
                    // $(dg).datagrid('fixDetailRowHeight',index);
                },
                onLoadSuccess: function(data) {
                    hitung_grandtotal();
                },
                onAfterDeleteRow: function(index, row) {
                    hitung_grandtotal();
                },
                onAfterEdit: async function(index, row, changes) {
                    if (changes.kodebarang) {
                        if ($('#IDLOKASIASAL').combogrid('getValue') != '') {
                            try {
                                let url = link_api.getStokBarangSatuan;
                                const response = await fetch(url, {
                                    method: 'POST',
                                    headers: {
                                        'Authorization': 'bearer {{ session('TOKEN') }}',
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify({
                                        uuidbarang: row.uuidbarang,
                                        uuidlokasi: $('#IDLOKASIASAL').combogrid('getValue'),
                                        satuan: row.satuan,
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
                                    var data = {
                                        jmlstok: response.data.saldoqty ?? 0
                                    };

                                    $('#table_data_detail').datagrid('updateRow', {
                                        index: index,
                                        row: data
                                    }).datagrid('gotoCell', {
                                        index: index,
                                        field: 'kodebarang'
                                    });
                                } else {
                                    $.messager.alert('Error', response.message, 'error');
                                }
                            } catch (error) {
                                var textError = getTextError(error);
                                $.messager.alert('Error', getTextError(error), 'error');
                            }
                        }
                    }
                    hitung_subtotal_detail(index, row);
                    hitung_grandtotal();
                }
            }).datagrid('enableCellEditing');
        }

        async function insert_barang(barcodesatuan1) {
            if ($('#IDPR').combogrid('getValue') != '') {
                $.messager.alert('Error', 'Tidak bisa menambah data, karena mengacu pada Permintaan Barang', 'warning');

                return false;
            }

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
                    var data = response.data;

                    var uuidbarang = data ? data.uuidbarang : '';
                    var kode = data ? data.kode : '';
                    var nama = data ? data.nama : '';
                    var satuan = data ? data.satuan : '';
                    var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
                    var partnumber = data.partnumber ? data.partnumber : '';

                    var daftar_barang = $('#table_data_detail').datagrid('getRows');
                    var data = null
                    var ada = false;
                    // mencari daftar barang yang sudah ada
                    for (var i in daftar_barang) {
                        if (daftar_barang[i].uuidbarang == id) {

                            data = {
                                jml: (daftar_barang[i].jml + barcodesatuan1qty),
                                satuan_lama: satuan,
                                satuan: satuan,
                                partnumber: partnumber,
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
                        if ($('#IDLOKASIASAL').combogrid('getValue') != '') {

                            try {
                                let url = link_api.getStokBarangSatuan;
                                const responseStok = await fetch(url, {
                                    method: 'POST',
                                    headers: {
                                        'Authorization': 'bearer {{ session('TOKEN') }}',
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify({
                                        uuidbarang: uuidbarang,
                                        uuidlokasi: $('#IDLOKASIASAL').combogrid('getValue'),
                                        tgltrans: $('#TGLTRANS').datebox('getValue'),
                                        satuan: satuan,
                                    }),
                                }).then(response => {
                                    if (!response.ok) {
                                        throw new Error(
                                            `HTTP error! status: ${response.status} from ${url}`);
                                    }
                                    return response.json();
                                })
                                if (responseStok.success) {
                                    var stoksatuan = responseStok.data.saldoqty ?? 0;
                                    var row = {
                                        uuidbarang: uuidbarang,
                                        kodebarang: kode,
                                        namabarang: nama,
                                        barcodesatuan1: barcodesatuan1,
                                        partnumber: partnumber,
                                        satuan_lama: satuan,
                                        satuan: satuan,
                                        jml: 1,
                                        terpenuhi: 0,
                                        jmlstok: stoksatuan,
                                    }
                                    $('#table_data_detail').datagrid('appendRow', row);

                                    hitung_subtotal_detail($('#table_data_detail').datagrid(
                                        'getRows').length - 1, row);
                                } else {
                                    $.messager.alert('Error', responseStok.message, 'error');
                                }
                            } catch (error) {
                                var textError = getTextError(error);
                                $.messager.alert('Error', getTextError(error), 'error');
                            }
                            // $.ajax({
                            //     type: 'POST',
                            //     dataType: 'json',
                            //     url: base_url + 'atena/Master/Data/Barang/getStokBarangSatuan',
                            //     async: false,
                            //     data: {
                            //         idbarang: id,
                            //         idlokasi: $('#IDLOKASIASAL').combogrid('getValue'),
                            //         tgltrans: $('#TGLTRANS').datebox('getValue'),
                            //         satuan: satuan,
                            //     },
                            //     cache: false,
                            //     success: function(stoksatuan) {

                            //         var row = {
                            //             idbarang: id,
                            //             kodebarang: kode,
                            //             namabarang: nama,
                            //             barcodesatuan1: barcodesatuan1,
                            //             partnumber: partnumber,
                            //             satuan_lama: satuan,
                            //             satuan: satuan,
                            //             jml: 1,
                            //             terpenuhi: 0,
                            //             jmlstok: stoksatuan
                            //         }
                            //         $('#table_data_detail').datagrid('appendRow', row);

                            //         hitung_subtotal_detail($('#table_data_detail').datagrid(
                            //             'getRows').length - 1, row);
                            //     }
                            // });
                        }
                    }

                    hitung_grandtotal();
                    $('#BARCODE').textbox('textbox').focus();
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
            data.sisa = row.jml - row.terpenuhi;
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

        function enableAddRow() {
            $('#table_data_detail').datagrid('options').RowAdd = true;
        }

        function disableAddRow() {
            $('#table_data_detail').datagrid('options').RowAdd = false;
        }

        function zero_prefix(number) {
            if (number < 10) {
                return '0' + number;
            }

            return number;
        }
    </script>
@endpush
