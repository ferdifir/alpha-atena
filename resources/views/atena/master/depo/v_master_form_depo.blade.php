@extends('template.form')

@section('content')
  <form id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            <input type="hidden" name="mode" id="mode">
            <input type="hidden" name="uuiddepo">
            <input type="hidden" id="TGLENTRY" name="tglentry">
            <table style="padding:5px" id="label_form">
              <tr>
                <td align="right" id="label_form">Kode</td>
                <td>
                  <input id="KODEDEPO" name="kodedepo" style="width:290px" class="label_input">
                  <label id="label_form">
                    <input type="hidden" name="status" id="STATUS">
                    <input type="checkbox" id="CBSTATUS" value="1" checked> Aktif
                  </label>
                </td>
              </tr>
              <tr>
                <td align="right" id="label_form">Nama</td>
                <td><input name="namadepo" style="width:350px" class="label_input" required="true"
                    validType='length[0,100]'></td>
              </tr>
              <tr>
                <td align="right" id="label_form">Telp</td>
                <td><input name="telp" style="width:350px" class="label_input" validType='length[0,20]'></td>
              </tr>
              <tr>
                <td align="right" id="label_form">Kota</td>
                <td><input name="kota" style="width:350px" class="label_input"></td>
              </tr>
              <tr>
                <td align="right" id="label_form">Tol. Jarak</td>
                <td>
                  <input name="toleransijarak" style="width:110px" class="label_input" validType='number'>
                  <label id="label_form" style="display: inline-block; width: 123px; text-align: right;">Tol. Jarak
                    Kirim:</label>
                  <input name="toleransijarakkirim" style="width:110px" class="label_input" validType='number'>
                </td>
              </tr>

              <tr>
                <td align="right" id="label_form"></td>
                <td>
                  <label id="label_form">
                    <input type="checkbox" id="EDITCHECKOUT" name="editsetelahcheckout" value="1">
                    Edit Setelah Checkout
                  </label>
                </td>
              </tr>
              <tr>
                <td valign="top" align="right" id="label_form">Catatan</td>
                <td>
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
          </div>
        </div>
      </div>
    </div>

    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
      <br>
      <a href="#" title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false" id='btn_simpan'
        onclick="javascript:simpan()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
      <br><br>
      <a href="#" title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
        onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
    </div>
  </form>
@endsection

@push('js')
  <script>
    let row;

    $(document).ready(function() {
      $('#CBSTATUS').on('change', function() {
        if (this.checked) {
          $('#STATUS').val(1);
        } else {
          $('#STATUS').val(0);
        }
      });
      {{ $mode }}();
      tutupLoader();
    });

    function tutup() {
      parent.tutupTab();
    }

    function tambah() {
      $('#form_input').form('clear');
      $('#mode').val('tambah');

      $('#STATUS').prop('checked', true);
      $('#lbl_kasir, #lbl_tanggal').html('');
    }

    async function ubah() {
      $('#mode').val('ubah');
      try {
        const response = await fetch(
          link_api.headerFormDepo, {
            method: 'POST',
            headers: {
              'Authorization': 'bearer {{ session('TOKEN') }}',
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({
              uuiddepo: '{{ $data }}',
            }),
          }
        );

        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();
        if (data.success) {
          row = data.data;
        } else {
          $.messager.alert('Error', data.message, 'error');
        }
      } catch (e) {
        showErrorAlert(e);
      }

      if (row) {
        $('#form_input').form('load', row);
        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);
        $('#KODEDEPO').textbox('readonly', true);

        await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          if (data.data.ubah != 1) {
            $('#btn_simpan').css('filter', 'grayscale(100%)').removeAttr('onclick');
          }
        }, false);
      }
    }

    async function simpan() {
      tampilLoaderSimpan();
      try {
        const form = new FormData($('#form_input')[0]);
        form.set('status', parseInt($('#STATUS').val()) || 0);
        const response = await fetch(
          link_api.simpanDepo, {
            method: 'POST',
            headers: {
              'Authorization': 'bearer {{ session('TOKEN') }}',
            },
            body: form,
          }
        );

        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();
        if (data.success) {
          $.messager.alert('Info', 'Simpan Data Sukses', 'info');
          {{ $mode }}();
        } else {
          $.messager.alert('Error', data.message, 'error');
        }
      } catch (e) {
        showErrorAlert(e);
      } finally {
        tutupLoaderSimpan();
      }
    }
  </script>
@endpush
