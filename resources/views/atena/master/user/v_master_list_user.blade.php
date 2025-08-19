@extends('template.app')

@section('content')
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
      <div id="tab_transaksi" class="easyui-tabs" style="width:100%;height:100%;">
        <div title="Grid" id="Grid">
          <div class="easyui-layout" style="width:100%;height:100%" fit="true">
            <div data-options="region:'center',">
              <table id="table_data" idField="userid"></table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script type="text/javascript" src="{{ asset('assets/js/globalVariable.js') . '?v=' . time() }}"></script>
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

    function hapus() {
      if (row) {
        $.messager.confirm('Confirm',
          'User Yang Terhapus Tidak Dapat Digunakan Kembali,<br>Anda Yakin Akan Menghapus Data Ini?',
          function(r) {
            if (r) {
              $.post(base_url + 'atena/master/user/hapus', {
                uuiduser: row.uuiduser
              }, function(msg) {
                if (msg.success) {
                  refresh_data();
                } else {
                  $.messager.alert('Error', msg.errorMsg, 'error');
                }
              }, 'json');
            }
          });
      }
    }

    function refresh_data() {
      $('#table_data').datagrid('reload');
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
        url: link_api.loadDataGridMasterUser,
        rowStyler: function(index, row) {
          if (row.status == 0) return 'background-color:#a8aea6';
        },
        frozenColumns: [
          [{
              field: 'uuiduser',
              title: 'User ID',
              width: 220,
              sortable: true,
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
      }).datagrid('enableFilter');
    }
  </script>
@endpush
