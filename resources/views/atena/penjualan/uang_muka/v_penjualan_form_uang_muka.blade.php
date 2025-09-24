@extends('template.form')

@section('content')
  <div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            <div data-options="region:'north',border:false" style="width:100%; height:200px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>

              <input type="hidden" id="mode" name="mode">
              <input type="hidden" id="IDUANGMUKASO" name="uuiduangmukaso">
              <input type="hidden" id="URUTAN" name="urutan">
              <input type="hidden" id="tglentry" name="tglentry">

              <table width="100%">
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td valign="top">
                          <table>
                            <input type="hidden" name="uuidso" id="IDSO">

                            <tr>
                              <td id="label_form">No. SO</td>
                              <td id="label_form">
                                <input id="KODESO" name="kodeso" class="label_input" style="width:180px" readonly>
                              </td>
                            </tr>
                            <tr>
                              <td id="label_form">Tgl. SO</td>
                              <td><input id="TGLTRANS" name="tgltrans" class="date" style="width:180px" readonly />
                              </td>
                            </tr>
                            <tr>
                              <td id="label_form">Tgl. Batas Pembayaran</td>
                              <td><input id="TGLPEMBAYARAN" name="tglpembayaran" class="date" style="width:180px" />
                              </td>
                            </tr>
                            <tr>
                              <td id="label_form">Nilai Pembayaran</td>
                              <td>
                                <input id="AMOUNT" name="amount" style="width:180px;" class="number">
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:160px;">
              <table id="trans_footer" width="100%">
                <tr>
                  <td colspan="2">
                    <div style="position: fixed;bottom:0;background-color: white;width:100%;">
                      <table cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User
                              :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">|
                              Tgl. Input :</label> <label id="lbl_tanggal"></label></td>
                        </tr>
                      </table>
                    </div>
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
      <a title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false" id='btn_simpan'
        onclick="javascript:simpan()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
      <br><br>
      <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
        onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('assets/js/utils.js') }}"></script>
  <script>
    if (screen.height <= 1080) $("#trans_layout").css('height', "350px");
    var row = {};
    var cekbtnsimpan = true; //CEK APAKAH TOMBOL SIMPAN BISA DITEKAN ATAU BELUM (SUPAYA TIDAK TERKLIK 2x)

    $(document).ready(function() {
      //TAMBAH CHECK AKSES CETAK
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        var UT = data.cetak;
        if (UT == 1) {
          $('#simpan_cetak').css('filter', '');
        } else {
          $('#simpan_cetak').css('filter', 'grayscale(100%)');
          $('#simpan_cetak').removeAttr('onclick');
        }
      }, false);

      {{ $mode }}();
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

      document.getElementById('btn_simpan').onclick = simpan;
      $('#btn_simpan').css('filter', '');
      $('#lbl_kasir, #lbl_tanggal').html('');

      try {
        const res = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.loadDataHeaderPenjualanSalesOrder, {
            uuidso: '{{ $data }}',
          }
        );
        if (!res.success) {
          throw new Error(res.message);
        }
        row = res.data;
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }

      $('#form_input').form('load', row);

      clear_plugin();
      tutupLoader();
    }

    async function ubah() {
      $('#mode').val('ubah');

      try {
        const res = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.loadDataHeaderUangMukaSO, {
            uuiduangmukaso: '{{ $data }}'
          }
        );
        if (!res.success) {
          throw new Error(res.message);
        }
        row = res.data;
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }

      if (row) {
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          data = data.data;
          var UT = data.ubah;
          get_status_trans("{{ session('TOKEN') }}", "atena/penjualan/pesanan-penjualan", "uuidso", row.uuidso,
            function(data) {
              data = data.data;
              if (data.status != 'D') {
                document.getElementById('btn_simpan').onclick = simpan;
                $('#btn_simpan').css('filter', '');
                $('#mode').val('ubah');
              } else {
                document.getElementById('btn_simpan').onclick = '';
                $('#btn_simpan').css('filter', 'grayscale(100%)');
              }

              $('#form_input').form('load', row);

              $('#lbl_kasir').html(row.userentry);
              $('#lbl_tanggal').html(row.tglentry);
            });
        });
      }
    }

    // TODO: cek jika endpoint sudah diperbaiki di mode ubah
    async function simpan() {
      var mode = $("#mode").val();
      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        cekbtnsimpan = false;
        if (!isTokenExpired('{{ session('TOKEN') }}')) {
          try {
            tampilLoaderSimpan();
            const data = $("#form_input :input").serializeArray();
            const payload = {};
            for (var i = 0; i < data.length; i++) {
              payload[data[i].name] = data[i].value;
            }
            const res = await fetchData(
              '{{ session('TOKEN') }}',
              link_api.simpanUangMukaSO,
              payload
            );
            if (res.success) {
              if (mode == 'tambah') {
                $.messager.show({
                  title: 'Info',
                  msg: 'Transaksi Sukses',
                  showType: 'show'
                });
              } else {
                $.messager.alert('Info', 'Transaksi Sukses', 'info');
              }
              {{ $mode }}();
            } else {
              $.messager.alert('Error', res.message, 'error');
            }
          } catch (e) {
            const error = (typeof e === 'string') ? e : e.message;
            const textError = getTextError(error);
            $.messager.alert('Error', textError, 'error');
          } finally {
            tutupLoaderSimpan();
          }
        } else {
          $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
        }
      }
    }

    /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */
    function clear_plugin() {
      $('.combogrid-f').each(function() {
        $(this).combogrid('grid').datagrid('load', {
          q: ''
        });
      });

      $("#TGLPEMBAYARAN").datebox('setValue', date_format());

      $('.number').numberbox('setValue', 0);
    }
  </script>
@endpush
