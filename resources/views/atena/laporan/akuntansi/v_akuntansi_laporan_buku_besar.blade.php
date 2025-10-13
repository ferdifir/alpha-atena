@extends('template.app')

@section('content')
  <div class="easyui-layout" style="width:350px;height:100%; font-weight:bold;" fit="true">
    <div class="panel-filter-laporan" data-options="region:'west',hideCollapsedContent:false" title="{{ $menu }}">
      <table style="border-bottom:1px #000" id="label_laporan">
        <!-- FILTER LAPORAN -->
        <tr>
          <td id="label_laporan">Periode</td>
          <td id="label_laporan">
            <input id="txt_tgl_aw" style="width:103px" name="txt_tgl_aw" class="date" />
            &nbsp; - &nbsp;
            <input id="txt_tgl_ak" style="width:103px" name="txt_tgl_ak" class="date" />
          </td>
        </tr>
        <tr>
          <!-- <td id="label_laporan"></td> -->
          <td id="label_laporan" colspan="2">
            <input type="checkbox" value="1" name="tampil_nol" checked> Tampilkan Nilai 0
          </td>
        </tr>
        <tr>
          <td id="label_laporan">
            Kolom
          </td>
          <td>
            <select id="kolom" class="easyui-combobox" name="kolom" style="width:229px;">
              <option value="mperkiraan.kodeperkiraan">Kode Akun</option>
              <option value="mperkiraan.namaperkiraan">Nama Akun</option>
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
            <div id="hide_nilai_list_akun">
              <input id="txt_nilai_list_akun" name="txt_nilai_list_akun" style="width:229px" prompt="Nilai" />
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
    var kolom = "Kode Akun";
    var namaKolom = "Akun";
    var kolomVal = "mperkiraan.kodeperkiraan"
    var checkData = "Kode";
    var operator = "Adalah";
    var operatorVal = "ADALAH";
    var tipedata = "STRING";

    $(document).ready(function() {
      isiOperatorLaporan("String", "operatorString");
      isiOperatorLaporan("Number", "operatorNumber");
      $("#operatorString").combobox('setValues', operatorVal);
      browse_data_akun('#txt_nilai_list_akun');

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
          if (namaKolom == 'Akun') {

            $('#hide_nilai_list_akun').show();

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


          $('#hide_nilai_list_akun').hide();


          $('#hide_nilai').show();
          $('.label_nilai').show();

          $("#operatorNumber").combobox('setValues', 'SAMA DENGAN');
          operator = "Sama dengan";
          operatorVal = "SAMA DENGAN";
        }

        //CLEAR FIELD SETIAP UBAH
        $('#txt_nilai_list_saldo_perkiraan').combogrid('clear');
        $('#txt_nilai_list_akun').combogrid('clear');
        $('#txt_nilai_list_po').combogrid('clear');
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
          if (namaKolom == 'Akun') {
            $('#hide_nilai_list_akun').show();
          }

          $('#hide_nilai').hide();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('enable');
        } else if (operatorStringVal == "KOSONG" || operatorStringVal == "TIDAK KOSONG") {

          $('#hide_nilai_list_akun').hide();


          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {

          $('#hide_nilai_list_akun').hide();


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
          $('#hide_nilai_list_akun').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {

          $('#hide_nilai_list_akun').hide();


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
      if (namaKolom == 'Akun' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_akun').combogrid('getValue');
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

    function cetakLaporan(excel) {
      parent.buka_laporan(link_api.laporanBukuBesar, {
        filename: "Laporan Buku Besar",
        data_filter: JSON.stringify($("#list_filter_laporan").datagrid('getChecked')),
        excel: excel,
        tampil_nol: $('[name="tampil_nol"]').is(':checked') ? 1 : 0,
        tglawal: $("#txt_tgl_aw").datebox('getValue'),
        tglakhir: $("#txt_tgl_ak").datebox('getValue'),
        kode: "{{ $kodemenu }}"
      });
    }

    // PRINT LAPORAN
    $("#btn_export_excel").click(function() {
      cetakLaporan('ya');
    });

    $("#btn_print").click(function() {
      cetakLaporan('tidak');
    });

    function browse_data_akun(id) {
      $(id).combogrid({
        panelWidth: 430,
        url: link_api.browsePerkiraan,
        idField: 'kode',
        textField: 'kode',
        mode: 'remote',
        sortName: 'kode',
        sortOrder: 'asc',
        multiple: false,
        onBeforeLoad: function(param) {
          param.jenis = 'detail';
          param.aktif = 1;
        },
        columns: [
          [{
              field: 'kode',
              title: 'Kode',
              width: 70,
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
            $('#txt_nilai_list_akun').combogrid('setValue', data.kode);
          } else if (checkData == "Nama") {
            $('#txt_nilai_list_akun').combogrid('setValue', data.nama);
          }
        }
      });
    }
  </script>
@endpush
