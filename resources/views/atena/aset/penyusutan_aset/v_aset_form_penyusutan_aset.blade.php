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
            <div data-options="region:'north',border:false" style="width:100%; height:120px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;"></div>

              <input type="hidden" id="mode" name="mode">
              <input type="hidden" name="tglentry">
              <table width="100%">
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td valign="top">
                          <fieldset style="height:107px;">
                            <legend id="label_laporan">Info Transaksi</legend>
                            <table border="0">
                              <tr>
                                <td id="label_form">No. Penyusutan Aset</td>
                                <td id="label_form"><input name="kodeasetsusut" id="KODEASETSUSUT" class="label_input"
                                    style="width:190px">
                                  <input type="hidden" id="IDASETSUSUT" name="uuidasetsusut">
                                </td>
                              </tr>
                              <tr>
                                <td id="label_form">Tgl. Trans
                                <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date"
                                    style="width:190px" required></td>
                              </tr>
                              <tr>
                                <td id="label_form">Periode Susut</td>
                                <td id="label_form">
                                  <select name="bulan" id="TXTBULAN" class="easyui-combobox" style="width:95px;"
                                    required>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                  </select>
                                  <input name="tahun" id="TXTTAHUN" class="easyui-numberspinner" style="width:93px"
                                    prompt="TAHUN" required>
                                </td>
                                <td>
                                  <a class="easyui-linkbutton" iconCls="icon-save" id='btn_hitung' style="width:90px"
                                    onclick="javascript:hitung()">Hitung</a>
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
                        <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input
                            :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">|
                            Tgl. Input :</label> <label id="lbl_tanggal"></label></td>
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
  <script>
    let row = null;
    let cekbtnsimpan = true;

    $(document).ready(async function() {
      await loadConfigPenyusutanAset();
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
            export_excel('Faktur Penyusutan Aset', $("#area_cetak").html());
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

      $("#TGLTRANS").datebox();

      buat_table_detail();

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
      const doc = await getCetakDocument(
        link_api.cetakPenyusutanAset + id,
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

      $('#TGLTRANS').datebox('readonly', false);
      $('#TXTBULAN').combobox('readonly', false).combobox('setValue', '{{ date('m') }}');
      $('#TXTTAHUN').numberspinner('readonly', false).numberspinner('setValue', '{{ date('Y') }}');
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
          if (res.success) {
            $('#IDLOKASI').combogrid('setValue', res.data.uuidlokasi);
            $("#KODELOKASI").val(res.data.kodelokasi);
          } else {
            throw new Error(res.message);
          }
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
      $('#mode').val('ubah');

      try {
        const response = await fetch(
          link_api.loadDataHeaderPenyusutanAset, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer {{ session('TOKEN') }}'
            },
            body: JSON.stringify({
              uuidasetsusut: '{{ $data }}'
            })
          }
        );

        if (response.ok) {
          const res = await response.json();
          if (res.success) {
            row = res.data;
          } else {
            throw new Error(res.message);
          }
        } else {
          throw new Error('Http Error: ' + response.status);
        }
      } catch (e) {
        showErrorAlert(e);
      }

      if (row) {
        const statusTrans = await getStatusTrans(
          link_api.getStatusTransPenyusutanAset,
          'Bearer {{ session('TOKEN') }}', {
            uuidasetsusut: row.uuidasetsusut
          }
        );
        $(".form_status").html(status_transaksi(statusTrans));
        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          var UT = data.data.ubah;
          if (UT == 1 && statusTrans == 'I') {
            $('#btn_simpan_modal').css('filter', '');
            $('#mode').val('ubah');
          } else {
            document.getElementById('btn_simpan_modal').onclick = '';
            $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
            $('#btn_simpan_modal').removeAttr('onclick');
          }

          $("#form_input").form('load', row);
          $('#TXTBULAN').combobox('setValue', row.txtbulan);
          $('#TXTTAHUN').numberspinner('setValue', row.txttahun);
          $('#TGLTRANS').datebox('readonly');
          $('#TXTBULAN').combobox('readonly');
          $('#TXTTAHUN').numberspinner('readonly');

          load_data(row.uuidasetsusut, row.tglperiodesusut);

          $('#lbl_kasir').html(row.userbuat);
          $('#lbl_tanggal').html(row.tglentry);

        });
      }
    }

    async function hitung() {
      var bulan = $("#TXTBULAN").textbox('getValue');
      var tahun = $("#TXTTAHUN").textbox('getValue');
      reset_detail();
      try {
        bukaLoader();
        const response = await fetch(
          link_api.hitungPenyusutanAset, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer {{ session('TOKEN') }}'
            },
            body: JSON.stringify({
              bulanperiode: parseInt(bulan),
              tahunperiode: parseInt(tahun)
            })
          }
        );

        if (response.ok) {
          const res = await response.json();
          if (!res.success) {
            $.messager.alert('Error', res.message, 'error');
          } else {
            $('#table_data_detail').datagrid('loadData', res.data);
          }
        } else {
          throw new Error('Http Error: ' + response.status);
        }
      } catch (e) {
        showErrorAlert(e);
      } finally {
        tutupLoader();
      }
    }

    async function simpan(jenis_simpan) {
      var mode = $("#mode").val();

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));
      var rowDetail = $('#table_data_detail').datagrid('getRows')[0];

      var isValid = $('#form_input').form('validate');

      $('#window_button_simpan').window('close');

      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }

      const data = $("#form_input :input").serializeArray();
      const payload = {};
      for (var i = 0; i < data.length; i++) {
        if (typeof data[i].value === 'string' && data[i].name.startsWith('details')) {
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
            link_api.simpanPenyusutanAset, {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer {{ session('TOKEN') }}'
              },
              body: JSON.stringify(payload)
            }
          );
          cekbtnsimpan = true;
          if (response.ok) {
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
                cetak(res.data.uuidasetsusut);
              }
            } else {
              $.messager.alert('Error', res.message, 'error');
            }
          } else {
            throw new Error('Http Error: ' + response.status);
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

    async function load_data(idtrans, tgltrans) {
      try {
        const response = await fetch(
          link_api.loadDataPenyusutanAset, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer {{ session('TOKEN') }}'
            },
            body: JSON.stringify({
              uuidasetsusut: idtrans,
              tgltrans: tgltrans
            })
          }
        );

        if (response.ok) {
          const res = await response.json();
          if (res.success) {
            $('#table_data_detail').datagrid('loadData', res.data);
          } else {
            throw new Error(res.message);
          }
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

    function buat_table_detail() {
      var dg = '#table_data_detail';

      $(dg).datagrid({
        clickToEdit: false,
        dblclickToEdit: true,
        showFooter: true,
        singleSelect: true,
        rownumbers: true,
        RowAdd: false,
        data: [],
        frozenColumns: [
          [{
              field: 'uuidaset',
              hidden: true
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
          ]
        ],
        columns: [
          [{
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
              editor: {
                type: 'numberbox',
                options: {
                  required: true
                }
              }
            },
            {
              field: 'tglperolehan',
              title: 'Tgl. Perolehan',
              width: 100,
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
              field: 'nilaiperolehan',
              title: 'Nilai Perolehan',
              align: 'right',
              width: 140,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  required: true
                }
              }
            },
            {
              field: 'tglsusut',
              title: 'Tgl. Susut',
              width: 100,
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
              field: 'penyusutan',
              title: 'Penyusutan H-1',
              align: 'right',
              width: 140,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  required: true
                }
              }
            },
            {
              field: 'nilaisusut',
              title: 'Nilai Susut Periode Ini',
              align: 'right',
              width: 140,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  required: true
                }
              }
            },
            {
              field: 'nilaibuku',
              title: 'Nilai Buku',
              align: 'right',
              width: 140,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  required: true
                }
              }
            },
          ]
        ],
        onLoadSuccess: function(data) {
          hitung_grandtotal();
        },
        onAfterDeleteRow: function(index, row) {},
        onAfterEdit: function(index, row, changes) {}
      }).datagrid('enableCellEditing');
    }

    function hitung_grandtotal() {
      var data = $("#table_data_detail").datagrid('getRows');

      var footer = {
        penyusutan: 0,
        nilaisusut: 0,
        nilaibuku: 0,
      }

      for (var i = 0; i < data.length; i++) {
        footer.penyusutan += parseFloat(data[i].penyusutan);
        footer.nilaisusut += parseFloat(data[i].nilaisusut);
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

    async function loadConfigPenyusutanAset() {
      try {
        const response = await fetch(
          link_api.loadConfigPenyusutanAset, {
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

          $('#KODEASETSUSUT').textbox({
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
