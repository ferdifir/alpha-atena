@extends('template.form')

@section('content')
  <div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            {{-- <script>
              if (screen.height <= 1080) {
                $("#trans_layout").css('height', "350px");
              }
            </script> --}}
            <div data-options="region:'north',border:false" style="width:100%; height:200px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>

              <input type="hidden" id="mode" name="mode">
              <input type="hidden" id="IDUANGMUKAPO" name="uuiduangmukapo">
              <input type="hidden" id="TGLENTRY" name="tglentry">
              <input type="hidden" id="URUTAN" name="urutan">

              <table width="100%">
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td valign="top">
                          <table>
                            <input type="hidden" name="uuidpo" id="IDPO">

                            <tr>
                              <td id="label_form">No. PO</td>
                              <td id="label_form">
                                <input id="KODEPO" name="kodepo" class="label_input" style="width:180px" readonly>
                              </td>
                            </tr>
                            <tr>
                              <td id="label_form">Tgl. PO</td>
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
            {{-- <div data-options="region:'south',border:false" style="width:100%; height:160px;">
              <table id="trans_footer" width="100%">
                <tr>
                  <td colspan="2">
                    <table cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User
                            :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">|
                            Tgl. Input :</label> <label id="lbl_tanggal"></label></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </div> --}}
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
  <script>
    var cekbtnsimpan = true; //CEK APAKAH TOMBOL SIMPAN BISA DITEKAN ATAU BELUM (SUPAYA TIDAK TERKLIK 2x)
    var row = {};
    $(document).ready(async function() {
      @if ($mode == 'tambah')
        await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          var UT = data.data.cetak;
          if (UT == 1) {
            $('#simpan_cetak').css('filter', '');
          } else {
            $('#simpan_cetak').css('filter', 'grayscale(100%)');
            $('#simpan_cetak').removeAttr('onclick');
          }
        }, false);
        await tambah();
      @elseif ($mode == 'ubah')
        await ubah();
      @endif

      tutupLoader();
    })

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    async function tambah() {
      try {
        let url = link_api.loadDataHeaderPesananPembelian;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidpo: '{{ $datapo }}',
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
      $('#form_input').form('clear');
      $('#mode').val('tambah');

      document.getElementById('btn_simpan').onclick = simpan;
      $('#btn_simpan').css('filter', '');
      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#form_input').form('load', row);

      clear_plugin();
    }

    async function ubah() {
      $('#mode').val('ubah');
      try {
        let url = link_api.loadDataHeaderUangMukaPO;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuiduangmukapo: '{{ $datauangmukapo }}',
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
        await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {
          var UT = data.data.cetak;
          if (UT == 1) {
            $('#simpan_cetak').css('filter', '');
          } else {
            $('#simpan_cetak').css('filter', 'grayscale(100%)');
            $('#simpan_cetak').removeAttr('onclick');
          }
          UT = data.data.ubah;
          var statusTrans = await getStatusTrans(link_api.getStatusTransPesananPembelian,
            'bearer {{ session('TOKEN') }}', {
              uuidpo: row.uuidpo,
            });
          if (statusTrans != 'D') {
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
      }
    }

    async function simpan() {
      var mode = $("#mode").val();
      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        cekbtnsimpan = false;
        tampilLoaderSimpan();
        try {
          let headers = {
            'Authorization': 'bearer {{ session('TOKEN') }}',
          };
          let requestBody = null;
          var unindexed_array = $('#form_input :input').serializeArray();

          var body = {};
          $.map(unindexed_array, function(n, i) {
            body[n['name']] = n['value'];
          });
          // Cek apakah body adalah instance dari FormData
          if (body instanceof FormData) {
            // Jika FormData, jangan set 'Content-Type'. Browser akan melakukannya secara otomatis.
            requestBody = body;
          } else {
            // Default: Jika bukan FormData, asumsikan itu JSON.
            headers['Content-Type'] = 'application/json';
            requestBody = body ? JSON.stringify(body) : null;
          }
          let url = link_api.simpanUangMukaPO;
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

            $('#form_input').form('clear');

            $.messager.show({
              title: 'Info',
              msg: 'Transaksi Sukses',
              showType: 'show'
            });
            if (mode == "tambah") {
              await tambah();
              $('#table_data_detail').datagrid('loadData', []);
            } else {
              await ubah();
            }
          } else {
            $.messager.alert('Error', response.message, 'error');
          }
        } catch (error) {
          console.log(error);
          var textError = getTextError(error);
          $.messager.alert('Error', getTextError(error), 'error');
        }

        cekbtnsimpan = true;
        tutupLoaderSimpan();
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
