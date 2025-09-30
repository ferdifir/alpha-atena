@extends('template.form')

@section('content')
<div id="form_input" class="easyui-layout" fit="true">
	<div data-options="region:'center',border:false">
		<script>
			if(screen.height < 450) $("#trans_layout").css('height',"450px");
		</script>
		<div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;" ></div>
		
		<input type="hidden" id="mode" name="mode">
		<input type="hidden" id="IDPELUNASAN" name="idpelunasan">
		<input type="hidden" id="IDGIRO" name="idgiro">

		<input type="hidden" id="data_detail" name="data_detail">
		<input type="hidden" id="data_detail_perkiraan" name="data_detail_perkiraan">

		<div style="width: 100%;overflow-x:auto">
			<table width="100%">
				<tr>
					<td>
						<table>
							<tr>
								<td valign="top">
									<fieldset style="height:150px;">
										<legend>Info Transaksi</legend>
										<table border="0">
											<tr>
												<td id="label_form">No. Pelunasan</td>
												<td><input name="kodepelunasan" class="label_input" id="KODEPELUNASAN" style="width:190px"></td>
											</tr>
											<tr>
												<td id="label_form">Lokasi</td>
												<td id="label_form">
													<input name="idlokasi" id="IDLOKASI" style="width:190px">
													<input type="hidden" id="KODELOKASI" name="kodelokasi">
												</td>
											</tr>
											<tr>
												<td id="label_form">Tgl. Pelunasan</td>
												<td><input name="tgltrans" id="TGLTRANS" class="date" style="width:190px"/></td>
											</tr>
										</table>
									</fieldset>
								</td>
								<td valign="top" class="ayatsilang0">
									<fieldset style="height:150px">
										<legend>Informasi Kas/Bank</legend>
										<table border="0">
											<tr>
												<td id="label_form" align="left">Kode Akun</td>
												<td><input id="IDPERKIRAANKAS" name="idperkiraankas" style="width:110px"> <input id="NAMAPERKIRAANKAS" name="namaperkiraankas" style="width:250px" class="label_input" readonly prompt="Nama Akun"></td>
											</tr>
											<tr>
												<td id="label_form"></td>
												<td id="label_form">
													<input type="checkbox" value="1" name="samakandebetkredit" id="SAMAKANDEBETKREDIT"> Hitung Nominal Kas/Bank Secara Otomatis
												</td>
											</tr>
											<tr>
												<td id="label_form" align="left">Nominal</td>
												<td>
													<input id="AMOUNT" name="amount" style="width:110px;" class="number">
													<input id="IDCURRENCY" name="uuidcurrency" style="width:50px;"/>
													<input id="NILAIKURS" name="nilaikurs" style="width:65px;" class="number">
													<input id="AMOUNTKURS" name="amountkurs" style="width:129px;" class="number" readonly>
												</td>
											</tr>
											<tr>
												<td id="label_form" align="left" valign="top">Keterangan</td>
												<td><textarea name="catatan" class="label_input" id="CATATAN" multiline="true" style="width:364px; height:50px" validType='length[0,300]'></textarea></td>
											</tr>
										</table>
									</fieldset>
								</td>
								<td valign="top" class="ayatsilang1">
									<fieldset style="height:150px">
										<legend>Informasi No Kas/Bank</legend>
										<table border="0">
											<tr>
												<td id="label_form" align="left">Kodetrans</td>
												<td><input id="IDKAS" class="label_input" name="idkas" style="width:180px"></td>
											</tr>
											<tr>
												<td id="label_form" align="left">No Giro</td>
												<td><input name="nogiro" class="label_input" id="NOGIRO" style="width:180px;" readonly></td>
											</tr>
											<tr>
												<td id="label_form" align="left">Nominal</td>
												<td><input id="AMOUNTKAS" name="amountkas" style="width:110px;" class="number" readonly></td>
											</tr>
										</table>
									</fieldset>
								</td>
								<td id="fm-giro" class="ayatsilang0">
									<fieldset style="height:150px">
										<legend>Informasi Giro Keluar</legend>
										<table border="0" style="padding:2px">
											<tr>
												<td id="label_form" align="left">No Giro</td>
												<td><input id="NOGIROKELUAR" name="nogirokeluar" class="label_input" style="width:150px" prompt="No Giro"></td>
											</tr>
											<tr>
												<td id="label_form" align="left">Nama Bank</td>
												<td><input id="NAMABANKGIRO" name="namabankgiro" class="label_input" style="width:150px" prompt="Nama Bank Giro"></td>
											</tr>
											<tr>
												<td id="label_form" align="left">Tgl Cair</td>
												<td><input id="TGLCAIRGIRO"  style="width:150px;"  name="tglcairgiro" class="date"></td>
											</tr>
										</table>
									</fieldset>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>	
		</div>

		<table id="table_data_detail" style="height: 300px"></table>
		<table id="table_data_perkiraan" style="height: 200px"></table>

		<table id="trans_footer" width="100%">
			<tr>
				<td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl. Input :</label> <label id="lbl_tanggal"></label></td>
				<td>
					<div colspan="2" id="label_form" style="padding-right:100px" align="right">
						Total Debet <input id="TOTALDEBET" name="totaldebet" class="number" style="width:110px" readonly />
						Total Kredit <input id="TOTALKREDIT" name="totalkredit" class="number" style="width:110px" readonly />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div id="tb-filter">
						<input type="checkbox" name="pakaifilterlokasi" id="PAKAIFILTERLOKASI" value="1"> Gunakan lokasi sebagai filter data
						<table id="fm-filter">
							<tr>
								<td id="label_form">Pakai TT</td>
								<td>
									<input type="radio" id="TIDAKPAKAITT" onchange="ubahPakaiTT(0)" value="0" name="pakaitt"> Tidak
									<input type="radio" id="PAKAITT" onchange="ubahPakaiTT(1)" name="pakaitt" value="1"> Ya
									<label style="margin-left: 20px" id="label_form" align="left">No TT</label>
									<input name="idtandaterima" id="IDTANDATERIMA" style="width:150px;">
								</td>
							</tr>
							<tr>
								<td id="label_form">Supplier</td>
								<td>
									<input name="idsupplier" id="IDSUPPLIER" style="width:230px">
								</td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
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

<div id="form_cetak" title="Preview" style="width:660px; height:450px">
    <div id="area_cetak"></div>
<div>
@endsection

@push('js')
<script src="{{ asset('assets/js/utils.js') }}"></script>
<script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
<script>
var mode_load_data = false;
var cekbtnsimpan = true; //CEK APAKAH TOMBOL SIMPAN BISA DITEKAN ATAU BELUM (SUPAYA TIDAK TERKLIK 2x)
var flag_get_jurnal = false // jika false maka ger_jurnal_link belum selesai loading, sehingga tidak bisa simpan
var idtrans = "";
var row = {};
var ayatsilang;
$(document).ready(async function(){

  await getConfigMenu()

  await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        var UT = data.data.cetak;
		aksesubah = data.data.ubah;
		if (UT == 1) {
			$('#simpan_cetak').css('filter', '');
		} else {
			$('#simpan_cetak').css('filter', 'grayscale(100%)');
			$('#simpan_cetak').removeAttr('onclick');
		}
    },false);
	
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
		},{
			text   : '',
			iconCls: 'icon-excel',
			handler: function() {
				export_excel('Faktur Pelunasan Hutang', $("#area_cetak").html());
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
	
	browse_data_lokasi('#IDLOKASI');
	browse_data_referensi('#IDSUPPLIER');
	browse_data_kas_bank('#IDPERKIRAANKAS');
	browse_data_currency('#IDCURRENCY');
	browse_no_kas('#IDKAS');
	browse_no_tt('#IDTANDATERIMA');

	$('#TGLTRANS').datebox('readonly', ayatsilang==1 ? 'true' : 'false');
	
	$('#AMOUNT').numberbox({
		onChange: function(newVal, oldVal) {
			var nilaikurs  = $('#NILAIKURS').numberbox('getValue');
			var amountkurs = nilaikurs * $(this).numberbox('getValue');
			$('#AMOUNTKURS').numberbox('setValue', amountkurs);

			hitung_debet_kredit();
		}
	});

	$('#NILAIKURS').numberbox({
		onChange: function(newVal, oldVal) {
			var nilaikurs = parseFloat($(this).numberbox('getValue'));
			var row       = $('#IDCURRENCY').combogrid('grid').datagrid('getSelected');
			if (row && row.id == '{{ session('UUIDCURRENCY') }}') {
				$(this).numberbox('setValue', 1);
				nilaikurs = 1;
			} else {
				if (nilaikurs == 1 || nilaikurs == 0) {
					//$.messager.alert('Error', 'Nilai Kurs Tidak Boleh Diisi Angka 1 dan 0', 'error');
				}
			}

			var amount     = $('#AMOUNT').numberbox('getValue');
			var amountkurs = amount * nilaikurs;
			$('#AMOUNTKURS').numberbox('setValue', amountkurs);

			hitung_debet_kredit();
		}
	});
	
	$('#SAMAKANDEBETKREDIT').change(function() {
		if(this.checked)
		{
			$("#AMOUNT").numberbox("readonly",true);
			$("#IDCURRENCY").combogrid("readonly",true);
			$("#NILAIKURS").numberbox("readonly",true);
			
		} 
		else
		{
			$("#AMOUNT").numberbox("readonly",false);
			$("#IDCURRENCY").combogrid("readonly",false);
			$("#NILAIKURS").numberbox("readonly",false);
		}
		hitung_debet_kredit()		
    });

	buat_table_detail();
	buat_table_detail_perkiraan();
	
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

function cetak(id,kode) {
    $("#window_button_cetak").window('close');
    $("#area_cetak").load(base_url+"atena/Keuangan/Transaksi/PelunasanHutang/cetak",{
		idtrans  : id,
		kodetrans: kode
	});
    $("#form_cetak").window('open');
}

function tambah() {
	$('#form_input').form('clear');
	$('#mode').val('tambah');
	
	$('#SAMAKANDEBETKREDIT').prop("checked",true);

	flag_get_jurnal = false;

	$('#PAKAIFILTERLOKASI').prop('checked', true);
	
	$("#AMOUNT").numberbox("readonly",true);
	$("#IDCURRENCY").combogrid("readonly",true);
	$("#NILAIKURS").numberbox("readonly",true);

	$('#TIDAKPAKAITT').removeAttr('disabled');
	$('#PAKAITT').removeAttr('disabled');

	$('#TGLTRANS').datebox('readonly', false);
	 
	$('#TIDAKPAKAITT').prop('checked', true)
	ubahPakaiTT(0);
	
	$('#table_data_detail').datagrid('options').RowEdit = true;
	$('#table_data_perkiraan').datagrid('options').RowEdit = true;

	clear_plugin();
	reset_detail();

}

function ubahPakaiTT(pakai) {
	if (pakai == 1) {
		$('#IDTANDATERIMA').combogrid({
			required: true,
			readonly: false
		});
		$('#IDSUPPLIER').combogrid({
			required: false,
			readonly: true
		});
		browse_no_tt('#IDTANDATERIMA');
	}
	else {
		$('#IDTANDATERIMA').combogrid({
			required: false,
			readonly: true
		});
		$('#IDSUPPLIER').combogrid({
			required: true,
			readonly: false
		});
	}

	if ($('#mode').val() == 'tambah') {
		reset_detail()
	}
}

async function ubah() {
	$('#mode').val('ubah');
	$('#SAMAKANDEBETKREDIT').prop("checked",true);
	if (row) {
		get_akses_user('<?= $kodemenu ?>', async function(data) {
			var UT = data.ubah;
			get_status_trans("atena/Keuangan/Transaksi/PelunasanHutang",row.idpelunasan, async function(data) {
				if (UT == 1 && data.status == 'I') {
					$('#btn_simpan_modal').css('filter', '');
					$('#mode').val('ubah');
				} else {
					$('#btn_simpan_modal').css('filter', 'grayscale(100%)');$('#btn_simpan_modal').removeAttr('onclick');
				}
				
				$("#form_input").form('load', row);

				flag_get_jurnal = true;

				if (row.idmemo != '') {
					$('#IDKAS').combogrid('setValue', row.kodememo)
				} else {
					$('#IDKAS').combogrid('setValue', row.kodekas)
				}

				if (row.idtandaterima == null || row.idtandaterima == 0) {
					ubahPakaiTT(0);
					$('#TIDAKPAKAITT').prop('checked', true);
				}
				else {
					$('#PAKAITT').prop('checked', true);
					$('#IDTANDATERIMA').combogrid('setValue', {
						idtandaterima: row.idtandaterima,
						kodetandaterima: row.kodetandaterima
					});
				}

				$('#IDLOKASI').combogrid('setValue', {
					id: row.idlokasi,
					nama: row.namalokasi
				});

				$('#table_data_detail').datagrid('options').RowEdit = false;
				$('#table_data_perkiraan').datagrid('options').RowEdit = false;

				$('#TIDAKPAKAITT').attr('disabled', 'disabled');
				$('#PAKAITT').attr('disabled', 'disabled');

				$('#AMOUNTKAS').numberbox('setValue', row.total)
				// console.log(row)
				await load_data(row.idpelunasan, row.kodepelunasan);
				$('#IDTANDATERIMA').combogrid('readonly');
				
				$('#IDSUPPLIER').combogrid('setValue', {id:row.idsupplier, nama:row.namasupplier});

				$('#IDSUPPLIER').combogrid('readonly');

				$('#lbl_kasir').html(row.userbuat);
				$('#lbl_tanggal').html(row.tglentry);
			});
		});

	}
}

async function simpan(jenis_simpan) {
	$('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getChecked')));
	$('#data_detail_perkiraan').val(JSON.stringify($('#table_data_perkiraan').datagrid('getRows')));

	var mode 	   = $("#mode").val();
	var dataheader = $("#form_input :input").serialize()+"&NAMASUPPLIER="+$('#IDSUPPLIER').combogrid('getText');

	var isValid = $('#form_input').form('validate');

	$('#window_button_simpan').window('close');	

	if (!flag_get_jurnal) {
		return false;
	}

	if (isValid)
		isValid = cek_datagrid($('#table_data_detail'));

	var debet  = parseFloat($('#TOTALDEBET').numberbox('getValue'));
	var kredit = parseFloat($('#TOTALKREDIT').numberbox('getValue'));

	if (debet != kredit) {
		isValid = false;
		$.messager.alert('Warning','Total Debet harus sama dengan Kredit','warning');
	}

	if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
		cekbtnsimpan = false;
		validasi_session(function () {
			var adaTrans = false;

			if (mode == 'ubah') {
				$.ajax({
					type    : 'POST',
					dataType: 'json',
					url     : base_url+'Home/cekTanggalJamInput',
					data	: {id:row.idpelunasan,table:"pelunasanhutang",whereid:"idpelunasan",tgl:row.tglentry,status:row.status},
					async	: false,
					success: function(msg){
						cekbtnsimpan = true;
						if(!msg.success)
						{
							var errorMsg = 'Sudah Terdapat Perubahan Data Atas Transaksi Ini Yang Dilakukan Pada Tanggal '+msg.tgl+' / '+msg.jam+'.<br>Transaksi Tidak Dapat Disimpan.';
							$.messager.alert('Warning', errorMsg, 'warning');
							adaTrans = true;
						}
					}
				});
			}

			cek_tanggal_tutup_periode($('#TGLTRANS').datebox('getValue'), 1, function (data) {
				cekbtnsimpan = true;
				if (!data.success) {
					var kode = row.kodepelunasan ? row.kodepelunasan : 'ini';

					$.messager.alert('Error', 'Sudah dilakukan tutup periode pada tanggal transaksi untuk no ' + kode + '. Prosedur tidak dapat dilanjutkan', 'error');

					adaTrans = true;
				}
			});

			if (!adaTrans) {
				$.ajax({
					type	: 'POST',
					url		: base_url+"atena/Keuangan/Transaksi/PelunasanHutang/simpan/"+jenis_simpan,
					data    : "act=simpan_trans&"+dataheader,
					cache	: false,
					dataType: 'json',
					beforeSend : function() {
						$.messager.progress();
					},
					success: function(msg) {
						$.messager.progress('close');
						cekbtnsimpan = true;
						if (msg.success) {
			
							$('#form_input').form('clear');
							$.messager.show({
									title   : 'Info',
									msg     : 'Transaksi Sukses',
									showType: 'show'
								});
							tambah();
							parent.reload();
							if(jenis_simpan == 'simpan_cetak'){
								cetak(msg.id,msg.kode);
							}

						} else {
							$.messager.alert('Error', msg.errorMsg, 'error');
						}
					}
				});
			}
		});
	}
}

function reset_detail() {
	$('#table_data_detail').datagrid('loadData', []);
	$('#table_data_perkiraan').datagrid('loadData', []);
}

async function get_jurnal() {
	if ($('#mode').val() != 'tambah') {
		return
	}

	flag_get_jurnal = false;

	// mendapatkan hutang yang di check
	var rows = $("#table_data_detail").datagrid('getChecked');

	var namasupplier = $('#IDSUPPLIER').combogrid('getText');
	var tt           = $('#IDTANDATERIMA').combogrid('grid').datagrid('getSelected');

	if (tt) {
		namasupplier = tt.namasupplier;
	}

	$('#CATATAN').textbox('setValue', 'PELUNASAN HUTANG KE ' + namasupplier);

	$.ajax({
		type	: 'POST',
		dataType: 'json',
		url		: base_url + "atena/Keuangan/Transaksi/PelunasanHutang/getJurnalLink",
		data	: {
			data_detail  : JSON.stringify(rows),
			kodekasbank  : $('#IDKAS').combogrid('getValue'),
			kodepelunasan: $("#KODEPELUNASAN").val(),
			mode         : $("#mode").val()
		},
		cache   : false,
		beforeSend: function () {
			$.messager.progress();
		},
		success : function(msg) {
			$.messager.progress('close');

			if (msg.success) {
				flag_get_jurnal = true;
				$('#table_data_perkiraan').datagrid('loadData', msg.data_detail);
			}
		}
	});
}

async function load_data(idtrans, kodetrans) {
	$.ajax({
		type	: 'POST',
		dataType: 'json',
		url		: base_url+"atena/Keuangan/Transaksi/PelunasanHutang/loadData",
		data	: {idtrans: idtrans, kodetrans: kodetrans},
		cache	: false,
		beforeSend : function() {
			// $.messager.progress();
		},
		success: function(msg) {
			// $.messager.progress('close');
			if (msg.kasbank) {
				var data = msg.kasbank;

				$('#IDPERKIRAANKAS').combogrid('setValue', {id:data.idperkiraan, kode:data.kodeperkiraan});
				$('#IDCURRENCY').combogrid('setValue', data.uuidcurrency);
				$('#NAMAPERKIRAANKAS').textbox('setValue', data.namaperkiraan);
				///$('#KETERANGAN').textbox('setValue', data.KETERANGAN);
				$('#AMOUNT').numberbox('setValue', data.amount);
				$('#AMOUNTKURS').numberbox('setValue', data.amountkurs);
				$('#NILAIKURS').numberbox('setValue', data.nilaikurs);
			}

			if (msg.giro) {
				var data = msg.giro;

				$('#NOGIROKELUAR').textbox('setValue', data.nogiro)
				$('#NAMABANKGIRO').textbox('setValue', data.namabankgiro)
				$('#TGLCAIRGIRO').datebox('setValue', data.tglcair)
			}

			mode_load_data = true;
			$('#table_data_detail').datagrid('loadData', msg.detail_pelunasan);
			$('#table_data_perkiraan').datagrid('loadData', msg.detail_jurnal);
			$('#table_data_detail').datagrid('options').checkOnSelect = false
			$('#table_data_detail').datagrid('checkAll')
			$('#table_data_detail').datagrid('getPanel').find('div.datagrid-header input[type=checkbox]').attr('disabled', 'disabled');
			$('#table_data_detail').datagrid('getPanel').find('div.datagrid-body input[type=checkbox]').attr('disabled', 'disabled');
			mode_load_data = false;

		}
	});
}

/* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */
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

function browse_data_referensi(id) {
	$(id).combogrid({
		panelWidth: 750,
		required  : true,
		url       : link_api.browseSupplier,
		idField   : 'uuidsupplier',
		textField : 'nama',
		mode      : 'remote',
		columns   : [[
			{field:'kode',title:'Kode',width:150, sortable:true},
			{field:'nama',title:'Nama',width:200, sortable:true},
			{field:'alamat',title:'Alamat',width:300, sortable:true},
			{field:'kota',title:'Kota',width:100, sortable:true},
			{field:'telp',title:'Telp',width:100, sortable:true},
		]],
		onChange:function(newVal, oldVal){
			if ($('#mode').val() != '') {
				reset_detail();
				var row = $(this).combogrid('grid').datagrid('getSelected');
				if (row) {
					$("#IDTANDATERIMA").combogrid('clear').combogrid('grid').datagrid('load', {idsupplier: row.id});
					if ($('#TIDAKPAKAITT').prop('checked') && $('#mode').val() == 'tambah') {
						var idlokasi = $('#IDLOKASI').combogrid('getValue');

						if ($('#PAKAIFILTERLOKASI').prop('checked') && idlokasi == '') {
							$.messager.alert('Peringatan', 'Lokasi Belum Dipilih', 'warning');

							$('#IDLOKASI').combogrid('clear');

							return false;
						}

						$.ajax({
							type    : 'POST',
							url     : link_api.loadHutangPelunasanHutang,
							data    : {
								idtrans   : null,
								idsupplier: row.id,
								pakaifilterlokasi: $('#PAKAIFILTERLOKASI').prop('checked') ? 1 : 0,
								idlokasi: idlokasi
							},
							cache   : false,
							dataType: 'json',
							beforeSend: function(xhr) {
								$.messager.progress();
							},
							success: function(msg) {
								$.messager.progress('close')
								if (msg.success) {
									$('#table_data_detail').datagrid('loadData', msg.data_detail);
									// menghapus atribut disabled pada checkbox agar user bisa
									// memilih hutang yang ingin dilunasi
									$('#table_data_detail').datagrid('getPanel').find('div.datagrid-header input[type=checkbox]').removeAttr('disabled');
									$('#table_data_detail').datagrid('getPanel').find('div.datagrid-body input[type=checkbox]').removeAttr('disabled');

									// mengubah checkOnSelect menjadi true
									$('#table_data_detail').datagrid('options').checkOnSelect = true
									get_jurnal();
								}
							}
						});
					}
				}
			}
		}
	});
}

function browse_no_kas(id) {
	$(id).combogrid({
		panelWidth: 800,
		url       : link_api.browseTandaTerimaPelunasan,
		idField   : 'idkas',
		textField : 'kodekas',
		mode      : 'remote',
		columns   : [[
			{field:'kodekas',title:'Kode Kas/Bank/Giro',width:120, sortable:true},
			{field:'tgltrans',title:'Tgl. Trans',width:80, sortable:true, align:'center', formatter:ubah_tgl_indo},
			{field:'total',title:'Nominal ({{  session('SIMBOLCURRENCY') }})',width:110, align:'right', sortable:true, formatter:format_amount},
			{field:'nogiro',title:'No Giro',width:130, sortable:true},
			{field:'referensi',title:'Referensi',width:200, sortable:true},
			{field:'keterangan',title:'Keterangan',width:250, sortable:true},
			{field:'userbuat',title:'User Entry',width:110, sortable:true},
		]],
		onChange: function(newVal, oldVal) {
			if ($('#mode').val() != '') {
				var row = $(id).combogrid('grid').datagrid('getSelected');
				if (row) {
					$('#AMOUNTKAS').numberbox('setValue', row.total);
					$('#NOGIRO').textbox('setValue', row.nogiro);
					$('#IDGIRO').val(row.idgiro);
					$('#TGLTRANS').datebox('setValue', ubah_tgl_indo(row.tgltrans));
				} else {
					$('#AMOUNTKAS').numberbox('setValue', 0);
					$('#NOGIRO').textbox('clear');
					$('#IDGIRO').val('');
					$('#TGLTRANS').datebox('setValue', date_format());
				}
				get_jurnal();
			}
		}
	});
}

function browse_no_tt(id) {
	$(id).combogrid({
		panelWidth: 630,
		url       : link_api.browseTandaTerimaPelunasan,
		idField   : 'idtandaterima',
		textField : 'kodetandaterima',
		required  : true,
		queryParams: {
			idlokasi: function () {
				return $('#IDLOKASI').combogrid('getValue');
			},
			pakaifilterlokasi: function () {
				return $('#PAKAIFILTERLOKASI').prop('checked') ? 1 : 0;
			}
		},
		mode      : 'remote',
		columns   : [[
			{field:'kodetandaterima',title:'No TT',width:110, sortable:true},
			{field:'namasupplier',title:'Supplier',width:200, sortable:true},
			{field:'tgltrans',title:'Tgl. Trans',width:80, sortable:true, align:'center', formatter:ubah_tgl_indo},
			{field:'amount',title:'Nominal',width:100, align:'right', formatter:format_amount, sortable:true},
			{field:'userbuat',title:'User Entry',width:110, sortable:true},
		]],
		onChange: function(newVal, oldVal) {
			if ($('#mode').val() != '') {
				var row = $(id).combogrid('grid').datagrid('getSelected');
				if (row) {
					$.ajax({
						type    : 'POST',
						url     : base_url+"atena/Keuangan/Transaksi/PelunasanHutang/getHutang",
						data    : {idtrans: row.idtandaterima},
						cache   : false,
						dataType: 'json',
						success: function(msg) {
							if (msg.success) {
								$('#table_data_detail').datagrid('loadData', msg.data_detail);

								// secara default seluruh hutang di check
								$('#table_data_detail').datagrid('checkAll')

								// agar tidak bisa menghilangkan check pada checkbox
								$('#table_data_detail').datagrid('options').checkOnSelect = false

								// membuat checkbox menjadi disabled
								$('#table_data_detail').datagrid('getPanel').find('div.datagrid-header input[type=checkbox]').attr('disabled','disabled');
								$('#table_data_detail').datagrid('getPanel').find('div.datagrid-body input[type=checkbox]').attr('disabled','disabled');
								get_jurnal();
							}
						}
					});
				} else {
					reset_detail()
					get_jurnal();
				}
			}
		}
	});
}

function browse_data_kas_bank(id) {
	$(id).combogrid({
		panelWidth: 400,
		// url       : base_url+'atena/Master/Data/Perkiraan/comboGrid/kas_bank_hutang',
		url		  : link_api.browsePerkiraan,
		queryParams: {
			jenis: 'kas_bank_hutang',
			aktif: 1
		},
		idField   : 'id',
		textField : 'kode',
		mode      : 'remote',
		required  : true,
		columns   : [[
			{field:'kode',title:'Kode',width:100, sortable:true},
			{field:'nama',title:'Nama',width:270, sortable:true},
			{field:'kasbank', hidden:true}
		]],
		onChange: function(index, data) {
			var row = $(id).combogrid('grid').datagrid('getSelected');
			if (row) {
				var data_perkiraan = $('#table_data_perkiraan').datagrid('getRows');

				for (var i = 0; i < data_perkiraan.length; i++) {
					if (data_perkiraan[i].idperkiraan == row.id) {
						$.messager.show({
							title  : 'Warning',
							msg	   : 'Perkiraan Yang Diinput Tidak Boleh Sama Dengan Header',
							timeout: "{{ session('TIMEOUT') }}",
						});

						$(this).combogrid('clear');

						return false;
					}
				}

				$('#NAMAPERKIRAANKAS').textbox('setValue', row.nama);
				$('#IDCURRENCY').combogrid('setValue', row.uuidcurrency);
				
				if(row.kasbank != 0){
					$('#NOGIROKELUAR').textbox('clear');
					$('#NAMABANKGIRO').textbox('clear');
					$('#TGLCAIRGIRO').textbox('clear');
				}
				
			} else {
				$('#NAMAPERKIRAANKAS').textbox('clear');
				$('#IDCURRENCY').combogrid('clear');
			}
		},
	});
}

function browse_data_currency(id) {
	$(id).combogrid({
		panelWidth: 200,
		url       : link_api.browseCurrency,
		idField   : 'uuidcurrency',
		textField : 'simbol',
		mode      : 'local',
		required  : true,
		columns   : [[
			{field:'nama',title:'Curr',width:100, sortable:true},
			{field:'simbol',title:'Simbol',width:70, sortable:true}
		]],
		onSelect: function(index, data) {
			/*get_kurs ($('#TGLTRANS').datebox('getValue'), $(id).combogrid('getValue'), function(data){
				$('#NILAIKURS').numberbox('setValue', data.kurs);
			});*/
		}
	});
}

function buat_table_detail() {
	var dg = '#table_data_detail';
	$(dg).datagrid({
		RowAdd      : false,
		RowDelete   : false,
		singleSelect: false,
		striped     : true,
		rownumbers  : true,
		showFooter  : true,
		clickToEdit  	: false,
		dblclickToEdit	: true,
		toolbar     : '#tb-filter',
		data        : [],
		columns     : [[
			{field:'ck', checkbox:true},
			{field:'tgltrans',title:'Tgl. Trans',width:80, formatter:ubah_tgl_indo, align:'center',},
			{field:'kodetrans',title:'No. Transaksi',width:130,},
			{field:'jenistransaksi',title:'Jenis Trans',width:100,},
			{field:'noinvmanual',title:'No Invoice Manual',width:150,},
			{field:'total',title:'Total',width:100, align:'right', formatter:format_amount,},
			{field:'a',title:'Sisa',width:100, align:'right', formatter:function(val, row){
				return format_amount(parseFloat(row.sisa - row.pelunasan));
			}},
			{field:'b',title:'Sisa Yg Dilunasi',width:100, align:'right',hidden:true, formatter:function(val, row){
				return format_amount(parseFloat(row.sisa-row.pelunasan));
			}},
			{field:'pelunasan',title:'Pelunasan',width:100, align:'right', formatter:format_amount, editor:{type:'numberbox',options:{required:true,}}},
			{field:'keterangan',title:'Keterangan',width:300},
		]],
		onLoadSuccess: function(data) {
			reload_footer();
		},
		onCheckAll: function(rows) {
			if (mode_load_data) {
				return false;
			}
			if ($('#mode').val()!='') {
				var ln = rows.length;
				for (var i = 0; i < ln; i++) {
					$(this).datagrid('updateRow',{
						index: i,
						row  : {
							pelunasan: rows[i].sisa,
						}
					});
				}
				get_jurnal();
			}
			reload_footer();
		},
		onUncheckAll: function(rows) {
			if (mode_load_data) {
				return false;
			}

			if ($('#mode').val()!='') {
				var ln = rows.length;
				for (var i = 0; i < ln; i++) {
					$(this).datagrid('updateRow',{
						index: i,
						row  : {
							pelunasan: 0,
						}
					});
				}
				get_jurnal();
			}
			reload_footer();
		},
		onCheck:function(index, row){
			if (mode_load_data) {
				return false;
			}

			$(this).datagrid('updateRow', {
				index: index,
				row  : {
					pelunasan: row.sisa,
				}
			});
			reload_footer();
			get_jurnal();
		},
		onUncheck:function(index, row){
			if (mode_load_data) {
				return false;
			}

			$(this).datagrid('updateRow',{
				index: index,
				row  : {
					pelunasan: 0,
				}
			});
			reload_footer();
			get_jurnal();
		},
		onCellEdit: function(index, field, val) {
			// pilih yang tercentang
			var row2 = $(this).datagrid('getChecked');
			var row  = $(this).datagrid('getRows')[index];
			var ed   = get_editor ('#table_data_detail', index, field);

			ed.numberbox('readonly');

			for (var i = 0; i < row2.length; i++) {
				if (row2[i].kodetrans == row.kodetrans) {
					ed.numberbox('readonly', false);
				}
			}
		},
		onAfterEdit:function(index, row, changes) {
			if (changes.pelunasan) {
				var msg 	  = '';
				var sisa	  = parseFloat(row.sisa);
				var pelunasan = parseFloat(changes.pelunasan);

				if ((sisa > 0 && pelunasan > sisa) ||
					(sisa < 0 && pelunasan < sisa)) {
					// pelunasan tidak boleh lebih besar dari sisa
					changes.pelunasan = sisa;
					msg = 'Pelunasan Tidak Boleh Lebih Dari Sisa';
				} else if ((parseFloat(row.total) > 0 && parseFloat(pelunasan) < 0) ||
						   (parseFloat(row.total) < 0 && parseFloat(pelunasan) > 0)) {
					changes.pelunasan = 0;
					msg = 'Isi Pelunasan sesuai dengan data';
				}

				if (msg != '') {
					$(this).datagrid('updateRow', {index: index, row: changes});

					$.messager.show({
						title  : 'Warning',
						msg    : msg,
						timeout: 1000,
					});
				}
			}
			reload_footer();
			get_jurnal();
			hitung_debet_kredit();
		}
	}).datagrid('enableCellEditing');
}

function getRowIndex(target){
	var tr = $(target).closest('tr.datagrid-row');
	return parseInt(tr.attr('datagrid-row-index'));
}

var indexDetail = 0; // UNTUK TOMBOL EDIT

function buat_table_detail_perkiraan() {
	var dg = '#table_data_perkiraan';
	$("#table_data_perkiraan").datagrid({
		rownumbers : true,
		clickToEdit  	: false,
		dblclickToEdit	: true,
		data       : [],
		toolbar: [{
			text   : 'Tambah',
			iconCls: 'icon-add',
			handler: function(){
				var index = $(dg).datagrid('getRows').length;
				$(dg).datagrid('appendRow',{
					kodebarang   :	'',
				}).datagrid('gotoCell', {
					index: index,
					field: 'kodebarang'
				});

				getRowIndex(target);
			}
		}, {
			text   : 'Hapus',
			iconCls: 'icon-remove',
			handler: function(){
				$(dg).datagrid('deleteRow',indexDetail);
				hitung_debet_kredit();
			}
		}
		// ,{
			// text:'Ubah',
			// iconCls:'icon-edit',
			// handler:function(){
				// $(dg).datagrid('editCell', {
					// index: indexDetail,
					// field: 'kodebarang'
				// });
			// }
		// }
		],
		columns    : [[
			{field:'kodeperkiraan',title:'Kd. Perkiraan',width:110,editor:{
				type   : 'combogrid',
				options: {
					panelWidth: 530,
					mode	  : 'remote',
					required  : true,
					idField	  : 'kode',
					textField : 'kode',
					// url		  : base_url+'atena/Master/Data/Perkiraan/comboGrid/detail_non_kasbank',
					url		  : link_api.browsePerkiraan,
					queryParams: {
                        jenis: 'detail_non_kasbank',
                        aktif: 1
                    },
					columns	  : [[
						{field:'kode',title:'Kode',width:110},
						{field:'nama',title:'Nama',width:400},
					]],
				}
			}},
			{field:'namaperkiraan',title:'Nama Perkiraan',width:400},
			{field:'saldo',title:'Saldo', width:70,editor:{
				type   : 'combobox',
				options: {
					required   : true,
					data	   : [{value:'DEBET',text:'DEBET'},{value:'KREDIT',text:'KREDIT'}],
					panelHeight: 'auto',
				}
			}},
			{field:'amount',title:'Nominal',align:'right', width:100, formatter:format_amount,editor:{type:'numberbox', options:{required:true,min:0}}, sortable:false, sorter:function(a,b){
                a = parseFloat(a.replace(',', ''));
                b = parseFloat(b.replace(',', ''));

				return (a > b ? 1 : -1);
            }},
			{field:'uuidcurrency',title:'Curr Kode', width:50, hidden:true,},
			{field:'currency',title:'Curr',width:50, hidden:false, editor:{
				type   : 'combogrid',
				options: {
					panelWidth:200,
					mode	  : 'remote',
					required  : true,
					idField	  : 'simbol',
					textField : 'simbol',
					url		  : link_api.browseCurrency,
					columns	  : [[
						{field:'nama',title:'Curr',width:100},
						{field:'simbol',title:'Simbol',width:70},
					]],
				}
			}},
			{field:'nilaikurs',title:'Kurs ({{  session('SIMBOLCURRENCY') }})',align:'right', width:80, hidden:false, formatter:format_amount,editor:{type:'numberbox', options:{required:true}}},
			{field:'amountkurs',title:'Nominal ({{  session('SIMBOLCURRENCY') }})',align:'right', width:110, hidden:false, formatter:format_amount},
			{field:'keterangan',title:'Keterangan',width:350,editor:{type:'validatebox', options:{required:true,validType:'length[0,300]'}}},
			{field:'tanda',hidden:true,},
		]],
		onClickRow: function(index,row) {
            indexDetail = index;
        },
		onLoadSuccess: function(data) {
			hitung_debet_kredit();
			
		},
		onAfterDeleteRow: function(index, row) {
			if (row.tanda == 1) {
				$(dg).datagrid('insertRow',{
					index: index,
					row  : row
				});
				$.messager.alert('Warning', 'Akun dari Jurnal Program Tidak Boleh Dihapus', 'warning');
			}
			hitung_debet_kredit();
		},
		onCellEdit: function(index, field, val) {
			var row = $(this).datagrid('getRows')[index];
			var ed  = get_editor('#table_data_perkiraan', index, field);

			switch(field) {
				case 'kodeperkiraan' : case 'currency':
					ed.combogrid('showPanel');
					break;
				case 'saldo':
					ed.combobox('showPanel');
					break;
			}
		},
		onBeforeCellEdit:function(index, field){
			var row = $(this).datagrid('getRows')[index];
			if (row.uuidcurrency == '{{  session('UUIDCURRENCY') }}' && field == 'nilaikurs') // jika tandakurs = 1, maka nilaikurs tidak boleh diedit
				return false;
			else if (row.tanda == 1 && field != 'keterangan') // jika tanda = 1, maka tidak boleh diedit
				return false;
		},
		onEndEdit: function(index, row, changes){
			var cell 	   = $(this).datagrid('cell');
			var ed 		   = get_editor ('#table_data_perkiraan', index, cell.field);
			var row_update = {};

			switch(cell.field) {
				case 'kodeperkiraan': 
					var data           = ed.combogrid('grid').datagrid('getSelected');
					var id             = data ? data.id : '';
					var nama           = data ? data.nama : '';
					var saldo          = data ? data.saldo : '';
					var uuidcurrency   = data ? data.uuidcurrency : '{{  session('UUIDCURRENCY') }}';
					var simbolcurrency = data ? data.simbolcurrency : '{{  session('SIMBOLCURRENCY') }}';

					if (id == $('#IDPERKIRAANKAS').combogrid('getValue')) {
						$.messager.show({
							title  : 'Warning',
							msg	   : 'Perkiraan Yang Diinput Tidak Boleh Sama Dengan Header',
							timeout: {{  session('TIMEOUT') }},
						});

						$(dg).datagrid('deleteRow', index);
					}

					var jtrans = 'KAS KELUAR';
					if (jtrans.search(/Masuk/i) > 0) {
						saldo = 'KREDIT';
					} else if (jtrans.search(/Keluar/i) > 0) {
						saldo = 'DEBET';
					} else {
						saldo = '';
					}

					row_update = {
						idperkiraan  : id,
						namaperkiraan: nama,
						uuidcurrency : uuidcurrency,
						currency     : simbolcurrency,
						saldo        : saldo,
						nilaikurs    : 1,
						amount       : 0,
						amountkurs   : 0,
						keterangan   : '',
					};
					break;
				case 'currency' :
					var data   = ed.combogrid('grid').datagrid('getSelected');
					row_update = {
						uuidcurrency: data ? data.id : '',
						nilaikurs : 1,
					};
					break;
				case 'nilaikurs' :
					var nilaikurs = ed.numberbox('getValue');
					if (row.uuidcurrency == '{{  session('UUIDCURRENCY') }}' && nilaikurs > 1) {
						nilaikurs = 1;
					}

					row_update = {
						nilaikurs: nilaikurs,
					};
					break;
			}

			if (jQuery.isEmptyObject(row_update) == false) {
				$(this).datagrid('updateRow', {
					index: index,
					row  : row_update
				});
			}
		},
		onAfterEdit: function(index, row, changes) {
			$(this).datagrid('updateRow', {
				index: index,
				row  : {
					amountkurs: row.nilaikurs * row.amount
				}
			});

			hitung_debet_kredit();
		}
	}).datagrid('enableCellEditing');
}

function hitung_debet_kredit() {
	var rows   = $('#table_data_perkiraan').datagrid('getRows');

	var jtrans = '';
	var totaldebet = 0; 
	var totalkredit = 0;

	for (var i = 0; i < rows.length; i++) {
		totaldebet += (rows[i].saldo=='DEBET') ? parseFloat(rows[i].amountkurs) : 0;
		totalkredit += (rows[i].saldo=='KREDIT') ? parseFloat(rows[i].amountkurs) : 0;
	}
	
	if($('#SAMAKANDEBETKREDIT').prop("checked"))
	{
		$('#IDCURRENCY').combogrid('setValue',"{{  session('UUIDCURRENCY') }}");
		$('#NILAIKURS').numberbox('setValue',1);

		$('#AMOUNT').numberbox('setValue', totaldebet-totalkredit);
		
		$('#AMOUNTKURS').numberbox('setValue', $('#AMOUNT').numberbox('getValue'));
	}
	
	var amount = parseFloat($('#AMOUNTKURS').numberbox('getValue'));
	
	if (isNaN(amount) == true)
		amount = 0;
		
	if (amount<0){
		jtrans = 'KAS MASUK';
	} else {
		jtrans = 'KAS KELUAR';
	}
	
	if (jtrans.search(/MASUK/i) > 0) {
		totaldebet += -amount;
	} else if (jtrans.search(/KELUAR/i) > 0) {
		totalkredit += amount;
	}

	$('#TOTALDEBET').numberbox('setValue', totaldebet);
	$('#TOTALKREDIT').numberbox('setValue', totalkredit);
}

function reload_footer() {
	var dg     = $('#table_data_detail');
	var rows   = dg.datagrid('getRows');
	var rowUpd = {sisa2: 0, sisa: 0, pelunasan: 0};
	for (let i = 0, ln = rows.length; i < ln; i++) {
		rowUpd.pelunasan += parseFloat(rows[i].pelunasan);
		rowUpd.sisa += parseFloat(rows[i].sisa);
		rowUpd.sisa2 += parseFloat(rows[i].sisa2);
	}
	
	dg.datagrid('reloadFooter', [rowUpd]);
}

function clear_plugin() {
	$('.combogrid-f').each( function() {
		$(this).combogrid('grid').datagrid('load', {q:''});
	});

	$('#IDCURRENCY').combogrid('setValue', '{{  session('UUIDCURRENCY') }}');

	$("#TGLTRANS").add($("#TGLCAIRGIRO")).datebox('setValue', date_format());

	//$('#JENISKAS').combobox('setValue', 'KAS MASUK');

	$('.number').numberbox('setValue', 0);
	$('#NILAIKURS').numberbox('setValue', 1);
}

async function getConfigMenu() {
	try {
	const res = await fetchData(
		'{{ session('TOKEN') }}', link_api.loadConfigPelunasanHutang, {
		kodemenu: '{{ $kodemenu }}'
		}
	);
	if (res.success) {
    // AYAT SILANG
    ayatsilang = res.data.AYATSILANG

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
