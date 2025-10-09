@extends('template.app')

@section('content')
  <div class="easyui-layout" style="width:350px;height:100%; font-weight:bold;" fit="true">
    <div class="panel-filter-laporan" data-options="region:'west',hideCollapsedContent:false" title="{{ $menu }}">

      <table style="border-bottom:1px #000" id="label_laporan">
        <!-- FILTER LAPORAN -->
        <tr>
          <td><label id="label_laporan">Tgl. Trans</label></td>
          <td id="label_laporan" style="padding-left:21px;"><input id="txt_tgl_aw" name="txt_tgl_aw" style="width:95px;"
              class="date" /> - <input id="txt_tgl_ak" name="txt_tgl_ak" style="width:95px;" class="date" /></td>
        </tr>
        <tr>
          <td id="label_laporan">Tgl. Plnasan</td>
          <td id="label_laporan"><input type="checkbox" name="cb_tglpelunasancheckbox" id="cb_tglpelunasancheckbox"
              value="0" style="padding-top:5px;"><input id="txt_tgl_pelunasan" name="txt_tgl_pelunasan"
              style="width:95px;" class="date" /></td>
        </tr>
        <tr>
          <td id="label_laporan">Jth Tempo</td>
          <td id="label_laporan"><input type="checkbox" name="cb_tglcheckbox" id="cb_tglcheckbox" value="0"
              style="padding-top:5px;"><input id="txt_tgl_aw_jatuh_tempo" name="txt_tgl_aw_jatuh_tempo"
              style="width:95px;" class="date" /> - <input id="txt_tgl_ak_jatuh_tempo" name="txt_tgl_ak_jatuh_tempo"
              style="width:95px;" class="date" /></td>
        </tr>
        <tr>
          <td id="label_laporan" style="width:55px">Lokasi </td>
          <td><input id="txt_lokasi" name="txt_lokasi[]" style="width:220px" /></td>
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
              <option value="mcustomer.kodecustomer">Kode Customer</option>
              <option value="mcustomer.namacustomer">Nama Customer</option>
              <option value="mcustomer.kodecustomerpajak">Kode Customer Pajak</option>
              <option value="mcustomer.namacustomerpajak">Nama Customer Pajak</option>
              <option value="mkaryawan.kodekaryawan">Kode Marketing</option>
              <option value="mkaryawan.namakaryawan">Nama Marketing</option>
              <option value="mperkiraan.kodeperkiraan">Kode Perkiraan</option>
              <option value="mperkiraan.namaperkiraan">Nama Perkiraan</option>
              <option value="muser.username">Nama User</option>
              <option value="mcustomer.kota">Nama Kota</option>
              <option value="mcustomer.propinsi">Nama Propinsi</option>
              <option value="kartupiutang.sisa">Saldo</option>
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
            <div id="hide_nilai_list_customer">
              <input id="txt_nilai_list_customer" name="txt_nilai_list_customer" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_customer_pajak" hidden>
              <input id="txt_nilai_list_customer_pajak" name="txt_nilai_list_customer_pajak" style="width:220px"
                prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_marketing" hidden>
              <input id="txt_nilai_list_marketing" name="txt_nilai_list_marketing" style="width:220px"
                prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_kota" hidden>
              <input id="txt_nilai_list_kota" name="txt_nilai_list_kota" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_propinsi" hidden>
              <input id="txt_nilai_list_propinsi" name="txt_nilai_list_propinsi" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_user" hidden>
              <input id="txt_nilai_list_user" name="txt_nilai_list_user" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_perkiraan" hidden>
              <input id="txt_nilai_list_perkiraan" name="txt_nilai_list_perkiraan" style="width:220px"
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
            <ul class="easyui-datalist" title="Tampilkan Secara" name="list_tampil_laporan" id="list_tampil_laporan">
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
    var kolom = "Kode Customer";
    var namaKolom = "Customer";
    var kolomVal = "mcustomer.kodecustomer";
    var checkData = "Kode";
    var operator = "Adalah";
    var operatorVal = "ADALAH";
    var tipedata = "STRING"

    $(document).ready(function() {
      browse_data_lokasi('#txt_lokasi');
      browse_data_customer('#txt_nilai_list_customer');
      browse_data_marketing('#txt_nilai_list_marketing');
      browse_data_customer_pajak('#txt_nilai_list_customer_pajak');
      browse_data_kota('#txt_nilai_list_kota');
      browse_data_propinsi('#txt_nilai_list_propinsi');
      browse_data_perkiraan('#txt_nilai_list_perkiraan');
      browse_data_user('#txt_nilai_list_user');

      //SET SEMUA LOKASI
      setLokasiCombogrid("{{ session('TOKEN') }}", ["#txt_lokasi"]);

      $('#list_filter_laporan').datagrid({
        width: 280,
        height: 160,
        fitColumns: false,
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
              field: 'nilai',
              hidden: true
            },
            {
              field: 'ck',
              checkbox: true
            },
            {
              field: 'text',
              width: 275
            },
          ]
        ],
      });


      //JENIS TAMPILAN LAPORAN
      var arrayTampilLaporan = [{
          value: 'DETAILNOTA',
          jenis: 'Detail Nota'
        },
        {
          value: 'DETAILNOTA2',
          jenis: 'Detail Nota 2'
        },
        {
          value: 'DETAILNOTA3',
          jenis: 'Detail Nota 3'
        },
        {
          value: 'KARTUPIUTANG',
          jenis: 'Kartu'
        },
        {
          value: 'KARTUPIUTANG2',
          jenis: 'Kartu 2'
        },
        {
          value: 'REKAPPIUTANG',
          jenis: 'Rekapitulasi'
        },
        {
          value: 'REKAPPELUNASANPIUTANG',
          jenis: 'Rekapitulasi Pelunasan'
        },
        {
          value: 'RINCIANPELUNASANPIUTANG',
          jenis: 'Rincian Pelunasan'
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
        onClickRow: function(index, row) {
          if (row.value == "DETAILNOTA") {
            $("#cb_tglcheckbox").prop('checked', false);
            $("#cb_tglcheckbox").prop('disabled', false);
          } else {
            $("#cb_tglcheckbox").prop('checked', false);
            $("#cb_tglcheckbox").prop('disabled', true);
            $("#txt_tgl_aw_jatuh_tempo").datebox('disable');
            $("#txt_tgl_ak_jatuh_tempo").datebox('disable');
          }
        }
      });
      //SET CHECK REKAP
      $('#list_tampil_laporan').datalist('checkRow', 0);

      $('#cbStatus').combogrid({
        width: 220,
        idField: 'value',
        textField: 'status',
        multiple: false,
        selectFirstRow: true,
        showHeader: false,
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
        ]
      });
      $('#cbStatus').combogrid("grid").datagrid("appendRow", {
        value: 'SEMUA',
        status: 'Semua'
      });
      $('#cbStatus').combogrid("grid").datagrid("appendRow", {
        value: 'BELUMLUNAS',
        status: 'Belum Lunas'
      });
      $('#cbStatus').combogrid("grid").datagrid("appendRow", {
        value: 'LUNAS',
        status: 'Lunas'
      });

      $('#cbStatus').combogrid("setValues", ["SEMUA", "BELUMLUNAS", "LUNAS"]);

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
        value: 'PERSEDIAAN',
        jenis: 'Penjualan Persediaan'
      });
      $('#cbJenis').combogrid("grid").datagrid("appendRow", {
        value: 'ASET',
        jenis: 'Penjualan Aset'
      });

      $('#cbJenis').combogrid("setValues", ["PERSEDIAAN", "ASET"]);

      $("#txt_tgl_pelunasan").datebox('disable');
      $("#txt_tgl_aw_jatuh_tempo").datebox('disable');
      $("#txt_tgl_ak_jatuh_tempo").datebox('disable');

      // Tambahkan fungsi-fungsi yang diminta
      isiOperatorLaporan("String", "operatorString");
      isiOperatorLaporan("Number", "operatorNumber");
      $('#operatorString').combobox('setValue', operatorVal);
      tutupLoader();
    });

    $("#cb_tglcheckbox").click(function() {
      if ($(this).prop('checked')) {
        $("#txt_tgl_aw_jatuh_tempo").datebox('enable');
        $("#txt_tgl_ak_jatuh_tempo").datebox('enable');
      } else {
        $("#txt_tgl_aw_jatuh_tempo").datebox('disable');
        $("#txt_tgl_ak_jatuh_tempo").datebox('disable');
      }
    });

    $("#cb_tglpelunasancheckbox").click(function() {
      if ($(this).prop('checked')) {
        $("#txt_tgl_pelunasan").datebox('enable');
      } else {
        $("#txt_tgl_pelunasan").datebox('disable');
      }
    });

    //FILTER KOLOM
    $("#kolom").combobox({
      onChange: function() {
        kolom = $("#kolom").combobox('getText');
        kolomVal = $("#kolom").combobox('getValue');

        checkData = kolom.substr(0, 4); // CEK NAMA FILTER, APAKAH KODE DAN NAMA
        namaKolom = kolom.substr(5, kolom.length - 1); // CEK JENIS FILTER APA (SUPPLIER,BARANG,ORDERRETURBELI)


        if (checkData == "Kode" || checkData == "Nama") {
          //UNTUK KOLOM BESERTA COMBOGRID
          if (namaKolom == 'Customer') {
            $('#hide_nilai_list_customer').show();
            $('#hide_nilai_list_customer_pajak').hide();
            $('#hide_nilai_list_kota').hide();
            $('#hide_nilai_list_marketing').hide();
            $('#hide_nilai_list_propinsi').hide();
            $('#hide_nilai_list_perkiraan').hide();
            $('#hide_nilai_list_user').hide();
          } else if (namaKolom == 'Customer Pajak') {
            $('#hide_nilai_list_customer_pajak').show();
            $('#hide_nilai_list_customer').hide();
            $('#hide_nilai_list_kota').hide();
            $('#hide_nilai_list_marketing').hide();
            $('#hide_nilai_list_propinsi').hide();
            $('#hide_nilai_list_perkiraan').hide();
            $('#hide_nilai_list_user').hide();
          } else if (namaKolom == 'Marketing') {
            $('#hide_nilai_list_marketing').show();

            $('#hide_nilai_list_customer').hide();
            $('#hide_nilai_list_customer_pajak').hide();
            $('#hide_nilai_list_kota').hide();
            $('#hide_nilai_list_propinsi').hide();
            $('#hide_nilai_list_perkiraan').hide();
            $('#hide_nilai_list_user').hide();
          } else if (namaKolom == 'Kota') {
            $('#hide_nilai_list_customer_pajak').hide();
            $('#hide_nilai_list_customer').hide();
            $('#hide_nilai_list_kota').show();
            $('#hide_nilai_list_marketing').hide();
            $('#hide_nilai_list_propinsi').hide();
            $('#hide_nilai_list_perkiraan').hide();
            $('#hide_nilai_list_user').hide();
          } else if (namaKolom == 'Propinsi') {
            $('#hide_nilai_list_customer_pajak').hide();
            $('#hide_nilai_list_customer').hide();
            $('#hide_nilai_list_kota').hide();
            $('#hide_nilai_list_marketing').hide();
            $('#hide_nilai_list_propinsi').show();
            $('#hide_nilai_list_perkiraan').hide();
            $('#hide_nilai_list_user').hide();
          } else if (namaKolom == 'Perkiraan') {
            $('#hide_nilai_list_customer_pajak').hide();
            $('#hide_nilai_list_customer').hide();
            $('#hide_nilai_list_kota').hide();
            $('#hide_nilai_list_marketing').hide();
            $('#hide_nilai_list_propinsi').hide();
            $('#hide_nilai_list_perkiraan').show();
            $('#hide_nilai_list_user').hide();
          } else if (namaKolom == 'User') {
            $('#hide_nilai_list_customer_pajak').hide();
            $('#hide_nilai_list_customer').hide();
            $('#hide_nilai_list_kota').hide();
            $('#hide_nilai_list_marketing').hide();
            $('#hide_nilai_list_propinsi').hide();
            $('#hide_nilai_list_perkiraan').hide();
            $('#hide_nilai_list_user').show();
          }

          tipedata = "STRING";
          $('#lap_operatorString').show();
          $('#lap_operatorNumber').hide();


          $('#hide_nilai').hide();
          $('.label_nilai').show();

          $("#operatorString").combobox('setValues', 'ADALAH');
          operator = "Adalah";
          operatorVal = "ADALAH";

          //DEFAULT OPERATOR
          operator = "Adalah";
          operatorVal = "ADALAH";
        } else {
          tipedata = "NUMBER";
          $('#lap_operatorString').hide();
          $('#lap_operatorNumber').show();

          $('#hide_nilai_list_customer').hide();
          $('#hide_nilai_list_customer_pajak').hide();
          $('#hide_nilai_list_kota').hide();
          $('#hide_nilai_list_marketing').hide();
          $('#hide_nilai_list_propinsi').hide();
          $('#hide_nilai_list_perkiraan').hide();
          $('#hide_nilai_list_user').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();

          $("#operatorNumber").combobox('setValues', 'SAMA DENGAN');
          operator = "Sama dengan";
          operatorVal = "SAMA DENGAN";

          //DEFAULT OPERATOR
          operator = "Sama dengan";
          operatorVal = "SAMA DENGAN";
        }

        //CLEAR FIELD SETIAP UBAH
        $('#txt_nilai_list_customer').combogrid('clear');
        $('#txt_nilai_list_customer_pajak').combogrid('clear');
        $('#txt_nilai_list_kota').combogrid('clear');
        $('#txt_nilai_list_marketing').combogrid('clear');
        $('#txt_nilai_list_propinsi').combogrid('clear');
        $('#txt_nilai_list_perkiraan').combogrid('clear');
        $('#txt_nilai_list_user').combogrid('clear');
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
          if (namaKolom == 'Customer') {
            $('#hide_nilai_list_customer').show();
            $('#hide_nilai_list_customer_pajak').hide();
            $('#hide_nilai_list_kota').hide();
            $('#hide_nilai_list_marketing').hide();
            $('#hide_nilai_list_propinsi').hide();
            $('#hide_nilai_list_perkiraan').hide();
            $('#hide_nilai_list_user').hide();
          } else if (namaKolom == 'Customer Pajak') {
            $('#hide_nilai_list_customer_pajak').show();
            $('#hide_nilai_list_customer').hide();
            $('#hide_nilai_list_kota').hide();
            $('#hide_nilai_list_marketing').hide();
            $('#hide_nilai_list_propinsi').hide();
            $('#hide_nilai_list_perkiraan').hide();
            $('#hide_nilai_list_user').hide();
          } else if (namaKolom == 'Marketing') {
            $('#hide_nilai_list_marketing').show();

            $('#hide_nilai_list_customer').hide();
            $('#hide_nilai_list_customer_pajak').hide();
            $('#hide_nilai_list_kota').hide();
            $('#hide_nilai_list_propinsi').hide();
            $('#hide_nilai_list_perkiraan').hide();
            $('#hide_nilai_list_user').hide();
          } else if (namaKolom == 'Kota') {
            $('#hide_nilai_list_customer_pajak').hide();
            $('#hide_nilai_list_customer').hide();
            $('#hide_nilai_list_kota').show();
            $('#hide_nilai_list_marketing').hide();
            $('#hide_nilai_list_propinsi').hide();
            $('#hide_nilai_list_perkiraan').hide();
          } else if (namaKolom == 'Propinsi') {
            $('#hide_nilai_list_customer_pajak').hide();
            $('#hide_nilai_list_customer').hide();
            $('#hide_nilai_list_kota').hide();
            $('#hide_nilai_list_marketing').hide();
            $('#hide_nilai_list_propinsi').show();
            $('#hide_nilai_list_user').hide();
          } else if (namaKolom == 'Perkiraan') {
            $('#hide_nilai_list_customer_pajak').hide();
            $('#hide_nilai_list_customer').hide();
            $('#hide_nilai_list_kota').hide();
            $('#hide_nilai_list_marketing').hide();
            $('#hide_nilai_list_propinsi').hide();
            $('#hide_nilai_list_perkiraan').show();
            $('#hide_nilai_list_user').hide();
          } else if (namaKolom == 'User') {
            $('#hide_nilai_list_customer_pajak').hide();
            $('#hide_nilai_list_customer').hide();
            $('#hide_nilai_list_kota').hide();
            $('#hide_nilai_list_marketing').hide();
            $('#hide_nilai_list_propinsi').hide();
            $('#hide_nilai_list_perkiraan').hide();
            $('#hide_nilai_list_user').show();
          }

          $('#hide_nilai').hide();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('enable');
        } else if (operatorStringVal == "KOSONG" || operatorStringVal == "TIDAK KOSONG") {
          $('#hide_nilai_list_customer').hide();
          $('#hide_nilai_list_customer_pajak').hide();
          $('#hide_nilai_list_kota').hide();
          $('#hide_nilai_list_marketing').hide();
          $('#hide_nilai_list_propinsi').hide();
          $('#hide_nilai_list_perkiraan').hide();
          $('#hide_nilai_list_user').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_customer').hide();
          $('#hide_nilai_list_customer_pajak').hide();
          $('#hide_nilai_list_kota').hide();
          $('#hide_nilai_list_marketing').hide();
          $('#hide_nilai_list_propinsi').hide();
          $('#hide_nilai_list_perkiraan').hide();
          $('#hide_nilai_list_user').hide();

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
          $('#hide_nilai_list_customer').hide();
          $('#hide_nilai_list_customer_pajak').hide();
          $('#hide_nilai_list_kota').hide();
          $('#hide_nilai_list_marketing').hide();
          $('#hide_nilai_list_propinsi').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_customer').hide();
          $('#hide_nilai_list_customer_pajak').hide();
          $('#hide_nilai_list_kota').hide();
          $('#hide_nilai_list_marketing').hide();
          $('#hide_nilai_list_propinsi').hide();

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
      if (namaKolom == 'Customer' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_customer').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Customer Pajak' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_customer_pajak').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Kota' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_kota').combogrid('getValue')
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Marketing' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_marketing').combogrid('getValue')
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Propinsi' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_propinsi').combogrid('getValue')
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Perkiraan' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_perkiraan').combogrid('getValue')
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'User' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_user').combogrid('getValue')
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

        //TAMBAHAN KARNA MENGGUNAKAN BADANUSAHA
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
        $.messager.alert('Warning', 'Isi Nilai Telebih Dahulu', 'warning');
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

    function cetakLaporan(excel) {
      parent.buka_laporan(link_api.laporanPiutang, {
        kode: "{{ $kodemenu }}",
        status: JSON.stringify($('#cbStatus').combogrid("getValues")),
        data_tampil: JSON.stringify($("#list_tampil_laporan").datalist('getChecked')),
        data_filter: JSON.stringify($("#list_filter_laporan").datagrid('getChecked')),
        tglawal: $("#txt_tgl_aw").datebox('getValue'),
        tglakhir: $("#txt_tgl_ak").datebox('getValue'),
        excel: excel,
        filename: "Laporan Piutang",
      });
    }

    // PRINT LAPORAN
    $("#btn_export_excel").click(function() {
      var jenistrans = $('#cbJenis').combogrid("getValues").length;

      if (jenistrans > 0) {
        cetakLaporan('ya');
      } else if (jenistrans == 0) {
        $.messager.alert('Warning', 'Jenis Transaksi Tidak Boleh Kosong');
      }
    });

    $("#btn_print").click(function() {
      var jenistrans = $('#cbJenis').combogrid("getValues").length;
      if (jenistrans > 0) {
        cetakLaporan('tidak');
      } else if (jenistrans == 0) {
        $.messager.alert('Warning', 'Jenis Transaksi Tidak Boleh Kosong');
      }
    });

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

    function browse_data_marketing(id) {
      $(id).combogrid({
        panelWidth: 740,
        url: link_api.browseMarketing,
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

    function browse_data_perkiraan(id) {
      $(id).combogrid({
        panelWidth: 220,
        url: link_api.browsePerkiraan,
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
          param.jenis = 'semua';
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
            $('#txt_nilai_list_perkiraan').combogrid('setValue', data.kode);
          } else if (checkData == "Nama") {
            $('#txt_nilai_list_perkiraan').combogrid('setValue', data.nama);
          }
        }
      });
    }

    function browse_data_user(id) {
      $(id).combogrid({
        panelWidth: 430,
        url: link_api.browseUser,
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
              field: 'uuiduser',
              hidden: true
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
          if (checkData == "Nama") {
            $('#txt_nilai_list_user').combogrid('setValue', data.nama);
          }
        }
      });
    }
  </script>
@endpush
