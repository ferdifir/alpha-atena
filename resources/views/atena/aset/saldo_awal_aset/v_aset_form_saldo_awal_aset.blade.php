@extends('template.form')

@push('css')
  <style>
    .datagrid-footer-inner .easyui-linkbutton {
      display: none;
    }
  </style>
@endpush

@section('content')
  <form id="form_input" class="easyui-layout" fit="true" enctype="multipart/form-data">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            <script>
              if (screen.height < 450) {
                $("#trans_layout").css('height', "450px");
              }
            </script>
            <div data-options="region:'north',border:false" style="width:100%; height:120px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>
              <input type="hidden" id="mode" name="mode">
              <input type="hidden" id="data_detail" name="data_detail">
              <input type="hidden" id="IDSALDOASET" name="uuidsaldoaset">
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
                              <input name="uuidperusahaan" id="IDPERUSAHAAN" type="hidden">
                              <tr>
                                <td id="label_form">No. Saldo Aset</td>
                                <td id="label_form">
                                  <input name="kodesaldoaset" id="KODESALDOASET" class="label_input" style="width:190px">
                              </tr>
                              <tr>
                                <td id="label_form">Lokasi</td>
                                <td id="label_form">
                                  <input name="uuidlokasi" id="IDLOKASI" style="width:190px">
                                </td>
                                <input type="hidden" id="KODELOKASI" name="kodelokasi">
                              </tr>
                              <tr>
                                <td id="label_form">Tgl. Trans
                                <td id="label_form">
                                  <input name="tgltrans" id="TGLTRANS" class="date" style="width:190px">
                                </td>
                              </tr>
                            </table>
                          </fieldset>
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
              <div id="fm-detail" class="easyui-tabs" plain='true' fit="true">
                <div title="Detail Transaksi">
                  <table id="table_data_detail" fit="true"></table>
                </div>
              </div>
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:35px;">
              <table id="trans_footer" width="100%">
                <tr>
                  <td colspan="2">
                    <table cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input
                            :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">|
                            Tgl. Input :</label> <label id="lbl_tanggal"></label></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
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
    </div>
  </form>

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

  <div id="window-preview-aset" class="easyui-window" title="Preview Gambar Aset"
    data-options="modal: true,closed: true" style="width: 350px; height: 350px">
    <img id="preview-image-aset" style="width: 300px;display: block;margin: 0 auto">
  </div>

  <div id="form_cetak" title="Preview" style="width:660px; height:450px">
    <div id="area_cetak"></div>
  </div>

  <input type="file" id="browse_gambar">
@endsection

@push('js')
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-filter/datagrid-filter.js') }}"></script>
  <script>
    let row = null;
    let indexDetail = null;
    let cekbtnsimpan = true;

    $(document).ready(function() {
      loadConfigSaldoAwalAset();

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
            export_excel('Faktur Saldo Awal Aset', $("#area_cetak").html());
            return false;
          }
        }]
      }).window('close');

      var lebar = $('.panel').width();
      var tabsimpan = 50;
      var modalsimpan = 174;
      var spasi = -40;

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

      browse_data_lokasi('#IDLOKASI');
      buat_table_detail();

      @if ($mode == 'tambah')
        tambah();
      @elseif ($mode == 'ubah')
        ubah();
      @endif

      $('#browse_gambar').change(function(e) {
        if ($(this)[0].files && $(this)[0].files[0]) {
          $('#table_data_detail').datagrid('updateRow', {
            index: indexDetail,
            row: {
              filegambar: $(this)[0].files[0]
            }
          });
        }
      });
    });

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    async function cetak(id) {
      $("#window_button_cetak").window('close');
      const doc = await getCetakDocument(link_api.cetakSaldoAwalAset + id, '{{ session('TOKEN') }}');
      if (doc) {
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
      $('#CATATAN').textbox('readonly', false);
      idtrans = "";

      try {
        const response = await fetch(
          link_api.getLokasiDefault, {
            method: 'POST',
            headers: {
              'Authorization': 'Bearer {{ session('TOKEN') }}',
              'Content-Type': 'application/json',
            },
          }
        );
        if (response.ok) {
          const res = await response.json();
          if (!res.success) {
            throw new Error(res.message);
          }
          const data = res.data;
          $('#IDLOKASI').combogrid('setValue', data.uuidlokasi);
          $("#KODELOKASI").val(data.kodelokasi);
        } else {
          throw new Error(res.message);
        }
      } catch (e) {
        showErrorAlert(e)
      }
      clear_plugin();
      reset_detail();
      tutupLoader();
    }

    async function ubah() {
      $('#mode').val('ubah');

      try {
        const response = await fetch(
          link_api.loadDataHeaderSaldoAwalAset, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer {{ session('TOKEN') }}'
            },
            body: JSON.stringify({
              uuidsaldoaset: '{{ $data }}'
            })
          }
        );

        if (response.ok) {
          const res = await response.json();
          if (!res.success) {
            throw new Error(res.message);
          }
          row = res.data;
        } else {
          throw new Error('Http Error: ' + response.status);
        }
      } catch (e) {
        showErrorAlert(e);
      }

      if (row) {
        const status = await getStatusTrans(
          link_api.getStatusSaldoAwalAset,
          'bearer {{ session('TOKEN') }}', {
            uuidsaldoaset: row.uuidsaldoaset
          }
        );
        $(".form_status").html(status_transaksi(status));

        get_akses_user('{{ $kodemenu }}', 'Bearer {{ session('TOKEN') }}', function(data) {
          var UT = data.data.ubah;
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
          $('#CATATAN').textbox('readonly');

          load_data(row.uuidsaldoaset);

          $('#lbl_kasir').html(row.userentry);
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

      var data = new FormData($('#form_input')[0]);

      var daftar_detail = $('#table_data_detail').datagrid('getRows');

      for (var i in daftar_detail) {
        data.append('data_gambar[' + i + ']', daftar_detail[i].filegambar);
      }

      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }

      data.set('jenis_simpan', jenis_simpan);

      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        cekbtnsimpan = false;
        try {
          tampilLoaderSimpan();
          const response = await fetch(
            link_api.simpanSaldoAwalAset, {
              method: 'POST',
              headers: {
                'Authorization': 'Bearer {{ session('TOKEN') }}',
              },
              body: data
            }
          );
          cekbtnsimpan = true;
          if (!response.ok) {
            throw new Error(response.message);
          }
          const res = await response.json();

          if (res.success) {
            $.messager.show({
              title: 'Info',
              msg: 'Transaksi Sukses',
              showType: 'show'
            });
            @if ($mode == 'tambah')
              tambah();
            @elseif ($mode == 'ubah')
              ubah();
            @endif
            if (jenis_simpan == 'simpan_cetak') {
              cetak(res.data.uuidsaldoaset);
            }
          } else {
            $.messager.alert('Error', res.message, 'warning');
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
        const response = await fetch(link_api.loadDataSaldoAwalAset, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidsaldoaset: idtrans,
          }),
        });

        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const res = await response.json();

        if (res.success) {
          $('#table_data_detail').datagrid('loadData', res.data);
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        showErrorAlert(e);
      }
    }

    /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */
    function browse_data_lokasi(id) {
      $(id).combogrid({
        panelWidth: 400,
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
        onSelect: function(index, row) {
          $("#KODELOKASI").val(row.kode);
        },
        onLoadSuccess: function(data) {
          if (data.total == 1) {
            var rows = data.rows;
            $(this).combogrid('setValue', rows[0].kode).combogrid('readonly');
          }
        },
        onChange: function(newVal, oldVal) {
          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
      });
    }

    function browse_data_supplier(id) {
      $(id).combogrid({
        panelWidth: 600,
        url: link_api.browseSupplier,
        idField: 'uuidsupplier',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        columns: [
          [{
              field: 'uuidsupplier',
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
            {
              field: 'alamat',
              title: 'Alamat',
              width: 300,
              sortable: true
            },
            {
              field: 'kota',
              title: 'Kota',
              width: 100,
              sortable: true
            },
            {
              field: 'telp',
              title: 'Telp',
              width: 100,
              sortable: true
            },
          ]
        ],
      });
    }

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
              gambar: '',
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
              field: 'uuidsupplier',
              hidden: true
            },
            {
              field: 'namaaset',
              title: 'Nama Aset',
              width: 200,
              editor: {
                type: 'textbox',
                options: {
                  required: true
                }
              }
            },
            {
              field: 'kodeaset',
              title: 'Kode Aset',
              width: 130,
              editor: {
                type: 'textbox',
                options: {
                  required: true
                }
              }
            },
          ]
        ],
        columns: [
          [{
              field: 'gambar',
              hidden: true
            },
            {
              field: 'filegambar',
              hidden: true
            },
            {
              field: 'browsegambar',
              formatter: function(val, row, index) {
                var div = $(document.createElement('div'));
                var pilih_file = $(
                  '<a  onclick="browse_gambar_aset()" class="easyui-linkbutton pilih-gambar" data-options="plain: true,iconCls:\'icon-add\'"></a>'
                );
                var preview = $('<a  onclick="preview_gambar_aset(' + index +
                  ')" class="easyui-linkbutton preview-gambar" data-options="plain: true,iconCls:\'icon-eye\'"></a>'
                );

                pilih_file.linkbutton();
                preview.linkbutton();

                div.append(pilih_file);

                if (row.gambar != '') {
                  div.append(preview);
                }

                return div.prop('outerHTML');
              },
              title: 'Gambar'
            },
            {
              field: 'serialnumber',
              title: 'Serial Number',
              width: 130,
              editor: {
                type: 'textbox',
                options: {
                  required: true
                }
              }
            },
            {
              field: 'spesifikasi',
              title: 'Spesifikasi',
              width: 200,
              editor: {
                type: 'textbox',
                options: {
                  required: true
                }
              }
            },
            {
              field: 'namasupplier',
              title: 'Supplier',
              width: 200,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 600,
                  url: link_api.browseSupplier,
                  idField: 'uuidsupplier',
                  textField: 'nama',
                  mode: 'remote',
                  sortName: 'nama',
                  sortOrder: 'asc',
                  columns: [
                    [{
                        field: 'uuidsupplier',
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
                      {
                        field: 'alamat',
                        title: 'Alamat',
                        width: 300,
                        sortable: true
                      },
                      {
                        field: 'kota',
                        title: 'Kota',
                        width: 100,
                        sortable: true
                      },
                      {
                        field: 'telp',
                        title: 'Telp',
                        width: 100,
                        sortable: true
                      },
                    ]
                  ],
                }
              }
            },
            {
              field: 'masamanfaat',
              title: 'Masa Manfaat (Bulan)',
              align: 'right',
              width: 140,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 0,
                  required: true
                }
              }
            },
            {
              field: 'nilaiperolehan',
              title: 'Nilai Perolehan',
              align: 'right',
              width: 100,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  required: true
                }
              }
            },
            {
              field: 'nilaisaatini',
              title: 'Nilai Saldo Awal',
              align: 'right',
              width: 100,
              formatter: format_amount,
              hidden: true
            },
            {
              field: 'satuan',
              title: 'Satuan',
              width: 80,
              align: 'center',
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 100,
                  panelHeight: 130,
                  mode: 'remote',
                  required: true,
                  url: link_api.loadSatuanSaldoAwalAset,
                  idField: 'satuan',
                  textField: 'satuan',
                  columns: [
                    [{
                      field: 'satuan',
                      title: 'Satuan',
                      width: 80
                    }, ]
                  ],
                }
              }
            },
            {
              field: 'statusgaransi',
              title: 'Status Garansi',
              align: 'center',
              width: 100,
              editor: {
                type: 'combobox',
                options: {
                  data: [{
                    value: 1,
                    text: 'YA'
                  }, {
                    value: 0,
                    text: 'TIDAK'
                  }],
                  panelHeight: 'auto',
                }
              },
              formatter: function(val) {
                if (val == 0) return "TIDAK";
                else if (val == 1) return "YA";
              }
            },
            {
              field: 'tglakhirgaransi',
              title: 'Tgl. Akhir Garansi',
              width: 120,
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
              field: 'tglperolehan',
              title: 'Tgl. Perolehan',
              width: 120,
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
              field: 'tglsusut',
              title: 'Tgl. Susut',
              width: 120,
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
              field: 'uuidakunaset',
              hidden: true
            },
            {
              field: 'uuidakunbiayasusut',
              hidden: true
            },
            {
              field: 'uuidakunakumulasisusut',
              hidden: true
            },
            {
              field: 'akunaset',
              title: 'Akun Aset',
              width: 150,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 380,
                  mode: 'remote',
                  required: true,
                  url: link_api.browsePerkiraan,
                  onBeforeLoad: async function(param) {
                    param.jenis = 'detail';
                    param.aktif = 1;
                  },
                  idField: 'uuidperkiraan',
                  textField: 'nama',
                  columns: [
                    [{
                        field: 'uuidperkiraan',
                        hidden: true
                      },
                      {
                        field: 'kode',
                        title: 'Kode',
                        width: 110
                      },
                      {
                        field: 'nama',
                        title: 'Nama',
                        width: 250
                      },
                    ]
                  ],
                }
              }
            },
            {
              field: 'akunbiayasusut',
              title: 'Akun Biaya Penyusutan',
              width: 250,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 380,
                  mode: 'remote',
                  required: true,
                  url: link_api.browsePerkiraan,
                  idField: 'uuidperkiraan',
                  textField: 'nama',
                  onBeforeLoad: async function(param) {
                    param.jenis = 'detail';
                    param.aktif = 1;
                  },
                  columns: [
                    [{
                        field: 'uuidperkiraan',
                        hidden: true
                      },
                      {
                        field: 'kode',
                        title: 'Kode',
                        width: 110
                      },
                      {
                        field: 'nama',
                        title: 'Nama',
                        width: 250
                      },
                    ]
                  ],
                }
              }
            },
            {
              field: 'akunakumulasisusut',
              title: 'Akun Akumulasi Penyusutan',
              width: 250,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 380,
                  mode: 'remote',
                  required: true,
                  url: link_api.browsePerkiraan,
                  onBeforeLoad: async function(param) {
                    param.jenis = 'detail';
                    param.aktif = 1;
                  },
                  idField: 'uuidperkiraan',
                  textField: 'nama',
                  columns: [
                    [{
                        field: 'uuidperkiraan',
                        hidden: true
                      },
                      {
                        field: 'kode',
                        title: 'Kode',
                        width: 110
                      },
                      {
                        field: 'nama',
                        title: 'Nama',
                        width: 250
                      },
                    ]
                  ],
                }
              }
            },
          ]
        ],
        onClickRow: function(index, row) {
          indexDetail = index;
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);

          if (field == 'satuan') {
            ed.combogrid('showPanel');
          } else if (field == 'namasupplier') {
            ed.combogrid('showPanel');
          } else if (field == 'statusgaransi') {
            ed.combogrid('showPanel');
          } else if (field == 'akunaset') {
            ed.combogrid('showPanel');
          } else if (field == 'akunbiayasusut') {
            ed.combogrid('showPanel');
          } else if (field == 'akunakumulasisusut') {
            ed.combogrid('showPanel');
          }
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data_detail', index, cell.field);
          var row_update = {};

          switch (cell.field) {
            case 'namasupplier':
              var data = ed.combogrid('grid').datagrid('getSelected');
              var id = data ? data.uuidsupplier : '';
              var nama = data ? data.nama : '';
              row_update = {
                uuidsupplier: id,
                namasupplier: nama,
              };
              break;
            case 'akunaset':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidperkiraan : '';
              var nama = data ? data.nama : '';

              row_update = {
                uuidakunaset: id,
                akunaset: nama,
              };
              break;
            case 'akunbiayasusut':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidperkiraan : '';
              var nama = data ? data.nama : '';

              row_update = {
                uuidakunbiayasusut: id,
                akunbiayasusut: nama
              };
              break;
            case 'akunakumulasisusut':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidperkiraan : '';
              var nama = data ? data.nama : '';

              row_update = {
                uuidakunakumulasisusut: id,
                akunakumulasisusut: nama
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
        onLoadSuccess: function(data) {
          hitung_grandtotal();
        },
        onAfterDeleteRow: function(index, row) {
          hitung_grandtotal();
        },
        onAfterEdit: function(index, row, changes) {
          hitung_grandtotal();
        },
        onSelectCell: function(index, field) {},
      }).datagrid('enableCellEditing');
    }

    function hitung_subtotal_detail(index, row) {
      var data = {};
      var subtotal = parseFloat(row.subtotal);
      var dg = $('#table_data_detail');
      row.jml = parseFloat(row.jml).toFixed({{ session('DECIMALDIGITQTY') }});
      data.harga = +((subtotal / row.jml).toFixed({{ session('DECIMALDIGITAMOUNT') }}));

      dg.datagrid('updateRow', {
        index: index,
        row: data
      });

      var rows = dg.datagrid('getRows');

      for (var i = 0; i < rows.length; i++) {
        if (index != i && row.kodeaset == rows[i].kodeaset) {
          $.messager.show({
            title: 'Warning',
            msg: 'Barang Yang Diinput Tidak Boleh Sama Dalam Satu Detail Transaksi',
            timeout: {{ session('TIMEOUT') }},
          });
          dg.datagrid('deleteRow', index);
          break;
        }
      }
    }

    function hitung_grandtotal() {
      var data = $("#table_data_detail").datagrid('getRows');
      var footer = {
        nilaiperolehan: 0
      }
      for (var i = 0; i < data.length; i++) {
        footer.nilaiperolehan += parseFloat(data[i].nilaiperolehan);
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
      $("#TGLJATUHTEMPO").datebox('readonly');
    }

    function browse_gambar_aset() {
      $('#browse_gambar').click();
    }

    function preview_gambar_aset(index) {
      var data = $('#table_data_detail').datagrid('getRows')[index];

      $('#preview-image-aset').attr('src', data.gambar_fullpath);
      $('#window-preview-aset').window('open');
    }

    async function loadConfigSaldoAwalAset() {
      try {
        const url = link_api.loadConfigSaldoAwalAset;
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
          const isAuto = res.data.KODE === 'AUTO';
          $('#KODESALDOASET').textbox({
            prompt: isAuto ? "Auto Generate" : "",
            readonly: isAuto,
          });
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        showErrorAlert(e);
      }
    }
  </script>
@endpush
