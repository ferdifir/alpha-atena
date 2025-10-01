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
              <td id="label_form" align="center">No. Retur Beli Aset</td>
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
        <div data-options="region:'center'">
          <div class="easyui-layout" data-options="fit:true">
            <div data-options="region:'north'" class="title-grid"> Riwayat Transaksi </div>
            <div data-options="region:'center'">
              <table id="table_data"></table>
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
  <script>
    var edit_row = false;
    var idtrans = "";
    var counter = 0;
    $(document).ready(function() {
      //WAKTU BATAL DI GRID, tidak bisa close
      //PRINT GRID
      $("#table_data").datagrid({
        onSelect: function() {
          row = $('#table_data').datagrid('getSelected');
        }
      });

      buat_table();

      $("#txt_tgl_aw_filter").datebox('setValue', getDateMinusDays(2));

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
            export_excel('Faktur Retur Pembelian Aset', $("#area_cetak").html());
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

    function before_add() {
      $('#mode').val('tambah');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.tambah == 1) {
          parent.buka_submenu(null, 'Tambah Retur Pembelian Aset',
            '{{ route('atena.aset.returpembelianaset.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
            'fa fa-plus');
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    async function before_delete() {
      $('#mode').val('hapus');

      if (row) {
        const statusTrans = await getStatusTrans(
          link_api.getStatusTransReturPembelianAset,
          'bearer {{ session('TOKEN') }}', {
            uuidasetreturbeli: row.uuidasetreturbeli
          }
        );
        if (statusTrans == 'I') {
          var kode = row.kodeasetreturbeli;
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
      }
    }

    async function before_delete_print() {
      $('#mode').val('batal_cetak');

      if (row) {
        const statusTrans = await getStatusTrans(
          link_api.getStatusTransReturPembelianAset,
          'bearer {{ session('TOKEN') }}', {
            uuidasetreturbeli: row.uuidasetreturbeli
          }
        );
        if (statusTrans == 'S') {
          var kode = row.kodeasetreturbeli;
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
          const statusTrans = await getStatusTrans(
            link_api.getStatusTransReturPembelianAset,
            'bearer {{ session('TOKEN') }}', {
              uuidasetreturbeli: row.uuidasetreturbeli
            }
          );
          if (statusTrans == 'I') {
            var kode = row.kodeasetreturbeli;
            const isTabOpen = parent.check_tab_exist(kode, 'fa fa-pencil');
            if (isTabOpen) {
              $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + kode + ', Sebelum Dicetak ',
                'warning');
            } else {
              cetak();
            }
          } else if (statusTrans == 'S' || statusTrans == 'P') {
            const kodemenu = modul_kode['aset'];
            get_akses_user(kodemenu, 'bearer {{ session('TOKEN') }}', async function(data) {
              data = data.data;
              if (data.hakakses == 1) {
                const doc = await getCetakDocument(
                  link_api.cetakReturPembelianAset + row.uuidasetreturbeli,
                  '{{ session('TOKEN') }}'
                );
                if (doc) {
                  $("#area_cetak").html(doc);
                  $("#form_cetak").window('open');
                }
              }
            });
          } else {
            $.messager.alert('Error', 'Transaksi telah Diproses', 'error');
          }
        });
      }
    }

    function batal_trans() {
      $("#alasan_pembatalan").dialog('close');
      alasan = $('#ALASANPEMBATALAN').val();
      if (row && alasan != "") {
        $.messager.confirm(
          'Confirm',
          'Anda Yakin Akan Membatalkan Transaksi ' + row.kodeasetreturbeli + ' ?',
          async function(r) {
            if (r) {
              try {
                bukaLoader();
                const response = await fetch(
                  link_api.batalTransReturPembelianAset, {
                    method: 'POST',
                    headers: {
                      'Content-Type': 'application/json',
                      'Authorization': 'Bearer {{ session('TOKEN') }}'
                    },
                    body: JSON.stringify({
                      uuidasetreturbeli: row.uuidasetreturbeli,
                      kodeasetreturbeli: row.kodeasetreturbeli,
                      alasan: alasan
                    })
                  }
                );

                if (!response.ok) {
                  throw new Error(`HTTP error! Status: ${response.status}`);
                }

                const res = await response.json();
                if (res.success) {
                  $.messager.alert('Info', 'Pembatalan Transaksi Sukses', 'info');
                  reload();
                } else {
                  $.messager.alert('Error', res.message, 'error');
                }
              } catch (e) {
                showErrorAlert(e);
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
        $.messager.confirm(
          'Confirm',
          'Anda Yakin Akan Batal Cetak Transaksi ' + row.kodeasetreturbeli + ' ?',
          async function(r) {
            if (r) {
              try {
                bukaLoader();
                const response = await fetch(
                  link_api.ubahStatusJadiInputReturPembelianAset, {
                    method: 'POST',
                    headers: {
                      'Content-Type': 'application/json',
                      'Authorization': 'Bearer {{ session('TOKEN') }}'
                    },
                    body: JSON.stringify({
                      uuidasetreturbeli: row.uuidasetreturbeli,
                      kodeasetreturbeli: row.kodeasetreturbeli
                    })
                  }
                );

                if (!response.ok) {
                  throw new Error(`HTTP error! Status: ${response.status}`);
                }
                const res = await response.json();
                if (res.success) {
                  $.messager.alert('Info', 'Pembatalan Cetak Sukses', 'info');
                  reload();
                } else {
                  $.messager.alert('Error', res.message, 'error');
                }
              } catch (e) {
                showErrorAlert(e);
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
        const response = await fetch(
          link_api.ubahStatusJadiSlipReturPembelianAset, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer {{ session('TOKEN') }}'
            },
            body: JSON.stringify({
              uuidasetreturbeli: row.uuidasetreturbeli,
              kodeasetreturbeli: row.kodeasetreturbeli
            })
          }
        );

        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const res = await response.json();
        if (!res.success) {
          $.messager.alert('Error', res.message, 'error');
        } else {
          $.messager.show({
            title: 'Info',
            msg: 'Transaksi Sukses Dicetak',
            showType: 'show'
          });
          const doc = await getCetakDocument(
            link_api.cetakReturPembelianAset + row.uuidasetreturbeli,
            '{{ session('TOKEN') }}'
          );
          if (doc) {
            $("#area_cetak").html(doc);
            $("#form_cetak").window('open');
          }
          reload();
        }
      } catch (e) {
        showErrorAlert(e);
      } finally {
        tutupLoader();
      }
    }

    function refresh_data() {
      let pager = $('#table_data').datagrid('getPager');
      let pageOptions = pager.pagination('options');
      let currentPage = pageOptions.pageNumber;
      filter_data(currentPage);
    }

    function filter_data(pagenumber = 1) {
      var status = [];
      $("[name='cb_status_filter[]']:checked").each(function() {
        status.push($(this).val());
      });
      status = status.length > 0 ? JSON.stringify(status) : '';

      $('#table_data').datagrid('reload', {
        kodetrans: $('#txt_kodetrans_filter').val(),
        nama: $('#txt_nama_supplier_filter').val(),
        perusahaan: $('#txt_perusahaan_filter').val(),
        tglawal: $('#txt_tgl_aw_filter').datebox('getValue'),
        tglakhir: $('#txt_tgl_ak_filter').datebox('getValue'),
        status: status,
        page: pagenumber
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
        url: link_api.loadDataGridReturPembelianAset,
        pagination: true,
        clientPaging: false,
        pageSize: 20,
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
              field: 'uuidasetreturbeli',
              hidden: true
            },
            {
              field: 'kodeasetreturbeli',
              title: 'No. Retur Beli Aset',
              width: 145,
              sortable: true,
              align: 'center'
            },
            {
              field: 'uuidasetbeli',
              hidden: true
            },
            {
              field: 'kodeasetbeli',
              title: 'No. Beli Aset',
              width: 145,
              sortable: true,
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
              title: 'Nama Lokasi',
              width: 120,
              sortable: true,
              align: 'center'
            },
            {
              field: 'uuidsupplier',
              hidden: true
            },
            {
              field: 'kodesupplier',
              title: 'Kd. Supplier',
              width: 130,
              sortable: true
            },
            {
              field: 'namasupplier',
              title: 'Nama Supplier',
              width: 200,
              sortable: true
            }
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
              width: 60,
              sortable: true,
              align: 'center'
            },
          ]
        ],
        onDblClickRow: function(index, data) {
          const kode = data.kodeasetreturbeli;
          parent.buka_submenu(null, kode,
            '{{ route('atena.aset.returpembelianaset.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' +
            data.uuidasetreturbeli, 'fa fa-pencil');
        }
      });
    }

    function reload() {
      $('#table_data').datagrid('reload');
    }
  </script>
@endpush
