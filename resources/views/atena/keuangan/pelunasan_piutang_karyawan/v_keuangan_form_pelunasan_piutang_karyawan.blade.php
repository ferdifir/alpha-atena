@extends('template.form')

@section('content')
<div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">

        <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>

        <input type="hidden" id="mode" name="mode">
        <input type="hidden" id="IDPELUNASAN" name="uuidpelunasan">
        <input type="hidden" id="UUIDGIRO" name="uuidgiro">

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
                                                    <input name="idlokasi" id="UUIDLOKASI" style="width:190px">
                                                    <input type="hidden" id="KODELOKASI" name="kodelokasi">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="label_form">Tgl. Pelunasan</td>
                                                <td><input name="tgltrans" id="TGLTRANS" class="date" style="width:190px" /></td>
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
                                                    <input id="UUIDCURRENCY" name="uuidcurrency" style="width:50px;" />
                                                    <input id="NILAIKURS" name="nilaikurs" style="width:65px;" class="number">
                                                    <input id="AMOUNTKURS" name="amountkurs" style="width:129px;" class="number" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="label_form" align="left" valign="top">Keterangan</td>
                                                <td>
                                                    <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" style="width:364px; height:50px" validType='length[0,300]'></textarea>
                                                </td>
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
                                                <td><input id="UUIDKAS" class="label_input" name="uuidkas" style="width:180px"></td>
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
                                <td id="fm-giro" hidden>
                                    <fieldset style="height:150px">
                                        <legend>Informasi Giro Masuk</legend>
                                        <table border="0" style="padding:2px">
                                            <tr>
                                                <td id="label_form" align="left">No Giro</td>
                                                <td><input id="NOGIROMASUK" name="nogiromasuk" class="label_input" style="width:150px" prompt="No Giro"></td>
                                            </tr>
                                            <tr>
                                                <td id="label_form" align="left">Nama Bank</td>
                                                <td><input id="NAMABANKGIRO" name="namabankgiro" class="label_input" style="width:150px" prompt="Nama Bank Giro"></td>
                                            </tr>
                                            <tr>
                                                <td id="label_form" align="left">Tgl Cair</td>
                                                <td><input id="TGLCAIRGIRO" name="tglcairgiro" style="width:150px;" class="date"></td>
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
                        <table id="fm-filter">
                            <tr>
                                <td id="label_form">Karyawan</td>
                                <td><input name="uuidkaryawan" id="UUIDKARYAWAN" style="width:228px"></td>
                            </tr>
                            <tr>
                                <td id="label_form">Tanggal</td>
                                <td id="label_form">
                                    <input name="txt_tgl_aw" id="txt_tgl_aw" class="date" style="width:100px" />
                                    &nbsp;s/d&nbsp;
                                    <input name="txt_tgl_ak" id="txt_tgl_ak" class="date" style="width:100px" />
                                </td>
                                <td valign="bottom"><a id="btn_tampil" class="easyui-linkbutton" data-options="iconCls:'icon-search', plain:true" onclick="tampil_data()">Tampilkan</a></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
        <br>

        <a title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false" id='btn_simpan_modal' onclick="$('#window_button_simpan').window('open')"><img src="{{ asset('assets/images/simpan.png') }}"></a>

        <br><br>
        <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false" onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
    </div>
</div>

<div id="window_button_simpan" class="easyui-window" title="Konfirmasi" data-options="modal:true,closed:true" style="height:164cm;padding:15px 10px 10px 10px;top:20px">
    <center>
        <div id="button_simpan">

            <a title="Simpan" class="easyui-linkbutton button_add" id='simpan_saja' onclick="simpan(this.id)" style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan</a><br><br>
            <a title="Simpan & Cetak" class="easyui-linkbutton button_add_print" id='simpan_cetak' onclick="simpan(this.id)" style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan & Cetak</a>

            <div>
    </center>
</div>

<div id="form_cetak" title="Preview" style="width:660px; height:450px">
    <div id="area_cetak"></div>
</div>
@endsection

@push('js')
<script src="{{ asset('assets/js/utils.js') }}"></script>
<script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
<script>
var mode_load_data  = false;
var cekbtnsimpan    = true;   //CEK APAKAH TOMBOL SIMPAN BISA DITEKAN ATAU BELUM (SUPAYA TIDAK TERKLIK 2x)
var flag_get_jurnal = false   // jika false maka ger_jurnal_link belum selesai loading, sehingga tidak bisa simpan
var idtrans         = "";
var row             = {};
var ayatsilang;
$(document).ready(async function() {
	//TAMBAH CHECK AKSES CETAK
	get_akses_user('<?= $kodemenu ?>', 'bearer {{ session('TOKEN') }}', async function(data) {
		var UT = data.data.cetak;
		if (UT == 1){
			$('#simpan_cetak').css('filter', '');
		} else {
			$('#simpan_cetak').css('filter', 'grayscale(100%)');$('#simpan_cetak').removeAttr('onclick');
		}
	})

	await getConfigMenu()

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
							export_excel('Faktur Pelunasan Piutang', $("#area_cetak").html());
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

	browse_data_lokasi('#UUIDLOKASI');
	browse_data_referensi('#UUIDKARYAWAN');
	browse_data_kas_bank('#IDPERKIRAANKAS');
	browse_data_currency('#UUIDCURRENCY');
	browse_no_kas('#UUIDKAS');

	$('#AMOUNT').numberbox({
			onChange: function(newVal, oldVal) {
					var nilaikurs = $('#NILAIKURS').numberbox('getValue');
					var amountkurs = nilaikurs * $(this).numberbox('getValue');
					$('#AMOUNTKURS').numberbox('setValue', amountkurs);

					hitung_debet_kredit();
			}
	});

	$('#NILAIKURS').numberbox({
			onChange: function(newVal, oldVal) {
					var nilaikurs = parseFloat($(this).numberbox('getValue'));
					var row = $('#UUIDCURRENCY').combogrid('grid').datagrid('getSelected');
					if (row && row.id == '{{ session('UUIDCURRENCY') }}') {
							$(this).numberbox('setValue', 1);
							nilaikurs = 1;
					} else {
							if (nilaikurs == 1 || nilaikurs == 0) {
									//$.messager.alert('Error', 'Nilai Kurs Tidak Boleh Diisi Angka 1 dan 0', 'error');
							}
					}

					var amount = $('#AMOUNT').numberbox('getValue');
					var amountkurs = amount * nilaikurs;
					$('#AMOUNTKURS').numberbox('setValue', amountkurs);

					hitung_debet_kredit();
			}
	});

	$('#TGLTRANS').datebox('readonly', ayatsilang == 1 ? 'true' : 'false');

	$('#SAMAKANDEBETKREDIT').change(function() {
			if (this.checked) {
					$("#AMOUNT").numberbox("readonly", true);
					$("#UUIDCURRENCY").combogrid("readonly", true);
					$("#NILAIKURS").numberbox("readonly", true);

			} else {
					$("#AMOUNT").numberbox("readonly", false);
					$("#UUIDCURRENCY").combogrid("readonly", false);
					$("#NILAIKURS").numberbox("readonly", false);
			}
			hitung_debet_kredit()
	});

	buat_table_detail();
	buat_table_detail_perkiraan();

	console.log('{{ $mode }}')
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

async function cetak(id, kode) {
	const doc = await getCetakDocument(
		'{{ session('TOKEN') }}',
		link_api.cetakPelunasanPiutangKaryawan + uuid
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

	flag_get_jurnal = false;

	$('#SAMAKANDEBETKREDIT').prop("checked", true);

	$("#AMOUNT").numberbox("readonly", true);
	$("#UUIDCURRENCY").combogrid("readonly", true);
	$("#NILAIKURS").numberbox("readonly", true);

	$('#TGLTRANS').datebox('readonly', false);

	$('#table_data_detail').datagrid('options').RowEdit = true;
	$('#table_data_perkiraan').datagrid('options').RowEdit = true;

	$("#txt_tgl_ak").datebox('readonly', false);
	$("#txt_tgl_aw").datebox('readonly', false);
	$('#btn_tampil').linkbutton('enable');

	clear_plugin();
	reset_detail();

}

async function ubah() {
	$('#mode').val('ubah');
	$('#SAMAKANDEBETKREDIT').prop("checked", true);

	const response = await fetchData(
		'{{ session('TOKEN') }}',
		link_api.loadDataHeaderPelunasanPiutangKaryawan, {
		uuidpelunasan: '{{ $data }}'
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
			get_status_trans('{{ session("TOKEN") }}', "atena/keuangan/pelunasan-piutang-karyawan", "uuidpelunasan", row.uuidpelunasan, async function(data) {
				$(".form_status").html(status_transaksi(data.data.status));
				if (UT == 1 && data.data.status == 'I') {
						$('#btn_simpan_modal').css('filter', '');
						$('#mode').val('ubah');
				} else {
						$('#btn_simpan_modal').css('filter', 'grayscale(100%)');
						$('#btn_simpan_modal').removeAttr('onclick');
				}

				$("#form_input").form('load', row);

				flag_get_jurnal = true;

				if (row.uuidmemo != '') {
					console.log(row.kodememo)
						$('#UUIDKAS').combogrid('setText', row.kodememo)
				} else {
						$('#UUIDKAS').combogrid('setText', row.kodekas)
				}

				$('#UUIDLOKASI').combogrid('setValue', {
						uuidlokasi: row.uuidlokasi,
						nama: row.namalokasi
				});

				$('#UUIDKARYAWAN').combogrid('readonly', true);

				$('#UUIDKARYAWAN').combogrid('setValue', {
					uuidkaryawan : row.uuidkaryawan,
					nama: row.namakaryawan
				});

				$('#table_data_detail').datagrid('options').RowEdit = false;
				$('#table_data_perkiraan').datagrid('options').RowEdit = false;

				$('#AMOUNTKAS').numberbox('setValue', row.total);

				await load_data(row.uuidpelunasan, row.kodepelunasan);

				$('#IDTANDATERIMA').combogrid('setText', row.kodetandaterima)

				$("#txt_tgl_ak").datebox('readonly', true).datebox('setValue', date_format());
				$("#txt_tgl_aw").datebox('readonly', true).datebox('setValue', getDateMinusDays(2));

				$('#btn_tampil').linkbutton('disable');

				$('#lbl_kasir').html(row.userbuat);
				$('#lbl_tanggal').html(row.tglentry);
			});
		});
	}
}

async function simpan(jenis_simpan) {
	$('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getChecked')));
	$('#data_detail_perkiraan').val(JSON.stringify($('#table_data_perkiraan').datagrid('getRows')));

	var mode = $("#mode").val();
	var dataheader = $("#form_input :input").serialize();

	var isValid = $('#form_input').form('validate');

	$('#window_button_simpan').window('close');

	if (!flag_get_jurnal) {
			return false;
	}

	if (isValid)
			isValid = cek_datagrid($('#table_data_detail'));

	var debet = parseFloat($('#TOTALDEBET').numberbox('getValue'));
	var kredit = parseFloat($('#TOTALKREDIT').numberbox('getValue'));

	if (debet != kredit) {
			isValid = false;
			$.messager.alert('Warning', 'Total Debet harus sama dengan Kredit', 'warning');
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

			requestBody.data_detail           = $('#table_data_detail').datagrid('getChecked');
			requestBody.data_detail_perkiraan = $('#table_data_perkiraan').datagrid('getRows');

			requestBody.jenis_simpan = jenis_simpan;

			let url = link_api.simpanPelunasanPiutangKaryawan;
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
						$('#table_data_detail').datagrid('loadData', []);
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
	$('#table_data_detail').datagrid('loadData', []);
	$('#table_data_perkiraan').datagrid('loadData', []);
}

async function get_jurnal() {
	if (mode_load_data) {
			return false;
	}

	flag_get_jurnal = false;

	var rows = $("#table_data_detail").datagrid('getChecked');

	if ($('#mode').val() == 'tambah') {
			var referensi = '';
			var daftar_karyawan = $('#UUIDKARYAWAN').combogrid('grid').datagrid('getSelections');

			for (var i = 0; i < daftar_karyawan.length; i++) {
					referensi += daftar_karyawan[i].nama;

					if (i != daftar_karyawan.length - 1) {
							referensi += ', ';
					}
			}

			$('#CATATAN').textbox('setValue', 'PELUNASAN PIUTANG DARI ' + referensi);
	}

	if(rows.length == 0)
		return

	try {
		const response = await fetchData(
			'{{ session('TOKEN') }}',
			link_api.getJurnalLinkPelunasanPiutangKaryawan, {
				data_detail  : rows,
				kodekasbank  : $('#UUIDKAS').combogrid('getValue'),
				kodepelunasan: $("#KODEPELUNASAN").val(),
				mode         : $("#mode").val()
			}
		);
		if(response.success) {
			flag_get_jurnal = true;
			$('#table_data_perkiraan').datagrid('loadData', msg.data_detail);
		} else {
			$.messager.alert('Error', response.message, 'error');
		}
	} catch (e) {
		const error = typeof e === "string" ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
	}
}

async function load_data(uuidpelunasan, kodepelunasan) {
	try {
		const response = await fetchData(
			'{{ session('TOKEN') }}',
			link_api.loadDataPelunasanPiutangKaryawan, {
				uuidpelunasan: uuidpelunasan,
				kodepelunasan: kodepelunasan
			}
		);
		if(response.success) {
			var msg = response.data
			if (msg.kasbank) {
				var data = msg.kasbank;

				$('#IDPERKIRAANKAS').combogrid('setValue', data.idperkiraan);
				$('#UUIDCURRENCY').combogrid('setValue', data.idcurrency);
				$('#NAMAPERKIRAANKAS').textbox('setValue', data.namaperkiraan);
				///$('#KETERANGAN').textbox('setValue', data.KETERANGAN);
				$('#AMOUNT').numberbox('setValue', data.amount);
				$('#AMOUNTKURS').numberbox('setValue', data.amountkurs);
				$('#NILAIKURS').numberbox('setValue', data.nilaikurs);
			}

			if (msg.giro) {
					var data = msg.giro;

					$('#NOGIROMASUK').textbox('setValue', data.nogiro)
					$('#NAMABANKGIRO').textbox('setValue', data.namabankgiro)
					$('#TGLCAIRGIRO').datebox('setValue', data.tglcair)
			}

			mode_load_data = true;
			$('#table_data_detail').datagrid('loadData', msg.detail_pelunasan).datagrid('checkAll');
			$('#table_data_perkiraan').datagrid('loadData', msg.detail_jurnal);

			$('#table_data_detail').datagrid('options').checkOnSelect = false;
			$('#table_data_detail').datagrid('checkAll')
			$('#table_data_detail').datagrid('getPanel').find('div.datagrid-header input[type=checkbox]').attr('disabled', 'disabled');
			$('#table_data_detail').datagrid('getPanel').find('div.datagrid-body input[type=checkbox]').attr('disabled', 'disabled');
			mode_load_data = false;
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

function reset_detail() {
	$('#table_data_detail').datagrid('loadData', []);
	$('#table_data_perkiraan').datagrid('loadData', []);
}

async function tampil_data() {
	var uuidlokasi = $('#UUIDLOKASI').combogrid('getValue');
	var uuidkaryawan = $('#UUIDKARYAWAN').combogrid('getValues');
	var txt_tgl_aw = $('#txt_tgl_aw').datebox('getValue');
	var txt_tgl_ak = $('#txt_tgl_ak').datebox('getValue');

	if (uuidlokasi == '') {
			$.messager.alert('Peringatan', 'Lokasi belum dipilih', 'warning');

			return;
	}

	try {
		const response = await fetchData(
			'{{ session('TOKEN') }}',
			link_api.loadPiutangPelunasanPiutang, {
				uuidcustomer: uuidcustomer,
				uuidlokasi  : uuidlokasi,
				tglawal     : $('#txt_tgl_aw').datebox('getValue'),
				tglakhir    : $('#txt_tgl_ak').datebox('getValue')
			}
		);

		if(response.success) {
			var msg = response.data
			$('#table_data_detail').datagrid('loadData', msg.data_detail);
			if (msg.data_detail.length == 0)
					$.messager.alert('Warning', 'Tidak Ada Piutang', 'warning');
			get_jurnal();
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

					reset_detail();
			}
	});
}

async function browse_data_referensi(id) {
	$(id).combogrid({
			panelWidth: 750,
			url       : link_api.browseKaryawan,
			idField   : 'uuidkaryawan',
			textField : 'nama',
			mode      : 'remote',
			multiple  : true,
			columns   : [
					[{
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
							{
									field: 'alamat',
									title: 'Alamat',
									width: 300,
									sortable: true
							},
							{
									field: 'kota',
									title: 'Kota',
									width: 100,
									sortable: true
							},
							{
									field: 'telp',
									title: 'Telp',
									width: 100,
									sortable: true
							},
					]
			],
			onChange: async function(newVal, oldVal) {
					if ($('#mode').val() != '') {
							var row = $(id).combogrid('grid').datagrid('getSelected');

							//$("#KODEKAS").combogrid('grid').datagrid('load', {referensi:''});
							//$('#AMOUNT').numberbox('setValue', 0);
							//$('#NOGIRO').val('');
							//$('#TGLTRANS').datebox('setValue', date_format());
							//$('#KETERANGAN').textbox('clear');
							await get_jurnal();
					}
			}
	});
}

async function browse_no_kas(id) {
	$(id).combogrid({
			panelWidth: 800,
			url       : link_api.browseKasPelunasan,
			idField   : 'uuidkas',
			textField : 'kodekas',
			mode      : 'remote',
			columns   : [
					[{
									field: 'kodekas',
									title: 'Kode Kas/Bank/Giro',
									width: 120,
									sortable: true
							},
							{
									field: 'tgltrans',
									title: 'Tgl. Trans',
									width: 80,
									sortable: true,
									align: 'center',
									formatter: ubah_tgl_indo
							},
							{
									field: 'total',
									title: 'Nominal ({{ session('SIMBOLCURRENCY') }})',
									width: 110,
									align: 'right',
									sortable: true,
									formatter: format_amount
							},
							{
									field: 'nogiro',
									title: 'No Giro',
									width: 130,
									sortable: true
							},
							{
									field: 'referensi',
									title: 'Referensi',
									width: 200,
									sortable: true
							},
							{
									field: 'keterangan',
									title: 'Keterangan',
									width: 250,
									sortable: true
							},
							{
									field: 'userbuat',
									title: 'User Entry',
									width: 110,
									sortable: true
							},
					]
			],
			onChange: async function(newVal, oldVal) {
					if ($('#mode').val() != '') {
							var row = $(id).combogrid('grid').datagrid('getSelected');
							if (row) {
									$('#AMOUNTKAS').numberbox('setValue', row.total);
									$('#NOGIRO').textbox('setValue', row.nogiro);
									$('#UUIDGIRO').val(row.uuidgiro);
									$('#TGLTRANS').datebox('setValue', ubah_tgl_indo(row.tgltrans));
							} else {
									$('#AMOUNTKAS').numberbox('setValue', 0);
									$('#NOGIRO').textbox('clear');
									$('#UUIDGIRO').val('');
									$('#TGLTRANS').datebox('setValue', date_format());
							}

							await get_jurnal();
					}
			}
	});
}

function browse_data_kas_bank(id) {
	$(id).combogrid({
			panelWidth: 370,
			url		  : link_api.browsePerkiraan,
			queryParams: {
				jenis: 'kas_bank_piutang',
				aktif: 1
			},
			idField   : 'uuidperkiraan',
			textField : 'kode',
			mode      : 'remote',
			required  : true,
			columns   : [
					[{
									field: 'kode',
									title: 'Kode',
									width: 70,
									sortable: true
							},
							{
									field: 'nama',
									title: 'Nama',
									width: 270,
									sortable: true
							}
					]
			],
			onChange: function(index, data) {
					var row = $(id).combogrid('grid').datagrid('getSelected');

					if (row) {
							var data_perkiraan = $('#table_data_perkiraan').datagrid('getRows');

							for (var i = 0; i < data_perkiraan.length; i++) {
									if (data_perkiraan[i].uuidperkiraan == row.uuidperkiraan) {
											$.messager.show({
													title: 'Warning',
													msg: 'Perkiraan Yang Diinput Tidak Boleh Sama Dengan Header',
													timeout: {{ session('TIMEOUT') }},
											});

											$(this).combogrid('clear');

											return false;
									}
							}

							$('#NAMAPERKIRAANKAS').textbox('setValue', row.nama);
							$('#UUIDCURRENCY').combogrid('setValue', row.uuidcurrency);

							if (row.kasbank != 0) {
									$('#NOGIROMASUK').textbox('clear');
									$('#NAMABANKGIRO').textbox('clear');
									$('#TGLCAIRGIRO').textbox('clear');
							}

					} else {
							$('#NAMAPERKIRAANKAS').textbox('clear');
							$('#UUIDCURRENCY').combogrid('clear');
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
			columns   : [
					[{
									field: 'nama',
									title: 'Curr',
									width: 100,
									sortable: true
							},
							{
									field: 'simbol',
									title: 'Simbol',
									width: 70,
									sortable: true
							}
					]
			],
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
			toolbar       : '#tb-filter',
			data          : [],
			columns       : [
					[{
									field: 'ck',
									checkbox: true,
							},
							{
									field: 'tgltrans',
									title: 'Tgl. Trans',
									width: 80,
									formatter: ubah_tgl_indo,
									align: 'center',
							},
							{
									field: 'kodetrans',
									title: 'No. Transaksi',
									width: 110,
							},
							{
									field: 'namakaryawan',
									title: 'Karyawan',
									width: 180,
							},
							{
									field: 'idkaryawan',
									hidden: true
							},
							{
									field: 'jenistransaksi',
									title: 'Jenis Trans',
									width: 80,
							},
							{
									field: 'total',
									title: 'Total',
									width: 100,
									align: 'right',
									formatter: format_amount,
							},
							{
									field: 'a',
									title: 'Sisa',
									width: 100,
									align: 'right',
									formatter: function(val, row) {
											return format_amount(parseFloat(row.sisa - row.pelunasan))
									}
							},
							{
									field: 'pelunasan',
									title: 'Pelunasan',
									width: 100,
									align: 'right',
									formatter: format_amount,
									editor: {
											type: 'numberbox',
											options: {
													required: true,
											}
									}
							},
							//{field:'jenistransaksi',title:'Transaksi',width:100},
							//{field:'kodetransmanual',title:'No. Trans. Manual',width:120},
							{
									field: 'keterangan',
									title: 'Keterangan',
									width: 300,
							},
					]
			],
			onClickRow: function(index, row) {
					indexDetail = index;
			},
			onLoadSuccess: function(data) {
					reload_footer();
			},
			onCheckAll: async function(rows) {
					if (mode_load_data) {
							return false;
					}

					if ($('#mode').val() != '') {
							var ln = rows.length;
							for (var i = 0; i < ln; i++) {
									$(this).datagrid('updateRow', {
											index: i,
											row: {
													pelunasan: rows[i].sisa,
											}
									});
							}
							await get_jurnal();
					}
					reload_footer();
			},
			onUncheckAll: async function(rows) {
					if (mode_load_data) {
							return false;
					}

					if ($('#mode').val() != '') {
							var ln = rows.length;
							for (var i = 0; i < ln; i++) {
									$(this).datagrid('updateRow', {
											index: i,
											row: {
													pelunasan: 0,
											}
									});
							}
							await get_jurnal();
					}
					reload_footer();
			},
			onCheck: async function(index, row) {
					if (mode_load_data) {
							return false;
					}

					$(this).datagrid('updateRow', {
							index: index,
							row: {
									pelunasan: row.sisa,
							}
					});
					reload_footer();
					await get_jurnal();
			},
			onUncheck: async function(index, row) {
					if (mode_load_data) {
							return false;
					}

					$(this).datagrid('updateRow', {
							index: index,
							row: {
									pelunasan: 0,
							}
					});
					reload_footer();
					await get_jurnal();
			},
			onCellEdit: function(index, field, val) {
					// pilih yang tercentang
					var row2 = $(this).datagrid('getChecked');

					var row = $(this).datagrid('getRows')[index];
					var ed = get_editor('#table_data_detail', index, field);

					ed.numberbox('readonly');

					var ln = row2.length
					for (var i = 0; i < ln; i++) {
							if (row2[i].kodetrans == row.kodetrans) {
									ed.numberbox('readonly', false);
							}
					}
			},
			onAfterEdit: async function(index, row, changes) {
					if (changes.pelunasan) {
							var msg = '';
							var sisa = parseFloat(row.sisa);
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
									$(this).datagrid('updateRow', {
											index: index,
											row: changes
									});

									$.messager.show({
											title: 'Warning',
											msg: msg,
											timeout: 1000,
									});
							}
					}
					reload_footer();
					await get_jurnal();
					hitung_debet_kredit();
			}
	}).datagrid('enableCellEditing');
}

function getRowIndex(target) {
	var tr = $(target).closest('tr.datagrid-row');
	return parseInt(tr.attr('datagrid-row-index'));
}

var indexDetail = 0; // UNTUK TOMBOL EDIT

function buat_table_detail_perkiraan() {
	var dg = '#table_data_perkiraan';
	$("#table_data_perkiraan").datagrid({
			rownumbers: true,
			clickToEdit: false,
			dblclickToEdit: true,
			data: [],
			toolbar: [{
							text: 'Tambah',
							iconCls: 'icon-add',
							handler: function() {
									var index = $(dg).datagrid('getRows').length;
									$(dg).datagrid('appendRow', {
											kodebarang: '',
									}).datagrid('gotoCell', {
											index: index,
											field: 'kodebarang'
									});

									getRowIndex(target);
							}
					}, {
							text: 'Hapus',
							iconCls: 'icon-remove',
							handler: function() {
									$(dg).datagrid('deleteRow', indexDetail);
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
			columns: [
					[{
									field: 'kodeperkiraan',
									title: 'Kd. Perkiraan',
									width: 110,
									editor: {
											type: 'combogrid',
											options: {
													panelWidth: 530,
													mode: 'remote',
													required: true,
													idField: 'kode',
													textField: 'kode',
													url        : link_api.browsePerkiraan,
													queryParams: {
														jenis: 'detail_non_kasbank',
														aktif: 1
													},
													columns: [
															[{
																			field: 'kode',
																			title: 'Kode',
																			width: 110
																	},
																	{
																			field: 'nama',
																			title: 'Nama',
																			width: 400
																	},
															]
													],
											}
									}
							},
							{
									field: 'namaperkiraan',
									title: 'Nama Perkiraan',
									width: 400
							},
							{
									field: 'saldo',
									title: 'Saldo',
									width: 70,
									editor: {
											type: 'combobox',
											options: {
													required: true,
													data: [{
															value: 'DEBET',
															text: 'DEBET'
													}, {
															value: 'KREDIT',
															text: 'KREDIT'
													}],
													panelHeight: 'auto',
											}
									}
							},
							{
									field: 'amount',
									title: 'Nominal',
									align: 'right',
									width: 100,
									formatter: format_amount,
									editor: {
											type: 'numberbox',
											options: {
													required: true,
													min: 0
											}
									},
									sortable: false,
									sorter: function(a, b) {
											a = parseFloat(a.replace(',', ''));
											b = parseFloat(b.replace(',', ''));

											return (a > b ? 1 : -1);
									}
							},
							{
									field: 'idcurrency',
									title: 'Curr Kode',
									width: 50,
									hidden: true,
							},
							{
									field: 'currency',
									title: 'Curr',
									width: 50,
									hidden: false,
									editor: {
											type: 'combogrid',
											options: {
													panelWidth: 200,
													mode: 'remote',
													required: true,
													idField: 'simbol',
													textField: 'simbol',
													url: link_api.browseCurrency,
													columns: [
															[{
																			field: 'nama',
																			title: 'Curr',
																			width: 100
																	},
																	{
																			field: 'simbol',
																			title: 'Simbol',
																			width: 70
																	},
															]
													],
											}
									}
							},
							{
									field: 'nilaikurs',
									title: 'Kurs ({{ session('SIMBOLCURRENCY') }})',
									align: 'right',
									width: 80,
									hidden: false,
									formatter: format_amount,
									editor: {
											type: 'numberbox',
											options: {
													required: true
											}
									}
							},
							{
									field: 'amountkurs',
									title: 'Nominal ({{ session('SIMBOLCURRENCY') }})',
									align: 'right',
									width: 110,
									hidden: false,
									formatter: format_amount
							},
							{
									field: 'keterangan',
									title: 'Keterangan',
									width: 350,
									editor: {
											type: 'validatebox',
											options: {
													required: true,
													validType: 'length[0,300]'
											}
									}
							},
							{
									field: 'tanda',
									hidden: true,
							},
					]
			],
			onClickRow: function(index, row) {
					indexDetail = index;
			},
			onLoadSuccess: function(data) {
					hitung_debet_kredit();
			},
			onAfterDeleteRow: function(index, row) {
					if (row.tanda == 1) {
							$(dg).datagrid('insertRow', {
									index: index,
									row: row
							});
							$.messager.alert('Warning', 'Akun dari Jurnal Program Tidak Boleh Dihapus', 'warning');
					}
					hitung_debet_kredit();
			},
			onCellEdit: function(index, field, val) {
					var row = $(this).datagrid('getRows')[index];
					var ed = get_editor('#table_data_perkiraan', index, field);

					switch (field) {
							case 'kodeperkiraan':
							case 'currency':
									ed.combogrid('showPanel');
									break;
							case 'saldo':
									ed.combobox('showPanel');
									break;
					}
			},
			onBeforeCellEdit: function(index, field) {
					var row = $(this).datagrid('getRows')[index];
					if (row.idcurrency == '{{ session('UUIDCURRENCY') }}' && field == 'nilaikurs') // jika tandakurs = 1, maka nilaikurs tidak boleh diedit
							return false;
					else if (row.tanda == 1 && field != 'keterangan') // jika tanda = 1, maka tidak boleh diedit
							return false;
			},
			onEndEdit: function(index, row, changes) {
					var cell = $(this).datagrid('cell');
					var ed = get_editor('#table_data_perkiraan', index, cell.field);
					var row_update = {};

					switch (cell.field) {
							case 'kodeperkiraan':
									var data = ed.combogrid('grid').datagrid('getSelected');

									var uuid           = data ? data.uuidperkiraan : '';
									var nama           = data ? data.nama : '';
									var saldo          = data ? data.saldo : '';
									var uuidcurrency   = data ? data.uuidcurrency : '{{ session('UUIDCURRENCY') }}';
									var simbolcurrency = data ? data.simbolcurrency : '{{ session('SIMBOLCURRENCY') }}';

									if (uuid == $('#IDPERKIRAANKAS').combogrid('getValue')) {
											$.messager.show({
													title: 'Warning',
													msg: 'Perkiraan Yang Diinput Tidak Boleh Sama Dengan Header',
													timeout: {{ session('TIMEOUT') }},
											});

											$(dg).datagrid('deleteRow', index);
									}

									var jtrans = 'KAS MASUK';
									if (jtrans.search(/Masuk/i) > 0) {
											saldo = 'KREDIT';
									} else if (jtrans.search(/Keluar/i) > 0) {
											saldo = 'DEBET';
									} else {
											saldo = '';
									}

									row_update = {
											uuidperkiraan: uuid,
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
							case 'currency':
									var data = ed.combogrid('grid').datagrid('getSelected');
									row_update = {
											uuidcurrency: data ? data.uuidcurrency : '',
											nilaikurs: 1,
									};
									break;
							case 'nilaikurs':
									var nilaikurs = ed.numberbox('getValue');
									if (row.idcurrency == '{{ session('UUIDCURRENCY') }}' && nilaikurs > 1) {
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
									row: row_update
							});
					}
			},
			onAfterEdit: function(index, row, changes) {
					$(this).datagrid('updateRow', {
							index: index,
							row: {
									amountkurs: row.nilaikurs * row.amount
							}
					});

					hitung_debet_kredit();
			}
	}).datagrid('enableCellEditing');
}

function hitung_debet_kredit() {
	var rows = $('#table_data_perkiraan').datagrid('getRows');


	var jtrans = '';
	var totaldebet = 0;
	var totalkredit = 0;

	for (var i = 0; i < rows.length; i++) {
			totaldebet += (rows[i].saldo == 'DEBET') ? parseFloat(rows[i].amountkurs) : 0;
			totalkredit += (rows[i].saldo == 'KREDIT') ? parseFloat(rows[i].amountkurs) : 0;
	}

	if ($('#SAMAKANDEBETKREDIT').prop("checked")) {
			$('#UUIDCURRENCY').combogrid('setValue', '{{ session('UUIDCURRENCY') }}');
			$('#NILAIKURS').numberbox('setValue', 1);

			$('#AMOUNT').numberbox('setValue', totalkredit - totaldebet);

			$('#AMOUNTKURS').numberbox('setValue', $('#AMOUNT').numberbox('getValue'));
	}

	var amount = parseFloat($('#AMOUNTKURS').numberbox('getValue'));

	if (isNaN(amount) == true)
			amount = 0;

	if (amount < 0) {
			jtrans = 'KAS KELUAR';
	} else {
			jtrans = 'KAS MASUK';
	}

	if (jtrans.search(/MASUK/i) > 0) {
			totaldebet += amount;
	} else if (jtrans.search(/KELUAR/i) > 0) {
			totalkredit += -amount;
	}

	$('#TOTALDEBET').numberbox('setValue', totaldebet);
	$('#TOTALKREDIT').numberbox('setValue', totalkredit);
}

function reload_footer() {
	var dg = $('#table_data_detail');
	var rows = dg.datagrid('getChecked');
	var rowUpd = {
			sisa: 0,
			pelunasan: 0
	};

	for (let i = 0, ln = rows.length; i < ln; i++) {
			rowUpd.pelunasan += parseFloat(rows[i].pelunasan);
	}
	rows = dg.datagrid('getRows');
	for (let i = 0, ln = rows.length; i < ln; i++) {
			rowUpd.sisa += parseFloat(rows[i].sisa);
	}

	dg.datagrid('reloadFooter', [rowUpd]);
}

function clear_plugin() {
	$('.combogrid-f').each(function() {
			$(this).combogrid('grid').datagrid('load', {
					q: ''
			});
	});

	$('#UUIDCURRENCY').combogrid('setValue', '{{ session('UUIDCURRENCY') }}');

	$("#TGLTRANS").add($("#txt_tgl_aw")).
	add($("#txt_tgl_ak")).add($('#TGLCAIRGIRO')).datebox('setValue', date_format());

	//$('#JENISKAS').combobox('setValue', 'KAS MASUK');

	$('.number').numberbox('setValue', 0);
	$('#NILAIKURS').numberbox('setValue', 1);
}

async function getConfigMenu() {
	try {
	const res = await fetchData(
		'{{ session('TOKEN') }}', link_api.loadConfigPelunasanPiutang, {
		kodemenu: '{{ $kodemenu }}'
		}
	);
	if (res.success) {
    // AYAT SILANG
    ayatsilang = res.data.AYATSILANG

		if(ayatsilang == 0) {
			$('.ayatsilang0').show()
			$('.ayatsilang1').hide()
		}else{
			$('.ayatsilang1').show()
			$('.ayatsilang0').hide()
		}

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
