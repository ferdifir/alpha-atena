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
      <a id="btn_cetak_collie" title="Cetak Collie" class="easyui-linkbutton easyui-tooltip"
        onclick="before_print('collie')">
        <img src="{{ asset('assets/images/view.png') }}">
      </a>
      <a id="btn_cetak_ekspedisi" title="Cetak Ekspedisi" class="easyui-linkbutton easyui-tooltip"
        onclick="before_print('ekspedisi')">
        <img src="{{ asset('assets/images/view.png') }}">
      </a>
      <a id="btn_batal_cetak" title="Batal Cetak" class="easyui-linkbutton easyui-tooltip"
        onclick="before_delete_print()">
        <img src="{{ asset('assets/images/cancel-print.png') }}">
      </a>
    </div>

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
                    <input id="txt_tgl_aw_filter" name="txt_tgl_aw_filter" class="date" style="width:119px" />
                  </td>
                </tr>
                <tr>
                  <td id="label_form" align="center">s/d</td>
                </tr>
                <tr>
                  <td align="center">
                    <input id="txt_tgl_ak_filter" name="txt_tgl_ak_filter" class="date" style="width:119px" />
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
                    <input id="txt_lokasi" name="txt_lokasi[]" style="width:119px" class="label_input" />
                  </td>
                </tr>
                <tr>
                  <td id="label_form"><br></td>
                </tr>
                <tr>
                  <td id="label_form" align="center">Jenis Transaksi</td>
                </tr>
                <tr>
                  <td id="label_form" align="center">
                    <select class="easyui-combobox" id="txt_jenistransaksi_filter" data-options="panelHeight:'auto'"
                      name="txt_jenistransaksi_filter" style="width:120px;">
                      <option value="penjualan so">
                        PENJUALAN SO
                      </option>
                      <option value="penjualan do">
                        PENJUALAN DO
                      </option>
                      <option value="retur">
                        RETUR PEMBELIAN
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td id="label_form"><br></td>
                </tr>
                <tr>
                  <td id="label_form" align="center">No. Pengeluaran</td>
                </tr>
                <tr>
                  <td align="center">
                    <input id="txt_kodetrans_filter" name="txt_kodetrans_filter" style="width:119px"
                      class="label_input" />
                  </td>
                </tr>
                <tr>
                  <td id="label_form"><br></td>
                </tr>
                <tr>
                  <td id="label_form" align="center">No. Trans. Ref.</td>
                </tr>
                <tr>
                  <td align="center">
                    <input id="txt_kodetransreferensi_filter" name="txt_kodetransreferensi_filter" style="width:119px"
                      class="label_input" />
                  </td>
                </tr>
                <tr>
                  <td id="label_form"><br></td>
                </tr>
                <tr>
                  <td id="label_form" align="center">Nama Referensi</td>
                </tr>
                <tr>
                  <td align="center">
                    <input id="txt_nama_referensi_filter" name="txt_nama_referensi_filter" style="width:119px"
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
                      <input type="checkbox" value="I" name="cb_status_filter[]"> I
                    </label>
                    <label id="label_form">
                      <input type="checkbox" value="S" name="cb_status_filter[]"> S
                    </label>
                    <label id="label_form">
                      <input type="checkbox" value="P" name="cb_status_filter[]"> P
                    </label>
                    <label id="label_form">
                      <input type="checkbox" value="D" name="cb_status_filter[]"> D
                    </label>
                  </td>
                </tr>
                <tr>
                  <td align="center">
                    <a id="btn_search" class="easyui-linkbutton" data-options="iconCls:'icon-search', plain:false"
                      onclick="filter_data()">
                      Tampilkan Data
                    </a>
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
                  title="Daftar Antrian SO/DO/Retur Beli" style="width: 25%;">
                  <div id="table_pending"></div>
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

  <div id="form_cetak_colliebarang" title="Preview" style="width:660px; height:500px">
    <div id="area_cetak_colliebarang"></div>
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
@endsection

@push('js')
  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}">
  </script>
  <script type="text/javascript" src="{{ asset('assets/js/utils.js') }}"></script>
  <script>
    var edit_row = false;
    var idtrans = "";
    var urltransreferensi = "";
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

      buat_table();
      buat_table_pending();

      $('#txt_jenistransaksi_filter').combobox('setValue', '');
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
            export_excel('Faktur Pengeluaran Barang', $("#area_cetak").html());
            return false;
          }
        }]
      }).window('close');

      $("#form_cetak_colliebarang").window({
        collapsible: false,
        minimizable: false,
        tools: [{
          text: '',
          iconCls: 'icon-print',
          handler: function() {
            $("#area_cetak").printArea({
              mode: 'iframe'
            });
          }
        }, {
          text: '',
          iconCls: 'icon-excel',
          handler: function() {
            export_excel('Faktur Pengeluaran Barang (Collie)', $("#area_cetak").html());
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
      $('#btn_cetak_collie').linkbutton('disable')
      $('#btn_cetak_ekspedisi').linkbutton('disable')
      $('#btn_batal_cetak').linkbutton('disable')
    }

    function enable_button() {
      $('#btn_refresh').linkbutton('enable');
      $('#btn_batal').linkbutton('enable')
      $('#btn_cetak').linkbutton('enable')
      $('#btn_cetak_collie').linkbutton('enable')
      $('#btn_cetak_ekspedisi').linkbutton('enable')
      $('#btn_batal_cetak').linkbutton('enable')
    }

    function before_add() {
      $('#mode').val('tambah');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.tambah == 1) {
          counter++;
          $("#mode").val("tambah");
          $("#data").val('');

          var tab_title = 'Tambah';
          var tab_name = tab_title + "_" + counter;

          $('#form_data').attr('target', tab_name);

          $('#tab_transaksi').tabs('add', {
            title: tab_title,
            id: counter,
            content: '<iframe frameborder="0"  class="tab_form"  id="' + counter + '" name="' + tab_name +
              '"></iframe>',
            closable: true
          });

          $('#form_data').submit();
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }

        $('#idtransreferensi').val(null);
        $('#jenistransreferensi').val(null);
      });
    }

    function before_delete() {
      $('#mode').val('hapus');

      if (row) {
        if (!isTokenExpired('{{ session('TOKEN') }}')) {


          get_status_trans("atena/inventori/bukti-pengeluaran-barang", "uuidbbk", row.uuidbbk, function(data) {
            data = data.data;
            if (data.status == 'I') {
              var kode = row.kodebbk;
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
          get_status_trans("atena/inventori/bukti-pengeluaran-barang", "uuidbbk", row.uuidbbk, function(data) {
            data = data.data;
            if (data.status == 'S') {
              var kode = row.kodebbk;
              if ($('#tab_transaksi').tabs('exists', kode)) {
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

    function before_print(jeniscetak) {
      $('#mode').val('cetak');

      if (row) {
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          data = data.data;
          if (data.cetak == 0) {
            $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
            return false;
          }
          get_status_trans("atena/inventori/bukti-pengeluaran-barang", 'uuidbbk', row.uuidbbk, function(data) {
            data = data.data;
            if (data.status == 'S' || data.status == 'P') {
              get_akses_cetak_ulang('inventori', function(data) {
                if (data.hakakses == 1) {
                  cetakDocument(jeniscetak, row.uuidbbk);
                }
              });
            } else if (data.status == 'I') {
              var kode = row.kodebbk;
              const isTabOpen = parent.check_tab_exist(kode, 'fa fa-pencil');
              if (isTabOpen) {
                $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + kode + ', Sebelum Dicetak ',
                  'warning');
              } else {
                if (jeniscetak == "collie") {
                  cetak("collie");
                } else if (jeniscetak == "ekspedisi") {
                  cetak("ekspedisi");
                } else {
                  cetak();
                }
              }
            } else {
              $.messager.alert('Error', 'Transaksi telah Diproses', 'error');
            }
          });
        });
      }
    }

    function batal_trans() {
      $("#alasan_pembatalan").dialog('close');
      alasan = $('#ALASANPEMBATALAN').val();
      if (row && alasan != "") {
        $.messager.confirm('Confirm', 'Anda Yakin Akan Membatalkan Transaksi ' + row.kodebbk + ' ?', function(r) {
          if (r) {
            bukaLoader();
            fetchData('{{ session('TOKEN') }}', link_api.batalTransaksiInventoryBarangKeluar, {
              uuidbbk: row.uuidbbk,
              kodebbk: row.kodebbk,
              alasan: alasan
            }).then(res => {
              if (res.success) {
                $.messager.alert('Info', 'Pembatalan Transaksi Sukses', 'info');
                reload();
              } else {
                $.messager.alert('Error', res.errorMsg, 'error');
              }
            }).catch(err => {
              const error = (typeof err === 'string') ? err : err.message;
              const textError = getTextError(error);
              $.messager.alert('Error', textError, 'error');
            }).finally(() => {
              tutupLoader();
            })
          }
        });
      } else {
        $.messager.alert('Error', 'Alasan harus diisi', 'error');
      }
    }

    function batal_cetak() {
      if (row) {
        $.messager.confirm('Confirm', 'Anda Yakin Akan Batal Cetak Transaksi ' + row.kodebbk + ' ?', function(r) {
          if (r) {
            bukaLoader();
            fetchData('{{ session('TOKEN') }}', link_api.ubahStatusJadiInputInventoryBarangKeluar, {
              uuidbbk: row.uuidbbk,
              kodebbk: row.kodebbk
            }).then(res => {
              if (res.success) {
                $.messager.alert('Info', 'Pembatalan Cetak Sukses', 'info');
                reload();
              } else {
                $.messager.alert('Error', res.message, 'error');
              }
            }).catch(err => {
              const error = (typeof err === 'string') ? err : err.message;
              const textError = getTextError(error);
              $.messager.alert('Error', textError, 'error');
            }).finally(() => {
              tutupLoader();
            });
          }
        });
      }
    }

    async function cetak(jeniscetak) {
      try {
        bukaLoader();
        const res = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.ubahStatusJadiSlipInventoryBarangKeluar, {
            uuidbbk: row.uuidbbk,
            kodebbk: row.kodebbk,
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
          cetakDocument(jeniscetak, row.uuidbbk);
          reload();
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      } finally {
        tutupLoader();
      }
    }

    async function cetakDocument(jenisCetak, id) {
      const urlMap = {
        collie: link_api.cetakCollieInventoryBarangKeluar,
        ekspedisi: link_api.cetakEkspedisiInventoryBarangKeluar
      };

      const url = `${urlMap[jenisCetak] || link_api.cetakInventoryBarangKeluar}${id}`;

      const doc = await getCetakDocument('{{ session('TOKEN') }}', url);

      if (doc) {
        $("#area_cetak").html(doc);
        $("#form_cetak").window('open');
      }
    }

    function refresh_data() {
      $('#table_data').datagrid('reload');
      $('#table_data_pending').datagrid('reload');
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
      status = status.length > 0 ? JSON.stringify(status) : '';

      $('#table_data').datagrid('load', {
        jenistransaksi: $('#txt_jenistransaksi_filter').combobox('getValue'),
        lokasi: lokasi,
        kodetrans: $('#txt_kodetrans_filter').val(),
        kodetransreferensi: $('#txt_kodetransreferensi_filter').textbox('getValue'),
        nama: $('#txt_nama_referensi_filter').val(),
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
        pageSize: 20,
        pagination: true,
        clientPaging: false,
        url: link_api.loadDataGridInventoryBarangKeluar,
        rowStyler: function(index, row) {
          if (row.status == 'S') return 'background-color:{{ session('WARNA_STATUS_S') }}';
          else if (row.status == 'P') return 'background-color:{{ session('WARNA_STATUS_P') }}';
          else if (row.status == 'D') return 'background-color:{{ session('WARNA_STATUS_D') }}';
          else if (row.status == 'R') return 'background-color:{{ session('WARNA_STATUS_R') }}';
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
              field: 'uuidbbk',
              hidden: true
            },
            {
              field: 'kodebbk',
              title: 'No. Pengeluaran',
              width: 140,
              sortable: true,
              align: 'center'
            },
            {
              field: 'jenistransaksi',
              title: 'Jenis',
              width: 90,
              sortable: true,
              align: 'center'
            },
            // start conditon if ($TRANSREFERENSI=='HEADER')
            {
              field: 'uuidtransreferensi',
              hidden: true
            },
            {
              field: 'kodetransreferensi',
              title: 'No. Trans. Ref.',
              width: 120,
              sortable: true,
              align: 'center'
            },
            // start condition if ($TRANSREFERENSI=='DETAIL')
            {
              field: 'kodetransreferensi',
              title: 'No. Trans. Ref.',
              width: 120,
              sortable: true,
              align: 'center'
            },
            // end condition if ($TRANSREFERENSI=='DETAIL')
          ]
        ],
        columns: [
          [{
              field: 'uuidlokasi',
              hidden: true
            },
            {
              field: 'uuidlokasitujuan',
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
              title: 'Lokasi',
              width: 120,
              sortable: true,
              align: 'center'
            },
            {
              field: 'uuidreferensi',
              hidden: true
            },
            {
              field: 'kodereferensi',
              title: 'Kd. Referensi',
              width: 130,
              sortable: true
            },
            {
              field: 'namareferensi',
              title: 'Nama Referensi',
              width: 200,
              sortable: true
            },
            {
              field: 'jmlcollie',
              title: 'Jumlah Collie',
              width: 100,
              sortable: true,
              formatter: format_amount,
              align: 'right'
            },
            // start condition if ($LIHATHARGA==1)
            {
              field: 'total',
              title: 'Total',
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
            // end condition if ($LIHATHARGA==1)
            {
              field: 'namacustomerekspedisi',
              title: 'Nama Cust.(Ekspedisi)',
              width: 200,
              sortable: true
            },
            {
              field: 'uuidkendaraan',
              title: 'id Kendaraan',
              width: 150,
              sortable: true,
              hidden: true
            },
            {
              field: 'namakendaraan',
              title: 'Kendaraan',
              width: 100,
              sortable: true
            },
            {
              field: 'uuidsopir',
              title: 'id Sopir',
              width: 150,
              sortable: true,
              hidden: true
            },
            {
              field: 'namasopir',
              title: 'Sopir',
              width: 200,
              sortable: true
            },
            {
              field: 'uuidekspedisi',
              title: 'id Ekspedisi',
              width: 150,
              sortable: true,
              hidden: true
            },
            {
              field: 'namaekspedisi',
              title: 'Ekspedisi',
              width: 200,
              sortable: true
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
            counter++;

            //PELU BUAT SIMPEN INDEX
            var row = $('#table_data').datagrid('getSelected');

            $("#mode").val("ubah");
            $("#data").val(row.uuidbbk);

            var tab_title = row.kodebbk;
            var tab_name = tab_title + "_" + counter;

            $('#form_data').attr('target', tab_name);

            if ($('#tab_transaksi').tabs('exists', tab_title)) {
              $('#tab_transaksi').tabs('select', tab_title);
            } else {
              $('#tab_transaksi').tabs('add', {
                title: tab_title,
                id: row.uuidbbk + "|" + row.kodebbk + "|" + counter,
                content: '<iframe frameborder="0"  class="tab_form"  id="' + counter + '" name="' +
                  tab_name + '"></iframe>',
                closable: true
              });

              $('#form_data').submit();
            }
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
        url: link_api.loadDataGridPendingInventoryBarangKeluar,
        columns: [
          [{
              field: 'tgltrans',
              title: 'Tgl. Trans',
              width: 80,
              align: 'center'
            },
            {
              field: 'kodetrans',
              title: 'No. Trans',
              width: 100,
              sortable: true
            },
            {
              field: 'kodepo',
              title: 'No. Pesanan Plgn.',
              width: 100,
              sortable: true
            },
            {
              field: 'referensi',
              title: 'Referensi',
              width: 150,
              align: 'left'
            },
            {
              field: 'catatan',
              title: 'Catatan',
              width: 400
            }
          ]
        ],
        onDblClickRow: async function(index, data) {
          if (!isTokenExpired('{{ session('TOKEN') }}')) {
            var url_cek = '';

            if (data.jenis == 'PENJUALANSO') {
              url_cek = link_api.cekBisaBerlanjutSO;
            } else if (data.jenis == 'PENJUALANDO') {
              url_cek = link_api.cekBisaBerlanjutDO;
            } else if (data.jenis == 'RETUR') {
              url_cek = link_api.cekBisaBerlanjutReturPembelian;
            } else {
              $.messager.alert('Warning', 'Jenis Transaksi Tidak Valid', 'warning');
              return;
            }

            $.ajax({
              url: base_url + url_cek,
              type: 'POST',
              data: {
                idtrans: data.idtrans
              },
              dataType: 'JSON',
              beforeSend: function() {
                $.messager.progress();
              },
              success: function(response) {
                $.messager.progress('close');

                if (response.success) {
                  $('#idtransreferensi').val(data.idtrans);
                  $('#jenistransreferensi').val(data.jenis);

                  before_add();
                } else {
                  $.messager.alert('Peringatan', 'Transaksi telah diproses', 'warning');

                  reload();
                }
              }
            });
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
      $('#table_data_pending').datagrid('reload');
    }
  </script>
@endpush
