@extends('template.form')

@section('content')
<div id="form_input" class="easyui-layout" fit="true">
	<div data-options="region:'center',border:false">
		<div class="easyui-layout" fit="true" >
			<div data-options="region:'center',border:false ">
				<div class="easyui-layout" style="height:100%" id="trans_layout" >
					<script>
						if(screen.height < 450) $("#trans_layout").css('height',"450px");
					</script>
					<div data-options="region:'north',border:false" style="width:100%; height:250px;">
						<div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;" ></div>
						<input type="hidden" id="mode" name="mode">
						<input type="hidden" id="UUIDTAGIHAN" name="uuidtagihan">
						<table width="100%">
							<tr>
								<td>
									<table>
										<tr>
											<td valign="top">
												<table border="0" style="padding:2px">
													<tr>
														<td id="label_form">No Tagihan</td>
														<td id="label_form"><input id="KODETAGIHAN" name="kodetagihan" class="label_input" style="width:190px" validType='length[0,30]' prompt="Auto Generate" readonly></td>
													</tr>
													<tr>
														<td id="label_form">Tgl. Trans
														<td id="label_form"><input id="TGLTRANS" name="tgltrans" class="date" style="width:100px"/></td>
													</tr>
													<tr>
														<td id="label_form">Tgl. Jth Tempo</td>
														<td id="label_form"><input id="TGLJATUHTEMPO" name="tgljatuhtempo" class="date" style="width:100px"/></td>
													</tr>
													<tr>
														<td id="label_form">Lokasi</td>
														<td id="label_form">
															<input name="uuidlokasi" id="UUIDLOKASI" style="width:190px">
															<input type="hidden" name="kodelokasi" id="KODELOKASI">
															<br>
															<input type="checkbox" name="pakaifilterlokasi" id="PAKAIFILTERLOKASI" value="1"> Gunakan lokasi sebagai filter data piutang
														</td>
													</tr>
													<tr>
														<td id="label_form">Customer</td>
														<td id="label_form"><input id="UUIDCUSTOMER" name="uuidcustomer" class="label_input" style="width:190px" required="true"></td>
													</tr>
													<tr>
														<td id="label_form">Karyawan</td>
														<td id="label_form"><input id="UUIDKARYAWAN" name="uuidkaryawan" class="label_input" style="width:190px" required="true"></td>
													</tr>
													<tr>
														<td valign="top" id="label_form">Keterangan</td>
														<td valign="top" id="label_form"><textarea rows="3" name="keterangan" class="label_input" id="KETERANGAN" multiline="true" style="width:300px; height:50px" validType='length[0,300]' ></textarea></td>
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
							<div title="Piutang">
								<table id="table_data_piutang" fit="true"></table>
							</div>
							<div title="Uang Muka" hidden>
								<table id="table_data_uang_muka" fit="true"></table>
							</div>
						</div>
					</div>
					<input type="hidden" id="data_piutang" name="data_piutang">
					<input type="hidden" id="data_uang_muka" name="data_uang_muka">
					<div data-options="region:'south',border:false" style="width:100%; height:60px;">
						<table id="trans_footer" width="100%">
							<tr>
								<td>
									<div style="margin-top:5px; margin-bottom:2px">
										Total Nota <input id="totalNota" style="width:70px" precision="0" class="number noDecimal" readonly>
										Total Nominal <input id="totalAmount" style="width:120px" class="number" readonly>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<table cellpadding="0" cellspacing="0" >
										<tr>
											<td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl. Input :</label> <label id="lbl_tanggal"></label></td>
										</tr>
									</table>
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

<div id="form_cetak" title="Preview" style="width:660px; height:500px">
    <div id="area_cetak"></div>
<div>
@endsection

@push('js')
<script src="{{ asset('assets/js/utils.js') }}"></script>
<script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
<script>
var cekbtnsimpan = true;  //CEK APAKAH TOMBOL SIMPAN BISA DITEKAN ATAU BELUM (SUPAYA TIDAK TERKLIK 2x)
var idtrans      = "";
var row          = {};
var inputharga;
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
	}, false);

	$("#form_cetak").window({
		collapsible: false,
        minimizable: false,
		tools: [{
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
				export_excel('Faktur Tagihan Piutang', $("#area_cetak").html());
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

	$('#UUIDCUSTOMER').combogrid({
		panelWidth: 550,
		url       : link_api.browseCustomer,
		idField   : 'uuidcustomer',
		textField : 'nama',
		mode      : 'remote',
		columns   : [[
			{field:'kode',title:'Kode',width:70, sortable:true},
			{field:'nama',title:'Nama',width:200, sortable:true},
			{field:'alamat',title:'Alamat',width:250, sortable:true},
		]],
		onChange: function(newVal, oldVal) {
			var row  = $(this).combogrid('grid').datagrid('getSelected');
      var mode = $('#mode').val();
			if(row){
				if (mode == 'tambah') {
					tampil_piutang();
				} else if (mode == 'ubah') {

				}
			}
		}
	});

	$('#UUIDKARYAWAN').combogrid({
		panelWidth: 550,
		url       : link_api.browseKaryawan,
		idField   : 'uuidkaryawan',
		textField : 'nama',
		mode      : 'remote',
		columns   : [[
			{field:'kode',title:'Kode',width:70, sortable:true},
			{field:'nama',title:'Nama',width:200, sortable:true},
			{field:'alamat',title:'Alamat',width:250, sortable:true},
		]],
	});

	$('#PAKAIFILTERLOKASI').change(function() {
		tampil_piutang();
	})

	browse_data_lokasi('#UUIDLOKASI');

	buat_table_uang_muka();
	buat_table_piutang();

	@if ($mode == 'tambah')
		await tambah();
	@elseif ($mode == 'ubah')
		await ubah();
	@endif

	tutupLoader()

})

shortcut.add('F8', function() {
	simpan();
});

function tutup() {
	parent.tutupTab();
}

async function cetak(uuid) {
  $("#window_button_cetak").window('close');
	var urlcetak = ""
	if('{{ session('KODEPERUSAHAAN') }}' == 'CN0001')
	{
		urlcetak = link_api.cetakF4TagihanPelanggan + uuid
	}
	else
	{
		urlcetak = link_api.cetakTagihanPelanggan + uuid
	}
	const doc = await getCetakDocument(
		'{{ session('TOKEN') }}',
		urlcetak
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
	$('#mode').val('tambah')

	$('#PAKAIFILTERLOKASI').prop('checked', true);

	$('#UUIDLOKASI').combogrid('readonly', false)

	$('#lbl_kasir, #lbl_tanggal').html('');

	clear_plugin();
	reset_detail();
}

async function ubah() {
	$('#mode').val('ubah');

	const response = await fetchData(
		'{{ session('TOKEN') }}',
		link_api.loadDataHeaderTagihanPelanggan, {
		uuidtagihan: '{{ $data }}'
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
			get_status_trans('{{ session("TOKEN") }}', "atena/keuangan/tagihan-pelanggan", "uuidtagihan", row.uuidtagihan, async function(data) {
				$(".form_status").html(status_transaksi(data.data.status));
				if (UT == 1 && data.data.status == 'I') {
					$('#btn_simpan_modal').css('filter', '');
					$('#mode').val('ubah');
				} else {
					document.getElementById('btn_simpan_modal').onclick = '';
					$('#btn_simpan_modal').css('filter', 'grayscale(100%)');$('#btn_simpan_modal').removeAttr('onclick');
				}

				$('#form_input').form('load', row);

				$('#UUIDCUSTOMER').combogrid('setValue',{uuidcustomer:row.uuidcustomer, nama:row.namacustomer});

				$('#UUIDLOKASI').combogrid('readonly')

				$('#UUIDLOKASI').combogrid('setValue', {
					uuidlokasi: row.uuidlokasi,
					nama      : row.namalokasi
				})

				await load_data(row.uuidtagihan);

				$("#txt_tgl_aw").add($("#txt_tgl_ak")).datebox('setValue', date_format());

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

	var rowPiutang = $('#table_data_piutang').datagrid('getChecked');
	if (rowPiutang)
		$('#data_piutang').val(JSON.stringify(rowPiutang));

	var rowUangMuka = $('#table_data_uang_muka').datagrid('getChecked');
	if (rowUangMuka)
		$('#data_uang_muka').val(JSON.stringify(rowUangMuka));

	var mode    = $("#mode").val();
	var datanya = $("#form_input :input").serialize();

	if('{{ session('KODEPERUSAHAAN') }}' == 'CN0001')
	{
		if($('#table_data_piutang').datagrid('getChecked').length > 90)
		{
			isValid = false;
			$.messager.alert('Warning','Jumlah Tagihan Piutang Tidak Boleh Lebih Dari 90 Tagihan','warning');
		}
	}
	else
	{
		if($('#table_data_piutang').datagrid('getChecked').length > 20)
		{
			isValid = false;
			$.messager.alert('Warning','Jumlah Tagihan Piutang Tidak Boleh Lebih Dari 20 Tagihan','warning');
		}
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

			requestBody.data_piutang          = rowPiutang;
			requestBody.data_uang_muka = rowUangMuka;

			requestBody.jenis_simpan = jenis_simpan;

			let url = link_api.simpanTagihanPelanggan;
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
						$('#table_data_piutang').datagrid('loadData', []);
						$('#table_data_uang_muka').datagrid('loadData', []);
				} else {
						await ubah();
				}

				if (jenis_simpan == 'simpan_cetak') {
						await cetak(response.data.uuidtagihan);
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

async function ubah_status() {
	$('#mode').val('ubah_status');
	var row = $('#table_data').datagrid('getSelected');
	if (row) {
		get_status_trans(row.kodetagihan, 'tkas', 'KODETAGIHAN', function(data) {
			if (data.status == 'S')
				$('#form_login').dialog('open');
			else if (data.status == 'P')
				$.messager.alert('Error', 'Transaksi Sudah Berlanjut Ke Proses Selanjutnya, Status Transaksi Tidak Dapat Diubah', 'error');
			else if (data.status == 'I')
				$.messager.alert('Error', 'Transaksi Dalam Mode Input, Status Transaksi Tidak Dapat Diubah', 'error');
		});
	}
}

function reset_detail() {
	$('#table_data_piutang').datagrid('loadData', []);
	$('#table_data_uang_muka').datagrid('loadData', []);
}

function hitungTotal() {
	var row         = $('#table_data_piutang').datagrid('getChecked');
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

async function load_data(uuidtagihan) {
	try {
		const response = await fetchData(
			'{{ session('TOKEN') }}',
			link_api.loadDataTagihanPelanggan, {
				uuidtagihan: uuidtagihan,
			}
		);
		if(response.success) {
			var msg = response.data
			$('#table_data_piutang').datagrid('loadData', msg.detail_piutang).datagrid('checkAll');
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

function buat_table_piutang() {
	var dg = '#table_data_piutang';
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
			{field:'kodetrans',title:'No. Trans',width:120,sortable:true},
		]],
		columns: [[
			{field:'jenis',title:'Jenis',width:100,sortable:true},
			{field:'amount',title:'Nominal',width:110,sortable:true,formatter:format_amount, align:'right', editor:{type:'numberbox', options:{required:true,min:0}},},
			{field:'keterangan',title:'Keterangan',width:300,sortable:true},
			// {field:'followup',title:'Follow Up',width:200,editor:{type:'validatebox', options:{required:false,validType:'length[0,100]'}}},
		]],
		onCheckAll: function(rows) {
			if ($('#mode').val()!='') {
				hitungTotal();
			}
		},
		onUncheckAll: function(rows) {
			if ($('#mode').val()!='') {
				hitungTotal();
			}
		},
		onCheck: function(index, row) {
			if ($('#mode').val()!='') {
				hitungTotal();
			}
		},
		onUncheck: function(index, row) {
			if ($('#mode').val()!='') {
				hitungTotal();
			}
		},
		onLoadSuccess: function(data) {
			if ($('#mode').val()!='') {
				hitungTotal();
			}
		},
		onAfterEdit:function(index, row, changes){
			if (changes.amount) {
				var msg 	  = '';
				var sisa      = parseFloat(row.amount2);
				var pelunasan = parseFloat(changes.amount);

				if ((sisa > 0 && pelunasan > sisa) ||
					(sisa < 0 && pelunasan < sisa)) {
					  // pelunasan tidak boleh lebih besar dari sisa
					changes.amount = sisa;
					msg            = 'Nominal Tidak Boleh Lebih Besar';
				} else if (sisa > 0 && pelunasan < 0) {
					changes.amount = 0;
					msg = 'Isi Nominal Sesuai Dengan Data';
				}

				if (msg != '') {
					$(this).datagrid('updateRow', {index:index, row:changes});

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
			{field:'kodetrans',title:'No. Trans',width:120,sortable:true},
		]],
		columns		: [[
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
		onLoadSuccess: function (data) {
			if ($('#mode').val() != '') {
				hitungTotal();
			}
		},
		onAfterEdit: function(index, row, changes) {
			if (changes.amount) {
				var msg       = '';
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
					$(this).datagrid('updateRow', {index:index, row:changes});

					$.messager.show({
						title  : 'Warning',
						msg	   : msg,
						timeout: 1000,
					});
				}

				hitungTotal();
			}
		}
	}).datagrid('enableCellEditing'); //.datagrid('enableFilter')
}

function clear_plugin() {
	$('.combogrid-f').each( function() {
		$(this).combogrid('grid').datagrid('load', {q:''});
	});

	$("#TGLTRANS, #TGLJATUHTEMPO").datebox('setValue', date_format());

	$('.number').numberbox('setValue', 0)
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

			if ($('#UUIDCUSTOMER').combogrid('getValue')) {
				tampil_piutang();
			}
		}
	});
}

async function tampil_piutang() {
	var uuidcustomer      = $('#UUIDCUSTOMER').combogrid('getValue');
	var uuidlokasi        = $('#UUIDLOKASI').combogrid('getValue');
	var pakaifilterlokasi = $('#PAKAIFILTERLOKASI').prop('checked') ? 1 : 0;

	try {
		const response = await fetchData(
			'{{ session('TOKEN') }}',
			link_api.loadPiutangUangMukaTagihanPelanggan, {
				uuidcustomer     : uuidcustomer,
				uuidlokasi       : uuidlokasi,
				pakaifilterlokasi: pakaifilterlokasi
			}
		);
		if(response.success) {
			var msg = response.data
			$('#table_data_piutang').datagrid('loadData', msg.detail_piutang);
			$('#table_data_uang_muka').datagrid('loadData', msg.detail_uang_muka);
		} else {
			$.messager.alert('Error', response.message, 'error');
		}
	} catch (e) {
		const error = typeof e === "string" ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
	}
}

async function getConfigMenu() {
	try {
	const res = await fetchData(
		'{{ session('TOKEN') }}', link_api.loadConfigTagihanPelanggan, {
		kodemenu: '{{ $kodemenu }}'
		}
	);
	if (res.success) {
    // AYAT SILANG
    inputharga = res.data.INPUTHARGA

    // KODE
		if (res.data.KODE == "AUTO") {
      $('#KODEPELUNASAN').textbox({
				prompt: "Auto Generate",
				readonly: true,
				required: false
			});
		} else {
			$('#KODEPELUNASAN').textbox({
				prompt: "",
				readonly: false,
				required: true
			});
			$('#KODEPELUNASAN').textbox('clear').textbox('textbox').focus();
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
