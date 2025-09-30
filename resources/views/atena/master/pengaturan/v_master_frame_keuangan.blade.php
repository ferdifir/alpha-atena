@extends('template.form')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome/all.min.css') }}" />
@endpush

@section('content')
  <div style="height: 100%;overflow:hidden;margin-left:25px;margin-right:25px">
    <div style="height:30px;background-color:white;">
      <label class="font-header-menu">Pengaturan Modul Keuangan</label>
      <div align="right" valign="top">
        <p>Proses 9 dari 10</p>
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
          <td align="center" id="label_form" style="width:25px">YY</td>
          <td align="center" id="label_form" style="width:25px">MM</td>
          <td align="center" id="label_form" style="width:25px">DD</td>
          <td align="center" id="label_form">Jumlah Digit</td>
          <td align="center" id="label_form">Separator</td>
          <td align="center" id="label_form" style="width:300px">Contoh</td>
        </tr>
        <tr>
          <td align="right" id="label_form">Credit Note</td>
          <td align="center" id="label_form"><input id="SBCREDITNOTE" name="sbcreditnote" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXCREDITNOTE" name="prefixcreditnote" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="YYCREDITNOTE" name="yycreditnote" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="MMCREDITNOTE" name="mmcreditnote" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DDCREDITNOTE" name="ddcreditnote" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DIGITCREDITNOTE" name="digitcreditnote" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBCREDITNOTE" name="cbcreditnote" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELCREDITNOTE"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Debet Note</td>
          <td align="center" id="label_form"><input id="SBDEBETNOTE" name="sbdebetnote" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXDEBETNOTE" name="prefixdebetnote" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="YYDEBETNOTE" name="yydebetnote" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMDEBETNOTE" name="mmdebetnote" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDDEBETNOTE" name="dddebetnote" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITDEBETNOTE" name="digitdebetnote" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBDEBETNOTE" name="cbdebetnote" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELDEBETNOTE"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Tanda Terima Tagihan Supplier</td>
          <td align="center" id="label_form"><input id="SBTANDATERIMA" name="sbtandaterima"
              class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXTANDATERIMA" name="prefixtandaterima"
              style="width:150px" class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="YYTANDATERIMA" name="yytandaterima" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMTANDATERIMA" name="mmtandaterima" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDTANDATERIMA" name="ddtandaterima" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITTANDATERIMA" name="digittandaterima" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBTANDATERIMA" name="cbtandaterima" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELTANDATERIMA"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Tagihan Customer</td>
          <td align="center" id="label_form"><input id="SBTAGIHAN" name="sbtagihan" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXTAGIHAN" name="prefixtagihan" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="YYTAGIHAN" name="yytagihan" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="MMTAGIHAN" name="mmtagihan" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DDTAGIHAN" name="ddtagihan" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DIGITTAGIHAN" name="digittagihan" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBTAGIHAN" name="cbtagihan" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELTAGIHAN"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Pelunasan Hutang</td>
          <td align="center" id="label_form"><input id="SBPELUNASANHUTANG" name="sbpelunasanhutang"
              class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXPELUNASANHUTANG" name="prefixpelunasanhutang"
              style="width:150px" class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="YYPELUNASANHUTANG" name="yypelunasanhutang" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMPELUNASANHUTANG" name="mmpelunasanhutang" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDPELUNASANHUTANG" name="ddpelunasanhutang" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITPELUNASANHUTANG" name="digitpelunasanhutang"
              style="width:80px" class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBPELUNASANHUTANG" name="cbpelunasanhutang" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELPELUNASANHUTANG"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Pelunasan Piutang</td>
          <td align="center" id="label_form"><input id="SBPELUNASANPIUTANG" name="sbpelunasanpiutang"
              class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXPELUNASANPIUTANG" name="prefixpelunasanpiutang"
              style="width:150px" class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="YYPELUNASANPIUTANG" name="yypelunasanpiutang" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMPELUNASANPIUTANG" name="mmpelunasanpiutang" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDPELUNASANPIUTANG" name="ddpelunasanpiutang" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITPELUNASANPIUTANG" name="digitpelunasanpiutang"
              style="width:80px" class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBPELUNASANPIUTANG" name="cbpelunasanpiutang" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELPELUNASANPIUTANG"></label></td>
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

      $("#SBCREDITNOTE").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXCREDITNOTE").textbox("disable").textbox("clear");
            $("#DIGITCREDITNOTE").numberbox("disable").numberbox("clear");
            $("#YYCREDITNOTE").prop("checked", false).attr("disabled", true);
            $("#MMCREDITNOTE").prop("checked", false).attr("disabled", true);
            $("#DDCREDITNOTE").prop("checked", false).attr("disabled", true);
            $("#CBCREDITNOTE").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXCREDITNOTE").textbox("enable");
            $("#DIGITCREDITNOTE").numberbox("enable");
            $("#YYCREDITNOTE").attr("disabled", false);
            $("#MMCREDITNOTE").attr("disabled", true);
            $("#DDCREDITNOTE").attr("disabled", true);
            $("#CBCREDITNOTE").combobox("setValue", "").combobox("enable");
            getDataConfig("CREDITNOTE");
          }
        }
      });

      $("#SBDEBETNOTE").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXDEBETNOTE").textbox("disable").textbox("clear");
            $("#DIGITDEBETNOTE").numberbox("disable").numberbox("clear");
            $("#YYDEBETNOTE").prop("checked", false).attr("disabled", true);
            $("#MMDEBETNOTE").prop("checked", false).attr("disabled", true);
            $("#DDDEBETNOTE").prop("checked", false).attr("disabled", true);
            $("#CBDEBETNOTE").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXDEBETNOTE").textbox("enable");
            $("#DIGITDEBETNOTE").numberbox("enable");
            $("#YYDEBETNOTE").attr("disabled", false);
            $("#MMDEBETNOTE").attr("disabled", true);
            $("#DDDEBETNOTE").attr("disabled", true);
            $("#CBDEBETNOTE").combobox("setValue", "").combobox("enable");
            getDataConfig("DEBETNOTE");
          }
        }
      });

      $("#SBTANDATERIMA").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXTANDATERIMA").textbox("disable").textbox("clear");
            $("#DIGITTANDATERIMA").numberbox("disable").numberbox("clear");
            $("#YYTANDATERIMA").prop("checked", false).attr("disabled", true);
            $("#MMTANDATERIMA").prop("checked", false).attr("disabled", true);
            $("#DDTANDATERIMA").prop("checked", false).attr("disabled", true);
            $("#CBTANDATERIMA").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXTANDATERIMA").textbox("enable");
            $("#DIGITTANDATERIMA").numberbox("enable");
            $("#YYTANDATERIMA").attr("disabled", false);
            $("#MMTANDATERIMA").attr("disabled", true);
            $("#DDTANDATERIMA").attr("disabled", true);
            $("#CBTANDATERIMA").combobox("setValue", "").combobox("enable");
            getDataConfig("TANDATERIMA");
          }
        }
      });

      $("#SBTAGIHAN").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXTAGIHAN").textbox("disable").textbox("clear");
            $("#DIGITTAGIHAN").numberbox("disable").numberbox("clear");
            $("#YYTAGIHAN").prop("checked", false).attr("disabled", true);
            $("#MMTAGIHAN").prop("checked", false).attr("disabled", true);
            $("#DDTAGIHAN").prop("checked", false).attr("disabled", true);
            $("#CBTAGIHAN").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXTAGIHAN").textbox("enable");
            $("#DIGITTAGIHAN").numberbox("enable");
            $("#YYTAGIHAN").attr("disabled", false);
            $("#MMTAGIHAN").attr("disabled", true);
            $("#DDTAGIHAN").attr("disabled", true);
            $("#CBTAGIHAN").combobox("setValue", "").combobox("enable");
            getDataConfig("TAGIHAN");
          }
        }
      });

      $("#SBPELUNASANHUTANG").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXPELUNASANHUTANG").textbox("disable").textbox("clear");
            $("#DIGITPELUNASANHUTANG").numberbox("disable").numberbox("clear");
            $("#YYPELUNASANHUTANG").prop("checked", false).attr("disabled", true);
            $("#MMPELUNASANHUTANG").prop("checked", false).attr("disabled", true);
            $("#DDPELUNASANHUTANG").prop("checked", false).attr("disabled", true);
            $("#CBPELUNASANHUTANG").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXPELUNASANHUTANG").textbox("enable");
            $("#DIGITPELUNASANHUTANG").numberbox("enable");
            $("#YYPELUNASANHUTANG").attr("disabled", false);
            $("#MMPELUNASANHUTANG").attr("disabled", true);
            $("#DDPELUNASANHUTANG").attr("disabled", true);
            $("#CBPELUNASANHUTANG").combobox("setValue", "").combobox("enable");
            getDataConfig("PELUNASANHUTANG");
          }
        }
      });

      $("#SBPELUNASANPIUTANG").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXPELUNASANPIUTANG").textbox("disable").textbox("clear");
            $("#DIGITPELUNASANPIUTANG").numberbox("disable").numberbox("clear");
            $("#YYPELUNASANPIUTANG").prop("checked", false).attr("disabled", true);
            $("#MMPELUNASANPIUTANG").prop("checked", false).attr("disabled", true);
            $("#DDPELUNASANPIUTANG").prop("checked", false).attr("disabled", true);
            $("#CBPELUNASANPIUTANG").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXPELUNASANPIUTANG").textbox("enable");
            $("#DIGITPELUNASANPIUTANG").numberbox("enable");
            $("#YYPELUNASANPIUTANG").attr("disabled", false);
            $("#MMPELUNASANPIUTANG").attr("disabled", true);
            $("#DDPELUNASANPIUTANG").attr("disabled", true);
            $("#CBPELUNASANPIUTANG").combobox("setValue", "").combobox("enable");
            getDataConfig("PELUNASANPIUTANG");
          }
        }
      });

      $("#YYCREDITNOTE").change(function() {
        if (this.checked) {
          $("#MMCREDITNOTE").prop("checked", false).attr("disabled", false);
          $("#DDCREDITNOTE").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMCREDITNOTE").prop("checked", false).attr("disabled", true);
          $("#DDCREDITNOTE").prop("checked", false).attr("disabled", true);
        }
        generate_kode("CREDITNOTE");
      });

      $("#MMCREDITNOTE").change(function() {
        if (this.checked) {
          $("#DDCREDITNOTE").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDCREDITNOTE").prop("checked", false).attr("disabled", true);
        }
        generate_kode("CREDITNOTE");
      });

      $("#DDCREDITNOTE").change(function() {
        generate_kode("CREDITNOTE");
      });

      $("#YYDEBETNOTE").change(function() {
        if (this.checked) {
          $("#MMDEBETNOTE").prop("checked", false).attr("disabled", false);
          $("#DDDEBETNOTE").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMDEBETNOTE").prop("checked", false).attr("disabled", true);
          $("#DDDEBETNOTE").prop("checked", false).attr("disabled", true);
        }
        generate_kode("DEBETNOTE");
      });

      $("#MMDEBETNOTE").change(function() {
        if (this.checked) {
          $("#DDDEBETNOTE").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDDEBETNOTE").prop("checked", false).attr("disabled", true);
        }
        generate_kode("DEBETNOTE");
      });

      $("#DDDEBETNOTE").change(function() {
        generate_kode("DEBETNOTE");
      });

      $("#YYTANDATERIMA").change(function() {
        if (this.checked) {
          $("#MMTANDATERIMA").prop("checked", false).attr("disabled", false);
          $("#DDTANDATERIMA").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMTANDATERIMA").prop("checked", false).attr("disabled", true);
          $("#DDTANDATERIMA").prop("checked", false).attr("disabled", true);
        }
        generate_kode("TANDATERIMA");
      });

      $("#MMTANDATERIMA").change(function() {
        if (this.checked) {
          $("#DDTANDATERIMA").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDTANDATERIMA").prop("checked", false).attr("disabled", true);
        }
        generate_kode("TANDATERIMA");
      });

      $("#DDTANDATERIMA").change(function() {
        generate_kode("TANDATERIMA");
      });

      $("#YYTAGIHAN").change(function() {
        if (this.checked) {
          $("#MMTAGIHAN").prop("checked", false).attr("disabled", false);
          $("#DDTAGIHAN").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMTAGIHAN").prop("checked", false).attr("disabled", true);
          $("#DDTAGIHAN").prop("checked", false).attr("disabled", true);
        }
        generate_kode("TAGIHAN");
      });

      $("#MMTAGIHAN").change(function() {
        if (this.checked) {
          $("#DDTAGIHAN").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDTAGIHAN").prop("checked", false).attr("disabled", true);
        }
        generate_kode("TAGIHAN");
      });

      $("#DDTAGIHAN").change(function() {
        generate_kode("TAGIHAN");
      });

      $("#YYPELUNASANHUTANG").change(function() {
        if (this.checked) {
          $("#MMPELUNASANHUTANG").prop("checked", false).attr("disabled", false);
          $("#DDPELUNASANHUTANG").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMPELUNASANHUTANG").prop("checked", false).attr("disabled", true);
          $("#DDPELUNASANHUTANG").prop("checked", false).attr("disabled", true);
        }
        generate_kode("PELUNASANHUTANG");
      });

      $("#MMPELUNASANHUTANG").change(function() {
        if (this.checked) {
          $("#DDPELUNASANHUTANG").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDPELUNASANHUTANG").prop("checked", false).attr("disabled", true);
        }
        generate_kode("PELUNASANHUTANG");
      });

      $("#DDPELUNASANHUTANG").change(function() {
        generate_kode("PELUNASANHUTANG");
      });

      $("#YYPELUNASANPIUTANG").change(function() {
        if (this.checked) {
          $("#MMPELUNASANPIUTANG").prop("checked", false).attr("disabled", false);
          $("#DDPELUNASANPIUTANG").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMPELUNASANPIUTANG").prop("checked", false).attr("disabled", true);
          $("#DDPELUNASANPIUTANG").prop("checked", false).attr("disabled", true);
        }
        generate_kode("PELUNASANPIUTANG");
      });

      $("#MMPELUNASANPIUTANG").change(function() {
        if (this.checked) {
          $("#DDPELUNASANPIUTANG").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDPELUNASANPIUTANG").prop("checked", false).attr("disabled", true);
        }
        generate_kode("PELUNASANPIUTANG");
      });

      $("#DDPELUNASANPIUTANG").change(function() {
        generate_kode("PELUNASANPIUTANG");
      });

      $("#CBCREDITNOTE").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("CREDITNOTE");
        }
      });

      $("#CBDEBETNOTE").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("DEBETNOTE");
        }
      });

      $("#CBTANDATERIMA").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("TANDATERIMA");
        }
      });

      $("#CBTAGIHAN").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("TAGIHAN");
        }
      });

      $("#CBPELUNASANHUTANG").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("PELUNASANHUTANG");
        }
      });

      $("#CBPELUNASANPIUTANG").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("PELUNASANPIUTANG");
        }
      });

      //SCRIPT PREFIX
      $("#PREFIXCREDITNOTE").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("CREDITNOTE");
        },
      });
      $("#PREFIXDEBETNOTE").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("DEBETNOTE");
        },
      });
      $("#PREFIXTANDATERIMA").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("TANDATERIMA");
        },
      });
      $("#PREFIXTAGIHAN").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("TAGIHAN");
        },
      });
      $("#PREFIXPELUNASANHUTANG").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PELUNASANHUTANG");
        },
      });
      $("#PREFIXPELUNASANPIUTANG").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PELUNASANPIUTANG");
        },
      });

      $("#DIGITCREDITNOTE").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("CREDITNOTE");
        },
      });
      $("#DIGITDEBETNOTE").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("DEBETNOTE");
        },
      });
      $("#DIGITTANDATERIMA").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("TANDATERIMA");
        },
      });
      $("#DIGITTAGIHAN").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("TAGIHAN");
        },
      });
      $("#DIGITPELUNASANHUTANG").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PELUNASANHUTANG");
        },
      });
      $("#DIGITPELUNASANPIUTANG").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PELUNASANPIUTANG");
        },
      });

      getDataKeuangan();
    });

    async function loadDataKeuangan(data) {
      const creditnote = data.creditnote.prefix;
      const debetnote = data.debetnote.prefix;
      const tandaterima = data.tandaterima.prefix;
      const tagihan = data.tagihan.prefix;
      const pelunasanhutang = data.pelunasanhutang.prefix;
      const pelunasanpiutang = data.pelunasanpiutang.prefix;

      $("#PREFIXCREDITNOTE").textbox("setValue", creditnote.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXDEBETNOTE").textbox("setValue", debetnote.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXTANDATERIMA").textbox("setValue", tandaterima.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXTAGIHAN").textbox("setValue", tagihan.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "").replace(
        "[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXPELUNASANHUTANG").textbox("setValue", pelunasanhutang.replace(/\//g, "").replace(/\-/g, "").replace(
        /\./g, "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXPELUNASANPIUTANG").textbox("setValue", pelunasanpiutang.replace(/\//g, "").replace(/\-/g, "").replace(
        /\./g, "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));

      if (creditnote.includes('[YY]')) {
        $("#YYCREDITNOTE").prop("checked", true).attr("disabled", false);
      }
      if (creditnote.includes('[MM]')) {
        $("#MMCREDITNOTE").prop("checked", true).attr("disabled", false);
      }
      if (creditnote.includes('[DD]')) {
        $("#DDCREDITNOTE").prop("checked", true).attr("disabled", false);
      }
      if (creditnote.includes('/')) {
        $("#CBCREDITNOTE").combobox("setValue", "/")
      } else if (creditnote.includes('-')) {
        $("#CBCREDITNOTE").combobox("setValue", "-")
      } else if (creditnote.includes('.')) {
        $("#CBCREDITNOTE").combobox("setValue", ".")
      } else {
        $("#CBCREDITNOTE").combobox("setValue", "")
      }

      if (debetnote.includes('[YY]')) {
        $("#YYDEBETNOTE").prop("checked", true).attr("disabled", false);
      }
      if (debetnote.includes('[MM]')) {
        $("#MMDEBETNOTE").prop("checked", true).attr("disabled", false);
      }
      if (debetnote.includes('[DD]')) {
        $("#DDDEBETNOTE").prop("checked", true).attr("disabled", false);
      }
      if (debetnote.includes('/')) {
        $("#CBDEBETNOTE").combobox("setValue", "/")
      } else if (debetnote.includes('-')) {
        $("#CBDEBETNOTE").combobox("setValue", "-")
      } else if (debetnote.includes('.')) {
        $("#CBDEBETNOTE").combobox("setValue", ".")
      } else {
        $("#CBDEBETNOTE").combobox("setValue", "")
      }

      if (tandaterima.includes('[YY]')) {
        $("#YYTANDATERIMA").prop("checked", true).attr("disabled", false);
      }
      if (tandaterima.includes('[MM]')) {
        $("#MMTANDATERIMA").prop("checked", true).attr("disabled", false);
      }
      if (tandaterima.includes('[DD]')) {
        $("#DDTANDATERIMA").prop("checked", true).attr("disabled", false);
      }
      if (tandaterima.includes('/')) {
        $("#CBTANDATERIMA").combobox("setValue", "/")
      } else if (tandaterima.includes('-')) {
        $("#CBTANDATERIMA").combobox("setValue", "-")
      } else if (tandaterima.includes('.')) {
        $("#CBTANDATERIMA").combobox("setValue", ".")
      } else {
        $("#CBTANDATERIMA").combobox("setValue", "")
      }

      if (tagihan.includes('[YY]')) {
        $("#YYTAGIHAN").prop("checked", true).attr("disabled", false);
      }
      if (tagihan.includes('[MM]')) {
        $("#MMTAGIHAN").prop("checked", true).attr("disabled", false);
      }
      if (tagihan.includes('[DD]')) {
        $("#DDTAGIHAN").prop("checked", true).attr("disabled", false);
      }
      if (tagihan.includes('/')) {
        $("#CBTAGIHAN").combobox("setValue", "/")
      } else if (tagihan.includes('-')) {
        $("#CBTAGIHAN").combobox("setValue", "-")
      } else if (tagihan.includes('.')) {
        $("#CBTAGIHAN").combobox("setValue", ".")
      } else {
        $("#CBTAGIHAN").combobox("setValue", "")
      }

      if (pelunasanhutang.includes('[YY]')) {
        $("#YYPELUNASANHUTANG").prop("checked", true).attr("disabled", false);
      }
      if (pelunasanhutang.includes('[MM]')) {
        $("#MMPELUNASANHUTANG").prop("checked", true).attr("disabled", false);
      }
      if (pelunasanhutang.includes('[DD]')) {
        $("#DDPELUNASANHUTANG").prop("checked", true).attr("disabled", false);
      }
      if (pelunasanhutang.includes('/')) {
        $("#CBPELUNASANHUTANG").combobox("setValue", "/")
      } else if (pelunasanhutang.includes('-')) {
        $("#CBPELUNASANHUTANG").combobox("setValue", "-")
      } else if (pelunasanhutang.includes('.')) {
        $("#CBPELUNASANHUTANG").combobox("setValue", ".")
      } else {
        $("#CBPELUNASANHUTANG").combobox("setValue", "")
      }

      if (pelunasanpiutang.includes('[YY]')) {
        $("#YYPELUNASANPIUTANG").prop("checked", true).attr("disabled", false);
      }
      if (pelunasanpiutang.includes('[MM]')) {
        $("#MMPELUNASANPIUTANG").prop("checked", true).attr("disabled", false);
      }
      if (pelunasanpiutang.includes('[DD]')) {
        $("#DDPELUNASANPIUTANG").prop("checked", true).attr("disabled", false);
      }
      if (pelunasanpiutang.includes('/')) {
        $("#CBPELUNASANPIUTANG").combobox("setValue", "/")
      } else if (pelunasanpiutang.includes('-')) {
        $("#CBPELUNASANPIUTANG").combobox("setValue", "-")
      } else if (pelunasanpiutang.includes('.')) {
        $("#CBPELUNASANPIUTANG").combobox("setValue", ".")
      } else {
        $("#CBPELUNASANPIUTANG").combobox("setValue", "")
      }

      $("#DIGITCREDITNOTE").numberbox("setValue", data.creditnote.jumlahdigit);
      $("#DIGITDEBETNOTE").numberbox("setValue", data.debetnote.jumlahdigit);
      $("#DIGITTANDATERIMA").numberbox("setValue", data.tandaterima.jumlahdigit);
      $("#DIGITTAGIHAN").numberbox("setValue", data.tagihan.jumlahdigit);
      $("#DIGITPELUNASANHUTANG").numberbox("setValue", data.pelunasanhutang.jumlahdigit);
      $("#DIGITPELUNASANPIUTANG").numberbox("setValue", data.pelunasanpiutang.jumlahdigit);

      if (data.creditnote.value == "AUTO") {
        $("#SBCREDITNOTE").switchbutton('check');
      } else {
        $("#SBCREDITNOTE").switchbutton('uncheck');
      }
      if (data.debetnote.value == "AUTO") {
        $("#SBDEBETNOTE").switchbutton('check');
      } else {
        $("#SBDEBETNOTE").switchbutton('uncheck');
      }
      if (data.tandaterima.value == "AUTO") {
        $("#SBTANDATERIMA").switchbutton('check');
      } else {
        $("#SBTANDATERIMA").switchbutton('uncheck');
      }
      if (data.tagihan.value == "AUTO") {
        $("#SBTAGIHAN").switchbutton('check');
      } else {
        $("#SBTAGIHAN").switchbutton('uncheck');
      }
      if (data.pelunasanhutang.value == "AUTO") {
        $("#SBPELUNASANHUTANG").switchbutton('check');
      } else {
        $("#SBPELUNASANHUTANG").switchbutton('uncheck');
      }
      if (data.pelunasanpiutang.value == "AUTO") {
        $("#SBPELUNASANPIUTANG").switchbutton('check');
      } else {
        $("#SBPELUNASANPIUTANG").switchbutton('uncheck');
      }

      const promises = [
        generate_kode("CREDITNOTE"),
        generate_kode("DEBETNOTE"),
        generate_kode("TANDATERIMA"),
        generate_kode("TAGIHAN"),
        generate_kode("PELUNASANHUTANG"),
        generate_kode("PELUNASANPIUTANG"),
      ];

      await Promise.all(promises);
    }

    async function getDataConfig(modul) {
      try {
        const response = await parent.fetchData(link_api.loadConfigKeuangan, {
          modul: modul
        });
        if (response.success) {
          const msg = response.data;
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
            .replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
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
      const thn = $("#YY" + modul).is(":checked");
      const bln = $("#MM" + modul).is(":checked");
      const tgl = $("#DD" + modul).is(":checked");
      const separator = $("#CB" + modul).combobox("getValue");

      try {
        const response = await parent.fetchData(link_api.generateCodeKeuangan, {
          modul: modul,
          prefix: prefix,
          jmldigit: jmldigit,
          separator: separator,
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

    async function getDataKeuangan() {
      try {
        const response = await parent.fetchData(link_api.loadSettingKeuangan, null);

        if (response.success) {
          await loadDataKeuangan(response.data);
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
      window.location = "{{ route('atena.master.pengaturan.frame-master-aset') }}";
    }

    async function simpan() {
      await handleFormSubmit(() => {
        $.messager.alert('Info', 'Data berhasil diubah', 'info');
      });
    }

    async function next() {
      await handleFormSubmit(() => {
        window.location.href = "{{ route('atena.master.pengaturan.frame-master-akuntansi') }}";
      });
    }
  </script>
@endpush
