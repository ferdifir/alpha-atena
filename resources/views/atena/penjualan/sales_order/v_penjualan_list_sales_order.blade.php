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
      <a id="btn_cetak" title="Cetak" class="easyui-linkbutton easyui-tooltip" onclick="before_print('tidak')">
        <img src="{{ asset('assets/images/view.png') }}">
      </a>
      <a id="btn_cetak_harga" title="Cetak Dengan Harga" class="easyui-linkbutton easyui-tooltip"
        onclick="before_print('harga')">
        <img src="{{ asset('assets/images/view.png') }}">
      </a>
      <a id="btn_cetak_landscape" title="Cetak Landscape" class="easyui-linkbutton easyui-tooltip"
        onclick="before_print('landscape')">
        <img src="{{ asset('assets/images/view.png') }}">
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
              <td align="center">
                <input id="txt_tgl_aw_filter" name="txt_tgl_aw_filter" class="date" style="width:100px" />
              </td>
            </tr>
            <tr>
              <td id="label_form" align="center">s/d</td>
            </tr>
            <tr>
              <td align="center">
                <input id="txt_tgl_ak_filter" name="txt_tgl_ak_filter" class="date" style="width:100px" />
              </td>
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
              <td id="label_form" align="center">No. Pesanan Penjualan</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_kodetrans_filter" name="txt_kodetrans_filter" style="width:100px"
                  class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">No. Pesanan Pelanggan</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_kodepo_filter" name="txt_kodepo_filter" style="width:100px"
                  class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">Pelanggan</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_nama_referensi_filter" name="txt_nama_referensi_filter"
                  style="width:100px" class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">Kota</td>
            </tr>
            <tr>
              <td align="center">
                <input id="txt_kota_customer_filter" name="txt_kota_customer_filter" style="width:100px"
                  class="label_input" />
              </td>
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
            <tr>
              <td align="center">
                <p style="color:red">Kolom Approve <br>0 = Tidak Perlu Approve<br>1 = Sudah Diapprove<br>1(A)= Perlu
                  Diapprove</p>
              </td>
            </tr>
          </table>
        </div>
        <div data-options="region:'center',">
  <div class="title-grid"> Riwayat Transaksi </div>
  <table id="table_data"></table>
</div>
      </div>
    </div>
  </div>

  <div id="form_cetak" title="Preview" style="width:660px; height:450px">
    <div id="area_cetak"></div>
  </div>

  <div id="form_cetak_landscape" title="Preview" style="width:1000px; height:500px">
    <div id="area_cetak_landscape"></div>
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
          <a class="easyui-linkbutton" iconCls="icon-save" id='btn_ubah_perusahaan'
            onclick="javascript:batal_trans()">Batal</a>
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
          <input type="text" class="date" id="TGLAWALSINKRONISASI" style="width: 100px"> s/d <input
            type="text" class="date" id="TGLAKHIRSINKRONISASI" style="width: 100px">
        </td>
        <td>
          <a href="#" class="easyui-linkbutton" onclick="tampilDataSinkronisasi()">Tampilkan Data</a>
        </td>
      </tr>
    </table>
  </div>
@endsection

@push('js')
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
  <script src="{{ asset('assets/js/utils.js') }}"></script>
  <script>
    var edit_row = false;
    var idtrans = "";
    var counter = 0;
    var row = {};

    $(document).ready(async function() {

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
              idso: trans[0],
              kodeso: trans[1],
            };

            disable_button()
          }
        }
      });

      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        buat_table(data.data.lihatharga);
      });
      buat_table_sinkronisasi();

      $("#txt_tgl_aw_filter").datebox('setValue', getTglFilterAwal());

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
            export_excel('Faktur Pesanan Penjualan', $("#area_cetak").html());
            return false;
          }
        }]
      }).window('close');

      $('#window_sinkronisasi').window({
        collapsible: false,
        minimizable: false,
        title: 'Sinkronisasi SO',
        closed: true,
        width: 800,
        height: 500
      });

      $("#form_cetak_landscape").window({
        tools: [{
          text: '',
          iconCls: 'icon-print',
          handler: function() {
            $("#area_cetak_landscape").printArea({
              mode: 'iframe'
            });
          }
        }, {
          text: '',
          iconCls: 'icon-excel',
          handler: function() {
            export_excel('Faktur Pesanan Penjualan', $("#area_cetak_landscape").html());
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

    $("#btn_browse").click(function() {
      browse_alamat_kirim();
    });

    shortcut.add('F2', function() {
      before_add();
    });

    function disable_button() {
      $('#btn_refresh').linkbutton('disable');
      $('#btn_batal').linkbutton('disable')
      $('#btn_cetak').linkbutton('disable')
      $('#btn_cetak_harga').linkbutton('disable')
      $('#btn_cetak_landscape').linkbutton('disable')
      $('#btn_batal_cetak').linkbutton('disable')
      $('#btn_sinkronisasi_marketplace').linkbutton('disable')
    }

    function enable_button() {
      $('#btn_refresh').linkbutton('enable');
      $('#btn_batal').linkbutton('enable')
      $('#btn_cetak').linkbutton('enable')
      $('#btn_cetak_harga').linkbutton('enable')
      $('#btn_cetak_landscape').linkbutton('enable')
      $('#btn_batal_cetak').linkbutton('enable')
      $('#btn_sinkronisasi_marketplace').linkbutton('enable')
    }

    function before_add() {
      $('#mode').val('tambah');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.tambah == 1) {
          parent.buka_submenu(null, 'Tambah Pesanan Penjualan',
            '{{ route('atena.penjualan.salesorder.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
            'fa fa-plus');
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function before_delete() {
      $('#mode').val('hapus');

      if (row) {
        if (!isTokenExpired()) {
          get_status_trans('{{ session('TOKEN') }}', "atena/penjualan/pesanan-penjualan", 'uuidso', row.uuidso, function(
            data) {
            data = data.data;
            if (data.status == 'I') {
              var kode = row.kodeso;
              if ($('#tab_transaksi').tabs('exists', kode)) {
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
          $.messager.alert('Warning', 'Token tidak valid, harap login kembali', 'warning');
        }
      }
    }

    function before_delete_print() {
      $('#mode').val('batal_cetak');

      if (row) {
        if (!isTokenExpired()) {
          get_status_trans('{{ session('TOKEN') }}', "atena/penjualan/pesanan-penjualan", 'uuidso', row.uuidso, function(
            data) {
            data = data.data;
            if (data.status == 'S') {
              var kode = row.kodeso;
              var isTabAvailable = parent.check_tab_exist(kode, 'fa fa-pencil');
              if (isTabAvailable) {
                $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + kode +
                  ', Sebelum Dibatal Cetak ', 'warning');
              } else {
                get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
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
        } else {
          $.messager.alert('Warning', 'Token tidak valid, harap login kembali', 'warning');
        }
      }
    }

    function before_print($jenis) {
      $('#mode').val('cetak');

      if (row) {
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          data = data.data;
          if (data.cetak == 0) {
            $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
            return false;
          }
          get_status_trans('{{ session('TOKEN') }}', "atena/penjualan/pesanan-penjualan", 'uuidso', row.uuidso,
            function(data) {
              data = data.data;
              if (data.status == 'S' || data.status == 'P') {
                const kodemenu = modul_kode['penjualan'];
                get_akses_user(kodemenu, 'bearer {{ session('TOKEN') }}', async function(data) {
                  data = data.data;
                  if (data.hakakses == 1) {
                    if ($jenis == "harga") {
                      const document = await getCetakDocument(
                        '{{ session('TOKEN') }}',
                        link_api.cetakPenjualanSalesOrder + row.uuidso, {
                          harga: "ya"
                        }
                      );
                      if (document == null) {
                        $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data', 'warning');
                        return false;
                      }
                      $("#area_cetak").html(document);
                      $("#form_cetak").window('open');
                    } else if ($jenis == "landscape") {
                      const document = await getCetakDocument(
                        '{{ session('TOKEN') }}',
                        link_api.cetakLandscapePenjualanSalesOrder + row.uuidso
                      );
                      if (document == null) {
                        $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data', 'warning');
                        return false;
                      }
                      $("#area_cetak_landscape").html(document);
                      $("#form_cetak_landscape").window('open');
                    } else {
                      const document = await getCetakDocument(
                        '{{ session('TOKEN') }}',
                        link_api.cetakPenjualanSalesOrder + row.uuidso, {
                          harga: "tidak"
                        }
                      );
                      if (document == null) {
                        $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data', 'warning');
                        return false;
                      }
                      $("#area_cetak").html(document);
                      $("#form_cetak").window('open');
                    }
                    reload();
                  }
                });
              } else if (data.status == 'I') {
                var kode = row.kodeso;
                if ($('#tab_transaksi').tabs('exists', kode)) {
                  $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + kode + ', Sebelum Dicetak ',
                    'warning');
                } else {
                  if ($jenis == "harga") {
                    cetak($jenis);
                  } else if ($jenis == "landscape") {
                    cetak($jenis);
                  } else {
                    cetak($jenis);
                  }
                }
              } else {
                $.messager.alert('Error', 'Transaksi telah Diproses', 'error');
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
        $.messager.confirm('Confirm', 'Anda Yakin Akan Membatalkan Transaksi ' + row.kodeso + ' ?', async function(r) {
          if (r) {
            try {
              bukaLoader();
              const response = await fetchData('{{ session('TOKEN') }}', link_api
                .batalTransaksiPenjualanSalesOrder, {
                  uuidso: row.uuidso,
                  kodeso: row.kodeso,
                  alasan: alasan,
                });
              if (response.success) {
                $.messager.alert('Info', 'Pembatalan Transaksi Sukses', 'info');
                reload();
              } else {
                $.messager.alert('Error', response.message, 'error');
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
        $.messager.alert('Error', 'Alasan harus diisi', 'error');
      }
    }

    function batal_cetak() {
      if (row) {

        $.messager.confirm('Confirm', 'Anda Yakin Akan Batal Cetak Transaksi ' + row.kodeso + ' ?', async function(r) {
          if (r) {
            try {
              bukaLoader();
              const response = await fetchData('{{ session('TOKEN') }}', link_api
                .ubahStatusJadiInputPenjualanSalesOrder, {
                  uuidso: row.uuidso,
                  kodeso: row.kodeso,
                });
              if (response.success) {
                $.messager.alert('Info', 'Pembatalan Cetak Sukses', 'info');
                reload();
              } else {
                $.messager.alert('Error', response.message, 'error');
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
      }
    }

    async function cetak($harga) {
      try {
        bukaLoader();
        const res = await fetchData('{{ session('TOKEN') }}', link_api.ubahStatusJadiSlipPenjualanSalesOrder, {
          uuidso: row.uuidso,
          kodeso: row.kodeso
        });
        if (!res.success) {
          throw res.message;
        }
        $.messager.show({
          title: 'Info',
          msg: 'Transaksi Sukses Dicetak',
          showType: 'show'
        });
        if ($harga == "harga") {
          const document = await getCetakDocument(
            '{{ session('TOKEN') }}',
            link_api.cetakPenjualanSalesOrder + row.uuidso, {
              harga: "ya"
            }
          );
          if (document == null) {
            $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data', 'warning');
            return false;
          }
          $("#area_cetak").html(document);
          $("#form_cetak").window('open');
        } else if ($harga == "landscape") {
          const document = await getCetakDocument(
            '{{ session('TOKEN') }}',
            link_api.cetakLandscapePenjualanSalesOrder + row.uuidso
          );
          if (document == null) {
            $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data', 'warning');
            return false;
          }
          $("#area_cetak_landscape").html(document);
          $("#form_cetak_landscape").window('open');
        } else {
          const document = await getCetakDocument(
            '{{ session('TOKEN') }}',
            link_api.cetakPenjualanSalesOrder + row.uuidso, {
              harga: "tidak"
            }
          );
          if (document == null) {
            $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data', 'warning');
            return false;
          }
          $("#area_cetak").html(document);
          $("#form_cetak").window('open');
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      } finally {
        tutupLoader();
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
        lokasi += (dataLokasi[i]["id"] + ",");
      }

      lokasi = lokasi.substring(0, lokasi.length - 1);

      var status = [];

      $("[name='cb_status_filter[]']:checked").each(function() {
        status.push($(this).val());
      });

      $('#table_data').datagrid('load', {
        kodetrans: $('#txt_kodetrans_filter').val(),
        kodepo: $('#txt_kodepo_filter').val(),
        lokasi: lokasi,
        nama: $('#txt_nama_referensi_filter').val(),
        perusahaan: $('#txt_perusahaan_filter').val(),
        tglawal: $('#txt_tgl_aw_filter').datebox('getValue'),
        tglakhir: $('#txt_tgl_ak_filter').datebox('getValue'),
        kota: $('#txt_kota_customer_filter').val(),
        status: status,
        marketing: marketing
      });
    }

    function buat_table(lihatharga) {
      $("#table_data").datagrid({
        fit: true,
        singleSelect: true,
        remoteSort: false,
        multiSort: true,
        striped: true,
        rownumbers: true,
        pageSize: 20,
        pagination: true,
        clientPaging: false,
        url: link_api.loadDataGridPenjualanSalesOrder,
        rowStyler: function(index, row) {
          if (row.status == 'S') return 'background-color:{{ session('WARNA_STATUS_S') }}';
          else if (row.status == 'P') return 'background-color:{{ session('WARNA_STATUS_P') }}';
          else if (row.status == 'D') return 'background-color:{{ session('WARNA_STATUS_D') }}';
        },
        onLoadSuccess: function(data) {
          $('#table_data').datagrid('unselectAll');
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
              field: 'uuidlokasi',
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
            {
              field: 'namalokasi',
              hidden: true,
              title: 'Nama Lokasi',
              width: 120,
              sortable: true,
              align: 'center'
            },
            {
              field: 'uuidso',
              hidden: true
            },
            {
              field: 'kodeso',
              title: 'No. Pesanan Penjualan',
              width: 145,
              sortable: true,
              align: 'center'
            },
            {
              field: 'kodepo',
              title: 'No. Pesanan Pelanggan',
              width: 145,
              sortable: true,
              align: 'center'
            },
            {
              field: 'approve',
              title: 'Approve',
              width: 75,
              sortable: true,
              align: 'center',
              formatter: function(val) {
                if (val == 0) return '0';
                if (val == 1) return '1';
                if (val == 3) return '1(A)';
              }
            },
          ]
        ],
        columns: [
          [{
              field: 'namaekspedisi',
              title: 'Nama Ekspedisi',
              width: 200,
              sortable: true
            },
            {
              field: 'kodecustomer',
              title: 'Kd. Pelanggan',
              width: 100,
              sortable: true
            },
            {
              field: 'namacustomer',
              title: 'Nama Pelanggan',
              width: 200,
              sortable: true
            },
            {
              field: 'kota',
              title: 'Kota Pelanggan',
              width: 100,
              align: 'center',
              sortable: true
            },
            {
              field: 'namasubcustomer',
              title: 'Nama SubPelanggan',
              width: 180,
              sortable: true
            },
            ...(lihatharga == 1 ? [{
                field: 'total',
                title: 'Total',
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
              }
            ] : []),
            {
              field: 'tglkirim',
              title: 'Tgl. Kirim',
              width: 80,
              sortable: true,
              formatter: ubah_tgl_indo,
              align: 'center'
            },
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
          if (!isTokenExpired()) {
            var tab_title = row.kodeso;
            parent.buka_submenu(null, tab_title,
              '{{ route('atena.penjualan.salesorder.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' +
              row.uuidso,
              'fa fa-pencil');
          } else {
            $.messager.alert('Warning', 'Token tidak valid, harap login kembali', 'warning');
          }
        },
      });
    }

    function isTokenExpired() {
      const token = '{{ session('TOKEN') }}';
      if (!token) {
        return true;
      }

      try {
        const payloadBase64 = token.split('.')[1];
        const decodedPayload = atob(payloadBase64);
        const payload = JSON.parse(decodedPayload);

        const expirationTime = payload.exp;
        const currentTime = Math.floor(Date.now() / 1000);

        return expirationTime < currentTime;
      } catch (e) {
        console.error('Gagal mendekode token JWT:', e);
        return true;
      }
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

    function reload() {
      $('#table_data').datagrid('reload');
    }

    function tampilDialogSinkronisasi() {
      $('#idlokasisinkronisasi').combogrid('clear');
      $('#idcustomersinkronisasi').combogrid('clear');
      $('#table_data_sinkronisasi').datagrid('loadData', []);

      $('#window_sinkronisasi').window({
        closed: false
      })
    }

    async function tampilDataSinkronisasi() {
      var token = $('#tokentokosinkronisasi').combogrid('grid').datagrid('getSelected').token;
      try {
        $('#table_data_sinkronisasi').datagrid('loading');
        const response = await fetchData('{{ session('TOKEN') }}', link_api.tampilDataSinkronisasiSO, {
          token: token,
          tglawal: $('#TGLAWALSINKRONISASI').datebox('getValue'),
          tglakhir: $('#TGLAKHIRSINKRONISASI').datebox('getValue')
        });

        $('#table_data_sinkronisasi').datagrid('loaded');

        if (response.success) {
          $('#table_data_sinkronisasi').datagrid('loadData', response.data);
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      } finally {
        tutupLoader();
      }
    }

    async function simpanDataSinkronisasi() {
      var lokasi = $('#idlokasisinkronisasi').combogrid('getValue');
      var customer = $('#idcustomersinkronisasi').combogrid('getValue');
      var detail = $('#table_data_sinkronisasi').datagrid('getRows');

      try {
        bukaLoader();
        const response = await fetchData('{{ session('TOKEN') }}', link_api.simpanDataSinkronisasiSO, {
          uuidlokasi: lokasi,
          uuidcustomer: customer,
          detail: detail
        });
        $('#window_sinkronisasi').window('maximize');
        $('#window_sinkronisasi').window('restore');

        if (response.success) {
          $('#window_sinkronisasi').window({
            closed: true
          });

          reload();

          $.messager.show({
            title: 'Info',
            msg: 'Transaksi Sukses',
            showType: 'show'
          });
        } else {
          $.messager.alert('Peringatan', response.message, 'warning');
        }
      } catch (e) {
        $('#window_sinkronisasi').window('maximize');
        $('#window_sinkronisasi').window('restore');
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      } finally {
        tutupLoader();
      }
    }
  </script>
@endpush
