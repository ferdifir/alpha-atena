@extends('template.form')

@section('content')
<div id="form_input" class="easyui-layout" fit="true">
	<div data-options="region:'center',border:false">
		<div class="easyui-layout" fit="true" >
			<div data-options="region:'center',border:false ">
				<div class="easyui-layout" style="height:100%" id="trans_layout">
					<div data-options="region:'north',border:false" style="width:100%; height:210px;">
						<div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>
						<input type="hidden" id="mode" name="mode">
						<input type="hidden" id="UUIDTANDATERIMA" name="uuidtandaterima">
						<table width="100%">
							<tr>
								<td>
									<table>
										<tr>
											<td valign="top">
												<table border="0" style="padding:2px">
													<tr>
														<td id="label_form">No Tanda Terima</td>
														<td id="label_form"><input id="KODETANDATERIMA" name="kodetandaterima" class="label_input" style="width:190px" validType='length[0,30]' readonly></td>
													</tr>
													<tr>
														<td id="label_form">Lokasi</td>
														<td id="label_form">
															<input name="uuidlokasi" id="UUIDLOKASI" style="width:190px">
															<input type="hidden" name="kodelokasi" id="KODELOKASI">
															<input type="checkbox" name="pakaifilterlokasi" id="PAKAIFILTERLOKASI" value="1"> Gunakan lokasi sebagai filter data
														</td>
													</tr>
													<tr>
														<td id="label_form">Tgl. Trans</td>
														<td id="label_form"><input id="TGLTRANS" name="tgltrans" class="date" style="width:100px" /></td>
													</tr>
													<tr>
														<td id="label_form">Supplier</td>
														<td id="label_form"><input id="UUIDSUPPLIER" name="uuidsupplier" class="label_input" style="width:300px" required="true"></td>
													</tr>
													<tr>
														<td valign="top" id="label_form">Keterangan</td>
														<td valign="top" id="label_form"><textarea rows="3" name="keterangan" class="label_input" id="KETERANGAN" multiline="true" style="width:300px; height:50px" validType='length[0,300]' ></textarea></td>
													</tr>
													<tr>
														<td id="label_form">Kelengkapan</td>
														<td>
															<label id="label_form"><input type="checkbox" class="cb-lengkap" id="CBINVOICEASLI" name="cbinvoiceasli" value="1" required="true"> Invoice Asli</label>
															<label id="label_form"><input type="checkbox" class="cb-lengkap" id="CBMATERAI" name="cbmaterai" value="1" required="true"> Materai</label>
															<label id="label_form"><input type="checkbox" class="cb-lengkap" id="CBKOPIPO" name="cbkopipo" value="1" required="true"> Fotokopi PO</label>
															<label id="label_form"><input type="checkbox" class="cb-lengkap" id="CBSURATJALAN" name="cbsuratjalan" value="1" required="true"> Surat Jalan</label>
															<label id="label_form"><input type="checkbox" class="cb-lengkap" id="CBPAJAK" name="cbpajak" value="1" required="true"> No Faktur Pajak</label>
														</td>
													</tr>
												</table>
											</tr>
									</table>
								</td>
							</tr>
						</table>	
					</div>
					<div data-options="region:'center',border:false" >
						<div class="easyui-tabs"  plain='true' fit="true" >
							<div title="Hutang">
								<table id="table_data_hutang" fit="true"></table>
							</div>
							<div title="Uang Muka">
								<table id="table_data_uang_muka" fit="true"></table>
							</div>
						</div>
					</div>
					<input type="hidden" id="data_uang_muka" name="data_uang_muka">
					<input type="hidden" id="data_hutang" name="data_hutang">
											
					<div data-options="region:'south',border:false" style="width:100%; height:35px;">
						<table id="trans_footer" width="100%">
							<tr>
								<td colspan="2">
									<table cellpadding="0" cellspacing="0" >
										<tr>
										<td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl. Input :</label> <label id="lbl_tanggal"></label></td>
										</tr>
									</table>
								</td>
								<td align="right">
									<div style="margin-top:5px; margin-bottom:2px">
										Total Nota <input id="totalNota" style="width:70px" precision="0" class="number noDecimal" readonly>
										Total Nominal <input id="totalAmount" style="width:120px" class="number" readonly>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
        <br>

        <a  title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false" id='btn_simpan_modal' onclick="$('#window_button_simpan').window('open')"><img src="{{ asset('assets/images/simpan.png') }}"></a>


        <br><br>
        <a  title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false" onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
    </div>	
</div>

<div id="window_button_simpan" class="easyui-window" title="Konfirmasi" data-options="modal:true,closed:true" style="height:164cm;padding:15px 10px 10px 10px;top:20px">
    <center>
    <div id="button_simpan">

        <a  title="Simpan" class="easyui-linkbutton button_add" id='simpan_saja' onclick="simpan(this.id)" style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan</a><br><br>
        <a  title="Simpan & Cetak" class="easyui-linkbutton button_add_print"  id='simpan_cetak' onclick="simpan(this.id)" style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan & Cetak</a>

    <div>
    </center>
</div>

<div id="form_cetak" title="Preview" style="width:350px; height:500px">
    <div id="area_cetak"></div>
<div>
@endsection

@push('js')
<script src="{{ asset('assets/js/utils.js') }}"></script>
<script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
<script>
var cekbtnsimpan = true; //CEK APAKAH TOMBOL SIMPAN BISA DITEKAN ATAU BELUM (SUPAYA TIDAK TERKLIK 2x)
var idtrans = "";
var row = {};
$(document).ready(async function(){

	await getConfigMenu()
	
	//TAMBAH CHECK AKSES CETAK
	get_akses_user('<?= $kodemenu ?>', 'bearer {{ session('TOKEN') }}', async function(data) {
		var UT = data.data.cetak;
		if (UT == 1){
			$('#simpan_cetak').css('filter', '');
		} else {
			$('#simpan_cetak').css('filter', 'grayscale(100%)');$('#simpan_cetak').removeAttr('onclick');
		}
	})	
	
	$("#form_cetak").window({
		collapsible: false,
        minimizable: false,
		tools: [{
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

	var lebar       = $('.panel').width();
	var tabsimpan   = 50;
    var modalsimpan = 174;
    var spasi       = 10;

    var left = lebar - (tabsimpan+modalsimpan) + spasi;

    $("#window_button_simpan").css({"width" : modalsimpan});

    $("#window_button_simpan").window({
        collapsible: false,
        minimizable: false,
        maximizable: false,
        resizable  : true,
        draggable  : true,
        left       : left
    });
	
	
	browse_data_supplier('#UUIDSUPPLIER')
	browse_data_lokasi('#UUIDLOKASI');

	buat_table_uang_muka();
	buat_table_hutang();
	
	@if ($mode == 'tambah')
		await tambah();
	@elseif ($mode == 'ubah')
		await ubah();
	@endif
	
	tutupLoader()
	
})

shortcut.add('F8', async function() {
	await simpan();
});

function tutup(){
	parent.tutupTab();
}

async function cetak(uuid) {
  const doc = await getCetakDocument(
		'{{ session('TOKEN') }}',
		link_api.cetakTandaTerima + uuid
	);
	if (doc == null) {
		$.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data cetak transaksi',
			'warning');
		return false;
	}
	$("#area_cetak").html(doc);
	$("#form_cetak").window('open');
}

async function tambah() {
	$('#form_input').form('clear');
	$('#mode').val('tambah');

	$('#PAKAIFILTERLOKASI').prop('checked', true);

	$('#lbl_kasir, #lbl_tanggal').html('');

	clear_plugin();
	reset_detail();
}

async function ubah() {
	$('#mode').val('ubah');

	const response = await fetchData(
		'{{ session('TOKEN') }}',
		link_api.loadDataHeaderTandaTerima, {
		uuidtandaterima: '{{ $data }}'
		}
	);
	if(response.success) {
		row = response.data;
	} else {
		$.messager.alert('Error', response.message, 'error');
	}
	
	if (row) {
		get_akses_user('<?= $kodemenu ?>', 'bearer {{ session('TOKEN') }}', async function(data) {
			var UT = data.data.ubah;

			get_status_trans('{{ session("TOKEN") }}', "atena/keuangan/tanda-terima", "uuidtandaterima", row.uuidtandaterima, async function(data) {
				$(".form_status").html(status_transaksi(data.data.status));
				if (UT == 1 && data.data.status == 'I') {
					$('#btn_simpan_modal').css('filter', '');
					$('#mode').val('ubah');
				} else {
					$('#btn_simpan_modal').css('filter', 'grayscale(100%)');$('#btn_simpan_modal').removeAttr('onclick');
				}
				
				$('#form_input').form('load', row);

				$('#UUIDLOKASI').combogrid('readonly', true);

				$('#UUIDSUPPLIER').combogrid('setValue',{uuidsupplier:row.uuidsupplier, nama:row.namasupplier});
				$('#UUIDLOKASI').combogrid('setValue',{uuidlokasi:row.uuidlokasi, nama:row.namalokasi});

				await load_data(row.uuidtandaterima);

				$('#lbl_kasir').html(row.userbuat);
				$('#lbl_tanggal').html(row.tglentry);
			});
		});
	}
}

async function simpan(jenis_simpan) {
	var isValid = true;

	$('.cb-lengkap').each( function(i) {
		if ($(this).prop('checked') == false) {
			isValid = false;
		}
	});

	$('#window_button_simpan').window('close');

	if (!isValid) {
		$.messager.alert('Warning','Kelengkapan Dokumen Harus dilengkapi semua','warning');
		return false;
	}

	isValid = $('#form_input').form('validate');

	var rowHutang = $('#table_data_hutang').datagrid('getChecked');
	if (rowHutang)
		$('#data_hutang').val(JSON.stringify(rowHutang));

	var rowUangMuka = $('#table_data_uang_muka').datagrid('getChecked');
	if (rowUangMuka)
		$('#data_uang_muka').val(JSON.stringify(rowUangMuka));
	

	var mode    = $("#mode").val();
	var datanya = $("#form_input :input").serialize();
	
	
	if($('#table_data_hutang').datagrid('getChecked').length > 20)
	{
		isValid = false;
		$.messager.alert('Warning','Jumlah Tagihan Hutang Tidak Boleh Lebih Dari 20 Tagihan','warning');
	}

	if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
		cekbtnsimpan = false;
		tampilLoaderSimpan();

		try {
			let headers = {
					'Authorization': 'bearer {{ session('TOKEN') }}',
					'Content-Type': 'application/json'
			};

			var requestBody = {};

			$('#form_input :input').each(function() {
					if (this.name) {
							requestBody[this.name] = $(this).val();
					}
			});

			requestBody.data_hutang    = rowHutang;
			requestBody.data_uang_muka = rowUangMuka;

			requestBody.jenis_simpan = jenis_simpan;

			let url = link_api.simpanTandaTerima;
			const response = await fetch(url, {
				method: 'POST',
				headers: headers,
				body: JSON.stringify(requestBody)
			}).then(response => {
				if (!response.ok) {
						throw new Error(`HTTP error! status: ${response.status} from ${url}`);
				}
				return response.json();
			});

			if (response.success) {
				$('#form_input').form('clear');

				$.messager.show({
						title: 'Info',
						msg: 'Transaksi Sukses',
						showType: 'show'
				});

				if (mode == "tambah") {
						await tambah();
						$('#table_data_hutang').datagrid('loadData', []);
						$('#table_data_uang_muka').datagrid('loadData', []);
				} else {
						await ubah();
				}

				if (jenis_simpan == 'simpan_cetak') {
						await cetak(response.data.uuidpelunasan);
				}
			} else {
					$.messager.alert('Error', response.message, 'error');
			}

		} catch (error) {
				var textError = getTextError(error);
				$.messager.alert('Error', getTextError(error), 'error');
		}

		cekbtnsimpan = true;
		tutupLoaderSimpan();
	}	
}

function reset_detail() {
	$('#table_data_hutang').datagrid('loadData', []);
	$('#table_data_uang_muka').datagrid('loadData', []);
}

function hitungTotal() {
	var row         = $('#table_data_hutang').datagrid('getChecked');
	var ln          = row.length;
	var totalamount = 0;
	var totalnota   = ln;

	for (var i = 0; i < ln; i++) {
		totalamount += parseFloat(row[i].amount);
	}

	row = $('#table_data_uang_muka').datagrid('getChecked');

	ln = row.length;
	totalnota += ln;

	for (var i = 0; i < ln; i++) {
		totalamount += parseFloat(row[i].amount);
	}

	$('#totalAmount').numberbox('setValue', totalamount)
	$('#totalNota').numberbox('setValue', totalnota)
}

async function load_data(uuidtandaterima) {
	try {
		const response = await fetchData(
			'{{ session('TOKEN') }}',
			link_api.loadDataTandaTerima, {
				uuidtandaterima: uuidtandaterima,
			}
		);
		if(response.success) {
			var msg = response.data
			$('#table_data_hutang').datagrid('loadData', msg.detail_hutang).datagrid('checkAll');
			$('#table_data_uang_muka').datagrid('loadData', msg.detail_uang_muka).datagrid('checkAll');

			hitungTotal();
		} else {
			$.messager.alert('Error', response.message, 'error');
		}
	} catch (e) {
		const error = typeof e === "string" ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
	}
}

/* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */

function buat_table_hutang() {
	var dg = '#table_data_hutang';
	$(dg).datagrid({
		RowAdd        : false,
		RowDelete     : false,
		singleSelect  : true,
		striped       : true,
		rownumbers    : true,
		showFooter    : true,
		checkOnSelect : false,
		selectOnCheck : false,
		clickToEdit   : false,
		dblclickToEdit: true,
		data          : [],
		frozenColumns: [[
			{field:'ck',checkbox:true,},
			{field:'tgl',title:'Tgl. Trans',width:90,sortable:true,formatter:ubah_tgl_indo, align:'center',},
			{field:'idtrans',title:'ID. Trans',width:120,sortable:true, hidden:true},
			{field:'kodetrans',title:'No. Trans',width:120,sortable:true},
			{field:'noinvoicesupplier',title:'No Inv Supplier',width:120,sortable:true},
		]],
		columns: [[
			{field:'jenis',title:'Jenis',width:100,sortable:true},
			{field:'amount',title:'Nominal',width:110,sortable:true,formatter:format_amount, align:'right', editor:{type:'numberbox', options:{required:true}},},
			{field:'keterangan',title:'Keterangan',width:300,sortable:true},
		]],
		onCheckAll: function(rows) {
			if ($('#mode').val() != '') {
				hitungTotal();
			}
		},
		onUncheckAll: function(rows) {
			if ($('#mode').val() != '') {
				hitungTotal();
			}
		},
		onCheck: function(index, row) {
			if ($('#mode').val() != '') {
				hitungTotal();
			}
		},
		onUncheck: function(index, row) {
			if ($('#mode').val() != '') {
				hitungTotal();
			}
		},
		onLoadSuccess: function(data) {
			if ($('#mode').val() != '') {
				hitungTotal();
			}
		},
		onAfterEdit:function(index,row,changes){
			if (changes.amount) {
				var msg 	  = '';
				var sisa 	  = parseFloat(row.amount2);
				var pelunasan = parseFloat(changes.amount);

				if ((sisa > 0 && pelunasan > sisa) ||
					(sisa < 0 && pelunasan < sisa)) {
					// pelunasan tidak boleh lebih besar dari sisa
					changes.amount = sisa;
					msg = 'Nominal Tidak Boleh Lebih Besar';
				} else if (sisa > 0 && pelunasan < 0) {
					changes.amount = 0;
					msg = 'Isi Nominal Sesuai Dengan Data';
				}

				if (msg != '') {
					$(this).datagrid('updateRow', {index: index, row: changes});

					$.messager.show({
						title  : 'Warning',
						msg    : msg,
						timeout: 1000,
					});
				}

				hitungTotal();
			}
		}
	}).datagrid('enableCellEditing'); //.datagrid('enableFilter')
}

function buat_table_uang_muka() {
	var dg = '#table_data_uang_muka';
	$(dg).datagrid({
		RowAdd        : false,
		RowDelete     : false,
		singleSelect  : true,
		striped       : true,
		rownumbers    : true,
		showFooter    : true,
		checkOnSelect : false,
		selectOnCheck : false,
		clickToEdit   : false,
		dblclickToEdit: true,
		data          : [],
		frozenColumns : [[
			{field:'ck',checkbox:true,},
			{field:'tgl',title:'Tgl. Trans',width:90,sortable:true,formatter:ubah_tgl_indo, align:'center',},
			{field:'idtrans',title:'ID. Trans',width:120,sortable:true, hidden:true},
			{field:'kodetrans',title:'No. Trans',width:120,sortable:true},
		]],
		columns: [[
			{field:'jenis',title:'Jenis',width:100,sortable:true},
			{field:'amount',title:'Nominal',width:110,sortable:true,formatter:format_amount, align:'right', editor:{type:'numberbox', options:{required:true,min:0}},},
			{field:'keterangan',title:'Keterangan',width:300,sortable:true},
		]],
		onCheckAll: function(rows) {
			if ($('#mode').val() != '') {
				hitungTotal();
			}
		},
		onUncheckAll: function(rows) {
			if ($('#mode').val() != '') {
				hitungTotal();
			}
		},
		onCheck: function(index, row) {
			if ($('#mode').val() != '') {
				hitungTotal();
			}
		},
		onUncheck: function(index, row) {
			if ($('#mode').val() != '') {
				hitungTotal();
			}
		},
		onLoadSuccess: function(data) {
			if ($('#mode').val() != '') {
				hitungTotal();
			}
		},
		onAfterEdit:function(index,row,changes){
			if (changes.amount) {
				var msg 	  = '';
				var sisa      = parseFloat(row.amount2);
				var pelunasan = parseFloat(changes.amount);

				if ((sisa > 0 && pelunasan > sisa) ||
					(sisa < 0 && pelunasan < sisa)) {
					// pelunasan tidak boleh lebih besar dari sisa
					changes.amount = sisa;
					msg = 'Nominal Tidak Boleh Lebih Besar';
				} else if (sisa > 0 && pelunasan < 0) {
					changes.amount = 0;
					msg = 'Isi Nominal Sesuai Dengan Data';
				}

				if (msg != '') {
					$(this).datagrid('updateRow', {index: index, row: changes});

					$.messager.show({
						title  : 'Warning',
						msg    : msg,
						timeout: 1000,
					});
				}

				hitungTotal();
			}
		}
	}).datagrid('enableCellEditing'); //.datagrid('enableFilter')
}

function clear_plugin() {
	$('.combogrid-f').each(function(){
		$(this).combogrid('grid').datagrid('load', {q:''});
	});

	$("#TGLTRANS").datebox('setValue', date_format());

	$('.number').numberbox('setValue', 0)
}

function browse_data_supplier(id) {
	$(id).combogrid({
		panelWidth: 370,
		url       : link_api.browseSupplier,
		idField   : 'uuidsupplier',
		textField : 'nama',
		mode      : 'remote',
		columns   : [[
			{field:'kode',title:'Kode',width:70, sortable:true},
			{field:'nama',title:'Nama',width:270, sortable:true}
		]],
		onChange : async function(newVal, oldVal) {
			var row               = $(this).combogrid('grid').datagrid('getSelected');
			var mode              = $('#mode').val();
			var uuidlokasi        = $('#UUIDLOKASI').combogrid('getValue');
			var pakaifilterlokasi = $('#PAKAIFILTERLOKASI').prop('checked');

			if (pakaifilterlokasi && uuidlokasi == '') {
				$.messager.alert('Peringatan', 'Lokasi belum dipilih', 'warning');

				$(id).combogrid('clear');

				return false;
			}
				
			if(row){
				if (mode == 'tambah') {
					try {
						const response = await fetchData(
							'{{ session('TOKEN') }}',
							link_api.loadHutangUangMukaTandaTerima, {
								uuidsupplier         : row.uuidsupplier,
								uuidlokasi           : uuidlokasi,
								gunakan_filter_lokasi: pakaifilterlokasi
							}
						);
						if(response.success) {
							var msg = response.data
							$('#table_data_hutang').datagrid('loadData', msg.detail_hutang);
							$('#table_data_uang_muka').datagrid('loadData', msg.detail_uang_muka);
						} else {
							$.messager.alert('Error', response.message, 'error');
						}
					} catch (e) {
						const error = typeof e === "string" ? e : e.message;
								const textError = getTextError(error);
								$.messager.alert('Error', textError, 'error');
					}
					// $.ajax({
					// 	type    : 'POST',
					// 	dataType: 'json',
					// 	url     : base_url+"atena/Keuangan/Transaksi/TandaTerima/getHutangUangMuka",
					// 	data    : {
					// 		uuidsupplier         : row.uuidsupplier,
					// 		uuidlokasi           : uuidlokasi,
					// 		gunakan_filter_lokasi: pakaifilterlokasi
					// 	},
					// 	cache   : false,
					// 	success : function(msg) {
					// 		if (msg.success){
					// 			$('#table_data_hutang').datagrid('loadData', msg.detail_hutang);
					// 			$('#table_data_uang_muka').datagrid('loadData', msg.detail_uang_muka);
					// 		}
					// 	}
					// });
				} else if (mode == 'ubah') {

				}
			}
		}
	});
}

function browse_data_lokasi(id) {
	$(id).combogrid({
		panelWidth    : 380,
		url           : link_api.browseLokasi,
		idField       : 'uuidlokasi',
		textField     : 'nama',
		mode          : 'local',
		sortName      : 'nama',
		sortOrder     : 'asc',
		required      : true,
		selectFirstRow: true,
		columns       : [[
			{field:'uuidlokasi',hidden:true},
			{field:'kode',title:'Kode',width:150, sortable:true},
			{field:'nama',title:'Nama',width:200, sortable:true},
		]],
		onSelect: function(index, row) {
			$("#KODELOKASI").val(row.kode);	
		},
	});
}

async function getConfigMenu() {
	try {
	const res = await fetchData(
		'{{ session('TOKEN') }}', link_api.loadConfigTagihanPelanggan, {
		kodemenu: '{{ $kodemenu }}'
		}
	);
	if (res.success) {
    // KODE
	if (res.data.KODE == "AUTO") {
      $('#KODETANDATERIMA').textbox({
				prompt: "Auto Generate",
				readonly: true,
				required: false
			});
		} else {
			$('#KODETANDATERIMA').textbox({
				prompt: "",
				readonly: false,
				required: true
			});
			$('#KODETANDATERIMA').textbox('clear').textbox('textbox').focus();
		}
	} else {
		throw new Error(res.message);
	}
	} catch (e) {
	const error = typeof e === 'string' ? e : e.message;
	const textError = getTextError(error);
	$.messager.alert('Error', textError, 'error');
	}
}
</script>
@endpush
