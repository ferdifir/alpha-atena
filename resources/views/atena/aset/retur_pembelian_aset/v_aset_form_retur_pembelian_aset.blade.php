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
              <table width="100%">
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td valign="top">
                          <fieldset style="height:130px;">
                            <legend id="label_laporan">Info Transaksi</legend>
                            <table border="0">
                              <tr>
                                <td id="label_form">No. Retur Beli Aset</td>
                                <td id="label_form"><input name="kodeasetreturbeli" id="KODEASETRETURBELI"
                                    class="label_input" style="width:190px">
                                  <input type="hidden" id="IDASETRETURBELI" name="uuidasetreturbeli">
                                </td>
                              </tr>
                              <tr>
                                <td id="label_form">Lokasi</td>
                                <td id="label_form"><input name="uuidlokasi" id="IDLOKASI" style="width:190px"></td>
                                <input type="hidden" id="KODELOKASI" name="kodelokasi">
                              </tr>
                              <tr>
                                <td id="label_form">Tgl. Trans
                                <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date"
                                    style="width:190px" required></td>
                                <input type="hidden" id="TXTTANGGAL" name="txttanggal">
                              </tr>
                            </table>
                          </fieldset>
                        </td>
                        <td align="left" valign="top">
                          <fieldset style="height:130px;">
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
                                    readonly prompt="Nama Supplier">
                                </td>
                              </tr>
                              <tr>
                                <td id="label_form">Alamat</td>
                                <td colspan="3">
                                  <input name="alamat" class="label_input" id="ALAMAT" style="width:275px" readonly
                                    prompt="Alamat Supplier">
                                </td>
                              </tr>
                              <tr>
                                <td id="label_form">Telp</td>
                                <td colspan="3">
                                  <input name="telp" class="label_input" id="TELP" style="width:275px" readonly
                                    prompt="Telp Supplier">
                                </td>
                              </tr>
                              <tr id="div_idaset_beli">
                                <td id="label_form">No. Beli Aset</td>
                                <td id="label_form" colspan="3">
                                  <input name="uuidasetbeli" id="IDASETBELI" style="width:275px">
                                </td>
                                <input type="hidden" id="KODEASETBELI" name="kodeasetbeli">

                              </tr>
                              <tr id="div_idaset_beli_ubah">
                                <td id="label_form">No. Beli Aset</td>
                                <td id="label_form" colspan="3">
                                  <input name="uuidasetbeliubah" id="IDASETBELIUBAH" style="width:275px">
                                </td>
                              </tr>
                            </table>
                          </fieldset>
                        </td>
                        <td id="label_form" valign="bottom">
                          <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                            style="width:300px; height:85px" data-options="validType:'length[0, 500]'"></textarea>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </div>
            <div data-options="region:'center',border:false">
              <table id="table_data_detail" fit="true"></table>
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:35px;">
              <table id="trans_footer" width="100%">
                <tr>
                  <td colspan="2">
                    <table cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User
                            Input :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal"
                            id="label_form">| Tgl. Input :</label> <label id="lbl_tanggal"></label></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <input type="hidden" id="data_detail" name="details">
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
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-filter/datagrid-filter.js') }}"></script>
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}"></script>
  <script>
    let row = null;
    let cekbtnsimpan = true;

    $(document).ready(function() {
      loadConfigReturPembelianAset();
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {
        if (data.data.cetak == 1) {
          $('#simpan_cetak').css('filter', '');
        } else {
          $('#simpan_cetak').css('filter', 'grayscale(100%)');
          $('#simpan_cetak').removeAttr('onclick');
        }
      }, true);

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
            export_excel('Faktur Retur Pembelian Aset', $("#area_cetak").html());
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
      browse_data_supplier('#IDSUPPLIER');
      browse_data_asetbeli('#IDASETBELI');
      browse_data_asetbeliubah('#IDASETBELIUBAH');

      buat_table_detail();

      $("#TGLTRANS").datebox({
        onSelect: function() {
          if ($("#TXTTANGGAL").val() != "") {
            $("#TGLTRANS").datebox("setValue", $("#TXTTANGGAL").val());
            $.messager.alert('Error', 'Tanggal Tidak Dapat Diganti, Data Detail TIdak Kosong', 'error');
          }
        },
      });

      @if ($mode == 'tambah')
        tambah();
      @elseif ($mode == 'ubah')
        ubah();
      @endif
    })

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    async function cetak(id) {
      $("#window_button_cetak").window('close');
      const doc = await getCetakDocument(
        link_api.cetakReturPembelianAset + id,
        '{{ session('TOKEN') }}'
      );
      if (doc) {
        $("#area_cetak").html(doc);
        $("#form_cetak").window('open');
      }
    }

    async function tambah() {
      $('#form_input').form('clear');
      $('#mode').val('tambah');
      $("#div_idaset_beli_ubah").hide();

      $('#lbl_kasir, #lbl_tanggal').html('');
      $('#IDLOKASI').combogrid('readonly', false);
      $('#IDSUPPLIER').combogrid('readonly', false);
      $('#IDASETBELI').combogrid('readonly', false);
      $('#TGLTRANS').datebox('readonly', false);
      $("#IDASETBELI").combogrid({
        required: true
      });
      idtrans = "";
      urlasetbeli = link_api.browseReturPembelianAset;

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
        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const res = await response.json();
        if (res.success) {
          if (res.data.uuidlokasi != null) {
            $('#IDLOKASI').combogrid('setValue', res.data.uuidlokasi);
            $("#KODELOKASI").val(res.data.kodelokasi);
          }
        } else {
          throw new Error(res.message);
        }
      } catch (e) {
        showErrorAlert(e);
      }

      clear_plugin();
      reset_detail();

      tutupLoader();
    }

    async function ubah() {
      $('#mode').val('ubah');
      $("#div_idaset_beli_ubah").show();
      $("#div_idaset_beli").hide();

      try {
        const response = await fetch(
          link_api.loadDataHeaderReturPembelianAset, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer {{ session('TOKEN') }}'
            },
            body: JSON.stringify({
              uuidasetreturbeli: '{{ $data }}'
            })
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
          link_api.getStatusTransReturPembelianAset,
          'bearer {{ session('TOKEN') }}', {
            uuidasetreturbeli: row.uuidasetreturbeli
          }
        );
        $(".form_status").html(status_transaksi(statusTrans));
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {
          data = data.data;
          var UT = data.ubah;
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
          $('#IDSUPPLIER').combogrid('readonly');
          $('#TGLTRANS').datebox('readonly');
          $("#IDASETBELIUBAH").combogrid('setValue', row.uuidasetbeli);
          $("#IDASETBELIUBAH").combogrid('readonly');

          $('#lbl_kasir').html(row.userbuat);
          $('#lbl_tanggal').html(row.tglentry);

          //SUPPLIER
          var url = link_api.browseSupplier;
          get_combogrid_data($("#IDSUPPLIER"), 'uuidsupplier', row.uuidsupplier, url, '{{ session('TOKEN') }}');

          await load_data(row.uuidasetreturbeli);
          tutupLoader();
        }, false);
      }
    }

    async function simpan(jenis_simpan) {
      var mode = $("#mode").val();

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      $('#window_button_simpan').window('close');

      if (isValid) {
        var aset = [];
        var rows = $('#table_data_detail').datagrid('getRows');
        for (var i = 0; i < rows.length; i++) {
          var nama = rows[i].kodeaset;
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
        const data = $("#form_input :input").serializeArray();
        const payload = {};
        for (let i = 0; i < data.length; i++) {
          if (typeof data[i].value === 'string' && data[i].name.startsWith('details')) {
            data[i].value = JSON.parse(data[i].value);
          }
          payload[data[i].name] = data[i].value;
        }
        payload['jenis_simpan'] = jenis_simpan;
        try {
          tampilLoaderSimpan();
          const response = await fetch(
            link_api.simpanReturPembelianAset, {
              method: 'POST',
              headers: {
                'Authorization': 'Bearer {{ session('TOKEN') }}',
                'Content-Type': 'application/json',
              },
              body: JSON.stringify(payload),
            }
          );

          cekbtnsimpan = true;
          if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
          }
          const res = await response.json();
          if (!res.success) {
            $.messager.alert('Error', res.message, 'error');
            return;
          }

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
            cetak(res.data.uuidasetreturbeli);
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
    }

    async function load_data(idtrans) {
      try {
        const response = await fetch(
          link_api.loadDataReturPembelianAset, {
            method: 'POST',
            headers: {
              'Authorization': 'bearer {{ session('TOKEN') }}',
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({
              uuidasetreturbeli: idtrans
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
          $.messager.alert('Error', res.message, 'error');
        }
      } catch (e) {
        showErrorAlert(e);
      }
    }

    function filter_data() {
      var status = [];
      $("[name='cb_status_filter[]']:checked").each(function() {
        status.push($(this).val());
      });
      $('#table_data').datagrid('load', {
        kodetrans: $('#txt_kodetrans_filter').val(),
        nama: $('#txt_nama_referensi_filter').val(),
        perusahaan: $('#txt_perusahaan_filter').val(),
        tglawal: $('#txt_tgl_aw_filter').datebox('getValue'),
        tglakhir: $('#txt_tgl_ak_filter').datebox('getValue'),
        status: status,
      });
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
          if (row) {
            $("#KODELOKASI").val(row.kode);
            var supplier = $("#IDSUPPLIER").combogrid('getValue');
            url = link_api.browseReturPembelianAset;
            // ubah_url_combogrid($("#IDASETBELI"), url, true);
            $('#IDASETBELI').combogrid('grid').datagrid('options').url = url;
            $('#IDASETBELI').combogrid('clear');
            $('#IDASETBELI').combogrid('grid').datagrid('load', {
              q: '',
            });
          }
          reset_detail();
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
          if (row) {
            $("#KODESUPPLIER").val(row.kode);
            $('#NAMASUPPLIER').textbox('setValue', row.nama);
            $('#ALAMAT').textbox('setValue', row.alamat);
            $('#TELP').textbox('setValue', row.telp);
            $('#NOREKENING').textbox('setValue', row.norekening);
            $('#CONTACTPERSON').textbox('setValue', row.contactperson);
            $('#TELPCP').textbox('setValue', row.telpcp);
            $('#NPWP').textbox('setValue', row.npwp);

            var lokasi = $("#IDLOKASI").combogrid('getValue');
            url = link_api.browseReturPembelianAset;
            // ubah_url_combogrid($("#IDASETBELI"), url, true);
            $('#IDASETBELI').combogrid('grid').datagrid('options').url = url;
            $('#IDASETBELI').combogrid('clear');
            $('#IDASETBELI').combogrid('grid').datagrid('load', {
              q: '',
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

    function browse_data_asetbeli(id) {
      $(id).combogrid({
        panelWidth: 400,
        idField: 'uuidasetbeli',
        textField: 'kodeasetbeli',
        mode: 'remote',
        sortName: 'kodeasetbeli',
        sortOrder: 'asc',
        onBeforeLoad: function(param) {
          param.supplier = $("#IDSUPPLIER").combogrid('getValue');
          param.lokasi = $("#IDLOKASI").combogrid('getValue');
        },
        columns: [
          [{
              field: 'uuidasetbeli',
              hidden: true
            },
            {
              field: 'kodeasetbeli',
              title: 'Kode',
              width: 150
            },
            {
              field: 'kodelokasi',
              hidden: true,
              title: 'Kode Lokasi',
              width: 120
            },
            {
              field: 'tgltrans',
              title: 'Tgl Trans',
              width: 150
            },
            {
              field: 'userbuat',
              title: 'User Entry',
              width: 150
            },
          ]
        ],
        onSelect: function(index, row) {
          if (row) {
            $("#KODEASETBELI").val(row.kodeasetbeli);
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
                reset_detail();
              }
            }
          }
          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
      });
    }

    function browse_data_asetbeliubah(id) {
      $(id).combogrid({
        panelWidth: 400,
        idField: 'uuid',
        textField: 'kode',
        url: link_api.browseAsetBeliPembelianAset,
        mode: 'remote',
        sortName: 'kode',
        sortOrder: 'asc',
        columns: [
          [{
              field: 'uuid',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 150
            },
          ]
        ],
      });
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
              field: 'idaset',
              hidden: true
            },
            {
              field: 'namaaset',
              title: 'Nama Aset',
              width: 200,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 400,
                  mode: 'remote',
                  idField: 'uuidaset',
                  textField: 'namaaset',
                  sortOrder: 'asc',
                  columns: [
                    [{
                        field: 'uuidaset',
                        hidden: true
                      },
                      {
                        field: 'namaaset',
                        title: 'Nama Aset',
                        width: 200
                      },
                      {
                        field: 'kodeaset',
                        title: 'Kode Aset',
                        width: 130
                      },
                      {
                        field: 'serialnumber',
                        title: 'Serial Number',
                        width: 130
                      },
                      {
                        field: 'tglperolehan',
                        title: 'Tgl. Perolehan',
                        formatter: ubah_tgl_indo,
                        align: 'center',
                        width: 90
                      },
                      {
                        field: 'tglsusut',
                        title: 'Tgl Susut',
                        formatter: ubah_tgl_indo,
                        align: 'center',
                        width: 90
                      },
                    ]
                  ],
                }
              }
            },
            {
              field: 'kodeaset',
              title: 'Kode Aset',
              width: 130,
            },
          ]
        ],
        onClickRow: function(index, row) {
          indexDetail = index;
        },
        columns: [
          [{
              field: 'serialnumber',
              title: 'Serial Number',
              width: 130,
            },
            {
              field: 'satuan',
              title: 'Satuan',
              width: 50,
              align: 'center'
            },
            {
              field: 'masamanfaat',
              title: 'Masa Manfaat',
              align: 'right',
              width: 100,
              formatter: format_amount,
            },
            {
              field: 'tglperolehan',
              title: 'Tgl. Perolehan',
              width: 100,
              formatter: ubah_tgl_indo,
              align: 'center',
            },
            {
              field: 'tglsusut',
              title: 'Tgl. Susut',
              width: 100,
              formatter: ubah_tgl_indo,
              align: 'center',
            },
            {
              field: 'nilaiperolehan',
              title: 'Nilai Perolehan',
              align: 'right',
              width: 150,
              formatter: format_amount,
            },
          ]
        ],
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);

          if (field == 'namaaset') {
            var idtrans = $("#IDASETBELI").combogrid('getValue');
            ed.combogrid('grid').datagrid('options').url = link_api.browseAsetReturPembelianAset;
            ed.combogrid('grid').datagrid('load', {
              q: '',
              uuidasetbeli: idtrans
            });
            ed.combogrid('showPanel');
          }
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data_detail', index, cell.field);
          var row_update = {};

          switch (cell.field) {
            case 'namaaset':
              var data = ed.combogrid('grid').datagrid('getSelected');
              var tgltrans = $("#TGLTRANS").datebox('getValue');

              var id = data ? data.uuidaset : '';
              var nama = data ? data.namaaset : '';
              var kode = data ? data.kodeaset : '';
              var serialnumber = data ? data.serialnumber : '';
              var satuan = data ? data.satuan : '';
              var masamanfaat = data ? data.masamanfaat : '';
              var tglperolehan = data ? data.tglperolehan : '';
              var tglsusut = data ? data.tglsusut : '';
              var nilaiperolehan = data ? data.nilaiperolehan : '';

              row_update = {
                uuidaset: id,
                namaaset: nama,
                kodeaset: kode,
                serialnumber: serialnumber,
                satuan: satuan,
                masamanfaat: masamanfaat,
                tglperolehan: tglperolehan,
                tglsusut: tglsusut,
                nilaiperolehan: nilaiperolehan,
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
          if ($(dg).datagrid('getData').total == 0) {
            $("#TXTTANGGAL").val("");
          }
        },
        onAfterEdit: function(index, row, changes) {
          hitung_grandtotal();
        }
      }).datagrid('enableCellEditing');
    }

    function hitung_grandtotal() {
      var data = $("#table_data_detail").datagrid('getRows');

      var footer = {
        nilaiperolehan: 0,
        penyusutan: 0,
        nilaibuku: 0,
      }

      for (var i = 0; i < data.length; i++) {
        footer.nilaiperolehan += parseFloat(data[i].nilaiperolehan);
        footer.penyusutan += parseFloat(data[i].penyusutan);
        footer.nilaibuku += parseFloat(data[i].nilaibuku);
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
      $("#TGLTRANS").datebox('setValue', date_format());
    }

    async function loadConfigReturPembelianAset() {
      try {
        const response = await fetch(
          link_api.loadConfigReturPembelianAset, {
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
          $('#KODEASETRETURBELI').textbox({
            prompt: res.data.KODE == 'AUTO' ? 'Auto Generate' : '',
            readonly: res.data.KODE == 'AUTO'
          });
        } else {
          throw new Error('Http Error: ' + response.status);
        }
      } catch (e) {
        showErrorAlert(e);
      }
    }
  </script>
@endpush
