@extends('template.app')

@section('content')
  <div class="easyui-layout" style="width:350px;height:100%; font-weight:bold;" fit="true">
    <div class="panel-filter-laporan" data-options="region:'west',hideCollapsedContent:false" title="{{ $menu }}">
      <table style="border-bottom:1px #000" id="label_laporan">
        <!-- FILTER LAPORAN -->
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
            <select id="kolom" class="easyui-combobox" name="kolom" style="width:229px;">
              <option value="mproduksi2.kodemproduksi2">Kode Produksi</option>
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
            <div id="hide_nilai_list_produksi">
              <input id="txt_nilai_list_produksi" name="txt_nilai_list_produksi" style="width:229px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_barang" hidden>
              <input id="txt_nilai_list_barang" name="txt_nilai_list_barang" style="width:229px" prompt="Nilai" />
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
        {{-- <tr valign="top">
          <td colspan="2">
            <ul class="easyui-datalist" title="Jenis Laporan" name="list_tampil_laporan" id="list_tampil_laporan">
            </ul>
          </td>
        </tr> --}}
      </table>
      <br>
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
    var kolom = "Kode Produksi";
    var namaKolom = "Produksi";
    var kolomVal = "mproduksi2.kodeproduksi"
    var checkData = "Kode";
    var operator = "Adalah";
    var operatorVal = "ADALAH";
    var tipedata = "STRING";

    $(document).ready(function() {
      isiOperatorLaporan("String", "operatorString");
      isiOperatorLaporan("Number", "operatorNumber");
      browse_data_produksi('#txt_nilai_list_produksi');
      browse_data_barang('#txt_nilai_list_barang');

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

      //JENIS TAMPILAN LAPORAN
      var arrayTampilLaporan = [{
          value: 'REGISTER',
          jenis: 'Register'
        },
        {
          value: 'REKAP',
          jenis: 'Rekap'
        },
      ];

      //   $('#list_tampil_laporan').datalist({
      //     width: 280,
      //     height: 155,
      //     checkbox: true,
      //     data: arrayTampilLaporan,
      //     columns: [
      //       [{
      //         field: 'jenis',
      //         title: 'Status',
      //         width: 200
      //       }, ]
      //     ],
      //   });
      //   //SET CHECK REKAP
      //   $('#list_tampil_laporan').datalist('checkRow', 0);
      $('#operatorString').combobox('setValue', operatorVal);
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

          if (namaKolom == 'Produksi') {
            $('#hide_nilai_list_produksi').show();
            $('#hide_nilai_list_barang').hide();
          } else if (namaKolom == 'Barang') {
            $('#hide_nilai_list_barang').show();
            $('#hide_nilai_list_produksi').hide();
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

          $('#hide_nilai_list_produksi').hide();
          $('#hide_nilai_list_barang').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();

          $("#operatorNumber").combobox('setValues', 'SAMA DENGAN');
          operator = "Sama dengan";
          operatorVal = "SAMA DENGAN";
        }

        //CLEAR FIELD SETIAP UBAH
        $('#txt_nilai_list_produksi').combogrid('clear');
        $('#txt_nilai_list_barang').combogrid('clear');
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
          if (namaKolom == 'Produksi') {
            $('#hide_nilai_list_produksi').show();
            $('#hide_nilai_list_barang').hide();
          } else if (namaKolom == 'Barang') {
            $('#hide_nilai_list_barang').show();
            $('#hide_nilai_list_produksi').hide();
          }

          $('#hide_nilai').hide();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('enable');
        } else if (operatorStringVal == "KOSONG" || operatorStringVal == "TIDAK KOSONG") {

          $('#hide_nilai_list_produksi').hide();
          $('#hide_nilai_list_barang').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_produksi').hide();
          $('#hide_nilai_list_barang').hide();

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
          $('#hide_nilai_list_produksi').hide();
          $('#hide_nilai_list_barang').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_produksi').hide();
          $('#hide_nilai_list_barang').hide();

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
      } else if (namaKolom == 'Produksi' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_produksi').combogrid('getValue');
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

    function cetakLaporan(excel) {
      parent.buka_laporan(link_api.laporanProduksi, {
        filename: "Laporan Master Komposisi",
        data_filter: JSON.stringify($("#list_filter_laporan").datagrid('getChecked')),
        excel: excel,
        data_tampil: "[]",
        status: $('#cbStatus').combogrid('getValue'),
        kode: '{{ $kodemenu }}',
      });
    }

    // PRINT LAPORAN
    $("#btn_export_excel").click(function() {
      cetakLaporan('ya');
    });

    $("#btn_print").click(function() {
      cetakLaporan('tidak');
    });

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

    function browse_data_produksi(id) {
      $(id).combogrid({
        panelWidth: 130,
        url: link_api.browseProduksi,
        idField: 'id',
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
          ]
        ],
        onSelect: function(index, data, checkdata) {
          $('#txt_nilai_list_produksi').combogrid('setValue', data.kode);
        }
      });
    }
  </script>
@endpush
