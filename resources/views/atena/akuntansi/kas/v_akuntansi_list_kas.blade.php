@extends('template.app')

@section('content')
    <div class="easyui-layout" fit="true">
        <div class="btn-group-transaksi" data-options="region: 'west'">
            <a id="btn_tambah" title="Tambah Transaksi" class="easyui-linkbutton easyui-tooltip" onclick="before_add()">
                <img src="{{ asset('assets/images/add.png') }}">
            </a>
            <a id="btn_refresh" title="Refresh Data" class="easyui-linkbutton easyui-tooltip" onclick="refresh_data()">
                <img src="{{ asset('assets/images/refresh.png') }}">
            </a>
            <a id="btn_batal" title="Batalkan Transaksi" class="easyui-linkbutton easyui-tooltip" onclick="before_delete()">
                <img src="{{ asset('assets/images/cancel.png') }}">
            </a>
            <a id="btn_cetak" title="Cetak" class="easyui-linkbutton easyui-tooltip" onclick="before_print()">
                <img src="{{ asset('assets/images/view.png') }}">
            </a>
            <a id="btn_batal_cetak" title="Batal Cetak" class="easyui-linkbutton easyui-tooltip"
                onclick="before_delete_print()">
                <img src="{{ asset('assets/images/cancel-print.png') }}">
            </a>
        </div>

        <div data-options="region: 'center'">
            <div id="tab_transaksi" class="easyui-tabs" fit="true">
                <div title="Grid" id="Grid">
                    <div class="easyui-layout" fit="true">
                        <div data-options="region:'west',split:true,hideCollapsedContent:false,collapsed:false"
                            title="Filter" style="width:150px;" align="center">
                            <table border="0">
                                <tr>
                                    <td id="label_form"></td>
                                </tr>
                                <tr>
                                    <td id="label_form" align="center">Tgl. Transaksi</td>
                                </tr>
                                <tr>
                                    <td align="center"><input id="txt_tgl_aw_filter" name="txt_tgl_aw_filter"
                                            class="date" /></td>
                                </tr>
                                <tr>
                                    <td id="label_form" align="center">s/d</td>
                                </tr>
                                <tr>
                                    <td align="center"><input id="txt_tgl_ak_filter" name="txt_tgl_ak_filter"
                                            class="date" /></td>
                                </tr>
                                <tr>
                                    <td id="label_form"><br></td>
                                </tr>
                                <tr>
                                    <td id="label_form" align="center">Lokasi</td>
                                </tr>
                                <tr>
                                    <td align="center"><input id="txt_lokasi" name="txt_lokasi[]" style="width:100px"
                                            class="label_input" /></td>
                                </tr>
                                <tr>
                                    <td id="label_form"><br></td>
                                </tr>
                                <tr>
                                    <td id="label_form" align="center">Jenis Trans</td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <select name="txt_jenis_trans" id="txt_jenis_trans" style="width:100px"
                                            class="easyui-combobox" panelHeight="auto">
                                            <option value="">Tampil Semua</option>
                                            <?php
                                            foreach ($aJenis as $item) {
                                                echo '<option value="' . strtoupper($item) . '">' . $item . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="label_form"><br></td>
                                </tr>
                                <tr>
                                    <td id="label_form" align="center">No. Trans</td>
                                </tr>
                                <tr>
                                    <td align="center"><input id="txt_kodetrans_filter" name="txt_kodetrans_filter"
                                            style="width:100px" class="label_input" /></td>
                                </tr>
                                <tr>
                                    <td id="label_form"><br></td>
                                </tr>
                                <tr>
                                    <td id="label_form" align="center">Referensi</td>
                                </tr>
                                <tr>
                                    <td align="center"><input id="txt_referensi_filter" name="txt_referensi_filter"
                                            style="width:100px" class="label_input" /></td>
                                </tr>
                                <tr>
                                    <td id="label_form"><br></td>
                                </tr>
                                <tr>
                                    <td id="label_form" align="center">Status</td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <label id="label_form"><input type="checkbox" value="I"
                                                name="cb_status_filter[]"> I</label>
                                        <label id="label_form"><input type="checkbox" value="S"
                                                name="cb_status_filter[]"> S</label>
                                        <label id="label_form"><input type="checkbox" value="P"
                                                name="cb_status_filter[]"> P</label>
                                        <label id="label_form"><input type="checkbox" value="D"
                                                name="cb_status_filter[]"> D</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="label_form"><br></td>
                                </tr>
                                <tr>
                                    <td align="center"><a id="btn_search" class="easyui-linkbutton"
                                            data-options="iconCls:'icon-search', plain:false"
                                            onclick="filter_data()">Tampilkan Data</a></td>
                                </tr>
                            </table>
                        </div>
                        <div data-options="region:'center',">
                            <table id="table_data"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="form_cetak" title="Cetak Kas" style="width:660px; height:500px">
        <div id="area_cetak"></div>
    </div>

    <div id="alasan_pembatalan" title="Alasan Pembatalan">
        <table style="padding:5px">
            <tr>
                <td>
                    <textarea prompt="Alasan Pembatalan" name="alasanpembatalan" class="label_input" id="ALASANPEMBATALAN"
                        multiline="true" style="width:300px; height:55px" data-options="validType:'length[0, 500]'"></textarea>
                </td>
            </tr>
        </table>
    </div>

    <div id="alasan_pembatalan-buttons">
        <table cellpadding="0" cellspacing="0" style="width:100%">
            <tr>
                <td style="text-align:right">
                    <a class="easyui-linkbutton" iconCls="icon-save" id='btn_alasan_pembatalan'
                        onclick="javascript:batal_trans()">Batal</a>
                </td>
            </tr>
        </table>
    </div>
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/utils.js') }}"></script>
    <script>
        var edit_row = false;
        var counter = 0;

        $(document).ready(function() {
            browse_data_lokasi('#txt_lokasi');

            //WAKTU BATAL DI GRID, tidak bisa close
            //PRINT GRID
            $("#table_data").datagrid({
                onSelect: function() {
                    row = $('#table_data').datagrid('getSelected');
                }
            });

            create_form_login();
            buat_table();

            $("#form_input").dialog({
                onOpen: function() {
                    $('#form_input').form('clear');
                },
                buttons: '#dlg-buttons'
            }).dialog('close');

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
                        export_excel('Faktur Kas/Bank/Giro/Memorial', $("#area_cetak").html());
                        return false;
                    }
                }]
            }).window('close');

            $("#alasan_pembatalan").dialog({
                onOpen: function() {
                    $('#alasan_pembatalan').form('clear');
                },
                buttons: '#alasan_pembatalan-buttons',
            }).dialog('close');


            $("#txt_tgl_aw_filter").datebox('setValue', "<?= TGLAWALFILTER ?>");
            /*var id = '#KODEDOWNPAYMENT';
            $(id).combogrid({
            	panelWidth:570,
            	idField:'KODEDOWNPAYMENT',
            	textField:'KODEDOWNPAYMENT',
            	mode:'remote',
            	data:[],
            	columns:[[
            		{field:'KODEDOWNPAYMENT',title:'No Down Payment',width:140,sortable:true,},
            		{field:'TGLTRANS',title:'Tgl. Trans',width:80,sortable:true,formatter:ubah_tgl_indo,align:'center'},
            		{field:'KODETRANSREFERENSI',title:'Kd. Referensi',width:150,sortable:true},
            		{field:'NAMAREFERENSI',title:'Nama Supplier',width:200,sortable:true},
            		{field:'AMOUNTKURS',title:'Amount',width:110,sortable:true,formatter:format_amount,align:'right'},
            	]],
            	onChange:function(newVal, oldVal){
            		if ($('#mode').val()!='') {
            			var row = $(id).combogrid('grid').datagrid('getSelected');
            			if (row) {
            				get_combogrid_data ($('#REFERENSI'), row.NAMAREFERENSI, 'supplier');
            				$('#AMOUNT').add($('#AMOUNTKURS')).numberbox('setValue', row.AMOUNTKURS);
            			} else {
            				$('#REFERENSI').combogrid('grid').datagrid('load', {q:''});
            				$('#REFERENSI').combogrid('clear');
            				$('#AMOUNT').add($('#AMOUNTKURS')).numberbox('setValue', 0);
            			}
            		}
            	}
            });*/

        });

        /* FUNGSI YG BERHUBUNGAN DG INFORMASI HEADER */

        /*
        $("#btn_ubah").click(function(){
        	row = $('#table_data').datagrid('getSelected');
        	//CEK APAKAH ADA NAMA TAB SAMA 
        	var namaTabSama = false;
        	for(var i = 0; i< $('#tab_transaksi').tabs('tabs').length ;i++)
        	{
        		if($('#tab_transaksi').tabs('getTab',i).panel('options').title == "Ubah")
        		{
        			namaTabSama = true;
        		}
        	}
        	
        	if (row && !namaTabSama) {
        		counter++;
        		
        		var data = JSON.stringify($('#table_data').datagrid('getSelected'));
        		
        		$("#mode").val("ubah");
        		$("#view").val("<?= $namaView ?>");
        		$("#data").val(data);
        		
        		var tab_title = 'Ubah';
        		var tab_name = tab_title+"_"+counter;
        		
        		$('#form_data').attr('target',tab_name);
        		
        		$('#tab_transaksi').tabs('add',{
        			title   : tab_title,
        			content : '<iframe frameborder="0"  class="tab_form"  id="'+counter+'" name="'+tab_name+'"></iframe>',
        			closable: true
        		});
        		
        		$('#form_data').submit();
        	}
        });
        */

        shortcut.add('F2', function() {
            before_add();
        });

        shortcut.add('F8', function() {
            simpan();
        });

        function disable_button() {
            $('#btn_refresh').linkbutton('disable');
            $('#btn_batal').linkbutton('disable')
            $('#btn_cetak').linkbutton('disable')
            $('#btn_batal_cetak').linkbutton('disable')
        }

        function enable_button() {
            $('#btn_refresh').linkbutton('enable');
            $('#btn_batal').linkbutton('enable')
            $('#btn_cetak').linkbutton('enable')
            $('#btn_batal_cetak').linkbutton('enable')
        }

        function before_add() {
            $('#mode').val('tambah');
            get_akses_user('<?= $_GET['kode'] ?>', function(data) {
                if (data.tambah == 1) {
                    counter++;
                    $("#mode").val("tambah");
                    $("#view").val("<?= $namaView ?>");
                    $("#data").val('');

                    var tab_title = 'Tambah';
                    var tab_name = tab_title + "_" + counter;

                    $('#form_data').attr('target', tab_name);

                    $('#tab_transaksi').tabs('add', {
                        title: tab_title,
                        id: counter,
                        content: '<iframe frameborder="0"  class="tab_form"  id="' + counter + '" name="' +
                            tab_name + '"></iframe>',
                        closable: true
                    });

                    $('#form_data').submit();
                } else {
                    $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
                }
            });
        }

        function before_delete() {
            $('#mode').val('hapus');

            if (row) {
                validasi_session(function() {
                    cek_tanggal_tutup_periode(row.tgltrans, 1, function(data) {
                        if (!data.success) {
                            $.messager.alert('Error',
                                'Sudah dilakukan tutup periode pada tanggal transaksi no ' + row
                                .tgltrans + '. Prosedur tidak dapat dilanjutkan', 'error')

                            return false
                        }

                        get_status_trans("atena/Akuntansi/Transaksi/Kas", row.idkas, function(data) {
                            if (data.status == 'I' || data.status == 'S') {
                                var kode = row.kodekas;
                                if ($('#tab_transaksi').tabs('exists', kode)) {
                                    $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' +
                                        kode + ', Sebelum Dibatalkan ', 'warning');
                                } else {
                                    get_akses_user('<?= $kodemenu ?>', function(data) {
                                        if (data.hapus == 1) {
                                            $("#alasan_pembatalan").dialog('open');
                                        } else {
                                            $.messager.alert('Warning',
                                                'Anda Tidak Memiliki Hak Akses',
                                                'warning');
                                        }
                                    });
                                }
                            } else {
                                $.messager.alert('Info', 'Transaksi Tidak Dapat Dibatalkan',
                                'info');
                            }
                        });
                    });
                });
            }
        }

        function before_delete_print() {
            $('#mode').val('batal_cetak');

            if (row) {
                validasi_session(function() {
                    cek_tanggal_tutup_periode(row.tgltrans, 1, function(data) {
                        if (!data.success) {
                            $.messager.alert('Error',
                                'Sudah dilakukan tutup periode pada tanggal transaksi no ' + row
                                .tgltrans + '. Prosedur tidak dapat dilanjutkan', 'error')
                            return false
                        }

                        get_status_trans("atena/Akuntansi/Transaksi/Kas", row.idkas, function(data) {
                            if (data.status == 'S') {
                                var kode = row.kodekas;
                                if ($('#tab_transaksi').tabs('exists', kode)) {
                                    $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' +
                                        kode + ', Sebelum Dibatal Cetak ', 'warning');
                                } else {
                                    get_akses_user('<?= $kodemenu ?>', function(data) {
                                        if (data.batalcetak == 1) {
                                            batal_cetak();
                                        } else {
                                            $.messager.alert('Warning',
                                                'Anda Tidak Memiliki Hak Akses',
                                                'warning');
                                        }
                                    });
                                }
                            } else {
                                $.messager.alert('Info', 'Transaksi Tidak Dapat Dibatal Cetak',
                                    'info');
                            }
                        });
                    });
                });
            }
        }

        function before_print() {
            $('#mode').val('cetak');

            if (row) {
                validasi_session(function() {
                    cek_tanggal_tutup_periode(row.tgltrans, 1, function(data) {
                        if (!data.success) {
                            $.messager.alert('Error',
                                'Sudah dilakukan tutup periode pada tanggal transaksi no ' + row
                                .tgltrans + '. Prosedur tidak dapat dilanjutkan', 'error')
                            return false
                        }

                        get_akses_user('<?= $kodemenu ?>', function(data) {
                            if (data.cetak == 0) {
                                $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses',
                                    'warning');
                                return false;
                            }
                            get_status_trans("atena/Akuntansi/Transaksi/Kas", row.idkas, function(
                                data) {
                                if (data.status == 'I') {
                                    var kode = row.kodekas;
                                    if ($('#tab_transaksi').tabs('exists', kode)) {
                                        $.messager.alert('Warning',
                                            'Harap Tutup Tab Atas Transaksi ' + kode +
                                            ', Sebelum Dicetak ', 'warning');
                                    } else {
                                        cetak();
                                    }
                                } else {
                                    get_akses_cetak_ulang('akuntansi', function(data) {
                                        if (data.hakakses == 1) {
                                            $("#area_cetak").load(base_url +
                                                "atena/Akuntansi/Transaksi/Kas/cetak/" +
                                                row.idkas);
                                            $("#form_cetak").window('open');
                                        }
                                    });
                                }
                            });
                        });
                    });
                });
            }
        }


        function batal_trans() {
            $("#alasan_pembatalan").dialog('close');
            var alasan = $('#ALASANPEMBATALAN').textbox('getValue');
            if (row) {
                $.messager.confirm('Confirm', 'Anda Yakin Akan Membatalkan Transaksi ' + row.kodekas + ' ?', function(r) {
                    if (r) {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: base_url + "atena/Akuntansi/Transaksi/Kas/batalTrans",
                            data: "idtrans=" + row.idkas + "&kodetrans=" + row.kodekas + "&alasan=" +
                                alasan,
                            cache: false,
                            beforeSend: function() {
                                $.messager.progress();
                            },
                            success: function(msg) {
                                $.messager.progress('close');

                                if (msg.success) {
                                    $.messager.alert('Info', 'Pembatalan Transaksi Sukses', 'info');
                                    reload();
                                } else {
                                    $.messager.alert('Error', msg.errorMsg, 'error');
                                }
                                $('#table_data').datagrid('reload');
                            }
                        });
                    }
                });
            }
        }

        function cetak() {

            if (row) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: base_url + 'atena/Akuntansi/Transaksi/Kas/ubahStatusJadiSlip',
                    data: {
                        idtrans: row.idkas,
                        kodetrans: row.kodekas
                    },
                    cache: false,
                    beforeSend: function() {
                        $.messager.progress();
                    },
                    success: function(msg) {
                        $.messager.progress('close');

                        if (msg.success) {
                            $.messager.show({
                                title: 'Info',
                                msg: 'Transaksi Sukses Dicetak',
                                showType: 'show'
                            });

                            $("#area_cetak").load(base_url + "atena/Akuntansi/Transaksi/Kas/cetak/" + row
                            .idkas);
                            $("#form_cetak").window('open');

                            reload();
                        } else {
                            $.messager.alert('Error', msg.errorMsg, 'error');
                        }
                    }
                });
            }
        }

        function batal_cetak() {
            if (row) {
                $.messager.confirm('Confirm', 'Anda Yakin Akan Batal Cetak Transaksi ' + row.kodekas + ' ?', function(r) {
                    if (r) {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: base_url + "atena/Akuntansi/Transaksi/Kas/ubahStatusJadiInput",
                            data: "idtrans=" + row.idkas + "&kodetrans=" + row.kodekas,
                            cache: false,
                            beforeSend: function() {
                                $.messager.progress();
                            },
                            success: function(msg) {
                                $.messager.progress('close');

                                if (msg.success) {
                                    $.messager.alert('Info', 'Pembatalan Cetak Sukses', 'info');
                                    reload();
                                } else {
                                    $.messager.alert('Error', msg.errorMsg, 'error');
                                }
                            }
                        });
                    }
                });
            }
        }

        function ubah_status() {
            $('#mode').val('ubah_status');
            if (row) {
                get_status_trans(row.kodekas, 'tkas', 'kodekas', function(data) {
                    if (data.status == 'S')
                        $('#form_login').dialog('open');
                    else if (data.status == 'P')
                        $.messager.alert('Error',
                            'Transaksi Sudah Berlanjut Ke Proses Selanjutnya, Status Transaksi Tidak Dapat Diubah',
                            'error');
                    else if (data.status == 'I')
                        $.messager.alert('Error', 'Transaksi Dalam Mode Input, Status Transaksi Tidak Dapat Diubah',
                            'error');
                });
            }
        }

        function refresh_data() {
            //JIKA BERADA PADA TAB FORM TAMBAH / UBAH
            if ($('#tab_transaksi').tabs('getSelected').panel('options').title == "Tambah" || $('#tab_transaksi').tabs(
                    'getSelected').panel('options').title == "Ubah") {
                row = {
                    idkas: "",
                    kodekas: "",
                };

                $("#mode").val("tambah");
                $("#view").val("<?= $namaView ?>");
                $("#data").val('');

                var tab_name = $('#tab_transaksi').tabs('getSelected').panel('options').title;

                if (tab_name == "Tambah") { //TAMBAH LANGSUNG AMBIL DARI ID

                    var counterTambah = $('#tab_transaksi').tabs('getSelected').panel('options').id;
                    tab_name = tab_name + "_" + counterTambah;
                } else { //UBAH DIAMBIL DARI ID POTONGAN
                    var trans = $('#tab_transaksi').tabs('getSelected').panel('options').id.split("|");
                    var counterTambah = trans[2];
                    tab_name = tab_name + "_" + counterTambah;

                }

                var tab_title = 'Tambah';

                var tab = $('#tab_transaksi').tabs('getSelected');
                var tabIndex = $('#tab_transaksi').tabs('getTabIndex', tab);

                var tabTrans = $('#tab_transaksi').tabs('getTab', tabIndex);
                $('#form_data').attr('target', tab_name);

                $('#tab_transaksi').tabs('update', {
                    tab: tabTrans,
                    type: 'header',
                    options: {
                        title: tab_title,
                        content: '<iframe frameborder="0"  class="tab_form" id="' + counterTambah + '" name="' +
                            tab_name + '" ></iframe>',
                        closable: true
                    }
                });
                $('#form_data').submit();

            } else {
                //JIKA DI TAB GRID
                $('#table_data').datagrid('reload');
            }
        }

        function filter_data() {
            var getLokasi = $('#txt_lokasi').combogrid('grid');
            var dataLokasi = getLokasi.datagrid('getChecked');
            var lokasi = "";
            for (var i = 0; i < dataLokasi.length; i++) {
                lokasi += (dataLokasi[i]["id"] + ",");
            }
            lokasi = lokasi.substring(0, lokasi.length - 1);
            var status = [];

            $("[name='cb_status_filter[]']:checked").each(function() {
                status.push($(this).val());
            });

            $('#table_data').datagrid('load', {
                jenistransaksi: $('#txt_jenis_trans').combobox('getValue'),
                tglawal: $('#txt_tgl_aw_filter').datebox('getValue'),
                tglakhir: $('#txt_tgl_ak_filter').datebox('getValue'),
                kodetrans: $('#txt_kodetrans_filter').val(),
                referensi: $('#txt_referensi_filter').val(),
                status: status,
                lokasi: lokasi,
            });
        }

        function buat_table() {
            $("#table_data").datagrid({
                fit: true,
                singleSelect: true,
                striped: true,
                rownumbers: true,
                remoteSort: false,
                multiSort: true,
                rowStyler: function(index, row) {
                    if (row.status == 'S')
                    return 'background-color:<?= $_SESSION[NAMAPROGRAM]['WARNA_STATUS_S'] ?>';
                    else if (row.status == 'P')
                    return 'background-color:<?= $_SESSION[NAMAPROGRAM]['WARNA_STATUS_P'] ?>';
                    else if (row.status == 'D')
                    return 'background-color:<?= $_SESSION[NAMAPROGRAM]['WARNA_STATUS_D'] ?>';
                },
                url: base_url + "atena/Akuntansi/Transaksi/Kas/dataGrid/<?= strtolower($JENIS) ?>",
                frozenColumns: [
                    [{
                            field: 'tgltrans',
                            title: 'Tgl. Trans',
                            width: 70,
                            sortable: true,
                            formatter: ubah_tgl_indo,
                            align: 'center',
                        },
                        {
                            field: 'jeniskas',
                            title: 'Jenis',
                            width: 100,
                            sortable: true
                        },
                        {
                            field: 'kodekas',
                            title: 'No. Trans',
                            width: 140,
                            sortable: true
                        },
                    ]
                ],
                columns: [
                    [{
                            field: 'kodelokasi',
                            title: 'Lokasi',
                            width: 60,
                            sortable: true,
                            align: 'center'
                        },
                        {
                            field: 'namalokasi',
                            title: 'Nama Lokasi',
                            width: 120,
                            sortable: true,
                            align: 'center'
                        },
                        <?php
		if ($JENIS=='KAS_BANK') {
		?> {
                            field: 'namaperkiraankas',
                            title: 'Akun Kas/Bank',
                            width: 150,
                            sortable: true
                        },
                        {
                            field: 'amountkurs',
                            title: 'Nominal (<?= $_SESSION[NAMAPROGRAM]['SIMBOLCURRENCY'] ?>)',
                            width: 110,
                            sortable: true,
                            formatter: format_amount,
                            align: 'right'
                        },
                        {
                            field: 'keterangan',
                            title: 'Keterangan',
                            width: 400,
                            sortable: true
                        },
                        <?php
		}
		?> {
                            field: 'referensi',
                            title: 'Referensi',
                            width: 150,
                            sortable: true
                        },
                        {
                            field: 'totaldebet',
                            title: 'Total D/K',
                            width: 110,
                            sortable: true,
                            formatter: format_amount,
                            align: 'right'
                        },
                        {
                            field: 'userbuat',
                            title: 'User Entry',
                            width: 100,
                            sortable: true
                        },
                        {
                            field: 'tglentry',
                            title: 'Tgl. Input',
                            width: 120,
                            sortable: true,
                            formatter: ubah_tgl_indo,
                            align: 'center'
                        },
                        {
                            field: 'userhapus',
                            title: 'User Batal',
                            width: 100,
                            sortable: true
                        },
                        {
                            field: 'tglbatal',
                            title: 'Tgl. Batal',
                            width: 120,
                            sortable: true,
                            formatter: ubah_tgl_indo,
                            align: 'center'
                        },
                        {
                            field: 'alasanbatal',
                            title: 'Alasan Pembatalan',
                            width: 250,
                            sortable: true
                        },
                        {
                            field: 'status',
                            title: 'Status',
                            width: 50,
                            sortable: true,
                            align: 'center'
                        },
                    ]
                ],
                onDblClickRow: function(index, data) {
                    validasi_session(function() {
                        counter++;
                        //PELU BUAT SIMPEN INDEX
                        var row = $('#table_data').datagrid('getSelected');
                        $("#mode").val("ubah");
                        $("#view").val("<?= $namaView ?>");
                        $("#data").val(row.idkas);

                        var tab_title = row.kodekas;
                        var tab_name = tab_title + "_" + counter;

                        $('#form_data').attr('target', tab_name);
                        if ($('#tab_transaksi').tabs('exists', tab_title)) {
                            $('#tab_transaksi').tabs('select', tab_title);
                        } else {
                            $('#tab_transaksi').tabs('add', {
                                title: tab_title,
                                id: row.idkas + "|" + row.kodekas + "|" + counter,
                                content: '<iframe frameborder="0"  class="tab_form"  id="' +
                                    counter + '" name="' + tab_name + '"></iframe>',
                                closable: true
                            });
                            $('#form_data').submit();
                        }
                    });
                },
            });
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
            $('#tab_transaksi').tabs('close', index);
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
                $("#view").val("<?= $namaView ?>");
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
                        content: '<iframe frameborder="0"  class="tab_form" id="' + counterTambah + '" name="' +
                            tab_name + '" ></iframe>',
                        closable: true
                    }
                });
                $('#form_data').submit();
            }
            $('#table_data').datagrid('reload');
        }

        function browse_data_lokasi(id) {
            $(id).combogrid({
                panelWidth: 380,
                url: base_url + 'atena/Master/Data/Lokasi/ComboGrid',
                idField: 'kode',
                textField: 'nama',
                mode: 'local',
                sortName: 'nama',
                sortOrder: 'asc',
                multiple: true,
                selectFirstRow: true,
                rowStyler: function(index, row) {
                    if (row.status == 0) {
                        return 'background-color:#A8AEA6';
                    }
                },
                columns: [
                    [{
                            field: 'ck',
                            checkbox: true
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
                            width: 240,
                            sortable: true
                        },
                    ]
                ]
            });
        }
    </script>
@endpush
