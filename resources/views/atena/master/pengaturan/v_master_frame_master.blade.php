@extends('template.form')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome/all.min.css') }}" />
@endpush

@section('content')
  <div style="height: 100%;overflow:hidden;margin-left:25px;margin-right:25px">
    <div style="height:30px;background-color:white;">
      <label class="font-header-menu">Pengaturan Modul Master</label>
      <div align="right" valign="top">
        <p>Proses 3 dari 10</p>
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
          <td align="center" id="label_form">Jumlah Digit</td>
          <td align="center" id="label_form" style="width:100px">Contoh</td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Lokasi</td>
          <td align="center" id="label_form"><input id="SBLOKASI" name="sblokasi" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXLOKASI" name="prefixlokasi" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITLOKASI" name="digitlokasi" style="width:80px" class="number"
              data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELLOKASI"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Barang</td>
          <td align="center" id="label_form"><input id="SBBARANG" name="sbbarang" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXBARANG" name="prefixbarang" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITBARANG" name="digitbarang" style="width:80px" class="number"
              data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELBARANG"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Syarat Bayar</td>
          <td align="center" id="label_form"><input id="SBSYARATBAYAR" name="sbsyaratbayar" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXSYARATBAYAR" name="prefixsyaratbayar" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITSYARATBAYAR" name="digitsyaratbayar" style="width:80px"
              class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELSYARATBAYAR"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Pemasok</td>
          <td align="center" id="label_form"><input id="SBSUPPLIER" name="sbsupplier" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXSUPPLIER" name="prefixsupplier" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITSUPPLIER" name="digitsupplier" style="width:80px"
              class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELSUPPLIER"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Ekspedisi</td>
          <td align="center" id="label_form"><input id="SBEKSPEDISI" name="sbekspedisi" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXEKSPEDISI" name="prefixekspedisi" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITEKSPEDISI" name="digitekspedisi" style="width:80px"
              class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELEKSPEDISI"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Departemen Kerja</td>
          <td align="center" id="label_form"><input id="SBDEPARTEMENKERJA" name="sbdepartemenkerja"
              class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXDEPARTEMENKERJA" name="prefixdepartemenkerja"
              style="width:40px" class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITDEPARTEMENKERJA" name="digitdepartemenkerja"
              style="width:80px" class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELDEPARTEMENKERJA"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Sopir</td>
          <td align="center" id="label_form"><input id="SBSOPIR" name="sbsopir" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXSOPIR" name="prefixsopir" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITSOPIR" name="digitsopir" style="width:80px"
              class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELSOPIR"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Kendaraan</td>
          <td align="center" id="label_form"><input id="SBKENDARAAN" name="sbkendaraan" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXKENDARAAN" name="prefixkendaraan" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITKENDARAAN" name="digitkendaraan" style="width:80px"
              class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELKENDARAAN"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Pelanggan</td>
          <td align="center" id="label_form"><input id="SBCUSTOMER" name="sbcustomer" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXCUSTOMER" name="prefixcustomer" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITCUSTOMER" name="digitcustomer" style="width:80px"
              class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELCUSTOMER"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Jenis Pemakaian</td>
          <td align="center" id="label_form"><input id="SBJENISPEMAKAIAN" name="sbjenispemakaian"
              class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXJENISPEMAKAIAN" name="prefixjenispemakaian"
              style="width:40px" class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITJENISPEMAKAIAN" name="digitjenispemakaian"
              style="width:80px" class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELJENISPEMAKAIAN"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Currency</td>
          <td align="center" id="label_form"><input id="SBCURRENCY" name="sbcurrency" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXCURRENCY" name="prefixcurrency" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITCURRENCY" name="digitcurrency" style="width:80px"
              class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELCURRENCY"></label></td>
        </tr>
      </table>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(function() {
      tutupLoader();
    });

    async function simpanData() {
      try {
        const data = $('#form_input :input').serializeArray();
        const payload = {};
        for (const item of data) {
          payload[item.name] = item.value;
        }
        console.log(payload);
        // const response = await parent.fetchData(link_api.simpanSettingMaster, payload);

        // if (response.success) {
        //   return true;
        // } else {
        //   throw new Error(response.message || 'Failed to save data.');
        // }
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

    function prev() {
      if (!parent.isTokenExpired()) {
        window.location = "{{ route('atena.master.pengaturan.frame-master-global') }}";
      } else {
        $.messager.alert('Error', "Token tidak valid, silahkan login kembali", 'error');
      }
    }

    async function next() {
      await handleFormSubmit(() => {
        window.location.href = "{{ route('atena.master.pengaturan.frame-master-master') }}";
      });
    }

    async function simpan() {
      await handleFormSubmit(() => {
        $.messager.alert('Info', 'Data berhasil diubah', 'info');
      });
    }
  </script>
@endpush
