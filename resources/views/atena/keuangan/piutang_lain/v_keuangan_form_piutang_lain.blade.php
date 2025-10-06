@extends('template.form')

@section('content')
<div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
        <div class="easyui-layout" fit="true">
            <div data-options="region:'center',border:false">
                <div class="easyui-layout" style="height:100%" id="trans_layout">
                    <script>
                        if (screen.height <= 450) {
                            $("#trans_layout").css('height', "450px");
                        }
                    </script>
                    <div data-options="region:'north',border:false" style="width:100%; height: 400px;">
                        <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>
                        <input type="hidden" id="mode" name="mode">

                        <table>
                            <tr>
                                <td id="label_form">No. Transaksi</td>
                                <td id="label_form">
                                    <input id="KODETRANS" name="kodetrans" class="label_input" style="width: 180px" validType='length[0,50]' required="true">
                                </td>
                            </tr>
                            <tr>
                                <td id="label_form">Pelanggan</td>
                                <td>
                                    <input name="uuidcustomer" class="label_input" id="UUIDCUSTOMER" style="width: 180px">
                                    <input type="hidden" id="KODECUSTOMER" name="kodecustomer">
                                </td>
                            </tr>
                            <tr>
                                <td id="label_form">Tgl. Trans</td>
                                <td><input id="TGLTRANS" name="tgltrans" style="width:100px" class="date" /></td>
                            </tr>
							<tr>
                                <td id="label_form">Lokasi</td>
                                <td id="label_form"><input name="uuidlokasi" id="UUIDLOKASI" style="width:190px"></td>
                            </tr>
                            <tr>
                                <td id="label_form">Syarat Bayar</td>
                                <td>
                                    <input id="UUIDSYARATBAYAR" name="uuidsyaratbayar" style="width: 180px" />
                                </td>
                            </tr>
                            <tr hidden>
                                <td id="label_form">Tgl. Jatuh Tempo</td>
                                <td><input id="TGLJATUHTEMPO" name="tgljatuhtempo" style="width: 100px" class="date" /></td>
                            </tr>
                            <tr>
                                <td id="label_form">Kode Perkiraan</td>
                                <td><input name="uuidperkiraan" id="UUIDPERKIRAAN" style="width: 180px"></td>
                            </tr>
                            <tr>
                                <td id="label_form">Jumlah Piutang</td>
                                <td><input name="grandtotal" id="GRANDTOTAL" style="width:100px" class="number" min="0"></td>
                            </tr>
                            <tr>
                                <td id="label_form" valign="top">Keterangan</td>
                                <td id="label_form">
                                    <textarea rows="3" name="catatan" class="label_input" id="CATATAN" multiline="true" style="width:300px; height:50px" validType='length[0,300]'></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div data-options="region:'south',border:false" style="width:100%; height:30px;">
                        <table id="trans_footer" width="100%">
                            <tr>
                                <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl. Input :</label> <label id="lbl_tanggal"></label></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
        <br>
        <a title="Simpan" class="easyui-tooltip" data-options="plain:false" id='btn_simpan' onclick="javascript:simpan()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
        <br><br>
        <a title="Tutup" class="easyui-tooltip" data-options="plain:false" onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
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
$(document).ready(async function() {

	browse_data_customer('#UUIDCUSTOMER');
	browse_data_perkiraan('#UUIDPERKIRAAN');
	browse_data_syaratbayar('#UUIDSYARATBAYAR');
	browse_data_lokasi('#UUIDLOKASI');

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

async function tambah() {
	$('#form_input').form('clear');
	$('#mode').val('tambah');

	document.getElementById('btn_simpan').onclick = simpan;
	$('#btn_simpan').css('filter', '');
	$('#lbl_kasir, #lbl_tanggal').html('');
	$('#KODETRANS').textbox('readonly', false);

	clear_plugin();
}

async function ubah() {
	$('#mode').val('ubah');

	const response = await fetchData(
		'{{ session('TOKEN') }}',
		link_api.loadDataHeaderPiutangLain, {
		kodetrans: '{{ $data }}'
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
			get_status_trans('{{ session("TOKEN") }}', "atena/keuangan/piutang-lain", "kodetrans", row.kodetrans, async function(data) {
				$(".form_status").html(status_transaksi(data.data.status));
				if (UT == 1 && data.data.status == 'I') {
					document.getElementById('btn_simpan').onclick = simpan;
					$('#btn_simpan').css('filter', '');
					$('#mode').val('ubah');
				} else {
					document.getElementById('btn_simpan').onclick = '';
					$('#btn_simpan').css('filter', 'grayscale(100%)');
				}

				$('#form_input').form('load', row);
				$('#KODETRANS').textbox('readonly');
				$('#lbl_kasir').html(row.userbuat);
				$('#lbl_tanggal').html(row.tglentry);

				$('#UUIDCUSTOMER').combogrid('setValue', {
					uuidcustomer: row.uuidcustomer,
					nama        : row.namacustomer
				});

				$('#UUIDPERKIRAAN').combogrid('setValue', {
					uuidperkiraan: row.uuidperkiraan,
					kode         : row.kodeperkiraan
				});

				$('#GRANDTOTAL').numberbox('setValue', parseFloat(row.grandtotal) < 0 ? -(row.grandtotal) : row.grandtotal)
				$('#UUIDCUSTOMER').combogrid('setValue', {
					uuidcustomer: row.uuidcustomer,
					nama        : row.namacustomer
				})

			});
		});
	}
}

async function simpan() {
	var mode = $("#mode").val();
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

			let url = link_api.simpanPiutangLain;
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
function browse_data_customer(id) {
	$(id).combogrid({
		panelWidth: 600,
		url       : link_api.browseCustomer,
		idField   : 'uuidcustomer',
		textField : 'nama',
		mode      : 'remote',
		sortName  : 'nama',
		sortOrder : 'asc',
		required  : true,
		columns   : [
			[{
					field: 'uuidcustomer',
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
				{
					field: 'kota',
					title: 'Kota',
					width: 100,
					sortable: true
				},
				{
					field: 'alamat',
					title: 'Alamat',
					width: 300,
					sortable: true
				},
				{
					field: 'telp',
					title: 'Telp',
					width: 100,
					sortable: true
				},
				{
					field: 'idsyaratbayar',
					hidden: true
				},
			]
		],
		onSelect: function(index, row) {
			$("#KODECUSTOMER").val(row.kode);
		},
	});
}

function browse_data_syaratbayar(id) {
	$(id).combogrid({
		required  : true,
		panelWidth: 200,
		mode      : 'remote',
		idField   : 'uuidsyaratbayar',
		textField : 'nama',
		sortName  : 'kode',
		sortOrder : 'asc',
		url       : link_api.browseSyaratBayar,
		columns   : [
			[{
					field: 'nama',
					title: 'Keterangan',
					width: 100
				},
				{
					field: 'kode',
					title: 'Kode',
					width: 80
				},
				{
					field: 'id',
					hidden: true
				}
			]
		]
	});
}

function browse_data_perkiraan(id) {
	$(id).combogrid({
		panelWidth: 335,
		mode      : 'remote',
		idField   : 'uuidperkiraan',
		textField : 'kode',
		sortName  : 'kode',
		sortOrder : 'asc',
		required  : true,
		url		  : link_api.browsePerkiraan,
		queryParams: {
			jenis: 'detail',
			aktif: 1
		},
		columns: [
			[{
					field: 'uuidperkiraan',
					title: 'Kode Akun',
					hidden: true
				},
				{
					field: 'kode',
					title: 'Kode Akun',
					width: 80
				},
				{
					field: 'nama',
					title: 'Nama Akun',
					width: 250
				}
			]
		]
	});
}

function browse_data_lokasi(id) {
	$(id).combogrid({
		panelWidth: 400,
		url       : link_api.browseLokasi,
		idField   : 'uuidlokasi',
		textField : 'nama',
		mode      : 'local',
		sortName  : 'nama',
		sortOrder : 'asc',
		required  : true,
		columns   : [[
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

function clear_plugin() {
	$('.combogrid-f').each(function() {
		$(this).combogrid('grid').datagrid('load', {
			q: ''
		});
	});

	$("#TGLTRANS, #TGLJATUHTEMPO").datebox('setValue', date_format());

	$('.number').numberbox('setValue', 0);
}
</script>
@endpush
