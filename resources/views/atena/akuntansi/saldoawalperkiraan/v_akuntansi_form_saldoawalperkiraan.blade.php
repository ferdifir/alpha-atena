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
                        <div data-options="region:'north',border:false" style="width:100%; height:130px;">
                            <div class="form_status" style="position:absolute; margin-top:5px; margin-left:85%;z-index:2;">
                            </div>
                            <table width="100%">
                                <input type="hidden" id="mode" name="mode">
                                <input type="hidden" id="data_detail" name="data_detail">
                                <input type="hidden" id="UUIDSALDOPERKIRAAN" name="uuidsaldoperkiraan"></td>
                                <tr>
                                    <td>
                                        <table>
                                            <tr>
                                                <td valign="top">
                                                    <table>
                                                        <tr>
                                                            <td id="label_form">No. Saldo Awal</td>
                                                            <td id="label_form">
                                                                <input id="KODESALDOPERKIRAAN" name="kodesaldoperkiraan"
                                                                    class="label_input" style="width:150px"
                                                                    prompt="Auto Generate" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td id="label_form">Tgl. Trans
                                                            <td id="label_form"><input id="TGLTRANS" name="tgltrans"
                                                                    class="date" style="width:190px" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="label_form" valign="top">Keterangan</td>
                                                            <td id="label_form" rowspan="2">
                                                                <textarea rows="3" name="catatan" class="label_input" id="CATATAN" multiline="true"
                                                                    style="width:300px; height:50px" validType='length[0,300]'></textarea>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div data-options="region:'center',border:false">
                            <table id="table_data_detail" fit="true"></table>
                        </div>
                        <div data-options="region:'south',border:false" style="width:100%; height:30px;">
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="left" id="label_form"><label style="font-weight:normal"
                                            id="label_form">User Entry :</label> <label id="lbl_kasir"></label> <label
                                            style="font-weight:normal" id="label_form">| Entry Date :</label> <label
                                            id="lbl_tanggal"></label>
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

            <a title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false" id='btn_simpan_modal'
                onclick="$('#window_button_simpan').window('open')"><img
                    src="{{ asset('assets/images/simpan.png') }}"></a>


            <br><br>
            <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
                onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
        </div>
    </div>

    <div id="window_button_simpan" class="easyui-window" title="Konfirmasi" data-options="modal:true,closed:true"
        style="height:164cm;padding:15px 10px 10px 10px;top:20px">
        <center>
            <div id="button_simpan">

                <a title="Simpan" class="easyui-linkbutton button_add" id='simpan_saja' onclick="simpan(this.id)"
                    style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan</a><br><br>
                <a title="Simpan & Cetak" class="easyui-linkbutton button_add_print" id='simpan_cetak'
                    onclick="simpan(this.id)"
                    style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan &
                    Cetak</a>

                <div>
        </center>
    </div>

    <div id="form_cetak" title="Preview" style="width:660px; height:450px">
        <div id="area_cetak"></div>
    <div>
@endsection

@push('js')
<script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
<script>
var cekbtnsimpan = true; //CEK APAKAH TOMBOL SIMPAN BISA DITEKAN ATAU BELUM (SUPAYA TIDAK TERKLIK 2x)
var ppnpersenaktif = 0;
var lihatharga = false;
var inputharga = false;
var configtranspr = "";
var configpakaipr = "";
var idtrans = "";
var row = {};
var indexCellEdit = -1;
$(document).ready(async function(){
	let check1 = false;
	let aksesubah = 0;
	const promises = [];
	promises.push(getConfig('KODESALDOPERKIRAAN', 'SALDOPERKIRAAN', 'bearer {{ session('TOKEN') }}',
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
		$('#KODESALDOPERKIRAAN').textbox({
			prompt: "Auto Generate",
			readonly: true,
			required: false
		});
	} else {
		$('#KODESALDOPERKIRAAN').textbox({
			prompt: "",
			readonly: false,
			required: true
		});
		$('#KODESALDOPERKIRAAN').textbox('clear').textbox('textbox').focus();
	}
	
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
			handler: function(){
				export_excel('Faktur Saldo Awal Perkiraan', $("#area_cetak").html());
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

	buat_table_detail()

	@if ($mode == 'tambah')
		await tambah();
	@elseif ($mode == 'ubah')
		await ubah(aksesubah);
	@endif

	tutupLoader();
	
})

shortcut.add('F8',async function() {
	simpan();
});

function tutup(){
	parent.tutupTab();
}

async function cetak(uuidtrans) {
	bukaLoader();
	if (row) {
		try {
			let url = link_api.cetakSaldoAwalPerkiraan + uuidtrans;
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

async function tambah() {
	$('#form_input').form('clear');
	$('#mode').val('tambah');
	
	$('#lbl_kasir, #lbl_tanggal').html('');

	clear_plugin();
	reset_detail();
}

async function ubah() {
	$('#mode').val('ubah');
	try {
	let url = link_api.loadDataHeaderSaldoAwalPerkiraan;
	const response = await fetch(url, {
		method: 'POST',
		headers: {
			'Authorization': 'bearer {{ session('TOKEN') }}',
			'Content-Type': 'application/json',
		},
		body: JSON.stringify({
			uuidsaldoperkiraan: '{{ $data }}',
			mode: "ubah",
		}),
	}).then(response => {
		if (!response.ok) {
			throw new Error(`HTTP error! status: ${response.status} from ${url}`);
		}
		return response.json();
	})
	if (response.success) {
		row = response.data;
	} else {
		$.messager.alert('Error', response.message, 'error');
	}
	} catch (error) {
		var textError = getTextError(error);
		$.messager.alert('Error', getTextError(error), 'error');
	}
	if (row) {
		$('#lbl_kasir').html(row.userbuat);
		$('#lbl_tanggal').html(row.tglentry);

		await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {
			var UT = data.data.cetak;
			if (UT == 1) {
				$('#simpan_cetak').css('filter', '');
			} else {
				$('#simpan_cetak').css('filter', 'grayscale(100%)');
				$('#simpan_cetak').removeAttr('onclick');
			}
			UT = data.data.ubah;
			var statusTrans = await getStatusTrans(link_api.getStatusSaldoAwalPerkiraan,
			'bearer {{ session('TOKEN') }}', {
				uuidsaldoperkiraan: row.uuidsaldoperkiraan
			});

			$(".form_status").html(status_transaksi(statusTrans));
			if (UT == 1 && statusTrans== 'I') {
				$('#btn_simpan_modal').css('filter', '');

				$('#mode').val('ubah');
			} else {
				document.getElementById('btn_simpan_modal').onclick = null;

				$('#btn_simpan_modal').css('filter', 'grayscale(100%)');
				$('#btn_simpan_modal').removeAttr('onclick');
			}

			$("#form_input").form('load', row);
			await load_data (row.uuidsaldoperkiraan);
		})
	}
}

async function simpan(jenis_simpan) {
    $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

    var mode = $("#mode").val();
    var datanya = $("#form_input :input").serialize();
    var isValid = $('#form_input').form('validate');

    $('#window_button_simpan').window('close');

    if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
    }

	console.log(mode)
	console.log(isValid)

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

            requestBody.data_detail = $('#table_data_detail').datagrid('getRows');

            requestBody.jenis_simpan = jenis_simpan;

            let url = link_api.simpanSaldoAwalPerkiraan;
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
                    await cetak(response.data.uuidsaldoperkiraan);
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
}

async function load_data(uuidtrans) {
	try {
		let url = link_api.loadDataSaldoAwalPerkiraan;
		const response = await fetch(url, {
			method: 'POST',
			headers: {
				'Authorization': 'bearer {{ session('TOKEN') }}',
				'Content-Type': 'application/json',
			},
			body: JSON.stringify({
				uuidsaldoperkiraan: uuidtrans,
			}),
		}).then(response => {
			if (!response.ok) {
				throw new Error(`HTTP error! status: ${response.status} from ${url}`);
			}
			return response.json();
		})
		if (response.success) {
			$('#table_data_detail').datagrid('loadData', response.data);
		} else {
			$.messager.alert('Error', response.message, 'error');
		}
	} catch (error) {
		console.log(error);
		var textError = getTextError(error);
		$.messager.alert('Error', getTextError(error), 'error');
	}
}

/* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */

function hitung_debet_kredit(){
	/*rows   = $('#table_data_detail').datagrid('getRows');
	jtrans = 'KAS MASUK';
	amount = parseFloat($('#AMOUNTKURS').numberbox('getValue'));

	totaldebet = 0; totalkredit = 0;
	for (var i=0; i<rows.length; i++) {
		totaldebet += (rows[i].saldo=='DEBET') ? parseFloat(rows[i].amountkurs) : 0;
		totalkredit += (rows[i].saldo=='KREDIT') ? parseFloat(rows[i].amountkurs) : 0;
	}

	totaldebet += (jtrans=='KAS MASUK' || jtrans=='BANK MASUK') ? amount : 0;
	totalkredit += (jtrans=='KAS KELUAR' || jtrans=='BANK KELUAR') ? amount : 0;

	$('#TOTALDEBET').numberbox('setValue', totaldebet);
	$('#TOTALKREDIT').numberbox('setValue', totalkredit);
	*/
}

/* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */

function getRowIndex(target){
	var tr = $(target).closest('tr.datagrid-row');
	return parseInt(tr.attr('datagrid-row-index'));
}

var indexDetail = 0; 
	
function buat_table_detail() {
	var dg = '#table_data_detail';
	$(dg).datagrid({
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
					kodeperkiraan   :	'',
				}).datagrid('gotoCell', {
					index: index,
					field: 'kodeperkiraan'
				});
			}
		}, {
			text   : 'Hapus',
			iconCls: 'icon-remove',
			handler: function(){
				$(dg).datagrid('deleteRow',indexDetail);
				hitung_grandtotal();
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
			{field:'uuidcurrency',hidden:true},
			{field:'kodeperkiraan',title:'Kd. Perkiraan',width:90,editor:{
				type   : 'combogrid',
				options: {
					panelWidth: 330,
					mode      : 'remote',
					required  : true,
					idField   : 'kode',
					textField : 'kode',
					sortName  : 'kode',
					sortOrder : 'asc',
					url       : link_api.browsePerkiraan,
					queryParams     : {
						jenis: 'detail',
						aktif: 1
					},
					columns   : [[
						{field:'id',hidden:true},
						{field:'kode',title:'Kode',width:80},
						{field:'nama',title:'Nama',width:220},
					]],
				}
			}},
			{field:'namaperkiraan',title:'Nama Perkiraan',width:220},
			{field:'saldo',title:'Saldo', width:70,editor:{
				type   : 'combobox',
				options: {
					required   : true,
					data       : [{value:'D',text:'D'},{value:'K',text:'K'}],
					panelHeight: 'auto',
				}
			}},
			{field:'amount',title:'Nominal',align:'right', width:120, formatter:format_amount,editor:{type:'numberbox', options:{required:true,min:0}}},
			{field:'kodecurrency',title:'Curr Kode', width:50, hidden:true, editor:{type:'validatebox'}},
			{field:'currency',title:'Curr',width:50, hidden:false, editor:{
				type   : 'combogrid',
				options: {
					panelWidth: 200,
					mode      : 'remote',
					required  : true,
					idField   : 'simbol',
					textField : 'simbol',
					url       : link_api.browseCurrency,
					columns   : [[
						{field:'nama',title:'Curr',width:100},
						{field:'simbol',title:'Simbol',width:70},
					]],
				}
			}},
			{field:'nilaikurs',title:'Kurs ({{ session("SIMBOLCURRENCY") }})',align:'right', width:80, hidden:false, formatter:format_amount,editor:{type:'numberbox', options:{required:true,readonly:false,min:0}}},
			{field:'amountkurs',title:'Nominal ({{ session("SIMBOLCURRENCY") }})',align:'right', width:120, hidden:false, formatter:format_amount},
		]],
		onClickRow: function(index,row) {
            indexDetail = index;
        },
		onLoadSuccess : function (data){
			hitung_debet_kredit();
		},
		onAfterDeleteRow: function(index, row) {
			hitung_debet_kredit();
		},
		onCellEdit: function(index,field,val) {
			var row = $(this).datagrid('getRows')[index];
			var ed  = get_editor ('#table_data_detail', index, field);

			switch(field) {
				case 'kodeperkiraan':
					ed.combogrid('showPanel');
					break;
				case 'saldo':
					ed.combobox('showPanel');
					break;
			}
		},
		onEndEdit:function(index,row,changes){
			var cell 	   = $(this).datagrid('cell');
			var ed		   = get_editor ('#table_data_detail', index, cell.field);
			var row_update = {};

			switch(cell.field) {
				case 'kodeperkiraan':
					var data = ed.combogrid('grid').datagrid('getSelected');

					var uuid     = data ? data.uuidperkiraan : '';
					var nama   = data ? data.nama : '';
					row_update = {
						uuidperkiraan: uuid,
						namaperkiraan: nama,
						uuidcurrency : '{{ session("UUIDCURRENCY") }}',
						kodecurrency : '{{ session("KODECURRENCY") }}',
						currency     : '{{ session("SIMBOLCURRENCY") }}',
						tandakurs    : 1,
						nilaikurs    : 1,
						amount       : 0,
						amountkurs   : 0,
					};
					break;
				case 'amount' :
					row_update = {
						amountkurs:row.nilaikurs * ed.numberbox('getValue'),
					};
					break;
				case 'currency' :
					var data = ed.combogrid('grid').datagrid('getSelected');

					var uuid     = data ? data.uuidcurrency : '';
					var kode     = data ? data.kode : '';
					row_update = {
						tandakurs   : data ? data.tanda       : 0,
						uuidcurrency: data ? data.uuidcurrency: 0,
						kodecurrency: data ? data.kode        : 0,
					};
					break;
				case 'nilaikurs' :
					var nilaikurs = ed.numberbox('getValue');
					if (row.tandakurs == 1 && nilaikurs > 1) {
						nilaikurs = 1;
					}

					row_update = {
						nilaikurs : nilaikurs,
						amountkurs: nilaikurs * row.amount,
					};
					break;
			}

			if (jQuery.isEmptyObject(row_update) == false) {
				$(this).datagrid('updateRow',{
					index: index,
					row  : row_update
				});
			}
		},
		onAfterEdit:function(index,row,changes){
			hitung_debet_kredit();
		}
	}).datagrid('enableCellEditing');
}

function clear_plugin() {
	$('.combogrid-f').each(function(){
		$(this).combogrid('grid').datagrid('load', {q:''});
	});

	$("#TGLTRANS").datebox('setValue', date_format());
}
</script>
@endpush
