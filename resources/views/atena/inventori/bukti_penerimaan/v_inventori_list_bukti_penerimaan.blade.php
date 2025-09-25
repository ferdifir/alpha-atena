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
                  style="width:120px" /></td>
            </tr>
            <tr>
              <td id="label_form" align="center">s/d</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_tgl_ak_filter" name="txt_tgl_ak_filter" class="date"
                  style="width:120px" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">Lokasi</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_lokasi" name="txt_lokasi[]" style="width:120px" class="label_input" />
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
                  <option value="pembelian">PEMBELIAN</option>
                  <!--<option value="transfer">TERIMA TRANSFER</option>-->
                  <option value="retur">RETUR PENJUALAN</option>
                </select>
              </td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">No. BBM</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_kodetrans_filter" name="txt_kodetrans_filter" style="width:120px"
                  class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">No. Trans. Ref.</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_kodetransreferensi_filter" name="txt_kodetransreferensi_filter"
                  style="width:120px" class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">Nama Referensi</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_nama_referensi_filter" name="txt_nama_referensi_filter"
                  style="width:120px" class="label_input" /></td>
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
              title="Daftar Antrian PO/Retur Jual" style="width: 25%;">
              <div id="table_pending"></div>
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
          <a class="easyui-linkbutton" iconCls="icon-save" id='btn_alasan_pembatalan'
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
    const jwt = "{{ session('TOKEN') }}";
    var edit_row = false;
    var idtrans = "";
    var urltransreferensi = "";
    var counter = 0;
    let LIHATHARGA;
    let TRANSREFERENSI;

    $(document).ready(async function() {
      await getBBMConfig();
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
            export_excel('Faktur Bukti Penerimaan', $("#area_cetak").html());
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

    async function getBBMConfig() {
      try {
        const [transReferensiData, aksesData] = await Promise.all([
          fetchData(
            '{{ session('TOKEN') }}',
            link_api.getConfig, {
              modul: 'TBBM',
              config: 'TRANSREFERENSI'
            }
          ),
          fetchData(
            '{{ session('TOKEN') }}',
            link_api.getDataAkses, {
              kodemenu: '{{ $kodemenu }}'
            }
          )
        ]);

        if (!transReferensiData.success || !aksesData.success) {
          const errorMessage = !transReferensiData.success ? transReferensiData.message : aksesData.message;
          throw new Error(errorMessage);
        }

        TRANSREFERENSI = transReferensiData.data.value;
        LIHATHARGA = aksesData.data.lihatharga;

      } catch (e) {
        const error = e.message || 'An unknown error occurred.';
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }

    shortcut.add('F2', function() {
      before_add();
    });

    function before_add(idtransref, jenistransref) {
      $('#mode').val('tambah');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.tambah == 1) {
          parent.buka_submenu(null, 'Tambah Bukti Penerimaan',
            '{{ route('atena.inventori.buktipenerimaan.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}&dataref=' +
            idtransref + '&jenistransref=' + jenistransref,
            'fa fa-plus');
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
          get_status_trans(jwt, "atena/inventori/bukti-penerimaan-barang", "uuidbbm", row.uuidbbm, function(data) {
            data = data.data;
            if (data.status == 'I') {
              var kode = row.kodebbm;
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
          $.messager.alert('Warning', 'Token tidak valid, harap login kembali', 'warning');
        }
      }
    }

    function before_delete_print() {
      $('#mode').val('batal_cetak');

      if (row) {
        if (!isTokenExpired('{{ session('TOKEN') }}')) {
          get_status_trans(jwt, "atena/inventori/bukti-penerimaan-barang", "uuidbbm", row.uuidbbm, function(data) {
            data = data.data;
            if (data.status == 'S') {
              var kode = row.kodebbm;
              const isTabOpen = parent.check_tab_exist(kode, 'fa fa-pencil');
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
          get_status_trans(jwt, "atena/inventori/bukti-penerimaan-barang", "uuidbbm", row.uuidbbm, function(data) {
            data = data.data;
            if (data.status == 'S' || data.status == 'P') {
              const kodemenu = modul_kode['inventori'];
              get_akses_user(kodemenu, 'bearer {{ session('TOKEN') }}', async function(data) {
                data = data.data;
                if (data.hakakses == 1) {
                  const doc = await getCetakDocument(
                    jwt,
                    link_api.cetakBuktiPenerimaanBarang + row.uuidbbm
                  );
                  if (doc) {
                    $("#area_cetak").html(doc);
                    $("#form_cetak").window('open');
                  } else {
                    $.messager.alert(
                      'Warning',
                      'Terjadi kesalahan dalam mengambil data untuk cetak transaksi',
                      'warning'
                    );
                  }
                } else {
                  $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
                }
              });
            } else if (data.status == 'I') {
              var kode = row.kodebbm;
              const isTabOpen = parent.check_tab_exist(kode, 'fa fa-pencil');
              if (isTabOpen) {
                $.messager.alert(
                  'Warning',
                  'Harap Tutup Tab Atas Transaksi ' + kode + ', Sebelum Dicetak ',
                  'warning'
                );
              } else {
                cetak();
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
        $.messager.confirm('Confirm', 'Anda Yakin Akan Membatalkan Transaksi ' + row.kodebbm + ' ?', async function(r) {
          if (r) {
            try {
              bukaLoader();
              const res = await fetchData(
                jwt,
                link_api.batalTransaksiBuktiPenerimaanBarang, {
                  uuidbbm: row.uuidbbm,
                  kodebbm: row.kodebbm,
                  alasan: alasan
                }
              );
              if (res.success) {
                $.messager.alert('Info', 'Pembatalan Transaksi Sukses', 'info');
                reload();
              } else {
                $.messager.alert('Error', res.message, 'error');
              }
            } catch (e) {
              const error = typeof e === 'string' ? e : e.message;
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
        $.messager.confirm('Confirm', 'Anda Yakin Akan Batal Cetak Transaksi ' + row.kodebbm + ' ?', async function(r) {
          if (r) {
            try {
              bukaLoader();
              const res = await fetchData(
                jwt,
                link_api.ubahStatusJadiInputBuktiPenerimaanBarang, {
                  uuidbbm: row.uuidbbm,
                  kodebbm: row.kodebbm
                }
              );
              if (res.success) {
                $.messager.alert('Info', 'Pembatalan Cetak Sukses', 'info');
                reload();
              } else {
                $.messager.alert('Error', res.message, 'error');
              }
            } catch (e) {
              const error = (typeof e === 'string') ? e : e.message;
              const textError = getTextError(error);
              $.messager.alert('Error', textError, 'error');
            } finally {
              tutupLoader();
            }
          }
        });
      }
    }

    async function cetak() {
      try {
        bukaLoader();
        const res = await fetchData(
          jwt,
          link_api.ubahStatusJadiSlipBuktiPenerimaanBarang, {
            uuidbbm: row.uuidbbm,
            kodebbm: row.kodebbm,
          }
        );
        if (res.success) {
          $.messager.show({
            title: 'Info',
            msg: 'Transaksi Sukses Dicetak',
            showType: 'show'
          });
          const doc = await getCetakDocument(jwt, link_api.cetakBuktiPenerimaanBarang + row.uuidbbm);
          if (doc) {
            $("#area_cetak").html(doc);
            $("#form_cetak").window('open');
          } else {
            $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data untuk cetak transaksi', 'warning');
          }
          reload();
        } else {
          $.messager.alert('Error', res.message, 'error');
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
        jenistransaksi: $('#txt_jenistransaksi_filter').combobox('getValue'),
        lokasi: lokasi,
        kodetrans: $('#txt_kodetrans_filter').textbox('getValue'),
        kodetransreferensi: $('#txt_kodetransreferensi_filter').textbox('getValue'),
        nama: $('#txt_nama_referensi_filter').textbox('getValue'),
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
        url: link_api.loadDataGridBuktiPenerimaanBarang,
        onLoadSuccess: function(data) {
          $('#table_data').datagrid('unselectAll');
        },
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
              field: 'uuidbbm',
              hidden: true
            },
            {
              field: 'kodebbm',
              title: 'No. BBM',
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
            ...(TRANSREFERENSI == 'HEADER' ? [{
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
            ] : [{
              field: 'kodetransreferensi',
              title: 'No. Trans. Ref.',
              width: 120,
              sortable: true,
              align: 'center'
            }, ]), {
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
              title: 'Nama Lokasi',
              width: 120,
              sortable: true,
              align: 'center'
            },
          ]
        ],
        columns: [
          [{
              field: 'uuidreferensi',
              hidden: true
            },
            {
              field: 'kodereferensi',
              title: 'Kd. Ref',
              width: 130,
              sortable: true
            },
            {
              field: 'namareferensi',
              title: 'Nama Ref',
              width: 200,
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
                field: 'ppnrp',
                title: 'PPN',
                width: 100,
                sortable: true,
                formatter: format_amount,
                align: 'right'
              },
              {
                field: 'pph22rp',
                title: 'PPH 22',
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
            ] : []), {
              field: 'catatan',
              title: 'Catatan',
              width: 450,
              sortable: true
            },
            {
              field: 'nosuratjalan',
              title: 'No. Surat Jalan',
              width: 150,
              sortable: true
            },
            {
              field: 'nopol',
              title: 'No. Kendaraan',
              width: 100,
              sortable: true
            },
            {
              field: 'namasopir',
              title: 'Nama Sopir',
              width: 200,
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
            const kode = data.kodebbm;
            const url =
              "{{ route('atena.inventori.buktipenerimaan.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=" +
              data.uuidbbm;
            parent.buka_submenu(null, kode, url, 'fa fa-pencil');
          } else {
            $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
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
        url: link_api.loadDataGridPendingBuktiPenerimaanBarang,
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
              field: 'referensi',
              title: 'Referensi',
              width: 150,
              align: 'left'
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
            var url_cek = '';
            var key = '';

            if (data.jenis == 'PEMBELIAN') {
              url_cek = link_api.cekBisaBerlanjutPesananPembelian;
              key = 'uuidpo';
            } else if (data.jenis == 'RETUR') {
              url_cek = link_api.cekBisaBerlanjutReturPenjualan;
              key = 'uuidreturjual';
            }

            try {
              bukaLoader();
              const res = await fetchData(
                jwt,
                url_cek, {
                  [key]: data.uuidtrans
                }
              );
              if (res.success) {
                before_add(data.uuidtrans, data.jenis);
              } else {
                $.messager.alert('Peringatan', 'Transaksi telah diproses', 'warning');
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
            $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
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

    function reload() {
      $('#table_data').datagrid('reload');
      $('#table_pending').datagrid('reload');
    }
  </script>
@endpush
