@extends('template.form')

@section('content')
  <form id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">

            <input type="hidden" name="mode" id="mode">
            <input type="hidden" name="uuidkaryawan">
            <input type="hidden" name="foto" id="gambar">
            <input type="hidden" id="TGLENTRY" name="tglentry">

            <table>
              <tbody>
                <td>
                  <table style="padding:5px">
                    <tr>
                      <td align="right" id="label_form">NIK</td>
                      <td><input id="kodekaryawan" name="kodekaryawan" style="width:290px" class="label_input">
                        <label id="label_form"><input type="checkbox" id="status" name="status" value="1">
                          Aktif</label>
                      </td>
                    </tr>
                    <tr>
                      <td align="right" id="label_form">User</td>
                      <td>
                        <input name="uuiduser" id="uuiduser" style="width:350px">
                      </td>
                    </tr>
                    <tr>
                      <td align="right" id="label_form">Nama</td>
                      <td><input id="namakaryawan" name="namakaryawan" style="width:350px" class="label_input"
                          required="true" validType='length[0,300]'></td>
                    </tr>
                    <tr>
                      <td align="right" id="label_form">Departemen Kerja</td>
                      <td>
                        <input name="uuiddepartemenkerja" id="uuiddepartemenkerja" style="width:350px" required>
                      </td>
                    </tr>
                    <tr>
                      <td align="right" id="label_form">Supervisor</td>
                      <td>
                        <input name="uuidsupervisor" id="uuidsupervisor" style="width:350px">
                      </td>
                    </tr>
                    <tr>
                      <td align="right" id="label_form">Alamat</td>
                      <td id="label_form"><input name="alamat" style="width:350px" class="label_input"
                          validType='length[0,300]'>
                      </td>
                    </tr>
                    <tr>
                      <td align="right" id="label_form">Kode Pos</td>
                      <td id="label_form">
                        <input name="kodepos" style="width:80px" class="label_input" validType='length[0,100]'>
                        &nbsp; Kota
                        <input name="kota" style="width:232px" class="label_input" validType='length[0,100]'>
                      </td>
                    </tr>
                    <tr>
                      <td align="right" id="label_form">Propinsi</td>
                      <td id="label_form">
                        <input name="propinsi" style="width:160px" class="label_input" validType='length[0,100]'>
                        &nbsp; Negara
                        <input name="negara" style="width:137px" class="label_input" validType='length[0,100]'>
                      </td>
                    </tr>
                    <tr>
                      <td align="right" id="label_form">Email</td>
                      <td><input id="email" name="email" style="width:350px" class="label_input" validType="email"
                          required></td>
                    </tr>
                    <tr>
                      <td align="right" id="label_form">Telp.</td>
                      <td><input name="telp" style="width:350px" class="label_input" validType='length[0,50]'></td>
                    </tr>
                    <tr>
                      <td align="right" id="label_form">HP</td>
                      <td><input name="hp" style="width:350px" class="label_input" validType='length[0,50]'></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top" id="label_form">Catatan</td>
                      <td>
                        <textarea name="catatan" style="width:350px; height:80px" class="label_input" multiline="true"
                          validType='length[0,300]'></textarea>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top">
                  <div style="width:100px; height:100px">
                    <img id="preview-image" style="width:100%; height:100%" />
                  </div>
                  <input id="filegambar" name="filegambar" class="easyui-filebox"
                    data-options="required:false,buttonIcon:'icon-man',buttonText:'Foto'" style="width:100px">
                </td>
              </tbody>
            </table>

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
      </div>
    </div>

    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
      <br>
      <a href="#" title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false"
        id='btn_simpan' onclick="javascript:simpan()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
      <br><br>
      <a href="#" title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
        onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
    </div>
  </form>
@endsection

@push('js')
  <script>
    var row = {};
    let fileGambar = null;
    $(document).ready(async function() {
      browse_data_departemen_kerja('#uuiddepartemenkerja');
      browse_data_supervisor('#uuidsupervisor');
      browse_data_user('#uuiduser');


      @if ($mode == 'tambah')
        tambah();
      @elseif ($mode == 'ubah')
        await ubah();
      @endif

      $('#filegambar').filebox({
        accept: 'image/*',
        onChange: function(newVal, oldVal) {
          var input = $(this).next().find('.textbox-value')[0];
          $('#gambar').val(newVal);

          if (input.files && input.files[0]) {
            fileGambar = input.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
      });
      tutupLoader();
    });

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    function tambah() {
      $('#form_input').form('clear');
      $('#mode').val('tambah');

      $('#status').prop('checked', true);
      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#kodekaryawan').textbox({
        prompt: "",
        readonly: false,
        required: true
      });

      $('#preview-image').attr('src', '{{ asset('assets/foto_user/NO_IMAGE.png') }}');

      $('#kodekaryawan').textbox('clear').textbox('textbox').focus();
    }

    async function ubah() {
      $('#mode').val('ubah');
      $('#uuidkaryawan').val('{{ $data }}');
      try {
        let url = link_api.getHeaderKaryawan;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidkaryawan: '{{ $data }}',
            mode: "ubah",
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })
        if (response.success) {
          row = response.data;
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        $.messager.alert("error", getTextError(error), "error");
        console.log(error);
      }
      if (row) {
        $('#form_input').form('load', row);

        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);
        $('#kodekaryawan').textbox('readonly', true);

        if ((row.foto_full_path ?? "") != '') {
          $('#preview-image').attr('src', row.foto_full_path + '?' +
            new Date().getTime())
        } else {
          $('#preview-image').attr('src', '{{ asset('assets/foto_user/NO_IMAGE.png') }}')
        }
        if (row.uuiddepartemenkerja != "") {
          $('#uuiddepartemenkerja').combogrid('setValue', {
            uuiddepartemenkerja: row.uuiddepartemenkerja,
            nama: row.namadepartemenkerja
          });
        } else {
          $('#uuiddepartemenkerja').combogrid('clear');
        }

        if (row.uuidsupervisor == "") {
          $('#uuidsupervisor').combogrid('clear');
        }


        await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          if (data.data.ubah != 1) {
            $('#btn_simpan').css('filter', 'grayscale(100%)').removeAttr('onclick');
          }
        });
      }
    }

    async function simpan() {
      var isValid = $('#form_input').form('validate');
      const formData = new FormData($('#form_input')[0]);
      if (fileGambar) {
        // backend hanya menerima satu file
        formData.set('filegambar', fileGambar);
      }

      if (isValid) {
        mode = $('[name=mode]').val();
        tampilLoaderSimpan();
        try {
          let headers = {
            'Authorization': 'bearer {{ session('TOKEN') }}',
          };
          let url = link_api.simpanKaryawan;
          const response = await fetch(url, {
            method: 'POST',
            headers: headers,
            // body: requestBody,
            body: formData,
          }).then(response => {
            if (!response.ok) {
              throw new Error(
                `HTTP error! status: ${response.status} from ${url}`);
            }
            return response.json();
          })
          if (response.success) {
            if (mode == 'tambah') {
              fileGambar = null;
              $.messager.alert('Info', 'Simpan Data Sukses', 'info');

              tambah();
            } else {
              //tutup tab dan refresh data di function
              $.messager.alert('Info', 'Transaksi Sukses', 'info');
              await ubah();
            }
          } else {
            $.messager.alert('Error', response.message, 'error');
          }
        } catch (error) {
          $.messager.alert("error", getTextError(error), "error");
        }
        tutupLoaderSimpan();
      }
    }

    function browse_data_user(id) {
      $(id).combogrid({
        panelWidth: 310,
        idField: 'uuiduser',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        url: link_api.browseUser,
        columns: [
          [{
              field: 'uuiduser',
              hidden: true
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 200,
              sortable: true
            }
          ]
        ],
        onSelect: function(index, row) {
          $('#namakaryawan').textbox('setValue', row.nama);
          $('#email').textbox('setValue', row.email);
        }
      });
    }

    function browse_data_departemen_kerja(id) {
      $(id).combogrid({
        panelWidth: 310,
        idField: 'uuiddepartemenkerja',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        url: link_api.browseDataDepartemenKerja,
        columns: [
          [{
              field: 'uuiddepartemenkerja',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 80,
              sortable: true
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 200,
              sortable: true
            }
          ]
        ],
      });
    }

    function browse_data_supervisor(id) {
      $(id).combogrid({
        panelWidth: 310,
        idField: 'uuidkaryawan',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        url: link_api.browseKaryawan,
        columns: [
          [{
              field: 'uuidkaryawan',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 80,
              sortable: true
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 200,
              sortable: true
            }
          ]
        ],
      });
    }
  </script>
@endpush
