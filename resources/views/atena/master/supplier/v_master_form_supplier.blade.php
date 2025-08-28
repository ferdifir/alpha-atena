@extends('template.form')

@section('content')
  <div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            <input type="hidden" name="mode" id="mode">
            <input type="hidden" name="uuidsupplier">
            <div class="easyui-tabs" data-options="border:false" plain='true'>
              <div title="Supplier Information">
                <table style="padding:5px">
                  <tr>
                    <td align="right" id="label_form">Kode</td>
                    <td><input id="KODESUPPLIER" name="kodesupplier" style="width:347px" class="label_input">
                      <label id="label_form"><input type="checkbox" id="STATUS" name="status" value="1">
                        Aktif</label>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Nama</td>
                    <td id="label_form">
                      <input id="BADANUSAHA" name="badanusaha" style="width:100px" prompt="BADAN USAHA">
                      <input name="namasupplier" style="width:297px" class="label_input" required="true"
                        validType='length[0,300]'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Alamat</td>
                    <td id="label_form"><input name="alamat" style="width:400px" class="label_input"
                        validType='length[0,300]'>
                      &nbsp;&nbsp;Kode Pos
                      <input name="kodepos" style="width:120px" class="label_input" validType='length[0,300]'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Kota</td>
                    <td id="label_form">
                      <input name="kota" style="width:180px" class="label_input" validType='length[0,100]'>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Propinsi
                      <input name="propinsi" style="width:150px" class="label_input" validType='length[0,100]'>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Negara
                      <input name="negara" style="width:120px" class="label_input" validType='length[0,100]'>
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
                    <td align="right" id="label_form">Password</td>
                    <td><input name="password" type="password" style="width:400px" class="label_input"
                        data-options="fontTransform:'normal'"></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Konfirmasi Password</td>
                    <td><input id="KONFIRMASIPASSWORD" name="konfirmasipassword" type="password" style="width:400px"
                        class="label_input" data-options="fontTransform:'normal'"></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Website</td>
                    <td><input name="website" style="width:400px" class="label_input" validType='url'></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Syarat Bayar</td>
                    <td id="label_form"><input name="uuidsyaratbayar" style="width:180px">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NPWP
                      <input name="npwp" style="width:150px" class="label_input" validType='length[0,20]'>
                    </td>
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
              <div title="Informasi Bank">
                <table style="padding:5px" id="label_form">
                  <tr>
                    <td style="width:120px" align="right" id="label_form">Nama Bank</td>
                    <td><input name="namabank" style="width:250px" class="label_input" validType='length[0,100]'></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">No. Rekening</td>
                    <td><input name="norekening" style="width:250px" class="label_input" validType='length[0,50]'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Nama Beneficiary</td>
                    <td><input name="namabeneficiary" style="width:250px" class="label_input"
                        validType='length[0,100]'></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Swift Code</td>
                    <td><input name="swiftcode" style="width:250px" class="label_input" validType='length[0,50]'></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Alamat Bank</td>
                    <td><input name="alamatbank" style="width:250px" class="label_input" validType='length[0,300]'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Negara Bank</td>
                    <td><input name="negarabank" style="width:250px" class="label_input" validType='length[0,50]'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">No. Routing</td>
                    <td><input name="nomorrouting" style="width:250px" class="label_input" validType='length[0,50]'>
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
              <div title="Informasi Hutang">
                <div style="height: 300px">
                  <table id="table_data_riwayat_hutang" style="height: 300px"></table>
                </div>
              </div>
            </div>
            <div id="dlg-buttons" style="position: fixed;bottom:0;background-color: white;width:100%;">
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
@endsection

@push('js')
  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extra/plugins/jquery.datagrid-detailview.js') }}">
  </script>
  <script type="text/javascript" src="{{ asset('assets/js/jquery.mask.js') }}"></script>
  <script>
    $(document).ready(function() {
      buat_table_informasi_hutang();

      //   <?php
      // 	if (!$FITURINFORASIHUTANGSUPPLIER) {
      //
      ?>
      //   $('#tabs').tabs('disableTab', 3);
      //   <?php
      // 	}
      //
      ?>

      $('[name=uuidsyaratbayar]').combogrid({
        required: true,
        panelWidth: 200,
        mode: 'local',
        idField: 'uuidsyaratbayar',
        textField: 'nama',
        sortName: 'kode',
        sortOrder: 'asc',
        url: link_api.browseSyaratBayar,
        columns: [
          [{
              field: 'nama',
              title: 'Keterangan',
              width: 100
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 80
            },
            {
              field: 'uuidsyaratbayar',
              hidden: true
            }
          ]
        ]
      });

      $('#BADANUSAHA').combogrid({
        panelWidth: 120,
        mode: 'remote',
        idField: 'badanusaha',
        textField: 'badanusaha',
        sortName: 'badanusaha',
        sortOrder: 'asc',
        url: link_api.browseBadanUsaha,
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

    function tambah() {
      $('#form_input').form('clear');
      $('#mode').val('tambah');
      $('#STATUS').prop('checked', true);
      $('#lbl_kasir, #lbl_tanggal').html('');
      fetchData(
        link_api.getConfig, {
          modul: 'MSUPPLIER',
          config: 'KODESUPPLIER',
        }).then((res) => {
        tutupLoader()
        if (res.success) {
          if (res.data.value == 'AUTO') {
            $('#KODESUPPLIER').textbox({
              prompt: "Auto Generate",
              readonly: true,
              required: false
            });
          } else {
            $('#KODESUPPLIER').textbox({
              prompt: "",
              readonly: false,
              required: true
            });
            $('#KODESUPPLIER').textbox('clear').textbox('textbox').focus();
          }
        }
      })
    }

    async function ubah() {
      $('#mode').val('ubah');
      try {
        const response = await fetchData(link_api.headerFormSupplier, {
          uuidsupplier: '{{ $data }}'
        })
        tutupLoader()
        if (response.success) {
          const row = response.data.row;
          $('#form_input').form('load', row);

          $('[name=mode]').val('ubah');

          $('#lbl_kasir').html(row.userbuat);
          $('#lbl_tanggal').html(row.tglentry);
          $('#KODESUPPLIER').textbox('readonly', true);

          $('#KONFIRMASIPASSWORD').textbox('setValue', row.password);
          get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
            if (data.data.ubah != 1) {
              $('#btn_simpan').css('filter', 'grayscale(100%)').removeAttr('onclick');
            }
          });

          load_data_hutang_belum_lunas(row.uuidsupplier);
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        console.log(error);
        tutupLoader();
        const e = (typeof error === 'string') ? error : error.message;
        var textError = getTextError(e);
        $.messager.alert('Error', textError, 'error');
      }
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
          const response = await fetchData(link_api.simpanSupplier, form);
          tutupLoaderSimpan()
          if (response.success) {
            $.messager.alert('Info', 'Simpan Data Sukses', 'info');
            if (mode == 'tambah') {
              tambah();
            }
          } else {
            $.messager.alert('Error', response.message, 'error');
          }
        } catch (error) {
          console.log(error)
          tutupLoaderSimpan();
          const e = (typeof error === 'string') ? error : error.message;
          var textError = getTextError(e);
          $.messager.alert('Error', textError, 'error');
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

    function buat_table_informasi_hutang() {
      $('#table_data_riwayat_hutang').datagrid({
        rownumbers: true,
        fit: true,
        singleSelect: true,
        height: 300,
        columns: [
          [{
              field: 'tgltrans',
              title: 'Tgl Trans',
              align: 'center',
              width: 85,
            },
            {
              field: 'tgljatuhtempo',
              title: 'Jatuh Tempo',
              align: 'center',
              width: 80,
            },
            {
              field: 'tglpelunasan',
              title: 'Tgl. Bayar Terakhir',
              align: 'center',
              width: 100,
            },
            {
              field: 'kodetrans',
              title: 'No. Trans.',
              width: 150,
              align: 'center'
            },
            {
              field: 'total',
              title: 'Total',
              align: 'right',
              width: 95,
              formatter: format_amount
            },
            {
              field: 'grandtotal',
              title: 'Grand Total',
              align: 'right',
              width: 95,
              formatter: format_amount
            },
            {
              field: 'pelunasan',
              title: 'Pelunasan',
              align: 'right',
              width: 95,
              formatter: format_amount
            },
            {
              field: 'saldonota',
              title: 'Saldo Nota',
              align: 'right',
              width: 95,
              formatter: format_amount
            },
          ]
        ],
        rowStyler: function(index, row) {
          if (getTodayDateFormatted() > row.tgljatuhtempo) {
            return `background-color: {{ session('WARNA_STATUS_D') }}`;
          }
        },
      });
    }

    async function load_data_hutang_belum_lunas(uuidsupplier) {
      try {
        const form = new FormData();
        form.append('uuidsupplier', uuidsupplier);
        console.log('UUID Supplier', uuidsupplier);
        const response = await fetchData(link_api.getHutangBelumLunas, form);
        if (response.success) {
          $('#table_data_riwayat_hutang').datagrid('loadData', response.data);
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        console.log(error);
        const e = (typeof error === 'string') ? error : error.message;
        var textError = getTextError(e);
        $.messager.alert('Error', textError, 'error');
      }
    }

    function getTodayDateFormatted() {
      const today = new Date();
      const year = today.getFullYear();
      const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed, so add 1
      const day = String(today.getDate()).padStart(2, '0');

      return `${year}-${month}-${day}`;
    }
  </script>
@endpush
