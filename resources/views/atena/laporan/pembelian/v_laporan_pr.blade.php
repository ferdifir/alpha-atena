@extends('template.app')

@section('content')
  <div class="easyui-layout" style="width:350px;height:100%; font-weight:bold;" fit="true">
    <div class="panel-filter-laporan" data-options="region:'west',hideCollapsedContent:false" title="{{ $menu }}">

      <table style="border-bottom:1px #000" id="label_laporan">
        <!-- FILTER LAPRRAN -->
        <tr>
          <td id="label_laporan" style="width:55px">Lokasi Asal</td>
          <td><input id="txt_lokasi_asal" name="txt_lokasi_asal[]" style="width:220px" /></td>
        </tr>
        <tr>
          <td id="label_laporan" style="width:55px">Lokasi Tujuan</td>
          <td><input id="txt_lokasi_tujuan" name="txt_lokasi_tujuan[]" style="width:220px" /></td>
        </tr>
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
              <option value="tpr.kodepr">Kode Permintaan Barang</option>
              <option value="tapprovejoborder.kodejobapproveorder">Kode Approve Job Order</option>
              <option value="mbarang.kodebarang">Kode Barang</option>
              <option value="mbarang.namabarang">Nama Barang</option>
              <option value="tprdtlbrg.sisa">Sisa</option>
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
            <div id="hide_nilai_list_pr">
              <input id="txt_nilai_list_pr" name="txt_nilai_list_pr" style="width:220px" prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_approvejoborder" hidden>
              <input id="txt_nilai_list_approvejoborder" name="txt_nilai_list_approvejoborder" style="width:220px"
                prompt="Nilai" />
            </div>
            <div id="hide_nilai_list_barang" hidden>
              <input id="txt_nilai_list_barang" name="txt_nilai_list_barang" style="width:220px" prompt="Nilai" />
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
    var kolom = "Kode Permintaan Barang";
    var namaKolom = "Permintaan Barang";
    var kolomVal = "tpr.kodepr"
    var checkData = "Kode";
    var operator = "Adalah";
    var operatorVal = "ADALAH";
    var tipedata = "STRING";

    $(document).ready(async function() {
      isiOperatorLaporan("String", "operatorString");
      isiOperatorLaporan("Number", "operatorNumber");

      browse_data_lokasi_asal('#txt_lokasi_asal');
      browse_data_lokasi_tujuan('#txt_lokasi_tujuan');
      browse_data_approvejoborder('#txt_nilai_list_approvejoborder');
      browse_data_barang('#txt_nilai_list_barang');
      browse_data_pr('#txt_nilai_list_pr');

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
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        showErrorAlert(e);
      }

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


      //JENIS TAMPILAN LAPRRAN
      var arrayTampilLaporan = [{
          value: 'REGISTER',
          jenis: 'Register'
        },
        {
          value: 'REGISTERBARANG',
          jenis: 'Register per Barang'
        },
        {
          value: 'REGISTERAPPROVEJOBORDER',
          jenis: 'Register per Approve Job Order'
        }
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
        namaKolom = kolom.substr(5, kolom.length - 1); // CEK JENIS FILTER APA (SUPPLIER,BARANG,PR)

        if (checkData == "Kode" || checkData == "Nama") {
          //UNTUK KOLOM BESERTA COMBOGRID
          if (namaKolom == 'Approve Job Order') {
            $('#hide_nilai_list_approvejoborder').show();
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_pr').hide();
          } else if (namaKolom == 'Barang') {
            $('#hide_nilai_list_approvejoborder').hide();
            $('#hide_nilai_list_barang').show();
            $('#hide_nilai_list_pr').hide();
          } else if (namaKolom == 'Permintaan Barang') {
            $('#hide_nilai_list_approvejoborder').hide();
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_pr').show();
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

          $('#hide_nilai_list_approvejoborder').hide();
          $('#hide_nilai_list_barang').hide();
          $('#hide_nilai_list_pr').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();

          $("#operatorNumber").combobox('setValues', 'SAMA DENGAN');
          operator = "Sama dengan";
          operatorVal = "SAMA DENGAN";
        }

        //CLEAR FIELD SETIAP UBAH
        $('#txt_nilai_list_approvejoborder').combogrid('clear');
        $('#txt_nilai_list_barang').combogrid('clear');
        $('#txt_nilai_list_pr').combogrid('clear');
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
          if (namaKolom == 'Approve Job Order') {
            $('#hide_nilai_list_approvejoborder').show();
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_pr').hide();
          } else if (namaKolom == 'Barang') {
            $('#hide_nilai_list_approvejoborder').hide();
            $('#hide_nilai_list_barang').show();
            $('#hide_nilai_list_pr').hide();
          } else if (namaKolom == 'Permintaan Barang') {
            $('#hide_nilai_list_approvejoborder').hide();
            $('#hide_nilai_list_barang').hide();
            $('#hide_nilai_list_pr').show();

          }

          $('#hide_nilai').hide();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('enable');
        } else if (operatorStringVal == "KOSONG" || operatorStringVal == "TIDAK KOSONG") {
          $('#hide_nilai_list_approvejoborder').hide();
          $('#hide_nilai_list_barang').hide();
          $('#hide_nilai_list_pr').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_approvejoborder').hide();
          $('#hide_nilai_list_barang').hide();
          $('#hide_nilai_list_pr').hide();

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
          $('#hide_nilai_list_approvejoborder').hide();
          $('#hide_nilai_list_barang').hide();
          $('#hide_nilai_list_pr').hide();

          $('#hide_nilai').show();
          $('.label_nilai').show();
          $('#txt_nilai').textbox('disable');
        } else {
          $('#hide_nilai_list_approvejoborder').hide();
          $('#hide_nilai_list_barang').hide();
          $('#hide_nilai_list_pr').hide();

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
      if (namaKolom == 'Approve Job Order' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_approvejoborder').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Barang' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_barang').combogrid('getValue');
        if (nilai != "") {
          checknilai = 1;
        }
      } else if (namaKolom == 'Permintaan Barang' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
        nilai = $('#txt_nilai_list_pr').combogrid('getValue')
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
        if (namaKolom == 'Approve Job Order' && (operator == "Adalah" || operator == "Tidak Mencakup")) {
          var msg = $('#txt_nilai_list_approvejoborder').combogrid('grid').datagrid("getSelected");

          if (msg != null) //NAMA
          {
            text_laporan = kolom + " " + operator + " " + nilai + ", " + msg.badanusaha;
          }
        }
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

    // PRINT LAPRRAN
    $("#btn_export_excel").click(function() {
      validasi_session(function() {
        var getLokasiAsal = $('#txt_lokasi_asal').combogrid('grid');
        var lokasiAsal = getLokasiAsal.datalist('getSelected');

        var getLokasiTujuan = $('#txt_lokasi_tujuan').combogrid('grid');
        var lokasiTujuan = getLokasiTujuan.datalist('getSelected');
        //var jenistrans = $('input[name="cbJenis[]"]:checked').length;

        //SIMPAN DATA FILTER
        $('#data_filter').val(JSON.stringify($("#list_filter_laporan").datagrid('getChecked')));

        //SIMPAN DATA JENIS LAPRRAN
        $('#data_tampil').val(JSON.stringify($("#list_tampil_laporan").datalist('getChecked')));

        if (lokasiAsal != null && lokasiTujuan != null) {
          $('#excel').val('ya');
          $('#form_input').attr('target', '_blank');
          $('#form_input').submit();
          return false;
        } else if (lokasiAsal == null) {
          $.messager.alert('Warning', 'Data Lokasi Asal Tidak Boleh Kosong');
        } else if (lokasiTujuan == null) {
          $.messager.alert('Warning', 'Data Lokasi Tujuan Tidak Boleh Kosong');
        }
      });
    });

    $("#btn_print").click(function() {
      validasi_session(function() {
        var getLokasiAsal = $('#txt_lokasi_asal').combogrid('grid');
        var lokasiAsal = getLokasiAsal.datalist('getSelected');

        var getLokasiTujuan = $('#txt_lokasi_tujuan').combogrid('grid');
        var lokasiTujuan = getLokasiTujuan.datalist('getSelected');
        //var jenistrans = $('input[name="cbJenis[]"]:checked').length;

        //SIMPAN DATA FILTER
        $('#data_filter').val(JSON.stringify($("#list_filter_laporan").datagrid('getChecked')));

        //SIMPAN DATA JENIS LAPRRAN
        $('#data_tampil').val(JSON.stringify($("#list_tampil_laporan").datalist('getChecked')));

        if (lokasiAsal != null && lokasiTujuan != null) {
          $('#excel').val('tidak');
          counter++
          var tab_title = $('#file_name').val();
          var tab_name = tab_title + counter;
          $('#form_input').attr('target', tab_name);

          $('#tab_laporan').tabs('add', {
            title: tab_title,
            content: '<iframe frameborder="0"  id="' + tab_name + '" name="' + tab_name +
              '" width="99%" height="99%" src="#"></iframe>',
            closable: true,
            tools: [{
              iconCls: 'icon-print',
              handler: function() {
                window.frames[tab_name].print();
              }

            }]
          })

          $('#form_input').submit();
          return false;
        } else if (lokasiAsal == null) {
          $.messager.alert('Warning', 'Data Lokasi Asal Tidak Boleh Kosong');
        } else if (lokasiTujuan == null) {
          $.messager.alert('Warning', 'Data Lokasi Tujuan Tidak Boleh Kosong');
        }
      });
    });

    function browse_data_lokasi_asal(id) {
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

    function browse_data_lokasi_tujuan(id) {
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

    function browse_data_approvejoborder(id) {
      $(id).combogrid({
        panelWidth: 230,
        url: base_url + 'asiaelectrindo/Produksi/Transaksi/ApproveJobOrder/comboGrid',
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
              field: 'tgltrans',
              title: 'Tgl Trans',
              width: 100,
              sortable: true
            },
          ]
        ],
        onSelect: function(index, data, checkdata) {
          if (checkData == "Kode") {
            $('#txt_nilai_list_approvejoborder').combogrid('setValue', data.kode);
          }
        }
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
        rowStyler: function(index, row, checkData) {
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

    function browse_data_pr(id) {
      $(id).combogrid({
        panelWidth: 230,
        url: base_url + 'atena/Pembelian/Transaksi/PermintaanBarang/comboGrid',
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

      });
    }
  </script>
@endpush
