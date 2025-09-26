@extends('template.app')

@section('content')
  <div class="easyui-layout" fit="true">
    <div class="btn-group-transaksi" data-options="region: 'west'" style="width: 50px">
      <a id="btn_tambah" title="Tambah Transaksi" class="easyui-linkbutton easyui-tooltip" onclick="before_add()">
        <img src="{{ asset('assets/images/add.png') }}">
      </a>
      <a id="btn_sinkronisasi_marketplace" title="Omni Channel Marketplace" class="easyui-linkbutton easyui-tooltip"
        onclick="tampilDialogSinkronisasi()">
        <img src="{{ asset('assets/images/ecommerce.png') }}">
      </a>
      <a id="btn_refresh" title="Refresh Data" class="easyui-linkbutton easyui-tooltip" onclick="refresh_data()">
        <img src="{{ asset('assets/images/refresh.png') }}">
      </a>
      <a id="btn_batal" title="Batalkan Transaksi" class="easyui-linkbutton easyui-tooltip" onclick="before_delete()">
        <img src="{{ asset('assets/images/cancel.png') }}">
      </a>
      <a id="btn_cetak" title="Cetak" class="easyui-linkbutton easyui-tooltip" onclick="before_print('ya','besar')">
        <img src="{{ asset('assets/images/view.png') }}">
      </a>
      <a id="btn_cetak_kecil" title="Cetak Kecil" class="easyui-linkbutton easyui-tooltip"
        onclick="before_print('ya','kecil')">
        <img src="{{ asset('assets/images/view.png') }}">
      </a>
      <a id="btn_cetak_filter" title="Cetak Dengan Filter" class="easyui-linkbutton easyui-tooltip"
        onclick="popup_filter()">
        <img src="{{ asset('assets/images/view_check.png') }}">
      </a>
      <a id="btn_batal_cetak" title="Batal Cetak" class="easyui-linkbutton easyui-tooltip"
        onclick="before_delete_print()">
        <img src="{{ asset('assets/images/cancel-print.png') }}">
      </a>
    </div>

    <div data-options="region: 'center'">

      <div class="easyui-layout" fit="true">
        <div data-options="region:'west',split:true,hideCollapsedContent:false,collapsed:false" title="Filter"
          style="width:150px;" align="center">
          <table border="0">
            <tr>
              <td id="label_form"></td>
            </tr>
            <tr>
              <td id="label_form" align="center">Tgl. Transaksi</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_tgl_aw_filter" name="txt_tgl_aw_filter" class="date"
                  style="width:100px" /></td>
            </tr>
            <tr>
              <td id="label_form" align="center">s/d</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_tgl_ak_filter" name="txt_tgl_ak_filter" class="date"
                  style="width:100px" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">Lokasi</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_lokasi" name="txt_lokasi[]" style="width:100px" class="label_input" />
              </td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">No. Penjualan</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_kodetrans_filter" name="txt_kodetrans_filter" style="width:100px"
                  class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">No. Pengeluaran</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_kodebbk_filter" name="txt_kodebbk_filter" style="width:100px"
                  class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">No. Pajak</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_nofakturpajak_filter" name="txt_nofakturpajak_filter" style="width:100px"
                  class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">Pelanggan</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_nama_customer_filter" name="txt_nama_customer_filter"
                  style="width:100px" class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">Kota</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_kota_customer_filter" name="txt_kota_customer_filter"
                  style="width:100px" class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">Marketing</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_marketing_filter" name="txt_marketing_filter" style="width:100px"
                  class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">Status</td>
            </tr>
            <tr>
              <td align="center">
                <label id="label_form"><input type="checkbox" value="I" name="cb_status_filter[]"> I</label>
                <label id="label_form"><input type="checkbox" value="S" name="cb_status_filter[]"> S</label>
                <label id="label_form"><input type="checkbox" value="P" name="cb_status_filter[]"> P</label>
                <label id="label_form"><input type="checkbox" value="D" name="cb_status_filter[]"> D</label>
              </td>
            </tr>
            <tr>
              <td align="center"><a id="btn_search" class="easyui-linkbutton"
                  data-options="iconCls:'icon-search', plain:false" onclick="filter_data()">Tampilkan Data</a></td>
            </tr>
          </table>
        </div>
        <div data-options="region:'center'">
          <div class="easyui-layout" fit="true" id="main_wrapper">
            <div data-options="region:'center',">
  <div class="title-grid"> Riwayat Transaksi </div>
  <table id="table_data"></table>
</div>
            <div data-options="region: 'west', split:true,hideCollapsedContent:false,collapsed:true"
              title="Daftar Antrian Pengeluaran Barang" style="width: 25%;">
              <div id="table_pending"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="form_cetak_kecil" title="Preview" style="width:300px; height:450px">
    <div id="area_cetak_kecil"></div>
  </div>

  <div id="form_cetak" title="Preview" style="width:680px; height:450px">
    <div id="area_cetak"></div>
  </div>

  <div id="form_cetak_sj_kecil" title="Preview" style="width:300px; height:450px">
    <div id="area_cetak_sj_kecil"></div>
  </div>

  <div id="form_cetak_sj" title="Preview" style="width:680px; height:450px">
    <div id="area_cetak_sj"></div>
  </div>

  <div id="alasan_pembatalan" title="Alasan Pembatalan">
    <table style="padding:5px">
      <tr>
        <td>
          <textarea prompt="Alasan Pembatalan" name="alasanpembatalan" class="label_input" id="ALASANPEMBATALAN"
            multiline="true" style="width:300px; height:55px" data-options="validType:'length[0, 500]'"></textarea>
        </td>
      </tr>
    </table>
  </div>

  <div id="alasan_pembatalan-buttons">
    <table cellpadding="0" cellspacing="0" style="width:100%">
      <tr>
        <td style="text-align:right">
          <a class="easyui-linkbutton" iconCls="icon-save" id='btn_alasan_pembatalan'
            onclick="javascript:batal_trans()">Batal</a>
        </td>
      </tr>
    </table>
  </div>

  <div id="form_cetak_filter" title="Filter Cetak Nota" style="width:670px;height:450px">
    <table border="0">
      <tr>
        <td id="label_form" width="60px">Tgl Nota</td>
        <td id="label_form" width="220px"><input style="width: 95px" id="FILTERTGLAWALTRANS"
            name="filtertgltransawal" class="date" />&nbsp;s/d&nbsp;<input style="width: 95px"
            id="FILTERTGLAKHIRTRANS" name="filtertgltransakhir" class="date" /></td>
        <td><a id="btn_filter" class="easyui-linkbutton" data-options="iconCls:'', plain:false"
            onclick="tampilkan_data_cetak()">Tampilkan Data</a></td>
      </tr>
      <tr>
        <td colspan="3">
          <table id="table_data_cetak" style="width:650px; height:330px"></table>
        </td>
      </tr>
      <tr>
        <td colspan="3" align="center">
          <a class="easyui-linkbutton" data-options="iconCls:'icon-print', plain:false"
            onclick="cetak_banyak('besar')">Cetak Nota Besar</a>
          <a class="easyui-linkbutton" data-options="iconCls:'icon-print', plain:false"
            onclick="cetak_banyak('kecil')">Cetak Nota Kecil</a>
        </td>
      </tr>
    </table>
  </div>

  <div id="window_sinkronisasi">
    <div class="easyui-layout" style="width: 100%;height: 100%">
      <div data-options="region: 'north'" style="height: 70px;padding: 5px">
        <table>
          <tr>
            <td id="label_form">Lokasi</td>
            <td>
              <input id="idlokasisinkronisasi" style="width: 150px" required>
            </td>
          </tr>
          <tr>
            <td id="label_form">Pelanggan</td>
            <td>
              <input id="idcustomersinkronisasi" style="width: 150px" required>
            </td>
          </tr>
        </table>
      </div>

      <div data-options="region: 'center'">
        <table id="table_data_sinkronisasi" fit="true"></table>
      </div>

      <div data-options="region: 'east'" style="width: 50px;padding: 5px">
        <a title="Simpan" class="easyui-tooltip" data-options="plain:false" onclick="simpanDataSinkronisasi()">
          <img style="width: 100%" src="{{ asset('assets/images/simpan.png') }}">
        </a>
      </div>
    </div>
  </div>

  <div id="toolbar_sinkronisasi">
    <table>
      <tr>
        <td id="label_form">Toko</td>
        <td>
          <input id="tokentokosinkronisasi" style="width: 150px" required>
        </td>
        <td id="label_form">Tanggal</td>
        <td>
          <input type="text" class="date" id="TGLAWALSINKRONISASI" style="width: 95px"> s/d <input
            type="text" class="date" id="TGLAKHIRSINKRONISASI" style="width: 95px">
        </td>
        <td>
          <a href="#" class="easyui-linkbutton" onclick="tampilDataSinkronisasi(event)">Tampilkan Data</a>
        </td>
      </tr>
    </table>
  </div>
@endsection

@push('js')
  <script src="{{ asset('assets/js/utils.js') }}"></script>
  <script>
    const jwt = '{{ session('TOKEN') }}';
    var edit_row = false;
    var idtrans = "";
    var urlbbk = "";
    var cetakNota = true;
    var batastoleransi = 0;
    var counter = 0;
    let LIHATHARGA;
    let TRANSAKSI;

    $(document).ready(async function() {
      await getConfigPenjualan();

      browse_data_lokasi('#txt_lokasi');
      browse_data_marketing('#txt_marketing_filter');
      browse_data_toko_sinkronisasi();
      browse_data_lokasi_sinkronisasi();
      browse_data_customer_sinkronisasi();

      //WAKTU BATAL DI GRID, tidak bisa close
      //PRINT GRID
      $("#table_data").datagrid({
        onSelect: function() {
          row = $('#table_data').datagrid('getSelected');
        }
      });

      buat_table();
      buat_table_pending();
      buat_table_sinkronisasi();

      buat_table_cetak();

      $("#FILTERTGLAWALTRANS").datebox('setValue', '{{ date('Y-m-d') }}');
      $("#FILTERTGLAKHIRTRANS").datebox('setValue', '{{ date('Y-m-d') }}');

      $("#form_cetak_filter").dialog({
        onClose: function() {
          $("#FILTERTGLAWALTRANS").datebox('setValue', '{{ date('Y-m-d') }}');
          $("#FILTERTGLAKHIRTRANS").datebox('setValue', '{{ date('Y-m-d') }}');
          $("#table_data_cetak").datagrid('loadData', []);
        },
        onOpen: function() {},
      }).dialog('close');


      $("#txt_tgl_aw_filter").datebox('setValue', "{{ date('Y-m-d') }}");

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
            export_excel('Faktur Penjualan', $("#area_cetak").html());
            return false;
          }
        }],
        onOpen: function() {
          cetakNota = true;
        },
      }).window('close');

      $('#window_sinkronisasi').window({
        collapsible: false,
        minimizable: false,
        title: 'Sinkronisasi Penjualan Omni',
        closed: true,
        width: 800,
        height: 500
      });

      $("#form_cetak_kecil").window({
        collapsible: false,
        minimizable: false,
        tools: [{
          text: '',
          iconCls: 'icon-print',
          handler: function() {
            $("#area_cetak_kecil").printArea({
              mode: 'iframe'
            });
          }
        }, {
          text: '',
          iconCls: 'icon-excel',
          handler: function() {
            export_excel('Faktur Penjualan', $("#area_cetak_kecil").html());
            return false;
          }
        }],
        onOpen: function() {
          cetakNota = true;
        },
      }).window('close');

      $("#form_cetak_sj_kecil").window({
        collapsible: false,
        minimizable: false,
        tools: [{
          text: '',
          iconCls: 'icon-print',
          handler: function() {
            $("#area_cetak_sj_kecil").printArea({
              mode: 'iframe'
            });

            $("#form_cetak_sj_kecil").window({
              closed: true
            });
          }
        }, {
          text: '',
          iconCls: 'icon-excel',
          handler: function() {
            export_excel('Faktur Penjualan', $("#area_cetak_sj_kecil").html());
            return false;
          }
        }]
      }).window('close');

      $("#form_cetak_sj").window({
        collapsible: false,
        minimizable: false,
        tools: [{
          text: '',
          iconCls: 'icon-print',
          handler: function() {
            $("#area_cetak_sj").printArea({
              mode: 'iframe'
            });

            $("#form_cetak_sj").window({
              closed: true
            });
          }
        }, {
          text: '',
          iconCls: 'icon-excel',
          handler: function() {
            export_excel('Surat Jalan', $("#area_cetak_sj").html());
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

      tutupLoader();
    });

    shortcut.add('F2', function() {
      before_add();
    });

    function disable_button() {
      $('#btn_refresh').linkbutton('disable');
      $('#btn_batal').linkbutton('disable')
      $('#btn_cetak').linkbutton('disable')
      $('#btn_cetak_kecil').linkbutton('disable')
      $('#btn_batal_cetak').linkbutton('disable')
      $('#btn_cetak_filter').linkbutton('disable')
      $('#btn_sinkronisasi_marketplace').linkbutton('disable')
    }

    function enable_button() {
      $('#btn_refresh').linkbutton('enable');
      $('#btn_batal').linkbutton('enable')
      $('#btn_cetak').linkbutton('enable')
      $('#btn_cetak_kecil').linkbutton('enable')
      $('#btn_batal_cetak').linkbutton('enable')
      $('#btn_cetak_filter').linkbutton('enable')
      $('#btn_sinkronisasi_marketplace').linkbutton('enable')
    }

    function popup_filter() {
      $("#form_cetak_filter").window('open');
    }

    async function tampilkan_data_cetak() {
      $('#mode').val('cetak');
      //   minimize form_cetak_filter
      $("#form_cetak_filter").window('minimize');

      await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {
        // restore form_cetak_filter
        $("#form_cetak_filter").window('maximize');
        $("#form_cetak_filter").window('restore');

        data = data.data;
        if (data.cetak == 0) {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
          return false;
        }
        $("#table_data_cetak").datagrid('loadData', []);
        var tglawaltrans = $("#FILTERTGLAWALTRANS").datebox('getValue');
        var tglakhirtrans = $("#FILTERTGLAKHIRTRANS").datebox('getValue');

        var valid = true;

        if (valid) {
          try {
            bukaLoader();
            $("#table_data_cetak").datagrid('loading');
            const res = await fetchData(
              jwt,
              link_api.loadDataCetakPenjualanPenjualan, {
                tglawaltrans: tglawaltrans,
                tglakhirtrans: tglakhirtrans,
              }
            );
            $("#table_data_cetak").datagrid('loaded');
            if (!res.success) {
              $.messager.alert('Error', res.message, 'error');
            } else {
              if (res.data.length > 0) {
                $("#table_data_cetak").datagrid('loadData', res.data);
              }
            }
          } catch (e) {
            const error = (typeof e === 'string') ? e : e.message;
            $.messager.alert('Error', getTextError(error), 'error');
          } finally {
            $("#table_data_cetak").datagrid('loaded');
            tutupLoader();
          }
        }
      });
    }

    function before_add(dataref) {
      $('#mode').val('tambah');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.tambah == 1) {
          parent.buka_submenu(null, 'Tambah Penjualan',
            '{{ route('atena.penjualan.penjualan.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}' +
            (dataref ? '&dataref=' + dataref : ''),
            'fa fa-plus');
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function before_delete() {
      $('#mode').val('hapus');

      if (row) {
        if (!isTokenExpired(jwt)) {

          get_status_trans(jwt, "atena/penjualan/penjualan", "uuidjual", row.uuidjual, function(data) {
            data = data.data;
            if (data.status == 'I') {
              var kode = row.kodejual;

              const isTabOpen = parent.check_tab_exist(kode, 'fa fa-pencil');
              if (isTabOpen) {
                $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + kode +
                  ', Sebelum Dibatalkan ', 'warning');
              } else {
                get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
                  data = data.data;
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
        } else {
          $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
        }
      }
    }

    async function before_delete_print() {
      $('#mode').val('batal_cetak');

      if (row) {
        if (!isTokenExpired(jwt)) {
          //PENGECEKAN TERLEBIH DAHULU JIKA SUDAH ADA TRANSAKSI PENAGIHAN
          try {
            bukaLoader();
            const res = await fetchData(
              jwt,
              link_api.loadDataTagihanPenjualanPenjualan, {
                uuidjual: row.uuidjual
              }
            );
            if (!res.success) {
              $.messager.alert('Error', res.message, 'error');
            } else {
              if (res.data.notagihan != '') {
                $.messager.alert(
                  'Warning',
                  'Sudah Terdapat Tagihan Pelanggan Dengan No Tagihan ' +
                  res.data.notagihan + '<br> Transaksi Penjualan Tidak Dapat Dibatal Cetak',
                  'warning'
                );
              } else {
                get_status_trans(jwt, "atena/penjualan/penjualan", "uuidjual", row.uuidjual, function(data) {
                  data = data.data;
                  if (data.status == 'S') {
                    var kode = row.kodejual;
                    const isTabOpen = parent.check_tab_exist(kode, 'fa fa-pencil');
                    if (isTabOpen) {
                      $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + kode +
                        ', Sebelum Dibatal Cetak ', 'warning');
                    } else {
                      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(
                        data) {
                        data = data.data;
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
              }
            }
          } catch (e) {
            const error = (typeof e === 'string') ? e : e.message;
            $.messager.alert('Error', getTextError(error), 'error');
          } finally {
            tutupLoader();
          }
        } else {
          $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
        }
      }
    }

    function before_print(npwp, bentuk_cetak) {
      $('#mode').val('cetak');
      if (row) {
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          data = data.data;
          if (data.cetak == 0) {
            $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
            return false;
          }
          get_status_trans(jwt, "atena/penjualan/penjualan", "uuidjual", row.uuidjual, function(data) {
            data = data.data;
            if (data.status == 'I') {
              if (row.jenistransaksi != "POS") {
                var kode = row.kodejual;
                const isTabOpen = parent.check_tab_exist(kode, 'fa fa-pencil');
                if (isTabOpen) {
                  $.messager.alert(
                    'Warning',
                    'Harap Tutup Tab Atas Transaksi ' + kode + ', Sebelum Dicetak ',
                    'warning'
                  );
                } else {
                  cetak(npwp, bentuk_cetak);
                }
              } else {
                $.messager.alert(
                  'Peringatan',
                  'Transaksi ini adalah Penjualan POS, Perubahan Data Harus Dilakukan Pada Aplikasi',
                  'warning'
                );
              }
            } else {
              if (data.status == 'S' || data.status == 'P') {
                const kodemenu = modul_kode['penjualan'];
                get_akses_user(kodemenu, 'bearer {{ session('TOKEN') }}', async function(data) {
                  data = data.data;
                  if (data.hakakses == 1) {
                    if (row.jenistransaksi == 'JUAL LANGSUNG') {
                      cetak_SJ(bentuk_cetak);
                    }

                    if (bentuk_cetak == "kecil") {
                      if (row.jenistransaksi == 'JUAL LANGSUNG') {
                        const doc = await getCetakDocument(jwt, link_api.cetakKecilPenjualanPenjualan + row
                          .uuidjual);
                        if (doc) {
                          $("#area_cetak_kecil").html(doc);
                        } else {
                          $.messager.alert('Warning',
                            'Terjadi kesalahan dalam mengambil data untuk cetak transaksi', 'warning');
                          return false;
                        }
                        $("#form_cetak_kecil").window('open');
                      } else if (row.jenistransaksi == 'POS') {
                        $.messager.alert('Peringatan',
                          'Transaksi ini adalah Penjualan POS, Cetak Ulang Harus Dilakukan Pada Aplikasi',
                          'warning');
                      }
                    } else {
                      const doc = await getCetakDocument(jwt, link_api.cetakPenjualanPenjualan + row
                        .uuidjual);
                      if (doc) {
                        $("#area_cetak").html(doc);
                      } else {
                        $.messager.alert('Warning',
                          'Terjadi kesalahan dalam mengambil data untuk cetak transaksi', 'warning');
                        return false;
                      }
                      $("#form_cetak").window('open');
                    }
                  }
                });
              } else {
                $.messager.alert('Error', 'Transaksi telah Diproses', 'error');
              }
            }
          });
        });
        //window.open(url, 'Cetak Pesanan Pembelian', 'width=850, height=842, scrollbars=yes');
      }
    }

    function batal_trans() {
      $("#alasan_pembatalan").dialog('close');
      alasan = $('#ALASANPEMBATALAN').val();
      if (row && alasan != "") {
        $.messager.confirm(
          'Confirm',
          'Anda Yakin Akan Membatalkan Transaksi ' + row.kodejual + ' ?',
          async function(r) {
            if (r) {
              try {
                const res = await fetchData(
                  jwt,
                  link_api.batalTransaksiPenjualanPenjualan, {
                    uuidjual: row.uuidjual,
                    kodejual: row.kodejual,
                    alasan: alasan
                  }
                );
                if (!res.success) {
                  $.messager.alert('Error', res.message, 'error');
                } else {
                  $.messager.alert('Info', 'Pembatalan Transaksi Sukses', 'info');
                  reload();
                }
              } catch (e) {
                const error = (typeof e === "string") ? e : e.message;
                const textError = getTextError(error);
                $.messager.alert('Error', textError, 'error');
              }
            }
          });
      } else {
        $.messager.alert('Error', 'Alasan harus diisi', 'error');
      }
    }

    function batal_cetak() {
      if (row) {
        if (row.jenistransaksi != "POS") {
          $.messager.confirm(
            'Confirm',
            'Anda Yakin Akan Batal Cetak Transaksi ' + row.kodejual + ' ?',
            async function(r) {
              if (r) {
                try {
                  bukaLoader();
                  const res = await fetchData(
                    jwt,
                    link_api.ubahStatusJadiInputPenjualanPenjualan, {
                      uuidjual: row.uuidjual,
                      kodejual: row.kodejual
                    }
                  );
                  if (!res.success) {
                    $.messager.alert('Error', res.message, 'error');
                  } else {
                    $.messager.alert('Info', 'Pembatalan Cetak Sukses', 'info');
                    reload();
                  }
                } catch (e) {
                  const error = (typeof e === "string") ? e : e.message;
                  const textError = getTextError(error);
                  $.messager.alert('Error', textError, 'error');
                } finally {
                  tutupLoader();
                }
              }
            });
        } else {
          $.messager.alert(
            'Peringatan',
            'Transaksi ini ada Penjualan POS, Perubahan Data Harus Dilakukan Pada Aplikasi',
            'warning'
          );
        }
      }
    }

    async function cetak(npwp, bentuk_cetak) {
      try {
        bukaLoader();
        const res = await fetchData(
          jwt,
          link_api.ubahStatusJadiSlipPenjualanPenjualan, {
            uuidjual: row.uuidjual,
            kodejual: row.kodejual
          }
        );
        if (!res.success) {
          $.messager.alert('Error', res.message, 'error');
        } else {
          $.messager.show({
            title: 'Info',
            msg: 'Transaksi Sukses Dicetak',
            showType: 'show'
          });

          if (row.jenistransaksi == 'JUAL LANGSUNG') {
            cetak_SJ(bentuk_cetak);
          }

          if (bentuk_cetak == "kecil") {
            const doc = await getCetakDocument(jwt, link_api.cetakKecilPenjualanPenjualan + row.uuidjual);
            if (doc) {
              $("#area_cetak_kecil").html(doc);
              $("#form_cetak_kecil").window('open');
            } else {
              $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data untuk cetak transaksi', 'warning');
            }
          } else {
            const doc = await getCetakDocument(jwt, link_api.cetakPenjualanPenjualan + row.uuidjual, {
              npwp: npwp
            });
            if (doc) {
              $("#area_cetak").html(doc);
              $("#form_cetak").window('open');
            } else {
              $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data untuk cetak transaksi', 'warning');
            }
          }
          reload();
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        $.messager.alert('Error', getTextError(error), 'error');
      } finally {
        tutupLoader();
      }
    }

    async function cetak_banyak(bentuk_cetak) {
      var data = $("#table_data_cetak").datagrid('getChecked');
      // data is array of object, convert into array of string of uuidjual
      data = data.map(function(item) {
        return item.uuidjual;
      });

      //   minimize form_cetak_filter
      $("#form_cetak_filter").window('minimize');

      try {
        bukaLoader();
        const res = await fetchData(
          jwt,
          link_api.ubahStatusJadiSlipFilterPenjualanPenjualan, {
            data: data
          }
        );
        if (!res.success) {
          $.messager.alert('Error', res.message, 'error');
          return;
        }
        if (res.data.length > 0) {
          const payloadCetak = {
            data: res.data,
            bentuk_cetak: bentuk_cetak
          }
          if (bentuk_cetak == "kecil") {
            cetak_banyak_SJ(payloadCetak);
            const doc = await getCetakDocument(jwt, link_api.cetakBanyakPenjualanPenjualan, payloadCetak);
            if (doc) {
              $("#area_cetak_kecil").html(doc);
              $("#form_cetak_kecil").window('open');
            } else {
              $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data untuk cetak transaksi', 'warning');
              return false;
            }
          } else {
            cetak_banyak_SJ(payloadCetak);
            const doc = await getCetakDocument(jwt, link_api.cetakBanyakPenjualanPenjualan, payloadCetak);
            if (doc) {
              $("#area_cetak").html(doc);
              $("#form_cetak").window('open');
            } else {
              $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data untuk cetak transaksi', 'warning');
              return false;
            }
          }

          reload();

          await tampilkan_data_cetak();

          $.messager.show({
            title: 'Info',
            msg: 'Transaksi Sukses Dicetak',
            showType: 'show'
          });

        } else {
          $.messager.alert('Error', 'Tidak ada Penjualan yang dicetak', 'error');
        }
        reload();
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        $.messager.alert('Error', getTextError(error), 'error');
      } finally {
        // restore form_cetak_filter
        $("#form_cetak_filter").window('maximize');
        $("#form_cetak_filter").window('restore');
        tutupLoader();
      }
    }

    async function cetak_SJ(bentuk_cetak) {
      const isBesar = bentuk_cetak == "besar";
      const areaCetakId = isBesar ? "#area_cetak_sj" : "#area_cetak_sj_kecil";
      const formCetakId = isBesar ? "#form_cetak_sj" : "#form_cetak_sj_kecil";
      const payload = {
        bentuk_cetak: bentuk_cetak,
      };
      try {
        const url = link_api.cetakSJPenjualanPenjualan + row.uuidjual;
        const doc = await getCetakDocument(jwt, url, payload);

        if (!doc) {
          $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data untuk cetak transaksi', 'warning');
          return false;
        }

        $(areaCetakId).html(doc);
        $(formCetakId).window('open');
      } catch (error) {
        $.messager.alert('Error', 'Terjadi kesalahan sistem saat memproses cetak transaksi.', 'error');
      }
    }

    async function cetak_banyak_SJ(payload) {
      const isBesar = payload.bentuk_cetak == "besar";
      const areaCetak = isBesar ? "#area_cetak_sj" : "#area_cetak_sj_kecil";
      const formCetak = isBesar ? "#form_cetak_sj" : "#form_cetak_sj_kecil";

      try {
        const doc = await getCetakDocument(jwt, link_api.cetakBanyakSJPenjualanPenjualan, payload);

        if (!doc) {
          $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data untuk cetak transaksi', 'warning');
          return false;
        }

        $(areaCetak).html(doc);
        $(formCetak).window('open');
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        $.messager.alert('Error', getTextError(error), 'error');
      }
    }

    function refresh_data() {
      let pager = $('#table_data').datagrid('getPager');
      let pageOptions = pager.pagination('options');
      let currentPage = pageOptions.pageNumber;
      $('#table_data').datagrid('reload', {
        page: currentPage
      });
    }

    function filter_data() {
      var getLokasi = $('#txt_lokasi').combogrid('grid');
      var dataLokasi = getLokasi.datagrid('getChecked');
      var lokasi = "";
      var marketing = $('#txt_marketing_filter').combogrid('getValues').toString();

      for (var i = 0; i < dataLokasi.length; i++) {
        lokasi += (dataLokasi[i]["uuidlokasi"] + ",");
      }
      lokasi = lokasi.substring(0, lokasi.length - 1);

      var status = [];
      $("[name='cb_status_filter[]']:checked").each(function() {
        status.push($(this).val());
      });
      status = status.length > 0 ? JSON.stringify(status) : '';

      $('#table_data').datagrid('load', {
        kodetrans: $('#txt_kodetrans_filter').val(),
        lokasi: lokasi,
        kodebbk: $('#txt_kodebbk_filter').val(),
        nofakturpajak: $('#txt_nofakturpajak_filter').val(),
        nama: $('#txt_nama_customer_filter').val(),
        kota: $('#txt_kota_customer_filter').val(),
        perusahaan: $('#txt_perusahaan_filter').val(),
        tglawal: $('#txt_tgl_aw_filter').datebox('getValue'),
        tglakhir: $('#txt_tgl_ak_filter').datebox('getValue'),
        status: status,
        marketing: marketing
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
        pageSize: 20,
        url: link_api.loadDataGridPenjualanPenjualan,
        onLoadSuccess: function() {
          $('#table_data').datagrid('unselectAll');
        },
        rowStyler: function(index, row) {
          if (row.statusjual == 'S') return 'background-color:{{ session('WARNA_STATUS_S') }}';
          else if (row.statusjual == 'P') return 'background-color:{{ session('WARNA_STATUS_P') }}';
          else if (row.statusjual == 'D') return 'background-color:{{ session('WARNA_STATUS_D') }}';
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
              field: 'tgljatuhtempo',
              title: 'Jth. Tempo',
              width: 80,
              sortable: true,
              formatter: ubah_tgl_indo,
              align: 'center'
            },
            {
              field: 'uuidjual',
              hidden: true
            },
            {
              field: 'jenistransaksi',
              title: 'Jenis',
              sortable: true,
              width: 100,
              align: 'center'
            },
            {
              field: 'kodejual',
              title: 'No. Penjualan',
              width: 150,
              sortable: true,
              align: 'center'
            },
            {
              field: 'uuidlokasi',
              hidden: true
            },
            {
              field: 'namalokasi',
              hidden: true,
              title: 'Lokasi',
              width: 80,
              sortable: true,
              align: 'center'
            },
          ]
        ],
        columns: [
          [{
              field: 'uuidcustomer',
              hidden: true
            },
            {
              field: 'kodecustomer',
              title: 'Kd. Cust',
              width: 80,
              sortable: true,
              align: 'center'
            },
            {
              field: 'namacustomer',
              title: 'Nama Customer',
              width: 200,
              sortable: true
            },
            {
              field: 'kotacustomer',
              title: 'Kota',
              width: 100,
              sortable: true
            },
            ...(LIHATHARGA == 1 ? [{
                field: 'total',
                title: 'Total',
                width: 100,
                sortable: true,
                formatter: format_amount,
                align: 'right'
              },
              {
                field: 'discrp',
                title: 'Disc',
                width: 100,
                sortable: true,
                formatter: format_amount,
                align: 'right'
              },
              {
                field: 'ppnrp',
                title: 'PPN',
                width: 100,
                sortable: true,
                formatter: format_amount,
                align: 'right'
              },
              {
                field: 'uangmuka',
                title: 'Uang Muka',
                width: 100,
                sortable: true,
                formatter: format_amount,
                align: 'right'
              },
              {
                field: 'pembulatan',
                title: 'Pembulatan',
                width: 100,
                sortable: true,
                formatter: format_amount,
                align: 'right'
              },
              {
                field: 'grandtotal',
                title: 'Grand Total',
                width: 100,
                sortable: true,
                formatter: format_amount,
                align: 'right'
              },
            ] : []),
            {
              field: 'nofakturpajak',
              title: 'No. Pajak',
              width: 150,
              sortable: true,
              align: 'center'
            },
            ...(TRANSAKSI == 'HEADER' ? [{
                field: 'kodebbk',
                title: 'No. Pengeluaran',
                width: 150,
                sortable: true,
                align: 'center'
              },
              {
                field: 'kodedo',
                title: 'No. Pesanan Pengiriman',
                width: 150,
                sortable: true,
                align: 'center'
              },
              {
                field: 'kodeso',
                title: 'No. Pesanan Penjualan',
                width: 150,
                sortable: true,
                align: 'center'
              },
            ] : []),
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
              field: 'userantrian',
              title: 'User Antrian',
              width: 100,
              sortable: true
            },
            {
              field: 'tglentryantrian',
              title: 'Tgl. Input Antrian',
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
              width: 50,
              sortable: true,
              align: 'center'
            },
            {
              field: 'closing',
              title: 'Closing',
              width: 50,
              sortable: true,
              align: 'center'
            }
          ]
        ],
        onDblClickRow: function(index, data) {
          if (!isTokenExpired(jwt)) {
            const kode = data.kodejual;
            parent.buka_submenu(null, kode,
              '{{ route('atena.penjualan.penjualan.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' +
              data.uuidjual, 'fa fa-plus');
          } else {
            $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
          }
        },
      });
    }

    function buat_table_cetak() {
      $("#table_data_cetak").datagrid({
        clickToEdit: false,
        checkOnSelect: false,
        dblclickToEdit: true,
        showFooter: true,
        rownumbers: true,
        data: [],
        columns: [
          [{
              field: 'ck',
              checkbox: true
            },
            {
              field: 'uuidjual',
              hidden: true
            },
            {
              field: 'kodejual',
              title: 'No. Penjualan',
              width: 150,
              sortable: true,
              align: 'center'
            },
            {
              field: 'tgltrans',
              title: 'Tgl. Trans',
              width: 80,
              sortable: true,
              formatter: ubah_tgl_indo,
              align: 'center'
            },
            {
              field: 'uuidcustomer',
              hidden: true
            },
            {
              field: 'namacustomer',
              title: 'Nama Customer',
              width: 200,
              sortable: true
            },
            {
              field: 'grandtotal',
              title: 'Grand Total',
              width: 100,
              sortable: true,
              formatter: format_amount,
              align: 'right'
            }

          ]
        ],
      });
    }

    function buat_table_pending() {
      $("#table_pending").datagrid({
        fit: true,
        singleSelect: true,
        remoteSort: false,
        multiSort: true,
        striped: true,
        rownumbers: true,
        url: link_api.loadDataGridPendingPenjualanPenjualan,
        columns: [
          [{
              field: 'tgltrans',
              title: 'Tgl. Trans',
              width: 80,
              align: 'center'
            },
            {
              field: 'kodebbk',
              title: 'No. Trans',
              width: 100,
              sortable: true
            },
            {
              field: 'namacustomer',
              title: 'Customer',
              width: 150
            },
            {
              field: 'catatan',
              title: 'Catatan',
              width: 200
            }
          ]
        ],
        onDblClickRow: async function(index, data) {
          if (!isTokenExpired(jwt)) {
            try {
              bukaLoader();
              const res = await fetchData(
                jwt,
                link_api.cekBisaBerlanjutInventoryBarangKeluar, {
                  uuidbbk: data.uuidbbk
                }
              );
              if (!res.success) {
                $.messager.alert('Peringatan', 'Transaksi telah diproses', 'warning');
                reload();
              } else {
                before_add(data.uuidbbk);
              }
            } catch (e) {
              const error = (typeof e === 'string') ? e : e.message;
              $.messager.alert('Error', getTextError(error), 'error');
            } finally {
              tutupLoader();
            }
          } else {
            $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
          }
        }
      });
    }

    function buat_table_sinkronisasi() {
      $('#table_data_sinkronisasi').datagrid({
        toolbar: '#toolbar_sinkronisasi',
        singleSelect: true,
        columns: [
          [{
              field: 'tgltrans',
              title: 'Tgl. Trans',
              width: 80,
              sortable: true,
              formatter: ubah_tgl_indo,
              align: 'center'
            },
            {
              field: 'kodetrans',
              title: 'No. Pesanan',
              width: 200,
              sortable: true,
              align: 'center'
            },
            {
              field: 'namacustomer',
              title: 'Customer',
              width: 100,
              align: 'left',
            },
            {
              field: 'namapenerima',
              title: 'Penerima',
              width: 100,
              align: 'left',
            },
            {
              field: 'hppenerima',
              title: 'HP Penerima',
              width: 100,
              align: 'left',
            },
            {
              field: 'alamatpenerima',
              title: 'Alamat Penerima',
              width: 300,
              align: 'left',
            },
            {
              field: 'ekspedisi',
              title: 'Ekspedisi',
              width: 150,
              align: 'left',
            },
            {
              field: 'total',
              title: 'Total',
              width: 100,
              sortable: true,
              formatter: format_amount,
              align: 'right'
            },
            {
              field: 'biayakirim',
              title: 'Biaya Kirim',
              width: 100,
              sortable: true,
              formatter: format_amount,
              align: 'right'
            },
            {
              field: 'asuransi',
              title: 'Asuransi',
              width: 100,
              sortable: true,
              formatter: format_amount,
              align: 'right'
            },
            {
              field: 'voucher',
              title: 'Voucher',
              width: 100,
              sortable: true,
              formatter: format_amount,
              align: 'right'
            },
            {
              field: 'grandtotal',
              title: 'Grand Total',
              width: 100,
              sortable: true,
              formatter: format_amount,
              align: 'right'
            },
          ]
        ]
      });
    }

    function browse_data_toko_sinkronisasi() {
      $('#tokentokosinkronisasi').combogrid({
        url: link_api.browseTokoSinkronisasi,
        idField: 'token',
        textField: 'namatoko',
        panelWidth: 270,
        mode: 'local',
        columns: [
          [{
              field: 'namatoko',
              title: 'Nama Toko',
              width: 120
            },
            {
              field: 'namamarketplace',
              title: 'Marketplace',
              width: 120
            },
          ]
        ]
      });
    }

    function browse_data_customer_sinkronisasi() {
      $('#idcustomersinkronisasi').combogrid({
        panelWidth: 600,
        url: link_api.browseCustomer,
        idField: 'uuidcustomer',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        required: true,
        columns: [
          [{
              field: 'uuidcustomer',
              hidden: true
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
              field: 'uuidsyaratbayar',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 150,
              sortable: true
            },
          ]
        ]
      });
    }

    function browse_data_lokasi_sinkronisasi() {
      $('#idlokasisinkronisasi').combogrid({
        panelWidth: 380,
        url: link_api.browseLokasi,
        idField: 'uuidlokasi',
        textField: 'nama',
        mode: 'local',
        sortName: 'nama',
        sortOrder: 'asc',
        columns: [
          [{
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

    function browse_data_lokasi(id) {
      $(id).combogrid({
        panelWidth: 380,
        url: link_api.browseLokasi,
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

    function browse_data_marketing(id) {
      $(id).combogrid({
        panelWidth: 310,
        idField: 'uuidkaryawan',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        multiple: true,
        url: link_api.browseKaryawanMarketing,
        onBeforeLoad: function(param) {
          param.divisi = 'marketing';
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
              width: 200,
              sortable: true
            }
          ]
        ],
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
      $('#table_data').datagrid('reload');
      $('#table_pending').datagrid('reload');
    }

    function tampilDialogSinkronisasi() {
      $('#idlokasisinkronisasi').combogrid('clear');
      $('#idcustomersinkronisasi').combogrid('clear');
      $('#table_data_sinkronisasi').datagrid('loadData', []);

      $('#window_sinkronisasi').window({
        closed: false
      })
    }

    async function tampilDataSinkronisasi(event) {
      event.preventDefault();

      var token = $('#tokentokosinkronisasi').combogrid('grid').datagrid('getSelected').token;
      if (!token) {
        $.messager.alert('Error', 'Toko belum dipilih', 'error');
        return;
      }

      try {
        $('#table_data_sinkronisasi').datagrid('loading');
        const res = await fetchData(
          jwt,
          link_api.tampilDataSinkronisasiPenjualan, {
            token: token,
            tglawal: $('#TGLAWALSINKRONISASI').datebox('getValue'),
            tglakhir: $('#TGLAKHIRSINKRONISASI').datebox('getValue')
          }
        );
        $('#table_data_sinkronisasi').datagrid('loaded');
        if (!res.success) {
          throw new Error(res.message);
        } else {
          $('#table_data_sinkronisasi').datagrid('loadData', res.data);
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      } finally {
        $('#table_data_sinkronisasi').datagrid('loaded');
      }
    }

    async function simpanDataSinkronisasi() {
      var lokasi = $('#idlokasisinkronisasi').combogrid('getValue');
      var customer = $('#idcustomersinkronisasi').combogrid('getValue');
      var detail = $('#table_data_sinkronisasi').datagrid('getRows');

      if (lokasi == '' || customer == '') {
        $.messager.alert('Peringatan', 'Toko dan Customer belum dipilih', 'warning');
        return;
      }

      if (detail.length == 0) {
        $.messager.alert('Peringatan', 'Data belum dipilih', 'warning');
        return;
      }

      $('#window_sinkronisasi').window('minimize');

      // data dummy untuk coba simpan data ke server
      //   detail = [{
      //     "kodetrans": "MKP-2025-000124",
      //     "tgltrans": "2025-09-10",
      //     "alamatpenerima": "TES ALAMAT",
      //     "namacustomer": "Budi",
      //     "namapenerima": "Budi",
      //     "detail": [{
      //       "kodebarang": "PRS0001",
      //       "sku": "TEST",
      //       "jml": 1,
      //       "harga": 10000,
      //       "subtotal": 10000
      //     }]
      //   }];

      try {
        bukaLoader();
        const res = await fetchData(
          jwt,
          link_api.simpanDataSinkronisasiPenjualan, {
            uuidlokasi: lokasi,
            uuidcustomer: customer,
            detail: detail
          }
        );
        if (!res.success) {
          $('#window_sinkronisasi').window('maximize');
          $('#window_sinkronisasi').window('restore');
          throw new Error(res.message);
        } else {
          $('#window_sinkronisasi').window({
            closed: true
          });

          reload();

          $.messager.show({
            title: 'Info',
            msg: 'Transaksi Sukses',
            showType: 'show'
          });
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      } finally {
        tutupLoader();
      }
    }

    async function getConfigPenjualan() {
      try {
        const res = await fetchData(
          jwt,
          link_api.loadConfigPenjualan, {
            kodemenu: '{{ $kodemenu }}'
          }
        );
        if (res.success) {
          LIHATHARGA = res.data.LIHATHARGA;
          TRANSAKSI = res.data.TRANSAKSI;
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
