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
            <div data-options="region:'north',border:false" style="width:100%; height:175px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>
              <table>
                <input type="hidden" id="mode" name="mode">
                <input type="hidden" id="tglentry" name="tglentry">
                <tr>
                  <td valign="top">
                    <fieldset style="height:150px;">
                      <legend id="label_laporan">Info Transaksi</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form">No. Kirim</td>
                          <td id="label_form">
                            <input name="kodekirim" id="KODEKIRIM" class="label_input" style="width:190px">
                            <input type="hidden" id="IDKIRIM" name="uuidkirim">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Lokasi </td>
                          <td id="label_form"><input name="uuidlokasi" id="IDLOKASI" style="width:190px"></td>
                          <input type="hidden" id="KODELOKASI" name="kodelokasi">
                        </tr>
                        <tr>
                          <td id="label_form">Tgl. Trans
                          <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date" style="width:190px">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Tgl. Kirim</td>
                          <td id="label_form"><input name="tglkirim" id="TGLKIRIM" class="date" style="width:190px">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Mode</td>
                          <td id="label_form">
                            <input type="radio" name="rd_mode" id="rd_mode1" value="1" checked>Auto
                            <input type="radio" name="rd_mode" id="rd_mode2" value="2">Manual
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td valign="top">
                    <fieldset style="height:150px;">
                      <legend id="label_laporan">Customer</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form">Kode</td>
                          <td>
                            <input name="uuidcustomer" class="label_input" id="IDCUSTOMER" style="width:190px"
                              prompt="Kode Customer">
                            <input type="hidden" id="KODECUSTOMER" name="kodecustomer">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Nama</td>
                          <td>
                            <input name="namacustomer" class="label_input" id="NAMACUSTOMER" style="width:190px" readonly
                              prompt="Nama Customer">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form" style="vertical-align: super;">Alamat</td>
                          <td>
                            <textarea name="alamat" class="label_input" id="ALAMAT" readonly prompt="Alamat Customer" multiline="true"
                              style="width:190px; height:50px" data-options="validType:'length[0, 500]'"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Telp</td>
                          <td>
                            <input name="telp" class="label_input" id="TELP" style="width:190px" readonly
                              prompt="Telp Customer">
                          </td>
                        </tr>
                        <tr id="tr_surat_jalan" hidden>
                          <td id="label_form">No. Surat Jalan</td>
                          <td id="label_form"><input name="uuidbbk" id="IDBBK" style="width:190px"></td>
                          <input type="hidden" id="KODEBBK" name="kodebbk">
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td valign="top">
                    <fieldset style="height:150px;">
                      <legend id="label_laporan">Ekspedisi</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form">Ekspedisi </td>
                          <td id="label_form"><input name="uuidekspedisi" id="IDEKSPEDISI" style="width:190px"></td>
                        </tr>
                        <tr>
                          <td id="label_form">Nama</td>
                          <td>
                            <input name="namaekspedisi" class="label_input" id="NAMAEKSPEDISI" style="width:190px"
                              readonly prompt="Nama Ekspedisi">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Alamat</td>
                          <td>
                            <input name="alamatekspedisi" class="label_input" id="ALAMATEKSPEDISI" style="width:190px"
                              readonly prompt="Alamat Ekspedisi">
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form">Telp</td>
                          <td>
                            <input name="telpekspedisi" class="label_input" id="TELPEKSPEDISI" style="width:190px"
                              readonly prompt="Telp Ekspedisi">
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                  <td valign="bottom">
                    <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                      style="width:280px; height:80px;" data-options="validType:'length[0, 500]'"></textarea>
                  </td>
                </tr>
              </table>
            </div>
            <div data-options="region:'center',border:false">
              <table id="table_data_detail" fit="true"></table>
              <input type="hidden" id="data_detail" name="data_detail">
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:35px;">
              <table cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left" id="label_form">
                    <label style="font-weight:normal" id="label_form">User Input :</label>
                    <label id="lbl_kasir"></label>
                    <label style="font-weight:normal" id="label_form">| Tgl. Input :</label>
                    <label id="lbl_tanggal"></label>
                  </td>
                </tr>
              </table>
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

  <div id="fm-catatan-barang" title="Catatan Barang">
    <table style="padding:5px">
      <tr>
        <td>
          <textarea prompt="Tekan 'Ctrl + Enter' untuk simpan catatan
Tekan 'esc' untuk tutup dialog " name="catatanbarang"
            class="label_input" id="CATATANBARANG" multiline="true" style="width:300px; height:155px"
            data-options="validType:'length[0, 500]'"></textarea>
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
  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}">
  </script>
  <script type="text/javascript" src="{{ asset('assets/js/jquery.mask.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/utils.js') }}"></script>
  <script>
    var cekbtnsimpan = true;
    var transbbk;
    $(document).ready(async function() {
      transbbk = await fetchData(link_api.getConfig, {
        modul: 'TKIRIM',
        config: 'TRANSBBK'
      });
      const kode = await fetchData(link_api.getConfig, {
        modul: 'TKIRIM',
        config: 'KODEKIRIM'
      });
      if (transbbk.data.value != 'DETAIL') {
        $('#tr_surat_jalan').show();
      }
      $('#KODEKIRIM').textbox({
        readonly: kode.data.value == 'AUTO',
        prompt: kode.data.value == 'AUTO' ? 'Auto Generate' : '',
      });

      //TAMBAH CHECK AKSES CETAK
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
            export_excel('Faktur Kirim Ekspedisi', $("#area_cetak").html());
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
      browse_data_bbk('#IDBBK');
      browse_data_ekspedisi('#IDEKSPEDISI');

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

      buat_table_detail();
      $("[name=rd_mode]").change(function() {
        if ($(this).val() == 1) {
          $('#table_data_detail').datagrid('showColumn', 'jmlcollie');
          $('#table_data_detail').datagrid('hideColumn', 'collie');
        } else if ($(this).val() == 2) {
          $('#table_data_detail').datagrid('showColumn', 'collie');
          $('#table_data_detail').datagrid('hideColumn', 'jmlcollie');
        }
        if ($('#mode').val() == 'tambah') {
          $('#IDBBK').combogrid('clear');
          $('#IDCUSTOMER').combogrid('clear');
        }
        reset_detail();
      });

      if ("{{ $mode }}" == "tambah") {
        tambah();
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

    async function getCetakDocument(url) {
      try {
        const response = await fetchData(url, null, false);
        return response;
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
        return null;
      }
    }

    async function cetak(id) {
      const url = link_api.cetakInventoryKirimEkspedisi + id;
      const document = await getCetakDocument(url);
      if (document == null) {
        return;
      }
      $("#window_button_cetak").window('close');
      $("#area_cetak").html(document);
      $("#form_cetak").window('open');
    }

    function tambah() {
      $('#mode').val('tambah');

      $('#lbl_kasir, #lbl_tanggal').html('');
      $('#rd_mode1').prop("checked", true);
      $('#TGLTRANS').datebox('readonly', false);
      $('#IDBBK').combogrid('readonly', false);
      $('#IDCUSTOMER').combogrid('readonly', false);
      $('#IDLOKASI').combogrid('readonly', false);
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

      clear_plugin();
      reset_detail();
    }

    async function ubah() {
      try {
        const response = await fetchData(link_api.loadDataHeaderInventoryKirimEkspedisi, {
          uuidkirim: "{{ $data }}"
        });
        if (!response.success) {
          throw new Error(response.message || 'Gagal mengambil data');
        }
        row = response.data;
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
        return;
      }
      if (row) {
        get_status_trans("atena/inventori/kirim-ekspedisi", 'uuidkirim', row.uuidkirim, function(data) {
          data = data.data;
          $(".form_status").html(status_transaksi(data.status));
        });
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          data = data.data;
          var UT = data.ubah;
          get_status_trans("atena/inventori/kirim-ekspedisi", 'uuidkirim', row.uuidkirim, function(data) {
            data = data.data;
            if (UT == 1 && data.status == 'I') {
              $('#btn_simpan_modal').css('filter', '');
              $('#mode').val('ubah');
            } else {
              $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
              $('#btn_simpan_modal').removeAttr('onclick');
            }

            $("#form_input").form('load', row);
            $('#mode').val('ubah');
            $('#IDLOKASI').combogrid('readonly');
            $('#TGLTRANS').datebox('readonly', false);
            $('#IDBBK').combogrid('readonly');
            $('#IDCUSTOMER').combogrid('readonly');

            $('#IDCUSTOMER').combogrid('setValue', {
              uuidcustomer: row.uuidcustomer,
              kode: row.kodecustomer
            });

            var alamat = row.alamat == "" || row.alamat == null ? "" : (row.alamat + "\r\n");
            if (row.kota && row.kota != 'null') alamat += row.kota;
            if (row.propinsi && row.propinsi != 'null') alamat += "-" + row.propinsi;
            if (row.negara && row.negara != 'null') alamat += "-" + row.negara;

            $('#NAMACUSTOMER').textbox('setValue', row.namacustomer);
            $('#ALAMAT').textbox('setValue', alamat);
            $('#TELP').textbox('setValue', row.telp);
            $("#KODECUSTOMER").val(row.kode);

            $('#NAMAEKSPEDISI').textbox('setValue', row.namaekspedisi);
            $('#ALAMATEKSPEDISI').textbox('setValue', row.alamatekspedisi);
            $('#TELPEKSPEDISI').textbox('setValue', row.telpekspedisi);

            idtrans = row.uuidkirim;
            load_data(row.uuidkirim);

            $('#lbl_kasir').html(row.userbuat);
            $('#lbl_tanggal').html(row.tglentry);
          });
        });
      }
    }

    async function simpan(jenis_simpan) {

      var mode = $("#mode").val();

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

      var isValid = $('#form_input').form('validate');

      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }

      if (mode == 'ubah') {
        $('#tglentry').val(getCurrentDateTime());
      }

      $('#window_button_simpan').window('close');

      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        cekbtnsimpan = false;
        if (!isTokenExpired()) {
          const data = $("#form_input :input").serializeArray();
          const payload = {};
          for (const item of data) {
            payload[item.name] = item.value;
            if (item.name == 'data_detail') {
              payload[item.name] = JSON.parse(item.value);
            }
          }
          payload['jenis_simpan'] = jenis_simpan;

          try {
            tampilLoaderSimpan();
            const response = await fetchData(
              link_api.simpanInventoryKirimEkspedisi,
              payload,
            );
            cekbtnsimpan = true;
            if (!response.success) {
              throw new Error(response.message || 'Gagal menyimpan data');
            }
            $('#form_input').form('clear');
            $.messager.alert('Info', 'Transaksi Sukses', 'info');
            tambah();
            if (jenis_simpan == 'simpan_cetak') {
              cetak(response.data.uuidkirim);
            }
          } catch (e) {
            const error = (typeof e === 'string') ? e : e.message;
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
      $('#table_data_detail_po').datagrid('loadData', []);
    }

    function load_data(idtrans) {
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link_api.loadDataInventoryKirimEkspedisi,
        data: {
          uuidkirim: idtrans,
        },
        cache: false,
        success: function(data) {
          if (data && data.length > 0) {
            $('#table_data_detail').datagrid('loadData', data);
          }
        }
      });
    }

    function load_data_detail(idcustomer) {
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link_api.loadDataDetailKirimBarangKeluar,
        data: {
          uuidcustomer: idcustomer
        },
        cache: false,
        success: function(msg) {
          $('#table_data_detail').datagrid('loadData', msg);
        }
      });
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
          var customer = $("#IDCUSTOMER").combogrid('getValue');
          var url = link_api.browsePenjualanBarangKeluar;
          //   manual ganti code ubah_url_combogrid
          $('#IDBBK').combogrid('grid').datagrid('options').url = url;
          $('#IDBBK').combogrid('clear');
          $('#IDBBK').combogrid('grid').datagrid('load', {
            lokasi: row.uuidlokasi,
            referensi: customer,
            q: ''
          });
        },
      });
    }

    function browse_data_ekspedisi(id) {
      $(id).combogrid({
        panelWidth: 490,
        idField: 'uuidekspedisi',
        textField: 'namaekspedisi',
        url: link_api.browseEkspedisi,
        mode: 'remote',
        required: 'true',
        columns: [
          [{
              field: 'uuidekspedisi',
              hidden: true
            },
            {
              field: 'kode',
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
            $('#ALAMAT').textbox('setValue', alamat);
            $('#TELP').textbox('setValue', row.telp);
            $("#KODECUSTOMER").val(row.kode);

            var lokasi = $("#IDLOKASI").combogrid('getValue');

            var url = link_api.browsePenjualanBarangKeluar;
            // manual ubah code dari ubah_url_combogrid
            $('#IDBBK').combogrid('grid').datagrid('options').url = url;
            $('#IDBBK').combogrid('clear');
            $('#IDBBK').combogrid('grid').datagrid('load', {
              lokasi: lokasi,
              referensi: row.uuidcustomer,
              q: ''
            });

            //jika mode auto, lakukan load detail
            if ($("input[name='rd_mode']:checked").val() == 1) {
              load_data_detail(row.uuidcustomer);
            }
          }
          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
      });
    }

    function browse_data_bbk(id) {
      $(id).combogrid({
        panelWidth: 550,
        idField: 'uuidbbk',
        textField: 'kodebbk',
        mode: 'remote',
        required: transbbk.data.value == 'HEADER',
        columns: [
          [{
              field: 'uuidbbk',
              hidden: true
            },
            {
              field: 'kodebbk',
              title: 'Kode BBK',
              width: 150
            },
            {
              field: 'kodelokasi',
              title: 'Kode Lokasi',
              width: 90
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
        onChange: function(newVal, oldVal) {
          if ($('#mode').val() != '') {
            var row = $(id).combogrid('grid').datagrid('getSelected');
            if (row) {
              if (row.uuidlokasi != $("#IDLOKASI").combogrid('getValue') ||
                row.tgltrans > $('#TGLTRANS').datebox('getValue')) {
                $.messager.show({
                  title: 'Warning',
                  msg: 'Transaksi harus pada lokasi yang sama dan sebelum tanggal transaksi',
                  timeout: {{ session('TIMEOUT') }},
                });
                $(this).combogrid('clear');
              }
              $("#KODEBBK").val(row.kodebbk);
              //jika mode auto, lakukan load detail
              if ($("input[name='rd_mode']:checked").val() == 1) {
                load_data_detail(row.uuidbbk);
              }
            }
            reset_detail();
          }
        }
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
        columns: [
          [{
              field: 'uuidbbk',
              hidden: true
            },
            {
              field: 'kodebbk',
              hidden: transbbk.data.value == 'HEADER',
              title: 'Kode BBK',
              width: 120,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 600,
                  mode: 'remote',
                  required: true,
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
                      },
                    ]
                  ],
                }
              }
            },
            {
              field: 'uuidbarang',
              hidden: true
            },
            {
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 100,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 670,
                  mode: 'remote',
                  required: true,
                  idField: 'kodebarang',
                  textField: 'kodebarang',
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
                        field: 'jml',
                        title: 'Jml',
                        align: 'right',
                        width: 80,
                        formatter: format_qty
                      },
                      {
                        field: 'satuan',
                        title: 'Satuan',
                        width: 60
                      },
                      {
                        field: 'namakategori',
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
              width: 300,
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
              field: 'jml',
              title: 'Jml BBK',
              align: 'right',
              width: 80,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
              }
            },
            {
              field: 'jmlcollie',
              title: 'Jml Collie',
              align: 'right',
              width: 80,
              formatter: format_number,
              editor: {
                type: 'numberbox',
              }
            },
            {
              field: 'collie',
              title: 'Collie ke',
              align: 'right',
              width: 80,
              formatter: format_number,
              editor: {
                type: 'numberbox',
              },
              hidden: true
            },
            {
              field: 'satuan',
              title: 'Satuan',
              width: 80,
              align: 'center'
            },
            {
              field: 'catatan',
              title: 'Catatan',
              width: 400,
              editor: {
                type: 'validatebox',
              },
              formatter: format_textarea
            },
          ]
        ],
        //UNTUK TOMBOL EDIT
        onClickRow: function(index, row) {
          indexDetail = index;
        },
        onBeforeCellEdit: function(index, field) {
          var row = $(this).datagrid('getRows')[index];

          if (field == 'jml') {
            if ($("input[name='rd_mode']:checked").val() == 1) {
              $.messager.show({
                title: 'Warning',
                msg: 'Jumlah Tidak Boleh Dirubah Dalam Mode Auto',
                timeout: {{ session('TIMEOUT') }},
              });
              return false;
            }
          } else if (field == 'catatan') {
            $("#fm-catatan-barang").dialog('open');
            $('#CATATANBARANG').textbox('setValue', row.catatan).textbox('textbox').focus();
            return false;
          }
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);
          if (field == 'kodebbk') {
            var lokasi = $("#IDLOKASI").combogrid('getValue');
            var customer = $("#IDCUSTOMER").combogrid('getValue');

            ed.combogrid('grid').datagrid('options').url = link_api.browseKirimBarangKeluar;
            ed.combogrid('grid').datagrid('load', {
              lokasi: lokasi,
              referensi: customer,
              q: ''
            });
            ed.combogrid('showPanel');
          } else if (field == 'kodebarang') {
            var idbbk = '';

            //jika transaksi detail
            if (row.uuidbbk) {
              idbbk = row.uuidbbk;
            };
            if (transbbk.data.value == 'HEADER') {
              idbbk = $("#IDBBK").combogrid('getValue');
            }
            ed.combogrid('grid').datagrid('options').url = link_api.browseBarangBBMBarangKeluar;
            ed.combogrid('grid').datagrid('loading');
            ed.combogrid('grid').datagrid('load', {
              uuidbbk: idbbk,
              q: ''
            });
            ed.combogrid('showPanel');
          }
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data_detail', index, cell.field);
          var row_update = {};

          switch (cell.field) {
            case 'kodebbk':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidbbk : '';
              var tgltrans = data ? data.tgltrans : '';
              var lokasi = data ? data.idlokasi : '';

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
                uuidbbk: id,
                kodebarang: '',
                namabarang: '',
                tutup: 0,
                jml: 0,
                satuan: '',
                jmlcollie: 1,
                collie: 1,
              };
              break;
            case 'kodebarang':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidbarang : '';
              var nama = data ? data.namabarang : '';
              var jml = data ? data.jml : '';
              var satuan = data ? data.satuan : '';
              var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
              var partnumber = data.partnumber ? data.partnumber : '';

              row_update = {
                uuidbarang: id,
                namabarang: nama,
                barcodesatuan1: barcodesatuan1,
                partnumber: partnumber,
                satuan: satuan,
                jml: jml,
                jmlcollie: 1,
                collie: 1
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
        }
      }).datagrid('enableCellEditing');
    }

    function hitung_subtotal_detail(index, row) {
      // hitung diskon lebih dahulu
      var data = {};
      var dg = $('#table_data_detail');
      // cek detail transaksi apakah ada barang yang sama, maka munculkan warning
      if ($("input[name='rd_mode']:checked").val() == 1) {
        var rows = dg.datagrid('getRows');
        for (var i = 0; i < rows.length; i++) {
          if (index != i && (rows[i].uuidbbk != "" && row.uuidbbk == rows[i].uuidbbk) && (rows[i].uuidbarang != "" && row
              .uuidbarang == rows[i].uuidbarang)) {
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
    }

    function hitung_grandtotal() {
      var data = $("#table_data_detail").datagrid('getRows');
      var footer = {
        jml: 0,
      }
      for (var i = 0; i < data.length; i++) {
        footer.jml += parseFloat(data[i].jml);
      }

      $('#table_data_detail').datagrid('reloadFooter', [footer]);
    }

    function clear_plugin() {
      $('.combogrid-f').each(function() {
        $(this).combogrid('grid').datagrid('load', {
          q: ''
        });
      });

      $('.number').numberbox('setValue', 0);

      $("#TGLTRANS, #TGLKIRIM, #TGLJATUHTEMPO").datebox('setValue', date_format());
      $("#TGLJATUHTEMPO").datebox('readonly');
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

    async function fetchData(url, body, isJson = true) {
      try {
        const token = '{{ session('TOKEN') }}';
        let headers = {
          'Authorization': 'bearer ' + token,
        };
        let requestBody = null;

        if (body instanceof FormData) {
          requestBody = body;
        } else {
          headers['Content-Type'] = 'application/json';
          requestBody = body ? JSON.stringify(body) : null;
        }

        const response = await fetch(url, {
          method: 'POST',
          headers: headers,
          body: requestBody,
        });

        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }

        if (isJson) {
          return await response.json();
        } else {
          return await response.text();
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert('Error', textError, 'error');
      }
    }
  </script>
@endpush
