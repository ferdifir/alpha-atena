@extends('template.form')

@section('content')
  <div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            <input type="hidden" name="mode" id="mode">
            <input type="hidden" name="uuidekspedisi" id="UUIDEKSPEDISI">
            <div class="easyui-tabs" data-options="border:false" style="width:100%;height:340px;" plain='true'>
              <div title="Ekspedisi Information">
                <table style="padding:5px">
                  <tr>
                    <td align="right" id="label_form">Kode</td>
                    <td><input id="KODEEKSPEDISI" name="kodeekspedisi" style="width:349px" class="label_input">
                      <label id="label_form"><input type="checkbox" id="STATUS" name="status" value="1">
                        Aktif</label>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Nama</td>
                    <td id="label_form">
                      <input id="BADANUSAHA" name="badanusaha" style="width:110px" prompt="BADAN USAHA">
                      <input name="namaekspedisi" style="width:287px" class="label_input" required="true"
                        validType='length[0,300]'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Alamat</td>
                    <td id="label_form"><input name="alamat" style="width:400px" class="label_input"
                        validType='length[0,300]'>
                      &nbsp;&nbsp; Kode Pos
                      <input name="kodepos" style="width:150px" class="label_input" validType='length[0,100]'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Kota</td>
                    <td id="label_form">
                      <input name="kota" style="width:180px" class="label_input" validType='length[0,100]'>
                      &nbsp;&nbsp;Propinsi
                      <input name="propinsi" style="width:166px" class="label_input" validType='length[0,100]'>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Negara
                      <input name="negara" style="width:150px" class="label_input" validType='length[0,100]'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Telp/HP</td>
                    <td><input name="telp" style="width:400px" class="label_input" validType='length[0,50]'></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Fax</td>
                    <td><input name="fax" style="width:400px" class="label_input" validType='length[0,50]'></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">E-mail</td>
                    <td><input name="email" style="width:400px" class="label_input" validType="email"></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Website</td>
                    <td><input name="website" style="width:400px" class="label_input" validType='url'></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" id="label_form">Catatan</td>
                    <td>
                      <textarea name="catatan" style="width:400px; height:80px" class="label_input" multiline="true"
                        validType='length[0,300]'></textarea>
                    </td>
                  </tr>
                </table>
              </div>
              <div title="Contact Person">
                <table style="padding:5px">
                  <tr>
                    <td align="right" id="label_form">Nama</td>
                    <td><input name="contactperson" style="width:250px" class="label_input" validType='length[0,50]'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Telp</td>
                    <td><input name="telpcp" style="width:250px" class="label_input" validType='length[0,50]'></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">E-mail</td>
                    <td><input name="emailcp" style="width:250px" class="label_input" validType="email"></td>
                  </tr>
                </table>
              </div>
            </div>
            <div id="dlg-buttons" style="position: fixed;bottom:0;background-color: white;width:100%;">
              <table cellpadding="0" cellspacing="0">
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
      </div>
    </div>
    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
      <br>
      <a title="Simpan" class="easyui-tooltip "iconCls="" data-options="plain:false" id='btn_simpan'
        onclick="javascript:simpan()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
      <br><br>
      <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
        onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
    </div>
  </div>

  <div id="verify">
    <table style="padding:5px">
      <tr>
        <td align="right" id="label_form">User Verification</td>
        <td><input class="label_input" name="verifyuser" id="VERIFYUSER" style="width:100%;height:40px;padding:12px"
            data-options="prompt:'User ID',iconCls:'icon-man',iconWidth:38,fontTransform:'normal'"></td>
      </tr>
    </table>
  </div>
  <div id="verify-buttons">
    <table cellpadding="0" cellspacing="0" style="width:100%">
      <tr>
        <td style="text-align:right">
          <a class="easyui-linkbutton" iconCls="icon-save" id='btn_verify' onclick="javascript:verify()">Verify</a>
        </td>
      </tr>
    </table>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      $("#verify").dialog({
        onOpen: function() {
          $('#verify').form('clear');
        },
        buttons: '#verify-buttons'
      }).dialog('close');

      $('[name=badanusaha]').combogrid({
        required: true,
        panelWidth: 120,
        mode: 'remote',
        idField: 'badanusaha',
        textField: 'badanusaha',
        sortName: 'badanusaha',
        sortOrder: 'asc',
        url: link_api.browseBadanUsahaEkspedisi,
        columns: [
          [{
            field: 'badanusaha',
            title: 'Badan Usaha',
            width: 100
          }, ]
        ]
      });

      if ("{{ $mode }}" == "tambah") {
        tambah();
      } else if ("{{ $mode }}" == "ubah") {
        ubah();
      }
    })

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    async function tambah() {
      $('#form_input').form('clear');
      $('#mode').val('tambah');

      $('#STATUS').prop('checked', true);
      $('#lbl_kasir, #lbl_tanggal').html('');
      const response = await fetchData(link_api.getConfig, {
        modul: 'MEKSPEDISI',
        config: 'KODEEKSPEDISI',
      });
      if (response.data.value == 'AUTO') {
        $('#KODEEKSPEDISI').textbox({
          prompt: "Auto Generate",
          readonly: true,
          required: false
        });
      } else {
        $('#KODEEKSPEDISI').textbox({
          prompt: "",
          readonly: false,
          required: true
        });
        $('#KODEEKSPEDISI').textbox('clear').textbox('textbox').focus();
      }
      tutupLoader();
    }

    async function fetchData(url, body) {
      try {
        const token = '{{ session('TOKEN') }}';
        let headers = {
          'Authorization': 'bearer ' + token,
        };
        let requestBody = null;

        // Cek apakah body adalah instance dari FormData
        if (body instanceof FormData) {
          // Jika FormData, jangan set 'Content-Type'. Browser akan melakukannya secara otomatis.
          requestBody = body;
        } else {
          // Default: Jika bukan FormData, asumsikan itu JSON.
          headers['Content-Type'] = 'application/json';
          requestBody = body ? JSON.stringify(body) : null;
        }

        const response = await fetch(url, {
          method: 'POST',
          headers: headers,
          body: requestBody,
        });

        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();
        return data;
      } catch (error) {
        console.error("Terjadi kesalahan:", error);
        throw error; // Melemparkan kembali error agar bisa ditangkap oleh pemanggil
      }
    }

    async function ubah() {
      $('#mode').val('ubah');

      try {
        const response = await fetchData(link_api.headerFormEkspedisi, {
          uuidekspedisi: '{{ $data }}'
        })
        tutupLoader()
        if (response.success) {
          const row = response.data;
          if (row) {
            $('#form_input').form('load', row);

            $('#lbl_kasir').html(row.userbuat);
            $('#lbl_tanggal').html(row.tglentry);
            $('#KODEEKSPEDISI').textbox('readonly', true);

            get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
              if (data.data.ubah != 1) {
                $('#btn_simpan').css('filter', 'grayscale(100%)').removeAttr('onclick');
              }
            });
          }
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        $.messager.alert('Error', 'Terdapat kesalahan ketika mengambil data ekspedisi, silahkan muat ulang laman',
          'error');
      }
    }

    async function simpan() {
      var isValid = $('#form_input').form('validate');

      if (isValid && !isTokenExpired()) {
        mode = $('[name=mode]').val();
        try {
          tampilLoaderSimpan();
          const data = $('#form_input :input').serializeArray();
          const form = new FormData();
          for (const item of data) {
            form.append(item.name, item.value);
          }
          const response = await fetchData(link_api.simpanEkspedisi, form);
          tutupLoaderSimpan()
          if (response.success) {
            $.messager.alert('Info', 'Simpan Data Sukses', 'info');
            if (mode == 'tambah') {
              tambah();
            }
          } else {
            $.messager.alert('Error', response.message, 'error');
          }
        } catch (e) {
          tutupLoaderSimpan();
          $.messager.alert('Error', 'Terdapat kesalahan ketika menyimpan ekspedisi', 'error');
        }
      }
    }

    function isTokenExpired() {
      const token = '{{ session('TOKEN') }}';
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
