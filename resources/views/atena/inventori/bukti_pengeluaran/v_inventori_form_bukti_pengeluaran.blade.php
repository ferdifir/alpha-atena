@extends('template.form')

@section('content')
  <div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            <script>
              if (screen.height < 450) $("#trans_layout").css('height', "450px");
            </script>
            <div data-options="region:'north',border:false" style="width:100%; height:180px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>

              <input type="hidden" id="mode" name="mode">
              <table>
                <tr>
                  <td valign="top">
                    <fieldset style="height:160px;">
                      <legend id="label_laporan">Info Transaksi</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form">Jenis</td>
                          <td id="label_form">
                            <select class="easyui-combobox" id="JENISTRANSAKSI" data-options="panelHeight:'auto'"
                              name="jenistransaksi" style="width:190px;">
                              <option value="PENJUALANSO">PENJUALAN SALES ORDER</option>
                              <option value="PENJUALANDO">PENJUALAN DELIVERY ORDER</option>
                              <!--<option value="TRANSFER">TRANSFER</option>-->
                              <option value="RETUR">RETUR PEMBELIAN</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">No. Surat Jalan</td>
                          <td id="label_form"><input name="kodebbk" id="KODEBBK" class="label_input" style="width:190px"
                              prompt="Auto Generate" readonly></td>
                          <input type="hidden" id="IDBBK" name="uuidbbk">
                        </tr>
                        <tr>
                          <td id="label_form" name ="keteranganlokasi">Lokasi</td>
                          <td id="label_form"><input name="uuidlokasi" id="IDLOKASI" style="width:190px"></td>
                          <input type="hidden" id="KODELOKASI" name="kodelokasi">
                        </tr>
                        <tr>
                          <td id="label_form">Tgl. Trans
                          <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date" style="width:190px">
                          </td>
                        </tr>
                        <tr hidden>
                          <td id="label_form">Tgl. Jatuh Tempo</td>
                          <td id="label_form"><input name="tgljatuhtempo" id="TGLJATUHTEMPO" class="date"
                              style="width:190px"></td>
                        </tr>
                        <tr hidden>
                          <td colspan="2"><label id="label_form"><input type="checkbox" value="1"
                                name="sesudahberangkat">BBK Tambahan Setelah Mobil Berangkat</label>
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td valign="top">
                    <fieldset style="height:160px;" id="field_referensi">
                      <legend id="label_laporan">Referensi</legend>
                      <table border="0" id="tabel_pembelian_retur">
                        <tr>
                          <td id="label_form" style="width:127px">Kode</td>
                          <td>
                            <input name="uuidreferensi" class="label_input" id="IDREFERENSI" style="width:100px"
                              prompt="Kode Supplier">
                            <input type="hidden" id="KODEREFERENSI" name="kodereferensi">
                            <input name="namareferensi" class="label_input" id="NAMAREFERENSI" style="width:197px"
                              readonly prompt="Nama Referensi">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form" style="vertical-align: super;">Alamat</td>
                          <td>
                            <textarea name="alamat" class="label_input" id="ALAMAT" readonly prompt="Alamat Referensi" multiline="true"
                              style="width:300px; height:50px" data-options="validType:'length[0, 500]'"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Telp</td>
                          <td>
                            <input name="telp" class="label_input" id="TELP" style="width:300px" readonly
                              prompt="Telp Referensi">
                          </td>
                        </tr>
                      </table>
                      <table border="0" id="tabel_browsing">
                        <tr id="tr_browsing">
                          <td id="label_form" name="nodo" style="width:127px">No. Pesanan Pengiriman</td>
                          <td id="label_form" hidden name="noso" style="width:127px">No. Pesanan Penjualan</td>
                          <td id="label_form" hidden name="noretur" style="width:127px">No. Retur</td>
                          <td id="label_form" hidden name="nolokasi" style="width:127px">No. Transfer</td>
                          <td>
                            <input name="uuidtransreferensi" id="IDTRANSREFERENSI" style="width:300px">
                            <input type="hidden" id="KODETRANSREFERENSI" name="kodetransreferensi">
                          </td>
                        </tr>
                      </table>
                      <table border="0" id="tabel_transfer">
                        <tr>
                          <td id="label_form" align="left" style="width:95px">Lokasi Tujuan</td>
                          <td align="left">
                            <input name="uuidlokasitujuan" class="label_input" id="IDLOKASITUJUAN" style="width:300px"
                              readonly>
                            <input type="hidden" id="KODELOKASITUJUAN" name="kodelokasitujuan">
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td valign="top">
                    <fieldset style="height:160px;">
                      <legend id="label_laporan">Info Ekspedisi</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form" style="width:100px">Nama Customer</td>
                          <td colspan="3">
                            <input name="namacustomerekspedisi" class="label_input" id="NAMACUSTOMEREKSPEDISI"
                              style="width:235px" prompt="Nama Customer Ekspedisi">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Ekspedisi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                          <td id="label_form">
                            <input class="label_input" name="uuidekspedisi" id="IDEKSPEDISI" prompt="Kode Ekspedisi"
                              style="width:80px"><input type="hidden" id="KODEEKSPEDISI" name="KODEEKSPEDISI">
                          </td>
                          <td>
                            <input name="namaekspedisi" class="label_input" id="NAMAEKSPEDISI" style="width:150px"
                              readonly prompt="Nama Ekspedisi">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Alamat</td>
                          <td colspan="3">
                            <input name="alamatekspedisi" class="label_input" id="ALAMATEKSPEDISI" style="width:235px"
                              readonly prompt="Alamat Ekspedisi">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Telp</td>
                          <td colspan="3">
                            <input name="telpekspedisi" class="label_input" id="TELPEKSPEDISI" style="width:235px"
                              readonly prompt="Telp Ekspedisi">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Jumlah Collie Gabungan</td>
                          <td colspan="3">
                            <input name="jmlcollie" class="number" id="JMLCOLLIE" style="width:100px">
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td valign="top">
                    <fieldset style="height:70px; margin-bottom:5px;">
                      <legend id="label_laporan">Info Lain</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form">No. Kendaraan</td>
                          <td id="label_form">
                            <input name="uuidkendaraan" id="IDKENDARAAN" style="width:150px">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Nama Sopir</td>
                          <td id="label_form">
                            <input name="uuidsopir" id="IDSOPIR" style="width:150px">
                          </td>
                        </tr>

                      </table>
                    </fieldset>
                    <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                      style="width:250px; height:85px" data-options="validType:'length[0, 500]'">
                    </textarea>
                  </td>
                  <td valign="bottom">
                    <label id="label_form" style="font-size:17pt;margin:3px;">Barcode
                      <input name="BARCODE" class="label_input" id="BARCODE" style="width:200px;height:30px;">
                    </label>
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
                <div title="Barcode">
                  <table id="table_data_detail_barcode" fit="true"></table>
                </div>
              </div>
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:35px;">
              <table id="trans_footer" width="100%">
                <tr valign="top">
                  <td align="left" id="label_form">
                    <label style="font-weight:normal" id="label_form">User Input : </label>
                    <label id="lbl_kasir"></label>
                    <label style="font-weight:normal" id="label_form">| Tgl. Input : </label>
                    <label id="lbl_tanggal"></label>
                  </td>
                  <td align='right' id="td_total">
                    <table>
                      <tr hidden>
                        <td id="label_form" align="right">
                          Total <input name="total" id="TOTAL" class="number " style="width:110px;" readonly>
                        </td>
                      </tr>
                      <tr hidden>
                        <td align="right" id="label_form">Discount
                          <input name="diskon" id="DISKON" class="number" style="width:60px;" max=100
                            suffix="%">
                          <input name="diskonrp" id="DISKONRP" class="number" style="width:110px;">
                        </td>
                      </tr>
                      <tr>
                        <td id="label_form" align="right" hidden>
                          DPP <input name="txt_dpp" id="txt_DPP" class="number " style="width:110px;" readonly
                            required="true">
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </label>
                        </td>
                        <td align="right">
                          <label id="label_form">PPH22
                            <input name="pph22rp" id="PPH22RP" class="number" style="width:110px;" readonly>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </label>
                        </td>
                        <td id="label_form" align="right">
                          Pembulatan <input name="pembulatan" id="PEMBULATAN" class="number " style="width:110px;">
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
              <input type="hidden" id="data_detail_barcode" name="data_detail_barcode">
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
      <div id="toolbar-scan-qrcode">
        <input id="scanbarcode" class="label_input" style="width: 150px">
        <a id="btn_generate_code" title="Tambahkan" class="easyui-linkbutton" onclick="scan_barcode()">Tambah</a>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.mask.js') }}"></script>
  <script src="{{ asset('assets/js/utils.js') }}"></script>
  <script>
    var olddiskonpersen = 0.00;
    var olddiskonrp = 0.00;
    var oldharga = 0.00;
    var cekbtnsimpan = true;
    var ppnpersenaktif = 0;
    var row = {};
    var transreferensi = null;
    var jenistransreferensi = null;
    let TRANSREFERENSI = null;
    let SODO = null;
    let INPUTHARGA = null;
    let LIHATHARGA = null;
    let SCANBARCODE = null;

    async function getKonfigurasiBBK() {
      try {
        const req1 = fetchData(
          '{{ session('TOKEN') }}',
          link_api.getConfig, {
            modul: 'TBBK',
            config: 'TRANSREFERENSI'
          }
        );
        const req2 = fetchData(
          '{{ session('TOKEN') }}',
          link_api.getDataAkses, {
            kodemenu: '{{ $kodemenu }}',
          }
        );
        const req3 = fetchData(
          '{{ session('TOKEN') }}',
          link_api.getConfig, {
            modul: 'TSO',
            config: 'SODO'
          }
        );
        const req4 = fetchData(
          '{{ session('TOKEN') }}',
          link_api.getConfig, {
            modul: 'TBBK',
            config: 'SCANBARCODE'
          }
        );
        const [res1, res2, res3, res4] = await Promise.all([req1, req2, req3, req4]);

        if (res1.success && res2.success && res3.success && res4.success) {
          if (res2.data.cetak == 1) {
            $('#simpan_cetak').css('filter', '');
          } else {
            $('#simpan_cetak').css('filter', 'grayscale(100%)');
            $('#simpan_cetak').removeAttr('onclick');
          }
          $('#tr_browsing').css('display', res1.data.value == 'HEADER' ? '' : 'none');
          $('#td_total').css('display', res2.data.lihatharga == 0 ? 'none' : '');
          $('#DISKON').numberbox('readonly', res2.data.inputharga == 0);
          $('#DISKONRP').numberbox('readonly', res2.data.inputharga == 0);
          $('#PEMBULATAN').numberbox('readonly', res2.data.inputharga == 0);
          TRANSREFERENSI = res1.data.value;
          SODO = res3.data.value;
          INPUTHARGA = res2.data.inputharga;
          SCANBARCODE = res4.data.value;
        } else {
          throw new Error("Gagal mendapatkan konfigurasi");
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }

    $(document).ready(async function() {
      await getKonfigurasiBBK();

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
            export_excel('Faktur Bukti Pengeluaran', $("#area_cetak").html());
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
      browse_data_lokasitujuan('#IDLOKASITUJUAN');
      browse_data_referensi('#IDREFERENSI');
      browse_data_transreferensi('#IDTRANSREFERENSI');
      browse_data_sopir('#IDSOPIR');
      browse_data_kendaraan('#IDKENDARAAN');
      browse_data_ekspedisi('#IDEKSPEDISI');

      $('#TGLTRANS').datebox({
        onChange: function(newVal, oldValue) {
          var time_bbk = Date.parse(newVal);
          if (TRANSREFERENSI == 'HEADER') {
            var row_ref = $('#IDTRANSREFERENSI').combogrid('grid').datagrid('getSelected');
            if (row_ref) {
              var time_ref = Date.parse(row_ref.tgltrans);
              if (time_bbk < time_ref) {
                $.messager.alert(
                  'Error',
                  'Tanggal pengeluaran tidak boleh sebelum tanggal transaksi yang dipilih',
                  'error'
                );
                $(this).datebox('setValue', oldVal);
                return false;
              }
            }
          }

          if ($('#mode').val() == 'tambah') {
            hitung_stok();
          }

          set_ppn_aktif(newVal, 'Bearer {{ session('TOKEN') }}', function(response) {
            response = response.data;
            ppnpersenaktif = response.ppnpersen;

            update_ppn_table_detail($('#table_data_detail'), ppnpersenaktif, function(index, row) {
              hitung_subtotal_detail(index, row);
            });

            hitung_grandtotal();
          });
        }
      });

      $('#BARCODE').textbox('textbox').bind('keydown', function(e) {
        if (e.keyCode == 13) {
          insert_barang($(this).val());

          $(this).val('');
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

      //setting untuk combobox jenis
      if (SODO == 1) {
        $('#JENISTRANSAKSI').combobox('setValue', 'PENJUALANSO');
      } else {
        $('#JENISTRANSAKSI').combobox('setValue', 'PENJUALANDO');
      }

      $('#JENISTRANSAKSI').combobox({
        onChange: function(newVal, oldVal) {
          $("#IDLOKASITUJUAN").combogrid('readonly', true);
          if (newVal == "PENJUALANSO") {
            $("#tabel_pembelian_retur").show();
            $("#tabel_transfer").hide();
            if (TRANSREFERENSI != 'HEADER') {
              $("#field_referensi").show();
            }
            $("[name=keteranganlokasi]").html("Lokasi");

            $("[name=nodo]").hide();
            $("[name=noso]").show();
            $("[name=noretur]").hide();
            $("[name=nolokasi]").hide();

            browse_data_referensi('#IDREFERENSI', 'customer');

            $("#NAMAREFERENSI").textbox('clear');
            $("#ALAMAT").textbox('clear');
            $("#TELP").textbox('clear');
            $("#IDREFERENSI").combogrid({
              prompt: 'Kode Customer',
              readonly: false,
              required: true
            });
            $("#NAMAREFERENSI").textbox({
              prompt: 'Nama Customer'
            });
            $("#ALAMAT").textbox({
              prompt: 'Alamat Customer'
            });
            $("#TELP").textbox({
              prompt: 'Telp Customer'
            });

            urltransreferensi = 'atena/Penjualan/Transaksi/SalesOrder/comboGridBBK';
            $("#IDTRANSREFERENSI").combogrid({
              columns: [
                [{
                    field: 'uuidtransreferensi',
                    hidden: true
                  },
                  {
                    field: 'kodetransreferensi',
                    title: 'Kode',
                    width: 150
                  },
                  {
                    field: 'kodelokasi',
                    hidden: true,
                    title: 'Lokasi',
                    width: 60
                  },
                  {
                    field: 'namalokasi',
                    title: 'Nama Lokasi',
                    width: 120
                  },
                  {
                    field: 'tgltrans',
                    title: 'Tgl Trans',
                    width: 80,
                    align: 'center'
                  },
                  {
                    field: 'username',
                    title: 'User',
                    width: 150
                  },
                ]
              ]
            });
          } else if (newVal == "PENJUALANDO") {

            $("#tabel_pembelian_retur").show();
            $("#tabel_transfer").hide();
            if (TRANSREFERENSI != 'HEADER') {
              $("#field_referensi").show();
            }
            $("[name=keteranganlokasi]").html("Lokasi");

            $("[name=nodo]").show();
            $("[name=noso]").hide();
            $("[name=noretur]").hide();
            $("[name=nolokasi]").hide();

            browse_data_referensi('#IDREFERENSI', 'customer');

            $("#NAMAREFERENSI").textbox('clear');
            $("#ALAMAT").textbox('clear');
            $("#TELP").textbox('clear');
            $("#IDREFERENSI").combogrid({
              prompt: 'Kode Customer',
              readonly: false,
              required: true
            });
            $("#NAMAREFERENSI").textbox({
              prompt: 'Nama Customer'
            });
            $("#ALAMAT").textbox({
              prompt: 'Alamat Customer'
            });
            $("#TELP").textbox({
              prompt: 'Telp Customer'
            });

            urltransreferensi = 'atena/Penjualan/Transaksi/DeliveryOrder/comboGridBBK';
            $("#IDTRANSREFERENSI").combogrid({
              columns: [
                [{
                    field: 'uuidtransreferensi',
                    hidden: true
                  },
                  {
                    field: 'kodetransreferensi',
                    title: 'Kode',
                    width: 150
                  },
                  {
                    field: 'kodelokasi',
                    hidden: true,
                    title: 'Lokasi',
                    width: 60
                  },
                  {
                    field: 'namalokasi',
                    title: 'Nama Lokasi',
                    width: 120
                  },
                  {
                    field: 'tgltrans',
                    title: 'Tgl Trans',
                    width: 80,
                    align: 'center'
                  },
                  {
                    field: 'username',
                    title: 'User',
                    width: 150
                  },
                ]
              ]
            });

          } else if (newVal == "TRANSFER") {
            //lokasi
            $("#tabel_pembelian_retur").hide();
            $("#tabel_transfer").show();
            if (TRANSREFERENSI != 'HEADER') {
              $("#field_referensi").show();
            }
            $("[name=keteranganlokasi]").html("Lokasi Asal");

            $("#IDREFERENSI").combogrid({
              prompt: 'Kode Customer',
              readonly: false,
              required: false
            });
            $("[name=nodo]").hide();
            $("[name=noso]").hide();
            $("[name=noretur]").hide();
            $("[name=nolokasi]").show();

            browse_data_referensi('#IDLOKASITUJUAN', 'lokasi');
            urltransreferensi = 'atena/Inventori/Transaksi/TransferPersediaan/comboGridBBK';
            $("#IDTRANSREFERENSI").combogrid({
              columns: [
                [{
                    field: 'uuidtransreferensi',
                    hidden: true
                  },
                  {
                    field: 'kodetransreferensi',
                    title: 'Kode',
                    width: 150
                  },
                  {
                    field: 'kodelokasi',
                    title: 'Lokasi Tujuan',
                    width: 85
                  },
                  {
                    field: 'namalokasi',
                    title: 'Nama Lokasi Tujuan',
                    width: 120
                  },
                  {
                    field: 'tgltrans',
                    title: 'Tgl Trans',
                    width: 80,
                    align: 'center'
                  },
                  {
                    field: 'username',
                    title: 'User',
                    width: 150
                  },
                ]
              ]
            });
          } else if (newVal == "RETUR") {
            $("#tabel_pembelian_retur").show();
            $("#tabel_transfer").hide();
            if (TRANSREFERENSI != 'HEADER') {
              $("#field_referensi").show();
            }
            $("[name=keteranganlokasi]").html("Lokasi");


            $("[name=nodo]").hide();
            $("[name=noso]").hide();
            $("[name=noretur]").show();
            $("[name=nolokasi]").hide();

            browse_data_referensi('#IDREFERENSI', 'supplier');

            $("#IDREFERENSI").combogrid({
              prompt: 'Kode Supplier',
              readonly: false,
              required: true
            });
            $("#NAMAREFERENSI").textbox('clear');
            $("#ALAMAT").textbox('clear');
            $("#TELP").textbox('clear');
            $("#NAMAREFERENSI").textbox({
              prompt: 'Nama Supplier'
            });
            $("#ALAMAT").textbox({
              prompt: 'Alamat Supplier'
            });
            $("#TELP").textbox({
              prompt: 'Telp Supplier'
            });
            $("#IDTRANSREFERENSI").combogrid({
              columns: [
                [{
                    field: 'uuidtransreferensi',
                    hidden: true
                  },
                  {
                    field: 'kodetransreferensi',
                    title: 'Kode',
                    width: 150
                  },
                  {
                    field: 'kodelokasi',
                    hidden: true,
                    title: 'Lokasi',
                    width: 60
                  },
                  {
                    field: 'namalokasi',
                    title: 'Nama Lokasi',
                    width: 120
                  },
                  {
                    field: 'tgltrans',
                    title: 'Tgl Trans',
                    width: 80,
                    align: 'center'
                  },
                  {
                    field: 'username',
                    title: 'User',
                    width: 150
                  },
                ]
              ]
            });
          }

          var lokasi = $("#IDLOKASI").combogrid('getValue');
          var ref = $("#IDREFERENSI").combogrid('getValue');

          var url = base_url + urltransreferensi + '/' + lokasi + '/' + ref;

          ubah_url_combogrid($("#IDTRANSREFERENSI"), url, true);
          $('#IDTRANSREFERENSI').combogrid('readonly', false);

          reset_detail();
        }
      });

      //UBAH
      newVal = $('#JENISTRANSAKSI').combobox('getValue');

      if (newVal == "PENJUALANSO") {
        $("#tabel_pembelian_retur").show();
        $("#tabel_transfer").hide();
        if (TRANSREFERENSI != 'HEADER') {
          $("#field_referensi").show();
        }
        $("[name=keteranganlokasi]").html("Lokasi");

        $("[name=nodo]").hide();
        $("[name=noso]").show();
        $("[name=noretur]").hide();
        $("[name=nolokasi]").hide();

        browse_data_referensi('#IDREFERENSI', 'customer');
        //CUSTOMER
        var url = link_api.browseCustomer;
        get_combogrid_data($("#IDREFERENSI"), row.uuidreferensi, url);

        $("#NAMAREFERENSI").textbox('clear');
        $("#ALAMAT").textbox('clear');
        $("#TELP").textbox('clear');
        $("#IDREFERENSI").combogrid({
          prompt: 'Kode Customer',
          readonly: false,
          required: true
        });
        $("#NAMAREFERENSI").textbox({
          prompt: 'Nama Customer'
        });
        $("#ALAMAT").textbox({
          prompt: 'Alamat Customer'
        });
        $("#TELP").textbox({
          prompt: 'Telp Customer'
        });

        urltransreferensi = 'atena/Penjualan/Transaksi/SalesOrder/comboGridBBK';
        $("#IDTRANSREFERENSI").combogrid({
          columns: [
            [{
                field: 'uuidtransreferensi',
                hidden: true
              },
              {
                field: 'kodetransreferensi',
                title: 'Kode',
                width: 150
              },
              {
                field: 'kodelokasi',
                hidden: true,
                title: 'Lokasi',
                width: 60
              },
              {
                field: 'namalokasi',
                title: 'Nama Lokasi',
                width: 120
              },
              {
                field: 'tgltrans',
                title: 'Tgl Trans',
                width: 80,
                align: 'center'
              },
              {
                field: 'username',
                title: 'User',
                width: 150
              },
            ]
          ]
        });

      } else if (newVal == "PENJUALANDO") {

        $("#tabel_pembelian_retur").show();
        $("#tabel_transfer").hide();
        if (TRANSREFERENSI != 'HEADER') {
          $("#field_referensi").show();
        }
        $("[name=keteranganlokasi]").html("Lokasi");

        $("[name=nodo]").show();
        $("[name=noso]").hide();
        $("[name=noretur]").hide();
        $("[name=nolokasi]").hide();

        browse_data_referensi('#IDREFERENSI', 'customer');
        //CUSTOMER
        var url = link_api.browseCustomer;
        get_combogrid_data($("#IDREFERENSI"), row.uuidreferensi, url);

        $("#NAMAREFERENSI").textbox('clear');
        $("#ALAMAT").textbox('clear');
        $("#TELP").textbox('clear');
        $("#IDREFERENSI").combogrid({
          prompt: 'Kode Customer',
          readonly: false,
          required: true
        });
        $("#NAMAREFERENSI").textbox({
          prompt: 'Nama Customer'
        });
        $("#ALAMAT").textbox({
          prompt: 'Alamat Customer'
        });
        $("#TELP").textbox({
          prompt: 'Telp Customer'
        });

        urltransreferensi = 'atena/Penjualan/Transaksi/DeliveryOrder/comboGridBBK';
        $("#IDTRANSREFERENSI").combogrid({
          columns: [
            [{
                field: 'uuidtransreferensi',
                hidden: true
              },
              {
                field: 'kodetransreferensi',
                title: 'Kode',
                width: 150
              },
              {
                field: 'kodelokasi',
                hidden: true,
                title: 'Lokasi',
                width: 60
              },
              {
                field: 'namalokasi',
                title: 'Nama Lokasi',
                width: 120
              },
              {
                field: 'tgltrans',
                title: 'Tgl Trans',
                width: 80,
                align: 'center'
              },
              {
                field: 'username',
                title: 'User',
                width: 150
              },
            ]
          ]
        });
      } else if (newVal == "TRANSFER") {
        //lokasi
        $("#tabel_pembelian_retur").hide();
        $("#tabel_transfer").show();
        if (TRANSREFERENSI != 'HEADER') {
          $("#field_referensi").show();
        }
        $("[name=keteranganlokasi]").html("Lokasi Asal");

        $("#IDREFERENSI").combogrid({
          prompt: 'Kode Customer',
          readonly: false,
          required: false
        });
        $("[name=nodo]").hide();
        $("[name=noso]").hide();
        $("[name=noretur]").hide();
        $("[name=nolokasi]").show();

        browse_data_referensi('#IDLOKASITUJUAN', 'lokasi');
        urltransreferensi = 'atena/Inventori/Transaksi/TransferPersediaan/comboGridBBK';
        $("#IDTRANSREFERENSI").combogrid({
          columns: [
            [{
                field: 'uuidtransreferensi',
                hidden: true
              },
              {
                field: 'kodetransreferensi',
                title: 'Kode',
                width: 150
              },
              {
                field: 'kodelokasi',
                title: 'Lokasi Tujuan',
                width: 85
              },
              {
                field: 'namalokasi',
                title: 'Nama Lokasi Tujuan',
                width: 120
              },
              {
                field: 'tgltrans',
                title: 'Tgl Trans',
                width: 80,
                align: 'center'
              },
              {
                field: 'username',
                title: 'User',
                width: 150
              },
            ]
          ]
        });
      } else if (newVal == "RETUR") {
        $("#tabel_pembelian_retur").show();
        $("#tabel_transfer").hide();
        if (TRANSREFERENSI != 'HEADER') {
          $("#field_referensi").show();
        }
        $("[name=keteranganlokasi]").html("Lokasi");

        $("[name=nodo]").hide();
        $("[name=noso]").hide();
        $("[name=noretur]").show();
        $("[name=nolokasi]").hide();

        browse_data_referensi('#IDREFERENSI', 'supplier');

        //SUPPLIER
        var url = link_api.browseSupplier;
        get_combogrid_data($("#IDREFERENSI"), row.uuidreferensi, url);

        $("#IDREFERENSI").combogrid({
          prompt: 'Kode Supplier',
          readonly: false,
          required: true
        });
        $("#NAMAREFERENSI").textbox('clear');
        $("#ALAMAT").textbox('clear');
        $("#TELP").textbox('clear');
        $("#NAMAREFERENSI").textbox({
          prompt: 'Nama Supplier'
        });
        $("#ALAMAT").textbox({
          prompt: 'Alamat Supplier'
        });
        $("#TELP").textbox({
          prompt: 'Telp Supplier'
        });
        $("#IDTRANSREFERENSI").combogrid({
          columns: [
            [{
                field: 'uuidtransreferensi',
                hidden: true
              },
              {
                field: 'kodetransreferensi',
                title: 'Kode',
                width: 150
              },
              {
                field: 'kodelokasi',
                hidden: true,
                title: 'Lokasi',
                width: 60
              },
              {
                field: 'namalokasi',
                title: 'Nama Lokasi',
                width: 120
              },
              {
                field: 'tgltrans',
                title: 'Tgl Trans',
                width: 80,
                align: 'center'
              },
              {
                field: 'username',
                title: 'User',
                width: 150
              },
            ]
          ]
        });
      }

      var lokasi = $("#IDLOKASI").combogrid('getValue');
      var ref = $("#IDREFERENSI").combogrid('getValue');

      var url = base_url + urltransreferensi + '/' + lokasi + '/' + ref;

      ubah_url_combogrid($("#IDTRANSREFERENSI"), url, true);
      $('#IDTRANSREFERENSI').combogrid('readonly', false);
      //--------------------------------------------------------------

      $('#scanbarcode').textbox('textbox').bind('keydown', function(e) {
        // jika menekan enter
        if (e.keyCode == 13) {
          var newVal = $(this).val();
          scan_barcode(newVal);
        }
      });

      $('#PEMBULATAN').numberbox({
        onChange: function() {
          hitung_grandtotal();
        }
      });

      buat_table_detail();
      buat_table_detail_rekap();
      buat_table_detail_barcode();

      if ("{{ $mode }}" == "tambah") {
        tambah();
      } else if ("{{ $mode }}" == "ubah") {
        ubah();
      }

      // Menghapus loading ketika halaman sudah dimuat
      setTimeout(function() {
        $('#mask-loader').fadeOut(500, function() {
          $(this).hide()
        })
      }, 250)
    })

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    function cetak(id) {
      $("#window_button_cetak").window('close');
      $("#area_cetak").load(base_url + "atena/Inventori/Transaksi/BarangKeluar/cetak/" + id);
      $("#form_cetak").window('open');
    }

    function tambah() {
      $('#mode').val('tambah');

      $('#lbl_kasir, #lbl_tanggal').html('');

      //setting untuk combobox jenis
      if (SODO == 1) {
        $('#JENISTRANSAKSI').combobox('setValue', 'PENJUALANSO');
      } else {
        $('#JENISTRANSAKSI').combobox('setValue', 'PENJUALANDO');
      }
      $('#IDLOKASI').combogrid('readonly', false);
      $('#JENISTRANSAKSI').combogrid('readonly', false);
      $('#IDREFERENSI').combogrid('readonly', false);
      $('#IDTRANSREFERENSI').combogrid('readonly', false);
      $('#TGLTRANS').datebox('readonly', false);

      $('#table_data_detail').datagrid('options').RowAdd = true;
      $('#table_data_detail').datagrid('options').RowEdit = true;
      $('#table_data_detail').datagrid('options').RowDelete = true;

      idtrans = "";

      $.ajax({
        type: 'POST',
        url: link_api.getLokasiDefault,
        dataType: 'json',
        cache: false,
        success: function(msg) {
          if (msg.uuidlokasi != null) {
            $('#IDLOKASI').combogrid('setValue', msg.uuidlokasi);
            $("#KODELOKASI").val(msg.kodelokasi);
          }
        }
      });

      //jika tidak punya akses input harga
      if (INPUTHARGA == 0) {
        $(':radio:not(:checked)').attr('disabled', true);
      }

      clear_plugin();
      reset_detail();

      fill_form_transreferensi();
    }

    function fill_form_transreferensi() {
      // jika memuat data SO dari grid antrian,
      // maka tampilkan data SO
      if (transreferensi != null) {
        $('#JENISTRANSAKSI').combobox('setValue', jenistransreferensi);

        $('#IDLOKASI').combogrid('setValue', {
          id: transreferensi.uuidlokasi
        });

        $('#KODELOKASI').val(transreferensi.kodelokasi);

        $('#TGLTRANS').datebox('setValue', transreferensi.tgltrans);

        if (jenistransreferensi == 'PENJUALANSO') {
          $('#IDREFERENSI').combogrid('setValue', {
            id: transreferensi.uuidcustomer,
            kode: transreferensi.kodecustomer
          });

          $('#TGLTRANS').datebox('setValue', transreferensi.tglkirim);

          $('#KODEREFERENSI').val(transreferensi.kodecustomer);

          $('#NAMAREFERENSI').textbox('setValue', transreferensi.namacustomer);

          $('#CATATAN').textbox('setValue', transreferensi.kodepo + ' ' + transreferensi.catatan);

          if (TRANSREFERENSI == 'HEADER') {
            $('#IDTRANSREFERENSI').combogrid('grid').datagrid('loadData', [{
              idtransreferensi: transreferensi.uuidso,
              kodetransreferensi: transreferensi.kodeso,
              tgltrans: transreferensi.tgltrans,
              tglkirim: transreferensi.tglkirim,
              idlokasi: transreferensi.uuidlokasi,
              kodelokasi: transreferensi.kodelokasi,
              namalokasi: transreferensi.namalokasi,
              username: transreferensi.userbuat,
              omnichannel: transreferensi.omnichannel,
              catatan: transreferensi.catatan,
            }]);

            $('#IDTRANSREFERENSI').combogrid('setValue', transreferensi.uuidso);

            $('#KODETRANSREFERENSI').val(transreferensi.kodeso);
          }

          var alamatcustomer = '';

          if (transreferensi.alamatcustomer) {
            alamatcustomer = transreferensi.alamat + "\r\n";
          }

          if (transreferensi.kota && transreferensi.kota != null) {
            alamatcustomer += transreferensi.kota;
          }

          if (transreferensi.propinsi && transreferensi.propinsi != null) {
            alamatcustomer += "-" + transreferensi.propinsi;
          }

          if (transreferensi.negara && transreferensi.negara != null) {
            alamatcustomer += "-" + transreferensi.negara;
          }

          $('#ALAMAT').textbox('setValue', alamatcustomer);
          $('#TELP').textbox('setValue', transreferensi.telp);

          // memuat data detail dari SO
          load_data_detail(transreferensi.uuidso);
        } else if (jenistransreferensi == 'PENJUALANDO') {
          $('#IDREFERENSI').combogrid('setValue', {
            id: transreferensi.uuidcustomer,
            kode: transreferensi.kodecustomer
          });

          $('#TGLTRANS').datebox('setValue', transreferensi.tglkirim);

          $('#KODEREFERENSI').val(transreferensi.kodecustomer);

          $('#NAMAREFERENSI').textbox('setValue', transreferensi.namacustomer);

          $('#CATATAN').textbox('setValue', transreferensi.catatan);

          if (TRANSREFERENSI == 'HEADER') {
            $('#IDTRANSREFERENSI').combogrid('grid').datagrid('loadData', [{
              idtransreferensi: transreferensi.uuiddo,
              kodetransreferensi: transreferensi.kodedo,
              tgltrans: transreferensi.tgltrans,
              tglkirim: transreferensi.tglkirim,
              idlokasi: transreferensi.uuidlokasi,
              kodelokasi: transreferensi.kodelokasi,
              namalokasi: transreferensi.namalokasi,
              username: transreferensi.userbuat
            }]);
            $('#IDTRANSREFERENSI').combogrid('setValue', transreferensi.uuiddo);
            $('#KODETRANSREFERENSI').val(transreferensi.kodedo);
          }

          var alamatcustomer = '';

          if (transreferensi.alamatcustomer) {
            alamatcustomer = transreferensi.alamat + "\r\n";
          }

          if (transreferensi.kota && transreferensi.kota != null) {
            alamatcustomer += transreferensi.kota;
          }

          if (transreferensi.propinsi && transreferensi.propinsi != null) {
            alamatcustomer += "-" + transreferensi.propinsi;
          }

          if (transreferensi.negara && transreferensi.negara != null) {
            alamatcustomer += "-" + transreferensi.negara;
          }

          $('#ALAMAT').textbox('setValue', alamatcustomer);
          $('#TELP').textbox('setValue', transreferensi.telp);

          // memuat data detail dari DO
          load_data_detail(transreferensi.uuiddo);
        } else if (jenistransreferensi == 'RETUR') {
          setTimeout(function() {
            $('#IDREFERENSI').combogrid('setValue', {
              id: transreferensi.uuidsupplier,
              kode: transreferensi.kodesupplier
            });

            load_data_detail(transreferensi.uuidreturbeli);
          }, 250);

          $('#KODEREFERENSI').val(transreferensi.kodesupplier);

          $('#NAMAREFERENSI').textbox('setValue', transreferensi.namasupplier);

          $('#CATATAN').textbox('setValue', transreferensi.catatan);

          if (TRANSREFERENSI == 'HEADER') {
            $('#IDTRANSREFERENSI').combogrid('grid').datagrid('loadData', [{
              idtransreferensi: transreferensi.uuidreturbeli,
              kodetransreferensi: transreferensi.kodereturbeli,
              tgltrans: transreferensi.tgltrans,
              tglkirim: transreferensi.tglkirim,
              idlokasi: transreferensi.uuidlokasi,
              kodelokasi: transreferensi.kodelokasi,
              namalokasi: transreferensi.namalokasi,
              username: transreferensi.userbuat
            }]);
            $('#IDTRANSREFERENSI').combogrid('setValue', transreferensi.uuidreturbeli);
            $('#KODETRANSREFERENSI').val(transreferensi.kodereturbeli);
          }


          $('#ALAMAT').textbox('setValue', transreferensi.alamatsupplier);
          $('#TELP').textbox('setValue', transreferensi.telpsupplier);
        }
      }
    }

    function ubah() {
      $(':radio:not(:checked)').attr('disabled', false);
      $('#mode').val('ubah');

      if (row) {
        get_status_trans("{{ session('TOKEN') }}", "atena/inventori/bukti-pengeluaran-barang", "uuidbbk", row.uuidbbk,
          function(data) {
            data = data.data;
            $(".form_status").html(status_transaksi(data.status));
          });
        $("#form_input").form('load', row);

        if (row.uuidekspedisi != 0) {
          $("#IDEKSPEDISI").combogrid('setValue', {
            id: row.uuidekspedisi,
            kode: row.kodeekspedisi
          });
          $('#NAMAEKSPEDISI').textbox('setValue', row.namaekspedisi);
          $('#ALAMATEKSPEDISI').textbox('setValue', row.alamatekspedisi);
          $('#TELPEKSPEDISI').textbox('setValue', row.telpekspedisi);
        }


        //jika tidak punya akses input harga
        if (INPUTHARGA == 0) {
          $(':radio:not(:checked)').attr('disabled', true);
        }

        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          data = data.data;
          var UT = data.ubah;

          get_status_trans("{{ session('TOKEN') }}", "atena/inventori/bukti-pengeluaran-barang", "uuidbbk", row
            .uuidbbk,
            function(data) {
              data = data.data;
              if (UT == 1 && data.status == 'I') {
                $('#btn_simpan_modal').css('filter', '');
                $('#mode').val('ubah');
              } else {
                $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                $('#btn_simpan_modal').removeAttr('onclick');
              }

              var alamat = row.alamatreferensi + "\r\n";
              if (row.kotareferensi && row.kotareferensi != 'null') alamat += row.kotareferensi;
              if (row.propinsireferensi && row.propinsireferensi != 'null') alamat += "-" + row.propinsireferensi;
              if (row.negarareferensi && row.negarareferensi != 'null') alamat += "-" + row.negarareferensi;

              $('#NAMAREFERENSI').textbox('setValue', row.namareferensi);
              $('#NAMACUSTOMEREKSPEDISI').textbox('setValue', row.namacustomerekspedisi);

              $('#ALAMAT').textbox('setValue', alamat);
              $('#TELP').textbox('setValue', row.telp);

              $('#TGLTRANS').datebox('setValue', row.tgltrans);
              $("#IDLOKASI").combogrid('setValue', {
                id: row.uuidlokasi,
                kode: row.kodelokasi
              });
              $("#KODELOKASI").val(row.kodelokasi);
              $('#IDTRANSREFERENSI').combogrid('setValue', {
                idtransreferensi: row.uuidtransreferensi,
                kodetransreferensi: row.kodetransreferensi
              });
              $('#JENISTRANSAKSI').combogrid('readonly');
              $('#IDREFERENSI').combogrid('readonly');
              $('#IDTRANSREFERENSI').combogrid('readonly');
              $('#IDLOKASI').combogrid('readonly');
              $("#IDREFERENSI").combogrid('setValue', {
                id: row.uuidreferensi,
                kode: row.kodereferensi
              });
              $("#IDKENDARAAN").combogrid('setValue', {
                id: row.uuidkendaraan,
                kode: row.namakendaraan
              });
              $("#IDSOPIR").combogrid('setValue', {
                id: row.uuidsopir,
                kode: row.namasopir
              });
              $("#JMLCOLLIE").combogrid('setValue', row.jmlcollie);

              if (row.omnichannel == 1) {
                $('#table_data_detail').datagrid('options').RowAdd = false;
                $('#table_data_detail').datagrid('options').RowEdit = false;
                $('#table_data_detail').datagrid('options').RowDelete = false;
              }

            });

          idtrans = row.uuidbbk;
          load_data(row.uuidbbk);
          load_data_rekap(row.uuidbbk);
          load_data_barcode(row.uuidbbk, row.kodebbk);
        });

      }

    }

    function simpan(use) {
      var mode = $("#mode").val();

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));
      $('#data_detail_barcode').val(JSON.stringify($('#table_data_detail_barcode').datagrid('getChecked')));

      var rowDetail = $('#table_data_detail').datagrid('getRows')[0];
      get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), rowDetail.selisih);
      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      $('#window_button_simpan').window('close');

      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }

      if (SCANBARCODE == 'YA') {
        isValid = cek_jumlah_dan_barcode();
        if (!isValid) {
          return false;
        }
      }


      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        cekbtnsimpan = false;
        if (!isTokenExpired('{{ session('TOKEN') }}')) {
          $.ajax({
            type: 'POST',
            dataType: 'json',
            url: base_url + "atena/Inventori/Transaksi/BarangKeluar/simpan/" + use,
            data: datanya,
            cache: false,
            beforeSend: function() {
              $.messager.progress();
            },
            success: function(msg) {
              $.messager.progress('close');
              cekbtnsimpan = true;
              if (msg.success) {
                $('#form_input').form('clear');

                $.messager.show({
                  title: 'Info',
                  msg: 'Transaksi Sukses',
                  showType: 'show'
                });

                transreferensi = null;
                jenistransreferensi = '';

                tambah();

                parent.reload();

                if (use == 'simpan_cetak') {
                  cetak(msg.id);
                }
              } else {
                $.messager.alert('Error', msg.errorMsg, 'error');
              }
            }
          });
        } else {
          $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
        }
      }
    }

    function reset_detail() {
      if ($('#mode').val() == 'tambah') {
        $('#table_data_detail').datagrid('loadData', []);
        $('#table_data_detail_rekap').datagrid('loadData', []);
        $('#table_data_detail_barcode').datagrid('loadData', []);
      }
    }

    function load_data(idtrans) {
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: base_url + "atena/Inventori/Transaksi/BarangKeluar/loadData",
        data: "idtrans=" + idtrans,
        cache: false,
        success: function(msg) {
          if (msg.success) {
            for (var x = 0; x < msg.detail.length; x++) {
              $.ajax({
                type: 'POST',
                dataType: 'json',
                url: base_url + 'atena/Master/Data/Barang/satuanBarang/' + msg.detail[x].uuidbarang,
                async: false,
                cache: false,
                success: function(response) {
                  get_konversi(response, msg.detail[x].satuan, response[0].satuan);
                  msg.detail[x].satuan_lama = msg.detail[x].satuan;
                  msg.detail[x].hargaterendah = ((satuan_baru > satuan_lama) ? msg.detail[x].hargaterendah /
                    konversi_baru : msg.detail[x].hargaterendah * konversi_lama).toFixed(0);
                }
              });
            }
            $('#table_data_detail').datagrid('loadData', msg.detail);
          }
        }
      });
    }

    function load_data_detail(idtrans) {
      var jenis = $('#JENISTRANSAKSI').combobox('getValue');
      var url = '';

      if ($("#mode").val() == "tambah") {
        if (jenis == "PENJUALANSO") {
          url = 'atena/Penjualan/Transaksi/SalesOrder/loadDataDetail';
        } else if (jenis == "PENJUALANDO") {
          url = 'atena/Penjualan/Transaksi/DeliveryOrder/loadDataDetail';
        } else if (jenis == "RETUR") {
          url = 'atena/Pembelian/Transaksi/ReturPembelian/loadDataDetail';
        }

        $.ajax({
          type: 'POST',
          dataType: 'json',
          url: base_url + url,
          data: {
            idtrans: idtrans,
            tgltrans: $('#TGLTRANS').datebox('getValue')
          },
          cache: false,
          beforeSend: function() {
            $.messager.progress();
          },
          success: function(msg) {
            $.messager.progress('close');
            if (msg.success) {
              for (var x = 0; x < msg.detail.length; x++) {
                $.ajax({
                  type: 'POST',
                  dataType: 'json',
                  url: base_url + 'atena/Master/Data/Barang/satuanBarang/' + msg.detail[x].uuidbarang,
                  async: false,
                  cache: false,
                  success: function(response) {
                    get_konversi(response, msg.detail[x].satuan, response[0].satuan);
                    msg.detail[x].satuan_lama = msg.detail[x].satuan;
                    msg.detail[x].hargaterendah = ((satuan_baru > satuan_lama) ? msg.detail[x].hargaterendah /
                      konversi_baru : msg.detail[x].hargaterendah * konversi_lama).toFixed(0);
                  }
                });
              }
              $('#table_data_detail').datagrid('loadData', msg.detail);

              var rows = msg.detail;

              for (var i = 0; i < rows.length; i++) {
                $('#table_data_detail').datagrid('updateRow', {
                  index: i,
                  row: {
                    ppnpersen: ppnpersenaktif
                  }
                });

                rows[i].ppnpersen = ppnpersenaktif;

                hitung_subtotal_detail(i, rows[i])
              }
              hitung_grandtotal();
              $('#table_data_detail_rekap').datagrid('loadData', msg.detail);
            }
          }
        });
      } else if ($("#mode").val() == "ubah") {
        if (jenis != "") {
          url = 'atena/Inventori/Transaksi/BarangKeluar/loadDataDetailTrans/';
        }

        $.ajax({
          type: 'POST',
          dataType: 'json',
          url: base_url + url,
          data: "idtrans=" + idtrans + "&jenisTrans=" + jenis,
          cache: false,
          beforeSend: function() {
            $.messager.progress();
          },
          success: function(msg) {
            $.messager.progress('close');
            if (msg.success) {
              for (var x = 0; x < msg.detail.length; x++) {
                $.ajax({
                  type: 'POST',
                  dataType: 'json',
                  url: base_url + 'atena/Master/Data/Barang/satuanBarang/' + msg.detail[x].uuidbarang,
                  async: false,
                  cache: false,
                  success: function(response) {
                    get_konversi(response, msg.detail[x].satuan, response[0].satuan);
                    msg.detail[x].satuan_lama = msg.detail[x].satuan;
                    msg.detail[x].hargaterendah = ((satuan_baru > satuan_lama) ? msg.detail[x].hargaterendah /
                      konversi_baru : msg.detail[x].hargaterendah * konversi_lama).toFixed(0);
                  }
                });
              }
              $('#table_data_detail').datagrid('loadData', msg.detail);
              var rows = msg.detail;
              for (var i = 0; i < rows.length; i++) {
                hitung_subtotal_detail(i, rows[i])
              }
              hitung_grandtotal();
              $('#table_data_detail_rekap').datagrid('loadData', msg.detail);
            }
          }
        });
      }
    }

    function load_data_rekap(idtrans) {
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: base_url + "atena/Inventori/Transaksi/BarangKeluar/loadDataRekap",
        data: "idtrans=" + idtrans,
        cache: false,
        success: function(msg) {
          if (msg.success) {
            $('#table_data_detail_rekap').datagrid('loadData', msg.detail);
            $('#IDLOKASI').combogrid('readonly');
            $('#IDLOKASITUJUAN').combogrid('readonly');
          }
        }
      });
    }

    function load_data_barcode(idtrans, kodetrans) {
      $.ajax({
        type: 'POST',
        url: link_api.loadDataBarangKeluarBarcode,
        data: {
          idtrans: idtrans,
          kodetrans: kodetrans,
        },
        success: function(response) {
          if (response.success) {
            $('#table_data_detail_barcode').datagrid('loadData', response.detail);
            $('#table_data_detail_barcode').datagrid('checkAll');
          }
        }
      })
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
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');
          if (row) {
            $("#KODELOKASI").val(row.kode);
          }
          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
      });
    }

    function browse_data_lokasitujuan(id) {
      $(id).combogrid({
        panelWidth: 380,
        url: link_api.browseLokasi,
        idField: 'uuidlokasi',
        textField: 'nama',
        mode: 'local',
        sortName: 'nama',
        sortOrder: 'asc',
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
      });
    }

    function browse_data_syaratbayar(id, ) {
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
              width: 170,
              sortable: true
            },
            {
              field: 'selisih',
              title: 'Diff Days',
              width: 100,
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

    function browse_data_sopir(id, table) {
      $(id).combogrid({
        panelWidth: 410,
        idField: 'uuidsopir',
        textField: 'namasopir',
        url: link_api.browseSopir,
        mode: 'remote',
        required: false,
        columns: [
          [{
              field: 'uuidsopir',
              hidden: true
            },
            {
              field: 'kodesopir',
              title: 'Kode',
              width: 80
            },
            {
              field: 'namasopir',
              title: 'Nama',
              width: 150
            },
            {
              field: 'catatan',
              title: 'Catatan',
              width: 150
            },
          ]
        ]
      });
    }

    function browse_data_kendaraan(id) {
      $(id).combogrid({
        panelWidth: 560,
        idField: 'uuidkendaraan',
        textField: 'nopolisi',
        url: link_api.browseKendaraan,
        mode: 'remote',
        required: false,
        columns: [
          [{
              field: 'uuidkendaraan',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 80
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 150
            },
            {
              field: 'nopolisi',
              title: 'NoPol',
              width: 150
            },
            {
              field: 'catatan',
              title: 'Catatan',
              width: 150
            },
          ]
        ]
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
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');
          if (row) {
            $('#NAMAEKSPEDISI').textbox('setValue', row.nama);
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

    function browse_data_referensi(id, table) {
      //table = supplier / customer
      var jenis = $('#JENISTRANSAKSI').combobox('getValue');

      if (table === undefined) {
        return false;
      }

      if (jenis == 'TRANSFER') {
        $(id).combogrid({
          panelWidth: 370,
          url: `${base_url_api}atena/master/${table}/browse`,
          idField: 'uuid' + table,
          textField: 'nama',
          mode: 'remote',
          sortName: 'nama',
          sortOrder: 'asc',
          required: true,
          columns: [
            [{
                field: 'uuid' + table,
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
          onChange: function(newVal, oldVal) {
            var row = $(id).combogrid('grid').datagrid('getSelected');
            if (row) {

              var lokasi = $("#IDLOKASI").combogrid('getValue');

              urltransreferensi = 'atena/Inventori/Transaksi/TransferPersediaan/comboGridBBK';

              if ($("#mode").val() == "tambah") {
                var url = base_url + urltransreferensi + '/' + lokasi + '/' + row.id;

                ubah_url_combogrid($("#IDTRANSREFERENSI"), url, true);
                $("#KODEREFERENSI").val(row.kode);
                $("#IDREFERENSI").combogrid('setValue', row.id);
              }
            }
            if ($('#mode').val() != '') {
              reset_detail();
            }
          }
        });
      } else {
        $(id).combogrid({
          panelWidth: 600,
          url: `${base_url_api}atena/master/${table}/browse`,
          idField: 'uuid' + table,
          textField: 'kode',
          mode: 'remote',
          sortName: 'nama',
          sortOrder: 'asc',
          required: true,
          columns: [
            [{
                field: 'uuid' + table,
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
              {
                field: 'alamat',
                title: 'Alamat',
                width: 300,
                sortable: true
              },
              {
                field: 'kota',
                title: 'Kota',
                width: 100,
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
            ]
          ],
          onChange: function(newVal, oldVal) {
            var row = $(id).combogrid('grid').datagrid('getSelected');
            if (row) {
              var alamat = row.alamat == "" || row.alamat == null ? "" : (row.alamat + "\r\n");
              if (row.kota && row.kota != 'null') alamat += row.kota;
              if (row.propinsi && row.propinsi != 'null') alamat += "-" + row.propinsi;
              if (row.negara && row.negara != 'null') alamat += "-" + row.negara;

              $('#NAMAREFERENSI').textbox('setValue', row.nama);
              $('#ALAMAT').textbox('setValue', alamat);
              $('#TELP').textbox('setValue', row.telp);

              var lokasi = $("#IDLOKASI").combogrid('getValue');

              if (jenis == "PENJUALANSO") {
                urltransreferensi = 'atena/Penjualan/Transaksi/SalesOrder/comboGridBBK';
              } else if (jenis == "PENJUALANDO") {
                urltransreferensi = 'atena/Penjualan/Transaksi/DeliveryOrder/comboGridBBK';
              } else if (jenis == "RETUR") {
                urltransreferensi = 'atena/Pembelian/Transaksi/ReturPembelian/comboGridBBK';
              }

              if ($("#mode").val() == "tambah" && transreferensi == null) {
                var url = base_url + urltransreferensi + '/' + lokasi + '/' + row.id;

                ubah_url_combogrid($("#IDTRANSREFERENSI"), url, true);

                $("#KODEREFERENSI").val(row.kode);
              }
            }

            if ($('#mode').val() != '') {
              reset_detail();
            }
          }
        });
      }
    }

    var namasyaratbayarval, idsyaratbayarval, selisihval = '';

    function browse_data_transreferensi(id) {
      $(id).combogrid({
        panelWidth: 640,
        idField: 'uuidtransreferensi',
        textField: 'kodetransreferensi',
        mode: 'remote',
        required: TRANSREFERENSI == 'HEADER',
        columns: [
          [{
              field: 'tglkirim',
              title: 'Tgl Kirim',
              width: 80
            },
            {
              field: 'uuidtransreferensi',
              hidden: true
            },
            {
              field: 'kodetransreferensi',
              title: 'Kode',
              width: 130
            },
            {
              field: 'kodelokasi',
              hidden: true,
              title: 'Lokasi',
              width: 60
            },
            {
              field: 'namalokasi',
              title: 'Nama Lokasi',
              width: 120
            },
            {
              field: 'tgltrans',
              title: 'Tgl Trans',
              align: 'center',
              width: 80
            },
            {
              field: 'username',
              title: 'User',
              width: 90
            },
          ]
        ],
        onSelect: function(index, row) {
          if ($('#mode').val() != '') {
            var time_bbk = Date.parse($('#TGLTRANS').datebox('getValue'));
            var time_ref = Date.parse(row.tgltrans);

            if (time_bbk < time_ref) {
              $.messager.alert('Error', 'Tanggal pengeluaran tidak boleh sebelum tanggal transaksi yang dipilih',
                'error');

              $('#IDTRANSREFERENSI').combogrid('clear');

              return false;
            }

            var jenis = $('#JENISTRANSAKSI').combobox('getValue');
            if (jenis == "TRANSFER") {
              $("#IDLOKASITUJUAN").combogrid('setValue', row.uuidlokasi);
            } else {
              $('#TGLTRANS').datebox('setValue', row.tglkirim);

              if (row.uuidlokasi != $("#IDLOKASI").combogrid('getValue') ||
                row.tgltrans > $('#TGLTRANS').datebox('getValue')) {
                $.messager.show({
                  title: 'Warning',
                  msg: 'Transaksi harus pada lokasi yang sama dan sebelum tanggal transaksi',
                  timeout: {{ session('TIMEOUT') }},
                });
                $(this).combogrid('clear');
              }
            }

            if (jenis == "PENJUALANSO" || jenis == 'PENJUALANDO') {
              //info ekspedisi
              $('#IDEKSPEDISI').combogrid('setValue', row.uuidekspedisi);
              $('#NAMAEKSPEDISI').textbox('setValue', row.namaekspedisi);
              $('#ALAMATEKSPEDISI').textbox('setValue', row.alamatekspedisi);
              $('#TELPEKSPEDISI').textbox('setValue', row.telpekspedisi);
            }

            $('#table_data_detail').datagrid('options').RowAdd = true;
            $('#table_data_detail').datagrid('options').RowEdit = true;
            $('#table_data_detail').datagrid('options').RowDelete = true;

            if (jenis == 'PENJUALANSO') {
              if (row.omnichannel == 1) {
                $('#table_data_detail').datagrid('options').RowAdd = false;
                $('#table_data_detail').datagrid('options').RowEdit = false;
                $('#table_data_detail').datagrid('options').RowDelete = false;
              }
            }

            namasyaratbayarval = row.namasyaratbayar;
            idsyaratbayarval = row.uuidsyaratbayar;
            selisihval = row.selisih;

            $("#KODETRANSREFERENSI").val(row.kodetransreferensi);

            if (row.catatan && row.catatan != null) {
              $("#CATATAN").textbox('setValue', row.catatan);
            }

            if ($("#mode").val() == "tambah") {
              load_data_detail(row.uuidtransreferensi);
            }

            reset_detail();
          }
        }
      });
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
              kodetransreferensi: '',
              jmlcollie: 0,
            }).datagrid('gotoCell', {
              index: index,
              field: 'kodetransreferensi'
            });

            // getRowIndex(target);
          }
        }, {
          text: 'Hapus',
          iconCls: 'icon-remove',
          handler: function() {
            if ($('#table_data_detail').datagrid('options').RowDelete == false) {
              return false;
            }

            $(dg).datagrid('deleteRow', indexDetail);
            hitung_grandtotal();
          }
        }],
        frozenColumns: [
          [{
              field: 'uuidtransreferensi',
              hidden: true
            },
            {
              field: 'kodetransreferensi',
              hidden: TRANSREFERENSI == 'HEADER',
              title: 'Kode Ref',
              width: 120,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 600,
                  mode: 'remote',
                  required: SODO == 0,
                  idField: 'kodetransreferensi',
                  textField: 'kodetransreferensi',
                  columns: [
                    [{
                        field: 'uuidtransreferensi',
                        hidden: true
                      },
                      {
                        field: 'kodetransreferensi',
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
                        width: 80,
                        align: 'center'
                      },
                      {
                        field: 'username',
                        title: 'User',
                        width: 150
                      },
                    ]
                  ],
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
                  panelWidth: 710,
                  mode: 'remote',
                  required: true,
                  idField: 'kode',
                  textField: 'kode',
                  columns: [
                    [{
                        field: 'uuidbarang',
                        hidden: true
                      },
                      {
                        field: 'kodemerk',
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
                        field: 'hargabeli',
                        title: 'Harga Beli',
                        align: 'right',
                        width: 80,
                        formatter: format_amount
                      },
                      {
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
              hidden: {{ session('GUNAKANALIASPENJUALAN') == 'YA' ? 'false' : 'true' }}
            },
            @if (session('SHOWBARCODE') == 'YA')
              {
                field: 'barcodesatuan1',
                title: 'Barcode Sat. 1',
                width: 120,
              },
            @endif
            @if (session('SHOWPARTNUMBER') == 'YA')
              {
                field: 'partnumber',
                title: 'Part Number',
                width: 120,
              },
            @endif {
              field: 'namasyaratbayar',
              title: 'Syarat Byr',
              width: 90
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
          ]
        ],
        columns: [
          [
            ...(LIHATHARGA == 1 ? [{
              field: 'adanpwp',
              title: 'Ada NPWP',
              formatter: format_checked,
              align: 'center'
            }, ] : []),
            {
              field: 'jmltransreferensi',
              title: 'Total Ref',
              align: 'right',
              width: 80,
              formatter: format_qty,
              hidden: true
            },
            {
              field: 'terpenuhitransreferensi',
              title: 'Terpenuhi Ref',
              align: 'right',
              width: 80,
              formatter: format_qty,
              hidden: true
            },
            {
              field: 'sisatransreferensi',
              title: 'Sisa Ref',
              align: 'right',
              width: 80,
              formatter: format_qty
            },
            {
              field: 'jmlstok',
              title: 'Stok',
              align: 'right',
              width: 80,
              formatter: format_qty
            },
            {
              field: 'jmlbbk',
              title: 'Jumlah',
              align: 'right',
              width: 80,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
                options: {
                  required: true,
                }
              }
            },
            {
              field: 'jmlcollie',
              title: 'Jml Collie',
              align: 'right',
              width: 80,
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
              width: 50,
              align: 'center'
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
              title: 'Bonus',
              align: 'right',
              width: 80,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 4,
                  required: true,
                }
              }
            },
            {
              field: 'keterangan',
              title: 'Keterangan',
              width: 150,
              editor: {
                type: 'validatebox',
                options: {
                  validType: 'length[0,300]'
                }
              }
            },
            ...(LIHATHARGA == 1 ? [{
                field: 'uuidcurrency',
                title: 'Kode Currency',
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
                    url: base_url + 'atena/Master/Data/Currency/comboGrid',
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
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }},
                formatter: format_amount
              },
              {
                field: 'hargakurs',
                title: 'Harga ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 85,
                formatter: format_amount
              },
              {
                field: 'disckurs',
                title: 'Disc ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 65,
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }},
                formatter: format_amount
              },
              {
                field: 'subtotalkurs',
                title: 'Subtotal ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 95,
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }},
                formatter: format_amount,
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
                    }, {
                      value: 'EXCL',
                      text: 'EXCL'
                    }, {
                      value: 'TIDAK',
                      text: 'TIDAK'
                    }],
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
                field: 'ppnpersen',
                title: 'PPN (%)',
                align: 'right',
                width: 65,
                formatter: format_amount_2,
                editor: INPUTHARGA == 1 ? {
                  type: 'numberbox',
                  options: {
                    min: 0,
                    precision: 2,
                    max: 100
                  }
                } : null,
              },
              {
                field: 'ppnrp',
                title: 'PPN ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 65,
                formatter: format_amount
              },
              {
                field: 'pph22persen',
                title: 'PPH 22 (%)',
                align: 'right',
                width: 65,
                formatter: format_amount_2,
                editor: INPUTHARGA == 1 ? {
                  type: 'numberbox',
                  options: {
                    min: 0,
                    precision: 2,
                    max: 100
                  }
                } : null,
              },
              {
                field: 'pph22rp',
                title: 'PPH 22 ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 65,
                formatter: format_amount
              },
            ] : []),
            {
              field: 'ppn',
              hidden: true
            }
          ]
        ],
        //UNTUK TOMBOL EDIT
        onClickRow: function(index, row) {
          indexDetail = index;
        },
        onBeforeCellEdit: function(index, field) {
          var row = $(this).datagrid('getRows')[index];

          if (field == 'disc' || field == 'discpersen' || field == 'harga') {
            oldharga = parseFloat(row.harga);
            olddiskonpersen = row.discpersen;
            olddiskonrp = row.disc;
          }

          if (field == 'jmlbbk') {
            if ($('#JENISTRANSAKSI').combobox('getValue') == 'PENJUALANSO') {
              if (TRANSREFERENSI == 'HEADER') {
                var selected_transref = $('#IDTRANSREFERENSI').combogrid('grid').datagrid('getSelected');
                if (selected_transref.omnichannel == 1) {
                  return false;
                }
              }
            }
          }

          if (field == 'jmlbbk') {
            var jenis = $('#JENISTRANSAKSI').combobox('getValue');

            if (jenis == "PENJUALANDO") {
              $.messager.show({
                title: 'Warning',
                msg: 'Jumlah Tidak Boleh Dirubah Karena Mengacu Pada DO',
                timeout: {{ session('TIMEOUT') }},
              });

              return false;
            }
          }
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);
          if (field == 'kodetransreferensi') {
            var jenis = $('#JENISTRANSAKSI').combobox('getValue');
            var lokasi = $("#IDLOKASI").combogrid('getValue');
            var ref = $("#IDREFERENSI").combogrid('getValue');

            if (jenis == "PENJUALANSO") {
              urltransreferensi = link_api.browseBBKInventoryBarangKeluar;
            } else if (jenis == "PENJUALANDO") {
              urltransreferensi = 'atena/Penjualan/Transaksi/DeliveryOrder/comboGridBBK';
            } else if (jenis == "RETUR") {
              urltransreferensi = 'atena/Pembelian/Transaksi/ReturPembelian/comboGridBBK';
            } else if (jenis == "TRANSFER") {
              urltransreferensi = 'atena/Inventori/Transaksi/TransferPersediaan/comboGridBBK';
            }

            ed.combogrid('grid').datagrid('options').url = base_url + urltransreferensi + '/' + lokasi + '/' + ref;
            ed.combogrid('grid').datagrid('load', {
              q: ''
            });
            ed.combogrid('showPanel');
          } else if (field == 'kodebarang') {
            var idtransreferensi = '';

            //jika transaksi detail
            if (row.uuidtransreferensi) idtransreferensi = row.uuidtransreferensi;

            if (TRANSREFERENSI == 'HEADER') {
              //jika transaksi header
              idtransreferensi = $("#IDTRANSREFERENSI").combogrid('getValue');
            }

            var jenis = $('#JENISTRANSAKSI').combobox('getValue');
            var urlbarang = "";


            if (idtransreferensi != "") {
              if (jenis == "PENJUALANSO") {
                urlbarang = 'atena/Penjualan/Transaksi/SalesOrder/comboGridBarang/';
              } else if (jenis == "PENJUALANDO") {
                urlbarang = 'atena/Penjualan/Transaksi/DeliveryOrder/comboGridBarang/';
              } else if (jenis == "RETUR") {
                urlbarang = 'atena/Pembelian/Transaksi/ReturPembelian/comboGridBarangBBK/';
              } else if (jenis == "TRANSFER") {
                urlbarang = 'atena/Inventori/Transaksi/TransferPersediaan/comboGridBarang/';
              }
            } else {
              urlbarang = 'atena/Master/Data/Barang/comboGrid';
            }


            ed.combogrid('grid').datagrid('options').url = base_url + urlbarang + idtransreferensi;
            ed.combogrid('grid').datagrid('load', {
              q: ''
            });
            ed.combogrid('showPanel');
          } else if (field == 'satuan') {
            ed.combogrid('grid').datagrid('options').url = base_url + 'atena/Master/Data/Barang/satuanBarang/' + row
              .uuidbarang;
            ed.combogrid('grid').datagrid('load', {
              q: '',
              idbarang: row.uuidbarang
            });
            ed.combogrid('showPanel');
          } else if (field == 'currency') {
            ed.combogrid('showPanel');
          } else if (field == 'pakaippn') {
            ed.combogrid('showPanel');
          }
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data_detail', index, cell.field);
          var row_update = {};

          switch (cell.field) {
            case 'kodetransreferensi':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidtransreferensi : '';
              var adanpwp = data ? data.adanpwp : '';
              var tgltrans = data ? data.tgltrans : '';
              var lokasi = data ? data.uuidlokasi : '';
              var namasyaratbayar = data ? data.namasyaratbayar : '';
              var idsyaratbayar = data ? data.uuidsyaratbayar : '';
              var selisih = data ? data.selisih : '';
              var scanbarcodebbk = data ? data.scanbarcodebbk : '';

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
                scanbarcodebbk: scanbarcodebbk,
                idtransreferensi: id,
                adanpwp: adanpwp,
                namasyaratbayar: namasyaratbayar,
                idsyaratbayar: idsyaratbayar,
                selisih: selisih,
                kodebarang: '',
                namabarang: '',
                tutup: 0,
                jmltransreferensi: 0,
                terpenuhitransreferensi: 0,
                sisatransreferensi: 0,
                jmlbbk: 0,
                jmlbonus: 0,
                sisabbk: 0,
                satuan: '',
                harga: 0,
                discpersen: 0,
                disc: 0,
                disckurs: 0,
                subtotal: 0,
              };
              break;
            case 'kodebarang':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.id : '';
              var ppn = data ? data.ppn : '';
              var nama = data ? data.nama : '';
              var satuan = data ? data.satuan : '';
              var satuanutama = data ? data.satuanutama : '';
              var kodemerk = data ? data.kodemerk : '';
              var konversi = data ? data.konversi : '';
              var harga = data ? data.harga : 0;
              var subtotal = harga * 1;
              var kodebrg = data ? data.kode : '';
              var jml = data ? data.jml : '';
              var sisa = data ? data.sisa : '';
              var terpenuhi = data ? data.terpenuhi : '';
              var discpersen = data ? data.discpersen : '';
              var disc = data ? data.disc : '';
              var disckurs = data ? data.disckurs : '';
              var pakaippn = data ? data.pakaippn : '';
              var ppnpersen = ppnpersenaktif;
              var pph22persen = data ? data.pph22persen : '';
              var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
              var partnumber = data.partnumber ? data.partnumber : '';
              var disccustomermin = data.disccustomermin ? data.disccustomermin : 0;
              var disctipecustomermin = data.disctipecustomermin ? data.disctipecustomermin : 0;
              var discmerkmin = data.discmerkmin ? data.discmerkmin : 0;
              var disccustomermax = data.disccustomermax ? data.disccustomermax : 0;
              var disctipecustomermax = data.disctipecustomermax ? data.disctipecustomermax : 0;
              var discmerkmax = data.discmerkmax ? data.discmerkmax : 0;
              var row_harga = null;
              var jenistrans = $('#JENISTRANSAKSI').combobox('getValue');

              if (jenistrans == 'PENJUALANDO') {
                row_harga = get_harga_barang(data.id, data.jmlso);
              } else {
                row_harga = get_harga_barang(data.id, jml);
              }

              oldharga = harga;
              olddiskonpersen = '0';
              olddiskonrp = 0;

              if (parseFloat(disccustomermin) > 0) {
                discpersen = disccustomermin;
              } else if (parseFloat(disctipecustomermin) > 0) {
                discpersen = disctipecustomermin;
              } else if (parseFloat(discmerkmin) > 0) {
                discpersen = discmerkmin;
              }

              if (id != "") {
                pakaippn = '{{ session('DEFAULTPAKAIPPN') }}';
              }

              if (pakaippn == 0) pakaippn = "TIDAK";
              else if (pakaippn == 1) pakaippn = "EXCL";
              else if (pakaippn == 2) pakaippn = "INCL";

              if ($('#JENISTRANSAKSI').combobox('getValue') == 'RETUR') {
                ppnpersen = data.ppnpersen;
              }

              //DAPATKAN STOK BARANG
              $.ajax({
                type: 'post',
                async: false,
                url: base_url + 'atena/Inventori/Transaksi/BarangKeluar/getStokBarang',
                data: {
                  idbarang: id,
                  idlokasi: $("#IDLOKASI").combogrid("getValue"),
                  tgltrans: $('#TGLTRANS').datebox('getValue'),
                  satuan: row.satuan,
                },
                beforeSend: function() {
                  $.messager.progress();
                },
                success: function(stok) {
                  $.messager.progress('close');

                  var idcurrency;
                  var currency;
                  var nilaikurs;
                  var jmlbbk;

                  if (row.uuidtransreferensi === undefined || row.uuidtransreferensi == "") {
                    idcurrency = '{{ session('UUIDCURRENCY') }}';
                    currency = '{{ session('SIMBOLCURRENCY') }}';
                    nilaikurs = 1;
                    harga = row_harga.hargamaxsatuan
                    subtotal = harga * 0;
                    discpersen = 0;
                    disc = 0;
                    jmlbbk = 0;
                  } else {
                    idcurrency = data.uuidcurrency;
                    currency = data.simbol;
                    nilaikurs = data.nilaikurs;
                    var jenistrans = $('#JENISTRANSAKSI').combobox('getValue');
                    if (jenistrans == 'PENJUALANDO') {
                      jmlbbk = data.jml;
                    } else {
                      jmlbbk = 0;
                    }
                  }

                  row_update = {
                    idbarang: id,
                    ppn: ppn,
                    namabarang: nama,
                    barcodesatuan1: barcodesatuan1,
                    partnumber: partnumber,
                    tutup: 0,
                    kodemerk: kodemerk,
                    satuan_lama: satuan,
                    satuanutama: satuanutama,
                    satuan: satuan,
                    konversi: konversi,
                    jmltransreferensi: jml,
                    terpenuhitransreferensi: terpenuhi,
                    sisatransreferensi: sisa,
                    jmlstok: stok,
                    jmlbbk: jmlbbk,
                    jmlbonus: 0,
                    sisabbk: 0,
                    harga: harga,
                    idcurrency: idcurrency,
                    currency: currency,
                    nilaikurs: nilaikurs,
                    discpersen: discpersen,
                    disc: disc,
                    disckurs: disckurs,
                    subtotal: subtotal,
                    pakaippn: pakaippn,
                    ppnpersen: ppnpersen,
                    ppnrp: 0,
                    pph22persen: pph22persen,
                    pph22rp: 0,
                    hargaterendah: satuan == row_harga.satuan ? row_harga.hargaminsatuan : (satuan ==
                      row_harga.satuan2 ? row_harga.hargaminsatuan2 : row_harga.hargaminsatuan3),
                    disccustomermin: disccustomermin,
                    disctipecustomermin: disctipecustomermin,
                    discmerkmin: discmerkmin,
                    disccustomermax: disccustomermax,
                    disctipecustomermax: disctipecustomermax,
                    discmerkmax: discmerkmax,
                    hargaminsatuan: row_harga.hargaminsatuan,
                    hargamaxsatuan: row_harga.hargamaxsatuan,
                    hargaminsatuan2: row_harga.hargaminsatuan2,
                    hargamaxsatuan2: row_harga.hargamaxsatuan2,
                    hargaminsatuan3: row_harga.hargaminsatuan3,
                    hargamaxsatuan3: row_harga.hargamaxsatuan3,
                    satuanbesar: row_harga.satuan,
                    satuansedang: row_harga.satuan2,
                    satuankecil: row_harga.satuan3
                  };
                }
              });


              if (TRANSREFERENSI == 'HEADER') {
                row_update["kodetransreferensi"] = $("#KODETRANSREFERENSI").val();
                row_update["idtransreferensi"] = $("#IDTRANSREFERENSI").combogrid('getValue');

                row_update["idsyaratbayar"] = idsyaratbayarval;
                row_update["namasyaratbayar"] = namasyaratbayarval;
                row_update["selisih"] = selisihval;
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
                  satuan_lama: changes.satuan,
                  cbTutupSO: tutupSO,
                };
              }

              var stok = row.jmlstok;

              $.ajax({
                type: 'POST',
                dataType: 'json',
                url: base_url + 'atena/Master/Data/Barang/getStokBarangSatuan',
                async: false,
                data: {
                  idbarang: row.uuidbarang,
                  idlokasi: $('#IDLOKASI').combogrid('getValue'),
                  satuan: changes.satuan,
                  tgltrans: $('#TGLTRANS').datebox('getValue')
                },
                cache: false,
                success: function(stoksatuan) {

                  if (stoksatuan != null) {
                    stok = stoksatuan;
                  }

                  row_update['jmlstok'] = stok;
                }
              });
              break;
          }
          if (changes.discpersen == 0) row_update.disc = 0;

          if (jQuery.isEmptyObject(row_update) == false) {
            $(this).datagrid('updateRow', {
              index: index,
              row: row_update
            });
          }
        },
        onLoadSuccess: function(data) {
          hitung_grandtotal();
        },
        onAfterDeleteRow: function(index, row) {
          hitung_grandtotal();
        },
        onAfterEdit: function(index, row, changes) {
          var jenistrans = $('#JENISTRANSAKSI').combobox('getValue');

          if (changes.kodetransreferensi != '' && changes.kodetransreferensi != null && jenistrans ==
            'PENJUALANSO') {
            cekValidUangMuka(index, row);
          } else {
            hitung_subtotal_detail(index, row);
            hitung_grandtotal();
          }
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
              field: 'jml',
              title: 'Jumlah',
              align: 'right',
              width: 60,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
              }
            },
            {
              field: 'jmlbonus',
              title: 'Bonus',
              align: 'right',
              width: 60,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
              }
            },
            {
              field: 'terpenuhi',
              title: 'Terpenuhi',
              align: 'right',
              width: 85,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
              }
            },
            {
              field: 'sisa',
              title: 'Sisa',
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
          var jenis = $('#JENISTRANSAKSI').combobox('getValue');
          var urlinfo, fieldkode = "";
          if (jenis == "PENJUALANSO" || jenis == "PENJUALANDO") {
            urlinfo = "atena/Penjualan/Transaksi/RealisasiPenjualan/InformasiBBK";
            fieldkode = 'koderekapbbkrealisasi';
          } else if (jenis == "RETUR") {
            urlinfo = 'atena/Pembelian/Transaksi/ReturPembelian/InformasiBBK';
            fieldkode = 'kodereturbeli';
          } else if (jenis == "TRANSFER") {
            urlinfo = 'atena/Inventori/Transaksi/BarangMasuk/InformasiTransReferensi';
            fieldkode = 'kodebbm';
          }
          ddv.datagrid({
            url: base_url + urlinfo,
            method: 'post',
            queryParams: {
              idtrans: idtrans,
              idbarang: row.uuidbarang,
              jenis: 'TRANSFER'
            },
            fitColumns: true,
            singleSelect: true,
            rownumbers: true,
            loadMsg: '',
            height: 'auto',
            columns: [
              [{
                  field: fieldkode,
                  title: 'No Transaksi',
                  width: 100,
                },
                {
                  field: 'tgltrans',
                  title: 'Tgl. Transaksi',
                  align: 'center',
                  width: 65,
                },
                {
                  field: 'jml',
                  title: 'Jml',
                  align: 'right',
                  width: 50,
                  formatter: format_qty,
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

    function buat_table_detail_barcode() {
      $('#table_data_detail_barcode').datagrid({
        clickToEdit: false,
        dblclickToEdit: true,
        singleSelect: false,
        rownumbers: true,
        toolbar: '#toolbar-scan-qrcode',
        columns: [
          [{
              field: 'ck',
              checkbox: true
            },
            {
              field: 'barcode',
              title: 'Kode',
              width: 150,
            },
            {
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 100
            },
            {
              field: 'namabarang',
              title: 'Nama Barang',
              width: 200
            }
          ]
        ],
      });
    }

    function hitung_subtotal_detail(index, row) {
      // hitung diskon lebih dahulu
      var data = {};
      var harga = parseFloat(row.harga ? row.harga : 0);
      var hargaterendah = 0;
      var dg = $('#table_data_detail');
      var totaldisc = 0;
      var discount = 0;

      data.jmlbbk = row.jmlbbk;
      data.sisatransreferensi = row.jmltransreferensi - row.terpenuhitransreferensi - row.jmlbbk;

      if (data.sisatransreferensi < 0) {
        $.messager.show({
          title: 'Warning',
          msg: 'Jumlah Barang Tidak Boleh Melebihi Sisa Referensi',
          timeout: {{ session('TIMEOUT') }},
        });
        data = {
          jmlbbk: 0,
          sisatransreferensi: row.jmltransreferensi
        };
      }

      var jenis = $('#JENISTRANSAKSI').combobox('getValue');

      if (jenis != 'PENJUALANSO') {
        if (data.sisatransreferensi < 0) {
          data.jmlbbk = row.jmltransreferensi - row.terpenuhitransreferensi;
          data.sisatransreferensi = 0;
          $.messager.show({
            title: 'Warning',
            msg: 'Barang Yang Diinput Tidak Boleh Melebihi Sisa',
            timeout: {{ session('TIMEOUT') }},
          });
        }
      }

      if (jenis == 'PENJUALANSO' || jenis == 'PENJUALANDO') {

        var idcustomer = $("#IDREFERENSI").combogrid('getValue');
        var kodemerk = row.kodemerk;
        var idbarang = row.uuidbarang;

        var discpersenmaster = 0;
        var errorMsg = '';

        if (idcustomer != "" && idbarang != "" && kodemerk != "" && idcustomer != null && idbarang != null && kodemerk !=
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
                disc = Math.round(discpersen[i] * harga / 100);
                totaldisc += disc;
                harga -= disc;
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
      } else {
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
              disc = +((discpersen[i] * harga / 100).toFixed({{ session('DECIMALDIGITAMOUNT') }}));
              totaldisc += disc;
              harga -= disc;
              discDescription += discpersen[i] + "+";
            }
          }
          discDescription = discDescription.slice(0, -1);
          data.disc = totaldisc;
        } else {
          harga -= row.disc;
        }
      }

      if (row.discpersen != 0) {
        data.discpersen = discDescription == "" || discDescription == null ? olddiskonpersen : discDescription;
      }


      data.subtotal = parseFloat((harga * data.jmlbbk).toFixed({{ session('DECIMALDIGITAMOUNT') }}));


      var nilaikurs = parseFloat(row.nilaikurs);
      @if (session('MULTICURRENCY') != '1')
        nilaikurs = 1;
      @endif
      data.hargakurs = parseFloat(row.harga) * nilaikurs;
      data.disckurs = totaldisc <= 0 ? row.disc : totaldisc * nilaikurs;
      data.subtotalkurs = parseFloat((data.subtotal * nilaikurs).toFixed(
        {{ session('DECIMALDIGITAMOUNT') }}));

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
        if (row.pakaippn != "TIDAK" && row.uuidbarang > 0) {
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

      data.pph22persen = row.pph22persen;
      if (!data.pph22persen) data.pph22persen = 0;
      data.pph22rp = Math.floor(data.pph22persen * data.dpp / 100);
      data.pph22rp = +(data.pph22rp.toFixed({{ session('DECIMALDIGITAMOUNT') }}));
      data.dpp = +(data.dpp.toFixed({{ session('DECIMALDIGITAMOUNT') }}));

      dg.datagrid('updateRow', {
        index: index,
        row: data
      });

      // cek jika ada barang yang sama
      var rows = dg.datagrid('getRows');
      for (var i = 0; i < rows.length; i++) {
        if (index != i && (rows[i].kodebarang != "" && row.kodebarang == rows[i].kodebarang) && (rows[i]
            .kodetransreferensi != "" && row.kodetransreferensi == rows[i].kodetransreferensi)) {
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

    function hitung_grandtotal() {
      var data = $("#table_data_detail").datagrid('getRows');
      var total = 0;
      var grandtotal = 0;
      var total2 = 0;
      var ppnrp = 0;
      var pph22rp = 0;
      var cekselisih = 0;
      var pembulatan = parseFloat($("#PEMBULATAN").numberbox('getValue')) ? parseFloat($("#PEMBULATAN").numberbox(
        'getValue')) : 0;
      var biaya = 0;

      var footer = {
        jmlpo: 0,
        akumulasipo: 0,
        sisapo: 0,
        jmlbbk: 0,
        sisabbk: 0,
        disc: 0,
        disckurs: 0,
        subtotal: 0,
        subtotalkurs: 0,
        ppnrp: 0,
        pph22rp: 0,
        dpp: 0
      }

      var dpp = 0;
      var barangtidakkenapajak = 0;
      var barangkenapajak = 0;
      for (var i = 0; i < data.length; i++) {
        if (data[i].pakaippn == 'EXCL') {
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

        footer.jmlpo += parseFloat(data[i].jmlpo);
        footer.akumulasipo += parseFloat(data[i].akumulasipo);
        footer.sisapo += parseFloat(data[i].sisapo);
        footer.jmlbbk += parseFloat(data[i].jmlbbk);
        footer.sisabbk += parseFloat(data[i].sisabbk);
        footer.disc += parseFloat(data[i].disc);
        footer.disckurs += parseFloat(data[i].disckurs);
        footer.subtotal += parseFloat(data[i].subtotal);
        footer.subtotalkurs += parseFloat(data[i].subtotalkurs);
        footer.ppnrp += parseFloat(data[i].ppnrp);
        footer.pph22rp += parseFloat(data[i].pph22rp);
        footer.dpp += parseFloat(data[i].dpp);
      }

      total2 = +((total2).toFixed({{ session('DECIMALDIGITAMOUNT') }}));
      grandtotal = parseFloat(total2 - footer.pph22rp + biaya + pembulatan);

      $("#TOTAL").numberbox('setValue', total);
      $('#BARANGKENAPAJAK').numberbox('setValue', barangkenapajak);
      $('#BARANGTIDAKKENAPAJAK').numberbox('setValue', barangtidakkenapajak);
      $('#txt_DPP').numberbox('setValue', dpp);
      $("#PPNRP").numberbox('setValue', footer.ppnrp);
      $("#PPH22RP").numberbox('setValue', footer.pph22rp);
      $("#GRANDTOTAL").numberbox('setValue', grandtotal);

      $('#table_data_detail').datagrid('reloadFooter', [footer]);
    }

    function clear_plugin() {
      olddiskonpersen = 0.00;
      olddiskonrp = 0.00;
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
    }

    function scan_barcode() {
      var barcode = $('#scanbarcode').textbox('getValue');

      if (barcode == '') {
        return false;
      }

      var rows = $('#table_data_detail_barcode').datagrid('getRows');

      for (var i in rows) {
        if (rows[i].barcode == barcode) {
          $.messager.alert('Perhatian', 'Barcode tersebut sudah ditambahkan', 'error');

          return false;
        }
      }

      $.ajax({
        // url: 'base_url('asiaelectrindo/Produksi/Transaksi/PembuatanBarcode/cekBarcodePengeluaranBarang') ?>',
        type: 'POST',
        data: {
          barcode: barcode,
          tgltrans: $('#TGLTRANS').datebox('getValue'),
          idlokasi: $('#IDLOKASI').combogrid('getValue')
        },
        beforeSend: function() {
          $.messager.progress();
        },
        success: function(response) {
          $.messager.progress('close');

          if (response.success) {
            // mengecek pada table detail yang idbarangnya sama dengan idbarang pada barcode
            var detail_rows = $('#table_data_detail').datagrid('getRows');

            var index = 0;

            for (var i = 0; i < detail_rows.length; i++) {
              index = i;

              if (detail_rows[i].uuidbarang == response.data.uuidbarang) {
                break;
              } else {
                index = -1;
              }
            }

            if (index == -1) {
              $.messager.alert('Warning', 'Tidak ada barang yang merujuk ke barcode ' + barcode, 'error');
            } else {
              $('#table_data_detail_barcode').datagrid('appendRow', response.data);

              $('#table_data_detail_barcode').datagrid('checkRow', $('#table_data_detail_barcode').datagrid(
                'getRows').length - 1);

              $('#scanbarcode').textbox('clear');
            }
          } else {
            $.messager.alert('Perhatian', response.errorMsg, 'error');
          }
        }
      });
    }

    function cek_jumlah_dan_barcode() {
      var detail_rows = $('#table_data_detail').datagrid('getRows');
      var barcode_detail_rows = $('#table_data_detail_barcode').datagrid('getChecked');

      for (var i = 0; i < detail_rows.length; i++) {
        var row = detail_rows[i];

        if (row.scanbarcodebbk == 1) {
          // mendapatkan jumlah barcode yang menagcu ke idbarang tertentu
          var jumlah_barcode = barcode_detail_rows.filter(function(item) {
            return item.uuidbarang == row.uuidbarang;
          }).length;

          // jika jumlah barcode tidak sesuai dengan jumlah barang yang akan dikeluarkan
          if (parseFloat(row.jmlbbk) + parseFloat(row.jmlbonus) != jumlah_barcode) {
            $.messager.alert('Peringatan', 'Jumlah QR Code untuk barang ' + row.kodebarang + ' tidak sama', 'warning');

            return false;
          }
        }
      }

      return true;
    }

    function get_harga_barang(idbarang, jumlah) {
      var idreferensi = $("#IDREFERENSI").combogrid('getValue');
      var tgltrans = $("#TGLTRANS").datebox('getValue');
      var jenis = $('#JENISTRANSAKSI').combobox('getValue');
      var idlokasi = $('#IDLOKASI').combogrid('getValue');
      var harga = {};

      if (idreferensi == '') {
        return harga;
      } else {
        var data = {
          idbarang: idbarang,
          tgltrans: tgltrans,
          idlokasi: idlokasi,
          jumlah: jumlah
        };

        if (['PENJUALANSO', 'PENJUALANDO'].indexOf(jenis) != -1) {
          data.uuidcustomer = idreferensi;
        } else if (['RETUR'].indexOf(jenis) != -1) {
          data.uuidsupp = idreferensi;
        }

        $.ajax({
          dataType: "json",
          type: 'POST',
          async: false,
          url: base_url + "atena/Master/Data/Barang/hargaBarang",
          data: data,
          cache: false,
          success: function(msg) {
            harga = msg;
          }
        });
      }
      return harga;
    }

    function hitung_stok() {
      var rows = $('#table_data_detail').datagrid('getRows');

      if (rows.length == 0) {
        return false;
      }

      if ($('#IDLOKASI').combogrid('getValue') == '') {
        return false;
      }

      $.ajax({
        url: base_url + 'atena/Master/Data/Barang/hitungStokTransaksi',
        type: 'POST',
        data: {
          idlokasi: $('#IDLOKASI').combogrid('getValue'),
          tgltrans: $('#TGLTRANS').datebox('getValue'),
          data_detail: JSON.stringify(rows)
        },
        dataType: 'JSON',
        beforeSend: function() {
          $.messager.progress();
        },
        success: function(response) {
          for (var i = 0; i < response.detail.length; i++) {
            $('#table_data_detail').datagrid('updateRow', {
              index: i,
              row: {
                jmlstok: response.detail[i].jmlstok
              }
            });
          }

          $.messager.progress('close');
        }
      });
    }

    function cekValidUangMuka(index, row) {
      var daftar_idtransreferensi = [];

      $('#table_data_detail').datagrid('getRows').map(function(item) {
        daftar_idtransreferensi.push(item.uuidtransreferensi);
      });

      $.ajax({
        url: base_url + 'atena/Inventori/Transaksi/BarangKeluar/cekValidUangMuka',
        type: 'POST',
        dataType: 'JSON',
        data: {
          daftar_idtransreferensi: daftar_idtransreferensi,
        },
        success: function(response) {
          if (response.success) {
            hitung_subtotal_detail(index, row);
            hitung_grandtotal();
          } else {
            $.messager.alert('Peringatan', response.errorMsg, 'warning');

            $('#table_data_detail').datagrid('deleteRow', index);
          }
        }
      });
    }

    function insert_barang(barcodesatuan1) {
      var barcodesatuan1string = barcodesatuan1;
      var barcodesatuan1qty = 1;

      if (barcodesatuan1.includes('*')) {
        var barcodesatuan1split = barcodesatuan1.split('*');
        barcodesatuan1qty = parseInt(barcodesatuan1split[0]);
        barcodesatuan1string = barcodesatuan1split[1];
      }

      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: base_url + "atena/Master/Data/Barang/loadDataBarangBarcode",
        data: {
          barcode: barcodesatuan1string,
        },
        cache: false,
        beforeSend: function() {
          $.messager.progress();
        },
        success: function(msg) {
          $.messager.progress('close');

          if (msg == null) {
            $.messager.alert('Peringatan', 'Tidak ada barang sesuai barcode', 'warning');

            return false;
          }

          var rows_detail = $('#table_data_detail').datagrid('getRows');

          var flag = false;

          for (var i = 0; i < rows_detail.length; i++) {
            if (rows_detail[i].uuidbarang == msg.rows.id && rows_detail[i].satuan == msg.rows.satuan) {
              flag = true;

              $('#table_data_detail').datagrid('updateRow', {
                index: i,
                row: {
                  jmlbbk: rows_detail[i].jmlbbk + 1,
                  sisatransreferensi: rows_detail[i].sisatransreferensi - 1
                }
              });

              hitung_subtotal_detail(i, $('#table_data_detail').datagrid('getRows')[i]);

              hitung_grandtotal();

              break;
            }
          }

          if (!flag) {
            $.messager.alert('Peringatan', 'Tidak ada barang pada detail transaksi sesuai barcode', 'warning');
          }
        }
      });
    }
  </script>
@endpush
