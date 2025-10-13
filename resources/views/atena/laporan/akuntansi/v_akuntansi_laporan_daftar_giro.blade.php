@extends('template.app')

@section('content')
  <div class="easyui-layout" style="width:350px;height:100%; font-weight:bold;" fit="true">
    <div class="panel-filter-laporan" data-options="region:'west',hideCollapsedContent:false" title="{{ $menu }}">

      <table style="border-bottom:1px #000" id="label_laporan">
        <tr>
          <td id="label_laporan">Tgl. Terima</td>
          <td id="label_laporan"><input type="checkbox" name="cb_tglterima" id="cb_tglterima" value="1"
              style="padding-top:5px;"><input id="txt_tgl_awal_terima" name="txt_tgl_awal_terima" style="width:95px;"
              class="date" /> - <input id="txt_tgl_akhir_terima" name="txt_tgl_akhir_terima" style="width:95px;"
              class="date" /></td>
        </tr>
        <tr>
          <td id="label_laporan">Tgl. Cair</td>
          <td id="label_laporan"><input type="checkbox" name="cb_tglcair" id="cb_tglcair" value="1"
              style="padding-top:5px;"><input id="txt_tgl_awal_cair" name="txt_tgl_awal_cair" style="width:95px;"
              class="date" /> - <input id="txt_tgl_akhir_cair" name="txt_tgl_akhir_cair" style="width:95px;"
              class="date" /></td>
        </tr>
        <tr valign="top">
          <td colspan="2">
            <ul class="easyui-datalist" title="Jenis" name="list_jenis" id="list_jenis">
            </ul>
          </td>
        </tr>
        <tr valign="top">
          <td colspan="2">
            <ul class="easyui-datalist" title="Status" name="list_status" id="list_status">
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
    var kolom = "Kode Daftar Giro";
    var namaKolom = "Daftar Giro";
    var kolomVal = "mgiro.kodegiro";
    var checkData = "Kode";
    var operator = "Adalah";
    var operatorVal = "ADALAH";
    var tipedata = "STRING";

    $(document).ready(function() {
      $("#txt_tgl_awal_cair").datebox('disable');
      $("#txt_tgl_akhir_cair").datebox('disable');

      $("#txt_tgl_awal_terima").datebox('disable');
      $("#txt_tgl_akhir_terima").datebox('disable');

      $("#cb_tglcair").click(function() {
        if ($(this).prop('checked')) {
          $("#txt_tgl_awal_cair").datebox('enable');
          $("#txt_tgl_akhir_cair").datebox('enable');
        } else {
          $("#txt_tgl_awal_cair").datebox('disable');
          $("#txt_tgl_akhir_cair").datebox('disable');
        }
      });

      $("#cb_tglterima").click(function() {
        if ($(this).prop('checked')) {
          $("#txt_tgl_awal_terima").datebox('enable');
          $("#txt_tgl_akhir_terima").datebox('enable');
        } else {
          $("#txt_tgl_awal_terima").datebox('disable');
          $("#txt_tgl_akhir_terima").datebox('disable');
        }
      });

      //JENIS TAMPILAN LAPORAN
      var arrayJenisLaporan = [{
          value: 'ALL',
          jenis: 'Semua'
        },
        {
          value: 'GIRO MASUK',
          jenis: 'Giro Masuk'
        },
        {
          value: 'GIRO KELUAR',
          jenis: 'Giro Keluar'
        },

      ];

      $('#list_jenis').datalist({
        width: 280,
        height: 155,
        checkbox: true,
        data: arrayJenisLaporan,
        columns: [
          [{
            field: 'jenis',
            title: 'Status',
            width: 200
          }, ]
        ],
      });
      //SET CHECK REKAP
      $('#list_jenis').datalist('checkRow', 0);

      var arrayStatusLaporan = [{
          value: 'ALL',
          jenis: 'Semua'
        },
        {
          value: 'G',
          jenis: 'Belum Cair'
        },
        {
          value: 'C',
          jenis: 'Sudah Cair'
        },
        {
          value: 'T',
          jenis: 'Tolakan'
        },

      ];
      $('#list_status').datalist({
        width: 280,
        height: 155,
        checkbox: true,
        data: arrayStatusLaporan,
        columns: [
          [{
            field: 'jenis',
            title: 'Status',
            width: 200
          }, ]
        ],
      });
      //SET CHECK REKAP
      $('#list_status').datalist('checkRow', 0);
      tutupLoader();
    });

    function cetakLaporan(excel) {
      parent.buka_laporan(link_api.laporanDaftarGiro, {
        filename: "Laporan Daftar Giro",
        kode: "{{ $kodemenu }}",
        excel: excel,
        tglcair: $('[name="cb_tglcair"]').is(':checked') ? 1 : 0,
        tglterima: $('[name="cb_tglterima"]').is(':checked') ? 1 : 0,
        tglawal_terima: $("#txt_tgl_awal_terima").datebox('getValue'),
        tglakhir_terima: $("#txt_tgl_akhir_terima").datebox('getValue'),
        tglawal_cair: $("#txt_tgl_awal_cair").datebox('getValue'),
        tglakhir_cair: $("#txt_tgl_akhir_cair").datebox('getValue'),
        data_tampil: JSON.stringify($("#list_jenis").datalist('getChecked')),
        data_filter: JSON.stringify($("#list_status").datalist('getChecked')),
      });
    }

    $("#btn_export_excel").click(function() {
      cetakLaporan('ya');
    });

    $("#btn_print").click(function() {
      cetakLaporan('tidak');
    });
  </script>
@endpush
