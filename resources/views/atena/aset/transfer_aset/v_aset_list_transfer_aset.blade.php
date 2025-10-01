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
              <td id="label_form" align="center">No. Transfer Aset</td>
            </tr>
            <tr>
              <td align="center"><input id="txt_kodetrans_filter" name="txt_kodetrans_filter" style="width:100px"
                  class="label_input" /></td>
            </tr>
            <tr>
              <td id="label_form"><br></td>
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
    var counter = 0;
    var idtrans = "";

    $(document).ready(function() {
      $("#table_data").datagrid({
        onSelect: function() {
          row = $('#table_data').datagrid('getSelected');
        }
      });

      buat_table();

      $("#txt_tgl_aw_filter").datebox('setValue', "<?= TGLAWALFILTER ?>");

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
            export_excel('Faktur Transfer', $("#area_cetak").html());
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
      get_akses_user('<?= $kodemenu ?>', function(data) {
        if (data.tambah == 1) {
          counter++;
          $("#mode").val("tambah");
          $("#view").val("<?= $namaView ?>");
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
      });
    }

    function before_delete() {
      $('#mode').val('hapus');

      if (row) {
        validasi_session(function() {
          cek_tanggal_tutup_periode(row.tgltrans, 1, function(data) {
            if (!data.success) {
              $.messager.alert('Error', 'Sudah dilakukan tutup periode pada tanggal transaksi no ' + row
                .kodeasettransfer + '. Prosedur tidak dapat dilanjutkan', 'error')
              return false
            }

            get_status_trans("atena/Aset/Transaksi/TransferAset", row.idasettransfer, function(data) {
              if (data.status == 'I') {
                var kode = row.kodeasettransfer;
                if ($('#tab_transaksi').tabs('exists', kode)) {
                  $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + kode +
                    ', Sebelum Dibatalkan ', 'warning');
                } else {
                  get_akses_user('<?= $kodemenu ?>', function(data) {
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
          });
        });
      }
    }

    function before_delete_print() {
      $('#mode').val('batal_cetak');

      if (row) {
        validasi_session(function() {
          cek_tanggal_tutup_periode(row.tgltrans, 1, function(data) {
            if (!data.success) {
              $.messager.alert('Error', 'Sudah dilakukan tutup periode pada tanggal transaksi no ' + row
                .kodeasettransfer + '. Prosedur tidak dapat dilanjutkan', 'error')
              return false
            }

            get_status_trans("atena/Aset/Transaksi/TransferAset", row.idasettransfer, function(data) {
              if (data.status == 'S') {
                var kode = row.kodeasettransfer;
                if ($('#tab_transaksi').tabs('exists', kode)) {
                  $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + kode +
                    ', Sebelum Dibatal Cetak ', 'warning');
                } else {
                  get_akses_user('<?= $kodemenu ?>', function(data) {
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
          })
        });
      }
    }

    function before_print() {
      $('#mode').val('cetak');

      if (row) {
        get_akses_user('<?= $kodemenu ?>', function(data) {
          if (data.cetak == 0) {
            $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
            return false;
          }

          cek_tanggal_tutup_periode(row.tgltrans, 1, function(data) {
            if (!data.success) {
              $.messager.alert('Error', 'Sudah dilakukan tutup periode pada tanggal transaksi no ' + row
                .kodeasettransfer + '. Prosedur tidak dapat dilanjutkan', 'error')

              return false
            }
          })

          get_status_trans("atena/Aset/Transaksi/TransferAset", row.idasettransfer, function(data) {
            if (data.status == 'I') {
              var kode = row.kodeasettransfer;
              if ($('#tab_transaksi').tabs('exists', kode)) {
                $.messager.alert('Warning', 'Harap Tutup Tab Atas Transaksi ' + kode + ', Sebelum Dicetak ',
                  'warning');
              } else {
                cetak();
              }
            } else if (data.status == 'S' || data.status == 'P') {
              get_akses_cetak_ulang('aset', function(data) {
                if (data.hakakses == 1) {
                  $("#area_cetak").load(base_url + "atena/Aset/Transaksi/TransferAset/cetak/" + row
                    .idasettransfer);
                  $("#form_cetak").window('open');
                }
              });
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
        $.messager.confirm('Confirm', 'Anda Yakin Akan Membatalkan Transaksi ' + row.kodeasettransfer + ' ?', function(
          r) {
          if (r) {
            $.ajax({
              type: 'POST',
              dataType: 'json',
              url: base_url + "atena/Aset/Transaksi/TransferAset/batalTrans",
              data: "idtrans=" + row.idasettransfer + "&kodetrans=" + row.kodeasettransfer + "&alasan=" + alasan,
              cache: false,
              beforeSend: function() {
                $.messager.progress();
              },
              success: function(msg) {
                $.messager.progress('close');

                if (msg.success) {
                  $.messager.alert('Info', 'Pembatalan Transaksi Sukses', 'info');
                  reload();
                } else {
                  $.messager.alert('Error', msg.errorMsg, 'error');
                }
              }
            });
          }
        });
      } else {
        $.messager.alert('Error', 'Alasan harus diisi', 'error');
      }
    }

    function batal_cetak() {
      if (row) {
        $.messager.confirm('Confirm', 'Anda Yakin Akan Batal Cetak Transaksi ' + row.kodeasettransfer + ' ?', function(
          r) {
          if (r) {
            $.ajax({
              type: 'POST',
              dataType: 'json',
              url: base_url + "atena/Aset/Transaksi/TransferAset/ubahStatusJadiInput",
              data: "idtrans=" + row.idasettransfer + "&kodetrans=" + row.kodeasettransfer,
              cache: false,
              beforeSend: function() {
                $.messager.progress();
              },
              success: function(msg) {
                $.messager.progress('close');

                if (msg.success) {
                  $.messager.alert('Info', 'Pembatalan Cetak Sukses', 'info');
                  reload();
                } else {
                  $.messager.alert('Error', msg.errorMsg, 'error');
                }
              }
            });
          }
        });
      }
    }

    function cetak() {

      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: base_url + 'atena/Aset/Transaksi/TransferAset/ubahStatusJadiSlip',
        data: {
          idtrans: row.idasettransfer,
          kodetrans: row.kodeasettransfer
        },
        cache: false,
        beforeSend: function() {
          $.messager.progress();
        },
        success: function(msg) {
          $.messager.progress('close');
          if (msg.success) {
            $.messager.show({
              title: 'Info',
              msg: 'Transaksi Sukses Dicetak',
              showType: 'show'
            });
            $("#area_cetak").load(base_url + "atena/Aset/Transaksi/TransferAset/cetak/" + row.idasettransfer);
            $("#form_cetak").window('open');

            reload();
          } else {
            $.messager.alert('Error', msg.errorMsg, 'error');
          }
        }
      });
    }

    function refresh_data() {
      //JIKA BERADA PADA TAB FORM TAMBAH / UBAH
      if ($('#tab_transaksi').tabs('getSelected').panel('options').title == "Tambah" || $('#tab_transaksi').tabs(
          'getSelected').panel('options').title == "Ubah") {
        row = {
          idasettransfer: "",
          kodeasettransfer: "",
        };

        $("#mode").val("tambah");
        $("#view").val("<?= $namaView ?>");
        $("#data").val('');

        var tab_name = $('#tab_transaksi').tabs('getSelected').panel('options').title;

        if (tab_name == "Tambah") { //TAMBAH LANGSUNG AMBIL DARI ID

          var counterTambah = $('#tab_transaksi').tabs('getSelected').panel('options').id;
          tab_name = tab_name + "_" + counterTambah;
        } else { //UBAH DIAMBIL DARI ID POTONGAN
          var trans = $('#tab_transaksi').tabs('getSelected').panel('options').id.split("|");
          var counterTambah = trans[2];
          tab_name = tab_name + "_" + counterTambah;

        }

        var tab_title = 'Tambah';

        var tab = $('#tab_transaksi').tabs('getSelected');
        var tabIndex = $('#tab_transaksi').tabs('getTabIndex', tab);

        var tabTrans = $('#tab_transaksi').tabs('getTab', tabIndex);
        $('#form_data').attr('target', tab_name);

        $('#tab_transaksi').tabs('update', {
          tab: tabTrans,
          type: 'header',
          options: {
            title: tab_title,
            content: '<iframe frameborder="0"  class="tab_form" id="' + counterTambah + '" name="' + tab_name +
              '" ></iframe>',
            closable: true
          }
        });
        $('#form_data').submit();

      } else {
        //JIKA DI TAB GRID
        $('#table_data').datagrid('reload');
      }
    }
    // function load_detail(idtrans) {
    // 	$.ajax({
    // 		type    : 'POST',
    // 		dataType: 'json',
    // 		url     : base_url+"atena/Aset/Transaksi/BuktiPenerimaanAset/loadDetail",
    // 		data    : "idtrans="+idtrans,
    // 		cache   : false,
    // 		beforeSend : function (){
    // 			$.messager.progress();
    // 		},
    // 		success: function(msg){
    // 			$.messager.progress('close');
    // 			if (msg.success) {
    // 				$('#table_data_detail').datagrid('loadData', msg.detail);
    // 			}
    // 		}
    // 	});
    // }

    function filter_data() {
      var status = [];
      $("[name='cb_status_filter[]']:checked").each(function() {
        status.push($(this).val());
      });
      $('#table_data').datagrid('load', {
        kodetrans: $('#txt_kodetrans_filter').val(),
        nama: $('#txt_nama_supplier_filter').val(),
        perusahaan: $('#txt_perusahaan_filter').val(),
        tglawal: $('#txt_tgl_aw_filter').datebox('getValue'),
        tglakhir: $('#txt_tgl_ak_filter').datebox('getValue'),
        status: status,
      });
    }

    /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */

    function buat_table() {
      $("#table_data").datagrid({
        fit: true,
        singleSelect: true,
        remoteSort: false,
        multiSort: true,
        striped: true,
        rownumbers: true,
        url: base_url + "atena/Aset/Transaksi/TransferAset/dataGrid",
        rowStyler: function(index, row) {
          if (row.status == 'S') return 'background-color:{{ session('WARNA_STATUS_S') }}';
          else if (row.status == 'P') return 'background-color:{{ session('WARNA_STATUS_P') }}';
          else if (row.status == 'D') return 'background-color:{{ session('WARNA_STATUS_D') }}';
        },
        frozenColumns: [
          [{
              field: 'idasettransfer',
              hidden: true
            },
            {
              field: 'kodeasettransfer',
              title: 'No. Transfer Aset',
              width: 145,
              sortable: true,
              align: 'center'
            },
            {
              field: 'tgltrans',
              title: 'Tgl. Transfer',
              width: 90,
              sortable: true,
              formatter: ubah_tgl_indo,
              align: 'center'
            },
            {
              field: 'idlokasiasal',
              hidden: true
            },
            {
              field: 'kodelokasiasal',
              title: 'Lokasi Awal',
              width: 95,
              sortable: true,
              align: 'center'
            },
            {
              field: 'namalokasiasal',
              title: 'Nama Lokasi Awal',
              width: 130,
              sortable: true,
              align: 'center'
            },
            {
              field: 'idlokasitujuan',
              hidden: true
            },
            {
              field: 'kodelokasitujuan',
              title: 'Lokasi Tujuan',
              width: 95,
              sortable: true,
              align: 'center'
            },
            {
              field: 'namalokasitujuan',
              title: 'Nama Lokasi Tujuan',
              width: 130,
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
              width: 60,
              sortable: true,
              align: 'center'
            },
            //{field:'CLOSING',title:'Closing',width:60,sortable:true,align:'center'}
          ]
        ],
        onDblClickRow: function(index, data) {
          validasi_session(function() {
            counter++;

            //PELU BUAT SIMPEN INDEX
            var row = $('#table_data').datagrid('getSelected');

            $("#mode").val("ubah");
            $("#view").val("<?= $namaView ?>");
            $("#data").val(row.idasettransfer);

            var tab_title = row.kodeasettransfer;
            var tab_name = tab_title + "_" + counter;

            $('#form_data').attr('target', tab_name);

            if ($('#tab_transaksi').tabs('exists', tab_title)) {
              $('#tab_transaksi').tabs('select', tab_title);
            } else {
              $('#tab_transaksi').tabs('add', {
                title: tab_title,
                id: row.idasettransfer + "|" + row.kodeasettransfer + "|" + counter,
                content: '<iframe frameborder="0"  class="tab_form"  id="' + counter + '" name="' +
                  tab_name + '"></iframe>',
                closable: true
              });

              $('#form_data').submit();
            }
          });
        },
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

    function tutupTab() {
      //DAPATKAN TAB dan INDEXNYA untuk DIHAPUS
      var tab = $('#tab_transaksi').tabs('getSelected');
      var index = $('#tab_transaksi').tabs('getTabIndex', tab);
      $('#tab_transaksi').tabs('close', index);
    }

    function reload() {
      //PELU BUAT SIMPEN INDEX
      var row = $('#table_data').datagrid('getSelected');

      if ($('#tab_transaksi').tabs('getSelected').panel('options').title == "Ubah") {
        //INDEX TAB
        var tab_name = $('#tab_transaksi').tabs('getSelected').panel('options').title;

        //ROW ID dan KODE
        var trans = $('#tab_transaksi').tabs('getSelected').panel('options').id.split("|");
        var counterTambah = trans[2];
        tab_name = tab_name + "_" + counterTambah;

        $("#mode").val("ubah");
        $("#view").val("<?= $namaView ?>");
        $("#data").val(trans[0]);

        var tab = $('#tab_transaksi').tabs('getSelected');
        var tabIndex = $('#tab_transaksi').tabs('getTabIndex', tab);
        var tabTrans = $('#tab_transaksi').tabs('getTab', tabIndex);
        var tab_title = 'Ubah';
        $('#form_data').attr('target', tab_name);

        $('#tab_transaksi').tabs('update', {
          tab: tabTrans,
          type: 'header',
          options: {
            title: tab_title,
            content: '<iframe frameborder="0"  class="tab_form" id="' + counterTambah + '" name="' + tab_name +
              '" ></iframe>',
            closable: true
          }
        });
        $('#form_data').submit();


      }

      $('#table_data').datagrid('reload');

    }
  </script>
@endpush
