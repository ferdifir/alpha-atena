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
            <div data-options="region:'north',border:false" style="width:100%; height:165px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;">
              </div>

              <input type="hidden" id="mode" name="mode">
              <input type="hidden" id="TGLENTRY" name="tglentry">
              <table>
                <tr>
                  <td valign="top">
                    <fieldset style="height:147px;">
                      <legend id="label_laporan">Info Transaksi</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form">No. Pesanan Pembelian</td>
                          <td id="label_form"><input name="kodepo" id="KODEPO" class="label_input"
                              style="width:190px"></td>
                          <input type="hidden" id="IDPO" name="uuidpo">
                        </tr>
                        <tr hidden>
                          <td id="label_form">No. Pesanan Pembelian Manual</td>
                          <td id="label_form"><input name="nopomanual" id="NOPOMANUAL" class="label_input"
                              style="width:190px"></td>
                        </tr>
                        <tr>
                          <td id="label_form">Lokasi</td>
                          <td id="label_form"><input name="uuidlokasi" id="IDLOKASI" style="width:190px"></td>
                          <input type="hidden" id="KODELOKASI" name="kodelokasi">
                        </tr>
                        <tr id="noprwrapper">
                          <td id="label_form">No. PR</td>
                          <td id="label_form">
                            <input name="uuidpr" id="IDPR" style="width:190px">
                            <input type="hidden" name="kodepr" id="KODEPR">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">No. Analisis PO</td>
                          <td id="label_form">
                            <input name="uuidanalisispo" id="IDANALISISPO" style="width:190px">
                            <input type="hidden" name="kodeanalisispo" id="KODEANALISISPO">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Tgl. Trans</td>
                          <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date" required
                              style="width:190px"></td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td valign="top">
                    <div id="tab trans" class="easyui-tabs" style="width:380px;height:147px;">
                      <!--data-options="tabPosition:'left'"-->
                      <div title="Info Supplier">
                        <table border="0">
                          <tr>
                            <td id="label_form">Kode</td>
                            <td>
                              <input name="uuidsupplier" class="label_input" id="IDSUPPLIER" style="width:100px">
                              <input type="hidden" id="KODESUPPLIER" name="kodesupplier">
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
                        <table>
                          <tr>
                            <td id="label_form">No. Rek</td>
                            <td colspan="2">
                              <input name="norekening" class="label_input" id="NOREKENING" style="width:285px"
                                readonly prompt="No. Rekening Supplier">
                            </td>
                          </tr>
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
                            <td><label id="label_form">Ada NPWP </label></td>
                            <td>
                              <input type="checkbox" value="1" name="adanpwp" id="ADANPWP">
                              <input name="npwp" class="label_input" id="NPWP" style="width:262px" readonly
                                prompt="NPWP Supplier">
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </td>
                  <td id="label_form" valign="bottom">
                    <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                      style="width:280px; height:105px" data-options="validType:'length[0, 500]'"></textarea>
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
              </div>
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:35px;">
              <table id="trans_footer" width="100%">
                <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input
                    :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl.
                    Input :</label> <label id="lbl_tanggal"></label></td>
                <td align='right' id="lihatTotalHarga">
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
                      <td align="right">
                        <label id="label_form">PPN
                          <input name="ppnrp" id="PPNRP" class="number" style="width:110px;" readonly>
                        </label>
                      </td>
                      <td align="right">
                        <label id="label_form">
                          PPH 22
                          <input name="pph22rp" id="PPH22RP" class="number" style="width:110px;" readonly>
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
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan &
          Cetak</a>

        <div>
    </center>
  </div>

  <div id="form_cetak" title="Preview" style="width:660px; height:450px">
    <div id="area_cetak"></div>
  </div>
@endsection

@push('js')
  <script>
    var cekbtnsimpan = true;
    var ppnpersenaktif = 0;
    var lihatharga = false;
    var inputharga = false;
    var configtranspr = "";
    var configpakaipr = "";
    var idtrans = "";
    var row = {};
    var indexCellEdit = -1;
    $(document).ready(async function() {
      let check1 = false;
      let check2 = false;
      let check3 = false;
      let check4 = false;
      let aksesubah = 0;
      const promises = [];
      promises.push(getConfig('KODEPO', 'TPO', 'bearer {{ session('TOKEN') }}',
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
      promises.push(getConfig('PAKAIPR', 'TPO', 'bearer {{ session('TOKEN') }}',
        function(response) {
          if (response.success) {
            configpakaipr = response.data.value;
            check4 = true;
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

      promises.push(getConfig('TRANSAKSIPR', 'TPO', 'bearer {{ session('TOKEN') }}',
        function(response) {
          if (response.success) {
            configtranspr = response.data.value;
            check2 = true;
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
        check3 = true;
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
      if (!check1 || !check2 || !check3 || !check4) return;

      if (!lihatharga) {
        $('#lihatTotalHarga').hide();
      }
      if (configtranspr != "HEADER") {
        $("#noprwrapper").hide();
      }
      if (config.value == "AUTO") {
        $('#KODEPO').textbox({
          prompt: "Auto Generate",
          readonly: true,
          required: false
        });
      } else {
        $('#KODEPO').textbox({
          prompt: "",
          readonly: false,
          required: true
        });
        $('#KODEPO').textbox('clear').textbox('textbox').focus();
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
            export_excel('Faktur Purchase Order', $("#area_cetak").html());
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

      // get_status_trans("atena/Pembelian/Transaksi/PesananPembelian", row.idpo, function(data) {
      //     $(".form_status").html(status_transaksi(data.status));
      // });

      browse_data_supplier('#IDSUPPLIER');
      browse_data_syaratbayar('#IDSYARATBAYAR');
      browse_data_lokasi('#IDLOKASI');
      browse_data_analisispo('#IDANALISISPO');
      if (configtranspr == "HEADER") {
        browse_data_pr('#IDPR');
      }

      $('#TGLTRANS').datebox({
        onChange: async function(newVal, oldVal) {
          var nilaikurs = 0;
          var harga = 0;
          var row_detail = $('#table_data_detail').datagrid('getRows');
          if (configtranspr == "HEADER") {
            var row_pr = $('#IDPR').combogrid('grid').datagrid('getSelected');
            if (row_pr) {
              var time_po = Date.parse(newVal);
              var time_pr = Date.parse(row_pr.tgltrans);

              if (time_po < time_pr) {
                $.messager.alert('Error',
                  'Tanggal transaksi tidak boleh sebelum tanggal PR yang dipilih',
                  'error');

                $(this).datebox('setValue', oldVal);

                return false;
              }
            }
          }

          var row_detail = $('#IDSYARATBAYAR').combogrid('grid').datagrid('getSelected');

          if ($('#mode').val() != '' && row_detail)
            get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'),
              row_detail.SELISIH);

          if ($('#mode').val() == 'tambah') {
            hitung_stok();
          }
          bukaLoader();
          await set_ppn_aktif(newVal, 'bearer {{ session('TOKEN') }}', async function(
            response) {
            ppnpersenaktif = response.data.ppnpersen;

            update_ppn_table_detail($('#table_data_detail'), ppnpersenaktif,
              function(index, row) {
                hitung_subtotal_detail(index, row);
              });

            hitung_grandtotal();
          });
          tutupLoader()
        }
      });

      $("[name=pakaippn]").change(function() {
        $("#PPNPERSEN").numberbox('setValue', $(this).val() == 0 ? 0 : ppnpersenaktif);
        hitung_grandtotal();
      });

      $("[name=pakaipph]").change(function() {
        $("#PPHPERSEN").numberbox('setValue', $(this).val() == 0 ? 0 : {{ session('PPH22PERSEN') ?? 0 }});
        hitung_grandtotal();
      });

      $('#DISKON').numberbox({
        readonly: !inputharga,
        onChange: function() {
          total = $('#TOTAL').numberbox('getValue');
          diskon = $('#DISKON').numberbox('getValue');

          $('#DISKONRP').numberbox('setValue', (total * (diskon / 100))).prop('readonly',
            (
              diskon > 0 ? true : false));

          hitung_grandtotal();
        }
      });

      $('#DISKONRP').numberbox({
        readonly: !inputharga,
        onChange: function() {
          hitung_grandtotal();
        }
      });

      $('#PEMBULATAN').numberbox({
        readonly: !inputharga,
        onChange: function() {
          hitung_grandtotal();
        }
      });

      if (configtranspr == "HEADER") {
        $('#IDPR').combogrid({
          required: configpakaipr == "YA" ? true : false
        });
      }

      buat_table_detail();
      buat_table_detail_rekap();
      buat_table_detail_pembayaran();
      @if ($mode == 'tambah')
        await tambah();
      @elseif ($mode == 'ubah')
        await ubah(aksesubah);
      @endif

      tutupLoader();

    })

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    async function cetak(uuidtrans) {
      try {
        $("#window_button_cetak").window('close');
        let url = link_api.cetakPesananPembelian + uuidtrans;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidpo: uuidtrans,
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
        console.log(error);
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
      }

    }

    async function tambah() {

      $('#mode').val('tambah');

      enableAddRow();

      $('#lbl_kasir, #lbl_tanggal').html('');
      if (configtranspr == "HEADER") {
        $('#IDPR').combogrid('clear');
      }

      $('#IDSUPPLIER').combogrid('readonly', false);
      $('#IDLOKASI').combogrid('readonly', false);
      $('#TGLTRANS').datebox('readonly', false);
      idtrans = "";
      try {
        let url = link_api.getLokasiDefault;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({}),
        }).then(response => {
          if (!response.ok) {
            throw new Error(
              `HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })

        if (response.success) {
          var dataLokasi = response.data ?? {};
          if (!Array.isArray(dataLokasi)) {
            if ((dataLokasi.uuidlokasi ?? "") != "" && (dataLokasi.lokasidefault ?? 1) == 1) {

              $('#IDLOKASI').combogrid('setValue', {
                uuidlokasi: dataLokasi.uuidlokasi,
                nama: dataLokasi.namalokasi,
              });
              $("#KODELOKASI").val(dataLokasi.kodelokasi);
            }
          }
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
      }

      if (!inputharga) {
        $(':radio:not(:checked)').attr('disabled', true);
      }


      clear_plugin();
      reset_detail();
    }

    async function ubah(aksesubah) {
      $(':radio:not(:checked)').attr('disabled', false);
      $('#mode').val('ubah');
      try {
        let url = link_api.loadDataHeaderPesananPembelian;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidpo: '{{ $data }}',
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

        if (!inputharga) {
          $(':radio:not(:checked)').attr('disabled', true);
        }

        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);
        var statusTrans = await getStatusTrans(link_api.getStatusTransPesananPembelian,
          'bearer {{ session('TOKEN') }}', {
            uuidpo: row.uuidpo
          });
        $(".form_status").html(status_transaksi(statusTrans));
        if (aksesubah && statusTrans == "I") {
          $('#btn_simpan_modal').css('filter', '');
          $('#mode').val('ubah');
        } else {
          $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
          $('#btn_simpan_modal').removeAttr('onclick');
        }



        $("#form_input").form('load', row);

        $('#IDSUPPLIER').combogrid('setValue', {
          uuidsupplier: row.uuidsupplier,
          kode: row.kodesupplier
        });

        $('#IDSUPPLIER').combogrid('readonly', false);

        $('#IDLOKASI').combogrid('readonly');
        $('#TGLTRANS').datebox('readonly', false);

        if (configtranspr == "HEADER") {
          $('#IDPR').combogrid('readonly', true);
          $('#IDPR').combogrid('setValue', {
            uuidpr: row.uuidpr,
            kodepr: row.kodepr
          });

          if (row.idpr != 0) {
            disableAddRow();
          }
        }

        if (row.uuidanalisispo == "") {
          $('#IDANALISISPO').combogrid('readonly');

          $('#IDANALISISPO').combogrid('setValue', {
            uuidanalisispo: row.uuidanalisispo,
            kode: row.kodeanalisispo
          });

          $('#KODEANALISISPO').val(row.kodeanalisispo);
        }

        idtrans = row.uuidpo;
        await load_data(row.uuidpo);
        await load_data_rekap(row.uuidpo);
        await load_data_pembayaran(row.uuidpo);
      }
    }

    async function simpan(jenis_simpan) {
      $(':radio:not(:checked)').attr('disabled', false);
      var mode = $("#mode").val();

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));
      $('#data_detail_pembayaran').val(JSON.stringify($('#table_data_detail_pembayaran').datagrid('getRows')));
      if (configpakaipr == "YA" && configtranspr == "DETAIL") {
        var rows = $('#table_data_detail').datagrid('getRows');

        for (var i in rows) {
          if (rows[i].kodepr == null || rows[i].kodepr == '') {
            $.messager.alert('Error', 'Terdapat detail transaksi yang belum memilih PR', 'error');

            return false;
          }
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
              var sendDetail = [];
              for (var i = 0; i < datadetail.length; i++) {
                sendDetail.push(datadetail[i]);
              }
              body[n['name']] = sendDetail;
            } else if (n['name'] == "data_detail_pembayaran") {
              var datadetail = $('#table_data_detail_pembayaran').datagrid('getRows');

              var sendDetail = [];
              for (var i = 0; i < datadetail.length; i++) {
                sendDetail.push(datadetail[i]);
              }
              body[n['name']] = sendDetail;
            } else {
              body[n['name']] = n['value'];
            }
          });
          body['jenis_simpan'] = jenis_simpan;
          // Cek apakah body adalah instance dari FormData
          if (body instanceof FormData) {
            // Jika FormData, jangan set 'Content-Type'. Browser akan melakukannya secara otomatis.
            requestBody = body;
          } else {
            // Default: Jika bukan FormData, asumsikan itu JSON.
            headers['Content-Type'] = 'application/json';
            requestBody = body ? JSON.stringify(body) : null;
          }
          let url = link_api.simpanPesananPembelian;
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
            if (jenis_simpan == 'simpan_cetak') {
              await cetak(response.data.uuidpo);
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
      $('#table_data_detail_rekap').datagrid('loadData', []);
      $('#table_data_detail_pembayaran').datagrid('loadData', []);
    }

    async function load_data(idtrans) {
      try {
        let url = link_api.loadDataPesananPembelian;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidpo: idtrans,
            mode: "ubah",
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })
        if (response.success) {
          $('#table_data_detail').datagrid('loadData', response.data);
          var rows = response.data;
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


    async function load_data_detail_pr(idpr) {
      try {
        bukaLoader();
        let url = link_api.loadDataDetailPermintaanBarangPesananPembelian;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidpr: idpr,
            uuidsupplier: $('#IDSUPPLIER').combogrid('getValue'),
            tgltrans: $('#TGLTRANS').datebox('getValue')
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })
        if (response.success) {
          $('#table_data_detail').datagrid('loadData', response.data);
          var rows = response.data;
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
      tutupLoader();
    }

    async function load_data_detail_analisispo(uuidanalisispo) {
      try {
        bukaLoader();
        let url = link_api.loadDataDetailAnalisisPesananPembelian;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidanalispo: uuidanalisispo,
            uuidsupplier: $('#IDSUPPLIER').combogrid('getValue'),
            tgltrans: $('#TGLTRANS').datebox('getValue')
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })
        if (response.success) {
          $('#table_data_detail').datagrid('loadData', response.data);
          var rows = response.data;
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
      tutupLoader();
    }

    async function load_data_rekap(idtrans) {
      try {
        let url = link_api.loadDataRekapPesananPembelian;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidpo: idtrans,
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })
        if (response.success) {
          $('#table_data_detail_rekap').datagrid('loadData', response.data);
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        console.log(error);
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
      }
    }

    async function load_data_pembayaran(idtrans) {
      try {
        let url = link_api.loadDataPembayaranPesananPembelian;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidpo: idtrans,
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })
        if (response.success) {
          $('#table_data_detail_pembayaran').datagrid('loadData', response.data);
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
        panelWidth: 330,
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
              width: 100,
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
          if (configtranspr == "HEADER") {
            $('#IDPR').combogrid('grid').datagrid('options').url = link_api
              .browsePermintaanBarangPesananPembelian;
            $('#IDPR').combogrid('grid').datagrid('load', {
              "uuidlokasi": row.uuidlokasi,
            });
          }
        },
        onLoadSuccess: function(data) {
          if (data.total == 1) {
            var rows = data.rows;
            $(this).combogrid('setValue', rows[0].kode).combogrid('readonly');
          }
        },
        onChange: function(newVal, oldVal) {
          if ($('#mode').val() != '') {
            reset_detail();
          }

          $('#IDANALISISPO').combogrid('clear');
          $('#KODEANALISISPO').val('');

          if ($('#mode').val() == 'tambah' && configtranspr == "HEADER") {

            $('#IDPR').combogrid('clear');
            $('#KODEPR').val('');

          }
        }
      });
    }

    function browse_data_pr(id) {
      $(id).combogrid({
        panelWidth: 600,
        mode: 'remote',
        idField: 'uuidpr',
        textField: 'kodepr',
        columns: [
          [{
              field: 'uuidpr',
              hidden: true
            },
            {
              field: 'kodepr',
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
        onSelect: function(index, row) {
          var uuidsupplier = $('#IDSUPPLIER').combogrid('getValue');
          var time_po = Date.parse($('#TGLTRANS').datebox('getValue'));
          var time_pr = Date.parse(row.tgltrans);

          if (uuidsupplier == '') {
            $.messager.alert('Warning', 'Supplier belum dipilih', 'warning');

            $('#IDPR').combogrid('clear');
            $('#KODEPR').val('');

            return false;
          }

          if (time_po < time_pr) {
            $.messager.alert('Error',
              'Tanggal transaksi tidak boleh sebelum tanggal PR yang dipilih', 'error');

            $('#IDPR').combogrid('clear');
            $('#KODEPR').val('');

            return false;
          }

          $('#table_data_detail').datagrid('loadData', []);

          $('#KODEPR').val(row.kodepr);

          $('#IDANALISISPO').combogrid('clear');
          $('#KODEANALISISPO').val('');

          load_data_detail_pr(row.uuidpr);

          disableAddRow();
        }
      });
    }

    function browse_data_analisispo(id) {
      $(id).combogrid({
        panelWidth: 600,
        mode: 'remote',
        idField: 'uuidanalispo',
        textField: 'kode',
        columns: [
          [{
              field: 'uuidanalispo',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 150
            },
            {
              field: 'namalokasi',
              title: 'Lokasi',
              width: 150
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
        onSelect: function(index, row) {
          var idsupplier = $('#IDSUPPLIER').combogrid('getValue');
          var time_po = Date.parse($('#TGLTRANS').datebox('getValue'));
          var time_analisispo = Date.parse(row.tgltrans);

          if (idsupplier == '') {
            $.messager.alert('Warning', 'Supplier belum dipilih', 'warning');

            $('#IDANALISISPO').combogrid('clear');
            $('#KODEANALISISPO').val('');

            return false;
          }

          if (time_po < time_analisispo) {
            $.messager.alert('Error',
              'Tanggal transaksi tidak boleh sebelum tanggal analisis PO yang dipilih',
              'error');

            $('#IDANALISISPO').combogrid('clear');
            $('#KODEANALISISPO').val('');

            return false;
          }

          if (configtranspr == "HEADER") {
            $('#IDPR').combogrid('clear');
            $('#KODEPR').val('');
          }

          $('#KODEANALISISPO').val(row.kode);

          $('#table_data_detail').datagrid('loadData', []);

          load_data_detail_analisispo(row.id);

          disableAddRow();
        }
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
          $("#KODESUPPLIER").val(row.kode);
        },
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');

          if (row) {
            if (row.npwp) {
              $('#ADANPWP').prop("checked", true);
            } else {
              $('#ADANPWP').prop("checked", false);
            }

            $('#NAMASUPPLIER').textbox('setValue', row.nama);
            $('#ALAMAT').textbox('setValue', row.alamat);
            $('#TELP').textbox('setValue', row.telp);
            $('#NOREKENING').textbox('setValue', row.norekening);
            $('#CONTACTPERSON').textbox('setValue', row.contactperson);
            $('#TELPCP').textbox('setValue', row.telpcp);
            $('#NPWP').textbox('setValue', row.npwp);
            $('#IDSYARATBAYAR').combogrid('setValue', row.uuidsyaratbayar);

            var uuidlokasi = $('#IDLOKASI').combogrid('getValue');

            $('#IDANALISISPO').combogrid('grid').datagrid('options').url = link_api
              .browseAnalisisPesananPembelianPO;
            $('#IDANALISISPO').combogrid('grid').datagrid('load', {
              uuidlokasi: uuidlokasi,
              uuidsupplier: row.uuidsupplier,
            });
          } else {
            $('#NAMASUPPLIER').textbox('clear');
            $('#IDSYARATBAYAR').combogrid('clear');
          }
          if ($('#mode').val() != '') {
            reset_detail();
          }
        },
        onLoadSuccess: function(rows) {
          if ($('#mode').val() == 'ubah') {
            $('#IDSUPPLIER').combogrid('setValue', {
              uuidsupplier: row.uuidsupplier,
              kode: row.kodesupplier
            });
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
        onSelect: function(index, row) {},
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');
          if ($('#mode').val() != '' && row) {
            get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), row
              .selisih)
          }
        },
      });
    }
    var defaultpakaippn = "{{ session('DEFAULTPAKAIPPN') }}";

    function browse_data_perkiraan(id) {
      $(id).combogrid({
        panelWidth: 330,
        mode: 'remote',
        idField: 'kode',
        textField: 'kode',
        url: 'config/comboGrid.php?table=kode_perkiraan&jenis=detail',
        columns: [
          [{
              field: 'kode',
              title: 'Kode',
              width: 80
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 220
            },
          ]
        ],
        onSelect: function(index, row) {},
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');
          $('#NAMAPERKIRAANBIAYA').textbox('setValue', row ? row.nama : '');
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
        // UNTUK TOMBOL EDIT
        toolbar: [{
            text: 'Tambah',
            iconCls: 'icon-add',
            handler: function() {
              var index = $(dg).datagrid('getRows').length;
              var kodepr = configtranspr == "HEADER" ? $("#IDPR").combogrid("getValue") : "";

              if (configtranspr == "HEADER" && $('#IDPR').combogrid('getValue') != '') {
                $.messager.alert('Error',
                  'Tidak bisa menambah data, karena mengacu pada Permintaan Barang',
                  'warning');
                return false;
              }

              if (kodepr == '') {
                $(dg).datagrid('appendRow', {
                  kodepr: '',
                  kodebarang: '',
                  jmltoleransi: 0,
                }).datagrid('gotoCell', {
                  index: index,
                  field: 'kodebarang'
                });

                // getRowIndex(target);
              }
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
        frozenColumns: [
          [{
              field: 'uuidpr',
              hidden: true
            },
            {
              field: 'kodepr',
              hidden: configtranspr == "HEADER",
              title: 'No. PR',
              width: 120,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 600,
                  mode: 'remote',
                  idField: 'kodepr',
                  textField: 'kodepr',
                  required: configpakaipr == "YA",
                  columns: [
                    [{
                        field: 'uuidpr',
                        hidden: true
                      },
                      {
                        field: 'kodepr',
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
                  panelWidth: 690,
                  mode: 'remote',
                  required: true,
                  idField: 'kodebarang',
                  textField: 'kodebarang',
                  onBeforeLoad: function(param) {
                    if ('undefined' === typeof param.q || param.q.length == 0) {
                      return false;
                    }
                    if (indexCellEdit < 0) {
                      return param;
                    }
                    var row = $('#table_data_detail').datagrid('getRows')[
                      indexCellEdit];
                    console.log(row);
                    var sendParam = {};
                    if (row.kodepr != '' && row.kodepr != 0 && row.kodepr != null) {
                      sendParam = {
                        q: param.q,
                        uuidpr: row.uuidpr,
                      };
                      param.uuidpr = row.uuidpr;
                    } else {
                      var uuidsupplier = $('#IDSUPPLIER').combogrid('getValue');
                      var uuidlokasi = $('#IDLOKASI').combogrid('getValue');
                      sendParam = {
                        q: param.q,
                        uuidsupplier: uuidsupplier,
                        uuidlokasi: uuidlokasi,
                        jenis: "po",
                      };
                      param.uuidsupplier = uuidsupplier;
                      param.uuidlokasi = uuidlokasi;
                      param.jenis = "po";
                    }
                    // return sendParam;
                  },
                  columns: [
                    [{
                        field: 'uuidbarang',
                        hidden: true
                      },
                      {
                        field: 'kodebarang',
                        title: 'Kode',
                        width: 100
                      },
                      {
                        field: 'namabarang',
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
              title: 'Nama',
              width: 200,
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
              field: 'jmlstok',
              title: 'Stok',
              align: 'right',
              width: 60,
              formatter: format_qty
            },
            {
              field: 'jmlpo',
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
              field: 'jmltoleransi',
              title: '% Toleransi',
              align: 'right',
              width: 100,
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
              width: 80,
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
              field: 'uuidcurrency',
              title: 'Id Currency',
              hidden: true
            },
            {
              field: 'currency',
              title: 'Mata Uang',
              width: 50,
              @if (session('MULTICURRENCY'))
                hidden: !lihatharga,
              @endif
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
              align: 'right',
              width: 85,
              formatter: format_amount,
              hidden: !lihatharga,
              styler: function(index, row) {
                if (parseFloat(row.hargabeli) > 0 && parseFloat(row.hargabeli) > parseFloat(
                    row.harga) - parseFloat(row.disc)) {
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
              width: 85,
              formatter: format_amount,
              hidden: !lihatharga,
              editor: !inputharga ? null : {
                type: 'numberbox',
                options: {
                  required: true
                }
              },
            },
            {
              field: 'discpersen',
              title: 'Disc(%)',
              align: 'center',
              width: 100,
              hidden: !lihatharga,
              editor: !inputharga ? null : {
                type: 'textbox'
              }
            },
            {
              field: 'disc',
              title: 'Disc',
              align: 'right',
              width: 65,
              hidden: !lihatharga,
              formatter: format_amount,
              editor: !inputharga ? null : {
                type: 'numberbox'
              }
            },
            {
              field: 'subtotal',
              title: 'Subtotal',
              align: 'right',
              width: 95,
              hidden: !lihatharga,
              formatter: format_amount
            },
            {
              field: 'nilaikurs',
              title: 'Kurs ({{ session('SIMBOLCURRENCY') }})',
              align: 'right',
              width: 60,
              formatter: format_amount,
              @if (session('MULTICURRENCY'))
                hidden: !lihatharga,
              @endif
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
              align: 'right',
              width: 85,
              @if (session('MULTICURRENCY'))
                hidden: !lihatharga,
              @endif
              formatter: format_amount
            },
            {
              field: 'disckurs',
              title: 'Disc ({{ session('SIMBOLCURRENCY') }})',
              align: 'right',
              width: 65,
              @if (session('MULTICURRENCY'))
                hidden: !lihatharga,
              @endif
              formatter: format_amount,
            },
            {
              field: 'subtotalkurs',
              title: 'Subtotal ({{ session('SIMBOLCURRENCY') }})',
              align: 'right',
              width: 95,
              @if (session('MULTICURRENCY'))
                hidden: !lihatharga,
              @endif
              formatter: format_amount
            },
            {
              field: 'pakaippn',
              title: 'Pakai PPN',
              align: 'center',
              width: 65,
              hidden: !lihatharga,
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
              hidden: !lihatharga,
              formatter: format_amount
            },
            {
              field: 'ppnpersen',
              title: 'PPN (%)',
              align: 'right',
              width: 70,
              hidden: !lihatharga,
              formatter: format_amount_2,
              editor: !inputharga ? null : {
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
              align: 'right',
              width: 70,
              hidden: !lihatharga,
              formatter: format_amount
            },
            {
              field: 'pph22persen',
              title: 'PPH 22 (%)',
              align: 'right',
              width: 75,
              formatter: format_amount_2,
              hidden: !lihatharga,
              editor: !inputharga ? null : {
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
              title: 'PPH 22 ({{ session('SIMBOLCURRENCY') }})',
              align: 'right',
              width: 75,
              formatter: format_amount,
              hidden: !lihatharga,
            },
          ]
        ],
        //UNTUK TOMBOL EDIT
        onClickRow: function(index, row) {
          indexDetail = index;
        },
        onBeforeCellEdit: function(index, field) {
          var idanalisispo = $('#IDANALISISPO').combogrid('getValue');

          if (idanalisispo > 0) {
            if (['kodebarang', 'jmlpo', 'satuan'].indexOf(field) >= 0) {
              return false;
            }
          }
        },
        onCellEdit: function(index, field, val) {
          indexCellEdit = index;
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);
          if (field == 'kodebarang') {
            ed.combogrid('showPanel');

            if (row.kodepr != '' && row.kodepr != 0 && row.kodepr != null) {
              ed.combogrid('grid').datagrid('options').url = link_api
                .browseBarangPermintaanBarang;
              ed.combogrid('grid').datagrid('load', {
                q: '',
                uuidpr: row.uuidpr,
              });
            } else {
              var uuidsupplier = $('#IDSUPPLIER').combogrid('getValue');
              var uuidlokasi = $('#IDLOKASI').combogrid('getValue');

              if (uuidsupplier == '') {
                $.messager.alert('Peringatan', 'Supplier belum diisi', 'warning');

                $(this).datagrid('deleteRow', index);

                return false;
              }

              if (uuidlokasi == '') {
                $.messager.alert('Peringatan', 'Lokasi belum diisi', 'warning');

                $(this).datagrid('deleteRow', index);

                return false;
              }
              ed.combogrid('grid').datagrid('options').url = link_api.browseBarangBySupplier;
              ed.combogrid('grid').datagrid('load', {
                q: '',
                uuidsupplier: uuidsupplier,
                uuidlokasi: uuidlokasi,
                jenis: "po",
              });
            }
          } else if (field == 'satuan') {
            ed.combogrid('grid').datagrid('options').url = link_api.loadSatuanBarang;
            ed.combogrid('grid').datagrid('load', {
              q: '',
              uuidbarang: row.uuidbarang,
            });
            ed.combogrid('showPanel');
          } else if (field == 'currency') {
            ed.combogrid('showPanel');
          } else if (field == 'pakaippn') {
            ed.combogrid('showPanel');
          } else if (field == 'kodepr') {
            var uuidlokasipengirim = $('#IDLOKASI').combogrid('getValue');

            ed.combogrid('grid').datagrid('options').url = link_api
              .browsePermintaanBarangPesananPembelian;
            ed.combogrid('grid').datagrid('load', {
              q: '',
              uuidlokasi: uuidlokasipengirim,
            });
            ed.combogrid('showPanel');
          }
        },
        onEndEdit: async function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data_detail', index, cell.field);
          var row_update = {};
          bukaLoader();
          try {
            switch (cell.field) {
              case 'kodepr':
                var data = ed.combogrid('grid').datagrid('getSelected');
                row_update = {
                  uuidpr: data.uuidpr,
                  uuidbarang: 0,
                  namabarang: '',
                  barcodesatuan1: '',
                  partnumber: '',
                  tutup: 0,
                  satuan_lama: '',
                  satuan: '',
                  satuanutama: '',
                  jmlpo: 0,
                  tempjmlpo: 0,
                  sisapo: 0,
                  hargabeli: hargabeli,
                  harga: harga,
                  uuidcurrency: '{{ session('UUIDCURRENCY') }}',
                  currency: '{{ session('SIMBOLCURRENCY') }}',
                  nilaikurs: 1,
                  discpersen: 0,
                  disc: 0,
                  disckurs: 0,
                  subtotal: 0,
                  pakaippn: 0,
                  ppnpersen: ppnpersenaktif,
                  pph22persen: {{ session('PPH22PERSEN') ?? 0 }},
                };
                break;
              case 'kodebarang':
                var data = ed.combogrid('grid').datagrid('getSelected');
                var uuidbarang = data ? data.uuidbarang : '';
                var ppn = data ? data.ppn : '';
                var kodebrg = data ? data.kodebarang : '';
                var nama = data ? data.namabarang : '';
                var satuan = data ? data.satuanutama : '';
                var satuanutama = data ? data.satuanutama : '';
                var subtotal = harga * 1;
                var harga = await get_harga_barang(uuidbarang);
                var hargabeli = await get_harga_barangbeli(uuidbarang, satuan);
                var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
                var partnumber = data.partnumber ? data.partnumber : '';
                var jml = data.jml ? data.jml : 0;

                row_update = {
                  uuidbarang: uuidbarang,
                  ppn: ppn,
                  namabarang: nama,
                  barcodesatuan1: barcodesatuan1,
                  partnumber: partnumber,
                  tutup: 0,
                  satuan_lama: satuan,
                  satuan: satuan,
                  satuanutama: satuanutama,
                  jmlpo: jml,
                  tempjmlpo: jml,
                  sisapo: jml,
                  hargabeli: hargabeli,
                  harga: harga,
                  uuidcurrency: '{{ session('UUIDCURRENCY') }}',
                  currency: '{{ session('SIMBOLCURRENCY') }}',
                  nilaikurs: 1,
                  discpersen: 0,
                  disc: 0,
                  disckurs: 0,
                  subtotal: subtotal,
                  pakaippn: defaultpakaippn,
                  ppnpersen: ppnpersenaktif,
                  pph22persen: {{ session('PPH22PERSEN') ?? 0 }},
                };
                if (configtranspr == 'HEADER') {
                  row_update.uuidpr = "";
                  row_update.kodepr = '';
                }
                try {
                  let url = link_api.getStokBarangSatuan;
                  const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                      'Authorization': 'bearer {{ session('TOKEN') }}',
                      'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                      uuidbarang: uuidbarang,
                      uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
                      satuan: satuan,
                      tgltrans: $('#TGLTRANS').datebox('getValue')
                    }),
                  }).then(response => {
                    if (!response.ok) {
                      throw new Error(
                        `HTTP error! status: ${response.status} from ${url}`
                      );
                    }
                    return response.json();
                  })

                  if (response.success) {
                    row_update['jmlstok'] = response.data.saldoqty
                  } else {
                    $.messager.alert('Error', response.message, 'error');
                  }
                } catch (error) {
                  var textError = getTextError(error);
                  $.messager.alert('Error', getTextError(error), 'error');
                }
                break;
              case 'satuan':
                var hargabeli = await get_harga_barangbeli(row.uuidbarang, row.satuan);
                var data = ed.combogrid('grid').datagrid('getSelected');
                var uuidbarang = data ? data.uuidbarang : '';
                var satuan = data ? data.satuan : '';
                if (change.satuan != null && change.satuan != undefined) {
                  satuan = change.satuan;
                }
                row_update = {
                  hargabeli: hargabeli
                };
                console.log(satuan);
                var stok = row.jmlstok;
                try {
                  let url = link_api.getStokBarangSatuan;
                  const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                      'Authorization': 'bearer {{ session('TOKEN') }}',
                      'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                      uuidbarang: uuidbarang,
                      uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
                      satuan: satuan,
                      tgltrans: $('#TGLTRANS').datebox('getValue')
                    }),
                  }).then(response => {
                    if (!response.ok) {
                      throw new Error(
                        `HTTP error! status: ${response.status} from ${url}`
                      );
                    }
                    return response.json();
                  })

                  if (response.success) {
                    stok = response.data.saldoqty;

                  } else {
                    $.messager.alert('Error', response.message, 'error');
                  }
                } catch (error) {
                  var textError = getTextError(error);
                  $.messager.alert('Error', getTextError(error), 'error');
                }
                row_update['jmlstok'] = stok;

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
            row_update = $(this).datagrid('getRows')[index];
            hitung_subtotal_detail(index, row_update);
            hitung_grandtotal();
          } catch (error) {
            console.error(error);
          }
          tutupLoader();
        },
        onLoadSuccess: function(data) {
          hitung_grandtotal();
        },
        onAfterDeleteRow: function(index, row) {
          hitung_grandtotal();
        },
        onAfterEdit: async function(index, row, changes) {
          // if (changes.kodebarang) {
          //     if ($('#IDLOKASI').combogrid('getValue') != '') {
          //         bukaLoader();
          //         var data = $(this).datagrid('getRows')[index];
          //         try {
          //             let url = link_api.getStokBarangSatuan;
          //             const response = await fetch(url, {
          //                 method: 'POST',
          //                 headers: {
          //                     'Authorization': 'bearer {{ session('TOKEN') }}',
          //                     'Content-Type': 'application/json',
          //                 },
          //                 body: JSON.stringify({
          //                     uuidbarang: row.uuidbarang,
          //                     uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
          //                     satuan: row.satuan,
          //                     tgltrans: $('#TGLTRANS').datebox('getValue')
          //                 }),
          //             }).then(response => {
          //                 if (!response.ok) {
          //                     throw new Error(
          //                         `HTTP error! status: ${response.status} from ${url}`
          //                     );
          //                 }
          //                 return response.json();
          //             })

          //             if (response.success) {
          //                 var data = {
          //                     jmlstok: response.data.saldoqty
          //                 };

          //                 $('#table_data_detail').datagrid('updateRow', {
          //                     index: index,
          //                     row: data
          //                 }).datagrid('gotoCell', {
          //                     index: index,
          //                     field: 'kodebarang'
          //                 });
          //             } else {
          //                 $.messager.alert('Error', response.message, 'error');
          //             }
          //         } catch (error) {
          //             var textError = getTextError(error);
          //             $.messager.alert('Error', getTextError(error), 'error');
          //         }
          //     }
          // }

          // hitung_subtotal_detail(index, row);
          // hitung_grandtotal();
          // tutupLoader();
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
              title: 'Jml PO',
              align: 'right',
              width: 60,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
              }
            },
            {
              field: 'terpenuhi',
              title: 'Terpenuhi PO',
              align: 'right',
              width: 85,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
              }
            },
            {
              field: 'sisa',
              title: 'Sisa PO',
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
            url: link_api.informasiTransRefBuktiPenerimaanBarang,
            method: 'post',
            queryParams: {
              uuidtrans: uuidtrans,
              uuidbarang: row.uuidbarang,
              jenis: 'PEMBELIAN'
            },
            fitColumns: true,
            singleSelect: true,
            rownumbers: true,
            loadMsg: '',
            height: 'auto',
            columns: [
              [{
                  field: 'kodebbm',
                  title: 'No BBM',
                  width: 100,
                },
                {
                  field: 'tgltrans',
                  title: 'Tgl. BBM',
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
      });
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
              var kodepr = configtranspr == "HEADER" ? $("#IDPR").combogrid("getValue") : "";
              if (kodepr == '') {
                $(dg).datagrid('appendRow', {
                  tglpembayaran: getDateMinusDays(0),
                  amount: 0,
                }).datagrid('gotoCell', {
                  index: index,
                  field: 'uangmuka'
                });

              }
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
              editor: !inputharga ? null : {
                type: 'numberbox'
              }
            },
            {
              field: 'amount',
              title: 'Nilai Pembayaran',
              align: 'right',
              width: 105,
              formatter: format_amount,
              editor: !inputharga ? null : {
                type: 'numberbox'
              }
            },
          ]
        ],
        //UNTUK TOMBOL EDIT
        onClickRow: function(index, row) {
          indexDetail = index;
        },
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
                persentase: changes.amount / $('#GRANDTOTAL').numberbox('getValue') *
                  100
              }
            });
          }

          if (changes.persentase) {
            $(this).datagrid('updateRow', {
              index: index,
              row: {
                amount: changes.persentase / 100 * $('#GRANDTOTAL').numberbox(
                  'getValue')
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
                persentase: data.rows[i].amount / $('#GRANDTOTAL').numberbox(
                  'getValue') * 100
              }
            })
          }
        }
      }).datagrid('enableCellEditing');
    }

    function hitung_subtotal_detail(index, row) {
      // hitung diskon lebih dahulu
      var data = {};
      var harga = parseFloat(row.harga);
      var dg = $('#table_data_detail');
      var totaldisc = 0;

      row.jmlpo = parseFloat(row.jmlpo).toFixed({{ session('DECIMALDIGITQTY') }});
      data.jmlpo = row.jmlpo;

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
      data.discpersen = discDescription == "" ? "0" : discDescription;
      data.subtotal = parseFloat((harga * data.jmlpo).toFixed({{ session('DECIMALDIGITAMOUNT') }}));

      var nilaikurs = parseFloat(row.nilaikurs);
      @if (session('MULTICURRENCY') != '1')
        nilaikurs = 1;
      @endif
      data.hargakurs = parseFloat(row.harga) * nilaikurs;
      data.disckurs = totaldisc <= 0 ? row.disc : totaldisc * nilaikurs;
      data.subtotalkurs = parseFloat((data.subtotal * nilaikurs).toFixed({{ session('DECIMALDIGITAMOUNT') }}));

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
            data.ppnrp = Math.floor(data.subtotalkurs * parseFloat(row.ppnpersen) / (100 + parseFloat(row
              .ppnpersen)));
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

    function hitung_subtotal_pembayaran(index, row) {
      var data = $("#table_data_detail_pembayaran").datagrid('getRows');
      var footer = {
        amount: 0,
      }
      var tgltrans = $("#TGLTRANS").datebox('getValue');
      for (var i = 0; i < data.length; i++) {
        footer.amount += parseFloat(data[i].amount);
        if (data[i].tglpembayaran < tgltrans) {
          $.messager.show({
            title: 'Warning',
            msg: 'Tanggal Pembayaran Tidak Boleh Lebih Dari Tanggal Trans',
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
      var pph22rp = 0;
      var cekselisih = 0;
      var pembulatan = parseFloat($("#PEMBULATAN").numberbox('getValue')) ? parseFloat($("#PEMBULATAN").numberbox(
        'getValue')) : 0;
      var biaya = 0;

      var footer = {
        jmlpr: 0,
        akumulasipr: 0,
        sisapr: 0,
        jmlpo: 0,
        sisapo: 0,
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
        footer.jmlpr += parseFloat(data[i].jmlpr);
        footer.akumulasipr += parseFloat(data[i].akumulasipr);
        footer.sisapr += parseFloat(data[i].sisapr);
        footer.jmlpo += parseFloat(data[i].jmlpo);
        footer.sisapo += parseFloat(data[i].sisapo);
        footer.disc += parseFloat(data[i].disc);
        footer.disckurs += parseFloat(data[i].disckurs);
        footer.subtotal += parseFloat(data[i].subtotal);
        footer.subtotalkurs += parseFloat(data[i].subtotalkurs);
        footer.ppnrp += parseFloat(data[i].ppnrp);
        footer.pph22rp += parseFloat(data[i].pph22rp);
        footer.dpp += parseFloat(data[i].dpp);
      }
      total2 = +((total2).toFixed({{ session('DECIMALDIGITAMOUNT') }}));
      grandtotal = parseFloat(total2 + footer.pph22rp + biaya + pembulatan);

      $("#TOTAL").numberbox('setValue', total);
      $('#BARANGKENAPAJAK').numberbox('setValue', barangkenapajak);
      $('#BARANGTIDAKKENAPAJAK').numberbox('setValue', barangtidakkenapajak);
      //$('#DISKONRP').numberbox('setValue', diskonrp);
      $('#txt_DPP').numberbox('setValue', dpp);
      $("#PPNRP").numberbox('setValue', footer.ppnrp);
      $("#PPH22RP").numberbox('setValue', footer.pph22rp);
      $("#GRANDTOTAL").numberbox('setValue', grandtotal);

      $('#table_data_detail').datagrid('reloadFooter', [footer]);
    }

    async function get_harga_barang(uuidbarang) {
      var uuidsupp = $("#IDSUPPLIER").combogrid('getValue');
      var tgltrans = $("#TGLTRANS").datebox('getValue');
      var harga = 0;

      if (uuidsupp == '') {
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

              uuidbarang: uuidbarang,
              uuidsupplier: uuidsupp,
              tgltrans: tgltrans
            }),
          }).then(response => {
            if (!response.ok) {
              throw new Error(
                `HTTP error! status: ${response.status} from ${url}`
              );
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
      }
      return harga;
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
            satuan: satuan
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(
              `HTTP error! status: ${response.status} from ${url}`
            );
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
      $("#PPH22PERSEN").numberbox('setValue', {{ session('PPH22PERSEN') ?? 0 }});
      hitung_grandtotal();
      $("#TGLTRANS, #TGLJATUHTEMPO").datebox('setValue', getDateMinusDays(0));
      $("#TGLJATUHTEMPO").datebox('readonly');
    }

    function enableAddRow() {
      $('#table_data_detail').datagrid('options').RowAdd = true;
    }

    function disableAddRow() {
      $('#table_data_detail').datagrid('options').RowAdd = false;
    }

    async function hitung_stok() {
      var rows = $('#table_data_detail').datagrid('getRows');

      if (rows.length == 0) {
        return false;
      }

      if ($('#IDLOKASI').combogrid('getValue') == '') {
        return false;
      }
      bukaLoader();
      try {
        let url = link_api.hitungStokTransaksiBarang;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidlokasi: $('#IDLOKASI').combogrid('getValue'),
            tgltrans: $('#TGLTRANS').datebox('getValue'),
            data_detail: JSON.stringify(rows)
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(
              `HTTP error! status: ${response.status} from ${url}`
            );
          }
          return response.json();
        })

        if (response.success) {
          for (var i = 0; i < response.data.length; i++) {
            $('#table_data_detail').datagrid('updateRow', {
              index: i,
              row: {
                jmlstok: response.data[i].jmlstok
              }
            });
          }
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
      }
      tutupLoader();
    }
  </script>
@endpush
