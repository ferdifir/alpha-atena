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
                  <td id="label_form" align="center">Tgl. SO</td>
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
                  </td>
                </tr>
                <tr>
                  <td align="center"><a id="btn_search" class="easyui-linkbutton"
                      data-options="iconCls:'icon-search', plain:false" onclick="filter_data()">Tampilkan Data</a></td>
                </tr>
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
@endsection

@push('js')
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
  <script src="{{ asset('assets/js/utils.js') }}"></script>
  <script>
    var edit_row = false;
    var idtrans = "";
    var counter = 0;
    var row = {};
    let LIHATHARGA;

    async function getUangMukaSOConfig() {
      try {
        const res = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.getDataAkses, {
            kodemenu: '{{ $kodemenu }}',
          }
        );
        if (!res.success) {
          throw new Error(res.message);
        }
        LIHATHARGA = res.data.lihatharga;
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }

    $(document).ready(function() {
      browse_data_lokasi('#txt_lokasi');
      browse_data_marketing('#txt_marketing_filter');

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
              uuidso: trans[0],
              kodeso: trans[1],
            };

            disable_button()
          }
        }
      });

      getUangMukaSOConfig().then(() => {
        buat_table();
      });

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

    shortcut.add('F2', function() {
      before_add();
    });

    function disable_button() {
      $('#btn_refresh').linkbutton('disable');
      $('#btn_batal').linkbutton('disable')
    }

    function enable_button() {
      $('#btn_refresh').linkbutton('enable');
      $('#btn_batal').linkbutton('enable')
    }

    function before_add() {
      $('#mode').val('tambah');

      if (row.uuidso === undefined) {
        $.messager.alert('Peringatan', 'Anda belum memilih data Pesanan Penjualan', 'warning');

        return false;
      }

      get_akses_user('{{ $kodemenu }}', 'Bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.tambah == 1) {
          parent.buka_submenu(null, 'Tambah Uang Muka',
            '{{ route('atena.penjualan.uangmuka.form', ['kode' => $kodemenu, 'mode' => 'tambah']) }}&data=' + row.uuidso,
            'fa fa-plus');
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function refresh_data() {
      $('#table_data').datagrid('reload');
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
      })
      status = status.length > 0 ? JSON.stringify(status) : '';

      $('#table_data').datagrid('load', {
        kodetrans: $('#txt_kodetrans_filter').val(),
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

    function buat_table() {
      $("#table_data").datagrid({
        fit: true,
        singleSelect: true,
        remoteSort: false,
        multiSort: true,
        striped: true,
        rownumbers: true,
        pageSize: 20,
        url: link_api.loadDataGridUangMukaSO,
        view: detailview,
        onLoadSuccess: function(data) {
          $('#table_data').datagrid('unselectAll');
        },
        detailFormatter: function(index, row) {
          return `<div style="padding:2px;position:relative;">
                    <table class="ddv"></table>
                  </div>`;
        },
        rowStyler: function(index, row) {
          if (row.status == 'S') {
            return 'background-color:{{ session('WARNA_STATUS_S') }}';
          } else if (row.status == 'P') {
            return 'background-color:{{ session('WARNA_STATUS_P') }}';
          } else if (row.status == 'D') {
            return 'background-color:{{ session('WARNA_STATUS_D') }}';
          }
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
          ]
        ],
        columns: [
          [{
              field: 'kodepo',
              title: 'No. Pesanan Pelanggan',
              width: 145,
              sortable: true,
              align: 'center'
            },
            {
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
        onExpandRow: function(index, row) {
          var ddv = $(this).datagrid('getRowDetail', index).find('table.ddv');

          ddv.datagrid({
            url: link_api.loadDaftarUangMukaSO,
            method: 'POST',
            queryParams: {
              uuidso: row.uuidso
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
                    return `<button onclick="hapusUangMuka('${row.uuiduangmukaso}')">Hapus</button>`;
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
              if (!isTokenExpired('{{ session('TOKEN') }}')) {
                var tab_title = row.kodeso + '  (' + row.tglpembayaran + ')';
                console.log(tab_title);
                parent.buka_submenu(null, tab_title,
                  '{{ route('atena.penjualan.uangmuka.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' +
                  row.uuiduangmukaso,
                  'fa fa-pencil');
              } else {
                $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
              }
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

    function reload() {
      $('#table_data').datagrid('reload');
    }

    function hapusUangMuka(iduangmukaso) {
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.hapus == 1) {
          $.messager.confirm('Konfirmasi', 'Apakah anda yakin menghapus uang muka?', async function(confirm) {
            if (confirm) {
              try {
                bukaLoader();
                const res = await fetchData(
                  '{{ session('TOKEN') }}',
                  link_api.hapusUangMukaSO, {
                    uuiduangmukaso: iduangmukaso
                  }
                );
                if (!res.success) {
                  $.messager.alert('Error', res.message, 'error');
                } else {
                  $('#table_data').datagrid('reload');
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
      });
    }
  </script>
@endpush
