@extends('template.app')

@section('content')
  <div class="easyui-layout" fit="true">
    <div class="btn-group-transaksi" data-options="region: 'west'" style="width: 50px;">
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
        <div title="List Promo" id="Grid">
          <div class="easyui-layout" style="width:100%;height:100%" fit="true">
            <div data-options="region:'center',">
              <table id="table_data" idField="idpromo"></table>
            </div>
          </div>
        </diV>
      </div>
    </div>
  </div>

  <form method="post" action="" target="Form" id="form_data_cekpromo">
  </form>
@endsection

@push('js')
  <script>
    var counter = 0;

    function disable_button() {
      $('#btn_refresh').linkbutton('disable');
      $('#btn_hapus').linkbutton('disable');
    }

    $(document).ready(function() {
      //WAKTU BATAL DI GRID, tidak bisa close
      //PRINT GRID
      $("#table_data").datagrid({
        onSelect: function() {
          row = $('#table_data').datagrid('getSelected');
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
    shortcut.add('F8', function() {
      simpan();
    });

    function before_add() {
      $('#mode').val('tambah');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.tambah == 1) {
          counter++;
          var tab_title = 'Tambah';
          var tab_name = tab_title + "_" + counter;
          parent.buka_submenu(null, 'Tambah Promo',
            '{{ route('atena.master.promo.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
            'fa fa-plus')
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function tampil_form_cekpromo() {
      $('#mode').val('tambah');

      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        counter++;

        var tab_title = 'Cek Promo';
        var tab_name = tab_title + "_" + counter;

        $('#form_data_cekpromo').attr('target', tab_name);

        $('#tab_transaksi').tabs('add', {
          title: tab_title,
          content: '<iframe frameborder="0" class="tab_form"  id="' + counter + '" name="' + tab_name +
            '"></iframe>',
          closable: true
        });

        disable_button();

        $('#form_data_cekpromo').submit();
      });
    }

    function before_edit() {
      $('#mode').val('ubah');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.ubah == 1 || data.hakakses == 1) {
          counter++;
          const row = $('#table_data').datagrid('getSelected');
          parent.buka_submenu(null, row.namapromo,
            '{{ route('atena.master.promo.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' + row
            .uuidpromo,
            'fa fa-pencil');
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function before_delete() {
      $('#mode').val('hapus');

      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.hapus == 1) {
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
        throw error; // Melemparkan kembali error agar bisa ditangkap oleh pemanggil
      }
    }

    function hapus() {
      if (row) {
        $.messager.confirm('Confirm', 'Anda Yakin Menghapus Data Ini ?', async function(r) {
          if (r) {
            console.log(row);
            try {
              bukaLoader();
              const response = await fetchData(link_api.hapusPromo, {
                uuidpromo: row.uuidpromo,
                kodepromo: row.kodepromo
              });
              tutupLoader();
              if (response.success) {
                refresh_data();
              } else {
                $.messager.alert('Error', response.message, 'error');
              }
            } catch (error) {
              tutupLoader();
              const e = (typeof error === 'string') ? error : error.message;
              var textError = getTextError(e);
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
        url: link_api.loadDataGridPromo,
        rowStyler: function(index, row) {
          if (row.status == 0) return 'background-color:#a8aea6';
        },
        onLoadSuccess: function(data) {
          $('#table_data').datagrid('unselectAll');
        },
        columns: [
          [{
              field: 'uuidpromo',
              hidden: true
            },
            {
              field: 'kodepromo',
              title: 'Kode',
              width: 80,
              sortable: true,
            },
            {
              field: 'namapromo',
              title: 'Nama',
              width: 150,
              sortable: true,
            },
            {
              field: 'jenisitem',
              title: 'Jenis Item',
              width: 150,
              sortable: true,
              formatter: function(value) {
                if (value == 1) {
                  return 'DETIL PER MASING-MASING ITEM';
                }

                if (value == 2) {
                  return 'ITEM DIGABUNG';
                }
              }
            },
            {
              field: 'kodesupplier',
              title: 'Kode Supplier',
              width: 100,
              sortable: true,
              align: 'center'
            },
            {
              field: 'namasupplier',
              title: 'Supplier',
              width: 200,
              sortable: true,
            },
            {
              field: 'tglawal',
              title: 'Tgl. Awal',
              width: 100,
              align: 'center'
            },
            {
              field: 'tglakhir',
              title: 'Tgl. Akhir',
              width: 100,
              align: 'center'
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
              width: 80,
              formatter: format_checked,
            }
          ]
        ],
        onDblClickRow: function(index, row) {
          before_edit();
        },
      }).datagrid('enableFilter', [
        dateFilter('tglawal'),
        dateFilter('tglakhir'),
        dateFilter('tglentry'),
        statusFilter('status'),
        statusFilter('jenisitem', [{
          value: '',
          text: 'All'
        }, {
          value: '1',
          text: 'DETIL PER MASING-MASING ITEM'
        }, {
          value: '2',
          text: 'ITEM DIGABUNG'
        }]),
      ]);
    }

    function dateFilter(field) {
      const dg = $('#table_data');
      return {
        field: field,
        type: 'datebox',
        options: {
          onChange: function(value) {
            if (value) {
              dg.datagrid('addFilterRule', {
                field: field,
                op: 'contains',
                value: value.trim(),
              });
            } else {
              dg.datagrid('removeFilterRule', field);
            }
            dg.datagrid('doFilter');
          }
        }
      };
    }

    function statusFilter(field, data) {
      if (!data) {
        data = [{
            value: '',
            text: 'All'
          },
          {
            value: '1',
            text: 'Aktif'
          },
          {
            value: '0',
            text: 'Non-aktif'
          }
        ];
      }
      const dg = $('#table_data');
      return {
        field: field,
        type: 'combobox',
        options: {
          data: data,
          onChange: function(value) {
            if (value === '') {
              dg.datagrid('removeFilterRule', field);
            } else {
              dg.datagrid('addFilterRule', {
                field: field,
                op: 'equal',
                value: value
              });
            }
            dg.datagrid('doFilter');
          }
        }
      };
    }

    function refresh_data() {
      $('#table_data').datagrid('reload');
    }

    function simpanTab(mode, msg) {
      if (msg.success) {

        if (mode == 'tambah') {
          $.messager.show({
            title: 'Info',
            msg: 'Simpan Data Sukses',
            showType: 'show'
          });

        } else {
          //tutup tab dan refresh data di function
          $.messager.alert('Info', 'Simpan Data Sukses', 'info');
        }

        //DAPATKAN TAB dan INDEXNYA untuk DIHAPUS
        var tab = $('#tab_transaksi').tabs('getSelected');
        var index = $('#tab_transaksi').tabs('getTabIndex', tab);
        $('#tab_transaksi').tabs('close', index);

        $('#table_data').datagrid('reload');
      } else {
        $.messager.alert('Error', msg.message, 'error');
      }

    }

    function reload() {
      //PELU BUAT SIMPEN INDEX
      var row = $('#table_data').datagrid('getSelected');

      if ($('#tab_transaksi').tabs('getSelected').panel('options').title == "Ubah") {
        //INDEX TAB
        var tab_name = $('#tab_transaksi').tabs('getSelected').panel('options').title;

        //ROW ID dan KODE
        var trans = $('#tab_transaksi').tabs('getSelected').panel('options').id.split("|");
        var counterTambah = trans[2];
        tab_name = tab_name + "_" + counterTambah;

        $("#mode").val("ubah");
        $("#data").val(trans[0]);

        var tab = $('#tab_transaksi').tabs('getSelected');
        var tabIndex = $('#tab_transaksi').tabs('getTabIndex', tab);
        var tabTrans = $('#tab_transaksi').tabs('getTab', tabIndex);
        var tab_title = 'Ubah';
        $('#form_data').attr('target', tab_name);

        $('#tab_transaksi').tabs('update', {
          tab: tabTrans,
          type: 'header',
          options: {
            title: tab_title,
            content: '<iframe frameborder="0"  class="tab_form" id="' + counterTambah + '" name="' + tab_name +
              '" ></iframe>',
            closable: true
          }
        });

        $('#form_data').submit();
      }

      $('#table_data').datagrid('reload');
    }
  </script>
@endpush
