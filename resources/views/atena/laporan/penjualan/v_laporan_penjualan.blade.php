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
          <td id="label_laporan">Piutang</td>
          <td id="label_laporan">
            <select id="cbStatusLunas" class="easyui-combobox" name="cbstatuslunas" data-options="iconCls:'',"
              style="width:220px">
              <option value="SEMUA">Semua</option>
              <option value="LUNAS">Lunas</option>
              <option value="BELUM">Belum</option>
            </select>
          </td>
        </tr>
        <tr>
          <td id="label_laporan">Validasi </td>
          <td id="label_laporan">
            <div id="cbValidasiKirim" class="easyui-combogrid" name="cbvalidasikirim[]" data-options="iconCls:'',">

            </div>
          </td>
        </tr>
        <tr>
          <td id="label_laporan">S. Bayar </td>
          <td><input id="txt_syaratbayar" name="txt_syaratbayar[]" style="width:220px" /></td>
        </tr>
        <tr>
          <td id="label_laporan">Maksimal Terjual <div class="hint" id="hint-maxterjual"></div>
          </td>
          <td><input class="number" id="txt_max_terjual" name="txt_max_terjual" style="width:220px" /></td>
        </tr>
        <tr>
          <td id="label_laporan">Catatan Penjualan</td>
          <td><input id="txt_catatan" class="label_input" name="txt_catatan" style="width:220px" /></td>
        </tr>
        <tr>
          <td id="label_laporan">
            Kolom
          </td>
          <td>
            <select id="kolom" class="easyui-combobox" name="kolom" style="width:220px;">
              <option value="tjual.kodejual">Kode Penjualan</option>
              <option value="treturjual.kodereturjual">Kode Retur Penjualan</option>
              <option value="mcustomer.kodecustomer">Kode Pelanggan</option>
              <option value="mcustomer.namacustomer">Nama Pelanggan</option>
              <option value="mcustomer.kodecustomerpajak">Kode Customer Pajak</option>
              <option value="mcustomer.namacustomerpajak">Nama Customer Pajak</option>
              <option value="mcustomer.kota">Nama Kota</option>
              <option value="mcustomer.propinsi">Nama Propinsi</option>
              <option value="mkaryawan.kodekaryawan">Kode Marketing</option>
              <option value="mkaryawan.namakaryawan">Nama Marketing</option>
              <option value="mbarang.kodebarang">Kode Barang</option>
              <option value="mbarang.namabarang">Nama Barang</option>
              <option value="mbarangkategori.namakategori">Nama Kategori</option>
              <option value="mmerk.kodemerk">Kode Merk</option>
              <option value="mmerk.namamerk">Nama Merk</option>
              <option value="mbarang.barcodesatuan1">Barcode</option>
              <option value="mbarang.partnumber">Part Number</option>
              <option value="identitas">No. NPWP / NIK</option>
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
            <div id="hide_nilai_list_jual">
              <input id="txt_nilai_list_jual" name="txt_nilai_list_jual" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_retur_jual" hidden>
              <input id="txt_nilai_list_retur_jual" name="txt_nilai_list_retur_jual" style="width:220px"
                prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_customer" hidden>
              <input id="txt_nilai_list_customer" name="txt_nilai_list_customer" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_customer_pajak" hidden>
              <input id="txt_nilai_list_customer_pajak" name="txt_nilai_list_customer_pajak" style="width:220px"
                prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_kota" hidden>
              <input id="txt_nilai_list_kota" name="txt_nilai_list_kota" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_propinsi" hidden>
              <input id="txt_nilai_list_propinsi" name="txt_nilai_list_propinsi" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_marketing" hidden>
              <input id="txt_nilai_list_marketing" name="txt_nilai_list_marketing" style="width:220px"
                prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_barang" hidden>
              <input id="txt_nilai_list_barang" name="txt_nilai_list_barang" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_merk" hidden>
              <input id="txt_nilai_list_merk" name="txt_nilai_list_merk" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_kategori" hidden>
              <input id="txt_nilai_list_kategori" name="txt_nilai_list_kategori" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_barcode" hidden>
              <input id="txt_nilai_list_barcode" name="txt_nilai_list_barcode" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_partnumber" hidden>
              <input id="txt_nilai_list_partnumber" name="txt_nilai_list_partnumber" style="width:220px"
                prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_identitas" hidden>
              <input id="txt_nilai_list_identitas" name="txt_nilai_list_identitas" style="width:220px"
                prompt="Nilai" />
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
    var kolom = "Kode Penjualan";
    var namaKolom = "Penjualan";
    var kolomVal = "tjual.kodejual"
    var checkData = "Kode";
    var operator = "Adalah";
    var operatorVal = "ADALAH";
    var tipedata = "STRING"
    var keteranganBarcode = "";
    const fieldMap = {
      'Pelanggan': '#hide_nilai_list_customer',
      'Customer Pajak': '#hide_nilai_list_customer_pajak',
      'Marketing': '#hide_nilai_list_marketing',
      'Barang': '#hide_nilai_list_barang',
      'Penjualan': '#hide_nilai_list_jual',
      'Retur Penjualan': '#hide_nilai_list_retur_jual',
      'Kota': '#hide_nilai_list_kota',
      'Propinsi': '#hide_nilai_list_propinsi',
      'Merk': '#hide_nilai_list_merk',
      'Kategori': '#hide_nilai_list_kategori',
      'Barcode': '#hide_nilai_list_barcode',
      'Part Number': '#hide_nilai_list_partnumber',
      'No. NPWP / NIK': '#hide_nilai_list_identitas',
    };
    const allFields = Object.values(fieldMap).join(', ');

    $(document).ready(async function() {
      isiOperatorLaporan("String", "operatorString");
      isiOperatorLaporan("Number", "operatorNumber");
      browse_data_lokasi('#txt_lokasi');
      browse_data_customer('#txt_nilai_list_customer');
      browse_data_customer_pajak('#txt_nilai_list_customer_pajak');
      browse_data_marketing('#txt_nilai_list_marketing');
      browse_data_barang('#txt_nilai_list_barang');
      browse_data_jual('#txt_nilai_list_jual');
      browse_data_retur_jual('#txt_nilai_list_retur_jual');
      browse_data_syaratbayar('#txt_syaratbayar');
      browse_data_kota('#txt_nilai_list_kota');
      browse_data_propinsi('#txt_nilai_list_propinsi');
      browse_data_merk('#txt_nilai_list_merk');
      browse_data_kategori('#txt_nilai_list_kategori');
      browse_data_barcode('#txt_nilai_list_barcode');
      browse_data_partnumber('#txt_nilai_list_partnumber');
      browse_data_identitas('#txt_nilai_list_identitas');

      create_hint(
        '#hint-maxterjual',
        'Menampilkan barang yang penjualannya dibawah nilai tertentu.<br> Hanya berlaku untuk laporan barang terjual di bawah target'
      );

      try {
        const response = await fetch(
          link_api.browseLokasi, {
            method: 'POST',
            headers: {
              'Authorization': 'Bearer {{ session('TOKEN') }}',
              'Content-Type': 'application/json'
            },
          }
        );

        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }

        const res = await response.json();
        if (res.success) {
          var arrayLokasi = [];

          for (var i = 0; i < res.data.length; i++) {
            arrayLokasi.push(res.data[i].kode);
          }

          $('#txt_lokasi').combogrid("setValues", arrayLokasi);
        }
      } catch (e) {
        showErrorAlert(e);
      }

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
              field: 'text',
              width: '96%',
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
          value: 'REGISTERCUSTOMER',
          jenis: 'Register per Customer'
        },
        {
          value: 'REGISTERMARKETING',
          jenis: 'Register per Marketing'
        },
        {
          value: 'REGISTERMERK',
          jenis: 'Register per Merk'
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
          value: 'REKAPMARKETING',
          jenis: 'Rekap per Marketing'
        },
        {
          value: 'REKAPCUSTOMER',
          jenis: 'Rekap per Customer'
        },
        {
          value: 'REKAPCUSTOMER2',
          jenis: 'Rekap per Customer 2'
        },
        {
          value: 'REKAPCARABAYAR',
          jenis: 'Rekap per Cara Bayar'
        },
        {
          value: 'REKAPLOKASI',
          jenis: 'Rekap per Lokasi'
        },
        {
          value: 'LABAFAKTUR',
          jenis: 'Laba per Faktur'
        },
        {
          value: 'LABABARANG',
          jenis: 'Laba per Barang'
        },
        {
          value: 'BARANGDIBAWAHTARGET',
          jenis: 'Barang Terjual di Bawah Target'
        },
      ];

      $('#list_tampil_laporan').datalist({
        width: 280,
        height: 255,
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

      $('#cbValidasiKirim').combogrid({
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
              title: 'Status Validasi Kirim',
              width: 200
            },
          ]
        ],

      });
      $('#cbValidasiKirim').combogrid("grid").datagrid("appendRow", {
        value: '0',
        status: 'Belum Input'
      });
      $('#cbValidasiKirim').combogrid("grid").datagrid("appendRow", {
        value: '1',
        status: 'Kirim'
      });
      $('#cbValidasiKirim').combogrid("grid").datagrid("appendRow", {
        value: '2',
        status: 'Pending'
      });
      $('#cbValidasiKirim').combogrid("grid").datagrid("appendRow", {
        value: '3',
        status: 'Tuntas'
      });

      //$('#cbValidasiKirim').combogrid("setValues",["0","1","2","3"]);

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
        value: 'JUAL',
        jenis: 'Penjualan'
      });
      $('#cbJenis').combogrid("grid").datagrid("appendRow", {
        value: 'RETUR',
        jenis: 'Retur Penjualan'
      });

      $('#cbJenis').combogrid("setValues", ["JUAL", "RETUR"]);
      $("#operatorString").combobox('setValues', operatorVal);
      tutupLoader();
    });


    //FILTER KOLOM
    $("#kolom").combobox({
      onChange: function() {
        kolom = $("#kolom").combobox('getText');
        kolomVal = $("#kolom").combobox('getValue');

        checkData = kolom.substr(0, 4); // CEK NAMA FILTER, APAKAH KODE DAN NAMA
        namaKolom = kolom.substr(5, kolom.length - 1); // CEK JENIS FILTER APA (SUPPLIER,BARANG,PO)

        if (checkData == "Kode" || checkData == "Nama" || kolom == "Barcode" || kolom == "Part Number" || kolom ==
          "No. NPWP / NIK" || kolom == "No. Pajak") {
          $(allFields).hide();
          const fieldToShow = fieldMap[namaKolom] || fieldMap[kolom];
          if (fieldToShow) {
            $(fieldToShow).show();
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

          $(allFields).hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();

          $("#operatorNumber").combobox('setValues', 'SAMA DENGAN');
          operator = "Sama dengan";
          operatorVal = "SAMA DENGAN";
        }

        //CLEAR FIELD SETIAP UBAH
        $('#txt_nilai_list_retur_jual').combogrid('clear');
        $('#txt_nilai_list_customer_pajak').combogrid('clear');
        $('#txt_nilai_list_customer').combogrid('clear');
        $('#txt_nilai_list_marketing').combogrid('clear');
        $('#txt_nilai_list_jual').combogrid('clear');
        $('#txt_nilai_list_barang').combogrid('clear');
        $('#txt_nilai_list_kota').combogrid('clear');
        $('#txt_nilai_list_propinsi').combogrid('clear');
        $('#txt_nilai_list_merk').combogrid('clear');
        $('#txt_nilai_list_kategori').combogrid('clear');
        $('#txt_nilai_list_barcode').combogrid('clear');
        $('#txt_nilai_list_partnumber').combogrid('clear');
        $('#txt_nilai_list_identitas').combogrid('clear');
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
          $(allFields).hide();
          const fieldToShow = fieldMap[namaKolom] || fieldMap[kolom];
          if (fieldToShow) {
            $(fieldToShow).show();
          }

          $('#hide_nilai').hide();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('enable');
        } else if (operatorStringVal == "KOSONG" || operatorStringVal == "TIDAK KOSONG") {
          $(allFields).hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $(allFields).hide();

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
          $(allFields).hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $(allFields).hide();

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
      if (namaKolom == 'Pelanggan' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_customer').combogrid('getValue');

        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Customer Pajak' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_customer_pajak').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Marketing' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_marketing').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }

      } else if (namaKolom == 'Barang' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_barang').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Penjualan' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_jual').combogrid('getValue')
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Retur Penjualan' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_retur_jual').combogrid('getValue')
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Kota' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_kota').combogrid('getValue')
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Propinsi' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_propinsi').combogrid('getValue')
        if (nilai != "") {
          checknilai = 1;
        }

      } else if (namaKolom == 'Merk' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_merk').combogrid('getValue')
        if (nilai != "") {
          checknilai = 1;
        }

      } else if (namaKolom == 'Kategori' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_kategori').combogrid('getValue')
        if (nilai != "") {
          checknilai = 1;
        }

      } else if (kolom == 'Barcode' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_barcode').combogrid('getValue')
        kolomVal = keteranganBarcode;
        if (nilai != "") {
          checknilai = 1;
        }

      } else if (kolom == 'Part Number' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_partnumber').combogrid('getValue')
        if (nilai != "") {
          checknilai = 1;
        }

      } else if (kolom == 'No. NPWP / NIK' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_identitas').combogrid('getValue')
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
        //TAMBAHAN  KARNA MENGGUNAKAN BADANUSAHA
        if (namaKolom == 'Customer' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
          var msg = $('#txt_nilai_list_customer').combogrid('grid').datagrid("getSelected");

          if (msg != null) //NAMA
          {
            text_laporan = kolom + " " + operator + " " + nilai + ", " + msg.badanusaha;
          }
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
      var getLokasi = $('#txt_lokasi').combogrid('grid');
      var lokasi = getLokasi.datagrid('getSelected');
      var jenistrans = $('#cbJenis').combogrid("getValues").length;

      if (lokasi != null && jenistrans > 0) {
        cetakLaporan('ya');
      } else if (jenistrans == 0) {
        $.messager.alert('Warning', 'Jenis Transaksi Tidak Boleh Kosong');
      } else {
        $.messager.alert('Warning', 'Data Lokasi Tidak Boleh Kosong');
      }
    });

    function cetakLaporan(excel) {
      parent.buka_laporan(link_api.laporanPenjualan, {
        lokasi: JSON.stringify($('#txt_lokasi').combogrid('getValues')),
        data_filter: JSON.stringify($("#list_filter_laporan").datagrid('getChecked')),
        data_tampil: JSON.stringify($("#list_tampil_laporan").datagrid('getChecked')),
        tglawal: $('#txt_tgl_aw').datebox('getValue'),
        tglakhir: $('#txt_tgl_ak').datebox('getValue'),
        jenis_transaksi: JSON.stringify($('#cbJenis').combogrid("getValues")),
        jenis_status: JSON.stringify($('#cbStatus').combogrid("getValues")),
        status_piutang: $('#cbStatusLunas').combogrid("getValues"),
        jenis_validasi_kirim: JSON.stringify($('#cbValidasiKirim').combogrid("getValues")),
        syarat_bayar: JSON.stringify($("#txt_syaratbayar").combogrid('getValues')),
        catatan: $('#txt_catatan').textbox('getValue'),
        max_terjual: $('#txt_max_terjual').numberbox('getValue'),
        excel: excel,
        filename: "Laporan Penjualan",
        kode: "{{ $kodemenu }}"
      });
    }

    $("#btn_print").click(function() {
      var getLokasi = $('#txt_lokasi').combogrid('grid');
      var lokasi = getLokasi.datagrid('getSelected');
      var jenistrans = $('#cbJenis').combogrid("getValues").length;

      if (lokasi != null && jenistrans > 0) {
        cetakLaporan('tidak');
      } else if (jenistrans == 0) {
        $.messager.alert('Warning', 'Jenis Transaksi Tidak Boleh Kosong');
      } else {
        $.messager.alert('Warning', 'Data Lokasi Tidak Boleh Kosong');
      }
    });

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

    function browse_data_syaratbayar(id) {
      $(id).combogrid({
        panelWidth: 250,
        url: link_api.browseSyaratBayar,
        idField: 'uuidsyaratbayar',
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

    function browse_data_kota(id) {
      $(id).combogrid({
        panelWidth: 250,
        url: link_api.browseKotaCustomer,
        idField: 'nama',
        textField: 'nama',
        mode: 'local',
        sortName: 'nama',
        sortOrder: 'asc',
        multiple: false,
        selectFirstRow: true,
        rowStyler: function(index, row) {
          if (row.status == 0) {
            return 'background-color:#A8AEA6';
          }
        },
        columns: [
          [{
            field: 'nama',
            title: 'Nama',
            width: 220,
            sortable: true
          }, ]
        ]
      });
    }

    function browse_data_propinsi(id) {
      $(id).combogrid({
        panelWidth: 250,
        url: link_api.browsePropinsiCustomer,
        idField: 'nama',
        textField: 'nama',
        mode: 'local',
        sortName: 'nama',
        sortOrder: 'asc',
        multiple: false,
        selectFirstRow: true,
        rowStyler: function(index, row) {
          if (row.status == 0) {
            return 'background-color:#A8AEA6';
          }
        },
        columns: [
          [{
            field: 'nama',
            title: 'Nama',
            width: 220,
            sortable: true
          }, ]
        ]
      });
    }

    function browse_data_customer(id) {
      $(id).combogrid({
        panelWidth: 740,
        url: link_api.browseCustomer,
        idField: 'nama',
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
        onSelect: function(index, data, checkdata) {
          if (checkData == "Kode") {
            $('#txt_nilai_list_customer').combogrid('setValue', data.kode);
          } else if (checkData == "Nama") {
            $('#txt_nilai_list_customer').combogrid('setValue', data.nama);
          }
        }
      });
    }


    function browse_data_customer_pajak(id) {
      $(id).combogrid({
        panelWidth: 650,
        url: link_api.browsePajakCustomer,
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
              title: 'Nama Faktur Pajak',
              width: 240,
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
            $('#txt_nilai_list_customer_pajak').combogrid('setValue', data.kode);
          } else if (checkData == "Nama") {
            $('#txt_nilai_list_customer_pajak').combogrid('setValue', data.nama);
          }
        }
      });
    }

    function browse_data_marketing(id) {
      $(id).combogrid({
        panelWidth: 740,
        url: link_api.browseKaryawanMarketing,
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
        onBeforeLoad: function(param) {
          param.divisi = 'marketing';
        },
        columns: [
          [{
              field: 'uuidkaryawan',
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
              width: 240,
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
            $('#txt_nilai_list_marketing').combogrid('setValue', data.kode);
          } else if (checkData == "Nama") {
            $('#txt_nilai_list_marketing').combogrid('setValue', data.nama);
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
        loadMsg: 'Loading...',
        onShowPanel: function() {
          const $cg = $(this);
          const grid = $cg.combogrid('grid');
          const rows = grid.datagrid('getRows');
          if (rows.length == 0) {
            $cg.next().find('.textbox-text').attr('placeholder', 'Ketikkan Kode / Nama Barang');
          }
        },
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
        panelWidth: 650,
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

    function browse_data_barcode(id) {
      $(id).combogrid({
        panelWidth: 300,
        url: link_api.browseGridBarcodeBarang,
        idField: 'kode',
        textField: 'kode',
        mode: 'remote',
        sortName: 'kode',
        sortOrder: 'asc',
        columns: [
          [{
              field: 'keterangan',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Barcode',
              width: 270,
              sortable: true
            },
          ]
        ],
        onSelect: function(index, data) {
          keteranganBarcode = data.keterangan;
          $('#txt_nilai_list_barcode').combogrid('setValue', data.kode);
        }
      });
    }

    function browse_data_partnumber(id) {
      $(id).combogrid({
        panelWidth: 300,
        url: link_api.browseGridPartNumber,
        idField: 'kode',
        textField: 'kode',
        mode: 'remote',
        sortName: 'kode',
        sortOrder: 'asc',
        columns: [
          [{
            field: 'kode',
            title: 'Part Number',
            width: 270,
            sortable: true
          }, ]
        ],
        onSelect: function(index, data) {
          $('#txt_nilai_list_partnumber').combogrid('setValue', data.kode);
        }
      });
    }

    function browse_data_identitas(id) {
      $(id).combogrid({
        panelWidth: 530,
        url: link_api.browseGridIdentitasCustomer,
        idField: 'kode',
        textField: 'kode',
        mode: 'remote',
        sortName: 'kode',
        sortOrder: 'asc',
        columns: [
          [{
              field: 'nama',
              title: 'Customer',
              width: 200,
              sortable: true
            },
            {
              field: 'npwp',
              title: 'NPWP',
              width: 150,
              sortable: true
            },
            {
              field: 'noktp',
              title: 'NIK',
              width: 150,
              sortable: true
            },
          ]
        ],
        onSelect: function(index, data) {
          $('#txt_nilai_list_identitas').combogrid('setValue', data.npwp + ' / ' + data.noktp);
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

    function browse_data_jual(id) {
      $(id).combogrid({
        panelWidth: 230,
        url: link_api.browseGridJual,
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
              field: 'uuidjual',
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

    function browse_data_retur_jual(id) {
      $(id).combogrid({
        panelWidth: 230,
        url: link_api.browseGridReturPenjualan,
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
              field: 'uuidreturjual',
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
  </script>
@endpush
