@extends('template.form')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome/all.min.css') }}" />
@endpush

@section('content')
  <div style="height: 100%;overflow:hidden;margin-left:25px;margin-right:25px">
    <div style="height:30px;background-color:white;">
      <label class="font-header-menu">Data Perusahaan</label>
      <div align="right" valign="top">
        <p>Proses 1 dari 10</p>
        @if (!$issignup)
          <a class="easyui-linkbutton" onclick="javascript:simpan()"><i class="fa fa-save"></i> Simpan</a>
        @endif
        <a class="easyui-linkbutton" onclick="javascript:next()"><i class="far fa-circle-right"></i> Simpan dan
          Lanjut</a>
      </div>
    </div>
    <div id="form_input" style="width:100%;height:100%">
      <input type="hidden" name="mode" id="mode">
      <input type="hidden" name="idperusahaan" id="IDPERUSAHAAN">

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
            <input id="NAMAPERUSAHAAN" name="namaperusahaan" style="width:300px" class="label_input" required="true"
              validType='length[0,300]'>

            @if (!$issignup)
              <input type="checkbox" name="prosesopname" id="prosesopname" value="1"> Proses Opname
            @endif
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">Alamat</td>
          <td id="label_form"><input id="ALAMAT" name="alamat" style="width:400px" class="label_input"
              validType='length[0,300]'>
            &nbsp;&nbsp; Kode Pos
            <input id="KODEPOS" name="kodepos" style="width:122px" class="label_input" validType='length[0,100]'>
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kota</td>
          <td id="label_form">
            <input id="KOTA" name="kota" style="width:180px" class="label_input" validType='length[0,100]'>
            &nbsp;&nbsp;Propinsi
            <input id="PROPINSI" name="propinsi" style="width:150px" class="label_input" validType='length[0,100]'>
            &nbsp;&nbsp;Negara
            <input id="NEGARA" name="negara" style="width:150px" class="label_input" validType='length[0,100]'>
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">Telp/HP</td>
          <td><input id="TELP" name="telp" style="width:250px" class="label_input" validType='length[0,50]'></td>
        </tr>
        <tr>
          <td align="right" id="label_form">NPWP</td>
          <td><input id="NPWP" name="npwp" style="width:250px" class="label_input" validType='length[0,50]'></td>
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
            <input class="date" name="tglawaltrans" id="tglawaltrans" required>
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form" valign="top">Stok Dapat Minus</td>
          <td id="label_form">
            <input type="checkbox" name="stokminus" id="stokminus" value="1"> YA
            @if (!$issignup)
              <br>
              <div style="padding: 5px; background-color: #fbb4b4">Setelah mengubah pengaturan "Stok Dapat Minus", segera
                lakukan login ulang untuk seluruh user.</div>
            @endif
          </td>
        </tr>
        <tr>
          <td align="right" valign="top" id="label_form">Informasi Rekening</td>
          <td>
            <textarea id="INFORMASIREKENING" name="informasirekening" style="width:350px; height:80px" class="label_input"
              multiline="true" validType='length[0,500]'></textarea>
          </td>
        </tr>

        <tr>
          <td align="right" valign="top" id="label_form">Catatan</td>
          <td>
            <textarea id="CATATAN" name="catatan" style="width:350px; height:80px" class="label_input" multiline="true"
              validType='length[0,300]'></textarea>
          </td>
        </tr>
        <tr>
          <td></td>
        </tr>
      </table>
      <hr>
      <label style="font-weight:normal" id="label_form">User Input :</label> <label id="lbl_kasir"></label>
      <label style="font-weight:normal" id="label_form">| Tgl Input :</label> <label id="lbl_tanggal"></label>
    </div>
  </div>
@endsection

@push('js')
  <script type="text/javascript" src="{{ asset('assets/js/globalvariable.js') }}"></script>
  <script>
    const token = '{{ session('TOKEN') }}';
    let row = {};
    const issignup = '{{ $issignup }}';
    $(function() {
      $('#mask-loader').fadeOut(500, function() {
        $(this).hide()
      })
      $("#tglawaltrans").datebox('setValue', '');
      $("#mode").val('{{ $issignup ? 'signup' : 'ubah' }}');
      if (!issignup) {
        getDataConfig();
      }
    })

    async function fetchWithRetry(url, options, maxRetries = 3) {
      let retries = 0;
      while (retries < maxRetries) {
        try {
          const response = await fetch(url, options);
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return await response.json();
        } catch (error) {
          console.error(`Attempt ${retries + 1} failed for ${url}:`, error);
          retries++;
          if (retries >= maxRetries) {
            throw new Error(`Failed to fetch ${url} after ${maxRetries} retries.`);
          }
          await new Promise(resolve => setTimeout(resolve, 1000 * retries));
        }
      }
    }

    async function getDataConfig() {
      const uuidperusahaan = "{{ session('IDPERUSAHAAN') }}";

      const urls = [
        link_api.getDetailPerusahaan,
        link_api.getConfigGlobal,
      ];

      const requestOptions = {
        method: 'POST',
        headers: {
          'authorization': `bearer ${token}`,
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          "uuidperusahaan": uuidperusahaan
        }),
      };

      const promises = urls.map(url => fetchWithRetry(url, requestOptions));

      try {
        const [resDetail, resGlobal] = await Promise.all(promises);
        const row = {};

        if (resDetail && resDetail.success) {
          const data = resDetail.data;
          Object.assign(row, {
            idperusahaan: data.uuidperusahaan,
            kodeperusahaan: data.kodeperusahaan,
            namaperusahaan: data.namaperusahaan,
            alamat: data.alamat,
            kota: data.kota,
            propinsi: data.propinsi,
            negara: data.negara,
            kodepos: data.kodepos,
            telp: data.telp,
            npwp: data.npwp,
            informasirekening: data.informasirekening,
            catatan: data.catatan,
            prosesopname: data.prosesopname,
            userentry: data.userentry,
            tglentry: data.tglentry
          });
        } else {
          console.error('Failed to get company details.');
        }

        if (resGlobal && resGlobal.success) {
          const data = resGlobal.data.config;
          Object.assign(row, {
            jenishitunghpp: data.find(item => item.config === 'JENISHITUNGHPP')?.value,
            metodehitunghpp: data.find(item => item.config === 'METODEHITUNGHPP')?.value,
            stokminus: data.find(item => item.config === 'CEKMINUS')?.value == 'TIDAK' ? true : false,
            tglawaltrans: data.find(item => item.config === 'TGLAWALTRANS')?.value,
          });
        } else {
          console.error('Failed to get global config.');
        }

        console.log(row);
        $("#form_input").form("load", row);
      } catch (error) {
        console.error('An error occurred during data fetching:', error);
      }
    }

    function simpan() {
      if (isTokenExpired()) {
        $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
        return;
      }
      var isValid = $('#form_input').form('validate');
      mode = $('[name=mode]').val();
      $.ajax({
        type: 'POST',
        url: base_url + 'atena/Master/Data/Perusahaan/simpan',
        data: $('#form_input :input').serialize(),
        dataType: 'json',
        beforeSend: function() {
          $.messager.progress();
        },
        success: function(msg) {
          $.messager.progress('close');
          if (msg.success) {
            $.messager.show({
              title: 'Info',
              msg: 'Data Berhasil Diubah',
              showType: 'show'
            });
          } else {
            $.messager.alert('Error', msg.errorMsg, 'error');
          }
        }
      });
    }

    function next() {
      if (isTokenExpired()) {
        $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
        return;
      }
      var isValid = $('#form_input').form('validate');
    }

    function isTokenExpired() {
      if (!token) {
        return true;
      }

      try {
        const payloadBase64 = token.split('.')[1];
        const decodedPayload = atob(payloadBase64);
        const payload = JSON.parse(decodedPayload);

        const expirationTime = payload.exp;
        const currentTime = Math.floor(Date.now() / 1000);

        return expirationTime < currentTime;
      } catch (e) {
        console.error('Gagal mendekode token JWT:', e);
        return true;
      }
    }
  </script>
@endpush
