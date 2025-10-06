@extends('template.app')

@section('content')
  <div class="easyui-layout" style="width:350px;height:100%; font-weight:bold;" fit="true">
    <div class="panel-filter-laporan" data-options="region:'west',hideCollapsedContent:false" title="{{ $menu }}">
      <table style="border-bottom:1px #000" id="label_laporan">
        <!-- FILTER LAPORAN -->
        <tr>
          <td id="label_laporan" style="width:55px">Lokasi </td>
          <td><input id="txt_lokasi" name="txt_lokasi[]" style="width:220px" /></td>
        </tr>
        <tr>
          <td id="label_laporan">Tgl. Trans </td>
          <td id="label_laporan"><input id="txt_tgl_aw" name="txt_tgl_aw" style="width:105px;" class="date" /> -
            <input id="txt_tgl_ak" name="txt_tgl_ak" style="width:105px;" class="date" />
          </td>
        </tr>
        <tr>
          <td id="label_laporan">S. Bayar </td>
          <td><input id="txt_syaratbayar" name="txt_syaratbayar[]" style="width:220px" /></td>
        </tr>
        <tr>
          <td id="label_laporan">Jenis</td>
          <td id="label_laporan">
            <div id="cbJenis" class="easyui-combogrid" name="cbjenis[]" data-options="iconCls:'',">

            </div>
          </td>
        </tr>
        <tr>
          <td id="label_laporan">Status </td>
          <td id="label_laporan">
            <div id="cbStatus" class="easyui-combogrid" name="cbstatus[]" data-options="iconCls:'',">

            </div>
          </td>
        </tr>
        <tr>
          <td id="label_laporan">
            Kolom
          </td>
          <td>
            <select id="kolom" class="easyui-combobox" name="kolom" style="width:220px;">
              <option value="tbeli.kodebeli">Kode Pembelian</option>
              <option value="treturbeli.kodereturbeli">Kode Retur Pembelian</option>
              <option value="msupplier.kodesupplier">Kode Supplier</option>
              <option value="msupplier.namasupplier">Nama Supplier</option>
              <option value="mbarang.kodebarang">Kode Barang</option>
              <option value="mbarang.namabarang">Nama Barang</option>
              <option value="mbarangkategori.namakategori">Nama Kategori</option>
              <option value="mmerk.kodemerk">Kode Merk</option>
              <option value="mmerk.namamerk">Nama Merk</option>
            </select>
          </td>
        </tr>
        <tr>
          <td id="label_laporan">
            Operator
          </td>
          <td>
            <div id="lap_operatorString">
              <select id="operatorString" class="easyui-combobox" name="operatorstring" style="width:220px;">

              </select>
            </div>
            <div id="lap_operatorNumber" hidden>
              <select id="operatorNumber" class="easyui-combobox" name="operatornumber" style="width:220px;">

              </select>
            </div>
          </td>
        </tr>
        <tr>
          <td id="label_laporan" class="label_nilai">Nilai </td>
          <td>
            <div id="hide_nilai" hidden>
              <input class="label_input" id="txt_nilai" name="txt_nilai" style="width:220px" prompt="Nilai">
            </div>
            <div id="hide_nilai_list_beli">
              <input id="txt_nilai_list_beli" name="txt_nilai_list_beli" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_retur_beli" hidden>
              <input id="txt_nilai_list_retur_beli" name="txt_nilai_list_retur_beli" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_supplier" hidden>
              <input id="txt_nilai_list_supplier" name="txt_nilai_list_supplier" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_kategori" hidden>
              <input id="txt_nilai_list_kategori" name="txt_nilai_list_kategori" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_barang" hidden>
              <input id="txt_nilai_list_barang" name="txt_nilai_list_barang" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_merk" hidden>
              <input id="txt_nilai_list_merk" name="txt_nilai_list_merk" style="width:220px" prompt="Nilai" />
            </div>
          </td>
        </tr>
        <tr valign="top">
          <td colspan="2">
            <ul class="easyui-datagrid" title="Parameter Kolom" name="list_filter_laporan" id="list_filter_laporan"
              lines="true" data-options="tools:'#title_parameter'">
            </ul>
          </td>
        </tr>
        <tr valign="top">
          <td colspan="2">
            <ul class="easyui-datalist" title="Jenis Laporan" name="list_tampil_laporan" id="list_tampil_laporan">
            </ul>
          </td>
        </tr>
      </table>
    </div>
    <div data-options="region:'center'">
      <div class="easyui-layout" style="width: 100%;height: 100%">
        <div data-options="region: 'west'" class="btn-group-laporan">
          <a id="btn_print" title="Tampilkan Data." class="easyui-tooltip " valign="center"
            style="margin-top:5px; padding-top:5px;" data-options="iconCls:'', plain:false">
            <img src="{{ asset('assets/images/view.png') }}" style="width:40px;">
          </a>
          <a id="btn_export_excel" title="Ekspor Data ke Excel." class="easyui-tooltip"
            style="margin-top:5px; padding-top:5px;" data-options="iconCls:'', plain:false">
            <img src="{{ asset('assets/images/excel.png') }}" style="width:40px;">
          </a>
        </div>
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
    var kolom = "Kode Pembelian";
    var namaKolom = "Pembelian";
    var kolomVal = "tbeli.kodebeli"
    var checkData = "Kode";
    var operator = "Adalah";
    var operatorVal = "ADALAH";
    var tipedata = "STRING"

    $(document).ready(function() {
      isiOperatorLaporan("String", "operatorString");
      isiOperatorLaporan("Number", "operatorNumber");

      browse_data_lokasi('#txt_lokasi');
      browse_data_supplier('#txt_nilai_list_supplier');
      browse_data_barang('#txt_nilai_list_barang');
      browse_data_beli('#txt_nilai_list_beli');
      browse_data_retur_beli('#txt_nilai_list_retur_beli');
      browse_data_syaratbayar('#txt_syaratbayar');
      browse_data_kategori('#txt_nilai_list_kategori');
      browse_data_merk('#txt_nilai_list_merk');

      //SET SEMUA LOKASI
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: base_url + 'atena/Master/Data/Lokasi/ComboGrid',
        cache: false,
        success: function(msg) {

          var arrayLokasi = [];

          for (var i = 0; i < msg.rows.length; i++) {
            arrayLokasi.push(msg.rows[i].kode);
          }

          $('#txt_lokasi').combogrid("setValues", arrayLokasi);
        }
      });

      $('#list_filter_laporan').datagrid({
        width: 280,
        height: 160,
        selectOnCheck: false,
        showHeader: false,
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
              field: 'text'
            },
          ]
        ],
      });


      //JENIS TAMPILAN LAPORAN
      var arrayTampilLaporan = [{
          value: 'REGISTER',
          jenis: 'Register'
        },
        {
          value: 'REGISTERBARANG',
          jenis: 'Register per Barang'
        },
        {
          value: 'REGISTERSUPPLIER',
          jenis: 'Register per Supplier'
        },
        {
          value: 'REGISTERKATEGORI',
          jenis: 'Register per Kategori'
        },
        {
          value: 'REGISTERLOKASI',
          jenis: 'Register per Lokasi'
        },
        {
          value: 'REKAP',
          jenis: 'Rekap'
        },
        {
          value: 'REKAPSUPPLIER',
          jenis: 'Rekap per Supplier'
        },
        {
          value: 'REKAPLOKASI',
          jenis: 'Rekap per Lokasi'
        },
      ];

      $('#list_tampil_laporan').datalist({
        width: 280,
        height: 155,
        checkbox: true,
        data: arrayTampilLaporan,
        columns: [
          [{
            field: 'jenis',
            title: 'Status',
            width: 200
          }, ]
        ],
      });
      //SET CHECK REKAP
      $('#list_tampil_laporan').datalist('checkRow', 0);

      $('#cbStatus').combogrid({
        width: 220,
        idField: 'value',
        textField: 'status',
        multiple: true,
        selectFirstRow: true,
        columns: [
          [{
              field: 'value',
              hidden: true
            },
            {
              field: 'status',
              title: 'Status',
              width: 60
            },
            {
              field: 'keterangan',
              title: 'Keterangan',
              width: 200
            },
          ]
        ],

      });
      $('#cbStatus').combogrid("grid").datagrid("appendRow", {
        value: 'I',
        status: 'Input',
        keterangan: 'Transaksi belum dicetak'
      });
      $('#cbStatus').combogrid("grid").datagrid("appendRow", {
        value: 'S',
        status: 'Slip',
        keterangan: 'Transaksi sudah dicetak'
      });
      $('#cbStatus').combogrid("grid").datagrid("appendRow", {
        value: 'P',
        status: 'Posting',
        keterangan: 'Transaksi sudah dilunasi'
      });
      $('#cbStatus').combogrid("grid").datagrid("appendRow", {
        value: 'D',
        status: 'Delete',
        keterangan: 'Transaksi dibatalkan'
      });

      $('#cbStatus').combogrid("setValues", ["I", "S", "P"]);

      $('#cbJenis').combogrid({
        width: 220,
        idField: 'value',
        textField: 'jenis',
        multiple: true,
        selectFirstRow: true,
        columns: [
          [{
              field: 'value',
              hidden: true
            },
            {
              field: 'jenis',
              title: 'Jenis Transaksi',
              width: 200
            },
          ]
        ],

      });

      $('#cbJenis').combogrid("grid").datagrid("appendRow", {
        value: 'BELI',
        jenis: 'Pembelian'
      });
      $('#cbJenis').combogrid("grid").datagrid("appendRow", {
        value: 'RETUR',
        jenis: 'Retur Pembelian'
      });

      $('#cbJenis').combogrid("setValues", ["BELI", "RETUR"]);
      tutupLoader();
    });

    //FILTER KOLOM
    $("#kolom").combobox({
      onChange: function() {
        kolom = $("#kolom").combobox('getText');
        kolomVal = $("#kolom").combobox('getValue');

        checkData = kolom.substr(0, 4); // CEK NAMA FILTER, APAKAH KODE DAN NAMA
        namaKolom = kolom.substr(5, kolom.length - 1); // CEK JENIS FILTER APA (SUPPLIER,BARANG,BELI,RETUR BELI)


        if (checkData == "Kode" || checkData == "Nama") {
          //UNTUK KOLOM BESERTA COMBOGRID
          if (namaKolom == 'Barang') {
            $('#hide_nilai_list_barang').show();
            $('#hide_nilai_list_supplier').hide();
            $('#hide_nilai_list_beli').hide();
            $('#hide_nilai_list_retur_beli').hide();
            $('#hide_nilai_list_kategori').hide();
            $('#hide_nilai_list_merk').hide();
          } else if (namaKolom == 'Supplier') {
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_supplier').show();
            $('#hide_nilai_list_beli').hide();
            $('#hide_nilai_list_retur_beli').hide();
            $('#hide_nilai_list_kategori').hide();
            $('#hide_nilai_list_merk').hide();
          } else if (namaKolom == 'Pembelian') {
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_supplier').hide();
            $('#hide_nilai_list_beli').show();
            $('#hide_nilai_list_retur_beli').hide();
            $('#hide_nilai_list_kategori').hide();
            $('#hide_nilai_list_merk').hide();
          } else if (namaKolom == 'Retur Pembelian') {
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_supplier').hide();
            $('#hide_nilai_list_beli').hide();
            $('#hide_nilai_list_retur_beli').show();
            $('#hide_nilai_list_kategori').hide();
            $('#hide_nilai_list_merk').hide();
          } else if (namaKolom == 'Kategori') {
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_supplier').hide();
            $('#hide_nilai_list_beli').hide();
            $('#hide_nilai_list_retur_beli').hide();
            $('#hide_nilai_list_kategori').show();
            $('#hide_nilai_list_merk').hide();
          } else if (namaKolom == 'Merk') {
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_supplier').hide();
            $('#hide_nilai_list_beli').hide();
            $('#hide_nilai_list_retur_beli').hide();
            $('#hide_nilai_list_kategori').hide();
            $('#hide_nilai_list_merk').show();
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

          $('#hide_nilai_list_supplier').hide();
          $('#hide_nilai_list_beli').hide();
          $('#hide_nilai_list_retur_beli').hide();
          $('#hide_nilai_list_barang').hide();
          $('#hide_nilai_list_kategori').hide();
          $('#hide_nilai_list_merk').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();

          $("#operatorNumber").combobox('setValues', 'SAMA DENGAN');
          operator = "Sama dengan";
          operatorVal = "SAMA DENGAN";
        }

        //CLEAR FIELD SETIAP UBAH
        $('#txt_nilai_list_retur_beli').combogrid('clear');
        $('#txt_nilai_list_supplier').combogrid('clear');
        $('#txt_nilai_list_beli').combogrid('clear');
        $('#txt_nilai_list_barang').combogrid('clear');
        $('#txt_nilai_list_kategori').combogrid('clear');
        $('#txt_nilai_list_merk').combogrid('clear');
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

        if (operatorStringVal == "ADALAH" || operatorStringVal == "TIDAK MENCAKUP") {
          //UNTUK KOLOM BESERTA COMBOGRID
          if (namaKolom == 'Barang') {
            $('#hide_nilai_list_barang').show();
            $('#hide_nilai_list_supplier').hide();
            $('#hide_nilai_list_beli').hide();
            $('#hide_nilai_list_retur_beli').hide();
            $('#hide_nilai_list_kategori').hide();
            $('#hide_nilai_list_merk').hide();
          } else if (namaKolom == 'Supplier') {
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_supplier').show();
            $('#hide_nilai_list_beli').hide();
            $('#hide_nilai_list_retur_beli').hide();
            $('#hide_nilai_list_kategori').hide();
            $('#hide_nilai_list_merk').hide();
          } else if (namaKolom == 'Pembelian') {
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_supplier').hide();
            $('#hide_nilai_list_beli').show();
            $('#hide_nilai_list_retur_beli').hide();
            $('#hide_nilai_list_kategori').hide();
            $('#hide_nilai_list_merk').hide();
          } else if (namaKolom == 'Retur Pembelian') {
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_supplier').hide();
            $('#hide_nilai_list_beli').hide();
            $('#hide_nilai_list_retur_beli').show();
            $('#hide_nilai_list_kategori').hide();
            $('#hide_nilai_list_merk').hide();
          } else if (namaKolom == 'Kategori') {
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_supplier').hide();
            $('#hide_nilai_list_beli').hide();
            $('#hide_nilai_list_retur_beli').hide();
            $('#hide_nilai_list_kategori').show();
            $('#hide_nilai_list_merk').hide();
          }

          $('#hide_nilai').hide();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('enable');
        } else if (operatorStringVal == "KOSONG" || operatorStringVal == "TIDAK KOSONG") {
          $('#hide_nilai_list_retur_beli').hide();
          $('#hide_nilai_list_supplier').hide();
          $('#hide_nilai_list_beli').hide();
          $('#hide_nilai_list_barang').hide();
          $('#hide_nilai_list_kategori').hide();
          $('#hide_nilai_list_merk').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_retur_beli').hide();
          $('#hide_nilai_list_supplier').hide();
          $('#hide_nilai_list_beli').hide();
          $('#hide_nilai_list_barang').hide();
          $('#hide_nilai_list_kategori').hide();
          $('#hide_nilai_list_merk').hide();

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
          $('#hide_nilai_list_retur_beli').hide();
          $('#hide_nilai_list_marketing').hide();
          $('#hide_nilai_list_beli').hide();
          $('#hide_nilai_list_barang').hide();
          $('#hide_nilai_list_kategori').hide();
          $('#hide_nilai_list_merk').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_retur_beli').hide();
          $('#hide_nilai_list_supplier').hide();
          $('#hide_nilai_list_beli').hide();
          $('#hide_nilai_list_barang').hide();
          $('#hide_nilai_list_kategori').hide();
          $('#hide_nilai_list_merk').hide();

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
      if (namaKolom == 'Supplier' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_supplier').combogrid('getValue');

        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Barang' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_barang').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Pembelian' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_beli').combogrid('getValue')
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Retur Pembelian' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_retur_beli').combogrid('getValue')
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Kategori' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_kategori').combogrid('getValue')
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Merk' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_merk').combogrid('getValue')
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
        //TAMBAHAN SUPPLIER BETJIK
        if (namaKolom == 'Supplier' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
          var msg = $('#txt_nilai_list_supplier').combogrid('grid').datagrid("getSelected");

          if (msg != null) //NAMA
          {
            text_laporan = kolom + " " + operator + " " + nilai + ", " + msg.badanusaha;
          }
        }
        //PENGGANTI WIDTH SUPAYA TIDAK PENUH
        for (var i = text_laporan.length; i <= 38; i++) {
          text_laporan += "&nbsp;&nbsp;";
        }

        $('#list_filter_laporan').datagrid('appendRow', {
          tipedata: tipedata,
          kolom: kolomVal,
          operator: operatorVal,
          nilai: nilai,
          text: text_laporan,
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
      var rows = $('#list_filter_laporan').datagrid('getSelections'); // get all selected rows
      for (var i = rows.length - 1; i >= 0; i--) {
        var index = $('#list_filter_laporan').datagrid('getRowIndex', rows[i]); // get the row index
        $('#list_filter_laporan').datagrid('deleteRow', index);
      }
    });

    // PRINT LAPORAN
    $("#btn_export_excel").click(function() {
      validasi_session(function() {
        var getLokasi = $('#txt_lokasi').combogrid('grid');
        var lokasi = getLokasi.datagrid('getSelected');
        var jenistrans = $('#cbJenis').combogrid("getValues").length;

        //SIMPAN DATA FILTER
        $('#data_filter').val(JSON.stringify($("#list_filter_laporan").datagrid('getChecked')));

        //SIMPAN DATA JENIS LAPORAN
        $('#data_tampil').val(JSON.stringify($("#list_tampil_laporan").datalist('getChecked')));

        if (lokasi != null && jenistrans > 0) {
          $('#excel').val('ya');
          $('#form_input').attr('target', '_blank');
          $('#form_input').submit();
          return false;
        } else if (jenistrans == 0) {
          $.messager.alert('Warning', 'Jenis Transaksi Tidak Boleh Kosong');
        } else {
          $.messager.alert('Warning', 'Data Lokasi Tidak Boleh Kosong');
        }
      });
    });

    $("#btn_print").click(function() {
      validasi_session(function() {
        var getLokasi = $('#txt_lokasi').combogrid('grid');
        var lokasi = getLokasi.datagrid('getSelected');
        var jenistrans = $('#cbJenis').combogrid("getValues").length;

        //SIMPAN DATA FILTER
        $('#data_filter').val(JSON.stringify($("#list_filter_laporan").datagrid('getChecked')));

        //SIMPAN DATA JENIS LAPORAN
        $('#data_tampil').val(JSON.stringify($("#list_tampil_laporan").datalist('getChecked')));

        if (lokasi != null && jenistrans > 0) {
          $('#excel').val('tidak');
          counter++
          var tab_title = $('#file_name').val();
          var tab_name = tab_title + counter;
          $('#form_input').attr('target', tab_name);

          $('#tab_laporan').tabs('add', {
            title: tab_title,
            content: '<iframe frameborder="0"  id="' + tab_name + '" name="' + tab_name +
              '" width="99%" height="99%" src="#"></iframe>',
            closable: true,
            tools: [{
              iconCls: 'icon-print',
              handler: function() {
                window.frames[tab_name].print();
              }

            }]
          })

          $('#form_input').submit();
          return false;
        } else if (jenistrans == 0) {
          $.messager.alert('Warning', 'Jenis Transaksi Tidak Boleh Kosong');
        } else {
          $.messager.alert('Warning', 'Data Lokasi Tidak Boleh Kosong');
        }
      });
    });

    function browse_data_beli(id) {
      $(id).combogrid({
        panelWidth: 230,
        url: base_url + 'atena/Pembelian/Transaksi/Pembelian/comboGridBeli',
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
              field: 'id',
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
        onSelect: function(index, data, checkdata) {
          if (checkData == "Kode") {
            $('#txt_nilai_list_jual').combogrid('setValue', data.kode);
          } else if (checkData == "Nama") {
            $('#txt_nilai_list_jual').combogrid('setValue', data.nama);
          }
        }

      });
    }

    function browse_data_retur_beli(id) {
      $(id).combogrid({
        panelWidth: 230,
        url: base_url + 'atena/Pembelian/Transaksi/ReturPembelian/comboGridReturBeli',
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
              field: 'id',
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
        onSelect: function(index, data, checkdata) {
          if (checkData == "Kode") {
            $('#txt_nilai_list_retur_jual').combogrid('setValue', data.kode);
          } else if (checkData == "Nama") {
            $('#txt_nilai_list_retur_jual').combogrid('setValue', data.nama);
          }
        }

      });
    }

    function browse_data_lokasi(id) {
      $(id).combogrid({
        panelWidth: 380,
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

    function browse_data_supplier(id) {
      $(id).combogrid({
        panelWidth: 740,
        url: link_api.browseSupplier,
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
              field: 'uuidsupplier',
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
        onSelect: function(index, data, checkdata) {
          if (checkData == "Kode") {
            $('#txt_nilai_list_supplier').combogrid('setValue', data.kode);
          } else if (checkData == "Nama") {
            $('#txt_nilai_list_supplier').combogrid('setValue', data.nama);
          }
        }
      });
    }

    function browse_data_barang(id) {
      $(id).combogrid({
        panelWidth: 650,
        url: link_api.browseBarangAll,
        idField: 'nama',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        onBeforeLoad: function(param) {
          if ('undefined' === typeof param.q || param.q.length == 0) {
            return false;
          }
        },
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

    function browse_data_kategori(id) {
      $(id).combogrid({
        panelWidth: 330,
        url: link_api.browseBarangKategoriLaporan,
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
            field: 'nama',
            title: 'Nama',
            width: 300,
            sortable: true
          }, ]
        ],
        onSelect: function(index, data, checkdata) {
          if (checkData == "Nama") {
            $('#txt_nilai_list_kategori').combogrid('setValue', data.nama);
          }
        }
      });
    }

    function browse_data_syaratbayar(id) {
      $(id).combogrid({
        panelWidth: 250,
        url: base_url + 'atena/Master/Data/SyaratBayar/ComboGrid',
        idField: 'id',
        textField: 'nama',
        mode: 'local',
        sortName: 'selisih',
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
              width: 140,
              sortable: true
            },
          ]
        ]
      });
    }

    function browse_data_merk(id) {
      $(id).combogrid({
        panelWidth: 650,
        url: base_url + 'atena/Master/Data/Merk/comboGrid',
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
              field: 'id',
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
        onSelect: function(index, data, checkdata) {
          if (checkData == "Kode") {
            $('#txt_nilai_list_merk').combogrid('setValue', data.kode);
          } else if (checkData == "Nama") {
            $('#txt_nilai_list_merk').combogrid('setValue', data.nama);
          }
        }
      });
    }
  </script>
@endpush
