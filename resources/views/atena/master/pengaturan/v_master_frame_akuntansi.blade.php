@extends('template.form')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome/all.min.css') }}" />
@endpush

@section('content')
  <div style="height: 100%;overflow:hidden;margin-left:25px;margin-right:25px">
    <div style="height:30px;background-color:white;">
      <label class="font-header-menu">Pengaturan Modul Akuntansi</label>
      <div align="right" valign="top">
        <p>Proses 10 dari 10</p>
        {{-- signup condition --}}
        <a class="easyui-linkbutton" onclick="javascript:prev()"><i class="far fa-arrow-alt-circle-left"></i> Sebelumnya</a>
        {{-- end signup condition --}}
        <a class="easyui-linkbutton" onclick="javascript:simpan()"><i class="fas fa-save"></i> Simpan</a>
      </div>
    </div>

    <div id="form_input" style="width:100%;height:100%">
      <input type="hidden" name="mode" id="mode">
      <input type="hidden" name="uuidperusahaan" id="IDPERUSAHAAN">
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
          <td align="right" id="label_form">Kas, Bank, Giro, & Memorial</td>
          <td align="center" id="label_form"><input id="SBKAS" name="sbkas" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXKAS" name="prefixkas" style="width:150px"
              class="easyui-textbox" readonly></td>
          <td align="center" id="label_form"><input id="YYKAS" name="yykas" type="checkbox" value="1"></td>
          <td align="center" id="label_form"><input id="MMKAS" name="mmkas" type="checkbox" value="1"></td>
          <td align="center" id="label_form"><input id="DDKAS" name="ddkas" type="checkbox" value="1"></td>
          <td align="center" id="label_form"><input id="DIGITKAS" name="digitkas" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBKAS" name="cbkas" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELKAS"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Saldo Awal Perkiraan</td>
          <td align="center" id="label_form"><input id="SBSALDOPERKIRAAN" name="sbsaldoperkiraan"
              class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXSALDOPERKIRAAN" name="prefixsaldoperkiraan"
              style="width:150px" class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="YYSALDOPERKIRAAN" name="yysaldoperkiraan" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMSALDOPERKIRAAN" name="mmsaldoperkiraan" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDSALDOPERKIRAAN" name="ddsaldoperkiraan" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITSALDOPERKIRAAN" name="digitsaldoperkiraan"
              style="width:80px" class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBSALDOPERKIRAAN" name="cbsaldoperkiraan" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELSALDOPERKIRAAN"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">E-Faktur Pajak</td>
          <td align="center" id="label_form"><input id="SBFAKTURPAJAK" name="sbfakturpajak"
              class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXFAKTURPAJAK" name="prefixfakturpajak"
              style="width:150px" class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="YYFAKTURPAJAK" name="yyfakturpajak" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMFAKTURPAJAK" name="mmfakturpajak" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDFAKTURPAJAK" name="ddfakturpajak" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITFAKTURPAJAK" name="digitfakturpajak" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBFAKTURPAJAK" name="cbfakturpajak" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELFAKTURPAJAK"></label></td>
        </tr>
      </table>

      {{-- signup condition --}}
      {{-- <div style="padding: 20px;background-color: orange">
        <p style="padding: 0;margin: 0 0 10px"><b>Apakah anda ingin data akun perkiraan menggunakan template yang sudah
            ada ?</b></p>
        <input type="radio" name="importperkiraan" value="YA" id="PERKIRAANTEMPLATEYA" checked>
        <label for="PERKIRAANTEMPLATEYA">Ya, gunakan template</label>
        <input type="radio" name="importperkiraan" value="TIDAK" id="PERKIRAANTEMPLATETIDAK">
        <label for="PERKIRAANTEMPLATETIDAK">Tidak</label>
      </div> --}}
      {{-- end signup condition --}}
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      $("#mode").val("ubah");

      $("#SBKAS").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXKAS").textbox("clear");
            $("#DIGITKAS").numberbox("disable").numberbox("clear");
            $("#YYKAS").prop("checked", false).attr("disabled", true);
            $("#MMKAS").prop("checked", false).attr("disabled", true);
            $("#DDKAS").prop("checked", false).attr("disabled", true);
            $("#CBKAS").combobox("setValue", "").combobox("disable");
          } else {
            $("#DIGITKAS").numberbox("enable");
            $("#YYKAS").attr("disabled", false);
            $("#MMKAS").attr("disabled", true);
            $("#DDKAS").attr("disabled", true);
            $("#CBKAS").combobox("setValue", "").combobox("enable");
            getDataConfig("KAS");
          }
        }
      });

      $("#SBSALDOPERKIRAAN").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXSALDOPERKIRAAN").textbox("disable").textbox("clear");
            $("#DIGITSALDOPERKIRAAN").numberbox("disable").numberbox("clear");
            $("#YYSALDOPERKIRAAN").prop("checked", false).attr("disabled", true);
            $("#MMSALDOPERKIRAAN").prop("checked", false).attr("disabled", true);
            $("#DDSALDOPERKIRAAN").prop("checked", false).attr("disabled", true);
            $("#CBSALDOPERKIRAAN").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXSALDOPERKIRAAN").textbox("enable");
            $("#DIGITSALDOPERKIRAAN").numberbox("enable");
            $("#YYSALDOPERKIRAAN").attr("disabled", false);
            $("#MMSALDOPERKIRAAN").attr("disabled", true);
            $("#DDSALDOPERKIRAAN").attr("disabled", true);
            $("#CBSALDOPERKIRAAN").combobox("setValue", "").combobox("enable");
            getDataConfig("SALDOPERKIRAAN");
          }
        }
      });

      //SCRIPT UNTUK YEAR, MONTH, DATE
      $("#YYKAS").change(function() {
        if (this.checked) {
          $("#MMKAS").prop("checked", false).attr("disabled", false);
          $("#DDKAS").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMKAS").prop("checked", false).attr("disabled", true);
          $("#DDKAS").prop("checked", false).attr("disabled", true);
        }
        generate_kode("KAS");
      });

      $("#MMKAS").change(function() {
        if (this.checked) {
          $("#DDKAS").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDKAS").prop("checked", false).attr("disabled", true);
        }
        generate_kode("KAS");
      });

      $("#DDKAS").change(function() {
        generate_kode("KAS");
      });

      $("#YYSALDOPERKIRAAN").change(function() {
        if (this.checked) {
          $("#MMSALDOPERKIRAAN").prop("checked", false).attr("disabled", false);
          $("#DDSALDOPERKIRAAN").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMSALDOPERKIRAAN").prop("checked", false).attr("disabled", true);
          $("#DDSALDOPERKIRAAN").prop("checked", false).attr("disabled", true);
        }
        generate_kode("SALDOPERKIRAAN");
      });

      $("#MMSALDOPERKIRAAN").change(function() {
        if (this.checked) {
          $("#DDSALDOPERKIRAAN").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDSALDOPERKIRAAN").prop("checked", false).attr("disabled", true);
        }
        generate_kode("SALDOPERKIRAAN");
      });

      $("#DDSALDOPERKIRAAN").change(function() {
        generate_kode("SALDOPERKIRAAN");
      });

      $("#YYFAKTURPAJAK").change(function() {
        if (this.checked) {
          $("#MMFAKTURPAJAK").prop("checked", false).attr("disabled", false);
          $("#DDFAKTURPAJAK").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMFAKTURPAJAK").prop("checked", false).attr("disabled", true);
          $("#DDFAKTURPAJAK").prop("checked", false).attr("disabled", true);
        }
        generate_kode("FAKTURPAJAK");
      });

      $("#MMFAKTURPAJAK").change(function() {
        if (this.checked) {
          $("#DDFAKTURPAJAK").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDFAKTURPAJAK").prop("checked", false).attr("disabled", true);
        }
        generate_kode("FAKTURPAJAK");
      });

      $("#DDFAKTURPAJAK").change(function() {
        generate_kode("FAKTURPAJAK");
      });

      $("#CBKAS").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("KAS");
        }
      });

      $("#CBSALDOPERKIRAAN").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("SALDOPERKIRAAN");
        }
      });

      $("#CBFAKTURPAJAK").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("FAKTURPAJAK");
        }
      });

      //SCRIPT PREFIX
      $("#PREFIXKAS").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("KAS");
        },
      });

      $("#PREFIXSALDOPERKIRAAN").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("SALDOPERKIRAAN");
        },
      });

      $("#PREFIXFAKTURPAJAK").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("FAKTURPAJAK");
        },
      });

      $("#DIGITKAS").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("KAS");
        },
      });

      $("#DIGITSALDOPERKIRAAN").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("SALDOPERKIRAAN");
        },
      });

      $("#DIGITFAKTURPAJAK").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("FAKTURPAJAK");
        },
      });

      getDataAkuntansi();
    });

    async function loadDataAkuntansi(data) {
      const kas = data.kas.prefix;
      const saldoperkiraan = data.saldoperkiraan.prefix;
      const fakturpajak = data.fakturpajak.prefix;

      $("#PREFIXKAS").textbox("setValue", '');

      $("#PREFIXSALDOPERKIRAAN").textbox("setValue", saldoperkiraan.replace(/\//g, "").replace(/\-/g, "").replace(/\./g,
        "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));

      $("#PREFIXFAKTURPAJAK").textbox("setValue", fakturpajak.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[YYYY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));

      if (kas.includes('[YY]')) {
        $("#YYKAS").prop("checked", true).attr("disabled", false);
      }
      if (kas.includes('[MM]')) {
        $("#MMKAS").prop("checked", true).attr("disabled", false);
      }
      if (kas.includes('[DD]')) {
        $("#DDKAS").prop("checked", true).attr("disabled", false);
      }
      if (kas.includes('/')) {
        $("#CBKAS").combobox("setValue", "/")
      } else if (kas.includes('-')) {
        $("#CBKAS").combobox("setValue", "-")
      } else if (kas.includes('.')) {
        $("#CBKAS").combobox("setValue", ".")
      } else {
        $("#CBKAS").combobox("setValue", "")
      }

      if (saldoperkiraan.includes('[YY]')) {
        $("#YYSALDOPERKIRAAN").prop("checked", true).attr("disabled", false);
      }
      if (saldoperkiraan.includes('[MM]')) {
        $("#MMSALDOPERKIRAAN").prop("checked", true).attr("disabled", false);
      }
      if (saldoperkiraan.includes('[DD]')) {
        $("#DDSALDOPERKIRAAN").prop("checked", true).attr("disabled", false);
      }
      if (saldoperkiraan.includes('/')) {
        $("#CBSALDOPERKIRAAN").combobox("setValue", "/")
      } else if (saldoperkiraan.includes('-')) {
        $("#CBSALDOPERKIRAAN").combobox("setValue", "-")
      } else if (saldoperkiraan.includes('.')) {
        $("#CBSALDOPERKIRAAN").combobox("setValue", ".")
      } else {
        $("#CBSALDOPERKIRAAN").combobox("setValue", "")
      }

      if (fakturpajak.includes('[YYYY]')) {
        $("#YYFAKTURPAJAK").prop("checked", true).attr("disabled", false);
      }
      if (fakturpajak.includes('[MM]')) {
        $("#MMFAKTURPAJAK").prop("checked", true).attr("disabled", false);
      }
      if (fakturpajak.includes('[DD]')) {
        $("#DDFAKTURPAJAK").prop("checked", true).attr("disabled", false);
      }
      if (fakturpajak.includes('/')) {
        $("#CBFAKTURPAJAK").combobox("setValue", "/")
      } else if (fakturpajak.includes('-')) {
        $("#CBFAKTURPAJAK").combobox("setValue", "-")
      } else if (fakturpajak.includes('.')) {
        $("#CBFAKTURPAJAK").combobox("setValue", ".")
      } else {
        $("#CBFAKTURPAJAK").combobox("setValue", "")
      }

      $("#DIGITKAS").numberbox("setValue", data.kas.jumlahdigit);

      $("#DIGITSALDOPERKIRAAN").numberbox("setValue", data.saldoperkiraan.jumlahdigit);

      $("#DIGITFAKTURPAJAK").numberbox("setValue", data.fakturpajak.jumlahdigit);

      if (data.kas.value == "AUTO") {
        $("#SBKAS").switchbutton('check');
      } else {
        $("#SBKAS").switchbutton('uncheck');
      }

      if (data.saldoperkiraan.value == "AUTO") {
        $("#SBSALDOPERKIRAAN").switchbutton('check');
      } else {
        $("#SBSALDOPERKIRAAN").switchbutton('uncheck');
      }

      if (data.fakturpajak.value == "AUTO") {
        $("#SBFAKTURPAJAK").switchbutton('check');
      } else {
        $("#SBFAKTURPAJAK").switchbutton('uncheck');
      }

      const promises = [
        generate_kode("KAS"),
        generate_kode("SALDOPERKIRAAN"),
        generate_kode("FAKTURPAJAK"),
      ];

      await Promise.all(promises);
    }

    async function getDataConfig(modul) {
      try {
        const response = await parent.fetchData(link_api.loadConfigAkuntansi, {
          modul: modul
        });
        if (response.success) {
          const msg = response.data;
          if (msg.prefix.includes('[YY]')) {
            $("#YY" + modul).prop("checked", true).attr("disabled", false);
          } else {
            $("#YY" + modul).prop("checked", false).attr("disabled", false);
          }

          if (msg.prefix.includes('[YYYY]')) {
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

          if (modul == "KAS") {
            $("#PREFIX" + modul).textbox("setValue", "KM");
          } else {
            $("#PREFIX" + modul).textbox("setValue", msg.prefix.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
              .replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
          }

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
        const response = await parent.fetchData(link_api.generateCodeAkuntansi, {
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

    async function getDataAkuntansi() {
      try {
        const response = await parent.fetchData(link_api.loadSettingAkuntansi, null);

        if (response.success) {
          await loadDataAkuntansi(response.data);
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

        const response = await parent.fetchData(link_api.simpanSettingAkuntansi, payload);

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
      window.location = "{{ route('atena.master.pengaturan.frame-master-keuangan') }}";
    }

    async function simpan() {
      await handleFormSubmit(() => {
        $.messager.alert('Info', 'Data berhasil diubah', 'info');
      });
    }
  </script>
@endpush
