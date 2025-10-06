@extends('template.app')

@section('content')
<?php
if ($jenis == 'REJECT') { 
	$label = 'Reject';
	$icon['approve'] = 'icon-cancel';
	$icon['cancel'] = 'icon-redo';
} else {
	$label = 'Approve';
	$icon['approve'] = 'icon-ok';
	$icon['cancel'] = 'icon-undo';
}
?>
<div class="easyui-layout" fit="true">	
	<div class="btn-group-transaksi" data-options="region: 'west'" style="width: 50px">
		<a id="btn_ubah"  title="Ubah" class="easyui-linkbutton easyui-tooltip" onclick="javascript:ubah()">
			<img src="{{ asset('assets/images/edit.png') }}">
		</a>
		<a id="btn_approve"  title="Approve" class="easyui-linkbutton easyui-tooltip" onclick="javascript:before_approve()">
			<img src="{{ asset('assets/images/tuntas.png') }}">
		</a>
		<a id="btn_batal_approve"  title="Batal Approve" class="easyui-linkbutton easyui-tooltip" onclick="javascript:before_cancel_approve()">
			<img src="{{ asset('assets/images/cancel.png') }}">
		</a>
		<a id="btn_refresh"  title="Refresh Data" class="easyui-linkbutton easyui-tooltip" onclick="refresh_data()">
			<img src="{{ asset('assets/images/refresh.png') }}">
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
					<tr><td id="label_form" align="center">No. Trans</td></tr>
					<tr><td align="center"><input id="txt_kodetrans_filter" name="txt_kodetrans_filter" style="width:100px" class="label_input" /></td></tr>
					<tr><td id="label_form"><br></td></tr>
					<tr><td id="label_form" align="center">Supplier</td></tr>
					<tr><td align="center"><input id="txt_referensi_filter" name="txt_referensi_filter" style="width:100px" class="label_input" /></td></tr>
					<tr><td id="label_form"><br></td></tr>
					<tr><td id="label_form" align="center">Status</td></tr>
					<tr><td align="center">
						<label id="label_form"><input type="radio" name="rd_status" id="rd_belum_approve" value="0" checked> Belum <?=$label?></label><br>
						<label id="label_form"><input type="radio" name="rd_status" id="rd_sudah_approve" value="1"> Sudah <?=$label?></label>
					</td></tr>
					<tr><td align="center"><a id="btn_search"  class="easyui-linkbutton" data-options="iconCls:'icon-search', plain:false" onclick="filter_data()">Tampilkan Data</a></td></tr>
				</table>
			</div>
			<div data-options="region:'center',">
				<table id="table_data"></table>
			</div>
		</div>	
	</div>	
</div>

<div id="form_input">
	<input type="hidden" id="mode" name="mode">
	<input type="hidden" id="data_detail" name="data_detail">
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
				<a  class="easyui-linkbutton" iconCls="icon-save" id='btn_ubah_perusahaan' onclick="javascript:batal_trans()">Batal</a>
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

$(document).ready(function(){
	create_form_login();
	buat_table();
	browse_filter_departemen('#txt_departemen_referensi_filter', 'Departemen');
	// browse_filter_rincianbiaya('#txt_rincian_referensi_filter', 'Rincian');
	browse_filter_user('#txt_nama_referensi_filter', 'User');
	$("#btn_batal_approve").add($("#btn_approve")).linkbutton('disable');
	$("#btn_ubah").linkbutton('enable');
	$("#txt_tgl_aw_filter").datebox('setValue', getDateMinusDays(2));

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
				export_excel('Faktur Approve Tanda Terima', $("#area_cetak").html());
				return false;
			}
		}]
	}).window('close');

	$("#form_input").dialog({
		onOpen: function() {
			$('#form_input').form('clear');
		},
		buttons: '#dlg-buttons',
	}).dialog('close');
	
	$("#alasan_pembatalan").dialog({
		onOpen: function() {
			$('#alasan_pembatalan').form('clear');
		},
		buttons: '#alasan_pembatalan-buttons',
	}).dialog('close');

	$('[name=rd_status]').change( function() {
		refresh_data();
	});
	
    tutupLoader();
});

/*==================== FUNGSI YG BERHUBUNGAN DG INFORMASI HEADER ===================*/
$("#btn_refresh").click( function() {
	refresh_data();
});
shortcut.add('F2', function() {
	before_add();
});
shortcut.add('F8', function() {
	simpan();
});

function before_approve() {
	$('#mode').val('approve');
	get_akses_user('<?= $kodemenu ?>', 'bearer {{ session('TOKEN') }}', function(data) {
		var UT = data.data.tambah;
		if (UT == 1) {
			$.messager.confirm('Confirm', 'Anda Yakin Akan Approve Transaksi?', async function(r) {
			if (r){
				await approve();
			}
		});
		} else {
			$.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
		}
	});
}

function before_cancel_approve() {
	$('#mode').val('batal_approve');
	get_akses_user('<?= $kodemenu ?>', 'bearer {{ session('TOKEN') }}', function(data) {
		var UT = data.data.hapus;
		if (UT == 1) {
			$.messager.confirm('Confirm', 'Anda Yakin Akan Batalkan Approve Transaksi?', async function(r) {
			if (r) {
				await batal_approve();
			}
		});
		} else {
			$.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
		}
	});
}

var idTrans = "";
function verify() {
	var mode = $("#mode").val();
	var link = "atena/Keuangan/Transaksi/TandaTerima/approve";
	if(mode == 'batal_approve'){
		link = "atena/Keuangan/Transaksi/TandaTerima/batalApprove";
	}
	$('#data_detail').val(JSON.stringify($('#table_data').datagrid('getChecked')));

	var datanya = $("#form_input :input").serialize();
	var isValid = $('#form_input').form('validate');
	
	if (isValid && (mode == 'approve'|| mode == 'batal_approve')) {
		verifyuser = $('[name=verifyuser]').val();
		$.ajax({
			type	: 'POST',
			url		: base_url+'Fingerprint/verifySimpan',
			data	: datanya+"&VERIFYUSER="+verifyuser+"&LINK=" + link,
			dataType: 'json',
			success : function(msg) {
				if (msg.success) {
					$("#btn_batal_approve").linkbutton('disable');
					$("#btn_approve").linkbutton('disable');
					$("#btn_ubah").linkbutton('enable');
					idTrans = msg.idTrans;
					//buka window flexcode
					location.href = msg.link;
					Server.connect();
				}
			}
		});
	}
}

function ubah() {
	if ($("[name='rd_status']:checked").val() == 0){
		$("#btn_batal_approve").linkbutton('disable');
		$("#btn_approve").linkbutton('enable');
	} else {
		$("#btn_batal_approve").linkbutton('enable');
		$("#btn_approve").linkbutton('disable');
	}
	
	$("#btn_ubah").linkbutton('disable');
}

async function approve() {
	var mode = $("#mode").val();

	var data_detail = $('#table_data').datagrid('getChecked')

	var datanya = $("#form_input :input").serialize();
	var isValid = $('#form_input').form('validate');
	if (isValid && mode=='approve') {
		const response = await fetchData(
			'{{ session('TOKEN') }}',
			link_api.approveTandaTerima, {
				jenis : '{{ $jenis }}',
				data_detail : data_detail
			}
		);
		if(response.success) {
			$.messager.alert('Info','Transaksi Sukses','info');
			refresh_data();
		} else {
			$.messager.alert('Error', response.message, 'error');
		}
	}
}

async function batal_approve() {
	var mode = $("#mode").val();

	var data_detail = $('#table_data').datagrid('getChecked')

	var datanya = $("#form_input :input").serialize();
	var isValid = $('#form_input').form('validate');
	if (isValid && mode == 'batal_approve') {
		const response = await fetchData(
			'{{ session('TOKEN') }}',
			link_api.batalApproveTandaTerima, {
				jenis : '{{ $jenis }}',
				data_detail : data_detail
			}
		);
		if(response.success) {
			$.messager.alert('Info','Transaksi Sukses','info');
			refresh_data();
		} else {
			$.messager.alert('Error', response.message, 'error');
		}
	}
}

function browse_filter_user(id, table) {
	$(id).combogrid({
		panelWidth: 330,
		mode	  : 'remote',
		idField	  : 'uuiduser',
		textField : 'username',
		sortName  : 'urutan',
		sortOrder : 'asc',
		url		  : link_api.browseUser,
		columns	  : [[
			{field:'uuiduser',hidden:true},		
			{field:'userid',title:'User ID',width:100},		
			{field:'username',title:'Username',width:200},		
		]]
	});
}
function browse_filter_departemen(id, table) {
	$(id).combogrid({
		panelWidth: 530,
		mode	  : 'remote',
		idField	  : 'uuiddepartemen',
		textField : 'nama',
		sortName  : 'urutan',
		sortOrder : 'asc',
		url		  : link_api.browseDataDepartemenKerja,
		columns	  : [[
			{field:'uuiddepartemen',hidden:true},		
			{field:'kode',title:'Kode',width:100},		
			{field:'nama',title:'Nama',width:200},		
			{field:'catatan',title:'Keterangan',width:200},		
		]],
		onChange: function(newVal, oldVal) {
			var row = $(this).combogrid('grid').datagrid('getSelected');

			if (row) {
				// var url = base_url+'atena/Master/Data/RincianBiaya/comboGrid/'+ row.id;
				// ubah_url_combogrid($('#txt_rincian_referensi_filter'), url, true);
			}
		}
	});
}

function browse_filter_rincianbiaya(id, table) {
	$(id).combogrid({
		panelWidth:530,
		mode	  : 'remote',
		idField	  : 'id',
		textField : 'nama',
		sortName  : 'urutan',
		sortOrder : 'asc',
		columns	  : [[
			{field:'id',hidden:true},		
			{field:'kode',title:'Kode',width:100},		
			{field:'nama',title:'Nama',width:200},		
			{field:'catatan',title:'Keterangan',width:200},		
			
		]]
	});
}

function refresh_data() {
	$('#table_data').datagrid('loadData', []);
	$("#btn_batal_approve").add($("#btn_approve")).linkbutton('disable');
	$("#btn_ubah").linkbutton('enable');
	clear_plugin();
}

function filter_data() {
	$("#btn_ubah").linkbutton('enable');
	$("#btn_batal_approve").add($("#btn_approve")).linkbutton('disable');
	
	$('#table_data').datagrid('load',{
		tglawal: $('#txt_tgl_aw_filter').datebox('getValue'),
		tglakhir: $('#txt_tgl_ak_filter').datebox('getValue'),
		kodetrans: $('#txt_kodetrans_filter').val(),
		referensi: $('#txt_referensi_filter').val(),
		status:$('[name=rd_status]:checked').val(),
        jenis: '{{ $jenis }}',
	});
}

/* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */
function buat_table() {
	$("#table_data").datagrid({
		fit			 : true,
		clickToEdit  : false,
		singleSelect : true,
		remoteSort	 : false,
		multiSort	 : true,
		striped		 : true,
		rownumbers	 : true,
		checkOnSelect: false,
		selectOnCheck: false,
		url         : link_api.loadDataGridApproveTandaTerima,
        queryParams     : {
            jenis: '{{ $jenis }}',
        },
		pageSize    : 20,
		pagination  : true,
		clientPaging: false,
        rowStyler   : function(index, row) {
            if (row.status == 'S') return 'background-color:{{ session('WARNA_STATUS_S') }}';
            else if (row.status == 'P') return 'background-color:{{ session('WARNA_STATUS_P') }}';
            else if (row.status == 'D') return 'background-color:{{ session('WARNA_STATUS_D') }}';
        },
		frozenColumns:[[
			{field:'cb',title:'',checkbox:true,align:'center'},
			{field:'tgltrans',title:'Tgl. Trans',width:70,sortable:true,formatter:ubah_tgl_indo, align:'center',},
			{field:'kodetandaterima',title:'No. Trans',width:120,sortable:true},
			{field:'namasupplier',title:'Supplier',width:110,sortable:true},
			{field:'grandtotal',title:'Grand Total',width:110,sortable:true,align:'right',formatter:format_amount},
		]],
		columns:[[
			{field:'',title:'Approve', sortable:true,colspan:2},
			{field:'',title:'Reject', sortable:true,colspan:2},
			{field:'keterangan',title:'Keterangan',width:300, sortable:true,editor:{type:"validatebox"},rowspan:2},
			{field:'userbuat',title:'User Entry',width:120, sortable:true,rowspan:2},
			{field:'tglentry',title:'Tgl Input',width:120, sortable:true, formatter:ubah_tgl_indo, align:'center',rowspan:2},
			{field:'status',title:'Status',width:50,sortable:true,align:'center',rowspan:2},
		], [
			{field:'userapprove',title:'User',width:100, sortable:true},
			{field:'tglapprove',title:'Tanggal',width:85, sortable:true, formatter:ubah_tgl_indo, align:'center',},
			{field:'userreject',title:'User',width:100, sortable:true},
			{field:'tglreject',title:'Tanggal',width:85, sortable:true, formatter:ubah_tgl_indo, align:'center',},
		]],
	}).datagrid('enableCellEditing');
}
function clear_plugin() {
	$('.combogrid-f').each( function() {
		$(this).combogrid('grid').datagrid('load', {q:''});
	});
	
	$('.number').numberbox('setValue', 0);
}
</script>
@endpush
