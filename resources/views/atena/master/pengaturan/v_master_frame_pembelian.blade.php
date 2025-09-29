@extends('template.form')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome/all.min.css') }}" />
@endpush

@section('content')
  <div style="height: 100%;overflow:hidden;margin-left:25px;margin-right:25px">
    <div style="height:30px;background-color:white;">
      <label class="font-header-menu">Pengaturan Modul Pembelian</label>
      <div align="right" valign="top">
        <p>Proses 4 dari 10</p>
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
          <td align="right">Apakah anda, membuatkan PO (Pesanan Pembelian) ke pemasok?</td>
          <td align="center" id="label_form"><input id="PAKAIPO" name="pakaipo" class="easyui-switchbutton" checked
              style="width:90px" data-options="onText:'Ya',offText:'Tidak',value:'YA'"></td>
        </tr>
        <tr>
          <td align="right">Apakah PO wajib menggunakan PR?</td>
          <td align="center" id="label_form"><input id="POPAKAIPR" name="popakaipr" class="easyui-switchbutton" checked
              style="width:90px" data-options="onText:'Ya',offText:'Tidak',value:'YA'"></td>
        </tr>
        <tr>
          <td align="right">1 <b>Permintaan Barang</b> ditutup oleh 1 <b>Pesanan Pembelian/Transfer</b></td>
          <td align="center" id="label_form"><input id="RELASIPR" name="relasipr" class="easyui-switchbutton" checked
              style="width:90px" data-options="onText:'Ya',offText:'Tidak',value:'1TO1'"></td>
        </tr>
        <tr>
          <td align="right">1 <b>Pesanan Pembelian</b> ditutup oleh 1 <b>Penerimaan Barang</b></td>
          <td align="center" id="label_form"><input id="RELASIPO" name="relasipo" class="easyui-switchbutton" checked
              style="width:90px" data-options="onText:'Ya',offText:'Tidak',value:'1TO1'"></td>
        </tr>
        <tr>
          <td align="right">Update harga jual otomatis setelah cetak pembelian?</td>
          <td align="center" id="label_form"><input id="UPDATEHARGAOTOMATIS" name="updatehargaotomatis"
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
          <td align="right" id="label_form">Permintaan Barang</td>
          <td align="center" id="label_form"><input id="SBPR" name="sbpr" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXPR" name="prefixpr" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIPR" name="lokasipr" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="YYPR" name="yypr" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="MMPR" name="mmpr" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DDPR" name="ddpr" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DIGITPR" name="digitpr" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBPR" name="cbpr" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELPR"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Pesanan Pembelian</td>
          <td align="center" id="label_form"><input id="SBPO" name="sbpo" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXPO" name="prefixpo" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIPO" name="lokasipo" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="YYPO" name="yypo" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="MMPO" name="mmpo" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DDPO" name="ddpo" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DIGITPO" name="digitpo" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBPO" name="cbpo" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELPO"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Pembelian</td>
          <td align="center" id="label_form"><input id="SBBELI" name="sbbeli" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXBELI" name="prefixbeli" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIBELI" name="lokasibeli" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="YYBELI" name="yybeli" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="MMBELI" name="mmbeli" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DDBELI" name="ddbeli" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DIGITBELI" name="digitbeli" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBBELI" name="cbbeli" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELBELI"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Retur Pembelian</td>
          <td align="center" id="label_form"><input id="SBRETURBELI" name="sbreturbeli" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXRETURBELI" name="prefixreturbeli" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIRETURBELI" name="lokasireturbeli" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="YYRETURBELI" name="yyreturbeli" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMRETURBELI" name="mmreturbeli" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDRETURBELI" name="ddreturbeli" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITRETURBELI" name="digitreturbeli" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBRETURBELI" name="cbreturbeli" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELRETURBELI"></label></td>
        </tr>
      </table>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      //load data pada form dengan data dari controller

      $("#mode").val("ubah");

      $("#SBPR").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXPR").textbox("disable").textbox("clear");
            $("#DIGITPR").numberbox("disable").numberbox("clear");
            $("#LOKASIPR").prop("checked", false).prop("disabled", true);
            $("#YYPR").prop("checked", false).prop("disabled", true);
            $("#MMPR").prop("checked", false).prop("disabled", true);
            $("#DDPR").prop("checked", false).prop("disabled", true);
            $("#CBPR").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXPR").textbox("enable");
            $("#DIGITPR").numberbox("enable");
            $("#LOKASIPR").prop("disabled", false);
            $("#YYPR").prop("disabled", false);
            $("#MMPR").prop("disabled", true);
            $("#DDPR").prop("disabled", true);
            $("#CBPR").combobox("setValue", "").combobox("enable");
            getDataConfig("PR");
          }
        }
      });

      $("#SBPO").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXPO").textbox("disable").textbox("clear");
            $("#DIGITPO").numberbox("disable").numberbox("clear");
            $("#LOKASIPO").prop("checked", false).prop("disabled", true);
            $("#YYPO").prop("checked", false).prop("disabled", true);
            $("#MMPO").prop("checked", false).prop("disabled", true);
            $("#DDPO").prop("checked", false).prop("disabled", true);
            $("#CBPO").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXPO").textbox("enable");
            $("#DIGITPO").numberbox("enable");
            $("#LOKASIPO").prop("disabled", false);
            $("#YYPO").prop("disabled", false);
            $("#MMPO").prop("disabled", true);
            $("#DDPO").prop("disabled", true);
            $("#CBPO").combobox("setValue", "").combobox("enable");
            getDataConfig("PO");
          }
        }
      });

      $("#SBBELI").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXBELI").textbox("disable").textbox("clear");
            $("#DIGITBELI").numberbox("disable").numberbox("clear");
            $("#LOKASIBELI").prop("checked", false).prop("disabled", true);
            $("#YYBELI").prop("checked", false).prop("disabled", true);
            $("#MMBELI").prop("checked", false).prop("disabled", true);
            $("#DDBELI").prop("checked", false).prop("disabled", true);
            $("#CBBELI").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXBELI").textbox("enable");
            $("#DIGITBELI").numberbox("enable");
            $("#LOKASIBELI").prop("disabled", false);
            $("#YYBELI").prop("disabled", false);
            $("#MMBELI").prop("disabled", true);
            $("#DDBELI").prop("disabled", true);
            $("#CBBELI").combobox("setValue", "").combobox("enable");
            getDataConfig("BELI");
          }
        }
      });

      $("#SBRETURBELI").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXRETURBELI").textbox("disable").textbox("clear");
            $("#DIGITRETURBELI").numberbox("disable").numberbox("clear");
            $("#LOKASIRETURBELI").prop("checked", false).prop("disabled", true);
            $("#YYRETURBELI").prop("checked", false).prop("disabled", true);
            $("#MMRETURBELI").prop("checked", false).prop("disabled", true);
            $("#DDRETURBELI").prop("checked", false).prop("disabled", true);
            $("#CBRETURBELI").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXRETURBELI").textbox("enable");
            $("#DIGITRETURBELI").numberbox("enable");
            $("#LOKASIRETURBELI").prop("disabled", false);
            $("#YYRETURBELI").prop("disabled", false);
            $("#MMRETURBELI").prop("disabled", true);
            $("#DDRETURBELI").prop("disabled", true);
            $("#CBRETURBELI").combobox("setValue", "").combobox("enable");
            getDataConfig("RETURBELI");
          }
        }
      });

      //SCRIPT UNTUK LOKASI, YEAR, MONTH, DATE
      $("#LOKASIPR").change(function() {
        generate_kode("PR");
      });

      $("#YYPR").change(function() {
        if (this.checked) {
          $("#MMPR").prop("checked", false).prop("disabled", false);
          $("#DDPR").prop("checked", false).prop("disabled", true);
        } else {
          $("#MMPR").prop("checked", false).prop("disabled", true);
          $("#DDPR").prop("checked", false).prop("disabled", true);
        }
        generate_kode("PR");
      });

      $("#MMPR").change(function() {
        if (this.checked) {
          $("#DDPR").prop("checked", false).prop("disabled", false);
        } else {
          $("#DDPR").prop("checked", false).prop("disabled", true);
        }
        generate_kode("PR");
      });

      $("#DDPR").change(function() {
        generate_kode("PR");
      });

      $("#LOKASIPO").change(function() {
        generate_kode("PO");
      });

      $("#YYPO").change(function() {
        if (this.checked) {
          $("#MMPO").prop("checked", false).prop("disabled", false);
          $("#DDPO").prop("checked", false).prop("disabled", true);
        } else {
          $("#MMPO").prop("checked", false).prop("disabled", true);
          $("#DDPO").prop("checked", false).prop("disabled", true);
        }
        generate_kode("PO");
      });

      $("#MMPO").change(function() {
        if (this.checked) {
          $("#DDPO").prop("checked", false).prop("disabled", false);
        } else {
          $("#DDPO").prop("checked", false).prop("disabled", true);
        }
        generate_kode("PO");
      });

      $("#DDPO").change(function() {
        generate_kode("PO");
      });

      $("#LOKASIBELI").change(function() {
        generate_kode("BELI");
      });

      $("#YYBELI").change(function() {
        if (this.checked) {
          $("#MMBELI").prop("checked", false).prop("disabled", false);
          $("#DDBELI").prop("checked", false).prop("disabled", true);
        } else {
          $("#MMBELI").prop("checked", false).prop("disabled", true);
          $("#DDBELI").prop("checked", false).prop("disabled", true);
        }
        generate_kode("BELI");
      });

      $("#MMBELI").change(function() {
        if (this.checked) {
          $("#DDBELI").prop("checked", false).prop("disabled", false);
        } else {
          $("#DDBELI").prop("checked", false).prop("disabled", true);
        }
        generate_kode("BELI");
      });

      $("#DDBELI").change(function() {
        generate_kode("BELI");
      });

      $("#LOKASIRETURBELI").change(function() {
        generate_kode("RETURBELI");
      });

      $("#YYRETURBELI").change(function() {
        if (this.checked) {
          $("#MMRETURBELI").prop("checked", false).prop("disabled", false);
          $("#DDRETURBELI").prop("checked", false).prop("disabled", true);
        } else {
          $("#MMRETURBELI").prop("checked", false).prop("disabled", true);
          $("#DDRETURBELI").prop("checked", false).prop("disabled", true);
        }
        generate_kode("RETURBELI");
      });

      $("#MMRETURBELI").change(function() {
        if (this.checked) {
          $("#DDRETURBELI").prop("checked", false).prop("disabled", false);
        } else {
          $("#DDRETURBELI").prop("checked", false).prop("disabled", true);
        }
        generate_kode("RETURBELI");
      });

      $("#DDRETURBELI").change(function() {
        generate_kode("RETURBELI");
      });

      $("#CBPO").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("PO");
        }
      });

      $("#CBBELI").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("BELI");
        }
      });

      $("#CBRETURBELI").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("RETURBELI");
        }
      });

      //SCRIPT PREFIX
      $("#PREFIXPO").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PO");
        },
      });
      $("#PREFIXBELI").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("BELI");
        },
      });
      $("#PREFIXRETURBELI").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("RETURBELI");
        },
      });

      $("#DIGITPO").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PO");
        },
      });
      $("#DIGITBELI").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("BELI");
        },
      });
      $("#DIGITRETURBELI").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("RETURBELI");
        },
      });

      $("#LOKASIPR").prop("checked", false);
      $("#YYPR").prop("checked", false);
      $("#MMPR").prop("checked", false);
      $("#DDPR").prop("checked", false);
      $("#LOKASIPO").prop("checked", false);
      $("#YYPO").prop("checked", false);
      $("#MMPO").prop("checked", false);
      $("#DDPO").prop("checked", false);
      $("#LOKASIBELI").prop("checked", false);
      $("#YYBELI").prop("checked", false);
      $("#MMBELI").prop("checked", false);
      $("#DDBELI").prop("checked", false);
      $("#LOKASIRETURBELI").prop("checked", false);
      $("#YYRETURBELI").prop("checked", false);
      $("#MMRETURBELI").prop("checked", false);
      $("#DDRETURBELI").prop("checked", false);

      getDataPembelian();
    });

    async function loadDataPembelian(data) {
      pr = data.pr.prefix;
      po = data.po.prefix;
      beli = data.beli.prefix;
      returbeli = data.returbeli.prefix;

      $("#PREFIXPR").textbox("setValue", pr.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "").replace("[LOKASI]",
        "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXPO").textbox("setValue", po.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "").replace("[LOKASI]",
        "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXBELI").textbox("setValue", beli.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "").replace(
        "[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXRETURBELI").textbox("setValue", returbeli.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));

      if (pr.includes('[LOKASI]')) {
        $("#LOKASIPR").prop("checked", true);
      }
      if (pr.includes('[YY]')) {
        $("#YYPR").prop("checked", true).prop("disabled", false);
      }
      if (pr.includes('[MM]')) {
        $("#MMPR").prop("checked", true).prop("disabled", false);
      }
      if (pr.includes('[DD]')) {
        $("#DDPR").prop("checked", true).prop("disabled", false);
      }
      if (pr.includes('/')) {
        $("#CBPR").combobox("setValue", "/")
      } else if (pr.includes('-')) {
        $("#CBPR").combobox("setValue", "-")
      } else if (pr.includes('.')) {
        $("#CBPR").combobox("setValue", ".")
      } else {
        $("#CBPR").combobox("setValue", "")
      }

      if (po.includes('[LOKASI]')) {
        $("#LOKASIPO").prop("checked", true);
      }
      if (po.includes('[YY]')) {
        $("#YYPO").prop("checked", true).prop("disabled", false);
      }
      if (po.includes('[MM]')) {
        $("#MMPO").prop("checked", true).prop("disabled", false);
      }
      if (po.includes('[DD]')) {
        $("#DDPO").prop("checked", true).prop("disabled", false);
      }
      if (po.includes('/')) {
        $("#CBPO").combobox("setValue", "/")
      } else if (po.includes('-')) {
        $("#CBPO").combobox("setValue", "-")
      } else if (po.includes('.')) {
        $("#CBPO").combobox("setValue", ".")
      } else {
        $("#CBPO").combobox("setValue", "")
      }

      if (beli.includes('[LOKASI]')) {
        $("#LOKASIBELI").prop("checked", true);
      }
      if (beli.includes('[YY]')) {
        $("#YYBELI").prop("checked", true).prop("disabled", false);
      }
      if (beli.includes('[MM]')) {
        $("#MMBELI").prop("checked", true).prop("disabled", false);
      }
      if (beli.includes('[DD]')) {
        $("#DDBELI").prop("checked", true).prop("disabled", false);
      }
      if (beli.includes('/')) {
        $("#CBBELI").combobox("setValue", "/")
      } else if (beli.includes('-')) {
        $("#CBBELI").combobox("setValue", "-")
      } else if (beli.includes('.')) {
        $("#CBBELI").combobox("setValue", ".")
      } else {
        $("#CBBELI").combobox("setValue", "")
      }

      if (returbeli.includes('[LOKASI]')) {
        $("#LOKASIRETURBELI").prop("checked", true);
      }
      if (returbeli.includes('[YY]')) {
        $("#YYRETURBELI").prop("checked", true).prop("disabled", false);
      }
      if (returbeli.includes('[MM]')) {
        $("#MMRETURBELI").prop("checked", true).prop("disabled", false);
      }
      if (returbeli.includes('[DD]')) {
        $("#DDRETURBELI").prop("checked", true).prop("disabled", false);
      }
      if (returbeli.includes('/')) {
        $("#CBRETURBELI").combobox("setValue", "/")
      } else if (returbeli.includes('-')) {
        $("#CBRETURBELI").combobox("setValue", "-")
      } else if (returbeli.includes('.')) {
        $("#CBRETURBELI").combobox("setValue", ".")
      } else {
        $("#CBRETURBELI").combobox("setValue", "")
      }

      $("#DIGITPR").numberbox("setValue", data.pr.jumlahdigit);
      $("#DIGITPO").numberbox("setValue", data.po.jumlahdigit);
      $("#DIGITBELI").numberbox("setValue", data.beli.jumlahdigit);
      $("#DIGITRETURBELI").numberbox("setValue", data.returbeli.jumlahdigit);

      if (data.pr.value == "AUTO") {
        $("#SBPR").switchbutton('check');
      } else {
        $("#SBPR").switchbutton('uncheck');
      }
      if (data.po.value == "AUTO") {
        $("#SBPO").switchbutton('check');
      } else {
        $("#SBPO").switchbutton('uncheck');
      }
      if (data.beli.value == "AUTO") {
        $("#SBBELI").switchbutton('check');
      } else {
        $("#SBBELI").switchbutton('uncheck');
      }
      if (data.returbeli.value == "AUTO") {
        $("#SBRETURBELI").switchbutton('check');
      } else {
        $("#SBRETURBELI").switchbutton('uncheck');
      }

      const promises = [
        generate_kode("PR"),
        generate_kode("PO"),
        generate_kode("BELI"),
        generate_kode("RETURBELI"),
      ];
      await Promise.all(promises);

      if (data.relasipo.value == "1TO1") {
        $("#RELASIPO").switchbutton('check');
      } else {
        $("#RELASIPO").switchbutton('uncheck');
      }
      if (data.updatehargaotomatis.value == "YA") {
        $("#UPDATEHARGAOTOMATIS").switchbutton('check');
      } else {
        $("#UPDATEHARGAOTOMATIS").switchbutton('uncheck');
      }
      if (data.relasipr.value == "1TO1") {
        $("#RELASIPR").switchbutton('check');
      } else {
        $("#RELASIPR").switchbutton('uncheck');
      }

      $("#PAKAIPO").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#POPAKAIPR").switchbutton("disable").switchbutton('uncheck');
          } else {
            $("#POPAKAIPR").switchbutton("enable");
          }
        }
      });

      if (data.pakaipo.value == "YA") {
        $("#PAKAIPO").switchbutton('check');
        $("#POPAKAIPR").switchbutton('enable');
      } else {
        $("#PAKAIPO").switchbutton('uncheck');
        $("#POPAKAIPR").switchbutton('disable').switchbutton('uncheck');
      }
      if (data.popakaipr.value == "YA") {
        $("#POPAKAIPR").switchbutton('check');
      } else {
        $("#POPAKAIPR").switchbutton('uncheck');
      }
    }

    async function getDataPembelian() {
      try {
        const response = await parent.fetchData(link_api.loadSettingPembelian, null);

        if (response.success) {
          await loadDataPembelian(response.data);
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
        const response = await parent.fetchData(link_api.loadConfigPembelian, {
          modul: modul
        });
        if (response.success) {
          const msg = response.data;
          if (msg.prefix.includes('[LOKASI]')) {
            $("#LOKASI" + modul).prop("checked", true);
          } else {
            $("#LOKASI" + modul).prop("checked", false).prop("disabled", false);
          }
          if (msg.prefix.includes('[YY]')) {
            $("#YY" + modul).prop("checked", true).prop("disabled", false);
          } else {
            $("#YY" + modul).prop("checked", false).prop("disabled", false);
          }
          if (msg.prefix.includes('[MM]')) {
            $("#MM" + modul).prop("checked", true).prop("disabled", false);
          } else {
            $("#MM" + modul).prop("checked", false).prop("disabled", false);
          }
          if (msg.prefix.includes('[DD]')) {
            $("#DD" + modul).prop("checked", true).prop("disabled", false);
          } else {
            $("#DD" + modul).prop("checked", false).prop("disabled", false);
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

          $("#PREFIX" + modul).textbox("setValue", msg.prefix.replace(/\//g, "").replace(/\-/g, "").replace(/\./g,
            "").replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace(
            "[NUM]", ""));
          $("#DIGIT" + modul).numberbox("setValue", msg.jumlahdigit);

          generate_kode(modul);

          $("#PREFIX" + modul).textbox("enable")
          $("#DIGIT" + modul).numberbox("enable")
        } else {
          throw new Error(response.message || 'Gagal memuat data');
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        $.messager.alert('Error', getTextError(error), 'error');
      }
    }

    async function generate_kode(modul) {
      prefix = $("#PREFIX" + modul).textbox("getValue");
      jmldigit = $("#DIGIT" + modul).numberbox("getValue");
      lokasi = $("#LOKASI" + modul).is(":checked");
      thn = $("#YY" + modul).is(":checked");
      bln = $("#MM" + modul).is(":checked");
      tgl = $("#DD" + modul).is(":checked");
      separator = $("#CB" + modul).combobox("getValue");

      try {
        const response = await parent.fetchData(link_api.generateCodePembelian, {
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

        const response = await parent.fetchData(link_api.simpanSettingPembelian, payload);

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
        window.location = "{{ route('atena.master.pengaturan.frame-master-master') }}";

    }

    async function simpan() {
      await handleFormSubmit(() => {
        $.messager.alert('Info', 'Data berhasil diubah', 'info');
      });
    }

    async function next() {
      await handleFormSubmit(() => {
        window.location.href = "{{ route('atena.master.pengaturan.frame-master-penjualan') }}";
      });
    }
  </script>
@endpush
