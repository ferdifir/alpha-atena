@extends('template.app')

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
      <div id="tab_transaksi" class="easyui-tabs" style="width:100%;height:100%;">
        <div title="Grid" id="Grid">
          <div class="easyui-layout" style="width:100%;height:100%" fit="true">
            <div data-options="region:'center',">
              <table id="table_data" idField="kodeekspedisi"></table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    var counter = 0;

    $(document).ready(function() {
      tutupLoader();
      $("#table_data").datagrid({
        onSelect: function() {
          row = $('#table_data').datagrid('getSelected');
        }
      });

      buat_table();
    });

    shortcut.add('F2', function() {
      before_add();
    });
    shortcut.add('F4', function() {
      before_edit();
    });

    function before_add() {
      $('#mode').val('tambah');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        if (data.data.tambah == 1) {
          counter++;
          var tab_title = 'Tambah';
          var tab_name = tab_title + "_" + counter;
          parent.buka_submenu(null, 'Tambah Ekspedisi',
            '{{ route('atena.master.ekspedisi.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
            'fa fa-plus')
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function before_edit() {
      $('#mode').val('ubah');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        if (data.data.ubah == 1 || data.data.hakakses == 1) {
          counter++;
          const row = $('#table_data').datagrid('getSelected');
          parent.buka_submenu(null, row.namaekspedisi,
            '{{ route('atena.master.ekspedisi.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' + row
            .uuidekspedisi,
            'fa fa-pencil');
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function before_delete() {
      $('#mode').val('hapus');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        if (data.data.hapus == 1) {
          hapus();
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
        throw error;
      }
    }


    async function hapus() {
      if (row) {
        $.messager.confirm('Confirm', 'Anda Yakin Menghapus Data Ini ?', async function(r) {
          if (r) {
            try {
              bukaLoader();
              const response = await fetchData(link_api.hapusEkspedisi, {
                uuidekspedisi: row.uuidekspedisi
              })
              tutupLoader();
              if (response.success) {
                refresh_data();
              } else {
                $.messager.alert('Error', response.message, 'error');
              }
            } catch (error) {
              console.log(error);
              tutupLoader();
              $.messager.alert('Error',
                'Terdapat kesalahan ketika menghapus data ekspedisi, silahkan muat ulang laman',
                'error');
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
        url: link_api.loadDataGridMasterEkspedisi,
        rowStyler: function(index, row) {
          if (row.status == 0) return 'background-color:#a8aea6';
        },
        onLoadSuccess: function(data) {
          $('#table_data').datagrid('unselectAll');
        },
        frozenColumns: [
          [{
              field: 'uuidekspedisi',
              hidden: true
            },
            {
              field: 'kodeekspedisi',
              title: 'Kode',
              width: 80,
              sortable: true,
            },
            {
              field: 'namaekspedisi',
              title: 'Nama',
              width: 200,
              sortable: true,
            },
          ]
        ],
        columns: [
          [{
              field: 'alamat',
              title: 'Alamat',
              width: 250,
              sortable: true,
            },
            {
              field: 'kota',
              title: 'Kota',
              width: 130,
              sortable: true,
            },
            {
              field: 'propinsi',
              title: 'Propinsi',
              width: 130,
              sortable: true,
            },
            {
              field: 'negara',
              title: 'Negara',
              width: 130,
              sortable: true,
            },
            {
              field: 'kodepos',
              title: 'Kode Pos',
              width: 80,
              sortable: true,
            },
            {
              field: 'telp',
              title: 'Telp',
              width: 100,
              sortable: true,
            },
            {
              field: 'fax',
              title: 'Fax',
              width: 100,
              sortable: true,
            },
            {
              field: 'email',
              title: 'E-Mail',
              width: 100,
              sortable: true,
            },
            {
              field: 'website',
              title: 'Website',
              width: 100,
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
              width: 80,
              sortable: true
            },
            {
              field: 'tglentry',
              title: 'Tgl. Input',
              width: 120,
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
      }).datagrid('enableFilter', [
        {
          field: 'tglentry',
          type: 'datebox',
          options: {
            onChange: function(value) {
              if (value) {
                console.log(value);
                $('#table_data').datagrid('addFilterRule', {
                  field: 'tglentry',
                  op: 'contains',
                  value: value.trim(),
                });
              } else {
                $('#table_data').datagrid('removeFilterRule', 'tglentry');
              }
              $('#table_data').datagrid('doFilter');
            }
          }
        },
        {
          field: 'status',
          type: 'combobox',
          options: {
            data: [{
              value: '',
              text: 'All'
            }, {
              value: "1",
              text: 'Aktif'
            }, {
              value: "0",
              text: 'Non-aktif'
            }],
            onChange: function(value) {
              if (value == '') {
                $('#table_data').datagrid('removeFilterRule', 'status');
              } else {
                $('#table_data').datagrid('addFilterRule', {
                  field: 'status',
                  op: 'equal',
                  value: value
                });
              }
              $('#table_data').datagrid('doFilter');
            }
          }
        },
      ]);
    }

    function refresh_data() {
      $('#table_data').datagrid('reload');
    }

    function reload() {
      refresh_data();
    }
  </script>
@endpush
