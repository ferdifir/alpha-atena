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
            <div data-options="region:'north',border:false" style="width:100%; height:140px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>
              <table>
                <input type="hidden" id="mode" name="mode">
                <input type="hidden" id="tglentry" name="tglentry">
                <tr>
                  <td valign="top">
                    <fieldset style="height:120px;">
                      <legend id="label_laporan">Info Transaksi</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form">No. Penyesuaian Stok</td>
                          <td id="label_form">
                            <input name="kodepenyesuaianstok" id="KODEPENYESUAIANSTOK" class="label_input"
                              style="width:190px">
                            <input type="hidden" id="IDPENYESUAIANSTOK" name="uuidpenyesuaianstok">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Lokasi</td>
                          <td id="label_form">
                            <input name="uuidlokasi" id="IDLOKASI" style="width:190px">
                          </td>
                          <input type="hidden" id="KODELOKASI" name="kodelokasi">
                        </tr>
                        <tr>
                          <td id="label_form">No. Opname Stok</td>
                          <td id="label_form">
                            <input name="uuidopnamestok" id="IDOPNAMESTOK" class="label_input" style="width:190px">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Tgl. Trans</td>
                          <td id="label_form">
                            <input name="tgltrans" id="TGLTRANS" class="date" style="width:190px">
                          </td>
                        </tr>
                      </table>
                      </legend>
                  </td>
                  <td valign="bottom">
                    <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                      style="width:300px; height:85px" data-options="validType:'length[0, 500]'"></textarea>
                  </td>
                </tr>
              </table>
            </div>
            <div data-options="region:'center',border:false">
              <table id="table_data_detail" fit="true"></table>
              <input type="hidden" id="data_detail" name="data_detail">
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:35px;">
              <table cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left" id="label_form">
                    <label style="font-weight:normal" id="label_form">User :</label>
                    <label id="lbl_kasir"></label>
                    <label style="font-weight:normal" id="label_form">| Entry Tgl. Transaksi :</label>
                    <label id="lbl_tanggal"></label>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
      <br>
      <a title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false" id='btn_simpan_modal'
        onclick="$('#window_button_simpan').window('open')">
        <img src="{{ asset('assets/images/simpan.png') }}">
      </a>
      <br><br>
      <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false" onclick="javascript:tutup()">
        <img src="{{ asset('assets/images/cancel.png') }}">
      </a>
    </div>
  </div>

  <div id="window_button_simpan" class="easyui-window" title="Konfirmasi" data-options="modal:true,closed:true"
    style="height:164cm;padding:15px 10px 10px 10px;top:20px">
    <center>
      <div id="button_simpan">
        <a title="Simpan" class="easyui-linkbutton button_add" id='simpan' onclick="simpan(this.id)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan</a>
        <br><br>
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
  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}">
  </script>
  <script type="text/javascript" src="{{ asset('assets/js/jquery.mask.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/utils.js') }}"></script>
  <script>
    var cekbtnsimpan = true;
    var hargabeliterakhir;
    var inputharga;
    var kodepenyesuaianstok;
    $(document).ready(async function() {
      try {
        hargabeliterakhir = await fetchData(link_api.getConfig, {
          modul: 'TPENYESUAIANSTOK',
          config: 'HARGABELITERAKHIR'
        });
        inputharga = await fetchData(link_api.getDataAkses, {
          kodemenu: '{{ $kodemenu }}',
        });
        kodepenyesuaianstok = await fetchData(link_api.getConfig, {
          modul: 'TPENYESUAIANSTOK',
          config: 'KODEPENYESUAIANSTOK'
        });
      } catch (e) {
        const error = typeof e === "string" ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert("Error", textError, "error");
      }

      $('#KODEPENYESUAIANSTOK').textbox({
        readonly: kodepenyesuaianstok.data.value == 'AUTO',
        prompt: kodepenyesuaianstok.data.value == 'AUTO' ? 'Auto Generate' : '',
      });

      //TAMBAH CHECK AKSES CETAK
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
            export_excel('Faktur Penyesuaian Stok', $("#area_cetak").html());
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

      browse_data_opnamestok('#IDOPNAMESTOK')
      browse_data_lokasi('#IDLOKASI');
      buat_table_detail();

      if ("{{ $mode }}" == "tambah") {
        tambah();
        tutupLoader();
      } else if ("{{ $mode }}" == "ubah") {
        ubah();
      }


    })

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    async function getCetakDocument(url) {
      try {
        const response = await fetchData(url, null, false);
        return response;
      } catch (e) {
        const error = typeof e === "string" ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert("Error", textError, "error");
        return null;
      }
    }

    function cetak(id) {
      const url = link_api.cetakInventoryPenyesuaianStok + id;
      const document = getCetakDocument(url);
      if (document == null) {
        return;
      }
      $("#window_button_cetak").window('close');
      $("#area_cetak").html(document);
      $("#form_cetak").window('open');
    }

    function tambah() {
      $('#mode').val('tambah');

      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#IDLOKASI').combogrid('readonly', false);
      idtrans = "";

      fetchData(
        link_api.getLokasiDefault,
      ).then(res => {
        if (res.success && res.data.uuidlokasi != null) {
          $('#IDLOKASI').combogrid('setValue', res.data.uuidlokasi);
          $("#KODELOKASI").val(res.data.kodelokasi);
        }
      }).catch(err => {
        const error = (typeof err === 'string') ? err : err.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      });

      clear_plugin();
      reset_detail();
    }

    async function ubah() {
      $('#mode').val('ubah');

      try {
        const response = await fetchData(link_api.loadDataHeaderInventoryPenyesuaianStok, {
          uuidpenyesuaianstok: "{{ $data }}"
        });
        if (!response.success) {
          throw response.message;
        }
        row = response.data;
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
        return;
      }

      if (row) {
        get_status_trans(
          '{{ session('TOKEN') }}',
          "atena/inventori/penyesuaian-stok",
          'uuidpenyesuaianstok',
          row.uuidpenyesuaianstok,
          function(data) {
            data = data.data;
            $(".form_status").html(status_transaksi(data.status));
          });

        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          data = data.data;
          var UT = data.ubah;
          get_status_trans('{{ session('TOKEN') }}', "atena/inventori/penyesuaian-stok", 'uuidpenyesuaianstok', row
            .uuidpenyesuaianstok,
            function(data) {
              data = data.data;
              if (UT == 1 && data.status == 'I') {
                $('#btn_simpan_modal').css('filter', '');
                $('#mode').val('ubah');
              } else {
                document.getElementById('btn_simpan_modal').onclick = '';
                $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                $('#btn_simpan_modal').removeAttr('onclick');
              }
              $("#form_input").form('load', row);
              $('#IDLOKASI').combogrid('readonly');
              $('#IDOPNAMESTOK').combogrid('readonly');
              $('#IDOPNAMESTOK').combogrid('setValue', {
                uuidopnamestok: row.uuidopnamestok,
                kodeopnamestok: row.kodeopnamestok
              });

              idtrans = row.uuidpenyesuaianstok;
              load_data(row.uuidpenyesuaianstok);

              $('#lbl_kasir').html(row.userentry);
              $('#lbl_tanggal').html(row.tglentry);
            });
        });
      }
    }

    async function simpan(jenis_simpan) {
      var mode = $("#mode").val();

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      $('#window_button_simpan').window('close');
      // cek detail transaksi apakah ada barang yang sama, maka munculkan warning
      if (isValid) {
        var barang = [];
        var rows = $('#table_data_detail').datagrid('getRows');
        for (var i = 0; i < rows.length; i++) {
          var kode = rows[i].kodebarang;
          if ($.inArray(kode, barang) == -1) { // not found
            barang.push(kode);
          } else {
            $.messager.alert('Error', 'Ada Barang Yang Terinput 2x<br>Cek Barang ' + kode, 'error');
            isValid = false;
            break;
          }
        }
      }

      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }

      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        cekbtnsimpan = false;
        const data = $("#form_input :input").serializeArray();
        const payload = {};
        data.forEach((item) => {
          payload[item.name] = item.value;
          if (item.name == 'data_detail') {
            payload[item.name] = JSON.parse(item.value);
          }
        });
        payload['jenis_simpan'] = jenis_simpan;
        try {
          tampilLoaderSimpan();
          const response = await fetchData(link_api.simpanInventoryPenyesuaianStok, payload);
          cekbtnsimpan = true;
          if (!response.success) {
            throw new Error(response.message || 'Gagal menyimpan data');
          }
          $('#form_input').form('clear');
          $.messager.alert('Info', 'Transaksi Sukses', 'info');
          if (mode == 'ubah') {
            ubah();
          } else {
            tambah();
          }
          if (jenis_simpan == 'simpan_cetak') {
            cetak(response.data.uuidpenyesuaianstok);
          }
        } catch (e) {
          const error = typeof e === "string" ? e : e.message;
          const textError = getTextError(error);
          $.messager.alert("Error", textError, "error");
        } finally {
          tutupLoaderSimpan();
        }
      }
    }

    function reset_detail() {
      $('#table_data_detail').datagrid('loadData', []);
      $('#table_data_detail_po').datagrid('loadData', []);
    }

    async function load_data(idtrans) {
      try {
        const response = await fetchData(link_api.loadDataInventoryPenyesuaianStok, {
          uuidpenyesuaianstok: idtrans
        });
        if (!response.success) {
          throw new Error(response.message || 'Gagal mengambil data');
        }
        $('#table_data_detail').datagrid('loadData', response.data);
        var rows = response.data;
        for (var i = 0; i < rows.length; i++) {
          hitung_subtotal_detail(i, rows[i])
        }
        hitung_grandtotal();
      } catch (e) {
        const error = typeof e === "string" ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }

    /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */
    function browse_data_lokasi(id, table) {
      $(id).combogrid({
        panelWidth: 400,
        url: link_api.browseLokasi,
        idField: 'uuidlokasi',
        textField: 'nama',
        mode: 'local',
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
          if ($('#mode').val() != '') {
            reset_detail();
          }
        },
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');

          if (row) {
            if ($('#mode').val() != '') {
              //   ubah_url_combogrid($('#IDOPNAMESTOK'), link_api.browseOpnameStok + row.uuidlokasi, true);
              $('#IDOPNAMESTOK').combogrid('grid').datagrid('options').url = link_api.browseOpnameStok;
              $('#IDOPNAMESTOK').combogrid('clear');
              $('#IDOPNAMESTOK').combogrid('grid').datagrid('load', {
                uuidlokasi: row.uuidlokasi,
                q: ''
              });
            }
          }
          //   else {
          // ubah_url_combogrid($('#IDOPNAMESTOK'), 'config/combogrid.php', true);
          // $('#IDOPNAMESTOK').combogrid('grid').datagrid('options').url = 'config/combogrid.php';
          // $('#IDOPNAMESTOK').combogrid('clear');
          // $('#IDOPNAMESTOK').combogrid('grid').datagrid('load', {
          //   q: ''
          // });
          //   }
          if ($('#mode').val() != '') {
            reset_detail();
          }
        },
      });
    }

    function browse_data_opnamestok(id) {
      $(id).combogrid({
        panelWidth: 510,
        idField: 'uuidopnamestok',
        textField: 'kodeopnamestok',
        sortName: 'kodeopnamestok',
        sortOrder: 'desc',
        mode: 'remote',
        data: [],
        columns: [
          [{
              field: 'uuidopnamestok',
              hidden: true
            },
            {
              field: 'kodeopnamestok',
              title: 'No. Opname Stok',
              width: 120,
              sortable: true
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
              field: 'catatan',
              title: 'Catatan',
              width: 250,
              sortable: true
            },
          ]
        ],
        onSelect: function(index, row) {
          //$(id).combogrid('options').onChange.call();
        },
        onChange: function() {
          var row = $(id).combogrid('grid').datagrid('getSelected');

          if (row && $('#mode').val() != '') {
            fetchData(link_api.loadDataOpnamePenyesuaian, {
              uuidopnamestok: row.uuidopnamestok
            }).then(res => {
              if (res.success) {
                $('#table_data_detail').datagrid('loaded');
                $('#table_data_detail').datagrid('loadData', res.data.detail);
                var rows = res.data.detail;
                for (var i = 0; i < rows.length; i++) {
                  hitung_subtotal_detail(i, rows[i])
                }
                hitung_grandtotal();
                var dg = $('#table_data_detail').datagrid('options');
                dg.RowAdd = false;
                dg.RowDelete = false;
                dg.RowEdit = true;
                $('#TGLTRANS').datebox('setValue', row.tgltrans).datebox('readonly');
              } else {
                $.messager.alert('Error', res.message, 'error');
              }
            }).catch(err => {
              const error = typeof err === 'string' ? err : err.message;
              $.messager.alert('Error', getTextError(error), 'error');
            });
          } else {
            var dg = $('#table_data_detail').datagrid('options');
            dg.RowAdd = true;
            dg.RowDelete = true;
            dg.RowEdit = true;

            $('#TGLTRANS').datebox('readonly', false);
            reset_detail();
          }
        },
      });
    }

    function getRowIndex(target) {
      var tr = $(target).closest('tr.datagrid-row');
      return parseInt(tr.attr('datagrid-row-index'));
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
              subtotal: 0,
              selisih: 0,
            }).datagrid('gotoCell', {
              index: index,
              field: 'kodebarang'
            });

            // getRowIndex(target);
          }
        }, {
          text: 'Hapus',
          iconCls: 'icon-remove',
          handler: function() {
            $(dg).datagrid('deleteRow', indexDetail);
            hitung_grandtotal();
          }
        }],
        columns: [
          [{
              field: 'uuidbarang',
              hidden: true
            },
            {
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 85,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 670,
                  mode: 'remote',
                  required: true,
                  idField: 'kode',
                  textField: 'kode',
                  onBeforeLoad: function(param) {
                    if ('undefined' === typeof param.q || param.q.length == 0) {
                      return false;
                    }
                  },
                  columns: [
                    [{
                        field: 'uuidbarang',
                        hidden: true
                      },
                      {
                        field: 'kode',
                        title: 'Kode',
                        width: 100
                      },
                      {
                        field: 'nama',
                        title: 'Nama',
                        width: 250
                      },
                      {
                        field: 'satuan',
                        title: 'Satuan',
                        width: 60
                      },
                      {
                        field: 'barcodesatuan1',
                        title: 'Barcode Sat. 1',
                        width: 120
                      },
                      {
                        field: 'partnumber',
                        title: 'Part Number',
                        width: 120
                      },
                      {
                        field: 'namamerk',
                        title: 'Merk',
                        width: 100
                      },
                      {
                        field: 'hargabeli',
                        title: 'Harga Beli',
                        align: 'right',
                        width: 80,
                        formatter: format_amount
                      },
                      {
                        field: 'kategori',
                        title: 'Kategori',
                        width: 200
                      },
                    ]
                  ],
                }
              }
            },
            {
              field: 'namabarang',
              title: 'Nama',
              width: 270,
            },
            @if (session('SHOWBARCODE') == 'YA')
              {
                field: 'barcodesatuan1',
                title: 'Barcode Sat. 1',
                width: 120
              },
            @endif
            @if (session('SHOWPARTNUMBER') == 'YA')
              {
                field: 'partnumber',
                title: 'Part Number',
                width: 120
              },
            @endif {
              field: 'jml',
              title: 'Jml Opname',
              align: 'right',
              width: 80,
              formatter: format_qty
            },
            {
              field: 'selisih',
              title: 'Selisih',
              align: 'right',
              width: 60,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
                options: {
                  required: true,
                  precision: 2
                }
              }
            },
            {
              field: 'satuan_lama',
              title: 'Satuan',
              width: 45,
              align: 'center',
              hidden: true
            },
            {
              field: 'satuan',
              title: 'Satuan',
              width: 50,
              align: 'center',
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 100,
                  panelHeight: 130,
                  mode: 'local',
                  required: true,
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
              field: 'harga',
              title: 'Harga',
              align: 'right',
              width: 85,
              formatter: format_amount
            },
            {
              field: 'subtotal',
              title: 'Subtotal',
              align: 'right',
              width: 95,
              formatter: format_amount,
              editor: inputharga.data.inputharga == 1 ? {
                type: 'numberbox',
                options: {
                  required: true
                }
              } : null,
            },
          ]
        ],
        onClickRow: function(index, row) {
          indexDetail = index;
        },
        onBeforeCellEdit: function(index, field) {
          if (field == 'kodebarang' && $("#IDOPNAMESTOK").combogrid('getValue') != '') {
            return false;
          }
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);

          if (field == 'satuan') {
            ed.combogrid('grid').datagrid('options').url = link_api.loadSatuanBarang;
            ed.combogrid('grid').datagrid('load', {
              q: '',
              uuidbarang: row.uuidbarang
            });
            ed.combogrid('showPanel');
          } else if (field == 'kodebarang') {
            ed.combogrid('grid').datagrid('options').url = link_api.browseBarang;
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
            case 'kodebarang':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidbarang : '';
              var nama = data ? data.nama : '';
              var satuan = data ? data.satuan : '';
              var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
              var partnumber = data.partnumber ? data.partnumber : '';
              var hargabeli = 0;

              if (hargabeliterakhir.data.value == 'YA') {
                hargabeli = await get_harga_barangbeli(id, satuan);
              }

              row_update = {
                uuidbarang: id,
                namabarang: nama,
                barcodesatuan1: barcodesatuan1,
                partnumber: partnumber,
                satuan_lama: satuan,
                satuan: satuan,
                jml: 0,
                harga: hargabeli
              };

              break;
            case 'satuan':
              if (hargabeliterakhir.data.value == 'YA') {
                hargabeli = await get_harga_barangbeli(row.uuidbarang, row.satuan);

                row_update = {
                  harga: hargabeli
                };
              }

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
          //hitung_grandtotal();
        },
        onAfterDeleteRow: function(index, row) {
          //hitung_grandtotal();
        },
        onAfterEdit: function(index, row, changes) {
          hitung_subtotal_detail(index, row);
          //hitung_grandtotal();
        }
      }).datagrid('enableCellEditing');
    }

    function hitung_subtotal_detail(index, row) {

      // hitung diskon lebih dahulu
      var data = {};
      var dg = $('#table_data_detail');
      var subtotal = parseFloat(row.subtotal);

      if (hargabeliterakhir.data.value == 'TIDAK') {
        if (row.selisih == 0) {
          data.harga = 0;
        } else {
          data.harga = +(Math.abs((subtotal / row.selisih)).toFixed({{ session('DECIMALDIGITAMOUNT') }}));
        }
      } else {
        data.harga = row.harga;
      }

      //DIHITUNG ULANG LAGI SUBTOTALNYA
      data.subtotal = data.harga * row.selisih;

      dg.datagrid('updateRow', {
        index: index,
        row: data
      });
      // cek jika ada barang yang sama
      var rows = dg.datagrid('getRows');

      for (var i = 0; i < rows.length; i++) {
        if (index != i && row.kodebarang == rows[i].kodebarang) {
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
        subtotal: 0,
      }
      for (var i = 0; i < data.length; i++) {
        footer.subtotal += parseFloat(data[i].subtotal);
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

      $("#TGLTRANS, #TGLKIRIM, #TGLJATUHTEMPO").datebox('setValue', date_format());
      $("#TGLJATUHTEMPO").datebox('readonly');
    }

    async function get_harga_barangbeli(idbarang, satuan) {
      var harga = 0;

      try {
        const response = await fetchData(link_api.hargaBeliTerakhir, {
          uuidbarang: idbarang,
          satuan: satuan
        });
        if (!response.success) {
          throw new Error(response.message || 'Gagal mengambil data');
        }
        harga = response.data.hargabeli;
      } catch (e) {
        const error = typeof e === 'string' ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }

      return harga;
    }

    async function fetchData(url, body, isJson = true) {
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

        if (isJson) {
          return await response.json();
        } else {
          return await response.text();
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }
  </script>
@endpush
