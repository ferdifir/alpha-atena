@extends('template.form')

@section('content')
    <div id="form_input" class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false">
            <div class="easyui-layout" fit="true">
                <div data-options="region:'center',border:false">
                    <div class="easyui-layout" style="height:100%" id="trans_layout">
                        <script>
                            if (screen.height < 450) $("#trans_layout").css('height', "450px");
                        </script>
                        <div data-options="region:'north',border:false" style="width:100%; height:240px;">
                            <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;">
                            </div>
                            <table>
                                <input type="hidden" id="mode" name="mode">
                                <tr>
                                    <td valign="top">
                                        <fieldset style="height:230px;">
                                            <legend id="label_laporan">Info Transaksi</legend>
                                            <table border="0">
                                                <tr>
                                                    <td id="label_form">No. Repacking</td>
                                                    <td id="label_form"><input name="koderepacking" id="KODEREPACKING"
                                                            class="label_input" style="width:190px">
                                                        <input type="hidden" id="IDREPACKING" name="uuidrepacking">
                                                        <input type="hidden" id="TGLENTRY" name="tglentry">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="label_form">Lokasi</td>
                                                    <td id="label_form"><input name="uuidlokasi" id="IDLOKASI"
                                                            style="width:190px"></td>
                                                    <input type="hidden" id="KODELOKASI" name="kodelokasi">
                                                </tr>
                                                <tr>
                                                    <td id="label_form">Tgl. Trans</td>
                                                    <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date"
                                                            style="width:190px"></td>
                                                </tr>
                                                <tr>
                                                    <td id="label_form">No. SO</td>
                                                    <td id="label_form"><input name="uuidso" id="IDSO"
                                                            style="width:190px"></td>
                                                </tr>
                                                <tr>
                                                    <td id="label_form">Barang</td>
                                                    <td id="label_form"><input name="uuidbarang" id="IDBARANG"
                                                            style="width:190px"></td>
                                                    <input type="hidden" id="KODEBARANG" name="kodebarang">
                                                </tr>
                                                <tr>
                                                    <td id="label_form">
                                                        <input type="radio" id="JENISJMLSET" name="jenis"
                                                            value="JMLSET">
                                                        Jumlah Set
                                                    </td>
                                                    <td id="label_form">
                                                        <input name="jmlset" id="JMLSET" value="1"
                                                            style="width:60px">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="label_form">Jumlah Barang 1 Set</td>
                                                    <td id="label_form">
                                                        <input name="jmlhasilset" id="JMLHASILSET" class="number" readonly
                                                            value="1" style="width:60px">
                                                        <input name="satuanutama" id="SATUANUTAMA" style="width:60px"
                                                            class="label_input" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="label_form">
                                                        <input type="radio" id="JENISJMLHASIL" name="jenis"
                                                            value="JMLHASIL">
                                                        Total Jumlah Barang Dihasilkan
                                                    </td>
                                                    <td id="label_form">
                                                        <input name="jml" id="JML" value="1" class="number"
                                                            style="width:60px">
                                                        <input name="satuan" id="SATUAN" style="width:60px">
                                                    </td>
                                                </tr>
                                            </table>
                                            </legend>
                                    </td>
                                    <td valign="bottom">
                                        <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                                            style="width:300px; height:85px" data-options="validType:'length[0, 500]'"></textarea>
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
                                            id="label_form">User :</label> <label id="lbl_kasir"></label> <label
                                            style="font-weight:normal" id="label_form">| Entry Tgl. Transaksi :</label>
                                        <label id="lbl_tanggal"></label>
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
        var cekbtnsimpan = true;
        var indexDetail = 0;
        var idtrans = "";
        var row = {};
        var config = {};
        $(document).ready(async function() {
            let check = false;
            await getConfig('KODEREPACKING', 'TREPACKING', 'bearer {{ session('TOKEN') }}',
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
                $('#KODEREPACKING').textbox({
                    prompt: "Auto Generate",
                    readonly: true,
                    required: false
                });
            } else {
                $('#KODEREPACKING').textbox({
                    prompt: "",
                    readonly: false,
                    required: true
                });
                $('#KODEREPACKING').textbox('clear').textbox('textbox').focus();
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
                        export_excel('Faktur Repacking', $("#area_cetak").html());
                        return false;
                    }
                }]
            }).window('close');

            $('[name="jenis"]').change(function() {
                var checked = $('[name="jenis"]:checked').val();

                if (checked == 'JMLSET') {
                    $('#JML').textbox('readonly', true);
                    $('#JMLSET').textbox('readonly', false);
                    $('#SATUAN').combogrid('readonly', true);
                } else if (checked == 'JMLHASIL') {
                    $('#JML').textbox('readonly', false);
                    $('#JMLSET').textbox('readonly', true);
                    $('#SATUAN').combogrid('readonly', false);
                }
            })

            $('#JMLSET').numberbox({
                onChange: function() {
                    if ($('[name="jenis"]:checked').val() != 'JMLSET') {
                        return;
                    }

                    var rows = $('#table_data_detail').datagrid('getRows');

                    $('#JML').numberbox('setValue', parseFloat($('#JMLHASILSET').numberbox(
                        'getValue')) * parseFloat($('#JMLSET').numberbox('getValue')));

                    if (rows.length > 0) {
                        var satuan = $('#SATUAN').combogrid('getValue');
                        var barang = $('#IDBARANG').combogrid('grid').datagrid('getSelected');

                        for (var i = 0; i < rows.length; i++) {
                            var row_update = {};

                            row_update = {
                                jmldibutuhkan: (parseFloat(rows[i].jmlrumus) * parseFloat($(
                                    '#JMLSET').numberbox('getValue'))).toFixed(
                                    {{ session('DECIMALDIGITQTY') }}),
                            };

                            if (jQuery.isEmptyObject(row_update) == false) {
                                $('#table_data_detail').datagrid('updateRow', {
                                    index: i,
                                    row: row_update
                                });
                            }
                        }
                    }
                }
            });

            $('#JML').numberbox({
                onChange: function() {
                    if ($('[name="jenis"]:checked').val() != 'JMLHASIL') {
                        return;
                    }

                    var rows = $('#table_data_detail').datagrid('getRows');

                    var konversi = 1;
                    var satuan = $('#SATUAN').combogrid('getValue');
                    var barang = $('#IDBARANG').combogrid('grid').datagrid('getSelected');

                    if (satuan == barang.satuan) {
                        konversi = barang.konversi1 * barang.konversi2;
                    } else if (satuan == barang.satuan2) {
                        konversi = barang.konversi2;
                    }

                    $('#JMLSET').numberbox('setValue', parseFloat($('#JML').numberbox('getValue')) *
                        konversi / parseFloat($('#JMLHASILSET').numberbox('getValue')));

                    if (rows.length > 0) {
                        for (var i = 0; i < rows.length; i++) {
                            var row_update = {};

                            row_update = {
                                jmldibutuhkan: (parseFloat($('#JML').numberbox('getValue')) *
                                        konversi / parseFloat($('#JMLHASILSET').numberbox(
                                            'getValue')) * parseFloat(rows[i].jmlrumus))
                                    .toFixed(
                                        {{ session('DECIMALDIGITQTY') }}),
                            };

                            if (jQuery.isEmptyObject(row_update) == false) {
                                $('#table_data_detail').datagrid('updateRow', {
                                    index: i,
                                    row: row_update
                                });
                            }
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

            // get_status_trans("atena/Inventori/Transaksi/Repacking", row.idrepacking, function(data) {
            //     $(".form_status").html(status_transaksi(data.status));
            // });
            browse_data_lokasi('#IDLOKASI');
            browse_data_barang_set('#IDBARANG');
            browse_data_so('#IDSO');
            browse_data_satuan('#SATUAN');
            buat_table_detail();

            $('#toolbar').hide();

            @if ($mode == 'tambah')
                //TAMBAH CHECK AKSES CETAK
                await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(
                    data) {
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
                let url = link_api.cetakRepacking + uuidtrans;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidrepacking: uuidtrans,
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

            $('#IDLOKASI').combogrid('readonly', false);
            idtrans = "";

            $('#TGLTRANS').datebox('readonly', false);

            $('#JENISJMLSET').prop('checked', true);

            $('#JML').textbox('readonly', true);
            $('#JMLSET').textbox('readonly', false);
            $('#SATUAN').combogrid('readonly', true);
            $('#IDLOKASI').combogrid('clear');
            $('#SATUAN').combogrid('clear');

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
                    if (Array.isArray(dataLokasi) && (dataLokasi.uuidlokasi ?? "") != "" && (dataLokasi.lokasidefault ??
                            1) == 1) {
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
                let url = link_api.loadDataHeaderRepacking;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidrepacking: '{{ $data }}',
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
                    var statusTrans = await getStatusTrans(link_api.getStatusTransRepacking,
                        'bearer {{ session('TOKEN') }}', {
                            uuidrepacking: row.uuidrepacking
                        });
                    $(".form_status").html(status_transaksi(data.status));
                    if (UT == 1 && statusTrans == 'I') {
                        $('#btn_simpan_modal').css('filter', '');
                        $('#mode').val('ubah');
                    } else {
                        document.getElementById('btn_simpan_modal').onclick = '';
                        $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                        $('#btn_simpan_modal').removeAttr('onclick');
                    }

                    $("#form_input").form('load', row);
                    $('#IDLOKASI').combogrid('readonly');

                    $('#TGLTRANS').datebox('readonly', true);

                    if (row.detailsetubah == 1) {
                        $('#toolbar').show();

                        $('#table_data_detail').datagrid('options').RowDelete = true;
                    } else {
                        $('#toolbar').hide();

                        $('#table_data_detail').datagrid('options').RowDelete = false;
                    }

                    if (row.uuidso > 0) {

                        $('#IDSO').combogrid('grid').datagrid('options').url = link_api
                            .browseSalesOrderRepacking;
                        $('#IDSO').combogrid('grid').datagrid('load', {
                            uuidlokasi: row.uuidlokasi,
                        });

                        $('#IDSO').combogrid('setValue', {
                            uuidso: row.uuidso,
                            kode: row.kodeso
                        });

                        $('#IDSO').combogrid('readonly', true);
                        $('#IDBARANG').combogrid('grid').datagrid('options').url = link_api
                            .browseBarangSalesOrderRepacking;
                        $('#IDBARANG').combogrid('grid').datagrid('load', {
                            uuidso: row.uuidso,
                        });
                    }
                    $('#IDBARANG').combogrid('setValue', {
                        uuidbarang: row.uuidbarang,
                        nama: row.namabarang,
                        satuan: row.satuanbesar,
                        satuan2: row.satuan2,
                        satuan3: row.satuan3,
                        konversi1: row.konversi1,
                        konversi2: row.konversi2,
                        satuanutama: row.satuanutama
                    });

                    $('#JENISJMLSET').prop('checked', true);

                    $('#JML').textbox('readonly', true);
                    $('#JMLSET').textbox('readonly', false);
                    $('#SATUAN').combogrid('readonly', true);

                    //get_combogrid_data ($('#KODESUPPLIER'), row.KODESUPPLIER, 'supplier');
                    //get_combogrid_data ($('#KODEPERKIRAANBIAYA'), row.KODEPERKIRAANBIAYA, 'kode_perkiraan&jenis=detail');
                    idtrans = row.uuidrepacking;
                    await load_data(row.uuidrepacking);


                    $('#SATUAN').combogrid('grid').datagrid('options').url = link_api
                        .loadSatuanBarang;
                    $('#SATUAN').combogrid('grid').datagrid('load', {
                        uuidbarang: row.uuidbarang,
                    });

                    $('#SATUAN').combogrid('setValue', row.satuan);

                    $('#lbl_kasir').html(row.userentry);
                    $('#lbl_tanggal').html(row.tglentry);

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
                var cekAda = false;
                var daftarBarangKurangJml = '';
                for (var i = 0; i < rows.length; i++) {
                    var kode = rows[i].kodebarang;

                    if ($.inArray(kode, barang) == -1) { // not found
                        barang.push(kode);
                    } else {
                        $.messager.alert('Error', 'Ada Barang Yang Terinput 2x<br>Cek Barang ' + kode, 'error');
                        isValid = false;
                        break;
                    }
                }
            }

            if (isValid) {
                isValid = cek_datagrid($('#table_data_detail'));
            }

            if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
                cekbtnsimpan = false;
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
                    let url = link_api.simpanRepacking;
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

                        $('#form_input').form('clear');

                        $.messager.show({
                            title: 'Info',
                            msg: 'Transaksi Sukses',
                            showType: 'show'
                        });
                        if (mode == "tambah") {
                            await tambah();
                            $('#table_data_detail').datagrid('loadData', []);
                        }else{
                            await ubah();
                        }
                        if (jenis_simpan == 'simpan_cetak') {
                            await cetak(response.data.uuidrepacking);
                        }
                    } else {
                        $.messager.alert('Error', response.message, 'error');
                    }
                } catch (error) {
                    console.log(error);
                    var textError = getTextError(error);
                    $.messager.alert('Error', getTextError(error), 'error');
                }

                cekbtnsimpan = true;
                tutupLoaderSimpan();
            }
        }

        function reset_detail() {
            $('#table_data_detail').datagrid('loadData', []);
            $('#table_data_detail_po').datagrid('loadData', []);
        }

        async function load_data(idtrans) {
            try {
                let url = link_api.loadDataRepacking;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidrepacking: idtrans,
                        mode: "ubah",
                    }),
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status} from ${url}`);
                    }
                    return response.json();
                })
                if (response.success) {
                    $('#table_data_detail').datagrid('loadData', response.data);

                    var rows = response.data;

                    for (var i = 0; i < rows.length; i++) {
                        hitung_subtotal_detail(i, rows[i])
                    }

                    hitung_grandtotal();
                } else {
                    $.messager.alert('Error', response.message, 'error');
                }
            } catch (error) {
                var textError = getTextError(error);
                $.messager.alert('Error', getTextError(error), 'error');
            }
        }

        async function load_data_barang(idbarang) {
            bukaLoader();
            try {
                let url = link_api.loadDataBarangSetRepacking;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidbarang: idbarang,
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
                    var rows = response.data;
                    for (var i = 0; i < rows.length; i++) {
                        hitung_subtotal_detail(i, rows[i])
                    }
                    hitung_grandtotal();

                    for (var i = 0; i < response.data.length; i++) {
                        response.data[i].jmldibutuhkan = (response.data[i].jmldibutuhkan * $('#JMLSET')
                            .numberbox(
                                'getValue')).toFixed({{ session('DECIMALDIGITQTY') }});
                    }
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
        function browse_data_lokasi(id) {
            $(id).combogrid({
                panelWidth: 400,
                url: link_api.browseLokasi,
                idField: 'uuidlokasi',
                textField: 'nama',
                mode: 'remote',
                sortName: 'nama',
                sortOrder: 'asc',
                required: true,
                selectFirstRow: true,
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
                    $("#KODELOKASI").val(row.kode);

                    $('#IDSO').combogrid('grid').datagrid('options').url = link_api
                        .browseSalesOrderRepacking;
                    $('#IDSO').combogrid('grid').datagrid('load', {
                        uuidlokasi: row.uuidlokasi,
                    });

                    if ($('#mode').val() != '') {
                        reset_detail();
                    }
                }
            });
        }

        function browse_data_barang_set(id) {
            $(id).combogrid({
                panelWidth: 400,
                url: link_api.browseSetBarang,
                idField: 'uuidbarang',
                textField: 'nama',
                mode: 'remote',
                sortName: 'nama',
                sortOrder: 'asc',
                required: true,
                selectFirstRow: true,
                columns: [
                    [{
                            field: 'uuidbarang',
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
                        {
                            field: 'satuan',
                            title: 'Satuan',
                            width: 100,
                            sortable: true,
                            align: 'center'
                        },
                        {
                            field: 'jmlhasilset',
                            title: 'Jml Hasil',
                            width: 80,
                            sortable: true,
                            formatter: format_qty
                        },
                        {
                            field: 'namamerk',
                            title: 'Merk',
                            width: 200,
                            sortable: true
                        },
                        {
                            field: 'partnumber',
                            title: 'Part Number',
                            width: 200,
                            sortable: true
                        },
                        {
                            field: 'barcodesatuan1',
                            title: 'Barcode Sat. 1',
                            width: 200,
                            sortable: true
                        },
                    ]
                ],
                onSelect: function(index, row) {
                    $("#KODEBARANG").val(row.kode);
                    $("#JMLHASILSET").numberbox('setValue', row.jmlhasilset);

                    $('#SATUAN').combogrid('grid').datagrid('options').url = link_api
                        .loadSatuanBarang;
                    $('#SATUAN').combogrid('grid').datagrid('load', {
                        uuidbarang: row.uuidbarang,
                    });

                    if ($('#IDSO').combogrid('getValue') > 0) {
                        $('#JENISJMLHASIL').prop('checked', true)
                        $('#JML').textbox('readonly', false);
                        $('#JMLSET').textbox('readonly', true);
                        $('#SATUAN').combogrid('readonly', false);

                        $('#JML').numberbox('setValue', row.jmlso);
                        $('#SATUAN').combogrid('setValue', row.satuanso);
                    } else {
                        $("#JML").numberbox('setValue', $("#JMLSET").numberbox('getValue') * $(
                                "#JMLHASILSET")
                            .numberbox('getValue'));

                        $('#SATUAN').combogrid('setValue', row.satuanutama)
                        $('#SATUANUTAMA').textbox('setValue', row.satuanutama)
                    }

                    if (row.detailsetubah == 1) {
                        $('#toolbar').show();

                        $('#table_data_detail').datagrid('options').RowDelete = true;
                    } else {
                        $('#toolbar').hide();

                        $('#table_data_detail').datagrid('options').RowDelete = false;
                    }

                    load_data_barang(row.uuidbarang);

                    if ($('#mode').val() != '') {
                        reset_detail();
                    }
                }
            });
        }

        function browse_data_satuan(id) {
            $(id).combogrid({
                panelWidth: 90,
                idField: 'satuan',
                textField: 'satuan',
                mode: 'local',
                required: true,
                editable: false,
                columns: [
                    [{
                        field: 'satuan',
                        title: 'Satuan',
                        width: 60,
                        sortable: true,
                        align: 'center',
                    }, ]
                ],
                onChange: function() {
                    if ($('[name="jenis"]:checked').val() != 'JMLHASIL') {
                        return;
                    }

                    var rows = $('#table_data_detail').datagrid('getRows');

                    var konversi = 1;
                    var satuan = $('#SATUAN').combogrid('getValue');
                    var barang = $('#IDBARANG').combogrid('grid').datagrid('getSelected');

                    if (satuan == barang.satuan) {
                        konversi = barang.konversi1 * barang.konversi2;
                    } else if (satuan == barang.satuan2) {
                        konversi = barang.konversi2;
                    }

                    $('#JMLSET').numberbox('setValue', parseFloat($('#JML').numberbox('getValue')) *
                        konversi /
                        parseFloat($('#JMLHASILSET').numberbox('getValue')));

                    if (rows.length > 0) {
                        for (var i = 0; i < rows.length; i++) {
                            var row_update = {};

                            row_update = {
                                jmldibutuhkan: (parseFloat($('#JML').numberbox('getValue')) *
                                    konversi /
                                    parseFloat($('#JMLHASILSET').numberbox('getValue')) *
                                    parseFloat(
                                        rows[i].jmlrumus)).toFixed(
                                    {{ session('DECIMALDIGITQTY') }}),
                            };

                            if (jQuery.isEmptyObject(row_update) == false) {
                                $('#table_data_detail').datagrid('updateRow', {
                                    index: i,
                                    row: row_update
                                });
                            }
                        }
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
                RowDelete: false,
                RowAdd: false,
                data: [],
                toolbar: '#toolbar',
                columns: [
                    [{
                            field: 'uuidbarang',
                            hidden: true
                        },
                        {
                            field: 'kodebarang',
                            title: 'Kode Barang',
                            width: 85
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
                            field: 'jmlrumus',
                            hidden: true
                        },
                        {
                            field: 'jmldibutuhkan',
                            title: 'Jml. Kebutuhan',
                            align: 'right',
                            width: 90,
                            formatter: format_qty
                        },
                        {
                            field: 'satuandibutuhkan',
                            title: 'Sat. Kebutuhan',
                            align: 'center',
                            width: 90
                        },
                        {
                            field: 'jml',
                            title: 'Jumlah',
                            align: 'right',
                            width: 60,
                            formatter: format_qty,
                            editor: {
                                type: 'numberbox',
                                options: {
                                    min: 0,
                                }
                            }
                        },
                        {
                            field: 'satuan_lama',
                            title: 'Satuan',
                            width: 45,
                            align: 'center',
                            hidden: true
                        },
                        {
                            field: 'satuan',
                            title: 'Satuan',
                            width: 80,
                            align: 'center',
                            editor: {
                                type: 'combogrid',
                                options: {
                                    panelWidth: 100,
                                    panelHeight: 130,
                                    mode: 'local',
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
                        },
                    ]
                ],
                onClickRow: function(index, row) {
                    indexDetail = index;
                },
                onCellEdit: function(index, field, val) {
                    var row = $(this).datagrid('getRows')[index];
                    var ed = get_editor('#table_data_detail', index, field);

                    if (field == 'satuan') {
                        ed.combogrid('grid').datagrid('options').url = link_api.loadSatuanBarang;
                        ed.combogrid('grid').datagrid('load', {
                            q: '',
                            uuidbarang: row.uuidbarang
                        });
                        ed.combogrid('showPanel');
                    } else if (field == 'kodebarang') {
                        ed.combogrid('grid').datagrid('options').url = link_api.browseBarang;
                        ed.combogrid('grid').datagrid('load', {
                            q: ''
                        });
                        ed.combogrid('showPanel');
                    }
                },
                onEndEdit: function(index, row, changes) {
                    var cell = $(this).datagrid('cell');
                    var ed = get_editor('#table_data_detail', index, cell.field);
                    var row_update = {};

                    switch (cell.field) {
                        case 'satuan':
                            row_update = {
                                jml: 0,
                                satuan_lama: changes.satuan
                            };

                            break;
                    }
                    if (jQuery.isEmptyObject(row_update) == false) {
                        $(this).datagrid('updateRow', {
                            index: index,
                            row: row_update
                        });
                    }
                },
                onLoadSuccess: function(data) {
                    //hitung_grandtotal();
                },
                onAfterDeleteRow: function(index, row) {
                    //hitung_grandtotal();
                },
                onAfterEdit: function(index, row, changes) {
                    hitung_subtotal_detail(index, row);
                    //hitung_grandtotal();
                }
            }).datagrid('enableCellEditing');
        }

        function hitung_subtotal_detail(index, row) {
            // hitung diskon lebih dahulu
            var dg = $('#table_data_detail');

            // cek jika ada barang yang sama
            var rows = dg.datagrid('getRows');

            for (var i = 0; i < rows.length; i++) {
                if (index != i && row.kodebarang == rows[i].kodebarang) {
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
                subtotal: 0,
            }
            for (var i = 0; i < data.length; i++) {
                footer.subtotal += parseFloat(data[i].subtotal);
            }

            $('#table_data_detail').datagrid('reloadFooter', [footer]);
        }

        function clear_plugin() {
            $('.combogrid-f').each(function() {
                $(this).combogrid('grid').datagrid('load', {
                    q: ''
                });
            });

            $('.number').numberbox('setValue', 1);

            $("#TGLTRANS, #TGLKIRIM, #TGLJATUHTEMPO").datebox('setValue', date_format());
            $("#TGLJATUHTEMPO").datebox('readonly');
        }

        function hapus_detail() {
            $('#table_data_detail').datagrid('deleteRow', indexDetail);
        }

        function browse_data_so(id) {
            $(id).combogrid({
                panelWidth: 230,
                idField: 'uuidso',
                textField: 'kode',
                mode: 'remote',
                sortName: 'kode',
                sortOrder: 'asc',
                columns: [
                    [{
                            field: 'uuidso',
                            hidden: true
                        },
                        {
                            field: 'kode',
                            title: 'Kode',
                            width: 100,
                            sortable: true
                        },
                        {
                            field: 'tgltrans',
                            title: 'Tgl Trans',
                            width: 100,
                            sortable: true
                        },
                    ]
                ],
                onSelect: function(index, row) {
                    $('#IDBARANG').combogrid('grid').datagrid('options').url = link_api
                        .browseBarangSalesOrderRepacking;
                    $('#IDBARANG').combogrid('grid').datagrid('load', {
                        uuidso: row.uuidso,
                    });

                    $('#table_data_detail').datagrid('loadData', []);
                }
            });
        }
    </script>
@endpush
