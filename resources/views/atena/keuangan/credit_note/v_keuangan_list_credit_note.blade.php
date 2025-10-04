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
    </div>


    <div data-options="region: 'center'">
        <div class="easyui-layout" fit="true">
            <div data-options="region:'west',split:true,hideCollapsedContent:false,collapsed:false" title="Filter" style="width:150px;"  align="center">
                <table border="0">
                    <tr><td id="label_form"></td></tr>
                    <tr><td id="label_form" align="center">Tgl. Transaksi</td></tr>
                    <tr><td align="center"><input id="txt_tgl_aw_filter" name="txt_tgl_aw_filter" class="date" style="width:100px"/></td></tr>
                    <tr><td id="label_form" align="center">s/d</td></tr>
                    <tr><td align="center"><input id="txt_tgl_ak_filter" name="txt_tgl_ak_filter" class="date" style="width:100px"/></td></tr>
                    <tr><td id="label_form"><br></td></tr>
                    <tr><td id="label_form" align="center">No. Transaksi</td></tr>
                    <tr><td align="center"><input id="txt_kodetrans_filter" name="txt_kodetrans_filter" style="width:100px" class="label_input" /></td></tr>
                    <tr><td id="label_form"></td></tr>
                    <tr><td id="label_form" align="center">Nama Customer</td></tr>
                    <tr><td align="center"><input id="txt_customer_filter" name="txt_customer_filter" style="width:100px" class="label_input" /></td></tr>
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

$(document).ready(function() {
//WAKTU BATAL DI GRID, tidak bisa close
	//PRINT GRID
	$("#table_data").datagrid({
		onSelect: function() {
			row = $('#table_data').datagrid('getSelected');
		}
	});
	
	create_form_login();

	buat_table();	
	
	$("#form_cetak").window({
		collapsible: false,
		minimizable: false,
		tools      : [{
			text   : '',
			iconCls: 'icon-print',
			handler: function(){
				$("#area_cetak").printArea({ mode: 'iframe'});

				$("#form_cetak").window({
					closed: true
				});
			}
		},{
			text   : '',
			iconCls: 'icon-excel',
			handler: function() {
				export_excel('Faktur Saldo Awal Hutang', $("#area_cetak").html());
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

    tutupLoader()
});

/*==================== FUNGSI YG BERHUBUNGAN DG INFORMASI HEADER ===================*/

shortcut.add('F2', function() {
	before_add();
});

function before_add() {
    get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        if (data.data.tambah == 1) {
            parent.buka_submenu(null, 'Tambah Potongan Penjualan',
                '{{ route('atena.keuangan.credit_note.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
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
            parent.buka_submenu(null, row.kodecreditnote,
                '{{ route('atena.keuangan.credit_note.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' +
                row.uuidcreditnote,
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

async function batal_trans() {
    $("#alasan_pembatalan").dialog('close');
    alasan = $('#ALASANPEMBATALAN').val();
    var row = $('#table_data').datagrid('getSelected');
    if (row && alasan != "") {
        bukaLoader();

        var checkTabAvailable = parent.check_tab_exist(row.kodecreditnote, 'fa fa-pencil');
        if (checkTabAvailable) {
            $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + row.kodecreditnote +
                ', Sebelum Dibatalkan ', 'warning');
            tutupLoader();
            return;
        }
        var statusTrans = await getStatusTrans(link_api.getStatusCreditNote,
            'bearer {{ session('TOKEN') }}', {
                uuidcreditnote: row.uuidcreditnote
            });
        if (statusTrans == "I" || statusTrans == "S") {
            $.messager.confirm('Confirm', 'Anda Yakin Membatalkan Transaksi Ini ?', async function(r) {
                if (r) {
                    bukaLoader();
                    try {
                        let url = link_api.batalCreditNote;
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'bearer {{ session('TOKEN') }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                uuidcreditnote: row.uuidcreditnote,
                                kodecreditnote: row.kodecreditnote,
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

function refresh_data() {
    //JIKA DI TAB GRID
    $('#table_data').datagrid('reload');
}

function filter_data() {
	$('#table_data').datagrid('load',{
		kodetrans   : $('#txt_kodetrans_filter').val(),
		namacustomer: $('#txt_customer_filter').val(),
		tglawal     : $('#txt_tgl_aw_filter').datebox('getValue'),
		tglakhir    : $('#txt_tgl_ak_filter').datebox('getValue'),
	});
}

function buat_table() {
	$("#table_data").datagrid({
        remoteFilter: true,
		fit         : true,
		singleSelect: true,
		remoteSort  : false,
		multiSort   : true,
		striped     : true,
		rownumbers  : true,
		pageSize    : 20,
		url         : link_api.loadDataGridCreditNote,
		pagination  : true,
		clientPaging: false,
        rowStyler   : function(index, row) {
            if (row.status == 'S') return 'background-color:{{ session('WARNA_STATUS_S') }}';
            else if (row.status == 'P') return 'background-color:{{ session('WARNA_STATUS_P') }}';
            else if (row.status == 'D') return 'background-color:{{ session('WARNA_STATUS_D') }}';
        },
		frozenColumns:[[
			{field:'kodecreditnote',title:'No. Faktur',width:100, sortable:true,},
			{field:'namalokasi',title:'Lokasi',width:120, sortable:true,},
			{field:'namacustomer',title:'Customer',width:300, sortable:true,},
			{field:'tgltrans', title:'Tgl. Trans', align:'center',width:90, sortable:true, formatter:ubah_tgl_indo,}
		]],
		columns:[[
			{field:'catatan',title:'Keterangan',width:400,sortable:true},
			{field:'amount',title:'Nominal',width:110,sortable:true,formatter:format_amount, align:'right'},
			{field:'userentry',title:'User',width:100,sortable:true},
			{field:'tglentry',title:'Tgl. Input',width:120,sortable:true,formatter:ubah_tgl_indo,align:'center'},
			{field:'status',title:'Status',width:50,sortable:true,align:'center'},
		]],
		onDblClickRow: function (index, data) {
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
