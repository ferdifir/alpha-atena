@extends('template.form')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome/all.min.css') }}" />
@endpush

@section('content')
  <div style="height: 100%;overflow:hidden;margin-left:25px;margin-right:25px">

    <div style="height:30px;background-color:white;">
      <label class="font-header-menu">Pengaturan Modul Aset</label>
      <div align="right" valign="top">
        <p>Proses 8 dari 10</p>
        {{-- signup condition --}}
        <a class="easyui-linkbutton" onclick="javascript:prev()"><i class="far fa-arrow-alt-circle-left"></i> Sebelumnya</a>
        <a class="easyui-linkbutton" onclick="javascript:simpan()"><i class="fas fa-save"></i> Simpan</a>
        {{-- end signup condition --}}
        <a class="easyui-linkbutton" onclick="javascript:next()"><i class="far fa-arrow-alt-circle-right"></i> Simpan dan
          Lanjut</a>
      </div>
    </div>
    <div id="form_input" style="width:100%;height:100%">
      <input type="hidden" name="mode" id="mode">
      <input type="hidden" name="idperusahaan" id="IDPERUSAHAAN">
      <table style="padding:5px">
        <tr>
          <td align="center" id="label_form"></td>
          <td align="center" id="label_form">Auto</td>
          <td align="center" id="label_form">Prefix</td>
          <td align="center" id="label_form" style="width:25px">LOKASI</td>
          <td align="center" id="label_form" style="width:25px">YY</td>
          <td align="center" id="label_form" style="width:25px">MM</td>
          <td align="center" id="label_form" style="width:25px">DD</td>
          <td align="center" id="label_form">Jumlah Digit</td>
          <td align="center" id="label_form">Separator</td>
          <td align="center" id="label_form" style="width:300px">Contoh</td>
        </tr>
        <tr>
          <td align="right" id="label_form">Saldo Awal Aset</td>
          <td align="center" id="label_form"><input id="SBSALDOASET" name="sbsaldoaset" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXSALDOASET" name="prefixsaldoaset" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASISALDOASET" name="lokasisaldoaset" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="YYSALDOASET" name="yysaldoaset" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="MMSALDOASET" name="mmsaldoaset" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DDSALDOASET" name="ddsaldoaset" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DIGITSALDOASET" name="digitsaldoaset" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBSALDOASET" name="cbsaldoaset" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELSALDOASET"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Pembelian Aset</td>
          <td align="center" id="label_form"><input id="SBASETBELI" name="sbasetbeli" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXASETBELI" name="prefixasetbeli" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIASETBELI" name="lokasiasetbeli" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="YYASETBELI" name="yyasetbeli" type="checkbox"
              value="1">
          </td>
          <td align="center" id="label_form"><input id="MMASETBELI" name="mmasetbeli" type="checkbox"
              value="1">
          </td>
          <td align="center" id="label_form"><input id="DDASETBELI" name="ddasetbeli" type="checkbox"
              value="1">
          </td>
          <td align="center" id="label_form"><input id="DIGITASETBELI" name="digitasetbeli" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBASETBELI" name="cbasetbeli" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELASETBELI"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Retur Pembelian Aset</td>
          <td align="center" id="label_form"><input id="SBASETRETURBELI" name="sbasetreturbeli"
              class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXASETRETURBELI" name="prefixasetreturbeli"
              style="width:150px" class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIASETRETURBELI" name="lokasiasetreturbeli"
              type="checkbox" value="1"></td>
          <td align="center" id="label_form"><input id="YYASETRETURBELI" name="yyasetreturbeli" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMASETRETURBELI" name="mmasetreturbeli" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDASETRETURBELI" name="ddasetreturbeli" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITASETRETURBELI" name="digitasetreturbeli"
              style="width:80px" class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBASETRETURBELI" name="cbasetreturbeli" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELASETRETURBELI"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Transfer Aset</td>
          <td align="center" id="label_form"><input id="SBASETTRANSFER" name="sbasettransfer"
              class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXASETTRANSFER" name="prefixasettransfer"
              style="width:150px" class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIASETTRANSFER" name="lokasiasettransfer" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="YYASETTRANSFER" name="yyasettransfer" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMASETTRANSFER" name="mmasettransfer" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDASETTRANSFER" name="ddasettransfer" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITASETTRANSFER" name="digitasettransfer"
              style="width:80px" class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBASETTRANSFER" name="cbasettransfer" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELASETTRANSFER"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Penghapusan Aset</td>
          <td align="center" id="label_form"><input id="SBASETHAPUS" name="sbasethapus" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXASETHAPUS" name="prefixasethapus" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIASETHAPUS" name="lokasiasethapus" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="YYASETHAPUS" name="yyasethapus" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMASETHAPUS" name="mmasethapus" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDASETHAPUS" name="ddasethapus" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITASETHAPUS" name="digitasethapus" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBASETHAPUS" name="cbasethapus" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELASETHAPUS"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Penjualan Aset</td>
          <td align="center" id="label_form"><input id="SBASETJUAL" name="sbasetjual" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXASETJUAL" name="prefixasetjual" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIASETJUAL" name="lokasiasetjual" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="YYASETJUAL" name="yyasetjual" type="checkbox"
              value="1">
          </td>
          <td align="center" id="label_form"><input id="MMASETJUAL" name="mmasetjual" type="checkbox"
              value="1">
          </td>
          <td align="center" id="label_form"><input id="DDASETJUAL" name="ddasetjual" type="checkbox"
              value="1">
          </td>
          <td align="center" id="label_form"><input id="DIGITASETJUAL" name="digitasetjual" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBASETJUAL" name="cbasetjual" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELASETJUAL"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Penyusutan Aset</td>
          <td align="center" id="label_form"><input id="SBASETSUSUT" name="sbasetsusut" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXASETSUSUT" name="prefixasetsusut" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIASETSUSUT" name="lokasiasetsusut" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="YYASETSUSUT" name="yyasetsusut" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMASETSUSUT" name="mmasetsusut" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDASETSUSUT" name="ddasetsusut" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITASETSUSUT" name="digitasetsusut" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBASETSUSUT" name="cbasetsusut" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELASETSUSUT"></label></td>
        </tr>
      </table>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      $("#mode").val("ubah");

      $("#SBSALDOASET").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXSALDOASET").textbox("disable").textbox("clear");
            $("#DIGITSALDOASET").numberbox("disable").numberbox("clear");
            $("#LOKASISALDOASET").prop("checked", false).attr("disabled", true);
            $("#YYSALDOASET").prop("checked", false).attr("disabled", true);
            $("#MMSALDOASET").prop("checked", false).attr("disabled", true);
            $("#DDSALDOASET").prop("checked", false).attr("disabled", true);
            $("#CBSALDOASET").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXSALDOASET").textbox("enable");
            $("#DIGITSALDOASET").numberbox("enable");
            $("#LOKASISALDOASET").attr("disabled", false);
            $("#YYSALDOASET").attr("disabled", false);
            $("#MMSALDOASET").attr("disabled", true);
            $("#DDSALDOASET").attr("disabled", true);
            $("#CBSALDOASET").combobox("setValue", "").combobox("enable");
            getDataConfig("SALDOASET");
          }
        }
      });

      $("#SBASETBELI").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXASETBELI").textbox("disable").textbox("clear");
            $("#DIGITASETBELI").numberbox("disable").numberbox("clear");
            $("#LOKASIASETBELI").prop("checked", false).attr("disabled", true);
            $("#YYASETBELI").prop("checked", false).attr("disabled", true);
            $("#MMASETBELI").prop("checked", false).attr("disabled", true);
            $("#DDASETBELI").prop("checked", false).attr("disabled", true);
            $("#CBASETBELI").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXASETBELI").textbox("enable");
            $("#DIGITASETBELI").numberbox("enable");
            $("#LOKASIASETBELI").attr("disabled", false);
            $("#YYASETBELI").attr("disabled", false);
            $("#MMASETBELI").attr("disabled", true);
            $("#DDASETBELI").attr("disabled", true);
            $("#CBASETBELI").combobox("setValue", "").combobox("enable");
            getDataConfig("ASETBELI");
          }
        }
      });

      $("#SBASETRETURBELI").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXASETRETURBELI").textbox("disable").textbox("clear");
            $("#DIGITASETRETURBELI").numberbox("disable").numberbox("clear");
            $("#LOKASIASETRETURBELI").prop("checked", false).attr("disabled", true);
            $("#YYASETRETURBELI").prop("checked", false).attr("disabled", true);
            $("#MMASETRETURBELI").prop("checked", false).attr("disabled", true);
            $("#DDASETRETURBELI").prop("checked", false).attr("disabled", true);
            $("#CBASETRETURBELI").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXASETRETURBELI").textbox("enable");
            $("#DIGITASETRETURBELI").numberbox("enable");
            $("#LOKASIASETRETURBELI").attr("disabled", false);
            $("#YYASETRETURBELI").attr("disabled", false);
            $("#MMASETRETURBELI").attr("disabled", true);
            $("#DDASETRETURBELI").attr("disabled", true);
            $("#CBASETRETURBELI").combobox("setValue", "").combobox("enable");
            getDataConfig("ASETRETURBELI");
          }
        }
      });

      $("#SBASETTRANSFER").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXASETTRANSFER").textbox("disable").textbox("clear");
            $("#DIGITASETTRANSFER").numberbox("disable").numberbox("clear");
            $("#LOKASIASETTRANSFER").prop("checked", false).attr("disabled", true);
            $("#YYASETTRANSFER").prop("checked", false).attr("disabled", true);
            $("#MMASETTRANSFER").prop("checked", false).attr("disabled", true);
            $("#DDASETTRANSFER").prop("checked", false).attr("disabled", true);
            $("#CBASETTRANSFER").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXASETTRANSFER").textbox("enable");
            $("#DIGITASETTRANSFER").numberbox("enable");
            $("#LOKASIASETTRANSFER").attr("disabled", false);
            $("#YYASETTRANSFER").attr("disabled", false);
            $("#MMASETTRANSFER").attr("disabled", true);
            $("#DDASETTRANSFER").attr("disabled", true);
            $("#CBASETTRANSFER").combobox("setValue", "").combobox("enable");
            getDataConfig("ASETTRANSFER");
          }
        }
      });

      $("#SBASETHAPUS").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXASETHAPUS").textbox("disable").textbox("clear");
            $("#DIGITASETHAPUS").numberbox("disable").numberbox("clear");
            $("#LOKASIASETHAPUS").prop("checked", false).attr("disabled", true);
            $("#YYASETHAPUS").prop("checked", false).attr("disabled", true);
            $("#MMASETHAPUS").prop("checked", false).attr("disabled", true);
            $("#DDASETHAPUS").prop("checked", false).attr("disabled", true);
            $("#CBASETHAPUS").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXASETHAPUS").textbox("enable");
            $("#DIGITASETHAPUS").numberbox("enable");
            $("#LOKASIASETHAPUS").attr("disabled", false);
            $("#YYASETHAPUS").attr("disabled", false);
            $("#MMASETHAPUS").attr("disabled", true);
            $("#DDASETHAPUS").attr("disabled", true);
            $("#CBASETHAPUS").combobox("setValue", "").combobox("enable");
            getDataConfig("ASETHAPUS");
          }
        }
      });

      $("#SBASETJUAL").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXASETJUAL").textbox("disable").textbox("clear");
            $("#DIGITASETJUAL").numberbox("disable").numberbox("clear");
            $("#LOKASIASETJUAL").prop("checked", false).attr("disabled", true);
            $("#YYASETJUAL").prop("checked", false).attr("disabled", true);
            $("#MMASETJUAL").prop("checked", false).attr("disabled", true);
            $("#DDASETJUAL").prop("checked", false).attr("disabled", true);
            $("#CBASETJUAL").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXASETJUAL").textbox("enable");
            $("#DIGITASETJUAL").numberbox("enable");
            $("#LOKASIASETJUAL").attr("disabled", false);
            $("#YYASETJUAL").attr("disabled", false);
            $("#MMASETJUAL").attr("disabled", true);
            $("#DDASETJUAL").attr("disabled", true);
            $("#CBASETJUAL").combobox("setValue", "").combobox("enable");
            getDataConfig("ASETJUAL");
          }
        }
      });

      $("#SBASETSUSUT").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXASETSUSUT").textbox("disable").textbox("clear");
            $("#DIGITASETSUSUT").numberbox("disable").numberbox("clear");
            $("#LOKASIASETSUSUT").prop("checked", false).attr("disabled", true);
            $("#YYASETSUSUT").prop("checked", false).attr("disabled", true);
            $("#MMASETSUSUT").prop("checked", false).attr("disabled", true);
            $("#DDASETSUSUT").prop("checked", false).attr("disabled", true);
            $("#CBASETSUSUT").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXASETSUSUT").textbox("enable");
            $("#DIGITASETSUSUT").numberbox("enable");
            $("#LOKASIASETSUSUT").attr("disabled", false);
            $("#YYASETSUSUT").attr("disabled", false);
            $("#MMASETSUSUT").attr("disabled", true);
            $("#DDASETSUSUT").attr("disabled", true);
            $("#CBASETSUSUT").combobox("setValue", "").combobox("enable");
            getDataConfig("ASETSUSUT");
          }
        }
      });

      //SCRIPT UNTUK LOKASI, YEAR, MONTH, DATE
      $("#LOKASISALDOASET").change(function() {
        generate_kode("SALDOASET");
      });

      $("#YYSALDOASET").change(function() {
        if (this.checked) {
          $("#MMSALDOASET").prop("checked", false).attr("disabled", false);
          $("#DDSALDOASET").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMSALDOASET").prop("checked", false).attr("disabled", true);
          $("#DDSALDOASET").prop("checked", false).attr("disabled", true);
        }
        generate_kode("SALDOASET");
      });

      $("#MMSALDOASET").change(function() {
        if (this.checked) {
          $("#DDSALDOASET").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDSALDOASET").prop("checked", false).attr("disabled", true);
        }
        generate_kode("SALDOASET");
      });

      $("#DDSALDOASET").change(function() {
        generate_kode("SALDOASET");
      });

      $("#LOKASIASETBELI").change(function() {
        generate_kode("ASETBELI");
      });

      $("#YYASETBELI").change(function() {
        if (this.checked) {
          $("#MMASETBELI").prop("checked", false).attr("disabled", false);
          $("#DDASETBELI").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMASETBELI").prop("checked", false).attr("disabled", true);
          $("#DDASETBELI").prop("checked", false).attr("disabled", true);
        }
        generate_kode("ASETBELI");
      });

      $("#MMASETBELI").change(function() {
        if (this.checked) {
          $("#DDASETBELI").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDASETBELI").prop("checked", false).attr("disabled", true);
        }
        generate_kode("ASETBELI");
      });

      $("#DDASETBELI").change(function() {
        generate_kode("ASETBELI");
      });

      $("#LOKASIASETRETURBELI").change(function() {
        generate_kode("ASETRETURBELI");
      });

      $("#YYASETRETURBELI").change(function() {
        if (this.checked) {
          $("#MMASETRETURBELI").prop("checked", false).attr("disabled", false);
          $("#DDASETRETURBELI").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMASETRETURBELI").prop("checked", false).attr("disabled", true);
          $("#DDASETRETURBELI").prop("checked", false).attr("disabled", true);
        }
        generate_kode("ASETRETURBELI");
      });

      $("#MMASETRETURBELI").change(function() {
        if (this.checked) {
          $("#DDASETRETURBELI").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDASETRETURBELI").prop("checked", false).attr("disabled", true);
        }
        generate_kode("ASETRETURBELI");
      });

      $("#DDASETRETURBELI").change(function() {
        generate_kode("ASETRETURBELI");
      });

      $("#LOKASIASETTRANSFER").change(function() {
        generate_kode("ASETTRANSFER");
      });

      $("#YYASETTRANSFER").change(function() {
        if (this.checked) {
          $("#MMASETTRANSFER").prop("checked", false).attr("disabled", false);
          $("#DDASETTRANSFER").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMASETTRANSFER").prop("checked", false).attr("disabled", true);
          $("#DDASETTRANSFER").prop("checked", false).attr("disabled", true);
        }
        generate_kode("ASETTRANSFER");
      });

      $("#MMASETTRANSFER").change(function() {
        if (this.checked) {
          $("#DDASETTRANSFER").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDASETTRANSFER").prop("checked", false).attr("disabled", true);
        }
        generate_kode("ASETTRANSFER");
      });

      $("#DDASETTRANSFER").change(function() {
        generate_kode("ASETTRANSFER");
      });

      $("#LOKASIASETHAPUS").change(function() {
        generate_kode("ASETHAPUS");
      });

      $("#YYASETHAPUS").change(function() {
        if (this.checked) {
          $("#MMASETHAPUS").prop("checked", false).attr("disabled", false);
          $("#DDASETHAPUS").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMASETHAPUS").prop("checked", false).attr("disabled", true);
          $("#DDASETHAPUS").prop("checked", false).attr("disabled", true);
        }
        generate_kode("ASETHAPUS");
      });

      $("#MMASETHAPUS").change(function() {
        if (this.checked) {
          $("#DDASETHAPUS").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDASETHAPUS").prop("checked", false).attr("disabled", true);
        }
        generate_kode("ASETHAPUS");
      });

      $("#DDASETHAPUS").change(function() {
        generate_kode("ASETHAPUS");
      });

      $("#LOKASIASETJUAL").change(function() {
        generate_kode("ASETJUAL");
      });

      $("#YYASETJUAL").change(function() {
        if (this.checked) {
          $("#MMASETJUAL").prop("checked", false).attr("disabled", false);
          $("#DDASETJUAL").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMASETJUAL").prop("checked", false).attr("disabled", true);
          $("#DDASETJUAL").prop("checked", false).attr("disabled", true);
        }
        generate_kode("ASETJUAL");
      });

      $("#MMASETJUAL").change(function() {
        if (this.checked) {
          $("#DDASETJUAL").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDASETJUAL").prop("checked", false).attr("disabled", true);
        }
        generate_kode("ASETJUAL");
      });

      $("#DDASETJUAL").change(function() {
        generate_kode("ASETJUAL");
      });

      $("#LOKASIASETSUSUT").change(function() {
        generate_kode("ASETSUSUT");
      });

      $("#YYASETSUSUT").change(function() {
        if (this.checked) {
          $("#MMASETSUSUT").prop("checked", false).attr("disabled", false);
          $("#DDASETSUSUT").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMASETSUSUT").prop("checked", false).attr("disabled", true);
          $("#DDASETSUSUT").prop("checked", false).attr("disabled", true);
        }
        generate_kode("ASETSUSUT");
      });

      $("#MMASETSUSUT").change(function() {
        if (this.checked) {
          $("#DDASETSUSUT").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDASETSUSUT").prop("checked", false).attr("disabled", true);
        }
        generate_kode("ASETSUSUT");
      });

      $("#DDASETSUSUT").change(function() {
        generate_kode("ASETSUSUT");
      });

      $("#CBSALDOASET").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("SALDOASET");
        }
      });

      $("#CBASETBELI").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETBELI");
        }
      });

      $("#CBASETRETURBELI").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETRETURBELI");
        }
      });

      $("#CBASETTRANSFER").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETTRANSFER");
        }
      });

      $("#CBASETHAPUS").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETHAPUS");
        }
      });

      $("#CBASETJUAL").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETJUAL");
        }
      });

      $("#CBASETSUSUT").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETSUSUT");
        }
      });

      //SCRIPT PREFIX
      $("#PREFIXSALDOASET").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("SALDOASET");
        },
      });
      $("#PREFIXASETBELI").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETBELI");
        },
      });
      $("#PREFIXASETRETURBELI").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETRETURBELI");
        },
      });
      $("#PREFIXASETTRANSFER").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETTRANSFER");
        },
      });
      $("#PREFIXASETHAPUS").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETHAPUS");
        },
      });
      $("#PREFIXASETJUAL").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETJUAL");
        },
      });
      $("#PREFIXASETSUSUT").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETSUSUT");
        },
      });

      $("#DIGITSALDOASET").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("SALDOASET");
        },
      });
      $("#DIGITASETBELI").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETBELI");
        },
      });
      $("#DIGITASETRETURBELI").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETRETURBELI");
        },
      });
      $("#DIGITASETTRANSFER").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETTRANSFER");
        },
      });
      $("#DIGITASETHAPUS").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETHAPUS");
        },
      });
      $("#DIGITASETJUAL").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETJUAL");
        },
      });
      $("#DIGITASETSUSUT").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("ASETSUSUT");
        },
      });

      $("#LOKASISALDOASET").prop("checked", false);
      $("#YYSALDOASET").prop("checked", false);
      $("#MMSALDOASET").prop("checked", false);
      $("#DDSALDOASET").prop("checked", false);
      $("#LOKASIASETBELI").prop("checked", false);
      $("#YYASETBELI").prop("checked", false);
      $("#MMASETBELI").prop("checked", false);
      $("#DDASETBELI").prop("checked", false);
      $("#LOKASIASETRETURBELI").prop("checked", false);
      $("#YYASETRETURBELI").prop("checked", false);
      $("#MMASETRETURBELI").prop("checked", false);
      $("#DDASETRETURBELI").prop("checked", false);
      $("#LOKASIASETTRANSFER").prop("checked", false);
      $("#YYASETTRANSFER").prop("checked", false);
      $("#MMASETTRANSFER").prop("checked", false);
      $("#DDASETTRANSFER").prop("checked", false);
      $("#LOKASIASETHAPUS").prop("checked", false);
      $("#YYASETHAPUS").prop("checked", false);
      $("#MMASETHAPUS").prop("checked", false);
      $("#DDASETHAPUS").prop("checked", false);
      $("#LOKASIASETJUAL").prop("checked", false);
      $("#YYASETJUAL").prop("checked", false);
      $("#MMASETJUAL").prop("checked", false);
      $("#DDASETJUAL").prop("checked", false);
      $("#LOKASIASETSUSUT").prop("checked", false);
      $("#YYASETSUSUT").prop("checked", false);
      $("#MMASETSUSUT").prop("checked", false);
      $("#DDASETSUSUT").prop("checked", false);

      getDataAset();
    });

    async function loadDataAset(data) {
      const saldoaset = data.saldoaset.prefix;
      const asetbeli = data.asetbeli.prefix;
      const asetreturbeli = data.asetreturbeli.prefix;
      const asettransfer = data.asettransfer.prefix;
      const asethapus = data.asethapus.prefix;
      const asetjual = data.asetjual.prefix;
      const asetsusut = data.asetsusut.prefix;

      $("#PREFIXSALDOASET").textbox("setValue", saldoaset.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXASETBELI").textbox("setValue", asetbeli.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXASETRETURBELI").textbox("setValue", asetreturbeli.replace(/\//g, "").replace(/\-/g, "").replace(/\./g,
        "").replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]",
        ""));
      $("#PREFIXASETTRANSFER").textbox("setValue", asettransfer.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXASETHAPUS").textbox("setValue", asethapus.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXASETJUAL").textbox("setValue", asetjual.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXASETSUSUT").textbox("setValue", asetsusut.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));

      if (saldoaset.includes('[LOKASI]')) {
        $("#LOKASISALDOASET").prop("checked", true);
      }
      if (saldoaset.includes('[YY]')) {
        $("#YYSALDOASET").prop("checked", true).attr("disabled", false);
      }
      if (saldoaset.includes('[MM]')) {
        $("#MMSALDOASET").prop("checked", true).attr("disabled", false);
      }
      if (saldoaset.includes('[DD]')) {
        $("#DDSALDOASET").prop("checked", true).attr("disabled", false);
      }
      if (saldoaset.includes('/')) {
        $("#CBSALDOASET").combobox("setValue", "/")
      } else if (saldoaset.includes('-')) {
        $("#CBSALDOASET").combobox("setValue", "-")
      } else if (saldoaset.includes('.')) {
        $("#CBSALDOASET").combobox("setValue", ".")
      } else {
        $("#CBSALDOASET").combobox("setValue", "")
      }

      if (asetbeli.includes('[LOKASI]')) {
        $("#LOKASIASETBELI").prop("checked", true);
      }
      if (asetbeli.includes('[YY]')) {
        $("#YYASETBELI").prop("checked", true).attr("disabled", false);
      }
      if (asetbeli.includes('[MM]')) {
        $("#MMASETBELI").prop("checked", true).attr("disabled", false);
      }
      if (asetbeli.includes('[DD]')) {
        $("#DDASETBELI").prop("checked", true).attr("disabled", false);
      }
      if (asetbeli.includes('/')) {
        $("#CBASETBELI").combobox("setValue", "/")
      } else if (asetbeli.includes('-')) {
        $("#CBASETBELI").combobox("setValue", "-")
      } else if (asetbeli.includes('.')) {
        $("#CBASETBELI").combobox("setValue", ".")
      } else {
        $("#CBASETBELI").combobox("setValue", "")
      }

      if (asetreturbeli.includes('[LOKASI]')) {
        $("#LOKASIASETRETURBELI").prop("checked", true);
      }
      if (asetreturbeli.includes('[YY]')) {
        $("#YYASETRETURBELI").prop("checked", true).attr("disabled", false);
      }
      if (asetreturbeli.includes('[MM]')) {
        $("#MMASETRETURBELI").prop("checked", true).attr("disabled", false);
      }
      if (asetreturbeli.includes('[DD]')) {
        $("#DDASETRETURBELI").prop("checked", true).attr("disabled", false);
      }
      if (asetreturbeli.includes('/')) {
        $("#CBASETRETURBELI").combobox("setValue", "/")
      } else if (asetreturbeli.includes('-')) {
        $("#CBASETRETURBELI").combobox("setValue", "-")
      } else if (asetreturbeli.includes('.')) {
        $("#CBASETRETURBELI").combobox("setValue", ".")
      } else {
        $("#CBASETRETURBELI").combobox("setValue", "")
      }

      if (asettransfer.includes('[LOKASI]')) {
        $("#LOKASIASETTRANSFER").prop("checked", true);
      }
      if (asettransfer.includes('[YY]')) {
        $("#YYASETTRANSFER").prop("checked", true).attr("disabled", false);
      }
      if (asettransfer.includes('[MM]')) {
        $("#MMASETTRANSFER").prop("checked", true).attr("disabled", false);
      }
      if (asettransfer.includes('[DD]')) {
        $("#DDASETTRANSFER").prop("checked", true).attr("disabled", false);
      }
      if (asettransfer.includes('/')) {
        $("#CBASETTRANSFER").combobox("setValue", "/")
      } else if (asettransfer.includes('-')) {
        $("#CBASETTRANSFER").combobox("setValue", "-")
      } else if (asettransfer.includes('.')) {
        $("#CBASETTRANSFER").combobox("setValue", ".")
      } else {
        $("#CBASETTRANSFER").combobox("setValue", "")
      }

      if (asethapus.includes('[LOKASI]')) {
        $("#LOKASIASETHAPUS").prop("checked", true);
      }
      if (asethapus.includes('[YY]')) {
        $("#YYASETHAPUS").prop("checked", true).attr("disabled", false);
      }
      if (asethapus.includes('[MM]')) {
        $("#MMASETHAPUS").prop("checked", true).attr("disabled", false);
      }
      if (asethapus.includes('[DD]')) {
        $("#DDASETHAPUS").prop("checked", true).attr("disabled", false);
      }
      if (asethapus.includes('/')) {
        $("#CBASETHAPUS").combobox("setValue", "/")
      } else if (asethapus.includes('-')) {
        $("#CBASETHAPUS").combobox("setValue", "-")
      } else if (asethapus.includes('.')) {
        $("#CBASETHAPUS").combobox("setValue", ".")
      } else {
        $("#CBASETHAPUS").combobox("setValue", "")
      }

      if (asetjual.includes('[LOKASI]')) {
        $("#LOKASIASETJUAL").prop("checked", true);
      }
      if (asetjual.includes('[YY]')) {
        $("#YYASETJUAL").prop("checked", true).attr("disabled", false);
      }
      if (asetjual.includes('[MM]')) {
        $("#MMASETJUAL").prop("checked", true).attr("disabled", false);
      }
      if (asetjual.includes('[DD]')) {
        $("#DDASETJUAL").prop("checked", true).attr("disabled", false);
      }
      if (asetjual.includes('/')) {
        $("#CBASETJUAL").combobox("setValue", "/")
      } else if (asetjual.includes('-')) {
        $("#CBASETJUAL").combobox("setValue", "-")
      } else if (asetjual.includes('.')) {
        $("#CBASETJUAL").combobox("setValue", ".")
      } else {
        $("#CBASETJUAL").combobox("setValue", "")
      }

      if (asetsusut.includes('[LOKASI]')) {
        $("#LOKASIASETSUSUT").prop("checked", true);
      }
      if (asetsusut.includes('[YY]')) {
        $("#YYASETSUSUT").prop("checked", true).attr("disabled", false);
      }
      if (asetsusut.includes('[MM]')) {
        $("#MMASETSUSUT").prop("checked", true).attr("disabled", false);
      }
      if (asetsusut.includes('[DD]')) {
        $("#DDASETSUSUT").prop("checked", true).attr("disabled", false);
      }
      if (asetsusut.includes('/')) {
        $("#CBASETSUSUT").combobox("setValue", "/")
      } else if (asetsusut.includes('-')) {
        $("#CBASETSUSUT").combobox("setValue", "-")
      } else if (asetsusut.includes('.')) {
        $("#CBASETSUSUT").combobox("setValue", ".")
      } else {
        $("#CBASETSUSUT").combobox("setValue", "")
      }

      $("#DIGITSALDOASET").numberbox("setValue", data.saldoaset.jumlahdigit);
      $("#DIGITASETBELI").numberbox("setValue", data.asetbeli.jumlahdigit);
      $("#DIGITASETRETURBELI").numberbox("setValue", data.asetreturbeli.jumlahdigit);
      $("#DIGITASETTRANSFER").numberbox("setValue", data.asettransfer.jumlahdigit);
      $("#DIGITASETHAPUS").numberbox("setValue", data.asethapus.jumlahdigit);
      $("#DIGITASETJUAL").numberbox("setValue", data.asetjual.jumlahdigit);
      $("#DIGITASETSUSUT").numberbox("setValue", data.asetsusut.jumlahdigit);

      if (data.saldoaset.value == "AUTO") {
        $("#SBSALDOASET").switchbutton('check');
      } else {
        $("#SBSALDOASET").switchbutton('uncheck');
      }
      if (data.asetbeli.value == "AUTO") {
        $("#SBASETBELI").switchbutton('check');
      } else {
        $("#SBASETBELI").switchbutton('uncheck');
      }
      if (data.asetreturbeli.value == "AUTO") {
        $("#SBASETRETURBELI").switchbutton('check');
      } else {
        $("#SBASETRETURBELI").switchbutton('uncheck');
      }
      if (data.asettransfer.value == "AUTO") {
        $("#SBASETTRANSFER").switchbutton('check');
      } else {
        $("#SBASETTRANSFER").switchbutton('uncheck');
      }
      if (data.asethapus.value == "AUTO") {
        $("#SBASETHAPUS").switchbutton('check');
      } else {
        $("#SBASETHAPUS").switchbutton('uncheck');
      }
      if (data.asetjual.value == "AUTO") {
        $("#SBASETJUAL").switchbutton('check');
      } else {
        $("#SBASETJUAL").switchbutton('uncheck');
      }
      if (data.asetsusut.value == "AUTO") {
        $("#SBASETSUSUT").switchbutton('check');
      } else {
        $("#SBASETSUSUT").switchbutton('uncheck');
      }

      const promises = [
        generate_kode("SALDOASET"),
        generate_kode("ASETBELI"),
        generate_kode("ASETRETURBELI"),
        generate_kode("ASETTRANSFER"),
        generate_kode("ASETHAPUS"),
        generate_kode("ASETJUAL"),
        generate_kode("ASETSUSUT"),
      ];

      await Promise.all(promises);
    }

    async function getDataConfig(modul) {
      try {
        const response = await parent.fetchData(link_api.loadConfigInventori, {
          modul: modul
        });
        if (response.success) {
          const msg = response.data;
          if (msg.prefix.includes('[LOKASI]')) {
            $("#LOKASI" + modul).prop("checked", true);
          } else {
            $("#LOKASI" + modul).prop("checked", false).attr("disabled", false);
          }
          if (msg.prefix.includes('[YY]')) {
            $("#YY" + modul).prop("checked", true).attr("disabled", false);
          } else {
            $("#YY" + modul).prop("checked", false).attr("disabled", false);
          }
          if (msg.prefix.includes('[MM]')) {
            $("#MM" + modul).prop("checked", true).attr("disabled", false);
          } else {
            $("#MM" + modul).prop("checked", false).attr("disabled", false);
          }
          if (msg.prefix.includes('[DD]')) {
            $("#DD" + modul).prop("checked", true).attr("disabled", false);
          } else {
            $("#DD" + modul).prop("checked", false).attr("disabled", false);
          }
          if (msg.prefix.includes('/')) {
            $("#CB" + modul).combobox("setValue", "/")
          } else if (msg.prefix.includes('-')) {
            $("#CB" + modul).combobox("setValue", "-")
          } else if (msg.prefix.includes('.')) {
            $("#CB" + modul).combobox("setValue", ".")
          } else {
            $("#CB" + modul).combobox("setValue", "")
          }

          $("#PREFIX" + modul).textbox("setValue", msg.prefix.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
            .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
          $("#DIGIT" + modul).numberbox("setValue", msg.jumlahdigit);
          generate_kode(modul);
        } else {
          throw new Error(response.message || 'Gagal memuat data');
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        $.messager.alert('Error', getTextError(error), 'error');
      }
    }

    async function generate_kode(modul) {
      const prefix = $("#PREFIX" + modul).textbox("getValue");
      const jmldigit = $("#DIGIT" + modul).numberbox("getValue");
      const lokasi = $("#LOKASI" + modul).is(":checked");
      const thn = $("#YY" + modul).is(":checked");
      const bln = $("#MM" + modul).is(":checked");
      const tgl = $("#DD" + modul).is(":checked");
      const separator = $("#CB" + modul).combobox("getValue");

      try {
        const response = await parent.fetchData(link_api.generateCodeInventori, {
          modul: modul,
          prefix: prefix,
          jmldigit: jmldigit,
          separator: separator,
          lokasi: lokasi.toString(),
          thn: thn.toString(),
          bln: bln.toString(),
          tgl: tgl.toString(),
        });

        if (response.success) {
          const msg = response.data;
          if ($("#SB" + modul).switchbutton("options").checked) {
            $("#LABEL" + modul).html(msg.kode);
          } else {
            $("#LABEL" + modul).html("MANUAL");
          }

          if (msg.sudahadadata) {
            $("#PREFIX" + modul).textbox("disable");
            $("#DIGIT" + modul).numberbox("disable");
            $("#CB" + modul).combobox("disable");
            $("#LOKASI" + modul).prop("disabled", true);
            $("#YY" + modul).prop("disabled", true);
            $("#MM" + modul).prop("disabled", true);
            $("#DD" + modul).prop("disabled", true);
          }
        } else {
          throw new Error(response.message || 'Gagal memuat data');
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        $.messager.alert('Error', getTextError(error), 'error');
      }
    }

    async function getDataAset() {
      try {
        const response = await parent.fetchData(link_api.loadSettingAset, null);

        if (response.success) {
          await loadDataAset(response.data);
        } else {
          throw new Error(response.message || 'Gagal memuat data');
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        $.messager.alert('Error', getTextError(error), 'error');
      } finally {
        tutupLoader();
      }
    }

    async function simpanData() {
      try {
        const data = $('#form_input :input').serializeArray();
        const payload = {};
        for (const item of data) {
          payload[item.name] = item.value;
        }

        const response = await parent.fetchData(link_api.simpanSettingProduksi, payload);

        if (response.success) {
          return true;
        } else {
          throw new Error(response.message || 'Gagal menyimpan data.');
        }
      } catch (e) {
        throw new Error(e.message || 'Terjadi kesalahan saat menyimpan data.');
      }
    }

    async function handleFormSubmit(onSuccessCallback) {
      const isValid = $('#form_input').form('validate');

      if (isValid) {
        try {
          tampilLoaderSimpan();
          await simpanData();
          if (typeof onSuccessCallback === 'function') {
            onSuccessCallback();
          }
        } catch (e) {
          const error = (typeof e === 'string') ? e : e.message;
          $.messager.alert('Error', getTextError(error), 'error');
        } finally {
          tutupLoaderSimpan();
        }
      }
    }

    function prev() {
      window.location = "{{ route('atena.master.pengaturan.frame-master-produksi') }}";
    }

    async function simpan() {
      await handleFormSubmit(() => {
        $.messager.alert('Info', 'Data berhasil diubah', 'info');
      });
    }

    async function next() {
      await handleFormSubmit(() => {
        window.location.href = "{{ route('atena.master.pengaturan.frame-master-keuangan') }}";
      });
    }
  </script>
@endpush
