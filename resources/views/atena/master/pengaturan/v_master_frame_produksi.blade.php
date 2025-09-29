@extends('template.form')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome/all.min.css') }}" />
@endpush

@section('content')
  <div  style="height: 100%;overflow:hidden;margin-left:25px;margin-right:25px">
    <div style="height:30px;background-color:white;">
      <label class="font-header-menu">Pengaturan Modul Produksi</label>
      <div align="right" valign="top">
        <p>Proses 7 dari 10</p>
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
          <td align="right">1 <b>Job Order</b> untuk 1 <b>PPIC</b></td>
          <td align="center" id="label_form"><input id="TRANSREFJOBORDER" name="transrefjoborder"
              class="easyui-switchbutton" checked style="width:90px"
              data-options="onText:'Ya',offText:'Tidak',value:'HEADER'"></td>
        </tr>
        <tr>
          <td align="right">1 <b>Job Order</b> ditutup oleh 1 <b>Transaksi PPIC</b></td>
          <td align="center" id="label_form"><input id="RELASIJOBORDER" name="relasijoborder" class="easyui-switchbutton"
              checked style="width:90px" data-options="onText:'Ya',offText:'Tidak',value:'1TO1'"></td>
        </tr>
        <tr>
          <td align="right">1 <b>PPIC</b> untuk 1 <b>Produksi</b></td>
          <td align="center" id="label_form"><input id="TRANSREFPPIC" name="transrefppic" class="easyui-switchbutton"
              checked style="width:90px" data-options="onText:'Ya',offText:'Tidak',value:'HEADER'"></td>
        </tr>
        <tr>
          <td align="right">1 <b>PPIC</b> ditutup oleh 1 <b>Transaksi Produksi 2</b></td>
          <td align="center" id="label_form"><input id="RELASIPPIC" name="relasippic" class="easyui-switchbutton" checked
              style="width:90px" data-options="onText:'Ya',offText:'Tidak',value:'1TO1'"></td>
        </tr>
        <tr>
          <td align="right">1 <b>Approve Job Order</b> untuk 1 <b>PR</b></td>
          <td align="center" id="label_form"><input id="TRANSREFAPPROVEJOBORDER" name="transrefapprovejoborder"
              class="easyui-switchbutton" checked style="width:90px"
              data-options="onText:'Ya',offText:'Tidak',value:'HEADER'"></td>
        </tr>
        <tr>
          <td align="right">1 <b>Approve Job Order</b> ditutup oleh 1 <b>Transaksi PR</b></td>
          <td align="center" id="label_form"><input id="RELASIAPPROVEJOBORDER" name="relasiapprovejoborder"
              class="easyui-switchbutton" checked style="width:90px"
              data-options="onText:'Ya',offText:'Tidak',value:'1TO1'"></td>
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
          <td align="right" id="label_form">Job Order</td>
          <td align="center" id="label_form">
            <input id="SBJOBORDER" name="sbjoborder" class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'">
          </td>
          <td align="center" id="label_form">
            <input id="PREFIXJOBORDER" name="prefixjoborder" style="width:150px" class="easyui-textbox">
          </td>
          <td align="center" id="label_form"></td>
          <td align="center" id="label_form">
            <input id="YYJOBORDER" name="yyjoborder" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="MMJOBORDER" name="mmjoborder" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="DDJOBORDER" name="ddjoborder" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="DIGITJOBORDER" name="digitjoborder" style="width:80px" class="easyui-numberbox"
              data-options="precision:0">
          </td>
          <td align="center" id="label_form">
            <select id="CBJOBORDER" name="cbjoborder" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELJOBORDER"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Approve Job Order</td>
          <td align="center" id="label_form">
            <input id="SBAPPROVEJOBORDER" name="sbapprovejoborder" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'">
          </td>
          <td align="center" id="label_form">
            <input id="PREFIXAPPROVEJOBORDER" name="prefixapprovejoborder" style="width:150px" class="easyui-textbox">
          </td>
          <td align="center" id="label_form">
            <input id="LOKASIAPPROVEJOBORDER" name="lokasiapprovejoborder" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="YYAPPROVEJOBORDER" name="yyapprovejoborder" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="MMAPPROVEJOBORDER" name="mmapprovejoborder" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="DDAPPROVEJOBORDER" name="ddapprovejoborder" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="DIGITAPPROVEJOBORDER" name="digitapprovejoborder" style="width:80px" class="easyui-numberbox"
              data-options="precision:0">
          </td>
          <td align="center" id="label_form">
            <select id="CBAPPROVEJOBORDER" name="cbapprovejoborder" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELAPPROVEJOBORDER"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">PPIC</td>
          <td align="center" id="label_form">
            <input id="SBPPIC" name="sbppic" class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'">
          </td>
          <td align="center" id="label_form">
            <input id="PREFIXPPIC" name="prefixppic" style="width:150px" class="easyui-textbox">
          </td>
          <td align="center" id="label_form">
            <input id="LOKASIPPIC" name="lokasippic" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="YYPPIC" name="yyppic" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="MMPPIC" name="mmppic" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="DDPPIC" name="ddppic" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="DIGITPPIC" name="digitppic" style="width:80px" class="easyui-numberbox"
              data-options="precision:0">
          </td>
          <td align="center" id="label_form">
            <select id="CBPPIC" name="cbppic" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELPPIC"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Produksi 2</td>
          <td align="center" id="label_form">
            <input id="SBPRODUKSI2" name="sbproduksi2" class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'">
          </td>
          <td align="center" id="label_form">
            <input id="PREFIXPRODUKSI2" name="prefixproduksi2" style="width:150px" class="easyui-textbox">
          </td>
          <td align="center" id="label_form">
            <input id="LOKASIPRODUKSI2" name="lokasiproduksi2" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="YYPRODUKSI2" name="yyproduksi2" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="MMPRODUKSI2" name="mmproduksi2" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="DDPRODUKSI2" name="ddproduksi2" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="DIGITPRODUKSI2" name="digitproduksi2" style="width:80px" class="easyui-numberbox"
              data-options="precision:0">
          </td>
          <td align="center" id="label_form">
            <select id="CBPRODUKSI2" name="cbproduksi2" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELPRODUKSI2"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Pembuatan Barcode</td>
          <td align="center" id="label_form">
            <input id="SBPEMBUATANBARCODE" name="sbpembuatanbarcode" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'">
          </td>
          <td align="center" id="label_form">
            <input id="PREFIXPEMBUATANBARCODE" name="prefixpembuatanbarcode" style="width:150px"
              class="easyui-textbox">
          </td>
          <td align="center" id="label_form">
            <input id="LOKASIPEMBUATANBARCODE" name="lokasipembuatanbarcode" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="YYPEMBUATANBARCODE" name="yypembuatanbarcode" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="MMPEMBUATANBARCODE" name="mmpembuatanbarcode" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="DDPEMBUATANBARCODE" name="ddpembuatanbarcode" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form">
            <input id="DIGITPEMBUATANBARCODE" name="digitpembuatanbarcode" style="width:80px" class="easyui-numberbox"
              data-options="precision:0">
          </td>
          <td align="center" id="label_form">
            <select id="CBPEMBUATANBARCODE" name="cbpembuatanbarcode" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELPEMBUATANBARCODE"></label></td>
        </tr>
      </table>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      $("#mode").val("ubah");

      $("#SBJOBORDER").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXJOBORDER").textbox("disable").textbox("clear");
            $("#DIGITJOBORDER").numberbox("disable").numberbox("clear");
            $("#LOKASIJOBORDER").prop("checked", false).attr("disabled", true);
            $("#YYJOBORDER").prop("checked", false).attr("disabled", true);
            $("#MMJOBORDER").prop("checked", false).attr("disabled", true);
            $("#DDJOBORDER").prop("checked", false).attr("disabled", true);
            $("#CBJOBORDER").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXJOBORDER").textbox("enable");
            $("#DIGITJOBORDER").numberbox("enable");
            $("#LOKASIJOBORDER").attr("disabled", false);
            $("#YYJOBORDER").attr("disabled", false);
            $("#MMJOBORDER").attr("disabled", true);
            $("#DDJOBORDER").attr("disabled", true);
            $("#CBJOBORDER").combobox("setValue", "").combobox("enable");
            getDataConfig("JOBORDER");
          }
        }
      });

      $("#SBAPPROVEJOBORDER").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXAPPROVEJOBORDER").textbox("disable").textbox("clear");
            $("#DIGITAPPROVEJOBORDER").numberbox("disable").numberbox("clear");
            $("#LOKASIAPPROVEJOBORDER").prop("checked", false).attr("disabled", true);
            $("#YYAPPROVEJOBORDER").prop("checked", false).attr("disabled", true);
            $("#MMAPPROVEJOBORDER").prop("checked", false).attr("disabled", true);
            $("#DDAPPROVEJOBORDER").prop("checked", false).attr("disabled", true);
            $("#CBAPPROVEJOBORDER").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXAPPROVEJOBORDER").textbox("enable");
            $("#DIGITAPPROVEJOBORDER").numberbox("enable");
            $("#LOKASIAPPROVEJOBORDER").attr("disabled", false);
            $("#YYAPPROVEJOBORDER").attr("disabled", false);
            $("#MMAPPROVEJOBORDER").attr("disabled", true);
            $("#DDAPPROVEJOBORDER").attr("disabled", true);
            $("#CBAPPROVEJOBORDER").combobox("setValue", "").combobox("enable");
            getDataConfig("APPROVEJOBORDER");
          }
        }
      });

      //SCRIPT UNTUK LOKASI, YEAR, MONTH, DATE
      // job order
      $("#LOKASIJOBORDER").change(function() {
        generate_kode("JOBORDER");
      });

      $("#YYJOBORDER").change(function() {
        if (this.checked) {
          $("#MMJOBORDER").prop("checked", false).attr("disabled", false);
          $("#DDJOBORDER").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMJOBORDER").prop("checked", false).attr("disabled", true);
          $("#DDJOBORDER").prop("checked", false).attr("disabled", true);
        }
        generate_kode("JOBORDER");
      });

      $("#MMJOBORDER").change(function() {
        if (this.checked) {
          $("#DDJOBORDER").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDJOBORDER").prop("checked", false).attr("disabled", true);
        }
        generate_kode("JOBORDER");
      });

      $("#DDJOBORDER").change(function() {
        generate_kode("JOBORDER");
      });

      $("#CBJOBORDER").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("JOBORDER");
        }
      });

      // approve job order
      $("#LOKASIAPPROVEJOBORDER").change(function() {
        generate_kode("APPROVEJOBORDER");
      });

      $("#YYAPPROVEJOBORDER").change(function() {
        if (this.checked) {
          $("#MMAPPROVEJOBORDER").prop("checked", false).attr("disabled", false);
          $("#DDAPPROVEJOBORDER").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMAPPROVEJOBORDER").prop("checked", false).attr("disabled", true);
          $("#DDAPPROVEJOBORDER").prop("checked", false).attr("disabled", true);
        }
        generate_kode("APPROVEJOBORDER");
      });

      $("#MMAPPROVEJOBORDER").change(function() {
        if (this.checked) {
          $("#DDAPPROVEJOBORDER").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDAPPROVEJOBORDER").prop("checked", false).attr("disabled", true);
        }
        generate_kode("APPROVEJOBORDER");
      });

      $("#DDAPPROVEJOBORDER").change(function() {
        generate_kode("APPROVEJOBORDER");
      });

      $("#CBAPPROVEJOBORDER").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("APPROVEJOBORDER");
        }
      });

      // ppic
      $("#LOKASIPPIC").change(function() {
        generate_kode("PPIC");
      });

      $("#YYPPIC").change(function() {
        if (this.checked) {
          $("#MMPPIC").prop("checked", false).attr("disabled", false);
          $("#DDPPIC").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMPPIC").prop("checked", false).attr("disabled", true);
          $("#DDPPIC").prop("checked", false).attr("disabled", true);
        }
        generate_kode("PPIC");
      });

      $("#MMPPIC").change(function() {
        if (this.checked) {
          $("#DDPPIC").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDPPIC").prop("checked", false).attr("disabled", true);
        }
        generate_kode("PPIC");
      });

      $("#DDPPIC").change(function() {
        generate_kode("PPIC");
      });

      $("#CBPPIC").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("PPIC");
        }
      });

      // produksi 2
      $("#LOKASIPRODUKSI2").change(function() {
        generate_kode("PRODUKSI2");
      });

      $("#YYPRODUKSI2").change(function() {
        if (this.checked) {
          $("#MMPRODUKSI2").prop("checked", false).attr("disabled", false);
          $("#DDPRODUKSI2").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMPRODUKSI2").prop("checked", false).attr("disabled", true);
          $("#DDPRODUKSI2").prop("checked", false).attr("disabled", true);
        }
        generate_kode("PRODUKSI2");
      });

      $("#MMPRODUKSI2").change(function() {
        if (this.checked) {
          $("#DDPRODUKSI2").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDPRODUKSI2").prop("checked", false).attr("disabled", true);
        }
        generate_kode("PRODUKSI2");
      });

      $("#DDPRODUKSI2").change(function() {
        generate_kode("PRODUKSI2");
      });

      $("#CBPRODUKSI2").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("PRODUKSI2");
        }
      });

      // pembuatan barcode
      $("#LOKASIPEMBUATANBARCODE").change(function() {
        generate_kode("PEMBUATANBARCODE");
      });

      $("#YYPEMBUATANBARCODE").change(function() {
        if (this.checked) {
          $("#MMPEMBUATANBARCODE").prop("checked", false).attr("disabled", false);
          $("#DDPEMBUATANBARCODE").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMPEMBUATANBARCODE").prop("checked", false).attr("disabled", true);
          $("#DDPEMBUATANBARCODE").prop("checked", false).attr("disabled", true);
        }
        generate_kode("PEMBUATANBARCODE");
      });

      $("#MMPEMBUATANBARCODE").change(function() {
        if (this.checked) {
          $("#DDPEMBUATANBARCODE").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDPEMBUATANBARCODE").prop("checked", false).attr("disabled", true);
        }
        generate_kode("PEMBUATANBARCODE");
      });

      $("#DDPEMBUATANBARCODE").change(function() {
        generate_kode("PEMBUATANBARCODE");
      });

      $("#CBPEMBUATANBARCODE").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("PEMBUATANBARCODE");
        }
      });

      //SCRIPT PREFIX
      $("#PREFIXJOBORDER").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("JOBORDER");
        },
      });

      $("#PREFIXAPPROVEJOBORDER").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("APPROVEJOBORDER");
        },
      });

      $("#PREFIXPPIC").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PPIC");
        },
      });

      $("#PREFIXPRODUKSI2").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PRODUKSI2");
        },
      });

      $("#PREFIXPEMBUATANBARCODE").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PEMBUATANBARCODE");
        },
      });

      $("#DIGITJOBORDER").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("JOBORDER");
        },
      });

      $("#DIGITAPPROVEJOBORDER").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("APPROVEJOBORDER");
        },
      });

      $("#DIGITPPIC").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PPIC");
        },
      });

      $("#DIGITPRODUKSI2").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PRODUKSI2");
        },
      });

      $("#DIGITPEMBUATANBARCODE").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PEMBUATANBARCODE");
        },
      });

      $("#YYJOBORDER").prop("checked", false);
      $("#MMJOBORDER").prop("checked", false);
      $("#DDJOBORDER").prop("checked", false);

      $("#LOKASIAPPROVEJOBORDER").prop("checked", false);
      $("#YYAPPROVEJOBORDER").prop("checked", false);
      $("#MMAPPROVEJOBORDER").prop("checked", false);
      $("#DDAPPROVEJOBORDER").prop("checked", false);

      $("#LOKASIPPIC").prop("checked", false);
      $("#YYPPIC").prop("checked", false);
      $("#MMPPIC").prop("checked", false);
      $("#DDPPIC").prop("checked", false);

      $("#LOKASIPRODUKSI2").prop("checked", false);
      $("#YYPRODUKSI2").prop("checked", false);
      $("#MMPRODUKSI2").prop("checked", false);
      $("#DDPRODUKSI2").prop("checked", false);

      $("#LOKASIPEMBUATANBARCODE").prop("checked", false);
      $("#YYPEMBUATANBARCODE").prop("checked", false);
      $("#MMPEMBUATANBARCODE").prop("checked", false);
      $("#DDPEMBUATANBARCODE").prop("checked", false);

      getDataProduksi();
    });

    async function loadDataProduksi(data) {
      const joborder = data.joborder.prefix;
      const approvejoborder = data.approvejoborder.prefix;
      const ppic = data.ppic.prefix;
      const produksi2 = data.produksi2.prefix;
      const pembuatanbarcode = data.pembuatanbarcode.prefix;

      $("#PREFIXJOBORDER").textbox("setValue", joborder.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXAPPROVEJOBORDER").textbox("setValue", approvejoborder.replace(/\//g, "").replace(/\-/g, "").replace(
        /\./g, "").replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace(
        "[NUM]", ""));
      $("#PREFIXPPIC").textbox("setValue", ppic.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "").replace(
        "[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXPRODUKSI2").textbox("setValue", produksi2.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXPEMBUATANBARCODE").textbox("setValue", pembuatanbarcode.replace(/\//g, "").replace(/\-/g, "").replace(
        /\./g, "").replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace(
        "[NUM]", ""));

      if (joborder.includes('[YY]')) {
        $("#YYJOBORDER").prop("checked", true).attr("disabled", false);
      }
      if (joborder.includes('[MM]')) {
        $("#MMJOBORDER").prop("checked", true).attr("disabled", false);
      }
      if (joborder.includes('[DD]')) {
        $("#DDJOBORDER").prop("checked", true).attr("disabled", false);
      }
      if (joborder.includes('/')) {
        $("#CBJOBORDER").combobox("setValue", "/")
      } else if (joborder.includes('-')) {
        $("#CBJOBORDER").combobox("setValue", "-")
      } else if (joborder.includes('.')) {
        $("#CBJOBORDER").combobox("setValue", ".")
      } else {
        $("#CBJOBORDER").combobox("setValue", "")
      }

      if (approvejoborder.includes('[YY]')) {
        $("#YYAPPROVEJOBORDER").prop("checked", true).attr("disabled", false);
      }
      if (approvejoborder.includes('[MM]')) {
        $("#MMAPPROVEJOBORDER").prop("checked", true).attr("disabled", false);
      }
      if (approvejoborder.includes('[DD]')) {
        $("#DDAPPROVEJOBORDER").prop("checked", true).attr("disabled", false);
      }
      if (approvejoborder.includes('/')) {
        $("#CBAPPROVEJOBORDER").combobox("setValue", "/")
      } else if (approvejoborder.includes('-')) {
        $("#CBAPPROVEJOBORDER").combobox("setValue", "-")
      } else if (approvejoborder.includes('.')) {
        $("#CBAPPROVEJOBORDER").combobox("setValue", ".")
      } else {
        $("#CBAPPROVEJOBORDER").combobox("setValue", "")
      }

      if (ppic.includes('[LOKASI]')) {
        $("#LOKASIPPIC").prop("checked", true);
      }
      if (ppic.includes('[YY]')) {
        $("#YYPPIC").prop("checked", true).attr("disabled", false);
      }
      if (ppic.includes('[MM]')) {
        $("#MMPPIC").prop("checked", true).attr("disabled", false);
      }
      if (ppic.includes('[DD]')) {
        $("#DDPPIC").prop("checked", true).attr("disabled", false);
      }
      if (ppic.includes('/')) {
        $("#CBPPIC").combobox("setValue", "/")
      } else if (ppic.includes('-')) {
        $("#CBPPIC").combobox("setValue", "-")
      } else if (ppic.includes('.')) {
        $("#CBPPIC").combobox("setValue", ".")
      } else {
        $("#CBPPIC").combobox("setValue", "")
      }

      if (produksi2.includes('[LOKASI]')) {
        $("#LOKASIPRODUKSI2").prop("checked", true);
      }
      if (produksi2.includes('[YY]')) {
        $("#YYPRODUKSI2").prop("checked", true).attr("disabled", false);
      }
      if (produksi2.includes('[MM]')) {
        $("#MMPRODUKSI2").prop("checked", true).attr("disabled", false);
      }
      if (produksi2.includes('[DD]')) {
        $("#DDPRODUKSI2").prop("checked", true).attr("disabled", false);
      }
      if (produksi2.includes('/')) {
        $("#CBPRODUKSI2").combobox("setValue", "/")
      } else if (produksi2.includes('-')) {
        $("#CBPRODUKSI2").combobox("setValue", "-")
      } else if (produksi2.includes('.')) {
        $("#CBPRODUKSI2").combobox("setValue", ".")
      } else {
        $("#CBPRODUKSI2").combobox("setValue", "")
      }

      if (pembuatanbarcode.includes('[LOKASI]')) {
        $("#LOKASIPEMBUATANBARCODE").prop("checked", true);
      }
      if (pembuatanbarcode.includes('[YY]')) {
        $("#YYPEMBUATANBARCODE").prop("checked", true).attr("disabled", false);
      }
      if (pembuatanbarcode.includes('[MM]')) {
        $("#MMPEMBUATANBARCODE").prop("checked", true).attr("disabled", false);
      }
      if (pembuatanbarcode.includes('[DD]')) {
        $("#DDPEMBUATANBARCODE").prop("checked", true).attr("disabled", false);
      }
      if (pembuatanbarcode.includes('/')) {
        $("#CBPEMBUATANBARCODE").combobox("setValue", "/")
      } else if (pembuatanbarcode.includes('-')) {
        $("#CBPEMBUATANBARCODE").combobox("setValue", "-")
      } else if (pembuatanbarcode.includes('.')) {
        $("#CBPEMBUATANBARCODE").combobox("setValue", ".")
      } else {
        $("#CBPEMBUATANBARCODE").combobox("setValue", "")
      }

      $("#DIGITJOBORDER").numberbox("setValue", data.joborder.jumlahdigit);

      if (data.joborder.value == "AUTO") {
        $("#SBJOBORDER").switchbutton('check');
      } else {
        $("#SBJOBORDER").switchbutton('uncheck');
      }

      $("#DIGITAPPROVEJOBORDER").numberbox("setValue", data.approvejoborder.jumlahdigit);

      if (data.approvejoborder.value == "AUTO") {
        $("#SBAPPROVEJOBORDER").switchbutton('check');
      } else {
        $("#SBAPPROVEJOBORDER").switchbutton('uncheck');
      }

      $("#DIGITPPIC").numberbox("setValue", data.ppic.jumlahdigit);

      if (data.ppic.value == "AUTO") {
        $("#SBPPIC").switchbutton('check');
      } else {
        $("#SBPPIC").switchbutton('uncheck');
      }

      $("#DIGITPRODUKSI2").numberbox("setValue", data.produksi2.jumlahdigit);

      if (data.produksi2.value == "AUTO") {
        $("#SBPRODUKSI2").switchbutton('check');
      } else {
        $("#SBPRODUKSI2").switchbutton('uncheck');
      }

      $("#DIGITPEMBUATANBARCODE").numberbox("setValue", data.pembuatanbarcode.jumlahdigit);

      if (data.pembuatanbarcode.value == "AUTO") {
        $("#SBPEMBUATANBARCODE").switchbutton('check');
      } else {
        $("#SBPEMBUATANBARCODE").switchbutton('uncheck');
      }

      const promises = [
        generate_kode("JOBORDER"),
        generate_kode("APPROVEJOBORDER"),
        generate_kode("PPIC"),
        generate_kode("PRODUKSI2"),
        generate_kode("PEMBUATANBARCODE"),
      ];

      await Promise.all(promises);

      if (data.transrefapprovejoborder.value == "HEADER") {
        $("#TRANSREFAPPROVEJOBORDER").switchbutton('check');
      } else {
        $("#TRANSREFAPPROVEJOBORDER").switchbutton('uncheck');
      }

      if (data.transrefppic.value == "HEADER") {
        $("#TRANSREFPPIC").switchbutton('check');
      } else {
        $("#TRANSREFPPIC").switchbutton('uncheck');
      }

      if (data.relasijoborder.value == "1TO1") {
        $("#RELASIJOBORDER").switchbutton('check');
      } else {
        $("#RELASIJOBORDER").switchbutton('uncheck');
      }

      if (data.relasiapprovejoborder.value == "1TO1") {
        $("#RELASIAPPROVEJOBORDER").switchbutton('check');
      } else {
        $("#RELASIAPPROVEJOBORDER").switchbutton('uncheck');
      }

      if (data.relasippic.value == "1TO1") {
        $("#RELASIPPIC").switchbutton('check');
      } else {
        $("#RELASIPPIC").switchbutton('uncheck');
      }
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
            $("#LOKASI" + modul).is(":checked");
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

    async function getDataProduksi() {
      try {
        const response = await parent.fetchData(link_api.loadSettingProduksi, null);

        if (response.success) {
          await loadDataProduksi(response.data);
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
        window.location = "{{ route('atena.master.pengaturan.frame-master-inventori') }}";
      
    }

    async function simpan() {
      await handleFormSubmit(() => {
        $.messager.alert('Info', 'Data berhasil diubah', 'info');
      });
    }

    async function next() {
      await handleFormSubmit(() => {
        window.location.href = "{{ route('atena.master.pengaturan.frame-master-aset') }}";
      });
    }
  </script>
@endpush
