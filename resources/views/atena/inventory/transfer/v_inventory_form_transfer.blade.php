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
                                                            <input name="idperusahaan" id="IDPERUSAHAAN" style="width:190px"
                                                                type="hidden">
                                                            <tr>
                                                                <td id="label_form">No. Transfer</td>
                                                                <td id="label_form"><input name="kodetransfer"
                                                                        id="KODETRANSFER" class="label_input"
                                                                        style="width:190px" <?php if($KODE == 'AUTO'){?>
                                                                        prompt="Auto Generate" readonly <?php }?>>
                                                                    <input type="hidden" id="IDTRANSFER" name="idtransfer">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td id="label_form">Lokasi Asal</td>
                                                                <td id="label_form"><input name="idlokasiasal"
                                                                        id="IDLOKASIASAL" style="width:190px"></td>
                                                                <input type="hidden" id="KODELOKASIASAL"
                                                                    name="kodelokasiasal">
                                                            </tr>
                                                            <tr>
                                                                <td id="label_form">Lokasi Tujuan</td>
                                                                <td id="label_form"><input name="idlokasitujuan"
                                                                        id="IDLOKASITUJUAN" style="width:190px"></td>
                                                                <input type="hidden" id="KODELOKASITUJUAN"
                                                                    name="kodelokasitujuan">
                                                            </tr>
                                                            <tr>
                                                                <td id="label_form">No. PR</td>
                                                                <td id="label_form">
                                                                    <input name="idpr" id="IDPR"
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
                    src="<?= base_url() ?>/assets/images/simpan.png"></a>


            <br><br>
            <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
                onclick="javascript:tutup()"><img src="<?= base_url() ?>/assets/images/cancel.png"></a>
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
        $(document).ready(function() {

            //TAMBAH CHECK AKSES CETAK
            get_akses_user('<?= $kodemenu ?>', function(data) {
                var UT = data.cetak;
                if (UT == 1) {
                    $('#simpan_cetak').css('filter', '');
                } else {
                    $('#simpan_cetak').css('filter', 'grayscale(100%)');
                    $('#simpan_cetak').removeAttr('onclick');
                }
            });

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

            get_status_trans("atena/Inventori/Transaksi/TransferPersediaan", row.idtransfer, function(data) {
                $(".form_status").html(status_transaksi(data.status));
            });

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
                    var time_transfer = Date.parse(newValue.getFullYear() + '-' + zero_prefix(newValue
                        .getMonth() + 1) + '-' + zero_prefix(newValue.getDate()));
                    var row_pr = $('#IDPR').combogrid('grid').datagrid('getSelected');

                    if (row_pr) {
                        var time_pr = Date.parse(row_pr.tgltrans);

                        if (time_transfer < time_pr) {
                            $.messager.alert('Error', 'Tanggal transfer tidak boleh sebelum tanggal PR',
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

            if ("<?= $mode ?>" == "tambah") {
                tambah();
            } else if ("<?= $mode ?>" == "ubah") {
                ubah();
            }

            // Menghapus loading ketika halaman sudah dimuat
            setTimeout(function() {
                $('#mask-loader').fadeOut(500, function() {
                    $(this).hide()
                })
            }, 250)

        })

        shortcut.add('F8', function() {
            simpan();
        });

        function tutup() {
            parent.tutupTab();
        }

        function cetak(id) {
            $("#window_button_cetak").window('close');
            $("#area_cetak").load(base_url + "atena/Inventori/Transaksi/TransferPersediaan/cetak/" + id);
            $("#form_cetak").window('open');
        }

        function tambah() {
            $('#mode').val('tambah');
            parent.changeTitleTab($('#mode').val());

            enableAddRow();

            $('#lbl_kasir, #lbl_tanggal').html('');
            $('#TGLTRANS').datebox('readonly', false);

            $('#IDLOKASIASAL').combogrid('readonly', false);
            $('#IDLOKASITUJUAN').combogrid('readonly', false);
            $('#IDPR').combogrid('readonly', false);

            idtrans = "";

            $.ajax({
                type: 'POST',
                url: base_url + 'atena/Master/Data/Lokasi/getLokasiDefault',
                dataType: 'json',
                cache: false,
                success: function(msg) {
                    if (msg.idlokasi != null) {
                        $('#IDLOKASI').combogrid('setValue', msg.idlokasi);
                        $("#KODELOKASI").val(msg.kodelokasi);
                    }
                }
            });

            clear_plugin();
            reset_detail();
        }

        function ubah() {
            $('#mode').val('ubah');

            if (row) {
                $('#lbl_kasir').html(row.userbuat);
                $('#lbl_tanggal').html(row.tglentry);

                get_akses_user('<?= $kodemenu ?>', function(data) {
                    var UT = data.ubah;
                    get_status_trans("atena/Inventori/Transaksi/TransferPersediaan", row.idtransfer, function(
                        data) {
                        if (UT == 1 && data.status == 'I') {
                            //document.getElementById('btn_simpan_all').onclick = simpan; 
                            $('#btn_simpan_modal').css('filter', '');
                            $('#mode').val('ubah');
                        } else {
                            document.getElementById('btn_simpan_modal').onclick = '';
                            $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                            $('#btn_simpan_modal').removeAttr('onclick');
                        }
                    });

                    $("#form_input").form('load', row);
                    $('#IDLOKASIASAL').combogrid('readonly');
                    $('#IDLOKASITUJUAN').combogrid('readonly');
                    $('#IDPR').combogrid('readonly', true);
                    $('#TGLTRANS').datebox('readonly', false);

                    if (row.idpr != 0) {
                        disableAddRow();
                        $('#IDPR').combogrid('setValue', {
                            idpr: row.idpr,
                            kodepr: row.kodepr
                        });
                    } else {
                        $('#IDPR').combogrid('clear');
                        enableAddRow();
                    }

                    idtrans = row.idtransfer;
                    load_data(row.idtransfer);

                });
            }
        }

        function simpan(jenis_simpan) {
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
            if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
                cekbtnsimpan = false;
                validasi_session(function() {
                    var adaTrans = false;

                    if (mode == 'ubah') {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: base_url + 'Home/cekTanggalJamInput',
                            data: {
                                id: row.idtransfer,
                                table: "ttransfer",
                                whereid: "idtransfer",
                                tgl: row.tglentry,
                                status: row.status
                            },
                            async: false,
                            success: function(msg) {
                                cekbtnsimpan = true;
                                if (!msg.success) {
                                    var errorMsg =
                                        'Sudah Terdapat Perubahan Data Atas Transaksi Ini Yang Dilakukan Pada Tanggal ' +
                                        msg.tgl + ' / ' + msg.jam +
                                        '.<br>Transaksi Tidak Dapat Disimpan.';
                                    $.messager.alert('Warning', errorMsg, 'warning');
                                    adaTrans = true;
                                }
                            }
                        });
                    }

                    cek_tanggal_tutup_periode($('#TGLTRANS').datebox('getValue'), 0, function(data) {
                        cekbtnsimpan = true;
                        if (!data.success) {
                            var kode = row.kodetransfer ? row.kodetransfer : 'ini';

                            $.messager.alert('Error',
                                'Sudah dilakukan tutup periode pada tanggal transaksi untuk no ' +
                                kode + '. Prosedur tidak dapat dilanjutkan', 'error');

                            adaTrans = true;
                        }
                    });

                    if (!adaTrans) {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: base_url + "atena/Inventori/Transaksi/TransferPersediaan/simpan/" +
                                jenis_simpan,
                            data: datanya,
                            cache: false,
                            beforeSend: function() {
                                $.messager.progress();
                            },
                            success: function(msg) {
                                $.messager.progress('close');
                                cekbtnsimpan = true;
                                if (msg.success) {
                                    $('#form_input').form('clear');
                                    $.messager.show({
                                        title: 'Info',
                                        msg: 'Transaksi Sukses',
                                        showType: 'show'
                                    });
                                    tambah();
                                    parent.reload();
                                    if (jenis_simpan == 'simpan_cetak') {
                                        cetak(msg.id);
                                    }
                                } else {
                                    $.messager.alert('Error', msg.errorMsg, 'error');
                                }
                            }
                        });
                    }
                });
            }
        }

        function reset_detail() {
            $('#table_data_detail').datagrid('loadData', []);
            $('#table_data_detail_po').datagrid('loadData', []);
        }

        function load_data(idtrans) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: base_url + "atena/Inventori/Transaksi/TransferPersediaan/loadData",
                data: "idtrans=" + idtrans,
                cache: false,
                beforeSend: function() {
                    // $.messager.progress();
                },
                success: function(msg) {
                    // $.messager.progress('close');
                    if (msg.success) {
                        $('#table_data_detail').datagrid('loadData', msg.detail);
                    }
                }
            });
        }

        function load_data_detail_pr(idpr) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: base_url + "atena/Pembelian/Transaksi/PermintaanBarang/loadDataDetailTransfer",
                data: {
                    idtrans: idpr,
                    tgltrans: $('#TGLTRANS').datebox('getValue')
                },
                cache: false,
                success: function(msg) {
                    if (msg.success) {
                        $('#table_data_detail').datagrid('loadData', msg.detail);

                        hitung_grandtotal();
                    }
                }
            });
        }

        /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */
        function browse_data_lokasiasal(id) {
            $(id).combogrid({
                panelWidth: 400,
                url: base_url + 'atena/Master/Data/Lokasi/comboGrid',
                idField: 'id',
                textField: 'nama',
                mode: 'local',
                sortName: 'nama',
                sortOrder: 'asc',
                required: true,
                columns: [
                    [{
                            field: 'id',
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
                url: base_url + 'atena/Master/Data/Lokasi/comboGridTransfer',
                idField: 'id',
                textField: 'nama',
                mode: 'local',
                sortName: 'nama',
                sortOrder: 'asc',
                required: true,
                columns: [
                    [{
                            field: 'id',
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

                    var lokasi = $('#IDLOKASITUJUAN').combogrid('getValue');
                    var lokasipengirim = $('#IDLOKASIASAL').combogrid('getValue');

                    $('#IDPR').combogrid('grid').datagrid('options').url = base_url +
                        'atena/Pembelian/Transaksi/PermintaanBarang/comboGridTransfer/' + lokasi + '/' +
                        lokasipengirim;
                    $('#IDPR').combogrid('grid').datagrid('load');
                },
                onLoadSuccess: function(data) {
                    if (data.total == 1) {
                        var rows = data.rows;
                        $(this).combogrid('setValue', rows[0].kode).combogrid('readonly');
                    }
                }
            });
        }

        function hitung_stok() {
            var rows = $('#table_data_detail').datagrid('getRows');

            if (rows.length == 0) {
                return false;
            }

            if ($('#IDLOKASIASAL').combogrid('getValue') == '') {
                return false;
            }

            $.ajax({
                url: base_url + 'atena/Master/Data/Barang/hitungStokTransaksi',
                type: 'POST',
                data: {
                    idlokasi: $('#IDLOKASIASAL').combogrid('getValue'),
                    tgltrans: $('#TGLTRANS').datebox('getValue'),
                    data_detail: JSON.stringify(rows)
                },
                dataType: 'JSON',
                beforeSend: function() {
                    $.messager.progress();
                },
                success: function(response) {
                    for (var i = 0; i < response.detail.length; i++) {
                        $('#table_data_detail').datagrid('updateRow', {
                            index: i,
                            row: {
                                jmlstok: response.detail[i].jmlstok
                            }
                        });
                    }

                    $.messager.progress('close');
                }
            });
        }

        function browse_data_pr(id) {
            $(id).combogrid({
                panelWidth: 600,
                mode: 'remote',
                idField: 'idpr',
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

                    load_data_detail_pr(row.idpr);

                    disableAddRow();
                }
            });
        }

        function browse_data_syaratbayar(id) {
            $(id).combogrid({
                panelWidth: 300,
                url: base_url + 'atena/Master/Data/SyaratBayar/combogrid',
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

                            getRowIndex(target);
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
                            field: 'idbarang',
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
                                    url: base_url + 'atena/Master/Data/Barang/comboGrid/',
                                    onBeforeLoad: function(param) {
                                        if ('undefined' === typeof param.q || param.q.length == 0) {
                                            return false;
                                        }
                                    },
                                    columns: [
                                        [{
                                                field: 'id',
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
                                                field: 'satuan',
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
                        <?php 
				if ($_SESSION[NAMAPROGRAM]['SHOWBARCODE']) {
					?> {
                            field: 'barcodesatuan1',
                            title: 'Barcode Sat. 1',
                            width: 180
                        },
                        <?php
				}

				if ($_SESSION[NAMAPROGRAM]['SHOWPARTNUMBER']) {
					?> {
                            field: 'partnumber',
                            title: 'Part Number',
                            width: 180
                        },
                        <?php
				}
				?> {
                            field: 'jmlstok',
                            title: 'Stok',
                            align: 'right',
                            width: 80,
                            formatter: format_qty
                        },
                        {
                            field: 'jml',
                            title: 'Jumlah',
                            align: 'right',
                            width: 80,
                            formatter: format_qty,
                            editor: {
                                type: 'numberbox',
                            }
                        },
                        {
                            field: 'terpenuhi',
                            title: 'Terpenuhi',
                            align: 'right',
                            width: 80,
                            formatter: format_qty
                        },
                        {
                            field: 'sisa',
                            title: 'Sisa',
                            align: 'right',
                            width: 80,
                            formatter: format_qty
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
                        },
                        {
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
                        ed.combogrid('grid').datagrid('options').url = base_url +
                            'atena/Master/Data/Barang/satuanBarang/' + row.idbarang;
                        ed.combogrid('grid').datagrid('load', {
                            q: '',
                            idbarang: row.idbarang
                        });
                        ed.combogrid('showPanel');
                    }
                },
                onEndEdit: function(index, row, changes) {
                    var cell = $(this).datagrid('cell');
                    var ed = get_editor('#table_data_detail', index, cell.field);
                    var row_update = {};

                    switch (cell.field) {
                        case 'kodebarang':
                            var data = ed.combogrid('grid').datagrid('getSelected');

                            var id = data ? data.id : '';
                            var nama = data ? data.nama : '';
                            var satuan = data ? data.satuan : '';
                            var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
                            var partnumber = data.partnumber ? data.partnumber : '';

                            row_update = {
                                idbarang: id,
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

                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                url: base_url + 'atena/Master/Data/Barang/getStokBarangSatuan',
                                async: false,
                                data: {
                                    idbarang: row.idbarang,
                                    idlokasi: $('#IDLOKASIASAL').combogrid('getValue'),
                                    satuan: changes.satuan,
                                    tgltrans: $('#TGLTRANS').datebox('getValue')
                                },
                                cache: false,
                                success: function(stoksatuan) {

                                    if (stoksatuan != null) {
                                        stok = stoksatuan;
                                    }

                                    row_update['jmlstok'] = stok;
                                }
                            });

                            break;
                    }
                    if (jQuery.isEmptyObject(row_update) == false) {
                        $(this).datagrid('updateRow', {
                            index: index,
                            row: row_update
                        });
                    }
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
                onAfterEdit: function(index, row, changes) {
                    if (changes.kodebarang) {
                        if ($('#IDLOKASIASAL').combogrid('getValue') != '') {
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                url: base_url + 'atena/Master/Data/Barang/getStokBarangSatuan',
                                async: false,
                                data: {
                                    idbarang: row.idbarang,
                                    idlokasi: $('#IDLOKASIASAL').combogrid('getValue'),
                                    tgltrans: $('#TGLTRANS').datebox('getValue'),
                                    satuan: row.satuan,
                                },
                                cache: false,
                                success: function(stoksatuan) {
                                    var data = {
                                        jmlstok: stoksatuan
                                    };

                                    $('#table_data_detail').datagrid('updateRow', {
                                        index: index,
                                        row: data
                                    }).datagrid('gotoCell', {
                                        index: index,
                                        field: 'kodebarang'
                                    });
                                }
                            });
                        }
                    }
                    hitung_subtotal_detail(index, row);
                    hitung_grandtotal();
                }
            }).datagrid('enableCellEditing');
        }

        function insert_barang(barcodesatuan1) {
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
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: base_url + "atena/Master/Data/Barang/loadDataBarangBarcode",
                data: {
                    barcode: barcodesatuan1string,
                },
                cache: false,
                beforeSend: function() {
                    $.messager.progress();
                },
                success: function(msg) {
                    $.messager.progress('close');

                    if (msg == null) {
                        $.messager.alert('Error', 'Barcode Tersebut Tidak Ditemukan', 'error');
                    } else {

                        data = msg["rows"];

                        var id = data ? data.id : '';
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
                            if (daftar_barang[i].idbarang == id) {

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
                                $.ajax({
                                    type: 'POST',
                                    dataType: 'json',
                                    url: base_url + 'atena/Master/Data/Barang/getStokBarangSatuan',
                                    async: false,
                                    data: {
                                        idbarang: id,
                                        idlokasi: $('#IDLOKASIASAL').combogrid('getValue'),
                                        tgltrans: $('#TGLTRANS').datebox('getValue'),
                                        satuan: satuan,
                                    },
                                    cache: false,
                                    success: function(stoksatuan) {

                                        var row = {
                                            idbarang: id,
                                            kodebarang: kode,
                                            namabarang: nama,
                                            barcodesatuan1: barcodesatuan1,
                                            partnumber: partnumber,
                                            satuan_lama: satuan,
                                            satuan: satuan,
                                            jml: 1,
                                            terpenuhi: 0,
                                            jmlstok: stoksatuan
                                        }
                                        $('#table_data_detail').datagrid('appendRow', row);

                                        hitung_subtotal_detail($('#table_data_detail').datagrid(
                                            'getRows').length - 1, row);
                                    }
                                });
                            }
                        }

                        hitung_grandtotal();
                        $('#BARCODE').textbox('textbox').focus();
                    }

                }
            });
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
                        timeout: <?= $_SESSION[NAMAPROGRAM]['TIMEOUT'] ?>,
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
