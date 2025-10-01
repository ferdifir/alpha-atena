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
            <div data-options="region:'north',border:false" style="width:100%; height:120px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>
              <input type="hidden" id="mode" name="mode">
              <input type="hidden" name="tglentry">
              <table width="100%">
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td valign="top">
                          <fieldset style="height:100px;">
                            <legend id="label_laporan">Info Transaksi</legend>
                            <table border="0">
                              <tr>
                                <td id="label_form">No. Penghapusan Aset</td>
                                <td id="label_form"><input name="kodeasethapus" id="KODEASETHAPUS" class="label_input"
                                    style="width:190px">
                                  <input type="hidden" id="IDASETHAPUS" name="uuidasethapus">
                                </td>
                              </tr>
                              <tr>
                                <td id="label_form">Lokasi</td>
                                <td id="label_form"><input name="uuidlokasi" id="IDLOKASI" style="width:190px"></td>
                                <input type="hidden" id="KODELOKASI" name="kodelokasi">
                              </tr>
                              <tr>
                                <td id="label_form">Tgl. Trans
                                <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date"
                                    style="width:190px" required></td>
                                <input type="hidden" id="TXTTANGGAL" name="txttanggal">
                              </tr>
                            </table>
                          </fieldset>
                        </td>
                        <td id="label_form" valign="bottom">
                          <label hidden>Tanggal Transaksi Tidak Boleh Lompat Dari Tanggal Susut Terakhir</label>
                          <label hidden>Tanggal Penghapusan Yang Diijinkan, Harus Periode</label><br>
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
                        <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input
                            :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">|
                            Entry Tgl. Transaksi :</label> <label id="lbl_tanggal"></label></td>
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
    var cekbtnsimpan = true;

    $(document).ready(async function() {
      await loadConfigPenghapusanAset();
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        var UT = data.cetak;
        if (UT == 1) {
          $('#simpan_cetak').css('filter', '');
        } else {
          $('#simpan_cetak').css('filter', 'grayscale(100%)');
          $('#simpan_cetak').removeAttr('onclick');
        }
      });

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
            export_excel('Faktur Penghapusan Aset', $("#area_cetak").html());
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

      browse_data_lokasi('#IDLOKASI', 'lokasi');

      $("#TGLTRANS").datebox({
        onChange: function() {
          //if($("#TGLTRANS").datebox("getValue") != $("#TXTTANGGAL").val() && $("#TXTTANGGAL").val() != ""){
          if ($("#TXTTANGGAL").val() != "") {
            $("#TGLTRANS").datebox("setValue", $("#TXTTANGGAL").val());
            $.messager.alert('Error', 'Tanggal Tidak Dapat Diganti, Data Detail TIdak Kosong', 'error');
          }
        },
      });

      buat_table_detail();

      @if ($mode == 'tambah')
        tambah();
      @elseif ($mode == 'ubah')
        ubah();
      @endif
    });

    async function loadConfigPenghapusanAset() {
      try {
        const response = await fetch(
          link_api.loadConfigPenghapusanAset, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer {{ session('TOKEN') }}'
            },
            body: JSON.stringify({
              kodemenu: '{{ $kodemenu }}'
            })
          }
        );

        if (response.ok) {
          const res = await response.json();
          if (!res.success) {
            throw new Error(res.message);
          }

          $('#KODEASETHAPUS').textbox({
            prompt: res.data.KODE == 'AUTO' ? 'Auto Generate' : '',
            readonly: res.data.KODE == 'AUTO'
          })
        } else {
          throw new Error('Http Error: ' + response.status);
        }
      } catch (e) {
        showErrorAlert(e);
      }
    }

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    async function cetak(id) {
      const doc = await getCetakDocument(
        link_api.cetakPenghapusanAset + id,
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
      $('#IDLOKASI').combogrid('readonly', false);
      $('#TGLTRANS').datebox('readonly', false);
      idtrans = "";

      try {
        const response = await fetch(
          link_api.getLokasiDefault, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer {{ session('TOKEN') }}'
            },
          }
        );

        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const res = await response.json();
        if (res.success) {
          $('#IDLOKASI').combogrid('setValue', res.data.uuidlokasi);
          $("#KODELOKASI").val(res.data.kodelokasi);
        } else {
          throw new Error(res.message);
        }
      } catch (e) {
        showErrorAlert(e);
      }

      clear_plugin();
      reset_detail();
      tutupLoader();
    }

    async function ubah() {
      $('#mode').val('ubah');

      if (row) {
        const status = await getStatusTrans(
          link_api.getStatusTransPenghapusanAset,
          'Bearer {{ session('TOKEN') }}', {
            uuidasethapus: row.uuidasethapus
          }
        );
        $(".form_status").html(status_transaksi(status));
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          var UT = data.ubah;

          if (UT == 1 && status == 'I') {
            $('#btn_simpan_modal').css('filter', '');
            $('#mode').val('ubah');
          } else {
            $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
            $('#btn_simpan_modal').removeAttr('onclick');
          }
          $("#form_input").form('load', row);
          $('#IDLOKASI').combogrid('readonly');
          $('#TGLTRANS').datebox('readonly');

          load_data(row.uuidasethapus);
          $('#lbl_kasir').html(row.userbuat);
          $('#lbl_tanggal').html(row.tglentry);
        });
      }
    }

    async function simpan(jenis_simpan) {
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
      for (let i = 0; i < data.length; i++) {
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
            link_api.simpanPenghapusanAset, {
              method: 'POST',
              headers: {
                'Authorization': 'Bearer {{ session('TOKEN') }}',
                'Content-Type': 'application/json',
              },
              body: JSON.stringify(payload)
            }
          );
          cekbtnsimpan = true;
          if (response.ok) {
            const res = await response.json();
            if (!res.success) {
              $.messager.alert('Error', res.message, 'error');
              return;
            }

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
            parent.reload();
            if (jenis_simpan == 'simpan_cetak') {
              cetak(res.data.uuidasethapus);
            }
          } else {
            throw new Error('Http Error: ' + response.status);
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
          link_api.loadDataPenghapusanAset, {
            method: 'POST',
            headers: {
              'Authorization': 'bearer {{ session('TOKEN') }}',
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({
              uuidasethapus: idtrans
            }),
          }
        );

        if (response.ok) {
          const res = await response.json();
          if (!res.success) {
            throw new Error(res.message);
          }

          $('#table_data_detail').datagrid('loadData', res.data);
        } else {
          throw new Error('Http Error: ' + response.status);
        }
      } catch (e) {
        showErrorAlert(e);
      }
    }

    function browse_data_lokasi(id, table) {
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
              $("#KODELOKASI").val(row.kode);
            }
            reset_detail();
          }
        }
      });
    }

    var indexDetail = 0; // UNTUK TOMBOL EDIT

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
              field: 'uuidaset',
              hidden: true
            },
            {
              field: 'namaaset',
              title: 'Nama Aset',
              width: 200,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 400,
                  mode: 'remote',
                  idField: 'uuidaset',
                  textField: 'nama',
                  sortOrder: 'asc',
                  onBeforeLoad: function(param) {
                    param.uuidlokasi = $("#IDLOKASI").combogrid('getValue');
                  },
                  columns: [
                    [{
                        field: 'uuidaset',
                        hidden: true
                      },
                      {
                        field: 'nama',
                        title: 'Nama',
                        width: 200
                      },
                      {
                        field: 'kodeaset',
                        title: 'Kode Aset',
                        width: 130
                      },
                      {
                        field: 'serialnumber',
                        title: 'Serial Number',
                        width: 130
                      },
                      {
                        field: 'tglperolehan',
                        title: 'Tgl. Perolehan',
                        formatter: ubah_tgl_indo,
                        align: 'center',
                        width: 90
                      },
                      {
                        field: 'tglsusut',
                        title: 'Tgl Susut',
                        formatter: ubah_tgl_indo,
                        align: 'center',
                        width: 90
                      },
                    ]
                  ],
                }
              }
            },
            {
              field: 'kodeaset',
              title: 'Kode Aset',
              width: 130,
            },
          ]
        ],
        columns: [
          [{
              field: 'serialnumber',
              title: 'Serial Number',
              width: 130,
            },
            {
              field: 'satuan',
              title: 'Satuan',
              width: 50,
              align: 'center'
            },
            {
              field: 'masamanfaat',
              title: 'Masa Manfaat',
              align: 'right',
              width: 100,
              formatter: format_amount,
            },
            {
              field: 'tglperolehan',
              title: 'Tgl. Perolehan',
              width: 100,
              formatter: ubah_tgl_indo,
              align: 'center',
            },
            {
              field: 'tglsusut',
              title: 'Tgl. Susut',
              width: 100,
              formatter: ubah_tgl_indo,
              align: 'center',
            },
            {
              field: 'nilaiperolehan',
              title: 'Nilai Perolehan',
              align: 'right',
              width: 120,
              formatter: format_amount,
            },
            {
              field: 'penyusutan',
              title: 'Nilai Penyusutan',
              align: 'right',
              width: 120,
              formatter: format_amount,
            },
            {
              field: 'nilaibuku',
              title: 'Nilai Buku',
              align: 'right',
              width: 120,
              formatter: format_amount,
            },
          ]
        ],
        onClickRow: function(index, row) {
          indexDetail = index;
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);

          if (field == 'namaaset') {
            ed.combogrid('grid').datagrid('options').url = link_api.browseAsetPenghapusanAset;
            ed.combogrid('grid').datagrid('load', {
              q: ''
            });
            ed.combogrid('showPanel');
          }
        },
        onEndEdit: async function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data_detail', index, cell.field);
          var row_update = {};

          switch (cell.field) {
            case 'namaaset':
              var data = ed.combogrid('grid').datagrid('getSelected');
              var tgltrans = $("#TGLTRANS").datebox('getValue');

              var id = data ? data.uuidaset : '';
              var nama = data ? data.nama : '';
              var kode = data ? data.kodeaset : '';
              var serialnumber = data ? data.serialnumber : '';
              var satuan = data ? data.satuan : '';
              var masamanfaat = data ? data.masamanfaat : '';
              var tglperolehan = data ? data.tglperolehan : '';
              var tglsusut = data ? data.tglsusut : '';
              var nilaiperolehan = data ? data.nilaiperolehan : '';
              var penyusutan = data ? data.penyusutan : 0;
              var nilaibuku = data ? data.nilaibuku : 0;

              try {
                const response = await fetch(
                  link_api.hitungNilaiAsetPenghapusanAset, {
                    method: 'POST',
                    headers: {
                      'Authorization': 'bearer {{ session('TOKEN') }}',
                      'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                      uuidaset: id,
                      tgltrans: tgltrans
                    }),
                  }
                );
                if (!response.ok) {
                  throw new Error(`HTTP error! Status: ${response.status}`);
                }
                const res = await response.json();
                if (res.success) {
                  penyusutan = res.data.penyusutan;
                  row_update = {
                    uuidaset: id,
                    namaaset: nama,
                    kodeaset: kode,
                    serialnumber: serialnumber,
                    satuan: satuan,
                    masamanfaat: masamanfaat,
                    tglperolehan: tglperolehan,
                    tglsusut: tglsusut,
                    nilaiperolehan: nilaiperolehan,
                    penyusutan: penyusutan,
                    nilaibuku: nilaibuku,
                  };
                  $("#TXTTANGGAL").val(tgltrans);
                }
              } catch (e) {
                showErrorAlert(e);
              }
              break;
          }

          if (jQuery.isEmptyObject(row_update) == false) {
            $(this).datagrid('updateRow', {
              index: index,
              row: row_update
            });
          }
          hitung_grandtotal();
        },
        onLoadSuccess: function(data) {
          hitung_grandtotal();
        },
        onAfterDeleteRow: function(index, row) {
          hitung_grandtotal();
          if ($(dg).datagrid('getData').total == 0) {
            $("#TXTTANGGAL").val("");
          }
        },
        onAfterEdit: function(index, row, changes) {}
      }).datagrid('enableCellEditing');
    }

    function hitung_grandtotal() {
      var data = $("#table_data_detail").datagrid('getRows');

      var footer = {
        nilaiperolehan: 0,
        penyusutan: 0,
        nilaibuku: 0,
      }

      for (var i = 0; i < data.length; i++) {
        footer.nilaiperolehan += parseFloat(data[i].nilaiperolehan);
        footer.penyusutan += parseFloat(data[i].penyusutan);
        footer.nilaibuku += parseFloat(data[i].nilaibuku);
      }

      $('#table_data_detail').datagrid('reloadFooter', [footer]);
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
