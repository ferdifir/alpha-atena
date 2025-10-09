@extends('template.app')

@section('content')
  <div class="easyui-layout" style="width:350px;height:100%; font-weight:bold;" fit="true">
    <div class="panel-filter-laporan" data-options="region:'west',hideCollapsedContent:false" title="{{ $menu }}">

      <table style="border-bottom:1px #000" id="label_laporan">
        <!-- FILTER LAPORAN -->
        <tr>
          <td id="label_laporan">Tgl. Trans </td>
          <td id="label_laporan"><input id="txt_tgl_aw" name="txt_tgl_aw" style="width:105px;" class="date" /> -
            <input id="txt_tgl_ak" name="txt_tgl_ak" style="width:105px;" class="date" />
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
              <option value="msupplier.kodesupplier">Kode Supplier</option>
              <option value="msupplier.namasupplier">Nama Supplier</option>
            </select>
          </td>
        </tr>
        <tr>
          <td id="label_laporan">
            Operator
          </td>
          <td>
            <div id="lap_operatorString">
              <select id="operatorString" class="easyui-combobox" name="operatorString" style="width:220px;">

              </select>
            </div>
            <div id="lap_operatorNumber" hidden>
              <select id="operatorNumber" class="easyui-combobox" name="operatorNumber" style="width:220px;">

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
            <div id="hide_nilai_list_supplier">
              <input id="txt_nilai_list_supplier" name="txt_nilai_list_supplier" style="width:220px" prompt="Nilai" />
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
    var cbLokasi = 0;
    var kolom = "Kode Supplier";
    var namaKolom = "Supplier";
    var kolomVal = "msupplier.kodesupplier";
    var checkData = "Kode";
    var operator = "Adalah";
    var operatorVal = "ADALAH";
    var tipedata = "STRING"

    $(document).ready(function() {
      browse_data_supplier('#txt_nilai_list_supplier');

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
        value: 'REGISTER',
        jenis: 'Register'
      }];

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
        keterangan: 'Transaksi berlanjut ke penerimaan'
      });
      $('#cbStatus').combogrid("grid").datagrid("appendRow", {
        value: 'D',
        status: 'Delete',
        keterangan: 'Transaksi dibatalkan'
      });

      $('#cbStatus').combogrid("setValues", ["I", "S", "P"]);

      // Tambahkan fungsi-fungsi yang diminta
      isiOperatorLaporan("String", "operatorString");
      isiOperatorLaporan("Number", "operatorNumber");
      $('#operatorString').combobox('setValue', operatorVal);
      tutupLoader();
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
          if (namaKolom == 'Supplier') {
            $('#hide_nilai_list_supplier').show();
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

          $('#hide_nilai').show();
          $('.label_nilai').show();

          $("#operatorNumber").combobox('setValues', 'SAMA DENGAN');
          operator = "Sama dengan";
          operatorVal = "SAMA DENGAN";
        }

        //CLEAR FIELD SETIAP UBAH
        $('#txt_nilai_list_supplier').combogrid('clear');
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
          if (namaKolom == 'Supplier') {
            $('#hide_nilai_list_supplier').show();
          }

          $('#hide_nilai').hide();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('enable');
        } else if (operatorStringVal == "KOSONG" || operatorStringVal == "TIDAK KOSONG") {
          $('#hide_nilai_list_supplier').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_supplier').hide();

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
          $('#hide_nilai_list_supplier').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_supplier').hide();

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
      parent.buka_laporan(link_api.laporanDebitNote, {
        kode: "{{ $kodemenu }}",
        status: JSON.stringify($('#cbStatus').combogrid("getValues")),
        data_tampil: JSON.stringify($("#list_tampil_laporan").datalist('getChecked')),
        data_filter: JSON.stringify($("#list_filter_laporan").datagrid('getChecked')),
        tglawal: $("#txt_tgl_aw").datebox('getValue'),
        tglakhir: $("#txt_tgl_ak").datebox('getValue'),
        excel: excel,
        filename: "Laporan Nota Debet",
      });
    }

    $("#btn_export_excel").click(function() {
      cetakLaporan('ya');
    });

    $("#btn_print").click(function() {
      cetakLaporan('tidak');
    });

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
  </script>
@endpush
