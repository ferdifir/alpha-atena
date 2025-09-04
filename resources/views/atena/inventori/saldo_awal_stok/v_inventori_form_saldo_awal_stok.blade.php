@extends('template.form')

@section('content')
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
                                <input type="hidden" id="IDSALDOSTOK" name="idsaldostok"></td>
                                <tr>
                                    <td valign="top">
                                        <fieldset style="height:120px;">
                                            <legend id="label_laporan">Info Transaksi</legend>
                                            <table border="0">
                                                <tr>
                                                    <td id="label_form">No. Saldo Stok</td>
                                                    <td id="label_form"><input name="kodesaldostok" id="KODESALDOSTOK"
                                                            class="label_input" style="width:190px" <?php if($KODE == 'AUTO'){?>
                                                            prompt="Auto Generate" readonly <?php }?>></td>
                                                </tr>
                                                <tr>
                                                    <td id="label_form">Lokasi</td>
                                                    <td id="label_form"><input name="idlokasi" id="IDLOKASI"
                                                            style="width:190px"></td>
                                                    <input type="hidden" id="KODELOKASI" name="kodelokasi">
                                                </tr>
                                                <tr>
                                                    <td id="label_form">Tgl. Trans
                                                    <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date"
                                                            style="width:190px"></td>
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
        var row = {};
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
                        export_excel('Faktur Saldo Awal Stok', $("#area_cetak").html());
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

            get_status_trans("atena/Inventori/Transaksi/SaldoAwalStok", row.idsaldostok, function(data) {
                $(".form_status").html(status_transaksi(data.status));
            });

            browse_data_lokasi('#IDLOKASI');

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
            $("#area_cetak").load(base_url + "atena/Inventori/Transaksi/SaldoAwalStok/cetak/" + id);
            $("#form_cetak").window('open');
        }


        function tambah() {
            $('#mode').val('tambah');
            parent.changeTitleTab($('#mode').val());

            $('#lbl_kasir, #lbl_tanggal').html('');

            $('#IDLOKASI').combogrid('readonly', false);
            $('#TGLTRANS').combogrid('readonly', false);
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
                $("#form_input").form('load', row);
                $('#IDLOKASI').combogrid('readonly');
                $('#TGLTRANS').combogrid('readonly', false);

                load_data(row.idsaldostok);

                $('#lbl_kasir').html(row.userbuat);
                $('#lbl_tanggal').html(row.tglentry);

                get_akses_user('<?= $kodemenu ?>', function(data) {
                    var UT = data.ubah;
                    get_status_trans("atena/Inventori/Transaksi/SaldoAwalStok", row.idsaldostok, function(data) {
                        if (UT == 1 && data.status == 'I') {
                            $('#btn_simpan_modal').linkbutton('enable');
                            $('#mode').val('ubah');
                        } else {
                            document.getElementById('btn_simpan_modal').onclick = '';
                            $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                            $('#btn_simpan_modal').removeAttr('onclick');
                        }

                    });
                });
            }
        }

        function simpan(jenis_simpan) {
            var mode = $("#mode").val();

            // collapse row LO
            var rows = $('#table_data_detail').datagrid('getRows');
            for (var i = 0; i < rows.length; i++) {
                $('#table_data_detail').datagrid('collapseRow', i)
            }

            $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

            var datanya = $("#form_input :input").serialize();
            var isValid = $('#form_input').form('validate');

            $('#window_button_simpan').window('close');

            // cek detail transaksi apakah ada barang yang sama, maka munculkan warning
            if (isValid) {
                var barang = [];
                var rows = $('#table_data_detail').datagrid('getRows');
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
                validasi_session(function() {
                    var adaTrans = false;

                    if (mode == 'ubah') {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: base_url + 'Home/cekTanggalJamInput',
                            data: {
                                id: row.idsaldostok,
                                table: "saldostok",
                                whereid: "idsaldostok",
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
                            var kode = row.kodesaldostok ? row.kodesaldostok : 'ini';

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
                            url: base_url + "atena/Inventori/Transaksi/SaldoAwalStok/simpan/" +
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
        }

        function load_data(idtrans) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: base_url + "atena/Inventori/Transaksi/SaldoAwalStok/loadData",
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

        /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */
        function browse_data_lokasi(id) {
            $(id).combogrid({
                panelWidth: 400,
                url: base_url + 'atena/Master/Data/Lokasi/comboGrid',
                idField: 'id',
                textField: 'nama',
                mode: 'local',
                sortName: 'nama',
                sortOrder: 'asc',
                required: true,
                selectFirstRow: true,
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
                    $("#KODELOKASI").val(row.kode);
                },
                onLoadSuccess: function(data) {
                    if (data.total == 1) {
                        var rows = data.rows;
                        $(this).combogrid('setValue', rows[0].kode).combogrid('readonly');
                    }
                },
                onChange: function(newVal, oldVal) {
                    if ($('#mode').val() != '') {
                        reset_detail();
                    }
                }
            });
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
                            var index = $(dg).datagrid('getRows').length;
                            $(dg).datagrid('appendRow', {
                                kodebarang: '',
                                subtotal: 0,
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
                columns: [
                    [{
                            field: 'idbarang',
                            hidden: true
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
                                                width: 100
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
                                                title: 'barcodesatuan1',
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
                            width: 295,
                        },
                        <?php
					if ($_SESSION[NAMAPROGRAM]['SHOWBARCODE']) {
					?> {
                            field: 'barcodesatuan1',
                            title: 'Barcode Sat. 1',
                            width: 120
                        },
                        <?php
					}

					if ($_SESSION[NAMAPROGRAM]['SHOWPARTNUMBER']) {
					?> {
                            field: 'partnumber',
                            title: 'Part Number',
                            width: 120
                        },
                        <?php
					}
					?> {
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
                            field: 'satuan_lama',
                            title: 'Satuan',
                            width: 40,
                            align: 'center',
                            hidden: true
                        },
                        {
                            field: 'satuan',
                            title: 'Satuan',
                            width: 75,
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
                            field: 'harga',
                            title: 'Harga',
                            align: 'right',
                            width: 85,
                            formatter: format_amount
                        },
                        {
                            field: 'subtotal',
                            title: 'Subtotal',
                            align: 'right',
                            width: 95,
                            formatter: format_amount
                            <?php if ($INPUTHARGA == 1) { ?>,
                            editor: {
                                type: 'numberbox',
                                options: {
                                    required: true
                                }
                            },
                            <?php } ?>
                        },
                    ]
                ],
                //UNTUK TOMBOL EDIT
                onClickRow: function(index, row) {
                    indexDetail = index;
                },
                onCellEdit: function(index, field, val) {
                    var row = $(this).datagrid('getRows')[index];
                    var ed = get_editor('#table_data_detail', index, field);

                    if (field == 'satuan') {
                        ed.combogrid('grid').datagrid('options').url = base_url +
                            'atena/Master/Data/Barang/satuanBarang/' + row.idbarang;
                        ed.combogrid('grid').datagrid('load', {
                            q: '',
                            idbarang: row.idbarang
                        });
                        ed.combogrid('showPanel');
                    } else if (field == 'kodebarang') {
                        ed.combogrid('grid').datagrid('options').url = base_url +
                            'atena/Master/Data/Barang/comboGrid';
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
                                jml: 1,
                            };
                            break;
                        case 'satuan':
                            // get_konversi (ed.combogrid('grid').datagrid('getRows'), changes.satuan, row.satuan_lama);
                            // if (satuan_baru != 0 || satuan_lama != 0 &&  changes.satuan) {
                            // 	row_update = {
                            // 		jml: (satuan_baru>satuan_lama) ? row.jml*konversi_baru : row.jml/konversi_lama,
                            // 		//harga: (satuan_baru>satuan_lama) ? row.harga/konversi_baru : row.harga*konversi_lama,
                            // 		// hargakurs: (satuan_baru>satuan_lama) ? row.hargakurs/konversi_baru : row.hargakurs*konversi_lama,
                            // 		satuan_lama:changes.satuan
                            // 	};
                            // }
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
                    hitung_grandtotal();
                },
                onAfterDeleteRow: function(index, row) {
                    hitung_grandtotal();
                },
                onAfterEdit: function(index, row, changes) {
                    hitung_subtotal_detail(index, row);
                    hitung_grandtotal();
                },
            }).datagrid('enableCellEditing');
        }

        function hitung_subtotal_detail(index, row) {
            // hitung diskon lebih dahulu
            var data = {};
            var subtotal = parseFloat(row.subtotal);
            var dg = $('#table_data_detail');

            row.jml = parseFloat(row.jml).toFixed(<?= $_SESSION[NAMAPROGRAM]['DECIMALDIGITQTY'] ?>);
            data.harga = +((subtotal / row.jml).toFixed(<?= $_SESSION[NAMAPROGRAM]['DECIMALDIGITAMOUNT'] ?>));

            dg.datagrid('updateRow', {
                index: index,
                row: data
            });

            // cek jika ada barang yang sama
            var rows = dg.datagrid('getRows');

            for (var i = 0; i < rows.length; i++) {
                if (index != i && row.kodebarang == rows[i].kodebarang) {
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

            $('.number').numberbox('setValue', 0);

            $("#TGLTRANS").datebox('setValue', date_format());
        }
    </script>
@endpush
