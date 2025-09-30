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
              <td id="label_form" align="center">No. Pesanan Pembelian</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_kodetrans_filter" name="txt_kodetrans_filter" style="width:100px"
                  class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">Supplier</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_nama_referensi_filter" name="txt_nama_referensi_filter"
                  style="width:100px" class="label_input" /></td>
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
@endsection

@push('js')
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
  <script>
    var edit_row = false;
    var idtrans = "";
    var counter = 0;
    var row = {};
    var lihatharga = false;

    $(document).ready(async function() {
      var check = false;
      await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        lihatharga = data.data.lihatharga == 1;
        check = true;
      }, false);
      if (!check) return;
      browse_data_lokasi('#txt_lokasi');
      browse_data_marketing('#txt_marketing_filter');

      //WAKTU BATAL DI GRID, tidak bisa close
      //PRINT GRID
      $("#table_data").datagrid({
        onSelect: function() {
          row = $('#table_data').datagrid('getSelected');
        }
      });

      create_form_login();
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

      tutupLoader();

    });

    function before_edit(uuiduangmukapo) {
      $('#mode').val('ubah');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        if (data.data.ubah == 1 || data.data.hakakses == 1) {
          var row = $('#table_data').datagrid('getSelected');
          parent.buka_submenu(null, row.kodepo,
            '{{ route('atena.pembelian.uang_muka_po.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&datapo=' +
            row.uuidpo + "&datauangmukapo=" + uuiduangmukapo,
            'fa fa-pencil');
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    shortcut.add('F2', function() {
      before_add();
    });

    function enable_button() {
      $('#btn_refresh').linkbutton('enable');
      $('#btn_batal').linkbutton('enable')
    }

    function before_add() {
      $('#mode').val('tambah');
      var row = $('#table_data').datagrid('getSelected');
      if (row == null || row.uuidpo === undefined) {
        $.messager.alert('Peringatan', 'Anda belum memilih data Pesanan Pembelian', 'warning');

        return false;
      }
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        if (data.data.tambah == 1) {
          parent.buka_submenu(null, 'Tambah Permintaan Barang',
            '{{ route('atena.pembelian.uang_muka_po.form', ['kode' => $kodemenu, 'mode' => 'tambah']) }}&datapo=' +
            row.uuidpo + "&datauangmukapo=",
            'fa fa-plus')
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function refresh_data() {
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
      let pager = $('#table_data').datagrid('getPager');
      let pageOptions = pager.pagination('options');
      let currentPage = pageOptions.pageNumber;
      $('#table_data').datagrid('reload', {
        page: currentPage,
        kodetrans: $('#txt_kodetrans_filter').val(),
        lokasi: lokasi,
        nama: $('#txt_nama_referensi_filter').val(),
        tglawal: $('#txt_tgl_aw_filter').datebox('getValue'),
        tglakhir: $('#txt_tgl_ak_filter').datebox('getValue'),
        status: status,
      });
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
      $('#table_data').datagrid('load', {
        kodetrans: $('#txt_kodetrans_filter').val(),
        lokasi: lokasi,
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
        url: link_api.loadDataGridUangMukaPO,
        view: detailview,
        detailFormatter: function(index, row) {
          return `<div style="padding:2px;position:relative;">
                            <table class="ddv"></table>
                        </div>`;
        },
        pagination: true,
        clientPaging: false,
        onLoadSuccess: function() {
          $('#table_data').datagrid('unselectAll');
        },
        rowStyler: function(index, row) {
          if (row.status == 'S')
            return 'background-color:{{ session('WARNA_STATUS_S') }}';
          else if (row.status == 'P')
            return 'background-color:{{ session('WARNA_STATUS_P') }}';
          else if (row.status == 'D')
            return 'background-color:{{ session('WARNA_STATUS_D') }}';
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
              field: 'uuidpo',
              hidden: true
            },
            {
              field: 'kodepo',
              title: 'No. Pesanan Pembelian',
              width: 120,
              sortable: true,
              align: 'center'
            },
          ]
        ],
        columns: [
          [{
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
              field: 'nopomanual',
              title: 'No. Pesanan Pembelian Manual',
              width: 120,
              sortable: true,
              align: 'center',
              hidden: true
            },
            {
              field: 'kodekas',
              title: 'No. Kas',
              width: 120,
              sortable: true,
              align: 'center',
              hidden: true
            },
            {
              field: 'kodepr',
              title: 'No. PR',
              width: 200
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
            },
            ...lihatharga ? [{
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
            ] : [], {
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
        onExpandRow: function(index, row) {
          var ddv = $(this).datagrid('getRowDetail', index).find('table.ddv');

          ddv.datagrid({
            url: link_api.loadDaftarUangMukaPO,
            method: 'POST',
            queryParams: {
              uuidpo: row.uuidpo
            },
            fitColumns: false,
            singleSelect: true,
            rownumbers: true,
            loadMsg: '',
            height: 'auto',
            columns: [
              [{
                  field: 'urutan',
                  title: 'Urutan',
                  width: 80,
                  formatter: function(value, row, index) {
                    return "Ke-" + (index + 1);
                  }
                },
                {
                  field: 'tglpembayaran',
                  title: 'Tgl. Batas Pembayaran',
                  width: 140,
                  formatter: ubah_tgl_indo,
                  align: 'center',
                },
                {
                  field: 'persentase',
                  title: 'Persentase',
                  align: 'right',
                  width: 80,
                  formatter: format_amount
                },
                {
                  field: 'amount',
                  title: 'Nilai Pembayaran',
                  align: 'right',
                  width: 105,
                  formatter: format_amount
                },
                {
                  field: 'userentry',
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
                  field: '',
                  title: '',
                  formatter: function(index, row) {
                    return `<button onclick="hapusUangMuka('${row.uuiduangmukapo}')">Hapus</button>`;
                  }
                }
              ]
            ],
            onResize: function() {
              $('#table_data').datagrid('fixDetailRowHeight', index);
            },
            onLoadSuccess: function(data) {
              setTimeout(function() {
                $('#table_data').datagrid('fixDetailRowHeight', index);
              }, 0);

              for (var i = 0; i < data.rows.length; i++) {
                $(this).datagrid('updateRow', {
                  index: i,
                  row: {
                    persentase: data.rows[i].amount / row.grandtotal * 100
                  }
                })
              }
            },
            onDblClickRow: function(index, row) {
              before_edit(row.uuiduangmukapo);
            },
          });

          $('#table_data').datagrid('fixDetailRowHeight', index);
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

    function browse_data_marketing(id) {
      $(id).combogrid({
        panelWidth: 310,
        idField: 'id',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        multiple: true,
        url: link_api.browseKaryawanMarketing,
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

    function reload() {

      $('#table_data').datagrid('reload');
    }

    function hapusUangMuka(uuiduangmukapo) {
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {
        if (data.data.hapus == 1) {
          $.messager.confirm('Konfirmasi', 'Apakah anda yakin menghapus uang muka?', async function(confirm) {
            if (confirm) {
              try {
                let url = link_api.hapusUangMukaPO;
                const response = await fetch(url, {
                  method: 'POST',
                  headers: {
                    'Authorization': 'bearer {{ session('TOKEN') }}',
                    'Content-Type': 'application/json',
                  },
                  body: JSON.stringify({
                    uuiduangmukapo: uuiduangmukapo,
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
                  filter_data();
                } else {
                  $.messager.alert('Error', response.message, 'error');
                }
              } catch (error) {
                var textError = getTextError(error);
                $.messager.alert('Error', getTextError(error), 'error');
              }
            }
          });
        }
      });
    }
  </script>
@endpush
