@extends('template.app')

@section('content')
    <style>
        .datagrid-footer input[type="checkbox"] {
            display: none;
        }
    </style>
    <!--FORM INPUT -->
    <div id="form_input" class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false">
            <div class="easyui-layout" fit="true">
                <div data-options="region:'center',border:false">
                    <div class="easyui-layout" style="height:100%" id="trans_layout">
                        <script>
                            if (screen.height < 450) {
                                $("#trans_layout").css('height', "450px");
                            }
                        </script>
                        <div data-options="region:'north',border:false" style="width:100%; height:140px;">
                            <table>
                                <input type="hidden" id="mode" name="mode">
                                <input type="hidden" id="data_detail" name="data_detail">

                                <tr>
                                    <td valign="top">
                                        <fieldset style="width: 250px">
                                            <legend>Data Transaksi</legend>

                                            <table>
                                                <tr>
                                                    <td id="label_form">Lokasi</td>
                                                    <td id="label_form">
                                                        <input name="uuidlokasi" id="UUIDLOKASI" style="width:190px">
                                                        <input type="hidden" id="KODELOKASI" name="kodelokasi">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="label_form">Tgl. Awal</td>
                                                    <td id="label_form"><input id="TGLAWAL" name="tglawal" class="date"
                                                            style="width:190px" /></td>
                                                </tr>
                                                <tr>
                                                    <td id="label_form">Tgl. Akhir</td>
                                                    <td id="label_form"><input id="TGLAKHIR" name="tglakhir" class="date"
                                                            style="width:190px" /></td>
                                                </tr>
                                                <tr>
                                                    <td id="label_form"></td>
                                                    <td>
                                                        <a href="#" id="btn_tampil_data" class="easyui-linkbutton"
                                                            onclick="tampil_data(event)">Tampilkan Data</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div data-options="region:'center',border:false">
                            <table id="table_data_detail" fit="true"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dialog_detail_setoran" title="Detail Setoran Kasir" style="width: 788px; height: 500px">
        <input type="hidden" id="UUIDKASIR">
        <div class="easyui-layout" style="width: 100%;height: 100%">
            <div data-options="region: 'center'">
                <table>
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <table>
                                    <tr>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <label id="label_form">Tanggal Setor</label>
                                                    </td>
                                                    <td>
                                                        <input class="date" id="TGLSETORAN" style="width: 100px;"
                                                            readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label id="label_form">Kasir</label>
                                                    </td>
                                                    <td>
                                                        <input class="label_input" style="width: 120px;" id="NAMAKASIR"
                                                            readonly>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>

                                        <td colspan="3">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <label id="label_form">No. Setoran Sementara</label>
                                                    </td>
                                                    <td>
                                                        <input class="label_input" style="width: 120px;"
                                                            id="KODESETORANSEMENTARA" readonly>
                                                        <a href="#" class="easyui-linkbutton"
                                                            onclick="hapusSetoran(event, 'sementara')"
                                                            id="btn_hapus_setoran_sementara">Hapus Setoran Sementara</a>
                                                        <input type="hidden" id="IDSETORANSEMENTARA">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label id="label_form">No. Setoran Closing</label>
                                                    </td>
                                                    <td>
                                                        <input class="label_input" style="width: 120px;"
                                                            id="KODESETORANCLOSING" readonly>
                                                        <a href="#" class="easyui-linkbutton"
                                                            onclick="hapusSetoran(event, 'closing')"
                                                            id="btn_hapus_setoran_closing">Hapus Setoran Closing</a>
                                                        <input type="hidden" id="IDSETORANCLOSING">
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td valign="top">
                                <div style="padding: 5px">
                                    <input type="radio" value="SETORANSEMENTARA" name="jenissetoran"
                                        id="JENIS_SETORANSEMENTARA"> Setoran Sementara
                                    <input type="radio" value="SETORANCLOSING" name="jenissetoran"
                                        id="JENIS_SETORANCLOSING"> Setoran Closing
                                </div>

                                <table id="table_detail_setoran" style="width: 360px; height: 229px"></table>

                                <table>
                                    <tbody>
                                        <tr>
                                            <td id="label_form">Modal Kasir</td>
                                            <td>
                                                <input class="number" style="width: 100px" id="MODALKASIR">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td valign="top">
                                <div class="easyui-tabs" style="width: 350px" data-options="border: false">
                                    <div title="Rincian Non Tunai">
                                        <table id="table_detail_nontunai" style="width: 100%; height: 199px"></table>
                                        <a class="easyui-linkbutton" style="margin-top: 5px"
                                            onclick="tampil_window_detail_setoran_nontunai()">Koreksi</a>
                                    </div>
                                </div>

                                <table>
                                    <tbody>
                                        <tr>
                                            <td id="label_form">Total Tunai</td>
                                            <td>
                                                <input class="number" style="width: 100px" id="TOTALTUNAI" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="label_form">Total Non Tunai</td>
                                            <td>
                                                <input class="number" style="width: 100px" id="TOTALNONTUNAI" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="label_form">Total Lain-lain</td>
                                            <td>
                                                <input class="number" style="width: 100px" id="TOTALLAINLAIN" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="label_form">Grand Total</td>
                                            <td>
                                                <input class="number" style="width: 100px" id="GRANDTOTAL" readonly>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div data-options="region:'east',border:false"
                style="width:50px; padding:5px; border-left:1px solid #29b6f6;">
                <br>
                <a title="Simpan" class="easyui-tooltip" data-options="plain:false"
                    onclick="simpan_detail_setoran(event)"><img src="{{ asset('assets/images/simpan.png') }}"></a>
            </div>
        </div>
    </div>

    <div id="dialog_detail_setoran_nontunai" title="Detail Setoran Non Tunai" style="width: 930px; height: 300px">
        <div class="easyui-layout" style="width: 100%; height: 100%">
            <div data-options="region: 'center'">
                <table id="table_detail_trans_nontunai" style="width: 100%; height: 100%"></table>
            </div>

            <div data-options="region:'east',border:false"
                style="width:50px; padding:5px; border-left:1px solid #29b6f6;">
                <br>
                <a title="Simpan" class="easyui-tooltip" iconCls="" data-options="plain:false"
                    onclick="simpan_trans_nontunai()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
            </div>
        </div>
    </div>

    <div id="toolbar-setoran" style="padding: 5px">
        <a href="#" class="easyui-linkbutton" onclick="posting_semua(event)">Posting Semua</a>
        <!-- <a href="#" class="easyui-linkbutton" onclick="tampil_window_eod(event)">EOD</a> -->
    </div>

    <div id="toolbar-trans-nontunai">
        <a href="#" class="easyui-linkbutton" onclick="tambah_detail_trans_nontunai(event)"
            data-options="plain: true, iconCls: 'icon-add'">Tambah</a>
    </div>
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/utils.js') }}"></script>
    <script>
        var edit_row = false;
        var idtrans = "";
        var counter = 0;
        var row = {};
        var cekbtnsimpan = true; //CEK APAKAH TOMBOL SIMPAN BISA DITEKAN ATAU BELUM (SUPAYA TIDAK TERKLIK 2x)
        // untuk menyimpan daftar transaksi non tunai
        var detail_trans_non_tunai = [];

        $(document).ready(function() {
            $('#dialog_detail_setoran, #dialog_detail_setoran_nontunai').window({
                closed: true,
                onClose: function() {

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

            browse_data_lokasi('#UUIDLOKASI');
            // browse_data_nontunai('#IDNONTUNAI');

            buat_table_detail();
            buat_table_detail_setoran();
            buat_table_detail_nontunai();
            buat_table_detail_trans_nontunai();

            $('#form_input').form('clear');

            $('#TGLSETORAN').datebox({
                onChange: function() {
                    tampilDataSetoran();
                }
            });

            $('#JENIS_SETORANSEMENTARA').click(function() {
                var checked = $('#JENIS_SETORANSEMENTARA').prop('checked');

                $('#JENIS_SETORANCLOSING').prop('disabled', true);
            })

            $('#JENIS_SETORANCLOSING').click(function() {
                var checked = $('#JENIS_SETORANCLOSING').prop('checked');

                $('#JENIS_SETORANSEMENTARA').prop('disabled', true);
            })

            clear_plugin();
            reset_detail();

            tutupLoader()
        })

        shortcut.add('F8', async function() {
            await simpan();
        });

        function tutup() {
            parent.tutupTab();
        }

        async function simpan(jenis_simpan) {
            $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

            var datanya = $("#form_input :input").serialize();
            var isValid = $('#form_input').form('validate');

            $('#window_button_simpan').window('close');

            if (isValid) {
                isValid = cek_datagrid($('#table_data_detail'));
            }

            if (cekbtnsimpan && isValid) {
                cekbtnsimpan = false;

                try {
                    var requestBody = {};

                    $('#form_input :input').each(function() {
                        if (this.name) {
                            requestBody[this.name] = $(this).val();
                        }
                    });

                    const response = await fetchData(
                        '{{ session('TOKEN') }}',
                        link_api.simpanSetorPenjualanPerKasir, requestBody
                    );
                    if (response.success) {
                        $.messager.show({
                            title: 'Info',
                            msg: 'Transaksi Sukses',
                            showType: 'show'
                        });
                    } else {
                        $.messager.alert('Error', response.message, 'error');
                    }
                } catch (e) {
                    const error = typeof e === "string" ? e : e.message;
                    const textError = getTextError(error);
                    $.messager.alert('Error', textError, 'error');
                }
            }
        }

        function reset_detail() {
            $('#table_data_detail').datagrid('loadData', []);
        }

        /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */
        var indexDetail = 0;

        function buat_table_detail() {
            var dg = '#table_data_detail';

            $(dg).datagrid({
                RowAdd: false,
                RowDelete: false,
                rownumbers: true,
                clickToEdit: false,
                dblclickToEdit: true,
                showFooter: true,
                singleSelect: true,
                toolbar: '#toolbar-setoran',
                data: [],
                columns: [
                    [{
                            field: 'tgltrans',
                            title: 'Tgl. Trans',
                            width: 80,
                            rowspan: 2,
                            align: 'center'
                        },
                        {
                            field: 'closing',
                            hidden: true,
                            rowspan: 2
                        },
                        {
                            field: 'closingcheckbox',
                            title: `Posting`,
                            rowspan: 2,
                            align: 'center',
                            formatter: function(val, row, index) {
                                return `<input type="checkbox" id="closing_${index}" onclick="ubah_closing(${index})" ${parseInt(row.closing) == 1 ? 'checked' : ''}>`;
                            }
                        },
                        {
                            field: 'namakasir',
                            title: 'Nama Kasir',
                            width: 150,
                            align: 'left',
                            rowspan: 2
                        },
                        {
                            field: 'jmlnota',
                            title: 'Jml. Nota',
                            width: 60,
                            align: 'right',
                            formatter: format_qty,
                            rowspan: 2
                        },
                        {
                            field: 'jmlitem',
                            title: 'Jml. Item',
                            width: 60,
                            align: 'right',
                            formatter: format_qty,
                            rowspan: 2
                        },
                        {
                            field: 'modal',
                            title: 'Modal<br><b>(1)</b>',
                            align: 'right',
                            width: 100,
                            formatter: format_amount,
                            rowspan: 2
                        },
                        {
                            field: 'setoransementara',
                            title: 'Setoran<br>Sementara <b>(2)</b>',
                            align: 'right',
                            width: 100,
                            formatter: format_amount,
                            rowspan: 2
                        },
                        {
                            field: 'setoranclosing',
                            title: 'Setoran Closing<br><b>(3)</b>',
                            align: 'right',
                            width: 100,
                            formatter: format_amount,
                            rowspan: 2
                        },
                        {
                            field: 'setortunai',
                            title: 'Setor Tunai<br><b>(4)=(2)+(3)</b>',
                            align: 'right',
                            width: 100,
                            formatter: format_amount,
                            rowspan: 2
                        },
                        {
                            field: 'nontunai',
                            title: 'Non Tunai<br><b>(5)</b>',
                            align: 'right',
                            width: 100,
                            formatter: format_amount,
                            rowspan: 2
                        },
                        {
                            field: 'totaleod',
                            title: 'Total EOD<br><b>(6)=(4)+(5)</b>',
                            align: 'right',
                            width: 100,
                            formatter: format_amount,
                            rowspan: 2
                        },
                        {
                            field: 'total',
                            title: 'Total Penjualan',
                            align: 'center',
                            colspan: 3
                        },
                        {
                            field: 'amountbackoffice',
                            title: 'Trans. Back Office<br><b>(10)</b>',
                            align: 'right',
                            width: 100,
                            formatter: format_amount,
                            rowspan: 2,
                        },
                        {
                            field: 'totaldata',
                            title: 'Total Data<br><b>(11)=(1)+(9)+(10)</b>',
                            align: 'right',
                            width: 110,
                            formatter: format_amount,
                            rowspan: 2,
                        },
                        {
                            field: 'selisih',
                            title: 'Selisih<br><b>(12)=(6)-(11)</b>',
                            align: 'right',
                            width: 100,
                            formatter: format_amount,
                            rowspan: 2,
                        },
                    ],
                    [{
                            field: 'totaltunai',
                            title: 'Tunai<br><b>(7)</b>',
                            align: 'right',
                            width: 100,
                            formatter: format_amount
                        },
                        {
                            field: 'totalnontunai',
                            title: 'Non Tunai<br><b>(8)</b>',
                            align: 'right',
                            width: 100,
                            formatter: format_amount
                        },
                        {
                            field: 'grandtotal',
                            title: 'Grand Total<br><b>(9)=(7)+(8)</b>',
                            align: 'right',
                            width: 100,
                            formatter: format_amount
                        },
                    ]
                ],
                onDblClickRow: function(index, row) {
                    tampil_window_detail_setoran(row);
                },
                onClickRow: function(index, row) {
                    indexDetail = index;
                },
                onLoadSuccess: function(data) {
                    hitung_grandtotal();
                },
            });
        }

        function buat_table_detail_setoran() {
            $('#table_detail_setoran').datagrid({
                showFooter: true,
                clickToEdit: false,
                dblclickToEdit: true,
                RowAdd: false,
                RowDelete: false,
                columns: [
                    [{
                            field: 'denominasi',
                            title: 'Nilai',
                            width: 80,
                            align: 'right',
                            formatter: format_number
                        },
                        {
                            field: 'amountsementara',
                            title: 'Sementara',
                            width: 80,
                            align: 'right',
                            formatter: format_amount,
                            editor: {
                                type: 'numberbox',
                                options: {
                                    precision: 0,
                                    required: true
                                }
                            }
                        },
                        {
                            field: 'amountclosing',
                            title: 'Closing',
                            width: 80,
                            align: 'right',
                            formatter: format_amount,
                            editor: {
                                type: 'numberbox',
                                options: {
                                    precision: 0,
                                    required: true
                                }
                            }
                        },
                        {
                            field: 'subtotal',
                            title: 'Subtotal',
                            width: 80,
                            align: 'right',
                            formatter: format_amount
                        }
                    ]
                ],
                onBeforeCellEdit: function(index, field) {
                    var jenissetoran = $('[name="jenissetoran"]:checked').val();

                    if (field == 'amountsementara' && jenissetoran != 'SETORANSEMENTARA') {
                        return false;
                    }

                    if (field == 'amountclosing' && jenissetoran != 'SETORANCLOSING') {
                        return false;
                    }

                    return true;
                },
                onEndEdit: function(index, row, changes) {
                    var cell = $(this).datagrid('cell');
                    var ed = get_editor('#table_detail_setoran', index, cell.field);
                    var row_update = {};

                    switch (cell.field) {
                        case 'amountsementara':
                            var subtotal = parseFloat(changes.amountsementara) + parseFloat(row.amountclosing);

                            row_update = {
                                subtotal: subtotal
                            };

                            break;
                        case 'amountclosing':
                            var subtotal = parseFloat(changes.amountclosing) + parseFloat(row.amountsementara);

                            row_update = {
                                subtotal: subtotal
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
                onLoadSuccess: function() {
                    hitung_grandtotal_setorantunai();
                },
                onAfterEdit: function() {
                    hitung_grandtotal_setorantunai();
                }
            }).datagrid('enableCellEditing');
        }

        function buat_table_detail_nontunai() {
            $('#table_detail_nontunai').datagrid({
                showFooter: true,
                clickToEdit: false,
                dblclickToEdit: true,
                columns: [
                    [{
                            field: 'namaperkiraan',
                            title: 'Akun Non Tunai',
                            width: 110,
                            align: 'center',
                        },
                        {
                            field: 'jmlnota',
                            title: 'Jml Nota',
                            width: 60,
                            align: 'right',
                        },
                        {
                            field: 'amount',
                            title: 'Nominal',
                            width: 80,
                            align: 'right',
                            formatter: format_amount
                        },
                        {
                            field: 'charge',
                            title: 'Charge (Rp)',
                            width: 80,
                            align: 'right',
                            formatter: format_amount
                        }
                    ]
                ],
                onLoadSuccess: function() {
                    hitung_grandtotal_setorannontunai();
                }
            });
        }

        function hitung_grandtotal() {
            var data = $("#table_data_detail").datagrid('getRows');

            let footer = {
                jmlnota: 0,
                jmlitem: 0,
                modal: 0,
                setoransementara: 0,
                setoranclosing: 0,
                setortunai: 0,
                nontunai: 0,
                totaleod: 0,
                selisih: 0,
                totaltunai: 0,
                totalnontunai: 0,
                grandtotal: 0
            }

            for (var i = 0; i < data.length; i++) {
                footer.jmlnota += parseFloat(data[i].jmlnota);
                footer.jmlitem += parseFloat(data[i].jmlitem);
                footer.modal += parseFloat(data[i].modal);
                footer.setoransementara += parseFloat(data[i].setoransementara);
                footer.setoranclosing += parseFloat(data[i].setoranclosing);
                footer.setortunai += parseFloat(data[i].setortunai);
                footer.nontunai += parseFloat(data[i].nontunai);
                footer.totaleod += parseFloat(data[i].totaleod);
                footer.selisih += parseFloat(data[i].selisih);
                footer.totaltunai += parseFloat(data[i].totaltunai);
                footer.totalnontunai += parseFloat(data[i].totalnontunai);
                footer.grandtotal += parseFloat(data[i].grandtotal);
            }

            $('#table_data_detail').datagrid('reloadFooter', [footer]);
        }

        function clear_plugin() {
            $('.combogrid-f').each(function() {
                $(this).combogrid('grid').datagrid('load', {
                    q: ''
                });
            });

            $("#TGLAWAL, #TGLAKHIR").datebox('setValue', date_format());
        }

        function browse_data_lokasi(id) {
            $(id).combogrid({
                panelWidth: 380,
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
                    $('#KODELOKASI').val(row.kode);
                }
            });
        }

        function browse_data_nontunai(id) {
            $(id).combogrid({
                panelWidth: 380,
                url: link_api.browseNonTunai,
                idField: 'uuidnontunai',
                textField: 'nama',
                mode: 'remote',
                columns: [
                    [{
                            field: 'uuidnontunai',
                            hidden: true
                        },
                        {
                            field: 'kode',
                            title: 'Kode',
                            width: 100,
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

        async function tampil_data(e) {
            if (e) {
                e.preventDefault();
            }

            var uuidlokasi = $('#UUIDLOKASI').combogrid('getValue');
            var tglawal = $('#TGLAWAL').datebox('getValue');
            var tglakhir = $('#TGLAKHIR').datebox('getValue');

            if (uuidlokasi == '') {
                $.messager.alert('Peringatan', 'Lokasi belum dipilih', 'warning');

                return false;
            }

            if (tglawal == '' || tglakhir == '') {
                $.messager.alert('Peringatan', 'Tgl. Awal dan Tgl. Akhir wajib diisi', 'warning');

                return false;
            }

            try {
                const response = await fetchData(
                    '{{ session('TOKEN') }}',
                    link_api.tampilDataSetorPenjualanPerKasir, {
                        uuidlokasi: uuidlokasi,
                        tglawal   : tglawal,
                        tglakhir  : tglakhir
                    }
                );
                if (response.success) {
                    $('#table_data_detail').datagrid('loadData', response.data);
                } else {
                    $.messager.alert('Error', response.message, 'error');
                }
            } catch (e) {
                const error = typeof e === "string" ? e : e.message;
                const textError = getTextError(error);
                $.messager.alert('Error', textError, 'error');
            }
        }

        async function ubah_closing(index, checked) {
            var checked = $(`#closing_${index}`).prop('checked');
            var row = $('#table_data_detail').datagrid('getRows')[index];

            row.closing = checked ? 1 : 0;

            // jika diubah menjadi closing/posting
            if (checked == 1) {
                $.messager.confirm('Konfirmasi', 'Apakah anda yakin akan melakukan posting untuk setoran kasir ' + row
                    .namakasir + ' tanggal ' + row.tgltrans + '?',
                    async function(confirm) {
                        if (confirm) {
                            await simpan_ubah_closing(row, index);
                        } else {
                            $(`#closing_${index}`).prop('checked', false);
                        }
                    });
            }
            // jika batal closing/posting
            else if (checked == 0) {
                $.messager.confirm('Konfirmasi', 'Apakah anda yakin akan membatalkan posting untuk setoran kasir ' + row
                    .namakasir + ' tanggal ' + row.tgltrans + '?',
                    async function(confirm) {
                        if (confirm) {
                            await simpan_ubah_closing(row, index);
                        } else {
                            $(`#closing_${index}`).prop('checked', true);
                        }
                    });
            }
        }

        async function simpan_ubah_closing(row, index) {

            try {
                const response = await fetchData(
                    '{{ session('TOKEN') }}',
                    link_api.simpanSetorPenjualanPerKasir, {
                        idlokasi: $('#UUIDLOKASI').combogrid('getValue'),
                        data_detail: [row]
                    }
                );
                if (response.success) {
                    $.messager.show({
                        title: 'Info',
                        msg: 'Transaksi Sukses',
                        showType: 'show'
                    });

                    await tampil_data();
                } else {
                    $.messager.alert('Error', response.message, 'error');
                }
            } catch (e) {
                const error = typeof e === "string" ? e : e.message;
                const textError = getTextError(error);
                $.messager.alert('Error', textError, 'error');
            }
        }

        async function tampil_window_detail_setoran(row) {
            var tgltrans = row.tgltrans;

            detail_trans_non_tunai = [];

            try {
                const response = await fetchData(
                    '{{ session('TOKEN') }}',
                    link_api.cekSudahPostingSetorPenjualanPerKasir, {
                        tgltrans: tgltrans,
                        uuidkasir: row.uuidkasir
                    }
                );
                if (response.success) {
                    if (response.sudahposting) {
                        $.messager.alert('Peringatan',
                            'Setoran yang dipilih sudah diposting. Tidak dapat mengubah data setoran',
                            'warning');
                    } else {
                        $('#dialog_detail_setoran').window({
                            closed: false
                        });

                        $('input[name="jenissetoran"][value="SETORANSEMENTARA"]').prop('checked', true);

                        $('#NAMAKASIR').textbox('setValue', row.namakasir);
                        $('#UUIDKASIR').val(row.uuidkasir);
                        $('#TGLSETORAN').datebox('setValue', tgltrans);
                        $('#MODALKASIR').numberbox('setValue', row.modal);

                        await tampilDataSetoran();
                    }
                } else {
                    $.messager.alert('Error', response.message, 'error');
                }
            } catch (e) {
                const error = typeof e === "string" ? e : e.message;
                const textError = getTextError(error);
                $.messager.alert('Error', textError, 'error');
            }
        }

        async function tampilDataSetoran() {
            var tgltrans = $('#TGLSETORAN').datebox('getValue');
            var uuidlokasi = $('#UUIDLOKASI').combogrid('getValue');
            var uuidkasir = $('#UUIDKASIR').val();

            try {
                const response = await fetchData(
                    '{{ session('TOKEN') }}',
                    link_api.tampilDataSetoranSetorPenjualanPerKasir, {
                        uuidkasir: uuidkasir,
                        tgltrans: tgltrans,
                        uuidlokasi: uuidlokasi
                    }
                );
                if (response.success) {
                    $('#KODESETORANSEMENTARA').textbox('setValue', response.setoransementara?.kodesetorankasir);
                    $('#KODESETORANCLOSING').textbox('setValue', response.setoranclosing?.kodesetorankasir);

                    $('#IDSETORANSEMENTARA').val(response.setoransementara?.idsetorankasir);
                    $('#IDSETORANCLOSING').val(response.setoranclosing?.idsetorankasir);

                    $('#btn_hapus_setoran_sementara').hide();
                    $('#btn_hapus_setoran_closing').hide();

                    if (response.setoransementara == null && response.setoranclosing == null) {
                        $('#JENIS_SETORANSEMENTARA').prop('checked', false);
                        $('#JENIS_SETORANCLOSING').prop('checked', false);

                        $('#JENIS_SETORANSEMENTARA').prop('disabled', false);
                        $('#JENIS_SETORANCLOSING').prop('disabled', false);
                    } else if (response.setoransementara != null && response.setoranclosing == null) {
                        $('#JENIS_SETORANSEMENTARA').prop('checked', false);
                        $('#JENIS_SETORANCLOSING').prop('checked', true);

                        $('#btn_hapus_setoran_sementara').show();

                        $('#JENIS_SETORANSEMENTARA').prop('disabled', true);
                        $('#JENIS_SETORANCLOSING').prop('disabled', false);
                    } else if (response.setoransementara == null && response.setoranclosing != null) {
                        $('#JENIS_SETORANSEMENTARA').prop('checked', true);
                        $('#JENIS_SETORANCLOSING').prop('checked', false);

                        $('#btn_hapus_setoran_closing').show();

                        $('#JENIS_SETORANSEMENTARA').prop('disabled', false);
                        $('#JENIS_SETORANCLOSING').prop('disabled', true);
                    } else if (response.setoransementara != null && response.setoranclosing != null) {
                        $('#JENIS_SETORANSEMENTARA').prop('checked', false);
                        $('#JENIS_SETORANCLOSING').prop('checked', false);

                        $('#btn_hapus_setoran_sementara').show();
                        $('#btn_hapus_setoran_closing').show();

                        $('#JENIS_SETORANSEMENTARA').prop('disabled', true);
                        $('#JENIS_SETORANCLOSING').prop('disabled', true);
                    }

                    $('#table_detail_setoran').datagrid('loadData', response.setorantunai);
                    $('#table_detail_nontunai').datagrid('loadData', response.setorannontunai);
                } else {
                    $.messager.alert('Error', response.message, 'error');
                }
            } catch (e) {
                const error = typeof e === "string" ? e : e.message;
                const textError = getTextError(error);
                $.messager.alert('Error', textError, 'error');
            }
        }

        async function hapusSetoran(event, jenis) {
            event.preventDefault();

            $.messager.confirm('Konfirmasi', `Apakah anda yakin akan menghapus setoran ${jenis}?`, async function(confirm) {
                if (confirm) {
                    var uuidsetoran = 0;

                    if (jenis == 'sementara') {
                        uuidsetoran = $('#IDSETORANSEMENTARA').val();
                    } else if (jenis == 'closing') {
                        uuidsetoran = $('#IDSETORANCLOSING').val();
                    }

                    try {
                        const response = await fetchData(
                            '{{ session('TOKEN') }}',
                            link_api.hapusSetoranSetorPenjualanPerKasir, {
                                uuidsetoran: uuidsetoran
                            }
                        );
                        if (response.success) {
                            if (jenis == 'sementara') {
                                $('#IDSETORANSEMENTARA').val('');
                                $('#KODESETORANSEMENTARA').textbox('setValue', '');
                            } else if (jenis == 'closing') {
                                $('#IDSETORANCLOSING').val('');
                                $('#KODESETORANCLOSING').textbox('setValue', '');
                            }

                            $('#btn_hapus_setoran_sementara').hide();
                            $('#btn_hapus_setoran_closing').hide();

                            if ($('#KODESETORANSEMENTARA').textbox('getValue') == '' && $(
                                    '#KODESETORANCLOSING').textbox('getValue') == '') {
                                $('#JENIS_SETORANSEMENTARA').prop('checked', false);
                                $('#JENIS_SETORANCLOSING').prop('checked', false);

                                $('#JENIS_SETORANSEMENTARA').prop('disabled', false);
                                $('#JENIS_SETORANCLOSING').prop('disabled', false);
                            } else if ($('#KODESETORANSEMENTARA').textbox('getValue') != '' &&
                                $(
                                    '#KODESETORANCLOSING').textbox('getValue') == '') {
                                $('#JENIS_SETORANSEMENTARA').prop('checked', false);
                                $('#JENIS_SETORANCLOSING').prop('checked', true);

                                $('#btn_hapus_setoran_sementara').show();

                                $('#JENIS_SETORANSEMENTARA').prop('disabled', true);
                                $('#JENIS_SETORANCLOSING').prop('disabled', false);
                            } else if ($('#KODESETORANSEMENTARA').textbox('getValue') == '' &&
                                $(
                                    '#KODESETORANCLOSING').textbox('getValue') != '') {
                                $('#JENIS_SETORANSEMENTARA').prop('checked', true);
                                $('#JENIS_SETORANCLOSING').prop('checked', false);

                                $('#btn_hapus_setoran_closing').show();

                                $('#JENIS_SETORANSEMENTARA').prop('disabled', false);
                                $('#JENIS_SETORANCLOSING').prop('disabled', true);
                            } else if ($('#KODESETORANSEMENTARA').textbox('getValue') != '' &&
                                $(
                                    '#KODESETORANCLOSING').textbox('getValue') != '') {
                                $('#JENIS_SETORANSEMENTARA').prop('checked', false);
                                $('#JENIS_SETORANCLOSING').prop('checked', false);

                                $('#btn_hapus_setoran_sementara').show();
                                $('#btn_hapus_setoran_closing').show();

                                $('#JENIS_SETORANSEMENTARA').prop('disabled', true);
                                $('#JENIS_SETORANCLOSING').prop('disabled', true);
                            }

                            tampil_data();
                        } else {
                            $.messager.alert('Error', response.message, 'error');
                        }
                    } catch (e) {
                        const error = typeof e === "string" ? e : e.message;
                        const textError = getTextError(error);
                        $.messager.alert('Error', textError, 'error');
                    }
                }
            });
        }

        function hitung_grandtotal_setorantunai() {
            var rows = $('#table_detail_setoran').datagrid('getRows');

            var footer = {
                amountsementara: 0,
                amountclosing: 0,
                subtotal: 0
            };

            for (var i = 0; i < rows.length; i++) {
                footer.amountsementara += parseFloat(rows[i].amountsementara);
                footer.amountclosing += parseFloat(rows[i].amountclosing);
                footer.subtotal += parseFloat(rows[i].subtotal);
            }

            $('#TOTALTUNAI').numberbox('setValue', footer.subtotal);

            $('#table_detail_setoran').datagrid('reloadFooter', [footer]);

            hitung_grandtotal_setoran();
        }

        function hitung_grandtotal_setorannontunai() {
            var rows = $('#table_detail_nontunai').datagrid('getRows');

            var footer = {
                jmlnota: 0,
                amount: 0,
                charge: 0
            };

            for (var i = 0; i < rows.length; i++) {
                footer.jmlnota += parseFloat(rows[i].jmlnota);
                footer.amount += parseFloat(rows[i].amount);
                footer.charge += parseFloat(rows[i].charge);
            }

            $('#TOTALNONTUNAI').numberbox('setValue', footer.amount + footer.charge);

            $('#table_detail_nontunai').datagrid('reloadFooter', [footer]);

            hitung_grandtotal_setoran();
        }

        function hitung_grandtotal_setoran() {
            var tunai = parseFloat($('#TOTALTUNAI').numberbox('getValue'));
            var nontunai = parseFloat($('#TOTALNONTUNAI').numberbox('getValue'));

            var total = tunai + nontunai;

            $('#GRANDTOTAL').numberbox('setValue', total);
        }

        async function simpan_detail_setoran(event) {
            event.preventDefault();

            var detail_setoran = $('#table_detail_setoran').datagrid('getRows');
            var modal = $('#MODALKASIR').numberbox('getValue');
            var uuidlokasi = $('#UUIDLOKASI').combogrid('getValue');
            var jenis = $('[name="jenissetoran"]:checked').val();

            // if (jenis == null || jenis == undefined || jenis == '') {
            //     $.messager.alert('Peringatan', 'Anda belum memilih jenis setoran yang akan disimpan', 'warning');

            //     return false;
            // }

            var text_konfirmasi = `Apakah anda yakin akan menyimpan data setoran?`;

            if (jenis != null && jenis != undefined && jenis != '') {
                text_konfirmasi =
                    `Apakah anda yakin akan menyimpan data setoran ${jenis == 'SETORANSEMENTARA' ? 'sementara' : 'closing'}?`;
            }

            $.messager.confirm('Konfirmasi', text_konfirmasi, async function(confirm) {
                if (confirm) {
                    try {
                        const response = await fetchData(
                            '{{ session('TOKEN') }}',
                            link_api.simpanDetailSetorPenjualanPerKasir, {
                                uuidkasir: $('#UUIDKASIR').val(),
                                tgltrans: $('#TGLSETORAN').datebox('getValue'),
                                detail_setoran: detail_setoran,
                                modal: modal,
                                uuidlokasi: uuidlokasi,
                                detail_trans_non_tunai: detail_trans_non_tunai,
                                jenis: jenis
                            }
                        );
                        if (response.success) {
                            $('#dialog_detail_setoran').window({
                                closed: true
                            });

                            await tampil_data(event);
                        } else {
                            $.messager.alert('Error', response.message, 'error');
                        }
                    } catch (e) {
                        const error = typeof e === "string" ? e : e.message;
                        const textError = getTextError(error);
                        $.messager.alert('Error', textError, 'error');
                    }
                }
            })
        }

        async function tampil_window_detail_setoran_nontunai(row) {
            $('#dialog_detail_setoran_nontunai').window({
                closed: false
            });

            await tampilDataNonTunai();
        }

        async function tampilDataNonTunai() {
            var tgltrans = $('#TGLSETORAN').datebox('getValue');
            var uuidlokasi = $('#UUIDLOKASI').combogrid('getValue');
            var uuidkasir = $('#UUIDKASIR').val();

            $('#table_detail_trans_nontunai').datagrid('loadData', []);

            if (detail_trans_non_tunai.length == 0) {
                try {
                    const response = await fetchData(
                        '{{ session('TOKEN') }}',
                        link_api.tampilDataNonTunaiSetorPenjualanPerKasir, {
                            uuidkasir: uuidkasir,
                            tgltrans: tgltrans,
                            uuidlokasi: uuidlokasi
                        }
                    );
                    if (response.success) {
                        $('#table_detail_trans_nontunai').datagrid('loadData', response.detail);

                        detail_trans_non_tunai = JSON.parse(JSON.stringify(response.detail));
                    } else {
                        $.messager.alert('Error', response.message, 'error');
                    }
                } catch (e) {
                    const error = typeof e === "string" ? e : e.message;
                    const textError = getTextError(error);
                    $.messager.alert('Error', textError, 'error');
                }
            } else {
                $('#table_detail_trans_nontunai').datagrid('loadData', JSON.parse(JSON.stringify(
                    detail_trans_non_tunai)));
            }
        }

        function buat_table_detail_trans_nontunai() {
            $('#table_detail_trans_nontunai').datagrid({
                showFooter: true,
                clickToEdit: false,
                dblclickToEdit: true,
                toolbar: '#toolbar-trans-nontunai',
                columns: [
                    [{
                            field: 'kodetrans',
                            title: 'No. Trans',
                            width: 120,
                            align: 'center',
                        },
                        {
                            field: 'tgltrans',
                            title: 'Tgl. Trans',
                            width: 80,
                            align: 'center',
                        },
                        {
                            field: 'akunbank',
                            title: 'Akun Bank',
                            width: 150,
                            sortable: true,
                            editor: {
                                type: 'combogrid',
                                options: {
                                    panelWidth: 380,
                                    idField: 'nama',
                                    textField: 'nama',
                                    mode: 'remote',
                                    columns: [
                                        [{
                                                field: 'id',
                                                hidden: true
                                            },
                                            {
                                                field: 'kode',
                                                title: 'Kode',
                                                width: 80,
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
                                }
                            }
                        },
                        {
                            field: 'namanontunai',
                            title: 'Nama Non Tunai',
                            width: 100,
                            align: 'left',
                            editor: {
                                type: 'combogrid',
                                options: {
                                    panelWidth: 380,
                                    // url: base_url + 'atena/Master/Data/AlatBayarNonTunai/comboGrid',
                                    idField: 'nama',
                                    textField: 'nama',
                                    mode: 'remote',
                                    columns: [
                                        [{
                                                field: 'id',
                                                hidden: true
                                            },
                                            {
                                                field: 'kode',
                                                title: 'Kode',
                                                width: 60,
                                                sortable: true
                                            },
                                            {
                                                field: 'nama',
                                                title: 'Nama',
                                                width: 200,
                                                sortable: true
                                            },
                                            {
                                                field: 'charge',
                                                title: 'Charge %',
                                                width: 60,
                                                sortable: true,
                                                formatter: format_amount
                                            },
                                        ]
                                    ]
                                }
                            }
                        },
                        {
                            field: 'nokartu',
                            title: 'No. Kartu',
                            width: 120,
                            align: 'left',
                            editor: {
                                type: 'textbox'
                            }
                        },
                        {
                            field: 'amountbank',
                            title: 'Nominal',
                            width: 100,
                            align: 'right',
                            formatter: format_amount,
                            editor: {
                                type: 'numberbox'
                            }
                        },
                        {
                            field: 'chargepersen',
                            title: 'Charge %',
                            width: 60,
                            align: 'right',
                            formatter: format_amount
                        },
                        {
                            field: 'chargerp',
                            title: 'Charge (Rp)',
                            width: 80,
                            align: 'right',
                            formatter: format_amount
                        },
                        {
                            field: 'total',
                            title: 'Total',
                            width: 100,
                            align: 'right',
                            formatter: format_amount
                        },
                        {
                            field: 'keterangan',
                            title: 'Keterangan',
                            width: 100,
                            align: 'left',
                        }
                    ]
                ],
                onCellEdit: function(index, field, val) {
                    var row = $(this).datagrid('getRows')[index];
                    var ed = get_editor('#table_detail_trans_nontunai', index, field);

                    if (field == 'akunbank') {
                        var idlokasi = $('#UUIDLOKASI').combogrid('getValue');

                        ed.combogrid('grid').datagrid('options').url = base_url +
                            'atena/Master/Data/AlatBayarNonTunai/comboGridAkunBank/' + idlokasi;
                        ed.combogrid('grid').datagrid('load');
                        ed.combogrid('showPanel');
                    } else if (field == 'namanontunai') {
                        var idlokasi = $('#UUIDLOKASI').combogrid('getValue');
                        var idakunbank = row.idakunbank;

                        ed.combogrid('grid').datagrid('options').url = base_url +
                            'atena/Master/Data/AlatBayarNonTunai/comboGrid/' + idlokasi + '/' + idakunbank;
                        ed.combogrid('grid').datagrid('load');
                        ed.combogrid('showPanel');
                    }
                },
                onEndEdit: function(index, row, changes) {
                    var cell = $(this).datagrid('cell');
                    var ed = get_editor('#table_detail_trans_nontunai', index, cell.field);
                    var row_update = {};

                    switch (cell.field) {
                        case 'akunbank':
                            var selected = ed.combogrid('grid').datagrid('getSelected');

                            row_update = {
                                uuidnontunai: 0,
                                namanontunai: '',
                                uuidakunbank: selected.uuidakunbank,
                                akunbank    : selected.nama,
                                amountbank  : 0,
                                chargerp    : 0,
                                chargepersen: 0,
                                total       : 0
                            };

                            break;
                        case 'namanontunai':
                            var selected = ed.combogrid('grid').datagrid('getSelected');
                            var chargerp = selected.charge / 100 * parseFloat(row.amountbank);
                            var total = parseFloat(row.amountbank) + chargerp;

                            row_update = {
                                uuidnontunai: selected.uuidnontunai,
                                chargepersen: selected.charge,
                                chargerp    : chargerp,
                                total       : total
                            };

                            break;
                        case 'amountbank':
                            if (changes.amountbank == '' || changes.amountbank == null) {
                                row_update = {
                                    amountbank: 0,
                                    chargerp: 0,
                                    total: 0
                                }
                            } else {
                                var chargerp = parseFloat(row.chargepersen) / 100 * parseFloat(row.amountbank);
                                var total = parseFloat(row.amountbank) + chargerp;

                                row_update = {
                                    chargerp: chargerp,
                                    total: total
                                };
                            }

                            break;
                    }

                    if (row.kodetrans == '' || row.kodetrans == null) {
                        row_update.keterangan = 'GESEK TUNAI';
                        row_update.tgltrans = $('#TGLSETORAN').datebox('getValue');
                    }

                    if (jQuery.isEmptyObject(row_update) == false) {
                        $(this).datagrid('updateRow', {
                            index: index,
                            row: row_update
                        });
                    }
                }
            }).datagrid('enableCellEditing');
        }

        function simpan_trans_nontunai() {
            detail_trans_non_tunai = JSON.parse(JSON.stringify($('#table_detail_trans_nontunai').datagrid('getRows')));

            var data = {};

            for (var i = 0; i < detail_trans_non_tunai.length; i++) {
                if (detail_trans_non_tunai[i].akunbank == '' || detail_trans_non_tunai[i].akunbank == null) {
                    $.messager.alert('Peringatan', `Akun Bank pada baris ke-${i+1} belum dipilih`, 'warning');

                    return false;
                }

                if (detail_trans_non_tunai[i].namanontunai == '' || detail_trans_non_tunai[i].namanontunai == null) {
                    $.messager.alert('Peringatan', `Nama Non Tunai pada baris ke-${i+1} belum dipilih`, 'warning');

                    return false;
                }

                if (detail_trans_non_tunai[i].nokartu == '' || detail_trans_non_tunai[i].nokartu == null) {
                    $.messager.alert('Peringatan', `No Kartu pada baris ke-${i+1} belum dipilih`, 'warning');

                    return false;
                }

                if (detail_trans_non_tunai[i].amountbank == 0) {
                    continue;
                }

                if (data[detail_trans_non_tunai[i].akunbank]) {
                    data[detail_trans_non_tunai[i].akunbank].jmlnota++;
                    data[detail_trans_non_tunai[i].akunbank].amount += parseFloat(detail_trans_non_tunai[i].amountbank);
                    data[detail_trans_non_tunai[i].akunbank].charge += parseFloat(detail_trans_non_tunai[i].chargerp);
                } else {
                    data[detail_trans_non_tunai[i].akunbank] = {
                        namaperkiraan: detail_trans_non_tunai[i].akunbank,
                        jmlnota: 1,
                        amount: parseFloat(detail_trans_non_tunai[i].amountbank),
                        charge: parseFloat(detail_trans_non_tunai[i].chargerp)
                    };
                }
            }

            $('#table_detail_nontunai').datagrid('loadData', Object.values(data));

            $('#dialog_detail_setoran_nontunai').window({
                closed: true
            });
        }

        function tambah_detail_trans_nontunai(event) {
            event.preventDefault();

            var tgltrans = $('#TGLSETORAN').datebox('getValue');

            $('#table_detail_trans_nontunai').datagrid('appendRow', {
                kodetrans   : '',
                tgltrans    : tgltrans,
                namanontunai: '',
                nokartu     : '',
                amountbank  : 0,
                chargepersen: 0,
                chargerp    : 0,
                total       : 0,
                keterangan  : 'GESEK TUNAI'
            });
        }

        async function posting_semua(event) {
            event.preventDefault();

            $.messager.confirm('Konfirmasi', 'Apakah anda yakin akan melakukan posting untuk semua setoran?', async function(
                confirm) {
                if (confirm) {
                    var rows = $('#table_data_detail').datagrid('getRows');

                    rows.forEach(function(item) {
                        item.closing = 1;
                    })

                    try {
                        const response = await fetchData(
                            '{{ session('TOKEN') }}',
                            link_api.simpanSetorPenjualanPerKasir, {
                                uuidlokasi: $('#UUIDLOKASI').combogrid('getValue'),
                                data_detail: rows
                            }
                        );
                        if (response.success) {
                            await tampil_data();
                        } else {
                            $.messager.alert('Error', response.message, 'error');
                        }
                    } catch (e) {
                        const error = typeof e === "string" ? e : e.message;
                        const textError = getTextError(error);
                        $.messager.alert('Error', textError, 'error');
                    }
                }
            });
        }
    </script>
@endpush
