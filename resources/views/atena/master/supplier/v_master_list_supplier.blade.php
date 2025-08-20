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
      <a id="btn_import" title="Impor Data" class="easyui-linkbutton easyui-tooltip" onclick="tampilDialogImport()">
        <img src="{{ asset('assets/images/import_excel.png') }}">
      </a>
    </div>
    <div data-options="region: 'center'">
      <div id="tab_transaksi" class="easyui-tabs" style="width:100%;height:100%;">
        <div title="Grid" id="Grid">
          <div class="easyui-layout" style="width:100%;height:100%" fit="true">
            <div data-options="region:'center',">
              <table id="table_data" idField="kodesupplier"></table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="dialog_import" class="easyui-window" style="width: 400px;height: 150px;padding: 10px; display: none"
    title="Import Data Supplier" hidden>
    <input id="btn_import" id="fileexcel" name="fileexcel" class="easyui-filebox"
      data-options="required: false,buttonIcon: 'icon-excel',buttonText: 'Pilih File Excel'"
      style="width: 300px; height: 30px" accept=".xls">

    <br><br>

    <a title="Impor Data" class="easyui-linkbutton easyui-tooltip" onclick="importData()">
      Import
    </a>

    <a title="Download Template Excel" class="easyui-linkbutton easyui-tooltip" onclick="downloadTemplateExcel()">
      Download Template Excel
    </a>
  </div>
@endsection

@push('js')
  <script>
    var counter = 0;

    $(document).ready(function() {
      $('#dialog_import').window('close');
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
          parent.buka_submenu(null, 'Tambah Pemasok',
            '{{ route('atena.master.supplier.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
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
          parent.buka_submenu(null, row.namasupplier,
            '{{ route('atena.master.supplier.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' + row
            .uuidsupplier,
            'fa fa-pencil');
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function before_delete() {
      $('#mode').val('hapus');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        tutupLoader();
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
        throw error; // Melemparkan kembali error agar bisa ditangkap oleh pemanggil
      }
    }

    async function hapus() {
      if (row) {
        $.messager.confirm('Confirm', 'Anda Yakin Menghapus Data Ini ?', async function(r) {
          if (r) {
            const response = await fetchData(link_api.hapusSupplier, {
              uuidsupplier: row.uuidsupplier
            })
            if (response.success) {
              refresh_data(); // reload the user data
            } else {
              $.messager.alert('Error', response.message, 'error');

            }
          }
        });
      } else {
        $.messager.alert('Warning', 'Anda Belum Memilih Data', 'warning');
      }
    }

    function buat_table() {
      $('#table_data').datagrid({
        remoteFilter: true,
        fit: true,
        singleSelect: true,
        striped: true,
        pagination: true,
        clientPaging: false,
        pageSize: 20,
        url: link_api.loadDataGridMasterSupplier,
        onBeforeLoad: function(param) {
          console.log(param);
        },
        onLoadSuccess: function(data) {
          $('#table_data').datagrid('unselectAll');
        },
        rowStyler: function(index, row) {
          if (row.status == 0) return 'background-color:#a8aea6';
        },
        frozenColumns: [
          [{
              field: 'uuidsupplier',
              hidden: true
            },
            {
              field: 'kodesupplier',
              title: 'Kode',
              width: 80,
              sortable: true,
            },
            {
              field: 'badanusaha',
              title: 'Badan Usaha',
              width: 100,
              sortable: true,
            },
            {
              field: 'namasupplier',
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
              field: 'namabank',
              title: 'Bank',
              width: 100,
              sortable: true,
            },
            {
              field: 'norekening',
              title: 'Rekening',
              width: 100,
              sortable: true,
            },
            {
              field: 'namabeneficiary',
              title: 'Beneficiary',
              width: 100,
              sortable: true,
            },
            {
              field: 'swiftcode',
              title: 'Swift Code',
              width: 100,
              sortable: true,
            },
            {
              field: 'alamatbank',
              title: 'Alamat Bank',
              width: 100,
              sortable: true,
            },
            {
              field: 'nomorrouting',
              title: 'Nomor Routing',
              width: 100,
              sortable: true,
            },
            {
              field: 'negarabank',
              title: 'Negara Bank',
              width: 100,
              sortable: true,
            },
            {
              field: 'contactperson',
              title: 'Contact Person',
              width: 100,
              sortable: true,
            },
            {
              field: 'telpcp',
              title: 'CP Telp',
              width: 100,
              sortable: true,
            },
            {
              field: 'emailcp',
              title: 'CP E-Mail',
              width: 100,
              sortable: true,
            },
            {
              field: 'namasyaratbayar',
              title: 'Syarat Bayar',
              width: 100,
              sortable: true,
            },
            {
              field: 'npwp',
              title: 'NPWP',
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
      }).datagrid('enableFilter');
    }

    function refresh_data() {
      $('#table_data').datagrid('reload');
    }

    function reload() {
      refresh_data()
    }

    function tampilDialogImport() {
      $('#dialog_import').window('open');
    }

    function importData() {
      var el = $('input[name=fileexcel]').eq(0);

      // mendapatkan file dari inputan
      var file = el.prop('files')[0];
      var form_data = new FormData();

      // mereset input file
      el.val(null);

      el.prev().val('');

      // menyisipkan data untuk dikirim
      form_data.append('fileexcel', file);

      $.ajax({
        type: 'POST',
        url: base_url + 'atena/Master/Data/Supplier/importData', // cek jika sudah ada API
        data: form_data,
        contentType: false,
        processData: false,
        beforeSend: function(xhr) {
          $.messager.progress();
        },
        success: function(response) {
          $.messager.progress('close');

          if (response.success) {
            $.messager.alert('Berhasil', 'Berhasil mengimpor data supplier');

            refresh_data();

            $('#dialog_import').window('close');
          } else {
            $.messager.alert('Gagal', response.message);
          }
        }
      });
    }

    function downloadTemplateExcel() {
      window.open("{{ asset('assets/files/excel/template_supplier.xls') }}");
    }
  </script>
@endpush
