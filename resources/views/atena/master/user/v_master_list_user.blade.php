@extends('template.app')

@push('css')
  <style>
    .tree-icon {
      display: none;
    }

    .datagrid-row input[type=checkbox] {
      /* Double-sized Checkboxes */
      -ms-transform: scale(1.15);
      /* IE */
      -moz-transform: scale(1.15);
      /* FF */
      -webkit-transform: scale(1.15);
      /* Safari and Chrome */
      -o-transform: scale(1.15);
      /* Opera */
      transform: scale(1.15);
    }
  </style>
@endpush

@section('content')
  <div class="easyui-layout" fit="true">
    <div class="btn-group-transaksi" data-options="region: 'west'" style="width: 50px">
      <a id="btn_tambah" href="#" title="Tambah" class="easyui-linkbutton easyui-tooltip" onclick="before_add()">
        <img src="{{ asset('assets/images/add.png') }}">
      </a>
      <a id="btn_hapus" href="#" title="Hapus" class="easyui-linkbutton easyui-tooltip" onclick="before_delete()">
        <img src="{{ asset('assets/images/cancel.png') }}">
      </a>
      <a id="btn_refresh" href="#" title="Refresh Data" class="easyui-linkbutton easyui-tooltip"
        onclick="refresh_data()">
        <img src="{{ asset('assets/images/refresh.png') }}">
      </a>
    </div>

    <div data-options="region: 'center'">
      <div class="easyui-layout" style="width:100%;height:100%" fit="true">
        <div data-options="region:'center',">
          <table id="table_data" idField="userid"></table>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    var counter = 0;

    shortcut.add('F2', function() {
      before_add();
    });
    shortcut.add('F4', function() {
      before_edit();
    });

    function before_add() {
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        if (data.success && data.data.tambah == 1) {
          counter++;
          var tab_title = 'Tambah';
          var tab_name = tab_title + "_" + counter;
          parent.buka_submenu(null, 'Tambah User',
            '{{ route('atena.master.user.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
            'fa fa-plus')
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function before_delete() {
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        if (data.success && data.data.hapus == 1) {
          hapus();
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function before_edit() {
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        if (data.data.ubah == 1 || data.data.hakakses == 1) {
          counter++;
          const row = $('#table_data').datagrid('getSelected');
          parent.buka_submenu(null, row.username,
            '{{ route('atena.master.user.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' + row.uuiduser,
            'fa fa-pencil');
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
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

    async function hapus() {
      if (row) {
        $.messager.confirm('Confirm',
          'User Yang Terhapus Tidak Dapat Digunakan Kembali,<br>Anda Yakin Akan Menghapus Data Ini?',
          async function(r) {
            if (r) {
              try {
                bukaLoader();
                const res = await fetchData(link_api.hapusUser, {
                  uuiduser: row.uuiduser
                });
                tutupLoader();
                if (res.success) {
                  refresh_data();
                } else {
                  $.messager.alert('Error', res.message, 'error');
                }
              } catch (e) {
                tutupLoader();
                console.log(e);
                const error = (typeof e === 'string') ? e : e.message;
                const textError = getTextError(error);
                $.messager.alert('Error', textError, 'error');
              }
            }
          });
      }
    }

    function refresh_data() {
      let pager = $('#table_data').datagrid('getPager');
      let pageOptions = pager.pagination('options');
      let currentPage = pageOptions.pageNumber;
      $('#table_data').datagrid('reload', {
        page: currentPage
      });
    }

    $(function() {
      $("#table_data").datagrid({
        onSelect: function() {
          row = $('#table_data').datagrid('getSelected');
        }
      });
      buat_table();
      tutupLoader();
    })

    function buat_table() {
      $('#table_data').datagrid({
        remoteFilter: true,
        fit: true,
        singleSelect: true,
        striped: true,
        pagination: true,
        pageSize: 20,
        clientPaging: false,
        url: link_api.loadDataGridMasterUser,
        rowStyler: function(index, row) {
          if (row.status == 0) return 'background-color:#a8aea6';
        },
        onLoadSuccess: function(data) {
          $('#table_data').datagrid('unselectAll');
        },
        frozenColumns: [
          [{
              field: 'uuiduser',
              title: 'User ID',
              width: 220,
              sortable: true,
              hidden: true
            },
            {
              field: 'username',
              title: 'Nama User',
              width: 200,
              sortable: true,
            },
          ]
        ],
        columns: [
          [{
              field: 'hp',
              title: 'No HP',
              width: 100,
              sortable: true,
            },
            {
              field: 'email',
              title: 'E-Mail',
              width: 200,
              sortable: true,
            },
            {
              field: 'catatan',
              title: 'Catatan',
              width: 250,
              sortable: true,
            },
            {
              field: 'userbuat',
              title: 'User Entry',
              width: 70,
              sortable: true
            },
            {
              field: 'tglentry',
              title: 'Tgl Input',
              width: 120,
              sortable: true,
              formatter: ubah_tgl_indo,
              align: 'center',
            },
          ]
        ],
        onDblClickRow: function(index, row) {
          before_edit();
        },
      }).datagrid('enableFilter', [{
          field: 'tglentry',
          type: 'datebox',
          options: {
            onChange: function(value) {
              if (value) {
                console.log(value);
                dg.datagrid('addFilterRule', {
                  field: 'tglentry',
                  op: 'contains',
                  value: value.trim(),
                });
              } else {
                dg.datagrid('removeFilterRule', 'tglentry');
              }
              dg.datagrid('doFilter');
            }
          }
        }, {
          field: 'hp',
          type: 'numberbox',
          options: {
            onChange: function(value) {
              if (value == 0) {
                dg.datagrid('removeFilterRule', 'hp');
              } else {
                dg.datagrid('addFilterRule', {
                  field: 'hp',
                  op: 'contains',
                  value: value
                });
              }
              dg.datagrid('doFilter');
            }
          }
        },

      ]);
    }
  </script>
@endpush
