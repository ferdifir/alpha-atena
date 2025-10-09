@extends('template.app')

@section('content')
  <div class="easyui-layout" style="width:350px;height:100%; font-weight:bold;" fit="true">
    <div class="panel-filter-laporan" data-options="region:'west',hideCollapsedContent:false" title="{{ $menu }}">
      <table style="border-bottom:1px #000" id="label_laporan">
        <tr>
          <td><label id="label_laporan">Tgl. Trans</label></td>
          <td id="label_laporan"><input id="txt_tgl_aw" name="txt_tgl_aw" style="width:108px;" class="date" /> - <input
              id="txt_tgl_ak" name="txt_tgl_ak" style="width:108px;" class="date" /></td>
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
            <select id="kolom" class="easyui-combobox" name="kolom" style="width:227px;">
              <option value="mkaryawan.kodekaryawan">Kode Karyawan</option>
              <option value="mkaryawan.namakaryawan">Nama Karyawan</option>
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
              <select id="operatorString" class="easyui-combobox" name="operatorstring" style="width:227px;">

              </select>
            </div>
            <div id="lap_operatorNumber" hidden>
              <select id="operatorNumber" class="easyui-combobox" name="operatornumber" style="width:227px;">

              </select>
            </div>
          </td>
        </tr>
        <tr>
          <td id="label_laporan" class="label_nilai">Nilai </td>
          <td>
            <div id="hide_nilai" hidden>
              <input class="label_input" id="txt_nilai" name="txt_nilai" style="width:227px" prompt="Nilai">
            </div>
            <div id="hide_nilai_list_karyawan">
              <input id="txt_nilai_list_karyawan" name="txt_nilai_list_karyawan" style="width:227px" prompt="Nilai" />
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
    var kolom = "Kode Karyawan";
    var namaKolom = "Karyawan";
    var kolomVal = "mkaryawan.kodekaryawan";
    var checkData = "Kode";
    var operator = "Adalah";
    var operatorVal = "ADALAH";
    var tipedata = "STRING"

    $(document).ready(function() {
      browse_data_karyawan('#txt_nilai_list_karyawan');

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
          value: 'KARTUPIUTANG',
          jenis: 'Kartu'
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
        width: 227,
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
          if (namaKolom == 'Karyawan') {
            $('#hide_nilai_list_karyawan').show();
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

          $('#hide_nilai_list_karyawan').hide();

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
        $('#txt_nilai_list_karyawan').combogrid('clear');
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
          if (namaKolom == 'Karyawan') {
            $('#hide_nilai_list_karyawan').show();
          }

          $('#hide_nilai').hide();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('enable');
        } else if (operatorStringVal == "KOSONG" || operatorStringVal == "TIDAK KOSONG") {
          $('#hide_nilai_list_karyawan').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_karyawan').hide();

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
          $('#hide_nilai_list_karyawan').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_karyawan').hide();

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
      if (namaKolom == 'Karyawan' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_karyawan').combogrid('getValue');
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
        if (namaKolom == 'Karyawan' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
          var msg = $('#txt_nilai_list_karyawan').combogrid('grid').datagrid("getSelected");

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
      parent.buka_laporan(link_api.laporanPiutangKaryawan, {
        kode: "{{ $kodemenu }}",
        status: JSON.stringify($('#cbStatus').combogrid("getValues")),
        data_tampil: JSON.stringify($("#list_tampil_laporan").datalist('getChecked')),
        data_filter: JSON.stringify($("#list_filter_laporan").datagrid('getChecked')),
        tglawal: $("#txt_tgl_aw").datebox('getValue'),
        tglakhir: $("#txt_tgl_ak").datebox('getValue'),
        excel: excel,
        tgl_pelunasan: '',
        tglawal_jatuh_tempo: '',
        tglakhir_jatuh_tempo: '',
        filename: "Laporan Piutang Karyawan",
      });
    }

    // PRINT LAPORAN
    $("#btn_export_excel").click(function() {
      cetakLaporan('ya');
    });

    $("#btn_print").click(function() {
      cetakLaporan('tidak');
    });

    function browse_data_karyawan(id) {
      $(id).combogrid({
        panelWidth: 330,
        url: link_api.browseKaryawan,
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
              field: 'uuidkaryawan',
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
          ]
        ],
        onSelect: function(index, data, checkdata) {
          if (checkData == "Kode") {
            $('#txt_nilai_list_karyawan').combogrid('setValue', data.kode);
          } else if (checkData == "Nama") {
            $('#txt_nilai_list_karyawan').combogrid('setValue', data.nama);
          }
        }
      });
    }
  </script>
@endpush
