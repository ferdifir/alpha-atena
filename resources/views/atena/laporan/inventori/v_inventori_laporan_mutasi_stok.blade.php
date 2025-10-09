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
          <td id="label_laporan">
            Kolom
          </td>
          <td>
            <select id="kolom" class="easyui-combobox" name="kolom" style="width:220px;">
              <option value="mbarang.kodebarang">Kode Barang</option>
              <option value="mbarang.namabarang">Nama Barang</option>
              <option value="mmerk.kodemerk">Kode Merk</option>
              <option value="mmerk.namamerk">Nama Merk</option>
              <option value="mbarangkategori.namakategori">Nama Kategori</option>
              <option value="mbarang.barcodesatuan1">Barcode</option>
              <option value="mbarang.partnumber">Part Number</option>
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
            <div id="hide_nilai_list_barang">
              <input id="txt_nilai_list_barang" name="txt_nilai_list_barang" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_barcode" hidden>
              <input id="txt_nilai_list_barcode" name="txt_nilai_list_barcode" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_partnumber" hidden>
              <input id="txt_nilai_list_partnumber" name="txt_nilai_list_partnumber" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_merk" hidden>
              <input id="txt_nilai_list_merk" name="txt_nilai_list_merk" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_kategori" hidden>
              <input id="txt_nilai_list_kategori" name="txt_nilai_list_kategori" style="width:220px" prompt="Nilai" />
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
        <tr>
          <td align="left" colspan="2">
            <label id="label_laporan"><input type="checkbox" name="cb_kolomnol" id="cbKolomNol" value="1" checked>
              Tampilkan Barang Semua Kolom Tidak Bernilai 0</label>
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
    var kolom = "Kode Barang";
    var namaKolom = "Barang";
    var kolomVal = "mbarang.kodebarang"
    var checkData = "Kode";
    var operator = "Adalah";
    var operatorVal = "ADALAH";
    var tipedata = "STRING";
    const fieldMap = {
      'Barang': '#hide_nilai_list_barang',
      'Barcode': '#hide_nilai_list_barcode',
      'Part': '#hide_nilai_list_partnumber',
      'Merk': '#hide_nilai_list_merk',
      'Kategori': '#hide_nilai_list_kategori'
    };
    const allFields = Object.values(fieldMap).join(', ');

    $(document).ready(function() {
      browse_data_lokasi('#txt_lokasi');
      browse_data_barang('#txt_nilai_list_barang');
      browse_data_barcode('#txt_nilai_list_barcode');
      browse_data_partnumber('#txt_nilai_list_partnumber');
      browse_data_merk('#txt_nilai_list_merk');
      browse_data_kategori('#txt_nilai_list_kategori');

      isiOperatorLaporan("String", "operatorString");
      isiOperatorLaporan("Number", "operatorNumber");

      //SET SEMUA LOKASI
      setLokasiCombogrid("{{ session('TOKEN') }}", ["#txt_lokasi"]);
      $("#operatorString").combobox('setValues', operatorVal);
      tutupLoader();

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
              width: '96%'
            },
          ]
        ],
      });

      //JENIS TAMPILAN LAPORAN
      var arrayTampilLaporan = [{
        value: 'REGISTERBARANG',
        jenis: 'Register per Barang'
      }, ];

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

    });
    //FILTER KOLOM
    $("#kolom").combobox({
      onChange: function() {
        kolom = $("#kolom").combobox('getText');
        kolomVal = $("#kolom").combobox('getValue');

        checkData = kolom.split(' ')[0]; // CEK NAMA FILTER, APAKAH KODE DAN NAMA
        namaKolom = kolom.split(' ')[1]; // CEK JENIS FILTER APA (SUPPLIER,BARANG,PO)


        if (checkData == "Kode" || checkData == "Nama" || checkData == "Barcode" || checkData == "Part") {
          //UNTUK KOLOM BESERTA COMBOGRID
          $(allFields).hide();
          const showField = fieldMap[namaKolom] || fieldMap[checkData];
          if (showField) {
            $(showField).show();
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
        $('#txt_nilai_list_barang').combogrid('clear');
        $('#txt_nilai_list_barcode').combogrid('clear');
        $('#txt_nilai_list_partnumber').combogrid('clear');
        $('#txt_nilai_list_merk').combogrid('clear');
        $('#txt_nilai_list_kategori').combogrid('clear');
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
          const showField = fieldMap[namaKolom] || fieldMap[checkData];
          if (showField) {
            $(showField).show();
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

      if (namaKolom == 'Barang' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_barang').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (checkData == 'Barcode' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_barcode').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (checkData == 'Part' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_partnumber').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Merk' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_merk').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Kategori' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_kategori').combogrid('getValue');
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


    // PRINT LAPORAN
    $("#btn_export_excel").click(function() {
      var getLokasi = $('#txt_lokasi').combogrid('grid');
      var lokasi = getLokasi.datagrid('getSelected');

      if (lokasi != null) {
        cetakLaporan('ya');
      } else {
        $.messager.alert('Warning', 'Data Lokasi Tidak Boleh Kosong');
      }
    });

    function cetakLaporan(excel) {
      parent.buka_laporan(link_api.laporanMutasiStok, {
        kode: "{{ $kodemenu }}",
        lokasi: JSON.stringify($('#txt_lokasi').combogrid('getValues')),
        status: JSON.stringify([]),
        data_tampil: JSON.stringify($("#list_tampil_laporan").datalist('getChecked')),
        data_filter: JSON.stringify($("#list_filter_laporan").datagrid('getChecked')),
        tglawal: $("#txt_tgl_aw").datebox('getValue'),
        tglakhir: $("#txt_tgl_ak").datebox('getValue'),
        excel: excel,
        filename: "Laporan Mutasi Stok",
        kolomnol: $("#cbKolomNol").is(':checked') ? 1 : 0
      });
    }

    $("#btn_print").click(function() {
      var getLokasi = $('#txt_lokasi').combogrid('grid');
      var lokasi = getLokasi.datagrid('getSelected');

      if (lokasi != null) {
        cetakLaporan('tidak');
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

    function browse_data_barang(id) {
      $(id).combogrid({
        panelWidth: 650,
        url: link_api.browseBarang,
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
  </script>
@endpush
