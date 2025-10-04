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
            <div data-options="region:'north',border:false" style="width:100%; height:210px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>

              <input type="hidden" id="mode" name="mode">
              <input type="hidden" name="tglentry">
              <table width="100%">
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td valign="top">
                          <fieldset style="height:190px;">
                            <legend id="label_laporan">Info Transaksi</legend>
                            <table border="0">
                              <tr>
                                <td id="label_form">No. Penjualan Aset</td>
                                <td id="label_form"><input name="kodeasetjual" id="KODEASETJUAL" class="label_input"
                                    style="width:190px">
                                  <input type="hidden" id="IDASETJUAL" name="uuidasetjual">
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
                              </tr>
                              <tr>
                                <td id="label_form">Tgl. Rencana Kirim</td>
                                <td id="label_form"><input name="tglkirim" id="TGLKIRIM" class="date"
                                    style="width:190px"></td>
                              </tr>
                            </table>
                          </fieldset>
                        </td>
                        <td valign="top">
                          <fieldset style="height:190px;">
                            <legend id="label_laporan">Customer</legend>
                            <table border="0">
                              <tr>
                                <td id="label_form">Kode</td>
                                <td>
                                  <input id="IDCUSTOMER" name="uuidcustomer" class="label_input" style="width:80px">
                                  <input type="hidden" id="KODECUSTOMER" name="kodecustomer">
                                </td>
                                <td id="label_form">Nama</td>
                                <td>
                                  <input name="namacustomer" class="label_input" id="NAMACUSTOMER" style="width:200px"
                                    readonly prompt="Nama Customer">
                                </td>
                              </tr>
                              <tr>
                                <td id="label_form" style="vertical-align: super;">Alamat</td>
                                <td colspan="3">
                                  <textarea name="alamat" class="label_input" id="ALAMAT" readonly prompt="Alamat Customer" multiline="true"
                                    style="width:320px; height:40px" data-options="validType:'length[0, 500]'"></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td id="label_form" style="vertical-align: super;">Alamat Kirim
                                  <a id="btn_browse" class="easyui-linkbutton"
                                    data-options="iconCls:'icon-search', plain:true"></a>
                                </td>
                                <td colspan="3">
                                  <textarea name="alamatkirim" class="label_input" id="ALAMATKIRIM" readonly prompt="Alamat Kirim" multiline="true"
                                    style="width:320px; height:40px" data-options="validType:'length[0, 500]'"></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td id="label_form">Telp</td>
                                <td colspan="3">
                                  <input name="telp" class="label_input" id="TELP" style="width:320px" readonly
                                    prompt="Telp Customer">

                                </td>
                              </tr>
                              <tr>
                                <td id="label_form">Syarat Bayar</td>
                                <td id="label_form" colspan="3">
                                  <input name="uuidsyaratbayar" id="IDSYARATBAYAR" readonly class="label_input"
                                    style="width:217px">
                                  <input name="tgljatuhtempo" id="TGLJATUHTEMPO" readonly class="date"
                                    style="width:100px">
                                </td>
                              </tr>
                            </table>
                          </fieldset>
                        </td>
                        <td valign="bottom">
                          <table border="0">
                            <tr>
                              <td id="label_form">
                                <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                                  style="width:250px; height:65px" data-options="validType:'length[0, 500]'"></textarea>
                              </td>
                            </tr>
                          </table>
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
            <div data-options="region:'south',border:false" style="width:100%; height:30px;">
              <table id="trans_footer" width="100%">
                <tr>
                  <td colspan="2">
                    <table cellpadding="0" cellspacing="0">
                      <tr>
                        <td id="label_form"><label style="font-weight:normal" id="label_form">User Input :</label>
                          <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Entry Tgl.
                            Transaksi :</label> <label id="lbl_tanggal"></label>
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td align='right'>
                    Grand Total <input name="grandtotal" id="GRANDTOTAL" class="number " style="width:110px;"
                      readonly>
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

  <div id="browse_alamat_kirim" title="Alamat Kirim">
    <table style="padding:5px">
      <tr>
        <td>
          <div title="Alamat Kirim">
            <table id="table_data_alamat_kirim" style="height:150px; width:335px"></table>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <div id="browse_alamat_kirim-buttons">
    <table cellpadding="0" cellspacing="0" style="width:100%">
      <tr>
        <td style="text-align:right">
          <a class="easyui-linkbutton" iconCls="icon-save" id='btn_pilih_alamat_kirim'
            onclick="javascript:pilih_alamat_kirim()">Pilih</a>
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
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-filter/datagrid-filter.js') }}"></script>
  <script>
    let row = null;
    var cekbtnsimpan = true;
    $(document).ready(async function() {
      await loadConfigPenjualanAset();
      get_akses_user('{{ $kodemenu }}', 'Bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        var UT = data.cetak;
        if (UT == 1) {
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
            export_excel('Faktur Penjualan Aset', $("#area_cetak").html());
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
      browse_data_syaratbayar('#IDSYARATBAYAR');

      $("#browse_alamat_kirim").dialog({
        onOpen: function() {
          $('#browse_alamat_kirim').form('clear');
        },
        buttons: '#browse_alamat_kirim-buttons',
      }).dialog('close');

      buat_table_detail();
      buat_table_alamat_kirim();

      @if ($mode == 'tambah')
        tambah();
      @elseif ($mode == 'ubah')
        ubah();
      @endif
    });

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }


    async function cetak(id) {
      const doc = await getCetakDocument(
        link_api.cetakPenjualanAset + id,
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
      $('#TGLTRANS').datebox('readonly', false);
      $('#TGLKIRIM').datebox('readonly', false);
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

        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const res = await response.json();
        if (res.success) {
          $('#IDLOKASI').combogrid('setValue', res.data.uuidlokasi);
          $("#KODELOKASI").val(res.data.kodelokasi);
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

      try {
        const response = await fetch(
          link_api.loadDataHeaderPenjualanAset, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer {{ session('TOKEN') }}'
            },
            body: JSON.stringify({
              uuidasetjual: '{{ $data }}'
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
          link_api.getStatusTransPenjualanAset,
          'Bearer {{ session('TOKEN') }}', {
            uuidasetjual: row.uuidasetjual
          }
        );
        $(".form_status").html(status_transaksi(statusTrans));

        $("#form_input").form('load', row);
        $('#IDLOKASI').combogrid('readonly');
        $('#TGLTRANS').datebox('readonly');
        $('#TGLKIRIM').datebox('readonly');


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

          load_data(row.uuidasetjual);
        });

        //CUSTOMER
        let url = link_api.browseCustomer;
        get_combogrid_data($("#IDCUSTOMER"), "uuidcustomer", row.uuidcustomer, url, '{{ session('TOKEN') }}');
      }
    }

    async function simpan(jenis_simpan) {
      var mode = $("#mode").val();

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      $('#window_button_simpan').window('close');

      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }

      const data = $("#form_input :input").serializeArray();
      const payload = {};
      for (var i = 0; i < data.length; i++) {
        if (typeof data[i].value === 'string' && data[i].name.startsWith('data_detail')) {
          data[i].value = JSON.parse(data[i].value);
        }
        payload[data[i].name] = data[i].value;
      }
      payload['jenis_simpan'] = jenis_simpan;

      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        cekbtnsimpan = false;

        try {
          tampilLoaderSimpan();
          const response = await fetch(
            link_api.simpanPenjualanAset, {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer {{ session('TOKEN') }}'
              },
              body: JSON.stringify(payload)
            }
          );
          cekbtnsimpan = true;
          if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
          }

          const res = await response.json();
          if (res.success) {
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
              cetak(res.data.uuidasetjual);
            }
          } else {
            $.messager.alert('Error', res.message, 'error');
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
          link_api.loadDataPenjualanAset, {
            method: 'POST',
            headers: {
              'Authorization': 'bearer {{ session('TOKEN') }}',
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({
              uuidasetjual: idtrans
            }),
          }
        );

        if (response.ok) {
          const res = await response.json();
          if (!res.success) {
            throw new Error(res.message);
          }

          $('#table_data_detail').datagrid('loadData', res.data);
        } else {
          throw new Error('Http Error: ' + response.status);
        }
      } catch (e) {
        showErrorAlert(e);
      }
    }

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
          if ($('#mode').val() != '') {
            var row = $(id).combogrid('grid').datagrid('getSelected');
            if (row) {
              $("#KODELOKASI").val(row.kode);
            }
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

            $('#NAMACUSTOMER').textbox('setValue', row.nama);
            $("#KODECUSTOMER").val(row.kode);
            $('#ALAMAT').textbox('setValue', alamat);
            $('#TELP').textbox('setValue', row.telp);
            $('#IDSYARATBAYAR').combogrid('setValue', row.uuidsyaratbayar);
            $('#ALAMATKIRIM').textbox('clear');
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

    function browse_data_subcustomer(id) {
      $(id).combogrid({
        panelWidth: 600,
        idField: 'uuidcustomer',
        textField: 'kode',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        readonly: true,
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
        onChange: function(newVal, oldVal) {
          var row = $(id).combogrid('grid').datagrid('getSelected');

          if (row) {
            var alamat = row.alamat == "" || row.alamat == null ? "" : (row.alamat + "\r\n");
            if (row.kota && row.kota != 'null') alamat += row.kota;
            if (row.propinsi && row.propinsi != 'null') alamat += "-" + row.propinsi;
            if (row.negara && row.negara != 'null') alamat += "-" + row.negara;

            $('#NAMASUBCUSTOMER').textbox('setValue', row.nama)
            $('#ALAMATSUBCUSTOMER').textbox('setValue', alamat);
            $('#TELPSUBCUSTOMER').textbox('setValue', row.telp);
            $("#KODESUBCUSTOMER").val(row.kode);
          } else {
            $(this).combogrid('setValue', '');
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

    function pilih_alamat_kirim(id, table) {
      var selected = $('#table_data_alamat_kirim').datagrid('getSelected');
      if (selected) {
        $('#ALAMATKIRIM').textbox('setValue', selected.alamat);
        $('#browse_alamat_kirim').dialog('close');
      } else {
        $.messager.show({
          title: 'Warning',
          msg: 'Harap pilih salah satu alamat',
          timeout: {{ session('TIMEOUT') }},
        });
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
              field: 'uuidaset',
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
                  idField: 'namaaset',
                  textField: 'namaaset',
                  sortOrder: 'asc',
                  onBeforeLoad: function(param) {
                    param.uuidlokasi = $("#IDLOKASI").combogrid('getValue');
                    param.tgltrans = $("#TGLTRANS").datebox('getValue');
                  },
                  columns: [
                    [{
                        field: 'namaaset',
                        title: 'Nama',
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
              field: 'nilaibuku',
              title: 'Nilai Buku',
              align: 'right',
              width: 120,
              formatter: format_amount,
            },
            {
              field: 'hargajual',
              title: 'Harga Jual',
              align: 'right',
              width: 120,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  required: true,
                }
              },
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
              width: 120,
              formatter: format_amount,
            },
            {
              field: 'penyusutan',
              title: 'Nilai Penyusutan',
              align: 'right',
              width: 120,
              formatter: format_amount,
            },
          ]
        ],
        onClickRow: function(index, row) {
          indexDetail = index;
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);

          if (field == 'namaaset') {
            ed.combogrid('grid').datagrid('options').url = link_api.browseAsetPenjualanAset;
            ed.combogrid('grid').datagrid('load', {
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
            case 'namaaset':
              var tgltrans = $("#TGLTRANS").datebox('getValue');
              var data = ed.combogrid('grid').datagrid('getSelected');

              var id = data ? data.uuidaset : '';
              var nama = data ? data.namaaset : '';
              var kode = data ? data.kodeaset : '';
              var serialnumber = data ? data.serialnumber : '';
              var satuan = data ? data.satuan : '';
              var masamanfaat = data ? data.masamanfaat : '';
              var tglperolehan = data ? data.tglperolehan : '';
              var tglsusut = data ? data.tglsusut : '';
              var nilaiperolehan = data ? data.nilaiperolehan : '';
              var penyusutan = data ? data.penyusutan : 0;
              var nilaibuku = data ? data.nilaibuku : 0;
              var hargajual = 0;

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
                penyusutan: penyusutan,
                nilaibuku: nilaibuku,
                hargajual: hargajual,
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
          hitung_grandtotal();
        }
      }).datagrid('enableCellEditing');
    }

    function buat_table_alamat_kirim(id, table) {
      var dg = '#table_data_alamat_kirim';

      $(dg).datagrid({
        clickToEdit: false,
        dblclickToEdit: true,
        singleSelect: true,
        rownumbers: true,
        data: [],
        columns: [
          [{
            field: 'alamat',
            title: 'Alamat Kirim',
            width: 300,
            sortable: true,
            multiline: true
          }, ]
        ],
      }).datagrid();
    }

    function hitung_grandtotal() {
      var data = $("#table_data_detail").datagrid('getRows');

      var footer = {
        nilaiperolehan: 0,
        penyusutan: 0,
        nilaibuku: 0,
        hargajual: 0,
      }

      for (var i = 0; i < data.length; i++) {
        footer.nilaiperolehan += parseFloat(data[i].nilaiperolehan);
        footer.penyusutan += parseFloat(data[i].penyusutan);
        footer.nilaibuku += parseFloat(data[i].nilaibuku);
        footer.hargajual += parseFloat(data[i].hargajual);
      }

      $("#GRANDTOTAL").numberbox('setValue', footer.hargajual);
      $('#table_data_detail').datagrid('reloadFooter', [footer]);
    }

    function clear_plugin() {
      $('.combogrid-f').each(function() {
        $(this).combogrid('grid').datagrid('load', {
          q: ''
        });
      });

      $('.number').numberbox('setValue', 0);
      $("#TGLTRANS, #TGLKIRIM").datebox('setValue', date_format());
    }

    async function loadConfigPenjualanAset() {
      try {
        const response = await fetch(
          link_api.loadConfigPenjualanAset, {
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

          $('#KODEASETJUAL').textbox({
            prompt: res.data.KODE == 'AUTO' ? 'Auto Generate' : '',
            readonly: res.data.KODE == 'AUTO'
          });
          $('#td_footer_total').css('display', res.data.LIHATHARGA == 0 ? 'none' : '');
        } else {
          throw new Error('Http Error: ' + response.status);
        }
      } catch (e) {
        showErrorAlert(e);
      }
    }
  </script>
@endpush
