@extends('template.form')

@section('content')
  <style>
    .datagrid-row-selected {
      color: rgb(255, 255, 255) !important;
      background: rgb(108, 174, 245) !important;
    }

    .datagrid-row-over {
      color: #404040 !important;
      background: #9cc8f7 !important;
    }
  </style>

  <!--FORM INPUT -->
  <div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'north',border:false" style="height: 130px;">
          <input type="hidden" name="mode" id="mode">
          <input type="hidden" name="uuidpromo">
          <input type="hidden" name="tglentry">
          <input type="hidden" name="data_detail_barang" id="data_detail_barang">
          <input type="hidden" name="data_detail_syarat" id="data_detail_syarat">

          <table>
            <tr>
              <td valign="top">
                <table style="padding:5px" border="0">
                  <tr>
                    <td align="right" id="label_form">Kode Promo</td>
                    <td>
                      <input name="kodepromo" id="KODEPROMO" style="width: 150px" class="label_input">
                      <label id="label_form"><input type="checkbox" id="STATUS" name="status" value="1">
                        Aktif</label>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Nama Promo</td>
                    <td>
                      <input name="namapromo" id="namapromo" style="width: 200px" class="label_input" required>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Supplier</td>
                    <td>
                      <input name="uuidsupplier" id="uuidsupplier" style="width: 200px">
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Jenis Item Promo</td>
                    <td>
                      <select name="jenisitem" class="easyui-combobox" data-options="editable: false,panelHeight: 68"
                        style="width: 200px" required>
                        <option value="1">Detil per masing-masing item</option>
                        <option value="2">Item digabung</option>
                      </select>
                    </td>
                  </tr>
                </table>
              </td>
              <td>
                <table style="padding:5px" border="0">
                  <tr>
                    <td align="right" id="label_form">Periode</td>
                    <td>
                      <input name="tglawal" id="tglawal" style="width: 100px" class="date" required> s/d
                      <input name="tglakhir" id="tglakhir" style="width: 100px" class="date" required>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Jam Periode</td>
                    <td>
                      <input name="jamawal" id="jamawal" style="width: 100px" class="easyui-timespinner"
                        data-options="showSeconds: true" required> s/d
                      <input name="jamakhir" id="jamakhir" style="width: 100px" class="easyui-timespinner"
                        data-options="showSeconds: true" required>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Hari</td>
                    <td>
                      <input type="checkbox" name="senin" value="1"> Senin
                      <input type="checkbox" name="selasa" value="1"> Selasa
                      <input type="checkbox" name="rabu" value="1"> Rabu
                      <input type="checkbox" name="kamis" value="1"> Kamis
                      <input type="checkbox" name="jumat" value="1"> Jumat
                      <input type="checkbox" name="sabtu" value="1"> Sabtu
                      <input type="checkbox" name="minggu" value="1"> Minggu
                    </td>
                  </tr>
                </table>
              </td>
              <td valign="bottom">
                <textarea name="catatan" class="label_input" id="catatan" multiline="true" prompt="Catatan"
                  style="width:250px; height:80px" data-options="validType:'length[0, 500]'"></textarea>
              </td>
            </tr>
          </table>
        </div>

        <div data-options="region: 'center'">
          <div class="easyui-layout" style="height:100%">
            <div data-options="region: 'center'">
              <div class="easyui-tabs" style="height: 100%;width: 100%">
                <div title="Barang yang Dipromokan">
                  <table id="table_detail_barang" fit="true"></table>
                </div>
              </div>
            </div>
            <div data-options="region: 'south'" style="height: 250px;">
              <div class="easyui-tabs" style="height: 100%;width: 100%">
                <div title="Syarat (Qty atau Nominal) dan Bonus (Nilai, Presentase, atau Barang)">
                  <table id="table_detail_syarat" fit="true"></table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div data-options="region: 'south'" style="height: 30px;">
      <table cellpadding="0" cellspacing="0" style="width:100%">
        <tr>
          <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input :</label>
            <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl Input :</label>
            <label id="lbl_tanggal"></label>
          </td>
        </tr>
      </table>
    </div>

    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
      <br>
      <a title="Simpan" class="easyui-tooltip" iconCls="" data-options="plain:false" id='btn_simpan'
        onclick="javascript:simpan()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
      <br><br>
      <a title="Tutup" class="easyui-tooltip" iconCls="" data-options="plain:false"
        onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
    </div>
  </div>

  <div id="toolbar-barang" style="display: flex; align-items: center">
    <a class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-add'"
      onclick="tambah_detail_barang()">Tambah</a>
    <a class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-remove'"
      onclick="hapus_detail_barang()">Hapus</a>
  </div>

  <div id="toolbar-syarat" style="display: flex; align-items: center">
    <a class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-add'"
      onclick="tambah_detail_syarat()">Tambah</a>
    <a class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-remove'"
      onclick="hapus_detail_syarat()">Hapus</a>
  </div>
@endsection

@push('js')
  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-filter/datagrid-filter.js') }}">
  </script>
  <script>
    var mode_load_depo = false;
    var indexSelectedBarang = -1;
    var indexSelectedSyarat = -1;

    $(document).ready(function() {
      buat_table_detail_barang();
      buat_table_detail_syarat();

      browse_data_supplier('#uuidsupplier');

      if ("{{ $mode }}" == "tambah") {
        tambah();
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

    function tambah() {
      $('#form_input').form('clear');
      $('#mode').val('tambah');

      $('[name="stratapengambilan"][value="QTY"]').prop('checked', true);

      $('#STATUS').prop('checked', true);
      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#uuidsupplier').combogrid('readonly', false);

      $('#table_detail_barang').datagrid('loadData', []);
      $('#table_detail_syarat').datagrid('loadData', []);

      getConfig("KODEPROMO", "MPROMO", 'bearer {{ session('TOKEN') }}',
        function(response) {
          if (response.success) {
            const kode = response.data.value;
            if (kode == 'AUTO') {
              $('#KODEPROMO').textbox({
                prompt: "Auto Generate",
                readonly: true,
                required: false
              });
            } else {
              $('#KODEPROMO').textbox({
                prompt: "",
                readonly: false,
                required: true
              });
              $('#KODEPROMO').textbox('clear').textbox('textbox').focus();
            }
          } else {
            $.messager.alert('Error', response.message, 'error');
          }
        },
        function(error) {
          $.messager.alert('Error', "Request Config Error", 'error');
        }
      );
    }

    async function ubah() {
      $('#mode').val('ubah');
      var row = null;
      try {
        const response = await fetchData(link_api.headerFormPromo, {
          uuidpromo: "{{ $data }}"
        });
        if (response.success) {
          row = response.data;
          $('#form_input').form('load', row);

          $('[name=mode]').val('ubah');
          $('#lbl_kasir').html(row.userbuat);
          $('#lbl_tanggal').html(row.tglentry);
          $('#KODEPROMO').textbox('readonly', true);

          $('#uuidsupplier').combogrid('setValue', {
            uuidsupplier: row.uuidsupplier,
            nama: row.namasupplier
          });

          $('#uuidsupplier').combogrid('readonly', true);

          get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
            data = data.data;
            if (data.ubah != 1) {
              $('#btn_simpan').css('filter', 'grayscale(100%)').removeAttr('onclick');
            }
          });

          load_data_promo(row.uuidpromo);
        } else {
          tutupLoader();
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        tutupLoader();
        const e = (typeof error === 'string') ? error : error.message;
        var textError = getTextError(e);
        $.messager.alert('Error', textError, 'error');
      }
    }

    async function fetchData(url, body) {
      try {
        const token = '{{ session('TOKEN') }}';
        let headers = {
          'Authorization': 'bearer ' + token,
        };
        let requestBody = null;

        // Cek apakah body adalah instance dari FormData
        if (body instanceof FormData) {
          // Jika FormData, jangan set 'Content-Type'. Browser akan melakukannya secara otomatis.
          requestBody = body;
        } else {
          // Default: Jika bukan FormData, asumsikan itu JSON.
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

        const data = await response.json();
        return data;
      } catch (error) {
        console.error("Terjadi kesalahan:", error);
        throw error; // Melemparkan kembali error agar bisa ditangkap oleh pemanggil
      }
    }

    async function simpan() {
      var rows_barang = $('#table_detail_barang').datagrid('getRows');
      var rows_syarat = $('#table_detail_syarat').datagrid('getRows');

      var isValid = $('#form_input').form('validate');

      if (isValid) {
        const form = $('#form_input :input').serializeArray();
        const payload = {};
        for (const item of form) {
          payload[item.name] = item.value;
        }
        payload.data_detail_barang = rows_barang;
        payload.data_detail_syarat = rows_syarat;

        mode = $('[name=mode]').val();

        try {
          tampilLoaderSimpan();
          const response = await fetchData(link_api.simpanPromo, payload);
          tutupLoaderSimpan();
          if (response.success) {
            $.messager.alert('Info', 'Simpan Data Sukses', 'info');
            if (mode == 'tambah') {
              tambah();
            } else if (mode == 'ubah') {
              ubah();
            }
          } else {
            $.messager.alert('Error', response.message, 'error');
          }
        } catch (error) {
          tutupLoaderSimpan();
          const e = (typeof error === 'string') ? error : error.message;
          var textError = getTextError(e);
          $.messager.alert('Error', textError, 'error');
        }
      }
    }

    function buat_table_detail_barang() {
      $('#table_detail_barang').datagrid({
        rownumbers: true,
        clickToEdit: false,
        dblclickToEdit: true,
        toolbar: '#toolbar-barang',
        columns: [
          [{
              field: 'uuidbarang',
              hidden: true
            }, {
              field: 'kodebarang',
              title: 'Kode Barang',
              align: 'left',
              width: 150,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 690,
                  mode: 'remote',
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
                        field: 'catatan',
                        title: 'Catatan',
                        width: 250
                      },
                    ]
                  ],
                }
              }
            },
            {
              field: 'namabarang',
              title: 'Nama Barang',
              align: 'left',
              width: 300
            }
          ]
        ],
        onClickRow: function(index, row) {
          indexSelectedBarang = index;
        },
        onBeforeCellEdit: function(index, field) {
          var row = $(this).datagrid('getRows')[index];
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_detail_barang', index, field);
          var idsupplier = $('#uuidsupplier').combogrid('getValue');

          if (field == 'kodebarang') {
            ed.combogrid('showPanel');

            ed.combogrid('grid').datagrid('options').url = link_api.browseBarangPromo;

            ed.combogrid('grid').datagrid('load', {
              uuidsupplier: idsupplier,
              q: ''
            });
          }
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_detail_barang', index, cell.field);
          var row_update = {};

          switch (cell.field) {
            case 'kodebarang':
              var data = ed.combogrid('grid').datagrid('getSelected');

              row_update = {
                uuidbarang: data.uuidbarang,
                namabarang: data.nama
              }

              break;
          }

          if (jQuery.isEmptyObject(row_update) == false) {
            $(this).datagrid('updateRow', {
              index: index,
              row: row_update
            });
          }
        },
        onAfterEdit: function(index, row, changes) {
          var rows = $('#table_detail_barang').datagrid('getRows');

          for (var i = 0; i < rows.length; i++) {
            if (i == index) {
              continue;
            }

            if (rows[i].uuidbarang == row.uuidbarang) {
              $.messager.alert('Peringatan', 'Sudah terdapat data barang yang sama', 'warning');

              $('#table_detail_barang').datagrid('deleteRow', index);

              break;
            }
          }
        }
      }).datagrid('enableCellEditing');
    }

    function load_data_promo(idpromo) {
      $.ajax({
        url: link_api.loadDataPromo,
        type: 'POST',
        data: {
          uuidpromo: idpromo
        },
        dataType: 'JSON',
        beforeSend: function() {
          $('#table_detail_barang').datagrid('loading');
        },
        success: function(response) {
          console.log(response);
          $('#table_detail_barang').datagrid('loaded');

          $('#table_detail_barang').datagrid('loadData', response.detail_barang);
          $('#table_detail_syarat').datagrid('loadData', response.detail_syarat);
        }
      });
    }

    function buat_table_detail_syarat() {
      $('#table_detail_syarat').datagrid({
        rownumbers: true,
        dblclickToEdit: true,
        clickToEdit: false,
        toolbar: '#toolbar-syarat',
        columns: [
          [{
              field: 'berlakukelipatan',
              hidden: true,
              rowspan: 2
            },
            {
              field: 'ckberlakukelipatan',
              title: 'Berlaku<br>Kelipatan',
              rowspan: 2,
              align: 'center',
              formatter: function(value, row, index) {
                return `<input type="checkbox" onchange="ubah_berlakukelipatan(${coalesce(row.berlakukelipatan, 0)}, ${index})" ${row.berlakukelipatan == 1 ? 'checked' : ''}>`;
              }
            },
            {
              field: 'berdasarkanqty',
              title: 'Syarat Bonus Berdasarkan Qty',
              colspan: 3,
              align: 'center'
            },
            {
              field: 'berdasarkannominal',
              title: 'Syarat Bonus Berdasarkan Nominal (Rp)',
              colspan: 3,
              align: 'center'
            },
            {
              field: 'bonuspotongan',
              title: 'Bonus Diskon (Rp)',
              colspan: 4,
              align: 'center'
            },
            {
              field: 'bonusbarang',
              title: 'Bonus Barang',
              colspan: 7,
              align: 'center'
            },
          ],
          [{
              field: 'jmlawal',
              title: 'Qty Awal',
              width: 80,
              formatter: format_qty,
              align: 'right',
              editor: {
                type: 'numberbox'
              },
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'jmlakhir',
              title: 'Qty Akhir',
              width: 80,
              formatter: format_qty,
              align: 'right',
              editor: {
                type: 'numberbox'
              },
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'jmlkelipatan',
              title: 'Qty Kelipatan',
              width: 80,
              formatter: format_qty,
              align: 'right',
              editor: {
                type: 'numberbox'
              },
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'nominalawal',
              title: 'Nominal (Rp)<br>Awal',
              width: 80,
              formatter: format_qty,
              align: 'right',
              editor: {
                type: 'numberbox'
              },
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'nominalakhir',
              title: 'Nominal (Rp)<br>Akhir',
              width: 80,
              formatter: format_qty,
              align: 'right',
              editor: {
                type: 'numberbox'
              },
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'nominalkelipatan',
              title: 'Nominal (Rp)<br>Kelipatan',
              width: 80,
              formatter: format_qty,
              align: 'right',
              editor: {
                type: 'numberbox'
              },
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'potonganpersentase',
              title: 'Diskon %',
              width: 80,
              formatter: format_qty,
              align: 'right',
              editor: {
                type: 'numberbox'
              },
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'potongannominal',
              title: 'Diskon (Rp)',
              width: 80,
              formatter: format_qty,
              align: 'right',
              editor: {
                type: 'numberbox'
              },
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'potongannominalmaksimum',
              title: 'Maks. Diskon (Rp)<br>(Per Nota)',
              width: 100,
              formatter: format_qty,
              align: 'right',
              editor: {
                type: 'numberbox'
              },
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'kuotapotongannominal',
              title: 'Kuota Diskon (Rp)',
              width: 100,
              formatter: format_qty,
              align: 'right',
              editor: {
                type: 'numberbox'
              },
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'barangbonussama',
              hidden: true
            },
            {
              field: 'ckbarangbonussama',
              title: 'Barang Bonus<br>Sama',
              width: 80,
              align: 'center',
              formatter: function(value, row, index) {
                return `<input type="checkbox" onchange="ubah_barangbonussama(${coalesce(row.barangbonussama, 0)}, ${index})" ${row.barangbonussama == 1 ? 'checked' : ''}>`;
              },
              styler: function(value, row, index) {
                return 'background-color: #ccffc7; color: #000000';
              }
            },
            {
              field: 'uuidbarangbonus',
              hidden: true
            },
            {
              field: 'namabarangbonus',
              title: 'Nama Barang Bonus',
              width: 300,
              align: 'left',
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 690,
                  mode: 'remote',
                  idField: 'nama',
                  textField: 'nama',
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
                        field: 'satuan',
                        title: 'Satuan',
                        width: 60
                      },
                      {
                        field: 'catatan',
                        title: 'Catatan',
                        width: 250
                      },
                    ]
                  ],
                }
              },
              styler: function(value, row, index) {
                return 'background-color: #ccffc7; color: #000000';
              }
            },
            {
              field: 'jmlbarangbonus',
              title: 'Qty Bonus',
              width: 80,
              formatter: format_qty,
              align: 'right',
              editor: {
                type: 'numberbox'
              },
              styler: function(value, row, index) {
                return 'background-color: #ccffc7; color: #000000';
              }
            },
            {
              field: 'jmlmaksbarangbonus',
              title: 'Jml Maks. Bonus<br>(Per Nota)',
              width: 100,
              formatter: format_qty,
              align: 'right',
              editor: {
                type: 'numberbox'
              },
              styler: function(value, row, index) {
                return 'background-color: #ccffc7; color: #000000';
              }
            },
            {
              field: 'kuotabarangbonus',
              title: 'Kuota Stok<br>Bonus',
              width: 100,
              formatter: format_qty,
              align: 'right',
              editor: {
                type: 'numberbox'
              },
              styler: function(value, row, index) {
                return 'background-color: #ccffc7; color: #000000';
              }
            },
          ],
        ],
        onClickRow: function(index, row) {
          indexSelectedSyarat = index;
        },
        onBeforeCellEdit: function(index, field) {
          var row = $(this).datagrid('getRows')[index];

          if (field == 'jmlkelipatan' || field == 'nominalkelipatan') {
            if (row.berlakukelipatan == 0) {
              return false;
            }
          }

          if (field == 'potongannominalmaksimum' || field == 'kuotapotongannominal') {
            if (row.uuidbarangbonus != '' || row.barangbonussama == 1) {
              return false;
            }
          }

          if (field == 'jmlmaksbarangbonus' || field == 'kuotabarangbonus' || field == 'jmlbarangbonus') {
            if (row.potongannominal > 0 || row.potonganpersentase > 0) {
              return false;
            }
          }
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_detail_syarat', index, field);
          var idsupplier = $('#uuidsupplier').combogrid('getValue');

          if (field == 'namabarangbonus') {
            ed.combogrid('showPanel');

            ed.combogrid('grid').datagrid('options').url = link_api.browseBarangPromo;

            ed.combogrid('grid').datagrid('load', {
              uuidsupplier: idsupplier,
              q: ''
            });
          }
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_detail_syarat', index, cell.field);
          var row_update = {};

          switch (cell.field) {
            case 'namabarangbonus':
              var data = ed.combogrid('grid').datagrid('getSelected');

              row_update = {
                uuidbarangbonus: data.uuidbarang,
                kodebarangbonus: data.kode,
                barangbonussama: 0,
                potonganpersentase: 0,
                potongannominal: 0,
                potongannominalmaksimum: 0,
                kuotapotongannominal: 0
              }

              break;
            case 'jmlawal':
            case 'jmlakhir':
            case 'jmlkelipatan':
              row_update = {
                nominalawal: 0,
                nominalakhir: 0,
                nominalkelipatan: 0
              };
              break;
            case 'nominalawal':
            case 'nominalakhir':
            case 'nominalkelipatan':
              row_update = {
                jmlawal: 0,
                jmlakhir: 0,
                jmlkelipatan: 0
              }
              break;
            case 'potonganpersentase':
            case 'potongannominal':
              row_update = {
                barangbonussama: 0,
                uuidbarangbonus: '',
                kodebarangbonus: '',
                namabarangbonus: '',
                jmlbarangbonus: 0,
                jmlmaksbarangbonus: 0,
                kuotabarangbonus: 0
              }

              if (cell.field == 'potonganpersentase') {
                row_update.potongannominal = 0;
              }

              if (cell.field == 'potongannominal') {
                row_update.potonganpersentase = 0;
              }
              break;
            case 'barangbonussama':
            case 'namabarangbonus':
              row_update = {
                potonganpersentase: 0,
                potongannominal: 0,
                potongannominalmaksimum: 0,
                kuotapotongannominal: 0
              }
              break;
          }

          if (jQuery.isEmptyObject(row_update) == false) {
            $(this).datagrid('updateRow', {
              index: index,
              row: row_update
            });
          }
        }
      }).datagrid('enableCellEditing');
    }

    function coalesce(value, defaultValue) {
      if (value == null) {
        return defaultValue;
      }

      if (value == undefined) {
        return defaultValue;
      }

      if (value == '') {
        return defaultValue;
      }

      return value;
    }

    function cek_valid_data() {
      var rows = $('#table_detail_barang').datagrid('getRows');

      for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
      }
    }

    function IsJsonString(str) {
      try {
        JSON.parse(str);
      } catch (e) {
        return false;
      }

      return true;
    }

    function browse_data_supplier(id) {
      $(id).combogrid({
        panelWidth: 600,
        url: link_api.browseSupplier,
        idField: 'uuidsupplier',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        required: false,
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
            }
          ]
        ]
      });
    }

    function ubah_berlakukelipatan(berlakukelipatan, index) {
      var berlakukelipatan = (berlakukelipatan == 1 ? 0 : 1);

      var row_update = {
        berlakukelipatan: berlakukelipatan
      };

      if (berlakukelipatan == 0) {
        row_update.jmlkelipatan = 0;
        row_update.nominalkelipatan = 0;
      }

      $('#table_detail_syarat').datagrid('updateRow', {
        index: index,
        row: row_update
      });
    }

    function ubah_barangbonussama(barangbonussama, index) {
      var barangbonussama = (barangbonussama == 1 ? 0 : 1);

      var row_update = {
        barangbonussama: barangbonussama,
        potonganpersentase: 0,
        potongannominal: 0,
        potongannominalmaksimum: 0,
        kuotapotongannominal: 0
      };

      if (barangbonussama == 1) {
        row_update.uuidbarangbonus = '';
        row_update.kodebarangbonus = '';
        row_update.namabarangbonus = '';
      }

      $('#table_detail_syarat').datagrid('updateRow', {
        index: index,
        row: row_update
      });
    }

    function tambah_detail_barang() {
      $('#table_detail_barang').datagrid('appendRow', {})
    }

    function hapus_detail_barang() {
      if (indexSelectedBarang >= 0) {
        $('#table_detail_barang').datagrid('deleteRow', indexSelectedBarang);

        indexSelectedBarang = -1;
      }
    }

    function tambah_detail_syarat() {
      $('#table_detail_syarat').datagrid('appendRow', {})
    }

    function hapus_detail_syarat() {
      if (indexSelectedSyarat >= 0) {
        $('#table_detail_syarat').datagrid('deleteRow', indexSelectedSyarat);

        indexSelectedSyarat = -1;
      }
    }
  </script>
@endpush
