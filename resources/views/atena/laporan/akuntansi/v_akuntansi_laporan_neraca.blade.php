@extends('template.app')

@section('content')
  <div class="easyui-layout" style="width:350px;height:100%; font-weight:bold;" fit="true">
    <div class="panel-filter-laporan" data-options="region:'west',hideCollapsedContent:false" title="{{ $menu }}">

      <table style="border-bottom:1px #000" id="label_laporan">
        <!-- FILTER LAPORAN -->
        <tr>
          <td id="label_form" align="right">Bulan</td>
          <td>
            <select id="sb_bulan" class="easyui-combobox" name="sb_bulan" style="width:151px">
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

            <label id="label_form">Tahun</label>
            <input name="txt_tahun" type="text" class="easyui-numberspinner" id="txt_tahun" style="width:60px"
              maxlength="4" data-options="min:1990" value="{{ date('Y') }}">
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
    $(document).ready(function() {
      browse_data_lokasi('#txt_lokasi');
      $('#sb_bulan').combobox('setValue', {{ date('m') }});
      tutupLoader();
    });

    function cetakLaporan(excel) {
      parent.buka_laporan(link_api.laporanNeraca, {
        kode: "{{ $kodemenu }}",
        tahun: parseInt($('#txt_tahun').numberspinner('getValue')),
        bulan: parseInt($('#sb_bulan').combobox('getValue')),
        excel: excel,
        filename: "Laporan Neraca",
      });
    }

    // PRINT LAPORAN
    $("#btn_export_excel").click(function() {
      cetakLaporan('ya');
    });

    $("#btn_print").click(function() {
      cetakLaporan('tidak');
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
        selectFirstRow: true,
        rowStyler: function(index, row) {
          if (row.status == 0) {
            return 'background-color:#A8AEA6';
          }
        },
        columns: [
          [{
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
  </script>
@endpush
