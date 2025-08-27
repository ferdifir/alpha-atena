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
      <a id="btn_import" title="Impor Data" class="easyui-linkbutton easyui-tooltip" onclick="tampilDialogImport()">
        <img src="{{ asset('assets/images/import_excel.png') }}">
      </a>
    </div>
    <div data-options="region: 'center'">
      <div id="tab_transaksi" class="easyui-tabs" style="width:100%;height:100%;">
        <div title="Grid" id="Grid">
          <div class="easyui-layout" style="width:100%;height:100%" fit="true">
            <div data-options="region:'center',">
              <table id="table_data" idField="kodebarang"></table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="dialog_import" class="easyui-window" style="width: 400px;height: 150px;padding: 10px; display: none"
    title="Import Data Barang">
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
  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extra/plugins/datagrid-filter.js') }}"></script>
  <script>
    var counter = 0;

    function disable_button() {
      $('#btn_refresh').linkbutton('disable');
      $('#btn_hapus').linkbutton('disable');
      $('#btn_import').linkbutton('disable');
    }

    function enable_button() {
      $('#btn_refresh').linkbutton('enable');
      $('#btn_hapus').linkbutton('enable');
      $('#btn_import').linkbutton('enable');
    }

    $(document).ready(function() {
      $('#dialog_import').window('close');

      //WAKTU BATAL DI GRID, tidak bisa close
      //PRINT GRID
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

            if (row.partnumber === null || row.partnumber == "") {

              tab_title = row.namabarang;
            } else {

              tab_title = row.partnumber;
            }

            //AMBIL IDTRANS LEBIH DARI IDTAB
            var trans = $('#tab_transaksi').tabs('getSelected').panel('options').id.split("|");
            //Variabel ROW diisi array object
            row = {
              uuidbarang: trans[0],
              kodebarang: trans[1],
            };

            disable_button();
          }
        }
      });

      create_form_login();
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
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.tambah == 1) {
          counter++;
          var tab_title = 'Tambah';
          var tab_name = tab_title + "_" + counter;
          parent.buka_submenu(null, 'Tambah Barang',
            '{{ route('atena.master.barang.form', ['kode' => $kodemenu, 'mode' => 'tambah', 'data' => '']) }}',
            'fa fa-plus')
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function before_edit() {
      $('#mode').val('ubah');
      get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.ubah == 1 || data.hakakses == 1) {
          counter++;
          const row = $('#table_data').datagrid('getSelected');
          parent.buka_submenu(null, row.namabarang,
            '{{ route('atena.master.barang.form', ['kode' => $kodemenu, 'mode' => 'ubah']) }}&data=' + row
            .uuidbarang,
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
            try {
              bukaLoader();
              const response = await fetchData(link_api.hapusBarang, {
                uuidbarang: row.uuidbarang,
                kodebarang: row.kodebarang
              });
              tutupLoader();
              if (response.success) {
                tutupTab();
                refresh_data();
              } else {
                $.messager.alert('Error', response.errorMsg, 'error');
              }
            } catch (error) {
              tutupLoader();
              console.log(error);
              $.messager.alert('Error', 'Terjadi kesalahan saat memuat data', 'error');
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
        sortName: 'KODEBARANG',
        sortOrder: 'asc',
        url: link_api.loadDataGridBarang,
        onLoadSuccess: function(data) {
          // clear selection
          $('#table_data').datagrid('unselectAll');
        },
        rowStyler: function(index, row) {
          if (row.status == 0) return 'background-color:#a8aea6';
        },
        frozenColumns: [
          [{
              field: 'uuidbarang',
              width: 100,
              hidden: true,
            },
            {
              field: 'kodebarang',
              title: 'Kode',
              width: 100,
              sortable: true,
            },
            {
              field: 'kodebarangpajak',
              title: 'Kode Pajak',
              width: 100,
              sortable: true,
            },
            {
              field: 'namabarang',
              title: 'Nama',
              width: 200,
              sortable: true,
            },
          ]
        ],
        columns: [
          [{
              field: 'namamerk',
              title: 'Merk',
              width: 200,
              sortable: true,
            },
            {
              field: 'partnumber',
              title: 'Part Number',
              width: 100,
              sortable: true,
              align: 'left',
            },
            {
              field: 'isicollie',
              title: 'Isi Collie',
              width: 65,
              sortable: true,
              formatter: format_amount,
              align: 'right',
            },
            {
              field: 'stok',
              title: 'Barang Stok',
              align: 'center',
              sortable: true,
              formatter: format_checked,
            },
            {
              field: 'jual',
              title: 'Di Jual',
              align: 'center',
              sortable: true,
              formatter: format_checked,
            },
            {
              field: 'produksi',
              title: 'Hasil Produksi 2',
              align: 'center',
              sortable: true,
              formatter: format_checked,
            },
            {
              field: 'ppn',
              title: 'Barang Ber PPN',
              align: 'center',
              sortable: true,
              formatter: format_checked,
            },
            {
              field: 'poin',
              title: 'Barang Ber Poin',
              align: 'center',
              sortable: true,
              formatter: format_checked,
            },
            {
              field: 'set',
              title: 'Barang Set',
              align: 'center',
              sortable: true,
              formatter: format_checked,
            },
            {
              field: 'jmlhasilset',
              title: 'Jml. Hasil Set',
              width: 100,
              sortable: true,
              formatter: format_amount,
              align: 'right',
            },
            {
              field: 'kategoribarang',
              title: 'Kategori',
              width: 200,
              sortable: true,
            },
            {
              field: 'satuan',
              title: 'Unit 1',
              width: 50,
              sortable: true,
              align: 'center',
            },
            {
              field: 'barcodesatuan1',
              title: 'Barcode Satuan 1',
              width: 100,
              sortable: true,
              align: 'left',
            },
            {
              field: 'konversi1',
              title: 'Konv. 1',
              width: 50,
              sortable: true,
              formatter: format_amount,
              align: 'right',
            },
            {
              field: 'satuan2',
              title: 'Unit 2',
              width: 50,
              sortable: true,
              align: 'center',
            },
            {
              field: 'barcodesatuan2',
              title: 'Barcode Satuan 2',
              width: 100,
              sortable: true,
              align: 'left',
            },
            {
              field: 'konversi2',
              title: 'Konv. 2',
              width: 50,
              sortable: true,
              formatter: format_amount,
              align: 'right',
            },
            {
              field: 'satuan3',
              title: 'Unit 3',
              width: 50,
              sortable: true,
              align: 'center',
            },
            {
              field: 'barcodesatuan3',
              title: 'Barcode Satuan 3',
              width: 100,
              sortable: true,
              align: 'left',
            },
            {
              field: 'hargabeli',
              title: 'Harga Beli',
              width: 100,
              sortable: true,
              formatter: format_amount,
              align: 'right',
            },
            {
              field: 'kodeperkiraanpersediaan',
              title: 'Akun Persediaan',
              width: 100,
              sortable: true,
            },
            {
              field: 'namaperkiraanpersediaan',
              title: 'Perkiraan Persediaan',
              width: 200,
              sortable: true,
            },
            {
              field: 'kodeperkiraanhpp',
              title: 'Akun HPP',
              width: 100,
              sortable: true,
            },
            {
              field: 'namaperkiraanhpp',
              title: 'Perkiraan HPP',
              width: 200,
              sortable: true,
            },
            {
              field: 'limitmin',
              title: 'Limit Min',
              width: 100,
              sortable: true,
              formatter: format_amount,
              align: 'right',
            },
            {
              field: 'limitmax',
              title: 'Limit Max',
              width: 100,
              sortable: true,
              formatter: format_amount,
              align: 'right',
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
        defaultFilterType: 'validatebox',
      }).datagrid('enableFilter', [
        statusFilter('stok'),
        statusFilter('jual'),
        statusFilter('produksi'),
        statusFilter('ppn'),
        statusFilter('poin'),
        statusFilter('set'),
        statusFilter('status'),
        numberFilter('hargabeli'),
        numberFilter('limitmin'),
        numberFilter('limitmax'),
        dateFilter('tglentry'),
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

    function numberFilter(field) {
      const dg = $('#table_data');
      return {
        field: field,
        type: 'numberbox',
        options: {
          onChange: function(value) {
            if (value === '' || value === null) {
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

    function statusFilter(field) {
      const dg = $('#table_data');
      return {
        field: field,
        type: 'combobox',
        options: {
          data: [{
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
          ],
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

      //JIKA BERADA PADA TAB FORM TAMBAH / UBAH
      if ($('#tab_transaksi').tabs('getSelected').panel('options').title == "Tambah" || $('#tab_transaksi').tabs(
          'getSelected').panel('options').title == "Ubah") {
        row = {
          uuidbarang: "",
          kodebarang: "",
        };

        $("#mode").val("tambah");
        $("#data").val('');

        var tab_name = $('#tab_transaksi').tabs('getSelected').panel('options').title;

        if (tab_name == "Tambah") { //TAMBAH LANGSUNG AMBIL DARI ID

          var counterTambah = $('#tab_transaksi').tabs('getSelected').panel('options').id;
          tab_name = tab_name + "_" + counterTambah;
        } else { //UBAH DIAMBIL DARI ID POTONGAN
          var trans = $('#tab_transaksi').tabs('getSelected').panel('options').id.split("|");
          var counterTambah = trans[2];
          tab_name = tab_name + "_" + counterTambah;

        }

        var tab_title = 'Tambah';

        var tab = $('#tab_transaksi').tabs('getSelected');
        var tabIndex = $('#tab_transaksi').tabs('getTabIndex', tab);

        var tabTrans = $('#tab_transaksi').tabs('getTab', tabIndex);
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

      } else {
        //JIKA DI TAB GRID
        $('#table_data').datagrid('reload');
      }

    }

    function changeTitleTab(mode) {
      //DAPATKAN INDEXNYA untuk DIGANTI TITLE
      var tab = $('#tab_transaksi').tabs('getSelected');
      var tabIndex = $('#tab_transaksi').tabs('getTabIndex', tab);
      var tabForm = $('#tab_transaksi').tabs('getTab', tabIndex);

      if (mode == 'tambah') {
        $('#tab_transaksi').tabs('update', {
          tab: tabForm,
          type: 'header',
          options: {
            title: 'Tambah'
          }
        });
      } else if (mode == 'ubah') {
        $('#tab_transaksi').tabs('update', {
          tab: tabForm,
          type: 'header',
          options: {
            title: 'Ubah'
          }
        });
      }
    }

    function tutupTab() {
      //DAPATKAN TAB dan INDEXNYA untuk DIHAPUS
      var tab = $('#tab_transaksi').tabs('getSelected');
      var index = $('#tab_transaksi').tabs('getTabIndex', tab);
      if (index != 0) {
        $('#tab_transaksi').tabs('close', index);
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
        url: base_url + 'atena/Master/Data/Barang/importData',
        data: form_data,
        contentType: false,
        processData: false,
        beforeSend: function(xhr) {
          $.messager.progress();
        },
        success: function(response) {
          $.messager.progress('close');

          if (response.success) {
            $.messager.alert('Berhasil', 'Berhasil mengimpor data barang');

            refresh_data();

            $('#dialog_import').window('close');
          } else {
            $.messager.alert('Gagal', response.errorMsg);
          }
        }
      });
    }

    function downloadTemplateExcel() {
      window.open(base_url + 'assets/files/excel/template_barang.xls');
    }
  </script>
@endpush
