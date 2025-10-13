@extends('template.app')

@section('content')
  <div class="easyui-layout" style="width:350px;height:100%; font-weight:bold;" fit="true">
    <div class="panel-filter-laporan" data-options="region:'west',hideCollapsedContent:false" title="{{ $menu }}">

      <table style="border-bottom:1px #000" id="label_laporan">
        <!-- FILTER LAPORAN -->
        <tr>
          <td id="label_laporan">Lokasi </td>
          <td><input id="txt_lokasi" name="txt_lokasi[]" style="width:202px" /></td>
        </tr>
        <tr>
          <td align="left" id="label_laporan"><input type="checkbox" name="cbtgl[]" align="right" value="perolehan"
              checked> Perolehan </td>
          <td id="label_laporan"> <input id="txt_tgl_aw" name="txt_tgl_aw" style="width:95px;" class="date" /> -
            <input id="txt_tgl_ak" style="width:95px;" name="txt_tgl_ak" class="date" />
          </td>
        </tr>
        <tr>
          <td align="left" id="label_laporan"><input type="checkbox" name="cbtgl[]" align="right" value="penyusutan"
              checked> Penyusutan </td>
          <td id="label_laporan"> <input id="txt_tgl_aw_susut" name="txt_tgl_aw_susut" style="width:95px;"
              class="date" /> - <input id="txt_tgl_ak_susut" style="width:95px;" name="txt_tgl_ak_susut"
              class="date" /></td>
        </tr>
        <tr>
          <td></td>
        </tr>
        <tr>
          <td align="left" id="label_laporan">Bulan </td>
          <td id="label_laporan">
            <select id="sb_bulan" class="easyui-combobox" name="sb_bulan" style="width:90px">
              <option value="01">JANUARI</option>
              <option value="02">FEBRUARI</option>
              <option value="03">MARET</option>
              <option value="04">APRIL</option>
              <option value="05">MEI</option>
              <option value="06">JUNI</option>
              <option value="07">JULI</option>
              <option value="08">AGUSTUS</option>
              <option value="09">SEPTEMBER</option>
              <option value="10">OKTOBER</option>
              <option value="11">NOVEMBER</option>
              <option value="12">DESEMBER</option>
            </select>

            <label id="label_form">&nbsp;Tahun</label>
            <input name="txt_tahun" type="text" class="easyui-numberspinner" id="txt_tahun" style="width:71px"
              maxlength="4" data-options="min:1990" value="{{ date('Y') }}">
          </td>
        </tr>
        <tr>
          <td id="label_laporan">
            Kolom
          </td>
          <td>
            <select id="kolom" class="easyui-combobox" name="kolom" style="width:202px;">
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
              <select id="operatorString" class="easyui-combobox" name="operatorstring" style="width:202px;">
              </select>
            </div>
            <div id="lap_operatorNumber" hidden>
              <select id="operatorNumber" class="easyui-combobox" name="operatornumber" style="width:202px;">
              </select>
            </div>
          </td>
        </tr>
        <tr>
          <td id="label_laporan" class="label_nilai">Nilai </td>
          <td>
            <div id="hide_nilai" hidden>
              <input class="label_input" id="txt_nilai" name="txt_nilai" style="width:202px" prompt="Nilai">
            </div>
            <div id="hide_nilai_list_aset">
              <input id="txt_nilai_list_aset" name="txt_nilai_list_aset" style="width:202px" prompt="Nilai" />
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
    var kolom = "Kode Aset";
    var namaKolom = "Aset";
    var kolomVal = "maset.kodeaset"
    var checkData = "Kode";
    var operator = "Adalah";
    var operatorVal = "ADALAH";
    var tipedata = "STRING";

    $(document).ready(function() {
      isiOperatorLaporan("String", "operatorString");
      isiOperatorLaporan("Number", "operatorNumber");
      browse_data_lokasi('#txt_lokasi');
      $("#operatorString").combobox('setValues', operatorVal);

      //untuk aset
      browse_data_aset('#txt_nilai_list_aset');
      browse_data_aset('#txt_aset_awal');
      browse_data_aset('#txt_aset_akhir');

      setLokasiCombogrid('{{ session('TOKEN') }}', ['#txt_lokasi']);

      $('#list_filter_laporan').datagrid({
        width: 289,
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
          value: 'ASET',
          jenis: 'Aset'
        },
        {
          value: 'HAPUS',
          jenis: 'Hapus'
        }
      ];

      $('#list_tampil_laporan').datalist({
        width: 289,
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

      $('#txt_aset_awal, #txt_aset_akhir').combogrid('disable').combogrid('clear');
      $('#txt_aset_awal_list').combogrid('disable').combogrid('clear');

      $("[name=rd_aset]").change(function() {
        var text = $(this).val() == 1 ? 'enable' : 'disable';
        var list = $(this).val() == 2 ? 'enable' : 'disable';
        var range = $(this).val() == 3 ? 'enable' : 'disable';

        $('#txt_namaaset').textbox(text);
        $('#txt_aset_awal, #txt_aset_akhir').combogrid(range).combogrid('clear');
        $('#txt_aset_awal_list').combogrid(list).combogrid('clear');

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
          //UNTUK KOLOM BESERTA COMBOGRID
          if (namaKolom == 'Aset') {
            $('#hide_nilai_list_aset').show();
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

          $('#hide_nilai').show();
          $('.label_nilai').show();

          $("#operatorNumber").combobox('setValues', 'SAMA DENGAN');
          operator = "Sama dengan";
          operatorVal = "SAMA DENGAN";
        }

        //CLEAR FIELD SETIAP UBAH
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
          }

          $('#hide_nilai').hide();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('enable');
        } else if (operatorStringVal == "KOSONG" || operatorStringVal == "TIDAK KOSONG") {
          $('#hide_nilai_list_aset').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
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
          $('#hide_nilai_list_aset').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
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
      var checkedTgl = $('input[name="cbtgl[]"]:checked').map(function() {
        return $(this).val();
      }).get();
      parent.buka_laporan(link_api.laporanAset, {
        lokasi: JSON.stringify($('#txt_lokasi').combogrid('getValues')),
        data_filter: JSON.stringify($("#list_filter_laporan").datagrid('getChecked')),
        data_tampil: JSON.stringify($("#list_tampil_laporan").datagrid('getChecked')),
        excel: excel,
        filename: "Laporan Detail Aset",
        kode: "{{ $kodemenu }}",
        tgl: JSON.stringify(checkedTgl),
        tglawal: $("#txt_tgl_aw").datebox('getValue'),
        tglakhir: $("#txt_tgl_ak").datebox('getValue'),
        tglawal_susut: $("#txt_tgl_aw_susut").datebox('getValue'),
        tglakhir_susut: $("#txt_tgl_ak_susut").datebox('getValue'),
        bulan: $("#sb_bulan").combobox('getValue'),
        tahun: $("#txt_tahun").numberspinner('getValue'),
      });
    }

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

    function browse_data_aset(id) {
      $(id).combogrid({
        panelWidth: 430,
        url: link_api.browseAsetLaporan,
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
  </script>
@endpush
