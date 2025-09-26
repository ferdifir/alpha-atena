@extends('template.app')

@section('content')
<div class="easyui-layout" fit="true">	
	<div class="btn-group-transaksi" data-options="region: 'west'" style="width: 50px">
		<a id="btn_tambah"  title="Tambah Transaksi" class="easyui-linkbutton easyui-tooltip" onclick="before_add()">
			<img src="{{ asset('assets/images/add.png') }}">
		</a>
		<a id="btn_refresh"  title="Refresh Data" class="easyui-linkbutton easyui-tooltip" onclick="refresh_data()">
			<img src="{{ asset('assets/images/refresh.png') }}">
		</a>
		<a id="btn_batal"  title="Batalkan Transaksi" class="easyui-linkbutton easyui-tooltip" onclick="before_delete()">
			<img src="{{ asset('assets/images/cancel.png') }}">
		</a>
		<a id="btn_cetak"  title="Cetak" class="easyui-linkbutton easyui-tooltip" onclick="before_print()">
			<img src="{{ asset('assets/images/view.png') }}">
		</a>
		<a id="btn_exportcsv" title="Export CSV" class="easyui-linkbutton easyui-tooltip" onclick="exportcsv()">
			<img src="{{ asset('assets/images/excel.png') }}">
		</a>
		<a id="btn_exportxml" title="Export XML" class="easyui-linkbutton easyui-tooltip" onclick="exportXML()">
			<img src="{{ asset('assets/images/code.png') }}">
		</a>
		<a id="btn_exportxml_retail" title="Export XML Retail" class="easyui-linkbutton easyui-tooltip" onclick="exportXMLRetail()">
			<img src="{{ asset('assets/images/code.png') }}">
		</a>
		<a id="btn_batal_cetak"  title="Batal Cetak" class="easyui-linkbutton easyui-tooltip" onclick="before_delete_print()">
			<img src="{{ asset('assets/images/cancel-print.png') }}">
		</a>
	</div>
	<div data-options="region: 'center'">
		<div class="easyui-layout" fit="true">
            <div data-options="region:'west',split:true,hideCollapsedContent:false,collapsed:false" title="Filter" style="width:150px;" align="center">
                <table border="0">
                    <tr><td id="label_form"></td></tr>
                    <tr><td id="label_form" align="center">Tgl. Transaksi</td></tr>
                    <tr><td align="center"><input id="txt_tgl_aw_filter" name="txt_tgl_aw_filter" style="width:100px" class="date"/></td></tr>
                    <tr><td id="label_form" align="center">s/d</td></tr>
                    <tr><td align="center"><input id="txt_tgl_ak_filter" name="txt_tgl_ak_filter" style="width:100px" class="date"/></td></tr>
                    <tr><td id="label_form"><br></td></tr>
                    <tr><td id="label_form" align="center">No. SPT</td></tr>
                    <tr><td align="center"><input id="txt_kodetrans_filter" name="txt_kodetrans_filter" style="width:100px" class="label_input" /></td></tr>
                    <tr><td id="label_form"><br></td></tr>
                    <tr><td id="label_form" align="center">Status</td></tr>
                    <tr><td align="center">
                        <label id="label_form"><input type="checkbox" value="I" name="cb_status_filter[]"> I</label>
                        <label id="label_form"><input type="checkbox" value="S" name="cb_status_filter[]"> S</label>
                        <label id="label_form"><input type="checkbox" value="P" name="cb_status_filter[]"> P</label>
                        <label id="label_form"><input type="checkbox" value="D" name="cb_status_filter[]"> D</label>
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

<div id="form_cetak" title="Preview" style="width:660px; height:450px">
	<div id="area_cetak"></div>
</div>

<div id="alasan_pembatalan" title="Alasan Pembatalan">
	<table style="padding:5px">
		<tr>
			<td><textarea prompt="Alasan Pembatalan" name="alasanpembatalan" class="label_input" id="ALASANPEMBATALAN" multiline="true" style="width:300px; height:55px" data-options="validType:'length[0, 500]'"></textarea></td>
		</tr>
	</table>
</div>
<div id="alasan_pembatalan-buttons">
	<table cellpadding="0" cellspacing="0" style="width:100%">
		<tr>
			<td style="text-align:right">
				<a  class="easyui-linkbutton" iconCls="icon-save" id='btn_alasan_pembatalan' onclick="javascript:batal_trans()">Batal</a>
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
var counter  = 0;
var idtrans  = "";
var urlbbm   = "";
var lihatHarga = false;
$(document).ready(async function(){
    await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        lihatHarga=data.data.lihatharga == 1;
    },false);

	//WAKTU BATAL DI GRID, tidak bisa close
	//PRINT GRID
	$("#table_data").datagrid({
		onSelect:function(){
			row = $('#table_data').datagrid('getSelected');
		}
	});
	
	create_form_login();
	buat_table();

	$("#txt_tgl_aw_filter").datebox('setValue', getDateMinusDays(2));
	$("#TGLTRANS").datebox();

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
			handler: function(){
				export_excel('Faktur Pajak', $("#area_cetak").html());
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

shortcut.add('F2', function() {
	before_add();
});

function before_add() {
    get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        if (data.data.tambah == 1) {
            parent.buka_submenu(null, 'Tambah Faktur Pajak',
                '{{ route('atena.akuntansi.fakturpajak.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
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
            parent.buka_submenu(null, row.nospt,
                '{{ route('atena.akuntansi.fakturpajak.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' +
                row.uuidfakturpajak,
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

function before_print() {
    $('#mode').val('cetak');
    var row = $('#table_data').datagrid('getSelected');
    console.log(row)
    if (row) {
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {
            if (data.data.cetak == 0) {
                $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
                return false;
            }
            var statusTrans = await getStatusTrans(link_api.getStatusFakturPajak,
                'bearer {{ session('TOKEN') }}', {
                    uuidfakturpajak: row.uuidfakturpajak
                });
            var checkTabAvailable = parent.check_tab_exist(row.kodefakturpajak, 'fa fa-pencil');
            if (statusTrans == 'I') {
                var kode = row.kodefakturpajak;
                if (checkTabAvailable) {
                    $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' +
                        kode + ', Sebelum Dicetak ', 'warning');
                } else {
                    try {
                        let url = link_api.ubahStatusjadiSlipFakturPajak;
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'bearer {{ session('TOKEN') }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                uuidfakturpajak: row.uuidfakturpajak,
                                nospt          : row.nospt,
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
                            cetak(row.uuidfakturpajak);
                        } else {
                            $.messager.alert('Error', response.message, 'error');
                        }
                    } catch (error) {
                        var textError = getTextError(error);
                        $.messager.alert('Error', getTextError(error), 'error');
                    }
                }
            } else if (statusTrans == 'S' || statusTrans == 'P') {
                cetak(row.uuidfakturpajak);
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

        var checkTabAvailable = parent.check_tab_exist(row.kodefakturpajak, 'fa fa-pencil');
        if (checkTabAvailable) {
            $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + row.kodefakturpajak +
                ', Sebelum Dibatalkan ', 'warning');
            tutupLoader();
            return;
        }
        var statusTrans = await getStatusTrans(link_api.getStatusFakturPajak,
            'bearer {{ session('TOKEN') }}', {
                uuidfakturpajak: row.uuidfakturpajak
            });
        if (statusTrans == "I" || statusTrans == "S") {
            $.messager.confirm('Confirm', 'Anda Yakin Membatalkan Transaksi Ini ?', async function(r) {
                if (r) {
                    bukaLoader();
                    try {
                        let url = link_api.batalFakturPajak;
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'bearer {{ session('TOKEN') }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                uuidfakturpajak: row.uuidfakturpajak,
                                nospt          : row.nospt,
                                alasan         : alasan,
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

        var checkTabAvailable = parent.check_tab_exist(row.kodefakturpajak, 'fa fa-pencil');
        if (checkTabAvailable) {
            $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + row.kodefakturpajak +
                ', Sebelum Dibatal cetak ', 'warning');
            tutupLoader();
            return;
        }
        var statusTrans = await getStatusTrans(link_api.getStatusFakturPajak,
            'bearer {{ session('TOKEN') }}', {
                uuidfakturpajak: row.uuidfakturpajak
            });
        if (statusTrans == "S") {
            $.messager.confirm('Confirm', 'Anda Yakin Batal Cetak Transaksi Ini ?', async function(r) {
                if (r) {
                    bukaLoader();
                    try {
                        let url = link_api.ubahStatusjadiInputFakturPajak;
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'bearer {{ session('TOKEN') }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                uuidfakturpajak: row.uuidfakturpajak,
                                nospt          : row.nospt,
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
            let url = link_api.cetakFakturPajak + uuidtrans;
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Authorization': 'bearer {{ session('TOKEN') }}',
                    'Content-Type': 'application/json',
                },
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

async function exportcsv() {
    await downloadCSV(link_api.eksporCSVFakturPajak, row.uuidfakturpajak, '{{ session("TOKEN") }}');
}

async function exportXML() {
    await downloadXML(link_api.ekporXMLFakturPajak, row.uuidfakturpajak, '{{ session("TOKEN") }}');
}

async function exportXMLRetail() {
    await downloadXML(link_api.eksporXMLRetailFakturPajak, row.uuidfakturpajak, '{{ session("TOKEN") }}');
}

function refresh_data() {
    //JIKA DI TAB GRID
    $('#table_data').datagrid('reload');
}

function filter_data() {
	var status = [];
	$("[name='cb_status_filter[]']:checked").each(function(){
		status.push($(this).val());
	});
	$('#table_data').datagrid('load',{
		kodetrans : $('#txt_kodetrans_filter').val(),
		nama      : $('#txt_nama_supplier_filter').val(),
		perusahaan: $('#txt_perusahaan_filter').val(),
		tglawal   : $('#txt_tgl_aw_filter').datebox('getValue'),
		tglakhir  : $('#txt_tgl_ak_filter').datebox('getValue'),
		status    : status,
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
		url         : link_api.loadTransaksiDataGridFakturPajak,
		pagination  : true,
		clientPaging: false,
		rowStyler   : function(index, row) {
            if (row.status == 'S') return 'background-color:{{ session('WARNA_STATUS_S') }}';
            else if (row.status == 'P') return 'background-color:{{ session('WARNA_STATUS_P') }}';
            else if (row.status == 'D') return 'background-color:{{ session('WARNA_STATUS_D') }}';
        },
		frozenColumns:[[
			{field:'tgltrans',title:'Tgl. Trans',width:80,sortable:true,formatter:ubah_tgl_indo,align:'center'},
			{field:'idfakturpajak',hidden:true},
			{field:'nospt',title:'No. SPT',width:145,sortable:true,align:'center'},
			{field:'pembetulanke',title:'Pembetulan Ke',width:120,sortable:true,align:'center'},
			{field:'tahun',title:'Tahun',width:80,sortable:true,align:'center'},
			// {field:'BULANAWAL',hidden:true},
			{field:'bulanawal',title:'Bulan Awal',width:80,sortable:true,align:'center'},
			// {field:'BULANAKHIR',hidden:true},
			// {field:'BULANAKHIR',title:'Bulan Akhir',width:80,sortable:true,align:'center'},
			
		]],
		columns: [[
			{field:'totaldpp',title:'Total DPP',width:100,sortable:true,formatter:format_amount, align:'right',hidden:!lihatHarga,},
			{field:'totalppn',title:'Total PPN',width:100,sortable:true,formatter:format_amount, align:'right',hidden:!lihatHarga,},
			{field:'totalppnbm',title:'Total PPN BM',width:100,sortable:true,formatter:format_amount, align:'right',hidden:!lihatHarga,},
			{field:'catatan',title:'Catatan',width:450,sortable:true},
			{field:'userbuat',title:'User Entry',width:100,sortable:true},
			{field:'tglentry',title:'Tgl. Input',width:120,sortable:true,formatter:ubah_tgl_indo,align:'center'},
			{field:'userhapus',title:'User Batal',width:100,sortable:true},
			{field:'tglbatal',title:'Tgl. Batal',width:120,sortable:true,formatter:ubah_tgl_indo,align:'center'},
			{field:'alasanbatal',title:'Alasan Pembatalan',width:250,sortable:true},
			{field:'status',title:'Status',width:50,sortable:true,align:'center'},
			{field:'closing',title:'Closing',width:50,sortable:true,align:'center'}
		]],
		onDblClickRow: function (index, data) {
			before_edit();
		},
	});
}

function reload() {
    $('#table_data').datagrid('reload');
}
</script>
@endpush
