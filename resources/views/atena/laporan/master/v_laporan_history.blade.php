@extends('template.app')

@section('content')
  <div class="easyui-layout" style="width:350px;height:100%; font-weight:bold;" fit="true">
    <div class="panel-filter-laporan" data-options="region:'west',hideCollapsedContent:false" title="{{ $menu }}">
      <table style="border-bottom:1px #000" id="label_laporan">
        <tr valign="top">
          <td>
            <table>
              <tr>
                <td id="label_laporan" class="label_tanggal"><input type="radio" name="tgl" value="TGLHISTORY"
                    checked>Tgl History </td>
                <td>
                  <div id="hide_nilai">
                    <input id="txt_tgl_aw_h" name="txt_tgl_aw_h" style="width:85px;" class="date" /> - <input
                      id="txt_tgl_ak_h" name="txt_tgl_ak_h" style="width:85px;" class="date" />
                  </div>
                </td>
              </tr>
              <tr>
                <td id="label_laporan" class="label_tanggal"><input type="radio" name="tgl" value="TGLTRANS">Tgl
                  Trans </td>
                <td>
                  <div id="hide_nilai">
                    <input id="txt_tgl_aw" name="txt_tgl_aw" style="width:85px;" class="date" /> - <input
                      id="txt_tgl_ak" name="txt_tgl_ak" style="width:85px;" class="date" />
                  </div>
                </td>
              </tr>
              <tr>
                <td id="label_laporan">Jenis Transaksi </td>
                <td><input id="txt_jenistrans" name="txt_jenistrans[]" style="width:180px" /></td>
              </tr>
              <tr>
                <td id="label_laporan" class="label_user">User </td>
                <td>
                  <div id="hide_nilai">
                    <input class="label_input" id="txt_nilai_user" name="txt_nilai_user" style="width:180px"
                      prompt="Nama">
                  </div>
                </td>
              </tr>
              <tr>
                <td id="label_laporan" class="label_kode">Kode Transaksi </td>
                <td>
                  <div id="hide_nilai">
                    <input class="label_input" id="txt_nilai_kode" name="txt_nilai_kode" style="width:180px"
                      prompt="Kode">
                  </div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
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
    var checkData = "Kode";
    var operator = "Adalah";
    var operatorVal = "ADALAH";
    var tipedata = "STRING";

    $(document).ready(function() {
      browse_data_jtrans('#txt_jenistrans');
      $("#txt_tgl_aw, #txt_tgl_ak").datebox('disable');
      tutupLoader();
    });

    function cetakLaporan(excel) {
      let jenistrans = $("#txt_jenistrans").val(); //ANALISIS PO,FAKTUR PAJAK,DELIVERY ORDER,MASTER BARANG
      jenistrans = jenistrans.split(',');
      parent.buka_laporan(link_api.laporanHistoryProgram, {
        tgl: "TGLTRANS",
        tglawal: $("#txt_tgl_aw").datebox('getValue'),
        tglakhir: $("#txt_tgl_ak").datebox('getValue'),
        tglawalhistory: $("#txt_tgl_aw_h").datebox('getValue'),
        tglakhirhistory: $("#txt_tgl_ak_h").datebox('getValue'),
        user: $("#txt_nilai_user").val(),
        kode: $("#txt_nilai_kode").val(),
        jenistransaksi: JSON.stringify(jenistrans),
        excel: excel,
        filename: "Laporan History Program"
      });
    }

    // PRINT LAPORAN
    $("#btn_export_excel").click(function() {
      cetakLaporan('ya');
    });

    $("#btn_print").click(function() {
      cetakLaporan('tidak');
    });

    function browse_data_jtrans(id) {
      $(id).combogrid({
        panelWidth: 180,
        url: link_api.browseJenisTrans,
        idField: 'nama',
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
              field: 'nama',
              title: 'Jenis Transaksi',
              width: 150,
              sortable: true
            },
          ]
        ]
      });
    }


    $('input:radio').change(function() {
      if ($(this).val() == "TGLTRANS") {
        $("#txt_tgl_aw, #txt_tgl_ak").datebox('enable');
        $("#txt_tgl_aw_h, #txt_tgl_ak_h").datebox('disable');
      } else if ($(this).val() == "TGLHISTORY") {
        $("#txt_tgl_aw_h, #txt_tgl_ak_h").datebox('enable');
        $("#txt_tgl_aw, #txt_tgl_ak").datebox('disable');
      }
    });
  </script>
@endpush
