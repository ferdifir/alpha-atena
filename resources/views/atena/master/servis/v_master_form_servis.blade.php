@extends('template.form')

@section('content')
  <div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">

            <input type="hidden" name="mode" id="mode">
            <input type="hidden" name="uuidservis">
            <input type="hidden" name="tglentry">

            <div class="easyui-tabs" style="width:100%;height:270px;" data-options="border:false;" plain='true'>
              <table style="padding:5px" id="label_form">
                <tr>
                  <td align="right" id="label_form">Kode</td>
                  <td><input id="kodeservis" name="kodeservis" style="width:195px" class="label_input">
                    <label id="label_form"><input type="checkbox" id="status" name="status" value="1">
                      Aktif</label>
                  </td>
                </tr>
                <tr>
                  <td align="right" id="label_form">Nama</td>
                  <td><input name="namaservis" style="width:250px" class="label_input" validType='length[0,100]'></td>
                </tr>
                <tr>
                  <td align="right" id="label_form">Akun Pendapatan</td>
                  <td><input id="idperkiraanpendapatan" name="uuidperkiraanpendapatan" style="width:250px"></td>
                </tr>
                <tr>
                  <td align="right" id="label_form">Harga</td>
                  <td><input name="harga" id="harga" style="width:250px;" class="number" min="0" required>
                  </td>
                </tr>
                <tr>
                  <td align="right" id="label_form" valign="top">Catatan</td>
                  <td>
                    <textarea name="catatan" style="width:250px; height:50px" class="label_input" multiline="true"
                      validType='length[0,300]'></textarea>
                  </td>
                </tr>
              </table>
              <div style="position: fixed;bottom:0;background-color: white;width:100%;">
                <table cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input
                        :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl
                        Input :</label> <label id="lbl_tanggal"></label></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
      <br>
      <a title="Simpan" class="easyui-tooltip" iconCls="" data-options="plain:false" id='btn_simpan'
        onclick="javascript:simpan()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
      <br><br>
      <a title="Tutup" class="easyui-tooltip" iconCls="" data-options="plain:false" onclick="javascript:tutup()"><img
          src="{{ asset('assets/images/cancel.png') }}"></a>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-filter/datagrid-filter.js') }}"></script>
  <script>
    $(document).ready(function() {
      browse_data_perkiraan();
      @if ($mode == 'tambah')
        tambah();
      @elseif ($mode == 'ubah')
        ubah();
      @endif
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
      $('#harga').numberbox('setValue', 0);

      getConfig(
        'KODESERVIS',
        'MSERVIS',
        'Bearer {{ session('TOKEN') }}',
        function(res) {
          const KODE = res.data.value;
          if (KODE == 'AUTO') {
            $('#kodeservis').textbox({
              prompt: "Auto Generate",
              readonly: true,
              required: false
            });
          } else {
            $('#kodeservis').textbox({
              prompt: "",
              readonly: false,
              required: true
            });
            $('#kodeservis').textbox('clear').textbox('textbox').focus();
          }
        }
      );
    }

    async function ubah() {
      $('#mode').val('ubah');

      try {
        const res = await fetch(
          link_api.loadDataHeaderServis, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer {{ session('TOKEN') }}'
            },
            body: JSON.stringify({
              uuidservis: '{{ $data }}'
            })
          }
        );

        const response = await res.json();
        if (response.success) {
          row = response.data;
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }

      if (row) {
        $('#form_input').form('load', row);

        $('[name=mode]').val('ubah');

        $('#idperkiraanpendapatan').combogrid('setValue', {
          uuidperkiraan: row.uuidperkiraanpendapatan,
          nama: row.namaperkiraanpendapatan
        });

        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);
        $('#kodeservis').textbox('readonly', true);

        get_akses_user('{{ $kodemenu }}', 'Bearer {{ session('TOKEN') }}', function(data) {
          data = data.data;
          if (data.ubah != 1) {
            $('#btn_simpan').css('filter', 'grayscale(100%)').removeAttr('onclick');
          }
        }, false);
      }
    }

    async function simpan() {
      var isValid = $('#form_input').form('validate');
      if (isValid) {
        mode = $('[name=mode]').val();
        try {
          const data = $('#form_input :input').serializeArray();
          const payload = {};
          for (var i = 0; i < data.length; i++) {
            payload[data[i].name] = data[i].value;
          }
          tampilLoaderSimpan();
          const res = await fetch(
            link_api.simpanServis, {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer {{ session('TOKEN') }}'
              },
              body: JSON.stringify(payload)
            }
          );

          if (res.ok) {
            const data = await res.json();
            if (data.success) {
              $.messager.alert('Info', 'Simpan Data Sukses', 'info');
              @if ($mode == 'tambah')
                tambah();
              @elseif ($mode == 'ubah')
                ubah();
              @endif
            } else {
              throw new Error(data.errorMsg);
            }
          }
        } catch (e) {
          const error = (typeof e === 'string') ? e : e.message;
          const textError = getTextError(error);
          $.messager.alert('Error', textError, 'error');
        } finally {
          tutupLoaderSimpan();
        }
      }
    }

    function browse_data_perkiraan() {
      $('#idperkiraanpendapatan').combogrid({
        required: true,
        panelWidth: 330,
        mode: 'remote',
        idField: 'uuidperkiraan',
        textField: 'nama',
        sortName: 'kode',
        sortOrder: 'asc',
        url: link_api.browsePerkiraan,
        queryParams: {
          jenis: "detail",
          aktif: 1
        },
        columns: [
          [{
              field: 'kode',
              title: 'Kode Akun',
              width: 80
            },
            {
              field: 'nama',
              title: 'Nama Akun',
              width: 235
            }
          ]
        ]
      });
    }
  </script>
@endpush
