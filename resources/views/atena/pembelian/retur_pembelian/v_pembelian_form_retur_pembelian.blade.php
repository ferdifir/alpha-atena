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
                    <fieldset style="height:160px;">
                      <legend id="label_laporan">Info Transaksi</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form">No. Retur Beli</td>
                          <td id="label_form"><input name="kodereturbeli" id="KODERETURBELI" class="label_input"
                              style="width:190px" prompt="Auto Generate" readonly></td>
                          <input type="hidden" id="IDRETURBELI" name="uuidreturbeli">
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
                          <td id="label_form">Tgl. Kirim</td>
                          <td id="label_form"><input name="tglkirim" id="TGLKIRIM" class="date" style="width:190px">
                          </td>
                        </tr>
                        <tr hidden>
                          <td id="label_form">Tgl. Jatuh Tempo</td>
                          <td id="label_form"><input name="tgljatuhtempo" id="TGLJATUHTEMPO" class="date"
                              style="width:190px"></td>
                        </tr>
                        <tr>
                          <td id="label_form">Syarat Bayar</td>
                          <td id="label_form"><input name="uuidsyaratbayar" id="IDSYARATBAYAR" readonly
                              style="width:190px">
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td align="left" valign="top">
                    <fieldset style="height:160px;">
                      <legend id="label_laporan">Info Supplier</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form">Kode</td>
                          <td>
                            <input name="kodesupplier" class="label_input" id="KODESUPPLIER" style="width:100px" readonly
                              prompt="Kode Supplier">
                            <input type="hidden" id="IDSUPPLIER" name="uuidsupplier">
                            <input name="namasupplier" class="label_input" id="NAMASUPPLIER" style="width:210px" readonly
                              prompt="Nama Supplier">
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
                          <td><label id="label_form">Ada NPWP</label></td>
                          <td colspan="3"> <input type="checkbox" value="1" name="adanpwp" id="ADANPWP">
                            <input name="npwp" class="label_input" id="NPWP" style="width:290px" readonly
                              prompt="NPWP Supplier">
                          </td>
                        </tr>
                        <tr>
                        <tr id="kolom_beli">
                          <td id="label_form">No. Beli</td>
                          <td id="label_form" colspan="3"><input name="uuidbeli" id="IDBELI"
                              style="width:313px"></td>
                          <input type="hidden" id="KODEBELI" name="kodebeli">
                        </tr>
                </tr>
                <tr>
                  <td id="label_form">CP.</td>
                  <td>
                    <input name="contactperson" class="label_input" id="CONTACTPERSON" style="width:200px" readonly
                      prompt="Contact Person">
                    <input name="telpcp" class="label_input" id="TELPCP" style="width:110px" readonly
                      prompt="Telp CP">
                  </td>
                </tr>
              </table>
              </fieldset>
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
          <div data-options="region:'south',border:false" style="width:100%; height:35px;">
            <table id="trans_footer" width="100%">
              <tr>
                <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input
                    :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl.
                    Input :</label> <label id="lbl_tanggal"></label></td>
                <td align='right' id='kolomharga'>
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

  <div id="form_cetak" title="Preview" style="width:660px; height:450px">
    <div id="area_cetak"></div>
  </div>
@endsection

@push('js')
  <script>
    var row = {}
    var cekbtnsimpan = true;
    var ppnpersenaktif = 0;
    var indexCellEdit = -1;
    var configtransbeli = "";
    var transaksiBBK = "";
    var configKode = "";
    var idTrans = "";
    var urlIdBeli = "";
    var urlBarang = "";
    var inputharga = false;
    var lihatharga = false;

    $(document).ready(async function() {
      var check = false;
      var check2 = false;
      var promises = [get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          var UT = data.data.cetak;
          check2 = true;
          if (UT == 1) {
            $('#simpan_cetak').css('filter', '');
          } else {
            $('#simpan_cetak').css('filter', 'grayscale(100%)');
            $('#simpan_cetak').removeAttr('onclick');
          }
        }, false),
        await loadConfigReturPembelian().then(() => {
          check = true;
        })
      ];
      await Promise.all(promises);
      if (!check || !check2) return;
      if (configtransbeli == 'HEADER') {
        $("#kolom_beli").show();
      } else {
        $("#kolom_beli").hide();
      }
      if (lihatharga) {
        $("#kolomharga").show();
      } else {
        $("#kolomharga").hide();
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
            export_excel('Faktur Retur Pembelian', $("#area_cetak").html());
            return false;
          }
        }]
      }).window('close');

      var lebar = $('.panel').width();
      var panel = $('.panel');
      var lebar = panel.length > 0 ? panel.width() : 0;
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

      browse_data_syaratbayar('#IDSYARATBAYAR');
      browse_data_supplier('#KODESUPPLIER', 'supplier');
      browse_data_lokasi('#IDLOKASI');
      browse_data_beli('#IDBELI');

      $("#TGLTRANS").datebox({
        onChange: function(newVal, oldVal) {
          set_ppn_aktif(newVal, 'bearer {{ session('TOKEN') }}', function(response) {
            ppnpersenaktif = response.ppnpersen;

            var rows = $('#table_data_detail').datagrid('getRows');

            for (var i = 0; i < rows.length; i++) {
              if (rows[i].kodebeli == '' || rows[i].kodebeli == null) {
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
      });

      $("[name=pakaippn]").change(function() {
        $("#PPNPERSEN").numberbox('setValue', $(this).val() == 0 ? 0 : ppnpersenaktif);
        hitung_grandtotal();
      });

      $("[name=pakaipph]").change(function() {
        $("#PPHPERSEN").numberbox('setValue', $(this).val() == 0 ? 0 : {{ session('PPH22PERSEN') ?? 0 }});
        hitung_grandtotal();
      });

      $('#PEMBULATAN').numberbox({
        readonly: !inputharga,
        onChange: function() {
          hitung_grandtotal();
        }
      });

      $('#DISKON').numberbox({
        readonly: !inputharga,
        onChange: function() {
          total = $('#TOTAL').numberbox('getValue');
          diskon = $('#DISKON').numberbox('getValue');

          $('#DISKONRP').numberbox('setValue', (total * (diskon / 100))).prop('readonly', (diskon > 0 ? true :
            false));

          hitung_grandtotal();
        }
      });

      $('#DISKONRP').numberbox({
        readonly: !inputharga,
        onChange: function() {
          hitung_grandtotal();
        }
      });

      $("#verify").dialog({
        onOpen: function() {
          $('#verify').form('clear');
        },
        buttons: '#verify-buttons'
      }).dialog('close');

      buat_table_detail();

      @if ($mode == 'tambah')
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

    async function cetak(uuidtrans) {
      try {
        $("#window_button_cetak").window('close');
        let url = link_api.cetakReturPembelian + uuidtrans;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidreturbeli: uuidtrans,
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
    async function loadConfigReturPembelian() {
      try {
        let url = link_api.loadConfigReturPembelian;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            kodemenu: '{{ $kodemenu }}',
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
          var data = response.data;
          configKode = data.KODE;
          configtransbeli = data.TRANSAKSIBELI;
          transaksiBBK = data.TRANSAKSIBBK;
          inputharga = data.INPUTHARGA == 1 ? true : false;
          lihatharga = data.LIHATHARGA == 1 ? true : false;
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
      }
    }
    async function tambah() {

      $('#mode').val('tambah');

      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#IDLOKASI').combogrid('readonly', false);
      $('#KODESUPPLIER').combogrid('readonly', false);
      $('#IDBELI').combogrid('readonly', false);
      $('#TGLTRANS').datebox('readonly', false);


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

      clear_plugin();
      reset_detail();
    }

    async function ubah() {
      $(':radio:not(:checked)').attr('disabled', false);
      $('#mode').val('ubah');
      try {
        let url = link_api.loadDataHeaderReturPembelian;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidreturbeli: '{{ $data }}',
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

        //jika tidak punya akses input harga
        if (!inputharga) $(':radio:not(:checked)').attr('disabled', true);

        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);

        await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {
          var UT = data.data.ubah;
          var statusTrans = await getStatusTrans(link_api.getStatusTransaksiReturPembelian,
            'bearer {{ session('TOKEN') }}', {
              uuidreturbeli: '{{ $data }}'
            });
          if (UT == 1 && statusTrans == 'I') {
            $('#btn_simpan_modal').css('filter', '');
          } else {
            document.getElementById('btn_simpan_modal').onclick = '';
            $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
            $('#btn_simpan_modal').removeAttr('onclick');
          }
          $(".form_status").html(status_transaksi(statusTrans));

          $('#IDLOKASI').combogrid('readonly');
          $('#KODESUPPLIER').textbox('readonly');
          $('#IDBBK').combogrid('readonly');
          $('#TGLTRANS').datebox('readonly');
          $('#TGLKIRIM').datebox('readonly');
          $('#IDBELI').combogrid('readonly');

          url = link_api.browsePembelian;
          urlIdBeli = url;
          $("#IDBELI").combogrid("grid").datagrid("options").url = url;
          $("#IDBELI").combogrid("clear");
          $("#IDBELI").combogrid("grid").datagrid("load", {
            q: "",
            uuidlokasi: row.uuidlokasi,
            uuidsupplier: row.uuidsupplier,
          });
          $('#IDBELI').combogrid('setValue', {
            idbeli: row.uuidbeli,
            kodebeli: row.uukodebeli
          });

          $('#KODESUPPLIER').combogrid('setValue', {
            id: row.idsupplier,
            kode: row.kodesupplier
          });
          $('#IDSUPPLIER').val('setValue', row.uuidsupplier);
          $('#NAMASUPPLIER').textbox('setValue', row.namasupplier);
          $('#ALAMAT').textbox('setValue', row.alamatsupplier);
          $('#TELP').textbox('setValue', row.telpsupplier);
          $('#NOREKENING').textbox('setValue', row.norekening);
          $('#CONTACTPERSON').textbox('setValue', row.contactperson);
          $('#TELPCP').textbox('setValue', row.telpcp);

          //pasti cash jadi selisih = 1
          get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), 1);


          idtrans = row.uuidbbk;
          load_data('{{ $data }}');
          $("#form_input").form('load', row);
        });
      }
    }

    async function simpan(jenis_simpan) {
      bukaLoader();
      var arrid = [];

      if (configtransbeli == 'HEADER') {
        arrid.push({
          uuidbeli: $("#IDBELI").getValue()
        });
      } else if (configtransbeli == 'DETAIL') {
        for (var i = 0; i < $('#table_data_detail').datagrid('getRows').length; i++) {
          arrid.push({
            uuidbeli: $('#table_data_detail').datagrid('getRows')[i].uuidbeli
          });
        }
      }

      try {
        let url = link_api.cekTransaksiSudahAdaReturPembelian;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidreturbeli: $("#IDRETURBELI").val(),
            data_detail: arrid,
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })
        if (response.success) {
          if (response.message == "") {
            simpanRetur(jenis_simpan);
          } else // BILA SUDAH PERNAH BUAT RETUR ATAS PEMBELIAN TERSEBUT
          {
            $.messager.confirm('Confirm', response.message, function(r) {
              if (r) {
                simpanRetur(jenis_simpan);
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

    async function simpanRetur(jenis_simpan) {
      $(':radio:not(:checked)').attr('disabled', false);
      var mode = $("#mode").val();

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      $('#window_button_simpan').window('close');


      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }

      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        tampilLoaderSimpan();
        cekbtnsimpan = false;
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
          let url = link_api.simpanReturPembelian;
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
              await cetak(response.data.uuidreturbeli);
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
        let url = link_api.loadDataReturPembelian;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidreturbeli: idtrans,
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

    async function load_detail(idtrans) {
      try {
        bukaLoader();
        let url = link_api.loadDataDetailBuktiPengeluaranBarang;
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
      tutupLoader();
    }

    /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */

    function browse_data_lokasi(id, table) {
      $(id).combogrid({
        panelWidth: 400,
        url: link_api.browseLokasi,
        idField: 'uuidlokasi',
        textField: 'nama',
        mode: 'local',
        sortName: 'nama',
        sortOrder: 'asc',
        readonly: true,
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
          var row = $(id).combogrid('grid').datagrid('getSelected');
          if (row) {
            /*
            var supp = $("#IDSUPPLIER").combogrid('getValue');
            url = base_url + 'atena/Inventori/Transaksi/BarangKeluar/comboGridRetur'+ '/' + '/' + row.ID + '/' + supp;

            ubah_url_combogrid($("#IDBBK"), url, true);*/
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
            $('#IDSYARATBAYAR').val(row.uuidsyaratbayar);
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
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');

          if (row) {
            if (row.npwp) {
              $('#ADANPWP').prop("checked", true);
            } else {
              $('#ADANPWP').prop("checked", false);
            }

            $("#KODESUPPLIER").val(row.kode);
            $("#IDSUPPLIER").val(row.uuidsupplier);
            $('#NAMASUPPLIER').textbox('setValue', row.nama);
            $('#ALAMAT').textbox('setValue', row.alamat);
            $('#TELP').textbox('setValue', row.telp);
            $('#NOREKENING').textbox('setValue', row.norekening);
            $('#CONTACTPERSON').textbox('setValue', row.contactperson);
            $('#TELPCP').textbox('setValue', row.telpcp);
            $('#NPWP').textbox('setValue', row.npwp);
            $('#IDSYARATBAYAR').combogrid('setValue', row.uuidsyaratbayar, );

            var lokasi = $("#IDLOKASI").combogrid('getValue');
            url = link_api.browsePembelian;
            urlIdBeli = url;
            $("#IDBELI").combogrid("grid").datagrid("options").url = url;

            $("#IDBELI").combogrid("clear");
            $("#IDBELI").combogrid("grid").datagrid("load", {
              q: "",
              uuidlokasi: lokasi,
              uuidsupplier: row.uuidsupplier,
            });
          } else {
            $('#NAMASUPPLIER').textbox('clear');
          }
          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
      });
    }

    function browse_data_beli(id) {
      $(id).combogrid({
        panelWidth: 400,
        idField: 'uuidbeli',
        textField: 'kodebeli',
        mode: 'remote',
        onBeforeLoad: function(param) {
          if ('undefined' === typeof param.q || param.q.length == 0) {
            return false;
          }
          if (urlIdBeli == link_api.browsePembelian) {
            var lokasi = $("#IDLOKASI").combogrid('getValue');
            var supplier = $("#IDSUPPLIER").val();

            param.uuidlokasi = lokasi;
            param.uuidsupplier = supplier;
          }
        },
        columns: [
          [{
              field: 'uuidbeli',
              hidden: true
            },
            {
              field: 'kodebeli',
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
            $("#KODEBELI").val(row.kodebeli);
            //pasti cash jadi selisih = 1
            get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), 1);

            if ($("#mode").val() == "tambah") {
              if (row.idlokasi != $("#IDLOKASI").combogrid('getValue') ||
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
                kodebeli: '',
                kodebarang: '',
                jmlreturbeli: 0,
                jmlbonus: 0,
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
              field: 'uuidbeli',
              hidden: true
            },
            {
              field: 'kodebeli',
              hidden: configtransbeli == "HEADER",
              title: 'Kode Ref',
              width: 140,
              onBeforeLoad: function(param) {
                var lokasi = $("#IDLOKASI").combogrid('getValue');
                var supplier = $("#IDSUPPLIER").val();

                param.uuidlokasi = lokasi;
                param.uuidsupplier = supplier;
              },
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 560,
                  mode: 'remote',
                  idField: 'kodebeli',
                  textField: 'kodebeli',
                  columns: [
                    [{
                        field: 'uuidbeli',
                        hidden: true
                      },
                      {
                        field: 'kodebeli',
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
                  panelWidth: 710,
                  mode: 'remote',
                  required: true,
                  idField: 'kodebarang',
                  textField: 'kodebarang',
                  onBeforeLoad: function(param) {
                    if (urlBarang == link_api.browseBarangBySupplier) {
                      var supplier = $("#IDSUPPLIER").val();
                      param.uuidsupplier = supplier;
                      var lokasi = $("#IDLOKASI").val();
                      param.uuidlokasi = lokasi;
                      param.jenis = "pembelian";
                    } else if (urlBarang == link_api.browseBarangPembelian) {
                      var beli = $('#table_data_detail').datagrid('getRows')[indexCellEdit].uuidbeli;
                      if (configtransbeli == "HEADER")
                        beli = $("#IDBELI").combogrid('getValue');
                      param.uuidbeli = beli;
                    }
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
              width: 180
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
          [
            ...(
              lihatharga ? [{
                field: 'adanpwp',
                title: 'Ada NPWP',
                formatter: format_checked,
                align: 'center'
              }, ] : []
            ),
            {
              field: 'jmlreturbeli',
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
                  onBeforeLoad: function(param) {
                    if ('undefined' === typeof param.q || param.q.length == 0) {
                      return false;
                    }
                    var barang = $('#table_data_detail').datagrid('getRows')[indexCellEdit].uuidbarang;
                    if (barang == '' || barang == null) {
                      $.messager.show({
                        title: 'Warning',
                        msg: 'Barang belum dipilih',
                        timeout: {{ session('TIMEOUT') }},
                      });
                      return false;
                    }
                    param.uuidbarang = barang;
                  },
                  columns: [
                    [{
                      field: 'satuan',
                      title: 'Satuan',
                      width: 80
                    }]
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
            ...lihatharga ? [{
                field: 'uuidcurrency',
                title: 'Kode Mata Uang',
                hidden: true
              },
              {
                field: 'currency',
                title: 'Mata Uang',
                width: 50
              },
              {
                field: 'harga',
                title: 'Harga',
                align: 'right',
                width: 85,
                formatter: format_amount,
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
                editor: !inputharga ? null : {
                  type: 'textbox'
                },
                hidden: false
              },
              {
                field: 'disc',
                title: 'Disc',
                align: 'right',
                width: 65,
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
                formatter: format_amount,
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
                formatter: format_amount
                {{ session('MULTICURRENCY') == '0' ? ',hidden:true' : '' }}
              },
              {
                field: 'disckurs',
                title: 'Disc ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 65,
                formatter: format_amount
                {{ session('MULTICURRENCY') == '0' ? ',hidden:true' : '' }}
              },
              {
                field: 'subtotalkurs',
                title: 'Subtotal ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 95,
                formatter: format_amount
                {{ session('MULTICURRENCY') == '0' ? ',hidden:true' : '' }}
              },
              {
                field: 'pakaippn',
                title: 'Pakai PPN',
                align: 'center',
                width: 65,
                editor: !inputharga ? null : {
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
                width: 70,
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
                width: 65,
                formatter: format_amount
              },
              {
                field: 'pph22persen',
                title: 'PPH 22 (%)',
                align: 'right',
                width: 70,
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
                field: 'pph22rp',
                title: 'PPH 22 (Rp)',
                align: 'right',
                width: 75,
                formatter: format_amount
              },
              {
                field: 'ppn',
                hidden: true
              },
            ] : [],
          ],
        ],
        //UNTUK TOMBOL EDIT
        onClickRow: function(index, row) {
          indexDetail = index;
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          indexCellEdit = index;
          var ed = get_editor('#table_data_detail', index, field);

          if (!ed) {
            console.log('Editor tidak ditemukan untuk field:', field);
            return;
          }

          if (field == 'kodebeli') {
            var lokasi = $("#IDLOKASI").combogrid('getValue');
            var supplier = $("#IDSUPPLIER").val();

            ed.combogrid('grid').datagrid('options').url = link_api.browsePembelian;
            ed.combogrid('grid').datagrid('load', {
              q: '',
              uuidlokasi: lokasi,
              uuidsupplier: supplier,
            });
            ed.combogrid('showPanel');
          } else if (field == 'kodebarang') {
            var uuidbeli = '';
            //jika transaksi prlain detail
            if (row.uuidbeli) uuidbeli = row.uuidbeli;

            //jika transaksi prlain header
            if (configtransbeli == "HEADER") {
              uuidbeli = $("#IDBELI").combogrid('getValue');
            }

            var uuidsupplier = $('#KODESUPPLIER').combogrid('getValue');
            var uuidlokasi = $('#IDLOKASI').combogrid('getValue');

            if (uuidbeli == '') {
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
              urlBarang = link_api.browseBarangBySupplier;
            } else {
              ed.combogrid('grid').datagrid('options').url = link_api.browseBarangPembelian;
              urlBarang = link_api.browseBarangPembelian;
            }

            ed.combogrid('grid').datagrid('load', {
              q: '',
              uuidsupplier: uuidsupplier,
              uuidlokasi: uuidlokasi,
              uuidbeli: uuidbeli,
            });
            ed.combogrid('showPanel');

          } else if (field == 'satuan') {
            ed.combogrid('grid').datagrid('options').url = link_api.loadSatuanBarang;
            ed.combogrid('grid').datagrid('load', {
              q: '',
              uuidbarang: row.uuidbarang
            });
            ed.combogrid('showPanel');
          } else if (field == 'pakaippn') {
            ed.combogrid('showPanel');
          }
        },
        onEndEdit: async function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data_detail', index, cell.field);
          if (!ed) {
            // Editor tidak ditemukan, mungkin karena sel tidak dapat diedit.
            return;
          }
          var row_update = {};

          switch (cell.field) {
            case 'kodebeli':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidbeli : '';
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
                uuidbeli: id,
                kodebarang: '',
                namabarang: '',
                tutup: 0,
                satuan: '',
                harga: 0,
                discpersen: 0,
                disc: 0,
                disckurs: 0,
                subtotal: 0,
                pakaippn: "TIDAK",
                ppnpersen: ppnpersenaktif,
                pph22persen: {{ session('PPH22PERSEN') ?? 0 }}
              };
              break;
            case 'kodebarang':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidbarang : '';
              var nama = data ? data.namabarang : '';
              var ppn = data ? data.ppn : '';
              var satuan = data ? data.satuan : '';
              var satuanutama = data ? data.satuanutama : '';
              var konversi = data ? data.konversi : '';
              var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
              var partnumber = data.partnumber ? data.partnumber : '';
              var harga = await get_harga_barang(id);
              var uuidcurrency;
              var currency;
              var nilaikurs;
              var harga;
              var discpersen;
              var disc;
              var disckurs;
              var pakaippn;
              var ppnpersen;
              var pph22persen;

              if (configtransbeli == "HEADER") {
                if ($("#IDBELI").combogrid('getValue') == '' || $("#IDBELI").combogrid('getValue') == '0') {
                  harga = harga;
                  discpersen = 0;
                  disc = 0;
                  disckurs = 0;
                  pakaippn = 0;
                  ppnpersen = ppnpersenaktif;
                  pph22persen = {{ session('PPH22PERSEN') ?? 0 }}
                  uuidcurrency = '{{ session('UUIDCURRENCY') }}';
                  currency = '{{ session('SIMBOLCURRENCY') }}';
                  nilaikurs = 1;
                } else {
                  harga = data ? data.harga : 0;
                  discpersen = data ? data.discpersen : '';
                  disc = data ? data.disc : '';
                  disckurs = data ? data.disckurs : '';
                  pakaippn = data ? data.pakaippn : 0;
                  ppnpersen = data ? data.ppnpersen : ppnpersenaktif;
                  pph22persen = data ? data.pph22persen : {{ session('PPH22PERSEN') ?? 0 }};
                  uuidcurrency = data.uuidcurrency;
                  currency = data.simbol;
                  nilaikurs = data.nilaikurs;
                }
              } else if (configtransbeli == "DETAIL") {
                if (row.kodebeli == '') {
                  harga = harga;
                  discpersen = 0;
                  disc = 0;
                  disckurs = 0;
                  pakaippn = 0;
                  ppnpersen = ppnpersenaktif;
                  pph22persen = {{ session('PPH22PERSEN') ?? 0 }};
                  uuidcurrency = '{{ session('UUIDCURRENCY') }}';
                  currency = '{{ session('SIMBOLCURRENCY') }}';
                  nilaikurs = 1;
                } else {
                  harga = data ? data.harga : 0;
                  discpersen = data ? data.discpersen : '';
                  disc = data ? data.disc : '';
                  disckurs = data ? data.disckurs : '';
                  pakaippn = data ? data.pakaippn : 0;
                  ppnpersen = data ? data.ppnpersen : ppnpersenaktif;
                  pph22persen = data ? data.pph22persen : {{ session('PPH22PERSEN') ?? 0 }};
                  uuidcurrency = data.uuidcurrency;
                  currency = data.simbol;
                  nilaikurs = data.nilaikurs;
                }
              }

              if (pakaippn == 0) pakaippn = "TIDAK";
              else if (pakaippn == 1) pakaippn = "EXCL";
              else if (pakaippn == 2) pakaippn = "INCL";

              row_update = {
                uuidbarang: id,
                ppn: ppn,
                namabarang: nama,
                barcodesatuan1: barcodesatuan1,
                partnumber: partnumber,
                tutup: 0,
                satuan_lama: satuan,
                satuan: satuan,
                satuanutama: satuanutama,
                konversi: konversi,
                harga: harga,
                uuidcurrency: uuidcurrency,
                currency: currency,
                nilaikurs: nilaikurs,
                discpersen: discpersen,
                disc: disc,
                disckurs: disckurs,
                subtotal: 0,
                pakaippn: pakaippn,
                ppnpersen: ppnpersen,
                pph22persen: pph22persen
              };
              if (configtransbeli == "HEADER") {
                row_update["kodebeli"] = $("#KODEBELI").val();
                row_update["uuidbeli"] = $("#IDBELI").combogrid('getValue');
              }
              break;
            case 'satuan':
              // get_konversi (ed.combogrid('grid').datagrid('getRows'), changes.satuan, row.satuan_lama);
              // if (satuan_baru != 0 || satuan_lama != 0 && changes.satuan) {
              // 	row_update = {
              // 		jml		   : (satuan_baru>satuan_lama) ? row.jml*konversi_baru : row.jml/konversi_lama,
              // 		harga      : (satuan_baru>satuan_lama) ? row.harga/konversi_baru : row.harga*konversi_lama,
              // 		hargakurs  : (satuan_baru>satuan_lama) ? row.hargakurs/konversi_baru : row.hargakurs*konversi_lama,
              // 		satuan_lama: changes.satuan
              // 	};
              // }
              break;
            case 'currency':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var uuidcurrency = data ? data.uuidcurrency : '';
              var nilai = get_kurs($('#TGLTRANS').datebox('getValue'), idcurrency);
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
        onAfterEdit: function(index, row, changes) {}
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
      row.jmlreturbeli = parseFloat(row.jmlreturbeli).toFixed({{ session('DECIMALDIGITQTY') }});
      data.discpersen = discDescription == "" ? "0" : discDescription;
      data.subtotal = parseFloat((harga * row.jmlreturbeli).toFixed({{ session('DECIMALDIGITAMOUNT') }}));

      var nilaikurs = parseFloat(row.nilaikurs);
      @if (session('MULTICURRENCY') == '0')
        nilaikurs = 1;
      @endif
      data.hargakurs = parseFloat(row.harga) * nilaikurs;
      data.disckurs = totaldisc <= 0 ? row.disc : totaldisc * nilaikurs;
      data.subtotalkurs = parseFloat((data.subtotal * nilaikurs).toFixed({{ session('DECIMALDIGITAMOUNT') }}));

      var dpp = data.subtotalkurs;

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
        if (index != i && (rows[i].namabarang != "" && row.namabarang == rows[i].namabarang) && (rows[i]
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
        jmlreturbeli: 0,
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
        footer.jmlreturbeli += parseFloat(data[i].jmlreturbeli);
        footer.disc += parseFloat(data[i].disc);
        footer.disckurs += parseFloat(data[i].disckurs);
        footer.subtotal += parseFloat(data[i].subtotal);
        footer.subtotalkurs += parseFloat(data[i].subtotalkurs);
        footer.ppnrp += parseFloat(data[i].ppnrp);
        footer.dpp += parseFloat(data[i].dpp);
        footer.pph22rp += parseFloat(data[i].pph22rp);
      }

      total2 = +((total2).toFixed({{ session('DECIMALDIGITAMOUNT') }}));
      grandtotal = parseFloat(total2 + footer.pph22rp + biaya + pembulatan);

      $("#TOTAL").numberbox('setValue', total);
      $('#BARANGKENAPAJAK').numberbox('setValue', barangkenapajak);
      $('#BARANGTIDAKKENAPAJAK').numberbox('setValue', barangtidakkenapajak);
      //$('#DISKONRP').numberbox('setValue', diskonrp);
      $('#txt_DPP').numberbox('setValue', footer.dpp);
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
      $("#PPHPERSEN").numberbox('setValue', {{ session('PPH22PERSEN') ?? 0 }});
      hitung_grandtotal();

      $("#TGLTRANS, #TGLKIRIM, #TGLJATUHTEMPO").datebox('setValue', date_format());
      $("#TGLJATUHTEMPO").datebox('readonly');
    }

    async function get_harga_barang(idbarang) {
      var idsupp = $("#IDSUPPLIER").val();
      var tgltrans = $("#TGLTRANS").datebox('getValue');
      var harga = 0;

      if (idsupp == '') {
        return harga;
      } else {
        bukaLoader();
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
      }
      tutupLoader();
      return harga;
    }
  </script>
@endpush
