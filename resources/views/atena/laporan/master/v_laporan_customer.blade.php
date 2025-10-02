@extends('template.app')

@section('content')
  <div class="easyui-layout" style="width:350px;height:100%; font-weight:bold;" fit="true">
    <div class="panel-filter-laporan" data-options="region:'west',hideCollapsedContent:false" title="">
      <form method='post' target="LaporanCustomer" id="form_input">
        <table style="border-bottom:1px #000" id="label_laporan">
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
                <option value="mcustomer.kodecustomer">Kode Customer</option>
                <option value="mcustomer.namacustomer">Nama Customer</option>
                <option value="mcustomer.kota">Nama Kota</option>
                <option value="mcustomer.propinsi">Nama Propinsi</option>
                <option value="mkaryawan.kodekaryawan">Kode Marketing</option>
                <option value="mkaryawan.namakaryawan">Nama Marketing</option>
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
              <div id="hide_nilai_list_customer">
                <input id="txt_nilai_list_customer" name="txt_nilai_list_customer" style="width:220px" prompt="Nilai" />
              </div>
              <div id="hide_nilai_list_kota" hidden>
                <input id="txt_nilai_list_kota" name="txt_nilai_list_kota" style="width:220px" prompt="Nilai" />
              </div>
              <div id="hide_nilai_list_propinsi" hidden>
                <input id="txt_nilai_list_propinsi" name="txt_nilai_list_propinsi" style="width:220px" prompt="Nilai" />
              </div>
              <div id="hide_nilai_list_marketing" hidden>
                <input id="txt_nilai_list_marketing" name="txt_nilai_list_marketing" style="width:220px" prompt="Nilai" />
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
        <br>
        <!-- NAMA LAPORAN -->
        <input type="hidden" name="excel" id="excel">
        <input type="hidden" name="file_name" id="file_name" value="LaporanCustomer">
        <input type="hidden" id="data_filter" name="data_filter">
        <input type="hidden" id="data_tampil" name="data_tampil">
      </form>
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
    $(document).ready(function() {
      isiOperatorLaporan("String", "operatorString");
      tutupLoader();
    });
  </script>
@endpush
