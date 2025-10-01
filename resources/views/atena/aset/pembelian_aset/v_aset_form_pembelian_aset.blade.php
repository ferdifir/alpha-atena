@extends('template.form')

@push('css')
  <style>
    .datagrid-footer-inner .easyui-linkbutton {
      display: none;
    }
  </style>
@endpush

@section('content')
  <form id="form_input" class="easyui-layout" fit="true" enctype="multipart/form-data">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            <script>
              if (screen.height < 450) {
                $("#trans_layout").css('height', "450px");
              }
            </script>
            <div data-options="region:'north',border:false" style="width:100%; height:180px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>

              <input type="hidden" id="mode" name="mode">
              <input type="hidden" name="tglentry">
              <table>
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td valign="top">
                          <fieldset style="height:160px;">
                            <legend id="label_laporan">Info Transaksi</legend>
                            <table border="0">
                              <tr>
                                <td id="label_form">No. Beli Aset</td>
                                <td id="label_form"><input name="kodeasetbeli" id="KODEASETBELI" class="label_input"
                                    style="width:190px" prompt="Auto Generate" readonly></td>
                                <input type="hidden" id="IDASETBELI" name="uuidasetbeli">
                              </tr>
                              <tr>
                                <td id="label_form">Lokasi</td>
                                <td id="label_form"><input name="uuidlokasi" id="IDLOKASI" style="width:190px"></td>
                                <input type="hidden" id="KODELOKASI" name="kodelokasi">
                              </tr>
                              <tr>
                                <td id="label_form">Tgl. Trans
                                <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date"
                                    style="width:190px"></td>
                              </tr>
                              <tr>
                                <td id="label_form">Syarat Bayar</td>
                                <td id="label_form">
                                  <input name="uuidsyaratbayar" id="IDSYARATBAYAR" class="label_input" style="width:95px"
                                    readonly>
                                  <input name="tgljatuhtempo" id="TGLJATUHTEMPO" class="date" style="width:92px"
                                    readonly>
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
                          <fieldset style="height:160px;">
                            <legend id="label_laporan">Info Supplier</legend>
                            <table border="0" id="tabel_pembelian_retur">
                              <tr>
                                <td id="label_form">Kode</td>
                                <td>
                                  <input name="uuidsupplier" class="label_input" id="IDSUPPLIER" style="width:80px"
                                    prompt="Kode Supplier">
                                  <input type="hidden" id="KODESUPPLIER" name="kodesupplier">
                                </td>
                                <td id="label_form">Nama</td>
                                <td>
                                  <input name="namasupplier" class="label_input" id="NAMASUPPLIER" style="width:155px"
                                    readonly prompt="Nama Referensi">
                                </td>
                              </tr>
                              <tr>
                                <td id="label_form">Alamat</td>
                                <td colspan="3">
                                  <input name="alamat" class="label_input" id="ALAMAT" style="width:275px" readonly
                                    prompt="Alamat Referensi">
                                </td>
                              </tr>
                              <tr>
                                <td id="label_form">Telp</td>
                                <td colspan="3">
                                  <input name="telp" class="label_input" id="TELP" style="width:275px" readonly
                                    prompt="Telp Referensi">
                                </td>
                              </tr>
                              <tr>
                                <td><label id="label_form">Ada NPWP</label></td>
                                <td colspan="3"><input type="checkbox" value="1" name="adanpwp"
                                    id="ADANPWP">
                                  <input name="npwp" class="label_input" id="NPWP" style="width:251px"
                                    readonly prompt="NPWP Supplier">
                                </td>
                              </tr>
                            </table>
                          </fieldset>
                        </td>
                        <td valign="top">
                          <fieldset style="height:160px;">
                            <legend id="label_laporan">Info Lain</legend>
                            <table border="0">
                              <tr>
                                <td id="label_form">No. Surat Jalan</td>
                                <td id="label_form"><input name="nosuratjalan" id="NOSURATJALAN" class="label_input"
                                    style="width:190px" required></td>
                              </tr>
                              <tr>
                                <td id="label_form">No. Kendaraan</td>
                                <td id="label_form"><input name="nopol" id="NOPOL" class="label_input"
                                    style="width:190px" required></td>
                              </tr>
                              <tr>
                                <td id="label_form">Nama Sopir</td>
                                <td id="label_form"><input name="namasopir" id="NAMASOPIR" class="label_input"
                                    style="width:190px" required></td>
                              </tr>
                              <tr>
                                <td id="label_form">No. Invoice Supp.</td>
                                <td id="label_form"><input name="noinvoicesupplier" id="NOINVOICESUPPLIER"
                                    class="label_input" style="width:190px" required></td>
                              </tr>
                              <tr>
                                <td id="label_form">No. Rek Supp</td>
                                <td>
                                  <input name="norekening" class="label_input" id="NOREKENING" style="width:190px"
                                    readonly prompt="No. Rekening Supplier">
                                </td>
                              </tr>
                            </table>
                          </fieldset>
                        </td>
                        <td valign="top" style="padding-top:5px;">
                          <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                            style="width:250px; height:80px; " data-options="validType:'length[0, 500]'"></textarea>
                          <br>
                          <textarea name="catatansupplier" class="label_input" id="CATATANSUPPLIER" multiline="true"
                            prompt="Catatan Supplier" style="width:250px; height:80px" data-options="validType:'length[0, 500]'"></textarea>
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
                <div title="Detail Aset">
                  <table id="table_data_detailaset" fit="true"></table>
                </div>
              </div>
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:35px;">
              <table id="trans_footer" width="100%">
                <tr>
                  <td align="left" valign="top">
                    <table border=0>
                      <tr>
                        <td colspan="2">
                          <table cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="left" id="label_form"><label style="font-weight:normal"
                                  id="label_form">User Input :</label> <label id="lbl_kasir"></label> <label
                                  style="font-weight:normal" id="label_form">| Entry Tgl. Transaksi :</label> <label
                                  id="lbl_tanggal"></label></td>
                            </tr>
                          </table>
                        </td>
                      <tr>
                    </table>
                  </td>
                  <td align='right' id="td_total">
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
                        <td id="label_form" align="right">
                          DPP <input name="txt_dpp" id="txt_DPP" class="number " style="width:110px;" readonly>
                        </td>
                        <td id="label_form" align="right">
                          PPN <input name="ppnrp" id="PPNRP" class="number" style="width:110px;" readonly>
                        </td>
                        <td id="label_form" align="right">
                          Add Tax<input name="pajaklainrp" id="PAJAKLAINRP" class="number " style="width:110px;"
                            readonly ="true">
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
  </form>

  <div id="fm-spek-aset" title="Spesifikasi Aset">
    <table style="padding:5px">
      <tr>
        <td>
          <textarea prompt="Tekan 'Ctrl + Enter' untuk simpan catatan
Tekan 'esc' untuk tutup dialog " name="spekaset"
            class="label_input" id="SPEKASET" multiline="true" style="width:300px; height:155px"
            data-options="validType:'length[0, 500]'"></textarea>
        </td>
      </tr>
    </table>
  </div>

  <br>

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

  <div id="window-preview-aset" class="easyui-window" title="Preview Gambar Aset"
    data-options="modal: true,closed: true" style="width: 350px; height: 350px">
    <img id="preview-image-aset" style="width: 300px;display: block;margin: 0 auto">
  </div>

  <input type="file" id="browse_gambar">
@endsection

@push('js')
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-filter/datagrid-filter.js') }}"></script>
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
  <script>
    var indexDetail = null;
    var cekbtnsimpan = true; //CEK APAKAH TOMBOL SIMPAN BISA DITEKAN ATAU BELUM (SUPAYA TIDAK TERKLIK 2x)
    var ppnpersenaktif = 0;
    let INPUTHARGA;

    $(document).ready(async function() {
      await loadConfigPembelianAset();
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        if (data.data.cetak == 1) {
          $('#simpan_cetak').css('filter', '');
        } else {
          $('#simpan_cetak').css('filter', 'grayscale(100%)');
          $('#simpan_cetak').removeAttr('onclick');
        }
      }, false);

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
            export_excel('Faktur Pembelian Aset', $("#area_cetak").html());
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

      browse_data_syaratbayar('#IDSYARATBAYAR');
      browse_data_supplier('#IDSUPPLIER');
      browse_data_lokasi('#IDLOKASI');

      $('#TGLTRANS').datebox({
        onChange: function(newVal, oldVal) {
          var nilaikurs = 0;
          var row = $('#table_data_detail').datagrid('getRows');

          if ($('#mode').val() != '' && (nilaikurs > 1 || row.length > 0) && oldVal != '') {
            $.messager.confirm('Confirm',
              'Anda Yakin Melakukan Perubahan Tanggal, Jika Ya Maka NilaiKurs dan Data Detail Akan Terganti ?',
              function(r) {
                if (r) {
                  get_all_kurs($('#TGLTRANS').datebox('getValue'), function(data) {
                    var curr = data.data_detail;
                    var ln = curr.length;
                    for (var i = 0; i < ln; i++) {
                      var ln1 = row.length;
                      for (var j = 0; j < ln1; j++) {
                        if (curr[i].uuidcurrency == row[j].uuidcurrency) {
                          $('#table_data_detail').datagrid('updateRow', {
                            index: j,
                            row: {
                              nilaikurs: curr[i].kurs,
                              hargakurs: (row[j].harga - row[j].disc) * curr[i].kurs,
                              disckurs: row[j].disc * curr[i].kurs,
                              subtotalkurs: (row[j].harga - row[j].disc) * curr[i].kurs * row[j]
                                .jmlasetpo,
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

          set_ppn_aktif(newVal, 'Bearer {{ session('TOKEN') }}', function(response) {
            response = response.data;
            ppnpersenaktif = response.ppnpersen;

            update_ppn_table_detail($('#table_data_detail'), ppnpersenaktif, function(index, row) {
              hitung_subtotal_detail(index, row);
            });

            hitung_grandtotal();
          });
        },
        onSelect: function(date) {
          var row = $('#IDSYARATBAYAR').combogrid('grid').datagrid('getSelected');
          if ($('#mode').val() != '' && row)
            get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), row.selisih);
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

      $("#fm-spek-aset").dialog({
        onOpen: function() {
          $('#fm-spek-aset').form('clear');
        },
        buttons: [{
          text: 'Simpan',
          iconCls: 'icon-save',
          handler: function() {
            simpan_catatan_aset($('#SPEKASET').textbox('getValue'));
          },
        }],
        modal: true,
      }).dialog('close');

      $('#SPEKASET').textbox('textbox').bind('keydown', function(e) {
        if (e.keyCode == 13 && e.ctrlKey) { // when press ENTER key, accept the inputed value.
          simpan_catatan_aset($(this).val());
        } else if (e.keyCode == 27) {
          $("#fm-spek-aset").dialog('close')
        }
      });

      $("#verify").dialog({
        onOpen: function() {
          $('#verify').form('clear');
        },
        buttons: '#verify-buttons'
      }).dialog('close');

      buat_table_detail();

      buat_table_detailaset();

      @if ($mode == 'tambah')
        tambah();
      @elseif ($mode == 'ubah')
        ubah();
      @endif

      $('#browse_gambar').change(function(e) {
        if ($(this)[0].files && $(this)[0].files[0]) {
          $('#table_data_detail').datagrid('updateRow', {
            index: indexDetail,
            row: {
              filegambar: $(this)[0].files[0]
            }
          });
        }
      })
    })

    shortcut.add('F8', function() {
      simpan();
    });

    function before_simpan() {
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.tambah == 1) {
          $.messager.confirm('Confirm', 'Anda Yakin Akan Approve Transaksi?', function(r) {
            if (r) {
              simpan();
            }
          });
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    var idTrans = "";

    function tutup() {
      parent.tutupTab();
    }

    async function cetak(id) {
      const doc = await getCetakDocument(
        link_api.cetakPembelianAset + id,
        '{{ session('TOKEN') }}',
      );
      if (doc) {
        $("#window_button_cetak").window('close');
        $("#area_cetak").html(doc);
        $("#form_cetak").window('open');
      }
    }

    async function tambah() {
      $('#form_input').form('clear');
      $('#mode').val('tambah');

      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#IDLOKASI').combogrid('readonly', false);
      $('#IDSUPPLIER').combogrid('readonly', false);
      $('#TGLTRANS').combogrid('readonly', false);
      idtrans = "";

      try {
        const response = await fetch(
          link_api.getLokasiDefault, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer {{ session('TOKEN') }}'
            },
          }
        );

        if (response.ok) {
          const res = await response.json();
          if (!res.success) {
            throw new Error(res.message);
          }
          $('#IDLOKASI').combogrid('setValue', res.data.uuidlokasi);
          $("#KODELOKASI").val(res.data.kodelokasi);
        } else {
          throw new Error('Http Error: ' + response.status);
        }
      } catch (e) {
        showErrorAlert(e);
      }

      clear_plugin();
      reset_detail();
      tutupLoader();
    }

    async function ubah() {
      $(':radio:not(:checked)').attr('disabled', false);
      $('#mode').val('ubah');
      let row = null;

      try {
        const response = await fetch(
          link_api.loadDataHeaderPembelianAset, {
            method: 'POST',
            headers: {
              'Authorization': 'bearer {{ session('TOKEN') }}',
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({
              uuidasetbeli: '{{ $data }}'
            }),
          }
        );

        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const res = await response.json();
        if (res.success) {
          row = res.data;
        } else {
          throw new Error(res.message);
        }
      } catch (e) {
        showErrorAlert(e);
      }

      if (row) {
        const statusTrans = await getStatusTrans(
          link_api.getStatusTransPembelianAset,
          'bearer {{ session('TOKEN') }}', {
            uuidasetbeli: row.uuidasetbeli
          }
        );
        $(".form_status").html(status_transaksi(statusTrans));

        //jika tidak punya akses input harga
        if (INPUTHARGA == 0) {
          $(':radio:not(:checked)').attr('disabled', true);
        }

        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);

        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          if (data.data.ubah == 1 && statusTrans == 'I') {
            $('#btn_simpan_modal').css('filter', '');
            $('#mode').val('ubah');
          } else {
            document.getElementById('btn_simpan_modal').onclick = '';
            $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
            $('#btn_simpan_modal').removeAttr('onclick');
          }

          $("#form_input").form('load', row);
          $('#IDLOKASI').combogrid('readonly');
          $('#IDSUPPLIER').combogrid('readonly');
          $('#TGLTRANS').combogrid('readonly');

          $('#NOSURATJALAN').textbox('setValue', row.nosuratjalan);
          $('#NOPOL').textbox('setValue', row.nopol);
          $('#NAMASOPIR').textbox('setValue', row.namasopir);

          get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), row.selisih);
          $('#table_data_detailaset').datagrid('loadData', []);

          //SUPPLIER
          var url = link_api.browseSupplier;
          get_combogrid_data($("#IDSUPPLIER"), 'uuidsupplier', row.uuidsupplier, url, '{{ session('TOKEN') }}');

          load_data(row.uuidasetbeli);
        });
      }
    }

    async function simpan(jenis_simpan) {
      $(':radio:not(:checked)').attr('disabled', false);
      var mode = $("#mode").val();
      let dataDetail = $('#table_data_detail').datagrid('getRows');
      dataDetail = dataDetail.map((item) => {
        let jml = Number(item.jml) || 0;
        let masamanfaat = Number(item.masamanfaat) || 0;
        return {
          ...item,
          jml: jml,
          masamanfaat: masamanfaat
        };
      });

      $('#data_detail').val(JSON.stringify(dataDetail));
      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      $('#window_button_simpan').window('close');

      var data = new FormData($('#form_input')[0]);

      var daftar_detail = $('#table_data_detail').datagrid('getRows');

      for (var i in daftar_detail) {
        data.append('data_gambar[' + i + ']', daftar_detail[i].filegambar);
      }

      data.set('jenis_simpan', jenis_simpan);

      if (isValid) {
        var aset = [];
        var rows = $('#table_data_detail').datagrid('getRows');
        for (var i = 0; i < rows.length; i++) {
          var nama = rows[i].namaaset;
          if ($.inArray(nama, aset) == -1) { // not found
            aset.push(nama);
          } else {
            $.messager.alert('Error', 'Ada Aset Yang Terinput 2x<br>Cek Aset ' + nama, 'error');
            isValid = false;
            break;
          }
        }
      }

      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }

      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        cekbtnsimpan = false;
        try {
          tampilLoaderSimpan();
          const response = await fetch(
            link_api.simpanPembelianAset, {
              method: 'POST',
              headers: {
                'Authorization': 'Bearer {{ session('TOKEN') }}',
              },
              body: data
            }
          );

          cekbtnsimpan = true;
          if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
          }

          const res = await response.json();
          if (res.success) {
            $('#form_input').form('clear');
            $.messager.show({
              title: 'Info',
              msg: 'Transaksi Sukses',
              showType: 'show'
            });
            @if ($mode == 'tambah')
              tambah();
            @elseif ($mode == 'ubah')
              ubah();
            @endif
            if (jenis_simpan == 'simpan_cetak') {
              cetak(res.data.uuidasetbeli);
            }
          } else {
            throw new Error(res.message);
          }
        } catch (e) {
          showErrorAlert(e);
        } finally {
          tutupLoaderSimpan();
        }
      }
    }

    function reset_detail() {
      $('#table_data_detail').datagrid('loadData', []);
      $('#table_data_detailaset').datagrid('loadData', []);
    }

    async function load_data(idtrans) {
      try {
        const response = await fetch(
          link_api.loadDataPembelianAset, {
            method: 'POST',
            headers: {
              'Authorization': 'bearer {{ session('TOKEN') }}',
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({
              uuidasetbeli: idtrans
            }),
          }
        );
        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const res = await response.json();
        if (res.success) {
          $('#table_data_detail').datagrid('loadData', res.data);
        } else {
          throw new Error(res.message);
        }
      } catch (e) {
        showErrorAlert(e);
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
        sortName: 'kode',
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
          if ($('#mode').val() != '') {

            if (row) {
              $("#KODELOKASI").val(row.kode);
            }

            reset_detail();
          }
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
              field: 'uuidsyaratbayar',
              hidden: true
            },
          ]
        ],
        onSelect: function(index, row) {
          if (row.npwp) {
            $('#ADANPWP').prop("checked", true);
          } else {
            $('#ADANPWP').prop("checked", false);
          }

          $("#KODESUPPLIER").val(row.kode);
          $('#NAMASUPPLIER').textbox('setValue', row.nama);
          $('#ALAMAT').textbox('setValue', row.alamat);
          $('#TELP').textbox('setValue', row.telp);
          $('#NOREKENING').textbox('setValue', row.norekening);
          $('#NPWP').textbox('setValue', row.npwp);
          $('#IDSYARATBAYAR').combogrid('setValue', row.uuidsyaratbayar);

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
        onSelect: function(index, row) {},
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');
          if ($('#mode').val() != '' && row) {
            get_tgl_jatuh_tempo($('#TGLJATUHTEMPO'), $('#TGLTRANS').datebox('getValue'), row.selisih)
          }
        },
      });
    }

    function simpan_catatan_aset(catatanAset) {
      // post to detail grid
      var dg = $('#table_data_detail');
      var cell = dg.datagrid('cell');
      if (cell) {
        dg.datagrid('updateRow', {
          index: cell.index,
          row: {
            spekaset: catatanAset.toUpperCase()
          }
        }).datagrid('gotoCell', {
          index: cell.index,
          field: cell.field
        });

        $("#fm-spek-aset").dialog('close')
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
            var index = $(dg).datagrid('getRows').length;
            $(dg).datagrid('appendRow', {
              kodebarang: '',
              gambar: '',
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
              field: 'namaaset',
              title: 'Nama Aset',
              width: 200,
              editor: {
                type: 'combogrid',
                onBeforeLoad: function(param) {
                  param.uuidlokasi = $("#IDLOKASI").combogrid('getValue');
                },
                options: {
                  panelWidth: 220,
                  mode: 'remote',
                  idField: 'nama',
                  textField: 'nama',
                  columns: [
                    [{
                      field: 'nama',
                      title: 'Nama',
                      width: 200
                    }, ]
                  ],
                }
              }
            },
            {
              field: 'detailaset',
              title: '-',
              hidden: true,
              formatter: function(val, row) {
                return JSON.stringify(val);
              }
            },
          ]
        ],
        columns: [
          [{
              field: 'gambar',
              hidden: true
            },
            {
              field: 'filegambar',
              hidden: true
            },
            {
              field: 'browsegambar',
              formatter: function(val, row, index) {
                var div = $(document.createElement('div'));
                var pilih_file = $(
                  '<a  onclick="browse_gambar_aset()" class="easyui-linkbutton pilih-gambar" data-options="plain: true,iconCls:\'icon-add\'"></a>'
                );
                var preview = $('<a  onclick="preview_gambar_aset(' + index +
                  ')" class="easyui-linkbutton preview-gambar" data-options="plain: true,iconCls:\'icon-eye\'"></a>'
                );

                pilih_file.linkbutton();
                preview.linkbutton();

                div.append(pilih_file);

                if (row.gambar != '') {
                  div.append(preview);
                }

                return div.prop('outerHTML');
              },
              title: 'Gambar'
            },
            {
              field: 'jml',
              title: 'Jumlah',
              align: 'right',
              width: 50,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 2,
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
              align: 'center',
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 100,
                  panelHeight: 130,
                  required: true,
                  mode: 'remote',
                  url: link_api.loadSatuanSaldoAwalAset,
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
            //v-------MASET-------v
            {
              field: 'spekaset',
              title: 'Spesifikasi Aset',
              width: 250,
              editor: {
                type: 'validatebox',
              },
              formatter: format_textarea
            },
            {
              field: 'statusgaransi',
              title: 'Status Garansi',
              align: 'center',
              width: 100,
              editor: {
                type: 'combobox',
                options: {
                  //required:true,
                  data: [{
                    value: 1,
                    text: 'YA'
                  }, {
                    value: 0,
                    text: 'TIDAK'
                  }],
                  panelHeight: 'auto',
                }
              },
              formatter: function(val) {
                if (val == 0) return "TIDAK";
                else if (val == 1) return "YA";
              }
            },
            {
              field: 'tglakhirgaransi',
              title: 'Tgl. Akhir Garansi',
              width: 150,
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
              field: 'masamanfaat',
              title: 'Masa Manfaat (Bulan)',
              width: 130,
              align: 'center',
              editor: {
                type: 'numberbox',
                options: {
                  precision: 0,
                  required: true
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
            ...(LIHATHARGA == 1 ? [{
                field: 'uuidcurrency',
                title: 'Kode Currency',
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
                formatter: format_amount,
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
                hidden: false,
                formatter: format_amount,
                hidden: {{ session('MULTICURRENCY') == '0' ? 'true' : 'false' }},
              },
              {
                field: 'disckurs',
                title: 'Disc ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 65,
                formatter: format_amount,
                hidden: {{ session('MULTICURRENCY') == '0' ? 'false' : 'true' }}
              },
              {
                field: 'subtotalkurs',
                title: 'Subtotal ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 95,
                hidden: false,
                formatter: format_amount,
                hidden: {{ session('MULTICURRENCY') == '0' ? 'false' : 'true' }}
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
                field: 'namapajaklain1',
                title: 'Add Tax 1',
                width: 90,
                align: 'center',
                hidden: true,
                editor: {
                  type: 'combogrid',
                  options: {
                    panelWidth: 190,
                    panelHeight: 130,
                    mode: 'remote',
                    url: link_api.browsePajak,
                    idField: 'namapajak',
                    textField: 'namapajak',
                    columns: [
                      [{
                          field: 'uuidpajak',
                          hidden: true
                        },
                        {
                          field: 'namapajak',
                          title: 'Nama Pajak',
                          width: 80
                        },
                        {
                          field: 'nilai',
                          title: '%',
                          formatter: function(val, row) {
                            return Number(val).toFixed(2) + "%";
                          },
                          width: 80
                        },
                      ]
                    ],
                  }
                }
              },
              {
                field: 'pajaklain1persen',
                title: 'Add Tax 1 (%)',
                align: 'right',
                width: 80,
                formatter: format_amount_2,
                hidden: true,
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
                field: 'pajaklain1rp',
                title: 'Add Tax 1 ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 90,
                formatter: format_amount,
                hidden: true
              },
              {
                field: 'namapajaklain2',
                title: 'Add Tax 2',
                width: 90,
                align: 'center',
                hidden: true,
                editor: {
                  type: 'combogrid',
                  options: {
                    panelWidth: 190,
                    panelHeight: 130,
                    mode: 'remote',
                    url: link_api.browsePajak,
                    idField: 'namapajak',
                    textField: 'namapajak',
                    columns: [
                      [{
                          field: 'uuidpajak',
                          hidden: true
                        },
                        {
                          field: 'namapajak',
                          title: 'Nama Pajak',
                          width: 80
                        },
                        {
                          field: 'nilai',
                          title: '%',
                          formatter: function(val, row) {
                            return Number(val).toFixed(2) + "%";
                          },
                          width: 80
                        },
                      ]
                    ],
                  }
                }
              },
              {
                field: 'pajaklain2persen',
                title: 'Add Tax 2 (%)',
                align: 'right',
                width: 80,
                hidden: true,
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
                field: 'pajaklain2rp',
                title: 'Add Tax 2 ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 90,
                formatter: format_amount,
                hidden: true
              },
              {
                field: 'namapajaklain3',
                title: 'Add Tax 3',
                width: 90,
                align: 'center',
                hidden: true,
                editor: {
                  type: 'combogrid',
                  options: {
                    panelWidth: 190,
                    panelHeight: 130,
                    mode: 'remote',
                    url: link_api.browsePajak,
                    idField: 'namapajak',
                    textField: 'namapajak',
                    columns: [
                      [{
                          field: 'uuidpajak',
                          hidden: true
                        },
                        {
                          field: 'namapajak',
                          title: 'Nama Pajak',
                          width: 80
                        },
                        {
                          field: 'nilai',
                          title: '%',
                          formatter: function(val, row) {
                            return Number(val).toFixed(2) + "%";
                          },
                          width: 80
                        },
                      ]
                    ],
                  }
                }
              },
              {
                field: 'pajaklain3persen',
                title: 'Add Tax 3 (%)',
                align: 'right',
                width: 80,
                formatter: format_amount_2,
                hidden: true,
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
                field: 'pajaklain3rp',
                title: 'Add Tax 3 ({{ session('SIMBOLCURRENCY') }})',
                align: 'right',
                width: 90,
                formatter: format_amount,
                hidden: true
              },
            ] : []),
            {
              field: 'uuidakunaset',
              hidden: true
            },
            {
              field: 'uuidakunbiayasusut',
              hidden: true
            },
            {
              field: 'uuidakunakumulasisusut',
              hidden: true
            },
            {
              field: 'akunaset',
              title: 'Akun Aset',
              width: 150,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 380,
                  mode: 'remote',
                  required: true,
                  url: link_api.browsePerkiraan,
                  onBeforeLoad: function(param) {
                    param.jenis = 'detail';
                    param.aktif = 1;
                  },
                  idField: 'uuidperkiraan',
                  textField: 'nama',
                  columns: [
                    [{
                        field: 'uuidperkiraan',
                        hidden: true
                      },
                      {
                        field: 'kode',
                        title: 'Kode',
                        width: 110
                      },
                      {
                        field: 'nama',
                        title: 'Nama',
                        width: 250
                      },
                    ]
                  ],
                }
              }
            },
            {
              field: 'akunbiayasusut',
              title: 'Akun Biaya Penyusutan',
              width: 250,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 380,
                  mode: 'remote',
                  required: true,
                  url: link_api.browsePerkiraan,
                  onBeforeLoad: function(param) {
                    param.jenis = 'detail';
                    param.aktif = 1;
                  },
                  idField: 'uuidperkiraan',
                  textField: 'nama',
                  columns: [
                    [{
                        field: 'uuidperkiraan',
                        hidden: true
                      },
                      {
                        field: 'kode',
                        title: 'Kode',
                        width: 110
                      },
                      {
                        field: 'nama',
                        title: 'Nama',
                        width: 250
                      },
                    ]
                  ],
                }
              }
            },
            {
              field: 'akunakumulasisusut',
              title: 'Akun Akumulasi Penyusutan',
              width: 250,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 380,
                  mode: 'remote',
                  required: true,
                  url: link_api.browsePerkiraan,
                  onBeforeLoad: function(param) {
                    param.jenis = 'detail';
                    param.aktif = 1;
                  },
                  idField: 'uuidperkiraan',
                  textField: 'nama',
                  columns: [
                    [{
                        field: 'uuidperkiraan',
                        hidden: true
                      },
                      {
                        field: 'kode',
                        title: 'Kode',
                        width: 110
                      },
                      {
                        field: 'nama',
                        title: 'Nama',
                        width: 250
                      },
                    ]
                  ],
                }
              }
            },
          ]
        ],
        onClickRow: function(index, row) {
          indexDetail = index;
        },
        onBeforeCellEdit: function(index, field) {
          var row = $(this).datagrid('getRows')[index];
          if (field == 'spekaset') {
            $("#fm-spek-aset").dialog('open');
            $('#SPEKASET').textbox('setValue', row.spekaset).textbox('textbox').focus();
            return false;
          }
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);
          if (field == 'namaaset') {
            // var lokasi = $("#IDLOKASI").combogrid('getValue');
            ed.combogrid('grid').datagrid('options').url = link_api.browseAsetPembelianAset;
            ed.combogrid('grid').datagrid('load', {
              q: '',
              //   uuidlokasi: lokasi
            });
            ed.combogrid('showPanel');

          } else if (field == 'satuan') {
            ed.combogrid('showPanel');
          } else if (field == 'currency') {
            ed.combogrid('showPanel');
          } else if (field == 'pakaippn') {
            ed.combogrid('showPanel');
          } else if (field == 'namapajaklain1') {
            ed.combogrid('showPanel');
          } else if (field == 'namapajaklain2') {
            ed.combogrid('showPanel');
          } else if (field == 'namapajaklain3') {
            ed.combogrid('showPanel');
          } else if (field == 'akunaset') {
            ed.combogrid('showPanel');
          } else if (field == 'akunhutang') {
            ed.combogrid('showPanel');
          } else if (field == 'statusgaransi') {
            ed.combogrid('showPanel');
          } else if (field == 'akunaset') {
            ed.combogrid('showPanel');
          } else if (field == 'akunbiayasusut') {
            ed.combogrid('showPanel');
          } else if (field == 'akunakumulasisusut') {
            ed.combogrid('showPanel');
          }
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data_detail', index, cell.field);
          var row_update = {};

          switch (cell.field) {
            case 'jml':
              $('#table_data_detailaset').datagrid('loadData', []);

              var detailAset = [];
              for (var i = 0; i < row.jml; i++) {
                detailAset[i] = {
                  'uuidaset': '',
                  'namaaset': row.namaaset,
                  'kodeaset': 'Auto',
                  'serialnumber': '',
                  'masamanfaat': row.masamanfaat,
                  'spekaset': row.spekaset,
                  'satuan': row.satuan,
                  'statusgaransi': row.statusgaransi,
                  'tglakhirgaransi': row.tglakhirgaransi,
                  'uuidakunaset': row.uuidakunaset,
                  'uuidakunbiayasusut': row.uuidakunbiayasusut,
                  'uuidakunakumulasisusut': row.uuidakunakumulasisusut
                };
              }
              row.detailaset = detailAset;
              $('#table_data_detailaset').datagrid('loadData', detailAset);
              break;
            case 'namaaset':
              //uppercase nama aset
              var nama = changes.namaaset ? changes.namaaset : namaaset;
              var namaaset = nama.toUpperCase();

              row_update = {
                namaaset: namaaset,
                jml: 0,
                satuan: 'UNIT',
                harga: 0,
                uuidcurrency: '{{ session('UUIDCURRENCY') }}',
                currency: '{{ session('SIMBOLCURRENCY') }}',
                nilaikurs: 1,
                discpersen: 0,
                disc: 0,
                disckurs: 0,
                subtotal: 0,
                subtotalkurs: 0,
                dpp: 0,
                pakaippn: "TIDAK",
                ppnpersen: ppnpersenaktif,
                pajaklain1persen: 0,
                pajaklain2persen: 0,
                pajaklain3persen: 0,
              };
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
            case 'namapajaklain1':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidpajak : '';
              var nilai = data ? data.nilai : '';
              row_update = {
                uuidpajaklain1: id,
                nilaipajaklain1: nilai,
                pajaklain1persen: nilai
              };
              break;
            case 'pajaklain1persen':
              if (row.namapajaklain1 && row.namapajaklain1 != '') {
                //jika sudah memilih pajak lain, cek apakah persen boleh diubah
                if (parseFloat(row.nilaipajaklain1) > 0) {
                  //reset karena harus memilih pajaklain dulu
                  row_update = {
                    pajaklain1persen: row.nilaipajaklain1
                  };
                }
              } else {
                //reset karena harus memilih pajaklain dulu
                row_update = {
                  pajaklain1persen: 0
                };
              }
              break;
            case 'namapajaklain2':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidpajak : '';
              var nilai = data ? data.nilai : '';
              row_update = {
                uuidpajaklain2: id,
                nilaipajaklain2: nilai,
                pajaklain2persen: nilai
              };
              break;
            case 'pajaklain2persen':
              if (row.namapajaklain2 && row.namapajaklain2 != '') {
                //jika sudah memilih pajak lain, cek apakah persen boleh diubah
                if (parseFloat(row.nilaipajaklain2) > 0) {
                  //reset karena harus memilih pajaklain dulu
                  row_update = {
                    pajaklain2persen: row.nilaipajaklain2
                  };
                }
              } else {
                //reset karena harus memilih pajaklain dulu
                row_update = {
                  pajaklain2persen: 0
                };
              }
              break;
            case 'namapajaklain3':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidpajak : '';
              var nilai = data ? data.nilai : '';
              row_update = {
                uuidpajaklain3: id,
                nilaipajaklain3: nilai,
                pajaklain3persen: nilai
              };
              break;
            case 'pajaklain3persen':
              if (row.namapajaklain3 && row.namapajaklain3 != '') {
                //jika sudah memilih pajak lain, cek apakah persen boleh diubah
                if (parseFloat(row.nilaipajaklain3) > 0) {
                  //reset karena harus memilih pajaklain dulu
                  row_update = {
                    pajaklain3persen: row.nilaipajaklain3
                  };
                }
              } else {
                //reset karena harus memilih pajaklain dulu
                row_update = {
                  pajaklain3persen: 0
                };
              }
              break;
            case 'akunaset':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidperkiraan : '';
              var nama = data ? data.nama : '';

              row_update = {
                uuidakunaset: id,
                akunaset: nama,
              };
              break;
            case 'akunbiayasusut':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidperkiraan : '';
              var nama = data ? data.nama : '';

              row_update = {
                uuidakunbiayasusut: id,
                akunbiayasusut: nama
              };
              break;
            case 'akunakumulasisusut':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidperkiraan : '';
              var nama = data ? data.nama : '';

              row_update = {
                uuidakunakumulasisusut: id,
                akunakumulasisusut: nama,
              };
              break;
            case 'pakaippn':
              row_update = {
                ppnpersen: ppnpersenaktif,
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
          var row = $(this).datagrid('getRows')[index];

          var detailAset = [];
          if (row.detailaset)
            detailAset = row.detailaset;

          $('#table_data_detailaset').datagrid('loadData', detailAset);
        }
      }).datagrid('enableCellEditing');
    }

    function hitung_subtotal_detail(index, row) {
      // hitung diskon lebih dahulu
      var data = {};
      var harga = parseFloat(row.harga);
      var dg = $('#table_data_detail');
      var totaldisc = 0;

      data.jml = parseFloat(row.jml).toFixed({{ session('DECIMALDIGITQTY') }});
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
        if (harga < 0) {
          data.disc = parseFloat(row.harga);
          harga = 0;
        }
      }
      data.discpersen = discDescription == "" ? "0" : discDescription;
      data.subtotal = harga * data.jml;

      var nilaikurs = parseFloat(row.nilaikurs);
      @if (session('MULTICURRENCY') == '0')
        nilaikurs = 1;
      @endif
      data.hargakurs = parseFloat(row.harga) * nilaikurs;
      data.disckurs = totaldisc <= 0 ? row.disc : totaldisc * nilaikurs;
      data.subtotalkurs = data.subtotal * nilaikurs;

      var dpp = data.subtotalkurs;
      var dppasli = data.subtotalkurs;

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

      if (row.namapajaklain1 != '') {
        data.pajaklain1rp = row.pajaklain1persen * data.dpp / 100;
      } else {
        data.pajaklain1rp = 0;
      }

      if (row.namapajaklain2 != '') {
        data.pajaklain2rp = row.pajaklain2persen * data.dpp / 100;
      } else {
        data.pajaklain2rp = 0;
      }

      if (row.namapajaklain3 != '') {
        data.pajaklain3rp = row.pajaklain3persen * data.dpp / 100;
      } else {
        data.pajaklain3rp = 0;
      }

      dg.datagrid('updateRow', {
        index: index,
        row: data
      });

      // cek jika ada aset yang sama
      var rows = dg.datagrid('getRows');
      for (var i = 0; i < rows.length; i++) {
        if (index != i && (rows[i].namaaset != "" && row.namaaset == rows[i].namaaset) && (rows[i].kodetransreferensi !=
            "" && row.kodetransreferensi == rows[i].kodetransreferensi)) {
          $.messager.show({
            title: 'Warning',
            msg: 'Aset yang diinput tidak boleh sama dalam satu detil',
            timeout: {{ session('TIMEOUT') }},
          });
          dg.datagrid('deleteRow', index);
          break;
        }
      }
    }

    function buat_table_detailaset() {
      var dg = '#table_data_detailaset';

      $(dg).datagrid({
        clickToEdit: false,
        dblclickToEdit: true,
        singleSelect: true,
        showFooter: true,
        rownumbers: true,
        RowAdd: false,
        RowDelete: false,
        data: [],
        columns: [
          [{
              field: 'uuidassset',
              hidden: true,
            },
            {
              field: 'namaaset',
              title: 'Nama Aset',
              width: 200,
            },
            {
              field: 'kodeaset',
              title: 'Kode Aset',
              width: 130,
            },
            {
              field: 'serialnumber',
              title: 'Serial Number',
              width: 130,
              editor: {
                type: 'textbox',
                options: {
                  required: true
                }
              },
            },
          ]
        ],
        onEndEdit: function(index, row, changes) {
          updateRowDtlAset(index)
        },
        onAfterDeleteRow: function(index, row) {
          updateRowDtlAset(index)
        },
      }).datagrid('enableCellEditing');
    }

    function updateRowDtlAset(index) {
      // update row
      var ddh = $('#table_data_detail');
      var cell = ddh.datagrid('cell');

      console.log(cell);

      if (cell) {
        var rowsDtlAset = JSON.parse(JSON.stringify($('#table_data_detailaset').datagrid('getRows')));

        ddh.datagrid('updateRow', {
          index: cell.index,
          row: {
            detailaset: rowsDtlAset,
          }
        }).datagrid('gotoCell', cell);
      }
    }

    function hitung_grandtotal() {
      var data = $("#table_data_detail").datagrid('getRows');
      var total = 0;
      var grandtotal = 0;
      var total2 = 0;
      var ppnrp = 0;
      var pajaklain1rp = 0;
      var pajaklain2rp = 0;
      var pajaklain3rp = 0;
      var cekselisih = 0;
      var pembulatan = parseFloat($("#PEMBULATAN").numberbox('getValue')) ? parseFloat($("#PEMBULATAN").numberbox(
        'getValue')) : 0;
      var biaya = 0;

      var footer = {
        jml: 0,
        disc: 0,
        disckurs: 0,
        subtotal: 0,
        subtotalkurs: 0,
        ppnrp: 0,
        dpp: 0,
        pajaklain1rp: 0,
        pajaklain2rp: 0,
        pajaklain3rp: 0,
      }

      var pajaklainrp = 0;
      for (var i = 0; i < data.length; i++) {
        if (data[i].pakaippn == 'EXCL') {
          total2 += parseFloat(data[i].subtotalkurs) + parseFloat(data[i].ppnrp);
        } else {
          total2 += parseFloat(data[i].subtotalkurs);
        }
        pajaklainrp += parseFloat(data[i].pajaklain1rp) +
          parseFloat(data[i].pajaklain2rp) +
          parseFloat(data[i].pajaklain3rp);
        total += parseFloat(data[i].subtotalkurs);
        footer.jml += parseFloat(data[i].jml);
        footer.disc += parseFloat(data[i].disc);
        footer.disckurs += parseFloat(data[i].disckurs);
        footer.subtotal += parseFloat(data[i].subtotal);
        footer.subtotalkurs += parseFloat(data[i].subtotalkurs);
        footer.ppnrp += parseFloat(data[i].ppnrp);
        footer.dpp += parseFloat(data[i].dpp);
        footer.pajaklain1rp += parseFloat(data[i].pajaklain1rp);
        footer.pajaklain2rp += parseFloat(data[i].pajaklain2rp);
        footer.pajaklain3rp += parseFloat(data[i].pajaklain3rp);
      }

      footer.browsegambar = 'data';

      total2 = +((total2).toFixed({{ session('DECIMALDIGITAMOUNT') }}));
      //grandtotal = parseFloat(total2 + footer.pph23rp - footer.pajaklainrp + biaya + pembulatan);
      grandtotal = parseFloat(total2 - pajaklainrp + biaya + pembulatan);

      $("#TOTAL").numberbox('setValue', total);
      //$('#DISKONRP').numberbox('setValue', diskonrp);
      $('#txt_DPP').numberbox('setValue', footer.dpp);
      $("#PPNRP").numberbox('setValue', footer.ppnrp);
      $('#PAJAKLAINRP').numberbox('setValue', pajaklainrp);
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
      $("#PPHPERSEN").numberbox('setValue', {{ session('PPH22PERSEN') }});
      hitung_grandtotal();

      $("#TGLTRANS, #TGLJATUHTEMPO").datebox('setValue', date_format());
      $("#TGLJATUHTEMPO").datebox('readonly');
    }

    function browse_gambar_aset() {
      $('#browse_gambar').click();
    }

    function preview_gambar_aset(index) {
      var data = $('#table_data_detail').datagrid('getRows')[index];

      $('#preview-image-aset').attr('src', data.gambar_fullpath);
      $('#window-preview-aset').window('open');
    }

    async function loadConfigPembelianAset() {
      try {
        const response = await fetch(
          link_api.loadConfigPembelianAset, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer {{ session('TOKEN') }}'
            },
            body: JSON.stringify({
              kodemenu: '{{ $kodemenu }}'
            })
          }
        );

        if (response.ok) {
          const res = await response.json();
          if (!res.success) {
            throw new Error(res.message);
          }
          $('#td_total').css('display', res.data.LIHATHARGA == 0 ? 'none' : '');
          $('#DISKON').textbox({
            readonly: res.data.INPUTHARGA == 0
          });
          $('#DISKONRP').numberbox({
            readonly: res.data.INPUTHARGA == 0
          });
          $('#PEMBULATAN').numberbox({
            readonly: res.data.INPUTHARGA == 0
          });
          INPUTHARGA = res.data.INPUTHARGA;
          LIHATHARGA = res.data.LIHATHARGA;
        } else {
          throw new Error('Http Error: ' + response.status);
        }
      } catch (e) {
        showErrorAlert(e);
      }
    }
  </script>
@endpush
