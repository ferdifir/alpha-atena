@extends('template.app')

@section('content')
  <div class="easyui-layout" style="height:100%; font-weight:bold;" fit="true">
    <div style="width: 360px;overflow-x: hidden;" class="panel-filter-laporan" data-options="region:'west',hideCollapsedContent:false"
      title="{{ $menu }}">
      <form method='post' target="LaporanBarang" id="form_input">
        <input type="hidden" name="jenis" value="{{ $jenis }}">
        <div id="tab_transaksi" class="easyui-tabs" style="width:100%;">
          <div title="Filter Data">
            <fieldset style="padding: 5px">
              <legend>Jenis Barcode yang Dicetak</legend>

              <input type="radio" value="satuan1" name="satuanbarcode" checked>Satuan 1
              <input type="radio" value="satuan2" name="satuanbarcode">Satuan 2
              <input type="radio" value="satuan3" name="satuanbarcode">Satuan 3
              <br>
              <input type="radio" value="satuanterbesar" name="satuanbarcode">Satuan Terbesar
              <input type="radio" value="satuanterkecil" name="satuanbarcode">Satuan Terkecil
            </fieldset>

            <fieldset style="padding: 5px;">
              <legend>Bentuk Harga yang Dicetak</legend>

              <td>
                <input type="radio" name="jeniscetakharga" value="simbol" checked> Simbol
                <input type="radio" name="jeniscetakharga" value="angka"> Angka
              </td>
            </fieldset>

            @if ($jenis == 'hargabeli')
              <fieldset id="hargabeli-wrapper" style="padding: 5px;">
                <legend>Harga Beli Diambil dari:</legend>

                <input type="radio" name="jenishargabeli" value="master" checked> Master Barang
                <input type="radio" name="jenishargabeli" value="beli"> Pembelian
              </fieldset>
            @elseif($jenis == 'hargajual')
              <fieldset id="hargajual-wrapper" style="padding: 5px;">
                <legend>Jenis Harga Jual</legend>

                <table>
                  <tbody>
                    <tr>
                      <td id="label_laporan">
                        Jenis
                      </td>
                      <td>
                        <select id="harga" class="easyui-combobox" name="harga" style="width:220px;">
                          <option value="CUSTOMER">Harga Berdasarkan Customer</option>
                          <option value="TIPECUSTOMER">Harga Berdasarkan Tipe Customer</option>
                          <option value="BARANG">Harga Berdasarkan Barang</option>
                        </select>
                      </td>
                    </tr>
                    <tr id="pilihcustomer">
                      <td id="label_laporan">
                        Customer
                      </td>
                      <td>
                        <div id="hide_nilai_list_customer">
                          <input id="txt_nilai_list_customer" name="txt_nilai_list_customer" style="width:220px"
                            prompt="Nama Customer" />
                        </div>
                      </td>
                    </tr>
                    <tr id="pilihtipecustomer">
                      <td id="label_laporan">
                        Tipe Cust
                      </td>
                      <td>
                        <div id="hide_nilai_list_tipecustomer">
                          <input id="txt_nilai_list_tipecustomer" name="txt_nilai_list_tipecustomer" style="width:220px"
                            prompt="Nama Tipe Customer" />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td id="label_laporan" style="width:55px">Lokasi Harga Jual</td>
                      <td><input id="txt_lokasi_hargajual" name="txt_lokasi_hargajual" style="width:220px" /></td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
            @endif

            <fieldset id="tampilan-wrapper" style="padding: 5px;">
              <legend>Jenis Tampilan Cetak:</legend>

              <input type="radio" name="jenistampilan" value="1" checked> Tampilan 1 <div class="hint"
                id="hint-tampilan1"></div>
              <input type="radio" name="jenistampilan" value="2"> Tampilan 2 <div class="hint"
                id="hint-tampilan2">
              </div>
            </fieldset>

            <div id="accordion" class="easyui-accordion" style="margin-top: 5px;">
              <div title="Berdasarkan Barang">
                <div style="padding: 5px;">
                </div>

                <table style="border-bottom:1px #000" id="label_laporan">
                  <tr>
                    <td></td>
                    <td>
                      <a style="float: right;" class="easyui-linkbutton btn_print"
                        data-options="iconCls:'icon-print'">Cetak</a>
                    </td>
                  </tr>
                  <tr>
                    <td id="label_laporan">Barcode </td>
                    <td id="label_laporan">
                      <input style="width: 285px" class="label_input" name="barcode" id="barcode" />
                    </td>
                  </tr>
                  <tr>
                    <td id="label_laporan">Status </td>
                    <td id="label_laporan">
                      <select style="width: 285px" id="cbStatus" class="easyui-combogrid" name="cbstatus[]">
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td id="label_laporan">
                      Kolom
                    </td>
                    <td>
                      <select id="kolom" class="easyui-combobox" name="kolom" style="width:285px;">
                        <option value="mbarang.kodebarang">Kode Barang</option>
                        <option value="mbarang.namabarang">Nama Barang</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td id="label_laporan">
                      Operator
                    </td>
                    <td>
                      <div id="lap_operatorString">
                        <select id="operatorString" class="easyui-combobox" name="operatorstring"
                          style="width:285px;">
                          <option value="ADALAH">Adalah</option>
                          <option value="BERISI KATA">Berisi Kata</option>
                        </select>
                      </div>
                      <div id="lap_operatorNumber" hidden>
                        <select id="operatorNumber" class="easyui-combobox" name="operatornumber"
                          style="width:285px;">
                        </select>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td id="label_laporan" class="label_nilai">Nilai </td>
                    <td>
                      <div id="hide_nilai" hidden>
                        <input class="label_input" id="txt_nilai" name="txt_nilai" style="width:285px"
                          prompt="Nilai">
                      </div>
                      <div id="hide_nilai_list_merk" hidden>
                        <input id="txt_nilai_list_merk" name="txt_nilai_list_merk" style="width:285px"
                          prompt="Nilai" />
                      </div>
                      <div id="hide_nilai_list_barang">
                        <input id="txt_nilai_list_barang" name="txt_nilai_list_barang" style="width:285px"
                          prompt="Nilai" />
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td id="label_laporan" class="label_nilai">Jumlah </td>
                    <td>
                      <input class="number" id="jumlah" style="width:285px">
                    </td>
                  </tr>
                  <tr valign="top">
                    <td colspan="2">
                      <ul class="easyui-datagrid" title="Parameter Kolom" id="list_filter_laporan" lines="true"
                        data-options="tools:'#title_parameter'">
                      </ul>
                    </td>
                  </tr>
                </table>
              </div>
              <div title="Berdasarkan Penerimaan">
                <div style="padding: 5px;">
                </div>

                <table style="border-bottom:1px #000" id="label_laporan">
                  <tr>
                    <td></td>
                    <td>
                      <a style="float: right;" class="easyui-linkbutton btn_print"
                        data-options="iconCls:'icon-print'">Cetak</a>
                    </td>
                  </tr>
                  <tr>
                    <td id="label_laporan">
                      No. Trans
                    </td>
                    <td>
                      <input id="txt_nilai_list_bbm" name="txt_nilai_list_bbm" style="width:285px"
                        prompt="No Bukti Penerimaan" />
                    </td>
                  </tr>

                  <tr valign="top">
                    <td colspan="2">
                      <ul class="easyui-datagrid" title="Data Penerimaan" id="list_filter_laporan_penerimaan"
                        lines="true">
                      </ul>
                    </td>
                  </tr>
                </table>
              </div>
              <div title="Berdasarkan Pembelian">
                <div style="padding: 5px;">
                </div>

                <table style="border-bottom:1px #000" id="label_laporan">
                  <tr>
                    <td></td>
                    <td>
                      <a style="float: right;" class="easyui-linkbutton btn_print"
                        data-options="iconCls:'icon-print'">Cetak</a>
                    </td>
                  </tr>
                  <tr>
                    <td id="label_laporan">
                      No. Trans
                    </td>
                    <td>
                      <input id="txt_nilai_list_beli" name="txt_nilai_list_beli" style="width:285px"
                        prompt="No Pembelian" />
                    </td>
                  </tr>

                  <tr valign="top">
                    <td colspan="2">
                      <ul class="easyui-datagrid" title="Data Pembelian" id="list_filter_laporan_beli" lines="true">
                      </ul>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div title="Pengaturan Simbol" id="Pengaturan Simbol" style="padding: 5px;">
            <a style="margin-bottom: 5px;" class="easyui-linkbutton" data-options="iconCls:'icon-save'"
              onclick="simpan_simbol_harga()">Simpan</a>

            <div id="datagrid-simbol"></div>
          </div>
        </div>

        <br>
      </form>
    </div>
    <div data-options="region:'center'">
      <div class="easyui-layout" style="width: 100%;height: 100%">
        <div data-options="region: 'center'">
          <div id="tab_laporan" class="easyui-tabs" style="width:100%;height:100%;">
          </div>
        </div>
      </div>
    </div>
    <div id="title_parameter">
      <a id="btn_add" class="icon-add" data-options=" plain:true"></a>
      <a id="btn_remove" class="icon-remove" data-options=" plain:true"></a>
    </div>
  </div>
@endsection

@push('js')
  <script>
    var counter = 0;
    var kolom = "Kode Barang";
    var namaKolom = "Barang";
    var kolomVal = "mbarang.kodebarang"
    var checkData = "Kode";
    var operator = "Adalah";
    var operatorVal = "ADALAH";
    var tipedata = "STRING";
    var jeniscetak = 'Berdasarkan Barang';
    var index_filter_barang = null;

    $(document).ready(function() {
      isiOperatorLaporan("Number", "operatorNumber");
      browse_data_merk('#txt_nilai_list_merk');
      browse_data_barang('#txt_nilai_list_barang');
      browse_data_customer('#txt_nilai_list_customer');
      browse_data_tipecustomer('#txt_nilai_list_tipecustomer');
      browse_data_bbm('#txt_nilai_list_bbm');
      browse_data_pembelian('#txt_nilai_list_beli');
      browse_data_lokasi_hargajual('#txt_lokasi_hargajual');

      create_hint(
        '#hint-tampilan1',
        'Menampilkan barcode dalam ukuran kertas A4 dengan 4 label per baris'
      );
      create_hint(
        '#hint-tampilan2',
        'Menampilkan barcode untuk printer barcode dengan ukuran kertas 4.17in x 0.9in dengan 3 label per baris'
      );

      $('#jumlah').numberbox({
        precision: 0
      });
      $('#jumlah').numberbox('setValue', 1);

      $("#data_tampil").val('BARANG');

      $('[name="jenishargabeli"]').change(function() {
        var selected_accordion = $($('#accordion').accordion('getSelected')).prev().text();
        var select_jenishargabeli = $('[name="jenishargabeli"]:checked').val();

        if (select_jenishargabeli == 'beli') {
          if (selected_accordion == 'Berdasarkan Penerimaan' || selected_accordion == 'Berdasarkan Barang') {
            $('[name="jenishargabeli"][value="master"]').prop('checked', true);

            $.messager.alert('Info', 'Harga Beli dari Pembelian Hanya Untuk Cetak Berdasarkan Pembelian');
          }
        }
      })

      $('#datagrid-simbol').datagrid({
        width: 335,
        height: 300,
        url: link_api.loadDataGridSimbolHarga,
        RowAdd: false,
        RowDelete: false,
        columns: [
          [{
              field: 'angka',
              title: 'Angka',
              width: 80
            },
            {
              field: 'simbol',
              title: 'Simbol',
              width: 80,
              editor: {
                type: 'textbox'
              }
            }
          ]
        ]
      }).datagrid('enableCellEditing');

      $("#pilihcustomer").show();
      $("#pilihtipecustomer").hide();

      $('#list_filter_laporan').datagrid({
        width: 335,
        height: 160,
        selectOnCheck: false,
        showHeader: true,
        columns: [
          [{
              field: 'tipedata',
              hidden: true
            },
            {
              field: 'kolom',
              hidden: true
            },
            {
              field: 'operator',
              hidden: true
            },
            {
              field: 'nilai',
              hidden: true
            },
            {
              field: 'ck',
              checkbox: true
            },
            {
              field: 'text',
              title: 'Filter',
              width: 200
            },
            {
              field: 'jml',
              title: 'Jml',
              width: 50,
              align: 'right',
              editor: {
                type: 'numberbox',
                options: {
                  min: 0,
                  precision: 0,
                }
              }
            }
          ]
        ],
        onClickRow: function(index, row) {
          index_filter_barang = index;
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');

          switch (cell.field) {
            case 'jml':
              if (row.jml > 1 && row.operator == 'BERISI KATA') {
                $.messager.alert('Peringatan', 'Jumlah untuk operator "Berisi Kata" harus 1', 'warning');

                $(this).datagrid('updateRow', {
                  index: index,
                  row: {
                    jml: 1
                  }
                });
              }
              break;
          }
        }
      }).datagrid('enableCellEditing');

      $('#list_filter_laporan_penerimaan').datagrid({
        width: 335,
        height: 200,
        selectOnCheck: true,
        dblclickToEdit: true,
        RowAdd: false,
        columns: [
          [{
              field: 'ck',
              checkbox: true,
            },
            {
              field: 'barcode',
              title: 'Barcode',
              width: 70,
              align: 'left'
            },
            {
              field: 'namabarang',
              title: 'Nama Barang',
              width: 170,
              align: 'left'
            },
            {
              field: 'jml',
              title: 'Jml Cetak',
              width: 50,
              align: 'right',
              editor: {
                type: 'numberbox',
                options: {
                  min: 0,
                  precision: 0,
                }
              }
            }
          ]
        ],
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var row_update = {};
          if (cell.field == 'jml') {
            if (parseFloat(row.jml) > parseFloat(row.jmlmaks)) {
              $.messager.alert({
                title: 'Warning',
                msg: 'Jumlah barcode melebihi jumlah barang pada penerimaan',
                timeout: {{ session('TIMEOUT') }},
              });

              row_update = {
                jml: row.jmlmaks
              };
            }
          }

          if (jQuery.isEmptyObject(row_update) == false) {
            $(this).datagrid('updateRow', {
              index: index,
              row: row_update
            });
          }
        }
      }).datagrid('enableCellEditing');

      $('#list_filter_laporan_beli').datagrid({
        width: 335,
        height: 200,
        selectOnCheck: true,
        dblclickToEdit: true,
        checkOnSelect: false,
        RowAdd: false,
        columns: [
          [{
              field: 'ck',
              checkbox: true,
            },
            {
              field: 'barcode',
              title: 'Barcode',
              width: 70,
              align: 'left'
            },
            {
              field: 'namabarang',
              title: 'Nama Barang',
              width: 170,
              align: 'left'
            },
            {
              field: 'jml',
              title: 'Jml',
              width: 50,
              align: 'right',
              formatter: 0,
              editor: {
                type: 'numberbox',
                options: {
                  min: 0,
                  precision: 0,
                }
              }
            },
            {
              field: 'jmlmaks',
              hidden: true,
            },
          ]
        ],
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var row_update = {};
          if (cell.field == 'jml') {
            if (parseFloat(row.jml) > parseFloat(row.jmlmaks)) {
              $.messager.alert({
                title: 'Warning',
                msg: 'Jumlah barcode melebihi jumlah barang pada pembelian',
                timeout: {{ session('TIMEOUT') }},
              });

              row_update = {
                jml: row.jmlmaks
              };
            }
          }

          if (jQuery.isEmptyObject(row_update) == false) {
            $(this).datagrid('updateRow', {
              index: index,
              row: row_update
            });
          }
        }
      }).datagrid('enableCellEditing');

      $('#accordion').accordion({
        onSelect: function(title, index) {
          jeniscetak = title;

          if (title == 'Berdasarkan Barang') {
            kolom = "Kode Barang";
            namaKolom = "Barang";
            kolomVal = "mbarang.kodebarang"
            checkData = "Kode";
            operator = "Adalah";
            operatorVal = "ADALAH";
            tipedata = "STRING";

            $("#data_tampil").val('BARANG');

            $('[name="jenishargabeli"][value="master"]').prop('checked', true);
          } else if (title == 'Berdasarkan Penerimaan') {
            kolom = "Kode Penerimaan";
            namaKolom = "Penerimaan";
            kolomVal = "tbbm.kodebbm"
            checkData = "Kode";
            operator = "Adalah";
            operatorVal = "ADALAH";
            tipedata = "STRING";

            $("#data_tampil").val('BBM');

            $('[name="jenishargabeli"][value="master"]').prop('checked', true);
          } else if (title == 'Berdasarkan Pembelian') {
            kolom = "Kode Pembelian";
            namaKolom = "Pembelian";
            kolomVal = "tbeli.kodebeli"
            checkData = "Kode";
            operator = "Adalah";
            operatorVal = "ADALAH";
            tipedata = "STRING";

            $("#data_tampil").val('BELI');
          }

          $('#list_filter_laporan').datagrid('loadData', []);

          index_filter_barang = null;
        },
        onUnselect: function(title, index) {
          jeniscetak = null;
        }
      });

      $('#cbStatus').combogrid({
        idField: 'value',
        textField: 'status',
        selectFirstRow: true,
        columns: [
          [{
              field: 'value',
              hidden: true
            },
            {
              field: 'status',
              title: 'Status',
              width: 200
            },
          ]
        ],

      });

      $('#cbStatus').combogrid("grid").datagrid("appendRow", {
        value: '',
        status: 'Semua'
      });

      $('#cbStatus').combogrid("grid").datagrid("appendRow", {
        value: '1',
        status: 'Aktif'
      });

      $('#cbStatus').combogrid("grid").datagrid("appendRow", {
        value: '0',
        status: 'Tidak'
      });

      $('#cbStatus').combogrid("setValue", ['']);

      $('#harga').combobox({
        onSelect: function(row) {
          if (row.value == "CUSTOMER") {
            $("#pilihcustomer").show();
            $("#pilihtipecustomer").hide();

            $("#txt_nilai_list_customer").combogrid("clear");
            $("#txt_nilai_list_tipecustomer").combogrid("clear");
          } else if (row.value == "TIPECUSTOMER") {
            $("#pilihcustomer").hide();
            $("#pilihtipecustomer").show();

            $("#txt_nilai_list_customer").combogrid("clear");
            $("#txt_nilai_list_tipecustomer").combogrid("clear");
          } else if (row.value == "BARANG") {
            $("#pilihcustomer").hide();
            $("#pilihtipecustomer").hide();

            $("#txt_nilai_list_customer").combogrid("clear");
            $("#txt_nilai_list_tipecustomer").combogrid("clear");
          }
        }
      });
      tutupLoader();
    });

    //FILTER KOLOM
    $("#kolom").combobox({
      onChange: function() {
        kolom = $("#kolom").combobox('getText');
        kolomVal = $("#kolom").combobox('getValue');

        checkData = kolom.substr(0, 4); // CEK NAMA FILTER, APAKAH KODE DAN NAMA
        namaKolom = kolom.substr(5, kolom.length - 1); // CEK JENIS FILTER APA (SUPPLIER,BARANG,PO)


        if (checkData == "Kode" || checkData == "Nama") {
          //UNTUK KOLOM BESERTA COMBOGRID

          if (namaKolom == 'Merk') {
            $('#hide_nilai_list_merk').show();
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_bbm').hide();
          } else if (namaKolom == 'Barang') {
            $('#hide_nilai_list_barang').show();
            $('#hide_nilai_list_merk').hide();
            $('#hide_nilai_list_bbm').hide();
          } else if (namaKolom == 'Penerimaan') {
            $('#hide_nilai_list_bbm').show();
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_merk').hide();
          }
          tipedata = "STRING";
          $('#lap_operatorString').show();
          $('#lap_operatorNumber').hide();


          $('#hide_nilai').hide();
          $('.label_nilai').show();

          $("#operatorString").combobox('setValues', 'ADALAH');
          operator = "Adalah";
          operatorVal = "ADALAH";
        } else {
          tipedata = "NUMBER";
          $('#lap_operatorString').hide();
          $('#lap_operatorNumber').show();

          $('#hide_nilai_list_merk').hide();
          $('#hide_nilai_list_barang').hide();
          $('#hide_nilai_list_bbm').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();

          $("#operatorNumber").combobox('setValues', 'SAMA DENGAN');
          operator = "Sama dengan";
          operatorVal = "SAMA DENGAN";
        }

        //CLEAR FIELD SETIAP UBAH
        $('#txt_nilai_list_merk').combogrid('clear');
        $('#txt_nilai_list_barang').combogrid('clear');
        $('#txt_nilai_list_bbm').combogrid('clear');
        $('#txt_nilai').textbox('clear');
      }
    });

    //OPERATOR STRING
    $("#operatorString").combobox({
      onChange: function() {
        var operatorString = $("#operatorString").combobox('getText');
        var operatorStringVal = $("#operatorString").combobox('getValue');
        operator = operatorString;
        operatorVal = operatorStringVal;

        if (operatorString != 'ADALAH') {
          $('#jumlah').textbox('setValue', 1)
            .textbox('readonly', true);
        } else {
          $('#jumlah').textbox('readonly', false);
        }

        if (operatorStringVal == "ADALAH" || operatorStringVal == "TIDAK MENCAKUP") {
          //UNTUK KOLOM BESERTA COMBOGRID
          if (namaKolom == 'Merk') {
            $('#hide_nilai_list_merk').show();
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_bbm').hide();
          } else if (namaKolom == 'Barang') {
            $('#hide_nilai_list_barang').show();
            $('#hide_nilai_list_merk').hide();
            $('#hide_nilai_list_bbm').hide();
          } else if (namaKolom == 'Penerimaan') {
            $('#hide_nilai_list_bbm').show();
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_merk').hide();
          }

          $('#hide_nilai').hide();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('enable');
        } else if (operatorStringVal == "KOSONG" || operatorStringVal == "TIDAK KOSONG") {

          $('#hide_nilai_list_merk').hide();
          $('#hide_nilai_list_barang').hide();
          $('#hide_nilai_list_bbm').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_merk').hide();
          $('#hide_nilai_list_barang').hide();
          $('#hide_nilai_list_bbm').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('enable');
        }
      }
    });

    //OPERATOR NUMBER
    $("#operatorNumber").combobox({
      onChange: function() {
        var operatorNumber = $("#operatorNumber").combobox('getText');
        var operatorNumberVal = $("#operatorNumber").combobox('getValue');
        operator = operatorNumber;
        operatorVal = operatorNumberVal;

        if (operatorNumberVal == "NOL" || operatorNumberVal == "TIDAK NOL") {
          $('#hide_nilai_list_merk').hide();
          $('#hide_nilai_list_barang').hide();
          $('#hide_nilai_list_bbm').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_merk').hide();
          $('#hide_nilai_list_barang').hide();
          $('#hide_nilai_list_bbm').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('enable');
        }
      }
    });

    //TAMBAH FILTER
    $("#btn_add").click(function() {
      var nilai = "";
      var checknilai = 0;

      //UNTUK KOLOM BESERTA COMBOGRID

      if (namaKolom == 'Barang' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_barang').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Merk' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_merk').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Penerimaan' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_bbm').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (operator != "Kosong" && operator != "Tidak kosong" && operator != "Nol" && operator != "Tidak nol") {
        nilai = $('#txt_nilai').textbox('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else {
        checknilai = 1;
      }

      if (checknilai == 1) {
        var text_laporan = kolom + " " + operator + " " + nilai;

        $('#list_filter_laporan').datagrid('appendRow', {
          tipedata: tipedata,
          kolom: kolomVal,
          operator: operatorVal,
          nilai: nilai,
          text: text_laporan,
          jml: $('#jumlah').numberbox('getValue')
        });

        //CHECKED TRUE
        var rows = $('#list_filter_laporan').datagrid('getRows');
        $('#list_filter_laporan').datagrid('checkRow', rows.length - 1);
      } else {
        alert("Isi Nilai Telebih Dahulu");
      }
    });

    //HAPUS FILTER
    $("#btn_remove").click(function() {
      if (index_filter_barang != null) {
        $('#list_filter_laporan').datagrid('deleteRow', index_filter_barang);
      }
    });

    function cetakLaporanBarcodeBarang(filter, data_tampil) {
      parent.buka_laporan(link_api.laporanBarcodeBarang, {
        status: $('#cbStatus').combogrid('getValue'),
        data_filter: JSON.stringify($("#" + filter).datagrid('getChecked')),
        data_tampil: data_tampil,
        filename: "Laporan Barcode Barang",
        excel: "tidak",
        harga: $('#harga').combogrid('getValue'),
        uuidcustomer: $('#txt_nilai_list_customer').combogrid('getValue'),
        uuidtipecustomer: $('#txt_nilai_list_tipecustomer').combogrid('getValue'),
        uuidlokasi_hargajual: $('#txt_lokasi_hargajual').combogrid('getValue'),
        satuanbarcode: $('[name="satuanbarcode"]:checked').val(),
        jeniscetakharga: $('[name="jeniscetakharga"]:checked').val(),
        jenis: $('[name="jenis"]').val(),
        jenishargabeli: $('[name="jenishargabeli"]:checked').val(),
        jenistampilan: $('[name="jenistampilan"]:checked').val(),
        barcode: $('#barcode').val()
      });
    }

    $(".btn_print").click(function() {
      if (jeniscetak == 'Berdasarkan Barang') {
        var data = "BARANG";
        var errMessage = "";

        @if ($jenis == 'hargajual')
          var idlokasi = $('#txt_lokasi_hargajual').combogrid('getValue');
          var tipeharga = $('#harga').combobox('getValue');

          if (idlokasi == '') {
            $.messager.alert('Error', 'Lokasi Harga Jual Wajib Diisi', 'error');

            return false;
          }

          if (tipeharga == "CUSTOMER") {
            data = $("#txt_nilai_list_customer").combogrid("getValue");

            if (data == null || data == '') {
              $.messager.alert('Error', 'Customer Wajib Diisi', 'error');

              return false;
            }
          } else if (tipeharga == "TIPECUSTOMER") {
            data = $("#txt_nilai_list_tipecustomer").combogrid("getValue");

            if (data == null || data == '') {
              $.messager.alert('Error', 'Tipe Customer Wajib Diisi', 'error');

              return false;
            }
          } else {
            data = "BARANG";
          }
        @endif

        cetakLaporanBarcodeBarang(
          "list_filter_laporan",
          "BARANG"
        );

        return false;

      } else if (jeniscetak == 'Berdasarkan Penerimaan') {
        @if ($jenis == 'hargajual')
          var idlokasi = $('#txt_lokasi_hargajual').combogrid('getValue');
          var tipeharga = $('#harga').combobox('getValue');

          if (idlokasi == '') {
            $.messager.alert('Error', 'Lokasi Harga Jual Wajib Diisi', 'error');

            return false;
          }

          if (tipeharga == "CUSTOMER") {
            data = $("#txt_nilai_list_customer").combogrid("getValue");

            if (data == null || data == '') {
              $.messager.alert('Error', 'Customer Wajib Diisi', 'error');

              return false;
            }
          } else if (tipeharga == "TIPECUSTOMER") {
            data = $("#txt_nilai_list_tipecustomer").combogrid("getValue");

            if (data == null || data == '') {
              $.messager.alert('Error', 'Tipe Customer Wajib Diisi', 'error');

              return false;
            }
          } else {
            data = "BARANG";
          }
        @endif

        cetakLaporanBarcodeBarang(
          "list_filter_laporan_penerimaan",
          "BBM"
        );

        return false;
      } else if (jeniscetak == 'Berdasarkan Pembelian') {
        @if ($jenis == 'hargajual')
          var idlokasi = $('#txt_lokasi_hargajual').combogrid('getValue');
          var tipeharga = $('#harga').combobox('getValue');

          if (idlokasi == '') {
            $.messager.alert('Error', 'Lokasi Harga Jual Wajib Diisi', 'error');

            return false;
          }

          if (tipeharga == "CUSTOMER") {
            data = $("#txt_nilai_list_customer").combogrid("getValue");

            if (data == null || data == '') {
              $.messager.alert('Error', 'Customer Wajib Diisi', 'error');

              return false;
            }
          } else if (tipeharga == "TIPECUSTOMER") {
            data = $("#txt_nilai_list_tipecustomer").combogrid("getValue");

            if (data == null || data == '') {
              $.messager.alert('Error', 'Tipe Customer Wajib Diisi', 'error');

              return false;
            }
          } else {
            data = "BARANG";
          }
        @endif

        cetakLaporanBarcodeBarang(
          "list_filter_laporan_beli",
          "BELI"
        );

        return false;
      }
    });

    async function simpan_simbol_harga() {
      var data = {
        data: $('#datagrid-simbol').datagrid('getRows')
      };
      try {
        const response = await fetch(
          link_api.simpanSimbolHarga, {
            method: 'POST',
            headers: {
              'Authorization': 'Bearer {{ session('TOKEN') }}',
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
          }
        );

        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }

        const res = await response.json();
        if (res.success) {
          $.messager.alert('Info', 'Berhasil menyimpan simbol', 'info');
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        showErrorAlert(e);
      }
    }

    function browse_data_barang(id) {
      $(id).combogrid({
        panelWidth: 650,
        url: link_api.browseBarang,
        idField: 'nama',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        rowStyler: function(index, row) {
          if (row.status == 0) {
            return 'background-color:#A8AEA6';
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
              width: 100,
              sortable: true
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 300,
              sortable: true
            },
            {
              field: 'satuan',
              title: 'Satuan',
              width: 80,
              sortable: true
            },
            {
              field: 'partnumber',
              title: 'Part Number',
              width: 150,
              sortable: true
            },
          ]
        ],
        onSelect: function(index, data, checkdata) {
          if (checkData == "Kode") {
            $('#txt_nilai_list_barang').combogrid('setValue', data.kode);
          } else if (checkData == "Nama") {
            $('#txt_nilai_list_barang').combogrid('setValue', data.nama);
          }
        }
      });
    }

    function browse_data_merk(id) {
      $(id).combogrid({
        panelWidth: 220,
        url: link_api.browseMerk,
        idField: 'nama',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        rowStyler: function(index, row) {
          if (row.status == 0) {
            return 'background-color:#A8AEA6';
          }
        },
        columns: [
          [{
              field: 'uuidmerk',
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
              width: 120,
              sortable: true
            },
          ]
        ],
        onSelect: function(index, data, checkdata) {
          if (checkData == "Kode") {
            $('#txt_nilai_list_merk').combogrid('setValue', data.kode);
          } else if (checkData == "Nama") {
            $('#txt_nilai_list_merk').combogrid('setValue', data.nama);
          }
        }
      });
    }

    function browse_data_customer(id) {
      $(id).combogrid({
        panelWidth: 740,
        url: link_api.browseCustomer,
        idField: 'uuidcustomer',
        textField: 'nama',
        mode: 'remote',
        sortOrder: 'asc',
        rowStyler: function(index, row) {
          if (row.status == 0) {
            return 'background-color:#A8AEA6';
          }
        },
        columns: [
          [{
              field: 'uuidcustomer',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 60,
              sortable: true
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 240,
              sortable: true
            },
            {
              field: 'badanusaha',
              title: 'Badan Usaha',
              width: 80,
              sortable: true
            },
            {
              field: 'alamat',
              title: 'Alamat',
              width: 240,
              sortable: true
            },
            {
              field: 'kota',
              title: 'Kota',
              width: 80,
              sortable: true
            },
          ]
        ],
      });
    }

    function browse_data_tipecustomer(id) {
      $(id).combogrid({
        panelWidth: 430,
        url: link_api.browseTipeCustomer,
        idField: 'uuidtipecustomer',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        rowStyler: function(index, row) {
          if (row.status == 0) {
            return 'background-color:#A8AEA6';
          }
        },
        columns: [
          [{
              field: 'uuidtipecustomer',
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
              width: 300,
              sortable: true
            },
          ]
        ],
      });
    }

    function browse_data_bbm(id) {
      $(id).combogrid({
        panelWidth: 230,
        url: link_api.browseBBM,
        idField: 'uuidbbm',
        textField: 'kode',
        mode: 'remote',
        sortName: 'kode',
        sortOrder: 'asc',
        rowStyler: function(index, row) {
          if (row.status == 0) {
            return 'background-color:#A8AEA6';
          }
        },
        columns: [
          [{
              field: 'uuidbbm',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 100,
              sortable: true
            },
            {
              field: 'tgltrans',
              title: 'Tgl Trans',
              width: 100,
              sortable: true
            },
          ]
        ],
        onSelect: function(index, row) {
          load_data_detail_bbm(row.uuidbbm);
        }
      });
    }

    function browse_data_pembelian(id) {
      $(id).combogrid({
        panelWidth: 230,
        url: link_api.browseBeliPembelian,
        idField: 'kode',
        textField: 'kode',
        mode: 'remote',
        sortName: 'kode',
        sortOrder: 'asc',
        rowStyler: function(index, row) {
          if (row.status == 0) {
            return 'background-color:#A8AEA6';
          }
        },
        columns: [
          [{
              field: 'uuidbeli',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 100,
              sortable: true
            },
            {
              field: 'tgltrans',
              title: 'Tgl Trans',
              width: 100,
              sortable: true
            },
          ]
        ],
        onSelect: function(index, row) {
          load_data_detail_beli(row.uuidbeli);
        }
      });
    }

    async function load_data_detail_bbm(id) {
      try {
        bukaLoader();
        const response = await fetch(
          link_api.loadDataDetailBarcodeBBM, {
            method: 'POST',
            headers: {
              'Authorization': 'Bearer {{ session('TOKEN') }}',
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({
              uuidbbm: id,
              //   satuanbarcode: $('[name="satuanbarcode"]:checked').val()
            })
          }
        );

        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }

        const res = await response.json();
        if (res.success) {
          $('#list_filter_laporan_penerimaan').datagrid('loadData', res.data);
          $('#list_filter_laporan_penerimaan').datagrid('checkAll');
        }
      } catch (e) {
        showErrorAlert(e);
      } finally {
        tutupLoader();
      }
    }

    async function load_data_detail_beli(id) {
      try {
        bukaLoader();
        const response = await fetch(
          link_api.loadDataDetailBarcodePembelian, {
            method: 'POST',
            headers: {
              'Authorization': 'Bearer {{ session('TOKEN') }}',
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({
              uuidbeli: id,
              satuanbarcode: $('[name="satuanbarcode"]:checked').val()
            })
          }
        );

        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }

        const res = await response.json();
        if (res.success) {
          $.messager.confirm(
            'Konfirmasi',
            'Apakah anda ingin menyetak barcode sesuai jumlah pembelian?',
            function(confirm) {
              if (!confirm) {
                for (var i = 0; i < res.data.length; i++) {
                  res.data[i].jml = 1;
                }
              }

              $('#list_filter_laporan_beli').datagrid('loadData', res.data);
              $('#list_filter_laporan_beli').datagrid('checkAll');
            }
          );
        }
      } catch (e) {
        showErrorAlert(e);
      } finally {
        tutupLoader();
      }
    }

    function browse_data_lokasi_hargajual(id) {
      $(id).combogrid({
        panelWidth: 300,
        url: link_api.browseLokasi,
        idField: 'uuidlokasi',
        textField: 'nama',
        mode: 'local',
        sortName: 'kode',
        sortOrder: 'asc',
        rowStyler: function(index, row) {
          if (row.status == 0) {
            return 'background-color:#A8AEA6';
          }
        },
        columns: [
          [{
              field: 'kode',
              title: 'Kode',
              width: 80,
              sortable: false
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 150,
              sortable: false
            },
          ]
        ],
      });
    }
  </script>
@endpush
