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
            <div data-options="region:'west',split:true,hideCollapsedContent:false,collapsed:false" title="Filter" style="width:150px;" align="center">
                <table border="0">
                    <tr><td id="label_form"></td></tr>
                    <tr><td id="label_form" align="center">Lokasi</td></tr>
                    <tr><td align="center"><input id="txt_lokasi" name="txt_lokasi[]" style="width:100px" class="label_input" /></td></tr>
                    <tr><td id="label_form"></td></tr>
                    <tr><td id="label_form" align="center">No. Transaksi</td></tr>
                    <tr><td align="center"><input id="txt_kodetrans_filter" name="txt_kodetrans_filter" style="width:100px" class="label_input" /></td></tr>
                    <tr><td id="label_form"></td></tr>
                    <tr><td id="label_form" align="center">Supplier</td></tr>
                    <tr><td align="center"><input id="txt_supplier_filter" name="txt_supplier_filter" style="width:100px" class="label_input" /></td></tr>
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
            parent.buka_submenu(null, 'Tambah Saldo Awal Hutang',
                '{{ route('atena.keuangan.saldoawalhutang.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
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
            parent.buka_submenu(null, row.kodetrans,
                '{{ route('atena.keuangan.saldoawalhutang.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' +
                row.kodetrans,
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

        var checkTabAvailable = parent.check_tab_exist(row.kodetrans, 'fa fa-pencil');
        if (checkTabAvailable) {
            $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + row.kodetrans +
                ', Sebelum Dibatalkan ', 'warning');
            tutupLoader();
            return;
        }
        var statusTrans = await getStatusTrans(link_api.getStatusSaldoAwalHutang,
            'bearer {{ session('TOKEN') }}', {
                kodetrans: row.kodetrans
            });
        if (statusTrans == "I" || statusTrans == "S") {
            $.messager.confirm('Confirm', 'Anda Yakin Membatalkan Transaksi Ini ?', async function(r) {
                if (r) {
                    bukaLoader();
                    try {
                        let url = link_api.batalSaldoAwalHutang;
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'bearer {{ session('TOKEN') }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                kodetrans: row.kodetrans,
                                alasan   : alasan,
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
	var getLokasi  = $('#txt_lokasi').combogrid('grid');
	var dataLokasi = getLokasi.datagrid('getChecked');
	var lokasi     = "";
	for (var i = 0; i < dataLokasi.length; i++) {
		lokasi += (dataLokasi[i]["uuidlokasi"] + ",");
	}
	lokasi = lokasi.substring(0, lokasi.length - 1);
	
	$('#table_data').datagrid('load', {
		kodetrans	: $('#txt_kodetrans_filter').val(),
		namasupplier: $('#txt_supplier_filter').val(),
		lokasi      : lokasi
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
		url         : link_api.loadDataGridSaldoAwalHutang,
		pagination  : true,
		clientPaging: false,
		frozenColumns:[[
			{field:'jenistransaksi',title:'Jenis Transaksi',width:120, sortable:true,},
			{field:'kodetrans',title:'No. Transaksi',width:120, sortable:true,},
		]],
		columns:[[
			{field:'noinvoicesupplier',title:'No. Inv. Supplier',width:120, sortable:true,},
			{field:'namalokasi',title:'Lokasi',width:140, sortable:true,},
			{field:'kodesupplier',title:'Kd. Supplier',width:140, sortable:true,},
			{field:'namasupplier',title:'Supplier',width:250, sortable:true,},
			{field:'tgltrans', title:'Tgl. Trans', align:'center',width:90, sortable:true, formatter:ubah_tgl_indo,},
			{field:'tgljatuhtempo', title:'Tgl. Jth Tempo',align:'center',width:90, sortable:true, formatter:ubah_tgl_indo,},
			{field:'grandtotal', title:'Nominal Hutang',width:120, sortable:true, align:'right', formatter:format_amount,},
			{field:'catatan',title:'Catatan',width:250, sortable:true,},
		]],
		onDblClickRow: function(index, data) {
			before_edit();
		},
	});
}

function reload() {
    $('#table_data').datagrid('reload');
}

function browse_data_lokasi(id) {
	$(id).combogrid({
        panelWidth: 380,
        url: link_api.browseLokasi,
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
