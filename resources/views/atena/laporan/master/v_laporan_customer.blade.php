@extends('template.app')

@section('content')
  <div class="easyui-layout" style="width:350px;height:100%; font-weight:bold;" fit="true">
    <div class="panel-filter-laporan" data-options="region:'west',hideCollapsedContent:false" title="{{ $menu }}">
      <table style="border-bottom:1px #000" id="label_laporan">
        <tr>
          <td id="label_laporan">Status </td>
          <td id="label_laporan">
            <div id="cbStatus" class="easyui-combogrid" name="cbstatus[]" data-options="iconCls:'',"
              style="width:229px;">
            </div>
          </td>
        </tr>
        <tr>
          <td id="label_laporan">
            Kolom
          </td>
          <td>
            <select id="kolom" class="easyui-combobox" name="kolom" style="width:229px;">
              <option value="mcustomer.kodecustomer">Kode Customer</option>
              <option value="mcustomer.namacustomer">Nama Customer</option>
              <option value="mcustomer.kota">Nama Kota</option>
              <option value="mcustomer.propinsi">Nama Propinsi</option>
              <option value="mkaryawan.kodekaryawan">Kode Marketing</option>
              <option value="mkaryawan.namakaryawan">Nama Marketing</option>
            </select>
          </td>
        </tr>
        <tr>
          <td id="label_laporan">
            Operator
          </td>
          <td>
            <div id="lap_operatorString">
              <select id="operatorString" class="easyui-combobox" name="operatorstring" style="width:229px;">
              </select>
            </div>
            <div id="lap_operatorNumber" hidden>
              <select id="operatorNumber" class="easyui-combobox" name="operatornumber" style="width:229px;">
              </select>
            </div>
          </td>
        </tr>
        <tr>
          <td id="label_laporan" class="label_nilai">Nilai </td>
          <td>
            <div id="hide_nilai" hidden>
              <input class="label_input" id="txt_nilai" name="txt_nilai" style="width:229px" prompt="Nilai">
            </div>
            <div id="hide_nilai_list_customer">
              <input id="txt_nilai_list_customer" name="txt_nilai_list_customer" style="width:229px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_kota" hidden>
              <input id="txt_nilai_list_kota" name="txt_nilai_list_kota" style="width:229px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_propinsi" hidden>
              <input id="txt_nilai_list_propinsi" name="txt_nilai_list_propinsi" style="width:229px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_marketing" hidden>
              <input id="txt_nilai_list_marketing" name="txt_nilai_list_marketing" style="width:229px" prompt="Nilai" />
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
      </table>
      <br>
    </div>
    <div data-options="region:'center'">
      <div class="easyui-layout" style="width: 100%;height: 100%">
        <div data-options="region: 'west'" class="btn-group-laporan" style="width: 50px">
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
    var kolomVal = "mcustomer.kodecustomer"
    var checkData = "Kode";
    var operator = "Adalah";
    var operatorVal = "ADALAH";
    var tipedata = "STRING";

    $(document).ready(function() {
      isiOperatorLaporan("String", "operatorString");
      isiOperatorLaporan("Number", "operatorNumber");
      browse_data_customer('#txt_nilai_list_customer');
      browse_data_kota('#txt_nilai_list_kota');
      browse_data_propinsi('#txt_nilai_list_propinsi');
      browse_data_marketing('#txt_nilai_list_marketing');

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

      $('#cbStatus').combogrid({
        width: 229,
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
      tutupLoader();
    });

    /**
     * Fungsi untuk menghide form input nilai berdasarkan jenis filter kolom
     * @param {string} keyKolom - key untuk menghide form input nilai
     */
    function hideNilaiList(keyKolom = "") {
      // Hide semua form input nilai
      $('#hide_nilai_list_customer').hide();
      $('#hide_nilai_list_propinsi').hide();
      $('#hide_nilai_list_marketing').hide();
      $('#hide_nilai_list_kota').hide();

      // Jika keyKolom tidak kosong, maka show form input nilai berdasarkan keyKolom
      if (keyKolom != "") {
        $(keyKolom).show();
      }
    }

    //FILTER KOLOM
    $("#kolom").combobox({
      onChange: function() {
        kolom = $("#kolom").combobox('getText');
        kolomVal = $("#kolom").combobox('getValue');

        checkData = kolom.substr(0, 4); // CEK NAMA FILTER, APAKAH KODE DAN NAMA
        namaKolom = kolom.substr(5, kolom.length - 1); // CEK JENIS FILTER APA (SUPPLIER,BARANG,PO)


        if (checkData == "Kode" || checkData == "Nama") {
          const elementId = namaKolom.toLowerCase();
          hideNilaiList('#hide_nilai_list_' + elementId);

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

          hideNilaiList();

          $('#hide_nilai').show();
          $('.label_nilai').show();

          $("#operatorNumber").combobox('setValues', 'SAMA DENGAN');
          operator = "Sama dengan";
          operatorVal = "SAMA DENGAN";
        }

        //CLEAR FIELD SETIAP UBAH
        $('#txt_nilai_list_customer').combogrid('clear');
        $('#txt_nilai_list_marketing').combogrid('clear');
        $('#txt_nilai_list_kota').combogrid('clear');
        $('#txt_nilai_list_propinsi').combogrid('clear');
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
          var elementId = namaKolom.toLowerCase();
          hideNilaiList('#hide_nilai_list_' + elementId);

          $('#hide_nilai').hide();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('enable');
        } else if (operatorStringVal == "KOSONG" || operatorStringVal == "TIDAK KOSONG") {
          hideNilaiList();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          hideNilaiList();

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
          hideNilaiList();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          hideNilaiList();

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
      } else if (namaKolom == 'Marketing' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_marketing').combogrid('getValue');
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

          if (msg != null) {
            text_laporan = kolom + " " + operator + " " + nilai + ", " + msg.badanusaha;
          }
        }

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

        var rows = $('#list_filter_laporan').datagrid('getRows');
        $('#list_filter_laporan').datagrid('checkRow', rows.length - 1);
      } else {
        alert("Isi Nilai Telebih Dahulu");
      }
    });

    $("#btn_remove").click(function() {
      var rows = $('#list_filter_laporan').datagrid('getSelections');
      for (var i = rows.length - 1; i >= 0; i--) {
        var index = $('#list_filter_laporan').datagrid('getRowIndex', rows[i]);
        $('#list_filter_laporan').datagrid('deleteRow', index);
      }
    });

    function cetakLaporanCustomer(excel) {
      parent.buka_laporan(link_api.laporanCustomer, {
        filename: "Laporan Master Customer",
        data_filter: JSON.stringify($("#list_filter_laporan").datagrid('getChecked')),
        excel: excel,
        status: $('#cbStatus').combogrid('getValue'),
      });
    }

    $("#btn_export_excel").click(function() {
      cetakLaporanCustomer('ya');
    });

    $("#btn_print").click(function() {
      cetakLaporanCustomer('tidak');
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

    function browse_data_marketing(id) {
      $(id).combogrid({
        panelWidth: 740,
        url: link_api.browseMarketing,
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
              field: 'uuidmarketing',
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
  </script>
@endpush
