@extends('template.form')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome/all.min.css') }}" />
@endpush

@section('content')
  <div style="height: 100%;overflow:hidden;margin-left:25px;margin-right:25px">
    <div style="height:40px;background-color:white;">
      <label class="font-header-menu">Data Perusahaan</label>
      <div align="right" valign="top">
        <p>Proses 1 dari 10</p>
        {{-- signup condition --}}
        <a class="easyui-linkbutton" onclick="javascript:simpan()"><i class="fa fa-save"></i> Simpan</a>
        {{-- end signup condition --}}
        <a class="easyui-linkbutton" onclick="javascript:next()"><i class="far fa-arrow-alt-circle-right"></i> Simpan dan
          Lanjut</a>
      </div>
    </div>
    <div id="form_input" style="width:100%;height:100%">
      <input type="hidden" name="mode" id="mode">
      <input type="hidden" name="uuidperusahaan" id="IDPERUSAHAAN">

      <table style="padding:5px">
        <tr hidden>
          <td align="right" id="label_form">Kode</td>
          <td>
            <input id="KODEPERUSAHAAN" name="kodeperusahaan" style="width:130px" class="label_input">
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">Nama</td>
          <td id="label_form">
            <input id="NAMAPERUSAHAAN" name="namaperusahaan" style="width:294px" class="label_input" required="true"
              validType='length[0,300]'>
            {{-- signup condition --}}
            <input type="checkbox" name="prosesopname" id="prosesopname" value="1"> Proses Opname
            {{-- end signup condition --}}
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">Alamat</td>
          <td id="label_form"><input id="ALAMAT" name="alamat" style="width:400px" class="label_input"
              validType='length[0,300]'>
            &nbsp;&nbsp; Kode Pos
            <input id="KODEPOS" name="kodepos" style="width:150px" class="label_input" validType='length[0,100]'>
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kota</td>
          <td id="label_form">
            <input id="KOTA" name="kota" style="width:180px" class="label_input" validType='length[0,100]'>
            &nbsp;&nbsp;&nbsp;&nbsp;Propinsi
            <input id="PROPINSI" name="propinsi" style="width:160px" class="label_input" validType='length[0,100]'>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Negara
            <input id="NEGARA" name="negara" style="width:150px" class="label_input" validType='length[0,100]'>
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">Telp/HP</td>
          <td><input id="TELP" name="telp" style="width:400px" class="label_input" validType='length[0,50]'></td>
        </tr>
        <tr>
          <td align="right" id="label_form">NPWP</td>
          <td><input id="NPWP" name="npwp" style="width:400px" class="label_input" validType='length[0,50]'></td>
        </tr>
        <tr hidden>
          <td align="right" id="label_form" valign="top">Perhitungan HPP</td>
          <td id="label_form">
            <input type="radio" name="jenishitunghpp" id="closing" value="CLOSING"> Closing Period
            <input type="radio" name="jenishitunghpp" id="perpetual" value="PERPETUAL"> Perpetual
          </td>
        </tr>
        <tr hidden>
          <td align="right" id="label_form" valign="top">Metode Hitung HPP</td>
          <td id="label_form">
            <input type="radio" name="metodehitunghpp" id="fifo" value="FIFO"> FIFO
            <input type="radio" name="metodehitunghpp" id="lifo" value="LIFO"> LIFO
            <input type="radio" name="metodehitunghpp" id="average" value="AVERAGE"> Average
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form" valign="top">Tanggal Awal Transaksi</td>
          <td id="label_form">
            <input class="date" name="tglawaltrans" id="tglawaltrans" required style="width:400px">
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form" valign="top">Stok Dapat Minus</td>
          <td id="label_form">
            <input type="checkbox" name="stokminus" id="stokminus" value="1"> YA
            {{-- signup condition --}}
            <br>
            <div style="padding: 5px; background-color: #fbb4b4">Setelah mengubah pengaturan "Stok Dapat Minus", segera
              lakukan login ulang untuk seluruh user.</div>
            {{-- end signup condition --}}
          </td>
        </tr>
        <tr>
          <td align="right" valign="top" id="label_form">Informasi Rekening</td>
          <td>
            <textarea id="INFORMASIREKENING" name="informasirekening" style="width:400px; height:80px" class="label_input"
              multiline="true" validType='length[0,500]'></textarea>
          </td>
        </tr>

        <tr>
          <td align="right" valign="top" id="label_form">Catatan</td>
          <td>
            <textarea id="CATATAN" name="catatan" style="width:400px; height:80px" class="label_input" multiline="true"
              validType='length[0,300]'></textarea>
          </td>
        </tr>
        <tr>
          <td></td>
        </tr>
      </table>
      {{-- <hr>
      <label style="font-weight:normal" id="label_form">User Input :</label> <label id="lbl_kasir"></label>
      <label style="font-weight:normal" id="label_form">| Tgl Input :</label> <label id="lbl_tanggal"></label> --}}
      <div style="position: fixed;bottom:0;background-color: white;width:100%;">
        <table cellpadding="0" cellspacing="0" style="width:100%">
          <tr>
            <td align="left" id="label_form">
              <label style="font-weight:normal" id="label_form">User Input :</label>
              <label id="lbl_kasir"></label>
              <label style="font-weight:normal" id="label_form">| Tgl Input :</label>
              <label id="lbl_tanggal"></label>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(function() {
      $("#tglawaltrans").datebox('setValue', '');
      $("#mode").val('ubah'); // signup condition
      getDataPerusahaan();
    });

    async function getDataPerusahaan() {
      try {
        const response = await parent.fetchData(link_api.loadSettingPerusahaan, null);
        if (response.success) {
          const row = response.data;
          $("#form_input").form("load", row);
          $("#lbl_kasir").html(row.userentry);
          $("#lbl_tanggal").html(row.tglentry);
          if (row.jenishitunghpp == 'PERPETUAL') {
            $('#perpetual').prop('checked', true);
            $('[name="metodehitunghpp"]').prop('disabled', false);
            $('#stokminus').prop('checked', false).prop('disabled', true);
          } else if (row.jenishitunghpp == 'CLOSING') {
            $('#closing').prop('checked', true);
            $('[name="metodehitunghpp"]').prop('disabled', true);
            $('#stokminus').prop('disabled', false);
          }

          if (row.metodehitunghpp == 'FIFO') {
            $('#fifo').prop('checked', true);
          } else if (row.metodehitunghpp == 'LIFO') {
            $('#lifo').prop('checked', true);
          } else if (row.metodehitunghpp == 'AVERAGE') {
            $('#average').prop('checked', true);
          }

          $('#prosesopname').prop('checked', row.prosesopname == 1);
          $('#stokminus').prop('checked', row.stokminus == 1);
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

    async function simpanData() {
      try {
        const data = $('#form_input :input').serializeArray();
        const payload = {};
        for (const item of data) {
          payload[item.name] = item.value;
        }
        const response = await parent.fetchData(link_api.simpanSettingPerusahaan, payload);

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
        window.location.href = "{{ route('atena.master.pengaturan.frame-master-global') }}";
      });
    }

  </script>
@endpush
