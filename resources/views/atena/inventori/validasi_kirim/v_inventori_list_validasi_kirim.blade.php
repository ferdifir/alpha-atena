@extends('template.app')

@section('content')
  <div class="easyui-layout" fit="true">
    <div class="btn-group-transaksi" data-options="region: 'west'" style="width: 50px">
      <a id="btn_ubah" title="Ubah" class="easyui-linkbutton easyui-tooltip" onclick="javascript:ubah()">
        <img src="{{ asset('assets/images/edit.png') }}">
      </a>
      <a id="btn_kirim" title="Kirim" class="easyui-linkbutton easyui-tooltip"
        onclick="javascript:before_approve('KIRIM')">
        <img src="{{ asset('assets/images/kirim.png') }}">
      </a>
      <a id="btn_pending" title="Pending" class="easyui-linkbutton easyui-tooltip"
        onclick="javascript:before_approve('PENDING')">
        <img src="{{ asset('assets/images/pending.png') }}">
      </a>
      <a id="btn_tuntas" title="Tuntas" class="easyui-linkbutton easyui-tooltip"
        onclick="javascript:before_approve('TUNTAS')">
        <img src="{{ asset('assets/images/tuntas.png') }}">
      </a>
      <a id="btn_cancel" title="Batal" class="easyui-linkbutton easyui-tooltip" onclick="javascript:cancel()">
        <img src="{{ asset('assets/images/cancel.png') }}">
      </a>
      <a id="btn_refresh" title="Refresh Data" class="easyui-linkbutton easyui-tooltip" onclick="refresh_data()">
        <img src="{{ asset('assets/images/refresh.png') }}">
      </a>
    </div>
    <div data-options="region: 'center'">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'west',split:true,hideCollapsedContent:false,collapsed:false" title="Filter"
          style="width:170px;" align="center">
          <table border="0">
            <tr>
              <td id="label_form"></td>
            </tr>
            <tr>
              <td id="label_form" align="center">
                <input onchange="" type="radio" value="0" id="rbTglFilter0" name="rbtglfilter" checked>
                Tgl. Transaksi BBK
              </td>
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
              <td id="label_form" align="center">
                <input onchange="" type="radio" value="1" id="rbTglFilter1" name="rbtglfilter"s>
                Tgl. Validasi Kirim
              </td>
            </tr>
            <tr>
              <td align="center">
                <input id="txt_tgl_validasi_filter" name="txt_tgl_validasi_filter" class="date" style="width:100px" />
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
              <td id="label_form" align="center">No. Surat Jalan</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_kodetrans_filter" name="txt_kodetrans_filter" style="width:100px"
                  class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">Referensi</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_ref_aw_filter" name="txt_ref_aw_filter" style="width:100px"
                  class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
            </tr>
            <tr>
              <td id="label_form" align="center">Tampilkan</td>
            </tr>
            <tr>
              <td align="left">
                <label id="label_form"><input type="checkbox" value="0" name="cb_validasikirim_filter[]"> Belum
                  Input</label><br>
                <label id="label_form"><input type="checkbox" value="1" name="cb_validasikirim_filter[]">
                  Kirim</label><br>
                <label id="label_form"><input type="checkbox" value="2" name="cb_validasikirim_filter[]">
                  Pending</label><br>
                <label id="label_form"><input type="checkbox" value="3" name="cb_validasikirim_filter[]">
                  Tuntas</label><br>
              </td>
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
          </table>
        </div>
        <div data-options="region:'center',">
          <div style="height:100%;">
            <table id="table_data"></table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="form_input">
    <input type="hidden" id="mode" name="mode">
    <input type="hidden" id="data_detail" name="data_detail">
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
  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}">
  </script>
  <script>
    var edit_row = false;
    var idtrans = "";
    $(document).ready(function() {
      browse_data_lokasi('#txt_lokasi');
      buat_table();

      $("#txt_tgl_ak_filter").datebox('setValue', '{{ date('Y-m-d', strtotime('+7 days', strtotime('now'))) }}');

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
            export_excel('Faktur Validasi Kirim', $("#area_cetak").html());
            return false;
          }
        }]
      }).window('close');

      $('#cb_filter_semua').change(function(e) {
        if ($(this).is(':checked')) {
          $("#rbTglFilter0").prop("checked", true);
          $('#txt_kodetrans_filter').textbox('disable');
          $('#txt_ref_aw_filter').textbox('disable');
          $('#txt_tgl_aw_filter').datebox('disable');
          $('#txt_tgl_ak_filter').datebox('disable');
          $('#txt_tgl_validasi_filter').datebox('disable');
        } else {
          $("#rbTglFilter0").prop("checked", true);
          $('#txt_kodetrans_filter').textbox('enable');
          $('#txt_ref_aw_filter').textbox('enable');
          $('#txt_tgl_aw_filter').datebox('enable');
          $('#txt_tgl_ak_filter').datebox('enable');
          $('#txt_tgl_validasi_filter').datebox('disable');
        }
      });

      $("#btn_batal_approve").hide();
      $("[name=rd_approve]").change(function() {
        if ($(this).val() == 'approve') {
          $("#btn_approve").show();
          $("#btn_batal_approve").hide();
        } else if ($(this).val() == 'batalapprove') {
          $("#btn_approve").hide();
          $("#btn_batal_approve").show();
        }
        filter_data();
      });

      $("#txt_tgl_validasi_filter").datebox('disable');
      $("[name=rbtglfilter]").change(function() {
        if ($(this).val() == '0') {
          $("#txt_tgl_aw_filter").datebox('enable');
          $("#txt_tgl_ak_filter").datebox('enable');
          $("#txt_tgl_validasi_filter").datebox('disable');
        } else if ($(this).val() == '1') {
          $("#txt_tgl_aw_filter").datebox('disable');
          $("#txt_tgl_ak_filter").datebox('disable');
          $("#txt_tgl_validasi_filter").datebox('enable');
        }
        $('#cb_filter_semua').prop("checked", false);
      });

      $("#form_input").dialog({
        onOpen: function() {
          $('#form_input').form('clear');
        },
        buttons: '#dlg-buttons',
      }).dialog('close');

      $("#alasan_pembatalan").dialog({
        onOpen: function() {
          $('#alasan_pembatalan').form('clear');
        },
        buttons: '#alasan_pembatalan-buttons',
      }).dialog('close');

      $("#verify").dialog({
        onOpen: function() {
          $('#verify').form('clear');
        },
        buttons: '#verify-buttons'
      }).dialog('close');
    });

    /*==================== FUNGSI YG BERHUBUNGAN DG INFORMASI HEADER ===================*/
    $("#btn_refresh").click(function() {
      refresh_data();
    });
    shortcut.add('F2', function() {
      before_add();
    });
    shortcut.add('F8', function() {
      approve();
    });

    function before_approve(jenis) {
      $('#mode').val('approve');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.tambah == 1) {
          $.messager.confirm('Confirm', 'Anda Yakin Akan Approve Transaksi?', function(r) {
            if (r) {
              approve(jenis);
            }
          });
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function ubah() {
      $("#btn_kirim").linkbutton('enable');
      $("#btn_pending").linkbutton('enable');
      $("#btn_tuntas").linkbutton('enable');
      $("#btn_ubah").linkbutton('disable');
      $("#btn_cancel").linkbutton('enable');
    }

    function cancel() {
      $("#btn_kirim").linkbutton('disable');
      $("#btn_pending").linkbutton('disable');
      $("#btn_tuntas").linkbutton('disable');
      $("#btn_ubah").linkbutton('enable');
      $("#btn_cancel").linkbutton('disable');
    }

    async function approve(jenis) {
      try {
        bukaLoader();
        const payload = {
          mode: $("#mode").val(),
          jenisvalidasi: jenis,
          data_detail: $('#table_data').datagrid('getChecked'),
        };

        const msg = await fetchData(link_api.validasiValidasiKirim, payload);

        if (msg.success) {
          $("#btn_kirim").linkbutton('disable');
          $("#btn_pending").linkbutton('disable');
          $("#btn_tuntas").linkbutton('disable');
          $("#btn_ubah").linkbutton('enable');
          $("#btn_cancel").linkbutton('disable');

          if (jenis == "KIRIM") {
            try {
              const response = await fetchData(link_api.cetakValidasiKirim, payload, false);
              $("#area_cetak").html(response);
              $("#form_cetak").window('open');
            } catch (e) {
              const error = (typeof e === 'string') ? e : e.message;
              const textError = getTextError(error);
              $.messager.alert('Error', textError, 'error');
            }

            $.messager.alert('Info', 'Transaksi Sukses Diverifikasi', 'info');
            refresh_data();
          } else {
            $.messager.alert('Info', 'Transaksi Sukses Diverifikasi', 'info');
          }
        } else {
          $.messager.alert('Error', msg.message, 'error');
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
      filter_data(currentPage);
      clear_plugin();
    }

    function filter_data(pagenumber = 1) {
      var getLokasi = $('#txt_lokasi').combogrid('grid');
      var dataLokasi = getLokasi.datagrid('getChecked');
      var lokasi = "";
      for (var i = 0; i < dataLokasi.length; i++) {
        lokasi += (dataLokasi[i]["uuidlokasi"] + ",");
      }
      lokasi = lokasi.substring(0, lokasi.length - 1);

      var validasikirim = [];
      $("[name='cb_validasikirim_filter[]']:checked").each(function() {
        validasikirim.push($(this).val());
      });

      if ($('#txt_tgl_validasi_filter').datebox('options').disabled) {
        $('#table_data').datagrid('reload', {
          kodetrans: $('#txt_kodetrans_filter').val(),
          lokasi: lokasi,
          ref_aw: $('#txt_ref_aw_filter').textbox('getValue'),
          tglawal: $('#txt_tgl_aw_filter').datebox('getValue'),
          tglakhir: $('#txt_tgl_ak_filter').datebox('getValue'),
          rdApprove: $('[name=rd_approve]:checked').val(),
          filter_semua: $('#cb_filter_semua:checked').val(),
          validasikirim: validasikirim,
          page: pagenumber
        });
      } else {
        $('#table_data').datagrid('reload', {
          kodetrans: $('#txt_kodetrans_filter').val(),
          lokasi: lokasi,
          ref_aw: $('#txt_ref_aw_filter').textbox('getValue'),
          tglvalidasi: $('#txt_tgl_validasi_filter').datebox('getValue'),
          rdApprove: $('[name=rd_approve]:checked').val(),
          filter_semua: $('#cb_filter_semua:checked').val(),
          validasikirim: validasikirim,
          page: pagenumber
        });
      }
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
        pagination: true,
        clientPaging: false,
        pageSize: 30,
        url: link_api.loadDataGridValidasiKirim,
        onLoadSuccess: function(data) {
          tutupLoader();
          $("#table_data").datagrid('unselectAll');
        },
        rowStyler: function(index, row) {
          if (row.status == 'S') return 'background-color:{{ session('WARNA_STATUS_S') }}';
          else if (row.status == 'P') return 'background-color:{{ session('WARNA_STATUS_P') }}';
          else if (row.status == 'D') return 'background-color:{{ session('WARNA_STATUS_D') }}';
        },
        frozenColumns: [
          [{
              field: 'ck',
              title: 'Pilih',
              checkbox: true
            },
            {
              field: 'tgltrans',
              title: 'Tgl. BBK',
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
              title: 'No. Surat Jalan',
              width: 140,
              sortable: true,
              align: 'center'
            },
          ]
        ],
        columns: [
          [{
              field: 'namalokasi',
              hidden: true,
              title: 'Lokasi',
              width: 150,
              sortable: true,
              align: 'center'
            },
            {
              field: 'namareferensi',
              title: 'Nama Referensi',
              align: 'left',
              width: 120
            },
            {
              field: 'namacustomerekspedisi',
              title: 'Customer Ekspedisi',
              align: 'left',
              width: 120
            },
            {
              field: 'nopolisi',
              hidden: true
            },
            {
              field: 'uuidsopir',
              hidden: true
            },
            {
              field: 'namasopir',
              title: 'Sopir',
              align: 'left',
              width: 120,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 500,
                  mode: 'remote',
                  required: true,
                  url: link_api.browseSopir,
                  idField: 'namasopir',
                  textField: 'namasopir',
                  columns: [
                    [{
                        field: 'uuidsopir',
                        hidden: true
                      },
                      {
                        field: 'kodesopir',
                        title: 'Kode',
                        width: 120
                      },
                      {
                        field: 'namasopir',
                        title: 'Nama',
                        width: 350
                      },
                    ]
                  ],
                }
              }
            },
            {
              field: 'tglvalidasikirim',
              title: 'Tgl. Validasi Kirim',
              width: 110,
              sortable: true,
              formatter: ubah_tgl_indo,
              align: 'center',
              editor: {
                type: 'datebox',
                options: {
                  required: true,
                }
              }
            },
            {
              field: 'validasikirim',
              title: 'Status Kirim',
              width: 75,
              sortable: true,
              align: 'center',
              formatter: function(val) {
                if (val == 0) return '';
                if (val == 1) return 'KIRIM';
                if (val == 2) return 'PENDING';
                if (val == 3) return 'TUNTAS';
              }
            },
            {
              field: 'catatan',
              title: 'Catatan',
              width: 450,
              editor: {
                type: "textbox"
              },
              sortable: true
            },
            {
              field: 'jenistransaksi',
              title: 'Jenis Transaksi',
              width: 100,
              sortable: true,
              align: 'center'
            },
            {
              field: 'userbuat',
              title: 'User Entry',
              width: 100,
              sortable: true
            },
          ]
        ],
        onCheck: function(index, row) {
          $(this).datagrid('updateRow', {
            index: index,
            row: {
              tglvalidasikirim: date_format(),
            }
          });
        },
        onUncheck: function(index, row) {
          if (row.validasikirim != 1) {
            $(this).datagrid('updateRow', {
              index: index,
              row: {
                tglvalidasikirim: '',
              }
            });
          }
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data', index, field);
          if (field == 'namasopir') {
            ed.combogrid('showPanel');
          }
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data', index, cell.field);
          var row_update = {};

          switch (cell.field) {
            case 'namasopir':
              var data = ed.combogrid('grid').datagrid('getSelected');
              console.log(data);
              var id = data ? data.uuidsopir : '';
              row_update = {
                uuidsopir: id
              };
              break;
          }
          if (jQuery.isEmptyObject(row_update) == false) {
            $(this).datagrid('updateRow', {
              index: index,
              row: row_update
            });
          }
        }
      }).datagrid('enableCellEditing');
    }

    function browse_data_lokasi(id) {
      $(id).combogrid({
        panelWidth: 352,
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

    function clear_plugin() {
      $('.combogrid-f').each(function() {
        $(this).combogrid('grid').datagrid('load', {
          q: ''
        });
      });
      $('.number').numberbox('setValue', 0);
    }

    async function fetchData(url, body, isjson = true) {
      try {
        const token = '{{ session('TOKEN') }}';
        let headers = {
          'Authorization': 'bearer ' + token,
        };
        let requestBody = null;

        if (body instanceof FormData) {
          requestBody = body;
        } else {
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

        if (isjson == false) {
          return await response.text();
        } else {
          return await response.json();
        }
      } catch (error) {
        throw error;
      }
    }
  </script>
@endpush
