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
              <option value="tasetsusut.kodeasetsusut">Kode Penyusutan Aset</option>
              <option value="maset.kodeaset">Kode Aset</option>
              <option value="maset.namaaset">Nama Aset</option>
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
            <div id="hide_nilai_list_aset_susut">
              <input id="txt_nilai_list_aset_susut" name="txt_nilai_list_aset_susut" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_aset" hidden>
              <input id="txt_nilai_list_aset" name="txt_nilai_list_aset" style="width:220px" prompt="Nilai" />
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
      </fieldset>

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
    var kolom = "Kode Penyusutan Aset";
    var namaKolom = "Penyusutan Aset";
    var kolomVal = "tasetsusut.kodeasetsusut"
    var checkData = "Kode";
    var operator = "Adalah";
    var operatorVal = "ADALAH";
    var tipedata = "STRING";

    $(document).ready(function() {
      isiOperatorLaporan("String", "operatorString");
      isiOperatorLaporan("Number", "operatorNumber");
      $("#operatorString").combobox('setValues', operatorVal);
      browse_data_aset('#txt_nilai_list_aset');
      browse_data_aset_susut('#txt_nilai_list_aset_susut');

      //SET SEMUA LOKASI
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link_api.browseLokasi,
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
          value: 'REGISTERASET',
          jenis: 'Register per Aset'
        },
        {
          value: 'REKAP',
          jenis: 'Rekap'
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
        keterangan: 'Transaksi berlanjut ke penerimaan'
      });
      $('#cbStatus').combogrid("grid").datagrid("appendRow", {
        value: 'D',
        status: 'Delete',
        keterangan: 'Transaksi dibatalkan'
      });

      $('#cbStatus').combogrid("setValues", ["I", "S", "P"]);
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

          if (namaKolom == 'Aset') {
            $('#hide_nilai_list_aset').show();
            $('#hide_nilai_list_aset_susut').hide();
          } else if (namaKolom == 'Penyusutan Aset') {
            $('#hide_nilai_list_aset_susut').show();
            $('#hide_nilai_list_aset').hide();

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

          $('#hide_nilai_list_aset').hide();
          $('#hide_nilai_list_aset_susut').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();

          $("#operatorNumber").combobox('setValues', 'SAMA DENGAN');
          operator = "Sama dengan";
          operatorVal = "SAMA DENGAN";
        }

        //CLEAR FIELD SETIAP UBAH
        $('#txt_nilai_list_aset_susut').combogrid('clear');
        $('#txt_nilai_list_aset').combogrid('clear');
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
          if (namaKolom == 'Aset') {
            $('#hide_nilai_list_aset').show();

            $('#hide_nilai_list_aset_susut').hide();
          } else if (namaKolom == 'Penyusutan Aset') {
            $('#hide_nilai_list_aset_susut').show();

            $('#hide_nilai_list_aset').hide();

          }

          $('#hide_nilai').hide();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('enable');
        } else if (operatorStringVal == "KOSONG" || operatorStringVal == "TIDAK KOSONG") {

          $('#hide_nilai_list_aset_susut').hide();
          $('#hide_nilai_list_aset').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_aset_susut').hide();
          $('#hide_nilai_list_aset').hide();

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
          $('#hide_nilai_list_aset_susut').hide();
          $('#hide_nilai_list_aset').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_aset_susut').hide();
          $('#hide_nilai_list_aset').hide();

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

      if (namaKolom == 'Aset' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_aset').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Penyusutan Aset' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_aset_susut').combogrid('getValue');
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


    $("#btn_export_excel").click(function() {
      cetakLaporan('ya');
    });

    $("#btn_print").click(function() {
      cetakLaporan('tidak');
    });

    function browse_data_aset(id) {
      $(id).combogrid({
        panelWidth: 420,
        url: base_url + 'atena/Aset/Transaksi/PembelianAset/comboGridAsetLaporan',
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
              field: 'kode',
              title: 'Kode',
              width: 150,
              sortable: false
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
            $('#txt_nilai_list_aset').combogrid('setValue', data.kode);
          } else if (checkData == "Nama") {
            $('#txt_nilai_list_aset').combogrid('setValue', data.nama);
          }
        }
      });
    }


    function browse_data_aset_susut(id) {
      $(id).combogrid({
        panelWidth: 230,
        url: base_url + 'atena/Aset/Transaksi/PenyusutanAset/comboGridAsetSusut',
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
            $('#txt_nilai_list_aset_susut').combogrid('setValue', data.kode);
          } else if (checkData == "Nama") {
            $('#txt_nilai_list_aset_susut').combogrid('setValue', data.nama);
          }
        }

      });
    }
  </script>
@endpush
