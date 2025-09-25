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
            <div data-options="region:'north',border:false" style="width:100%; height:150px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>

              <input type="hidden" id="mode" name="mode">
              <table>
                <tr>
                  <td valign="top">
                    <fieldset style="height:130px;">
                      <legend id="label_laporan">Info Transaksi</legend>
                      <table border="0">
                        <input name="idperusahaan" id="IDPERUSAHAAN" type="hidden">
                        <tr>
                          <td id="label_form">Jenis</td>
                          <td id="label_form">
                            <select class="easyui-combobox" id="JENISTRANSAKSI" data-options="panelHeight:'auto'"
                              name="jenistransaksi" style="width:190px;">
                              <option value="PEMBELIAN">PEMBELIAN</option>
                              <option value="RETUR">RETUR PENJUALAN</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">No. BBM</td>
                          <td id="label_form">
                            <input name="kodebbm" id="KODEBBM" class="label_input" style="width:190px">
                          </td>
                          <input type="hidden" id="IDBBM" name="idbbm">
                        </tr>

                        <tr>
                          <td id="label_form" name="keteranganlokasi">Lokasi</td>
                          <td id="label_form"><input name="idlokasi" id="IDLOKASI" style="width:190px"></td>
                          <input type="hidden" id="KODELOKASI" name="kodelokasi">
                        </tr>
                        <tr>
                          <td id="label_form">Tgl. Trans</td>
                          <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date" style="width:190px">
                          </td>
                        </tr>
                        <tr hidden>
                          <td id="label_form">Tgl. Jatuh Tempo</td>
                          <td id="label_form"><input name="tgljatuhtempo" id="TGLJATUHTEMPO" class="date"
                              style="width:190px"></td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td valign="top">
                    <fieldset style="height:130px;">
                      <legend id="label_laporan">Referensi</legend>
                      <table border="0" id="tabel_pembelian_retur">
                        <tr>
                          <td id="label_form" align="left">Kode</td>
                          <td align="right">
                            <input name="idreferensi" class="label_input" id="IDREFERENSI" style="width:100px"
                              prompt="Kode Supplier">
                            <input type="hidden" id="KODEREFERENSI" name="kodereferensi">
                          </td>
                          <td align="right">
                            <input name="namareferensi" class="label_input" id="NAMAREFERENSI" style="width:210px"
                              readonly prompt="Nama Referensi">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form" align="left">Alamat</td>
                          <td align="right" colspan="3">
                            <input name="alamat" class="label_input" id="ALAMAT" style="width:313px" readonly
                              prompt="Alamat Referensi">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form" align="left">Telp</td>
                          <td align="right" colspan="3">
                            <input name="telp" class="label_input" id="TELP" style="width:313px" readonly
                              prompt="Telp Referensi">
                          </td>
                        </tr>
                      </table>
                      <table border="0" id="tabel_browsing" style="width:320px">
                        <tr id="header">
                          <td id="label_form" align="left" name="nopo">No. Pesanan Pembelian</td>
                          <td id="label_form" align="left" hidden name="noretur">No. Retur</td>
                          <td id="label_form" align="left" hidden name="nolokasi">No. Surat Jalan
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td id="label_form" align="left"><input name="idtransreferensi" id="IDTRANSREFERENSI"
                              style="width:243px"></td>
                          <input type="hidden" id="KODETRANSREFERENSI" name="kodetransreferensi">
                        </tr>
                      </table>
                      <table border="0" id="tabel_transfer" style="width:320px" hidden>
                        <tr>
                          <td id="label_form" align="left">Lokasi Asal &nbsp;&nbsp;</td>
                          <td align="right">
                            <input name="idlokasiasal" class="label_input" id="IDLOKASIASAL" style="width:313px"
                              readonly>
                            <input type="hidden" id="KODELOKASIASAL" name="kodelokasiasal">
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td valign="top">
                    <fieldset style="height:130px;">
                      <legend id="label_laporan">Info Lain</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form">No. Surat Jalan</td>
                          <td id="label_form"><input name="nosuratjalan" id="NOSURATJALAN" class="label_input"
                              style="width:190px"></td>
                        </tr>
                        <tr>
                          <td id="label_form">No. Kendaraan</td>
                          <td id="label_form"><input name="nopol" id="NOPOL" class="label_input"
                              style="width:190px"></td>
                        </tr>
                        <tr>
                          <td id="label_form">Nama Sopir</td>
                          <td id="label_form"><input name="namasopir" id="NAMASOPIR" class="label_input"
                              style="width:190px"></td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td valign="bottom">
                    <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                      style="width:250px; height:85px" data-options="validType:'length[0, 500]'"></textarea>
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
                <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input
                    :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl.
                    Input :</label> <label id="lbl_tanggal"></label></td>
                <td align='right' id="td_footer">
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
              <input type="hidden" id="data_detail_barcode" name="data_detail_barcode">
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
  </div>

  <div id="toolbar-scan-qrcode">
    <input id="scanbarcode" class="label_input" style="width: 150px">

    <a id="btn_generate_code" title="Tambahkan" class="easyui-linkbutton" onclick="scan_barcode()">Tambah</a>
  </div>
@endsection

@push('js')
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
  <script src="{{ asset('assets/js/utils.js') }}"></script>
  <script>
    var row = {};
    var transreferensi = null;
    var jenistransreferensi = null;
    var cekbtnsimpan = true;
    var ppnpersenaktif = 0;
    let TRANSREFERENSI;
    let INPUTHARGA;
    let LIHATHARGA;
    let SCANBARCODERETURJUAL;

    $(document).ready(async function() {
      await getBBMConfig();

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
            export_excel('Faktur Bukti Penerimaan', $("#area_cetak").html());
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
      browse_data_lokasiasal('#IDLOKASIASAL');
      browse_data_referensi('#IDREFERENSI', 'supplier');
      browse_data_transreferensi('#IDTRANSREFERENSI');

      $('#TGLTRANS').datebox({
        onChange: function(newVal, oldVal) {
          var nilaikurs = 0;
          var harga = 0;
          var row = $('#table_data_detail').datagrid('getRows');


          if (TRANSREFERENSI == 'HEADER') {
            var row_ref = $('#IDTRANSREFERENSI').combogrid('grid').datagrid('getSelected');
            if (row_ref) {
              var time_bbm = Date.parse(newVal);
              var time_ref = Date.parse(row_ref.tgltrans);

              if (time_bbm < time_ref) {
                $.messager.alert(
                  'Error',
                  'Tanggal penerimaan tidak boleh sebelum tanggal transaksi yang dipilih',
                  'error'
                );

                $(this).datebox('setValue', oldVal);

                return false;
              }
            }
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



      $('#JENISTRANSAKSI').combobox({
        onChange: function(newVal, oldVal) {

          $("#IDLOKASIASAL").combogrid('readonly', true);

          if (newVal == "PEMBELIAN") {
            $("#tabel_pembelian_retur").show();
            $("#tabel_transfer").hide();
            $("[name=keteranganlokasi]").html("Lokasi");

            $("[name=nopo]").show();
            $("[name=noretur]").hide();
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
                    field: 'idtransreferensi',
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

            urltransreferensi = link_api.browseBBMPesananPembelian;
          } else if (newVal == "RETUR") {
            $("#tabel_pembelian_retur").show();
            $("#tabel_transfer").hide();
            $("[name=keteranganlokasi]").html("Lokasi");
            $("[name=nopo]").hide();
            $("[name=noretur]").show();
            $("[name=nolokasi]").hide();

            browse_data_referensi('#IDREFERENSI', 'customer');

            $("#IDREFERENSI").combogrid({
              prompt: 'Kode Customer',
              readonly: false,
              required: true
            });
            $("#NAMAREFERENSI").textbox('clear');
            $("#ALAMAT").textbox('clear');
            $("#TELP").textbox('clear');
            $("#NAMAREFERENSI").textbox({
              prompt: 'Nama Customer'
            });
            $("#ALAMAT").textbox({
              prompt: 'Alamat Customer'
            });
            $("#TELP").textbox({
              prompt: 'Telp Customer'
            });

            $("#IDTRANSREFERENSI").combogrid({
              columns: [
                [{
                    field: 'idtransreferensi',
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
            urltransreferensi = link_api.browseBBMReturPenjualan;
          }
          var lokasi = $("#IDLOKASI").combogrid('getValue');
          var ref = $("#IDREFERENSI").combogrid('getValue');

          var url = base_url + urltransreferensi + '/' + lokasi + '/' + ref;

          ubah_url_combogrid($("#IDTRANSREFERENSI"), url, true);

          //jika transaksinya header
          // legacy codenya pakai logic TRANSREFERENSI == 'HEADER' ? 0 : 1
          if (TRANSREFERENSI != 'HEADER') {
            $("#header").hide();
            $('#table_data_detail').datagrid('showColumn', 'kodetransreferensi');
          } else {
            $("#header").show();
            $('#table_data_detail').datagrid('hideColumn', 'kodetransreferensi');
          }
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

      {{ $mode }}();
      tutupLoader();
    })

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    async function cetak(id) {
      $("#window_button_cetak").window('close');
      const doc = await getCetakDocument('{{ session('TOKEN') }}', link_api.cetakBuktiPenerimaanBarang + id);
      if (doc) {
        $("#area_cetak").html(doc);
        $("#form_cetak").window('open');
      } else {
        $.messager.alert(
          'Warning',
          'Terjadi kesalahan dalam mengambil data untuk cetak transaksi',
          'warning'
        );
      }
    }


    function tambah() {
      $('#mode').val('tambah');

      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#JENISTRANSAKSI').combobox('setValue', 'PEMBELIAN');
      $('#IDLOKASI').combogrid('readonly', false);
      $('#JENISTRANSAKSI').combogrid('readonly', false);
      $('#IDREFERENSI').combogrid('readonly', false);
      $('#IDTRANSREFERENSI').combogrid('readonly', false);
      $('#TGLTRANS').datebox('readonly', false);
      idtrans = "";
      urltransreferensi = link_api.browseBBMPesananPembelian;

      fetchData(
        '{{ session('TOKEN') }}',
        link_api.getLokasiDefault
      ).then(res => {
        if (res.success) {
          if (res.data.uuidlokasi != null) {
            $('#IDLOKASI').combogrid('setValue', res.data.uuidlokasi);
            $("#KODELOKASI").val(res.data.kodelokasi);
          }
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      }).catch(e => {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      });

      //jika transaksinya header
      if (TRANSREFERENSI = 'HEADER') {
        $("#header").hide();
        $('#table_data_detail').datagrid('showColumn', 'kodetransreferensi');
      } else {
        $("#header").show();
        $('#table_data_detail').datagrid('hideColumn', 'kodetransreferensi');
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
      if (transreferensi != null) {
        $('#JENISTRANSAKSI').combobox('setValue', jenistransreferensi);

        $('#IDLOKASI').combogrid('setValue', {
          id: transreferensi.idlokasi
        });

        $('#KODELOKASI').val(transreferensi.kodelokasi);

        if (jenistransreferensi == 'PEMBELIAN') {
          $('#IDREFERENSI').combogrid('setValue', {
            id: transreferensi.idsupplier,
            kode: transreferensi.kodesupplier
          });

          $('#KODEREFERENSI').val(transreferensi.kodesupplier);

          $('#NAMAREFERENSI').textbox('setValue', transreferensi.namasupplier);


          if (TRANSREFERENSI == 'HEADER') {
            $('#IDTRANSREFERENSI').combogrid('grid').datagrid('loadData', [{
              idtransreferensi: transreferensi.idpo,
              kodetransreferensi: transreferensi.kodepo,
              kodelokasi: transreferensi.kodelokasi,
              namalokasi: transreferensi.namalokasi,
              tgltrans: transreferensi.tgltrans,
              userentry: transreferensi.userbuat
            }]);

            $('#IDTRANSREFERENSI').combogrid('setValue', transreferensi.idpo, );

            $('#KODETRANSREFERENSI').val(transreferensi.kodepo);
          }

          // memuat data detail dari SO
          load_data_detail(transreferensi.uuidpo);
        } else if (jenistransreferensi == 'RETUR') {
          setTimeout(function() {
            $('#IDREFERENSI').combogrid('setValue', {
              id: transreferensi.idcustomer,
              kode: transreferensi.kodecustomer
            });

            load_data_detail(transreferensi.idreturjual);
          }, 250)

          $('#KODEREFERENSI').val(transreferensi.kodecustomer);

          $('#NAMAREFERENSI').textbox('setValue', transreferensi.namacustomer);


          if (TRANSREFERENSI == 'HEADER') {
            $('#IDTRANSREFERENSI').combogrid('grid').datagrid('loadData', [{
              uuidtransreferensi: transreferensi.uuidreturjual,
              kodetransreferensi: transreferensi.kodereturjual,
              kodelokasi: transreferensi.kodelokasi,
              namalokasi: transreferensi.namalokasi,
              tgltrans: transreferensi.tgltrans,
              userentry: transreferensi.userbuat
            }]);

            $('#IDTRANSREFERENSI').combogrid('setValue', transreferensi.idreturjual);

            $('#KODETRANSREFERENSI').val(transreferensi.kodereturjual);
          }
        }
      }
    }

    function ubah() {
      $(':radio:not(:checked)').attr('disabled', false);
      $('#mode').val('ubah');

      if (row) {
        get_status_trans('{{ session('TOKEN') }}', "atena/inventori/bukti-penerimaan-barang", 'uuidbbm', row.uuidbbm,
          function(data) {
            data = data.data;
            $(".form_status").html(status_transaksi(data.status));
          });

        $("#form_input").form('load', row);
        //setting untuk combobox jenis
        //jika tidak punya akses input harga
        if (INPUTHARGA == 0) {
          $(':radio:not(:checked)').attr('disabled', true);
        }

        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);
        $("#form_input").form('load', row);
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          data = data.data;
          var UT = data.ubah;
          get_status_trans('{{ session('TOKEN') }}', "atena/inventori/bukti-penerimaan-barang", 'uuidbbm', row
            .uuidbbm,
            function(res) {
              if (UT == 1 && res.data.status == 'I') {
                $('#btn_simpan_modal').css('filter', '');
              } else {
                document.getElementById('btn_simpan_modal').onclick = '';
                $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                $('#btn_simpan_modal').removeAttr('onclick');
              }

              var jenistrans = $('#JENISTRANSAKSI').combogrid('getValue');
              if (jenistrans == "PEMBELIAN") {
                $("#tabel_pembelian_retur").show();
                $("#tabel_transfer").hide();
                $("[name=keteranganlokasi]").html("Lokasi");
                $("[name=nopo]").show();
                $("[name=noretur]").hide();
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
                        field: 'idtransreferensi',
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

                urltransreferensi = link_api.browseBBMPesananPembelian;
              } else if (jenistrans == "RETUR") {
                $("#tabel_pembelian_retur").show();
                $("#tabel_transfer").hide();
                $("[name=keteranganlokasi]").html("Lokasi");
                $("[name=nopo]").hide();
                $("[name=noretur]").show();
                $("[name=nolokasi]").hide();

                browse_data_referensi('#IDREFERENSI', 'customer');
                //CUSTOMER
                var url = link_api.browseCustomer;
                get_combogrid_data($("#IDREFERENSI"), row.idreferensi, url);

                $("#IDREFERENSI").combogrid({
                  prompt: 'Kode Customer',
                  readonly: false,
                  required: true
                });
                $("#NAMAREFERENSI").textbox('clear');
                $("#ALAMAT").textbox('clear');
                $("#TELP").textbox('clear');
                $("#NAMAREFERENSI").textbox({
                  prompt: 'Nama Customer'
                });
                $("#ALAMAT").textbox({
                  prompt: 'Alamat Customer'
                });
                $("#TELP").textbox({
                  prompt: 'Telp Customer'
                });

                $("#IDTRANSREFERENSI").combogrid({
                  columns: [
                    [{
                        field: 'idtransreferensi',
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
                urltransreferensi = link_api.browseBBMReturPenjualan;
              }

              $('#IDLOKASI').combogrid('readonly');
              $('#JENISTRANSAKSI').combogrid('readonly');
              $("#IDLOKASIASAL").combogrid('readonly', true);

              var lokasi = $("#IDLOKASI").combogrid('getValue');
              var ref = $("#IDREFERENSI").combogrid('getValue');

              var url = base_url + urltransreferensi + '/' + lokasi + '/' + ref;

              ubah_url_combogrid($("#IDTRANSREFERENSI"), url, true);

              $("#IDREFERENSI").combogrid('setValue', {
                id: row.idreferensi,
                kode: row.kodereferensi
              });
              $('#IDREFERENSI').combogrid('readonly');
              $('#IDTRANSREFERENSI').combogrid('readonly');

              //jika transaksinya header
              // legacy codenya pakai logic TRANSREFERENSI == 'HEADER' ? 0 : 1
              if (TRANSREFERENSI !== 'HEADER') {
                $("#header").hide();
                $('#table_data_detail').datagrid('showColumn', 'kodetransreferensi');
              } else {
                $("#header").show();
                $('#table_data_detail').datagrid('hideColumn', 'kodetransreferensi');
              }
              //PENGISIAN IDTRANSREFERENSI DI load_data, karena waktu load barang, no transreferensi hilang terus

              idtrans = row.idbbm;
              setTimeout(function() {
                load_data(row.uuidbbm);
                load_data_rekap(row.uuidbbm);
                load_data_barcode(row.uuidbbm, row.kodebbm);
              }, 500)
            });
        });
      }
    }

    async function simpan(jenis_simpan) {
      $(':radio:not(:checked)').attr('disabled', false);
      var mode = $("#mode").val();

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));
      $('#data_detail_barcode').val(JSON.stringify($('#table_data_detail_barcode').datagrid('getChecked')));

      var row_detail = $('#table_data_detail').datagrid('getRows')[0];
      get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), row_detail.selisih);

      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      $('#window_button_simpan').window('close');

      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }


      // jika terdapat barcode yang di scan, maka
      if (SCANBARCODERETURJUAL == 'YA') {
        if ($('#JENISTRANSAKSI').combobox('getValue') == 'RETUR') {
          isValid = cek_jumlah_dan_barcode();

          if (!isValid) {
            return false;
          }
        }
      }

      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        cekbtnsimpan = false;
        if (!isTokenExpired('{{ session('TOKEN') }}')) {
          try {
            const data = $('#form_input :input').serializeArray();
            const payload = {};
            for (let i = 0; i < data.length; i++) {
              if (typeof data[i].value === 'string' && data[i].name.startsWith('data_')) {
                data[i].value = JSON.parse(data[i].value);
              }
              payload[data[i].name] = data[i].value;
            }
            payload['jenis_simpan'] = jenis_simpan;
            const res = await fetchData(
              '{{ session('TOKEN') }}',
              link_api.simpanBuktiPenerimaanBarang,
              payload
            );
            if (res.success) {
              $('#form_input').form('clear');
              $.messager.show({
                title: 'Info',
                msg: 'Transaksi Sukses',
                showType: 'show'
              });
              {{ $mode }}();

              if (jenis_simpan == 'simpan_cetak') {
                cetak(res.data.uuidbbm, 'ya');
              }
            } else {
              $.messager.alert('Error', res.message, 'error');
            }
          } catch (e) {
            const error = typeof e === 'string' ? e : e.message;
            const textError = getTextError(error);
            $.messager.alert('Error', textError, 'error');
          }
        } else {
          $.messager.alert('Error', 'Token Expired, Silahkan Login Kembali', 'error');
        }
      }
    }

    function reset_detail() {
      $('#table_data_detail').datagrid('loadData', []);
      $('#table_data_detail_rekap').datagrid('loadData', []);
      $('#table_data_detail_barcode').datagrid('loadData', []);
    }

    async function load_data(idtrans) {
      try {
        const res = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.loadDataBuktiPenerimaanBarang, {
            uuidbbm: idtrans
          }
        );
        if (res.success) {
          $('#table_data_detail').datagrid('loadData', res.data);
        }
        $('#IDTRANSREFERENSI').combogrid('setValue', {
          uuidtransreferensi: row.uuidtransreferensi,
          kodetransreferensi: row.kodetransreferensi
        });
      } catch (e) {
        const error = typeof e === 'string' ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }

    async function load_data_rekap(idtrans) {
      try {
        const res = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.loadDataRekapBuktiPenerimaanBarang, {
            uuidbbm: idtrans
          }
        );
        if (res.success) {
          $('#table_data_detail_rekap').datagrid('loadData', res.data);
        } else {
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }

    async function load_data_detail(idtrans) {
      var jenis = $('#JENISTRANSAKSI').combobox('getValue');

      if ($("#mode").val() == "tambah") {
        let url = '';
        let key = '';

        if (jenis == "PEMBELIAN") {
          url = link_api.loadDataBBMPesananPembelian;
          key = "uuidpo";
        } else if (jenis == "RETUR") {
          url = 'atena/Penjualan/Transaksi/ReturPenjualan/loadDataBBM';
          key = "uuidreturjual";
        }

        try {
          bukaLoader();
          const res = await fetchData(
            '{{ session('TOKEN') }}',
            url, {
              [key]: idtrans,
              tgltrans: $('#TGLTRANS').datebox('getValue')
            }
          );
          if (res.success) {
            $('#table_data_detail').datagrid('loadData', res.data);
            var rows = res.data;

            for (var i = 0; i < rows.length; i++) {
              hitung_subtotal_detail(i, rows[i])
            }

            hitung_grandtotal();
          } else {
            $.messager.alert('Error', res.message, 'error');
          }
        } catch (e) {
          const error = (typeof e === 'string') ? e : e.message;
          const textError = getTextError(error);
          $.messager.alert('Error', textError, 'error');
        } finally {
          tutupLoader();
        }
      }
    }

    async function load_data_barcode(idtrans, kodetrans) {
      try {
        const res = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.loadDataBarcodeBuktiPenerimaanBarang, {
            uuidbbm: idtrans,
            kodebbm: kodetrans
          }
        );
        if (res.success) {
          $('#table_data_detail_barcode').datagrid('loadData', res.data);
          $('#table_data_detail_barcode').datagrid('checkAll');
        } else {
          $.messager.alert('Error', res.message, 'error');
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
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');
          if (row) {
            $("#KODELOKASI").val(row.kode);
            $("#IDTRANSREFERENSI").combogrid('clear');
            var jenis = $('#JENISTRANSAKSI').combobox('getText');
            var ref = $("#IDREFERENSI").combogrid('getValue');

            if (jenis == "PEMBELIAN") {
              //jika pembelian = PO
              urltransreferensi = link_api.browseBBMPesananPembelian;
            } else if (jenis == "RETUR") {
              //jika retur = ReturPenjualan
              urltransreferensi = link_api.browseBBMReturPenjualan;
            }
            var url = base_url + urltransreferensi + '/' + row.id + '/' + ref;
            ubah_url_combogrid($("#IDTRANSREFERENSI"), url, true);

            $("#tabel_data_lo").datagrid('disableCellEditing');
          }
          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
      });
    }

    function browse_data_lokasiasal(id) {
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

    function browse_data_referensi(id, table) {
      //table = supplier / customer
      $(id).combogrid({
        panelWidth: 600,
        url: base_url_api + 'atena/master/' + table + '/browse',
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
            $('#NAMAREFERENSI').textbox('setValue', row.nama);
            $('#ALAMAT').textbox('setValue', row.alamat);
            $('#TELP').textbox('setValue', row.telp);

            var jenis = $('#JENISTRANSAKSI').combobox('getText');
            var lokasi = $("#IDLOKASI").combogrid('getValue');

            if (jenis == "PEMBELIAN") {
              //jika pembelian = PO
              urltransreferensi = link_api.browseBBMPesananPembelian;
            } else if (jenis == "RETUR") {
              //jika retur = ReturPenjualan
              urltransreferensi = link_api.browseBBMReturPenjualan;
            }

            var url = base_url + urltransreferensi + '/' + lokasi + '/' + row.id;
            ubah_url_combogrid($("#IDTRANSREFERENSI"), url, true);
            $("#KODEREFERENSI").val(row.kode);
          }
          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
      });
    }

    var namasyaratbayarval, idsyaratbayarval, selisihval = '';

    function browse_data_transreferensi(id) {
      $(id).combogrid({
        panelWidth: 640,
        idField: 'idtransreferensi',
        textField: 'kodetransreferensi',
        mode: 'remote',
        required: TRANSREFERENSI == 'HEADER',
        columns: [
          [{
              field: 'idtransreferensi',
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
              field: 'catatan',
              title: 'Catatan',
              width: 200,
              align: 'left'
            },
            {
              field: 'userentry',
              title: 'User',
              width: 150
            },
          ]
        ],
        onSelect: function(index, row) {
          if ($('#mode').val() == 'tambah') {
            reset_detail();

            var time_bbm = Date.parse($('#TGLTRANS').datebox('getValue'));
            var time_ref = Date.parse(row.tgltrans);

            if (time_bbm < time_ref) {
              $.messager.alert('Error', 'Tanggal penerimaan tidak boleh sebelum tanggal transaksi yang dipilih',
                'error');

              $('#IDTRANSREFERENSI').combogrid('clear');

              return false;
            }

            var jenis = $('#JENISTRANSAKSI').combobox('getValue');

            if (row.idlokasi != $("#IDLOKASI").combogrid('getValue') ||
              row.tgltrans > $('#TGLTRANS').datebox('getValue')) {
              $.messager.show({
                title: 'Warning',
                msg: 'Transaksi harus pada lokasi yang sama dan sebelum tanggal transaksi',
                timeout: {{ session('TIMEOUT') }},
              });
              $(this).combogrid('clear');
            }

            if (jenis == 'RETUR') {
              load_data_detail(row.idtransreferensi);
            }

            if (jenis == 'PEMBELIAN') {
              load_data_detail_po($('#IDTRANSREFERENSI').combogrid('getValue'));
            }

            namasyaratbayarval = row.namasyaratbayar;
            idsyaratbayarval = row.idsyaratbayar;
            selisihval = row.selisih;

            $("#KODETRANSREFERENSI").val(row.kodetransreferensi);
            if (row.catatan && row.catatan != null) {
              $("#CATATAN").textbox('setValue', row.catatan);
            }
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
                kodetransreferensi: '',
                jmltoleransi: 0,
              }).datagrid('gotoCell', {
                index: index,
                field: 'kodetransreferensi'
              });

              getRowIndex(target);
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
              field: 'idtransreferensi',
              hidden: true
            },
            {
              field: 'kodetransreferensi',
              hidden: TRANSREFERENSI == 'HEADER',
              title: 'No. Trans. Referensi',
              width: 120,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 600,
                  mode: 'remote',
                  idField: 'kodetransreferensi',
                  textField: 'kodetransreferensi',
                  columns: [
                    [{
                        field: 'idtransreferensi',
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
                        field: 'catatan',
                        title: 'Catatan',
                        width: 200,
                        align: 'left'
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
                        field: 'id',
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
                        field: 'satuan',
                        title: 'Satuan',
                        width: 60
                      },
                      {
                        field: 'barcodesatuan1',
                        title: 'Barcode Sat. 1',
                        width: 150
                      },
                      {
                        field: 'partnumber',
                        title: 'Part Number',
                        width: 150
                      },
                      {
                        field: 'namamerk',
                        title: 'Merk',
                        width: 100
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
              field: 'jmlbbm',
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
              width: 100,
              formatter: format_qty,
              align: 'right'
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
                  idField: 'SATUAN',
                  textField: 'SATUAN',
                  columns: [
                    [{
                      field: 'SATUAN',
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
                field: 'hargabeli',
                title: 'H. Beli Terakhir',
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
                field: 'sisatransreferensi',
                title: 'Sisa Ref',
                align: 'right',
                width: 80,
                formatter: format_qty
              },
              {
                field: 'uuidcurrency',
                title: 'Kode Currency',
                hidden: true
              },
              {
                field: 'currency',
                title: 'Mata Uang',
                width: 50,
                editor: {
                  type: 'combogrid',
                  options: {
                    panelWidth: 200,
                    mode: 'remote',
                    required: false,
                    idField: 'SIMBOL',
                    textField: 'SIMBOL',
                    url: link_api.browseCurrency,
                    columns: [
                      [{
                          field: 'NAMA',
                          title: 'Curr',
                          width: 100
                        },
                        {
                          field: 'SIMBOL',
                          title: 'Simbol',
                          width: 70
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
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }}
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
                formatter: format_amount,
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }}
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
                } : null
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
                } : null
              },
              {
                field: 'pph22rp',
                title: 'PPH 22 ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 65,
                formatter: format_amount
              },
              {
                field: 'namasyaratbayar',
                title: 'Syarat Byr',
                width: 90
              },
              {
                field: 'adanpwp',
                title: 'Ada NPWP',
                formatter: format_checked,
                align: 'center'
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
          if (row.idtransreferensi != 0 && row.idtransreferensi != '' && field == 'satuan') {
            // jika terdapat transreferensi, satuan tidak boleh dirubah
            $.messager.show({
              title: 'Warning',
              msg: 'Satuan tidak boleh dirubah karena mengacu pada Kode PO ' + row.kodepo,
              timeout: {{ session('TIMEOUT') }},
            });
            return false;
          }
          if (field == 'jmlbbm' && $('#JENISTRANSAKSI').combobox('getValue') == 'TRANSFER') {
            $.messager.show({
              title: 'Warning',
              msg: 'Jumlah Tidak Boleh Dirubah Mengacu Pada Jumlah Bukti Pengeluaran',
              timeout: {{ session('TIMEOUT') }},
            });
            return false;
          }
          if (field == 'jmlbonus' && $('#JENISTRANSAKSI').combobox('getValue') == 'TRANSFER') {
            $.messager.show({
              title: 'Warning',
              msg: 'Jumlah Tidak Boleh Dirubah Pada Jenis Transaksi Transfer',
              timeout: {{ session('TIMEOUT') }},
            });
            return false;
          }
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);
          if (field == 'kodetransreferensi') {
            var jenis = $('#JENISTRANSAKSI').combobox('getText');
            var lokasi = $("#IDLOKASI").combogrid('getValue');
            var ref = $("#IDREFERENSI").combogrid('getValue');

            if (jenis == "PEMBELIAN") {
              //jika pembelian = PO
              urltransreferensi = link_api.browseBBMPesananPembelian;
            } else if (jenis == "RETUR") {
              //jika retur = ReturPenjualan
              urltransreferensi = link_api.browseBBMReturPenjualan;
            }

            ed.combogrid('grid').datagrid('options').url = base_url + urltransreferensi + '/' + lokasi + '/' + ref;
            ed.combogrid('grid').datagrid('load', {
              q: ''
            });
            ed.combogrid('showPanel');
          } else if (field == 'kodebarang') {
            var idtransreferensi = '';
            //jika transaksi pr detail
            if (row.idtransreferensi) idtransreferensi = row.idtransreferensi;


            if (TRANSREFERENSI == 'HEADER') {
              //jika transaksi po header
              idtransreferensi = $("#IDTRANSREFERENSI").combogrid('getValue');
            }


            var jenis = $('#JENISTRANSAKSI').combobox('getValue');
            if ((idtransreferensi == 0 || idtransreferensi == '') && jenis == "PEMBELIAN") {
              var idreferensi = $('#IDREFERENSI').combogrid('getValue');
              var idlokasi = $('#IDLOKASI').combogrid('getValue');

              if (idreferensi == '') {
                $.messager.alert('Peringatan', 'Supplier belum diisi', 'warning');

                $(this).datagrid('deleteRow', index);

                return false;
              }

              if (idlokasi == '') {
                $.messager.alert('Peringatan', 'Lokasi belum diisi', 'warning');
                $(this).datagrid('deleteRow', index);
                return false;
              }

              ed.combogrid('grid').datagrid('options').url = link_api.browseBarangBySupplier;
              //    + idreferensi + '/' + idlokasi + '/penerimaan';
              ed.combogrid('grid').datagrid('load', {
                q: '',
                uuidsupplier: idreferensi,
                uuidlokasi: idlokasi,
                jenis: 'penerimaan'
              });
              ed.combogrid('showPanel');
            } else {
              let key = '';
              if (jenis == "PEMBELIAN") {
                ed.combogrid('grid').datagrid('options').url = link_api.browseBarangPesananPembelian;
                key = "uuidpo";
              } else if (jenis == "RETUR") {
                ed.combogrid('grid').datagrid('options').url = link_api.browseBarangReturPenjualan;
                key = "uuidreturjual";
              }
              ed.combogrid('grid').datagrid('load', {
                q: '',
                [key]: idtransreferensi
              });
              ed.combogrid('showPanel');
            }
          } else if (field == 'satuan') {
            ed.combogrid('grid').datagrid('options').url = link_api.loadSatuanBarang + row
              .idbarang;
            ed.combogrid('grid').datagrid('load', {
              q: '',
              idbarang: row.idbarang
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

              var id = data ? data.idtransreferensi : '';
              var adanpwp = data ? data.adanpwp : '';
              var tgltrans = data ? data.tgltrans : '';
              var lokasi = data ? data.idlokasi : '';
              var namasyaratbayar = data ? data.namasyaratbayar : '';
              var idsyaratbayar = data ? data.idsyaratbayar : '';
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
                jmlbbm: 0,
                jmlbonus: 0,
                sisabbm: 0,
                satuan: '',
                harga: 0,
                discpersen: 0,
                disc: 0,
                disckurs: 0,
                subtotal: 0,
              };


              if (data.CATATAN && data.CATATAN != null && $("#CATATAN").textbox('getValue') == "")
                $("#CATATAN").textbox('setValue', data.CATATAN);
              break;
            case 'kodebarang':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.id : '';
              var ppn = data ? data.ppn : '';
              var nama = data ? data.nama : '';
              var satuan = data ? data.satuan : '';
              var satuanutama = data ? data.satuanutama : '';
              var konversi = data ? data.konversi : '';
              var harga = data.harga ? data.harga : 0;
              var subtotal = harga * 1;
              var kodebrg = data ? data.kode : '';
              var jml = data ? data.jml : '';
              var sisa = data ? data.sisa : '';
              var terpenuhi = data ? data.terpenuhi : '';
              var discpersen = data.discpersen ? data.discpersen : 0;
              var disc = data.disc ? data.disc : '';
              var disckurs = data ? data.disckurs : '';
              var pakaippn = data.pakaippn ? data.pakaippn : "{{ session('DEFAULTPAKAIPPN') }}";;
              var ppnpersen = ppnpersenaktif;
              var pph22persen = data ? data.pph22persen : '';
              var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
              var partnumber = data.partnumber ? data.partnumber : '';
              var jmlbonus = data.jmlbonus ? data.jmlbonus : 0;

              if (pakaippn == 0) pakaippn = "TIDAK";
              else if (pakaippn == 1) pakaippn = "EXCL";
              else if (pakaippn == 2) pakaippn = "INCL";

              if ($('#JENISTRANSAKSI').combobox('getValue') == 'RETUR') {
                ppnpersen = data.ppnpersen;
              }

              var hargabeli;

              //DAPATKAN HARGA BELI BARANG
              $.ajax({
                async: false,
                url: base_url + 'atena/Inventori/Transaksi/BarangMasuk/passingHargaBeliTerakhir/' + data.id +
                  '/' + satuan,
                beforeSend: function() {
                  $.messager.progress();
                },
                success: function(harga) {
                  $.messager.progress('close');
                  hargabeli = harga ? harga : 0;
                }
              });

              var idcurrency;
              var currency;
              var nilaikurs;

              if ((row.idtransreferensi === undefined || row.idtransreferensi == "") && TRANSREFERENSI ==
                'DETAIL') {
                idcurrency = '{{ session('UUIDCURRENCY') }}';
                currency = '{{ session('SIMBOLCURRENCY') }}';
                nilaikurs = 1;
                sisa = 1;
                harga = get_harga_barang(id);
              } else {
                idcurrency = data.idcurrency;
                currency = data.simbol;
                nilaikurs = data.nilaikurs;
              }

              row_update = {
                idbarang: id,
                ppn: ppn,
                namabarang: nama,
                barcodesatuan1: barcodesatuan1,
                partnumber: partnumber,
                tutup: 0,
                satuan_lama: satuan,
                satuanutama: satuanutama,
                satuan: satuan,
                konversi: konversi,
                jmltransreferensi: jml,
                terpenuhitransreferensi: terpenuhi,
                sisatransreferensi: 0,
                jmlbbm: sisa,
                jmlbonus: jmlbonus,
                sisabbm: 0,
                hargabeli: hargabeli,
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
              };

              if (TRANSREFERENSI == 'HEADER') {
                row_update["kodetransreferensi"] = $("#KODETRANSREFERENSI").val();
                row_update["uuidtransreferensi"] = $("#IDTRANSREFERENSI").combogrid('getValue');

                row_update["uuidsyaratbayar"] = idsyaratbayarval;
                row_update["namasyaratbayar"] = namasyaratbayarval;
                row_update["selisih"] = selisihval;
              }
              break;
            case 'satuan':
              // get_konversi (ed.combogrid('grid').datagrid('getRows'), changes.satuan, row.satuan_lama);
              // if (satuan_baru != 0 || satuan_lama != 0 && changes.satuan)  {
              // 	row_update = {
              // 		jmlbbm	   : (satuan_baru>satuan_lama) ? row.jmlbbm*konversi_baru : row.jmlbbm/konversi_lama,
              // 		//jmlbonus: (satuan_baru>satuan_lama) ? row.jmlbonus*konversi_baru : row.jmlbonus/konversi_lama,
              // 		harga	   : (satuan_baru>satuan_lama) ? row.harga/konversi_baru : row.harga*konversi_lama,
              // 		hargakurs  : (satuan_baru>satuan_lama) ? row.hargakurs/konversi_baru : row.hargakurs*konversi_lama,
              // 		satuan_lama: changes.satuan
              // 	};
              // }
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
        },
        onSelectCell: function(index, field) {
          // load row LO
          //var row = $(this).datagrid('getRows')[index];
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
              field: 'idbarang',
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
          if (jenis == "PEMBELIAN") {
            urlinfo = "atena/Pembelian/Transaksi/Pembelian/InformasiBBM";
            fieldkode = 'kodebeli';
          } else if (jenis == "RETUR") {
            urlinfo = 'atena/Penjualan/Transaksi/ReturPenjualan/InformasiBBM';
            fieldkode = 'kodereturjual';
          }
          ddv.datagrid({
            url: base_url + urlinfo,
            method: 'post',
            queryParams: {
              idtrans: idtrans,
              idbarang: row.idbarang
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
                  title: 'Tgl. Trans',
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

    function load_data_detail_po(idtrans) {
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: base_url + "atena/Pembelian/Transaksi/PesananPembelian/loadDataBBM",
        data: {
          idtrans: idtrans
        },
        cache: false,
        beforeSend: function() {
          $.messager.progress();
        },
        success: function(msg) {
          $.messager.progress('close');

          if (msg.success) {
            $('#table_data_detail').datagrid('loadData', msg.detail);

            var rows = msg.detail;

            for (var i = 0; i < rows.length; i++) {
              hitung_subtotal_detail(i, rows[i])
            }

            hitung_grandtotal();
          }
        }
      });
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
      var dg = $('#table_data_detail');
      var totaldisc = 0;

      row.jmlbbm = parseFloat(row.jmlbbm).toFixed({{ session('DECIMALDIGITQTY') }});
      data.jmlbbm = row.jmlbbm;

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
            if ($('#JENISTRANSAKSI').combobox('getValue') == 'PEMBELIAN') {
              disc = +((discpersen[i] * harga / 100).toFixed({{ session('DECIMALDIGITAMOUNT') }}));
            } else {
              disc = Math.round(discpersen[i] * harga / 100);
            }
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
      data.subtotal = parseFloat((harga * data.jmlbbm).toFixed({{ session('DECIMALDIGITAMOUNT') }}));

      var nilaikurs = parseFloat(row.nilaikurs);
      @if (session('MULTICURRENCY') == '0')
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
        if (index != i && rows[i].kodetransreferensi == "" && (rows[i].kodebarang != "" && row.kodebarang == rows[i]
            .kodebarang)) {
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
        jmlbbm: 0,
        sisabbm: 0,
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
        footer.jmlbbm += parseFloat(data[i].jmlbbm);
        footer.sisabbm += parseFloat(data[i].sisabbm);
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
      $('#txt_DPP').numberbox('setValue', dpp);
      $("#PPNRP").numberbox('setValue', footer.ppnrp);
      $("#PPH22RP").numberbox('setValue', footer.pph22rp);
      $("#GRANDTOTAL").numberbox('setValue', grandtotal);

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
      $("#PPH22PERSEN").numberbox('setValue', {{ session('PPH22PERSEN') }});
      hitung_grandtotal();

      $("#TGLTRANS, #TGLKIRIM, #TGLJATUHTEMPO").datebox('setValue', date_format());
      $("#TGLJATUHTEMPO").datebox('readonly');
    }

    function scan_barcode() {
      var barcode = $('#scanbarcode').textbox('getValue');
      var tgltrans = $('#TGLTRANS').datebox('getValue');

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
        // url: '< ?= base_url('asiaelectrindo/Produksi/Transaksi/PembuatanBarcode/cekBarcodeReturPenjualanBBM') ?>',
        type: 'POST',
        data: {
          barcode: barcode,
          tgltrans: tgltrans,
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

              if (detail_rows[i].idbarang == response.data.idbarang) {
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

        // mendapatkan jumlah barcode yang menagcu ke idbarang tertentu
        var jumlah_barcode = barcode_detail_rows.filter(function(item) {
          return item.idbarang == row.idbarang;
        }).length;

        // jika jumlah barcode tidak sesuai dengan jumlah barang yang akan dikeluarkan
        if (parseFloat(row.jmlbbm) + parseFloat(row.jmlbonus) != jumlah_barcode) {
          $.messager.alert('Peringatan', 'Jumlah QR Code untuk barang ' + row.kodebarang + ' tidak sama', 'warning');

          return false;
        }
      }

      return true;
    }

    function get_harga_barang(idbarang) {
      var idsupp = $("#IDREFERENSI").combogrid('getValue');
      var tgltrans = $("#TGLTRANS").datebox('getValue');
      var harga = 0;

      if (idsupp == '') {
        return harga;
      } else {
        $.ajax({
          dataType: "json",
          type: 'POST',
          async: false,
          url: base_url + "atena/Master/Data/Barang/hargaBarang",
          data: {
            idbarang: idbarang,
            idsupp: idsupp,
            tgltrans: tgltrans
          },
          cache: false,
          success: function(msg) {
            harga = msg;
          }
        });
      }
      return harga;
    }

    function cekValidUangMuka(index, row) {
      var daftar_idtransreferensi = [];

      $('#table_data_detail').datagrid('getRows').map(function(item) {
        daftar_idtransreferensi.push(item.idtransreferensi);
      });

      $.ajax({
        url: base_url + 'atena/Inventori/Transaksi/BuktiPenerimaan/cekValidUangMuka',
        type: 'POST',
        dataType: 'JSON',
        data: {
          daftar_idtransreferensi: daftar_idtransreferensi
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

    async function getBBMConfig() {
      try {
        const [res1, res2, res3, res4] = await Promise.all([
          fetchData(
            '{{ session('TOKEN') }}',
            link_api.getConfig, {
              modul: 'TBBM',
              config: 'KODEBBM'
            }
          ),
          fetchData(
            '{{ session('TOKEN') }}',
            link_api.getDataAkses, {
              kodemenu: '{{ $kodemenu }}'
            }
          ),
          fetchData(
            '{{ session('TOKEN') }}',
            link_api.getConfig, {
              modul: 'TBBM',
              config: 'TRANSREFERENSI'
            }
          ),
          fetchData(
            '{{ session('TOKEN') }}',
            link_api.getConfig, {
              modul: 'TBBM',
              config: 'SCANBARCODERETURJUAL'
            }
          )
        ]);

        if (!res1.success || !res2.success) {
          const errorMessage = !res1.success ? res1.message : res2.message;
          throw new Error(errorMessage);
        }

        $('#KODEBBM').textbox({
          prompt: res1.data.value == 'AUTO' ? 'Auto Generate' : '',
          readonly: res1.data.value == 'AUTO',
        });
        $('#td_footer').css('display', res2.data.lihatharga == 0 ? 'none' : '');
        $('#DISKON').numberbox('readonly', res2.data.inputharga == 0);
        $('#DISKONRP').numberbox('readonly', res2.data.inputharga == 0);
        $('#PEMBULATAN').numberbox('readonly', res2.data.inputharga == 0);
        if (res2.data.cetak == 1) {
          $('#simpan_cetak').css('filter', '');
        } else {
          $('#simpan_cetak').css('filter', 'grayscale(100%)');
          $('#simpan_cetak').removeAttr('onclick');
        }
        TRANSREFERENSI = res3.data.value;
        INPUTHARGA = res2.data.inputharga;
        LIHATHARGA = res2.data.lihatharga;
        SCANBARCODERETURJUAL = res4.data.value;
      } catch (e) {
        const error = e.message || 'An unknown error occurred.';
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }
  </script>
@endpush
