@extends('template.app')

@section('content')
<div style="width:400px" class="easyui-tabs" id="menu">
	<div title="Simpan Tutup Periode" style="padding:5px">
        <table id="menu-1">
            <tr>
                <td id="label_form">Bulan</td>
                <td>
					<select id="sb_bulan" class="easyui-combobox" required="true" name="sb_bulan" style="width:150px">
						<option value="01">Januari</option>
						<option value="02">Februari</option>
						<option value="03">Maret</option>
						<option value="04">April</option>
						<option value="05">Mei</option>
						<option value="06">Juni</option>
						<option value="07">Juli</option>
						<option value="08">Agustus</option>
						<option value="09">September</option>
						<option value="10">Oktober</option>
						<option value="11">Nopember</option>
						<option value="12">Desember</option>
					</select>
				</td>
                <td id="label_form">Tahun</td>
                <td><input name="txt_tahun" type="text" class="easyui-numberspinner" required="true" id="txt_tahun" style="width:60px" maxlength="4" data-options="min:1990" value="<?=date("Y")?>"></td>
            </tr>
			<tr>
                <td colspan="4" align="right"><a id="btn_simpan"  class="easyui-linkbutton" data-options="iconCls:'icon-ok'">Tutup Periode</a></td>
            </tr>
        </table>    
	</div>
    
    <div title="Batal Tutup Periode" style="padding:5px">
        <table>
            <tr>
                <td id="label_form">Kodetrans</td>
				<td><input id="IDCLOSING" name="idclosing" style="width:130px"/></td>
            </tr>
            </tr>
                <td colspan="2" align="right"><a id="btn_batal"  class="easyui-linkbutton" data-options="iconCls:'icon-cancel'">Batal Tutup Periode</a></td>
            </tr>
        </table>    
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/utils.js') }}"></script><script>

$(document).ready(function(){
	$('#sb_bulan').combobox('setValue', '<?php echo date("m"); ?>');
	
	browse_kodetrans();
    tutupLoader();
});

$("#btn_simpan").click(function(){
	validasi_session(function() {
		simpan();
	});
});
$("#btn_batal").click(function(){
	validasi_session(function() {
		batal_trans();
	});
});

async function simpan() {
    $.messager.confirm('Perhatian', 'Anda Yakin Akan Melakukan Tutup Periode ?', async function(r) {
        if (r) {
            try {
                let headers = {
                    'Authorization': 'bearer {{ session('TOKEN') }}',
                };

                let requestBody = null;
                var unindexed_array = $('#menu-1 :input').serializeArray();
                
                // PERBAIKAN 1: Deklarasi variabel body
                let body = {};

                $.map(unindexed_array, function(n, i) {
                    body[n['name']] = n['value'];
                });

                if (body instanceof FormData) {
                    // Jika FormData, jangan set 'Content-Type'. Browser akan melakukannya secara otomatis.
                    requestBody = body;
                } else {
                    // Default: Jika bukan FormData, asumsikan itu JSON.
                    headers['Content-Type'] = 'application/json';
                    requestBody = body ? JSON.stringify(body) : null;
                }

                let url = link_api.simpanTutupPeriodeAkuntansi;
                
                const response = await fetch(url, {
                    method: 'POST',
                    headers: headers,
                    body: requestBody,
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status} from ${url}`);
                }

                const result = await response.json();

                if (result.success) {
                    $.messager.alert('Info', 'Transaksi Sukses', 'info');
                    $("#IDCLOSING").combogrid('grid').datagrid('load', {q: ''});
                } else {
                    $.messager.alert('Error', result.message, 'error');
                }

            } catch (error) {
                console.error('Error details:', error);
                var textError = typeof getTextError === 'function' ? getTextError(error) : error.message;
                $.messager.alert('Error', textError, 'error');
            }

            cekbtnsimpan = true;
            tutupLoaderSimpan();
        }
    });
}

async function batal_trans (){
	var uuidtrans = $("#IDCLOSING").combogrid('getValue');
	var kodetrans = $("#IDCLOSING").combogrid('getText');
	if (idtrans != '') {
		$.messager.confirm('Perhatian', 'Anda Yakin Membatalkan No Faktur '+kodetrans+' dan Tutup Periode Sesudahnya ?', async function(r){
			if (r) {
                bukaLoader();
                try {
                    let url = link_api.batalTutupPeriodeAkuntansi;
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Authorization': 'bearer {{ session('TOKEN') }}',
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            uuidtrans: row.uuidtrans,
                            kodetrans: row.kodetrans,
                        }),
                    }).then(response => {
                        if (!response.ok) {
                            throw new Error(
                                `HTTP error! status: ${response.status} from ${url}`
                            );
                        }
                        return response.json();
                    })

                    if (response.success) {
                        $.messager.alert('Info','Transaksi Sukses','info');
						$("#IDCLOSING").combogrid('clear').combogrid('grid').datagrid('load', {q:''})
                    } else {
                        $.messager.alert('Error', response.message, 'error');
                    }
                } catch (error) {
                    console.log(error);
                    var textError = getTextError(error);
                    $.messager.alert('Error', getTextError(error), 'error');
                }
			}
		});
	}
}

function browse_kodetrans() {
	$("#IDCLOSING").combogrid({
		panelWidth: 400,
		mode      : 'remote',
		idField   : 'idclosing',
		textField : 'kodeclosing',
		sortName  : 'tglawal',
		sortOrder : 'desc',
		url       : link_api.browseTutupPeriodeAkuntansi,
		columns: [[
			{field:'kodeclosing',title:'Kode',width:110, sortable:false},
			{field:'tglawal',title:'Tgl Awal',width:80, sortable:false, align:'center', formatter:ubah_tgl_indo},
			{field:'tglakhir',title:'Tgl Akhir',width:80, sortable:false, align:'center', formatter:ubah_tgl_indo},
			{field:'userentry',title:'User',width:100, sortable:false},
		]],
	});
}
</script>
@endpush
