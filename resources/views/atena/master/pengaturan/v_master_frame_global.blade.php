@extends('template.form')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome/all.min.css') }}" />
@endpush

@section('content')
  <div style="height: 100%;overflow:hidden;margin-left:25px;margin-right:25px">
    <div style="height:40px;background-color:white;">
      <label class="font-header-menu">Pengaturan Umum</label>
      <div align="right" valign="top">
        <p>Proses 2 dari 10</p>
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
          <td align="right" id="label_form">Digit Desimal (Jumlah)</td>
          <td id="label_form">
            <input id="DECIMALDIGITQTY" name="decimaldigitqty" style="width:200px" class="easyui-numberbox"
              data-options="precision:0">
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">Digit Desimal (Harga)</td>
          <td id="label_form">
            <input id="DECIMALDIGITAMOUNT" name="decimaldigitamount" style="width:200px" class="easyui-numberbox"
              data-options="precision:0">
          </td>
        </tr>
        <tr hidden>
          <td align="right" id="label_form">PPN Persen</td>
          <td id="label_form">
            <input id="PPNPERSEN" name="ppnpersen" style="width:200px" class="easyui-numberbox">
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">PPH 22 Persen</td>
          <td id="label_form">
            <input id="PPH22PERSEN" name="pph22persen" style="width:200px" class="easyui-numberbox">
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">Perhitungan PPN Yang Digunakan</td>
          <td id="label_form">
            <select id="DEFAULTPAKAIPPN" name="defaultpakaippn" style="width:200px;" class="easyui-combobox"
              data-options="panelHeight:'auto'">
              <option value="TIDAK">TIDAK</option>
              <option value="EXCL">EXCLUDE</option>
              <option value="INCL">INCLUDE</option>
            </select>
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">Multi Currency</td>
          <td id="label_form">
            <select id="MULTICURRENCY" name="multicurrency" style="width:200px;" class="easyui-combobox"
              data-options="panelHeight:'auto'">
              <option value="1">YA</option>
              <option value="2">TIDAK</option>
            </select>
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">Currency Utama</td>
          <td id="label_form">
            <input id="KODECURRENCY" name="kodecurrency" style="width:200px">
            <input type="hidden" id="MAINCURRENCY" name="maincurrency" style="width:200px">
          </td>
        </tr>
      </table>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      $("#mode").val("ubah");
      browse_data_currency('#KODECURRENCY');
      getDataGlobal();
    });

    async function getDataGlobal() {
      try {
        const response = await parent.fetchData(link_api.loadSettingGlobal, null);
        if (response.success) {
          const data = response.data;
          $("#DECIMALDIGITQTY").numberbox("setValue", data.decimaldigitqty);
          $("#DECIMALDIGITAMOUNT").numberbox("setValue", data.decimaldigitamount);
          $("#PPNPERSEN").numberbox("setValue", data.ppnpersen);
          $("#PPH22PERSEN").numberbox("setValue", data.pph22persen);
          $("#DEFAULTPAKAIPPN").combobox("setValue", data.defaultpakaippn);
          $("#MULTICURRENCY").combobox("setValue", data.multicurrency);
          $("#KODECURRENCY").combogrid("setValue", data.kodecurrency);
          $("#MAINCURRENCY").val(data.kodecurrency);
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        $.messager.alert('Error', getTextError(error), 'error');
      } finally {
        tutupLoader();
      }
    }

    function browse_data_currency(id) {
      $(id).combogrid({
        panelWidth: 200,
        panelHeight: 'auto',
        url: link_api.browseCurrency,
        idField: 'kode',
        textField: 'nama',
        mode: 'local',
        required: true,
        columns: [
          [{
              field: 'nama',
              title: 'Curr',
              width: 100,
              sortable: true
            },
            {
              field: 'simbol',
              title: 'Simbol',
              width: 70,
              sortable: true
            }
          ]
        ],
        onSelect: function(index, data) {
          $("#MAINCURRENCY").val(data.kode)
        }
      });
    }

    function prev() {
      if (!parent.isTokenExpired()) {
        window.location = "{{ route('atena.master.pengaturan.frame-master-perusahaan') }}";
      } else {
        $.messager.alert('Error', "Token tidak valid, silahkan login kembali", 'error');
      }
    }

    async function simpanData() {
      try {
        const data = $('#form_input :input').serializeArray();
        const payload = {};
        for (const item of data) {
          payload[item.name] = item.value;
        }
        const response = await parent.fetchData(link_api.simpanSettingGlobal, payload);

        if (response.success) {
          return true;
        } else {
          throw new Error(response.message || 'Failed to save data.');
        }
      } catch (e) {
        throw new Error(e.message || 'An error occurred during data saving.');
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

    async function simpan() {
      await handleFormSubmit(() => {
        $.messager.alert('Info', 'Data berhasil diubah', 'info');
      });
    }

    async function next() {
      await handleFormSubmit(() => {
        window.location.href = "{{ route('atena.master.pengaturan.frame-master-master') }}";
      });
    }
  </script>
@endpush
