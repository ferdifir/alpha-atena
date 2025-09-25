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
              <td id="label_form" align="center">Tgl. Trans</td>
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
              <td id="label_form" align="center">No. Kirim</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_kodetrans_filter" name="txt_kodetrans_filter" style="width:100px"
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
        @include('template.trans_header')
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
  <script type="text/javascript" src="{{ asset('assets/js/utils.js') }}"></script>
  <script>
    //addd
    var edit_row = false;
    var idtrans = "";
    var mode = "auto";
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

      create_form_login();
      buat_table();

      $("#txt_tgl_aw_filter").datebox('setValue', getTglFilterAwal());

      $("#form_cetak").window({
        collapsible: false,
        minimizable: false,
        method: 'POST',
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
            export_excel('Faktur Kirim Ekspedisi', $("#area_cetak").html());
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
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.tambah == 1) {
          parent.buka_submenu(null, 'Tambah Inventori Kirim Ekspedisi',
            '{{ route('atena.inventori.kirim_ekspedisi.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
            'fa fa-plus');
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    async function before_delete() {
      $('#mode').val('hapus');

      if (row) {
        if (!isTokenExpired()) {
          try {
            const response = await fetchData(link_api.getStatusTransaksiInventoryKirimEkspedisi, {
              uuidkirim: row.uuidkirim
            });
            if (!response.success) {
              throw new Error(response.message || 'Terjadi kesalahan ketika mengambil status transaksi');
            }
            const data = response.data;
            if (data.status == 'I' || data.status == 'S') {
              var kode = row.kodekirim;
              var isTabAvailable = parent.check_tab_exist(kode, 'fa fa-pencil');
              if (isTabAvailable) {
                $.messager.alert(
                  'Warning',
                  'Harap Tutup Tab Atas Transaksi ' + kode + ', Sebelum Dibatalkan ',
                  'warning'
                );
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
          } catch (e) {
            const error = (typeof e === 'string') ? e : e.message;
            const textError = getTextError(error);
            $.messager.alert('Error', textError, 'error');
          }
        } else {
          $.messager.alert('Warning', 'Token tidak valid, harap login kembali', 'warning');
        }
      }
    }

    async function fetchData(url, body, isjson = true) {
      try {
        const token = '{{ session('TOKEN') }}';
        let headers = {
          'Authorization': 'bearer ' + token,
        };
        let requestBody = null;

        // Cek apakah body adalah instance dari FormData
        if (body instanceof FormData) {
          // Jika FormData, jangan set 'Content-Type'. Browser akan melakukannya secara otomatis.
          requestBody = body;
        } else {
          // Default: Jika bukan FormData, asumsikan itu JSON.
          headers['Content-Type'] = 'application/json';
          requestBody = body ? JSON.stringify(body) : null;
        }

        const response = await fetch(url, {
          method: 'POST',
          headers: headers,
          body: requestBody,
        });

        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }

        if (isjson) {
          return await response.json();
        } else {
          return await response.text();
        }
      } catch (error) {
        console.error("Terjadi kesalahan:", error);
        throw error; // Melemparkan kembali error agar bisa ditangkap oleh pemanggil
      }
    }

    async function before_delete_print() {
      $('#mode').val('batal_cetak');

      if (row) {
        if (!isTokenExpired()) {
          try {
            const response = await fetchData(link_api.getStatusTransaksiInventoryKirimEkspedisi, {
              uuidkirim: row.uuidkirim
            });
            if (!response.success) {
              throw new Error(response.message || 'Terjadi kesalahan ketika mengambil status transaksi');
            }
            const data = response.data;
            if (data.status == 'S') {
              var kode = row.kodekirim;
              var isTabAvailable = parent.check_tab_exist(kode, 'fa fa-pencil');
              if (isTabAvailable) {
                $.messager.alert(
                  'Warning',
                  'Harap Tutup Tab Atas Transaksi ' + kode + ', Sebelum Dibatal Cetak ',
                  'warning'
                );
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
          } catch (e) {
            const error = (typeof e === 'string') ? e : e.message;
            const textError = getTextError(error);
            $.messager.alert('Error', textError, 'error');
          }
        } else {
          $.messager.alert('Warning', 'Token tidak valid, harap login kembali', 'warning');
        }
      }
    }

    function before_print() {
      $('#mode').val('cetak');
      if (row) {
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {
          data = data.data;
          if (data.cetak == 0) {
            $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
            return false;
          }

          try {
            const response = await fetchData(link_api.getStatusTransaksiInventoryKirimEkspedisi, {
              uuidkirim: row.uuidkirim
            });
            if (!response.success) {
              throw new Error(response.message || 'Terjadi kesalahan ketika mengambil status transaksi');
            }
            const data = response.data;
            if (data.status == 'I') {
              row = $('#table_data').datagrid('getSelected');
              const res = await fetchData(link_api.ubahStatusJadiSlipInventoryKirimEkspedisi, {
                uuidkirim: row.uuidkirim,
                kodekirim: row.kodekirim
              });
              if (res.success) {
                $.messager.alert('Info', 'Transaksi Sukses Dicetak', 'info');
                reload();
              } else {
                $.messager.alert('Error', res.message, 'error');
              }
              var kode = row.kodekirim;
              const isTabAvailable = parent.check_tab_exist(kode, 'fa fa-pencil');
              if (isTabAvailable) {
                $.messager.alert(
                  'Warning',
                  'Harap Tutup Tab Atas Transaksi ' + kode + ', Sebelum Dicetak ',
                  'warning',
                );
              } else {
                cetak();
              }
            } else if (data.status == 'S' || data.status == 'P') {
              const kodemenu = modul_kode['inventori'];
              get_akses_user(kodemenu, 'bearer {{ session('TOKEN') }}', async function(data) {
                data = data.data;
                if (data.hakakses == 1) {
                  const document = await getCetakDocument(
                    link_api.cetakInventoryKirimEkspedisi + row.uuidkirim
                  );
                  if (document == null) {
                    return;
                  }
                  $("#area_cetak").html(document);
                  $("#form_cetak").window('open');
                }
              });
            } else {
              $.messager.alert('Error', 'Transaksi telah Diproses', 'error');
            }
          } catch (e) {
            const error = (typeof e === 'string') ? e : e.message;
            const textError = getTextError(error);
            $.messager.alert('Error', textError, 'error');
          }
        });
      }
    }

    async function getCetakDocument(url) {
      try {
        const response = await fetchData(url, null, false);
        return response;
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
        return null;
      }
    }

    async function batal_trans() {
      $("#alasan_pembatalan").dialog('close');
      alasan = $('#ALASANPEMBATALAN').val();
      if (row && alasan != "") {
        $.messager.confirm(
          'Confirm',
          'Anda Yakin Akan Membatalkan Transaksi ' + row.kodekirim + ' ?',
          async function(r) {
            if (r) {
              try {
                bukaLoader();
                const msg = await fetchData(link_api.batalTransaksiInventoryKirimEkspedisi, {
                  uuidkirim: row.uuidkirim,
                  kodekirim: row.kodekirim,
                  alasan: alasan
                });
                if (!msg.success) {
                  throw new Error(msg.message || 'Terjadi kesalahan ketika membatalkan transaksi');
                }

                $.messager.alert('Info', 'Pembatalan Transaksi Sukses', 'info');
                reload();
              } catch (error) {
                $.messager.progress('close');
                const errorMessage = (typeof error === 'string') ? error : error.message;
                const textError = getTextError(errorMessage);
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

    async function batal_cetak() {
      if (row) {
        $.messager.confirm('Confirm', 'Anda Yakin Akan Batal Cetak Transaksi ' + row.kodekirim + ' ?', async function(
          r) {
          if (r) {
            try {
              bukaLoader();
              const msg = await fetchData(link_api.ubahStatusjadiInputInventoryKirimEkspedisi, {
                uuidkirim: row.uuidkirim,
                kodekirim: row.kodekirim
              });

              if (!msg.success) {
                throw new Error(msg.message || 'Terjadi kesalahan ketika membatalkan cetak transaksi');
              }

              $.messager.alert('Info', 'Pembatalan Cetak Sukses', 'info');
              reload();
            } catch (error) {
              const errorMessage = (typeof error === 'string') ? error : error.message;
              const textError = getTextError(errorMessage);
              $.messager.alert('Error', textError, 'error');
            } finally {
              tutupLoader();
            }
          }
        });
      }
    }

    async function cetak() {
      const document = await getCetakDocument(
        link_api.cetakInventoryKirimEkspedisi + row.uuidkirim
      );
      if (document == null) {
        return;
      }
      $("#area_cetak").html(document);
      $("#form_cetak").window('open');
      reload();
    }

    function ubah_status() {
      $('#mode').val('ubah_status');
      if (row) {
        get_status_trans(row.kodepo, 'tbeli', 'kodebeli', function(data) {
          if (data.status == 'S')
            $('#form_login').dialog('open');
          else if (data.status == 'P')
            $.messager.alert('Error',
              'Transaksi Telah Berlanjut Ke Transaksi Pesanan Pembelian, Status Transaksi Tidak Dapat Diubah', 'error'
            );
          else if (data.status == 'I')
            $.messager.alert('Error', 'Transaksi Dalam Mode Input, Status Transaksi Tidak Dapat Diubah', 'error');
        });
      }
    }

    function refresh_data() {
      $('#table_data').datagrid('reload');
    }

    function filter_data() {
      var getLokasi = $('#txt_lokasi').combogrid('grid');
      var dataLokasi = getLokasi.datagrid('getChecked');
      console.log(dataLokasi);
      var lokasi = "";
      for (var i = 0; i < dataLokasi.length; i++) {
        lokasi += (dataLokasi[i]["uuidlokasi"] + ",");
      }
      lokasi = lokasi.substring(0, lokasi.length - 1);

      var selectedStatus = [];
      $("[name='cb_status_filter[]']:checked").each(function() {
        selectedStatus.push($(this).val());
      });
      var status = selectedStatus.length > 0 ? JSON.stringify(selectedStatus) : '';

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
        pageSize: 20,
        pagination: true,
        clientPaging: false,
        url: link_api.loadDataGridInventoryKirimEkspedisi,
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
              field: 'uuidkirim',
              hidden: true
            },
            {
              field: 'kodekirim',
              title: 'No. Kirim',
              width: 145,
              sortable: true,
              align: 'center'
            },
            {
              field: 'namacustomer',
              title: 'Customer',
              width: 150,
              sortable: true
            },
            {
              field: 'namaekspedisi',
              title: 'Ekspedisi',
              width: 150,
              sortable: true
            },
            {
              field: 'kodelokasi',
              hidden: true,
              title: 'Lokasi',
              width: 90,
              sortable: true,
              align: 'center'
            },
            {
              field: 'namalokasi',
              title: 'Nama Lokasi',
              width: 150,
              sortable: true,
              align: 'center'
            },
          ]
        ],
        columns: [
          [{
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
              width: 55,
              sortable: true,
              align: 'center'
            }
          ]
        ],
        onDblClickRow: function(index, data) {
          if (!isTokenExpired()) {
            var row = $('#table_data').datagrid('getSelected');
            var tab_title = row.kodekirim;
            parent.buka_submenu(null, tab_title,
              '{{ route('atena.inventori.kirim_ekspedisi.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' +
              row.uuidkirim,
              'fa fa-pencil');
          } else {
            $.messager.alert('Warning', 'Token tidak valid, harap login kembali', 'warning');
          }
        },
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
  </script>
@endpush
