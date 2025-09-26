@extends('template.form')

@section('content')
  <div id="form_input" class="easyui-layout" fit="true">
    <input type="hidden" id="mode" name="mode">
    <input type="hidden" id="IDPR" name="uuidanalisispo">
    <input type="hidden" id="data_detail" name="data_detail">
    <input type="hidden" id="kodelokasi" name="kodelokasi">

    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            <script>
              if (screen.height < 450) {
                $("#trans_layout").css('height', "450px");
              }
            </script>
            <div data-options="region:'north',border:false" style="width:100%; height: 120px">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>
              <table>
                <tr>
                  <td valign="top">
                    <fieldset style="height: 100px">
                      <legend id="label_laporan">Info Transaksi</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form">No. Analisis PO</td>
                          <td id="label_form">
                            <input name="kodeanalisispo" id="kodeanalisispo" class="label_input" style="width:190px"
                              <?php if ($KODE == 'AUTO') { ?> prompt="Auto Generate" readonly <?php } ?>>
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Lokasi</td>
                          <td id="label_form">
                            <input name="idlokasi" id="idlokasi" style="width:190px">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Tgl. Trans</td>
                          <td id="label_form">
                            <input name="tgltrans" id="tgltrans" class="date" style="width:190px" required>
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td valign="top">
                    <fieldset style="height: 100px">
                      <legend>Filter</legend>

                      <table>
                        <tr>
                          <td id="label_form">Analisis Penjualan Tgl.</td>
                          <td>
                            <input class="date" name="tglawal" id="tglawal" style="width: 100px"> s/d
                            <input class="date" name="tglakhir" id="tglakhir" style="width: 100px">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Supplier</td>
                          <td>
                            <input type="text" name="idsupplier" id="idsupplier" style="width: 224px" required>
                          </td>
                        </tr>
                        <tr>
                          <td></td>
                          <td>
                            <a id="btn_tampil_barang" href="#" class="easyui-linkbutton"
                              onclick="tampil_barang(event)">Tampilkan Barang</a>
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td id="label_form" valign="bottom">
                    <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                      style="width:250px; height:85px" data-options="validType:'length[0, 500]'"></textarea>
                  </td>
                </tr>
              </table>
            </div>
            <div data-options="region:'center',border:false">
              <div class="easyui-tabs" plain='true' fit="true">
                <div title="Detail Transaksi">
                  <table id="table_data_detail" fit="true"></table>
                </div>
              </div>
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:40px;">
              <table id="trans_footer" width="100%">
                <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input :</label>
                  <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl. Input :</label>
                  <label id="lbl_tanggal"></label>
                </td>
                <td align='right' <?php if ($LIHATHARGA == 0) {
                    echo 'hidden';
                } ?>>
                  <table>
                    <tr>
                      <!-- <td id="label_form" align="right">
                                                  Grand Total <input name="grandtotal" id="GRANDTOTAL" class="number " style="width:110px;" readonly>
                                              </td> -->
                    </tr>
                  </table>
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

      <a title="Simpan" class="easyui-tooltip" data-options="plain:false" id='btn_simpan_modal'
        onclick="$('#window_button_simpan').window('open')"><img src="<?= base_url() ?>/assets/images/simpan.png"></a>

      <br>
      <br>

      <a title="Tutup" class="easyui-tooltip" data-options="plain:false" onclick="javascript:tutup()"><img
          src="<?= base_url() ?>/assets/images/cancel.png"></a>
    </div>
  </div>

  <div id="window_button_simpan" class="easyui-window" title="Konfirmasi" data-options="modal:true,closed:true"
    style="height:164cm;padding:15px 10px 10px 10px;top:20px">
    <center>
      <div id="button_simpan">

        <a title="Simpan" class="easyui-linkbutton button_add" id='simpan_saja' onclick="simpan(this.id)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan</a><br><br>
        <a title="Simpan & Cetak" class="easyui-linkbutton button_add_print" id='simpan_cetak'
          onclick="simpan(this.id)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan & Cetak</a>

      </div>
    </center>
  </div>

  <div id="form_cetak" title="Preview" style="width:660px; height:450px">
    <div id="area_cetak"></div>
  </div>

  <div id="toolbar">
    <table>
      <tr>
        <td>
          <a class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-add'"
            onclick="tambah_detail()">Tambah</a>
          <a class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-remove'"
            onclick="hapus_detail()">Hapus</a>
          <label id="label_form">Disc %</label>
          <input class="label_input" style="width: 100px" id="toolbardiscpersen">
          <a href="#" class="easyui-linkbutton" onclick="tambah_diskon(event)">Tambahkan Diskon</a>
          <a href="#" class="easyui-linkbutton" onclick="nollkan_jmlorder(event)">Nolkan Jml. Order</a>
        </td>
      </tr>
    </table>
  </div>
@endsection

@push('js')
  <script>
    var row = {};
    var indexRow = 0;
    var cekbtnsimpan = true;
    $(document).ready(function() {

      //TAMBAH CHECK AKSES CETAK
      get_akses_user('<?= $kodemenu ?>', function(data) {
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
            export_excel('Faktur Pesanan Penjualan', $("#area_cetak").html());
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

      get_status_trans("atena/Pembelian/Transaksi/AnalisisPO", row.idanalisispo, function(data) {
        $(".form_status").html(status_transaksi(data.status));
      });

      browse_data_lokasi('#idlokasi');
      browse_data_supplier('#idsupplier');

      buat_table_detail();

      if ("<?= $mode ?>" == "tambah") {
        tambah();
      } else if ("<?= $mode ?>" == "ubah") {
        ubah();
      }

      // Menghapus loading ketika halaman sudah dimuat
      setTimeout(function() {
        $('#mask-loader').fadeOut(500, function() {
          $(this).hide()
        })
      }, 250)
    })

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    function cetak(id) {
      $("#window_button_cetak").window('close');
      $("#area_cetak").load(base_url + "atena/Pembelian/Transaksi/AnalisisPO/cetak/" + id);
      $("#form_cetak").window('open');
    }

    function tambah() {
      $('#mode').val('tambah');

      parent.changeTitleTab($('#mode').val());

      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#idlokasi').combogrid('clear');

      $('#idlokasi').combogrid('readonly', false);
      $('#idsupplier').combogrid('readonly', false);

      $('#btn_tampil_barang').linkbutton('enable');

      $('#tglawal').datebox('readonly', false);
      $('#tglakhir').datebox('readonly', false);

      $('#tgltrans').datebox('readonly', false);

      $('#tgltrans').datebox('setValue', date_format(new Date));

      clear_plugin();
      reset_detail();
    }

    function ubah() {
      $('#mode').val('ubah');

      if (row) {
        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);

        get_akses_user('<?= $kodemenu ?>', function(data) {
          var UT = data.ubah;
          get_status_trans("atena/Pembelian/Transaksi/AnalisisPO", row.idanalisispo, function(data) {
            if (UT == 1 && data.status == 'I') {
              $('#btn_simpan_modal').css('filter', '');

              $('#mode').val('ubah');
            } else {
              document.getElementById('btn_simpan_modal').onclick = null;

              $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
              $('#btn_simpan_modal').removeAttr('onclick');
            }

            $("#form_input").form('load', row);

            $('#idlokasi').combogrid('readonly', true);
            $('#idsupplier').combogrid('readonly', true);

            $('#btn_tampil_barang').linkbutton('disable');

            $('#tglawal').datebox('readonly', true);
            $('#tglakhir').datebox('readonly', true);

            $('#tgltrans').datebox('readonly', true);

            idtrans = row.idanalisispo;

            load_data_detail(row.idanalisispo);
          });
        });
      }
    }

    function simpan(use) {
      $(':radio:not(:checked)').attr('disabled', false);
      var mode = $("#mode").val();
      var data = [];

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      $('#window_button_simpan').window('close');

      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }

      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        cekbtnsimpan = false;
        validasi_session(function() {
          var adaTrans = false;

          if (mode == 'ubah') {
            $.ajax({
              type: 'POST',
              dataType: 'json',
              url: base_url + 'Home/cekTanggalJamInput',
              data: {
                id: row.idanalisispo,
                table: "tanalisispo",
                whereid: "idanalisispo",
                tgl: row.tglentry,
                status: row.status
              },
              async: false,
              success: function(msg) {
                cekbtnsimpan = true;
                if (!msg.success) {
                  var errorMsg =
                    'Sudah Terdapat Perubahan Data Atas Transaksi Ini Yang Dilakukan Pada Tanggal ' + msg.tgl +
                    ' / ' + msg.jam + '.<br>Transaksi Tidak Dapat Disimpan.';
                  $.messager.alert('Warning', errorMsg, 'warning');
                  adaTrans = true;
                }
              }
            });
          }

          cek_tanggal_tutup_periode($('#tgltrans').datebox('getValue'), 0, function(data) {
            cekbtnsimpan = true;
            if (!data.success) {
              var kode = row.kodeanalisispo ? row.kodeanalisispo : 'ini';

              $.messager.alert('Error', 'Sudah dilakukan tutup periode pada tanggal transaksi untuk no ' + kode +
                '. Prosedur tidak dapat dilanjutkan', 'error');

              adaTrans = true;
            }
          });

          if (!adaTrans) {
            $.ajax({
              type: 'POST',
              dataType: 'json',
              url: base_url + "atena/Pembelian/Transaksi/AnalisisPO/simpan/" + use,
              data: datanya,
              cache: false,
              beforeSend: function() {
                $.messager.progress();
              },
              success: function(msg) {
                $.messager.progress('close');
                cekbtnsimpan = true;

                if (msg.success) {
                  $('#form_input').form('clear');

                  $.messager.show({
                    title: 'Info',
                    msg: 'Transaksi Sukses',
                    showType: 'show'
                  });

                  tambah();

                  parent.reload();

                  if (use == 'simpan_cetak') {
                    cetak(msg.id);
                  }
                } else {
                  $.messager.alert('Error', msg.errorMsg, 'error');
                }
              }
            });
          }
        });
      }
    }

    function cetak(idanalisispo) {
      $("#window_button_cetak").window('close');
      $("#area_cetak").load(base_url + "atena/Pembelian/Transaksi/AnalisisPO/cetak/" + idanalisispo);
      $("#form_cetak").window('open');
    }

    function reset_detail() {
      $('#table_data_detail').datagrid('loadData', []);
    }

    function load_data_detail(idtrans) {
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: base_url + "atena/Pembelian/Transaksi/AnalisisPO/loadData",
        data: {
          idtrans: idtrans
        },
        cache: false,
        success: function(msg) {
          if (msg.success) {
            $('#table_data_detail').datagrid('loadData', msg.detail);

            for (var i = 0; i < msg.detail.length; i++) {
              hitung_subtotal_detail(i, msg.detail[i])
            }

            hitung_grandtotal();
          }
        }
      });
    }

    /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */
    function browse_data_lokasi(id) {
      $(id).combogrid({
        panelWidth: 380,
        url: base_url + 'atena/Master/Data/Lokasi/comboGrid',
        idField: 'id',
        textField: 'nama',
        mode: 'local',
        sortName: 'nama',
        sortOrder: 'asc',
        required: true,
        selectFirstRow: true,
        columns: [
          [{
              field: 'id',
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
          $("#kodelokasi").val(row.kode);
        },
        onChange: function(newVal, oldVal) {
          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
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
        toolbar: '#toolbar',
        // UNTUK TOMBOL EDIT
        frozenColumns: [
          [{
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 100,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 690,
                  mode: 'remote',
                  required: true,
                  idField: 'kode',
                  textField: 'kode',
                  columns: [
                    [{
                        field: 'id',
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
                        field: 'satuan',
                        title: 'Satuan',
                        width: 60
                      },
                      {
                        field: 'catatan',
                        title: 'Catatan',
                        width: 250
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
              width: 200,
            },
            {
              field: 'idbarang',
              hidden: true
            },
          ]
        ],
        columns: [
          [{
              field: 'jmlstok',
              title: 'Stok Akhir<br>(Sat. Terkecil)',
              align: 'right',
              width: 80,
              formatter: format_qty,
            },
            {
              field: 'jmlstokmultisatuan',
              title: 'Stok Akhir<br>Multi Satuan',
              align: 'left',
              width: 150,
              formatter: format_qty,
            },
            {
              field: 'jmljual',
              title: 'Total Jual<br>(Sat. Terkecil)',
              align: 'right',
              width: 80,
              formatter: format_qty,
            },
            {
              field: 'jmljualmultisatuan',
              title: 'Total Jual<br>Multi Satuan',
              align: 'left',
              width: 150,
              formatter: format_qty,
            },
            {
              field: 'isi',
              title: 'Isi/Konversi',
              align: 'right',
              width: 80,
              formatter: format_qty,
            },
            {
              field: 'satuanorder',
              title: 'Satuan<br>Order',
              width: 60,
              align: 'center',
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 100,
                  panelHeight: 130,
                  mode: 'remote',
                  required: true,
                  idField: 'satuan',
                  textField: 'satuan',
                  columns: [
                    [{
                      field: 'satuan',
                      title: 'Satuan',
                      width: 80
                    }]
                  ],
                }
              }
            },
            {
              field: 'jmlorder',
              title: 'Jml. Order',
              align: 'right',
              width: 80,
              formatter: format_qty,
              editor: {
                type: 'numberbox'
              }
            },
            {
              field: 'saranorder',
              title: 'Saran Order',
              align: 'right',
              width: 80,
              formatter: format_qty,
            },
            {
              field: 'jmlbeliterakhir',
              title: 'Jml Beli<br>Terakhir',
              align: 'right',
              width: 80,
              formatter: format_qty,
            },
            {
              field: 'satuanbeliterakhir',
              title: 'Satuan Beli<br>Terakhir',
              align: 'center',
              width: 80
            },
            {
              field: 'namasupplierbeliterakhir',
              title: 'Supplier Terakhir',
              align: 'left',
              width: 200,
            },
            {
              field: 'tglbeliterakhir',
              title: 'Tgl Beli<br>Terakhir',
              align: 'center',
              width: 80,
            },
            {
              field: 'hargabeli',
              title: 'Harga Beli',
              align: 'right',
              width: 100,
              formatter: format_amount,
            },
            {
              field: 'discpersen',
              title: 'Disc(%)',
              align: 'center',
              width: 100,
              <?php
                        if ($INPUTHARGA == 1) {
                        ?>
              editor: {
                type: 'textbox'
              }
              <?php
                        }
                        ?>
            },
            {
              field: 'disc',
              title: 'Disc',
              align: 'right',
              width: 65,
              formatter: format_amount
            },
            {
              field: 'hargabeliterakhirsatuanterkecil',
              hidden: true
            },
            {
              field: 'hargabeliterakhirsatuanterkecildisc',
              title: 'Harga Beli<br>(Satuan Terkecil)',
              align: 'right',
              width: 100,
              formatter: format_amount,
            },
            {
              field: 'hargajualsatuanterkecil',
              title: 'Harga Jual Terakhir<br>(Satuan Terkecil)',
              align: 'right',
              width: 120,
              formatter: format_amount
            }
          ]
        ],
        //UNTUK TOMBOL EDIT
        onClickRow: function(index, row) {
          indexDetail = index;
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);

          if (field == 'satuanorder') {
            ed.combogrid('grid').datagrid('options').url = base_url + 'atena/Master/Data/Barang/satuanBarang/' + row
              .idbarang;
            ed.combogrid('grid').datagrid('load', {
              q: '',
              idbarang: row.idbarang
            });

            ed.combogrid('showPanel');
          } else if (field == 'kodebarang') {
            ed.combogrid('grid').datagrid('options').url = base_url + 'atena/Master/Data/Barang/comboGridAll/po';
            ed.combogrid('grid').datagrid('load', {
              q: ''
            });

            ed.combogrid('showPanel');
          }
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data_detail', index, cell.field);
          var row_update = {};

          switch (cell.field) {
            case 'kodebarang':
              var data = ed.combogrid('grid').datagrid('getSelected');
              var idsupplier = $('#idsupplier').combogrid('getValue');
              var idlokasi = $('#idlokasi').combogrid('getValue');

              $.ajax({
                url: base_url + 'atena/Pembelian/Transaksi/AnalisisPO/tampilBarang',
                type: 'POST',
                data: {
                  idlokasi: idlokasi,
                  tglawal: $('#tglawal').datebox('getValue'),
                  tglakhir: $('#tglakhir').datebox('getValue'),
                  idbarang: data.id
                },
                async: false,
                dataType: 'JSON',
                beforeSend: function() {
                  $.messager.progress();
                },
                success: function(response) {
                  $.messager.progress('close');

                  row_update = response.data;
                }
              })
              break;
            case 'satuanorder':
              var data = ed.combogrid('grid').datagrid('getSelected');
              var saranorder = row.saranordersatuanterkecil;
              var hargabeli = row.hargabeliterakhirsatuanterkecil;

              if (data.satuanorder == row.satuan1) {
                saranorder = row.saranordersatuanterkecil / row.konversi1 / row.konversi2;
                hargabeli = row.hargabeliterakhirsatuanterkecil * row.konversi1 * row.konversi2;
              } else if (data.satuanorder == row.satuan2) {
                saranorder = row.saranordersatuanterkecil / row.konversi2;
                hargabeli = row.hargabeliterakhirsatuanterkecil * row.konversi2;
              }

              row_update = {
                saranorder: saranorder,
                hargabeli: hargabeli
              }

              break;
            case 'discpersen':
              var valid = cek_format(row.discpersen);

              if (valid == "error") {
                $.messager.show({
                  title: 'Warning',
                  msg: 'Discount Hanya Boleh Berisi + . Dan Angka Saja',
                  timeout: <?= $_SESSION[NAMAPROGRAM]['TIMEOUT'] ?>,
                });

                return
              }

              var splitdiscpersen = row.discpersen.split("+");
              var totaldisc = 0;
              var harga = row.hargabeliterakhirsatuanterkecil;

              for (var i = 0; i < splitdiscpersen.length; i++) {
                if (splitdiscpersen[i] != "" && splitdiscpersen[i] <= 100 && splitdiscpersen[i] > 0) {
                  splitdiscpersen[i] = parseFloat(splitdiscpersen[i]);
                  disc = +((splitdiscpersen[i] * harga / 100).toFixed(
                    <?= $_SESSION[NAMAPROGRAM]['DECIMALDIGITAMOUNT'] ?>));
                  totaldisc += disc;
                  harga -= disc;
                }
              }

              row_update = {
                hargabeliterakhirsatuanterkecildisc: harga,
                disc: totaldisc
              }

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

    function tambah_detail() {
      var dg = '#table_data_detail';
      var index = $(dg).datagrid('getRows').length;

      $(dg).datagrid('appendRow', {
        idbarang: 0
      });

      getRowIndex(target);
    }

    function hapus_detail() {
      var dg = '#table_data_detail';
      $(dg).datagrid('deleteRow', indexDetail);

      hitung_grandtotal();
    }

    function hitung_subtotal_detail(index, row) {
      // hitung diskon lebih dahulu
      var data = {};
      var harga = parseFloat(row.harga);
      var dg = $('#table_data_detail');

      dg.datagrid('updateRow', {
        index: index,
        row: data
      });

      // cek jika ada barang yang sama
      var rows = dg.datagrid('getRows');
      for (var i = 0; i < rows.length; i++) {
        if (index != i && (rows[i].kodebarang != "" && row.kodebarang == rows[i].kodebarang)) {
          $.messager.show({
            title: 'Warning',
            msg: 'Barang Yang Diinput Tidak Boleh Sama Dalam Satu Detail Transaksi',
            timeout: <?= $_SESSION[NAMAPROGRAM]['TIMEOUT'] ?>,
          });
          dg.datagrid('deleteRow', index);
          break;
        }
      }
    }

    function hitung_grandtotal() {
      var data = $("#table_data_detail").datagrid('getRows');
      var grandtotal = 0;

      var footer = {
        jml: 0,
        subtotal: 0,
        jmlpendingpo: 0,
        jmltotal: 0,
      }

      for (var i = 0; i < data.length; i++) {
        footer.jml += parseFloat(data[i].jml);
        footer.subtotal += parseFloat(data[i].subtotal);
        footer.jmlpendingpo += parseFloat(data[i].jmlpendingpo);
        footer.jmltotal += parseFloat(data[i].jmltotal);
      }

      grandtotal = parseFloat(footer.subtotal);

      $("#GRANDTOTAL").numberbox('setValue', grandtotal);

      $('#table_data_detail').datagrid('reloadFooter', [footer]);
    }

    function clear_plugin() {
      $('.number').numberbox('setValue', 0);

      $("#tgltrans").datebox('setValue', date_format());
    }

    function ubahpakaipo(index, pakaipo) {
      $('#table_data_detail').datagrid('updateRow', {
        index: index,
        row: {
          pakaipo: pakaipo == 1 ? 0 : 1
        }
      });

      if (pakaipo == 1) {
        $('#checkallpakaipo').prop('checked', false);
      } else {
        var pakaiposemua = 1;
        var rows = $('#table_data_detail').datagrid('getRows');

        for (var i = 0; i < rows.length; i++) {
          if (rows[i].pakaipo != 1) {
            pakaiposemua = 0;
            break;
          }
        }

        if (pakaiposemua == 1) {
          $('#checkallpakaipo').prop('checked', true);
        }
      }
    }

    function browse_data_supplier(id) {
      $(id).combogrid({
        panelWidth: 600,
        url: base_url + 'atena/Master/Data/Supplier/comboGrid',
        idField: 'id',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        required: true,
        columns: [
          [{
              field: 'id',
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
              field: 'kota',
              title: 'Kota',
              width: 100,
              sortable: true
            },
            {
              field: 'alamat',
              title: 'Alamat',
              width: 300,
              sortable: true
            }
          ]
        ]
      });
    }

    function tampil_barang(event) {
      event.preventDefault();

      var idsupplier = $('#idsupplier').combogrid('getValue');
      var idlokasi = $('#idlokasi').combogrid('getValue');

      if (idsupplier == '') {
        $.messager.alert('Peringatan', 'Data supplier belum dipilih', 'warning');

        return false;
      }

      $.ajax({
        url: base_url + 'atena/Pembelian/Transaksi/AnalisisPO/tampilBarangBySupplier',
        type: 'POST',
        dataType: 'JSON',
        data: {
          idlokasi: idlokasi,
          idsupplier: idsupplier,
          tglawal: $('#tglawal').datebox('getValue'),
          tglakhir: $('#tglakhir').datebox('getValue')
        },
        beforeSend: function() {
          $.messager.progress();
        },
        success: function(response) {
          $.messager.progress('close');

          $('#table_data_detail').datagrid('loadData', response.data);
        }
      })
    }

    function tambah_diskon(event) {
      event.preventDefault();

      var rows = $('#table_data_detail').datagrid('getRows');
      var discpersen = $('#toolbardiscpersen').textbox('getValue');
      var valid = cek_format(discpersen);

      if (valid == "error") {
        $.messager.show({
          title: 'Warning',
          msg: 'Discount Hanya Boleh Berisi + . Dan Angka Saja',
          timeout: <?= $_SESSION[NAMAPROGRAM]['TIMEOUT'] ?>,
        });

        return
      }

      var splitdiscpersen = discpersen.split("+");

      for (var i = 0; i < rows.length; i++) {
        var totaldisc = 0;
        var harga = row.hargabeliterakhirsatuanterkecil;

        for (var i = 0; i < splitdiscpersen.length; i++) {
          if (splitdiscpersen[i] != "" && splitdiscpersen[i] <= 100 && splitdiscpersen[i] > 0) {
            splitdiscpersen[i] = parseFloat(splitdiscpersen[i]);
            disc = +((splitdiscpersen[i] * harga / 100).toFixed(<?= $_SESSION[NAMAPROGRAM]['DECIMALDIGITAMOUNT'] ?>));
            totaldisc += disc;
            harga -= disc;
          }
        }

        $('#table_data_detail').datagrid('updateRow', {
          index: i,
          row: {
            discpersen: discpersen,
            disc: totaldisc,
            hargabeliterakhirsatuanterkecildisc: harga
          }
        });
      }
    }

    function nollkan_jmlorder(event) {
      event.preventDefault();

      var rows = $('#table_data_detail').datagrid('getRows');

      for (var i = 0; i < rows.length; i++) {
        $('#table_data_detail').datagrid('updateRow', {
          index: i,
          row: {
            jmlorder: 0
          }
        });
      }
    }
  </script>
@endpush
