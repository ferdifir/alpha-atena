@extends('template.form')

@section('content')
<div id="form_input" class="easyui-layout" fit="true">
	<div data-options="region:'center',border:false">
		<div class="easyui-layout" fit="true" >
			<div data-options="region:'center',border:false ">
				<div class="easyui-layout" style="height:100%" id="trans_layout" >
					<div data-options="region:'north',border:false" style="width:100%; height:500px;">
						<div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;" ></div>
						<input type="hidden" id="mode" name="mode">
						<input type="hidden" id="uuidsyaratbayar" name="uuidsyaratbayar">
						<table width="100%">
							<tr>
								<td>
									<table>
										<tr>
											<td valign="top">
												<table>
													<tr>
														<td id="label_form">Jenis Trans</td>
														<td id="label_form">
															<select name="jenistransaksi" id="JENISTRANSAKSI" style="width:250px" class="easyui-combobox" panelHeight="auto" required="true" data-options="editable: false">
																<option value="BELI">Beli</option>
																<option value="RETUR BELI">Retur Beli</option>
																<option value="DEBET NOTE">Debet Note</option>
															</select>
														</td>
													</tr>
													<tr>
														<td id="label_form">Lokasi</td>
														<td id="label_form"><input name="uuidlokasi" id="UUIDLOKASI" style="width:250px"></td>
													</tr>
													<tr>
														<td id="label_form">Supplier</td>
														<td>
															<input name="uuidsupplier" class="label_input" id="UUIDSUPPLIER" style="width:250px">
															<input type="hidden" id="KODESUPPLIER" name="kodesupplier">
														</td>
													</tr>
													<tr>
														<td id="label_form">No. Transaksi</td>
														<td id="label_form">
															<input id="KODETRANS" name="kodetrans" class="label_input" style="width:180px" validType='length[0,50]' required="true">
														</td>
													</tr>
													<tr>
														<td id="label_form">No. Invoice Supplier</td>
														<td id="label_form">
															<input id="NOINVOICESUPPLIER" name="noinvoicesupplier" class="label_input" style="width:180px" validType='length[0,50]' required="true">
														</td>
													</tr>
													<tr>
														<td id="label_form">Tgl. Trans</td>
														<td><input id="TGLTRANS" name="tgltrans" style="width:100px" class="date"/></td>
													</tr>
													<tr>
														<td id="label_form">Tgl. Jatuh Tempo</td>
														<td><input id="TGLJATUHTEMPO" name="tgljatuhtempo" style="width:100px" class="date"/></td>
													</tr>
													<tr>
														<td id="label_form">Nominal</td>
														<td><input name="grandtotal" id="GRANDTOTAL" style="width:100px" class="number" min="0"></td>
													</tr>
													<tr>
														<td id="label_form" valign="top">Catatan</td>
														<td id="label_form"><textarea rows="5" name="catatan" class="label_input" id="CATATAN" multiline="true" style="width:500px; height:100px" validType='length[0,500]'></textarea></td>
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

	browse_data_supplier('#UUIDSUPPLIER');
	browse_data_lokasi('#UUIDLOKASI');
	
	@if ($mode == 'tambah')
		await tambah();
	@elseif ($mode == 'ubah')
		await ubah();
	@endif

	tutupLoader();
})

shortcut.add('F8',function() {
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
			link_api.loadDataHeaderSaldoAwalHutang, {
			kodetrans: '{{ $data }}'
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
			get_status_trans('{{ session("TOKEN") }}', "atena/keuangan/saldo-awal-hutang", "kodetrans", row.kodetrans, function(data) {

				if (UT == 1 && data.data.status == 'I') {
					document.getElementById('btn_simpan').onclick = simpan; $('#btn_simpan').css('filter', '');
					$('#mode').val('ubah');
				} else {
					document.getElementById('btn_simpan').onclick = ''; $('#btn_simpan').css('filter', 'grayscale(100%)');
				}

				$('#form_input').form('load',row);
				$('#KODETRANS').textbox('readonly');
				$('#lbl_kasir').html(row.userbuat);
				$('#lbl_tanggal').html(row.tglentry);

				$('#GRANDTOTAL').numberbox('setValue', parseFloat(row.grandtotal) < 0 ? -(row.grandtotal) : row.grandtotal)
				$('#IDSUPPLIER').combogrid('setValue', {id: row.idsupplier, nama: row.namasupplier})
			});
		});
	}
}

async function simpan() {
	var mode    = $("#mode").val();
	var datanya = $("#form_input :input").serialize();
	var isValid = $('#form_input').form('validate');

	if (cekbtnsimpan && isValid && (mode == 'tambah' || mode=='ubah')) {
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

			let url = link_api.simpanSaldoAwalHutang;
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

function browse_data_supplier(id) {
	$(id).combogrid({
		panelWidth: 600,
		url       : link_api.browseSupplier,
		idField   : 'uuidsupplier',
		textField : 'nama',
		mode      : 'remote',
		sortName  : 'nama',
		sortOrder : 'asc',
		required  : true,
		columns   : [[
			{field:'uuidsupplier',hidden:true},
			{field:'kode',title:'Kode',width:150, sortable:true},
			{field:'nama',title:'Nama',width:200, sortable:true},
			{field:'kota',title:'Kota',width:100, sortable:true},
			{field:'alamat',title:'Alamat',width:300, sortable:true},
			{field:'telp',title:'Telp',width:100, sortable:true},
			{field:'uuidsyaratbayar',hidden:true},
		]],
		onSelect: function(index, row) {			
			$("#KODESUPPLIER").val(row.kode);
			$("#uuidsyaratbayar").val(row.uuidsyaratbayar);
		},
	});
}

function clear_plugin() {
	$('.combogrid-f').each(function(){
		$(this).combogrid('grid').datagrid('load', {q:''});	
	});

	$("#TGLTRANS, #TGLJATUHTEMPO").datebox('setValue', date_format());

	$('.number').numberbox('setValue', 0);
}
</script>
@endpush
