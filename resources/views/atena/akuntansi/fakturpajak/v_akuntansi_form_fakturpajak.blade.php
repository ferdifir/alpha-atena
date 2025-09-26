@extends('template.form')

@section('content')
<div id="form_input" class="easyui-layout" fit="true">
	<div data-options="region:'center',border:false">
		<div class="easyui-layout" fit="true">
			<div data-options="region:'center',border:false ">
				<div class="easyui-layout" style="height:100%" id="trans_layout">
					<script>
						if (screen.height < 450) $("#trans_layout").css('height', "450px");
					</script>
					<div data-options="region:'north',border:false" style="width:100%; height:153px;">
						<div class="form_status" style="position:absolute; margin-top:5px; margin-left:85%;z-index:2;"></div>
						<table>
							<input type="hidden" id="mode" name="mode">
							<tr>
								<td valign="top">
									<fieldset style="height:100px;">
										<legend id="label_laporan">Info Transaksi</legend>
										<table border="0">
											<tr>
												<td id="label_form">No. SPT</td>
												<td id="label_form"><input name="nospt" id="NOSPT" class="label_input" style="width:250px"></td>
												<input type="hidden" id="UUIDFAKTURPAJAK" name="uuidfakturpajak">
											</tr>
											<tr>
												<td id="label_form">Tgl. Trans</td>
												<td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date" style="width:250px"></td>
											</tr>
										</table>
									</fieldset>
								</td>
								<td valign="top">
									<fieldset style="height:100px;">
										<legend id="label_laporan">Masa Pajak</legend>
										<table border="0">
											<tr>
												<td id="label_form">Pembetulan Ke</td>
												<td id="label_form"><input name="pembetulanke" id="PEMBETULANKE" class="easyui-numberspinner" style="width:80px" prompt=""></td>
											</tr>
											<tr>
												<td id="label_form">Tahun</td>
												<td id="label_form">
													<input name="txttahun" id="TXTTAHUN" class="easyui-numberspinner" style="width:80px" prompt="Tahun" required>
													&nbsp;&nbsp; Bulan &nbsp;&nbsp;<select name="bulanawal" id="BULANAWAL" class="easyui-combobox" style="width:95px;" required>
														<option value="01">JANUARI</option>
														<option value="02">FEBRUARI</option>
														<option value="03">MARET</option>
														<option value="04">APRIL</option>
														<option value="05">MEI</option>
														<option value="06">JUNI</option>
														<option value="07">JULI</option>
														<option value="08">AGUSTUS</option>
														<option value="09">SEPTEMBER</option>
														<option value="10">OKTOBER</option>
														<option value="11">NOVEMBER</option>
														<option value="12">DESEMBER</option>
													</select>
											</tr>
											<tr>
												<td>
													<a  class="easyui-linkbutton" iconCls="icon-save" id='btn_tampil' style="width:90px" onclick="javascript:tampil()">Tampilkan</a>
												</td>
											</tr>
										</table>
									</fieldset>
								</td>
								<td>
									<u style="padding-left:10px; font-weight:bold;">Keterangan</u>
									<table border="0" style="padding-left:10px;">
										<tr>
											<td>I.1 Ekspor BKP Berwujud</td>
											<td>II.4 DPP Nilai Lain</td>
										</tr>
										<tr>
											<td>I.2 Ekspor BKP Tidak Berwujud</td>
											<td>II.5 Deemed Pajak Masukan</td>
										</tr>
										<tr>
											<td>I.3 Ekspor BKP JKP</td>
											<td>II.6 Penyerahan Lainnya</td>
										</tr>
										<tr>
											<td>II.1 Kepada Pihak Lain yang Bukan Pemungut PPN</td>
											<td>II.7 Penyerahan yang PPN-nya Tidak Dipungut</td>
										</tr>
										<tr>
											<td>II.2 Kepada Pemungut Bendaharawan</td>
											<td>II.8 Penyerahan yang PPN-nya Dibebaskan</td>
										</tr>
										<tr>
											<td>II.3 Kepada Pemungut Selain Bendaharawan</td>
											<td>II.9 Penyerahan Aktiva (Pasal 16D UU PPN)</td>
										</tr>
										<!-- <tr>
											<td id="label_form"><textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan" style="width:300px; height:95px" data-options="validType:'length[0, 500]'"></textarea></td>
										</tr> -->
									</table>
								</td>
							</tr>
						</table>
					</div>
					<div data-options="region:'center',border:false">
						<div class="easyui-tabs" plain='true' fit="true">
							<div title="Pajak Keluaran">
								<table id="table_data_detail" fit="true"></table>
							</div>
						</div>
					</div>
					<div data-options="region:'south',border:false" style="width:100%; height:60px;">
						<table id="trans_footer" width="100%">
							<tr>
								<td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl. Input :</label> <label id="lbl_tanggal"></label></td>
								<td id="HIDDENTOTAL" align='right' valign='top'>
									<table>
										<tr>
											DPP
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											PPN
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											PPnBM
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</tr>
										<tr>
											<td id="label_form" align="right">
												Faktur Pajak Yang Ditanggung &nbsp;&nbsp;
												<input name="totaldpp" id="TOTALDPP" class="number " style="width:100px;" readonly>
											</td>
											<td id="label_form" align="right">
												<input name="totalppn" id="TOTALPPN" class="number" style="width:100px;" readonly>
											</td>
											<td id="label_form" align="right">
												<input name="totalppnbm" id="TOTALPPNBM" class="number" style="width:100px;" readonly>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<input type="hidden" id="data_detail" name="data_detail">
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
<br>

<div id="window_button_simpan" class="easyui-window" title="Konfirmasi" data-options="modal:true,closed:true" style="height:164cm;padding:15px 10px 10px 10px;top:20px">
	<center>
		<div id="button_simpan">

			<a  title="Simpan" class="easyui-linkbutton button_add" id='simpan_saja' onclick="simpan(this.id)" style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan</a><br><br>
			<a  title="Simpan & Cetak" class="easyui-linkbutton button_add_print" id='simpan_cetak' onclick="simpan(this.id)" style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan & Cetak</a>

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
var cekbtnsimpan = true; //CEK APAKAH TOMBOL SIMPAN BISA DITEKAN ATAU BELUM (SUPAYA TIDAK TERKLIK 2x)
var row = {};
var indexCellEdit = -1;
var lihatHarga = false
$(document).ready(async function() {
	await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        lihatHarga=data.data.lihatharga == 1;
		if(!lihatHarga) {
			$('#HIDDENTOTAL').hide()
		}
    },false);

	let check1 = false;
	let aksesubah = 0;
	let config
	const promises = [];
	promises.push(getConfig('NOSPT', 'TFAKTURPAJAK',  'bearer {{ session('TOKEN') }}',
		function(response) {
			if (response.success) {
				config = response.data;
				check1 = true;
			} else {
				if ((response.message ?? "").toLowerCase() == "token tidak valid.") {
					window.alert("Login session sudah habis. Silahkan Login Kembali");
				} else {
					$.messager.alert('Error', error, 'error');
				}
			}
		},
		function(error) {
			$.messager.alert('Error', "Request Config Error", 'error');
		}));

	await Promise.all(promises);

	if (!check1) return;

	if (config.value == "AUTO") {
		$('#NOSPT').textbox({
			prompt: "Auto Generate",
			readonly: true,
			required: false
		});
	} else {
		$('#NOSPT').textbox({
			prompt: "",
			readonly: false,
			required: true
		});
		$('#NOSPT').textbox('clear').textbox('textbox').focus();
	}

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
				export_excel('Faktur Pajak', $("#area_cetak").html());
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

	buat_table_detail()

	@if ($mode == 'tambah')
		await tambah();
	@elseif ($mode == 'ubah')
		await ubah(aksesubah);
	@endif

	tutupLoader();
})

shortcut.add('F8', async function() {
	await simpan();
});

function tutup() {
	parent.tutupTab();
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

var idTrans = "";

function tambah() {
	$('#form_input').form('clear');
	$('#mode').val('tambah');


	$('#lbl_kasir, #lbl_tanggal').html('');
	$('#TGLTRANS').datebox('readonly');
	$('#PEMBETULANKE').numberspinner('readonly', false).numberspinner('setValue', 0);
	$('#TXTTAHUN').numberspinner('readonly', false).numberspinner('setValue', '{{ date('Y') }}');
	$('#BULANAWAL').combobox('readonly', false).combobox('setValue', '{{ date('m') }}');
	// $('#BULANAKHIR').combobox('readonly',false).combobox('setValue','<?= date('m') ?>');
	$('#btn_tampil').linkbutton('enable');

	idtrans = "";

	clear_plugin();
	reset_detail();
}

async function ubah() {
	$(':radio:not(:checked)').attr('disabled', false);
	$('#mode').val('ubah');

	try {
		const response = await fetchData(
			'{{ session('TOKEN') }}',
			link_api.loadTransaksiDataHeaderFakturPajak, {
			uuidfakturpajak: '{{ $data }}'
			}
		);
		if(response.success) {
			row = response.data;
		} else {
			$.messager.alert('Error', res.message, 'error');
		}
	} catch (e) {
		const error = typeof e === "string" ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
	}

	if (row) {

		$('#lbl_kasir').html(row.userbuat);
		$('#lbl_tanggal').html(row.tglentry);

		get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          data = data.data;
          var UT = data.ubah;
		  console.log('ubah' + UT)
          get_status_trans('{{ session("TOKEN") }}', "atena/akuntansi/faktur-pajak", "uuidfakturpajak", row.uuidfakturpajak, function(data) {
            if (UT == 1 && data.data.status == 'I') {
				$('#btn_simpan_modal').css('filter', '');
				$('#mode').val('ubah');
			} else {
				document.getElementById('btn_simpan_modal').onclick = '';
				$('#btn_simpan_modal').css('filter', 'grayscale(100%)');
				$('#btn_simpan_modal').removeAttr('onclick');
			}

			$("#form_input").form('load', row);
			$('#TGLTRANS').datebox('readonly', false);
			$('#NOSPT').textbox('readonly');
			$('#TGLTRANS').combobox('readonly');
			$('#TXTTAHUN').numberspinner('readonly').numberspinner('setValue', row.tahun);;
			$('#BULANAWAL').combobox('readonly').combobox('setValue', 
				String(row.bulanawal).padStart(2, '0')
			);
			// $('#BULANAKHIR').combobox('readonly').combobox('setValue',row.BULANAKHIR.padStart(2, '0'));
			// $('#PEMBETULANKE').numberspinner('readonly').numberspinner('setValue',parseFloat(row.PEMBETULANKE) + 1);
			$('#btn_tampil').linkbutton('disable');

			load_data(row.uuidfakturpajak);

          });
        });
	}
}

async function tampil() {
	//var idlokasi = $("#IDLOKASI").combogrid('getValue');
	var tahun = $("#TXTTAHUN").textbox('getValue');
	var blnawal = $("#BULANAWAL").textbox('getValue');
	// var blnakhir = $("#BULANAKHIR").textbox('getValue');
	reset_detail();

	try {
		const response = await fetchData(
			'{{ session('TOKEN') }}',
			link_api.tampilTransaksiFakturPajak, {
				tahun: tahun,
				bulanawal : +blnawal
			}
		);
		if(response.success) {
			$('#table_data_detail').datagrid('loadData', response.data);
			hitung_grandtotal();
		} else {
			$.messager.alert('Error', res.message, 'error');
		}
	} catch (e) {
		const error = typeof e === "string" ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
	}
}

async function simpan(jenis_simpan) {
	$(':radio:not(:checked)').attr('disabled', false);
	var mode = $("#mode").val();

	$('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getChecked')));

	var datanya = $("#form_input :input").serialize();
	var isValid = $('#form_input').form('validate');

	$('#window_button_simpan').window('close');

	// if (isValid) {
	// 	isValid = cek_datagrid($('#table_data_detail'));
	// }
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

			// harus integer
			requestBody['bulanawal'] = +requestBody['bulanawal']

            requestBody.data_detail = $('#table_data_detail').datagrid('getChecked');

            requestBody.jenis_simpan = jenis_simpan;

            let url = link_api.simpanFakturPajak;
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
                    await cetak(response.data.uuidfakturpajak);
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

function before_simpan() {
	get_akses_user('<?= $kodemenu ?>', function(data) {
		if (data.tambah == 1) {
			$.messager.confirm('Confirm', 'Anda Yakin Akan Simpan Transaksi Faktur Pajak?', function(r) {
				if (r) {
					simpan();
					//untuk verifikasi
					//$('#verify').dialog('open').dialog('setTitle', 'Verification');
				}
			});
		} else {
			$.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
		}
	});
}

function reset_detail() {
	$('#table_data_detail').datagrid('loadData', []);
}

async function load_data(uuidfakturpajak) {
	try {
		const response = await fetchData(
			'{{ session('TOKEN') }}',
			link_api.loadDataFakturPajak, {
				uuidfakturpajak: uuidfakturpajak
			}
		);
		if(response.success) {
			$('#table_data_detail').datagrid('loadData', response.data).datagrid('checkAll');
		} else {
			$.messager.alert('Error', res.message, 'error');
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
		panelWidth: 400,
		url: link_api.browseLokasi,
		idField: 'uuidlokasi',
		textField: 'nama',
		mode: 'local',
		sortName: 'kode',
		sortOrder: 'asc',
		//required  : true,
		readonly: true,
		selectFirstRow: true,
		columns: [
			[{
					field: 'uuidlokasi',
					hidden: true
				},
				{
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
			]
		],
		onSelect: function(index, row) {
			//$(id).combogrid('options').onChange.call();
			$("#KODELOKASI").val(row.kode);
		},
		onLoadSuccess: function(data) {
			if (data.total == 1) {
				var rows = data.rows;
				$(this).combogrid('setValue', rows[0].kode).combogrid('readonly');
			}
		},
		onChange: function(newVal, oldVal) {
			/*var row = $(id).combogrid('grid').datagrid('getSelected');
			if (row) {
				var supp = $("#IDSUPPLIER").combogrid('getValue');
				url = base_url + 'atena/Akuntansi/Transaksi/FakturPajak/comboGrid'+ '/' +  row.ID + '/' + supp;
				
				ubah_url_combogrid($("#IDBBM"), url, true);
			}
			if ($('#mode').val()!='') {
				reset_detail();
			}*/
		}
	});
}

var before_edited = {};

function buat_table_detail() {
	var dg = '#table_data_detail';
	$(dg).datagrid({
		clickToEdit: false,
		dblclickToEdit: true,
		dblclickToEdit: true,
		RowAdd: false,
		RowDelete: false,
		singleSelect: true,
		striped: true,
		rownumbers: true,
		showFooter: true,
		checkOnSelect: false,
		selectOnCheck: false,
		data: [],
		columns: [
			[{
					field: 'ck',
					checkbox: true,
				},
				{
					field: 'idjual',
					hidden: true
				},
				{
					field: 'idcustomer',
					hidden: true
				},
				{
					field: 'kodejual',
					title: 'No. Transaksi',
					width: 120
				},
				{
					field: 'nofakturpajak',
					title: 'No. Faktur Pajak',
					width: 130,
					editor: {
						type: 'textbox',
						options: {
							required: true,
						}
					}
				},
				{
					field: 'tglfakturpajak',
					title: 'Tgl. Faktur Pajak',
					width: 100,
					formatter: ubah_tgl_indo,
					align: 'center',
				},
				{
					field: 'tipedokumen',
					title: 'Tipe Dokumen',
					align: 'center',
					width: 100,
					editor: {
						type: 'combobox',
						options: {
							required: true,
							data: [{
								value: 'DIGUNGGUNG',
								text: 'DIGUNGGUNG'
							}, {
								value: 'FAKTUR PAJAK',
								text: 'FAKTUR PAJAK'
							}, ],
							panelHeight: 'auto',
						}
					}
				},
				{
					field: 'dpp',
					title: 'DPP',
					align: 'right',
					width: 95,
					formatter: format_amount
				},
				// {field:'pajak1',title:'Pajak 1', align:'center', sortable:true, editor:{
				// 	type:'combobox', options:{ required: true, data: [{value:'1',text:'YA'}, {value:'0',text:'TIDAK'},], panelHeight: 'auto',}
				// }},
				// {field:'pajak1',title:'Pajak 1', align:'center', sortable:true, editor:{
				// 	type:'combobox', options:{ required: true, data: [{value:'1',text:'YA'}, {value:'0',text:'TIDAK'},], panelHeight: 'auto',}
				// }},
				{
					field: 'ppn',
					title: 'PPN',
					align: 'right',
					width: 95,
					formatter: format_amount
				},
				// {field:'pajak2',title:'Pajak 2', align:'center', sortable:true, formatter:format_checked,},
				{
					field: 'ppnbm',
					title: 'PPN BM',
					align: 'right',
					width: 95,
					formatter: format_amount
				},
				// {field:'abaikan',title:'Abaikan',align:'center',width:95,},
				// {field:'info1',title:'I.1', align:'center', sortable:true, formatter:format_checked,},
				// {field:'info2',title:'I.2', align:'center', sortable:true, formatter:format_checked,},
				// {field:'info3',title:'I.3', align:'center', sortable:true, formatter:format_checked,},
				// {field:'info4',title:'II.1', align:'center', sortable:true, formatter:format_checked,},
				// {field:'info5',title:'II.2', align:'center', sortable:true, formatter:format_checked,},
				// {field:'info6',title:'II.3', align:'center', sortable:true, formatter:format_checked,},
				// {field:'info7',title:'II.4', align:'center', sortable:true, formatter:format_checked,},
				// {field:'info8',title:'II.5', align:'center', sortable:true, formatter:format_checked,},
				// {field:'info9',title:'II.6', align:'center', sortable:true, formatter:format_checked,},
				// {field:'info10',title:'II.7', align:'center', sortable:true, formatter:format_checked,},
				// {field:'info11',title:'II.8', align:'center', sortable:true, formatter:format_checked,},
				// {field:'info12',title:'II.9', align:'center', sortable:true, formatter:format_checked,},
				{
					field: 'namafakturpajak',
					title: 'Nama Faktur Pajak',
					width: 150
				},
				{
					field: 'alamatfakturpajak',
					title: 'Alamat Faktur Pajak',
					width: 250
				},
				{
					field: 'nonpwp',
					title: 'No. NPWP',
					width: 130
				},
			]
		],
		onCellEdit: function(index, field, val) {
			var row = $(this).datagrid('getRows')[index];
			var ed = get_editor('#table_data_detail', index, field);

			before_edited = JSON.parse(JSON.stringify(row));

			if (field == 'tipedokumen') {
				ed.combogrid('showPanel');
			}
		},
		onEndEdit: async function(index, row, changes) {
			var cell = $(this).datagrid('cell');
			var ed = get_editor('#table_data_detail', index, cell.field);
			var row_update = {};

			if (changes.nofakturpajak) {
				await cekNoFakturPajak(changes.nofakturpajak, row.kodejual, index);
			}

			if (jQuery.isEmptyObject(row_update) == false) {
				$(this).datagrid('updateRow', {
					index: index,
					row: row_update
				});
			}
		},
		onCheck: function(index, row) {
			hitung_grandtotal();
		},
		onUncheck: function(index, row) {
			hitung_grandtotal();
		},
		onCheckAll: function(index, row) {
			hitung_grandtotal();
		},
		onUncheckAll: function(index, row) {
			hitung_grandtotal();
		},
	}).datagrid('enableCellEditing');
}

async function cekNoFakturPajak(no_faktur, kodejual, index) {
	// mengecek apakah sudah ada pada datagrid
	var rows = $('#table_data_detail').datagrid('getRows');

	for (var i = 0; i < rows.length; i++) {
		if (rows[i].nofakturpajak == no_faktur && rows[i].kodejual != kodejual) {
			$.messager.alert('Peringatan', `No. Faktur ${no_faktur} Sudah Digunakan Pada Transaksi ${rows[i].kodejual}`, 'error');

			$('#table_data_detail').datagrid('updateRow', {
				index: index,
				row: {
					nofakturpajak: before_edited.nofakturpajak
				}
			});

			return false;
		}
	}

	// mengecek apakah sudah ada pada database
	try {
		const response = await fetchData(
			'{{ session('TOKEN') }}',
			link_api.cekNoFakturPajak, {
				no_faktur: no_faktur,
				kodejual: kodejual
			}
		);
		if (!response.success) {
			$.messager.alert('Peringatan', response.errorMsg, 'error');
	
			$('#table_data_detail').datagrid('updateRow', {
				index: index,
				row: {
					nofakturpajak: before_edited.nofakturpajak
				}
			});
		}
	} catch (e) {
		const error = typeof e === "string" ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
	}
}

function hitung_grandtotal() {
	var data = $("#table_data_detail").datagrid('getChecked');
	var dpp = 0;
	var ppn = 0;
	var ppnbm = 0;

	for (var i = 0; i < data.length; i++) {
		dpp += parseFloat(data[i].dpp);
		ppn += parseFloat(data[i].ppn);
		ppnbm += parseFloat(data[i].ppnbm);
	}

	$("#TOTALDPP").numberbox('setValue', dpp);
	$("#TOTALPPN").numberbox('setValue', ppn);
	$("#TOTALPPNBM").numberbox('setValue', ppnbm);
}

function clear_plugin() {
	$('.combogrid-f').each(function() {
		$(this).combogrid('grid').datagrid('load', {
			q: ''
		});
	});

	$('.number').numberbox('setValue', 0);
	$("#TGLTRANS").datebox('setValue', date_format());
}
</script>
@endpush
