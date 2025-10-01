@extends('template.form')

@section('content')
  <div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            <script>
              if (screen.height < 450) $("#trans_layout").css('height', "450px");
            </script>
            <div data-options="region:'north',border:false" style="width:100%; height:150px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>
              <input type="hidden" id="mode" name="mode">
              <table width="100%">
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td valign="top">
                          <fieldset style="height:130px;">
                            <legend id="label_laporan">Info Transaksi</legend>
                            <table border="0">
                              <tr>
                                <td id="label_form">No. Transfer Aset</td>
                                <td id="label_form">
                                  <input name="kodeasettransfer" id="KODEASETTRANSFER" class="label_input"
                                    style="width:190px" prompt="Auto Generate" readonly>
                                </td>
                                <input type="hidden" id="IDASETTRANSFER" name="uuidasettransfer">

                              </tr>
                              <tr>
                                <td id="label_form">Tgl. Trans
                                <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date"
                                    style="width:190px"></td>
                              </tr>
                              <tr>
                                <td id="label_form">Lokasi Asal</td>
                                <td id="label_form"><input name="uuidlokasiasal" id="IDLOKASIASAL" style="width:190px">
                                </td>
                                <input type="hidden" id="KODELOKASIASAL" name="kodelokasiasal">
                              </tr>
                              <tr>
                                <td id="label_form">Lokasi Tujuan</td>
                                <td id="label_form"><input name="uuidlokasitujuan" id="IDLOKASITUJUAN"
                                    style="width:190px">
                                </td>
                                <input type="hidden" id="KODELOKASITUJUAN" name="kodelokasitujuan">
                              </tr>
                            </table>
                          </fieldset>
                        </td>
                        <td id="label_form" valign="bottom">
                          <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                            style="width:300px; height:85px" data-options="validType:'length[0, 500]'"></textarea>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </div>
            <div data-options="region:'center',border:false">
              <table id="table_data_detail" fit="true"></table>
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:35px;">
              <table id="trans_footer" width="100%">
                <tr>
                  <td colspan="2">
                    <table cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left" width="63%" id="label_form"><label style="font-weight:normal"
                            id="label_form">User Input :</label> <label id="lbl_kasir"></label> <label
                            style="font-weight:normal" id="label_form">| Tgl. Input :</label> <label
                            id="lbl_tanggal"></label></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <input type="hidden" id="data_detail" name="details">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
      <br>

      <a title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false" id='btn_simpan_modal'
        onclick="$('#window_button_simpan').window('open')"><img src="{{ asset('assets/images/simpan.png') }}"></a>

      <br><br>
      <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
        onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
    </div>
  </div>

  <div id="window_button_simpan" class="easyui-window" title="Konfirmasi" data-options="modal:true,closed:true"
    style="height:164cm;padding:15px 10px 10px 10px;top:20px">
    <center>
      <div id="button_simpan">

        <a title="Simpan" class="easyui-linkbutton button_add" id='simpan' onclick="simpan(this.id)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan</a><br><br>
        <a title="Simpan & Cetak" class="easyui-linkbutton button_add_print" id='simpan_cetak'
          onclick="simpan(this.id)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan & Cetak</a>

        <div>
    </center>
  </div>

  <div id="form_cetak" title="Preview" style="width:660px; height:450px">
    <div id="area_cetak"></div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-filter/datagrid-filter.js') }}"></script>
  <script>
    let row = null;
    let cekbtnsimpan = true;
    let INPUTHARGA;
    let LIHATHARGA;

    $(document).ready(async function() {
      await loadConfigTransferAset();
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        var UT = data.cetak;
        if (UT == 1) {
          $('#simpan_cetak').css('filter', '');
        } else {
          $('#simpan_cetak').css('filter', 'grayscale(100%)');
          $('#simpan_cetak').removeAttr('onclick');
        }
      }, false);

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
            export_excel('Faktur Transfer Aset', $("#area_cetak").html());
            return false;
          }
        }]
      }).window('close');

      var lebar = $('.panel').width();
      var tabsimpan = 50;
      var modalsimpan = 174;
      var spasi = 10;

      var left = lebar - (tabsimpan + modalsimpan) + spasi;

      $("#window_button_simpan").css({
        "width": modalsimpan
      });

      $("#window_button_simpan").window({
        collapsible: false,
        minimizable: false,
        maximizable: false,
        resizable: true,
        draggable: true,
        left: left
      });

      browse_data_lokasiasal('#IDLOKASIASAL');
      browse_data_lokasitujuan('#IDLOKASITUJUAN');

      $("#TGLTRANS").datebox();

      $("#verify").dialog({
        onOpen: function() {
          $('#verify').form('clear');
        },
        buttons: '#verify-buttons'
      }).dialog('close');

      buat_table_detail();

      @if ($mode == 'tambah')
        tambah();
      @elseif ($mode == 'ubah')
        ubah();
      @endif
    });

    async function loadConfigTransferAset() {
      try {
        const url = link_api.loadConfigTransferAset;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'Bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            kodemenu: '{{ $kodemenu }}',
          }),
        });

        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const res = await response.json();

        if (res.success) {
          INPUTHARGA = res.data.INPUTHARGA;
          LIHATHARGA = res.data.LIHATHARGA;
          $('#KODEASETTRANSFER').textbox({
            prompt: res.data.KODE == 'AUTO' ? 'Auto Generate' : '',
            readonly: res.data.KODE == 'AUTO'
          })
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        showErrorAlert(e);
      }
    }

    shortcut.add('F8', function() {
      simpan();
    });

    function before_simpan() {
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.tambah == 1) {
          $.messager.confirm('Confirm', 'Anda Yakin Akan Approve Transaksi?', function(r) {
            if (r) {
              simpan();
            }
          });
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    var idTrans = "";

    function tutup() {
      parent.tutupTab();
    }

    async function cetak(id) {
      const doc = await getCetakDocument(
        link_api.cetakTransferAset + id,
        '{{ session('TOKEN') }}',
      );
      if (doc) {
        $("#window_button_cetak").window('close');
        $("#area_cetak").html(doc);
        $("#form_cetak").window('open');
      }
    }

    async function tambah() {
      $('#form_input').form('clear');
      $('#mode').val('tambah');

      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#JENISTRANSAKSI').combobox('setValue', 'PEMBELIAN');
      $('#IDLOKASIASAL').combogrid('readonly', false);
      $('#IDLOKASITUJUAN').combogrid('readonly', false);
      idtrans = "";

      try {
        const response = await fetch(link_api.getLokasiDefault, {
          method: 'POST',
          headers: {
            'Authorization': 'Bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
        });
        if (response.ok) {
          const res = await response.json();
          if (!res.success) {
            throw new Error(res.message);
          }
          const data = res.data;
          $('#IDLOKASI').combogrid('setValue', data.uuidlokasi);
          $("#KODELOKASI").val(data.kodelokasi);
        } else {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }
      } catch (e) {
        showErrorAlert(e);
      }

      clear_plugin();
      reset_detail();
      tutupLoader();
    }

    async function ubah() {
      $(':radio:not(:checked)').attr('disabled', false);
      $('#mode').val('ubah');

      try {
        const response = await fetch(
          link_api.loadDataHeaderTransferAset, {
            method: 'POST',
            headers: {
              'Authorization': 'bearer {{ session('TOKEN') }}',
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({
              uuidasettransfer: '{{ $data }}'
            }),
          }
        );
        if (response.ok) {
          const res = await response.json();
          if (res.success) {
            row = res.data;
          } else {
            $.messager.alert('Error', res.message, 'error');
          }
        } else {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }
      } catch (e) {
        showErrorAlert(e);
      }

      if (row) {
        const statusTrans = await getStatusTrans(
          link_api.getStatusTransTransferAset,
          'bearer {{ session('TOKEN') }}', {
            uuidasettransfer: '{{ $data }}'
          }
        );
        $(".form_status").html(status_transaksi(statusTrans));

        //jika tidak punya akses input harga
        if (INPUTHARGA == 0) {
          $(':radio:not(:checked)').attr('disabled', true);
        }

        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);

        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          data = data.data;
          var UT = data.ubah;
          if (UT == 1 && statusTrans == 'I') {
            $('#btn_simpan_modal').css('filter', '');
            $('#mode').val('ubah');
          } else {
            document.getElementById('btn_simpan_modal').onclick = '';
            $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
            $('#btn_simpan_modal').removeAttr('onclick');
          }

          $("#form_input").form('load', row);
          $('#IDLOKASIASAL').combogrid('readonly');
          $('#IDLOKASITUJUAN').combogrid('readonly');

          idtrans = row.uuidasetbbm;
          load_data('{{ $data }}');
        });
      }
    }

    async function simpan(jenis_simpan) {
      $(':radio:not(:checked)').attr('disabled', false);
      var mode = $("#mode").val();

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      $('#window_button_simpan').window('close');

      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }

      const data = $("#form_input :input").serializeArray();
      const payload = {};
      for (var i = 0; i < data.length; i++) {
        if (typeof data[i].value === 'string' && data[i].name.startsWith('details')) {
          data[i].value = JSON.parse(data[i].value);
        }
        payload[data[i].name] = data[i].value;
      }
      payload['jenis_simpan'] = jenis_simpan;

      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        cekbtnsimpan = false;
        try {
          tampilLoaderSimpan();
          const response = await fetch(
            link_api.simpanTransferAset, {
              method: 'POST',
              headers: {
                'Authorization': 'Bearer {{ session('TOKEN') }}',
                'Content-Type': 'application/json',
              },
              body: JSON.stringify(payload),
            }
          );
          cekbtnsimpan = true;
          if (response.ok) {
            const res = await response.json();
            if (res.success) {
              $.messager.show({
                title: 'Info',
                msg: 'Transaksi Sukses',
                showType: 'show'
              });

              if (mode == 'tambah') {
                tambah();
              } else {
                ubah();
              }

              if (jenis_simpan == 'simpan_cetak') {
                cetak(res.data.uuidasettransfer);
              }
            } else {
              $.messager.alert('Error', res.message, 'error');
            }
          } else {
            throw new Error(`HTTP error! Status: ${response.status}`);
          }
        } catch (e) {
          showErrorAlert(e);
        } finally {
          tutupLoaderSimpan();
        }
      }
    }

    function reset_detail() {
      $('#table_data_detail').datagrid('loadData', []);
    }

    async function load_data(idtrans) {
      try {
        const response = await fetch(
          link_api.loadDataTransferAset, {
            method: 'POST',
            headers: {
              'Authorization': 'Bearer {{ session('TOKEN') }}',
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({
              uuidasettransfer: idtrans
            }),
          }
        );
        if (response.ok) {
          const res = await response.json();
          if (res.success) {
            $('#table_data_detail').datagrid('loadData', res.data);
          } else {
            $.messager.alert('Error', res.message, 'error');
          }
        } else {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }
      } catch (e) {
        showErrorAlert(e);
      }
    }

    /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */

    function browse_data_lokasiasal(id) {
      $(id).combogrid({
        panelWidth: 380,
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
              width: 150,
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
          if ($('#mode').val() != '') {
            var row = $(id).combogrid('grid').datagrid('getSelected');
            if (row) {
              $("#KODELOKASIASAL").val(row.kode);
            }
            reset_detail();
          }
        }
      });
    }

    function browse_data_lokasitujuan(id) {
      $(id).combogrid({
        panelWidth: 380,
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
              width: 150,
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
          if ($('#mode').val() != '') {
            var row = $(id).combogrid('grid').datagrid('getSelected');
            if (row) {
              $("#KODELOKASITUJUAN").val(row.kode);
            }
            //reset_detail();
          }
        }
      });
    }

    var indexDetail = 0;

    function buat_table_detail() {
      var dg = '#table_data_detail';

      $(dg).datagrid({
        clickToEdit: false,
        dblclickToEdit: true,
        showFooter: true,
        singleSelect: true,
        rownumbers: true,
        data: [],
        toolbar: [{
          text: 'Tambah',
          iconCls: 'icon-add',
          handler: function() {
            var index = $(dg).datagrid('getRows').length;
            $(dg).datagrid('appendRow', {
              kodebarang: '',
            }).datagrid('gotoCell', {
              index: index,
              field: 'kodebarang'
            });
          }
        }, {
          text: 'Hapus',
          iconCls: 'icon-remove',
          handler: function() {
            $(dg).datagrid('deleteRow', indexDetail);
            hitung_grandtotal();
          }
        }],
        frozenColumns: [
          [{
              field: 'uuidasettransfer',
              hidden: true
            },
            {
              field: 'uuidasettransferdtl',
              hidden: true
            },
            {
              field: 'uuidaset',
              hidden: true
            },
            {
              field: 'namaaset',
              title: 'Nama Aset',
              width: 190,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 560,
                  mode: 'remote',
                  required: true,
                  idField: 'uuidaset',
                  textField: 'namaaset',
                  onBeforeLoad: function(param) {
                    param.uuidlokasi = $("#IDLOKASIASAL").combogrid('getValue');
                    param.tgltrans = $("#TGLTRANS").datebox('getValue');
                  },
                  columns: [
                    [{
                        field: 'uuidaset',
                        hidden: true
                      },
                      {
                        field: 'namaaset',
                        title: 'Nama',
                        width: 200
                      },
                      {
                        field: 'kodeaset',
                        title: 'Kode Aset',
                        width: 130,
                      },
                      {
                        field: 'serialnumber',
                        title: 'Serial Number',
                        width: 130,
                      },
                      {
                        field: 'spesifikasi',
                        title: 'Spesifikasi',
                        width: 200
                      },
                    ]
                  ],
                }
              }
            },
          ]
        ],
        columns: [
          [{
              field: 'kodeaset',
              title: 'Kode Aset',
              align: 'left',
              width: 130,
            },
            {
              field: 'serialnumber',
              title: 'Serial Number',
              align: 'left',
              width: 130,
            },
            {
              field: 'spesifikasi',
              title: 'Spesifikasi',
              align: 'left',
              width: 150,
            },
            {
              field: 'masamanfaat',
              title: 'Masa Manfaat',
              align: 'left',
              width: 150,
            },
            ...(LIHATHARGA == 1 ? [{
              field: 'nilaibuku',
              title: 'Nilai Buku',
              align: 'left',
              width: 150,
              formatter: format_amount
            }, ] : []),
          ]
        ],
        onClickRow: function(index, row) {
          indexDetail = index;
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);
          if (field == 'namaaset') {
            var lokasi = $("#IDLOKASIASAL").combogrid('getValue');
            var tgltrans = $("#TGLTRANS").datebox('getValue');

            if (lokasi != null) {
              ed.combogrid('grid').datagrid('options').url = link_api.browseAsetTransferAset;
              ed.combogrid('grid').datagrid('load', {
                q: ''
              });
              ed.combogrid('showPanel');
            }
          }
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data_detail', index, cell.field);
          var row_update = {};

          switch (cell.field) {
            case 'namaaset':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var idaset = data ? data.uuidaset : '';
              var idasettransfer = data ? data.uuidasettransfer : '';
              var idasettransferdtl = data ? data.uuidasettransferdtl : '';
              var namaaset = data ? data.namaaset : '';
              var kodeaset = data ? data.kodeaset : '';
              var serialnumber = data ? data.serialnumber : '';
              var spesifikasi = data ? data.spesifikasi : '';
              var masamanfaat = data ? data.masamanfaat : '';
              var nilaibuku = 0;

              if (LIHATHARGA == 1) {
                nilaibuku = data ? data.nilaibuku : '';
              }

              row_update = {
                uuidasettransfer: idasettransfer,
                uuidasettransferdtl: idasettransferdtl,
                uuidaset: idaset,
                namaaset: namaaset,
                kodeaset: kodeaset,
                serialnumber: serialnumber,
                spesifikasi: spesifikasi,
                masamanfaat: masamanfaat,
                nilaibuku: nilaibuku,
              };

              break;
          }
          if (jQuery.isEmptyObject(row_update) == false) {
            $(this).datagrid('updateRow', {
              index: index,
              row: row_update
            });
          }
        },
        onLoadSuccess: function(data) {},
        onAfterDeleteRow: function(index, row) {},
        onAfterEdit: function(index, row, changes) {},
        onSelectCell: function(index, field) {}
      }).datagrid('enableCellEditing');
    }

    function clear_plugin() {
      $('.combogrid-f').each(function() {
        $(this).combogrid('grid').datagrid('load', {
          q: ''
        });
      });

      $('.number').numberbox('setValue', 0);
      $("#TGLTRANS").datebox('setValue', date_format());
    }
  </script>
@endpush
