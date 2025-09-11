@extends('template.form')

@section('content')
    <div id="form_input" class="easyui-layout" fit="true">
        <input type="hidden" id="mode" name="mode">
        <input type="hidden" id="IDPR" name="uuidpr">
        <input name="kodeapprovejoborder" id="KODEAPPROVEJOBORDER" style="width:190px">
        <input type="hidden" id="data_detail" name="data_detail">
        <input type="hidden" id="kodelokasi" name="kodelokasi">
        <input type="hidden" id="kodelokasikirim" name="kodelokasikirim">

        <div data-options="region:'center',border:false">
            <div class="easyui-layout" fit="true">
                <div data-options="region:'center',border:false ">
                    <div class="easyui-layout" style="height:100%" id="trans_layout">
                        <script>
                            if (screen.height < 450) {
                                $("#trans_layout").css('height', "450px");
                            }
                        </script>
                        <div data-options="region:'north',border:false" id='divForm' style="width:100%;">
                            <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;">
                            </div>
                            <table>
                                <tr>
                                    <td valign="top">
                                        <fieldset id='fieldsetInfoTransaksi'>
                                            <legend id="label_laporan">Info Transaksi</legend>
                                            <input type="hidden" id="TGLENTRY" name="tglentry">
                                            <table border="0">
                                                <tr>
                                                    <td id="label_form">No. PR</td>
                                                    <td id="label_form">
                                                        <input name="kodepr" id="kodepr" class="label_input"
                                                            style="width:190px">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="label_form">Lokasi Tujuan</td>
                                                    <td id="label_form">
                                                        <input name="uuidlokasi" id="idlokasi" style="width:190px">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="label_form">Lokasi Asal</td>
                                                    <td id="label_form">
                                                        <input name="uuidlokasikirim" id="idlokasikirim"
                                                            style="width:190px">
                                                    </td>
                                                </tr>
                                                <tr hidden id='tr_approvejoborder'>
                                                    <td id="label_form">No. Approve Job Order</td>
                                                    <td id="label_form">
                                                        <input name="uuidapprovejoborder" id="idapprovejoborder"
                                                            style="width:190px">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="label_form">Tgl. Trans</td>
                                                    <td id="label_form">
                                                        <input name="tgltrans" id="tgltrans" class="date"
                                                            style="width:190px" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="label_form">Tgl. Barang Tersedia</td>
                                                    <td id="label_form">
                                                        <input name="tgltarget" id="tgltarget" class="date"
                                                            style="width:190px" required>
                                                    </td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                    </td>
                                    <td id="label_form" valign="bottom">
                                        <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                                            style="width:250px; height:85px" data-options="validType:'length[0, 500]'"></textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div data-options="region:'center',border:false">
                            <div class="easyui-tabs" plain='true' fit="true">
                                <div title="Detail Transaksi">
                                    <table id="table_data_detail" fit="true"></table>
                                </div>
                            </div>
                        </div>
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

            <a title="Simpan" class="easyui-tooltip" data-options="plain:false" id='btn_simpan_modal'
                onclick="$('#window_button_simpan').window('open')"><img
                    src="{{ asset('assets/images/simpan.png') }}"></a>

            <br>
            <br>

            <a title="Tutup" class="easyui-tooltip" data-options="plain:false" onclick="javascript:tutup()"><img
                    src="{{ asset('assets/images/cancel.png') }}"></a>
        </div>
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

            </div>
        </center>
    </div>

    <div id="form_cetak" title="Preview" style="width:660px; height:450px">
        <div id="area_cetak"></div>
    </div>

    <div id="toolbar-detail" style="display: flex; align-items: center">
        <a class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-add'" onclick="tambah_detail()">Tambah</a>
        <a class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-remove'" onclick="hapus_detail()">Hapus</a>
        <input type="checkbox" id="checkallpakaipo" onchange="pakaiposemua(this)"> <label for="checkallpakaipo">Pakai PO
            Semua</label>
    </div>
@endsection

@push('js')
    <script>
        var row = {};
        var config = {};
        var configTransApproveJobOrder = {};
        var indexRow = 0;
        var cekbtnsimpan = true;
        var lihatHarga = false;
        var idtrans = "";
        $(document).ready(async function() {
            let check1 = false;
            let check2 = false;
            const promises = [];
            promises.push(getConfig('KODEPR', 'TPR', 'bearer {{ session('TOKEN') }}',
                function(response) {
                    if (response.success) {
                        config = response.data;
                        check1 = true;
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
                }));

            promises.push(getConfig('TRANSAKSIAPPROVEJOBORDER', 'TPR', 'bearer {{ session('TOKEN') }}',
                function(response) {
                    if (response.success) {
                        configTransApproveJobOrder = response.data;
                        check2 = true;
                        var transApprove = response.data;
                        if (transApprove == "HEADER") {
                            $('#tr_approvejoborder').show();
                            $("#divForm").css('height', "210px");
                            $("#fieldsetInfoTransaksi").css('height', "180px");
                        } else {
                            $('#tr_approvejoborder').hide();
                            $("#divForm").css('height', "170px");
                            $("#fieldsetInfoTransaksi").css('height', "150px");
                        }
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
                }));
            var mode = '{{ $mode }}';
            await Promise.all(promises);
            if (!check1 || !check2 ) return;

            if (config.value == "AUTO") {
                $('#kodepr').textbox({
                    prompt: "Auto Generate",
                    readonly: true,
                    required: false
                });
            } else {
                $('#kodepr').textbox({
                    prompt: "",
                    readonly: false,
                    required: true
                });
                $('#kodepr').textbox('clear').textbox('textbox').focus();
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
                        export_excel('Faktur Pesanan Penjualan', $("#area_cetak").html());
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

            // get_status_trans("atena/Pembelian/Transaksi/PermintaanBarang", row.idpr, function(data) {
            //     $(".form_status").html(status_transaksi(data.status));
            // });

            browse_data_lokasi('#idlokasi');
            browse_data_lokasi_kirim('#idlokasikirim');
            //belum selesai apinya
            // browse_data_approve_joborder('#idapprovejoborder');

            buat_table_detail();

            @if ($mode == 'tambah')
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
                let url = link_api.cetakPermintaanBarang + uuidtrans;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidpr: uuidtrans,
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

            $('#idlokasi').combogrid('clear');
            $('#idlokasi').combogrid('readonly', false);
            $('#idlokasikirim').combogrid('clear');
            $('#idlokasikirim').combogrid('readonly', false);
            $('#tgltrans').datebox('readonly', false);
            $('#tgltarget').datebox('readonly', false);

            $('#tgltrans').datebox('setValue', date_format(new Date));
            $('#tgltarget').datebox('setValue', date_format(new Date));

            enableAddRow();

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
                    if (!Array.isArray(dataLokasi)) 
                    if ((dataLokasi.uuidlokasi ?? "") != "" && (dataLokasi.lokasidefault ?? 1) == 1) {
                        $('#idlokasi').combogrid('setValue', dataLokasi.uuidlokasi);
                        $("#kodelokasi").val(dataLokasi.kodelokasi);
                        $('#idapprovejoborder').combogrid('grid').datagrid('load');
                    }
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
                let url = link_api.loadDataHeaderPermintaanBarang;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidpr: '{{ $data }}',
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
                    var UT = data.data.cetak;
                    if (UT == 1) {
                        $('#simpan_cetak').css('filter', '');
                    } else {
                        $('#simpan_cetak').css('filter', 'grayscale(100%)');
                        $('#simpan_cetak').removeAttr('onclick');
                    }
                    UT = data.data.ubah;
                    var statusTrans = await getStatusTrans(link_api.getStatusTransPermintaanBarang,
                        'bearer {{ session('TOKEN') }}', {
                            uuidpr: row.uuidpr
                        });
                    $(".form_status").html(status_transaksi(statusTrans));
                    if (UT == 1 && statusTrans== 'I') {
                        $('#btn_simpan_modal').css('filter', '');

                        $('#mode').val('ubah');
                    } else {
                        document.getElementById('btn_simpan_modal').onclick = null;

                        $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                        $('#btn_simpan_modal').removeAttr('onclick');
                    }

                    $("#form_input").form('load', row);

                    $('#idlokasi').combogrid('readonly');
                    $('#idlokasikirim').combogrid('readonly');
                    $('#tgltrans').datebox('readonly');
                    $('#tgltarget').datebox('readonly');

                    // if (configTransApproveJobOrder.value == 'HEADER') {
                    //     $('#idapprovejoborder').combogrid('setValue', {
                    //         uuidapprovejoborder: row.uuidapprovejoborder??"",
                    //         kode: row.kodeapprovejoborder
                    //     });

                    //     $('#idapprovejoborder').combogrid('readonly', true);

                    // }

                    idtrans = row.uuidpr;

                    if (row.uuidapprovejoborder != "") {
                        disableAddRow();
                    }

                    await load_data_detail(row.uuidpr);

                });
            }
        }

        async function simpan(jenis_simpan) {
            $(':radio:not(:checked)').attr('disabled', false);
            var mode = $("#mode").val();
            var data = [];

            $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

            var datanya = $("#form_input :input").serialize();
            var isValid = $('#form_input').form('validate');

            $('#window_button_simpan').window('close');

            if (isValid) {
                isValid = cek_datagrid($('#table_data_detail'));
            }

            if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
                cekbtnsimpan = false;
                tampilLoaderSimpan();
                try {
                    let headers = {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                    };
                    let requestBody = null;
                    var unindexed_array = $('#form_input :input').serializeArray();

                    var body = {};
                    $.map(unindexed_array, function(n, i) {
                        if (n['name'] == "data_detail") {
                            var datadetail=$('#table_data_detail').datagrid('getRows');
                            var sendDetail=[];
                            for(var i=0;i<datadetail.length;i++){
                                sendDetail.push({
                                    uuidbarang:datadetail[i].uuidbarang,
                                    pakaipo:datadetail[i].pakaipo,
                                    jml:datadetail[i].jmlpr,
                                    satuan:datadetail[i].satuan,
                                    catatan:datadetail[i].catatan,
                                })
                            }
                            body[n['name']] = sendDetail;
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
                    let url = link_api.simpanPermintaanBarang;
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
                        } else {
                            await ubah();
                        }
                        if (jenis_simpan == 'simpan_cetak') {
                            await cetak(response.data.uuidpr);
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

        async function cetak(uuidtrans) {
            try {
                $("#window_button_cetak").window('close');
                let url = link_api.cetakPermintaanBarang + uuidtrans;
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

        function reset_detail() {
            $('#table_data_detail').datagrid('loadData', []);
        }

        async function load_data_detail(idtrans) {
            try {
                let url = link_api.loadDataDetailPermintaanBarang;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidpr: idtrans,
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
                console.log(error);
                var textError = getTextError(error);
                $.messager.alert('Error', getTextError(error), 'error');
            }
        }

        /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */
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
                    $("#kodelokasi").val(row.kode);

                    // if (configTransApproveJobOrder.value == 'HEADER') {
                    //     $('#idapprovejoborder').combogrid('grid').datagrid('reload');
                    // }

                },
                onChange: function(newVal, oldVal) {
                    if ($('#mode').val() != '') {
                        reset_detail();
                    }
                }
            });
        }

        function browse_data_lokasi_kirim(id) {
            $(id).combogrid({
                panelWidth: 380,
                url: link_api.getLokasiAll,
                idField: 'uuidlokasi',
                textField: 'namalokasi',
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
                    $("#kodelokasikirim").val(row.kode);

                    if ($("#idlokasi").combogrid('getValue') == row.uuidlokasi) {
                        var rows = $('#table_data_detail').datagrid('getRows');

                        for (var i = 0; i < rows.length; i++) {
                            $('#table_data_detail').datagrid('updateRow', {
                                index: i,
                                row: {
                                    pakaipo: 1
                                }
                            });
                        }

                        $('.ck-pakaipo').prop('disabled', true);
                        $('#checkallpakaipo').prop('disabled', true);
                        $('#checkallpakaipo').prop('checked', true);
                    } else {
                        $('.ck-pakaipo').prop('disabled', false);
                        $('#checkallpakaipo').prop('disabled', false);
                    }
                }
            });
        }

        function browse_data_approve_joborder(id) {
            $(id).combogrid({
                panelWidth: 380,
                url: base_url + 'asiaelectrindo/Produksi/Transaksi/ApproveJobOrder/comboGridPR',
                idField: 'id',
                textField: 'kode',
                mode: 'remote',
                queryParams: {
                    idlokasi: function() {
                        return $('#idlokasi').combogrid('getValue');
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
                            width: 150,
                            sortable: true
                        },
                        {
                            field: 'tgltrans',
                            title: 'Tgl. Trans',
                            width: 200,
                            sortable: true
                        },
                    ]
                ],
                onSelect: function(index, row) {
                    disableAddRow();

                    load_data_detail_approve_joborder(row.id, row.kode);
                }
            });
        }

        function load_data_detail_approve_joborder(idapprovejoborder, kodeapprovejoborder) {
            $.ajax({
                url: base_url + 'asiaelectrindo/Produksi/Transaksi/ApproveJobOrder/loadDataDetailBahanBaku/pr',
                type: 'POST',
                data: {
                    idapprovejoborder: idapprovejoborder
                },
                success: function(response) {
                    var idlokasi = $('#idlokasi').combogrid('getValue');
                    var idlokasikirim = $('#idlokasikirim').combogrid('getValue');

                    var pakaipo = idlokasi == idlokasikirim ? 1 : 0;

                    if (response.length > 0) {
                        for (var i in response) {
                            response[i].idapprovejoborder = idapprovejoborder;
                            response[i].kodeapprovejoborder = kodeapprovejoborder;
                            response[i].pakaipo = pakaipo;
                        }

                        $('#table_data_detail').datagrid('loadData', response);
                    } else {
                        $.messager.alert('Info', 'Tidak ada barang yang bisa berlanjut ke PR untuk transaksi ' +
                            kodeapprovejoborder, 'info');
                    }
                }
            })
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
                toolbar: '#toolbar-detail',
                frozenColumns: [
                    [{
                            field: 'pakaipo',
                            hidden: true
                        },
                        {
                            field: 'checkpakaipo',
                            title: 'Pakai PO',
                            align: 'center',
                            formatter: function(val, row, index) {
                                var haruspo = $("#idlokasi").combogrid('getValue') == $("#idlokasikirim")
                                    .combogrid('getValue');

                                return '<input class="ck-pakaipo" type="checkbox" ' + (row.pakaipo == 1 ?
                                        'checked' : '') + ' onchange="ubahpakaipo(' + index + ', ' + row
                                    .pakaipo + ')" id="ck-' + index + '"  ' + (haruspo ? 'disabled' : '') +
                                    '/>';
                            }
                        },
                        {
                            field: 'idapprovejoborder',
                            hidden: true
                        },
                        {
                            field: 'kodeapprovejoborder',
                            hidden: configTransApproveJobOrder.value == 'HEADER',
                            title: 'No. Approve Job Order',
                            width: 130,
                            editor: {
                                type: 'combogrid',
                                options: {
                                    panelWidth: 600,
                                    mode: 'remote',
                                    idField: 'kode',
                                    textField: 'kode',
                                    columns: [
                                        [{
                                                field: 'uuidlokasi',
                                                hidden: true
                                            },
                                            {
                                                field: 'kode',
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
                                }
                            }
                        },
                        {
                            field: 'kodebarang',
                            title: 'Kode Barang',
                            width: 100,
                            editor: {
                                type: 'combogrid',
                                options: {
                                    panelWidth: 790,
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
                                                field: 'uuidbarang',
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
                                                field: 'satuan',
                                                title: 'Satuan',
                                                width: 60
                                            },
                                            {
                                                field: 'catatan',
                                                title: 'Keterangan',
                                                width: 250
                                            },
                                        ]
                                    ],
                                }
                            }
                        },
                        {
                            field: 'namabarang',
                            title: 'Nama',
                            width: 250,
                        },
                        {
                            field: 'uuidbarang',
                            hidden: true
                        },
                        {
                            field: 'kodemerk',
                            hidden: true
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
                        @endif
                    ]
                ],
                columns: [
                    [{
                            field: 'catatan',
                            title: 'Catatan',
                            width: 150,
                            editor: {
                                type: 'validatebox',
                                options: {
                                    validType: 'length[0,200]'
                                }
                            }
                        },
                        {
                            field: 'jmlpr',
                            title: 'Jumlah',
                            align: 'right',
                            width: 60,
                            formatter: format_amount_4,
                            editor: {
                                type: 'numberbox',
                                options: {
                                    required: true,
                                    precision: 4
                                }
                            }
                        },
                        {
                            field: 'satuan_lama',
                            width: 45,
                            align: 'center',
                            hidden: true
                        },
                        {
                            field: 'satuan',
                            title: 'Satuan',
                            width: 60,
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
                                        }]
                                    ],
                                }
                            }
                        }
                    ]
                ],
                //UNTUK TOMBOL EDIT
                onClickRow: function(index, row) {
                    indexDetail = index;
                },
                onBeforeCellEdit: function(index, field) {
                    indexRow = index;

                    var row = $(this).datagrid('getRows')[index];
                },
                onCellEdit: function(index, field, val) {
                    var row = $(this).datagrid('getRows')[index];
                    var ed = get_editor('#table_data_detail', index, field);

                    if (field == 'kodebarang') {
                        if (row.kodeapprovejoborder != '') {
                            //api belum selesai
                            // ed.combogrid('grid').datagrid('options').url = base_url +
                            //     'asiaelectrindo/Produksi/Transaksi/ApproveJobOrder/comboGridBarang/' + row
                            //     .idapprovejoborder;
                            // ed.combogrid('grid').datagrid('load', {
                            //     q: ''
                            // });
                        } else {
                            ed.combogrid('grid').datagrid('options').url = link_api.browseBarang;
                            ed.combogrid('grid').datagrid('load', {
                                q: ''
                            });
                        }

                        ed.combogrid('showPanel');
                    } else if (field == 'satuan') {
                        ed.combogrid('grid').datagrid('options').url = link_api.loadSatuanBarang;
                        ed.combogrid('grid').datagrid('load', {
                            q: '',
                            uuidbarang: row.uuidbarang,
                        });
                        ed.combogrid('showPanel');
                    } else if (field == 'kodeapprovejoborder') {
                        // var idlokasipengirim = $('#idlokasi').combogrid('getValue');

                        // ed.combogrid('grid').datagrid('options').url = base_url +
                        //     'asiaelectrindo/Produksi/Transaksi/ApproveJobOrder/comboGridPR/';
                        // ed.combogrid('grid').datagrid('load', {
                        //     q: '',
                        //     idlokasi: $('#idlokasi').combogrid('getValue')
                        // });

                        // ed.combogrid('showPanel');
                    }
                },
                onEndEdit: function(index, row, changes) {
                    var cell = $(this).datagrid('cell');
                    var ed = get_editor('#table_data_detail', index, cell.field);
                    var row_update = {};

                    switch (cell.field) {
                        case 'kodeapprovejoborder':
                            var data = ed.combogrid('grid').datagrid('getSelected');

                            row_update = {
                                uuidapprovejoborder: data.uuidapprovejoborder,
                                kodeapprovejoborder: data.kode,
                                uuidbarang: 0,
                                kodebarang: '',
                                namabarang: '',
                                partnumber: '',
                                satuan_lama: '',
                                satuan: '',
                                satuanutama: '',
                                konversi: 1,
                                jmlpr: 0,
                            };

                            break;
                        case 'kodebarang':
                            var data = ed.combogrid('grid').datagrid('getSelected');

                            var uuidbarang = data ? data.uuidbarang : '';
                            var nama = data ? data.nama : '';
                            var satuan = data ? data.satuanutama : '';
                            var kodemerk = data ? data.kodemerk : '';
                            var satuanutama = data ? data.satuanutama : '';
                            var konversi = data ? data.konversi : '';
                            var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
                            var partnumber = data.partnumber ? data.partnumber : '';
                            var jml = data ? data.jml : 0;

                            row_update = {
                                uuidbarang: uuidbarang,
                                namabarang: nama,
                                partnumber: partnumber,
                                satuan_lama: satuan,
                                satuan: satuan,
                                satuanutama: satuanutama,
                                konversi: konversi,
                                jmlpr: jml
                            };

                            // if (configTransApproveJobOrder.value == 'HEADER') {
                            //     row_update.idapprovejoborder = 0;
                            //     row_update.kodeapprovejoborder = '';
                            // }
                            break;
                        case 'satuan':
                            // get_konversi(ed.combogrid('grid').datagrid('getRows'), changes.satuan, row.satuan_lama);

                            // if (satuan_baru != 0 || satuan_lama != 0 && changes.satuan) {
                            //     row_update = {
                            //         jml: (satuan_baru > satuan_lama) ? row.jml * konversi_baru : row.jml / konversi_lama,
                            //         satuan_lama: changes.satuan
                            //     };
                            // }
                            break;
                    }

                    var lokasiasal = $('#idlokasikirim').combogrid('getValue');
                    var lokasitujuan = $('#idlokasi').combogrid('getValue');

                    if (lokasiasal == lokasitujuan) {
                        row_update.pakaipo = 1;
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
                    hitung_grandtotal();

                    if (changes.kodebarang) {
                        if ($('#idlokasi').combogrid('getValue') != '') {

                        } else {
                            $('#table_data_detail').datagrid('deleteRow', index);

                            $.messager.show({
                                title: 'Warning',
                                msg: 'Lokasi Harus Diisi Telebih Dahulu',
                                timeout: {{ session('TIMEOUT') }}
                            });
                        }
                    }
                }
            }).datagrid('enableCellEditing');
        }

        function tambah_detail() {
            var dg = '#table_data_detail';
            var index = $(dg).datagrid('getRows').length;

            // if (configTransApproveJobOrder.value == 'HEADER') {
            //     if ($('#idapprovejoborder').combogrid('getValue') != '') {
            //         $.messager.alert('Error', 'Tidak bisa menambah data, karena mengacu pada Approve Job Order', 'warning');

            //         return false;
            //     }
            // }

            $(dg).datagrid('appendRow', {
                kodeapprovejoborder: '',
                jmlpr: 0,
            }).datagrid('gotoCell', {
                index: index,
                field: 'kodeapprovejoborder'
            });

            getRowIndex(target);
        }

        function hapus_detail() {
            var dg = '#table_data_detail';
            $(dg).datagrid('deleteRow', indexDetail);

            hitung_grandtotal();
        }

        function pakaiposemua(el) {
            var rows = $('#table_data_detail').datagrid('getRows');
            var checked = $(el).prop('checked');

            for (var i = 0; i < rows.length; i++) {
                $('#table_data_detail').datagrid('updateRow', {
                    index: i,
                    row: {
                        pakaipo: checked ? 1 : 0
                    }
                });
            }
        }

        function hitung_grandtotal() {
            var data = $("#table_data_detail").datagrid('getRows');

            var footer = {
                jml: 0
            }

            for (var i = 0; i < data.length; i++) {
                footer.jml += parseFloat(data[i].jml);
            }

            $('#table_data_detail').datagrid('reloadFooter', [footer]);
        }

        function clear_plugin() {
            $('.number').numberbox('setValue', 0);

            $("#tgltrans").datebox('setValue', date_format());
        }

        function ubahpakaipo(index, pakaipo) {
            $('#table_data_detail').datagrid('updateRow', {
                index: index,
                row: {
                    pakaipo: pakaipo == 1 ? 0 : 1
                }
            });

            if (pakaipo == 1) {
                $('#checkallpakaipo').prop('checked', false);
            } else {
                var pakaiposemua = 1;
                var rows = $('#table_data_detail').datagrid('getRows');

                for (var i = 0; i < rows.length; i++) {
                    if (rows[i].pakaipo != 1) {
                        pakaiposemua = 0;
                        break;
                    }
                }

                if (pakaiposemua == 1) {
                    $('#checkallpakaipo').prop('checked', true);
                }
            }
        }

        function enableAddRow() {
            $('#table_data_detail').datagrid('options').RowAdd = true;
        }

        function disableAddRow() {
            $('#table_data_detail').datagrid('options').RowAdd = false;
        }
    </script>
@endpush
