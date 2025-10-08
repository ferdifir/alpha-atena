@extends('template.app')

@section('content')
<div class="easyui-layout" fit="true">
    <div class="btn-group-transaksi" data-options="region: 'west'" style="width: 50px">
        <a id="btn_tambah" title="Tambah Transaksi" class="easyui-linkbutton easyui-tooltip" onclick="before_add()">
            <img src="{{ asset('assets/images/add.png') }}">
        </a>
        <a id="btn_refresh" title="Refresh Data" class="easyui-linkbutton easyui-tooltip" onclick="refresh_data()">
            <img src="{{ asset('assets/images/refresh.png') }}">
        </a>
        <a id="btn_batal" title="Batalkan Transaksi" class="easyui-linkbutton easyui-tooltip" onclick="before_delete()">
            <img src="{{ asset('assets/images/cancel.png') }}">
        </a>
        <a id="btn_cetak"  title="Cetak" class="easyui-linkbutton easyui-tooltip" onclick="before_print()">
			<img src="{{ asset('assets/images/view.png') }}">
		</a>
        <a id="btn_batal_cetak"  title="Batal Cetak" class="easyui-linkbutton easyui-tooltip" onclick="before_delete_print()">
			<img src="{{ asset('assets/images/cancel-print.png') }}">
		</a>
    </div>


    <div data-options="region: 'center'">
        <div class="easyui-layout" fit="true">
            <div data-options="region:'west',split:true,hideCollapsedContent:false,collapsed:false" title="Filter" style="width:150px;"  align="center">
                <table border="0">
                    <tr><td id="label_form"></td></tr>
                    <tr><td id="label_form" align="center">Tgl. Input</td></tr>
                    <tr><td align="center"><input id="txt_tgl_aw_filter" name="txt_tgl_aw_filter" style="width:100px" class="date"/></td></tr>
                    <tr><td id="label_form" align="center">s/d</td></tr>
                    <tr><td align="center"><input id="txt_tgl_ak_filter" name="txt_tgl_ak_filter" style="width:100px" class="date"/></td></tr>
                    <tr><td id="label_form"><br></td></tr>
                    <tr><td id="label_form" align="center">No. Trans</td></tr>
                    <tr><td align="center"><input id="txt_kodetrans_filter" name="txt_kodetrans_filter" style="width:100px" class="label_input" /></td></tr>
                    <tr><td id="label_form"><br></td></tr>
                    <tr><td id="label_form" align="center">Supplier</td></tr>
                    <tr><td align="center"><input id="txt_referensi_filter" name="txt_referensi_filter" style="width:100px" class="label_input" /></td></tr>
                    <tr><td id="label_form"><br></td></tr>
                    <tr><td id="label_form" align="center">Status</td></tr>
                    <tr><td align="center">
                        <label id="label_form"><input type="checkbox" value="I" name="cb_status_filter[]"> I (Input)</label>
                        <br>
                        <label id="label_form" style="background-color: {{ session('WARNA_STATUS_S') }}"><input type="checkbox" value="S" name="cb_status_filter[]"> S (Cetak)</label>
                        <br>
                        <label id="label_form" style="background-color:#F775CC"><input type="checkbox" value="R" name="cb_status_filter[]"> R (Approve)</label>
                        <br>
                        <label id="label_form" style="background-color: {{ session('WARNA_STATUS_P') }}"><input type="checkbox" value="T" name="cb_status_filter[]"> T (Tuntas)</label>
                        <br>
                        <label id="label_form" style="background-color: {{ session('WARNA_STATUS_D') }}"><input type="checkbox" value="D" name="cb_status_filter[]"> D (Batal)</label>
                    </td></tr>
                    <tr><td align="center"><a id="btn_search"  class="easyui-linkbutton" data-options="iconCls:'icon-search', plain:false" onclick="filter_data()">Tampilkan Data</a></td></tr>
                </table>
            </div>
            <div data-options="region:'center'">
                <div class="easyui-layout" data-options="fit:true">
                    <div data-options="region:'north'" class="title-grid"> Riwayat Transaksi </div>
                    <div data-options="region:'center'">
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
                <textarea prompt="Alasan Pembatalan" name="alasanpembatalan" class="label_input" id="ALASANPEMBATALAN" multiline="true"
                    style="width:300px; height:55px" data-options="validType:'length[0, 500]'"></textarea>
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
<script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/utils.js') }}"></script>
<script>
var edit_row = false;
var idtrans = "";
var counter = 0;
var row = {};

$(document).ready( function() {
	//WAKTU BATAL DI GRID, tidak bisa close
	//PRINT GRID
	$("#table_data").datagrid({
		onSelect: function() {
			row = $('#table_data').datagrid('getSelected');
		}
	});
	
	create_form_login();
	buat_table();

	$("#txt_tgl_aw_filter").datebox('setValue', getDateMinusDays(2));

	$("#form_input").dialog({
		onOpen: function() {
			$('#form_input').form('clear');
		},
		buttons: '#dlg-buttons'
	}).dialog('close');

	$("#form_cetak").window({
		collapsible: false,
		minimizable: false,
		tools      : [{
			text   : '',
			iconCls: 'icon-print',
			handler: function() {
				$("#area_cetak").printArea({ mode: 'iframe'});

				$("#form_cetak").window({
					closed: true
				});
			}
		}, {
			text   : '',
			iconCls: 'icon-excel',
			handler: function() {
				export_excel('Faktur Keuangan Tanda Terima', $("#area_cetak").html());
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

	tutupLoader();
	
});

/* FUNGSI YG BERHUBUNGAN DG INFORMASI HEADER */

shortcut.add('F2', function() {
	before_add();
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
    get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        if (data.data.tambah == 1) {
            parent.buka_submenu(null, 'Tambah Tagihan Pemasok',
                '{{ route('atena.keuangan.tanda_terima.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
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
            parent.buka_submenu(null, row.kodetandaterima,
                '{{ route('atena.keuangan.tanda_terima.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' +
                row.uuidtandaterima,
                'fa fa-pencil');
        } else {
            $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
    });
}

function before_delete() {
    $('#mode').val('hapus');
    var row = $('#table_data').datagrid('getSelected');
    if (row) {
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
            if (data.data.hapus == 1) {
                // batal();
                $("#alasan_pembatalan").dialog('open');
            } else {
                $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
            }
        });
    }
}

function before_delete_print() {
    $('#mode').val('hapus');
    var row = $('#table_data').datagrid('getSelected');
    if (row) {
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
            if (data.data.batalcetak == 1) {
                batal_cetak();
            } else {
                $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
            }
        });
    }
}

async function before_print() {
    $('#mode').val('cetak');
    var row = $('#table_data').datagrid('getSelected');
    if (row) {
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {
            if (data.data.cetak == 0) {
                $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
                return false;
            }
            var statusTrans = await getStatusTrans(link_api.getStatusTandaTerima,
                'bearer {{ session('TOKEN') }}', {
                    uuidtandaterima: row.uuidtandaterima
                });
            var checkTabAvailable = parent.check_tab_exist(row.kodetandaterima, 'fa fa-pencil');
            if (statusTrans == 'I') {
                var kode = row.kodetandaterima;
                if (checkTabAvailable) {
                    $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' +
                        kode + ', Sebelum Dicetak ', 'warning');
                } else {
                    try {
                        let url = link_api.ubahStatusjadiSlipTandaTerima;
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'bearer {{ session('TOKEN') }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                uuidtandaterima: row.uuidtandaterima,
                                kodetandaterima: row.kodetandaterima,
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
                            await cetak(row.uuidtandaterima);
                            refresh_data();
                        } else {
                            $.messager.alert('Error', response.message, 'error');
                        }
                    } catch (error) {
                        var textError = getTextError(error);
                        $.messager.alert('Error', getTextError(error), 'error');
                    }
                }
            } else if (statusTrans == 'S' || statusTrans == 'P') {
                await cetak(row.uuidtandaterima);
            } else {
                $.messager.alert('Error', 'Transaksi telah Diproses', 'error');
            }
        });
        //window.open(url, 'Cetak Pesanan Pembelian', 'width=850, height=842, scrollbars=yes');
    }
}

async function batal_trans() {
    $("#alasan_pembatalan").dialog('close');
    alasan = $('#ALASANPEMBATALAN').val();
    var row = $('#table_data').datagrid('getSelected');
    if (row && alasan != "") {
        bukaLoader();

        var checkTabAvailable = parent.check_tab_exist(row.kodetandaterima, 'fa fa-pencil');
        if (checkTabAvailable) {
            $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + row.kodetandaterima +
                ', Sebelum Dibatalkan ', 'warning');
            tutupLoader();
            return;
        }
        var statusTrans = await getStatusTrans(link_api.getStatusTandaTerima,
            'bearer {{ session('TOKEN') }}', {
                uuidtandaterima: row.uuidtandaterima
            });
        if (statusTrans == "I" || statusTrans == "S") {
            $.messager.confirm('Confirm', 'Anda Yakin Membatalkan Transaksi Ini ?', async function(r) {
                if (r) {
                    bukaLoader();
                    try {
                        let url = link_api.batalTandaTerima;
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'bearer {{ session('TOKEN') }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                uuidtandaterima: row.uuidtandaterima,
                                kodetandaterima: row.kodetandaterima,
                                alasan: alasan,
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
                            refresh_data();
                            $.messager.alert('Info', response.message, 'info');
                        } else {
                            $.messager.alert('Error', response.message, 'error');
                        }
                    } catch (error) {
                        var textError = getTextError(error);
                        $.messager.alert('Error', getTextError(error), 'error');
                    }
                    tutupLoader();
                }
            });
        } else {
            $.messager.alert('Info', 'Transaksi Tidak Dapat Dibatalkan', 'info');
        }
        tutupLoader();
    }
}

async function batal_cetak() {
    var row = $('#table_data').datagrid('getSelected');
    if (row) {
        bukaLoader();

        var checkTabAvailable = parent.check_tab_exist(row.kodetandaterima, 'fa fa-pencil');
        if (checkTabAvailable) {
            $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + row.kodetandaterima +
                ', Sebelum Dibatal cetak ', 'warning');
            tutupLoader();
            return;
        }
        var statusTrans = await getStatusTrans(link_api.getStatusTandaTerima,
            'bearer {{ session('TOKEN') }}', {
                uuidtandaterima: row.uuidtandaterima
            });
        if (statusTrans == "S") {
            $.messager.confirm('Confirm', 'Anda Yakin Batal Cetak Transaksi Ini ?', async function(r) {
                if (r) {
                    bukaLoader();
                    try {
                        let url = link_api.ubahStatusjadiInputTandaTerima;
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'bearer {{ session('TOKEN') }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                uuidtandaterima: row.uuidtandaterima,
                                kodetandaterima: row.kodetandaterima,
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
                            refresh_data();
                            $.messager.alert('Info', response.message, 'info');
                        } else {
                            $.messager.alert('Error', response.message, 'error');
                        }
                    } catch (error) {
                        var textError = getTextError(error);
                        $.messager.alert('Error', getTextError(error), 'error');
                    }
                    tutupLoader();
                }
            });
        } else {
            $.messager.alert('Info', 'Transaksi Tidak Dapat Dibatal Cetak', 'info');
        }
        tutupLoader();
    }
}

async function cetak(uuidtrans) {
    bukaLoader();
    if (row) {
        try {
            let url = link_api.cetakTandaTerima + uuidtrans;
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Authorization': 'bearer {{ session('TOKEN') }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    uuidtandaterima: uuidtrans,
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
    tutupLoader();
}

function ubah_status() {
	$('#mode').val('ubah_status');
	if (row) {
		get_status_trans(row.kodetandaterima, 'tkas', 'KODETANDATERIMA', function(data) {
			if (data.status == 'S')
				$('#form_login').dialog('open');
			else if (data.status == 'P')
				$.messager.alert('Error', 'Transaksi Sudah Berlanjut Ke Proses Selanjutnya, Status Transaksi Tidak Dapat Diubah', 'error');
			else if (data.status == 'I')
				$.messager.alert('Error', 'Transaksi Dalam Mode Input, Status Transaksi Tidak Dapat Diubah', 'error');
		});
	}
}

function refresh_data() {
	$('#table_data').datagrid('reload');
}

function filter_data() {
	var status = [];
	$("[name='cb_status_filter[]']:checked").each(function(){
		status.push($(this).val());
	});

	$('#table_data').datagrid('load',{
		tglawal  : $('#txt_tgl_aw_filter').datebox('getValue'),
		tglakhir : $('#txt_tgl_ak_filter').datebox('getValue'),
		kodetrans: $('#txt_kodetrans_filter').val(),
		referensi: $('#txt_referensi_filter').val(),
		status   : status,
	});
}

function buat_table() {
	$("#table_data").datagrid({
		fit         : true,
		singleSelect: true,
		remoteSort  : false,
		multiSort   : true,
		striped     : true,
		rownumbers  : true,
		pageSize    : 20,
		url         : link_api.loadDataGridTandaTerima,
		pagination  : true,
		clientPaging: false,
		rowStyler   : function(index, row) {
            if (row.status == 'S') return 'background-color:{{ session('WARNA_STATUS_S') }}';
            else if (row.status == 'P') return 'background-color:{{ session('WARNA_STATUS_P') }}';
            else if (row.status == 'R') return 'background-color:#b085f5';
            else if (row.status == 'D') return 'background-color:{{ session('WARNA_STATUS_D') }}';
        },
		frozenColumns: [[
			{field:'tgltrans',title:'Tgl. Trans',width:70,sortable:true,formatter:ubah_tgl_indo, align:'center',},
			{field:'kodetandaterima',title:'No. Trans',width:140,sortable:true},
			{field:'namasupplier',title:'Supplier',width:200,sortable:true},
			{field:'grandtotal',title:'Grand Total',width:110,sortable:true,align:'right',formatter:format_amount},
		]],
		columns: [[
			{field:'keterangan',title:'Keterangan',width:400,sortable:true},
			{field:'userbuat',title:'User Entry',width:100,sortable:true},
			{field:'tglentry',title:'Tgl. Input',width:120,sortable:true,formatter:ubah_tgl_indo,align:'center'},
			{field:'userhapus',title:'User Batal',width:100,sortable:true},
			{field:'tglbatal',title:'Tgl. Batal',width:120,sortable:true,formatter:ubah_tgl_indo,align:'center'},
			{field:'alasanbatal',title:'Alasan Pembatalan',width:250,sortable:true},
			{field:'status',title:'Status',width:50,sortable:true,align:'center'},
		]],
		onDblClickRow: function(index, data) {
			before_edit();
		},
	});
}

function reload()
{
	$('#table_data').datagrid('reload');
}
</script>
@endpush
