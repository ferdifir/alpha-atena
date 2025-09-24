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
            <div data-options="region:'north',border:false" style="width:100%; height:220px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>

              <input type="hidden" id="mode" name="mode">
              <table>
                <tr>
                  <td valign="top">
                    <fieldset style="height:197px;">
                      <legend id="label_laporan">Info Transaksi</legend>
                      <table border="0">
                        <input name="uuidperusahaan" id="IDPERUSAHAAN"style="width:190px" type="hidden">
                        <tr>
                          <td id="label_form">Lokasi</td>
                          <td id="label_form"><input name="uuidlokasi" id="IDLOKASI" style="width:190px"></td>
                          <input type="hidden" id="KODELOKASI" name="kodelokasi">
                        </tr>
                        <tr>
                          <td id="label_form">No. Pesanan Pengiriman</td>
                          <td id="label_form">
                            <input name="kodedo" id="KODEDO" class="label_input" style="width:190px">
                          </td>
                          <input type="hidden" id="IDDO" name="uuiddo">
                        </tr>
                        <tr hidden>
                          <td id="label_form">No. Pesanan Pembelian</td>
                          <td id="label_form"><input name="kodepo" id="KODEPO" readonly class="label_input"
                              style="width:190px"></td>
                        </tr>
                        <tr>
                          <td id="label_form">Tgl. Trans</td>
                          <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date" style="width:190px">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Tgl. Kirim</td>
                          <td id="label_form"><input name="tglkirim" id="TGLKIRIM" class="date" style="width:190px">
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td valign="top">
                    <div id="tab trans" class="easyui-tabs" style="width:465px;height:200px;">
                      <div title="Customer">
                        <table border="0">
                          <tr>
                            <td id="label_form" style="width:127px">Kode</td>
                            <td>
                              <input name="uuidcustomer" class="label_input" id="IDCUSTOMER" style="width:100px">
                              <input type="hidden" id="KODECUSTOMER" name="kodecustomer">
                              <input name="namacustomer" class="label_input" id="NAMACUSTOMER" style="width:208px"
                                readonly prompt="Nama Customer">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form" style="vertical-align: super;" style="width:127px">Alamat</td>
                            <td>
                              <textarea name="alamat" class="label_input" id="ALAMAT" readonly prompt="Alamat Customer" multiline="true"
                                style="width:313px; height:40px" data-options="validType:'length[0, 500]'"></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form" style="vertical-align: super;" style="width:127px">Alamat <br>Kirim</td>
                            <td>
                              <textarea name="alamatkirim" class="label_input" id="ALAMATKIRIM" readonly prompt="Alamat Kirim" multiline="true"
                                style="width:313px; height:40px" readonly data-options="validType:'length[0, 500]'"></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form" style="width:127px">Telp</td>
                            <td>
                              <input name="telp" class="label_input" id="TELP" style="width:313px" readonly
                                prompt="Telp Customer">
                            </td>
                          </tr>
                          <tr id="tr_so">
                            <td id="label_form" style="width:127px">No. Pesanan Penjualan</td>
                            <td>
                              <input name="uuidso" class="label_input" id="IDSO" style="width:313px">
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div title="Sub Customer">
                        <table border="0">
                          <tr>
                            <td id="label_form" style="width:127px">Kode</td>
                            <td>
                              <input class="label_input" id="KODESUBCUSTOMER" name="kodesubcustomer"
                                style="width:100px">
                              <input type="hidden" name="uuidsubcustomer" id="IDSUBCUSTOMER">
                              <input name="namasubcustomer" class="label_input" id="NAMASUBCUSTOMER"
                                style="width:208px" readonly prompt="Nama SubCustomer">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form" style="vertical-align: super;" style="width:127px">Alamat</td>
                            <td colspan="3">
                              <textarea name="alamatsubcustomer" class="label_input" id="ALAMATSUBCUSTOMER" readonly prompt="Alamat SubCustomer"
                                multiline="true" style="width:313px; height:50px" data-options="validType:'length[0, 500]'"></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form" style="width:127px">Telp</td>
                            <td colspan="3">
                              <input name="telpsubcustomer" class="label_input" id="TELPSUBCUSTOMER"
                                style="width:313px" readonly prompt="Telp SubCustomer">
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div title="Info Pembayaran">
                        <table border="0">
                          <tr>
                            <td id="label_form" style="width:127px">Syarat Bayar</td>
                            <td id="label_form" colspan="3">
                              <input name="uuidsyaratbayar" id="IDSYARATBAYAR" readonly class="label_input"
                                style="width:182px">
                              <input name="tgljatuhtempo" id="TGLJATUHTEMPO" readonly class="date"
                                style="width:100px">
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div title="Ekspedisi">
                        <table border="0">
                          <tr>
                            <td id="label_form" valign="top" style="width:127px">Ekspedisi </td>
                            <td id="label_form">
                              <input name="uuidekspedisi" id="IDEKSPEDISI" style="width:100px">
                              <input name="namaekspedisi" class="label_input" id="NAMAEKSPEDISI" style="width:210px"
                                readonly prompt="Nama Ekspedisi">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form" style="vertical-align: super;" style="width:127px">Alamat</td>
                            <td>
                              <textarea name="alamatekspedisi" class="label_input" id="ALAMATEKSPEDISI" readonly prompt="Alamat Ekspedisi"
                                multiline="true" style="width:313px; height:40px" data-options="validType:'length[0, 500]'"></textarea>

                            </td>
                          </tr>
                          <tr>
                            <td id="label_form" style="width:127px">Telp</td>
                            <td>
                              <input name="telpekspedisi" class="label_input" id="TELPEKSPEDISI" style="width:313px"
                                readonly prompt="Telp Ekspedisi">
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </td>
                  <td valign="bottom">
                    <table border="0">
                      <tr>
                        <td id="label_form">
                          <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                            style="width:300px; height:85px" data-options="validType:'length[0, 500]'"></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td valign="bottom">
                          <p style="margin:0px;color:red;">
                            Apabila barang tidak ingin didelivery, jumlah diisi 0
                          </p>
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
            <div data-options="region:'south',border:false" style="width:100%; height:35px;">
              <table id="trans_footer" width="100%">
                <tr>
                  <td colspan="2">
                    <label style="font-weight:normal" id="label_form">User Input :</label> <label
                      id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl. Input :</label>
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
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
      <br>

      <a title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false" id='btn_simpan_modal'
        onclick="$('#window_button_simpan').window('open')"><img src="{{ asset('assets/images/simpan.png') }}">
      </a>

      <br><br>
      <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
        onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
    </div>
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
    var olddiskonpersen = 0.00;
    var olddiskonrp = 0.00;
    var oldharga = 0.00;
    var cekbtnsimpan = true;
    var ppnpersenaktif = 0;
    var row = {};
    var transreferensi = null;
    let TRANSAKSISO;
    let INPUTHARGA;
    let LIHATHARGA;
    let KODE;
    let IDCURRENCY;

    $(document).ready(async function() {
      try {
        const req = fetchData(
          '{{ session('TOKEN') }}',
          link_api.getConfig, {
            modul: 'TDO',
            config: 'TRANSAKSISO'
          }
        );
        const req2 = fetchData(
          '{{ session('TOKEN') }}',
          link_api.getConfig, {
            modul: 'TDO',
            config: 'KODEDO'
          }
        );
        const req3 = fetchData(
          '{{ session('TOKEN') }}',
          link_api.getDataAkses, {
            kodemenu: '{{ $kodemenu }}'
          }
        );

        const [res, res2, res3] = await Promise.all([req, req2, req3]);

        if (!res.success) {
          throw new Error(res.message);
        }

        if (!res2.success) {
          throw new Error(res2.message);
        }

        if (!res3.success) {
          throw new Error(res3.message);
        }

        TRANSAKSISO = res.data.value;
        INPUTHARGA = res3.data.inputharga;
        LIHATHARGA = res3.data.lihatharga;
        KODE = res2.data.value;

        $('#tr_so').attr('hidden', TRANSAKSISO != 'HEADER');
        $('#KODEDO').textbox({
          prompt: KODE == 'AUTO' ? 'Auto Generate' : '',
          readonly: KODE == 'AUTO',
        });
        $('#td_lihatharga').attr('hidden', LIHATHARGA == 0);
        $('#PEMBULATAN').numberbox({
          readonly: INPUTHARGA == 0
        });
        if (res3.data.cetak == 1) {
          $('#simpan_cetak').css('filter', '');
        } else {
          $('#simpan_cetak').css('filter', 'grayscale(100%)');
          $('#simpan_cetak').removeAttr('onclick');
        }
      } catch (e) {
        const error = (typeof e === "string") ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
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
            export_excel('Faktur Pesanan Pengiriman', $("#area_cetak").html());
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

      browse_data_salesorder('#IDSO');
      browse_data_customer('#IDCUSTOMER');
      browse_data_syaratbayar('#IDSYARATBAYAR');
      browse_data_lokasi('#IDLOKASI');
      browse_data_ekspedisi('#IDEKSPEDISI');

      $('#TGLTRANS').datebox({
        onChange: function(newVal, oldVal) {
          var time_do = Date.parse(newVal);
          var row_so = $('#IDSO').combogrid('grid').datagrid('getSelected');

          if (row_so) {
            var time_so = Date.parse(row_so.tgltrans);

            if (time_do < time_so) {
              $.messager.alert('Error', 'Tanggal DO tidak boleh sebelum tanggal SO', 'error');

              $(this).datebox('setValue', oldVal);

              return false;
            }
          }

          console.log(newVal, oldVal);
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

      $("#browse_alamat_kirim").dialog({
        onOpen: function() {
          $('#browse_alamat_kirim').form('clear');
        },
        buttons: '#browse_alamat_kirim-buttons',
      }).dialog('close');

      buat_table_detail();
      buat_table_detail_rekap();

      if ("{{ $mode }}" == "tambah") {
        tambah();
        setTimeout(function() {
          $('#mask-loader').fadeOut(500, function() {
            $(this).hide()
          })
        }, 250)
      } else if ("{{ $mode }}" == "ubah") {
        ubah();
      }
    })

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    async function cetak(id) {
      $("#window_button_cetak").window('close');
      const doc = await getCetakDocument('{{ session('TOKEN') }}', link_api.cetakPenjualanDeliveryOrder + id);
      if (doc == null) {
        $.messager.alert('Warning', 'Terjadi kesalahan dalam mengambil data untuk cetak transaksi', 'warning');
        return false;
      }
      $("#area_cetak").html(doc);
      $("#form_cetak").window('open');
    }

    async function tambah() {
      $('#mode').val('tambah');

      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#IDLOKASI').combogrid('readonly', false);
      $('#IDCUSTOMER').combogrid('readonly', false);
      $('#KODESUBCUSTOMER').textbox('readonly');
      $('#IDSO').combogrid('readonly', false);
      $('#TGLTRANS').datebox('readonly', false);
      idtrans = "";

      try {
        const res = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.getLokasiDefault
        );

        if (res.success) {
          if (res.data.uuidlokasi != null) {
            $('#IDLOKASI').combogrid('setValue', res.data.uuidlokasi);
            $("#KODELOKASI").val(res.data.kodelokasi);
          }
        } else {
          throw res.message;
        }
      } catch (e) {
        const error = (typeof e === "string") ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }


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
      const dataref = '{{ $dataref }}';
      if (dataref != 'undefined') {
        fetchData(
          '{{ session('TOKEN') }}',
          link_api.loadDataHeaderPenjualanSalesOrder, {
            uuidso: dataref,
          }
        ).then(res => {
          if (res.success) {
            transreferensi = res.data;
            $('#IDLOKASI').combogrid('setValue', {
              uuidlokasi: transreferensi.uuidlokasi
            });

            $('#TGLTRANS').datebox('setValue', transreferensi.tgltrans);

            $('#IDCUSTOMER').combogrid('setValue', {
              uuidcustomer: transreferensi.uuidcustomer,
              kode: transreferensi.kodecustomer
            });

            $('#IDSO').combogrid('grid').datagrid('loadData', [{
              tglkirim: transreferensi.tglkirim,
              uuidso: transreferensi.uuidso,
              kodeso: transreferensi.kodeso,
              kodelokasi: transreferensi.kodelokasi,
              kodepo: transreferensi.kodepo,
              namaekspedisi: transreferensi.namaekspedisi,
              tgltrans: transreferensi.tgltrans,
              username: transreferensi.userbuat
            }])

            $('#IDSO').combogrid('setValue', transreferensi.uuidso);

            $('#IDSYARATBAYAR').combogrid('setValue', {
              uuidsyaratbayar: transreferensi.uuidsyaratbayar
            });

            $("#ALAMATKIRIM").textbox('setValue', transreferensi.alamatkirim);

            var alamatcustomer = '';

            if (transreferensi.alamatcustomer) {
              alamatcustomer = transreferensi.alamatcustomer + "\r\n";
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

            $("#KODECUSTOMER").val(transreferensi.kodecustomer);
            $('#ALAMAT').textbox('setValue', alamatcustomer);
            $('#TELP').textbox('setValue', transreferensi.telp);

            //info subcustomer
            var alamatsubcustomer = '';

            if (transreferensi.alamat) {
              alamatsubcustomer = transreferensi.alamatsubcustomer + "\r\n";
            }

            if (transreferensi.kota && transreferensi.kota != null) {
              alamatsubcustomer += transreferensi.kota;
            }

            if (transreferensi.propinsi && transreferensi.propinsi != null) {
              alamatsubcustomer += "-" + transreferensi.propinsi;
            }

            if (transreferensi.negara && transreferensi.negara != null) {
              alamatsubcustomer += "-" + transreferensi.negara;
            }

            $("#IDSUBCUSTOMER").val(transreferensi.uuidsubcustomer);
            $("#KODESUBCUSTOMER").textbox('setValue', transreferensi.kodesubcustomer);
            $("#NAMASUBCUSTOMER").textbox('setValue', transreferensi.namasubcustomer);
            $("#ALAMATSUBCUSTOMER").textbox('setValue', alamatsubcustomer);
            $("#TELPSUBCUSTOMER").textbox('setValue', transreferensi.telpsubcustomer);

            //info ekspedisi
            if (transreferensi.uuidekspedisi != 0 && transreferensi.uuidekspedisi != null) {
              $("#IDEKSPEDISI").combogrid('setValue', transreferensi.uuidekspedisi);
              $("#KODEEKSPEDISI").val(transreferensi.kodeekspedisi);
              $("#NAMAEKSPEDISI").textbox('setValue', transreferensi.namaekspedisi);
              $("#ALAMATEKSPEDISI").textbox('setValue', transreferensi.alamatekspedisi);
              $("#TELPEKSPEDISI").textbox('setValue', transreferensi.telpekspedisi);
            }

            // memuat data detail dari SO
            load_data_detail(transreferensi.uuidso);
          } else {
            $.messager.alert('Error', res.message, 'error');
          }
        }).catch(e => {
          const error = (typeof e === 'string') ? e : e.message;
          const textError = getTextError(error);
          $.messager.alert('Error', textError, 'error');
        })
      }
    }

    async function ubah() {
      $(':radio:not(:checked)').attr('disabled', false);
      $('#mode').val('ubah');
      try {
        const res = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.loadDataHeaderPenjualanDeliveryOrder, {
            uuiddo: '{{ $data }}'
          }
        );
        if (!res.success) {
          throw res.message;
        }

        row = res.data;
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }

      if (row) {
        get_status_trans('{{ session('TOKEN') }}', "atena/penjualan/pesanan-pengiriman", "uuiddo", row.uuiddo,
          function(data) {
            data = data.data;
            $(".form_status").html(status_transaksi(data.status));
          });
        //jika tidak punya akses input harga
        if (INPUTHARGA == 0) {
          $(':radio:not(:checked)').attr('disabled', true);
        }

        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);

        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          data = data.data;
          var UT = data.ubah;
          get_status_trans('{{ session('TOKEN') }}', "atena/penjualan/pesanan-pengiriman", 'uuiddo', row.uuiddo,
            function(data) {
              data = data.data;
              if (UT == 1 && data.status == 'I') {
                $('#btn_simpan_modal').css('filter', '');
                $('#mode').val('ubah');
              } else {
                $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                $('#btn_simpan_modal').removeAttr('onclick');
              }
              $("#form_input").form('load', row);
              $('#IDLOKASI').combogrid('readonly');
              $('#IDCUSTOMER').combogrid('readonly');
              $('#KODESUBCUSTOMER').textbox('readonly');
              $("#CEKLIMITPIUTANGDO").val(row.ceklimitpiutangdo);
              $("#CEKLIMITNOTADO").val(row.ceklimitnotado);
              $('#TGLTRANS').datebox('readonly');
              $('#IDSO').combogrid('readonly');
              $('#IDSO').combogrid('setValue', {
                uuidso: row.uuidso,
                kodeso: row.kodeso
              });

              //info subcustomer
              var alamat = row.alamatsubcustomer + "\r\n";
              if (row.kota && row.kota != 'null') alamat += row.kota;
              if (row.propinsi && row.propinsi != 'null') alamat += "-" + row.propinsi;
              if (row.negara && row.negara != 'null') alamat += "-" + row.negara;

              $("#ALAMATSUBCUSTOMER").textbox('setValue', alamat);

              idtrans = row.uuiddo;
              load_data(row.uuiddo);
            });
        });

        //CUSTOMER
        var url = link_api.browseCustomer;
        get_combogrid_data($("#IDCUSTOMER"), row.kodecustomer, url);

        if (row.uuidekspedisi != 0 && row.uuidekspedisi != null) {
          //EKSPEDISI
          var url = link_api.browseEkspedisi;
          get_combogrid_data($("#IDEKSPEDISI"), row.kodeekspedisi, url);
        }
      }
    }

    function simpan(jenis_simpan) {
      $(':radio:not(:checked)').attr('disabled', false);
      var mode = $("#mode").val();

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      $('#window_button_simpan').window('close');
      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }

      var stok_minus = false;

      //PENGECEKAN JUMLAH STOK DI DO
      var data = $("#table_data_detail").datagrid('getRows');
      for (var i = 0; i < data.length; i++) {
        if (parseFloat(data[i].jmldo) > parseFloat(data[i].jmlstok)) {
          isValid = false;
          stok_minus = true;
        }
      }

      if (!isTokenExpired('{{ session('TOKEN') }}')) {
        if (stok_minus) {
          $.messager.confirm(
            'Confirm',
            'Terdapat Barang Yang Jumlahnya Melebihi Stok Barang. Tetap Melanjutkan Transaksi ? ',
            function(r) {
              if (r) {
                isValid = true;
                if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
                  cekbtnsimpan = false;
                  simpanTransaksi(jenis_simpan);
                }
              }
            }
          );
        } else {
          if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
            cekbtnsimpan = false;
            simpanTransaksi(jenis_simpan);
          }
        }
      } else {
        $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
      }
    }

    async function simpanTransaksi(jenis_simpan) {
      var mode = $("#mode").val();
      var data = $("#form_input :input").serializeArray();
      var payload = {};
      for (var i = 0; i < data.length; i++) {
        payload[data[i].name] = data[i].value;
        if (data[i].name == 'data_detail') {
          payload[data[i].name] = JSON.parse(data[i].value);
        }
      }
      payload['jenis_simpan'] = jenis_simpan;

      try {
        tampilLoaderSimpan();
        const res = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.simpanPenjualanDeliveryOrder,
          payload,
        );

        if (res.success) {

          $('#form_input').form('clear');
          $.messager.show({
            title: 'Info',
            msg: 'Transaksi Sukses',
            showType: 'show'
          });

          transreferensi = null;

          if (mode == 'tambah') {
            tambah();
          } else {
            ubah();
          }

          if (jenis_simpan == 'simpan_cetak') {
            cetak(res.data.uuiddo);
          }

        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      } finally {
        cekbtnsimpan = true;
        tutupLoaderSimpan();
      }
    }

    function reset_detail() {
      $('#table_data_detail').datagrid('loadData', []);
      $('#table_data_detail_rekap').datagrid('loadData', []);
    }

    async function load_data(idtrans) {
      var tgltrans = $("#TGLTRANS").datebox('getValue');
      try {
        const msg = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.loadDataPenjualanDeliveryOrder, {
            uuiddo: idtrans,
            tgltrans: tgltrans
          },
        );
        if (msg.success) {
          for (var x = 0; x < msg.data.length; x++) {
            const response = await fetchData(
              '{{ session('TOKEN') }}',
              link_api.loadSatuanBarang, {
                uuidbarang: msg.data[x].uuidbarang
              },
            );
            get_konversi(response, msg.data[x].satuan, response[0].satuan);
            msg.data[x].satuan_lama = msg.data[x].satuan;
            msg.data[x].hargaterendah = ((satuan_baru > satuan_lama) ? msg.data[x].hargaterendah / konversi_baru : msg
              .data[x].hargaterendah * konversi_lama).toFixed(0);
          }
          $('#table_data_detail').datagrid('loadData', msg.data);
          $('#table_data_detail_rekap').datagrid('loadData', msg.data);
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }

    }

    async function load_data_detail(idtrans) {
      try {
        const msg = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.loadDataDetailPenjualanSalesOrder, {
            uuidso: idtrans
          },
        );
        if (msg.success) {
          for (var x = 0; x < msg.data.length; x++) {
            const response = await fetchData(
              '{{ session('TOKEN') }}',
              link_api.loadSatuanBarang, {
                uuidbarang: msg.data[x].uuidbarang
              },
            );
            get_konversi(response, msg.data[x].satuan, response[0].satuan);
            msg.data[x].satuan_lama = msg.data[x].satuan;
            msg.data[x].hargaterendah = ((satuan_baru > satuan_lama) ? msg.data[x].hargaterendah /
              konversi_baru : msg.data[x].hargaterendah * konversi_lama).toFixed(0);
          }
          $('#table_data_detail').datagrid('loadData', msg.data);
          var rows = msg.data;
          for (var i = 0; i < rows.length; i++) {
            hitung_subtotal_detail(i, rows[i])
          }
          hitung_grandtotal();
          $('#table_data_detail_rekap').datagrid('loadData', msg.data);
        } else {
          throw msg.message;
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
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

          var ref = $("#IDCUSTOMER").combogrid('getValue');
          $('#IDSO').combogrid('grid').datagrid('options').url = link_api.browseSO;
          $('#IDSO').combogrid('clear');
          $('#IDSO').combogrid('grid').datagrid('load', {
            uuidcustomer: ref,
            lokasi: row.uuidlokasi,
            q: ''
          });
        },
        onLoadSuccess: function(data) {
          if (data.total == 1) {
            var rows = data.rows;
            $(this).combogrid('setValue', rows[0].kode).combogrid('readonly');
          }
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

            $('#NAMACUSTOMER').textbox('setValue', row.nama);
            $("#KODECUSTOMER").val(row.kode);
            $('#ALAMAT').textbox('setValue', alamat);
            $('#TELP').textbox('setValue', row.telp);
            $('#IDSYARATBAYAR').combogrid('setValue', row.uuidsyaratbayar);
            $('#ALAMATKIRIM').textbox('clear');

            var lokasi = $("#IDLOKASI").combogrid('getValue');

            $('#IDSO').combogrid('grid').datagrid('options').url = link_api.browseSO;
            $('#IDSO').combogrid('clear');
            $('#IDSO').combogrid('grid').datagrid('load', {
              uuidcustomer: row.uuidcustomer,
              lokasi: lokasi,
              q: ''
            });

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
    var defaultpakaippn = "{{ session('DEFAULTPAKAIPPN') }}";

    function browse_data_salesorder(id) {
      $(id).combogrid({
        panelWidth: 870,
        idField: 'uuidso',
        textField: 'kodeso',
        mode: 'remote',
        sortOrder: 'asc',
        required: true,
        columns: [
          [{
              field: 'tglkirim',
              title: 'Tgl Kirim',
              width: 80
            },
            {
              field: 'uuidso',
              hidden: true
            },
            {
              field: 'kodeso',
              title: 'No. Pesanan Penjualan',
              width: 180
            },
            {
              field: 'namalokasi',
              title: 'Lokasi',
              width: 90
            },
            {
              field: 'kodepo',
              title: 'No. PO Pelanggan',
              width: 150
            },
            {
              field: 'namaekspedisi',
              title: 'Ekspedisi',
              width: 200
            },
            {
              field: 'tgltrans',
              title: 'Tgl Trans',
              width: 80
            },
            {
              field: 'userentry',
              title: 'User',
              width: 90
            },
          ]
        ],
        onSelect: function(index, row) {
          if ($('#mode').val() != '') {

            var time_do = Date.parse($('#TGLTRANS').datebox('getValue'));
            var time_so = Date.parse(row.tgltrans);

            if (time_do < time_so) {
              $.messager.alert('Error', 'Tanggal DO tidak boleh sebelum tanggal SO yang dipilih', 'error');

              $('#IDSO').combogrid('clear');

              return false;
            }

            if (row.uuidlokasi != $("#IDLOKASI").combogrid('getValue') ||
              row.tgltrans > $('#TGLTRANS').datebox('getValue')) {
              $.messager.show({
                title: 'Warning',
                msg: 'Transaksi harus pada lokasi yang sama dan sebelum tanggal transaksi',
                timeout: {{ session('TIMEOUT') }},
              });

              $(this).combogrid('clear');
            } else {
              $("#KODEPO").textbox("setValue", row.kodepo);

              $("#ALAMATKIRIM").textbox('setValue', row.alamatkirim);

              //info subcustomer
              var alamat = row.alamat == "" || row.alamat == null ? "" : (row.alamat + "\r\n");
              if (row.kota && row.kota != 'null') alamat += row.kota;
              if (row.propinsi && row.propinsi != 'null') alamat += "-" + row.propinsi;
              if (row.negara && row.negara != 'null') alamat += "-" + row.negara;

              $("#IDSUBCUSTOMER").val(row.uuidsubcustomer);
              $("#KODESUBCUSTOMER").textbox('setValue', row.kodesubcustomer);
              $("#NAMASUBCUSTOMER").textbox('setValue', row.namasubcustomer);
              $("#ALAMATSUBCUSTOMER").textbox('setValue', alamat);
              $("#TELPSUBCUSTOMER").textbox('setValue', row.telp);

              //info ekspedisi
              $("#IDEKSPEDISI").combogrid('setValue', row.uuidekspedisi);
              $("#KODEEKSPEDISI").val(row.kodeekspedisi);
              $("#NAMAEKSPEDISI").textbox('setValue', row.namaekspedisi);
              $("#ALAMATEKSPEDISI").textbox('setValue', row.alamatekspedisi);
              $("#TELPEKSPEDISI").textbox('setValue', row.telpekspedisi);

              if (row.catatan && row.catatan != null) {
                $("#CATATAN").textbox('setValue', row.catatan);
              }

              load_data_detail(row.uuidso);
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
            $(dg).datagrid('deleteRow', indexDetail);
            hitung_grandtotal();
          }
        }],
        frozenColumns: [
          [{
              field: 'uuidso',
              hidden: true
            },
            {
              field: 'kodeso',
              title: 'No. Pesanan Penjualan',
              width: 140,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 600,
                  mode: 'remote',
                  required: true,
                  idField: 'kodeso',
                  textField: 'kodeso',
                  columns: [
                    [{
                        field: 'tglkirim',
                        title: 'Tgl Kirim',
                        width: 80
                      },
                      {
                        field: 'uuidso',
                        hidden: true
                      },
                      {
                        field: 'kodeso',
                        title: 'Kode',
                        width: 150
                      },
                      {
                        field: 'kodelokasi',
                        title: 'Kode Lokasi',
                        width: 90
                      },
                      {
                        field: 'kodepo',
                        title: 'Kode PO',
                        width: 150
                      },
                      {
                        field: 'tgltrans',
                        title: 'Tgl Trans',
                        width: 80
                      },
                      {
                        field: 'username',
                        title: 'User',
                        width: 90
                      },
                    ]
                  ],
                }
              },
              hidden: TRANSAKSISO == 'HEADER',
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
                  columns: [
                    [{
                        field: 'uuidbarang',
                        hidden: true
                      },
                      {
                        field: 'uuidmerk',
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
                        field: 'jml',
                        title: 'Posisi Stok',
                        formatter: format_qty,
                        width: 100
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
              title: 'Nama',
              width: 200
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
          ]
        ],
        columns: [
          [{
              field: 'sisaso',
              title: 'Sisa SO',
              align: 'right',
              width: 80,
              formatter: format_qty
            },
            {
              field: 'jmldo',
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
              align: 'center'
            },
            {
              field: 'satuanutama',
              title: 'Satuan Utama',
              width: 50,
              align: 'center',
              hidden: true
            },
            ...(LIHATHARGA == 1 ? [{
                field: 'uuidcurrency',
                title: 'Id Currency',
                hidden: true
              },
              {
                field: 'currency',
                title: 'Mata Uang',
                width: 70
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
                hidden: false,
                editor: INPUTHARGA == 1 ? {
                  type: 'textbox'
                } : null
              },
              {
                field: 'disc',
                title: 'Disc',
                align: 'right',
                width: 65,
                formatter: format_amount,
                editor: INPUTHARGA == 1 ? {
                  type: 'numberbox'
                } : null
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
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }},
              },
              {
                field: 'hargakurs',
                title: 'Harga ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 85,
                formatter: format_amount,
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }},
              },
              {
                field: 'disckurs',
                title: 'Disc ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 65,
                formatter: format_amount,
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }}
              },
              {
                field: 'subtotalkurs',
                title: 'Subtotal ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 95,
                formatter: format_amount,
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }}
              },
              {
                field: 'pakaippn',
                title: 'Pakai PPN',
                align: 'center',
                width: 65
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
                formatter: format_amount_2
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
        //UNTUK TOMBOL EDIT
        onClickRow: function(index, row) {
          indexDetail = index;
        },
        onBeforeCellEdit: function(index, field) {
          var row = $(this).datagrid('getRows')[index];

          if (field == 'disc' || field == 'discpersen' || field == 'harga') {
            oldharga = row.harga;
            olddiskonpersen = row.discpersen;
            olddiskonrp = row.disc;
          }

        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);
          if (field == 'kodeso') {
            var lokasi = $("#IDLOKASI").combogrid('getValue');
            var ref = $("#IDCUSTOMER").combogrid('getValue');

            var url = link_api.browseSO;
            ed.combogrid('grid').datagrid('options').url = url;
            ed.combogrid('grid').datagrid('load', {
              uuidcustomer: ref,
              lokasi: lokasi,
              q: ''
            });
            ed.combogrid('showPanel');
          } else if (field == 'kodebarang') {
            var idtrans = '';

            //jika transaksi lainpr detail
            if (row.uuidso) idtrans = row.uuidso;

            ed.combogrid('grid').datagrid('options').url = link_api.browseBarangPenjualanSalesOrder;
            ed.combogrid('grid').datagrid('load', {
              q: '',
              uuidso: idtrans
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
            case 'kodeso':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidso : '';
              var tgltrans = data ? data.tgltrans : '';
              var lokasi = data ? data.uuidlokasi : '';

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
                uuidso: id,
              };
              break;
            case 'kodebarang':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidbarang : '';
              var ppn = data ? data.ppn : '';
              var nama = data ? data.nama : '';
              var satuan = data ? data.satuan : '';
              var satuanutama = data ? data.satuanutama : '';
              var konversi = data ? data.konversi : '';
              var harga = data ? data.harga : '';
              var kodemerk = data ? data.kodemerk : '';
              var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
              var partnumber = data.partnumber ? data.partnumber : '';
              var disccustomermin = data.disccustomermin ? data.disccustomermin : 0;
              var disctipecustomermin = data.disctipecustomermin ? data.disctipecustomermin : 0;
              var discmerkmin = data.discmerkmin ? data.discmerkmin : 0;
              var disccustomermax = data.disccustomermax ? data.disccustomermax : 0;
              var disctipecustomermax = data.disctipecustomermax ? data.disctipecustomermax : 0;
              var discmerkmax = data.discmerkmax ? data.discmerkmax : 0;
              //   var row_harga = await get_harga_barang(id, data.jml);
              var row_harga = await get_harga_barang(id, data.jml);

              oldharga = harga;
              olddiskonpersen = '0';
              olddiskonrp = 0;


              row_update = {
                uuidbarang: id,
                ppn: ppn,
                kodemerk: kodemerk,
                namabarang: nama,
                barcodesatuan1: barcodesatuan1,
                partnumber: partnumber,
                tutup: 0,
                satuan_lama: satuan,
                satuan: satuan,
                satuanutama: satuanutama,
                konversi: konversi,
                jmlstok: 0,
                jmldo: 0,
                sisado: 0,
                harga: harga,
                uuidcurrency: '{{ session('UUIDCURRENCY') }}',
                currency: '{{ session('SIMBOLCURRENCY') }}',
                nilaikurs: 1,
                discpersen: 0,
                disc: 0,
                disckurs: 0,
                subtotal: 0,
                terpenuhiso: 0,
                hargaterendah: satuan == data.satuan ? data.hargaminsatuan : (satuan == data.satuan2 ? data
                  .hargaminsatuan2 : data.hargaminsatuan3),
                disccustomermin: disccustomermin,
                disctipecustomermin: disctipecustomermin,
                discmerkmin: discmerkmin,
                disccustomermax: disccustomermax,
                disctipecustomermax: disctipecustomermax,
                discmerkmax: discmerkmax,
                pakaippn: defaultpakaippn,
                ppnpersen: ppnpersenaktif,
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

              try {
                const res = await fetchData(
                  '{{ session('TOKEN') }}',
                  link_api.getStokBarangSatuan, {
                    uuidbarang: row.uuidbarang,
                    uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
                    satuan: changes.satuan,
                    tgltrans: $('#TGLTRANS').datebox('getValue')
                  }
                );
                if (res.success) {
                  stok = res.data.saldoqty;
                  row_update['jmlstok'] = stok;
                } else {
                  $.messager.alert('Warning', res.message, 'warning');
                }
              } catch (e) {
                const error = (typeof e === 'string') ? e : e.message;
                const textError = getTextError(error);
                $.messager.alert('Error', textError, 'error');
              }

              break;
            case 'currency':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var idcurrency = data ? data.uuidcurrency : '';
              var nilai = get_kurs($('#TGLTRANS').datebox('getValue'), idcurrency);
              row_update = {
                uuidcurrency: idcurrency,
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

          if (changes.kodebarang) {
            if ($('#IDLOKASI').combogrid('getValue') != '') {
              const payload = {
                uuidbarang: row.uuidbarang,
                uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
                tgltrans: $('#TGLTRANS').datebox('getValue'),
                satuan: row.satuan
              };
              fetchData(
                '{{ session('TOKEN') }}',
                link_api.getStokBarangSatuan,
                payload
              ).then(res => {
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
                  $.messager.alert('Warning', res.message, 'warning');
                }
              }).catch(e => {
                const error = (typeof e === "string") ? e : e.message;
                const textError = getTextError(error);
                $.messager.alert('Error', textError, 'error');
              });
            }
          }
        },
        onLoadSuccess: function(data) {
          hitung_grandtotal();
        },
        onAfterDeleteRow: function(index, row) {
          hitung_grandtotal();
        },
        onAfterEdit: function(index, row, changes) {
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
              field: 'jmldo',
              title: 'Jml DO',
              align: 'right',
              width: 60,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
              }
            },
            {
              field: 'terpenuhido',
              title: 'Terpenuhi DO',
              align: 'right',
              width: 85,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
              }
            },
            {
              field: 'sisado',
              title: 'Sisa DO',
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
            url: link_api.informasiTransReferensi,
            method: 'post',
            queryParams: {
              idtrans: idtrans,
              uuidbarang: row.uuidbarang,
              jenis: 'PENJUALAN'
            },
            fitColumns: true,
            singleSelect: true,
            rownumbers: true,
            loadMsg: '',
            height: 'auto',
            columns: [
              [{
                  field: 'kodebbk',
                  title: 'No BBK',
                  width: 100,
                },
                {
                  field: 'tgltrans',
                  title: 'Tgl. Trans',
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

    function hitung_subtotal_detail(index, row) {
      // hitung diskon lebih dahulu
      var data = {};
      var harga = parseFloat(row.harga);
      var hargaterendah = 0;
      var dg = $('#table_data_detail');
      var totaldisc = 0;
      var discount = 0;

      row.jmldo = parseFloat(row.jmldo).toFixed({{ session('DECIMALDIGITQTY') }});
      row.terpenuhiso = parseFloat(row.terpenuhiso).toFixed({{ session('DECIMALDIGITQTY') }});
      row.jmlso = parseFloat(row.jmlso).toFixed({{ session('DECIMALDIGITQTY') }});

      data.jmldo = row.jmldo;
      console.log(data.jmlso, row.terpenuhiso, row.jmldo);
      data.sisaso = row.jmlso - row.terpenuhiso - row.jmldo;
      if (isNaN(data.sisaso)) data.sisaso = 0;

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
        var diskon_default = '';

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
          diskon_default = row.disccustomermin;
          maxdiskon = row.disccustomermax;
          mindiskon = row.disccustomermin;
        } else if (parseFloat(row.disctipecustomermin) > 0 || parseFloat(row.disctipecustomermax) > 0) {
          diskon_default = row.disctipecustomermin;
          maxdiskon = row.disctipecustomermax;
          mindiskon = row.disctipecustomermin;
        } else if (parseFloat(row.discmerkmin) > 0 || parseFloat(row.discmerkmax) > 0) {
          diskon_default = row.discmerkmin;
          maxdiskon = row.discmerkmax;
          mindiskon = row.discmerkmin;
        }

        if (parseFloat(maxdiskon) > 0) {
          hargajualmin2 = parseFloat(hargajualmax) - Math.round(hargajualmax * hitungAkumulasiDiskonPersen(maxdiskon) /
            100);
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


      data.subtotal = harga * data.jmldo;

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
        jmldo: 0,
        sisado: 0,
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

        footer.jmlpr += parseFloat(data[i].jmlpr);
        footer.akumulasipr += parseFloat(data[i].akumulasipr);
        footer.sisapr += parseFloat(data[i].sisapr);
        footer.jmldo += parseFloat(data[i].jmldo);
        footer.sisado += parseFloat(data[i].sisado);
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

    async function hitung_stok() {
      var rows = $('#table_data_detail').datagrid('getRows');

      if (rows.length == 0) {
        return false;
      }

      if ($('#IDLOKASI').combogrid('getValue') == '') {
        return false;
      }

      try {
        const res = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.hitungStokTransaksiBarang, {
            uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
            tgltrans: $('#TGLTRANS').datebox('getValue'),
            data_detail: rows,
          }
        );

        if (res.success) {
          rows = $('#table_data_detail').datagrid('getRows');
          // pengecekan untuk mengatasi proses async dalam fungsi tambah()
          // dimana ada code untuk clear datagrid
          if (rows.length == 0) {
              return false;
          }
          for (var i = 0; i < res.detail.length; i++) {
            $('#table_data_detail').datagrid('updateRow', {
              index: i,
              row: {
                jmlstok: res.detail[i].jmlstok
              }
            });
          }
        } else {
          $.messager.alert('Warning', res.message, 'warning');
        }
      } catch (e) {
        const error = (typeof e === "string") ? e : e.message;
        console.log(error);
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }

    async function get_harga_barang(idbarang, jumlah) {
      var idcustomer = $("#IDCUSTOMER").combogrid('getValue');
      var tgltrans = $("#TGLTRANS").datebox('getValue');
      var idlokasi = $('#IDLOKASI').combogrid('getValue');
      var harga = {};

      if (idcustomer == '') {
        return harga;
      } else {
        try {
          const res = await fetchData(
            '{{ session('TOKEN') }}',
            link_api.getHargaBarang, {
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
            $.messager.alert('Warning', res.message, 'warning');
          }
        } catch (e) {
          const error = (typeof e === "string") ? e : e.message;
          const textError = getTextError(error);
          $.messager.alert('Error', textError, 'error');
        }
      }

      return harga;
    }
  </script>
@endpush
