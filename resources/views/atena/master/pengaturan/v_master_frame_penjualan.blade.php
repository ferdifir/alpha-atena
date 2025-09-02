@extends('template.form')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome/all.min.css') }}" />
@endpush

@section('content')
  <div style="height: 100%;overflow:hidden;margin-left:25px;margin-right:25px">
    <div style="height:30px;background-color:white;">
      <label class="font-header-menu">Pengaturan Modul Penjualan</label>
      <div align="right" valign="top">
        <p>Proses 5 dari 10</p>
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
      <input type="hidden" name="uuidperusahaan" id="IDPERUSAHAAN">
      <table style="padding:5px">
        <tr>
          <td align="right">Apakah perusahaan membuatkan surat penawaran harga kepada pelanggan?</td>
          <td align="center" id="label_form"><input id="PAKAISO" name="pakaiso" class="easyui-switchbutton" checked
              style="width:90px" data-options="onText:'Ya',offText:'Tidak',value:'HEADER'"></td>
        </tr>
        <tr>
          <td align="right">Pakai DO?</td>
          <td align="center" id="label_form"><input id="PAKAIDO" name="pakaido" class="easyui-switchbutton" checked
              style="width:90px" data-options="onText:'Ya',offText:'Tidak',value:'HEADER'"></td>
        </tr>
        <tr>
          <td align="right">1 <b>Pesanan Penjualan</b> ditutup oleh 1 <b>Pengeluaran Barang</b></td>
          <td align="center" id="label_form"><input id="RELASISO" name="relasiso" class="easyui-switchbutton" checked
              style="width:90px" data-options="onText:'Ya',offText:'Tidak',value:'1TO1'"></td>
        </tr>
        <tr>
          <td align="right">1 <b>Pesanan Pengiriman</b> untuk 1 <b>Pesanan Penjualan</b></td>
          <td align="center" id="label_form"><input id="TRANSREFDO" name="transrefdo" class="easyui-switchbutton" checked
              style="width:90px" data-options="onText:'Ya',offText:'Tidak',value:'HEADER'"></td>
        </tr>
        <tr>
          <td align="right">Tampilkan kolom Harga Jual Minimum di Penjualan</td>
          <td align="center" id="label_form"><input id="TAMPILHARGAJUALMINIMUM" name="tampilhargajualminimum"
              class="easyui-switchbutton" checked style="width:90px"
              data-options="onText:'Ya',offText:'Tidak',value:'HEADER'"></td>
        </tr>
      </table>
      <hr>
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
          <td align="right" id="label_form">Pesanan Penjualan</td>
          <td align="center" id="label_form"><input id="SBSO" name="sbso" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXSO" name="prefixso" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASISO" name="lokasiso" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="YYSO" name="yyso" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="MMSO" name="mmso" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DDSO" name="ddso" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DIGITSO" name="digitso" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBSO" name="cbso" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELSO"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Pesanan Pengiriman</td>
          <td align="center" id="label_form"><input id="SBDO" name="sbdo" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXDO" name="prefixdo" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIDO" name="lokasido" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="YYDO" name="yydo" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="MMDO" name="mmdo" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DDDO" name="dddo" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DIGITDO" name="digitdo" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBDO" name="cbdo" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELDO"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Penjualan</td>
          <td align="center" id="label_form"><input id="SBJUAL" name="sbpenjualan" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXJUAL" name="prefixpenjualan" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIJUAL" name="lokasipenjualan" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="YYJUAL" name="yypenjualan" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMJUAL" name="mmpenjualan" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDJUAL" name="ddpenjualan" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITJUAL" name="digitjual" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBJUAL" name="cbpenjualan" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELJUAL"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Retur Penjualan</td>
          <td align="center" id="label_form"><input id="SBRETURJUAL" name="sbreturjual" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXRETURJUAL" name="prefixreturjual" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIRETURJUAL" name="lokasireturjual" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="YYRETURJUAL" name="yyreturjual" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMRETURJUAL" name="mmreturjual" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDRETURJUAL" name="ddreturjual" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITRETURJUAL" name="digitreturjual" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBRETURJUAL" name="cbreturjual" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELRETURJUAL"></label></td>
        </tr>
      </table>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(function() {
      $("#mode").val("ubah");

      $("#SBSO").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXSO").textbox("disable").textbox("clear");
            $("#DIGITSO").numberbox("disable").numberbox("clear");
            $("#LOKASISO").prop("checked", false).attr("disabled", true);
            $("#YYSO").prop("checked", false).attr("disabled", true);
            $("#MMSO").prop("checked", false).attr("disabled", true);
            $("#DDSO").prop("checked", false).attr("disabled", true);
            $("#CBSO").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXSO").textbox("enable");
            $("#DIGITSO").numberbox("enable");
            $("#LOKASISO").attr("disabled", false);
            $("#YYSO").attr("disabled", false);
            $("#MMSO").attr("disabled", true);
            $("#DDSO").attr("disabled", true);
            $("#CBSO").combobox("setValue", "").combobox("enable");
            getDataConfig("SO");
          }
        }
      });

      $("#SBDO").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXDO").textbox("disable").textbox("clear");
            $("#DIGITDO").numberbox("disable").numberbox("clear");
            $("#LOKASIDO").prop("checked", false).attr("disabled", true);
            $("#YYDO").prop("checked", false).attr("disabled", true);
            $("#MMDO").prop("checked", false).attr("disabled", true);
            $("#DDDO").prop("checked", false).attr("disabled", true);
            $("#CBDO").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXDO").textbox("enable");
            $("#DIGITDO").numberbox("enable");
            $("#LOKASIDO").attr("disabled", false);
            $("#YYDO").attr("disabled", false);
            $("#MMDO").attr("disabled", true);
            $("#DDDO").attr("disabled", true);
            $("#CBDO").combobox("setValue", "").combobox("enable");
            getDataConfig("DO");
          }
        }
      });

      $("#SBJUAL").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXJUAL").textbox("disable").textbox("clear");
            $("#DIGITJUAL").numberbox("disable").numberbox("clear");
            $("#LOKASIJUAL").prop("checked", false).attr("disabled", true);
            $("#YYJUAL").prop("checked", false).attr("disabled", true);
            $("#MMJUAL").prop("checked", false).attr("disabled", true);
            $("#DDJUAL").prop("checked", false).attr("disabled", true);
            $("#CBJUAL").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXJUAL").textbox("enable");
            $("#DIGITJUAL").numberbox("enable");
            $("#LOKASIJUAL").attr("disabled", false);
            $("#YYJUAL").attr("disabled", false);
            $("#MMJUAL").attr("disabled", true);
            $("#DDJUAL").attr("disabled", true);
            $("#CBJUAL").combobox("setValue", "").combobox("enable");
            getDataConfig("JUAL");
          }
        }
      });

      $("#SBRETURJUAL").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXRETURJUAL").textbox("disable").textbox("clear");
            $("#DIGITRETURJUAL").numberbox("disable").numberbox("clear");
            $("#LOKASIRETURJUAL").prop("checked", false).attr("disabled", true);
            $("#YYRETURJUAL").prop("checked", false).attr("disabled", true);
            $("#MMRETURJUAL").prop("checked", false).attr("disabled", true);
            $("#DDRETURJUAL").prop("checked", false).attr("disabled", true);
            $("#CBRETURJUAL").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXRETURJUAL").textbox("enable");
            $("#DIGITRETURJUAL").numberbox("enable");
            $("#LOKASIRETURJUAL").attr("disabled", false);
            $("#YYRETURJUAL").attr("disabled", false);
            $("#MMRETURJUAL").attr("disabled", true);
            $("#DDRETURJUAL").attr("disabled", true);
            $("#CBRETURJUAL").combobox("setValue", "").combobox("enable");
            getDataConfig("RETURJUAL");
          }
        }
      });

      //SCRIPT UNTUK LOKASI, YEAR, MONTH, DATE
      $("#LOKASISO").change(function() {
        generate_kode("SO");
      });

      $("#YYSO").change(function() {
        if (this.checked) {
          $("#MMSO").prop("checked", false).attr("disabled", false);
          $("#DDSO").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMSO").prop("checked", false).attr("disabled", true);
          $("#DDSO").prop("checked", false).attr("disabled", true);
        }
        generate_kode("SO");
      });

      $("#MMSO").change(function() {
        if (this.checked) {
          $("#DDSO").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDSO").prop("checked", false).attr("disabled", true);
        }
        generate_kode("SO");
      });

      $("#DDSO").change(function() {
        generate_kode("SO");
      });

      $("#LOKASIDO").change(function() {
        generate_kode("DO");
      });

      $("#YYDO").change(function() {
        if (this.checked) {
          $("#MMDO").prop("checked", false).attr("disabled", false);
          $("#DDDO").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMDO").prop("checked", false).attr("disabled", true);
          $("#DDDO").prop("checked", false).attr("disabled", true);
        }
        generate_kode("DO");
      });

      $("#MMDO").change(function() {
        if (this.checked) {
          $("#DDDO").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDDO").prop("checked", false).attr("disabled", true);
        }
        generate_kode("DO");
      });

      $("#DDDO").change(function() {
        generate_kode("DO");
      });

      $("#LOKASIJUAL").change(function() {
        generate_kode("JUAL");
      });

      $("#YYJUAL").change(function() {
        if (this.checked) {
          $("#MMJUAL").prop("checked", false).attr("disabled", false);
          $("#DDJUAL").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMJUAL").prop("checked", false).attr("disabled", true);
          $("#DDJUAL").prop("checked", false).attr("disabled", true);
        }
        generate_kode("JUAL");
      });

      $("#MMJUAL").change(function() {
        if (this.checked) {
          $("#DDJUAL").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDJUAL").prop("checked", false).attr("disabled", true);
        }
        generate_kode("JUAL");
      });

      $("#DDJUAL").change(function() {
        generate_kode("JUAL");
      });

      $("#LOKASIRETURJUAL").change(function() {
        generate_kode("RETURJUAL");
      });

      $("#YYRETURJUAL").change(function() {
        if (this.checked) {
          $("#MMRETURJUAL").prop("checked", false).attr("disabled", false);
          $("#DDRETURJUAL").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMRETURJUAL").prop("checked", false).attr("disabled", true);
          $("#DDRETURJUAL").prop("checked", false).attr("disabled", true);
        }
        generate_kode("RETURJUAL");
      });

      $("#MMRETURJUAL").change(function() {
        if (this.checked) {
          $("#DDRETURJUAL").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDRETURJUAL").prop("checked", false).attr("disabled", true);
        }
        generate_kode("RETURJUAL");
      });

      $("#DDRETURJUAL").change(function() {
        generate_kode("RETURJUAL");
      });

      $("#CBSO").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("SO");
        }
      });

      $("#CBDO").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("DO");
        }
      });

      $("#CBJUAL").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("JUAL");
        }
      });

      $("#CBRETURJUAL").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("RETURJUAL");
        }
      });

      //SCRIPT PREFIX
      $("#PREFIXSO").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("SO");
        },
      });
      $("#PREFIXDO").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("DO");
        },
      });
      $("#PREFIXJUAL").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("JUAL");
        },
      });
      $("#PREFIXRETURJUAL").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("RETURJUAL");
        },
      });

      $("#DIGITSO").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("SO");
        },
      });
      $("#DIGITDO").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("DO");
        },
      });
      $("#DIGITJUAL").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("JUAL");
        },
      });
      $("#DIGITRETURJUAL").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("RETURJUAL");
        },
      });

      $("#LOKASISO").prop("checked", false);
      $("#YYSO").prop("checked", false);
      $("#MMSO").prop("checked", false);
      $("#DDSO").prop("checked", false);
      $("#LOKASIDO").prop("checked", false);
      $("#YYDO").prop("checked", false);
      $("#MMDO").prop("checked", false);
      $("#DDDO").prop("checked", false);
      $("#LOKASIJUAL").prop("checked", false);
      $("#YYJUAL").prop("checked", false);
      $("#MMJUAL").prop("checked", false);
      $("#DDJUAL").prop("checked", false);
      $("#LOKASIRETURJUAL").prop("checked", false);
      $("#YYRETURJUAL").prop("checked", false);
      $("#MMRETURJUAL").prop("checked", false);
      $("#DDRETURJUAL").prop("checked", false);

      getDataPenjualan();
    });

    async function loadDataPenjualan(data) {
      const so = data.so.prefix;
      const delivery = data.do.prefix;
      const penjualan = data.penjualan.prefix;
      const returjual = data.returjual.prefix;

      $("#PREFIXSO").textbox("setValue", so.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "").replace("[LOKASI]",
        "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXDO").textbox("setValue", delivery.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "").replace(
        "[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXJUAL").textbox("setValue", penjualan.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "").replace(
        "[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXRETURJUAL").textbox("setValue", returjual.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));

      if (so.includes('[LOKASI]')) {
        $("#LOKASISO").prop("checked", true);
      }
      if (so.includes('[YY]')) {
        $("#YYSO").prop("checked", true).attr("disabled", false);
      }
      if (so.includes('[MM]')) {
        $("#MMSO").prop("checked", true).attr("disabled", false);
      }
      if (so.includes('[DD]')) {
        $("#DDSO").prop("checked", true).attr("disabled", false);
      }
      if (so.includes('/')) {
        $("#CBSO").combobox("setValue", "/")
      } else if (so.includes('-')) {
        $("#CBSO").combobox("setValue", "-")
      } else if (so.includes('.')) {
        $("#CBSO").combobox("setValue", ".")
      } else {
        $("#CBSO").combobox("setValue", "")
      }

      if (delivery.includes('[LOKASI]')) {
        $("#LOKASIDO").prop("checked", true);
      }
      if (delivery.includes('[YY]')) {
        $("#YYDO").prop("checked", true).attr("disabled", false);
      }
      if (delivery.includes('[MM]')) {
        $("#MMDO").prop("checked", true).attr("disabled", false);
      }
      if (delivery.includes('[DD]')) {
        $("#DDDO").prop("checked", true).attr("disabled", false);
      }
      if (delivery.includes('/')) {
        $("#CBDO").combobox("setValue", "/")
      } else if (delivery.includes('-')) {
        $("#CBDO").combobox("setValue", "-")
      } else if (delivery.includes('.')) {
        $("#CBDO").combobox("setValue", ".")
      } else {
        $("#CBDO").combobox("setValue", "")
      }

      if (penjualan.includes('[LOKASI]')) {
        $("#LOKASIJUAL").prop("checked", true);
      }
      if (penjualan.includes('[YY]')) {
        $("#YYJUAL").prop("checked", true).attr("disabled", false);
      }
      if (penjualan.includes('[MM]')) {
        $("#MMJUAL").prop("checked", true).attr("disabled", false);
      }
      if (penjualan.includes('[DD]')) {
        $("#DDJUAL").prop("checked", true).attr("disabled", false);
      }
      if (penjualan.includes('/')) {
        $("#CBJUAL").combobox("setValue", "/")
      } else if (penjualan.includes('-')) {
        $("#CBJUAL").combobox("setValue", "-")
      } else if (penjualan.includes('.')) {
        $("#CBJUAL").combobox("setValue", ".")
      } else {
        $("#CBJUAL").combobox("setValue", "")
      }

      if (returjual.includes('[LOKASI]')) {
        $("#LOKASIRETURJUAL").prop("checked", true);
      }
      if (returjual.includes('[YY]')) {
        $("#YYRETURJUAL").prop("checked", true).attr("disabled", false);
      }
      if (returjual.includes('[MM]')) {
        $("#MMRETURJUAL").prop("checked", true).attr("disabled", false);
      }
      if (returjual.includes('[DD]')) {
        $("#DDRETURJUAL").prop("checked", true).attr("disabled", false);
      }
      if (returjual.includes('/')) {
        $("#CBRETURJUAL").combobox("setValue", "/")
      } else if (returjual.includes('-')) {
        $("#CBRETURJUAL").combobox("setValue", "-")
      } else if (returjual.includes('.')) {
        $("#CBRETURJUAL").combobox("setValue", ".")
      } else {
        $("#CBRETURJUAL").combobox("setValue", "")
      }

      $("#DIGITSO").numberbox("setValue", data.so.jumlahdigit);
      $("#DIGITDO").numberbox("setValue", data.do.jumlahdigit);
      $("#DIGITJUAL").numberbox("setValue", data.penjualan.jumlahdigit);
      $("#DIGITRETURJUAL").numberbox("setValue", data.returjual.jumlahdigit);

      if (data.so.value == "AUTO") {
        $("#SBSO").switchbutton('check');
      } else {
        $("#SBSO").switchbutton('uncheck');
      }
      if (data.do.value == "AUTO") {
        $("#SBDelivery").switchbutton('check');
      } else {
        $("#SBDelivery").switchbutton('uncheck');
      }
      if (data.penjualan.value == "AUTO") {
        $("#SBJUAL").switchbutton('check');
      } else {
        $("#SBJUAL").switchbutton('uncheck');
      }
      if (data.returjual.value == "AUTO") {
        $("#SBRETURJUAL").switchbutton('check');
      } else {
        $("#SBRETURJUAL").switchbutton('uncheck');
      }

      const promises = [
        generate_kode("SO"),
        generate_kode("DO"),
        generate_kode("JUAL"),
        generate_kode("RETURJUAL"),
      ];

      await Promise.all(promises);

      if (data.relasiso.value == "1TO1") {
        $("#RELASISO").switchbutton('check');
      } else {
        $("#RELASISO").switchbutton('uncheck');
      }
      if (data.transrefdo.value == "HEADER") {
        $("#TRANSREFDO").switchbutton('check');
      } else {
        $("#TRANSREFDO").switchbutton('uncheck');
      }
      if (data.tampilhargajualminimum.value == "YA") {
        $("#TAMPILHARGAJUALMINIMUM").switchbutton('check');
      } else {
        $("#TAMPILHARGAJUALMINIMUM").switchbutton('uncheck');
      }

      $("#PAKAISO").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PAKAIDO").switchbutton("disable").switchbutton("uncheck");
          } else {
            $("#PAKAIDO").switchbutton("enable");
          }
        }
      });

      if (data.pakaiso.value == "YA") {
        $("#PAKAISO").switchbutton('check');
      } else {
        $("#PAKAISO").switchbutton('uncheck');
      }
      if (data.pakaido.value == "YA") {
        $("#PAKAIDO").switchbutton('check');
      } else {
        $("#PAKAIDO").switchbutton('uncheck');
      }
    }

    async function getDataPenjualan() {
      try {
        const response = await parent.fetchData(link_api.loadSettingPenjualan, null);

        if (response.success) {
          await loadDataPenjualan(response.data);
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

    async function getDataConfig(modul) {
      try {
        const response = await parent.fetchData(link_api.loadConfigPenjualan, {
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
        const response = await parent.fetchData(link_api.generateCodePenjualan, {
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
            $("#SB" + modul).switchbutton("disable");
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

    async function simpanData() {
      try {
        const data = $('#form_input :input').serializeArray();
        const payload = {};
        for (const item of data) {
          payload[item.name] = item.value;
        }

        const response = await parent.fetchData(link_api.simpanSettingPenjualan, payload);

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
      if (!parent.isTokenExpired()) {
        window.location = "{{ route('atena.master.pengaturan.frame-master-pembelian') }}";
      } else {
        $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
      }
    }

    async function simpan() {
      await handleFormSubmit(() => {
        $.messager.alert('Info', 'Data berhasil diubah', 'info');
      });
    }

    async function next() {
      await handleFormSubmit(() => {
        window.location.href = "{{ route('atena.master.pengaturan.frame-master-inventori') }}";
      });
    }
  </script>
@endpush
