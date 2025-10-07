@extends('template.form')

@section('content')
<div id="form_input" class="easyui-layout" fit="true">
	<div data-options="region:'center',border:false">
		<div class="easyui-layout" fit="true" >
			<div data-options="region:'center',border:false ">
				<div class="easyui-layout" style="height:100%" id="trans_layout" >
					<script>
						if(screen.height <= 1080) $("#trans_layout").css('height',"350px");
					</script>
					<div data-options="region:'north',border:false" style="width:100%; height:200px;">
						<div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>
						<input type="hidden" id="mode" name="mode">
						<input type="hidden" id="UUIDCREDITNOTE" name="uuidcreditnote">
						<table width="100%">
							<tr>
								<td>
									<table>
										<tr>
											<td valign="top">
												<table>
													<tr>
														<td id="label_form">No. Transaksi</td>
														<td id="label_form">
															<input id="KODECREDITNOTE" name="kodecreditnote" class="label_input" style="width:180px">
														</td>
													</tr>
													<tr>
														<td id="label_form">Tgl. Trans</td>
														<td><input id="TGLTRANS" name="tgltrans" class="date" style="width:100px"/></td>
													</tr>
													<tr>
														<td id="label_form">Lokasi</td>
														<td id="label_form"><input name="uuidlokasi" id="UUIDLOKASI" style="width:190px"></td>
													</tr>
													<tr>
														<td id="label_form">Customer</td>
														<td id="label_form"><input id="UUIDCUSTOMER" name="uuidcustomer" class="label_input" style="width:300px" required="true"></td>
													</tr>
													<tr>
														<td id="label_form">Nominal</td>
														<td>
															<input id="AMOUNT" name="amount" style="width:100px;" class="number">
														</td>
													</tr>
													<tr>
														<td id="label_form" valign="top">Keterangan</td>
														<td id="label_form"><textarea rows="3" name="catatan" class="label_input" id="CATATAN" multiline="true" style="width:300px; height:50px" validType='length[0,300]' required="true"></textarea></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>	
						<div style="position: fixed;bottom:0;background-color: white;width:100%;">
							<table cellpadding="0" cellspacing="0" style="width:100%">
								<tr>
									<td align="left" id="label_form">
										<label style="font-weight:normal" id="label_form">User Input :</label>
										<label id="lbl_kasir"></label>
										<label style="font-weight:normal" id="label_form">| Tgl Input :</label>
										<label id="lbl_tanggal"></label>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
		<br>
		<a  title="Simpan" class="easyui-tooltip "iconCls=""  data-options="plain:false" id='btn_simpan' onclick="javascript:simpan()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
		<br><br>
		<a  title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false" onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}" ></a>			
	 </div>
</div>
@endsection

@push('js')
<script src="{{ asset('assets/js/utils.js') }}"></script>
<script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
<script>
var cekbtnsimpan = true; //CEK APAKAH TOMBOL SIMPAN BISA DITEKAN ATAU BELUM (SUPAYA TIDAK TERKLIK 2x)
var idtrans = "";
var row = {};
$(document).ready(async function(){
	
	browse_data_lokasi('#UUIDLOKASI');
	browse_data_customer('#UUIDCUSTOMER');

	await getConfigMenu()
	
	@if ($mode == 'tambah')
		await tambah();
	@elseif ($mode == 'ubah')
		await ubah();
	@endif

	tutupLoader();
})

shortcut.add('F8', function() {
	simpan();
});

function tutup(){
	parent.tutupTab();
}

function tambah() {
	$('#form_input').form('clear');
	$('#mode').val('tambah');
	
  document.getElementById('btn_simpan').onclick = simpan; $('#btn_simpan').css('filter', '');
	$('#lbl_kasir, #lbl_tanggal').html('');
	$('#KODETRANS').textbox('readonly',false);
	
	clear_plugin();
}

async function ubah() {
	$('#mode').val('ubah');
	 
	const response = await fetchData(
			'{{ session('TOKEN') }}',
			link_api.loadDataHeaderCreditNote, {
			uuidcreditnote: '{{ $data }}'
		}
	);
	if(response.success) {
		row = response.data;
	} else {
		$.messager.alert('Error', response.message, 'error');
	}
	
	if (row) {
		get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
			data = data.data;
			var UT = data.ubah;
			get_status_trans('{{ session("TOKEN") }}', "atena/keuangan/nota-kredit", "uuidcreditnote", row.uuidcreditnote, function(data) {

				// $(".form_status").html(status_transaksi(data.data.status));
				if (UT == 1 && data.data.status == 'I') {
					document.getElementById('btn_simpan').onclick = simpan; $('#btn_simpan').css('filter', '');
					$('#mode').val('ubah');
				} else {
					document.getElementById('btn_simpan').onclick = ''; $('#btn_simpan').css('filter', 'grayscale(100%)');
				}

				$('#form_input').form('load',row);

				$('#lbl_kasir').html(row.userentry);
				$('#lbl_tanggal').html(row.tglentry);
				
				$('#UUIDCUSTOMER').combogrid('setValue', {uuidcustomer: row.uuidcustomer, nama: row.namacustomer})
			});
		});
	}
}

async function simpan() {
	var mode    = $("#mode").val();
	var datanya = $("#form_input :input").serialize();
	var isValid = $('#form_input').form('validate');

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

			let url = link_api.simpanCreditNote;
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
					} else {
							await ubah();
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

/* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */
function browse_data_lokasi(id) {
	$(id).combogrid({
		panelWidth    : 400,
		url           : link_api.browseLokasi,
		idField       : 'uuidlokasi',
		textField     : 'nama',
		mode          : 'local',
		sortName      : 'nama',
		sortOrder     : 'asc',
		required	  : true,
		columns       : [[
			{
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
		]],
	});
}

function browse_data_customer(id) {
	$(id).combogrid({
		panelWidth: 880,
		url       : link_api.browseCustomer,
		idField   : 'uuidcustomer',
		textField : 'nama',
		multiple  : false,
		mode      : 'remote',
		sortName  : 'nama',
		sortOrder : 'asc',
		rowStyler : function(index, row) {
			if (row.status == 0){
				return 'background-color:#A8AEA6';
			}
		},
		columns:[[
			{field:'kode',title:'Kode',width:150, sortable:true},
			{field:'nama',title:'Nama',width:300, sortable:true},
			{field:'alamat',title:'Alamat',width:300, sortable:true},
			{field:'kota',title:'Kota',width:100, sortable:true},
		]]
	});
}

function clear_plugin() {
	$('.combogrid-f').each(function(){
		$(this).combogrid('grid').datagrid('load', {q:''});
	});

	$("#TGLTRANS, #TGLJATUHTEMPO").datebox('setValue', date_format());

	$('.number').numberbox('setValue', 0);
}

async function getConfigMenu() {
	try {
	const res = await fetchData(
		'{{ session('TOKEN') }}', link_api.loadConfigCreditNote, {
		kodemenu: '{{ $kodemenu }}'
		}
	);
	if (res.success) {
    // KODE
		if (res.data.KODE == "AUTO") {
      $('#KODECREDITNOTE').textbox({
				prompt: "Auto Generate",
				readonly: true,
				required: false
			});
		} else {
			$('#KODECREDITNOTE').textbox({
				prompt: "",
				readonly: false,
				required: true
			});
			$('#KODECREDITNOTE').textbox('clear').textbox('textbox').focus();
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
