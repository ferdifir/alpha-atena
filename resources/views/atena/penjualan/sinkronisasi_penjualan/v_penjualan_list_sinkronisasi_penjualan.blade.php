@extends('template.app')

@section('content')
  <div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" style="width: 100%;height: 100%">
        <div data-options="region: 'north'" style="height: 140px;padding: 5px">
          <div class="easyui-tabs" style="height: 100%;">
            <div title="Informasi Transaksi">
              <table>
                <tr>
                  <td id="label_form">Lokasi</td>
                  <td>
                    <input id="IDLOKASI" style="width: 225px">
                  </td>
                </tr>
                <tr>
                  <td id="label_form">Tgl. Pengeluaran Barang</td>
                  <td>
                    <input id="TGLAWAL" name="tglawal" style="width: 100px" class="date"> s/d
                    <input id="TGLAKHIR" name="tglakhir" style="width: 100px" class="date">
                    <a class="easyui-linkbutton" onclick="tampil_data()">Tampilkan Pengeluaran Barang</a>
                  </td>
                </tr>
                <tr>
                  <td id="label_form">Tgl. Penjualan</td>
                  <td>
                    <input id="TGLTRANS" name="tgltrans" style="width: 100px" class="date">
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <div data-options="region: 'center'">
          <div class="easyui-tabs" id="tabs" style="height: 100%;">
            <div title="Daftar Transaksi">
              <table id="table_data_detail" fit="true"></table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6;">
      <br>
      <a title="Simpan" class="easyui-tooltip" data-options="plain:false" id='btn_simpan_modal' onclick="simpan()"><img
          src="{{ asset('assets/images/simpan.png') }}"></a>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
  <script src="{{ asset('assets/js/utils.js') }}"></script>
  <script>
    let data_header = {};
    let cekbtnsimpan = true;
    let checkbox_header_trigger_enable = true;

    $(function() {
      browse_data_lokasi('#IDLOKASI');
      buat_table_detail();

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
      tutupLoader();
    });

    function buat_table_detail() {
      var dg = '#table_data_detail';

      $(dg).datagrid({
        showFooter: true,
        singleSelect: false,
        rownumbers: true,
        checkOnSelect: false,
        selectOnCheck: true,
        data: [],
        view: detailview,
        detailFormatter: function(index, row) {
          return '<div style="padding:2px;position:relative;"><table class="ddv"></table></div>';
        },
        rowStyler: function(index, row) {
          if (row.status == 'S') {
            return 'background-color: {{ session('WARNA_STATUS_S') }}';
          } else if (row.status == 'P') {
            return 'background-color: {{ session('WARNA_STATUS_P') }}';
          }
        },
        columns: [
          [{
              field: 'ck',
              checkbox: true
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
              field: 'kodebbk',
              title: 'No. BBK',
              width: 145,
              sortable: true,
              align: 'center'
            },
            {
              field: 'kodeso',
              title: 'No. SO',
              width: 145,
              sortable: true,
              align: 'center'
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
              field: 'status',
              title: 'Status',
              width: 50,
              sortable: true,
              align: 'center'
            },
          ]
        ],
        onExpandRow: function(indexheader, rowheader) {
          var ddv = $(this).datagrid('getRowDetail', indexheader).find('table.ddv');

          ddv.datagrid({
            method: 'post',
            singleSelect: false,
            rownumbers: true,
            checkOnSelect: false,
            selectOnCheck: true,
            loadMsg: '',
            height: 'auto',
            columns: [
              [{
                  field: 'kodebarang',
                  title: 'Kode Barang',
                  width: 100
                },
                {
                  field: 'namabarang',
                  title: 'Nama Barang',
                  width: 250,
                },
                {
                  field: 'jml',
                  title: 'Jumlah',
                  align: 'right',
                  width: 60,
                  formatter: format_qty,
                  editor: {
                    type: 'numberbox',
                    options: {
                      required: true,
                    }
                  }
                },
                {
                  field: 'satuan',
                  title: 'Satuan',
                  width: 60,
                  align: 'center'
                },
                {
                  field: 'currency',
                  title: 'Curr',
                  width: 50,
                  align: 'center',
                  hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }}
                },
                {
                  field: 'harga',
                  title: 'Harga',
                  align: 'right',
                  width: 85,
                  formatter: format_amount
                },
                {
                  field: 'discpersen',
                  title: 'Disc(%)',
                  align: 'center',
                  width: 100,
                  hidden: false
                },
                {
                  field: 'disc',
                  title: 'Disc',
                  align: 'right',
                  width: 65,
                  formatter: format_amount
                },
                {
                  field: 'subtotal',
                  title: 'Subtotal',
                  align: 'right',
                  width: 95,
                  formatter: format_amount
                },
                {
                  field: 'nilaikurs',
                  title: 'Kurs ({{ session('SIMBOLCURRENCY') }})',
                  align: 'right',
                  width: 60,
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      required: true,
                    }
                  },
                  hidden: {{ session('MULTICURRENCY') != '1' ? 'true' : 'false' }}
                },
                {
                  field: 'hargakurs',
                  title: 'Harga ({{ session('SIMBOLCURRENCY') }})',
                  align: 'right',
                  width: 85,
                  formatter: format_amount,
                  hidden: {{ session('MULTICURRENCY') != '1' ? 'true' : 'false' }}
                },
                {
                  field: 'disckurs',
                  title: 'Disc ({{ session('SIMBOLCURRENCY') }})',
                  align: 'right',
                  width: 65,
                  formatter: format_amount,
                  hidden: {{ session('MULTICURRENCY') != '1' ? 'true' : 'false' }}
                },
                {
                  field: 'subtotalkurs',
                  title: 'Subtotal ({{ session('SIMBOLCURRENCY') }})',
                  align: 'right',
                  width: 95,
                  formatter: format_amount,
                  hidden: {{ session('MULTICURRENCY') != '1' ? 'true' : 'false' }}
                },
                {
                  field: 'pakaippn',
                  title: 'Pakai PPN',
                  align: 'center',
                  width: 65,
                  editor: {
                    type: 'combobox',
                    options: {
                      required: true,
                      data: [{
                        value: 'INCL',
                        text: 'INCL'
                      }, {
                        value: 'EXCL',
                        text: 'EXCL'
                      }, {
                        value: 'TIDAK',
                        text: 'TIDAK'
                      }],
                      panelHeight: 'auto',
                    }
                  }
                },
                {
                  field: 'dpp',
                  title: 'DPP ({{ session('SIMBOLCURRENCY') }})',
                  align: 'right',
                  width: 95,
                  formatter: format_amount
                },
                {
                  field: 'ppnrp',
                  title: 'PPN ({{ session('SIMBOLCURRENCY') }})',
                  align: 'right',
                  width: 65,
                  formatter: format_amount
                },
              ]
            ],
            onResize: function() {
              $(dg).datagrid('fixDetailRowHeight', indexheader);
            },
            onLoadSuccess: function() {
              setTimeout(function() {
                $(dg).datagrid('fixDetailRowHeight', indexheader);
              }, 0);
            }
          });

          ddv.datagrid('loadData', rowheader.detail);

          for (var i = 0; i < rowheader.detail.length; i++) {
            if (rowheader.detail[i].selected != 1) {
              continue;
            }

            ddv.datagrid('checkRow', i);
          }

          $(dg).datagrid('fixDetailRowHeight', indexheader);
        },
        onCheck: function(index, row) {
          $(this).datagrid('updateRow', {
            index: index,
            row: {
              selected: 1,
            }
          });

          $(this).datagrid('collapseRow', index);
          $(this).datagrid('expandRow', index);
        },
        onCheckAll: function(rows) {
          for (var j = 0; j < rows.length; j++) {
            $(this).datagrid('updateRow', {
              index: j,
              row: {
                selected: 1,
              }
            });

            $(this).datagrid('collapseRow', j);
            $(this).datagrid('expandRow', j);
          }
        },
        onUncheck: function(index, row) {
          $(this).datagrid('updateRow', {
            index: index,
            row: {
              selected: 0,
            }
          });

          $(this).datagrid('collapseRow', index);
          $(this).datagrid('expandRow', index);
        },
        onUncheckAll: function(rows) {
          for (var j = 0; j < rows.length; j++) {
            $(this).datagrid('updateRow', {
              index: j,
              row: {
                selected: 0,
              }
            });

            $(this).datagrid('collapseRow', j);
            $(this).datagrid('expandRow', j);
          }
        },
      })
    }

    function browse_data_lokasi(id) {
      $(id).combogrid({
        panelWidth: 260,
        url: link_api.browseLokasi,
        idField: 'uuidlokasi',
        textField: 'nama',
        mode: 'remote',
        sortName: 'kode',
        sortOrder: 'asc',
        required: true,
        columns: [
          [{
              field: 'uuidlokasi',
              hidden: true
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
              width: 150,
              sortable: true,
            },
          ]
        ],
      });
    }

    async function simpan() {
      $(':radio:not(:checked)').attr('disabled', false);
      var mode = $("#mode").val();
      var data = [];

      var isValid = $('#form_input').form('validate');

      var data_detail = $('#table_data_detail').datagrid('getRows').filter(function(item) {
        return item.selected == 1;
      });

      $('#window_button_simpan').window('close');

      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }

      if (cekbtnsimpan && isValid) {
        cekbtnsimpan = false;

        try {
          bukaLoader();
          const res = await fetchData(
            '{{ session('TOKEN') }}',
            link_api.simpanDataSPJ, {
              tgltrans: $('#TGLTRANS').datebox('getValue'),
              data_detail: data_detail
            }
          );
          if (res.success) {
            $.messager.show({
              title: 'Info',
              msg: 'Transaksi Sukses',
              showType: 'show'
            });

            $('#table_data_detail').datagrid('loadData', []);
            $('#table_data_detail_rekap').datagrid('loadData', []);
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
    }

    async function tampil_data() {
      var idlokasi = $('#IDLOKASI').combogrid('getValue');
      var tglawal = $('#TGLAWAL').datebox('getValue');
      var tglakhir = $('#TGLAKHIR').datebox('getValue');

      if (idlokasi == '') {
        $.messager.alert('Peringatan', 'Lokasi Belum Dipilih', 'warning');

        return false;
      }

      try {
        bukaLoader();
        const res = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.tampilDataSPJ, {
            uuidlokasi: idlokasi,
            tglawal: tglawal,
            tglakhir: tglakhir
          }
        );
        if (res.success) {
          $('#table_data_detail').datagrid('loadData', res.data);

          for (var i = 0; i < res.data.length; i++) {
            $('#table_data_detail').datagrid('expandRow', i);
          }
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
  </script>
@endpush
