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
        <div title="List Pelanggan" id="Grid">
          <div class="easyui-layout" style="width:100%;height:100%" fit="true">
            <div data-options="region:'center',">
              <table id="table_data" idField="kodecustomer"></table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="dialog_import" class="easyui-window" style="width: 400px;height: 150px;padding: 10px; display: none"
    title="Import Data Customer" hidden>
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
    var kodecustomer;
    var rowEdit;
    var counter = 0;


    $(document).ready(function() {
      $('#dialog_import').window('close');
      tutupLoader();

      //WAKTU BATAL DI GRID, tidak bisa close
      //PRINT GRID
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
          parent.buka_submenu(null, 'Tambah Pelanggan',
            '{{ route('atena.master.customer.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
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
          parent.buka_submenu(null, row.namacustomer,
            '{{ route('atena.master.customer.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' + row
            .uuidcustomer,
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
        throw error; // Melemparkan kembali error agar bisa ditangkap oleh pemanggil
      }
    }

    function hapus() {
      if (row) {
        $.messager.confirm('Confirm', 'Anda Yakin Menghapus Data Ini ?', async function(r) {
          if (r) {
            try {
              bukaLoader();
              const response = await fetchData(link_api.hapusCustomer, {
                uuidcustomer: row.uuidcustomer
              });
              tutupLoader();
              if (!response.success) {
                $.messager.alert('Error', response.message, 'error');
              } else {
                refresh_data();
              }
            } catch (error) {
              tutupLoader();
              console.log(error);
              const e = (typeof error === 'string') ? error : error.message;
              var textError = getTextError(e);
              $.messager.alert('Error', textError, 'error');
            }
          }
        });
      }
    }

    async function buat_table() {
      var dg = $('#table_data').datagrid({
        remoteFilter: true,
        fit: true,
        singleSelect: true,
        striped: true,
        pagination: true,
        clientPaging: false,
        pageSize: 20,
        sortName: 'namacustomer',
        sortOrder: 'asc',
        url: link_api.loadDataGridMasterCustomer,
        detailFormatter: function(index, row) {
          return '<div style="padding:2px;position:relative;"><table class="ddv"></table></div>';
        },
        rowStyler: function(index, row) {
          if (row.status == 0) return 'background-color:#a8aea6';
        },
        onLoadSuccess: function(data) {
          $('#table_data').datagrid('unselectAll');
        },
        columns: [
          [{
              field: 'uuidcustomer',
              hidden: true
            },
            {
              field: 'kodecustomer',
              title: 'Kode',
              width: 60,
              sortable: true,
            },
            {
              field: 'badanusaha',
              title: 'Badan Usaha',
              width: 100,
              sortable: true,
            },
            {
              field: 'namacustomer',
              title: 'Nama',
              width: 180,
              sortable: true,
            },
            {
              field: 'namafakturpajak',
              title: 'Nama Faktur Pajak.',
              width: 200,
              sortable: true,
            },
            {
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
              field: 'namamarketing',
              title: 'Marketing',
              width: 100,
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
              title: 'Telp.',
              width: 100,
              sortable: true,
            },
            {
              field: 'hp',
              title: 'No HP',
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
              field: 'contactperson',
              title: 'Contact Person',
              width: 110,
              sortable: true,
            },
            {
              field: 'telpcontactperson',
              title: 'Telp CP.',
              width: 100,
              sortable: true,
            },
            {
              field: 'emailcontactperson',
              title: 'CP E-Mail',
              width: 100,
              sortable: true,
            },
            // {
            //   field: 'namasyaratbayar',
            //   title: 'Syarat Bayar',
            //   width: 100,
            //   sortable: true,
            // },
            {
              field: 'namasopir',
              title: 'Sopir',
              width: 100,
              sortable: true,
            },
            {
              field: 'maxcredit',
              title: 'Batas Piutang',
              width: 100,
              sortable: true,
              align: 'right',
              formatter: format_amount,
            },
            {
              field: 'discountmin',
              title: 'Disc Min',
              width: 50,
              sortable: true,
              align: 'right',
            },
            {
              field: 'discountmax',
              title: 'Disc Max',
              width: 50,
              sortable: true,
              align: 'right',
            },
            {
              field: 'alamatfakturpajak',
              title: 'Alamat Faktur Pajak.',
              width: 450,
            },
            {
              field: 'npwp',
              title: 'No. NPWP',
              width: 150,
              sortable: true,
            },
            {
              field: 'noktp',
              title: 'No. KTP',
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
              width: 70,
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
              title: 'Status',
              align: 'center',
              sortable: true,
              width: 60,
              formatter: format_checked,
            }
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
                dg.datagrid('removeFilterRule', 'status');
              } else {
                dg.datagrid('addFilterRule', {
                  field: 'status',
                  op: 'equal',
                  value: value
                });
              }
              dg.datagrid('doFilter');
            }
          }
        },
        numberFilter('noktp'),
        numberFilter('npwp'),
        numberFilter('discountmax'),
        numberFilter('discountmin'),
        numberFilter('maxcredit'),
        numberFilter('telpcontactperson'),
        numberFilter('kodepos'),
        numberFilter('telp'),
        numberFilter('hp'),
        numberFilter('fax'),
      ]);
    }

    function numberFilter(field) {
      const dg = $('#table_data');
      return {
        field: field,
        type: 'numberbox',
        options: {
          onChange: function(value) {
            if (value == 0) {
              dg.datagrid('removeFilterRule', field);
            } else {
              dg.datagrid('addFilterRule', {
                field: field,
                op: 'contains',
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

    function reload() {
      refresh_data();
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
        url: base_url + 'atena/Master/Data/Customer/importData',
        data: form_data,
        contentType: false,
        processData: false,
        beforeSend: function(xhr) {
          $.messager.progress();
        },
        success: function(response) {
          $.messager.progress('close');

          if (response.success) {
            $.messager.alert('Berhasil', 'Berhasil mengimpor data customer');

            refresh_data();

            $('#dialog_import').window('close');
          } else {
            $.messager.alert('Gagal', response.message);
          }
        }
      });
    }

    function downloadTemplateExcel() {
      window.open(base_url + 'assets/files/excel/template_customer.xls');
    }
  </script>
@endpush
