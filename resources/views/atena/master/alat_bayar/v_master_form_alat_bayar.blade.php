@extends('template.form')

@section('content')
  <div class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            <form id="form_input" enctype="multipart/form-data">
              <input type="hidden" name="mode" id="mode">
              <input type="hidden" name="uuidalatbayar">
              <input type="hidden" name="gambar" id="gambar">
              <input type="hidden" id="TGLENTRY" name="tglentry">
              <table style="padding:5px" id="label_form">
                <tr>
                  <td align="right" id="label_form">Kode</td>
                  <td colspan="2"><input id="KODEALATBAYAR" name="kodealatbayar" style="width:290px"
                      class="label_input">
                    <label id="label_form"><input type="checkbox" id="STATUS" name="status" value="1">
                      Aktif</label>
                  </td>
                  <td align="right" rowspan = "5">
                    <div style="width:100px; height:100px;">
                      <img id="preview-image" style="width:100%; height:100%;cursor:pointer" onclick="previewGambar()" />
                    </div>
                    <input id="FILEGAMBAR" name="filegambar" class="easyui-filebox"
                      data-options="required:false,buttonText:'Gambar'" style="width:100px">
                  </td>
                </tr>
                <tr>
                  <td align="right" id="label_form">Nama</td>
                  <td colspan="2"><input name="namaalatbayar" style="width:350px" class="label_input" required="true"
                      validType='length[0,100]'></td>
                </tr>
                <tr>
                  <td align="right" id="label_form">Akun Kas/Bank</td>
                  <td colspan="2"><input id="UUIDPERKIRAANKAS" name="uuidperkiraankas" style="width:350px">
                  </td>
                </tr>
                <tr>
                  <td align="right" id="label_form">Minimal Grandtotal</td>
                  <td colspan="2"><input id="MINIMALGRANDTOTAL" name="minimalgrandtotal" style="width:350px"
                      class="number" required="true"></td>
                </tr>
                <tr>
                  <td align="right" id="label_form">Urutan</td>
                  <td colspan="2"><input id="URUTAN" name="urutan" style="width:350px" class="easyui-numberspinner"
                      required="true" min='0'></td>
                </tr>
                <tr>
                  <td align="right" id="label_form" valign="top">Catatan</td>
                  <td colspan="2">
                    <textarea name="catatan" style="width:350px; height:50px" class="label_input" multiline="true"
                      validType='length[0,300]'></textarea>
                  </td>
                </tr>
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
            </form>
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
  </div>
@endsection

@push('js')
  <script>
    var row = {};
    var config = {};
    $(document).ready(async function() {
      browse_data_kas_bank('#UUIDPERKIRAANKAS', 'kas_bank');
      bukaLoader();
      let check = false;
      await getConfig('KODEALATBAYAR', 'MALATBAYAR', 'bearer {{ session('TOKEN') }}',
        function(response) {
          if (response.success) {
            config = response.data;
            check = true;
          } else {
            if ((response.message ?? "").toLowerCase() == tokenTidakValid) {
              $.messager.alert('Error', "Sesi login telah habis. Silahkan logout dan login kembali", 'error');
            } else {
              $.messager.alert('Error', error, 'error');
            }
          }
        },
        function(error) {
          $.messager.alert('Error', "Request Config Error", 'error');
        });
      if (!check) return;
      @if ($mode == 'tambah')
        await tambah();
      @elseif ($mode == 'ubah')
        await ubah();
      @endif


      $('#FILEGAMBAR').filebox({
        accept: 'image/*',
        onChange: function(newVal, oldVal) {
          var input = $(this).next().find('.textbox-value')[0];
          $('#gambar').val(newVal);

          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#preview-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
          }
        }
      });

      tutupLoader();

    })

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    async function tambah() {
      bukaLoader();
      let check = false;
      try {
        let url = link_api.setUrutanAlatBayar;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
        }).then(response => {
          if (!response.ok) {
            throw new Error(
              `HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })

        if (response.success) {
          $("#URUTAN").numberspinner('setValue', parseInt(response.data.urutanterakhir) + 1);
          check = true;
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
      }
      tutupLoader();
      if (!check) return;

      $('#form_input').form('clear');

      $('#mode').val('tambah');

      $('#STATUS').prop('checked', true);
      $('#lbl_kasir, #lbl_tanggal').html('');
      if (config.value == "AUTO") {
        $('#KODEALATBAYAR').textbox({
          prompt: "Auto Generate",
          readonly: true,
          required: false
        });
      } else {
        $('#KODEALATBAYAR').textbox({
          prompt: "",
          readonly: false,
          required: true
        });
        $('#KODEALATBAYAR').textbox('clear').textbox('textbox').focus();
      }
      $('#FILEGAMBAR').filebox('clear');
      $('#preview-image').attr('src', '{{ asset('assets/foto_barang/NO_IMAGE.jpg') }}');
    }

    async function ubah() {
      try {
        let url = link_api.getHeaderAlatBayar;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidalatbayar: '{{ $data }}',
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
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
      }
      if (row) {
        $('#form_input').form('load', row);

        $('[name=mode]').val('ubah');

        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);
        $('#KODEALATBAYAR').textbox('readonly', true);

        $('#MINIMALGRANDTOTAL').numberbox('setValue', row.amount);

        $('#UUIDPERKIRAANKAS').combogrid('setValue', row.uuidperkiraan);

        // load gambar
        var gambar = row.gambar_full_path;

        if (gambar) {
          $('#preview-image').attr('src', gambar);
        } else {
          $('#preview-image').attr('src', base_url + 'assets/foto_alatbayar/NO_IMAGE.jpg');
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

      if (isValid) {
        tampilLoaderSimpan();
        const body = new FormData($('#form_input')[0]);

        var mode = '{{ $mode }}';
        try {
          let headers = {
            'Authorization': 'bearer {{ session('TOKEN') }}',
          };
          let requestBody = null;
          var unindexed_array = $('#form_input :input').serializeArray();

          // var body = {};
          // $.map(unindexed_array, function(n, i) {
          //     body[n['name']] = n['value'];
          // });
          // Cek apakah body adalah instance dari FormData
          if (body instanceof FormData) {
            // Jika FormData, jangan set 'Content-Type'. Browser akan melakukannya secara otomatis.
            requestBody = body;
          } else {
            // Default: Jika bukan FormData, asumsikan itu JSON.
            headers['Content-Type'] = 'application/json';
            requestBody = body ? JSON.stringify(body) : null;
          }
          let url = link_api.simpanAlatBayar;
          const response = await fetch(url, {
            method: 'POST',
            headers: headers,
            body: requestBody,
          }).then(response => {
            if (!response.ok) {
              throw new Error(
                `HTTP error! status: ${response.status} from ${url}`);
            }
            return response.json();
          })
          if (response.success) {
            if (mode == 'tambah') {
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
          var textError = getTextError(error);
          $.messager.alert('Error', getTextError(error), 'error');
        }
        tutupLoaderSimpan();
      }
    }

    function previewGambar() {
      if (row.gambar_full_path != 'NO_IMAGE.jpg') {
        window.open(row.gambar_full_path, 'Gambar', 'resizable,scrollbars,status');
      } else {
        window.open('{{ asset('assets/foto_barang/NO_IMAGE.jpg') }}', 'Gambar',
          'resizable,scrollbars,status');
      }
    }

    function browse_data_kas_bank(id, jeniskas) {
      jeniskas = jeniskas.toLowerCase();
      $(id).combogrid({
        panelWidth: 370,
        url: link_api.browsePerkiraan,
        queryParams: {
          jenis: jeniskas,
          aktif: 1
        },
        idField: 'uuidperkiraan',
        textField: 'nama',
        mode: 'remote',
        required: ['memorial', 'giro'].indexOf(jeniskas) != -1 ? false : true,
        columns: [
          [{
              field: 'kode',
              title: 'Kode',
              width: 110,
              sortable: true
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 250,
              sortable: true
            }
          ]
        ],
        onSelect: function(index, row) {
          $(id).combogrid('options').onChange.call();
        },
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');
        }
      });
    }
  </script>
@endpush
