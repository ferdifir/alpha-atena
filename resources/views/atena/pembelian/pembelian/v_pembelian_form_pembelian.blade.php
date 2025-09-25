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
              <input type="hidden" id="TGLENTRY" name="tglentry">
              <table>
                <tr>
                  <td valign="top">
                    <fieldset style="height:170px;">
                      <legend id="label_laporan">Info Transaksi</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form">No. Beli</td>
                          <td id="label_form"><input name="kodebeli" id="KODEBELI" class="label_input"
                              style="width:190px" prompt="Auto Generate" readonly></td>
                          <input type="hidden" id="IDBELI" name="uuidbeli">
                        </tr>
                        <tr>
                          <td id="label_form">Lokasi</td>
                          <td id="label_form"><input name="uuidlokasi" id="IDLOKASI" style="width:190px"></td>
                          <input type="hidden" id="KODELOKASI" name="kodelokasi">
                        </tr>
                        <tr>
                          <td id="label_form" valign="top">Jenis Transaksi</td>
                          <td id="label_form" style="display: flex">
                            <input type="radio" style="margin: 0" name="jenistransaksi" id="jenistransaksi_beli"
                              value="BELI" checked>
                            <label for="jenistransaksi_beli" style="margin-left :4px;margin-right :4px ">Beli</label><br>
                            <input type="radio" style="margin: 0" name="jenistransaksi"
                              id="jenistransaksi_beli_langsung" value="BELI LANGSUNG">
                            <label for="jenistransaksi_beli_langsung" style="margin-left :4px;margin-right :4px ">Beli
                              Langsung</label>
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Tgl. Trans
                          <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date" style="width:190px">
                          </td>
                        </tr>
                        <tr id="KOLOMBBM">
                          <td id="label_form" id="NOBBM">No. Penerimaan</td>
                          <td id="label_form"><input name="uuidbbm" id="IDBBM" style="width:190px"></td>
                          <input type="hidden" id="KODEBBM" name="kodebbm">
                        </tr>
                        <tr>
                          <td id="label_form">No. Invoice Supp.</td>
                          <td id="label_form"><input name="noinvoicesupplier" id="NOINVOICESUPPLIER" class="label_input"
                              style="width:190px" required></td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td align="left" valign="top">
                    <div id="tab_trans" class="easyui-tabs" style="width:380px;height:170px;">
                      <div title="Info Supplier">
                        <table border="0">
                          <tr>
                            <td id="label_form">Kode</td>
                            <td>
                              <input name="kodesupplier" class="label_input" id="KODESUPPLIER" style="width:100px"
                                prompt="Kode Supplier">
                              <input type="hidden" id="IDSUPPLIER" name="uuidsupplier">
                              <input name="namasupplier" class="label_input" id="NAMASUPPLIER" style="width:210px"
                                readonly prompt="Nama Supplier">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form">Alamat</td>
                            <td colspan="3">
                              <input name="alamat" class="label_input" id="ALAMAT" style="width:313px" readonly
                                prompt="Alamat Supplier">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form">Telp</td>
                            <td colspan="3">
                              <input name="telp" class="label_input" id="TELP" style="width:313px" readonly
                                prompt="Telp Supplier">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form">CP.</td>
                            <td>
                              <input name="contactperson" class="label_input" id="CONTACTPERSON" style="width:200px"
                                readonly prompt="Contact Person">
                              <input name="telpcp" class="label_input" id="TELPCP" style="width:110px" readonly
                                prompt="Telp CP">
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div title="Info Pembayaran">
                        <table border="0">
                          <tr>
                            <td id="label_form">No. Rek</td>
                            <td colspan="3">
                              <input name="norekening" class="label_input" id="NOREKENING" style="width:285px"
                                readonly prompt="No. Rekening Supplier">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form">Syarat Bayar</td>
                            <td id="label_form" colspan="3">
                              <input name="uuidsyaratbayar" id="IDSYARATBAYAR" class="label_input"
                                style="width:182px">
                              <input name="tgljatuhtempo" id="TGLJATUHTEMPO" readonly class="date"
                                style="width:100px">
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div title="Info Pengiriman">
                        <table border="0">
                          <tr>
                            <td id="label_form">Kode</td>
                            <td>
                              <input id="IDSUPPLIERKIRIM" name="uuidsupplierkirim" style="width: 100px;">
                              <input name="namasupplierkirim" class="label_input" id="NAMASUPPLIERKIRIM"
                                style="width:210px" readonly prompt="Nama Supplier">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form">Alamat</td>
                            <td colspan="3">
                              <input name="alamatsupplierkirim" class="label_input" id="ALAMATSUPPLIERKIRIM"
                                style="width:313px" readonly prompt="Alamat Supplier">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form">Telp</td>
                            <td colspan="3">
                              <input name="telpsupplierkirim" class="label_input" id="TELPSUPPLIERKIRIM"
                                style="width:313px" readonly prompt="Telp Supplier">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form">CP.</td>
                            <td>
                              <input name="contactpersonsupplierkirim" class="label_input"
                                id="CONTACTPERSONSUPPLIERKIRIM" style="width:200px" readonly prompt="Contact Person">
                              <input name="telpcpsupplierkirim" class="label_input" id="TELPCP" style="width:110px"
                                readonly prompt="Telp CP">
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div title="Surat Jalan">
                        <table border="0">
                          <tr>
                            <td id="label_form">No. Surat Jalan</td>
                            <td id="label_form"><input name="nosuratjalan" id="NOSURATJALAN" class="label_input"
                                style="width:270px" readonly></td>
                          </tr>
                          <tr>
                            <td id="label_form">No. Kendaraan</td>
                            <td id="label_form"><input name="nopol" id="NOPOL" class="label_input"
                                style="width:270px" readonly></td>
                          </tr>
                          <tr>
                            <td id="label_form">Nama Sopir</td>
                            <td id="label_form"><input name="namasopir" id="NAMASOPIR" class="label_input"
                                style="width:270px" readonly></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </td>
                  <td id="label_form" valign="bottom">
                    <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                      style="width:250px; height:95px" data-options="validType:'length[0, 500]'"></textarea>
                  </td>
                </tr>
              </table>
            </div>
            <div data-options="region:'center',border:false">
              <div class="easyui-tabs" plain='true' fit="true">
                <div title="Detail Transaksi">
                  <table id="table_data_detail" fit="true"></table>
                </div>
              </div>
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:75px;">
              <table id="trans_footer" width="100%">
                <tr>
                  <td colspan="2" align='right' id="KOLOM_TOTAL">
                    <table>
                      <tr hidden>
                        <td id="label_form" align="right">
                          Total <input name="total" id="TOTAL" class="number " style="width:110px;" readonly
                            required="true">
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
                        <td id="label_form" align="right">
                          PPN <input name="ppnrp" id="PPNRP" class="number" style="width:110px;" readonly>
                        </td>
                        <td id="label_form" align="right">
                          PPH 22 <input name="pph22rp" id="PPH22RP" class="number" style="width:110px;" readonly>
                        </td>
                        <td id="label_form" align="right">
                          Pembulatan <input name="pembulatan" id="PEMBULATAN" class="number" style="width:110px;">
                        </td>
                        <td id="label_form" align="right">
                          Biaya Kirim
                          <input name="biayakirim" id="BIAYAKIRIM" class="number" style="width:110px;">
                        </td>
                        <td id="label_form" align="right">
                          Perhitungan Biaya Kirim
                          <select id="PERHITUNGANBIAYAKIRIM" name="perhitunganbiayakirim" class="easyui-combobox"
                            style="width: 150px;">
                            <option value="4">DIATUR MANUAL</option>
                            <option value="2">DIBEBANKAN KE HPP BARANG BERDASARKAN JUMLAH</option>
                            <option value="3">DIBEBANKAN KE HPP BARANG BERDASARKAN SUBTOTAL</option>
                            <option value="1">SEBAGAI BIAYA</option>
                          </select>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input
                      :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl.
                      Input :</label> <label id="lbl_tanggal"></label></td>
                  <td align='right' id="GRAND_TOTAL_TABLE">
                    <table>
                      <tr>
                        <td id="label_form" align="right">
                          Uang Muka <input name="uangmuka" id="UANGMUKA" class="number " style="width:110px;"
                            readonly>
                        </td>
                        <td id="label_form" align="right">
                          Grand Total <input name="grandtotal" id="GRANDTOTAL" class="number" style="width:110px;"
                            readonly>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <input type="hidden" id="data_detail" name="data_detail">
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

        <a title="Simpan" class="easyui-linkbutton button_add" id='simpan_saja' onclick="simpan('simpan')"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan</a><br><br>
        <a title="Simpan & Cetak" class="easyui-linkbutton button_add_print" id='simpan_cetak'
          onclick="simpan(this.id)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan & Cetak</a>

        <div>
    </center>
  </div>

  <div id="form_cetak" title="Preview" style="width:680px; height:450px">
    <div id="area_cetak"></div>
  </div>
@endsection

@push('js')
  <script>
    var row = {};
    var uuidRef = "";
    var transreferensi = null;
    var cekbtnsimpan = true;
    var defaultpakaippn = "{{ session('DEFAULTPAKAIPPN') }}";
    var cekbarangnonstok = false;
    var ppnpersenaktif = 0;
    var transaksiBBM = "HEADER";
    var config = {};
    var idTrans = "";
    var urlbbm = "";
    var inputHarga = false;
    var lihatHarga = false;
    var urlBBM = link_api.browseBeliBuktiPenerimaanBarang;
    var indexCellEdit = -1;

    // menyimpan nilai uang muka sebelum disesuaikan dengan grandtotal
    var uangmuka = 0;

    $(document).ready(async function() {
      var check = false;
      var check2 = false;
      var promises = [
        getConfig('KODEBELI', 'TBELI', 'bearer {{ session('TOKEN') }}',
          function(response) {
            if (response.success) {
              config = response.data;
              check = true;
            } else {
              if ((response.message ?? "").toLowerCase() == "token tidak valid.") {
                window.alert("Login session sudah habis. Silahkan Login Kembali");
              } else {
                $.messager.alert('Error', error, 'error');
              }
            }
          },
          function(error) {
            $.messager.alert('Error', "Request Config Error", 'error');
          }),
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          var UT = data.data.cetak;
          lihatHarga = data.data.lihatharga == 1;
          inputHarga = data.data.inputharga == 1;
          check2 = true;
          if (UT == 1) {
            $('#simpan_cetak').css('filter', '');
          } else {
            $('#simpan_cetak').css('filter', 'grayscale(100%)');
            $('#simpan_cetak').removeAttr('onclick');
          }

        }, false),
      ];
      await Promise.all(promises);
      if (!check || !check2) return;

      if (transaksiBBM == "HEADER") {
        $("#KOLOMBBM").show();
      } else {
        $("#KOLOMBBM").hide();
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
            export_excel('Faktur Pembelian', $("#area_cetak").html());
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

      // get_status_trans("atena/Pembelian/Transaksi/Pembelian", row.idbeli, function(data) {
      //   $(".form_status").html(status_transaksi(data.status));
      // });

      browse_data_syaratbayar('#IDSYARATBAYAR');
      browse_data_supplierkirim('#IDSUPPLIERKIRIM');
      browse_data_lokasi('#IDLOKASI');
      browse_data_bbm('#IDBBM');
      browse_data_supplier("#KODESUPPLIER");

      $("#TGLTRANS").datebox({
        onChange: function(newVal, oldVal) {
          set_ppn_aktif(newVal, 'Bearer {{ session('TOKEN') }}', function(response) {
            ppnpersenaktif = response.ppnpersen;

            update_ppn_table_detail($('#table_data_detail'), ppnpersenaktif, function(index, row) {
              hitung_subtotal_detail(index, row);
            });

            hitung_grandtotal();
          });
        }
      });

      $("[name=pakaippn]").change(function() {
        $("#PPNPERSEN").numberbox('setValue', $(this).val() == 0 ? 0 : ppnpersenaktif);
        hitung_grandtotal();
      });

      $("[name=pakaipph]").change(function() {
        $("#PPHPERSEN").numberbox('setValue', $(this).val() == 0 ? 0 : {{ session('PPH22') }});
        hitung_grandtotal();
      });

      $('#PEMBULATAN').numberbox({
        onChange: function() {
          hitung_grandtotal();
        }
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

      $('#PERHITUNGANBIAYAKIRIM').combobox({
        onChange: function(newValue, oldValue) {
          hitung_biayakirim_detail();
          hitung_grandtotal();
        }
      });

      $('#BIAYAKIRIM').numberbox({
        onChange: function(newValue, oldValue) {
          hitung_biayakirim_detail();
          hitung_grandtotal();
        }
      })

      buat_table_detail();
      @if ($mode == 'tambah')
        @if ($data != '')
          uuidRef = "{{ $data }}";
        @endif
        await tambah();
      @elseif ($mode == 'ubah')
        await ubah();
      @endif


      if (lihatHarga) {
        $("#KOLOM_TOTAL").show();
        $("#GRAND_TOTAL_TABLE").show();
      } else {
        $("#KOLOM_TOTAL").hide();
        $("#GRAND_TOTAL_TABLE").hide();
      }

      if (!inputHarga) {
        $('#DISKON').prop('readonly', true);
        $('#DISKONRP').prop('readonly', true);
        $('#PEMBULATAN').prop('readonly', true);
        $('#BIAYAKIRIM').prop('readonly', true);
      }

      // Menghapus loading ketika halaman sudah dimuat
      tutupLoader();

    })

    shortcut.add('F8', function() {
      simpan();
    });

    $('[name=jenistransaksi]').change(function() {
      ubahJenis();
    });

    function ubahJenis() {
      var val = $('[name=jenistransaksi]:checked').val();
      var mode = $('#mode').val();

      if (val == 'BELI LANGSUNG') {
        $('#TGLTRANS').datebox('readonly', false);
        $("#IDLOKASI").combogrid({
          required: true,
          readonly: false,
        });
        $("#IDBBM").combogrid({
          required: false,
          readonly: true,
        });
        $("#IDBBM").combogrid('clear');
        $('#KODESUPPLIER').combogrid({
          required: true,
          readonly: false
        });

        $('#tab_trans').tabs('select', 0);
      } else if (val == 'BELI') {
        $('#TGLTRANS').datebox('readonly', true);
        $("#IDLOKASI").combogrid({
          required: false,
          readonly: true,
        });
        $("#IDBBM").combogrid({
          required: true,
          readonly: false,
        });
        $('#KODESUPPLIER').combogrid({
          required: false,
          readonly: true
        });
      }
    }



    async function get_header_ref() {
      try {
        let url = link_api.loadDataHeaderBuktiPenerimaanBarang;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidbbm: '{{ $data }}',
            mode: "ubah",
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })
        if (response.success) {
          transreferensi = response.data;
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
      }
    }

    function before_simpan() {
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        var UT = data.data.tambah;
        if (UT == 1) {
          $.messager.confirm('Confirm', 'Anda Yakin Akan Approve Transaksi Pembelian?', function(r) {
            if (r) {
              simpan();
            }
          });
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function tutup() {
      parent.tutupTab();
    }

    async function cetak(uuidtrans) {
      try {
        $("#window_button_cetak").window('close');
        let url = link_api.cetakPembelian + uuidtrans;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidtrans: uuidtrans,
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(
              `HTTP error! status: ${response.status} from ${url}`
            );
          }
          return response.text();
        })
        $("#area_cetak").html(response);
        $("#form_cetak").window('open');
      } catch (error) {
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
      }
    }

    async function tambah() {
      $('#mode').val('tambah');
      $('#jenistransaksi_beli').prop('checked', true);

      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#JENISTRANSAKSI').combobox('setValue', 'PEMBELIAN');
      $('#IDBBM').combogrid('readonly', false);
      $('#IDLOKASI').combogrid('readonly');
      // $('#KODESUPPLIER').textbox('readonly');
      $('#TGLTRANS').datebox('readonly');
      idtrans = "";
      urlbbm = 'atena/Inventori/Transaksi/BarangMasuk/comboGrid';

      @if ($data == '')
        try {
          let url = link_api.getLokasiDefault;
          const response = await fetch(url, {
            method: 'POST',
            headers: {
              'Authorization': 'bearer {{ session('TOKEN') }}',
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(),
          }).then(response => {
            if (!response.ok) {
              throw new Error(`HTTP error! status: ${response.status} from ${url}`);
            }
            return response.json();
          })
          if (response.success) {
            var dataLokasi = response.data ?? {};
            if (!Array.isArray(dataLokasi))
              if ((dataLokasi.uuidlokasi ?? "") != "" && (dataLokasi.lokasidefault ?? 1) == 1) {
                $('#IDLOKASI').combogrid('setValue', dataLokasi.uuidlokasi);
                $("#KODELOKASI").val(dataLokasi.kodelokasi);
              }
          } else {
            $.messager.alert('Error', response.message, 'error');
          }
        } catch (error) {
          var textError = getTextError(error);
          $.messager.alert('Error', getTextError(error), 'error');
        }
      @else
        await get_header_ref();
      @endif

      clear_plugin();
      reset_detail();
      ubahJenis();

      $('#PERHITUNGANBIAYAKIRIM').combobox('setValue', 4);

      await fill_form_transreferensi();
    }

    async function fill_form_transreferensi() {
      // jika memuat data SO dari grid antrian,
      // maka tampilkan data SO
      if (transreferensi != null) {
        if (transaksiBBM == "HEADER") {

          $('#IDBBM').combogrid('grid').datagrid('loadData', [{
            idbbm: transreferensi.uuidbbm,
            kodebbm: transreferensi.kodebbm,
            namalokasi: transreferensi.namalokasi,
            tgltrans: transreferensi.tgltrans,
            username: transreferensi.userbuat,
          }]);

          $('#IDBBM').combogrid('setValue', transreferensi.uuidbbm);

          $('#KODEBBM').val(transreferensi.kodebbm);

          $('#IDSUPPLIER').val(transreferensi.uuidreferensi);
          $('#KODESUPPLIER').textbox('setValue', transreferensi.kodereferensi);
          $('#NAMASUPPLIER').textbox('setValue', transreferensi.namareferensi);
          $('#ALAMAT').textbox('setValue', transreferensi.alamatreferensi);
          $('#TELP').textbox('setValue', transreferensi.telpreferensi);
          $('#NOREKENING').textbox('setValue', transreferensi.norekening);
          $('#CONTACTPERSON').textbox('setValue', transreferensi.contactperson);
          $('#TELPCP').textbox('setValue', transreferensi.telpcp);
          $('#TGLTRANS').datebox('setValue', transreferensi.tgltrans);
          $('#NOSURATJALAN').textbox('setValue', transreferensi.nosuratjalan);
          $('#NOPOL').textbox('setValue', transreferensi.nopol);
          $('#NAMASOPIR').textbox('setValue', transreferensi.namasopir);
          $('#IDSYARATBAYAR').combogrid('setValue', transreferensi.uuidsyaratbayar);


          get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), transreferensi.selisih);


          if (row.catatan && row.catatan != null) {
            $("#CATATAN").textbox('setValue', transreferensi.catatan);
          }

        }

        $('#IDLOKASI').combogrid('setValue', transreferensi.uuidlokasi);

        $('#KODELOKASI').val(transreferensi.kodelokasi);
        var promises = [
          getUangMukaPO(transreferensi.uuidbbm),
          load_detail(transreferensi.uuidbbm),
        ];

        if (transreferensi.uuidsyaratbayar != null) {
          promises.push(getHeaderSyaratBayar(transreferensi.uuidsyaratbayar));
        }
        await Promise.all(promises);
        ubahJenis();
      }
    }

    async function getUangMukaPO(uuidbbm) {
      try {
        let url = link_api.loadDataUangMukaPOBuktiPenerimaanBarang;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidbbm: uuidbbm,
            mode: "ubah",
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })
        if (response.success) {
          var data = response.data;

          uangmuka = data.uangmuka;

          $('#UANGMUKA').numberbox('setValue', data.uangmuka);
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        $.messager.alert("error", getTextError(error), "error");
      }
    }

    async function getHeaderSyaratBayar(uuidSyaratBayar) {
      try {
        let url = link_api.getHeaderSyaratBayar;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidsyaratbayar: transreferensi.uuidsyaratbayar,
            mode: "ubah",
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })
        if (response.success) {
          var data = response.data;
          get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), data.selisih);
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        $.messager.alert("error", getTextError(error), "error");
      }
    }

    async function ubah() {
      $("#jenistransaksi").val("BELI");
      $(':radio:not(:checked)').attr('disabled', false);
      $('#mode').val('ubah');
      try {
        let url = link_api.loadDataHeaderPembelian;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidbeli: '{{ $data }}',
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
          console.log(row);
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        $.messager.alert("error", getTextError(error), "error");
      }
      if (row) {
        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {
          $('#jenistransaksi_beli').attr('disabled', true);
          $('#jenistransaksi_beli_langsung').attr('disabled', true);
          UT = data.data.ubah;
          var statusTrans = await getStatusTrans(link_api.getStatusTransPembelian,
            'bearer {{ session('TOKEN') }}', {
              uuidbeli: '{{ $data }}'
            });
          $(".form_status").html(status_transaksi(statusTrans));
          if (UT == 1 && statusTrans == 'I') {
            $('#btn_simpan_modal').css('filter', '');
            $('#mode').val('ubah');
          } else {
            document.getElementById('btn_simpan_modal').onclick = '';
            $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
            $('#btn_simpan_modal').removeAttr('onclick');
          }

          $("#form_input").form('load', row);

          $('#IDLOKASI').combogrid('readonly');
          $('#KODESUPPLIER').textbox('readonly');
          $('#IDBBM').combogrid('readonly');
          $('#TGLTRANS').datebox('readonly', false);

          //ubah url bbm sesuai dengan jenis transaksi
          var url = link_api.browseBuktiPenerimaanBarang;
          urlbbm = url;

          ubah_url_combogrid($("#IDBBM"), url, true);
          $("#IDBBM").combogrid("grid").datagrid("options").url = url;
          $("#IDBBM").combogrid("clear");
          $("#IDBBM").combogrid("grid").datagrid("load", {
            q: "",
            uuidlokasi: row.uuidlokasi,
            uuidsupplier: row.uuidsupplier,
          });

          $('#IDBBM').combogrid('setValue', {
            uuidbbm: row.uuidbbm,
            kodebbm: row.kodebbm
          });

          if (row.jenistransaksi == "BELI LANGSUNG") {
            $('#jenistransaksi_beli_langsung').prop('checked', true);
          } else {
            $('#jenistransaksi_beli').prop('checked', true);
          }
          $('[name=jenistransaksi]:checked').val(row.jenistransaksi);

          ubahJenis();

          $('#KODESUPPLIER').combogrid('setValue', row.kodesupplier);
          $('#KODESUPPLIER').combogrid('readonly', true);
          $('#IDLOKASI').combogrid('readonly', true);
          $('#NAMASUPPLIER').textbox('setValue', row.namasupplier);
          $('#ALAMAT').textbox('setValue', row.alamatsupplier);
          $('#TELP').textbox('setValue', row.telpsupplier);
          $('#NOREKENING').textbox('setValue', row.norekening);
          $('#CONTACTPERSON').textbox('setValue', row.contactperson);
          $('#TELPCP').textbox('setValue', row.telpcp);
          $('#TGLTRANS').datebox('setValue', row.tgltrans);
          $('#IDLOKASI').combogrid('setValue', {
            uuidlokasi: row.uuidlokasi,
            kodelokasi: row.kodelokasi
          });

          $('#IDSUPPLIERKIRIM').combogrid('setValue', {
            uuidsupplier: row.uuidsupplierkirim,
            kode: row.kodesupplierkirim
          });

          uangmuka = row.uangmuka;

          idtrans = row.uuidbbm;
          load_data('{{ $data }}');

        });
      }
    }

    async function simpan(jenis_simpan) {
      // $(':radio:not(:checked)').attr('disabled', false);
      var mode = $("#mode").val();

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

      // mengecek biaya kirim
      var rows = $('#table_data_detail').datagrid('getRows');
      var biayakirim = parseFloat($('#BIAYAKIRIM').numberbox('getValue'));
      var totalbiayakirim = 0;
      var perhitunganbiayakirim = $('#PERHITUNGANBIAYAKIRIM').combobox('getValue');

      if (perhitunganbiayakirim != 1) {
        for (var i = 0; i < rows.length; i++) {
          totalbiayakirim += parseFloat(rows[i].biayakirim);
        }
        var val = $('[name=jenistransaksi]:checked').val();
        if (biayakirim != totalbiayakirim && val == 'BELI LANGSUNG') {
          $.messager.alert('Peringatan', 'Total Biaya Kirim Pada Detail Transaksi Tidak Sesuai', 'warning');

          return false;
        }
      }

      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      $('#window_button_simpan').window('close');

      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }
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
            if (n['name'] == "data_detail") {
              var datadetail = $('#table_data_detail').datagrid('getRows');
              // var sendDetail = [];
              // for (var i = 0; i < datadetail.length; i++) {
              //   sendDetail.push({
              //     uuidbarang: datadetail[i].uuidbarang,
              //     pakaipo: datadetail[i].pakaipo,
              //     jml: datadetail[i].jmlpr,
              //     satuan: datadetail[i].satuan,
              //     catatan: datadetail[i].catatan,
              //   })
              // }
              body[n['name']] = datadetail;
            } else {
              body[n['name']] = n['value'];
            }
          });
          body['jenis_simpan'] = jenis_simpan;
          body['jenistransaksi'] = $('[name=jenistransaksi]:checked').val();
          // Cek apakah body adalah instance dari FormData
          if (body instanceof FormData) {
            // Jika FormData, jangan set 'Content-Type'. Browser akan melakukannya secara otomatis.
            requestBody = body;
          } else {
            // Default: Jika bukan FormData, asumsikan itu JSON.
            headers['Content-Type'] = 'application/json';
            requestBody = body ? JSON.stringify(body) : null;
          }
          let url = link_api.simpanPembelian;
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
            uangmuka = 0;

            $.messager.show({
              title: 'Info',
              msg: 'Transaksi Sukses',
              showType: 'show'
            });

            transreferensi = null;

            if (jenis_simpan == 'simpan_cetak') {
              cetak(response.data.uuidbeli);
            }

            if (mode == 'tambah') {
              await tambah();
            } else {
              await ubah()
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

    function reset_detail() {
      $('#table_data_detail').datagrid('loadData', []);
    }

    async function load_data(idtrans) {
      try {
        let url = link_api.loadDataPembelian;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidbeli: idtrans,
            mode: "ubah",
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })
        if (response.success) {
          $('#table_data_detail').datagrid('loadData', response.data ?? []);
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
      }
    }

    async function load_detail(idtrans) {
      try {
        let url = link_api.loadDataDetailBuktiPenerimaanBarang;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidbbm: idtrans,
            mode: "ubah",
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })
        if (response.success) {
          $('#table_data_detail').datagrid('loadData', response.data.detail ?? []);
          var rows = response.data.detail;
          for (var i = 0; i < rows.length; i++) {
            hitung_subtotal_detail(i, rows[i])
          }
          hitung_grandtotal();
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        console.log(error);
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
      }
    }

    /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */

    function browse_data_lokasi(id) {
      $(id).combogrid({
        panelWidth: 400,
        url: link_api.browseLokasi,
        idField: 'uuidlokasi',
        textField: 'nama',
        mode: 'local',
        sortName: 'nama',
        sortOrder: 'asc',
        readonly: true,
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
          //$(id).combogrid('options').onChange.call();
          $("#KODELOKASI").val(row.kode);
        },
        onLoadSuccess: function(data) {
          if (data.total == 1) {
            var rows = data.rows;
            $(this).combogrid('setValue', rows[0].kode).combogrid('readonly');
          }
        },
        onChange: function(newVal, oldVal) {
          /*var row = $(id).combogrid('grid').datagrid('getSelected');
          if (row) {
          	var supp = $("#IDSUPPLIER").combogrid('getValue');
          	    url  = base_url + 'atena/Inventori/Transaksi/BarangMasuk/comboGrid'+ '/' +  row.ID + '/' + supp;
          	
          	ubah_url_combogrid($("#IDBBM"), url, true);
          }
          if ($('#mode').val()!='') {
          	reset_detail();
          }*/
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

    function browse_data_supplier(id) {
      $(id).combogrid({
        panelWidth: 600,
        url: link_api.browseSupplier,
        idField: 'uuidsupplier',
        textField: 'kode',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        required: true,
        columns: [
          [{
              field: 'uuidsupplier',
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
              field: 'norekening',
              title: 'No. Rekening',
              width: 100,
              sortable: true
            },
            {
              field: 'contactperson',
              title: 'Contact Person',
              width: 100,
              sortable: true
            },
            {
              field: 'telpcp',
              title: 'Telp CP',
              width: 100,
              sortable: true
            },
            {
              field: 'uuidsyaratbayar',
              hidden: true
            },
          ]
        ],
        onSelect: function(index, row) {
          $(id).combogrid('options').onChange.call();
        },
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');
          if (row) {
            $('#NAMASUPPLIER').textbox('setValue', row.nama);
            $("#IDSUPPLIER").val(row.uuidsupplier);
            $("#KODESUPPLIER").val(row.kode);
            $('#ALAMAT').textbox('setValue', row.alamat);
            $('#TELP').textbox('setValue', row.telp);
            $('#NOREKENING').textbox('setValue', row.norekening);
            $('#CONTACTPERSON').textbox('setValue', row.contactperson);
            $('#TELPCP').textbox('setValue', row.telpcp);
            $('#IDSYARATBAYAR').combogrid('setValue', row.uuidsyaratbayar);
          } else {
            $('#NAMASUPPLIER').textbox('clear');
          }
          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
      });
    }

    function browse_data_supplierkirim(id) {
      $(id).combogrid({
        panelWidth: 600,
        url: link_api.browseSupplier,
        idField: 'uuidsupplier',
        textField: 'kode',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        columns: [
          [{
              field: 'uuidsupplier',
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
              field: 'norekening',
              title: 'No. Rekening',
              width: 100,
              sortable: true
            },
            {
              field: 'contactperson',
              title: 'Contact Person',
              width: 100,
              sortable: true
            },
            {
              field: 'telpcp',
              title: 'Telp CP',
              width: 100,
              sortable: true
            },
            {
              field: 'uuidsyaratbayar',
              hidden: true
            },
          ]
        ],
        onSelect: function(index, row) {
          $('#NAMASUPPLIERKIRIM').textbox('setValue', row.nama);
          $('#ALAMATSUPPLIERKIRIM').textbox('setValue', row.alamat);
          $('#TELPSUPPLIERKIRIM').textbox('setValue', row.telp);
          $('#CONTACTPERSONSUPPLIERKIRIM').textbox('setValue', row.contactperson);
          $('#TELPCPSUPPLIERKIRIM').textbox('setValue', row.telpcp);
        }
      });
    }

    var namasyaratbayarval, idsyaratbayarval, selisihval = '';

    function browse_data_bbm(id) {
      $(id).combogrid({
        panelWidth: 400,
        idField: 'uuidbbm',
        textField: 'kodebbm',
        mode: 'remote',
        required: true,
        url: urlBBM,
        onBeforeLoad: function(param) {
          if (urlBBM == link_api.browseBuktiPenerimaanBarang) {
            param.uuidlokasi = row.uuidlokasi;
            param.uuidsupplier = row.uuidsupplier;
          }
        },
        columns: [
          [{
              field: 'uuidbbm',
              hidden: true
            },
            {
              field: 'kodebbm',
              title: 'Kode',
              width: 150
            },
            // {field:'KODELOKASI',title:'Kode Lokasi',width:120},
            {
              field: 'namalokasi',
              title: 'Nama Lokasi',
              width: 120
            },
            {
              field: 'tgltrans',
              title: 'Tgl Penerimaan',
              width: 90,
              align: 'center'
            },
            {
              field: 'username',
              title: 'User',
              width: 150
            },
          ]
        ],
        onSelect: async function(index, row) {
          namasyaratbayarval = row.namasyaratbayar;
          idsyaratbayarval = row.uuidsyaratbayar;
          selisihval = row.selisih;

          $("#KODEBBM").val(row.kodebbm);

          //load data supplier
          $('#IDSUPPLIER').val(row.uuidsupplier);
          $('#KODESUPPLIER').textbox('setValue', row.kodesupplier);
          $('#NAMASUPPLIER').textbox('setValue', row.namasupplier);
          $('#ALAMAT').textbox('setValue', row.alamatsupplier);
          $('#TELP').textbox('setValue', row.telpsupplier);
          $('#NOREKENING').textbox('setValue', row.norekening);
          $('#CONTACTPERSON').textbox('setValue', row.contactperson);
          $('#TELPCP').textbox('setValue', row.telpcp);
          //load data supplier
          $('#IDLOKASI').combogrid('setValue', row.uuidlokasi);
          $('#KODELOKASI').val(row.kodelokasi);
          $('#TGLTRANS').datebox('setValue', row.tgltrans);
          $('#NOSURATJALAN').textbox('setValue', row.nosuratjalan);
          $('#NOPOL').textbox('setValue', row.nopol);
          $('#NAMASOPIR').textbox('setValue', row.namasopir);
          $('#IDSYARATBAYAR').combogrid('setValue', row.uuidsyaratbayar);
          get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), row.selisih);
          if (row.catatan && row.catatan != null)
            $("#CATATAN").textbox('setValue', row.catatan);

          reset_detail();
          if ($("#mode").val() == "tambah") {
            if (row.uuidlokasi != $("#IDLOKASI").combogrid('getValue') ||
              row.tgltrans > $('#TGLTRANS').datebox('getValue')) {
              $.messager.show({
                title: 'Warning',
                msg: 'Transaksi harus pada lokasi yang sama dan sebelum tanggal transaksi',
                timeout: {{ session('TIMEOUT') }},
              });
              $(this).combogrid('clear');
            } else {
              var promises = [
                getUangMukaPO(row.uuidbbm),
                load_detail(row.uuidbbm),
              ]
              await Promise.all(promises);
            }
          }
        }
      });
    }

    async function get_harga_barang(idbarang) {
      var idsupp = $("#IDSUPPLIER").val();
      var tgltrans = $("#TGLTRANS").datebox('getValue');
      var harga = 0;

      if (idsupp == '') {
        return harga;
      } else {
        try {
          let url = link_api.getHargaBarang;
          const response = await fetch(url, {
            method: 'POST',
            headers: {
              'Authorization': 'bearer {{ session('TOKEN') }}',
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({
              uuidbarang: idbarang,
              uuidsupplier: idsupp,
              tgltrans: tgltrans,
            }),
          }).then(response => {
            if (!response.ok) {
              throw new Error(`HTTP error! status: ${response.status} from ${url}`);
            }
            return response.json();
          })
          if (response.success) {
            harga = response.data.harga;
          } else {
            $.messager.alert('Error', response.message, 'error');
          }
        } catch (error) {
          var textError = getTextError(error);
          $.messager.alert('Error', getTextError(error), 'error');
        }
        return harga;
      }
    }

    async function get_harga_barangbeli(idbarang, satuan) {
      var harga = 0;
      try {
        let url = link_api.hargaBeliTerakhir;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidbarang: idbarang,
            satuan: satuan,
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })
        if (response.success) {
          harga = response.data.hargabeli;
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
      }

      return harga;
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
        toolbar: [{
          text: 'Tambah',
          iconCls: 'icon-add',
          handler: function() {
            var index = $(dg).datagrid('getRows').length;
            $(dg).datagrid('appendRow', {
              kodebarang: '',
              jmlbonus: 0,
              adanpwp: 0,
            }).datagrid('gotoCell', {
              index: index,
              field: 'kodebarang'
            });
            cekbarangnonstok = true;
            // getRowIndex(target);
          }
        }, {
          text: 'Hapus',
          iconCls: 'icon-remove',
          handler: function() {
            var row = $('#table_data_detail').datagrid('getRows')[indexDetail];
            if (row.idbbm != undefined && row.idbbm != 0) {
              $.messager.alert('Warning',
                'Barang tidak dapat dihapus, karena berasal dari Transaksi Penerimaan Barang', 'warning');
            } else {
              $(dg).datagrid('deleteRow', indexDetail);
              hitung_grandtotal();
            }
          }
        }],
        frozenColumns: [
          [{
              field: 'uuidbbm',
              hidden: true
            },
            {
              field: 'kodebbm',
              hidden: transaksiBBM == "HEADER",
              title: 'No.  Ref',
              width: 140
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
                  url: link_api.browseNonStokBarang,
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
              width: 200
            },
            @if (session('SHOWBARCODE') == 'YA')
              {
                field: 'barcodesatuan1',
                title: 'Barcode Sat. 1',
                width: 180
              },
            @endif
            @if (session('SHOWPARTNUMBER') == 'YA')
              {
                field: 'partnumber',
                title: 'Part Number',
                width: 180
              },
            @endif {
              field: 'uuidbarang',
              hidden: true
            },
          ]
        ],
        columns: [
          [{
              field: 'adanpwp',
              title: 'Ada NPWP',
              formatter: format_checked,
              align: 'center',
              hidden: !lihatHarga
            },
            {
              field: 'jmlstok',
              title: 'Stok',
              align: 'right',
              width: 60,
              formatter: format_qty,
            },
            {
              field: 'jmlbeli',
              title: 'Jumlah',
              align: 'right',
              width: 80,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
                options: {
                  required: true
                }
              }
            },
            {
              field: 'jmlbonus',
              title: 'Bonus',
              align: 'right',
              width: 80,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
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
              width: 80,
              align: 'center',
              editor: {
                type: 'combogrid',
                onBeforeLoad: function(param) {
                  var row = $(this).datagrid('getRows')[indexCellEdit];
                  param.uuidbarang = row.uuidbarang;
                },
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
              field: 'konversi',
              title: 'Konversi',
              width: 50,
              align: 'center',
              hidden: true
            },
            {
              hidden: !lihatHarga,
              field: 'uuidcurrency',
              title: 'Kode Currency',
              hidden: true
            },
            {
              field: 'currency',

              @if (session('MULTICURRENCY') != '1')
                hidden: !lihatHarga && true,
              @else
                hidden: !lihatHarga && false,
              @endif
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
              }
            },
            {
              field: 'hargabeli',
              title: 'H. Beli Terakhir',
              hidden: !lihatHarga,
              align: 'right',
              width: 85,
              formatter: format_amount,
              styler: function(index, row) {
                if (parseFloat(row.hargabeli) > 0 && parseFloat(row.hargabeli) > parseFloat(row.harga) -
                  parseFloat(row.disc)) {
                  return 'background-color:#ff8566';
                } else {
                  return 'background-color:#d3d3d3';
                }
              }
            },
            {
              field: 'harga',
              title: 'Harga',
              align: 'right',
              hidden: !lihatHarga,
              width: 85,
              formatter: format_amount,
              editor: inputHarga ? {
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
              hidden: !lihatHarga,
              width: 100,
              editor: !inputHarga ? null : {
                type: 'textbox'
              },
              hidden: false
            },
            {
              field: 'disc',
              title: 'Disc',
              align: 'right',
              hidden: !lihatHarga,
              width: 65,
              formatter: format_amount,
              editor: !inputHarga ? null : {
                type: 'numberbox'
              }
            },
            {
              field: 'biayakirim',
              title: 'Biaya Kirim',
              hidden: !lihatHarga,
              align: 'right',
              width: 65,
              formatter: format_amount,
              editor: !inputHarga ? null : {
                type: 'numberbox'
              }
            },
            {
              field: 'subtotal',
              title: 'Subtotal',
              hidden: !lihatHarga,
              align: 'right',
              width: 95,
              formatter: format_amount
            },
            {
              field: 'nilaikurs',
              title: 'Kurs ({{ session('SIMBOLCURRENCY') }})',
              align: 'right',
              hidden: !lihatHarga &&
                @if (session('MULTICURRENCY') != '1')
                  true,
                @else
                  false,
                @endif
              width: 60,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  required: true,
                }
              }
            },
            {
              field: 'hargakurs',
              title: 'Harga ({{ session('SIMBOLCURRENCY') }})',
              hidden: !lihatHarga &&
                @if (session('MULTICURRENCY') != '1')
                  true,
                @else
                  false,
                @endif
              align: 'right',
              width: 85,
              formatter: format_amount
            },
            {
              field: 'disckurs',
              title: 'Disc ({{ session('SIMBOLCURRENCY') }})',
              hidden: !lihatHarga &&
                @if (session('MULTICURRENCY') != '1')
                  true,
                @else
                  false,
                @endif
              align: 'right',
              width: 65,
            },
            {
              field: 'subtotalkurs',
              title: 'Subtotal ({{ session('SIMBOLCURRENCY') }})',
              hidden: !lihatHarga &&
                @if (session('MULTICURRENCY') != '1')
                  true,
                @else
                  false,
                @endif
              align: 'right',
              width: 95,
            },
            {
              field: 'pakaippn',
              title: 'Pakai PPN',
              hidden: !lihatHarga,
              align: 'center',
              width: 65,
              editor: !inputHarga ? null : {
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
              hidden: !lihatHarga,
              width: 95,
              formatter: format_amount
            },
            {
              field: 'ppnpersen',
              title: 'PPN (%)',
              align: 'right',
              hidden: !lihatHarga,
              width: 70,
              formatter: format_amount_2,
              editor: !inputHarga ? null : {
                type: 'numberbox',
                options: {
                  min: 0,
                  precision: 2,
                  max: 100
                }
              }
            },
            {
              field: 'ppnrp',
              title: 'PPN ({{ session('SIMBOLCURRENCY') }})',
              hidden: !lihatHarga,
              align: 'right',
              width: 65,
              formatter: format_amount
            },
            {
              field: 'pph22persen',
              title: 'PPH 22 (%)',
              hidden: !lihatHarga,
              align: 'right',
              width: 70,
              formatter: format_amount_2,
              editor: !inputHarga ? null : {
                type: 'numberbox',
                options: {
                  min: 0,
                  precision: 2,
                  max: 100
                }
              }
            },
            {
              field: 'pph22rp',
              title: 'PPH 22 (Rp)',
              hidden: !lihatHarga,
              align: 'right',
              width: 75,
              formatter: format_amount
            },
            {
              field: 'catatan',
              title: 'Catatan',
              width: 200,
              editor: {
                type: 'textbox',
                options: {
                  validType: 'length[0,300]'
                }
              }
            },
            {
              field: 'kategori',
              title: 'Kategori',
              width: 200,
            },
            {
              field: 'ppn',
              hidden: true
            }
          ]
        ],
        onClickRow: function(index, row) {
          if (row.uuidbbm == undefined || row.uuidbbm == "") {
            cekbarangnonstok = true;
          } else {
            cekbarangnonstok = false;
          }
          indexDetail = index;
        },
        onBeforeCellEdit: function(index, field) {
          if (field == 'biayakirim' && getPerhitunganBiayaKirim() != 4) {
            return false;
          }
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);
          indexCellEdit = index;
          if (row.uuidbbm == undefined || row.uuidbbm == "") {
            cekbarangnonstok = true;
          } else {
            cekbarangnonstok = false;
          }

          if (!cekbarangnonstok) {
            if (['satuan', 'jmlbeli', 'currency', 'jmlbonus'].indexOf(field) > -1) {
              $(this).datagrid('cancelEdit', index);

              return false;
            }
          }

          if (field == 'satuan') {
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
            case 'kodebarang':
              var data = ed.combogrid('grid').datagrid('getSelected');

              if ($("#KODESUPPLIER").val() == "") {

                $.messager.show({
                  title: 'Warning',
                  msg: 'Supplier Belum Diisi',
                  timeout: {{ session('TIMEOUT') }},
                });
                $(this).datagrid('deleteRow', index);
                break;
              }
              var uuidbarang = data ? data.uuidbarang : '';
              var ppn = data ? data.ppn : '';
              var nama = data ? data.nama : '';
              var satuan = data ? data.satuan : '';
              var satuanutama = data ? data.satuanutama : '';
              var konversi = data ? data.konversi : '';
              var harga = await get_harga_barang(uuidbarang);
              var hargabeli = await get_harga_barangbeli(uuidbarang, satuan);
              var kodemerk = data ? data.kodemerk : 0;
              var subtotal = harga * 1;
              var kodebrg = data ? data.kode : '';
              var jml = data ? data.jml : '';
              var sisa = data ? data.sisa : '';
              var terpenuhi = data ? data.terpenuhi : '';
              var discpersen = data ? data.discpersen : '';
              var disc = data ? data.disc : '';
              var disckurs = data ? data.disckurs : '';
              var pakaippn = data ? data.pakaippn : '';
              var ppnpersen = data ? data.ppnpersen : '';
              var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
              var partnumber = data.partnumber ? data.partnumber : '';
              var kategori = data.kategori ? data.kategori : '';
              console.log(harga);
              pakaippn = defaultpakaippn;

              if (pakaippn == 0) pakaippn = "TIDAK";
              else if (pakaippn == 1) pakaippn = "EXCL";
              else if (pakaippn == 2) pakaippn = "INCL";

              row_update = {
                uuidbarang: uuidbarang,
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
                kategori: kategori,
                jml: 0,
                jmlbeli: 1,
                hargabeli: hargabeli,
                satuanbeliterakhir: satuan,
                harga: harga,
                uuidcurrency: '{{ session('UUIDCURRENCY') }}',
                currency: '{{ session('SIMBOLCURRENCY') }}',
                nilaikurs: 1,
                discpersen: 0,
                disc: 0,
                disckurs: 0,
                subtotal: subtotal,
                pakaippn: pakaippn,
                ppnpersen: ppnpersenaktif,
                pph22persen: '{{ session('PPH22') }}',
              };

              if (!cekbarangnonstok && transaksiBBM == "HEADER") {
                row_update["kodebbm"] = $("#KODEBBM").val();
                row_update["uuidbbm"] = $("#IDBBM").combogrid('getValue');

                row_update["uuidsyaratbayar"] = idsyaratbayarval;
                row_update["namasyaratbayar"] = namasyaratbayarval;
                row_update["selisih"] = selisihval;
              }
              break;
            case 'satuan':
              var hargabeli = await get_harga_barangbeli(row.uuidbarang, row.satuan);

              row_update = {
                hargabeli: hargabeli
              };

              // get_konversi(ed.combogrid('grid').datagrid('getRows'), changes.satuan, row.satuan_lama);
              // if (satuan_baru != 0 || satuan_lama != 0 && changes.satuan) {
              // 	row_update = {
              // 		//jml        : (satuan_baru > satuan_lama) ? row.jml * konversi_baru      : row.jml / konversi_lama,
              // 		harga      : (satuan_baru > satuan_lama) ? row.harga / konversi_baru    : row.harga * konversi_lama,
              // 		hargakurs  : (satuan_baru > satuan_lama) ? row.hargakurs / konversi_baru: row.hargakurs * konversi_lama,
              // 		satuan_lama: changes.satuan
              // 	};
              // }
              break;
            case 'currency':
              var data = ed.combogrid('grid').datagrid('getSelected');
              var uuidcurrency = data ? data.uuidcurrency : '';

              var nilai = get_kurs($('#TGLTRANS').datebox('getValue'), uuidcurrency);
              row_update = {
                uuidcurrency: uuidcurrency,
                nilaikurs: nilai ? nilai : 1
              };

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

          hitung_subtotal_detail(index, row);
          hitung_grandtotal();
        },
        onLoadSuccess: function(data) {
          hitung_grandtotal();
        },
        onAfterDeleteRow: function(index, row) {
          hitung_grandtotal();
        },
        onAfterEdit: function(index, row, changes) {},
      }).datagrid('enableCellEditing');
    }

    function hitung_subtotal_detail(index, row) {
      // hitung diskon lebih dahulu
      var data = {};
      var harga = parseFloat(row.harga);
      var dg = $('#table_data_detail');
      var totaldisc = 0;

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

      row.jmlbeli = parseFloat(row.jmlbeli).toFixed({{ session('DECIMALDIGITQTY') }});
      data.discpersen = discDescription == "" ? "0" : discDescription;
      data.subtotal = parseFloat((harga * row.jmlbeli).toFixed({{ session('DECIMALDIGITAMOUNT') }}));

      var nilaikurs = parseFloat(row.nilaikurs);
      @if (session('MULTICURRENCY') == 1)
        nilaikurs = 1;
      @endif
      data.hargakurs = parseFloat(row.harga) * nilaikurs;
      data.disckurs = totaldisc <= 0 ? row.disc : totaldisc * nilaikurs;
      data.subtotalkurs = data.subtotal * nilaikurs;

      var dpp = data.subtotalkurs;
      var dppasli = data.subtotalkurs;

      if (row.ppn == 1) {
        if (row.pakaippn == 'TIDAK') {
          data.ppnrp = 0;
          data.dpp = data.subtotalkurs;
          data.dppasli = data.dpp;
        } else if (row.pakaippn == 'EXCL') {
          if (row.ppnpersen == 12) {
            data.ppnrp = Math.round(data.subtotalkurs * 11 / row.ppnpersen * row.ppnpersen / 100);
            data.dpp = Math.round(data.subtotalkurs * 11 / row.ppnpersen);
          } else {
            data.ppnrp = Math.floor(data.subtotalkurs * parseFloat(row.ppnpersen) / 100);
            data.dpp = data.subtotalkurs;
          }

          data.dppasli = data.subtotalkurs;
        } else if (row.pakaippn == 'INCL') {
          if (row.ppnpersen == 12) {
            data.ppnrp = Math.round(data.subtotalkurs * 11 / (100 + 11));
            data.dpp = Math.round((data.subtotalkurs - data.ppnrp) * 11 / row.ppnpersen);
          } else {
            data.ppnrp = Math.floor(data.subtotalkurs * parseFloat(row.ppnpersen) / (100 + parseFloat(row.ppnpersen)));
            data.dpp = data.subtotalkurs - data.ppnrp;
          }

          data.dppasli = data.subtotalkurs - data.ppnrp;
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
        data.dppasli = data.subtotalkurs;
      }

      data.ppnrp = +(data.ppnrp.toFixed({{ session('DECIMALDIGITAMOUNT') }}));

      data.pph22rp = Math.floor(row.pph22persen * data.dppasli / 100);
      data.pph22rp = +(data.pph22rp.toFixed({{ session('DECIMALDIGITAMOUNT') }}));
      data.dpp = +(data.dpp.toFixed({{ session('DECIMALDIGITAMOUNT') }}));

      dg.datagrid('updateRow', {
        index: index,
        row: data
      });

      // cek jika ada barang yang sama
      var rows = dg.datagrid('getRows');
      for (var i = 0; i < rows.length; i++) {
        if (index != i && (rows[i].uuidbarang != "" && row.uuidbarang == rows[i].uuidbarang) && (rows[i]
            .kodetransreferensi !=
            "" && row.kodetransreferensi == rows[i].kodetransreferensi)) {
          $.messager.show({
            title: 'Warning',
            msg: 'Barang Yang Diinput Tidak Boleh Sama Dalam Satu Detail Transaksi',
            timeout: {{ session('TIMEOUT') }},
          });
          dg.datagrid('deleteRow', index);
          break;
        }
      }
      hitung_biayakirim_detail();
    }

    function hitung_biayakirim_detail() {
      var biayakirim = parseFloat($('#BIAYAKIRIM').numberbox('getValue'));
      var perhitunganbiayakirim = $('#PERHITUNGANBIAYAKIRIM').combobox('getValue');
      var rows = $('#table_data_detail').datagrid('getRows');

      if (perhitunganbiayakirim == 2 || perhitunganbiayakirim == 3) {
        var totalqty = 0;
        var total = 0;

        for (var i = 0; i < rows.length; i++) {
          totalqty += parseFloat(rows[i].jmlbeli);
          total += parseFloat(rows[i].subtotalkurs);
        }

        var temp_totalbiayakirim = 0;

        for (var i = 0; i < rows.length; i++) {
          var biayakirimdetail = 0;

          if (i == rows.length - 1) {
            biayakirimdetail = biayakirim - temp_totalbiayakirim;
          } else {
            if (perhitunganbiayakirim == 2) {
              biayakirimdetail = Math.round(rows[i].jmlbeli / totalqty * biayakirim);
            } else if (perhitunganbiayakirim == 3) {
              biayakirimdetail = Math.round(rows[i].subtotalkurs / total * biayakirim);
            }
          }

          temp_totalbiayakirim += biayakirimdetail;

          $('#table_data_detail').datagrid('updateRow', {
            index: i,
            row: {
              biayakirim: biayakirimdetail
            }
          });
        }
      } else if (perhitunganbiayakirim == 1) {
        for (var i = 0; i < rows.length; i++) {
          $('#table_data_detail').datagrid('updateRow', {
            index: i,
            row: {
              biayakirim: 0
            }
          });
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
      var pembulatan = parseFloat($("#PEMBULATAN").numberbox('getValue')) ? parseFloat($("#PEMBULATAN").numberbox(
        'getValue')) : 0;
      var biaya = 0;
      var biayakirim = parseFloat($('#BIAYAKIRIM').numberbox('getValue'));

      var footer = {
        jmlbeli: 0,
        disc: 0,
        disckurs: 0,
        subtotal: 0,
        subtotalkurs: 0,
        ppnrp: 0,
        dpp: 0,
        pph22rp: 0
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

        dpp += parseFloat(data[i].dpp);
        if (data[i].pakaippn != 'TIDAK') {
          barangkenapajak += parseFloat(data[i].dpp);
        } else {
          barangtidakkenapajak += parseFloat(data[i].dpp);
        }

        total += parseFloat(data[i].subtotalkurs);
        footer.jmlbeli += parseFloat(data[i].jmlbeli);
        footer.disc += parseFloat(data[i].disc);
        footer.disckurs += parseFloat(data[i].disckurs);
        footer.subtotal += parseFloat(data[i].subtotal);
        footer.subtotalkurs += parseFloat(data[i].subtotalkurs);
        footer.ppnrp += parseFloat(data[i].ppnrp);
        footer.dpp += parseFloat(data[i].dpp);
        footer.pph22rp += parseFloat(data[i].pph22rp);
      }

      total2 = +((total2).toFixed({{ session('DECIMALDIGITAMOUNT') }}));

      var temp_uangmuka = uangmuka;

      grandtotal = parseFloat(total2 + footer.pph22rp + biaya + pembulatan + biayakirim);

      if (uangmuka > grandtotal) {
        temp_uangmuka = grandtotal;
        grandtotal = 0;
      } else {
        grandtotal -= temp_uangmuka;
      }

      $("#TOTAL").numberbox('setValue', total);
      $('#BARANGKENAPAJAK').numberbox('setValue', barangkenapajak);
      $('#BARANGTIDAKKENAPAJAK').numberbox('setValue', barangtidakkenapajak);
      //$('#DISKONRP').numberbox('setValue', diskonrp);
      $('#txt_DPP').numberbox('setValue', footer.dpp);
      $("#PPNRP").numberbox('setValue', footer.ppnrp);
      $("#PPH22RP").numberbox('setValue', footer.pph22rp);
      $("#GRANDTOTAL").numberbox('setValue', grandtotal);
      $("#UANGMUKA").numberbox('setValue', temp_uangmuka);
      $('#table_data_detail').datagrid('reloadFooter', [footer]);
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
      $("#PPHPERSEN").numberbox('setValue', {{ session('PPH22') }});
      hitung_grandtotal();

      $("#TGLTRANS, #TGLKIRIM, #TGLJATUHTEMPO").datebox('setValue', date_format());
      $("#TGLJATUHTEMPO").datebox('readonly');
    }

    function getPerhitunganBiayaKirim() {
      return $('#PERHITUNGANBIAYAKIRIM').combobox('getValue');
    }
  </script>
@endpush
