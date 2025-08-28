@extends('template.form')

@section('content')
  <div class="easyui-layout" style="width:100%;height:100%" fit="true">
    <div data-options="region:'north'" style="height:65px;overflow:hidden">
      <div style="height:30px;background-color:white;">
        <label class="font-header-menu">Master Jurnal Link</label>
      </div>
      <div style="height:40px; padding:4px; background:#daeef5; border:none;">
        <a id="btn_simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save', plain:false">Simpan</a>
      </div>
    </div>
    <div data-options="region:'center',">
      <table id="table_data" idField="idsopir"></table>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('assets/jquery-easyui/extra/plugins/jquery.datagrid-groupview.js') }}"></script>
  <script>
    $(document).ready(function() {
      buat_table();
      tutupLoader();
      $("#btn_simpan").on("click", function() {
        simpan();
      });
    });


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

      var rows = $('#table_data').datagrid('getRows');

      for (var i = 0; i < rows.length; i++) {
        if (rows[i].digunakan == 1) {
          if (rows[i].kodeperkiraan == '' || rows[i].kodeperkiraan == null) {
            $.messager.alert('Error', 'Pengaturan untuk ' + rows[i].transaksi + ' - ' + rows[i].jenis + ' belum diisi',
              'error');

            return false;
          }
        }
      }

      mode = $('[name=mode]').val();
      try {
        tampilLoaderSimpan();
        const response = await fetchData(link_api.simpanJurnalLink, {
          data_detail: $('#table_data').datagrid('getRows')
        });
        tutupLoaderSimpan();
        if (response.success) {
          $('#table_data').datagrid('reload');
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        tutupLoaderSimpan();
        $.messager.alert('Error', 'Terjadi kesalahan saat menyimpan data', 'error');
      }

    }

    function buat_table() {
      $('#table_data').datagrid({
        fit: true,
        RowAdd: false,
        RowDelete: false,
        showGroup: true,
        singleSelect: true,
        url: link_api.loadAllJurnalLink,
        view: groupview,
        groupField: 'transaksi',
        groupFormatter: function(value, rows) {
          return value;
        },
        rowStyler: function(index, row) {
          if (row.status == 0) return 'background-color:#a8aea6';
        },
        columns: [
          [{
              field: 'uuidperkiraan',
              hidden: true
            },
            {
              field: 'jenis',
              title: 'Jenis',
              width: 150,
            },
            {
              field: 'kodeperkiraan',
              title: 'Kode',
              width: 100,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 530,
                  mode: 'remote',
                  idField: 'kode',
                  textField: 'kode',
                  url: link_api.browsePerkiraan,
                  onBeforeLoad: function(param) {
                    param.jenis = 'detail';
                    param.aktif = 1;
                  },
                  columns: [
                    [{
                        field: 'kode',
                        title: 'Kode',
                        width: 110
                      },
                      {
                        field: 'nama',
                        title: 'Nama',
                        width: 400
                      },
                    ]
                  ],
                }
              }
            },
            {
              field: 'namaperkiraan',
              title: 'Nama',
              width: 250,
            },
            {
              field: 'saldo',
              title: 'Saldo',
              width: 80,
              align: 'center'
            },
            {
              field: 'digunakan',
              title: 'Digunakan',
              align: 'center',
              formatter: function(val, row, index) {
                return `<input onchange="ubahCheckboxDigunakan(${index})" type="checkbox" ' +  id="cb_${index}" ${row.digunakan == 1 ? 'checked' : ''}>`;
              }
            }
          ]
        ],
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data', index, field);

          switch (field) {
            case 'kodeperkiraan':
              ed.combogrid('showPanel');
              break;
          }
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data', index, cell.field);
          var row_update = {};

          switch (cell.field) {
            case 'kodeperkiraan':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var nama = data ? data.nama : '';

              row_update = {
                namaperkiraan: nama,
                digunakan: 0
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
      }).datagrid('enableCellEditing');
    }

    function ubahCheckboxDigunakan(index) {
      var checkbox = $(`#cb_${index}`);
      var checked = checkbox.prop('checked');
      var digunakan = (checked ? 1 : 0);
      var row = {
        digunakan: digunakan
      };

      if (checked == false) {
        row.kodeperkiraan = '';
        row.namaperkiraan = '';
      }

      $('#table_data').datagrid('updateRow', {
        index: index,
        row: row
      })
    }
  </script>
@endpush
