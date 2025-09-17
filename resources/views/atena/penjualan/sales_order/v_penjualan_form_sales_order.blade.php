@extends('template.form')

@section('content')
  <div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            <div data-options="region:'north',border:false" style="width:100%; height:190px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>
              <table>
                <input type="hidden" id="mode" name="mode">
                <input type="hidden" id="CEKLIMITPIUTANG" name="ceklimitpiutang">
                <input type="hidden" id="CEKLIMITNOTA" name="ceklimitnota">
                <input type="hidden" id="CEKNOTAJATUHTEMPO" name="ceknotajatuhtempo">
                <input type="hidden" id="APPROVE" name="approve">
                <input type="hidden" id="tglentry" name="tglentry">
                <tr>
                  <td valign="top">
                    <fieldset style="height:180px;">
                      <legend id="label_laporan">Info Transaksi</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form">Lokasi</td>
                          <td id="label_form"><input name="uuidlokasi" id="IDLOKASI" style="width:190px"></td>
                          <input type="hidden" id="KODELOKASI" name="kodelokasi">
                        </tr>
                        <tr>
                          <td id="label_form">No. Pesanan Penjualan</td>
                          <td id="label_form">
                            <input name="kodeso" id="KODESO" class="label_input" style="width:190px">
                          </td>
                          <td>
                            <input type="hidden" id="IDSO" name="uuidso">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">No. Pesanan Pelanggan</td>
                          <td id="label_form"><input name="kodepo" id="KODEPO" required class="label_input"
                              style="width:190px"></td>
                        </tr>
                        <tr>
                          <td id="label_form">Tgl. Trans</td>
                          <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date" style="width:190px">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Tgl. Rencana Kirim</td>
                          <td id="label_form"><input name="tglkirim" id="TGLKIRIM" class="date" style="width:190px">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Jam Rencana Kirim</td>
                          <td id="label_form"><input name="jamkirim" id="JAMKIRIM" class="easyui-timespinner"
                              style="width:190px"></td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td valign="top">
                    <div id="tab trans" class="easyui-tabs" style="width:400px;height:180px;">
                      <div title="Info Pelanggan">
                        <table border="0">
                          <tr>
                            <td id="label_form">Kode</td>
                            <td>
                              <input name="uuidcustomer" class="label_input" id="IDCUSTOMER" style="width:100px">
                              <input type="hidden" id="KODECUSTOMER" name="kodecustomer">
                              <input name="namacustomer" class="label_input" id="NAMACUSTOMER" style="width:210px"
                                readonly prompt="Nama Pelanggan">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form" style="vertical-align: super;">Alamat</td>
                            <td>
                              <textarea name="alamat" class="label_input" id="ALAMAT" readonly prompt="Alamat Pelanggan" multiline="true"
                                style="width:313px; height:35px" data-options="validType:'length[0, 500]'"></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form" style="vertical-align: super;">A. Kirim
                              <!--<a id="btn_browse"  class="easyui-linkbutton" data-options="iconCls:'icon-search', plain:true"></a></td>-->
                            <td>
                              <textarea name="alamatkirim" class="label_input" id="ALAMATKIRIM" readonly prompt="Alamat Kirim" multiline="true"
                                style="width:313px; height:35px" data-options="validType:'length[0, 500]'"></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form">Telp</td>
                            <td>
                              <input name="telp" class="label_input" id="TELP" style="width:313px" readonly
                                prompt="Telp Pelanggan">
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div title="Sub Pelanggan">
                        <table border="0">
                          <tr>
                            <td id="label_form">Kode</td>
                            <td>
                              <input name="uuidsubcustomer" class="label_input" id="IDSUBCUSTOMER" style="width:100">
                              <input type="hidden" id="KODESUBCUSTOMER" name="kodesubcustomer">
                              <input name="namasubcustomer" class="label_input" id="NAMASUBCUSTOMER" style="width:210"
                                readonly prompt="Nama SubPelanggan">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form" style="vertical-align: super;">Alamat&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td colspan="3">
                              <textarea name="alamatsubcustomer" class="label_input" id="ALAMATSUBCUSTOMER" readonly prompt="Alamat SubPelanggan"
                                multiline="true" style="width:313px; height:40px" data-options="validType:'length[0, 500]'"></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form">Telp</td>
                            <td colspan="3">
                              <input name="telpsubcustomer" class="label_input" id="TELPSUBCUSTOMER"
                                style="width:313px" readonly prompt="Telp SubPelanggan">
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div title="Info Pembayaran">
                        <table border="0">
                          <tr>
                            <td id="label_form">Syarat Bayar</td>
                            <td id="label_form">
                              <input name="uuidsyaratbayar" id="IDSYARATBAYAR" class="label_input"
                                style="width:182px">
                              <input name="tgljatuhtempo" id="TGLJATUHTEMPO" readonly class="date"
                                style="width:100px">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form">Marketing</td>
                            <td>
                              <input name="uuidmarketing" class="label_input" id="IDMARKETING" style="width:285px">
                              <input type="hidden" id="KODEMARKETING" name="kodemarketing">
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div title="Ekspedisi">
                        <table border="0">
                          <tr>
                            <td id="label_form" valign="top">Ekspedisi </td>
                            <td id="label_form">
                              <input name="uuidekspedisi" id="IDEKSPEDISI" style="width:100px">
                              <input name="namaekspedisi" class="label_input" id="NAMAEKSPEDISI" style="width:210px"
                                readonly prompt="Nama Ekspedisi">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form" style="vertical-align: super;">Alamat</td>
                            <td>
                              <textarea name="alamatekspedisi" class="label_input" id="ALAMATEKSPEDISI" readonly prompt="Alamat Ekspedisi"
                                multiline="true" style="width:313px; height:40px" data-options="validType:'length[0, 500]'"></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form">Telp</td>
                            <td>
                              <input name="telpekspedisi" class="label_input" id="TELPEKSPEDISI" style="width:313px"
                                readonly prompt="Telp Ekspedisi">
                            </td>
                          </tr>
                        </table>
                      </div>
                      </fieldset>
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
                <div title="Rincian Uang Muka">
                  <table id="table_data_detail_pembayaran" fit="true"></table>
                </div>
                <div title="Potensi SO">
                  <table id="table_data_potensi_so" fit="true"></table>
                </div>
              </div>
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:35px;">
              <table id="trans_footer" width="100%">
                <tr>
                  <td align="left" id="label_form">
                    <label style="font-weight:normal" id="label_form">User Input :</label>
                    <label id="lbl_kasir"></label>
                    <label style="font-weight:normal" id="label_form">| Tgl. Input :</label>
                    <label id="lbl_tanggal"></label>
                  </td>
                  <td align='right' id="td_lihatharga">
                    <table>
                      <tr hidden>
                        <td id="label_form" align="right">
                          Total <input name="total" id="TOTAL" class="number " style="width:110px;" readonly
                            required="true">
                        </td>
                      </tr>
                      <tr>
                        <td id="label_form" align="right" hidden>
                          DPP <input name="txt_dpp" id="txt_DPP" class="number " style="width:110px;" readonly>
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
              <input type="hidden" id="data_detail_pembayaran" name="data_detail_pembayaran">
              <input type="hidden" id="data_tutup" name="data_tutup">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
      <br>
      <a title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false" id='btn_simpan_modal'
        onclick="$('#window_button_simpan').window('open')">
        <img src="{{ asset('assets/images/simpan.png') }}">
      </a>
      <br><br>
      <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
        onclick="javascript:tutup()">
        <img src="{{ asset('assets/images/cancel.png') }}">
      </a>
    </div>
  </div>
  <div id="browse_alamat_kirim" title="Alamat Kirim">
    <table style="padding:5px">
      <tr>
        <td>
          <div title="Alamat Kirim">
            <table id="table_data_alamat_kirim" style="height:150px; width:335px"></table>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <div id="browse_alamat_kirim-buttons">
    <table cellpadding="0" cellspacing="0" style="width:100%">
      <tr>
        <td style="text-align:right">
          <a class="easyui-linkbutton" iconCls="icon-save" id='btn_pilih_alamat_kirim'
            onclick="javascript:pilih_alamat_kirim()">
            Pilih
          </a>
        </td>
      </tr>
    </table>
  </div>

  <div id="fm-catatan-barang" title="Spesifikasi Barang">
    <table style="padding:5px">
      <tr>
        <td>
          <textarea prompt="Tekan 'Ctrl + Enter' untuk simpan catatan
Tekan 'esc' untuk tutup dialog " name="catatanbarang"
            class="label_input" id="CATATANBARANG" multiline="true" style="width:300px; height:155px"
            data-options="validType:'length[0, 500]'">
        </textarea>
        </td>
      </tr>
    </table>
  </div>

  <div id="window_button_simpan" class="easyui-window" title="Konfirmasi" data-options="modal:true,closed:true"
    style="height:164cm;padding:15px 10px 10px 10px;top:20px">
    <center>
      <div id="button_simpan">
        <a title="Simpan" class="easyui-linkbutton button_add" id='simpan' onclick="simpan(this.id)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan</a><br><br>
        <a title="Simpan & Cetak" class="easyui-linkbutton button_add_print" id='simpan_cetak'
          onclick="simpan(this.id)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan & Cetak</a>
        <div>
    </center>
  </div>

  <div id="form_cetak" title="Preview" style="width:660px; height:450px">
    <div id="area_cetak"></div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('assets/js/utils.js') }}"></script>
  <script>
    var indexRow = 0;
    var tutupSO = 0;
    var olddiskonpersen = 0.00;
    var olddiskonrp = 0.00;
    var oldharga = 0.00;
    var cekbtnsimpan = true;
    var ppnpersenaktif = 0;
    let inputharga;
    let lihatharga;
    let lihathargabeli;
    let browsemkt;
    let kodeso;
    let lihatsemuatrans;
    let datacurrency;

    async function getSOConfig() {
      try {
        const token = '{{ session('TOKEN') }}';
        const [res1, res2, res3] = await Promise.all([
          fetchData(token, link_api.getConfig, {
            modul: 'TSO',
            config: 'KODESO'
          }),
          fetchData(token, link_api.getConfig, {
            modul: 'TSO',
            config: 'BROWSEMARKETING'
          }),
          fetchData(token, link_api.browseCurrency, null),
        ]);
        if (!res1.success) {
          throw res1.message;
        }
        if (!res2.success) {
          throw res2.message;
        }
        if (!res3.success) {
          throw res3.message;
        }
        browsemkt = res2.data;
        kodeso = res1.data;
        const simbolcurrency = '{{ session('SIMBOLCURRENCY') }}';
        datacurrency = res3.data.find(item => item.simbol == simbolcurrency);
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }

    $(document).ready(async function() {
      await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        inputharga = data.inputharga;
        lihatharga = data.lihatharga;
        lihathargabeli = data.lihathargabeli;
        lihatsemuatrans = data.lihatsemuatrans;
        var UT = data.cetak;
        if (UT == 1) {
          $('#simpan_cetak').css('filter', '');
        } else {
          $('#simpan_cetak').css('filter', 'grayscale(100%)');
          $('#simpan_cetak').removeAttr('onclick');
        }
        $('#td_lihatharga').attr('hidden', data.lihatharga == 0);
        $('#PEMBULATAN').numberbox({
          readonly: data.inputharga == 0
        });
      });
      await getSOConfig();
      $('#KODESO').textbox({
        readonly: kodeso.value == 'AUTO',
        prompt: kodeso.value == 'AUTO' ? 'Auto Generate' : '',
      });

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
            export_excel('Faktur Pesanan Penjualan', $("#area_cetak").html());
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
      browse_data_customer('#IDCUSTOMER');
      browse_data_marketing('#IDMARKETING');
      browse_data_subcustomer('#IDSUBCUSTOMER');
      browse_data_syaratbayar('#IDSYARATBAYAR');
      browse_data_ekspedisi('#IDEKSPEDISI');

      $('#TGLTRANS').datebox({
        onChange: function(newVal, oldVal) {
          var nilaikurs = 0;
          var harga = 0;
          var row_detail = $('#table_data_detail').datagrid('getRows');

          if ($('#mode').val() != '' && (nilaikurs > 1 || row_detail.length > 0) && oldVal != '') {
            $.messager.confirm('Confirm',
              'Anda Yakin Melakukan Perubahan Tanggal, Jika Ya Maka NilaiKurs dan Data Detail Akan Terganti ?',
              function(r) {
                if (r) {
                  get_all_kurs($('#TGLTRANS').datebox('getValue'), function(data) {
                    var curr = data.data_detail;
                    var ln = curr.length;
                    for (var i = 0; i < ln; i++) {
                      var ln1 = row_detail.length;
                      for (var j = 0; j < ln1; j++) {
                        if (curr[i].uuidcurrency == row_detail[j].uuidcurrency) {
                          $('#table_data_detail').datagrid('updateRow', {
                            index: j,
                            row_detail: {
                              nilaikurs: curr[i].kurs,
                              hargakurs: (row_detail[j].harga - row_detail[j].disc) * curr[i].kurs,
                              disckurs: row_detail[j].disc * curr[i].kurs,
                              subtotalkurs: (row_detail[j].harga - row_detail[j].disc) * curr[i]
                                .kurs * row_detail[j].jmlso,
                            }
                          });
                        }
                      }
                    }
                    hitung_grandtotal();
                  });
                }
              });
          }

          if ($('#mode').val() == 'tambah') {
            hitung_stok();
          }

          set_ppn_aktif(newVal, 'Bearer {{ session('TOKEN') }}', function(response) {
            ppnpersenaktif = response.data.ppnpersen;

            update_ppn_table_detail($('#table_data_detail'), ppnpersenaktif, function(index, row) {
              hitung_subtotal_detail(index, row);
            });

            hitung_grandtotal();
          });
        },
        onSelect: function(date) {
          var row_detail = $('#IDSYARATBAYAR').combogrid('grid').datagrid('getSelected');

          if ($('#mode').val() != '' && row_detail) {
            get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), row_detail.selisih);
          }
        }
      });

      $("[name=pakaippn]").change(function() {
        $("#PPNPERSEN").numberbox('setValue', $(this).val() == 0 ? 0 : ppnpersenaktif);
        hitung_grandtotal();
      });

      $("[name=pakaipph]").change(function() {
        $("#PPHPERSEN").numberbox('setValue', $(this).val() == 0 ? 0 : {{ session('PPH22PERSEN') }});
        hitung_grandtotal();
      });

      $('#DISKON').numberbox({
        onChange: function() {
          total = $('#TOTAL').numberbox('getValue');
          diskon = $('#DISKON').numberbox('getValue');
          $('#DISKONRP').numberbox('setValue', (total * (diskon / 100))).prop('readonly', (diskon > 0 ? true :
            false));
          hitung_grandtotal();
        }
      });

      $('#DISKONRP').numberbox({
        onChange: function() {
          hitung_grandtotal();
        }
      });

      $('#PEMBULATAN').numberbox({
        onChange: function() {
          hitung_grandtotal();
        }
      });

      $("#fm-catatan-barang").dialog({
        onOpen: function() {
          $('#fm-catatan-barang').form('clear');
        },
        buttons: [{
          text: 'Simpan',
          iconCls: 'icon-save',
          handler: function() {
            simpan_catatan_barang($('#CATATANBARANG').textbox('getValue'));
          },
        }],
        modal: true,
      }).dialog('close');

      $('#CATATANBARANG').textbox('textbox').bind('keydown', function(e) {
        if (e.keyCode == 13 && e.ctrlKey) { // when press ENTER key, accept the inputed value.
          simpan_catatan_barang($(this).val());
        } else if (e.keyCode == 27) {
          $("#fm-catatan-barang").dialog('close')
        }
      });

      $("#browse_alamat_kirim").dialog({
        onOpen: function() {
          $('#browse_alamat_kirim').form('clear');
        },
        buttons: '#browse_alamat_kirim-buttons',
      }).dialog('close');

      $('#BARCODE').textbox('textbox').bind('keydown', function(e) {
        if (e.keyCode == 13) { // when press ENTER key, accept the inputed value.
          if ($('#IDCUSTOMER').combogrid('getValue') == '') {
            $.messager.alert('Error', 'Anda belum memilih customer', 'Error');

            return false;
          }

          insert_barang($(this).val());

          $(this).val('');
        }
      });

      buat_table_detail();
      buat_table_detail_rekap();
      buat_table_alamat_kirim();
      buat_table_detail_pembayaran();
      buat_table_potensi_so();

      if ("{{ $mode }}" == "tambah") {
        tambah();
        tutupLoader();
      } else if ("{{ $mode }}" == "ubah") {
        ubah();
      }
    });

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    function cetak(id) {
      $("#window_button_cetak").window('close');
      $("#area_cetak").load(link_api.cetakPenjualanSalesOrder + id);
      $("#form_cetak").window('open');
    }

    function tambah() {
      $('#mode').val('tambah');
      $('#lbl_kasir, #lbl_tanggal').html('');
      $('#IDLOKASI').combogrid('readonly', false);
      $('#KODEPO').combogrid('readonly', false);
      $('#TGLTRANS').datebox('readonly', false);
      $('#btn_browse').show();
      $("#APPROVE").val('0');
      $('#JAMKIRIM').timespinner('setValue', '00:00:00');

      $('#table_data_detail').datagrid('options').RowDelete = true;

      idtrans = "";

      fetchData(
        '{{ session('TOKEN') }}',
        link_api.getLokasiDefault,
      ).then(res => {
        if (!res.success) {
          $.messager.alert('Warning', res.message, 'warning');
        } else {
          if (res.data.uuidlokasi != null) {
            $('#IDLOKASI').combogrid('setValue', res.data.uuidlokasi);
            $("#KODELOKASI").val(res.data.kodelokasi);
          }
        }
      }).catch(err => {
        const error = (typeof err === "string") ? err : err.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      });

      //jika tidak punya akses input harga
      if (inputharga == 0) {
        $(':radio:not(:checked)').attr('disabled', true);
      }

      clear_plugin();
      reset_detail();
    }

    async function ubah() {
      $(':radio:not(:checked)').attr('disabled', false);
      $('#mode').val('ubah');

      try {
        const response = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.loadDataHeaderPenjualanSalesOrder, {
            uuidso: '{{ $data }}'
          }
        );
        if (!response.success) {
          throw new Error(response.message);
        }
        row = response.data;
      } catch (e) {
        const error = (typeof e === "string") ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
        return;
      }

      if (row) {
        get_status_trans('{{ session('TOKEN') }}', "atena/penjualan/pesanan-penjualan", 'uuidso', row.uuidso, function(
          data) {
          data = data.data;
          $(".form_status").html(status_transaksi(data.status));
        });
        //jika tidak punya akses input harga
        if (inputharga == 0) {
          $(':radio:not(:checked)').attr('disabled', true);
        }

        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);

        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          data = data.data;
          var UT = data.ubah;
          var lihatsemuatrans = data.lihatsemuatrans;

          get_status_trans('{{ session('TOKEN') }}', "atena/penjualan/pesanan-penjualan", 'uuidso', row.uuidso,
            function(data) {
              data = data.data;
              if (UT == 1 && data.status == 'I') {
                if (row.userentry != '{{ session('DATAUSER')['uuid'] }}' &&
                  lihatsemuatrans == 0) {
                  $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                  $('#btn_simpan_modal').removeAttr('onclick');
                  $.messager.alert(
                    'Info',
                    'Transaksi Tidak Dapat Diubah, Data Tidak Sesuai Dengan Pembuat Pesanan',
                    'info'
                  );
                } else {
                  $('#btn_simpan_modal').css('filter', '');
                  $('#mode').val('ubah');
                }
              } else {
                $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                $('#btn_simpan_modal').removeAttr('onclick');
              }

              $("#form_input").form('load', row);
              $('#IDLOKASI').combogrid('readonly');

              if (row.maxcredit > 0) {
                $('#CEKLIMITPIUTANG').val(true);
              }

              if (row.maxnota > 0) {
                $('#CEKLIMITNOTA').val(true);
              }

              if (row.ceknotajatuhtempo == 1) {
                $("#CEKNOTAJATUHTEMPO").val(true);
              }

              $('#KODEPO').combogrid('readonly');
              $('#TGLTRANS').datebox('readonly');
              $('#btn_browse').hide();

              idtrans = row.uuidso;
              load_data(row.uuidso);
              load_data_pembayaran(row.uuidso);
            });
        });
        //CUSTOMER
        var url = link_api.browseCustomer;
        get_combogrid_data($("#IDCUSTOMER"), row.kodecustomer, url, '{{ session('TOKEN') }}');

        //SUBCUSTOMER
        var url = link_api.browseCustomer;
        get_combogrid_data($("#IDSUBCUSTOMER"), row.kodesubcustomer, url, '{{ session('TOKEN') }}');

        if (row.uuidekspedisi != "" && row.uuidekspedisi != null) {
          //EKSPEDISI
          var url = link_api.browseEkspedisi;
          get_combogrid_data($("#IDEKSPEDISI"), row.kodeekspedisi, url, '{{ session('TOKEN') }}');
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

    async function simpan(use) {
      $(':radio:not(:checked)').attr('disabled', false);
      var mode = $("#mode").val();
      var data = [];

      $('input[type=checkbox]').each(function() {
        if ($(this).prop('checked') == true) {
          data.push({
            tutupso: "1"
          });
        } else {
          data.push({
            tutupso: "0"
          });
        }
      });

      $('#data_tutup').val(JSON.stringify(data));
      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));
      $('#data_detail_pembayaran').val(JSON.stringify($('#table_data_detail_pembayaran').datagrid('getRows')));

      $("#APPROVE").val('0');
      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      $('#window_button_simpan').window('close');

      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }

      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        cekbtnsimpan = false;
        if (!isTokenExpired()) {
          try {
            const data = $("#form_input :input").serializeArray();
            const payload = {};

            for (let i = 0; i < data.length; i++) {
              payload[data[i].name] = data[i].value;
              if (data[i].name == 'data_detail' || data[i].name == 'data_detail_pembayaran' || data[i].name ==
                'data_tutup') {
                payload[data[i].name] = JSON.parse(payload[data[i].name]);
              }
              if (data[i].name == 'jamkirim') {
                payload[data[i].name] = payload[data[i].name] + ':00';
              }
            }
            payload['jenis_simpan'] = use;

            tampilLoaderSimpan();
            const response = await fetchData('{{ session('TOKEN') }}', link_api.simpanPenjualanSalesOrder, payload);
            cekbtnsimpan = true;
            if (!response.success) {
              $.messager.alert('Error', response.message, 'error');
            } else {
              $('#form_input').form('clear');
              $.messager.alert('Info', 'Transaksi Sukses', 'info');
              if (mode == 'ubah') {
                ubah();
              } else {
                tambah();
              }
              if (use == 'simpan_cetak') {
                cetak(response.data.uuidso);
              }
            }
          } catch (e) {
            const error = typeof e === "string" ? e : e.message;
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

    function reset_detail() {
      $('#table_data_detail').datagrid('loadData', []);
      $('#table_data_detail_rekap').datagrid('loadData', []);
      $('#table_data_detail_pembayaran').datagrid('loadData', []);
    }

    async function load_data(idtrans) {
      try {
        const response = await fetchData('{{ session('TOKEN') }}', link_api.loadDataPenjualanSalesOrder, {
          uuidso: idtrans
        });
        if (!response.success) {
          $.messager.alert('Error', response.message, 'error');
        } else {
          for (var x = 0; x < response.data.length; x++) {
            const res = await fetchData('{{ session('TOKEN') }}', link_api.loadSatuanBarang, {
              uuidbarang: response.data[x].uuidbarang
            });
            if (!res.success) {
              $.messager.alert('Error', res.message, 'error');
            } else {
              get_konversi(res.data, response.data[x].satuan, res.data[0].satuan);
              response.data[x].satuan_lama = response.data[x].satuan;
              response.data[x].hargaterendah = ((satuan_baru > satuan_lama) ? response.data[x].hargaterendah /
                konversi_baru : response.data[x].hargaterendah * konversi_lama).toFixed(0);
            }
          }
          $('#table_data_detail').datagrid('loadData', response.data);
          $('#table_data_detail_rekap').datagrid('loadData', response.data);

          var arrayidbarang = response.data.map(item => item.uuidbarang)

          load_data_potensi_so(JSON.stringify(arrayidbarang))
        }
      } catch (e) {
        const error = (typeof e === "string") ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }

    async function load_data_pembayaran(idtrans) {
      try {
        const response = await fetchData('{{ session('TOKEN') }}', link_api.loadDataPembayaranPenjualanSalesOrder, {
          uuidso: idtrans
        });
        if (!response.success) {
          $.messager.alert('Error', response.message, 'error');
        } else {
          $('#table_data_detail_pembayaran').datagrid('loadData', response.data);
        }
      } catch (e) {
        const error = (typeof e === "string") ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
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
        onChange: function(newVal, oldVal) {
          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
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
        columns: [
          [{
              field: 'uuidcustomer',
              hidden: true
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 200,
              sortable: true
            },
            {
              field: 'kota',
              title: 'Kota',
              width: 100,
              sortable: true
            },
            {
              field: 'alamat',
              title: 'Alamat',
              width: 300,
              sortable: true
            },
            {
              field: 'telp',
              title: 'Telp',
              width: 100,
              sortable: true
            },
            {
              field: 'uuidsyaratbayar',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 150,
              sortable: true
            },
          ]
        ],
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');

          if (row) {
            var alamat = row.alamat == "" || row.alamat == null ? "" : (row.alamat + "\r\n");
            if (row.kota && row.kota != 'null') alamat += row.kota;
            if (row.propinsi && row.propinsi != 'null') alamat += "-" + row.propinsi;
            if (row.negara && row.negara != 'null') alamat += "-" + row.negara;

            $('#NAMACUSTOMER').textbox('setValue', row.nama);
            $('#ALAMAT').textbox('setValue', alamat);
            $('#TELP').textbox('setValue', row.telp);
            $('#IDSYARATBAYAR').combogrid('setValue', row.uuidsyaratbayar);
            $('#IDMARKETING').combogrid('setValue', row.uuidmarketing);
            $('#ALAMATKIRIM').textbox('readonly', false);
            $('#ALAMATKIRIM').textbox('clear');
            // subcustomer dan customer tidak saling berhubungan untuk yang baru
            // var url = link_api.browseCustomer;
            // ubah_url_combogrid($("#IDSUBCUSTOMER"), url, true);
            $('#NAMASUBCUSTOMER').textbox('clear');
            $('#ALAMATSUBCUSTOMER').textbox('clear');
            $('#TELPSUBCUSTOMER').textbox('clear');

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
            $('#ALAMAT').textbox('clear');
            $('#TELP').textbox('clear');
            $('#IDSYARATBAYAR').combogrid('clear');
          }
          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
      });
    }

    function browse_data_marketing(id) {
      $(id).combogrid({
        panelWidth: 310,
        idField: 'uuidkaryawan',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        url: link_api.browseKaryawanMarketing,
        onBeforeLoad: function(param) {
          param.divisi = 'marketing';
        },
        readonly: browsemkt.value == 'DISABLE',
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
            },
          ]
        ],
      });
    }

    function browse_data_subcustomer(id) {
      $(id).combogrid({
        panelWidth: 600,
        idField: 'uuidcustomer',
        textField: 'kode',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        url: link_api.browseCustomer,
        columns: [
          [{
              field: 'uuidcustomer',
              hidden: true
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 200,
              sortable: true
            },
            {
              field: 'kota',
              title: 'Kota',
              width: 100,
              sortable: true
            },
            {
              field: 'alamat',
              title: 'Alamat',
              width: 300,
              sortable: true
            },
            {
              field: 'telp',
              title: 'Telp',
              width: 100,
              sortable: true
            },
            {
              field: 'uuidsyaratbayar',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 150,
              sortable: true
            },
          ]
        ],
        onSelect: function(index, row) {
          $("#IDSUBCUSTOMER").val(row.kode);
        },
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');

          if (row) {
            var alamat = row.alamat == "" || row.alamat == null ? "" : (row.alamat + "\r\n");
            if (row.kota && row.kota != 'null') alamat += row.kota;
            if (row.propinsi && row.propinsi != 'null') alamat += "-" + row.propinsi;
            if (row.negara && row.negara != 'null') alamat += "-" + row.negara;

            $('#NAMASUBCUSTOMER').textbox('setValue', row.nama)
            $('#ALAMATSUBCUSTOMER').textbox('setValue', alamat);
            $('#TELPSUBCUSTOMER').textbox('setValue', row.telp);;
            $('#ALAMATKIRIM').combogrid('readonly', true);
            $('#ALAMATKIRIM').textbox('clear');
          } else {
            $(this).combogrid('setValue', '');
            $('#NAMASUBCUSTOMER').textbox('clear');
            $('#ALAMATSUBCUSTOMER').textbox('clear');
            $('#TELPSUBCUSTOMER').textbox('clear');
            $('#ALAMATKIRIM').textbox('readonly', false);
            $('#ALAMATKIRIM').textbox('clear');
          }
          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
      });
    }

    function browse_data_ekspedisi(id) {
      $(id).combogrid({
        panelWidth: 490,
        idField: 'uuidekspedisi',
        textField: 'kodeekspedisi',
        url: link_api.browseEkspedisi,
        mode: 'remote',
        columns: [
          [{
              field: 'uuidekspedisi',
              hidden: true
            },
            {
              field: 'kodeekspedisi',
              title: 'Kode',
              width: 80
            },
            {
              field: 'namaekspedisi',
              title: 'Nama',
              width: 150
            },
            {
              field: 'telp',
              title: 'Telp',
              width: 80
            },
            {
              field: 'alamat',
              title: 'Alamat',
              width: 150
            },
          ]
        ],
        onChange: function() {
          var row = $(id).combogrid('grid').datagrid('getSelected');
          if (row) {
            $('#NAMAEKSPEDISI').textbox('setValue', row.namaekspedisi);
            $('#ALAMATEKSPEDISI').textbox('setValue', row.alamat);
            $('#TELPEKSPEDISI').textbox('setValue', row.telp);
          } else {
            $('#NAMAEKSPEDISI').textbox('clear');
            $('#ALAMATEKSPEDISI').textbox('clear');
            $('#TELPEKSPEDISI').textbox('clear');
          }
        }
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
        required: true,
        selectFirstRow: true,
        columns: [
          [{
              field: 'uuidsyaratbayar',
              hidden: true
            },
            {
              field: 'nama',
              title: 'Name',
              width: 120,
              sortable: true
            },
            {
              field: 'selisih',
              title: 'Selisih Hari',
              width: 150,
              sortable: true
            },
          ]
        ],
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');
          if ($('#mode').val() != '' && row) {
            get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), row.selisih)
          }
        },
      });
    }

    function simpan_catatan_barang(catatanBarang) {
      // post to detail grid
      var dg = $('#table_data_detail');
      var cell = dg.datagrid('cell');
      if (cell) {
        dg.datagrid('updateRow', {
          index: cell.index,
          row: {
            catatan: catatanBarang.toUpperCase()
          }
        }).datagrid('gotoCell', {
          index: cell.index,
          field: cell.field
        });

        $("#fm-catatan-barang").dialog('close')
      }
    }


    var defaultpakaippn = "{{ session('DEFAULTPAKAIPPN') }}";

    function browse_alamat_kirim(id, table) {
      $("#browse_alamat_kirim").dialog('open').dialog('setTitle', 'Browse Alamat Kirim');

      var idcustomer = $("#IDCUSTOMER").combogrid('getValue');

      fetchData(
        '{{ session('TOKEN') }}',
        link_api.browseAlamatSalesOrder, {
          uuidcustomer: idcustomer
        },
      ).then(res => {
        if (res.success) {
          $('#table_data_alamat_kirim').datagrid('loadData', res.data);
        } else {
          $.messager.alert('Warning', res.message, 'warning');
        }
      }).catch(e => {
        const error = (typeof e === "string") ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      });
    }

    function pilih_alamat_kirim(id, table) {
      var selected = $('#table_data_alamat_kirim').datagrid('getSelected');
      if (selected) {
        $('#ALAMATKIRIM').textbox('setValue', selected.alamat);
        $('#browse_alamat_kirim').dialog('close');
      } else {
        $.messager.show({
          title: 'Warning',
          msg: 'Harap pilih salah satu alamat',
          timeout: {{ session('TIMEOUT') }},
        });
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
        data: [],
        toolbar: [{
          text: 'Tambah',
          iconCls: 'icon-add',
          handler: function() {
            if ($('#table_data_detail').datagrid('options').RowAdd == false) {
              return false;
            }

            var index = $(dg).datagrid('getRows').length;
            $(dg).datagrid('appendRow', {
              kodebarang: '',
            }).datagrid('gotoCell', {
              index: index,
              field: 'kodebarang'
            });
          }
        }, {
          text: 'Hapus',
          iconCls: 'icon-remove',
          handler: function() {
            if ($('#table_data_detail').datagrid('options').RowDelete == false) {
              return false;
            }

            if ($('#mode').val() == 'ubah') {
              // if (row.omnichannel == 1) {
              // 	$.messager.alert('Peringatan', 'Barang tidak dapat dihapus', 'warning');

              // 	return false;
              // }
            }

            $(dg).datagrid('deleteRow', indexDetail);
            hitung_grandtotal();
          }
        }],
        frozenColumns: [
          [{
              field: 'cbtutupso',
              title: 'Tutup Pesanan Sebelumnya',
              align: 'center',
              width: 155,
              formatter: function(val, row) {
                if (row.cbtutupso == '1') {
                  return buatCheckbox('cbTutupSO', 1, indexRow);
                } else if (row.cbtutupso == '0') {
                  return buatCheckbox('cbTutupSO', 0, indexRow);
                }
              }
            },
            {
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 100,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 790,
                  mode: 'remote',
                  required: true,
                  idField: 'kode',
                  textField: 'kode',
                  onBeforeLoad: function(param) {
                    param.uuidcustomer = $('#IDCUSTOMER').combogrid('getValue');
                    param.uuidlokasi = $('#IDLOKASI').combogrid('getValue');
                    if ('undefined' === typeof param.q || param.q.length == 0) {
                      return false;
                    }
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
                        field: 'satuan',
                        title: 'Satuan',
                        width: 60
                      },
                      {
                        field: 'catatan',
                        title: 'Catatan',
                        width: 250
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
              title: 'Nama Barang',
              width: 250,
            },
            {
              field: 'namabarangalias',
              title: 'Nama Alias',
              width: 250,
              hidden: {{ session('GUNAKANALIASPENJUALAN') == 'YA' ? 'false' : 'true' }},
              editor: {
                type: 'textbox',
                options: {
                  validType: 'length[0,200]'
                }
              }
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
              }
            @endif
          ]
        ],
        columns: [
          [{
              field: 'catatan',
              title: 'Catatan',
              width: 150,
              editor: {
                type: 'validatebox',
                options: {
                  validType: 'length[0,300]'
                }
              }
            },
            {
              field: 'jmlstok',
              title: 'Stok',
              align: 'right',
              width: 60,
              formatter: format_qty,
            },
            {
              field: 'jmlso',
              title: 'Jumlah',
              align: 'right',
              width: 60,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
                options: {
                  required: true,
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
            ...(lihatharga == 1 ? [{
                field: 'uuidcurrency',
                title: 'Id Currency',
                hidden: true
              },
              {
                field: 'currency',
                title: 'Curr',
                width: 50,
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
                },
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }},
              },
              ...(lihatharga == 1 && lihathargabeli == 1 ? [{
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
                field: 'harga',
                title: 'Harga',
                align: 'right',
                width: 85,
                formatter: format_amount,
                editor: inputharga == 1 ? {
                  type: 'numberbox',
                  options: {
                    required: true
                  }
                } : null,
              },
              {
                field: 'discpersen',
                title: 'Disc(%)',
                align: 'center',
                width: 100,
                editor: inputharga == 1 ? {
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
                editor: inputharga == 1 ? {
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
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }},
              },
              {
                field: 'hargakurs',
                title: 'Harga ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 85,
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }},
                formatter: format_amount,
              },
              {
                field: 'disckurs',
                title: 'Disc ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 65,
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }},
                formatter: format_amount,
              },
              {
                field: 'subtotalkurs',
                title: 'Subtotal ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 95,
                formatter: format_amount,
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }},
              },
              {
                field: 'pakaippn',
                title: 'Pakai PPN',
                align: 'center',
                width: 65,
                editor: {
                  type: 'combobox',
                  options: {
                    required: true,
                    data: [{
                        value: 'INCL',
                        text: 'INCL'
                      },
                      {
                        value: 'EXCL',
                        text: 'EXCL'
                      },
                      {
                        value: 'TIDAK',
                        text: 'TIDAK'
                      },
                    ],
                    panelHeight: 'auto',
                  }
                }
              },
              {
                field: 'dpp',
                title: 'DPP ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 95,
                formatter: format_amount
              },
              {
                field: 'ppnrp',
                title: 'PPN ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 65,
                formatter: format_amount
              }
            ] : []),
            {
              field: 'ppn',
              hidden: true
            }
          ]
        ],
        onClickRow: function(index, row) {
          indexDetail = index;
        },
        onBeforeCellEdit: function(index, field) {
          indexRow = index;

          var row_detail = $(this).datagrid('getRows')[index];

          // if (row.omnichannel == 1 && ['jmlso', 'kodebarang'].indexOf(field) == -1) {
          // 	return false;
          // }

          if (field == 'catatan') {
            $("#fm-catatan-barang").dialog('open');
            $('#CATATANBARANG').textbox('setValue', row_detail.catatan).textbox('textbox').focus();
            return false;
          } else if (field == 'disc' || field == 'discpersen' || field == 'harga') {
            oldharga = row_detail.harga;
            olddiskonpersen = row_detail.discpersen;
            olddiskonrp = row_detail.disc;
          }
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);
          if (field == 'kodebarang') {
            var idcustomer = $("#IDCUSTOMER").combogrid('getValue');
            if (idcustomer == '') {
              $.messager.alert('Info', 'Customer Belum Dipilih', 'info');
            }
            // var idlokasi = $('#IDLOKASI').combogrid('getValue');
            ed.combogrid('grid').datagrid('options').url = link_api.browseBarangJualAll;
            ed.combogrid('grid').datagrid('load');
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

          if ($('#cbTutupSO_' + index).prop('checked') == true) {
            tutupSO = 1;
          } else {
            tutupSO = 0;
          }
        },
        onEndEdit: async function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data_detail', index, cell.field);
          var row_update = {};
          row_update = {
            cbtutupso: tutupSO,
          };

          switch (cell.field) {
            case 'kodebarang':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidbarang : '';
              var ppn = data ? data.ppn : '';
              var nama = data ? data.nama : '';
              var satuan = data ? data.satuan : '';
              var kodemerk = data ? data.kodemerk : '';
              var satuanutama = data ? data.satuanutama : '';
              var konversi = data ? data.konversi : '';
              var harga = await get_harga_barang(id); // ini object
              var hargabeli = await get_harga_barangbeli(id, satuan);
              var hargajual = await get_harga_barangjual(id);
              var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
              var partnumber = data.partnumber ? data.partnumber : '';
              var hargaterendah = harga.hargaminsatuan;
              // var hargaterendah    = data.hargaterendah ? data.hargaterendah : 0;
              var disccustomermin = data.disccustomermin ? data.disccustomermin : 0;
              var disctipecustomermin = data.disctipecustomermin ? data.disctipecustomermin : 0;
              var discmerkmin = data.discmerkmin ? data.discmerkmin : 0;
              var disccustomermax = data.disccustomermax ? data.disccustomermax : 0;
              var disctipecustomermax = data.disctipecustomermax ? data.disctipecustomermax : 0;
              var discmerkmax = data.discmerkmax ? data.discmerkmax : 0;
              var discpersen = '0';

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

              var hargabarang = harga.hargamaxsatuan;

              @if (str_contains(session('NAMADATABASE'), 'berlian'))
                if (hargabarang == 0) {
                  hargabarang = hargajual;
                }
              @endif

              row_update = {
                uuidbarang: id,
                ppn: ppn,
                namabarang: nama,
                kodemerk: kodemerk,
                barcodesatuan1: barcodesatuan1,
                partnumber: partnumber,
                tutup: 0,
                satuan_lama: satuan,
                satuan: satuan,
                satuanutama: satuanutama,
                konversi: konversi,
                jmlso: 0,
                sisaso: 0,
                hargabeli: hargabeli,
                hargajual: hargajual,
                harga: hargabarang,
                uuidcurrency: datacurrency.uuidcurrency,
                currency: '{{ session('SIMBOLCURRENCY') }}',
                nilaikurs: 1,
                discpersen: discpersen,
                disc: 0,
                disckurs: 0,
                subtotal: 0,
                pakaippn: defaultpakaippn,
                hargaterendah: hargaterendah,
                disccustomermin: disccustomermin,
                disctipecustomermin: disctipecustomermin,
                discmerkmin: discmerkmin,
                disccustomermax: disccustomermax,
                disctipecustomermax: disctipecustomermax,
                discmerkmax: discmerkmax,
                ppnpersen: ppnpersenaktif,
                cbTutupSO: tutupSO,
                hargaminsatuan: harga.hargaminsatuan,
                hargamaxsatuan: harga.hargamaxsatuan,
                hargaminsatuan2: harga.hargaminsatuan2,
                hargamaxsatuan2: harga.hargamaxsatuan2,
                hargaminsatuan3: harga.hargaminsatuan3,
                hargamaxsatuan3: harga.hargamaxsatuan3,
                satuanbesar: harga.satuan,
                satuansedang: harga.satuan2,
                satuankecil: harga.satuan3,
                jenishargajual: data.jenishargajual
              };

              break;
            case 'satuan':
              // nilai changes.satuan tidak akan diisi secara otomatis.
              // Ini karena combogrid tidak mengirimkan nilai yang dipilih secara langsung ke changes object
              var satuanValue = ed.combogrid('getValue');

              get_konversi(ed.combogrid('grid').datagrid('getRows'), satuanValue, row.satuan_lama);

              if (satuan_baru != 0 || satuan_lama != 0 && satuanValue) {
                row_update = {
                  harga: satuanValue == row.satuanbesar ? row.hargamaxsatuan : (satuanValue == row
                    .satuansedang ? row.hargamaxsatuan2 : row.hargamaxsatuan3),
                  hargakurs: satuanValue == row.satuanbesar ? row.hargamaxsatuan : (satuanValue == row
                    .satuansedang ? row.hargamaxsatuan2 : row.hargamaxsatuan3),
                  hargaterendah: satuanValue == row.satuanbesar ? row.hargaminsatuan : (satuanValue == row
                    .satuansedang ? row.hargaminsatuan2 : row.hargaminsatuan3),
                  // harga      : ((satuan_baru>satuan_lama) ? row.harga/konversi_baru    : row.harga*konversi_lama).toFixed(0),
                  // hargakurs  : ((satuan_baru>satuan_lama) ? row.hargakurs/konversi_baru: row.hargakurs*konversi_lama).toFixed(0),
                  // hargaterendah  : ((satuan_baru>satuan_lama) ? row.hargaterendah/konversi_baru: row.hargaterendah*konversi_lama).toFixed(0),
                  satuan_lama: satuanValue,
                  cbTutupSO: tutupSO,
                };
              }

              var stok = row.jmlstok;

              try {
                const res = await fetchData(
                  '{{ session('TOKEN') }}',
                  link_api.getStokBarangSatuan, {
                    uuidbarang: row.uuidbarang,
                    uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
                    satuan: satuanValue,
                    tgltrans: $('#TGLTRANS').datebox('getValue')
                  },
                );

                if (!res.success) {
                  $.messager.alert('Error', res.message, 'error');
                } else {
                  if (res.data.saldoqty == null) {
                    stok = res.data.saldoqty;
                  }
                  row_update['jmlstok'] = stok;
                }
              } catch (e) {
                const error = (typeof e === 'string') ? e : e.message;
                const textError = getTextError(error);
                $.messager.alert('Error', textError, 'error');
              }

              var hargabeli = await get_harga_barangbeli(row.uuidbarang, row.satuan);

              row_update.hargabeli = hargabeli;

              break;
            case 'currency':
              var data = ed.combogrid('grid').datagrid('getSelected');
              var idcurrency = data ? data.uuidcurrency : datacurrency.uuidcurrency;
              var nilai = get_kurs($('#TGLTRANS').datebox('getValue'), idcurrency);
              row_update = {
                uuidcurrency: idcurrency,
                cbtutupso: tutupSO,
                nilaikurs: nilai ? nilai : 1
              };
              break;
            case 'jmlso':
              try {
                fetchData('{{ session('TOKEN') }}', link_api.cekCollie, {
                  uuidbarang: row.uuidbarang,
                  jmlso: parseInt(row.jmlso)
                }).then(response => {
                  if (!response.success) {
                    $.messager.alert('Warning', response.message, 'warning');
                  }
                });
              } catch (e) {
                const error = (typeof e === 'string') ? e : e.message;
                const textError = getTextError(error);
                $.messager.alert('Error', textError, 'error');
              }

              if (row.jenishargajual == 'JUMLAH') {
                var harga = await get_harga_barang(row.uuidbarang, row.jmlso);

                if (harga == null) {
                  $.messager.alert(
                    'Peringatan',
                    'Jumlah Tidak Termasuk Dalam Range Jumlah Pada Master Harga Jual',
                    'warning'
                  );

                  row_update = {
                    jmlso: oldjmlso
                  }
                } else {
                  var harga = row.satuan == row.satuanbesar ? row.hargamaxsatuan : (row.satuan == row.satuansedang ?
                    row.hargamaxsatuan2 : row.hargamaxsatuan3);
                  // var hargaminsatuan = row.satuan == row.satuanbesar ? row.hargaminsatuan : (row.satuan == row.satuansedang ? row.hargaminsatuan2 : row.hargaminsatuan3);
                  // var hargamaxsatuan = row.satuan == row.satuanbesar ? row.hargamaxsatuan : (row.satuan == row.satuansedang ? row.hargamaxsatuan2 : row.hargamaxsatuan3)

                  row_update = {
                    harga: harga
                  };
                }
              }

              break;
            case 'pakaippn':
              row_update = {
                ppnpersen: ppnpersenaktif,
              };

              break;
          }
          if (changes.discpersen == 0) row_update.disc = 0;

          if (jQuery.isEmptyObject(row_update) == false) {
            $(this).datagrid('updateRow', {
              index: index,
              row: row_update
            });
          }


          var datatemp = $('#table_data_detail').datagrid('getRows');

          if (datatemp.length == 0) {
            $('#table_data_potensi_so').datagrid('loadData', []);
          } else {
            var arrayidbarang = datatemp.map(item => item.uuidbarang)
            load_data_potensi_so(JSON.stringify(arrayidbarang))
          }

          if (changes.kodebarang) {
            if ($('#IDLOKASI').combogrid('getValue') != '') {
              try {
                const res = await fetchData(
                  '{{ session('TOKEN') }}',
                  link_api.getStokBarangSatuan, {
                    uuidbarang: row.uuidbarang,
                    uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
                    tgltrans: $('#TGLTRANS').datebox('getValue'),
                    satuan: row.satuan
                  },
                );

                if (!res.success) {
                  $.messager.alert('Error', res.message, 'error');
                } else {
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
                }
              } catch (e) {
                const error = (typeof e === 'string') ? e : e.message;
                const textError = getTextError(error);
                $.messager.alert('Error', textError, 'error');
              }
            }
            if ($('#IDCUSTOMER').combogrid('getValue') != '') {
              try {
                const response = await fetchData(
                  '{{ session('TOKEN') }}',
                  link_api.getDataSO, {
                    uuidbarang: row.uuidbarang,
                    uuidcustomer: $('#IDCUSTOMER').combogrid('getValue'),
                    tgltrans: $('#TGLTRANS').datebox('getValue')
                  }
                );

                if (!response.success) {
                  return false;
                }

                var msg = response.data;
                cekSO = false;
                for (var i = 0; i < msg.length; i++) {
                  if (msg[i].kode == $("#KODESO").textbox('getValue')) //CEK SO SAMA
                  {
                    cekSO = true;
                  }
                }

                if (msg.success && !cekSO) {
                  var text = 'Masih Terdapat Outstanding SO pada : <br>';

                  for (var i = 0; i < msg.length; i++) {
                    text += 'Kode : ' + msg[i].kode + ' &nbsp; Jumlah : ' + msg[i].jml +
                      '<br>';
                  }

                  text += 'Apakah SO Diatas Ingin Ditutup ?';

                  $.messager.confirm('Confirm', text, function(r) {
                    if (r) {
                      $('#cbTutupSO_' + index).prop('checked', true);
                      row_update = {
                        cbtutupso: 1,
                      };
                    } else {
                      $('#cbTutupSO_' + index).prop('checked', false);
                      row_update = {
                        cbtutupso: 0,
                      };
                    }

                    if (jQuery.isEmptyObject(row_update) == false) {
                      $("#table_data_detail").datagrid('updateRow', {
                        index: index,
                        row: row_update
                      });
                    }

                  });
                }
              } catch (e) {
                const error = (typeof e === 'string') ? e : e.message;
                const textError = getTextError(error);
                $.messager.alert('Error', textError, 'error');
              }
            } else {
              $('#table_data_detail').datagrid('deleteRow', index);

              $.messager.show({
                title: 'Warning',
                msg: 'Customer Harus Diisi Telebih Dahulu',
                timeout: {{ session('TIMEOUT') }},
              });
            }
          }
        },
        onLoadSuccess: function(data) {
          hitung_grandtotal();
        },
        onAfterDeleteRow: function(index, row_detail) {
          hitung_grandtotal();
        },
        onAfterEdit: async function(index, row, changes) {
          hitung_subtotal_detail(index, row);
          hitung_grandtotal();
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
        view: detailview,
        detailFormatter: function(index, row) {
          return '<div style="padding:2px;position:relative;"><table class="ddv"></table></div>';
        },
        columns: [
          [{
              field: 'uuidbarang',
              hidden: true
            },
            {
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 85,
            },
            {
              field: 'namabarang',
              title: 'Nama Barang',
              width: 300,
            },
            {
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
            },
            {
              field: 'jmlso',
              title: 'Jml SO',
              align: 'right',
              width: 60,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
              }
            },
            {
              field: 'terpenuhiso',
              title: 'Terpenuhi SO',
              align: 'right',
              width: 85,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
              }
            },
            {
              field: 'sisaso',
              title: 'Sisa SO',
              align: 'right',
              width: 60,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
              }
            },
            {
              field: 'satuan',
              title: 'Satuan',
              width: 55,
              align: 'left'
            },
          ]
        ],
        onExpandRow: function(index, row) {
          var ddv = $(this).datagrid('getRowDetail', index).find('table.ddv');
          ddv.datagrid({
            url: link_api.informasiSO,
            method: 'post',
            queryParams: {
              idtrans: idtrans,
              uuidbarang: row.uuidbarang
            },
            fitColumns: true,
            singleSelect: true,
            rownumbers: true,
            loadMsg: '',
            height: 'auto',
            columns: [
              [{
                  field: 'kodedo',
                  title: 'No Pesanan Pengiriman',
                  width: 100,
                },
                {
                  field: 'tgltrans',
                  title: 'Tgl. Trans',
                  align: 'center',
                  width: 65,
                },
                {
                  field: 'tglkirim',
                  title: 'Tgl. Kirim',
                  align: 'center',
                  width: 65,
                },
                {
                  field: 'jml',
                  title: 'Jumlah',
                  align: 'right',
                  width: 50,
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                  }
                },
                {
                  field: 'satuan',
                  title: 'Satuan',
                  width: 45,
                  align: 'left'
                },
                {
                  field: 'username',
                  title: 'User',
                  width: 70,
                  align: 'left'
                },

              ]
            ],
            onResize: function() {
              $(dg).datagrid('fixDetailRowHeight', index);
            },
            onLoadSuccess: function() {
              setTimeout(function() {
                $(dg).datagrid('fixDetailRowHeight', index);
              }, 0);
            }
          });
          $(dg).datagrid('fixDetailRowHeight', index);
        },
        onLoadSuccess: function(data) {},
        onAfterDeleteRow: function(index, row) {},
        onAfterEdit: function(index, row, changes) {}
      }).datagrid();
    }

    function buat_table_detail_pembayaran() {
      var dg = '#table_data_detail_pembayaran';

      $(dg).datagrid({
        clickToEdit: false,
        dblclickToEdit: true,
        showFooter: true,
        singleSelect: true,
        rownumbers: true,
        data: [],
        toolbar: [{
            text: 'Tambah',
            iconCls: 'icon-add',
            handler: function() {
              var index = $(dg).datagrid('getRows').length;
              $(dg).datagrid('appendRow', {
                tglpembayaran: '{{ date('Y-m-d') }}',
                amount: 0,
              }).datagrid('gotoCell', {
                index: index,
                field: 'uangmuka'
              });

              //   getRowIndex(target);
            }
          }, {
            text: 'Hapus',
            iconCls: 'icon-remove',
            handler: function() {
              $(dg).datagrid('deleteRow', indexDetail);
              hitung_grandtotal();
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
              field: 'uangmuka',
              title: 'Uang Muka',
              width: 80,
              formatter: function() {
                return "Uang Muka";
              }
            },
            {
              field: 'urutan',
              title: 'Urutan',
              width: 80,
              formatter: function(value, row, index) {
                return "Ke-" + (index + 1);
              }
            },
            {
              field: 'tglpembayaran',
              title: 'Tgl. Batas Pembayaran',
              width: 140,
              formatter: ubah_tgl_indo,
              align: 'center',
              editor: {
                type: 'datebox',
                options: {
                  required: true,
                }
              }
            },
            {
              field: 'persentase',
              title: 'Persentase',
              align: 'right',
              width: 80,
              formatter: format_amount,
              editor: inputharga == 1 ? {
                type: 'numberbox'
              } : null
            },
            {
              field: 'amount',
              title: 'Nilai Pembayaran',
              align: 'right',
              width: 105,
              editor: inputharga == 1 ? {
                type: 'numberbox'
              } : null
            },
          ]
        ],
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail_pembayaran', index, field);
          if (field == "tglpembayaran") {
            ed.datebox('showPanel');
          }
        },
        onAfterEdit: function(index, row, changes) {
          if (changes.amount) {
            $(this).datagrid('updateRow', {
              index: index,
              row: {
                persentase: changes.amount / $('#GRANDTOTAL').numberbox('getValue') * 100
              }
            });
          }

          if (changes.persentase) {
            $(this).datagrid('updateRow', {
              index: index,
              row: {
                amount: changes.persentase / 100 * $('#GRANDTOTAL').numberbox('getValue')
              }
            });
          }

          hitung_subtotal_pembayaran(index, row);
        },
        onLoadSuccess: function(data) {
          for (var i = 0; i < data.rows.length; i++) {
            $(this).datagrid('updateRow', {
              index: i,
              row: {
                persentase: data.rows[i].amount / $('#GRANDTOTAL').numberbox('getValue') * 100
              }
            })
          }
        }
      }).datagrid('enableCellEditing');
    }

    function buat_table_alamat_kirim(id, table) {
      var dg = '#table_data_alamat_kirim';

      $(dg).datagrid({
        clickToEdit: false,
        dblclickToEdit: true,
        singleSelect: true,
        rownumbers: true,
        data: [],
        columns: [
          [{
            field: 'alamat',
            title: 'Alamat Kirim',
            width: 300,
            sortable: true,
            multiline: true
          }, ]
        ],
      }).datagrid();
    }

    function buat_table_potensi_so() {
      var dg = '#table_data_potensi_so';

      $(dg).datagrid({
        singleSelect: true,
        rownumbers: true,
        data: [],
        columns: [
          [{
              field: 'uuidbarang',
              hidden: true
            },
            {
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 85,
            },
            {
              field: 'namabarang',
              title: 'Nama Barang',
              width: 300,
            },
            {
              field: 'kodeso',
              title: 'Kode SO',
              width: 300,
            },
          ]
        ],
        onCellEdit: function(index, field, val) {},
        onAfterEdit: function(index, row, changes) {},
        onLoadSuccess: function(data) {}
      });
    }

    function hitung_subtotal_detail(index, row) {
      // hitung diskon lebih dahulu
      var data = {};
      var harga = parseFloat(row.harga);
      var hargappn = parseFloat(row.harga);
      var dg = $('#table_data_detail');
      var totaldisc = 0;
      var discount = 0;

      row.jmlso = parseFloat(row.jmlso).toFixed({{ session('DECIMALDIGITQTY') }});
      data.jmlso = row.jmlso;

      var idcustomer = $("#IDCUSTOMER").combogrid('getValue');
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
              hargappn -= discpersen[i] * hargappn / 100;
              discDescription += discpersen[i] + "+";
            }
          }

          // membandingkan diskon yang didapat dengan minimal & maksimal diskon
          maxdiskon = hitungAkumulasiDiskonPersen(maxdiskon);

          mindiskon = hitungAkumulasiDiskonPersen(mindiskon);

          if (hitungAkumulasiDiskonPersen(row.discpersen) < mindiskon) {
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
                  hargajualmin2) + ' (Harga Jual Maksimal - Diskon Maksimal)',
                timeout: {{ session('TIMEOUT') }},
              });
            } else {
              $.messager.alert({
                title: 'Warning',
                msg: 'Harga Terendah untuk Barang <br>' + row.namabarang + ' adalah ' + " " + format_amount(
                  hargajualmin),
                timeout: {{ session('TIMEOUT') }},
              });
            }

            totaldisc = olddiskonrp;
            discpersen = olddiskonpersen;
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
                  msg: 'Harga Terendah untuk Barang <br>' + row.namabarang + ' adalah ' + " " + format_amount(
                    hargajualmin),
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

        $.messager.alert({
          title: 'Warning',
          msg: 'Customer belum dipilih',
          timeout: {{ session('TIMEOUT') }},
        });
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

      data.subtotal = harga * data.jmlso;
      data.subtotalppn = hargappn * data.jmlso;

      var nilaikurs = parseFloat(row.nilaikurs);
      @if (session('MULTICURRENCY') == '0')
        nilaikurs = 1;
      @endif

      data.hargakurs = parseFloat(row.harga) * nilaikurs;
      data.disckurs = totaldisc <= 0 ? row.disc : totaldisc * nilaikurs;
      data.subtotalkurs = data.subtotal * nilaikurs;
      data.subtotalkursppn = data.subtotalppn * nilaikurs;

      if (row.ppn == 1) {
        if (row.pakaippn == 'TIDAK') {
          data.ppnrp = 0;
          data.dpp = data.subtotalkursppn;
        } else if (row.pakaippn == 'EXCL') {
          if (row.ppnpersen == 12) {
            data.ppnrp = Math.round(data.subtotalkursppn * 11 / row.ppnpersen * row.ppnpersen / 100);
            data.dpp = Math.round(data.subtotalkursppn * 11 / row.ppnpersen);
          } else {
            data.ppnrp = Math.floor(data.subtotalkursppn * parseFloat(row.ppnpersen) / 100);
            data.dpp = data.subtotalkursppn;
          }
        } else if (row.pakaippn == 'INCL') {
          if (row.ppnpersen == 12) {
            data.ppnrp = Math.round(data.subtotalkursppn * 11 / (100 + 11));
            data.dpp = Math.round((data.subtotalkursppn - data.ppnrp) * 11 / row.ppnpersen);
          } else {
            data.ppnrp = Math.floor(data.subtotalkursppn * parseFloat(row.ppnpersen) / (100 + parseFloat(row.ppnpersen)));
            data.dpp = data.subtotalkursppn - data.ppnrp;
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

      data.pph22rp = Math.floor(row.pph22persen * data.dpp / 100);
      data.pph22rp = +(data.pph22rp.toFixed({{ session('DECIMALDIGITAMOUNT') }}));
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
            msg: 'Barang Yang Diinput Tidak Boleh Sama Dalam Satu Detail Transaksi',
            timeout: {{ session('TIMEOUT') }},
          });
          dg.datagrid('deleteRow', index);
          break;
        }
      }
    }

    function hitung_subtotal_pembayaran(index, row) {
      var data = $("#table_data_detail_pembayaran").datagrid('getRows');
      var footer = {
        amount: 0,
      }
      var tgltrans = $("#TGLTRANS").datebox('getValue');
      var tglkirim = $("#TGLKIRIM").datebox('getValue');
      for (var i = 0; i < data.length; i++) {
        footer.amount += parseFloat(data[i].amount);
        if (data[i].tglpembayaran < tgltrans || data[i].tglpembayaran > tglkirim) {
          $.messager.show({
            title: 'Warning',
            msg: 'Tanggal Pembayaran Harus Diantara Tanggal Trans dan Tanggal Kirim',
            timeout: {{ session('TIMEOUT') }},
          });
        }
      }
      var grandtotal = $("#GRANDTOTAL").numberbox('getValue');
      if (footer.amount > grandtotal) {
        $.messager.show({
          title: 'Warning',
          msg: 'Pembayaran tidak boleh melebihi Grand Total',
          timeout: {{ session('TIMEOUT') }},
        });
      }
      $('#table_data_detail').datagrid('reloadFooter', [footer]);
    }

    function hitung_grandtotal() {
      var data = $("#table_data_detail").datagrid('getRows');
      var total = 0;
      var grandtotal = 0;
      var total2 = 0;
      var ppnrp = 0;
      var cekselisih = 0;
      var pembulatan = parseFloat($("#PEMBULATAN").numberbox('getValue')) ? parseFloat($("#PEMBULATAN").numberbox(
        'getValue')) : 0;
      var biaya = 0;

      var footer = {
        jmlpr: 0,
        akumulasipr: 0,
        sisapr: 0,
        jmlso: 0,
        sisaso: 0,
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
        if (data[i].pakaippn == 'EXCL' && data[i].ppn == 1) {
          total2 += parseFloat(data[i].subtotalkurs) + parseFloat(data[i].ppnrp);
        } else {
          total2 += parseFloat(data[i].subtotalkurs);
        }

        total += parseFloat(data[i].subtotalkurs);
        dpp += parseFloat(data[i].dpp);

        if (data[i].pakaippn != 'TIDAK') {
          barangkenapajak += parseFloat(data[i].dpp);
        } else {
          barangtidakkenapajak += parseFloat(data[i].dpp);
        }

        footer.jmlpr += parseFloat(data[i].jmlpr);
        footer.akumulasipr += parseFloat(data[i].akumulasipr);
        footer.sisapr += parseFloat(data[i].sisapr);
        footer.jmlso += parseFloat(data[i].jmlso);
        footer.sisaso += parseFloat(data[i].sisaso);
        footer.disc += parseFloat(data[i].disc);
        footer.disckurs += parseFloat(data[i].disckurs);
        footer.subtotal += parseFloat(data[i].subtotal);
        footer.subtotalkurs += parseFloat(data[i].subtotalkurs);
        footer.ppnrp += parseFloat(data[i].ppnrp);
        footer.dpp += parseFloat(data[i].dpp);
      }
      total2 = +((total2).toFixed({{ session('DECIMALDIGITAMOUNT') }}));
      grandtotal = parseFloat(total2 + biaya + pembulatan);

      $("#TOTAL").numberbox('setValue', total);
      $('#BARANGKENAPAJAK').numberbox('setValue', barangkenapajak);
      $('#BARANGTIDAKKENAPAJAK').numberbox('setValue', barangtidakkenapajak);
      $('#txt_DPP').numberbox('setValue', dpp);
      $("#PPNRP").numberbox('setValue', footer.ppnrp);
      $("#GRANDTOTAL").numberbox('setValue', grandtotal);

      $('#table_data_detail').datagrid('reloadFooter', [footer]);
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
        bukaLoader();
        const res1 = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.loadDataBarangBarcode, {
            barcode: barcodesatuan1string,
            uuidcustomer: idcustomer,
          },
        );
        if (!res1.success) {
          $.messager.alert('Warning', res1.message, 'warning');
        } else {
          if ($("#IDCUSTOMER").combogrid('getValue') == "") {
            $.messager.show({
              title: 'Warning',
              msg: 'Customer Belum Diisi',
              timeout: {{ session('TIMEOUT') }},
            });
          } else {
            data = msg;

            var id = data ? data.uuidbarang : '';
            var kode = data ? data.kode : '';
            var nama = data ? data.nama : '';
            var ppn = data ? data.ppn : '';
            var satuan = data ? data.satuan : '';
            var satuanutama = data ? data.satuanutama : '';
            var konversi = data ? data.konversi : '';
            var harga = await get_harga_barang(id);
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
                  jmlso: (daftar_barang[i].jmlso + barcodesatuan1qty),
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
                hitung_subtotal_detail(i, daftar_barang[i]);

              }
            }

            if (!ada) {
              if ($('#IDLOKASI').combogrid('getValue') != '') {
                try {
                  const res = await fetchData(
                    '{{ session('TOKEN') }}',
                    link_api.getStokBarangSatuan, {
                      uuidbarang: id,
                      uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
                      tgl: $('#TGLTRANS').datebox('getValue'),
                      satuan: satuan,
                    }
                  );
                  if (!res.success) {
                    $.messager.alert('Error', res.message, 'error');
                  } else {
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
                      jmlso: jml,
                      sisaso: 0,
                      jmlstok: res.data.saldoqty,
                      harga: hargasatuan,
                      hargabeli: hargabeli,
                      hargajual: hargajual,
                      uuidcurrency: datacurrency.uuidcurrency,
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

                    hitung_subtotal_detail($('#table_data_detail').datagrid('getRows').length - 1, row);
                  }
                } catch (e) {
                  const error = typeof e === "string" ? e : e.message;
                  const textError = getTextError(error);
                  $.messager.alert('Error', textError, 'error');
                }
              }
            }

            hitung_grandtotal();

            $('#BARCODE').textbox('textbox').focus();
          }
        }
      } catch (e) {
        const error = typeof e === 'string' ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      } finally {
        tutupLoader();
      }
    }

    async function get_harga_barang(idbarang, satuan) {
      var idcustomer = $("#IDCUSTOMER").combogrid('getValue');
      var tgltrans = $("#TGLTRANS").datebox('getValue');
      var idlokasi = $('#IDLOKASI').combogrid('getValue');
      var harga = {};

      if (idcustomer == '') {
        return harga;
      } else {
        const payload = {
          uuidbarang: idbarang,
          uuidcustomer: idcustomer,
          tgltrans: tgltrans,
          uuidlokasi: idlokasi,
          jumlah: 0,
        };
        try {
          const res = await fetchData(
            '{{ session('TOKEN') }}',
            link_api.getHargaBarang,
            payload
          );
          if (!res.success) {
            $.messager.alert('Warning', res.message, 'warning');
          } else {
            harga = res.data.harga;
          }
        } catch (e) {
          const error = (typeof e === 'string') ? e : e.message;
          const textError = getTextError(error);
          $.messager.alert('Error', textError, 'error');
        }
      }

      return harga;
    }

    async function get_harga_barangbeli(idbarang, satuan) {
      var harga = 0;
      try {
        const res = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.hargaBeliTerakhir, {
            uuidbarang: idbarang,
            satuan: satuan
          }
        );
        if (!res.success) {
          $.messager.alert('Warning', res.message, 'warning');
        } else {
          harga = res.data.hargabeli;
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
      return harga;
    }

    async function get_harga_barangjual(idbarang) {
      var harga = 0;
      var idcustomer = $("#IDCUSTOMER").combogrid('getValue');
      try {
        const res = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.hargaJualTerakhir, {
            uuidbarang: idbarang,
            uuidcustomer: idcustomer
          }
        );
        if (!res.success) {
          $.messager.alert('Warning', res.message, 'warning');
        } else {
          harga = res.data.hargajual;
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
      return harga;
    }

    function buatCheckbox(kode, check, index) {
      return '<input type="checkbox" ' + (check == 0 ? '' : 'checked') + ' id="' + kode + '_' + index + '" class="' +
        kode + '"">';
    }

    function clear_plugin() {
      $('.combogrid-f').each(function() {
        $(this).combogrid('grid').datagrid('load', {
          q: ''
        });
      });

      $('[name=pakaippn]').filter(function() {
        return $(this).val() == 2;
      }).prop('checked', true);

      $('[name=pakaipph]').filter(function() {
        return $(this).val() == 2;
      }).prop('checked', true);

      $('.number').numberbox('setValue', 0);

      $("#PPNPERSEN").numberbox('setValue', ppnpersenaktif);
      $("#PPH22PERSEN").numberbox('setValue', {{ session('PPH22PERSEN') }});
      hitung_grandtotal();

      $("#TGLTRANS, #TGLKIRIM, #TGLJATUHTEMPO").datebox('setValue', date_format());
      $("#TGLJATUHTEMPO").datebox('readonly');
    }

    function ubahPakaiScan(index, pakaiscan) {
      $('#table_data_detail').datagrid('updateRow', {
        index: index,
        row: {
          scanbarcode: pakaiscan == 1 ? 0 : 1
        }
      });
    }

    function hitung_stok() {
      var rows = $('#table_data_detail').datagrid('getRows');

      if (rows.length == 0) {
        return false;
      }

      if ($('#IDLOKASI').combogrid('getValue') == '') {
        return false;
      }

      fetchData(
        '{{ session('TOKEN') }}',
        link_api.hitungStokTransaksiBarang, {
          uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
          tgltrans: $('#TGLTRANS').datebox('getValue'),
          data_detail: rows
        }
      ).then(res => {
        if (!res.success) {
          $.messager.alert('Warning', res.message, 'warning');
        } else {
          for (var i = 0; i < res.detail.length; i++) {
            $('#table_data_detail').datagrid('updateRow', {
              index: i,
              row: {
                jmlstok: res.detail[i].jmlstok
              }
            });
          }
        }
      }).catch(e => {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      })
    }

    function load_data_potensi_so(arrayidbarang) {
      //   arrayidbarang = JSON.parse(arrayidbarang);
      fetchData(
        '{{ session('TOKEN') }}',
        link_api.getDataPotensiSO, {
          uuidbarang: arrayidbarang
        }
      ).then(res => {
        if (!res.success) {
          $.messager.alert('Warning', res.message, 'warning');
        } else {
          $('#table_data_potensi_so').datagrid('loadData', res.data);
        }
      }).catch(e => {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      });
    }
  </script>
@endpush
