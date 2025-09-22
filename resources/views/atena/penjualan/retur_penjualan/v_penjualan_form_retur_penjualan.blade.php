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
            <div data-options="region:'north',border:false" style="width:100%; height:170px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>

              <input type="hidden" id="mode" name="mode">
              <input type="hidden" id="tglentry" name="tglentry">
              <table border="0">
                <tr>
                  <td valign="top">
                    <fieldset style="height:150px;">
                      <legend id="label_laporan">Info Transaksi</legend>
                      <table border="0">
                        <input name="idperusahaan" id="IDPERUSAHAAN" type="hidden" style="width:190px">
                        <tr>
                          <td id="label_form">No. Retur Jual</td>
                          <td id="label_form"><input name="kodereturjual" id="KODERETURJUAL" class="label_input"
                              style="width:190px" prompt="Auto Generate" readonly></td>
                          <input type="hidden" id="IDRETURJUAL" name="idreturjual">
                        </tr>
                        <tr>
                          <td id="label_form">Lokasi</td>
                          <td id="label_form"><input name="idlokasi" id="IDLOKASI" style="width:190px"></td>
                          <input type="hidden" id="KODELOKASI" name="kodelokasi">
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
                        <tr hidden>
                          <td id="label_form">Tgl. Jatuh Tempo</td>
                          <td id="label_form"><input name="tgljatuhtempo" id="TGLJATUHTEMPO" class="date"
                              style="width:190px"></td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td align="left" valign="top">
                    <div id="tab trans" class="easyui-tabs" style="width:400px;height:155px;">
                      <div title="Customer">
                        <table border="0">
                          <tr>
                            <td id="label_form">Kode</td>
                            <td>
                              <input name="idcustomer" class="label_input" id="IDCUSTOMER" style="width:100px"
                                prompt="Kode Customer">
                              <input type="hidden" id="KODECUSTOMER" name="kodecustomer">
                              <input name="namacustomer" class="label_input" id="NAMACUSTOMER" style="width:210px"
                                readonly prompt="Nama Customer">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form" style="vertical-align: super;">Alamat</td>
                            <td colspan="3">
                              <textarea name="alamat" class="label_input" id="ALAMAT" readonly prompt="Alamat Customer" multiline="true"
                                style="width:313px; height:40px" data-options="validType:'length[0, 500]'"></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form">Telp</td>
                            <td colspan="3">
                              <input name="telp" class="label_input" id="TELP" style="width:313px" readonly
                                prompt="Telp Customer">
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form">Marketing</td>
                            <td>
                              <input name="idmarketing" class="label_input" id="IDMARKETING" style="width:313px">
                              <input type="hidden" id="KODEMARKETING" name="kodemarketing">
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div title="Sub Customer">
                        <table border="0">
                          <tr>
                            <td id="label_form">Kode</td>
                            <td>
                              <input name="idsubcustomer" class="label_input" id="IDSUBCUSTOMER" style="width:100">
                              <input type="hidden" id="KODESUBCUSTOMER" name="kodesubcustomer">
                              <input name="namasubcustomer" class="label_input" id="NAMASUBCUSTOMER"
                                style="width:210px" readonly prompt="Nama SubCustomer">
                            </td>
                          </tr>

                          <tr>
                            <td id="label_form" style="vertical-align: super;">Alamat</td>
                            <td colspan="3">
                              <textarea name="alamatsubcustomer" class="label_input" id="ALAMATSUBCUSTOMER" readonly prompt="Alamat SubCustomer"
                                multiline="true" style="width:313px; height:50px" data-options="validType:'length[0, 500]'"></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td id="label_form">Telp</td>
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
                            <td id="label_form">Syarat Bayar</td>
                            <td id="label_form">
                              <input name="idsyaratbayar" id="IDSYARATBAYAR" readonly class="label_input"
                                style="width:182px">
                              <input name="tgljatuhtempo" id="TGLJATUHTEMPO" readonly class="date"
                                style="width:100px">
                            </td>
                          </tr>
                          <tr id="tr_transaksi_jual">
                            <td id="label_form">No. Jual</td>
                            <td id="label_form"><input name="idjual" id="IDPENJUALAN" style="width:285px"></td>
                            <input type="hidden" id="KODEJUAL" name="kodejual">
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
                            style="width:300px; height:95px" data-options="validType:'length[0, 500]'"></textarea>
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
              </div>
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:35px;">
              <table id="trans_footer" width="100%">
                <tr>
                  <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input
                      :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl.
                      Input :</label> <label id="lbl_tanggal"></label>
                  </td>
                  <td align='right' id="td_grandtotal">
                    <table>
                      <tr hidden>
                        <td id="label_form" align="right">
                          Total <input name="total" id="TOTAL" class="number " style="width:110px;" readonly
                            required="true">
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
                        <td id="label_form" align="right"hidden>
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
                <input type="hidden" id="data_detail" name="data_detail">
              </table>
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
    </div>
  </div>

  <div id="window_button_simpan" class="easyui-window" title="Konfirmasi" data-options="modal:true,closed:true"
    style="height:164cm;padding:15px 10px 10px 10px;top:20px">
    <center>
      <div id="button_simpan">

        <a title="Simpan" class="easyui-linkbutton button_add" id='simpan_saja' onclick="simpan(this.uuid)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan</a><br><br>
        <a title="Simpan & Cetak" class="easyui-linkbutton button_add_print" id='simpan_cetak'
          onclick="simpan(this.uuid)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan & Cetak</a>

        <div>
    </center>
  </div>

  <div id="form_cetak" title="Preview" style="width:660px; height:450px">
    <div id="area_cetak"></div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.mask.js') }}"></script>
  <script src="{{ asset('assets/js/utils.js') }}"></script>
  <script>
    let TRANSAKSIJUAL;
    let LIHATHARGA;
    let INPUTHARGA;
    let olddiskonpersen = 0.00;
    let olddiskonrp = 0.00;
    let olddiskonglobalpersen = 0.00;
    let olddiskonglobalrp = 0.00;
    let oldharga = 0.00;
    let cekbtnsimpan = true;
    let ppnpersenaktif = 0;

    $(document).ready(async function() {
      await getReturJualConfig();

      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        var UT = data.cetak;
        if (UT == 1) {
          $('#simpan_cetak').css('filter', '');
        } else {
          $('#simpan_cetak').css('filter', 'grayscale(100%)');
          $('#simpan_cetak').removeAttr('onclick');
        }
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
            export_excel('Faktur Order Retur Penjualan', $("#area_cetak").html());
            return false;
          }
        }]
      }).window('close');

      var lebar = $('.panel').width();
      var tabsimpan = 50;
      var modalsimpan = 174;
      var spasi = -40;

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

      browse_data_syaratbayar('#IDSYARATBAYAR');
      browse_data_customer('#IDCUSTOMER');
      browse_data_marketing('#IDMARKETING');
      browse_data_subcustomer('#IDSUBCUSTOMER');
      browse_data_lokasi('#IDLOKASI');
      browse_data_jual('#IDPENJUALAN');

      $('#TGLTRANS').datebox({
        onChange: function(newVal, oldVal) {
          set_ppn_aktif(newVal, function(response) {
            response = response.data;
            ppnpersenaktif = response.ppnpersen;

            var rows = $('#table_data_detail').datagrid('getRows');

            for (var i = 0; i < rows.length; i++) {
              if (rows[i].kodejual == '' || rows[i].kodejual == null) {
                $('#table_data_detail').datagrid('updateRow', {
                  index: i,
                  row: {
                    ppnpersen: ppnpersen
                  }
                });

                hitung_subtotal_detail(i, rows[i]);
              }
            }

            hitung_grandtotal();
          });
        }
      })

      $("[name=pakaippn]").change(function() {
        $("#PPNPERSEN").numberbox('setValue', $(this).val() == 0 ? 0 : ppnpersenaktif);
        hitung_grandtotal();
      });

      $("[name=pakaipph]").change(function() {
        $("#PPHPERSEN").numberbox('setValue', $(this).val() == 0 ? 0 : {{ session('PPH22PERSEN') }});
        hitung_grandtotal();
      });

      $('#PEMBULATAN').numberbox({
        onChange: function() {
          hitung_grandtotal();
        }
      });

      $('#DISCPERSEN').textbox({
        onChange: function() {
          total = $('#TOTAL').numberbox('getValue');
          diskon = $('#DISCPERSEN').numberbox('getValue');
          var data = $("#table_data_detail").datagrid('getRows');

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

            hitung_subtotal_detail(i, data[i]);
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

      buat_table_detail();
      {{ $mode }}();
      tutupLoader();
    })

    shortcut.add('F8', function() {
      simpan();
    });

    var idTrans = "";

    function tutup() {
      parent.tutupTab();
    }

    async function tambah() {
      $('#mode').val('tambah');

      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#IDLOKASI').combogrid('readonly', false);
      $('#IDCUSTOMER').combogrid('readonly', false);
      $('#IDMARKETING').combogrid('readonly', false);
      $('#IDSUBCUSTOMER').combogrid('readonly', false);
      $('#IDPENJUALAN').combogrid('readonly', false);
      $('#TGLTRANS').datebox('readonly', false);
      idtrans = "";
      urljual = link_api.browsePenjualan;

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
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }

      clear_plugin();
      reset_detail();
    }

    function ubah() {
      $(':radio:not(:checked)').attr('disabled', false);
      $('#mode').val('ubah');

      if (row) {

        get_status_trans('{{ session('TOKEN') }}', "atena/penjualan/retur-penjualan", "uuidreturjual", row.uuidreturjual,
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
          get_status_trans('{{ session('TOKEN') }}', "atena/penjualan/retur-penjualan", "uuidreturjual", row
            .uuidreturjual,
            function(data) {
              data = data.data;
              if (UT == 1 && data.status == 'I') {
                $('#btn_simpan_modal').css('filter', '');
                $('#mode').val('ubah');
              } else {
                $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
                $('#btn_simpan_modal').removeAttr('onclick');
              }
            });

          $("#form_input").form('load', row);
          $('#IDLOKASI').combogrid('readonly');
          $('#IDCUSTOMER').combogrid('readonly');
          $('#IDSUBCUSTOMER').combogrid('readonly');
          $('#IDMARKETING').combogrid('readonly');
          $('#IDPENJUALAN').combogrid('readonly');
          $('#TGLTRANS').datebox('readonly');

          //ubah url jual sesuai dengan jenis transaksi
          url = base_url + 'atena/Penjualan/Transaksi/Penjualan/comboGrid' + '/' + row.uuidlokasi + '/' + row
            .uuidcustomer;
          ubah_url_combogrid($("#IDPENJUALAN"), url, true);
          $('#IDPENJUALAN').combogrid('setValue', {
            idjual: row.uuidjual,
            kodejual: row.kodejual
          });

          $('#IDCUSTOMER').combogrid('setValue', {
            id: row.uuidcustomer,
            kode: row.kodecustomer
          });
          $('#IDSUBCUSTOMER').combogrid('setValue', {
            id: row.uuidsubcustomer,
            kode: row.kodesubcustomer
          });
          $('#IDSYARATBAYAR').combogrid('setValue', {
            id: row.uuidsyaratbayar,
            nama: row.namasyaratbayar
          });

          $('#NAMACUSTOMER').textbox('setValue', row.namacustomer);
          $('#ALAMAT').textbox('setValue', row.alamatcustomer);
          $('#TELP').textbox('setValue', row.telpcustomer);

          //pasti cash jadi selisih = 1
          get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), 1);

          idtrans = row.uuidreturjual;
          load_data(row.uuidreturjual);

        });
      }
    }

    function cetak(id) {
      $("#window_button_cetak").window('close');
      $("#area_cetak").load(base_url + "atena/Penjualan/Transaksi/ReturPenjualan/cetak/" + id);
      $("#form_cetak").window('open');
    }

    function simpan(jenis_simpan) {
      var arrid = [];

      if (TRANSAKSIJUAL == 'HEADER') {
        arrid.push($("#IDPENJUALAN").getValue());
      } else if (TRANSAKSIJUAL == 'DETAIL') {
        for (var i = 0; i < $('#table_data_detail').datagrid('getRows').length; i++) {
          arrid.push($('#table_data_detail').datagrid('getRows')[0].uuidjual);
        }
      }

      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: base_url + "atena/Penjualan/Transaksi/ReturPenjualan/cekTransaksiSudahAdaRetur",
        data: "idtrans=" + $("#IDRETURJUAL").val() + "&idtransreferensi=" + JSON.stringify(arrid),
        cache: false,
        success: function(msg) {
          if (msg.message == "") {
            simpanRetur(jenis_simpan);
          } else // BILA SUDAH PERNAH BUAT RETUR ATAS PENJUALAN TERSEBUT
          {
            $.messager.confirm('Confirm', msg.message, function(r) {
              if (r) {
                simpanRetur(jenis_simpan);
              }
            });
          }
        }
      });
    }

    function simpanRetur(jenis_simpan) {
      var mode = $("#mode").val();

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

      $(':radio:not(:checked)').attr('disabled', false);
      var isValid = $('#form_input').form('validate');

      $('#window_button_simpan').window('close');

      var datanya = $("#form_input :input").serialize();

      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }

      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        validasi_session(function() {
          cekbtnsimpan = false;
          var adaTrans = false;

          if (!adaTrans) {
            $.ajax({
              type: 'POST',
              dataType: 'json',
              url: base_url + "atena/Penjualan/Transaksi/ReturPenjualan/simpan/" + jenis_simpan,
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

                  tambah();

                  parent.reload();

                  if (jenis_simpan == 'simpan_cetak') {
                    cetak(msg.data.uuidreturjual);
                  }
                } else {
                  $.messager.alert('Error', msg.errorMsg, 'error');
                }
              }
            });
          }
        });
      }
    }

    function reset_detail() {
      $('#table_data_detail').datagrid('loadData', []);
      $('#table_data_detail_rekap').datagrid('loadData', []);
    }

    async function load_data(idtrans) {
      try {
        const res = await fetchData('{{ session('TOKEN') }}', link_api.loadDataReturPenjualan, {
          uuidreturjual: idtrans
        });
        if (res.success) {
          $('#table_data_detail').datagrid('loadData', res.data);
        } else {
          throw new Error(res.message);
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }

    async function load_detail(idtrans) {
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: base_url + "atena/Penjualan/Transaksi/Penjualan/loaddetail",
        data: "idtrans=" + idtrans,
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
          }
        }
      });
      try {
        const res = await fetchData('{{ session('TOKEN') }}', link_api.loadConfigReturPenjualan, {

        })
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
            var supp = $("#IDCUSTOMER").combogrid('getValue');
            url = base_url + 'atena/Penjualan/Transaksi/Penjualan/comboGrid' + '/' + row.id + '/' + supp;

            ubah_url_combogrid($("#IDPENJUALAN"), url, true);
          }
          if ($('#mode').val() != '') {
            reset_detail();
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
            $("#KODECUSTOMER").val(row.kode);
            var alamat = row.alamat == "" ? "" : (row.alamat + "\r\n");
            if (row.kota && row.kota != 'null') alamat += row.kota;
            if (row.propinsi && row.propinsi != 'null') alamat += "-" + row.propinsi;
            if (row.negara && row.negara != 'null') alamat += "-" + row.negara;

            $('#NAMACUSTOMER').textbox('setValue', row.nama);
            $('#ALAMAT').textbox('setValue', alamat);
            $('#TELP').textbox('setValue', row.telp);
            $('#IDSYARATBAYAR').combogrid('setValue', {
              id: row.uuidsyaratbayar,
              nama: row.namasyaratbayar
            });
            $('#IDMARKETING').combogrid('setValue', row.idmarketing);

            //set combogrid subcustomer
            var url = base_url + 'atena/Master/Data/Customer/comboGrid/CHILD/' + row.id;
            ubah_url_combogrid($("#IDSUBCUSTOMER"), url, true);
            $('#NAMASUBCUSTOMER').textbox('clear');
            $('#ALAMATSUBCUSTOMER').textbox('clear');
            $('#TELPSUBCUSTOMER').textbox('clear');

            var lokasi = $("#IDLOKASI").combogrid('getValue');
            url = base_url + 'atena/Penjualan/Transaksi/Penjualan/comboGrid' + '/' + lokasi + '/' + row.id;

            ubah_url_combogrid($("#IDPENJUALAN"), url, true);
          } else {
            $('#NAMACUSTOMER').textbox('clear');
          }
          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
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
        url: link_api.browseKaryawanMarketing,
        onBeforeLoad: function(param) {
          param.divisi = 'marketing';
        },
        columns: [
          [{
              field: 'uuidkaryawan',
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
        onSelect: function(index, row) {
          $("#KODESUBCUSTOMER").val(row.kode);
        },
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');

          if (row) {
            var alamat = row.alamat == "" ? "" : (row.alamat + "\r\n");
            if (row.kota && row.kota != 'null') alamat += row.kota;
            if (row.propinsi && row.propinsi != 'null') alamat += "-" + row.propinsi;
            if (row.negara && row.negara != 'null') alamat += "-" + row.negara;

            $('#NAMASUBCUSTOMER').textbox('setValue', row.nama);
            $('#ALAMATSUBCUSTOMER').textbox('setValue', alamat);
            $('#TELPSUBCUSTOMER').textbox('setValue', row.telp);

            var lokasi = $("#IDLOKASI").combogrid('getValue');
            url = base_url + 'atena/Penjualan/Transaksi/Penjualan/comboGrid' + '/' + lokasi + '/' + row.uuid;
            ubah_url_combogrid($("#IDPENJUALAN"), url, true);
          } else {
            $('#NAMASUBCUSTOMER').textbox('clear');
            $('#ALAMATSUBCUSTOMER').textbox('clear');
            $('#TELPSUBCUSTOMER').textbox('clear');
          }
          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
      });
    }


    function browse_data_jual(id) {
      $(id).combogrid({
        panelWidth: 400,
        idField: 'uuidjual',
        textField: 'kodejual',
        mode: 'remote',
        columns: [
          [{
              field: 'uuidjual',
              hidden: true
            },
            {
              field: 'kodejual',
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
            },
          ]
        ],
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');
          if (row) {
            $("#KODEJUAL").val(row.kodejual);
            //pasti cash jadi selisih = 1
            get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), 1);

            if ($("#mode").val() == "tambah") {
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
          }
          if ($('#mode').val() != '') {
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
              kodejual: '',
              idbarang: '',
              jmlbonus: 0,
            }).datagrid('gotoCell', {
              index: index,
              field: 'kodejual'
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
        }],
        frozenColumns: [
          [{
              field: 'uuidjual',
              hidden: true
            },
            {
              field: 'kodejual',
              hidden: TRANSAKSIJUAL == 'HEADER',
              title: 'Kode Ref',
              width: 140,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 560,
                  mode: 'remote',
                  idField: 'kodejual',
                  textField: 'kodejual',
                  columns: [
                    [{
                        field: 'uuidjual',
                        hidden: true
                      },
                      {
                        field: 'kodejual',
                        title: 'Kode',
                        width: 150
                      },
                      {
                        field: 'kodelokasi',
                        title: 'Kode Lokasi',
                        width: 120,
                        hidden: true
                      },
                      {
                        field: 'namalokasi',
                        title: 'Lokasi',
                        width: 100
                      },
                      {
                        field: 'tgltrans',
                        title: 'Tgl Trans',
                        width: 100
                      },
                      {
                        field: 'userentry',
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
              width: 90,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 750,
                  mode: 'remote',
                  required: true,
                  idField: 'kode',
                  textField: 'kode',
                  onBeforeLoad: function(param) {
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
              title: 'Nama Barang',
              width: 170
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
              field: 'kodemerk',
              hidden: true
            },
            {
              field: 'uuidbarang',
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

            {
              field: 'jmlreturjual',
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
              field: 'sisareturjual',
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
              width: 50,
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
              field: 'konversi',
              title: 'Konversi',
              width: 50,
              align: 'center',
              hidden: true
            },
            ...(LIHATHARGA == 1 ? [{
                field: 'uuidcurrency',
                title: 'Kode Currency',
                hidden: true
              },
              {
                field: 'currency',
                title: 'Curr',
                width: 50
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
                formatter: format_amount,
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }},
              },
              {
                field: 'disckurs',
                title: 'Disc ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 65,
                formatter: format_amount,
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }},
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
            oldharga = row.harga;
            olddiskonpersen = row.discpersen;
            olddiskonrp = row.disc;
          }
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);
          if (field == 'kodejual') {
            var lokasi = $("#IDLOKASI").combogrid('getValue');
            var customer = $("#IDSUBCUSTOMER").combogrid('getValue');
            if (customer == 0) {
              //jika tidak memilih subcustomer, gunakan idcustomer
              customer = $("#IDCUSTOMER").combogrid('getValue');
            }

            ed.combogrid('grid').datagrid('options').url = base_url +
              'atena/Penjualan/Transaksi/Penjualan/comboGrid/' + lokasi + '/' + customer;
            ed.combogrid('grid').datagrid('load', {
              q: ''
            });
            ed.combogrid('showPanel');
          } else if (field == 'kodebarang') {
            var idjual = '';
            //jika transaksi prlain detail
            if (row.uuidjual) idjual = row.uuidjual;

            //jika transaksi prlain header
            if (TRANSAKSIJUAL == 'HEADER') {
              idjual = $("#IDPENJUALAN").combogrid('getValue');
            }

            if (idjual == '') {
              var idcustomer = $("#IDCUSTOMER").combogrid('getValue');
              ed.combogrid('showPanel');
              ed.combogrid('grid').datagrid('options').url = base_url + 'atena/Master/Data/Barang/comboGridJual/' +
                idcustomer;
            } else {
              ed.combogrid('grid').datagrid('options').url = base_url +
                'atena/Penjualan/Transaksi/Penjualan/comboGridBarang/' + idjual;
            }
            ed.combogrid('grid').datagrid('load', {
              q: ''
            });
            ed.combogrid('showPanel');
          } else if (field == 'satuan') {
            ed.combogrid('grid').datagrid('options').url = base_url + 'atena/Master/Data/Barang/satuanBarang/' + row
              .uuidbarang;
            ed.combogrid('grid').datagrid('load', {
              q: '',
              uuidbarang: row.uuidbarang
            });
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
            case 'kodejual':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidjual : '';
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
                uuidjual: id,
                kodebarang: '',
                namabarang: '',
                jmlreturjual: 0,
                sisareturjual: 0,
                satuan: '',
                harga: 0,
                discpersen: 0,
                disc: 0,
                disckurs: 0,
                subtotal: 0,
                pakaippn: "TIDAK",
                ppnpersen: ppnpersenaktif
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
              var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
              var partnumber = data.partnumber ? data.partnumber : '';
              var kodemerk = data.kodemerk ? data.kodemerk : '';
              var discpersen = data.discpersen ? data.discpersen : '0';
              var disc = data.disc ? data.disc : '';
              var discpersenglobal = data.discpersenglobal ? data.discpersenglobal : '';
              var hargaterendah = data.hargaterendah ? data.hargaterendah : 0;
              var disccustomermin = data.disccustomermin ? data.disccustomermin : 0;
              var disctipecustomermin = data.disctipecustomermin ? data.disctipecustomermin : 0;
              var discmerkmin = data.discmerkmin ? data.discmerkmin : 0;
              var disccustomermax = data.disccustomermax ? data.disccustomermax : 0;
              var disctipecustomermax = data.disctipecustomermax ? data.disctipecustomermax : 0;
              var discmerkmax = data.discmerkmax ? data.discmerkmax : 0;
              var hargajual = await get_harga_barang(id);
              var idcurrency;
              var currency;
              var nilaikurs;
              var harga;
              var pakaippn;
              var ppnpersen;

              if (TRANSAKSIJUAL == 'HEADER') {
                if (($("#IDPENJUALAN").combogrid('getValue') == '') || $("#IDPENJUALAN").combogrid('getValue') ==
                  '0') {
                  harga = hargajual.hargamaxsatuan;;
                  pakaippn = 0;
                  ppnpersen = ppnpersenaktif;
                  idcurrency = '{{ session('UUIDCURRENCY') }}';
                  currency = '{{ session('SIMBOLCURRENCY') }}';
                  nilaikurs = 1;
                } else {
                  harga = data ? data.harga : 0;
                  pakaippn = data ? data.pakaippn : 0;
                  ppnpersen = data ? data.ppnpersen : ppnpersenaktif;

                  idcurrency = data.uuidcurrency;
                  currency = data.simbol;
                  nilaikurs = data.nilaikurs;
                }
              } else if (TRANSAKSIJUAL == 'DETAIL') {

                if (row.kodejual == '') {
                  harga = hargajual.hargamaxsatuan;
                  pakaippn = 0;
                  ppnpersen = ppnpersenaktif;
                  idcurrency = '{{ session('UUIDCURRENCY') }}';
                  currency = '{{ session('SIMBOLCURRENCY') }}';
                  nilaikurs = 1;
                } else {
                  harga = data ? data.harga : 0;
                  pakaippn = data ? data.pakaippn : 0;
                  ppnpersen = data ? data.ppnpersen : ppnpersenaktif;

                  idcurrency = data.uuidcurrency;
                  currency = data.simbol;
                  nilaikurs = data.nilaikurs;
                }
              }

              if (pakaippn == 0) pakaippn = "TIDAK";
              else if (pakaippn == 1) pakaippn = "EXCL";
              else if (pakaippn == 2) pakaippn = "INCL";

              if (discpersen != 0 && discpersenglobal != 0) {
                discpersen = discpersen + "+" + discpersenglobal;
              } else if (discpersen != 0) {
                discpersen = discpersen;
              } else if (discpersenglobal != 0) {
                discpersen = discpersenglobal;
              }

              if (row.uuidjual > 0) {
                //
              } else {
                if (parseFloat(disccustomermin) > 0) {
                  discpersen = disccustomermin;
                } else if (parseFloat(disctipecustomermin) > 0) {
                  discpersen = disctipecustomermin;
                } else if (parseFloat(discmerkmin) > 0) {
                  discpersen = discmerkmin;
                }

                oldharga = hargaterendah;
                olddiskonpersen = '0';
                olddiskonrp = 0;
              }

              row_update = {
                uuidbarang: id,
                ppn: ppn,
                namabarang: nama,
                barcodesatuan1: barcodesatuan1,
                partnumber: partnumber,
                kodemerk: kodemerk,
                satuan_lama: satuan,
                satuan: satuan,
                satuanutama: satuanutama,
                konversi: konversi,
                jmlreturjual: 0,
                sisareturjual: 0,
                harga: harga,
                uuidcurrency: idcurrency,
                currency: currency,
                nilaikurs: nilaikurs,
                discpersen: discpersen,
                disc: disc,
                disckurs: 0,
                subtotal: 0,
                pakaippn: pakaippn,
                ppnpersen: ppnpersen,
                hargaterendah: hargaterendah,
                disccustomermin: disccustomermin,
                disctipecustomermin: disctipecustomermin,
                discmerkmin: discmerkmin,
                disccustomermax: disccustomermax,
                disctipecustomermax: disctipecustomermax,
                discmerkmax: discmerkmax,
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

              if ($TRANSAKSIJUAL == 'HEADER') {
                row_update["kodejual"] = $("#KODEJUAL").val();
                row_update["uuidjual"] = $("#IDPENJUALAN").combogrid('getValue');
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
                };
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


    function hitung_subtotal_detail(index, row) {
      // hitung diskon lebih dahulu
      var data = {};
      var harga = parseFloat(row.harga);
      var hargaterendah = 0;
      var dg = $('#table_data_detail');
      var totaldisc = 0;
      var discount = 0;

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

          // if (hitungAkumulasiDiskonPersen([row.discpersen, $('#DISCPERSEN').numberbox('getValue')].join('+')) < mindiskon) {
          // 	discpersen		= olddiskonpersen;
          // 	totaldisc		= olddiskonrp;
          // 	discDescription = '';
          // 	row.disc 		= olddiskonrp;
          // 	data.disc  		= olddiskonrp;
          // 	harga			= parseFloat(row.harga) - olddiskonrp;

          // 	$.messager.alert({
          // 		title  :'Warning',
          // 		msg	   : 'Diskon untuk <br>' + row.namabarang + ' kurang dari batas minimal: ' + " " + mindiskon + " %",
          // 		timeout:{{ session('TIMEOUT') }},
          // 	});
          // } else if (hitungAkumulasiDiskonPersen(row.discpersen) > maxdiskon && maxdiskon > 0) {
          // 	discpersen		= olddiskonpersen;
          // 	totaldisc		= olddiskonrp;
          // 	discDescription = '';
          // 	row.disc 		= olddiskonrp;
          // 	data.disc  		= olddiskonrp;
          // 	harga			= parseFloat(row.harga) - olddiskonrp;

          // 	$.messager.alert({
          // 		title  :'Warning',
          // 		msg	   : 'Diskon untuk <br>' + row.namabarang + ' melebihi batas maksimal: ' + " " + maxdiskon + " %",
          // 		timeout:{{ session('TIMEOUT') }},
          // 	});
          // }

          // membandingkan harga setelah diskon yang didapat dengan harga terendah
          if (harga >= hargajualmin && harga >= hargajualmin2) {
            discDescription = discDescription.slice(0, -1);
            data.disc = totaldisc;
          } else {
            // if (harga < hargajualmin2 && hargajualmin2 > hargajualmin) {
            // 	$.messager.alert({
            // 		title  :'Warning',
            // 		msg	   : 'Harga Terendah untuk Barang <br>' + row.namabarang + ' adalah ' + " " + format_amount(hargajualmin2) + ' (Harga Jual Maksimal - Diskon Maksimal)',
            // 		timeout:{{ session('TIMEOUT') }},
            // 	});
            // } else {
            // 	$.messager.alert({
            // 		title  :'Warning',
            // 		msg	   : 'Harga Terendah untuk Barang <br>' + row.namabarang + ' adalah ' + " " + format_amount(hargajualmin),
            // 		timeout:{{ session('TIMEOUT') }},
            // 	});
            // }

            // totaldisc = olddiskonrp;
            // data.discpersen = olddiskonpersen;
            // row.harga = parseFloat(oldharga);
            // data.harga = parseFloat(oldharga);
            // harga = row.harga - olddiskonrp;
            // discDescription = '';
            // row.disc = olddiskonrp;
            // data.disc = olddiskonrp;
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
            // data.discpersen	= olddiskonpersen;
            // totaldisc		= olddiskonrp;
            // discDescription = '';
            // row.disc 		= olddiskonrp;
            // data.disc  		= olddiskonrp;
            // harga			= parseFloat(row.harga) - olddiskonrp;

            // $.messager.alert({
            // 	title  :'Warning',
            // 	msg	   : 'Diskon untuk <br>' + row.namabarang + ' kurang dari batas minimal: ' + " " + mindiskon + " %",
            // 	timeout:{{ session('TIMEOUT') }},
            // });
          } else {
            harga -= row.disc;

            if (harga >= hargajualmin && harga >= hargajualmin2) {

            } else {
              // if (harga < hargajualmin2 && hargajualmin2 > hargajualmin) {
              // 	$.messager.alert({
              // 		title  :'Warning',
              // 		msg	   : 'Harga Terendah untuk Barang <br>' + row.namabarang + ' adalah ' + " " + format_amount(hargajualmin2) + ' (Harga Jual Maksimal - Diskon Maksimal)',
              // 		timeout:{{ session('TIMEOUT') }},
              // 	});
              // } else {
              // 	$.messager.alert({
              // 		title  :'Warning',
              // 		msg	   : 'Harga Terendah untuk Barang <br>' + row.namabarang + ' adalah ' + " " + format_amount(hargajualmin),
              // 		timeout:{{ session('TIMEOUT') }},
              // 	});
              // }

              // row.disc = olddiskonrp;
              // row.harga = parseFloat(oldharga);
              // data.harga = parseFloat(oldharga);
              // harga = row.harga - olddiskonrp;
            }
          }
        }
      } else if (idbarang == "" || idbarang == null) {
        //BIARKAN
      } else if (idcustomer == "" || idcustomer == null) {
        data.disc = 0;
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

      row.jmlreturjual = parseFloat(row.jmlreturjual).toFixed({{ 'DECIMALDIGITQTY' }});

      data.subtotal = harga * row.jmlreturjual;

      var nilaikurs = parseFloat(row.nilaikurs);
      @if (session('MULTICURRENCY') != '1')
        nilaikurs = 1;
      @endif
      data.hargakurs = parseFloat(row.harga) * nilaikurs;
      data.disckurs = totaldisc <= 0 ? row.disc : totaldisc * nilaikurs;
      data.subtotalkurs = data.subtotal * nilaikurs;

      var dpp = data.subtotalkurs;
      if (row.ppn == 1) {
        if (row.pakaippn == 'TIDAK') {
          data.ppnrp = 0;
          data.dpp = data.subtotalkurs;
        } else if (row.pakaippn == 'EXCL') {
          if (row.ppnpersen == 12) {
            data.ppnrp = Math.ceil(data.subtotalkurs * 11 / row.ppnpersen * row.ppnpersen / 100);
            data.dpp = Math.round(data.subtotalkurs * 11 / row.ppnpersen);
          } else {
            data.ppnrp = Math.floor(data.subtotalkurs * parseFloat(row.ppnpersen) / 100);
            data.dpp = data.subtotalkurs;
          }
        } else if (row.pakaippn == 'INCL') {
          if (row.ppnpersen == 12) {
            data.ppnrp = Math.ceil(data.subtotalkurs * 11 / (100 + 11));
            data.dpp = Math.round((data.subtotalkurs - data.ppnrp) * 11 / row.ppnpersen);
          } else {
            data.ppnrp = Math.floor(data.subtotalkurs * parseFloat(row.ppnpersen) / (100 + parseFloat(row.ppnpersen)));
            data.dpp = data.subtotalkurs - data.ppnrp;
          }
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
        if (index != i &&
          (rows[i].uuidbarang != "" && row.uuidbarang == rows[i].uuidbarang) &&
          ((rows[i].kodejual != "" && row.kodejual == rows[i].kodejual) ||
            (rows[i].kodejual == "" && row.kodejual == ""))) {
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
      var totalppnrp = 0;
      var totaldpp = 0;
      var pph22rp = 0;
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
      var barangtidakkenapajak = 0;
      var barangkenapajak = 0;

      var footer = {
        jmlreturjual: 0,
        disc: 0,
        disckurs: 0,
        subtotal: 0,
        subtotalkurs: 0,
        ppnrp: 0,
        dpp: 0,
        pph22rp: 0
      }
      for (var i = 0; i < data.length; i++) {

        total += parseFloat(data[i].subtotalkurs);
        footer.jmlreturjual += parseFloat(data[i].jmlreturjual);
        footer.disc += parseFloat(data[i].disc);
        footer.disckurs += parseFloat(data[i].disckurs);
        footer.subtotal += parseFloat(data[i].subtotal);
        footer.subtotalkurs += parseFloat(data[i].subtotalkurs);
        footer.ppnrp += parseFloat(data[i].ppnrp);
        footer.dpp += parseFloat(data[i].dpp);
        footer.pph22rp += parseFloat(data[i].pph22rp);


        var idcustomer = $("#IDCUSTOMER").combogrid('getValue');
        var kodemerk = data[i].kodemerk;
        var idbarang = data[i].uuidbarang;
        var namabarang = data[i].namabarang;
        var discpersenmaster = 0;
        var errorMsg = '';

        if (idcustomer != "" && idbarang != "") {
          //CEK DISKON GLOBAL
          if (parseFloat($("#DISCPERSEN").numberbox('getValue')) > 0) {

            discpersenglobal = parseFloat($("#DISCPERSEN").numberbox('getValue'));
            subtotal2 = data[i].subtotalkurs;

            discpersenglobal = parseFloat(discpersenglobal);
            discglobal = +Math.round((subtotal2 * discpersenglobal / 100).toFixed(
              {{ session('DECIMALDIGITAMOUNT') }}));

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

              /// membandingkan diskon yang didapat dengan minimal & maksimal diskon
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
              namabaranghargaterendah += data[i].namabarang + " adalah " + format_amount(hargaterendah) + ",<br>";
              diskonlebihbesardarimaster = true;
            }

            if (data[i].pakaippn == 'TIDAK') {
              ppnrp = 0;
              dpp = subtotalkurs_setelah_diskon_global;
            } else if (data[i].pakaippn == 'EXCL') {
              if (parseFloat(data[i].ppnpersen) == 12) {
                ppnrp = Math.floor(subtotalkurs_setelah_diskon_global * 11 / data[i].ppnpersen * data[i].ppnpersen / 100);
                dpp = Math.round(subtotalkurs_setelah_diskon_global * 11 / data[i].ppnpersen);
              } else {
                ppnrp = Math.floor(subtotalkurs_setelah_diskon_global * parseFloat(data[i].ppnpersen) / 100);
                dpp = subtotalkurs_setelah_diskon_global;
              }
            } else if (data[i].pakaippn == 'INCL') {
              if (parseFloat(data[i].ppnpersen) == 12) {
                ppnrp = Math.floor(subtotalkurs_setelah_diskon_global * 11 / (100 + 11));
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
            totaldpp += parseFloat(data[i].dpp);

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

        $("#DISCPERSEN").numberbox('setValue', 0);
        totaldiscglobal = 0;
        totalsesudahdisc = 0;
      }

      total2 = ((total2).toFixed({{ session('DECIMALDIGITAMOUNT') }}));
      grandtotal = parseFloat(total2) + parseFloat(biaya) + parseFloat(pembulatan);

      $("#PPH22RP").numberbox('setValue', footer.pph22rp);
      $("#DISCRP").numberbox('setValue', totaldiscglobal);
      $("#TOTAL").numberbox('setValue', total);
      $('#BARANGKENAPAJAK').numberbox('setValue', barangkenapajak);
      $('#BARANGTIDAKKENAPAJAK').numberbox('setValue', barangtidakkenapajak);
      $("#TOTALSETELAHDISKON").numberbox('setValue', totalsesudahdisc);
      $('#txt_DPP').numberbox('setValue', totaldpp);
      $("#PPNRP").numberbox('setValue', totalppnrp);
      $("#GRANDTOTAL").numberbox('setValue', grandtotal);
      $('#table_data_detail').datagrid('reloadFooter', [footer]);
    }

    function clear_plugin() {

      olddiskonpersen = 0.00;
      olddiskonrp = 0.00;
      olddiskonglobalpersen = 0.00;
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

      $('[name=pakaipph]').filter(function() {
        return $(this).val() == 2;
      }).prop('checked', true);

      $('.number').numberbox('setValue', 0);

      $("#PPNPERSEN").numberbox('setValue', ppnpersenaktif);
      $("#PPHPERSEN").numberbox('setValue', {{ session('PPH22PERSEN') }});
      hitung_grandtotal();

      $("#TGLTRANS, #TGLKIRIM, #TGLJATUHTEMPO").datebox('setValue', date_format());
      $("#TGLJATUHTEMPO").datebox('readonly');
    }

    async function get_harga_barang(idbarang) {
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
              uuidlokasi: idlokasi
            }
          );
          if (res.success) {
            harga = res.data.harga;
          } else {
            $.messager.alert('Warning', res.message, 'warning');
          }
        } catch (e) {
          const error = (typeof e === 'string') ? e : e.message;
          const textError = getTextError(error);
          $.messager.alert('Error', textError, 'error');
        }
      }
      return harga;
    }

    async function getReturJualConfig() {
      try {
        const res = await fetchData(
          '{{ session('TOKEN') }}',
          link_api.loadConfigReturPenjualan, {
            kodemenu: '{{ $kodemenu }}',
          }
        );
        if (!res.success) {
          throw new Error(res.message);
        }
        $('#tr_transaksi_jual').css('display', res.data.TRANSAKSIJUAL == 'HEADER' ? '' : 'none');
        $('#td_grandtotal').css('display', res.data.LIHATHARGA == 0 ? 'none' : '');
        $('#DISCPERSEN').textbox({
          readonly: res.data.INPUTHARGA == 0
        });
        $('#PEMBULATAN').numberbox({
          readonly: res.data.INPUTHARGA == 0
        });
        TRANSAKSIJUAL = res.data.TRANSAKSIJUAL
        LIHATHARGA = res.data.LIHATHARGA
        INPUTHARGA = res.data.INPUTHARGA
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }
  </script>
@endpush
