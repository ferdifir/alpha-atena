@extends('template.app')

@section('content')
  <div class="easyui-layout" fit="true">
    <div class="btn-group-transaksi" data-options="region: 'west'" style="width: 50px">
      <a id="btn_tambah" title="Tambah Transaksi" class="easyui-linkbutton easyui-tooltip" onclick="before_add()">
        <img src="{{ asset('assets/images/add.png') }}">
      </a>
      <a id="btn_refresh" title="Refresh Data" class="easyui-linkbutton easyui-tooltip" onclick="refresh_data()">
        <img src="{{ asset('assets/images/refresh.png') }}">
      </a>
      <a id="btn_batal" title="Batalkan Transaksi" class="easyui-linkbutton easyui-tooltip" onclick="before_delete()">
        <img src="{{ asset('assets/images/cancel.png') }}">
      </a>
      <a id="btn_cetak" title="Cetak" class="easyui-linkbutton easyui-tooltip" onclick="before_print()">
        <img src="{{ asset('assets/images/view.png') }}">
      </a>
      <a id="btn_batal_cetak" title="Batal Cetak" class="easyui-linkbutton easyui-tooltip"
        onclick="before_delete_print()">
        <img src="{{ asset('assets/images/cancel-print.png') }}">
      </a>
    </div>

    <div data-options="region: 'center'">
      <div class="easyui-layout" fit="true" id="main_layout">
        <div data-options="region: 'center'">
          <div id="tab_transaksi" class="easyui-tabs" fit="true">
            <div title="Grid" id="Grid">
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
                      <td align="center">
                        <input id="txt_lokasi" name="txt_lokasi[]" style="width:100px" class="label_input" />
                      </td>
                    </tr>
                    <tr>
                      <td id="label_form"><br></td>
                    </tr>
                    <tr>
                      <td id="label_form" align="center">No. Pesanan Pengiriman</td>
                    </tr>
                    <tr>
                      <td align="center">
                        <input id="txt_kodetrans_filter" name="txt_kodetrans_filter" style="width:100px"
                          class="label_input" />
                      </td>
                    </tr>
                    <tr>
                      <td id="label_form"><br></td>
                    </tr>
                    <tr>
                      <td id="label_form" align="center">Customer</td>
                    </tr>
                    <tr>
                      <td align="center">
                        <input id="txt_nama_referensi_filter" name="txt_nama_referensi_filter" style="width:100px"
                          class="label_input" />
                      </td>
                    </tr>
                    <tr>
                      <td id="label_form"><br></td>
                    </tr>
                    <tr>
                      <td id="label_form" align="center">Status</td>
                    </tr>
                    <tr>
                      <td align="center">
                        <label id="label_form">
                          <input type="checkbox" value="I" name="cb_status_filter[]">
                          I</label>
                        <label id="label_form">
                          <input type="checkbox" value="S" name="cb_status_filter[]">
                          S</label>
                        <label id="label_form">
                          <input type="checkbox" value="P" name="cb_status_filter[]">
                          P</label>
                        <label id="label_form">
                          <input type="checkbox" value="D" name="cb_status_filter[]">
                          D</label>
                      </td>
                    </tr>
                    <tr>
                      <td align="center"><a id="btn_search" class="easyui-linkbutton"
                          data-options="iconCls:'icon-search', plain:false" onclick="filter_data()">Tampilkan Data</a>
                      </td>
                    </tr>
                  </table>
                </div>
                <div data-options="region:'center'">
                  <div class="easyui-layout" fit="true" id="main_wrapper">
                    <div data-options="region: 'center'">
                      <table id="table_data"></table>
                    </div>
                    <div data-options="region: 'west', split:true,hideCollapsedContent:false,collapsed:true"
                      title="Daftar Antrian SO" style="width: 25%;">
                      <div id="table_pending"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="form_cetak" title="Preview" style="width:660px; height:450px">
    <div id="area_cetak"></div>
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
@endsection

@push('js')
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
  <script src="{{ asset('assets/js/utils.js') }}"></script>
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

      getKonfigurasi().then(res => {
        const transaksiso = res.transo.value;
        const lihatharga = res.akses.lihatharga;
        buat_table(transaksiso, lihatharga);
      });
      buat_table_pending();

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
            export_excel('Faktur Pesanan Pengiriman', $("#area_cetak").html());
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
      $('#btn_batal_cetak').linkbutton('disable')
    }

    function enable_button() {
      $('#btn_refresh').linkbutton('enable');
      $('#btn_batal').linkbutton('enable')
      $('#btn_cetak').linkbutton('enable')
      $('#btn_batal_cetak').linkbutton('enable')
    }

    function before_add(uuidso) {
      $('#mode').val('tambah');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.tambah == 1) {
          parent.buka_submenu(null, 'Tambah Pesanan Pengiriman',
            '{{ route('atena.penjualan.deliveryorder.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}&dataref=' +
            uuidso,
            'fa fa-plus');
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }

        $('#idtransreferensi').val(null);
      });
    }

    function before_delete() {
      $('#mode').val('hapus');
      if (row) {
        if (!isTokenExpired('{{ session('TOKEN') }}')) {
          get_status_trans("atena/penjualan/pesanan-pengiriman", 'uuiddo', row.uuiddo, function(data) {
            data = data.data;
            if (data.status == 'I') {
              var kode = row.kodedo;
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
        if (!isTokenExpired('{{ session('TOKEN') }}')) {
          get_status_trans("atena/penjualan/pesanan-pengiriman", 'uuiddo', row.uuiddo, function(data) {
            data = data.data;
            if (data.status == 'S') {
              var kode = row.kodedo;
              var isTabOpen = parent.check_tab_exist(kode, 'fa fa-pencil');
              if (isTabOpen) {
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

    function before_print() {
      $('#mode').val('cetak');

      if (row) {
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          data = data.data;
          if (data.cetak == 0) {
            $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
            return false;
          }

          get_status_trans("atena/penjualan/pesanan-pengiriman", 'uuiddo', row.uuiddo, function(data) {
            data = data.data;
            if (data.status == 'S' || data.status == 'P') {
              const kodemenu = modul_kode['penjualan'];
              get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {
                data = data.data;
                if (data.hakakses == 1) {
                  const doc = await getCetakDocument(
                    '{{ session('TOKEN') }}',
                    link_api.cetakPenjualanDeliveryOrder + row.uuiddo
                  );
                  if (doc == null) {
                    $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data cetak transaksi',
                      'warning');
                    return false;
                  }
                  $("#area_cetak").html(doc);
                  $("#form_cetak").window('open');
                }
              });
            } else if (data.status == 'I') {
              var kode = row.kodedo;
              if ($('#tab_transaksi').tabs('exists', kode)) {
                $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + kode + ', Sebelum Dicetak ',
                  'warning');
              } else {
                cetak();
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
        $.messager.confirm('Confirm', 'Anda Yakin Akan Membatalkan Transaksi ' + row.kodedo + ' ?', function(r) {
          if (r) {
            fetchData(
              '{{ session('TOKEN') }}',
              link_api.batalTransaksiPenjualanDeliveryOrder, {
                uuiddo: row.uuiddo,
                kodedo: row.kodedo,
                alasan: alasan
              }
            ).then(res => {
              if (res.success) {
                $.messager.alert('Info', 'Pembatalan Transaksi Sukses', 'info');
                reload();
              } else {
                $.messager.alert('Error', res.message, 'error');
              }
            }).catch(err => {
              const error = (typeof err === 'string') ? err : err.message;
              const textError = getTextError(error);
              $.messager.alert('Error', textError, 'error');
            });
          }
        });
      } else {
        $.messager.alert('Error', 'Alasan harus diisi', 'error');
      }
    }

    function batal_cetak() {
      if (row) {
        $.messager.confirm('Confirm', 'Anda Yakin Akan Batal Cetak Transaksi ' + row.kodedo + ' ?', async function(r) {
          if (r) {
            try {
              const response = await fetchData(
                '{{ session('TOKEN') }}',
                link_api.ubahStatusjadiInputPenjualanDeliveryOrder, {
                  uuiddo: row.uuiddo,
                  kodedo: row.kodedo
                }
              );
              if (response.success) {
                $.messager.show({
                  title: 'Info',
                  msg: 'Transaksi Sukses Dibatal Cetak',
                  showType: 'show'
                });
                reload();
              } else {
                $.messager.alert('Error', response.message, 'error');
              }
            } catch (e) {
              const error = (typeof e === 'string') ? e : e.message;
              const textError = getTextError(error);
              $.messager.alert('Error', textError, 'error');
            }
          }
        });
      }
    }

    async function cetak() {
      try {
        bukaLoader();
        const response = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.ubahStatusjadiSlipPenjualanDeliveryOrder, {
            uuiddo: row.uuiddo,
            kodedo: row.kodedo
          }
        );
        if (response.success) {
          $.messager.show({
            title: 'Info',
            msg: 'Transaksi Sukses Dicetak',
            showType: 'show'
          });
          const doc = await getCetakDocument(
            '{{ session('TOKEN') }}',
            link_api.cetakPenjualanDeliveryOrder + row.uuiddo
          );
          if (doc == null) {
            $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data untuk cetak transaksi', 'warning');
            return false;
          }
          $("#area_cetak").html(doc);
          $("#form_cetak").window('open');
          reload();
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

    function tampil_antrian() {
      $('#main_wrapper').layout('expand', 'east');

      $('#btn_tampil_antrian').hide();
      $('#btn_tutup_antrian').show();
    }

    function tutup_antrian() {
      $('#main_wrapper').layout('collapse', 'east');

      $('#btn_tampil_antrian').show();
      $('#btn_tutup_antrian').hide();
    }

    function refresh_data() {
      $('#table_data').datagrid('reload');
    }

    function filter_data() {
      var getLokasi = $('#txt_lokasi').combogrid('grid');
      var dataLokasi = getLokasi.datagrid('getChecked');
      var lokasi = "";
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
        nama: $('#txt_nama_referensi_filter').val(),
        perusahaan: $('#txt_perusahaan_filter').val(),
        tglawal: $('#txt_tgl_aw_filter').datebox('getValue'),
        tglakhir: $('#txt_tgl_ak_filter').datebox('getValue'),
        status: status
      });
    }

    function buat_table(transaksiso, lihatharga) {
      $("#table_data").datagrid({
        fit: true,
        singleSelect: true,
        remoteSort: false,
        multiSort: true,
        striped: true,
        rownumbers: true,
        pagination: true,
        clientPaging: false,
        pageSize: 20,
        url: link_api.loadDataGridPenjualanDeliveryOrder,
        rowStyler: function(index, row) {
          if (row.status == 'S') return 'background-color:{{ session('WARNA_STATUS_S') }}';
          else if (row.status == 'P') return 'background-color:{{ session('WARNA_STATUS_P') }}';
          else if (row.status == 'D') return 'background-color:{{ session('WARNA_STATUS_D') }}';
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
              field: 'uuiddo',
              hidden: true
            },
            {
              field: 'kodedo',
              title: 'No. Pesanan Pengiriman',
              width: 120,
              sortable: true,
              align: 'center'
            },
            {
              field: 'kodepo',
              title: 'No. Pesanan Pembelian',
              width: 120,
              sortable: true,
              align: 'center',
              hidden: true
            },
            // start condition transaksiso
            ...(transaksiso == 'HEADER' ? [{
                field: 'uuidso',
                hidden: true
              },
              {
                field: 'kodeso',
                title: 'No. Pesanan Penjualan',
                width: 120,
                sortable: true,
                align: 'center'
              },
            ] : []),
            // end condition transaksiso
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
          ]
        ],
        columns: [
          [{
              field: 'uuidcustomer',
              hidden: true
            },
            {
              field: 'kodecustomer',
              title: 'Kd. Customer',
              width: 120,
              sortable: true
            },
            {
              field: 'namacustomer',
              title: 'Nama Customer',
              width: 200,
              sortable: true
            },
            {
              field: 'namasubcustomer',
              title: 'Nama Sub Customer',
              width: 180,
              sortable: true
            },
            // start condition lihatharga
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
              },
            ] : []),
            // end condition lihatharga
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
          if (!isTokenExpired('{{ session('TOKEN') }}')) {
            var tab_title = row.kodedo;
            parent.buka_submenu(null, tab_title,
              '{{ route('atena.penjualan.deliveryorder.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' +
              row.uuiddo,
              'fa fa-pencil');
          } else {
            $.messager.alert('Warning', 'Token tidak valid, harap login kembali', 'warning');
          }
        },
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
        url: link_api.loadDataGridPendingPenjualanDeliveryOrder,
        columns: [
          [{
              field: 'tgltrans',
              title: 'Tgl. Trans',
              width: 80,
              align: 'center'
            },
            {
              field: 'kodetrans',
              title: 'No. SO',
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
          if (!isTokenExpired('{{ session('TOKEN') }}')) {
            try {
              bukaLoader();
              const response = await fetchData(
                '{{ session('TOKEN') }}',
                link_api.cekBisaBerlanjutSO, {
                  uuidso: data.uuidso
                }
              );

              if (response.success) {
                before_add(data.uuidso);
              } else {
                $.messager.alert('Peringatan', response.message, 'warning');
                reload();
              }
            } catch (e) {
              const error = (typeof e === 'string') ? e : e.message;
              const textError = getTextError(error);
              $.messager.alert('Error', textError, 'error');
            } finally {
              tutupLoader();
            }
          } else {
            $.messager.alert('Warning', 'Token tidak valid, harap login kembali', 'warning');
          }
        }
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
      $('#table_pending').datagrid('reload');
    }

    async function getKonfigurasi() {
      try {
        const token = '{{ session('TOKEN') }}';
        const [res1, res2] = await Promise.all([
          fetchData(token, link_api.getConfig, {
            modul: 'TDO',
            config: 'TRANSAKSISO'
          }),
          fetchData(token, link_api.getDataAkses, {
            kodemenu: '{{ $kodemenu }}'
          }),
        ]);

        if (!res1.success) {
          throw new Error(res1.message);
        }

        if (!res2.success) {
          throw new Error(res2.message);
        }

        return {
          transo: res1.data,
          akses: res2.data
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
        return null;
      }
    }
  </script>
@endpush
