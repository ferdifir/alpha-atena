@extends('template.app')

@section('content')
  <div class="easyui-layout" fit="true">
    <div class="btn-group-transaksi" data-options="region: 'west'" style="width: 50px">
      <a id="btn_tambah" title="Tambah" class="easyui-linkbutton easyui-tooltip" onclick="before_add()">
        <img src="{{ asset('assets/images/add.png') }}">
      </a>
      <a id="btn_hapus" title="Hapus" class="easyui-linkbutton easyui-tooltip" onclick="before_delete()">
        <img src="{{ asset('assets/images/cancel.png') }}">
      </a>
      <a id="btn_refresh" title="Refresh Data" class="easyui-linkbutton easyui-tooltip" onclick="refresh_data()">
        <img src="{{ asset('assets/images/refresh.png') }}">
      </a>
    </div>
    <div data-options="region: 'center'">
      <div id="tab_transaksi" class="easyui-tabs" style="width:100%;height:100%;">
        <div title="List Servis" id="Grid">
          <div class="easyui-layout" style="width:100%;height:100%" fit="true">
            <div data-options="region:'center',">
              <table id="table_data"></table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('assets/jquery-easyui/extension/datagrid-filter/datagrid-filter.js') }}"></script>
  <script>
    var counter = 0;

    function disable_button() {
      $('#btn_refresh').linkbutton('disable');
      $('#btn_hapus').linkbutton('disable');
    }

    function enable_button() {
      $('#btn_refresh').linkbutton('enable');
      $('#btn_hapus').linkbutton('enable');
    }

    $(document).ready(function() {
      $("#table_data").datagrid({
        onSelect: function() {
          row = $('#table_data').datagrid('getSelected');
        }
      });

      //PRINT TAB
      $("#tab_transaksi").tabs({
        onSelect: function() {
          var tab_title = $('#tab_transaksi').tabs('getSelected').panel('options').title;

          if (tab_title == 'Grid') {
            enable_button();
          } else if (tab_title == 'Tambah') {
            disable_button();
          } else {
            //AMBIL IDTRANS LEBIH DARI IDTAB
            var trans = $('#tab_transaksi').tabs('getSelected').panel('options').id.split("|");
            //Variabel ROW diisi array object
            row = {
              uuidservis: trans[0],
              kodeservis: trans[1]
            };

            disable_button();
          }
        }
      });

      buat_table();
      tutupLoader();
    });

    shortcut.add('F2', function() {
      before_add();
    });

    shortcut.add('F4', function() {
      before_edit();
    });

    function before_add() {
      $('#mode').val('tambah');

      get_akses_user('{{ $kodemenu }}', 'Bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.tambah == 1) {
          parent.buka_submenu(null, 'Tambah Servis',
            '{{ route('atena.master.servis.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
            'fa fa-plus');
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function before_edit() {
      $('#mode').val('ubah');
      get_akses_user('{{ $kodemenu }}', 'Bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.ubah == 1 || data.hakakses == 1) {
          const kode = row.kodeservis;
          parent.buka_submenu(null, kode,
            '{{ route('atena.master.servis.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' + row
            .uuidservis,
            'fa fa-edit');
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function before_delete() {
      $('#mode').val('hapus');

      get_akses_user('{{ $kodemenu }}', 'Bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.hapus == 1) {
          hapus();
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function hapus() {
      if (row) {
        $.messager.confirm('Confirm', 'Anda Yakin Menghapus Data Ini ?', async function(r) {
          if (r) {
            try {
              const res = await fetch(
                link_api.hapusServis, {
                  method: 'POST',
                  headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer {{ session('TOKEN') }}'
                  },
                  body: JSON.stringify({
                    uuidservis: row.uuidservis,
                    kodeservis: row.kodeservis
                  })
                }
              );

              if (!res.ok) throw 'Gagal Menghapus Data';

              const response = await res.json();

              if (response.success) {
                refresh_data();
              } else {
                $.messager.alert('Error', response.message, 'error');
              }
            } catch (e) {
              const error = (typeof e === 'string') ? e : e.message;
              const textError = getTextError(error);
              $.messager.alert('Error', textError, 'error');
            }
          }
        });
      }
    }

    function buat_table() {
      $('#table_data').datagrid({
        remoteFilter: true,
        fit: true,
        singleSelect: true,
        striped: true,
        pagination: true,
        pageSize: 20,
        clientPaging: false,
        url: link_api.loadDataGridServis,
        rowStyler: function(index, row) {
          if (row.status == 0) return 'background-color:#a8aea6';
        },
        frozenColumns: [
          [{
              field: 'uuidservis',
              hidden: true
            },
            {
              field: 'kodeservis',
              title: 'Kode',
              width: 80,
              sortable: true,
            },
            {
              field: 'namaservis',
              title: 'Nama',
              width: 200,
              sortable: true,
            },
          ]
        ],
        columns: [
          [{
              field: 'harga',
              title: 'Harga',
              width: 100,
              sortable: true,
              formatter: format_amount,
              align: 'right',
            },
            {
              field: 'kodeperkiraanpendapatan',
              title: 'Akun Pendapatan',
              width: 100,
              sortable: true,
            },
            {
              field: 'namaperkiraanpendapatan',
              title: 'Perkiraan Pendapatan',
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
              width: 75,
              sortable: true
            },
            {
              field: 'tglentry',
              title: 'Tgl. Input',
              width: 75,
              sortable: true,
              formatter: ubah_tgl_indo,
              align: 'center',
            },
            {
              field: 'status',
              title: 'Aktif',
              align: 'center',
              sortable: true,
              formatter: format_checked,
            }
          ]
        ],
        onDblClickRow: function(index, row) {
          before_edit();
        },
      }).datagrid('enableFilter');
    }

    function refresh_data() {
      $('#table_data').datagrid('reload');
    }

    function reload() {
      $('#table_data').datagrid('reload');
    }
  </script>
@endpush
