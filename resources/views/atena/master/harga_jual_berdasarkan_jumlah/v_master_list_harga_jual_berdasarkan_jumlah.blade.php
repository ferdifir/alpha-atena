@extends('template.app')

@section('content')
  <div class="easyui-layout" fit="true">
    <div data-options="region: 'north'" style="height: 230px;padding: 5px">
      <table>
        <td>
          <fieldset style="width: 500px">
            <legend>Filter</legend>

            <div style="color: rgb(200, 0, 0);padding: 5px;background-color: #f5d1d6;font-weight: bold;">
              Data yang tampil adalah barang yang memiliki satu level satuan saja & berstatus aktif
            </div>

            <table>
              <tr>
                <td id="label_form">Supplier</td>
                <td>
                  <input id="FILTER_SUPPLIER" style="width: 250px;">
                </td>
              </tr>
              <tr>
                <td id="label_form">Merk Barang</td>
                <td>
                  <input id="FILTER_MERK" style="width: 250px">
                </td>
              </tr>
              <tr>
                <td id="label_form">Kategori</td>
                <td>
                  <input id="FILTER_KATEGORI" style="width: 250px;">
                </td>
              </tr>
              <tr>
                <td id="label_form">Barang</td>
                <td>
                  <input id="FILTER_BARANGAWAL" style="width: 114px;"> s/d <input id="FILTER_BARANGAKHIR"
                    style="width: 114px;">
                </td>
              </tr>
              <tr>
                <td id="label_form">Berisi Kata</td>
                <td>
                  <input class="label_input" id="FILTER_BERISIKATA" style="width: 250px;"
                    data-options="prompt: 'Untuk kode barang/nama barang/partnumber/barcode'">
                </td>
              </tr>
              <tr>
                <td>
                  <label id="label_form">Lokasi</label>
                </td>
                <td>
                  <input id="FILTER_IDLOKASI" style="width: 250px" required>
                  <a href="#" class="easyui-linkbutton" onclick="tampil_data_barang(event, 1)">Tampilkan</a>
                  <!-- <a href="#" class="easyui-linkbutton" onclick="tampil_copy_harga_jual_satuan(event)">Copy Harga Jual</a> -->
                </td>
              </tr>
            </table>
          </fieldset>
        </td>
        <td valign="top">
          <fieldset>
            <legend>Hapus Harga Jual</legend>

            <table>
              <tr>
                <td id="label_form">
                  Tgl. Aktif
                </td>
                <td>
                  <input id="TGLAKTIF_HAPUS_HARGAJUAL" style="width: 100px;">
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <div
                    style="color: rgb(200, 0, 0);padding: 5px;background-color: #f5d1d6;font-weight: bold;margin: 5px 0">
                    Aksi ini akan menghapus harga jual semua barang sesuai tanggal aktif yang dipilih
                  </div>
                  <a class="easyui-linkbutton" onclick="hapus_hargajual()">Hapus Harga Jual</a>
                </td>
              </tr>
            </table>
          </fieldset>
        </td>
      </table>
    </div>
    <div data-options="region: 'center'">
      <div id="tab_transaksi" class="easyui-tabs" style="width:100%;height:100%;">
        <div title="Grid" id="Grid">
          <div class="easyui-layout" style="width:100%;height:100%" fit="true">
            <div data-options="region:'center'">
              <table id="table_data" idField="kodebarang"></table>
            </div>
            <div data-options="region: 'south'" style="height: 35px">
              <div id="pagination" class="easyui-pagination" style="background:#efefef;border:1px solid #ccc;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="window_harga" title="Harga Jual" style="width: 500px; height: 300px">
    <form id="form_input" style="width: 100%;height: 100%">
      <input type="hidden" name="uuidbarang" id="IDBARANG">
      <input type="hidden" name="uuidlokasi" id="IDLOKASI">
      <input type="hidden" name="data_detail" id="data_detail">

      <div class="easyui-layout" style="width: 100%; height: 100%">
        <div data-options="region: 'east'" style="width: 50px;padding: 5px">
          <a title="Simpan" class="easyui-tooltip" data-options="plain:false">
            <img src="{{ asset('assets/images/simpan.png') }}" onclick="simpan()">
          </a>
        </div>
        <div data-options="region: 'center'">
          <div class="easyui-layout" style="width: 100%; height: 100%">
            <div data-options="region: 'north'" style="height: 60px">
              <table>
                <tr>
                  <td id="label_form">Barang</td>
                  <td>
                    <input type="text" class="label_input" style="width: 80px" id="kodebarang" readonly>
                    <input type="text" class="label_input" style="width: 200px" id="namabarang" readonly>
                  </td>
                </tr>
                <tr>
                  <td id="label_form">Lokasi</td>
                  <td>
                    <input type="text" class="label_input" style="width: 80px" id="kodelokasi" readonly>
                    <input type="text" class="label_input" style="width: 200px" id="namalokasi" readonly>
                  </td>
                </tr>
              </table>
            </div>

            <div data-options="region: 'center'">
              <div id="toolbar_harga">
                <div>
                  <input type="text" class="easyui-combogrid" style="width: 100px" id="DAFTARTGLAKTIF">
                  <input type="text" class="date" style="width: 100px" name="tglaktif" id="TGLAKTIF">
                  <a class="easyui-linkbutton" id="btn_tambah" onclick="tambah()">Tambah</a>
                  <a class="easyui-linkbutton" id="btn_ubah" onclick="ubah()" disabled>Ubah</a>
                  <a class="easyui-linkbutton" id="btn_hapus" onclick="hapus()" disabled>Hapus</a>
                </div>

                <div>
                  <div style="color: rgb(200, 0, 0);padding: 5px;background-color: #f5d1d6;font-weight: bold;">
                    Pastikan terdapat Jml. Akhir dengan nilai paling besar (contoh: 9,999)
                  </div>
                </div>
              </div>

              <table id="table_detail_harga" fit="true"></table>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection

@push('js')
  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-cellediting/datagrid-cellediting.js') }}">
  </script>
  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}">
  </script>
  <script>
    var index_header = -1;

    $(document).ready(function() {
      tutupLoader();
      //WAKTU BATAL DI GRID, tidak bisa close
      //PRINT GRID
      $("#table_data").datagrid({
        onSelect: function() {
          row = $('#table_data').datagrid('getSelected');
        }
      });

      $('#window_harga').window({
        closed: true,
        onClose: function() {
          // clear tanggal aktif tiap kali window ditutup
          $('#DAFTARTGLAKTIF').combogrid('clear');
        }
      });

      $('#pagination').pagination({
        total: 0,
        pageSize: 20
      });

      browse_data_supplier('#FILTER_SUPPLIER');
      browse_data_merk('#FILTER_MERK');
      browse_data_kategori('#FILTER_KATEGORI');
      browse_data_barang('#FILTER_BARANGAWAL');
      browse_data_barang('#FILTER_BARANGAKHIR');
      browse_data_lokasi('#FILTER_IDLOKASI');
      browse_data_tglaktif();
      browse_data_tglaktif_global('#TGLAKTIF_HAPUS_HARGAJUAL');

      $('#pagination').pagination({
        onSelectPage: function(pageNumber, pageSize) {
          $(this).pagination('loading');
          console.log('page number: ' + pageNumber + ', page size: ' + pageSize);
          tampil_data_barang(null, pageNumber);

          $(this).pagination('loaded');
        }
      });

      buat_table();
      buat_table_harga();
    });

    function buat_table() {
      $('#table_data').datagrid({
        fit: true,
        singleSelect: true,
        striped: true,
        pagination: false,
        sortName: 'kodebarang',
        sortOrder: 'asc',
        view: detailview,
        detailFormatter: function(index, row) {
          return '<div style="padding:2px;position:relative;"><table class="ddv"></table></div>';
        },
        columns: [
          [{
              field: 'uuidbarang',
              hidden: true,
            },
            {
              field: 'kodebarang',
              title: 'Kode',
              width: 100,
              sortable: true,
            },
            {
              field: 'namabarang',
              title: 'Nama',
              width: 200,
              sortable: true,
            },
            {
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
              field: 'satuan',
              title: 'Satuan',
              width: 50,
              sortable: true,
              align: 'center',
            }
          ]
        ],
        onExpandRow: function(index_header, row_header) {
          var ddv = $(this).datagrid('getRowDetail', index_header).find('table.ddv');

          ddv.datagrid({
            clickToEdit: false,
            dblclickToEdit: true,
            RowAdd: false,
            RowDelete: false,
            singleSelect: true,
            columns: [
              [{
                  field: 'jmlawal',
                  title: 'Jml Awal',
                  align: 'right',
                  width: 90,
                  formatter: format_qty,
                },
                {
                  field: 'jmlakhir',
                  title: 'Jml Akhir',
                  align: 'right',
                  width: 90,
                  formatter: format_qty,
                },
                {
                  field: 'hargajualmin',
                  title: 'H. Jual Min.',
                  align: 'right',
                  width: 100,
                  formatter: format_amount,
                },
                {
                  field: 'hargajualmax',
                  title: 'H. Jual Max.',
                  align: 'right',
                  width: 100,
                  formatter: format_amount,
                },
              ]
            ]
          });

          $.ajax({
            url: link_api.loadHargaAktifTerakhir,
            type: 'POST',
            dataType: 'JSON',
            data: {
              uuidbarang: row_header.uuidbarang,
              uuidlokasi: row_header.uuidlokasi
            },
            beforeSend: function() {
              ddv.datagrid('loading');
            },
            success: function(data) {
              ddv.datagrid('loaded');

              ddv.datagrid('loadData', data);
              $('#table_data').datagrid('fixDetailRowHeight', index_header);
            }
          })
        },
        onDblClickRow: function(index, row) {
          index_header = index;

          $('#IDBARANG').val(row.uuidbarang);

          $('#kodebarang').textbox('setValue', row.kodebarang);

          $('#namabarang').textbox('setValue', row.namabarang);

          $('#IDLOKASI').val(row.uuidlokasi);

          $('#kodelokasi').textbox('setValue', row.kodelokasi);

          $('#namalokasi').textbox('setValue', row.namalokasi);

          //   ubah_url_combogrid($('#DAFTARTGLAKTIF'), link_api.browseTglAktif + '/' + row.uuidbarang + '/' + row
          //     .uuidlokasi, true);
          $.ajax({
            url: link_api.browseTglAktif,
            type: 'POST',
            data: {
              uuidbarang: row.uuidbarang,
              uuidlokasi: row.uuidlokasi
            },
            dataType: 'JSON',
            success: function(data) {
              var combogrid = $('#DAFTARTGLAKTIF').combogrid('grid');
              combogrid.datagrid('loadData', data);
            }
          })

          $('#btn_tambah').linkbutton('enable');
          $('#btn_ubah').linkbutton('enable');
          $('#btn_hapus').linkbutton('disable');

          $.ajax({
            url: link_api.loadHargaAktifTerakhir,
            type: 'POST',
            dataType: 'JSON',
            data: {
              uuidbarang: row.uuidbarang,
              uuidlokasi: row.uuidlokasi
            },
            beforeSend: function() {
              $('#table_detail_harga').datagrid('loading');
            },
            success: function(data) {
              $('#table_detail_harga').datagrid('loaded');

              $('#table_detail_harga').datagrid('loadData', data);

              if (data.length > 0) {
                $('#TGLAKTIF').datebox('setValue', data[0].tglaktif);
                $('#DAFTARTGLAKTIF').combogrid('clear').combogrid('readonly', false).combogrid(
                  'setValue', data[0].tglaktif);

                $('#btn_hapus').linkbutton('enable');
              } else {
                $('#btn_ubah').linkbutton('disable');
              }
            }
          })

          $('#window_harga').window({
            closed: false
          })
        },
      });
    }

    function buat_table_harga() {
      $('#table_detail_harga').datagrid({
        toolbar: '#toolbar_harga',
        RowAdd: false,
        RowDelete: false,
        RowEdit: false,
        clickToEdit: false,
        dblclickToEdit: true,
        columns: [
          [{
              field: 'jmlawal',
              title: 'Jml. Awal',
              width: 80,
              align: 'right',
              formatter: format_qty,
              editor: {
                type: 'numberbox'
              }
            },
            {
              field: 'jmlakhir',
              title: 'Jml. Akhir',
              width: 80,
              align: 'right',
              formatter: format_qty,
              editor: {
                type: 'numberbox'
              }
            },
            {
              field: 'hargajualmin',
              title: 'H. Jual Min.',
              width: 100,
              align: 'right',
              formatter: format_amount,
              editor: {
                type: 'numberbox'
              }
            },
            {
              field: 'hargajualmax',
              title: 'H. Jual Max.',
              width: 100,
              align: 'right',
              formatter: format_amount,
              editor: {
                type: 'numberbox'
              }
            }
          ]
        ]
      }).datagrid('enableCellEditing');
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

    function browse_data_supplier(id) {
      $(id).combogrid({
        panelWidth: 600,
        url: link_api.browseSupplier,
        idField: 'uuidsupplier',
        textField: 'nama',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        // required: true,
        columns: [
          [{
              field: 'kode',
              title: 'Kode',
              width: 80,
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
            },
            {
              field: 'telp',
              title: 'Telp',
              width: 100,
              sortable: true
            }
          ]
        ]
      });
    }

    function browse_data_merk(id) {
      $(id).combogrid({
        url: link_api.browseFilterMerk,
        required: false,
        panelWidth: 330,
        mode: 'local',
        idField: 'uuidmerk',
        textField: 'nama',
        editable: false,
        multiple: true,
        columns: [
          [{
              field: 'ck',
              checkbox: true
            },
            {
              field: 'kode',
              title: 'Kode Merk',
              width: 80
            },
            {
              field: 'nama',
              title: 'Nama Merk',
              width: 235
            }
          ]
        ]
      })
    }

    function browse_data_kategori(id) {
      $(id).combogrid({
        url: link_api.browseFilterKategori,
        panelWidth: 170,
        mode: 'local',
        idField: 'namakategori',
        textField: 'namakategori',
        sortName: 'kode',
        sortOrder: 'asc',
        multiple: true,
        editable: false,
        columns: [
          [{
              field: 'ck',
              checkbox: true
            },
            {
              field: 'namakategori',
              title: 'Kategori',
              width: 150
            }
          ]
        ]
      })
    }

    function browse_data_barang(id) {
      $(id).combogrid({
        panelWidth: 650,
        url: link_api.browseBarangAll,
        idField: 'kode',
        textField: 'kode',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        columns: [
          [{
              field: 'id',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 100,
              sortable: true
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 300,
              sortable: true
            },
            {
              field: 'satuan',
              title: 'Satuan',
              width: 80,
              sortable: true
            },
            {
              field: 'partnumber',
              title: 'Part Number',
              width: 150,
              sortable: true
            }
          ]
        ],
      });
    }

    function browse_data_lokasi(id) {
      $(id).combogrid({
        panelWidth: 380,
        url: link_api.browseLokasi,
        idField: 'uuidlokasi',
        textField: 'nama',
        mode: 'local',
        sortName: 'nama',
        sortOrder: 'asc',
        multiple: false,
        editable: false,
        columns: [
          [{
              field: 'kode',
              title: 'Kode',
              width: 80,
              sortable: true
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 240,
              sortable: true
            },
          ]
        ],
      });
    }

    function browse_data_tglaktif() {
      $('#DAFTARTGLAKTIF').combogrid({
        panelWidth: 130,
        idField: 'tglaktif',
        textField: 'tglaktif',
        mode: 'local',
        columns: [
          [{
            field: 'tglaktif',
            title: 'Tgl. Aktif',
            width: 100,
            sortable: true
          }, ]
        ],
        onSelect: function(index, row) {
          var row_barang = $('#table_data').datagrid('getRows')[index_header];

          $.ajax({
            url: link_api.loadHargaByTanggalAktif,
            type: 'POST',
            dataType: 'JSON',
            data: {
              uuidbarang: row_barang.uuidbarang,
              uuidlokasi: row_barang.uuidlokasi,
              tglaktif: row.tglaktif
            },
            beforeSend: function() {
              $('#table_detail_harga').datagrid('loading');
            },
            success: function(data) {
              $('#table_detail_harga').datagrid('loaded');

              $('#table_detail_harga').datagrid('loadData', data);
            }
          })
        }
      });
    }

    function browse_data_tglaktif_global(id) {
      $(id).combogrid({
        url: link_api.browseTglAktfiGlobal,
        panelWidth: 130,
        idField: 'tglaktif',
        textField: 'tglaktif',
        mode: 'remote',
        columns: [
          [{
            field: 'tglaktif',
            title: 'Tgl. Aktif',
            width: 100
          }]
        ]
      });
    }

    function tampil_data_barang(event, page_number) {
      if (event) {
        event.preventDefault();
      }

      var idsupplier = $('#FILTER_SUPPLIER').combogrid('getValue');
      var idmerk = $('#FILTER_MERK').combogrid('getValues');
      var kategori = $('#FILTER_KATEGORI').combogrid('getValues');
      var kodebarangawal = $('#FILTER_BARANGAWAL').combogrid('getValue');
      var kodebarangakhir = $('#FILTER_BARANGAKHIR').combogrid('getValue');
      var idlokasi = $('#FILTER_IDLOKASI').combogrid('getValue');
      var berisikata = $('#FILTER_BERISIKATA').textbox('getValue');

      if (idlokasi == '') {
        $.messager.alert('Peringatan', 'Data lokasi belum diisi', 'warning');

        return false;
      }

      $.ajax({
        url: link_api.loadDataBarang,
        type: 'POST',
        dataType: 'JSON',
        data: {
          uuidsupplier: idsupplier,
          uuidmerk: idmerk,
          kategori: kategori,
          kodebarangawal: kodebarangawal,
          kodebarangakhir: kodebarangakhir,
          uuidlokasi: idlokasi,
          berisikata: berisikata,
          pagenumber: page_number,
          pagesize: $('#pagination').pagination('options').pageSize
        },
        beforeSend: function() {
          $('#table_data').datagrid('loading');
        },
        success: function(data) {
          $('#table_data').datagrid('loaded');

          $('#table_data').datagrid('loadData', data.rows);

          $('#pagination').pagination({
            total: data.total
          });
        }
      })
    }

    function tambah() {
      $('#table_detail_harga').datagrid('loadData', []);

      $('#DAFTARTGLAKTIF').combogrid('clear').combogrid('readonly', true);

      $('#TGLAKTIF').datebox('readonly', false).datebox('setValue', date_format());

      $('#btn_tambah').linkbutton('disable');
      $('#btn_ubah').linkbutton('disable');
      $('#btn_hapus').linkbutton('disable');

      $('#table_detail_harga').datagrid('options').RowAdd = true;
      $('#table_detail_harga').datagrid('options').RowEdit = true;
      $('#table_detail_harga').datagrid('options').RowDelete = true;
    }

    async function simpan() {
      var rows = $('#table_detail_harga').datagrid('getRows');

      if (rows.length == 0) {
        $.messager.alert('Peringatan', 'Data Harga Jual Belum Diisi', 'warning');

        return false;
      }

      var exists = rows.filter(function(item) {
        return parseFloat(item.jmlawal) == 0;
      });

      if (exists.length == 0) {
        $.messager.alert('Peringatan', 'Belum Terdapat Data Harga Jual Dengan Jml. Awal Bernilai 0', 'warning');

        return false;
      }

      $('#data_detail').val(JSON.stringify(rows));

      const payload = $("#form_input :input")
        .serializeArray()
        .reduce((acc, field) => {
          try {
            acc[field.name] = field.name === 'data_detail' && field.value ?
              JSON.parse(field.value) :
              field.value;
          } catch (e) {
            console.warn(`Invalid JSON in field '${field.name}':`, field.value);
            acc[field.name] = field.value;
          }
          return acc;
        }, {});

      try {
        bukaLoader();
        $('#window_harga').window('minimize');
        const response = await fetchData(link_api.simpanHargaJualBerdasarkanJumlah, payload);
        tutupLoader();

        if (response.success) {
          $.messager.alert('Info', 'Data Harga Jual Berhasil Disimpan', 'info');

          $('#window_harga').window({
            closed: true
          })

          $('#table_data').datagrid('collapseRow', index_header);
          $('#table_data').datagrid('expandRow', index_header);
          $('#TGLAKTIF_HAPUS_HARGAJUAL').combogrid('clear');
          $('#TGLAKTIF_HAPUS_HARGAJUAL').combogrid('grid').datagrid('load');
        } else {
          $('#window_harga').window('maximize');
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        console.log(error);
        tutupLoader();
        $('#window_harga').window('maximize');
        const e = (typeof error === 'string') ? error : error.message;
        var textError = getTextError(e);
        $.messager.alert('Error', textError, 'error');
      }
    }

    function ubah() {
      $('#DAFTARTGLAKTIF').combogrid('readonly', true);

      $('#TGLAKTIF').datebox('readonly', true).datebox('setValue', $('#DAFTARTGLAKTIF').combogrid('getValue'));

      $('#btn_tambah').linkbutton('enable');
      $('#btn_ubah').linkbutton('disable');
      $('#btn_hapus').linkbutton('enable');

      $('#table_detail_harga').datagrid('options').RowAdd = true;
      $('#table_detail_harga').datagrid('options').RowEdit = true;
      $('#table_detail_harga').datagrid('options').RowDelete = true;
    }

    async function hapus() {
      $.messager.confirm('Peringatan',
        'Apakah anda yakin akan menghapus harga jual? Data tidak dapat dikembalikan setelah dihapus',
        async function(confirm) {
          if (!confirm) {
            return;
          }

          var idbarang = $('#IDBARANG').val();
          var idlokasi = $('#IDLOKASI').val();
          var tglaktif = $('#TGLAKTIF').datebox('getValue');

          try {
            bukaLoader();
            $('#window_harga').window('minimize');
            const response = await fetchData(link_api.hapusHargaJualBerdasarkanJumlah, {
              uuidbarang: idbarang,
              uuidlokasi: idlokasi,
              tglaktif: tglaktif
            })
            tutupLoader();

            if (response.success) {
              $.messager.alert('Info', 'Data Harga Jual Berhasil Dihapus', 'info');

              $('#window_harga').window({
                closed: true
              })

              $('#table_data').datagrid('collapseRow', index_header);
              $('#table_data').datagrid('expandRow', index_header);
              $('#TGLAKTIF_HAPUS_HARGAJUAL').combogrid('clear');
              $('#TGLAKTIF_HAPUS_HARGAJUAL').combogrid('grid').datagrid('load');
            } else {
              $('#window_harga').window('maximize');
              $.messager.alert('Error', response.message, 'error');
            }
          } catch (error) {
            console.log(error);
            tutupLoader();
            $('#window_harga').window('maximize');
            const e = (typeof error === 'string') ? error : error.message;
            var textError = getTextError(e);
            $.messager.alert('Error', textError, 'error');
          }
        });
    }

    function hapus_hargajual() {
      var tglaktif = $('#TGLAKTIF_HAPUS_HARGAJUAL').datebox('getValue');

      $.messager.confirm('Peringatan', 'Apakah anda yakin akan menghapus semua harga jual tanggal ' + tglaktif +
        '? Data tidak dapat dikembalikan setelah dihapus',
        async function(confirm) {
          if (!confirm) {
            return;
          }

          $('#window_harga').window({
            closed: true
          })

          try {
            bukaLoader();
            const response = await fetchData(link_api.hapusHargaJualBerdasarkanJumlahPerTglAktif, {
              tglaktif: tglaktif
            });
            tutupLoader();

            if (response.success) {
              $.messager.alert('Info', 'Data Harga Jual Berhasil Dihapus', 'info');
              $('#TGLAKTIF_HAPUS_HARGAJUAL').combogrid('clear');
              $('#TGLAKTIF_HAPUS_HARGAJUAL').combogrid('grid').datagrid('load');
            } else {
              $.messager.alert('Error', response.message, 'error');
            }
          } catch (error) {
            console.log(error);
            const e = (typeof error === 'string') ? error : error.message;
            var textError = getTextError(e);
            $.messager.alert('Error', textError, 'error');
          }
        });
    }
  </script>
@endpush
