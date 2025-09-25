@extends('template.form')

@section('content')
  <div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            <script>
              if (screen.height < 450) {
                $("#trans_layout").css('height', "450px");
              }
            </script>
            <div data-options="region:'north',border:false" style="width:100%; height:220px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;">
              </div>

              <input type="hidden" id="mode" name="mode">
              <input type="hidden" id="CEKLIMITPIUTANG" name="ceklimitpiutang">
              <input type="hidden" id="CEKLIMITNOTA" name="ceklimitnota">
              <input type="hidden" id="CEKNOTAJATUHTEMPO" name="ceknotajatuhtempo">
              <input type="hidden" id="APPROVE" name="approve">
              <input type="hidden" id="tglentry" name="tglentry">

              <table>
                <tr>
                  <td valign="top">
                    <fieldset style="height:200px;">
                      <legend id="label_laporan">Info Transaksi</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form">No. Penjualan</td>
                          <td id="label_form">
                            <input name="kodejual" id="KODEJUAL" class="label_input" style="width:190px"
                              prompt="Auto Generate" readonly>
                            <input type="hidden" id="IDPENJUALAN" name="uuidjual">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Jenis</label></td>
                          <td>
                            <label id="label_form">
                              <input type="radio" id="jenispesanan" name="jenis" value="Pesanan" checked> Pesanan
                            </label>
                            <label id="label_form">
                              <input type="radio" name="jenis" id="jenislangsung" value="Langsung"> Langsung
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Lokasi</td>
                          <td id="label_form"><input name="uuidlokasi" id="IDLOKASI" style="width:190px"></td>
                          <input type="hidden" id="KODELOKASI" name="kodelokasi">
                        </tr>
                        <tr>
                          <td id="label_form">Tgl. Trans</td>
                          <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date" style="width:190px">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Syarat Bayar</td>
                          <td id="label_form">
                            <input name="uuidsyaratbayar" id="IDSYARATBAYAR" class="label_input" style="width:90px">
                            <input name="tgljatuhtempo" id="TGLJATUHTEMPO" readonly class="date" style="width:97px">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">No Pajak</td>
                          <td id="label_form"><input name="nofakturpajak" id="NOFAKTURPAJAK" class="label_input"
                              style="width:190px"></td>
                        </tr>
                        <tr>
                          <td id="label_form">Marketing</td>
                          <td colspan=2>
                            <input name="uuidmarketing" class="label_input" id="IDMARKETING" style="width:190px">
                            <input type="hidden" id="KODEMARKETING" name="kodemarketing">
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td valign="top" align="left">
                    <div id="tab_trans" class="easyui-tabs" style="width:400px;height:200px; margin-top:5px;">
                      <div title="Info Pelanggan">
                        <table border="0" id="tabel_pembelian_retur">
                          <tr>
                            <td id="label_form" align="left">Kode</td>
                            <td align="right">
                              <input name="kodecustomer" class="label_input" id="KODECUSTOMER" style="width:100px"
                                readonly prompt="Kode Customer">
                              <input type="hidden" id="IDCUSTOMER" name="uuidcustomer">
                            </td>
                            <td align="right">
                              <input name="namacustomer" class="label_input" id="NAMACUSTOMER" style="width:210px"
                                readonly prompt="Nama Customer">
                            </td>
                          </tr>
                          <tr {{ session('GUNAKANALIASPENJUALAN') == 'YA' ? '' : 'hidden' }}>
                            <td id="label_form" align="left">Alias</td>
                            <td colspan="2" align="right">
                              <input name="namacustomeralias" class="label_input" id="NAMACUSTOMERALIAS"
                                style="width:313px">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form" style="vertical-align: super;">Alamat</td>
                            <td align="right" colspan="2">
                              <textarea name="alamat" class="label_input" id="ALAMAT" readonly prompt="Alamat Customer" multiline="true"
                                style="width:313px; height:50px" data-options="validType:'length[0, 500]'"></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form" align="left">Telp</td>
                            <td align="right" colspan="2">
                              <input name="telp" class="label_input" id="TELP" style="width:313px" readonly
                                prompt="Telp Customer">
                            </td>
                          </tr>
                          <tr id="opsi-jual-langsung">
                            <td id="label_form" align="left"></td>
                            <td align="left" colspan="2">
                              <a class="easyui-linkbutton" onclick="javascript:openAntrian()">Cari Antrian
                                Penjualan</a>
                              <a class="easyui-linkbutton" onclick="tampil_window_repacking()">Cari Repacking</a>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div title="Info Pengeluaran">
                        <table border="0">
                          <tr id="tr_pengeluaran">
                            <td id="label_form" align="left">No. Pengeluaran</td>
                            <td id="label_form" align="left" colspan="2"><input name="uuidbbk" id="IDBBK"
                                style="width:254px"></td>
                            <input type="hidden" id="KODEBBK" name="kodebbk">
                          </tr>
                          <tr>
                            <td id="label_form">SO</td>
                            <td id="label_form"><input name="kodeso" id="KODESO" class="label_input"
                                style="width:150px" readonly></td>
                            <input type="hidden" id="IDSO" name="uuidso">
                            <td id="label_form"><input name="tglso" id="TGLSO" readonly class="date"
                                style="width:100px"></td>
                          </tr>
                          <tr>
                            <td id="label_form">DO</td>
                            <td id="label_form"><input name="kodedo" id="KODEDO" class="label_input"
                                style="width:150px" readonly></td>
                            <input type="hidden" id="IDDO" name="uuiddo">
                            <td id="label_form"><input name="tgldo" id="TGLDO" readonly class="date"
                                style="width:100px"></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </td>
                  <td colspan="2" valign="bottom">
                    <table border="0">
                      <tr></tr>
                      <tr>
                        <td id="label_form">
                          <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                            style="width:300px; height:85px" data-options="validType:'length[0, 500]'"></textarea>
                        </td>
                      </tr>
                      <tr id="form-barcode">
                        <td>
                          <label id="label_form" style="font-size:17pt;margin:3px;">Barcode
                            <input name="BARCODE" class="label_input" id="BARCODE"
                              style="width:200px;height:30px;"></label>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </div>
            <div data-options="region:'center',border:false">
              <div class="easyui-tabs" plain='true' fit="true">
                <div title="Detail Transaksi">
                  <table id="table_data_detail" fit="true"></table>
                </div>
                <div title="Rekapitulasi Barang">
                  <table id="table_data_detail_rekap" fit="true"></table>
                </div>
              </div>
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:75px;">
              <table id="trans_footer" width="100%">
                <tr>
                  <td colspan="2" align='right' id="td_footer">
                    <table>
                      <tr hidden>
                        <td id="label_form" align="right">
                          Total <input name="total" id="TOTAL" class="number " style="width:110px;" readonly>
                        </td>
                      </tr>
                      <tr>
                        <td align="right" id="label_form">
                          Diskon <input name="discpersen" id="DISCPERSEN"
                            data-options="precision:2,decimalSeparator:'.',suffix:'%'" class="number"
                            style="width:55px;">&nbsp;&nbsp;&nbsp;
                          <input name="discrp" id="DISCRP" class="number" style="width:110px;" readonly>
                        </td>
                        <td id="label_form" align="right" hidden>
                          Total Setelah Diskon <input name="totalsetelahdiskon" id="TOTALSETELAHDISKON" class="number "
                            style="width:110px;" readonly>
                        </td>
                        <td id="label_form" align="right" hidden>
                          DPP <input name="txt_dpp" id="txt_DPP" class="number " style="width:110px;" readonly
                            required="true">
                        </td>
                        <td id="label_form" align="right">
                          Barang Tidak Kena Pajak <input name="barangtidakkenapajak" id="BARANGTIDAKKENAPAJAK"
                            class="number " style="width:110px;" readonly>
                        </td>
                        <td id="label_form" align="right">
                          Barang Kena Pajak <input name="barangkenapajak" id="BARANGKENAPAJAK" class="number "
                            style="width:110px;" readonly>
                        </td>
                        <td align="right">
                          <label id="label_form">PPN
                            <input name="ppnrp" id="PPNRP" class="number" style="width:110px;" readonly>
                          </label>
                        </td>
                        <td id="label_form" align="right">
                          Pembulatan <input name="pembulatan" id="PEMBULATAN" class="number " style="width:110px;">
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User
                      Input
                      :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl.
                      Input :</label> <label id="lbl_tanggal"></label>
                  </td>
                  <td align='right' id="td_footer_total">
                    <table>
                      <tr>
                        <td id="label_form" align="right">
                          Uang Muka <input name="uangmuka" id="UANGMUKA" class="number " style="width:110px;"
                            readonly>
                        </td>
                        <td id="label_form" align="right">
                          Grand Total <input name="grandtotal" id="GRANDTOTAL" class="number " style="width:110px;"
                            readonly>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <input type="hidden" id="data_detail" name="data_detail">
              <input type="hidden" id="jenistransaksi" name="jenistransaksi" value="JUAL">
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

        <a title="Simpan" class="easyui-linkbutton button_add" id='simpan' onclick="before_simpan(this.id)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan</a><br><br>
        <a title="Simpan & Cetak" class="easyui-linkbutton button_add_print" id='simpan_cetak'
          onclick="before_simpan(this.id)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan &
          Cetak</a>

        <div>
    </center>
  </div>

  <div id="form_antrian" title="Daftar Antrian Penjualan">
    <table style="padding:5px">
      <tr>
        <td id="label_form" align="left">No. Antrian</td>
        <td align="right">
          <input name="kodeorderjual" class="label_input" id="KODEORDERJUAL" style="width:290px"
            prompt="No Antrian Penjualan">
        </td>
      </tr>
    </table>
  </div>

  <div id="window_repacking" title="Daftar Repacking" style="width: 475px; height: 300px">
    <div class="easyui-layout" style="height: 100%;width: 100%">
      <div data-options="region: 'north'" style="height: 50px;">
        <table style="padding:5px">
          <tr>
            <td id="label_form" align="left">No. Repacking</td>
            <td align="right">
              <input class="label_input" id="IDREPACKING" style="width:250px">
              <a class="easyui-linkbutton" onclick="tambah_repacking()">Tambah</a>
            </td>
          </tr>
        </table>
      </div>

      <div data-options="region: 'center'">
        <table id="table_detail_repacking" fit="true"></table>
      </div>
    </div>
  </div>

  <div id="toolbar">
    <a id="toolbar-tambah" title="Tambah" data-options="iconCls:'icon-add',plain: true" class="easyui-linkbutton"
      onclick="tambah_detail()">Tambah</a>
    <a id="toolbar-hapus" title="Hapus" data-options="iconCls:'icon-remove',plain: true" class="easyui-linkbutton"
      onclick="hapus_detail()">Hapus</a>
  </div>

  <div id="form_cetak" title="Preview" style="width:680px; height:450px">
    <div id="area_cetak"></div>
  </div>

  <div id="form_cetak_sj" title="Preview" style="width:680px; height:450px">
    <div id="area_cetak_sj"></div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('assets/js/utils.js') }}"></script>
  <script>
    const jwt = '{{ session('TOKEN') }}';
    var olddiskonpersen = 0.00;
    var olddiskonrp = 0.00;
    var olddiskonglobalrp = 0.00;
    var oldharga = 0.00;
    var oldjmlpenjualan = 0.00;
    var cekbtnsimpan = true; //CEK APAKAH TOMBOL SIMPAN BISA DITEKAN ATAU BELUM (SUPAYA TIDAK TERKLIK 2x)
    var defaultpakaippn = "{{ session('DEFAULTPAKAIPPN') }}";
    var cekbarangnonstok = false;
    var ppnpersenaktif = 0;
    let transreferensi = null;
    let row = {};
    let prosessimpan = false;

    // menyimpan nilai uang muka sebelum disesuaikan dengan grandtotal
    var uangmuka = 0;
    let LIHATHARGA;
    let INPUTHARGA;
    let TRANSAKSI;
    let LIHATHARGABELI;
    let TAMPILHARGAJUALMINIMUM;

    $(document).ready(async function() {
      await getConfigPenjualan();
      setViewPenjualan();

      //TAMBAH CHECK AKSES CETAK
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}',
        function(data) {
          data = data.data;
          var UT = data.cetak;
          if (UT == 1) {
            $('#simpan_cetak').css('filter', '');
          } else {
            $('#simpan_cetak').css('filter', 'grayscale(100%)');
            $('#simpan_cetak').removeAttr('onclick');
          }
        },
        '{{ $mode }}' == 'tambah' // set tanpa loader
      );

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
            export_excel('Faktur Penjualan', $("#area_cetak").html());
            return false;
          }
        }]
      }).window('close');

      $("#form_cetak_sj").window({
        collapsible: false,
        minimizable: false,
        tools: [{
          text: '',
          iconCls: 'icon-print',
          handler: function() {
            $("#area_cetak_sj").printArea({
              mode: 'iframe'
            });
          }
        }, {
          text: '',
          iconCls: 'icon-excel',
          handler: function() {
            export_excel('Surat Jalan', $("#area_cetak_sj").html());
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

      browse_data_lokasi('#IDLOKASI');
      browse_data_syaratbayar('#IDSYARATBAYAR');
      browse_data_marketing('#IDMARKETING');
      browse_data_customer('#KODECUSTOMER');
      browse_data_bbk('#IDBBK');
      browse_data_repacking('#IDREPACKING');
      browse_data_order_jual('#KODEORDERJUAL');

      $("#form_antrian").dialog({
        onOpen: function() {
          if ($("#mode").val() == "tambah") {
            //ubah url jual sesuai dengan jenis transaksi
            ubah_url_combogrid($("#KODEORDERJUAL"), link_api.browseOrderJual, true);
          }
        },
      }).dialog('close');

      $("#window_repacking").dialog({
        onOpen: function() {
          var idlokasi = $('#IDLOKASI').combogrid('getValue');

          var url = link_api.browsePenjualanLangsungRepacking;

          //   ubah_url_combogrid($('#IDREPACKING'), url, true);
          $('#IDREPACKING').combogrid('grid').datagrid('options').url = url;
          $('#IDREPACKING').combogrid('clear');
          $('#IDREPACKING').combogrid('grid').datagrid('load', {
            uuidlokasi: idlokasi,
            q: ''
          });
        }
      }).dialog('close');

      var tb = $('#NOFAKTURPAJAK').textbox('textbox');
      tb.mask('000.000-00.00000000');

      $('#TGLTRANS').datebox({
        onChange: function(newValue, oldValue) {
          var jenis = $('[name=jenis]:checked').val();

          if (jenis == 'Pesanan') {
            var row_bbk = $('#IDBBK').combogrid('grid').datagrid('getSelected');

            if (row_bbk) {
              var time_jual = Date.parse(newValue);
              var time_bbk = Date.parse(row_bbk.tgltrans);

              if (time_jual < time_bbk) {
                $.messager.alert(
                  'Error', 'Tanggal penjualan tidak boleh sebelum tanggal pengeluaran yang dipilih', 'error'
                );

                $(this).datebox('setValue', oldValue);

                return false;
              }
            }
          }

          if ($('#mode').val() == 'tambah') {
            hitung_stok();
          }

          var row = $('#IDSYARATBAYAR').combogrid('grid').datagrid('getSelected');

          if ($('#mode').val() != '' && row) {
            get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), row.selisih);
          }

          set_ppn_aktif(newValue,
            'Bearer {{ session('TOKEN') }}',
            function(
              response) {
              response = response.data;
              ppnpersenaktif = response.ppnpersen;

              update_ppn_table_detail($('#table_data_detail'), ppnpersenaktif, function(index, row) {

                hitung_subtotal_detail(index, row, 1);
              });

              hitung_grandtotal();
            });
        },
      });

      $("[name=pakaippn]").change(function() {
        $("#PPNPERSEN").numberbox('setValue', $(this).val() == 0 ? 0 : ppnpersenaktif);
        hitung_grandtotal();
      });

      $("[name=pakaipph]").change(function() {
        $("#PPHPERSEN").numberbox('setValue', $(this).val() == 0 ? 0 : {{ session('PPH22PERSEN') }});
        hitung_grandtotal();
      });

      $('#DISCPERSEN').textbox({
        onChange: function(newValue, oldValue) {
          total = $('#TOTAL').numberbox('getValue');
          diskon = $('#DISCPERSEN').numberbox('getValue');
          var data = $("#table_data_detail").datagrid('getRows');
          console.log('data', data.length, data);
          for (var i = 0; i < data.length; i++) {
            oldharga = data[i].harga;
            olddiskonpersen = data[i].discpersen;
            olddiskonrp = data[i].disc;

            var mindiskon = '';

            if (parseFloat(data[i].disccustomermin) > 0) {
              mindiskon = data[i].disccustomermin;
            } else if (parseFloat(data[i].disctipecustomermin) > 0) {
              mindiskon = data[i].disctipecustomermin;
            } else if (parseFloat(data[i].discmerkmin) > 0) {
              mindiskon = data[i].discmerkmin;
            }

            var mindiskonakumulasi = hitungAkumulasiDiskonPersen(mindiskon);

            if (hitungAkumulasiDiskonPersen(olddiskonpersen) < mindiskonakumulasi) {
              $('#table_data_detail').datagrid('updateRow', {
                index: i,
                row: {
                  discpersen: mindiskon
                }
              });

              data[i] = $('#table_data_detail').datagrid('getRows')[i];
            }


            hitung_subtotal_detail(i, data[i], 2);
          }

          $('#DISCRP').numberbox('setValue', (total * (diskon / 100))).prop('readonly', (diskon > 0 ? true :
            false));

          hitung_grandtotal();
        },
      });

      $('#DISCRP').numberbox({
        onChange: function() {
          hitung_grandtotal();
        }
      });

      $("#NAMACUSTOMER").textbox({
        prompt: 'Nama Customer'
      });
      $("#ALAMAT").textbox({
        prompt: 'Alamat Customer'
      });
      $("#TELP").textbox({
        prompt: 'Telp Customer'
      });

      $('#PEMBULATAN').numberbox({
        onChange: function() {
          hitung_grandtotal();
        }
      });

      $('[name=jenis]').change(function() {
        ubahJenis();
      });

      $('#BARCODE').textbox('textbox').bind('keydown', function(e) {
        if (e.keyCode == 13) { // when press ENTER key, accept the inputed value.
          if ($('#IDCUSTOMER').val() == '') {
            $.messager.alert('Error', 'Anda belum memilih customer', 'Error');

            return false;
          }

          insert_barang($(this).val());

          $(this).val('');
        }
      });

      buat_table_detail();
      buat_table_detail_rekap();
      buat_table_detail_repacking();

      {{ $mode }}();
    });

    shortcut.add('F8', function() {
      simpan();
    });

    function ubahJenis() {
      var val = $('[name=jenis]:checked').val();
      var mode = $('#mode').val();

      if (val == 'Langsung') {
        $('#KODECUSTOMER').combogrid({
          required: true,
          readonly: false
        });

        $('#tab_trans').tabs('disableTab', 1);

        $('#tab_trans').tabs('select', 0);

        $('#opsi-jual-langsung').show();

        $('#toolbar-tambah').linkbutton('enable');
        $('#toolbar-hapus').linkbutton('enable');

        $('#jenistransaksi').val('JUAL LANGSUNG');

        $('#IDLOKASI').combogrid({
          required: true,
          readonly: false
        });

        if (mode == 'tambah') {
          $('#IDBBK').combogrid('clear');
          $('#IDBBK').combogrid({
            required: false
          });
          $('#KODEBBK').val('');
          $('#KODESO').textbox('clear');
          $('#TGLSO').datebox('clear');
          $('#KODEDO').textbox('clear');
          $('#TGLDO').datebox('clear');

          $('#form-barcode').show();

          $('#table_data_detail').datagrid('options').RowAdd = true;
          $('#table_data_detail').datagrid('options').RowDelete = true;

          $('#CATATAN').textbox('clear');
          $('#NAMACUSTOMER').textbox('clear');
          $('#ALAMAT').textbox('clear');
          $('#TELP').textbox('clear');
        }
      } else if (val == 'Pesanan') {
        $('#KODECUSTOMER').combogrid({
          required: false,
          readonly: true
        });

        $('#IDLOKASI').combogrid({
          required: false,
          readonly: true
        });

        $('#IDBBK').combogrid({
          required: true
        });

        $('#tab_trans').tabs('enableTab', 1);

        $('#tab_trans').tabs('select', 1);

        $('#opsi-jual-langsung').hide();

        //$('#toolbar-tambah').linkbutton('disable');
        //$('#toolbar-hapus').linkbutton('disable');

        $('#jenistransaksi').val('JUAL');

        $('#form-barcode').hide();

        //$('#table_data_detail').datagrid('options').RowAdd = false;
        //$('#table_data_detail').datagrid('options').RowDelete = false;
      }

      if (mode == 'tambah') {
        reset_detail();
      } else if (mode == 'ubah') {
        $('#jenistransaksi').val(row.jenistransaksi);
      }
    }

    function tutup() {
      parent.tutupTab();
    }

    async function cetak(id, npwp) {
      //SURAT JALAN
      const docSJ = await getCetakDocument(
        jwt, link_api.cetakSJPenjualanPenjualan + id, {
          bentuk_cetak: "besar"
        }
      );

      if (docSJ) {
        $("#area_cetak_sj").html(docSJ);
      } else {
        $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data untuk cetak transaksi', 'warning');
        return false;
      }
      $("#form_cetak_sj").window('open');

      //NOTA
      $("#window_button_cetak").window('close');
      const doc = await getCetakDocument(
        jwt, link_api.cetakPenjualanPenjualan + id, {
          npwp: npwp
        }
      );

      if (doc) {
        $("#area_cetak").html(doc);
      } else {
        $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data untuk cetak transaksi', 'warning');
        return false;
      }
      $("#form_cetak").window('open');
    }

    function tambah() {
      $('#mode').val('tambah');
      $("#jenistransaksi").val('JUAL');
      $("#APPROVE").val('0');

      $('#jenispesanan').prop('checked', true);

      ubahJenis();

      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#IDLOKASI').combogrid('readonly');
      $('#IDBBK').combogrid('readonly', false);
      $('#TGLTRANS').datebox('readonly', false);

      $('#jenispesanan').prop('disabled', false);
      $('#jenislangsung').prop('disabled', false);

      idtrans = "";
      urlbbk = link_api.browsePenjualanBarangKeluar;

      fetchData(
        jwt, link_api.getLokasiDefault
      ).then(res => {
        if (res.success && res.data.uuidlokasi != null) {
          $('#IDLOKASI').combogrid('setValue', res.data.uuidlokasi);
          $("#KODELOKASI").val(res.data.kodelokasi);
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      }).catch(err => {
        const error = typeof err === 'string' ? err : err.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      });

      clear_plugin();
      reset_detail();

      fill_form_transreferensi();
    }

    async function fill_form_transreferensi() {
      const idref = '{{ $dataref }}';
      if (idref) {
        try {
          const res = await fetchData(
            jwt, link_api.loadDataHeaderInventoryBarangKeluar, {
              uuidbbk: idref
            }
          );
          if (res.success) {
            transreferensi = res.data;
          } else {
            throw res.message || 'Gagal memuat data';
          }
        } catch (e) {
          const error = typeof e === 'string' ? e : e.message;
          const textError = getTextError(error);
          $.messager.alert('Error', textError, 'error');
          return;
        }
      }
      // jika memuat data SO dari grid antrian,
      // maka tampilkan data SO
      if (transreferensi != null) {

        $('#jenispesanan').prop('checked', true);

        $('#jenistransaksi').val('JUAL');

        ubahJenis();

        $('#IDCUSTOMER').val(transreferensi.uuidreferensi);

        $('#IDLOKASI').combogrid('setValue', {
          uuidlokasi: transreferensi.uuidlokasi,
          nama: transreferensi.namalokasi
        });

        $("#KODELOKASI").val(transreferensi.kodelokasi);

        $('#IDMARKETING').combogrid('setValue', {
          uuidkaryawan: transreferensi.uuidmarketing,
          nama: transreferensi.namamarketing
        });

        $('#IDSYARATBAYAR').combogrid('setValue', {
          uuidsyaratbayar: transreferensi.uuidsyaratbayar
        });

        if (transreferensi.uuidsyaratbayar != null) {
          fetchData(
            jwt, link_api.getHeaderSyaratBayar, {
              uuidsyaratbayar: transreferensi.uuidsyaratbayar
            }
          ).then(res => {
            if (res.success) {
              get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), res.data.selisih);
            } else {
              $.messager.alert('Error', res.message, 'error');
            }
          }).catch(err => {
            const error = typeof err === 'string' ? err : err.message;
            const textError = getTextError(error);
            $.messager.alert('Error', textError, 'error');
          });
        }

        var alamatcustomer = '';

        if (transreferensi.alamatcustomer) {
          alamatcustomer = transreferensi.alamatreferensi + "\r\n";
        }

        if (transreferensi.kota && transreferensi.kota != null) {
          alamatcustomer += transreferensi.kotareferensi;
        }

        if (transreferensi.propinsi && transreferensi.propinsi != null) {
          alamatcustomer += "-" + transreferensi.propinsireferensi;
        }

        if (transreferensi.negara && transreferensi.negara != null) {
          alamatcustomer += "-" + transreferensi.negarareferensi;
        }

        $("#KODECUSTOMER").textbox('setValue', transreferensi.kodereferensi);
        $('#ALAMAT').textbox('setValue', alamatcustomer);
        $('#TELP').textbox('setValue', transreferensi.telpreferensi);
        $('#NAMACUSTOMER').textbox('setValue', transreferensi.namareferensi);

        $('#IDBBK').combogrid('grid').datagrid('loadData', [{
          uuidbbk: transreferensi.uuidbbk,
          kodebbk: transreferensi.kodebbk,
          namacustomer: transreferensi.namacustomer,
          kodeso: transreferensi.kodeso,
          kodedo: transreferensi.kodedo,
          kodelokasi: transreferensi.kodelokasi,
          tgltrans: transreferensi.tgltrans,
          username: transreferensi.userbuat,
        }]);

        $('#IDBBK').combogrid('setValue', transreferensi.uuidbbk);

        $('#KODEBBK').val(transreferensi.kodebbk);
        $('#KODESO').textbox('setValue', transreferensi.kodeso);
        $('#TGLSO').datebox('setValue', transreferensi.tglso);
        $('#KODEDO').textbox('setValue', transreferensi.kodedo);
        $('#TGLDO').datebox('setValue', transreferensi.tgldo);

        fetchData(
          jwt, link_api.loadDataUangMukaSO, {
            uuidbbk: transreferensi.uuidbbk
          }
        ).then(res => {
          if (res.success) {
            uangmuka = res.data.uangmuka;
            $('#UANGMUKA').numberbox('setValue', res.data.uangmuka);

            if (transreferensi.catatan && transreferensi.catatan != null) {
              $("#CATATAN").textbox('setValue', transreferensi.catatan);
            }

            reset_detail();
            load_data_detail(transreferensi.uuidbbk, false);
          } else {
            $.messager.alert('Error', res.message, 'error');
          }
        }).catch(err => {
          const error = typeof err === 'string' ? err : err.message;
          const textError = getTextError(error);
          $.messager.alert('Error', textError, 'error');
        });
      }
    }

    async function ubah() {
      $(':radio:not(:checked)').attr('disabled', false);
      $('#mode').val('ubah');

      try {
        const res = await fetchData(
          jwt, link_api.loadDataHeaderPenjualanPenjualan, {
            uuidjual: '{{ $data }}'
          }
        );
        if (res.success) {
          row = res.data;
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        const error = typeof e === 'string' ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }

      if (row) {
        get_status_trans(jwt, "atena/penjualan/penjualan", "uuidjual", row.uuidjual, function(data) {
          data = data.data;
          $(".form_status").html(status_transaksi(data.status));
        });

        if (row.tgldo == "0000-00-00") {
          $("#TGLDO").datebox('clear');
        } else if (row.tglso == "0000-00-00") {
          $("#TGLSO").datebox('clear');
        } else if (row.tglbbk == "0000-00-00") {
          $("#TGLBBK").datebox('clear');
        }

        if (row.maxcredit > 0) {
          $('#CEKLIMITPIUTANG').val(true);
        }

        if (row.maxnota > 0) {
          $('#CEKLIMITNOTA').val(true);
        }

        if (row.ceknotajatuhtempo == 1) {
          $("#CEKNOTAJATUHTEMPO").val(true);
        }

        get_akses_user(
          '{{ $kodemenu }}',
          'bearer {{ session('TOKEN') }}',
          function(data) {
            data = data.data;
            var UT = data.ubah;
            get_status_trans(jwt, "atena/penjualan/penjualan", "uuidjual", row.uuidjual, function(data) {
              if (UT == 1 && data.data.status == 'I') {
                $('#btn_simpan_modal').css('filter', '');
                $('#mode').val('ubah');
              } else {
                $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                $('#btn_simpan_modal').removeAttr('onclick');
              }

              $("#form_input").form('load', row);

              $('#jenislangsung, #jenispesanan').prop('disabled', true);

              if (row.jenistransaksi == 'JUAL LANGSUNG' || row.jenistransaksi == 'POS') {
                $('#jenislangsung').prop('checked', true);
              } else if (row.jenistransaksi == 'JUAL') {
                $('#jenispesanan').prop('checked', true);
              }

              if (row.jenistransaksi == 'POS') {
                $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                $('#btn_simpan_modal').removeAttr('onclick');
              }

              ubahJenis();

              $('#IDLOKASI').combogrid('readonly');
              $('#IDBBK').combogrid('readonly');
              $('#TGLTRANS').datebox('readonly');

              $('#IDBBK').combogrid('setValue', {
                uuidbbk: row.uuidbbk,
                kodebbk: row.kodebbk
              });

              $('#IDLOKASI').combogrid('setValue', {
                uuidlokasi: row.uuidlokasi,
                nama: row.namalokasi
              });

              var alamat = row.alamat == "" || row.alamat == null ? "" : (row.alamat + "\r\n");
              if (row.kota && row.kota != 'null') alamat += row.kota;
              if (row.propinsi && row.propinsi != 'null') alamat += "-" + row.propinsi;
              if (row.negara && row.negara != 'null') alamat += "-" + row.negara;

              $('#IDCUSTOMER').val(row.uuidcustomer);
              $('#KODECUSTOMER').textbox('setValue', row.kodecustomer);
              $('#NAMACUSTOMER').textbox('setValue', row.namacustomer);
              $('#ALAMAT').textbox('setValue', alamat);
              $('#TELP').textbox('setValue', row.telp);

              uangmuka = row.uangmuka;

              idtrans = row.uuidjual;
              load_data(row.uuidjual);
              load_data_rekap(row.uuidjual);

              $('#lbl_kasir').html(row.userbuat);
              $('#lbl_tanggal').html(row.tglentry);

            });
          },
          false
        );
      }
    }

    function before_simpan(jenis_simpan) {
      simpan(jenis_simpan);
    }

    async function simpan(jenis_simpan) {
      $(':radio:not(:checked)').attr('disabled', false);
      var mode = $("#mode").val();

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

      var isValid = $('#form_input :input').form('validate');

      $('#window_button_simpan').window('close');

      $("#APPROVE").val('0');

      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        cekbtnsimpan = false;
        if (!isTokenExpired(jwt)) {
          prosessimpan = true;
          try {
            tampilLoaderSimpan();
            const data = $("#form_input :input").serializeArray();
            const payload = {};
            for (var i = 0; i < data.length; i++) {
              payload[data[i].name] = data[i].value;
              if (data[i].name == 'data_detail') {
                payload[data[i].name] = JSON.parse(data[i].value);
              }
            }
            payload['jenis_simpan'] = jenis_simpan;
            const res = await fetchData(
              jwt, link_api.simpanPenjualanPenjualan, payload
            );
            cekbtnsimpan = true;
            if (res.success) {
              $('#form_input').form('clear');
              uangmuka = 0;
              transreferensi = null;
              $.messager.show({
                title: 'Info',
                msg: 'Transaksi Sukses',
                showType: 'show'
              });

              //JIKA CUSTOMER BELI BARANG SAMA PADA HARI YANG SAMA
              if (res.data.warningcustomer) {
                $.messager.alert({
                  title: 'Info',
                  msg: 'Customer telah membeli barang yang sama di tanggal transaksi yang sama <br><br> Berikut kode barangnya :' +
                    res.data.warningcustomer,
                  showType: 'show'
                });
              }

              {{ $mode }}();

              if (jenis_simpan == 'simpan_cetak') {
                cetak(res.data.uuidjual, 'ya');
              }
            } else {
              $.messager.alert('Error', res.message, 'error');
            }
          } catch (e) {
            const error = typeof e === 'string' ? e : e.message;
            const textError = getTextError(error);
            $.messager.alert('Error', textError, 'error');
          } finally {
            tutupLoaderSimpan();
            setTimeout(() => {
              prosessimpan = false;
            }, 1000);
          }
        } else {
          $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
        }
      }
    }

    function reset_detail() {
      $('#table_data_detail').datagrid('loadData', []);
      $('#table_data_detail_rekap').datagrid('loadData', []);
    }

    async function load_data(idtrans) {
      try {
        bukaLoader();
        const res = await fetchData(jwt, link_api.loadDataPenjualanPenjualan, {
          uuidjual: idtrans
        });

        if (res.success) {
          for (var x = 0; x < res.data.length; x++) {
            const res2 = await fetchData(jwt, link_api.loadSatuanBarang, {
              uuidbarang: res.data[x].uuidbarang
            });
            if (res2.success) {
              get_konversi(res2.data, res.data[x].satuan, res2.data[0].satuan);
              res.data[x].satuan_lama = res.data[x].satuan;
              res.data[x].hargaterendah = ((satuan_baru > satuan_lama) ? res.data[x].hargaterendah /
                konversi_baru : res.data[x].hargaterendah * konversi_lama).toFixed(0);
            } else {
              throw res2.message || 'Gagal memuat data';
            }
          }
          $('#table_data_detail').datagrid('loadData', res.data);
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        const error = typeof e === 'string' ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      } finally {
        tutupLoader();
      }
    }

    async function load_data_rekap(idtrans) {
      try {
        const res = await fetchData(
          jwt, link_api.loadDataRekapPenjualanPenjualan, {
            uuidjual: idtrans
          }
        );
        if (res.success) {
          $('#table_data_detail_rekap').datagrid('loadData', res.data);
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        const error = typeof e === 'string' ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }

    async function load_data_detail(idtrans, showloader = true) {
      try {
        if (showloader) bukaLoader();
        const res = await fetchData(
          jwt, link_api.loadDataPenjualanBarangKeluar, {
            uuidbbk: idtrans,
            tgltrans: $('#TGLTRANS').datebox('getValue')
          }
        );
        if (res.success) {
          if (res.data.adaketerangan) {
            $.messager.confirm(
              'Konfirmasi',
              'Apakah anda ingin menampilkan catatan per barang sesuai pada transaksi bukti pengeluaran?',
              function(confirm) {
                if (confirm) {
                  for (var x = 0; x < res.data.data.length; x++) {
                    res.data.data[x].catatan = res.data.data[x].keterangan;
                  }
                }

                loadDetailBarang(res.data.data);
              })
          } else {
            loadDetailBarang(res.data.data)
          }
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        const error = typeof e === 'string' ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      } finally {
        tutupLoader();
      }
    }

    async function loadDetailBarang(data) {
      if (!Array.isArray(data)) {
        data = [];
      }

      $('#table_data_detail').datagrid('loadData', data);
      $('#table_data_detail_rekap').datagrid('loadData', data);

      var rows = $('#table_data_detail').datagrid('getRows');

      for (var i = 0; i < rows.length; i++) {
        hargajual = await get_harga_barang(rows[i].uuidbarang);

        oldharga = rows[i].harga;
        olddiskonpersen = '0';
        olddiskonrp = 0;


        hitung_subtotal_detail(i, rows[i], 3);
      }

      hitung_grandtotal();
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
        columns: [
          [{
            field: 'uuidlokasi',
            hidden: true
          }, {
            field: 'kode',
            title: 'Kode',
            width: 150,
            sortable: true
          }, {
            field: 'nama',
            title: 'Nama',
            width: 200,
            sortable: true
          }, ]
        ],
        onSelect: function(index, row) {
          $("#KODELOKASI").val(row.kode);
        },
        onChange: function(newVal, oldVal) {}
      });
    }

    function browse_data_syaratbayar(id) {
      $(id).combogrid({
        panelWidth: 300,
        url: link_api.browseSyaratBayar,
        idField: 'uuidsyaratbayar',
        textField: 'nama',
        mode: 'local',
        sortName: 'selisih',
        sortOrder: 'asc',
        selectFirstRow: true,
        required: true,
        columns: [
          [{
            field: 'uuidsyaratbayar',
            hidden: true
          }, {
            field: 'nama',
            title: 'Name',
            width: 170,
            sortable: true
          }, {
            field: 'selisih',
            title: 'Diff Days',
            width: 100,
            sortable: true
          }, ]
        ],
        onSelect: function(index, row) {
          //$(id).combogrid('options').onChange.call();
        },
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');
          if ($('#mode').val() != '' && row) {
            get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), row.selisih)
          }
        },
      });
    }

    function browse_data_marketing(id) {
      $(id).combogrid({
        panelWidth: 880,
        idField: 'uuidkaryawan',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        required: true,
        url: link_api.browseKaryawanMarketing,
        onBeforeLoad: function(param) {
          param.divisi = 'marketing';
        },
        // TODO: seharusnya jika $BROWSEMARKETING == 'DISABLE' maka readonly: true
        readonly: false,
        columns: [
          [{
            field: 'uuidkaryawan',
            hidden: true
          }, {
            field: 'kode',
            title: 'Kode',
            width: 150,
            sortable: true
          }, {
            field: 'nama',
            title: 'Nama',
            width: 200,
            sortable: true
          }, {
            field: 'alamat',
            title: 'Alamat',
            width: 300,
            sortable: true
          }, {
            field: 'kota',
            title: 'Kota',
            width: 100,
            sortable: true
          }, {
            field: 'telp',
            title: 'Telp',
            width: 100,
            sortable: true
          }, ]
        ],
      });
    }

    function browse_data_customer(id) {
      $(id).combogrid({
        panelWidth: 600,
        url: link_api.browseCustomer,
        idField: 'uuidcustomer',
        textField: 'kode',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        required: true,
        readonly: false,
        columns: [
          [{
            field: 'uuidcustomer',
            hidden: true
          }, {
            field: 'kode',
            title: 'Kode',
            width: 150,
            sortable: true
          }, {
            field: 'nama',
            title: 'Nama',
            width: 200,
            sortable: true
          }, {
            field: 'kota',
            title: 'Kota',
            width: 100,
            sortable: true
          }, {
            field: 'alamat',
            title: 'Alamat',
            width: 300,
            sortable: true
          }, {
            field: 'telp',
            title: 'Telp',
            width: 100,
            sortable: true
          }, {
            field: 'uuidsyaratbayar',
            hidden: true
          }, {
            field: 'uuidmarketing',
            hidden: true
          }, ]
        ],
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');
          if (row) {
            $('#IDCUSTOMER').val(row.uuidcustomer);
            $('#KODECUSTOMER').val(row.kode);
            $('#NAMACUSTOMER').textbox('setValue', row.nama);

            var alamat = row.alamat == "" || row.alamat == null ? "" : (row.alamat + "\r\n");
            if (row.kota && row.kota != 'null') alamat += row.kota;
            if (row.propinsi && row.propinsi != 'null') alamat += "-" + row.propinsi;
            if (row.negara && row.negara != 'null') alamat += "-" + row.negara;

            $('#ALAMAT').textbox('setValue', alamat);
            $('#TELP').textbox('setValue', row.telp);
            $('#IDSYARATBAYAR').combogrid('setValue', row.uuidsyaratbayar);
            $('#IDMARKETING').combogrid('setValue', row.uuidmarketing);

            if (row.maxcredit > 0) {
              $('#CEKLIMITPIUTANG').val(true);
            }

            if (row.maxnota > 0) {
              $('#CEKLIMITNOTA').val(true);
            }

            if (row.ceknotajatuhtempo == 1) {
              $("#CEKNOTAJATUHTEMPO").val(true);
            }

          } else {
            $('#NAMACUSTOMER').textbox('clear');
          }

          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
      });
    }

    var namasyaratbayarval, idsyaratbayarval, selisihval = '';

    function browse_data_bbk(id) {
      $(id).combogrid({
        panelWidth: 450,
        idField: 'uuidbbk',
        textField: 'kodebbk',
        mode: 'remote',
        url: link_api.browsePenjualanBarangKeluar,
        required: TRANSAKSI == 'HEADER',
        columns: [
          [{
            field: 'kodebbk',
            title: 'Kode BBK',
            width: 130
          }, {
            field: 'namacustomer',
            title: 'Nama Customer',
            width: 300
          }, {
            field: 'kodeso',
            title: 'Kode SO',
            width: 130,
            hidden: true
          }, {
            field: 'kodedo',
            title: 'Kode DO',
            width: 130,
            hidden: true
          }, {
            field: 'kodelokasi',
            title: 'Kode Lokasi',
            width: 90,
            hidden: true
          }, {
            field: 'tgltrans',
            title: 'Tgl Trans',
            width: 80,
            hidden: true
          }, {
            field: 'username',
            title: 'User',
            width: 90,
            hidden: true
          }, ]
        ],
        onSelect: async function(index, row) {
          if ($('#mode').val() != '') {
            namasyaratbayarval = row.namasyaratbayar;
            idsyaratbayarval = row.uuidsyaratbayar;
            selisihval = row.selisih;

            $('#IDLOKASI').combogrid('setValue', row.uuidlokasi);
            $("#KODELOKASI").val(row.kodelokasi);
            $('#TGLTRANS').datebox('setValue', row.tgltrans);
            //isi data customer
            var alamat = row.alamat == "" || row.alamat == null ? "" : (row.alamat + "\r\n");
            if (row.kota && row.kota != 'null') alamat += row.kota;
            if (row.propinsi && row.propinsi != 'null') alamat += "-" + row.propinsi;
            if (row.negara && row.negara != 'null') alamat += "-" + row.negara;

            $('#IDCUSTOMER').val(row.uuidcustomer);
            $('#KODECUSTOMER').textbox('setValue', row.kodecustomer);
            $('#NAMACUSTOMER').textbox('setValue', row.namacustomer);
            $('#ALAMAT').textbox('setValue', alamat);
            $('#TELP').textbox('setValue', row.telp);

            $('#IDSYARATBAYAR').combogrid('setValue', row.uuidsyaratbayar);

            $("#IDDO").val(row.uuiddo);
            $("#KODEDO").textbox('setValue', row.kodedo);
            $("#TGLDO").datebox('setValue', row.tgldo);
            $("#IDSO").val(row.uuidso);
            $("#KODESO").textbox('setValue', row.kodeso);
            $("#TGLSO").datebox('setValue', row.tglso);
            $("#KODEBBK").val(row.kodebbk);
            $("#TGLBBK").datebox('setValue', row.tglbbk);
            $("#IDMARKETING").combogrid('setValue', row.uuidmarketing);

            try {
              const res = await fetchData(
                jwt, link_api.loadDataUangMukaSO, {
                  uuidbbk: row.uuidbbk
                }
              );
              if (!res.success) {
                throw new Error(res.message);
              }
              uangmuka = res.data.uangmuka;

              $('#UANGMUKA').numberbox('setValue', res.data.uangmuka);

              if (row.catatan && row.catatan != null) {
                $("#CATATAN").textbox('setValue', row.catatan);
              }

              reset_detail();

              load_data_detail(row.uuidbbk);
            } catch (e) {
              const error = typeof e === 'string' ? e : e.message;
              const textError = getTextError(error);
              $.messager.alert('Error', textError, 'error');
            }
          }
        }
      });
    }

    function browse_data_order_jual(id) {
      $(id).combogrid({
        panelWidth: 330,
        idField: 'uuidorderjual',
        textField: 'kodeorderjual',
        mode: 'remote',
        columns: [
          [{
            field: 'uuidorderjual',
            hidden: true
          }, {
            field: 'kodeorderjual',
            title: 'Kode',
            width: 150
          }, {
            field: 'tgltrans',
            title: 'Tanggal Trans',
            width: 120
          }, ]
        ],
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');

          $('#IDCUSTOMER').val(row.uuidcustomer);
          $('#KODECUSTOMER').combogrid('setValue', row.kodecustomer);
          $('#NAMACUSTOMER').textbox('setValue', row.namacustomer);

          var alamat = row.alamat == "" || row.alamat == null ? "" : (row.alamat + "\r\n");
          if (row.kota && row.kota != 'null') alamat += row.kota;
          if (row.propinsi && row.propinsi != 'null') alamat += "-" + row.propinsi;
          if (row.negara && row.negara != 'null') alamat += "-" + row.negara;

          $('#ALAMAT').textbox('setValue', alamat);
          $('#TELP').textbox('setValue', row.telp);
          $('#IDSYARATBAYAR').combogrid('setValue', row.uuidsyaratbayar);
          $('#IDMARKETING').combogrid('setValue', row.uuidmarketing);

          $('#IDLOKASI').combogrid('setValue', row.uuidlokasi);

          $('#IDORDERJUAL').val(row.uuidorderjual);

          load_data_order_jual(row.uuidorderjual);

          reset_detail();

          $("#form_antrian").dialog('close');
        }
      });
    }

    function browse_data_repacking(id) {
      $(id).combogrid({
        panelWidth: 330,
        idField: 'uuidrepacking',
        textField: 'koderepacking',
        mode: 'remote',
        columns: [
          [{
            field: 'uuidrepacking',
            hidden: true
          }, {
            field: 'koderepacking',
            title: 'Kode',
            width: 150
          }, {
            field: 'tgltrans',
            title: 'Tanggal Trans',
            width: 120
          }]
        ],
        onSelect: function(index, row) {
          load_data_repacking(row.uuidrepacking);
        }
      });
    }

    async function load_data_repacking(idrepacking) {
      try {
        const res = await fetchData(
          jwt, link_api.loadDataPenjualanLangsung, {
            uuidrepacking: idrepacking,
            uuidcustomer: $('#IDCUSTOMER').val(),
            uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
            tgltrans: $('#TGLTRANS').datebox('getValue'),
          }
        );
        if (res.success) {
          for (var x = 0; x < res.data.length; x++) {
            const res2 = await fetchData(
              jwt, link_api.loadSatuanBarang, {
                uuidbarang: res.data[x].uuidbarang
              }
            );
            if (res2.success) {
              get_konversi(res2.data, res.data[x].satuan, res2.data[0].satuan);
              res.data[x].satuan_lama = res.data[x].satuan;
              res.data[x].hargaterendah = ((satuan_baru > satuan_lama) ? res.data[x]
                  .hargaterendah / konversi_baru : res.data[x].hargaterendah * konversi_lama)
                .toFixed(0);
            } else {
              throw res2.message || 'Gagal memuat data';
            }
          }

          $('#table_detail_repacking').datagrid('loadData', res.data);
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        const error = typeof e === "string" ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }

    async function load_data_order_jual(idtrans) {
      try {
        const res = await fetchData(
          jwt, link_api.loadDataOrderPenjualanPenjualan, {
            uuidorderjual: idtrans
          }
        );
        if (res.success) {
          for (var x = 0; x < res.data.length; x++) {
            const res2 = await fetchData(
              jwt, link_api.loadSatuanBarang, {
                uuidbarang: res.data[x].uuidbarang
              }
            );
            if (res2.success) {
              get_konversi(res2.data, res.data[x].satuan, res2.data[0].satuan);
              res.data[x].satuan_lama = res.data[x].satuan;
              res.data[x].hargaterendah = ((satuan_baru > satuan_lama) ? res.data[x]
                  .hargaterendah / konversi_baru : res.data[x].hargaterendah * konversi_lama)
                .toFixed(0);
            } else {
              throw res2.message || 'Gagal memuat data';
            }
          }
          $('#table_data_detail').datagrid('loadData', res.data);
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        const error = typeof e === "string" ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }

    function getRowIndex(target) {
      var tr = $(target).closest('tr.datagrid-row');
      return parseInt(tr.attr('datagrid-row-index'));
    }

    var indexDetail = 0; // UNTUK TOMBOL EDIT

    function buat_table_detail() {
      var dg = '#table_data_detail';

      $(dg).datagrid({
        clickToEdit: false,
        dblclickToEdit: true,
        showFooter: true,
        singleSelect: true,
        rownumbers: true,
        RowAdd: true,
        RowDelete: true,
        data: [],
        toolbar: '#toolbar',
        frozenColumns: [
          [{
              field: 'uuidbbk',
              hidden: true
            },
            {
              field: 'kodebbk',
              hidden: TRANSAKSI == 'HEADER',
              title: 'No. BBK',
              width: 120,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 600,
                  mode: 'remote',
                  idField: 'kodebbk',
                  textField: 'kodebbk',
                  columns: [
                    [{
                        field: 'uuidbbk',
                        hidden: true
                      },
                      {
                        field: 'kodebbk',
                        title: 'Kode',
                        width: 150
                      },
                      {
                        field: 'kodelokasi',
                        title: 'Kode Lokasi',
                        width: 120
                      },
                      {
                        field: 'tgltrans',
                        title: 'Tgl Trans',
                        width: 150
                      },
                      {
                        field: 'username',
                        title: 'User',
                        width: 150
                      }
                    ]
                  ],
                }
              }
            }, {
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 100,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 830,
                  mode: 'remote',
                  required: true,
                  idField: 'kode',
                  textField: 'kode',
                  onBeforeLoad: function(param) {
                    // Memastikan 3 parameter (uuidbbk, uuidcustomer, uuidlokasi)
                    // selalu dikirim dalam payload request, termasuk saat menggunakan fitur 'q' (search).
                    param.uuidbbk = $("#IDBBK").val();
                    param.uuidcustomer = $("#IDCUSTOMER").val();
                    param.uuidlokasi = $("#IDLOKASI").val();
                  },
                  columns: [
                    [{
                        field: 'uuidbarang',
                        hidden: true
                      },
                      {
                        field: 'kode',
                        title: 'Kode',
                        width: 100
                      },
                      {
                        field: 'nama',
                        title: 'Nama',
                        width: 250
                      },
                      {
                        field: 'barcodesatuan1',
                        title: 'Barcode Sat. 1',
                        width: 120
                      },
                      {
                        field: 'partnumber',
                        title: 'Part Number',
                        width: 120
                      },
                      {
                        field: 'namamerk',
                        title: 'Merk',
                        width: 100
                      },
                      {
                        field: 'kodemerk',
                        hidden: true
                      },
                      {
                        field: 'satuan',
                        title: 'Satuan',
                        width: 60
                      }, ...(LIHATHARGA == 1 && LIHATHARGABELI ? [{
                        field: 'hargabeli',
                        title: 'Harga Beli',
                        align: 'right',
                        width: 80,
                        formatter: format_amount
                      }] : []), {
                        field: 'jml',
                        title: 'Jml',
                        align: 'right',
                        width: 80,
                        formatter: format_qty
                      },
                      {
                        field: 'terpenuhi',
                        title: 'Terpenuhi',
                        align: 'right',
                        width: 80,
                        formatter: format_qty,
                        hidden: true
                      },
                      {
                        field: 'sisa',
                        title: 'Sisa',
                        align: 'right',
                        width: 80,
                        formatter: format_qty
                      },
                      {
                        field: 'kategori',
                        title: 'Kategori',
                        width: 200
                      },
                    ]
                  ],
                }
              }
            },
            {
              field: 'namabarang',
              title: 'Nama',
              width: 200,
            },
            {
              field: 'namabarangalias',
              title: 'Nama Alias',
              width: 250,
              editor: {
                type: 'textbox',
                options: {
                  validType: 'length[0,200]'
                }
              },
              hidden: {{ session('GUNAKANALIASPENJUALAN') == 'YA' ? 'false' : 'true' }},
            },
            @if (session('SHOWBARCODE') == 'YA')
              {
                field: 'barcodesatuan1',
                title: 'Barcode Sat. 1',
                width: 120
              },
            @endif
            @if (session('SHOWPARTNUMBER') == 'YA')
              {
                field: 'partnumber',
                title: 'Part Number',
                width: 120
              },
            @endif {
              field: 'hargaterendah',
              hidden: true
            },
            {
              field: 'disccustomermin',
              hidden: true
            },
            {
              field: 'disctipecustomermin',
              hidden: true
            },
            {
              field: 'discmerkmin',
              hidden: true
            },
            {
              field: 'disccustomermax',
              hidden: true
            },
            {
              field: 'disctipecustomermax',
              hidden: true
            },
            {
              field: 'discmerkmax',
              hidden: true
            },
            {
              field: 'uuidbarang',
              hidden: true
            },
            {
              field: 'kodemerk',
              hidden: true
            },
            {
              field: 'uuidsyaratbayar',
              hidden: true
            },
            {
              field: 'selisih',
              hidden: true
            },
          ]
        ],
        columns: [
          [{
              field: 'jmlbbk',
              title: 'Total BBK',
              align: 'right',
              width: 60,
              formatter: format_qty,
              hidden: true
            },
            {
              field: 'terpenuhibbk',
              title: 'Terpenuhi BBK',
              align: 'right',
              width: 80,
              formatter: format_qty,
              hidden: true
            },
            {
              field: 'sisabbk',
              title: 'Sisa BBK',
              align: 'right',
              width: 60,
              formatter: format_qty,
              hidden: true
            },
            {
              field: 'jmlstok',
              title: 'Stok',
              align: 'right',
              width: 60,
              formatter: format_qty,
            },
            {
              field: 'jmlpenjualan',
              title: 'Jumlah',
              align: 'right',
              width: 60,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
                options: {
                  required: true
                }
              }
            },
            {
              field: 'satuan_lama',
              title: 'Satuan',
              width: 45,
              align: 'center',
              hidden: true
            },
            {
              field: 'satuan',
              title: 'Satuan',
              width: 60,
              align: 'center',
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 100,
                  panelHeight: 130,
                  mode: 'remote',
                  required: true,
                  idField: 'satuan',
                  textField: 'satuan',
                  columns: [
                    [{
                      field: 'satuan',
                      title: 'Satuan',
                      width: 80
                    }, ]
                  ],
                }
              }
            },
            {
              field: 'satuanutama',
              title: 'Satuan Utama',
              width: 50,
              align: 'center',
              hidden: true
            },
            {
              field: 'jmlbonus',
              title: 'Jml Bonus',
              align: 'right',
              width: 80,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
                options: {
                  required: true
                }
              }
            }, ...(LIHATHARGA == 1 ? [
              ...(LIHATHARGABELI == 1 ? [{
                field: 'hargabeli',
                title: 'Harga Beli',
                align: 'right',
                width: 85,
                formatter: format_amount,
                styler: function(index, row) {
                  if (parseFloat(row.hargabeli) > 0 && parseFloat(row.hargabeli) > parseFloat(row.harga) -
                    parseFloat(row.disc)) return 'background-color:#ff8566';
                }
              }] : []),
              {
                field: 'hargajual',
                title: 'Harga Lama',
                align: 'right',
                width: 85,
                formatter: format_amount,
                styler: function(index, row) {
                  if (parseFloat(row.hargajual) > 0 && parseFloat(row.hargajual) > parseFloat(row.harga) -
                    parseFloat(row.disc)) return 'background-color:#ff8566';
                }
              },
              {
                field: 'hargajualminimum',
                title: 'H. Minimum',
                align: 'right',
                width: 85,
                formatter: format_amount,
                hidden: TAMPILHARGAJUALMINIMUM
              },
              {
                field: 'harga',
                title: 'Harga',
                align: 'right',
                width: 85,
                formatter: format_amount,
                editor: INPUTHARGA == 1 ? {
                  type: 'numberbox',
                  options: {
                    required: true
                  }
                } : null,
              },
            ] : []),
            {
              field: 'catatan',
              title: 'Catatan Jual',
              width: 150,
              editor: {
                type: 'validatebox',
                options: {
                  validType: 'length[0,300]'
                }
              }
            },
            {
              field: 'catatansj',
              title: 'Catatan SJ',
              width: 150,
              editor: {
                type: 'validatebox',
                options: {
                  validType: 'length[0,300]'
                }
              }
            }, ...(LIHATHARGA == 1 ? [{
                field: 'uuidcurrency',
                title: 'Kode Currency',
                hidden: true
              },
              {
                field: 'currency',
                title: 'Mata Uang',
                width: 70,
                editor: {
                  type: 'combogrid',
                  options: {
                    panelWidth: 200,
                    mode: 'remote',
                    required: false,
                    idField: 'simbol',
                    textField: 'simbol',
                    url: link_api.browseCurrency,
                    columns: [
                      [{
                          field: 'uuidcurrency',
                          title: 'ID Curr',
                          width: 100,
                          hidden: true
                        },
                        {
                          field: 'kode',
                          title: 'Kode Curr',
                          width: 65
                        },
                        {
                          field: 'nama',
                          title: 'Curr',
                          width: 100
                        },
                        {
                          field: 'simbol',
                          title: 'Simbol',
                          width: 65
                        },
                      ]
                    ],
                  }
                }
              },
              {
                field: 'discpersen',
                title: 'Disc(%)',
                align: 'center',
                width: 100,
                editor: INPUTHARGA == 1 ? {
                  type: 'textbox'
                } : null,
                hidden: false
              },
              {
                field: 'disc',
                title: 'Disc',
                align: 'right',
                width: 65,
                formatter: format_amount,
                editor: INPUTHARGA == 1 ? {
                  type: 'numberbox'
                } : null,
              },
              {
                field: 'subtotal',
                title: 'Subtotal',
                align: 'right',
                width: 95,
                formatter: format_amount
              },
              {
                field: 'nilaikurs',
                title: 'Kurs ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 60,
                formatter: format_amount,
                editor: {
                  type: 'numberbox',
                  options: {
                    required: true,
                  }
                },
                hidden: {{ session('MULTICURRENCY') == '1' ? 'false' : 'true' }},
              },
              {
                field: 'hargakurs',
                title: 'Harga ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 85,
                hidden: {{ session('MULTICURRENCY') == '1' ? 'false' : 'true' }},
                formatter: format_amount
              },
              {
                field: 'disckurs',
                title: 'Disc ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 65,
                formatter: format_amount,
                hidden: {{ session('MULTICURRENCY') == '1' ? 'false' : 'true' }}
              },
              {
                field: 'subtotalkurs',
                title: 'Subtotal ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 95,
                hidden: {{ session('MULTICURRENCY') == '1' ? 'false' : 'true' }},
                formatter: format_amount,
              },
              {
                field: 'pakaippn',
                title: 'Pakai PPN',
                align: 'center',
                width: 65,
                editor: INPUTHARGA == 1 ? {
                  type: 'combobox',
                  options: {
                    required: true,
                    data: [{
                      value: 'INCL',
                      text: 'INCL'
                    }, {
                      value: 'EXCL',
                      text: 'EXCL'
                    }, {
                      value: 'TIDAK',
                      text: 'TIDAK'
                    }],
                    panelHeight: 'auto',
                  }
                } : null
              },
              {
                field: 'dpp',
                title: 'DPP ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 95,
                formatter: format_amount
              },
              {
                field: 'ppnpersen',
                title: 'PPN (%)',
                align: 'right',
                width: 70,
                formatter: format_amount_2,
                editor: INPUTHARGA == 1 ? {
                  type: 'numberbox',
                  options: {
                    min: 0,
                    precision: 2,
                    max: 100
                  }
                } : null
              },
              {
                field: 'ppnrp',
                title: 'PPN ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 65,
                formatter: format_amount
              },
            ] : []), {
              field: 'ppn',
              hidden: true
            }
          ]
        ],
        onClickRow: function(index, row) {
          if (row.uuidbbk == undefined || row.uuidbbk == '') {
            cekbarangnonstok = true;
          } else {
            cekbarangnonstok = false;
          }

          indexDetail = index;
        },
        onBeforeCellEdit: function(index, field) {
          var row = $(this).datagrid('getRows')[index];

          if (field == 'disc' || field == 'discpersen' || field == 'harga') {
            oldharga = parseFloat(row.harga);
            olddiskonpersen = row.discpersen;
            olddiskonrp = row.disc;
          } else if (field == 'jmlpenjualan') {
            oldjmlpenjualan = row.jmlpenjualan;
          }
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);
          var jenis = $('[name=jenis]:checked').val();

          if (row.uuidbbk == undefined || row.uuidbbk == 0) {
            cekbarangnonstok = true;
          } else {
            cekbarangnonstok = false;
          }

          if (jenis == 'Pesanan') {
            if (!cekbarangnonstok) {
              if (['satuan', 'jmlpenjualan', 'currency', 'jmlbonus'].indexOf(field) > -1) {
                $(this).datagrid('cancelEdit', index);

                return false;
              }
            }
          }

          if (field == 'kodebbk') {
            var lokasi = $("#IDLOKASI").combogrid('getValue');
            var ref = $("#IDCUSTOMER").combogrid('getValue');

            urlbbk = link_api.browsePenjualanBarangKeluar;

            ed.combogrid('grid').datagrid('options').url = base_url + urlbbk + '/' + lokasi + '/' + ref;
            ed.combogrid('grid').datagrid('load', {
              q: ''
            });
            ed.combogrid('showPanel');
          } else if (field == 'kodebarang') {
            var idbbk = '';
            var urlbarang = '';

            if (jenis == 'Langsung') {
              var idcustomer = $("#IDCUSTOMER").val();
              var idlokasi = $('#IDLOKASI').combogrid('getValue');
              if (idcustomer != null && idcustomer != "") {
                // urlbarang = 'atena/Master/Data/Barang/comboGridJualAll/' + idcustomer + '/' + idlokasi;
                urlbarang = link_api.browseBarangJualAll;
              } else {
                $.messager.show({
                  title: 'Warning',
                  msg: 'Pilih Customer Terlebih Dahulu',
                  timeout: {{ session('TIMEOUT') }},
                });
              }
            } else {

              if (!cekbarangnonstok) {
                //jika transaksi detail
                if (row.uuidbbk) idbbk = row.uuidbbk;

                if (TRANSAKSI == 'HEADER') {
                  //jika transaksi header
                  idbbk = $("#IDBBK").combogrid('getValue');
                }

              }

              if (idbbk == "") {
                urlbarang = link_api.browseBarangNonStok;
              }
              // tidak dipakai
              //   else {
              //     urlbarang = 'atena/Inventori/Transaksi/BarangKeluar/comboGridPenjualanBarang/';
              //   }
            }

            ed.combogrid('grid').datagrid('options').url = urlbarang;
            ed.combogrid('grid').datagrid('load', {
              q: '',
            });
            ed.combogrid('showPanel');
          } else if (field == 'satuan') {
            ed.combogrid('grid').datagrid('options').url = link_api.loadSatuanBarang;
            ed.combogrid('grid').datagrid('load', {
              q: '',
              uuidbarang: row.uuidbarang
            });
            ed.combogrid('showPanel');
          } else if (field == 'currency') {
            ed.combogrid('showPanel');
          } else if (field == 'pakaippn') {
            ed.combogrid('showPanel');
          }
        },
        onEndEdit: async function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data_detail', index, cell.field);
          var row_update = {};

          switch (cell.field) {
            case 'kodebbk':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidbbk : '';
              var tgltrans = data ? data.tgltrans : '';
              var lokasi = data ? data.uuidlokasi : '';
              var namasyaratbayar = data ? data.namasyaratbayar : '';
              var idsyaratbayar = data ? data.uuidsyaratbayar : '';
              var selisih = data ? data.selisih : '';

              if (lokasi != $("#IDLOKASI").combogrid('getValue') ||
                tgltrans > $('#TGLTRANS').datebox('getValue')) {
                $.messager.show({
                  title: 'Warning',
                  msg: 'Transaksi harus pada lokasi yang sama dan sebelum tanggal transaksi',
                  timeout: {{ session('TIMEOUT') }},
                });
                $(this).datagrid('deleteRow', index);
                break;
              }

              row_update = {
                idbbk: id,
                namasyaratbayar: namasyaratbayar,
                idsyaratbayar: idsyaratbayar,
                selisih: selisih,
                kodebarang: '',
                namabarang: '',
                tutup: 0,
                jml: 0,
                jmlpenjualan: 0,
                satuan: '',
                harga: 0,
                discpersen: 0,
                disc: 0,
                disckurs: 0,
                subtotal: 0,
              };
              break;
            case 'kodebarang':
              if ($("#KODECUSTOMER").combogrid('getValue') == "") {
                $.messager.show({
                  title: 'Warning',
                  msg: 'Customer Belum Diisi',
                  timeout: {{ session('TIMEOUT') }},
                });

                $(this).datagrid('deleteRow', index);

                break;
              }

              var data = ed.combogrid('grid').datagrid('getSelected');
              var id = data ? data.uuidbarang : '';
              var ppn = data ? data.ppn : '';
              var nama = data ? data.nama : '';
              var satuan = data ? data.satuan : '';
              var satuanutama = data ? data.satuanutama : '';
              var konversi = data ? data.konversi : '';
              var harga = await get_harga_barang(id, 0);
              var hargabeli = await get_harga_barangbeli(id, satuan);
              var hargajual = await get_harga_barangjual(id);
              var kodemerk = data ? data.kodemerk : 0;
              var subtotal = harga * 1;
              var kodebrg = data ? data.kode : '';
              var jml = data ? data.jml : '';
              var sisa = data.sisa ? data.sisa : '';
              var terpenuhi = data.terpenuhi ? data.terpenuhi : '';
              var discpersen = data.discpersen ? data.discpersen : '0';
              var disc = data ? data.disc : '';
              var disckurs = data ? data.disckurs : '';
              var pakaippn = data ? data.pakaippn : '';
              var ppnpersen = data ? data.ppnpersen : '';
              var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
              var partnumber = data.partnumber ? data.partnumber : '';
              var hargaterendah = harga.hargaminsatuan;
              var disccustomermin = data.disccustomermin ? data.disccustomermin : 0;
              var disctipecustomermin = data.disctipecustomermin ? data.disctipecustomermin : 0;
              var discmerkmin = data.discmerkmin ? data.discmerkmin : 0;
              var disccustomermax = data.disccustomermax ? data.disccustomermax : 0;
              var disctipecustomermax = data.disctipecustomermax ? data.disctipecustomermax : 0;
              var discmerkmax = data.discmerkmax ? data.discmerkmax : 0;

              if (parseFloat(disccustomermin) > 0) {
                discpersen = disccustomermin;
              } else if (parseFloat(disctipecustomermin) > 0) {
                discpersen = disctipecustomermin;
              } else if (parseFloat(discmerkmin) > 0) {
                discpersen = discmerkmin;
              }

              oldharga = harga.hargamaxsatuan;
              olddiskonpersen = '0';
              olddiskonrp = 0;

              pakaippn = defaultpakaippn;
              if (pakaippn == 0) pakaippn = "TIDAK";
              else if (pakaippn == 1) pakaippn = "EXCL";
              else if (pakaippn == 2) pakaippn = "INCL";

              var hargabarang = harga.hargamaxsatuan;


              @if (strpos(session('NAMADATABASE'), 'berlian') !== false)
                if (hargabarang == 0) {
                  hargabarang = hargajual;
                }
              @endif

              row_update = {
                uuidbarang: id,
                ppn: ppn,
                namabarang: nama,
                barcodesatuan1: barcodesatuan1,
                partnumber: partnumber,
                kodemerk: kodemerk,
                tutup: 0,
                satuan_lama: satuan,
                satuanutama: satuanutama,
                satuan: satuan,
                konversi: konversi,
                jml: 0,
                jmlpenjualan: 1,
                hargabeli: hargabeli,
                hargajual: hargajual,
                harga: hargabarang,
                uuidcurrency: '{{ session('UUIDCURRENCY') }}',
                currency: '{{ session('SIMBOLCURRENCY') }}',
                nilaikurs: 1,
                discpersen: discpersen,
                disc: disc,
                disckurs: disckurs,
                subtotal: subtotal,
                pakaippn: pakaippn,
                hargaterendah: hargaterendah,
                disccustomermin: disccustomermin,
                disctipecustomermin: disctipecustomermin,
                discmerkmin: discmerkmin,
                disccustomermax: disccustomermax,
                disctipecustomermax: disctipecustomermax,
                discmerkmax: discmerkmax,
                ppnpersen: ppnpersenaktif,
                hargajualminimum: harga.hargaminsatuan,
                hargaminsatuan: harga.hargaminsatuan,
                hargamaxsatuan: harga.hargamaxsatuan,
                hargaminsatuan2: harga.hargaminsatuan2,
                hargamaxsatuan2: harga.hargamaxsatuan2,
                hargaminsatuan3: harga.hargaminsatuan3,
                hargamaxsatuan3: harga.hargamaxsatuan3,
                jenisharga: harga.jenisharga,
                satuanbesar: harga.satuan,
                satuansedang: harga.satuan2,
                satuankecil: harga.satuan3,
                jenishargajual: data.jenishargajual
              };

              if (!cekbarangnonstok) {
                if (TRANSAKSI == 'HEADER') {
                  row_update["kodebbk"] = $("#KODEBBK").val();
                  row_update["uuidbbk"] = $("#IDBBK").combogrid('getValue');

                  row_update["uuidsyaratbayar"] = idsyaratbayarval;
                  row_update["namasyaratbayar"] = namasyaratbayarval;
                  row_update["selisih"] = selisihval;
                }
              }
              break;
            case 'satuan':
              get_konversi(ed.combogrid('grid').datagrid('getRows'), changes.satuan, row.satuan_lama);

              if (satuan_baru != 0 || satuan_lama != 0 && changes.satuan) {
                row_update = {
                  harga: changes.satuan == row.satuanbesar ? row.hargamaxsatuan : (changes.satuan == row
                    .satuansedang ? row.hargamaxsatuan2 : row.hargamaxsatuan3),
                  hargakurs: changes.satuan == row.satuanbesar ? row.hargamaxsatuan : (changes.satuan == row
                    .satuansedang ? row.hargamaxsatuan2 : row.hargamaxsatuan3),
                  hargaterendah: changes.satuan == row.satuanbesar ? row.hargaminsatuan : (changes.satuan == row
                    .satuansedang ? row.hargaminsatuan2 : row.hargaminsatuan3),
                  hargajualminimum: changes.satuan == row.satuanbesar ? row.hargaminsatuan : (changes.satuan ==
                    row.satuansedang ? row.hargaminsatuan2 : row.hargaminsatuan3),
                  satuan_lama: changes.satuan,
                };
              }

              var stok = row.jmlstok;

              try {
                const res = await fetchData(
                  jwt, link_api.getStokBarangSatuan, {
                    uuidbarang: row.uuidbarang,
                    uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
                    satuan: changes.satuan,
                    tgltrans: $('#TGLTRANS').datebox('getValue')
                  }
                );
                if (res.success) {
                  if (res.data.saldoqty != null) {
                    stok = res.data.saldoqty;
                  }
                  row_update['jmlstok'] = stok;
                } else {
                  $.messager.alert('Error', res.message, 'error');
                }
              } catch (e) {
                const error = typeof e === 'string' ? e : e.message;
                var textError = getTextError(error);
                $.messager.alert('Error', textError, 'error');
              }

              var hargabeli = await get_harga_barangbeli(row.uuidbarang, row.satuan);

              row_update.hargabeli = hargabeli;

              break;
            case 'pakaippn':
              row_update = {
                ppnpersen: ppnpersenaktif,
              };

              break;
            case 'harga':
              if (parseFloat(row.harga) < parseFloat(row.hargabeli)) {
                $.messager.alert(
                  'Peringatan',
                  'Perhatian!! Harga Jual Yang Dimasukkan Lebih Rendah Dari Harga Beli',
                  'warning'
                );
              }

              break;
            case 'jmlpenjualan':
              if (row.jenishargajual == 'JUMLAH') {
                var harga = await get_harga_barang(row.uuidbarang, row.jmlpenjualan);

                if (harga == null) {
                  $.messager.alert('Peringatan', 'Jumlah Tidak Termasuk Dalam Range Jumlah Pada Master Harga Jual',
                    'warning');

                  row_update = {
                    jmlpenjualan: oldjmlpenjualan
                  }
                } else {
                  var harga = row.satuan == row.satuanbesar ? row.hargamaxsatuan : (row.satuan == row.satuansedang ?
                    row.hargamaxsatuan2 : row.hargamaxsatuan3);

                  row_update = {
                    harga: harga
                  };
                }
              }

              break;
          }
          if (changes.discpersen == 0) row_update.disc = 0;

          if (jQuery.isEmptyObject(row_update) == false) {
            $(this).datagrid('updateRow', {
              index: index,
              row: row_update
            });
          }

          if (cell.field == 'kodebarang') {
            if ($('#IDLOKASI').combogrid('getValue') != '') {
              try {
                const res = await fetchData(
                  jwt, link_api.getStokBarangSatuan, {
                    uuidbarang: row.uuidbarang,
                    uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
                    satuan: row.satuan,
                    tgltrans: $('#TGLTRANS').datebox('getValue')
                  }
                );
                if (res.success) {
                  var data = {
                    jmlstok: res.data.saldoqty
                  };

                  $('#table_data_detail').datagrid('updateRow', {
                    index: index,
                    row: data
                  }).datagrid('gotoCell', {
                    index: index,
                    field: 'kodebarang'
                  });
                } else {
                  $.messager.alert('Error', res.message, 'error');
                }
              } catch (e) {
                const error = typeof e === 'string' ? e : e.message;
                const textError = getTextError(error);
                $.messager.alert('Error', textError, 'error');
              }
            }
          }

          hitung_subtotal_detail(index, row, 4);
          hitung_grandtotal();
        },
        onLoadSuccess: function(data) {
          hitung_grandtotal();
        },
        onAfterDeleteRow: function(index, row) {
          hitung_grandtotal();
        },
        onAfterEdit: async function(index, row, changes) {
          // kode disini dipindah ke bagian akhir onEndEdit,
          // dikarenakan proses asyncronous dijalankan sebelum onEndEdit
          //   if (changes.kodebarang) {
          //   }
        }
      }).datagrid('enableCellEditing');
    }

    function buat_table_detail_rekap() {
      var dg = '#table_data_detail_rekap';

      $(dg).datagrid({
        clickToEdit: false,
        dblclickToEdit: true,
        showFooter: true,
        singleSelect: true,
        rownumbers: true,
        data: [],
        // view: detailview, --> expanded di hide
        detailFormatter: function(index, row) {
          return '<div style="padding:2px;position:relative;"><table class="ddv"></table></div>';
        },
        columns: [
          [{
            field: 'uuidbarang',
            hidden: true
          }, {
            field: 'kodebarang',
            title: 'Kode Barang',
            width: 85,
          }, {
            field: 'namabarang',
            title: 'Nama Barang',
            width: 300,
          }, {
            field: 'tutup',
            title: 'C / U',
            align: 'center',
            width: 50,
            formatter: function(val, row) {
              if (val == 0) {
                return 'U';
              } else {
                return 'C';
              }
            }
          }, {
            field: 'jml',
            title: 'Jumlah',
            align: 'right',
            width: 60,
            formatter: format_qty,
            editor: {
              type: 'numberbox',
            }
          }, {
            field: 'terpenuhi',
            title: 'Terpenuhi',
            align: 'right',
            width: 85,
            formatter: format_qty,
            editor: {
              type: 'numberbox',
            }
          }, {
            field: 'sisa',
            title: 'Sisa',
            align: 'right',
            width: 60,
            formatter: format_qty,
            editor: {
              type: 'numberbox',
            }
          }, {
            field: 'satuan',
            title: 'Satuan',
            width: 55,
            align: 'left'
          }, ]
        ],
        onExpandRow: function(index, row) {
          // informasi dari spreadsheet endpoint ini tidak dipakai
          //   var ddv = $(this).datagrid('getRowDetail', index).find('table.ddv');
          //   ddv.datagrid({
          //     url: base_url + "atena/Penjualan/Transaksi/TransaksiPenjualan/InformasiPENJUALAN",
          //     method: 'post',
          //     queryParams: {
          //       idtrans: idtrans,
          //       idbarang: row.uuidbarang
          //     },
          //     fitColumns: true,
          //     singleSelect: true,
          //     rownumbers: true,
          //     loadMsg: '',
          //     height: 'auto',
          //     columns: [
          //       [{
          //           field: 'kodebeli',
          //           title: 'No Beli',
          //           width: 100,
          //         },
          //         {
          //           field: 'tgltrans',
          //           title: 'Tgl. Beli',
          //           align: 'center',
          //           width: 65,
          //         },
          //         {
          //           field: 'jml',
          //           title: 'Jml Beli',
          //           align: 'right',
          //           width: 50,
          //           formatter: format_qty,
          //           editor: {
          //             type: 'numberbox',
          //           }
          //         },
          //         {
          //           field: 'satuan',
          //           title: 'Satuan',
          //           width: 45,
          //           align: 'left'
          //         },
          //         {
          //           field: 'username',
          //           title: 'User',
          //           width: 70,
          //           align: 'left'
          //         },

          //       ]
          //     ],
          //     onResize: function() {
          //       $(dg).datagrid('fixDetailRowHeight', index);
          //     },
          //     onLoadSuccess: function() {
          //       setTimeout(function() {
          //         $(dg).datagrid('fixDetailRowHeight', index);
          //       }, 0);
          //     }
          //   });
          //   $(dg).datagrid('fixDetailRowHeight', index);
        },
        onLoadSuccess: function(data) {},
        onAfterDeleteRow: function(index, row) {},
        onAfterEdit: function(index, row, changes) {}
      }).datagrid();
    }

    function buat_table_detail_repacking() {
      var dg = '#table_detail_repacking';

      $(dg).datagrid({
        clickToEdit: false,
        showFooter: true,
        singleSelect: true,
        rownumbers: true,
        columns: [
          [{
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 85
            },
            {
              field: 'namabarang',
              title: 'Nama Barang',
              width: 200
            },
            {
              field: 'jml',
              title: 'Jumlah',
              align: 'right',
              width: 60,
              formatter: format_qty
            },
            {
              field: 'harga',
              title: 'Harga',
              align: 'right',
              width: 80,
              formatter: format_amount
            }
          ]
        ],
        onLoadSuccess: function(data) {
          hitung_grandtotal_repacking();
        }
      });
    }

    function hitung_subtotal_detail(index, row, urutan) {
      // hitung diskon lebih dahulu
      var data = {};
      var harga = parseFloat(row.harga);
      var hargaterendah = 0;
      var dg = $('#table_data_detail');
      var totaldisc = 0;
      var discount = 0;
      var jenis = $('[name=jenis]:checked').val();

      row.jmlpenjualan = parseFloat(row.jmlpenjualan).toFixed({{ session('DECIMALDIGITQTY') }});
      data.jmlpenjualan = row.jmlpenjualan;

      if ($('#mode').val() == 'tambah') {
        if ((row.uuidbbk == undefined || row.uuidbbk == 0) && data.jenis == 'Pesanan') {
          data.sisabbk = row.jmlbbk - row.terpenuhibbk - row.jmlpenjualan;

          if (data.sisabbk < 0) {
            data.jmlpenjualan = row.jmlbbk - row.terpenuhibbk;
            data.sisabbk = 0;
            $.messager.show({
              title: 'Warning',
              msg: 'Barang Yang Diinput Tidak Boleh Melebihi Jumlah',
              timeout: {{ session('TIMEOUT') }},
            });
          }
        }
      }

      var idcustomer = $("#IDCUSTOMER").val();
      var kodemerk = row.kodemerk;
      var idbarang = row.uuidbarang;
      var namabarang = row.namabarang;

      var discpersenmaster = 0;
      var errorMsg = '';

      if (idcustomer != "" && kodemerk != "" && idbarang != "" && idcustomer != null && kodemerk != null && idbarang !=
        null) {
        var hargajualmin = 0;
        var hargajualmax = 0;
        var hargajualmin2 = 0;
        var maxdiskon = '';
        var mindiskon = '';

        if (row.satuan == row.satuanbesar) {
          hargajualmin = parseFloat(row.hargaminsatuan);
          hargajualmax = parseFloat(row.hargamaxsatuan);
        } else if (row.satuan == row.satuansedang) {
          hargajualmin = parseFloat(row.hargaminsatuan2);
          hargajualmax = parseFloat(row.hargamaxsatuan2);
        } else if (row.satuan == row.satuankecil) {
          hargajualmin = parseFloat(row.hargaminsatuan3);
          hargajualmax = parseFloat(row.hargamaxsatuan3);
        }

        hargajualmin2 = hargajualmin;

        if (parseFloat(row.disccustomermin) > 0 || parseFloat(row.disccustomermax) > 0) {
          maxdiskon = row.disccustomermax;
          mindiskon = row.disccustomermin;
        } else if (parseFloat(row.disctipecustomermin) > 0 || parseFloat(row.disctipecustomermax) > 0) {
          maxdiskon = row.disctipecustomermax;
          mindiskon = row.disctipecustomermin;
        } else if (parseFloat(row.discmerkmin) > 0 || parseFloat(row.discmerkmax) > 0) {
          maxdiskon = row.discmerkmax;
          mindiskon = row.discmerkmin;
        }

        if (parseFloat(maxdiskon) > 0) {
          hargajualmin2 = parseFloat(hargajualmax) - +(hargajualmax * hitungAkumulasiDiskonPersen(maxdiskon) / 100)
            .toFixed({{ session('DECIMALDIGITAMOUNT') }});
        }

        //DISKON TRANSAKSI
        if (row.discpersen != "0") {
          discpersen = cek_format(row.discpersen);

          if (discpersen == "error") {
            $.messager.show({
              title: 'Warning',
              msg: 'Discount Hanya Boleh Berisi + . Dan Angka Saja',
              timeout: {{ session('TIMEOUT') }},
            });

            row.discpersen = 0;
            data.discpersen = 0;
          }

          discpersen = discpersen.split("+");
          var discDescription = "";
          for (var i = 0; i < discpersen.length; i++) {
            if (discpersen[i] != "" && discpersen[i] <= 100 && discpersen[i] > 0) {
              discpersen[i] = parseFloat(discpersen[i]);
              disc = +(discpersen[i] * harga / 100).toFixed({{ session('DECIMALDIGITAMOUNT') }});
              totaldisc += disc;
              harga -= disc;
              discDescription += discpersen[i] + "+";
            }
          }

          // membandingkan diskon yang didapat dengan minimal & maksimal diskon
          maxdiskon = hitungAkumulasiDiskonPersen(maxdiskon);
          mindiskon = hitungAkumulasiDiskonPersen(mindiskon);

          if (hitungAkumulasiDiskonPersen([row.discpersen, $('#DISCPERSEN').numberbox('getValue')].join('+')) <
            mindiskon) {
            discpersen = olddiskonpersen;
            totaldisc = olddiskonrp;
            discDescription = '';
            row.disc = olddiskonrp;
            data.disc = olddiskonrp;
            harga = parseFloat(row.harga) - olddiskonrp;

            $.messager.alert({
              title: 'Warning',
              msg: 'Diskon untuk <br>' + row.namabarang + ' kurang dari batas minimal: ' + " " + mindiskon + " %",
              timeout: {{ session('TIMEOUT') }},
            });
          } else if (hitungAkumulasiDiskonPersen(row.discpersen) > maxdiskon && maxdiskon > 0) {
            discpersen = olddiskonpersen;
            totaldisc = olddiskonrp;
            discDescription = '';
            row.disc = olddiskonrp;
            data.disc = olddiskonrp;
            harga = parseFloat(row.harga) - olddiskonrp;

            $.messager.alert({
              title: 'Warning',
              msg: 'Diskon untuk <br>' + row.namabarang + ' melebihi batas maksimal: ' + " " + maxdiskon + " %",
              timeout: {{ session('TIMEOUT') }},
            });
          }

          // membandingkan harga setelah diskon yang didapat dengan harga terendah
          if (harga >= hargajualmin && harga >= hargajualmin2) {
            discDescription = discDescription.slice(0, -1);
            data.disc = totaldisc;
          } else {
            if (harga < hargajualmin2 && hargajualmin2 > hargajualmin) {
              $.messager.alert({
                title: 'Warning',
                msg: 'Harga Terendah untuk Barang <br>' + row.namabarang + ' adalah ' + " " + format_amount(
                    hargajualmin2) + ' (Harga Jual Maksimal - Diskon Maksimal). Harga setelah diskon: ' +
                  format_amount(harga),
                timeout: {{ session('TIMEOUT') }},
              });
            } else {
              $.messager.alert({
                title: 'Warning',
                msg: `Harga Terendah (Jenis Harga Berdasarkan ${row.jenisharga == 'BARANG' ? 'Satuan' : (row.jenisharga == 'CUSTOMER' ? 'Customer' : 'Tipe Customer')}) untuk Barang <br> ${row.namabarang} adalah ${format_amount(hargajualmin)}`,
                timeout: {{ session('TIMEOUT') }},
              });
            }

            totaldisc = olddiskonrp;
            data.discpersen = olddiskonpersen;
            row.harga = parseFloat(oldharga);
            data.harga = parseFloat(oldharga);
            harga = row.harga - olddiskonrp;
            discDescription = '';
            row.disc = olddiskonrp;
            data.disc = olddiskonrp;
          }
        } else {
          var mindiskon = '';

          if (parseFloat(row.disccustomermin) > 0) {
            mindiskon = row.disccustomermin;
          } else if (parseFloat(row.disctipecustomermin) > 0) {
            mindiskon = row.disctipecustomermin;
          } else if (parseFloat(row.discmerkmin) > 0) {
            mindiskon = row.discmerkmin;
          }

          mindiskon = hitungAkumulasiDiskonPersen(mindiskon);

          if (mindiskon > 0) {
            data.discpersen = olddiskonpersen;
            totaldisc = olddiskonrp;
            discDescription = '';
            row.disc = olddiskonrp;
            data.disc = olddiskonrp;
            harga = parseFloat(row.harga) - olddiskonrp;

            $.messager.alert({
              title: 'Warning',
              msg: 'Diskon untuk <br>' + row.namabarang + ' kurang dari batas minimal: ' + " " + mindiskon + " %",
              timeout: {{ session('TIMEOUT') }},
            });
          } else {
            harga -= row.disc;

            if (harga >= hargajualmin && harga >= hargajualmin2) {

            } else {
              if (harga < hargajualmin2 && hargajualmin2 > hargajualmin) {
                $.messager.alert({
                  title: 'Warning',
                  msg: 'Harga Terendah untuk Barang <br>' + row.namabarang + ' adalah ' + " " + format_amount(
                    hargajualmin2) + ' (Harga Jual Maksimal - Diskon Maksimal)',
                  timeout: {{ session('TIMEOUT') }},
                });
              } else {
                $.messager.alert({
                  title: 'Warning',
                  msg: `Harga Terendah (Jenis Harga Berdasarkan ${row.jenisharga == 'BARANG' ? 'Satuan' : (row.jenisharga == 'CUSTOMER' ? 'Customer' : 'Tipe Customer')}) untuk Barang <br> ${row.namabarang} adalah ${format_amount(hargajualmin)}`,
                  timeout: {{ session('TIMEOUT') }},
                });
              }

              row.disc = olddiskonrp;
              row.harga = parseFloat(oldharga);
              data.harga = parseFloat(oldharga);
              harga = row.harga - olddiskonrp;
            }
          }
        }
      } else if (idbarang == "" || idbarang == null) {
        //BIARKAN
      } else if (idcustomer == "" || idcustomer == null) {
        data.disc = 0;
        console.log(prosessimpan, urutan);
        if (!prosessimpan) {
          $.messager.alert({
            title: 'Warning',
            msg: 'Customer belum dipilih ' + urutan,
            timeout: {{ session('TIMEOUT') }},
          });
        }
      } else if (kodemerk == "" || kodemerk == null) {
        data.disc = 0;

        $.messager.alert({
          title: 'Warning',
          msg: 'Informasi merk belum ditentukan pada barang ' + row.namabarang + ' (' + row.kodebarang + ')',
          timeout: {{ session('TIMEOUT') }},
        });
      }

      if (row.discpersen != 0) {
        data.discpersen = discDescription == "" || discDescription == null ? olddiskonpersen : discDescription;
      }

      data.subtotal = harga * data.jmlpenjualan;

      var nilaikurs = parseFloat(row.nilaikurs);

      @if (session('MULTICURRENCY') != '1')
        nilaikurs = 1;
      @endif

      data.hargakurs = parseFloat(row.harga) * nilaikurs;
      data.disckurs = totaldisc <= 0 ? row.disc : totaldisc * nilaikurs;
      data.subtotalkurs = data.subtotal * nilaikurs;

      if (row.ppn == 1) {
        if (row.pakaippn == 'TIDAK') {
          data.ppnrp = 0;
          data.dpp = data.subtotalkurs;
        } else if (row.pakaippn == 'EXCL') {
          if (row.ppnpersen == 12) {
            data.ppnrp = Math.round(data.subtotalkurs * 11 / row.ppnpersen * row.ppnpersen / 100);
            data.dpp = Math.round(data.subtotalkurs * 11 / row.ppnpersen);
          } else {
            data.ppnrp = Math.floor(data.subtotalkurs * parseFloat(row.ppnpersen) / 100);
            data.dpp = data.subtotalkurs;
          }
        } else if (row.pakaippn == 'INCL') {
          if (row.ppnpersen == 12) {
            data.ppnrp = Math.round(data.subtotalkurs * 11 / (100 + 11));
            data.dpp = Math.round((data.subtotalkurs - data.ppnrp) * 11 / row.ppnpersen);
          } else {
            data.ppnrp = Math.floor(data.subtotalkurs * parseFloat(row.ppnpersen) / (100 + parseFloat(row.ppnpersen)));
            data.dpp = data.subtotalkurs - data.ppnrp;
          }
        } else {
          data.ppnrp = 0;
          data.dpp = 0;
        }
      } else {
        if (row.pakaippn != "TIDAK") {
          $.messager.show({
            title: 'Warning',
            msg: 'Barang Non PPN',
            timeout: {{ session('TIMEOUT') }},
          });
        }
        data.pakaippn = 'TIDAK';
        data.ppnrp = 0;
        data.dpp = data.subtotalkurs;
      }

      data.ppnrp = +(data.ppnrp.toFixed({{ session('DECIMALDIGITAMOUNT') }}));
      data.dpp = +(data.dpp.toFixed({{ session('DECIMALDIGITAMOUNT') }}));

      dg.datagrid('updateRow', {
        index: index,
        row: data
      });

      // cek jika ada barang yang sama
      var rows = dg.datagrid('getRows');
      for (var i = 0; i < rows.length; i++) {
        if (index != i && (rows[i].kodebarang != "" && row.kodebarang == rows[i].kodebarang)) {
          $.messager.show({
            title: 'Warning',
            msg: 'Barang Yang Diinput Tidak Boleh Sama Dalam Satu Transaksi',
            timeout: {{ session('TIMEOUT') }},
          });
          dg.datagrid('deleteRow', index);
          break;
        }
      }
    }

    function hitung_grandtotal() {
      var data = $("#table_data_detail").datagrid('getRows');
      var total = 0;
      var grandtotal = 0;
      var total2 = 0;
      var ppnrp = 0;
      var totalppnrp = 0;
      var totaldpp = 0;
      var cekselisih = 0;
      var pembulatan = parseFloat($("#PEMBULATAN").numberbox('getValue')) ? parseFloat($("#PEMBULATAN").numberbox(
        'getValue')) : 0;
      var biaya = 0;
      var totalsesudahdisc = 0;
      var totaldiscglobal = 0;
      var subtotal2 = 0;
      var subtotalkurs_setelah_diskon_global = 0;
      var discpersenglobal;
      var discglobal;
      var namabaranghargaterendah = '';
      var diskonlebihbesardarimaster = false;
      var hargaterendahdiskonglobal = 0;
      var hargaterendah = 0;
      var discount = 0;

      var footer = {
        sisabbk: 0,
        jmlpenjualan: 0,
        sisa: 0,
        disc: 0,
        disckurs: 0,
        subtotal: 0,
        subtotalkurs: 0,
        ppnrp: 0,
        dpp: 0
      }

      var dpp = 0;
      var barangtidakkenapajak = 0;
      var barangkenapajak = 0;
      for (var i = 0; i < data.length; i++) {
        total += parseFloat(data[i].subtotalkurs);

        footer.sisabbk += parseFloat(data[i].sisabbk);
        footer.jmlpenjualan += parseFloat(data[i].jmlpenjualan);
        footer.sisapenjualan += parseFloat(data[i].sisapenjualan);
        footer.disc += parseFloat(data[i].disc);
        footer.disckurs += parseFloat(data[i].disckurs);
        footer.subtotal += parseFloat(data[i].subtotal);
        footer.subtotalkurs += parseFloat(data[i].subtotalkurs);
        footer.ppnrp += parseFloat(data[i].ppnrp);
        footer.dpp += parseFloat(data[i].dpp);

        var idcustomer = $("#IDCUSTOMER").val();
        var kodemerk = data[i].kodemerk;
        var idbarang = data[i].uuidbarang;
        var namabarang = data[i].namabarang;

        var discpersenmaster = 0;
        var errorMsg = '';

        if (idcustomer != "") {
          //CEK DISKON GLOBAL
          if (parseFloat($("#DISCPERSEN").numberbox('getValue')) > 0) {

            discpersenglobal = parseFloat($("#DISCPERSEN").numberbox('getValue'));
            subtotal2 = data[i].subtotalkurs;

            discpersenglobal = parseFloat(discpersenglobal);
            discglobal = +Math.round((subtotal2 * discpersenglobal / 100).toFixed({{ session('DECIMALDIGITAMOUNT') }}));

            var disglobalperbarang = Math.round((subtotal2 * discpersenglobal / 100).toFixed(
              {{ session('DECIMALDIGITAMOUNT') }}));

            totaldiscglobal += discglobal;
            totalsesudahdisc += subtotal2 - discglobal;
            subtotalkurs_setelah_diskon_global = subtotal2 - discglobal;

            if (totaldiscglobal > 0) {
              hargaterendah = parseFloat(data[i].hargaterendah);

              var maxdiskon = '';
              var mindiskon = '';

              if (parseFloat(data[i].disccustomermin) > 0) {
                maxdiskon = data[i].disccustomermax;
                mindiskon = data[i].disccustomermin;
              } else if (parseFloat(data[i].disctipecustomermin) > 0) {
                maxdiskon = data[i].disctipecustomermax;
                mindiskon = data[i].disctipecustomermin;
              } else if (parseFloat(data[i].discmerkmin) > 0) {
                maxdiskon = data[i].discmerkmax;
                mindiskon = data[i].discmerkmin;
              }

              // membandingkan diskon yang didapat dengan minimal & maksimal diskon
              maxdiskon = hitungAkumulasiDiskonPersen(maxdiskon);
              mindiskon = hitungAkumulasiDiskonPersen(mindiskon);

              if (hitungAkumulasiDiskonPersen([data[i].discpersen, discpersenglobal].join('+')) < mindiskon) {
                $.messager.alert({
                  title: 'Warning',
                  msg: 'Diskon untuk <br>' + data[i].namabarang + ' kurang dari batas minimal: ' + " " + mindiskon +
                    " %",
                  timeout: {{ session('TIMEOUT') }},
                });

                $('#DISCPERSEN').numberbox('setValue', 0);

                totaldiscglobal = 0;
                totalsesudahdisc = 0;
              } else if (hitungAkumulasiDiskonPersen([data[i].discpersen, discpersenglobal].join('+')) > maxdiskon &&
                maxdiskon > 0) {
                $.messager.alert({
                  title: 'Warning',
                  msg: 'Diskon untuk <br>' + data[i].namabarang + ' melebihi batas maksimal: ' + " " + maxdiskon +
                    " %",
                  timeout: {{ session('TIMEOUT') }},
                });

                $('#DISCPERSEN').numberbox('setValue', 0);

                totaldiscglobal = 0;
                totalsesudahdisc = 0;
              }
            }

            if ((subtotalkurs_setelah_diskon_global / data[i].jmlpenjualan) >= hargaterendah) {

            } else {
              if (maxdiskon > 0) {
                namabaranghargaterendah += data[i].namabarang + " adalah " + format_amount(hargaterendah) + ",<br>";
                diskonlebihbesardarimaster = true;
              }
            }

            if (data[i].pakaippn == 'TIDAK') {
              ppnrp = 0;
              dpp = subtotalkurs_setelah_diskon_global;
            } else if (data[i].pakaippn == 'EXCL') {
              if (parseFloat(data[i].ppnpersen) == 12) {
                ppnrp = Math.round(subtotalkurs_setelah_diskon_global * 11 / data[i].ppnpersen * data[i].ppnpersen / 100);
                dpp = Math.round(subtotalkurs_setelah_diskon_global * 11 / data[i].ppnpersen);
              } else {
                ppnrp = Math.floor(subtotalkurs_setelah_diskon_global * parseFloat(data[i].ppnpersen) / 100);
                dpp = subtotalkurs_setelah_diskon_global;
              }
            } else if (data[i].pakaippn == 'INCL') {
              if (parseFloat(data[i].ppnpersen) == 12) {
                ppnrp = Math.round(subtotalkurs_setelah_diskon_global * 11 / (100 + 11));
                dpp = Math.round((subtotalkurs_setelah_diskon_global - ppnrp) * 11 / data[i].ppnpersen);
              } else {
                ppnrp = Math.floor(subtotalkurs_setelah_diskon_global * parseFloat(data[i].ppnpersen) / (100 + parseFloat(
                  data[i].ppnpersen)));
                dpp = subtotalkurs_setelah_diskon_global - ppnrp;
              }
            }
            totalppnrp += ppnrp;
            totaldpp += dpp;

            if (parseFloat(data[i].ppnpersen) == 12) {
              if (data[i].pakaippn == 'INCL') {
                total2 += subtotalkurs_setelah_diskon_global;
              } else {
                total2 += subtotalkurs_setelah_diskon_global + ppnrp;
              }
            } else {
              total2 += (parseFloat(dpp) + parseFloat(ppnrp));
            }
          } else {
            if (data[i].pakaippn == 'EXCL') {
              total2 += parseFloat(data[i].subtotalkurs) + parseFloat(data[i].ppnrp);
            } else {
              total2 += parseFloat(data[i].subtotalkurs);
            }

            dpp = parseFloat(data[i].dpp);

            totalppnrp += parseFloat(data[i].ppnrp);
            totaldpp += parseFloat(dpp);

          }
        }

        if (data[i].pakaippn != 'TIDAK') {
          barangkenapajak += parseFloat(dpp);
        } else {
          barangtidakkenapajak += parseFloat(dpp);
        }
      }

      if (diskonlebihbesardarimaster) {
        $.messager.alert({
          title: 'Warning',
          msg: "Harga Terendah untuk Barang-Barang ini :<br>" + namabaranghargaterendah.substring(0,
            namabaranghargaterendah.length - 2),
          timeout: {{ session('TIMEOUT') }},
        });

        totaldiscglobal = 0;
        totalsesudahdisc = 0;
      }

      total2 = ((total2).toFixed({{ session('DECIMALDIGITAMOUNT') }}));

      var temp_uangmuka = uangmuka;

      grandtotal = parseFloat(total2) + parseFloat(biaya) + parseFloat(pembulatan);

      if ($('#jenistransaksi').val() == 'JUAL') {
        if (uangmuka > grandtotal) {
          temp_uangmuka = grandtotal;
          grandtotal = 0;
        } else {
          grandtotal -= temp_uangmuka;
        }
      } else {
        temp_uangmuka = 0;
      }

      $("#DISCRP").numberbox('setValue', totaldiscglobal);
      $("#TOTAL").numberbox('setValue', total);
      $('#BARANGKENAPAJAK').numberbox('setValue', barangkenapajak);
      $('#BARANGTIDAKKENAPAJAK').numberbox('setValue', barangtidakkenapajak);
      $("#TOTALSETELAHDISKON").numberbox('setValue', totalsesudahdisc);
      $('#txt_DPP').numberbox('setValue', totaldpp);
      $("#PPNRP").numberbox('setValue', totalppnrp);
      $("#UANGMUKA").numberbox('setValue', temp_uangmuka);
      $("#GRANDTOTAL").numberbox('setValue', grandtotal);
      $('#table_data_detail').datagrid('reloadFooter', [footer]);

      if (diskonlebihbesardarimaster) {
        $("#DISCPERSEN").numberbox('setValue', 0);
      }
    }

    function hitung_grandtotal_repacking() {
      var footer = {
        jml: 0,
        harga: 0
      };

      var rows = $('#table_detail_repacking').datagrid('getRows');

      for (var i = 0; i < rows.length; i++) {
        footer.jml += parseFloat(rows[i].jml);
        footer.harga += parseFloat(rows[i].harga);
      }

      $('#table_detail_repacking').datagrid('reloadFooter', [footer]);
    }

    function clear_plugin() {

      olddiskonpersen = 0.00;
      olddiskonrp = 0.00;
      olddiskonglobalrp = 0.00;
      oldharga = 0.00;

      $('.combogrid-f').each(function() {
        $(this).combogrid('grid').datagrid('load', {
          q: ''
        });
      });

      $('[name=pakaippn]').filter(function() {
        return $(this).val() == 2;
      }).prop('checked', true);

      $('.number').numberbox('setValue', 0);

      $("#PPNPERSEN").numberbox('setValue', ppnpersenaktif);
      hitung_grandtotal();

      $("#TGLTRANS, #TGLKIRIM, #TGLJATUHTEMPO").datebox('setValue', date_format());
      $("#TGLJATUHTEMPO").datebox('readonly');

      // $('#NOFAKTURPAJAK').textbox('setValue', '010')
    }

    /**
     * beberapa fungsi untuk penjualan langsung
     */
    function tambah_detail() {

      var index = $('#table_data_detail').datagrid('getRows').length;

      $('#table_data_detail').datagrid('appendRow', {
        kodebarang: '',
        jmlbonus: 0,
        disc: 0,
        discpersen: 0,
      }).datagrid('gotoCell', {
        index: index,
        field: 'kodebarang'
      });

      cekbarangnonstok = true;

      //   getRowIndex(target);
    }

    function hapus_detail() {
      var row = $('#table_data_detail').datagrid('getRows')[indexDetail];
      var jenis = $('[name=jenis]:checked').val();

      if (row.uuidbbk != undefined && row.uuidbbk != 0 && jenis == "Pesanan") {
        $.messager.alert('Warning', 'Barang tidak dapat dihapus, karena berasal dari Transaksi Pengeluaran Barang',
          'warning');
      } else {
        $('#table_data_detail').datagrid('deleteRow', indexDetail);
        hitung_grandtotal();
      }
    }

    function openAntrian() {
      $("#form_antrian").dialog('open');
    }

    function tampil_window_repacking() {
      var idlokasi = $('#IDLOKASI').combogrid('getValue');

      if (idlokasi == '' || idlokasi == null) {
        $.messager.alert('Warning', 'Anda belum memilih lokasi', 'warning');

        return false;
      }

      var idcustomer = $('#KODECUSTOMER').combogrid('getValue');

      if (idcustomer == '' || idcustomer == null) {
        $.messager.alert('Warning', 'Anda belum memilih customer', 'warning');

        return false;
      }

      $('#IDREPACKING').combogrid('clear');

      $('#table_detail_repacking').datagrid('loadData', []);

      $("#window_repacking").dialog('open');
    }

    async function tambah_repacking() {
      $("#window_repacking").dialog('close');

      var selected = $('#IDREPACKING').combogrid('grid').datagrid('getSelected');

      try {
        const res = await fetchData(
          jwt, link_api.getStokBarang, {
            uuidbarang: selected.uuidbarang,
            uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
            tgl: $('#TGLTRANS').datebox('getValue')
          }
        );

        if (res.success) {
          var hargabeli = await get_harga_barangbeli(selected.uuidbarang, selected.satuan);
          var hargajual = await get_harga_barang(selected.uuidbarang, selected.sataun);
          var daftardiskon = {};

          try {
            const res = await fetchData(
              jwt, link_api.getDaftarBarangDiskon, {
                uuidmerk: selected.uuidmerk,
                uuidcustomer: $('#IDCUSTOMER').val()
              }
            );
            if (res.success) {
              daftardiskon = res.data;
            } else {
              $.messager.alert('Error', res.message, 'error');
            }
          } catch (e) {
            const error = typeof e === 'string' ? e : e.message;
            const textError = getTextError(error);
            $.messager.alert('Error', textError, 'error');
          }

          // mendapatkan total harga
          var rows = $('#table_detail_repacking').datagrid('getRows');
          var harga = 0;

          for (var i = 0; i < rows.length; i++) {
            harga += parseFloat(rows[i].harga);
          }

          var pakaippn = defaultpakaippn;

          if (pakaippn == 0) {
            pakaippn = "TIDAK";
          } else if (pakaippn == 1) {
            pakaippn = "EXCL";
          } else if (pakaippn == 2) {
            pakaippn = "INCL";
          }

          var discpersen = '0';

          if (parseFloat(daftardiskon.disccustomermin) > 0) {
            discpersen = daftardiskon.disccustomermin;
          } else if (parseFloat(daftardiskon.disctipecustomermin) > 0) {
            discpersen = daftardiskon.disctipecustomermin;
          } else if (parseFloat(daftardiskon.discmerkmin) > 0) {
            discpersen = daftardiskon.discmerkmin;
          }

          oldharga = (selected.satuan == hargajual.satuan ? hargajual.hargamaxsatuan : (selected.satuan ==
            hargajual
            .satuan2 ? hargajual.hargamaxsatuan2 : hargajual.hargamaxsatuan3));
          olddiskonpersen = discpersen;

          var splitdiscpersen = discpersen.split("+");
          var harga_temp = oldharga;
          var totaldiscrp = 0;

          for (var i = 0; i < splitdiscpersen.length; i++) {
            if (splitdiscpersen[i] != "" && splitdiscpersen[i] <= 100 && splitdiscpersen[i] > 0) {
              splitdiscpersen[i] = parseFloat(splitdiscpersen[i]);
              var discrp = Math.round(splitdiscpersen[i] * harga_temp / 100);
              totaldiscrp += discrp;
              harga_temp -= discrp;
            }
          }

          olddiskonrp = totaldiscrp;

          var row = {
            uuidtransreferensi: selected.uuidrepacking,
            kodetransreferensi: selected.koderepacking,
            jenistransreferensi: 'REPACKING',
            uuidbarang: selected.uuidbarang,
            ppn: selected.ppn,
            kodebarang: selected.kodebarang,
            namabarang: selected.namabarang,
            barcodesatuan1: selected.barcodesatuan1,
            partnumber: selected.partnumber,
            kodemerk: selected.kodemerk,
            tutup: 0,
            satuan_lama: selected.satuan,
            satuanutama: selected.satuan,
            satuan: selected.satuan,
            konversi: selected.konversi,
            jml: 1,
            jmlpenjualan: 1,
            jmlbonus: 0,
            jmlstok: res.data.saldoqty,
            hargabeli: hargabeli,
            hargajual: harga,
            harga: harga,
            uuidcurrency: '{{ session('UUIDCURRENCY') }}',
            currency: '{{ session('SIMBOLCURRENCY') }}',
            nilaikurs: 1,
            discpersen: discpersen,
            disc: totaldiscrp,
            disckurs: totaldiscrp,
            subtotal: 0,
            pakaippn: 0,
            hargaterendah: (selected.satuan == hargajual.satuan ? hargajual.hargaminsatuan : (selected.satuan ==
              hargajual.satuan2 ? hargajual.hargaminsatuan2 : hargajual.hargaminsatuan3)),
            disccustomermin: daftardiskon.disccustomermin,
            disctipecustomermin: daftardiskon.disctipecustomermin,
            discmerkmin: daftardiskon.discmerkmin,
            disccustomermax: daftardiskon.disccustomermax,
            disctipecustomermax: daftardiskon.disctipecustomermax,
            discmerkmax: daftardiskon.discmerkmax,
            ppnpersen: ppnpersenaktif,
            pakaippn: pakaippn,
            hargaminsatuan: hargajual.hargaminsatuan,
            hargamaxsatuan: hargajual.hargamaxsatuan,
            hargaminsatuan2: hargajual.hargaminsatuan2,
            hargamaxsatuan2: hargajual.hargamaxsatuan2,
            hargaminsatuan3: hargajual.hargaminsatuan3,
            hargamaxsatuan3: hargajual.hargamaxsatuan3,
            satuanbesar: hargajual.satuan,
            satuansedang: hargajual.satuan2,
            satuankecil: hargajual.satuan3
          };

          $('#table_data_detail').datagrid('appendRow', row);


          hitung_subtotal_detail($('#table_data_detail').datagrid('getRows').length - 1, row, 5);
          hitung_grandtotal();
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        const error = typeof e === 'string' ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }

    async function insert_barang(barcodesatuan1) {
      var idcustomer = $("#IDCUSTOMER").val();
      var barcodesatuan1string = barcodesatuan1;
      var barcodesatuan1qty = 1;

      if (barcodesatuan1.includes('*')) {
        var barcodesatuan1split = barcodesatuan1.split('*');
        barcodesatuan1qty = parseInt(barcodesatuan1split[0]);
        barcodesatuan1string = barcodesatuan1split[1];
      }

      try {
        const res = await fetchData(
          jwt, link_api.loadDataBarangBarcode, {
            barcode: barcodesatuan1string,
            uuidcustomer: idcustomer,
          }
        );
        if (res.success) {
          if (res.data == null) {
            $.messager.alert('Error', 'Barcode Tersebut Tidak Ditemukan', 'error');
          } else {
            if ($("#KODECUSTOMER").combogrid('getValue') == "") {
              $.messager.show({
                title: 'Warning',
                msg: 'Customer Belum Diisi',
                timeout: {{ session('TIMEOUT') }},
              });
            } else {
              data = res.data;

              var id = data ? data.uuidbarang : '';
              var kode = data ? data.kode : '';
              var nama = data ? data.nama : '';
              var ppn = data ? data.ppn : '';
              var satuan = data ? data.satuan : '';
              var satuanutama = data ? data.satuanutama : '';
              var konversi = data ? data.konversi : '';
              var harga = await get_harga_barang(id, barcodesatuan1qty);
              var hargabeli = await get_harga_barangbeli(id, satuan);
              var hargajual = await get_harga_barangjual(id);
              var kodemerk = data ? data.kodemerk : 0;
              var subtotal = harga * barcodesatuan1qty;
              var kodebrg = data ? data.kode : '';
              var jml = barcodesatuan1qty;
              var discpersen = data.discpersen ? data.discpersen : 0;
              var disc = data.disc ? data.disc : 0;
              var disckurs = data.disckurs ? data.disckurs : 0;
              var pakaippn = data.pakaippn ? data.pakaippn : '';
              var ppnpersen = data.ppnpersen ? data.ppnpersen : 0;
              var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
              var partnumber = data.partnumber ? data.partnumber : '';
              var hargaterendah = data.hargaterendah ? data.hargaterendah : 0;
              var disccustomermin = data.disccustomermin ? data.disccustomermin : 0;
              var disctipecustomermin = data.disctipecustomermin ? data.disctipecustomermin : 0;
              var discmerkmin = data.discmerkmin ? data.discmerkmin : 0;
              var disccustomermax = data.disccustomermax ? data.disccustomermax : 0;
              var disctipecustomermax = data.disctipecustomermax ? data.disctipecustomermax : 0;
              var discmerkmax = data.discmerkmax ? data.discmerkmax : 0;
              var satuanbesar = data.satuanbesar;
              var satuansedang = data.satuansedang;
              var satuankecil = data.satuankecil;

              if (parseFloat(disccustomermin) > 0) {
                discpersen = disccustomermin;
              } else if (parseFloat(disctipecustomermin) > 0) {
                discpersen = disctipecustomermin;
              } else if (parseFloat(discmerkmin) > 0) {
                discpersen = discmerkmin;
              }

              oldharga = harga.hargamaxsatuan;
              olddiskonpersen = '0';
              olddiskonrp = 0;

              pakaippn = defaultpakaippn;
              if (pakaippn == 0) pakaippn = "TIDAK";
              else if (pakaippn == 1) pakaippn = "EXCL";
              else if (pakaippn == 2) pakaippn = "INCL";

              var daftar_barang = $('#table_data_detail').datagrid('getRows');
              var data = null
              var ada = false;
              // mencari daftar barang yang sudah ada
              for (var i in daftar_barang) {
                if (daftar_barang[i].uuidbarang == id) {

                  data = {
                    jmlpenjualan: (daftar_barang[i].jmlpenjualan + barcodesatuan1qty),
                    satuan_lama: satuan,
                    satuanutama: satuanutama,
                    satuan: satuan,
                  }

                  $('#table_data_detail').datagrid('updateRow', {
                    index: i,
                    row: data
                  }).datagrid('gotoCell', {
                    index: i,
                    field: 'kodebarang'
                  });

                  ada = true;

                  hitung_subtotal_detail(i, daftar_barang[i], 6);
                }
              }

              if (!ada) {
                if ($('#IDLOKASI').combogrid('getValue') != '') {
                  const res2 = await fetchData(
                    jwt, link_api.getStokBarangSatuan, {
                      uuidbarang: id,
                      uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
                      tgl: $('#TGLTRANS').datebox('getValue'),
                      satuan: satuan,
                    }
                  );
                  if (res2.success) {
                    var hargasatuan = 0;

                    if (satuan == satuanbesar) {
                      hargasatuan = harga.hargamaxsatuan;
                    } else if (satuan == satuansedang) {
                      hargasatuan = harga.hargamaxsatuan2;
                    } else if (satuan == satuankecil) {
                      hargasatuan = harga.hargamaxsatuan3;
                    }

                    var row = {
                      uuidbarang: id,
                      kodebarang: kode,
                      namabarang: nama,
                      ppn: ppn,
                      barcodesatuan1: barcodesatuan1,
                      partnumber: partnumber,
                      kodemerk: kodemerk,
                      tutup: 0,
                      satuan_lama: satuan,
                      satuanutama: satuanutama,
                      satuan: satuan,
                      konversi: konversi,
                      jml: 0,
                      jmlbonus: 0,
                      jmlpenjualan: jml,
                      jmlstok: res2.data.saldoqty,
                      harga: hargasatuan,
                      hargabeli: hargabeli,
                      hargajual: hargajual,
                      uuidcurrency: '{{ session('UUIDCURRENCY') }}',
                      currency: '{{ session('SIMBOLCURRENCY') }}',
                      nilaikurs: 1,
                      discpersen: discpersen,
                      disc: disc,
                      disckurs: disckurs,
                      subtotal: subtotal,
                      pakaippn: pakaippn,
                      ppnpersen: ppnpersenaktif,
                      hargaterendah: hargaterendah,
                      disccustomermin: disccustomermin,
                      disctipecustomermin: disctipecustomermin,
                      discmerkmin: discmerkmin,
                      disccustomermax: disccustomermax,
                      disctipecustomermax: disctipecustomermax,
                      discmerkmax: discmerkmax,
                      hargaminsatuan: harga.hargaminsatuan,
                      hargamaxsatuan: harga.hargamaxsatuan,
                      hargaminsatuan2: harga.hargaminsatuan2,
                      hargamaxsatuan2: harga.hargamaxsatuan2,
                      hargaminsatuan3: harga.hargaminsatuan3,
                      hargamaxsatuan3: harga.hargamaxsatuan3,
                      satuanbesar: satuanbesar,
                      satuansedang: satuansedang,
                      satuankecil: satuankecil
                    }
                    $('#table_data_detail').datagrid('appendRow', row);


                    hitung_subtotal_detail($('#table_data_detail').datagrid('getRows').length - 1, row, 7);
                  } else {
                    $.messager.alert('Warning', res2.message, 'warning');
                  }
                }
              }

              hitung_grandtotal();
              $('#BARCODE').textbox('textbox').focus();
            }
          }
        } else {
          throw new Error(res.message || 'Gagal memuat data');
        }
      } catch (e) {
        const error = typeof e === 'string' ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }

    async function get_harga_barang(idbarang, jumlah) {
      var idcustomer = $("#IDCUSTOMER").val();
      var tgltrans = $("#TGLTRANS").datebox('getValue');
      var idlokasi = $('#IDLOKASI').combogrid('getValue');
      var harga = {};

      if (idcustomer == '') {
        return harga;
      } else {
        try {
          const res = await fetchData(
            jwt, link_api.getHargaBarang, {
              uuidbarang: idbarang,
              uuidcustomer: idcustomer,
              tgltrans: tgltrans,
              uuidlokasi: idlokasi,
              jumlah: jumlah
            }
          );
          if (res.success) {
            harga = res.data.harga;
          } else {
            $.messager.alert('Error', res.message, 'error');
          }
        } catch (e) {
          const error = typeof e === 'string' ? e : e.message;
          const textError = getTextError(error);
          $.messager.alert('Error', textError, 'error');
        }
      }

      return harga;
    }

    async function get_harga_barangjual(idbarang) {
      var harga = 0;
      var idcustomer = $("#IDCUSTOMER").val();
      try {
        const res = await fetchData(
          jwt, link_api.hargaJualTerakhir, {
            uuidbarang: idbarang,
            uuidcustomer: idcustomer,
          }
        );
        if (res.success) {
          harga = res.data.hargajual;
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        const error = typeof e === 'string' ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
      return harga;
    }

    async function get_harga_barangbeli(idbarang, satuan) {
      var harga = 0;
      try {
        const res = await fetchData(
          jwt, link_api.hargaBeliTerakhir, {
            uuidbarang: idbarang,
            satuan: satuan,
            hargatertinggi: 1
          }
        );
        if (res.success) {
          harga = res.data.hargabeli;
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        const error = typeof e === 'string' ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
      return harga;
    }

    async function hitung_stok() {
      var rows = $('#table_data_detail').datagrid('getRows');

      if (rows.length == 0) {
        return false;
      }

      if ($('#IDLOKASI').combogrid('getValue') == '') {
        return false;
      }

      try {
        bukaLoader();
        const res = await fetchData(
          jwt, link_api.hitungStokTransaksiBarang, {
            uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
            tgltrans: $('#TGLTRANS').datebox('getValue'),
            data_detail: rows
          }
        );
        if (res.success && res.data != null) {
          for (var i = 0; i < res.data.length; i++) {
            $('#table_data_detail').datagrid('updateRow', {
              index: i,
              row: {
                jmlstok: res.data[i].jmlstok
              }
            });
          }
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        const error = typeof e === 'string' ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      } finally {
        tutupLoader();
      }
    }

    function setViewPenjualan() {
      $('#tr_pengeluaran').css('display', TRANSAKSI == 'HEADER' ? '' : 'none');
      $('#td_footer, #td_footer_total').css('display', LIHATHARGA == 0 ? 'none' : '');
      $('#DISCPERSEN, #PEMBULATAN').attr('readonly', INPUTHARGA == 0);
    }

    async function getConfigPenjualan() {
      try {
        const res = await fetchData(
          jwt, link_api.loadConfigPenjualan, {
            kodemenu: '{{ $kodemenu }}'
          }
        );
        if (res.success) {
          LIHATHARGA = res.data.LIHATHARGA;
          TRANSAKSI = res.data.TRANSAKSI;
          INPUTHARGA = res.data.INPUTHARGA;
          LIHATHARGABELI = res.data.LIHATHARGABELI;
          TAMPILHARGAJUALMINIMUM = res.data.TAMPILHARGAJUALMINIMUM;
        } else {
          throw new Error(res.message);
        }
      } catch (e) {
        const error = typeof e === 'string' ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }
  </script>
@endpush
