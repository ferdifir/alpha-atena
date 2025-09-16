@extends('template.app')

@push('css')
  <style>
    .datagrid-header-check,
    .datagrid-cell-check {
      width: 50px;
    }
  </style>
@endpush

@section('content')
  <div class="easyui-layout" style="width:100%;height:100%" fit="true">
    <div class="btn-group-transaksi" data-options="region: 'west'" style="width: 50px">
      <a id='btn_ubah' title="Edit Data" class="easyui-linkbutton" class="easyui-linkbutton easyui-tooltip"
        onclick="javascript:ubah()">
        <img src="{{ asset('assets/images/edit.png') }}">
      </a>
      <a id='btn_tutup' title="Simpan Data" class="easyui-linkbutton" disabled class="easyui-linkbutton easyui-tooltip"
        onclick="javascript:before_tutup('HEADER')">
        <img src="{{ asset('assets/images/simpan.png') }}">
      </a>
      <a id="btn_cancel" title="Batalkan Transaksi" disabled class="easyui-linkbutton easyui-tooltip"
        onclick="javascript:cancel()">
        <img src="{{ asset('assets/images/cancel.png') }}">
      </a>
      <a id="btn_refresh" title="Refresh Data" class="easyui-linkbutton easyui-tooltip" onclick="refresh_data()">
        <img src="{{ asset('assets/images/refresh.png') }}">
      </a>
    </div>

    <div data-options="region: 'center'">
      <div class="easyui-layout" style="width:100%;height:100%" fit="true">
        <div data-options="region:'west',split:true,hideCollapsedContent:false,collapsed:false" title="Filter"
          style="width:200px;" align="center">
          <table border="0">
            <tr>
              <td id="label_form"></td>
            </tr>
            <tr>
              <td id="label_form" align="center">Lokasi</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_lokasi_filter" name="txt_lokasi_filter" style="width:100px"
                  class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form" align="center">No. Permintaan Barang</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_kodetrans_aw_filter" name="txt_kodetrans_aw_filter" style="width:100px" />
              </td>
            </tr>
            <tr>
              <td id="label_form" align="center">s/d</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_kodetrans_ak_filter" name="txt_kodetrans_ak_filter" style="width:100px" />
              </td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">Tgl. Trans</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_tgl_aw_filter" name="txt_tgl_aw_filter" style="width:100px"
                  class="date" /></td>
            </tr>
            <tr>
              <td id="label_form" align="center">s/d</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_tgl_ak_filter" name="txt_tgl_ak_filter" style="width:100px"
                  class="date" /></td>
            </tr>
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="rd_tutup" value="tidak"
                  checked>Tidak Close</td>
            </tr>
            <tr>
              <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="rd_tutup" value="sudah">Sudah
                Close</td>
            </tr>
            <tr>
              <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="rd_tutup" value="semua"
                  id="rd_tutup_semua">Semua</td>
            </tr>
            <tr>
              <td id="label_form"></td>
            </tr>
            <tr>
              <td id="label_form" align="center"></td>
            </tr>
            <tr>
              <td align="center">
                <label id="label_form"><input type="checkbox" id="cb_filter_semua"> Tampilkan semua</label>
              </td>
            </tr>
            <tr>
              <td align="center"><a id="btn_search" class="easyui-linkbutton"
                  data-options="iconCls:'icon-search', plain:false" onclick="filter_data()">Tampilkan Data</a></td>
            </tr>
            <tr>
              <td align="center" style="background-color:yellow;color:red;font-size:11pt;">
                Jika Centang Artinya Sudah Closed<br>
              </td>
            </tr>
          </table>
        </div>
        <div data-options="region:'center'">
          <div style="height:60%;">
            <table id="table_data" fit="true"></table>
          </div>
          <div style="height:40%;">
            <table id="table_data_detail" fit="true"></table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="form_input">
    <input type="hidden" id="mode" name="mode">
    <input type="hidden" id="data_header" name="data_header">
    <input type="hidden" id="data_detail" name="data_detail">
  </div>
@endsection

@push('js')
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
  <script src="{{ asset('assets/js/utils.js') }}"></script>
  <script>
    var edit_row = false;
    var idtrans = "";

    $(document).ready(function() {
      buat_table();
      buat_table_detail();
      browse_filter_lokasi('#txt_lokasi_filter', 'mlokasi');
      browse_filter_kodetrans('#txt_kodetrans_aw_filter', 'kodetrans');
      browse_filter_kodetrans('#txt_kodetrans_ak_filter', 'kodetrans');

      const tglFilter = new Date(Date.now() - 7 * 24 * 60 * 60 * 1000).toISOString().slice(0, 10);
      $("#txt_tgl_aw_filter").datebox('setValue', tglFilter);

      $('#cb_filter_semua').change(function(e) {
        if ($(this).is(':checked')) {
          $('#txt_lokasi_filter').combogrid('disable');
          $('#txt_kodetrans_aw_filter').combogrid('disable');
          $('#txt_kodetrans_ak_filter').combogrid('disable');
          $('#txt_tgl_aw_filter').datebox('disable');
          $('#txt_tgl_ak_filter').datebox('disable');
          $('#rd_tutup_semua').prop('checked', true);
        } else {
          $('#txt_lokasi_filter').combogrid('enable');
          $('#txt_kodetrans_aw_filter').combogrid('enable');
          $('#txt_kodetrans_ak_filter').combogrid('enable');
          $('#txt_tgl_aw_filter').datebox('enable');
          $('#txt_tgl_ak_filter').datebox('enable');
        }
      });
      tutupLoader();
    });

    /*==================== FUNGSI YG BERHUBUNGAN DG INFORMASI HEADER ===================*/
    $("#btn_refresh").click(function() {
      refresh_data();
    });
    shortcut.add('F2', function() {
      before_add();
    });
    shortcut.add('F8', function() {
      tutup();
    });

    function before_tutup(transaksi) {
      $('#mode').val('tutup');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.ubah == 1) {
          $.messager.confirm('Confirm', 'Anda Yakin Akan Approve Transaksi?', function(r) {
            if (r) {
              if (transaksi == "HEADER") {
                tutup();
              } else if (transaksi == "DETAIL") {
                tutup_detail();
              }
            }
          });
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function ubah() {
      $("#btn_tutup").linkbutton('enable');
      $("#btn_ubah").linkbutton('disable');
      $("#btn_cancel").linkbutton('enable');
    }

    function cancel() {
      $("#btn_tutup").linkbutton('disable');
      $("#btn_ubah").linkbutton('enable');
      $("#btn_cancel").linkbutton('disable');
    }

    function tutup() {
      var mode = $("#mode").val();
      $('#data_detail').val(JSON.stringify($('#table_data').datagrid('getRows')));
      var isValid = $('#form_input').form('validate');
      if (isValid && mode == 'tutup') {
        const data = $('#form_input :input').serializeArray();
        const payload = {};
        data.forEach(item => {
          if (item.name == 'data_detail') {
            payload[item.name] = JSON.parse(item.value);
          } else {
            payload[item.name] = item.value;
          }
        });

        bukaLoader();
        fetchData(
          '{{ session('TOKEN') }}',
          link_api.tutupTransaksiPermintaanBarang,
          payload,
        ).then(res => {
          if (res.success) {
            $.messager.alert('Info', 'Transaksi Sukses Ditutup', 'info');
            $("#btn_tutup").linkbutton('disable');
            $("#btn_ubah").linkbutton('enable');
            $("#btn_cancel").linkbutton('disable');
            refresh_data();
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
    }

    function tutup_detail() {
      var row = $('#table_data').datagrid('getRows');
      var rowDetail = $('#table_data_detail').datagrid('getRows');
      var mode = $("#mode").val();
      $('#data_header').val(JSON.stringify(row));
      $('#data_detail').val(JSON.stringify(rowDetail));

      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      if (isValid && mode == 'tutup') {
        const data = $("#form_input :input").serializeArray();
        const payload = {};
        data.forEach(item => {
          if (item.name.startsWith('data_')) {
            payload[item.name] = JSON.parse(item.value);
          } else {
            payload[item.name] = item.value;
          }
        });

        bukaLoader();
        fetchData(
          '{{ session('TOKEN') }}',
          link_api.tutupTransaksiBarangPermintaanBarang,
          payload
        ).then(res => {
          if (res.success) {
            $.messager.alert('Info', 'Transaksi Sukses Ditutup', 'info');
            $("#btn_tutup").linkbutton('disable');
            $("#btn_ubah").linkbutton('enable');
            $("#btn_cancel").linkbutton('disable');
            refresh_data();
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
    }

    function refresh_data() {
      $('#table_data').datagrid('reload');
      $('#table_data_detail').datagrid('loadData', []);
      clear_plugin();
    }

    function filter_data() {
      if (!$('#cb_filter_semua').prop('checked') &&
        $('#txt_lokasi_filter').combogrid('getValue') == 0) {
        $.messager.alert('Error', 'Filter Lokasi Harus Dipilih Terlebih Dahulu', 'error');
        $('#table_data').datagrid('loadData', []);
      } else {
        $('#table_data').datagrid('load', {
          lokasi: $('#txt_lokasi_filter').combogrid('getValue'),
          kodetrans_aw: $('#txt_kodetrans_aw_filter').combogrid('getValue'),
          kodetrans_ak: $('#txt_kodetrans_ak_filter').combogrid('getValue'),
          tglawal: $('#txt_tgl_aw_filter').datebox('getValue'),
          tglakhir: $('#txt_tgl_ak_filter').datebox('getValue'),
          rd_tutup: $('[name=rd_tutup]:checked').val(),
          filter_semua: $('#cb_filter_semua:checked').val(),
        });
      }
      $('#table_data_detail').datagrid('loadData', []);
    }

    function browse_filter_lokasi(id, table) {
      $(id).combogrid({
        panelWidth: 330,
        url: link_api.browseLokasi,
        idField: 'uuidlokasi',
        textField: 'nama',
        mode: 'local',
        sortName: 'nama',
        sortOrder: 'asc',
        required: true,
        selectFirstRow: true,
        columns: [
          [{
              field: 'uuidlokasi',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 100,
              sortable: true
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 200,
              sortable: true
            },
          ]
        ],
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');
          if (row) {
            url = link_api.browseFilterPermintaanBarang;

            $('#txt_kodetrans_aw_filter').combogrid('grid').datagrid('options').url = url;
            $('#txt_kodetrans_aw_filter').combogrid('clear');
            $('#txt_kodetrans_aw_filter').combogrid('grid').datagrid('load', {
              lokasi: row.uuidlokasi,
              q: ''
            });

            $('#txt_kodetrans_ak_filter').combogrid('grid').datagrid('options').url = url;
            $('#txt_kodetrans_ak_filter').combogrid('clear');
            $('#txt_kodetrans_ak_filter').combogrid('grid').datagrid('load', {
              lokasi: row.uuidlokasi,
              q: ''
            });
          }
        }
      });
    }

    function browse_filter_kodetrans(id, table) {
      $(id).combogrid({
        panelWidth: 640,
        idField: 'kodepr',
        textField: 'kodepr',
        mode: 'remote',
        url: link_api.browseFilterPermintaanBarang,
        columns: [
          [{
              field: 'uuidpr',
              hidden: true
            },
            {
              field: 'kodepr',
              title: 'Kode',
              width: 150
            },
            {
              field: 'kodelokasi',
              hidden: true,
              title: 'Lokasi',
              width: 60
            },
            {
              field: 'namalokasi',
              title: 'Nama Lokasi',
              width: 120
            },
            {
              field: 'tgltrans',
              title: 'Tgl Trans',
              width: 150
            },
            {
              field: 'userentry',
              title: 'User Entry',
              width: 150
            },
          ]
        ],
      });
    }

    /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */
    function buat_table() {
      $("#table_data").datagrid({
        fit: true,
        clickToEdit: false,
        singleSelect: true,
        remoteSort: false,
        multiSort: true,
        striped: true,
        rownumbers: true,
        checkOnSelect: false,
        selectOnCheck: false,
        RowAdd: false,
        url: link_api.loadDataGridTutupPermintaanBarang,
        rowStyler: function(index, row) {
          if (row.status == 'S') {
            return 'background-color:{{ session('WARNA_STATUS_S') }}';
          } else if (row.status == 'P') {
            return 'background-color:{{ session('WARNA_STATUS_S') }}';
          } else if (row.status == 'D') {
            return 'background-color:{{ session('WARNA_STATUS_S') }}';
          }
        },
        onLoadSuccess: function(data) {
          $('#table_data').datagrid('unselectAll');
        },
        frozenColumns: [
          [{
              field: 'tutup',
              title: 'Tutup',
              align: 'center',
              sortable: true,
              title: 'Closed',
              checkbox: true
            },
            {
              field: 'idpr',
              hidden: true
            },
            {
              field: 'kodepr',
              title: 'No. PR',
              width: 150,
              sortable: true,
              align: 'center'
            },
          ]
        ],
        columns: [
          [{
              field: 'kodeapprovejoborder',
              title: 'No. Approve JO',
              width: 150,
              align: 'center'
            },
            {
              field: 'tgltrans',
              title: 'Tgl. Pesanan',
              width: 80,
              sortable: true,
              formatter: ubah_tgl_indo,
              align: 'center'
            }
          ]
        ],
        onClickRow: function(index, data) {
          load_data();
        },
        onUncheck: function(index, data) {
          $('#table_data').datagrid('selectRow', index);
          $(this).datagrid('updateRow', {
            index: index,
            row: {
              tutup: 0,
            }
          });
          load_data(1);
        },
        onCheck: function(index, data) {
          $(this).datagrid('updateRow', {
            index: index,
            row: {
              tutup: 1,
            }
          });
        },
        onLoadSuccess: function(data) {
          var rows = $('#table_data').datagrid('getRows');
          var ln = rows.length;
          for (var i = 0; i < ln; i++) {
            if (rows[i].tutup == 1)
              $('#table_data').datagrid('checkRow', i);
          }

          $('#table_data').datagrid('getPanel').find('div.datagrid-header input[type=checkbox]').attr('disabled',
            'disabled');
        },
      }).datagrid();
    }

    function buat_table_detail() {
      $("#table_data_detail").datagrid({
        clickToEdit: false,
        showFooter: true,
        singleSelect: true,
        rownumbers: true,
        rowAdd: false,
        checkOnSelect: false,
        selectOnCheck: false,
        toolbar: [{
          text: 'Proses',
          iconCls: 'icon-save',
          handler: function() {
            before_tutup("DETAIL");
          }
        }],
        frozenColumns: [
          [{
              field: 'tutupbarang',
              align: 'center',
              width: 100,
              sortable: true,
              checkbox: true
            },
            {
              field: 'idbarang',
              hidden: true
            },
            {
              field: 'idpr',
              hidden: true
            },
            {
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 100,
              sortable: true
            },
            {
              field: 'namabarang',
              title: 'Nama Barang',
              width: 250,
              sortable: true
            },
          ]
        ],
        columns: [
          [{
              field: 'jml',
              title: 'Jml',
              width: 70,
              align: 'right',
              formatter: format_qty,
              sortable: true
            },
            {
              field: 'terpenuhi',
              title: 'Terpenuhi',
              width: 75,
              align: 'right',
              formatter: format_qty,
              sortable: true
            },
            {
              field: 'sisa',
              title: 'Sisa',
              width: 70,
              align: 'right',
              formatter: format_qty,
              sortable: true
            },
            {
              field: 'satuan',
              title: 'Satuan',
              width: 80,
              align: 'center',
              sortable: true
            },
          ]
        ],
        onLoadSuccess: function(data) {
          var rows = $('#table_data_detail').datagrid('getRows');
          var ln = rows.length;
          for (var i = 0; i < ln; i++) {
            if (rows[i].tutupbarang == 1)
              $('#table_data_detail').datagrid('checkRow', i);
          }

        },
        onUncheck: function(index, data) {
          $('#table_data_detail').datagrid('selectRow', index);
          $(this).datagrid('updateRow', {
            index: index,
            row: {
              tutupbarang: 0,
            }
          });
        },
        onCheck: function(index, data) {
          $(this).datagrid('updateRow', {
            index: index,
            row: {
              tutupbarang: 1,
            }
          });
        },
      }).datagrid();

      var h = $('#table_data_detail').datagrid('getPanel').find('div.datagrid-header div.datagrid-header-check');
      h.html('<span>Closed</span>');
    }

    function load_data(uncheck = 0) {
      row = $('#table_data').datagrid('getSelected');
      if (row) {
        const payload = {
          uuidpr: row.uuidpr
        };
        bukaLoader();
        fetchData(
          '{{ session('TOKEN') }}',
          link_api.loadDataTutupPermintaanBarang,
          payload,
        ).then(res => {
          if (res.success) {
            $('#table_data_detail').datagrid('loadData', res.data);

            if (uncheck) {
              var bisatutup = false;
              for (var i = 0; i < res.data.length; i++) {
                if (res.data[i]['sisa'] > 0) bisatutup = true;
              }
              if (!bisatutup) {
                //jika error (sisa > 0), check ulang karena tidak boleh diunclose
                $.messager.alert(
                  'Error',
                  'Transaksi Ini Tidak Dapat DiUnclosed Karena Tidak Memenuhi Ketentuan',
                  'error'
                );
                var index = $('#table_data').datagrid("getRowIndex", row);
                $('#table_data').datagrid("checkRow", index);
              }
            }
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
    }

    function clear_plugin() {
      $('.combogrid-f').each(function() {
        $(this).combogrid('grid').datagrid('load', {
          q: ''
        });
      });

      $('.number').numberbox('setValue', 0);
    }
  </script>
@endpush
