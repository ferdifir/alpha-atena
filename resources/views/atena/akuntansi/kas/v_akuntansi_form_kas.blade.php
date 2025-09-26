@extends('template.form')

@section('content')
  <?php
  if (strtoupper($jenis) == 'KAS_BANK') {
      $aJenis = ['Kas Masuk', 'Kas Keluar', 'Bank Masuk', 'Bank Keluar'];
  } elseif (strtoupper($jenis) == 'GIRO') {
      $aJenis = ['Giro Masuk', 'Giro Keluar', 'Giro Tolak'];
  } elseif (strtoupper($jenis) == 'MEMORIAL') {
      $aJenis = ['Memorial'];
  }
  ?>

  <div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            <script>
              if (screen.height < 450) $("#trans_layout").css('height', "450px");
            </script>
            <div data-options="region:'north',border:false" style="width:100%; height:160px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>

              <input type="hidden" id="mode" name="mode">
              <input type="hidden" id="IDKAS" name="uuidkas">
              <input type="hidden" id="IDGIRO" name="idgiro">
              <table>
                <tr>
                  <td valign="top">
                    <fieldset style="height:150px">
                      <legend>Informasi Umum</legend>
                      <table border="0" style="padding:2px">
                        <tr>
                          <td id="label_form">Jenis</td>
                          <td>
                            <select name="jeniskas" id="JENISKAS" style="width:190px" class="easyui-combobox"
                              panelHeight="auto">
                              <?php
                              foreach ($aJenis as $item) {
                                  echo '<option value="' . strtoupper($item) . '">' . $item . '</option>';
                              }
                              ?>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">No. Trans</td>
                          <td><input id="KODEKAS" name="kodekas" class="label_input" style="width:190px"</td>
                        </tr>
                        <tr>
                          <td id="label_form">Lokasi</td>
                          <td id="label_form">
                            <input name="uuidlokasi" id="UUIDLOKASI" style="width:190px">
                            <input type="hidden" id="KODELOKASI" name="kodelokasi">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Tgl. Trans</td>
                          <td><input id="TGLTRANS" name="tgltrans" class="date" style="width:190px" /></td>
                        </tr>
                        <tr>
                          <td id="label_form">Referensi</td>
                          <td id="label_form"><input id="REFERENSI" name="referensi" style="width:190px"></td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td <?= strtoupper($jenis) == 'KAS_BANK' ? '' : '' ?>>
                    <fieldset style="height:150px">
                      <legend>Informasi <?= ucfirst(strtolower($jenis)) ?></legend>
                      <table border="0" style="padding:2px">
                        <tr>
                          <td id="label_form" align="left">Akun Kas/Bank</td>
                          <td><input id="UUIDPERKIRAANKAS" name="uuidperkiraankas" style="width:110px"> <input
                              id="NAMAPERKIRAANKAS" name="NAMAPERKIRAANKAS" style="width:250px" class="label_input"
                              readonly prompt="Nama Akun"></td>
                        </tr>
                        <tr>
                          <td id="label_form"></td>
                          <td id="label_form">
                            <input type="checkbox" value="1" name="samakandebetkredit" id="SAMAKANDEBETKREDIT">
                            Hitung Nominal Kas/Bank Secara Otomatis
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form" align="left">Nominal</td>
                          <td>
                            <input id="AMOUNT" name="amount" style="width:110px;" class="number" min="0">
                            <input id="UUIDCURRENCY" name="uuidcurrency" style="width:50px;" />
                            <input id="NILAIKURS" name="nilaikurs" style="width:65px;" class="number" min="0">
                            <input id="AMOUNTKURS" name="amountkurs" style="width:130px;" class="number" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form" align="left" valign="top">Keterangan</td>
                          <td>
                            <textarea name="keterangan" class="label_input" id="KETERANGAN" multiline="true" required="true"
                              style="width:365px; height:50px" validType='length[0,300]'></textarea>
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td id="fm-giro" <?php echo in_array(strtoupper($jenis), ['GIRO']) ? '' : 'hidden'; ?>>
                    <fieldset style="height:150px">
                      <legend>Informasi Giro Masuk / Keluar</legend>
                      <table border="0" style="padding:2px">
                        <tr>
                          <td id="label_form" align="left">No Giro</td>
                          <td><input id="NOGIRO" name="nogiro" class="label_input" style="width:150px"
                              prompt="No Giro"></td>
                        </tr>
                        <tr>
                          <td id="label_form" align="left">Nilai Giro</td>
                          <td><input id="AMOUNTGIRO" name="amountgiro" style="width:150px;" class="number"></td>
                        </tr>
                        <tr>
                          <td id="label_form" align="left">Nama Bank</td>
                          <td><input id="NAMABANKGIRO" name="namabankgiro" class="label_input" style="width:150px"
                              prompt="Nama Bank Giro"></td>
                        </tr>
                        <tr>
                          <td id="label_form" align="left">Tgl Cair</td>
                          <td><input id="TGLCAIRGIRO" name="tglcairgiro" class="date" style="width:150px"></td>
                        </tr>
                        <tr>
                          <td id="label_form" align="left"></td>
                          <td>
                            <a class="easyui-linkbutton" onclick="generate_jurnal_giro()">Lock Giro</a>
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td <?php echo in_array(strtoupper($jenis), ['MEMORIAL']) ? 'hidden' : ''; ?>>
                    <fieldset style="height:150px">
                      <legend>Informasi Lain</legend>
                      <table style="padding:2px">
                        <tr id="fm-giro-cair" <?php echo in_array(strtoupper($jenis), ['GIRO', 'KAS_BANK']) ? '' : 'hidden'; ?>>
                          <td id="label_form" align="left">No Giro <?=
              strtoupper($jenis) == 'BANK' ? 'Cair' : ''
              strtoupper($jenis) == 'GIRO' ? 'Tolak' : ''
              ?></td>
                          <td><input id="NOGIROCAIRTOLAK" name="nogirocairtolak" style="width:140px"></td>
                        </tr>
                        <tr hidden>
                          <td id="label_form" align="left">No Purchase Order</td>
                          <td><input id="IDPO" name="idpo" style="width:140px"></td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                </tr>
              </table>
            </div>
            <div data-options="region:'center',border:false">
              <table id="table_data_detail" fit="true"></table>
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:35px;">
              <table id="trans_footer" width="100%">
                <tr>
                  <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input
                      :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl.
                      Input :</label> <label id="lbl_tanggal"></label></td>
                  <td>
                    <div align="right" id="label_form" style="margin-right:25px;">
                      Total Debet <input id="TOTALDEBET" name="totaldebet" class="number" style=" width:120px"
                        readonly />
                      Total Kredit <input id="TOTALKREDIT" name="totalkredit" class="number" style=" width:120px"
                        readonly />
                    </div>
                  </td>
                </tr>
                <input type="hidden" id="data_detail" name="data_detail">
                <input type="hidden" id="data_giro" name="data_giro">
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
      <br>
      <a title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false" id='btn_simpan_modal'
        onclick="$('#window_button_simpan').window('open')"><img src="{{ asset('assets/images/simpan.png') }}"></a>
      <br><br>
      <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
        onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
    </div>
  </div>

  <div id="window_button_simpan" class="easyui-window" title="Konfirmasi" data-options="modal:true,closed:true"
    style="height:164cm;padding:15px 10px 10px 10px;top:20px">
    <center>
      <div id="button_simpan">
        <a title="Simpan" class="easyui-linkbutton button_add" id='simpan_saja' onclick="simpan(this.id)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan</a><br><br>
        <a title="Simpan & Cetak" class="easyui-linkbutton button_add_print" id='simpan_cetak'
          onclick="simpan(this.id)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan & Cetak</a>
        <div>
    </center>
  </div>

  <div id="form_cetak" title="Preview" style="width:660px; height:450px">
    <div id="area_cetak"></div>
    <div>
    @endsection

    @push('js')
      <script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.mask.js') }}"></script>
      <script src="{{ asset('assets/js/utils.js') }}"></script>
      <script>
        var cekbtnsimpan = true; //CEK APAKAH TOMBOL SIMPAN BISA DITEKAN ATAU BELUM (SUPAYA TIDAK TERKLIK 2x)
        var inputharga;
        var lihatharga;
        var row = {};
        $(document).ready(async function() {
          console.log('{{ $jenis }}')
          let check1 = false;
          let check2 = false;
          const promises = [];
          promises.push(getConfig('KODEKAS', 'TKAS', 'bearer {{ session('TOKEN') }}',
            function(response) {
              if (response.success) {
                config = response.data;
                check1 = true;
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
            }));
          promises.push(get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(
            data) {
            lihatharga = data.data.lihatharga == 1;
            inputharga = data.data.inputharga == 1;
            check2 = true;
            var UT = data.data.cetak;
            aksesubah = data.data.ubah;
            if (UT == 1) {
              $('#simpan_cetak').css('filter', '');
            } else {
              $('#simpan_cetak').css('filter', 'grayscale(100%)');
              $('#simpan_cetak').removeAttr('onclick');
            }
          }, false));

          await Promise.all(promises);
          if (!check1 || !check2) return;

          if (!lihatharga) {
            // $('#lihatTotalHarga').hide();
          }
          if (config.value == "AUTO") {
            $('#KODEKAS').textbox({
              prompt: "Auto Generate",
              readonly: true,
              required: false
            });
          } else {
            $('#KODEKAS').textbox({
              prompt: "",
              readonly: false,
              required: true
            });
            $('#KODEKAS').textbox('clear').textbox('textbox').focus();
          }

          $("#form_cetak").window({
            collapsible: false,
            minimizable: false,
            tools: [{
              text: '',
              iconCls: 'icon-print',
              handler: function() {
                $("#area_cetak").printArea({
                  mode: 'iframe'
                });

                $("#form_cetak").window({
                  closed: true
                });
              }
            }, {
              text: '',
              iconCls: 'icon-excel',
              handler: function() {
                export_excel('Faktur Kas/Bank/Memorial/Giro', $("#area_cetak").html());
                return false;
              }
            }]
          }).window('close');

          var lebar = $('.panel').width();
          var tabsimpan = 50;
          var modalsimpan = 174;
          var spasi = 10;

          var left = lebar - (tabsimpan + modalsimpan) + spasi;

          $("#window_button_simpan").css({
            "width": modalsimpan
          });

          $("#window_button_simpan").window({
            collapsible: false,
            minimizable: false,
            maximizable: false,
            resizable: true,
            draggable: true,
            left: left
          });

          browse_data_lokasi('#UUIDLOKASI');
          browse_data_currency('#UUIDCURRENCY');
          browse_data_referensi('#REFERENSI');
          browse_data_kas_bank('#UUIDPERKIRAANKAS', 'kas');
          browse_data_giro('#NOGIROCAIRTOLAK');
          //browse_data_po('#IDPO');

          $('#JENISKAS').combobox({
            required: true,
            onChange: async function(newVal, oldVal) {
              if ($('#mode').val() != '')
                await ubah_jenis_kas();
            }
          });

          $('#AMOUNT').numberbox({
            onChange: function(newVal, oldVal) {
              var nilaikurs = $('#NILAIKURS').numberbox('getValue');
              var amountkurs = nilaikurs * $(this).numberbox('getValue');
              $('#AMOUNTKURS').numberbox('setValue', amountkurs);
              hitung_debet_kredit();
            }
          });

          $('#NILAIKURS').numberbox({
            onChange: function(newVal, oldVal) {
              var nilaikurs = parseFloat($(this).numberbox('getValue'));
              var row = $('#UUIDCURRENCY').combogrid('grid').datagrid('getSelected');
              if (row && row.id == '{{ session('UUIDCURRENCY') }}') {
                $(this).numberbox('setValue', 1);
                nilaikurs = 1;
              } else {
                if (nilaikurs == 1 || nilaikurs == 0) {
                  //$.messager.alert('Error', 'Nilai Kurs Tidak Boleh Diisi Angka 1 dan 0', 'error');
                }
              }
              var amount = $('#AMOUNT').numberbox('getValue');
              var amountkurs = amount * nilaikurs;
              $('#AMOUNTKURS').numberbox('setValue', amountkurs);
              hitung_debet_kredit();
            }
          });

          $('#SAMAKANDEBETKREDIT').change(function() {
            if (this.checked) {
              $("#AMOUNT").numberbox("readonly", true);
              $("#UUIDCURRENCY").combogrid("readonly", true);
              $("#NILAIKURS").numberbox("readonly", true);

            } else {
              $("#AMOUNT").numberbox("readonly", false);
              $("#UUIDCURRENCY").combogrid("readonly", false);
              $("#NILAIKURS").numberbox("readonly", false);
            }
            hitung_debet_kredit()
          });

          buat_table_detail();

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

        });

        async function ubah_jenis_kas() {

          var jeniskas = $('#JENISKAS').combobox('getValue');
          var tipe = jeniskas.split(' '); // pecah jeniskas

          $('.label_kodetrans').html($('#JENISKAS').combobox('getText'));

          // giro
          var readonly_prop = true;
          var validation_prop = 'disableValidation';
          if ((tipe[0] == 'GIRO' && tipe[1] != 'TOLAK') || (jeniskas == 'MEMORIAL')) {
            readonly_prop = false;
            validation_prop = 'enableValidation';
          }

          $('#NOGIRO').add($('#NAMABANKGIRO')).textbox('readonly', readonly_prop).textbox(validation_prop);
          $('#AMOUNTGIRO').numberbox('readonly', readonly_prop);
          $('#TGLCAIRGIRO').datebox('readonly', readonly_prop);

          // amount
          if (['KAS', 'BANK'].indexOf(tipe[0]) > -1) {
            readonly_prop = false;
            validation_prop = 'enableValidation';
          } else {
            readonly_prop = true;
            validation_prop = 'disableValidation';
          }

          $('#NOGIRO').textbox({
            'required': (jeniskas == 'GIRO MASUK' || jeniskas == 'GIRO KELUAR')
          });
          $('#AMOUNTGIRO').numberbox({
            'required': (jeniskas == 'GIRO MASUK' || jeniskas == 'GIRO KELUAR')
          });
          $('#NAMABANKGIRO').textbox({
            'required': (jeniskas == 'GIRO MASUK' || jeniskas == 'GIRO KELUAR')
          });
          $('#TGLCAIRGIRO').datebox({
            'required': (jeniskas == 'GIRO MASUK' || jeniskas == 'GIRO KELUAR')
          });

          $('#UUIDPERKIRAANKAS').add($('#UUIDCURRENCY')).combogrid('readonly', readonly_prop);
          $('#AMOUNT').add($('#NILAIKURS')).numberbox('readonly', readonly_prop);
          $('#UUIDPERKIRAANKAS').combogrid(validation_prop);
          $('#KETERANGAN').textbox(validation_prop);

          // referensi
          if (jeniskas == 'MEMORIAL')
            var url_referensi = link_api.browseCustomer;

          else {
            var url_referensi = tipe[1] == 'MASUK' ? link_api.browseCustomer : link_api.browseSupplier;
            /*
            		if (tipe[1] == 'MASUK') {
            			$('#IDPO').combogrid('readonly').combogrid('clear')
            		} else {
            			$('#IDPO').combogrid('readonly', false).combogrid('clear')
            		}
            */
          }

          ubah_url_combogrid($('#REFERENSI'), url_referensi, true);

          // clear component
          $('#KODEKAS, #NOBUKTIMANUAL, #NAMAPERKIRAANKAS, #KETERANGAN, #NOGIRO, #NAMABANKGIRO').textbox('clear');
          $('#UUIDPERKIRAANKAS, #REFERENSI').combogrid('clear');
          $('#TGLTRANS').add($('#TGLCAIRGIRO')).datebox('setValue', date_format());
          $('#AMOUNT').add($('#AMOUNTGIRO')).numberbox('setValue', 0);
          $('#NOGIROCAIRTOLAK').combogrid('grid').datagrid('loadData', []);

          reset_detail();

          // tampilkan giro jika BANK MASUK/KELUAR DAN TOLAKAN
          if ($('#mode').val() != '' && (tipe[0] == 'BANK' || jeniskas == 'GIRO TOLAK')) {
            $('#NOGIROCAIRTOLAK').combogrid('readonly', false)
            var temp_jenisgiro = '';

            if (tipe[0] == 'BANK')
              temp_jenisgiro = 'GIRO ' + tipe[1];


            const response = await fetchData(
              '{{ session('TOKEN') }}',
              link_api.loadGiroBelumCair, {

              }
            );
            if (response.success) {
              $('#NOGIROCAIRTOLAK').combogrid('grid').datagrid('loadData', response.data);
            } else {
              $.messager.alert('Error', res.message, 'error');
            }
          } else {
            $('#NOGIROCAIRTOLAK').combogrid('readonly')
          }

          if (jeniskas == 'GIRO MASUK' || jeniskas == 'GIRO KELUAR') {
            $('#fm-giro-cair').hide()
            $('#fm-giro').show()
          }

          if (jeniskas == 'GIRO TOLAK') {
            $('#fm-giro-cair').show()
            $('#fm-giro').hide()
          }
          if (tipe[0] != undefined) {
            browse_data_kas_bank('#UUIDPERKIRAANKAS', tipe[0]);
          }
          $('#SAMAKANDEBETKREDIT').prop("checked", false);
          $('#SAMAKANDEBETKREDIT').prop("checked", true);

          if ($('#SAMAKANDEBETKREDIT').prop("checked")) {
            $("#AMOUNT").numberbox("readonly", true);
            $("#UUIDCURRENCY").combogrid("readonly", true);
            $("#NILAIKURS").numberbox("readonly", true);

          } else {
            $("#AMOUNT").numberbox("readonly", false);
            $("#UUIDCURRENCY").combogrid("readonly", false);
            $("#NILAIKURS").numberbox("readonly", false);
          }
          hitung_debet_kredit()
        }

        shortcut.add('F8', function() {
          simpan();
        });

        function tutup() {
          parent.tutupTab();
        }

        async function cetak(uuid) {
          const doc = await getCetakDocument(
            '{{ session('TOKEN') }}',
            link_api.cetakTransaksiKas + uuid
          );
          if (doc == null) {
            $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data cetak transaksi',
              'warning');
            return false;
          }
          $("#area_cetak").html(doc);
          $("#form_cetak").window('open');
        }

        async function tambah() {
          $('#form_input').form('clear');
          $('#mode').val('tambah');

          $('#SAMAKANDEBETKREDIT').prop("checked", true);

          $("#AMOUNT").numberbox("readonly", true);
          $("#UUIDCURRENCY").combogrid("readonly", true);
          $("#NILAIKURS").numberbox("readonly", true);

          $('#lbl_kasir, #lbl_tanggal').html('');
          $('#JENISKAS').combobox('readonly', false);

          $('#UUIDPERKIRAANKAS').combogrid('readonly', false);

          clear_plugin();
          reset_detail();
        }

        async function ubah() {
          $('#mode').val('ubah');
          $('#SAMAKANDEBETKREDIT').prop("checked", true);
          try {
            let url = link_api.loadTransaksiDataHeaderKas;
            const response = await fetch(url, {
              method: 'POST',
              headers: {
                'Authorization': 'bearer {{ session('TOKEN') }}',
                'Content-Type': 'application/json',
              },
              body: JSON.stringify({
                uuidkas: '{{ $data }}',
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
            $('#lbl_kasir').html(row.userbuat);
            $('#lbl_tanggal').html(row.tglentry);
            await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {

              data = data.data;
              var UT = data.cetak;
              if (UT == 1) {
                $('#simpan_cetak').css('filter', '');
              } else {
                $('#simpan_cetak').css('filter', 'grayscale(100%)');
                $('#simpan_cetak').removeAttr('onclick');
              }

              UT = data.ubah;
              var statusTrans = await getStatusTrans(link_api.getStatusTransaksiKas,
                'bearer {{ session('TOKEN') }}', {
                  uuidkas: row.uuidkas
                });

              $(".form_status").html(status_transaksi(statusTrans));
              if (UT == 1 && statusTrans == 'I') {
                $('#btn_simpan_modal').css('filter', '');

                $('#mode').val('ubah');
              } else {
                document.getElementById('btn_simpan_modal').onclick = null;

                $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                $('#btn_simpan_modal').removeAttr('onclick');
              }

              $('#JENISKAS').combobox('setValue', row.jeniskas).combobox('readonly');
              await ubah_jenis_kas();

              $('#form_input').form('load', row);
              await load_data(row.uuidkas, row.jeniskas);
              $('#NAMAPERKIRAANKAS').textbox('setValue', row.namaperkiraankas);
              $('#UUIDCURRENCY').combogrid('setValue', row.uuidcurrency);
              $("#txt_tgl_aw").add($("#txt_tgl_ak")).datebox('setValue', date_format());
              $('#lbl_kasir').html(row.userbuat);
              $('#lbl_tanggal').html(row.tglentry);

              $('#UUIDLOKASI').combogrid('setValue', {
                uuidlokasi: row.uuidlokasi,
                nama: row.namalokasi
              });

              if (data.status != 'I') {
                $("#REFERENSI").combogrid('readonly');
                $("#TGLTRANS").datebox('readonly');
                $("#AMOUNT").numberbox('readonly');
                $("#UUIDCURRENCY").combogrid('readonly');
                $("#NILAIKURS").numberbox('readonly');
                $("#KETERANGAN").textbox('readonly');
                $("#NOGIROCAIRTOLAK").combogrid('readonly');
                $('#UUIDPERKIRAANKAS').combogrid('readonly');
                $("#NOGIRO").combogrid('readonly');
                $("#AMOUNTGIRO").numberbox('readonly');
                $("#NAMABANKGIRO").textbox('readonly');
                $("#TGLCAIRGIRO").datebox('readonly');
              } else {
                $("#NOGIROCAIRTOLAK").combogrid('readonly', false);
                $('#UUIDPERKIRAANKAS').combogrid('readonly', false);
              }
            })
          }
        }

        async function simpan(jenis_simpan) {
          $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));
          $('#data_giro').val(JSON.stringify($('#NOGIROCAIRTOLAK').combogrid('grid').datagrid('getSelected')));

          var mode = $("#mode").val();
          var datanya = $("#form_input :input").serialize();
          var isValid = $('#form_input').form('validate');
          var referensi = $('#REFERENSI').combogrid('grid').datagrid('getSelected');

          if (referensi)
            datanya += '&KODEREFERENSI=' + referensi.kode;

          $('#window_button_simpan').window('close');

          if (isValid) {
            isValid = cek_datagrid($('#table_data_detail'));
          }

          var debet = parseFloat($('#TOTALDEBET').numberbox('getValue'));
          var kredit = parseFloat($('#TOTALKREDIT').numberbox('getValue'));

          if (debet != kredit) {
            isValid = false;
            $.messager.alert('Warning', 'Total Debet harus sama dengan Kredit', 'warning');
          }

          if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
            cekbtnsimpan = false;
            tampilLoaderSimpan();

            try {
              let headers = {
                'Authorization': 'bearer {{ session('TOKEN') }}',
                'Content-Type': 'application/json'
              };

              var requestBody = {};

              $('#form_input :input').each(function() {
                if (this.name) {
                  requestBody[this.name] = $(this).val();
                }
              });

              requestBody.data_detail = $('#table_data_detail').datagrid('getRows');

              if (requestBody.data_giro == 'null') {
                delete requestBody.data_giro;
              }

              requestBody.jenis_simpan = jenis_simpan;

              let url = link_api.simpanTransaksiKas;
              const response = await fetch(url, {
                method: 'POST',
                headers: headers,
                body: JSON.stringify(requestBody)
              }).then(response => {
                if (!response.ok) {
                  throw new Error(`HTTP error! status: ${response.status} from ${url}`);
                }
                return response.json();
              });

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

                if (jenis_simpan == 'simpan_cetak') {
                  await cetak(response.data.uuidkas);
                }
              } else {
                $.messager.alert('Error', response.message, 'error');
              }

            } catch (error) {
              var textError = getTextError(error);
              $.messager.alert('Error', getTextError(error), 'error');
            }

            cekbtnsimpan = true;
            tutupLoaderSimpan();
          }
        }

        function reset_detail() {
          $('#table_data_detail').datagrid('loadData', []);
        }

        async function load_data(uuidkas, jtrans) {
          try {
            let url = link_api.loadTransaksiDataDetailKas;
            const response = await fetch(url, {
              method: 'POST',
              headers: {
                'Authorization': 'bearer {{ session('TOKEN') }}',
                'Content-Type': 'application/json',
              },
              body: JSON.stringify({
                uuidkas: uuidkas,
                jtrans: jtrans,
              }),
            }).then(response => {
              if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status} from ${url}`);
              }
              return response.json();
            })
            if (response.success) {
              var data = response.data
              $('#form_input').form('load', data.header_giro);
              $('#table_data_detail').datagrid('loadData', data.detail);
              $('#NOGIROCAIRTOLAK').combogrid('grid').datagrid('loadData', data.detail_giro);
              if ((data.detail_giro).length > 0) {
                $('#NOGIROCAIRTOLAK').combogrid('setValue', (data.detail_giro)[0].nogiro)
              }
            } else {
              $.messager.alert('Error', response.message, 'error');
            }
          } catch (error) {
            var textError = getTextError(error);
            $.messager.alert('Error', getTextError(error), 'error');
          }
        }
        /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */

        function hitung_debet_kredit() {

          rows = $('#table_data_detail').datagrid('getRows');
          jtrans = $('#JENISKAS').combobox('getValue'); //'KAS MASUK';

          var totaldebet = 0;
          var totalkredit = 0

          for (var i = 0; i < rows.length; i++) {
            totaldebet += (rows[i].saldo == 'DEBET') ? parseFloat(rows[i].amountkurs) : 0;
            totalkredit += (rows[i].saldo == 'KREDIT') ? parseFloat(rows[i].amountkurs) : 0;
          }

          if ($('#SAMAKANDEBETKREDIT').prop("checked")) {
            $('#UUIDCURRENCY').combogrid('setValue', '{{ session('UUIDCURRENCY') }}');
            $('#NILAIKURS').numberbox('setValue', 1);

            if (jtrans == 'KAS MASUK' || jtrans == 'BANK MASUK') {
              $('#AMOUNT').numberbox('setValue', totalkredit - totaldebet);

              $('#AMOUNTKURS').numberbox('setValue', $('#AMOUNT').numberbox('getValue'));
            } else if (jtrans == 'KAS KELUAR' || jtrans == 'BANK KELUAR') {
              $('#AMOUNT').numberbox('setValue', totaldebet - totalkredit);

              $('#AMOUNTKURS').numberbox('setValue', $('#AMOUNT').numberbox('getValue'));
            }
          }

          amount = parseFloat($('#AMOUNTKURS').numberbox('getValue'));

          totaldebet += (jtrans == 'KAS MASUK' || jtrans == 'BANK MASUK') ? amount : 0;
          totalkredit += (jtrans == 'KAS KELUAR' || jtrans == 'BANK KELUAR') ? amount : 0;

          $('#TOTALDEBET').numberbox('setValue', totaldebet);
          $('#TOTALKREDIT').numberbox('setValue', totalkredit);
        }

        async function get_jurnal_giro() {
          var row = $("#NOGIROCAIRTOLAK").combogrid('grid').datagrid('getSelected');
          var jeniskas = $('#JENISKAS').combobox('getValue').split(' ');

          if (row) {
            var str = row.jenistransaksi;
            var res = str.replace(" ", "-");

            if (jeniskas[0] == 'BANK') {
              jenis = 'TERIMA';
              keterangan = 'PENCAIRAN';
            } else if (jeniskas[1] == 'TOLAK') {
              jenis = 'TOLAK';
              keterangan = 'TOLAKAN';
            }
            $('#KETERANGAN').textbox('setValue', keterangan + ' ' + row.jenistransaksi + ' ' + row.nogiro + ' ' + row
              .namabank + (row.referensi == null ? '' : ' (' + row.referensi + ')'));

            const response = await fetchData(
              '{{ session('TOKEN') }}',
              link_api.loadJurnalLinkKas + jenis, row
            );
            if (response.success) {
              $('#table_data_detail').datagrid('loadData', msg.data);
            } else {
              $.messager.alert('Error', res.message, 'error');
            }
          } else {
            $('#table_data_detail').datagrid('loadData', []);
            $('#KETERANGAN').textbox('clear')
          }
        }

        /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */
        function browse_data_lokasi(id) {
          $(id).combogrid({
            panelWidth: 380,
            url: link_api.browseLokasi,
            idField: 'uuidlokasi',
            textField: 'nama',
            mode: 'local',
            sortName: 'nama',
            sortOrder: 'asc',
            required: true,
            selectFirstRow: true,
            columns: [
              [{
                  field: 'uuidlokasi',
                  hidden: true
                },
                {
                  field: 'kode',
                  title: 'Kode',
                  width: 150,
                  sortable: true
                },
                {
                  field: 'nama',
                  title: 'Nama',
                  width: 200,
                  sortable: true
                },
              ]
            ],
            onSelect: function(index, row) {
              $("#KODELOKASI").val(row.kode);
            },
          });
        }

        function browse_data_referensi(id) {
          $(id).combogrid({
            panelWidth: 390,
            mode: 'remote',
            idField: 'nama',
            textField: 'nama',
            url: link_api.browseCustomer,
            columns: [
              [{
                  field: 'kode',
                  title: 'Kode',
                  width: 120
                },
                {
                  field: 'nama',
                  title: 'Nama',
                  width: 250
                }
              ]
            ],
            onChange: function(newVal, oldVal) {
              var row = $(id).combogrid('grid').datagrid('getSelected')
              var jenisKas = $('#JENISKAS').combobox('getValue');
              /*if ((jenisKas == 'BANK KELUAR' || jenisKas == 'KAS KELUAR') && row) {
              	ubah_url_combogrid($("#IDPO"),base_url+'atena/Pembelian/Transaksi/PesananPembelian/comboGridforKas/'+row.id,true);
              }*/
            }
          });
        }

        function browse_data_kas_bank(id, jeniskas) {
          jeniskas = jeniskas.toLowerCase();
          $(id).combogrid({
            panelWidth: 370,
            url: link_api.browsePerkiraan,
            url: link_api.browsePerkiraan,
            queryParams: {
              jenis: jeniskas,
              aktif: 1
            },
            idField: 'uuidperkiraan',
            textField: 'kode',
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
              if (row) {
                $('#UUIDCURRENCY').combogrid('setValue', row.uuidcurrency);
                $('#NAMAPERKIRAANKAS').textbox('setValue', row.nama);

              } else {
                $('#NAMAPERKIRAANKAS').textbox('clear');
                $('#UUIDCURRENCY').combogrid('clear');
              }
            }
          });
        }

        async function generate_jurnal_giro() {
          var jeniskas = $('#JENISKAS').combobox('getValue');
          var amountgiro = $('#AMOUNTGIRO').numberbox('getValue');
          var nogiro = $('#NOGIRO').textbox('getValue');
          var bankgiro = $('#NAMABANKGIRO').textbox('getValue');

          if (amountgiro <= 0) {
            $.messager.alert('Peringatan', 'Nominal giro harus lebih besr dari 0', 'warning');

            return false;
          }

          if (nogiro == '') {
            $.messager.alert('Peringatan', 'No. Giro belum diisi', 'warning');

            return false;
          }

          if (bankgiro == '') {
            $.messager.alert('Peringatan', 'Bank Giro belum diisi', 'warning');

            return false;
          }

          try {
            let url = link_api.loadJurnalGiro;
            const response = await fetch(url, {
              method: 'POST',
              headers: {
                'Authorization': 'bearer {{ session('TOKEN') }}',
                'Content-Type': 'application/json',
              },
              body: JSON.stringify({
                jeniskas: jeniskas,
                tglcair: $('#TGLCAIRGIRO').datebox('getValue'),
                nogiro: nogiro,
                amount: amountgiro
              }),
            }).then(response => {
              if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status} from ${url}`);
              }
              return response.json();
            })
            if (response.success) {
              $('#table_data_detail').datagrid('loadData', response.data);
            } else {
              $.messager.alert('Error', response.message, 'error');
            }
          } catch (error) {
            var textError = getTextError(error);
            $.messager.alert('Error', getTextError(error), 'error');
          }
        }

        function browse_data_giro(id) {
          $(id).combogrid({
            panelWidth: 550,
            idField: 'nogiro',
            textField: 'nogiro',
            data: [],
            columns: [
              [{
                  field: 'amount',
                  title: 'Nominal',
                  width: 90,
                  align: 'right',
                  formatter: format_amount,
                },
                {
                  field: 'namabank',
                  title: 'Nama Bank',
                  width: 150
                },
                {
                  field: 'nogiro',
                  title: 'No. Giro',
                  width: 110,
                },
                {
                  field: 'tglcair',
                  title: 'Tgl. Cair',
                  width: 80,
                  formatter: ubah_tgl_indo,
                  align: 'center',
                },
                {
                  field: 'tglterima',
                  title: 'Tgl. Terima',
                  width: 80,
                  formatter: ubah_tgl_indo,
                  align: 'center',
                },
                {
                  field: 'jenistransaksi',
                  title: 'Jenis',
                  width: 80
                },
                {
                  field: 'referensi',
                  title: 'Referensi',
                  width: 150
                },
                {
                  field: 'hutang',
                  hidden: true
                },
                {
                  field: 'piutang',
                  hidden: true
                },
              ]
            ],
            onSelect: async function(index, data) {
              var jenisKas = $('#JENISKAS').combobox('getValue');
              if (jenisKas == 'BANK KELUAR' && data.hutang != 'S') {
                $.messager.alert('Error',
                  'Transaksi Pelunasan Hutang / Piutang Belum Dicetak, Lakukan Cetak Terhadap Pelunasan Terlebih Dahulu',
                  'error');
              } else if (jenisKas == 'BANK MASUK' && data.piutang != 'S') {
                $.messager.alert('Error',
                  'Transaksi Pelunasan Hutang / Piutang Belum Dicetak, Lakukan Cetak Terhadap Pelunasan Terlebih Dahulu',
                  'error');
              } else {
                await get_jurnal_giro();
              }
            }
          });
        }

        function browse_data_currency(id) {
          $(id).combogrid({
            panelWidth: 200,
            url: link_api.browseCurrency,
            idField: 'id',
            textField: 'simbol',
            mode: 'local',
            required: true,
            columns: [
              [{
                  field: 'nama',
                  title: 'Curr',
                  width: 100,
                  sortable: true
                },
                {
                  field: 'simbol',
                  title: 'Simbol',
                  width: 70,
                  sortable: true
                }
              ]
            ],
            onSelect: function(index, data) {
              /*get_kurs ($('#TGLTRANS').datebox('getValue'), $(id).combogrid('getValue'), function(data){
              	$('#NILAIKURS').numberbox('setValue', data.kurs);
              });*/
            }
          });
        }

        /*
        function browse_data_po(id) {
        	$(id).combogrid({
        		panelWidth: 550,
        		url       : base_url+'atena/Pembelian/Transaksi/PesananPembelian/comboGridforKas',
        		idField   : 'idpo',
        		textField : 'kodepo',
        		mode      : 'remote',
        		columns   : [[
        			{field:'kodepo',title:'No PO',width:120, sortable:true},
        			{field:'tgltrans',title:'Tgl Trans',width:80, sortable:true, align:'center'},
        			{field:'namasupplier',title:'Supplier',width:220, sortable:true},
        			{field:'grandtotal',title:'Grand Total',width:110, sortable:true, align:'right', formatter:format_amount},
        		]],
        		onSelect: function(index, data){
        		}
        	});
        }
        */
        function getRowIndex(target) {
          var tr = $(target).closest('tr.datagrid-row');
          return parseInt(tr.attr('datagrid-row-index'));
        }

        var indexDetail = 0;

        function buat_table_detail() {
          var dg = '#table_data_detail';
          $(dg).datagrid({
            rownumbers: true,
            clickToEdit: false,
            dblclickToEdit: true,
            dblclickToEdit: true,
            data: [],
            toolbar: [{
                text: 'Tambah',
                iconCls: 'icon-add',
                handler: function() {
                  var index = $(dg).datagrid('getRows').length;
                  $(dg).datagrid('appendRow', {
                    kodeperkiraan: '',
                  }).datagrid('gotoCell', {
                    index: index,
                    field: 'kodeperkiraan'
                  });
                }
              }, {
                text: 'Hapus',
                iconCls: 'icon-remove',
                handler: function() {
                  $(dg).datagrid('deleteRow', indexDetail);
                  hitung_debet_kredit();
                }
              }
              // ,{
              // text:'Ubah',
              // iconCls:'icon-edit',
              // handler:function(){
              // $(dg).datagrid('editCell', {
              // index: indexDetail,
              // field: 'kodebarang'
              // });
              // }
              // }
            ],
            columns: [
              [{
                  field: 'kodeperkiraan',
                  title: 'Kd. Perkiraan',
                  width: 110,
                  editor: {
                    type: 'combogrid',
                    options: {
                      panelWidth: 530,
                      mode: 'remote',
                      required: true,
                      idField: 'kode',
                      textField: 'kode',
                      method: 'post',
                      url: link_api.browsePerkiraan,
                      queryParams: {
                        jenis: 'detail_non_kasbank',
                        aktif: 1
                      },
                      columns: [
                        [{
                            field: 'kode',
                            title: 'Kode',
                            width: 110
                          },
                          {
                            field: 'nama',
                            title: 'Nama',
                            width: 400
                          },
                        ]
                      ],
                    }
                  }
                },
                {
                  field: 'namaperkiraan',
                  title: 'Nama Perkiraan',
                  width: 400
                },
                {
                  field: 'saldo',
                  title: 'Saldo',
                  width: 70,
                  editor: {
                    type: 'combobox',
                    options: {
                      required: true,
                      data: [{
                        value: 'DEBET',
                        text: 'DEBET'
                      }, {
                        value: 'KREDIT',
                        text: 'KREDIT'
                      }],
                      panelHeight: 'auto',
                    }
                  }
                },
                {
                  field: 'amount',
                  title: 'Nominal',
                  align: 'right',
                  width: 100,
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      required: true,
                      min: 0
                    }
                  },
                  sortable: false,
                  sorter: function(a, b) {
                    a = parseFloat(a.replace(',', ''));
                    b = parseFloat(b.replace(',', ''));

                    return (a > b ? 1 : -1);
                  }
                },
                {
                  field: 'uuidcurrency',
                  title: 'Curr Kode',
                  width: 50,
                  hidden: true,
                },
                {
                  field: 'currency',
                  title: 'Curr',
                  width: 50,
                  hidden: false,
                  editor: {
                    type: 'combogrid',
                    options: {
                      panelWidth: 200,
                      mode: 'remote',
                      required: true,
                      idField: 'simbol',
                      textField: 'simbol',
                      url: link_api.browseCurrency,
                      columns: [
                        [{
                            field: 'nama',
                            title: 'Curr',
                            width: 100
                          },
                          {
                            field: 'simbol',
                            title: 'Simbol',
                            width: 70
                          },
                        ]
                      ],
                    }
                  }
                },
                {
                  field: 'nilaikurs',
                  title: 'Kurs ({{ session('SIMBOLCURRENCY') }})',
                  align: 'right',
                  width: 80,
                  hidden: false,
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      required: true
                    }
                  }
                },
                {
                  field: 'amountkurs',
                  title: 'Nominal ({{ session('SIMBOLCURRENCY') }})',
                  align: 'right',
                  width: 110,
                  hidden: false,
                  formatter: format_amount
                },
                {
                  field: 'keterangan',
                  title: 'Keterangan',
                  width: 350,
                  editor: {
                    type: 'validatebox',
                    options: {
                      required: true,
                      validType: 'length[0,300]'
                    }
                  }
                },
              ]
            ],
            onClickRow: function(index, row) {
              indexDetail = index;
            },
            onLoadSuccess: function(data) {
              hitung_debet_kredit();
            },
            onAfterDeleteRow: function(index, row) {
              if (row.tanda == 1) {
                $(dg).datagrid('insertRow', {
                  index: index,
                  row: row
                });
                $.messager.alert('Warning', 'Akun dari Jurnal Program Tidak Boleh Dihapus', 'warning');
              }
              hitung_debet_kredit();
            },
            onCellEdit: function(index, field, val) {
              var row = $(this).datagrid('getRows')[index];
              var ed = get_editor('#table_data_detail', index, field);

              switch (field) {
                case 'kodeperkiraan':
                case 'currency':
                  ed.combogrid('showPanel');
                  break;
                case 'saldo':
                  ed.combobox('showPanel');
                  break;
              }
            },
            onBeforeCellEdit: function(index, field) {
              var row = $(this).datagrid('getRows')[index];
              if (row.uuidcurrency == '{{ session('UUIDCURRENCY') }}' && field ==
                'nilaikurs') // jika tandakurs = 1, maka nilaikurs tidak boleh diedit
                return false;
            },
            onEndEdit: function(index, row, changes) {
              var cell = $(this).datagrid('cell');
              var ed = get_editor('#table_data_detail', index, cell.field);
              var row_update = {};

              switch (cell.field) {
                case 'kodeperkiraan':
                  var data = ed.combogrid('grid').datagrid('getSelected');

                  var uuid = data ? data.uuidperkiraan : '';
                  var nama = data ? data.nama : '';
                  var saldo = data ? data.saldo : '';
                  var uuidcurrency = data ? data.uuidcurrency : '{{ session('UUIDCURRENCY') }}';
                  var simbolcurrency = data ? data.simbolcurrency : '{{ session('SIMBOLCURRENCY') }}';

                  var jtrans = $('#JENISKAS').combobox('getValue');
                  if (jtrans.search(/Masuk/i) > 0) {
                    saldo = 'KREDIT';
                  } else if (jtrans.search(/Keluar/i) > 0) {
                    saldo = 'DEBET';
                  } else {
                    saldo = '';
                  }

                  row_update = {
                    uuidperkiraan: uuid,
                    namaperkiraan: nama,
                    uuidcurrency: uuidcurrency,
                    currency: simbolcurrency,
                    saldo: saldo,
                    nilaikurs: 1,
                    amount: 0,
                    amountkurs: 0,
                    keterangan: $('#KETERANGAN').textbox('getValue'),
                  };
                  break;
                case 'currency':
                  var data = ed.combogrid('grid').datagrid('getSelected');
                  row_update = {
                    uuidcurrency: data ? data.uuid : '',
                    nilaikurs: 1,
                  };
                  break;
                case 'nilaikurs':
                  var nilaikurs = ed.numberbox('getValue');
                  if (row.uuidcurrency == '{{ session('UUIDCURRENCY') }}' && nilaikurs > 1) {
                    nilaikurs = 1;
                  }

                  row_update = {
                    nilaikurs: nilaikurs,
                  };
                  break;
              }

              if (jQuery.isEmptyObject(row_update) == false) {
                $(this).datagrid('updateRow', {
                  index: index,
                  row: row_update
                });
              }
            },
            onAfterEdit: function(index, row, changes) {
              $(this).datagrid('updateRow', {
                index: index,
                row: {
                  amountkurs: row.nilaikurs * row.amount
                }
              });

              hitung_debet_kredit();

              // cek jika salah satu akun detil sama dengan akun kas/bank di header maka hapus detailnya
              var kodeheader = $('#UUIDPERKIRAANKAS').combogrid('getValue');
              if (kodeheader == row.kodeperkiraan) {
                $.messager.alert('Error', 'Kode Perkiraan tidak boleh sama dengan Akun Kas/Bank', 'error');
                $(this).datagrid('deleteRow', index);
              }
            }
          }).datagrid('enableCellEditing');
        }

        function clear_plugin() {
          $('.combogrid-f').each(function() {
            $(this).combogrid('grid').datagrid('load', {
              q: ''
            });
          });

          $('#UUIDCURRENCY').combogrid('setValue', '{{ session('UUIDCURRENCY') }}');

          $("#TGLTRANS").add($("#TGLCAIRGIRO")).
          add($("#txt_tgl_aw")).add($("#txt_tgl_ak")).datebox('setValue', date_format());

          //$('#JENISKAS').combobox('setValue', 'KAS MASUK');

          $('.number').numberbox('setValue', 0);
          $('#NILAIKURS').numberbox('setValue', 1);
        }
      </script>
    @endpush
