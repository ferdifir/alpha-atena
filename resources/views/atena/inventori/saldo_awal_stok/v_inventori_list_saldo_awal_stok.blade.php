@extends('template.app')

@section('content')
<div class="easyui-layout" fit="true">	
	<div class="btn-group-transaksi" data-options="region: 'west'">
		<a id="btn_tambah"  title="Tambah Transaksi" class="easyui-linkbutton easyui-tooltip" onclick="before_add()">
			<img src="<?= base_url() ?>assets/images/add.png">
		</a>
		<a id="btn_refresh"  title="Refresh Data" class="easyui-linkbutton easyui-tooltip" onclick="refresh_data()">
			<img src="<?= base_url() ?>assets/images/refresh.png">
		</a>
		<a id="btn_batal"  title="Batalkan Transaksi" class="easyui-linkbutton easyui-tooltip" onclick="before_delete()">
			<img src="<?= base_url() ?>assets/images/cancel.png">
		</a>
		<a id="btn_cetak"  title="Cetak" class="easyui-linkbutton easyui-tooltip" onclick="before_print()">
			<img src="<?= base_url() ?>assets/images/view.png">
		</a>
		<a id="btn_batal_cetak"  title="Batal Cetak" class="easyui-linkbutton easyui-tooltip" onclick="before_delete_print()">
			<img src="<?= base_url() ?>assets/images/cancel-print.png">
		</a>
	</div>
	
	<div data-options="region: 'center'">
		<div id="tab_transaksi" class="easyui-tabs" fit="true">
			<div title="Grid" id="Grid" >
				<div class="easyui-layout" fit="true">
					<div data-options="region:'west',split:true,hideCollapsedContent:false,collapsed:false" title="Filter" style="width:150px;" align="center">
						<table border="0">
							<tr><td id="label_form"></td></tr>
							<tr><td id="label_form" align="center">No. Saldo Stok</td></tr>
							<tr><td align="center"><input id="txt_kodetrans_filter" name="txt_kodetrans_filter" style="width:100px" class="label_input" /></td></tr>
							<tr><td id="label_form"><br></td></tr>
							<tr><td id="label_form" align="center">Lokasi</td></tr>
							<tr><td align="center"><input id="txt_lokasi" name="txt_lokasi[]" style="width:100px" class="label_input" /></td></tr>
							<tr><td id="label_form"><br></td></tr>
							<tr><td id="label_form" align="center">Status</td></tr>
							<tr><td align="center">
								<label id="label_form"><input type="checkbox" value="I" name="cb_status_filter[]"> I</label>
								<label id="label_form"><input type="checkbox" value="S" name="cb_status_filter[]"> S</label>
								<label id="label_form"><input type="checkbox" value="P" name="cb_status_filter[]"> P</label>
								<label id="label_form"><input type="checkbox" value="D" name="cb_status_filter[]"> D</label>
							</td></tr>
							<tr><td align="center"><a id="btn_search"  class="easyui-linkbutton" data-options="iconCls:'icon-search', plain:false" onclick="filter_data()">Tampilkan Data</a></td></tr>
						</table>
					</div>
					<div data-options="region:'center',">
						<table id="table_data"></table>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>

<!-- FORM SUBMIT KIRIM DATA UNTUK TAMBAH DAN UBAH -->
<form method="post" action="<?=base_url();?>atena/Inventori/Transaksi/SaldoAwalStok/getFormLink/<?=$kodemenu?>" target="Form" id="form_data">
	<input type="hidden" id="mode" name="mode">
	<input type="hidden" id="view" name="view">
	<input type="hidden" id="data" name="data">
</form>

<div id="form_cetak" title="Preview" style="width:660px; height:450px">
	<div id="area_cetak"></div>
</div>

<div id="alasan_pembatalan" title="Alasan Pembatalan">
	<table style="padding:5px">
		<tr>
			<td><textarea prompt="Alasan Pembatalan" name="alasanpembatalan" class="label_input" id="ALASANPEMBATALAN" multiline="true" style="width:300px; height:55px" data-options="validType:'length[0, 500]'"></textarea></td>
		</tr>
	</table>
</div>

<div id="alasan_pembatalan-buttons">
	<table cellpadding="0" cellspacing="0" style="width:100%">
		<tr>
			<td style="text-align:right">
				<a  class="easyui-linkbutton" iconCls="icon-save" id='btn_alasan_pembatalan' onclick="javascript:batal_trans()">Batal</a>
			</td>
		</tr>
	</table>
</div>
@endsection

@push('js')
<script>
	var edit_row = false;
	var idtrans = "";
	var counter = 0;

	$(document).ready(function() {
		browse_data_lokasi('#txt_lokasi');
		//WAKTU BATAL DI GRID, tidak bisa close
		//PRINT GRID
		$("#table_data").datagrid({
			onSelect: function() {
				row = $('#table_data').datagrid('getSelected');
			}
		});

		//PRINT TAB
		$("#tab_transaksi").tabs({
			onSelect: function() {
				var tab_title = $('#tab_transaksi').tabs('getSelected').panel('options').title;

				if (tab_title == 'Grid') {
					enable_button()
				} else if (tab_title == 'Tambah') {
					disable_button()
				} else {
					//AMBIL IDTRANS LEBIH DARI IDTAB
					var trans = $('#tab_transaksi').tabs('getSelected').panel('options').id.split("|");
					//Variabel ROW diisi array object
					row = {
						idsaldostok: trans[0],
						kodesaldostok: trans[1],
					};

					disable_button()
				}
			}
		});

		create_form_login();
		buat_table();

		$("#txt_tgl_aw_filter").datebox('setValue', "<?= TGLAWALFILTER ?>");

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
					export_excel('Faktur Saldo Awal Stok', $("#area_cetak").html());
					return false;
				}
			}]
		}).window('close');

		$("#alasan_pembatalan").dialog({
			onOpen: function() {
				$('#alasan_pembatalan').form('clear');
			},
			buttons: '#alasan_pembatalan-buttons',
		}).dialog('close');

	});

	/*==================== FUNGSI YG BERHUBUNGAN DG INFORMASI HEADER ===================*/
	/*
	$("#btn_ubah").click(function(){
		row = $('#table_data').datagrid('getSelected');
		//CEK APAKAH ADA NAMA TAB SAMA 
		var namaTabSama = false;
		for(var i = 0; i< $('#tab_transaksi').tabs('tabs').length ;i++)
		{
			if($('#tab_transaksi').tabs('getTab',i).panel('options').title == "Ubah")
			{
				namaTabSama = true;
			}
		}
		
		if (row && !namaTabSama) {
			counter++;
			
			var data = JSON.stringify($('#table_data').datagrid('getSelected'));
			
			$("#mode").val("ubah");
			$("#view").val("<?= $namaView ?>");
			$("#data").val(data);
			
			var tab_title = 'Ubah';
			var tab_name = tab_title+"_"+counter;
			
			$('#form_data').attr('target',tab_name);
			
			$('#tab_transaksi').tabs('add',{
				title   : tab_title,
				content : '<iframe frameborder="0"  class="tab_form"  id="'+counter+'" name="'+tab_name+'"></iframe>',
				closable: true
			});
			
			$('#form_data').submit();
		}
	});
	*/

	$("#btn_ubah_status").click(function() {
		//ubah_status();
	});

	shortcut.add('F2', function() {
		before_add();
	});

	function disable_button() {
		$('#btn_refresh').linkbutton('disable');
		$('#btn_batal').linkbutton('disable')
		$('#btn_cetak').linkbutton('disable')
		$('#btn_batal_cetak').linkbutton('disable')
	}

	function enable_button() {
		$('#btn_refresh').linkbutton('enable');
		$('#btn_batal').linkbutton('enable')
		$('#btn_cetak').linkbutton('enable')
		$('#btn_batal_cetak').linkbutton('enable')
	}

	function before_add() {
		$('#mode').val('tambah');
		get_akses_user('<?= $kodemenu ?>', function(data) {
			if (data.tambah == 1) {
				counter++;
				$("#mode").val("tambah");
				$("#view").val("<?= $namaView ?>");
				$("#data").val('');

				var tab_title = 'Tambah';
				var tab_name = tab_title + "_" + counter;

				$('#form_data').attr('target', tab_name);

				$('#tab_transaksi').tabs('add', {
					title: tab_title,
					id: counter,
					content: '<iframe frameborder="0"  class="tab_form"  id="' + counter + '" name="' + tab_name + '"></iframe>',
					closable: true
				});

				$('#form_data').submit();
			} else {
				$.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
			}
		});
	}

	function before_delete() {
		$('#mode').val('hapus');

		if (row) {
			validasi_session(function() {
				cek_tanggal_tutup_periode(row.tgltrans, 0, function(data) {
					if (!data.success) {
						$.messager.alert('Error', 'Sudah dilakukan tutup periode pada tanggal transaksi no ' + row.kodesaldostok + '. Prosedur tidak dapat dilanjutkan', 'error')

						return false
					}

					get_status_trans("atena/Inventori/Transaksi/SaldoAwalStok", row.idsaldostok, function(data) {
						if (data.status == 'I' || data.status == 'S') {
							var kode = row.kodesaldostok;
							if ($('#tab_transaksi').tabs('exists', kode)) {
								$.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + kode + ', Sebelum Dibatalkan ', 'warning');
							} else {
								get_akses_user('<?= $kodemenu ?>', function(data) {
									if (data.hapus == 1) {
										$("#alasan_pembatalan").dialog('open');
									} else {
										$.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
									}
								});
							}
						} else {
							$.messager.alert('Info', 'Transaksi Tidak Dapat Dibatalkan', 'info');
						}
					});
				});
			});
		}
	}

	function before_delete_print() {
		$('#mode').val('batal_cetak');

		if (row) {
			validasi_session(function() {
				cek_tanggal_tutup_periode(row.tgltrans, 0, function(data) {
					if (!data.success) {
						$.messager.alert('Error', 'Sudah dilakukan tutup periode pada tanggal transaksi no ' + row.kodesaldostok + '. Prosedur tidak dapat dilanjutkan', 'error')
						return false
					}

					get_status_trans("atena/Inventori/Transaksi/SaldoAwalStok", row.idsaldostok, function(data) {
						if (data.status == 'S') {
							var kode = row.kodesaldostok;
							if ($('#tab_transaksi').tabs('exists', kode)) {
								$.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + kode + ', Sebelum Dibatal Cetak ', 'warning');
							} else {
								get_akses_user('<?= $kodemenu ?>', function(data) {
									if (data.batalcetak == 1) {
										batal_cetak();
									} else {
										$.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
									}
								});
							}
						} else {
							$.messager.alert('Info', 'Transaksi Tidak Dapat Dibatal Cetak', 'info');
						}
					});
				});
			});
		}
	}

	function before_print() {
		$('#mode').val('cetak');

		if (row) {
			get_akses_user('<?= $kodemenu ?>', function(data) {
				if (data.cetak == 0) {
					$.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
					return false;
				}

				cek_tanggal_tutup_periode(row.tgltrans, 0, function(data) {
					if (!data.success) {
						$.messager.alert('Error', 'Sudah dilakukan tutup periode pada tanggal transaksi no ' + row.kodesaldostok + '. Prosedur tidak dapat dilanjutkan', 'error')
						return false
					}

					get_status_trans("atena/Inventori/Transaksi/SaldoAwalStok", row.idsaldostok, function(data) {
						if (data.status == 'S' || data.status == 'P') {
							get_akses_cetak_ulang('inventori', function(data) {
								if (data.hakakses == 1) {
									$("#area_cetak").load(base_url + "atena/Inventori/Transaksi/SaldoAwalStok/cetak/" + row.idsaldostok);
									$("#form_cetak").window('open');
								}
							});
						} else if (data.status == 'I') {
							var kode = row.kodesaldostok;
							if ($('#tab_transaksi').tabs('exists', kode)) {
								$.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + kode + ', Sebelum Dicetak ', 'warning');
							} else {
								cetak();
							}
						} else {
							$.messager.alert('Error', 'Transaksi telah Diproses', 'error');
						}
					});
				})
			});
		}
	}

	function batal_trans() {
		$("#alasan_pembatalan").dialog('close');
		alasan = $('#ALASANPEMBATALAN').val();
		if (row) {
			$.messager.confirm('Confirm', 'Anda Yakin Akan Membatalkan Transaksi ' + row.kodesaldostok + ' ?', function(r) {
				if (r) {
					$.ajax({
						type: 'POST',
						dataType: 'json',
						url: base_url + "atena/Inventori/Transaksi/SaldoAwalStok/batalTrans",
						data: "idtrans=" + row.idsaldostok + "&kodetrans=" + row.kodesaldostok + "&alasan=" + alasan,
						cache: false,
						beforeSend: function() {
							$.messager.progress();
						},
						success: function(msg) {
							$.messager.progress('close');

							if (msg.success) {
								$.messager.alert('Info', 'Pembatalan Transaksi Sukses', 'info');
								reload();
							} else {
								$.messager.alert('Error', msg.errorMsg, 'error');
							}
						}
					});
				}
			});
		}
	}

	function batal_cetak() {
		if (row) {
			$.messager.confirm('Confirm', 'Anda Yakin Akan Batal Cetak Transaksi ' + row.kodesaldostok + ' ?', function(r) {
				if (r) {
					$.ajax({
						type: 'POST',
						dataType: 'json',
						url: base_url + "atena/Inventori/Transaksi/SaldoAwalStok/ubahStatusJadiInput",
						data: "idtrans=" + row.idsaldostok + "&kodetrans=" + row.kodesaldostok,
						cache: false,
						beforeSend: function() {
							$.messager.progress();
						},
						success: function(msg) {
							$.messager.progress('close');

							if (msg.success) {
								$.messager.alert('Info', 'Pembatalan Cetak Sukses', 'info');
								reload();
							} else {
								$.messager.alert('Error', msg.errorMsg, 'error');
							}
						}
					});
				}
			});
		}
	}

	function cetak() {
		if (row) {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: base_url + 'atena/Inventori/Transaksi/SaldoAwalStok/ubahStatusJadiSlip',
				data: "idtrans=" + row.idsaldostok + "&kodetrans=" + row.kodesaldostok,
				cache: false,
				beforeSend: function() {
					$.messager.progress();
				},
				success: function(msg) {
					$.messager.progress('close');
					if (msg.success) {
						$.messager.show({
							title: 'Info',
							msg: 'Transaksi Sukses Dicetak',
							showType: 'show'
						});
						$("#area_cetak").html(msg);
						$("#area_cetak").load(base_url + "atena/Inventori/Transaksi/SaldoAwalStok/cetak/" + row.idsaldostok);
						$("#form_cetak").window('open');

						reload();
					} else {
						$.messager.alert('Error', msg.errorMsg, 'error');
					}
				}
			});
		}
	}

	function refresh_data() {
		//JIKA BERADA PADA TAB FORM TAMBAH / UBAH
		if ($('#tab_transaksi').tabs('getSelected').panel('options').title == "Tambah" || $('#tab_transaksi').tabs('getSelected').panel('options').title == "Ubah") {
			row = {
				idsaldostok: "",
				kodesaldostok: "",
			};

			$("#mode").val("tambah");
			$("#view").val("<?= $namaView ?>");
			$("#data").val('');

			var tab_name = $('#tab_transaksi').tabs('getSelected').panel('options').title;

			if (tab_name == "Tambah") { //TAMBAH LANGSUNG AMBIL DARI ID
				var counterTambah = $('#tab_transaksi').tabs('getSelected').panel('options').id;
				tab_name = tab_name + "_" + counterTambah;
			} else { //UBAH DIAMBIL DARI ID POTONGAN
				var trans = $('#tab_transaksi').tabs('getSelected').panel('options').id.split("|");
				var counterTambah = trans[2];
				tab_name = tab_name + "_" + counterTambah;
			}
			var tab_title = 'Tambah';
			var tab = $('#tab_transaksi').tabs('getSelected');
			var tabIndex = $('#tab_transaksi').tabs('getTabIndex', tab);
			var tabTrans = $('#tab_transaksi').tabs('getTab', tabIndex);
			$('#form_data').attr('target', tab_name);

			$('#tab_transaksi').tabs('update', {
				tab: tabTrans,
				type: 'header',
				options: {
					title: tab_title,
					content: '<iframe frameborder="0"  class="tab_form" id="' + counterTambah + '" name="' + tab_name + '" ></iframe>',
					closable: true
				}
			});
			$('#form_data').submit();
		} else {
			//JIKA DI TAB GRID
			$('#table_data').datagrid('reload');
		}
	}

	function filter_data() {
		var getLokasi = $('#txt_lokasi').combogrid('grid');
		var dataLokasi = getLokasi.datagrid('getChecked');
		var lokasi = "";
		for (var i = 0; i < dataLokasi.length; i++) {
			lokasi += (dataLokasi[i]["id"] + ",");
		}
		lokasi = lokasi.substring(0, lokasi.length - 1);

		var status = [];
		$("[name='cb_status_filter[]']:checked").each(function() {
			status.push($(this).val());
		});
		$('#table_data').datagrid('load', {
			kodetrans: $('#txt_kodetrans_filter').val(),
			lokasi: lokasi,
			nama: $('#txt_nama_referensi_filter').val(),
			perusahaan: $('#txt_perusahaan_filter').val(),
			tglawal: $('#txt_tgl_aw_filter').datebox('getValue'),
			tglakhir: $('#txt_tgl_ak_filter').datebox('getValue'),
			status: status,
		});
	}

	function buat_table() {
		$("#table_data").datagrid({
			fit: true,
			singleSelect: true,
			remoteSort: false,
			multiSort: true,
			striped: true,
			rownumbers: true,
			url: base_url + "atena/Inventori/Transaksi/SaldoAwalStok/dataGrid",
			rowStyler: function(index, row) {
				if (row.status == 'S') return 'background-color:<?= $_SESSION[NAMAPROGRAM]['WARNA_STATUS_S'] ?>';
				else if (row.status == 'P') return 'background-color:<?= $_SESSION[NAMAPROGRAM]['WARNA_STATUS_P'] ?>';
				else if (row.status == 'D') return 'background-color:<?= $_SESSION[NAMAPROGRAM]['WARNA_STATUS_D'] ?>';
			},
			frozenColumns: [
				[{
						field: 'tgltrans',
						title: 'Tgl. Trans',
						width: 80,
						sortable: true,
						formatter: ubah_tgl_indo,
						align: 'center'
					},
					{
						field: 'idsaldostok',
						hidden: true
					},
					{
						field: 'kodesaldostok',
						title: 'No. Saldo Stok',
						width: 120,
						sortable: true,
						align: 'center'
					},
					{
						field: 'idperusahaan',
						hidden: true
					},
					{
						field: 'idlokasi',
						hidden: true
					},
					{
						field: 'kodelokasi',
						hidden: true,
						title: 'Lokasi',
						width: 60,
						sortable: true,
						align: 'center'
					},
				]
			],
			columns: [
				[
					//{field:'GRANDTOTAL',title:'Grand Total',width:100, sortable:true, formatter:format_amount, align:'right',},
					{
						field: 'catatan',
						title: 'Catatan',
						width: 450,
						sortable: true
					},
					{
						field: 'userbuat',
						title: 'User Entry',
						width: 100,
						sortable: true
					},
					{
						field: 'tglentry',
						title: 'Tgl. Input',
						width: 120,
						sortable: true,
						formatter: ubah_tgl_indo,
						align: 'center'
					},
					{
						field: 'userhapus',
						title: 'User Batal',
						width: 100,
						sortable: true
					},
					{
						field: 'tglbatal',
						title: 'Tgl. Batal',
						width: 120,
						sortable: true,
						formatter: ubah_tgl_indo,
						align: 'center'
					},
					{
						field: 'alasanbatal',
						title: 'Alasan Pembatalan',
						width: 250,
						sortable: true
					},
					{
						field: 'status',
						title: 'Status',
						width: 60,
						sortable: true,
						align: 'center'
					},
					{
						field: 'closing',
						title: 'Closing',
						width: 60,
						sortable: true,
						align: 'center'
					}
				]
			],
			onDblClickRow: function(index, data) {
				validasi_session(function() {
					counter++;

					//PELU BUAT SIMPEN INDEX
					var row = $('#table_data').datagrid('getSelected');

					$("#mode").val("ubah");
					$("#view").val("<?= $namaView ?>");
					$("#data").val(row.idsaldostok);

					var tab_title = row.kodesaldostok;
					var tab_name = tab_title + "_" + counter;

					$('#form_data').attr('target', tab_name);

					if ($('#tab_transaksi').tabs('exists', tab_title)) {
						$('#tab_transaksi').tabs('select', tab_title);
					} else {
						$('#tab_transaksi').tabs('add', {
							title: tab_title,
							id: row.idsaldostok + "|" + row.kodesaldostok + "|" + counter,
							content: '<iframe frameborder="0"  class="tab_form"  id="' + counter + '" name="' + tab_name + '"></iframe>',
							closable: true
						});

						$('#form_data').submit();
					}
				});
			},
		});
	}

	function browse_data_lokasi(id) {
		$(id).combogrid({
			panelWidth: 380,
			url: base_url + 'atena/Master/Data/Lokasi/ComboGrid',
			idField: 'kode',
			textField: 'nama',
			mode: 'local',
			sortName: 'nama',
			sortOrder: 'asc',
			multiple: true,
			selectFirstRow: true,
			rowStyler: function(index, row) {
				if (row.status == 0) {
					return 'background-color:#A8AEA6';
				}
			},
			columns: [
				[{
						field: 'ck',
						checkbox: true
					},
					{
						field: 'kode',
						title: 'Kode',
						width: 80,
						sortable: true
					},
					{
						field: 'nama',
						title: 'Nama',
						width: 240,
						sortable: true
					},
				]
			]
		});
	}

	function changeTitleTab(mode) {
		//DAPATKAN INDEXNYA untuk DIGANTI TITLE
		var tab = $('#tab_transaksi').tabs('getSelected');
		var tabIndex = $('#tab_transaksi').tabs('getTabIndex', tab);
		var tabForm = $('#tab_transaksi').tabs('getTab', tabIndex);

		if (mode == 'tambah') {
			$('#tab_transaksi').tabs('update', {
				tab: tabForm,
				type: 'header',
				options: {
					title: 'Tambah'
				}
			});
		} else if (mode == 'ubah') {
			$('#tab_transaksi').tabs('update', {
				tab: tabForm,
				type: 'header',
				options: {
					title: 'Ubah'
				}
			});
		}
	}

	function tutupTab() {
		//DAPATKAN TAB dan INDEXNYA untuk DIHAPUS
		var tab = $('#tab_transaksi').tabs('getSelected');
		var index = $('#tab_transaksi').tabs('getTabIndex', tab);
		$('#tab_transaksi').tabs('close', index);
	}

	function reload() {
		//PELU BUAT SIMPEN INDEX
		var row = $('#table_data').datagrid('getSelected');

		if ($('#tab_transaksi').tabs('getSelected').panel('options').title == "Ubah") {
			//INDEX TAB
			var tab_name = $('#tab_transaksi').tabs('getSelected').panel('options').title;

			//ROW ID dan KODE
			var trans = $('#tab_transaksi').tabs('getSelected').panel('options').id.split("|");
			var counterTambah = trans[2];
			tab_name = tab_name + "_" + counterTambah;

			$("#mode").val("ubah");
			$("#view").val("<?= $namaView ?>");
			$("#data").val(trans[0]);

			var tab = $('#tab_transaksi').tabs('getSelected');
			var tabIndex = $('#tab_transaksi').tabs('getTabIndex', tab);
			var tabTrans = $('#tab_transaksi').tabs('getTab', tabIndex);
			var tab_title = 'Ubah';
			$('#form_data').attr('target', tab_name);

			$('#tab_transaksi').tabs('update', {
				tab: tabTrans,
				type: 'header',
				options: {
					title: tab_title,
					content: '<iframe frameborder="0"  class="tab_form" id="' + counterTambah + '" name="' + tab_name + '" ></iframe>',
					closable: true
				}
			});
			$('#form_data').submit();
		}
		$('#table_data').datagrid('reload');
	}
</script>
@endpush