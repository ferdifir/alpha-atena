@extends('template.form')

@section('content')
  <div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            <script>
              if (screen.height < 450) $("#trans_layout").css('height', "450px");
            </script>
            <div data-options="region:'north',border:false" style="width:100%; height:140px;">
              <div class="form_status" style="position:absolute; margin-top:10px; margin-left:85%;z-index:2;">
              </div>

              <table>
                <input type="hidden" id="mode" name="mode">
                <input type="hidden" id="TGLENTRY" name="tglentry">
                <input type="hidden" id="IDSALDOSTOK" name="uuidsaldostok"></td>
                <tr>
                  <td valign="top">
                    <fieldset style="height:120px;">
                      <legend id="label_laporan">Info Transaksi</legend>
                      <table border="0">
                        <tr>
                          <td id="label_form">No. Saldo Stok</td>
                          <td id="label_form"><input name="kodesaldostok" id="KODESALDOSTOK" class="label_input"
                              style="width:190px"></td>
                        </tr>
                        <tr>
                          <td id="label_form">Lokasi</td>
                          <td id="label_form"><input name="uuidlokasi" id="IDLOKASI" style="width:190px"></td>
                          <input type="hidden" id="KODELOKASI" name="kodelokasi">
                        </tr>
                        <tr>
                          <td id="label_form">Tgl. Trans
                          <td id="label_form"><input name="tgltrans" id="TGLTRANS" class="date" style="width:190px">
                          </td>
                        </tr>
                      </table>
                      </legend>
                  </td>
                  <td valign="bottom">
                    <textarea name="catatan" class="label_input" id="CATATAN" multiline="true" prompt="Catatan"
                      style="width:300px; height:85px" data-options="validType:'length[0, 500]'"></textarea>
                  </td>
                </tr>
              </table>
            </div>
            <div data-options="region:'center',border:false">
              <table id="table_data_detail" fit="true"></table>
              <input type="hidden" id="data_detail" name="data_detail">
            </div>
            <div data-options="region:'south',border:false" style="width:100%; height:35px;">
              <table cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input
                      :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl.
                      Input :</label> <label id="lbl_tanggal"></label></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
      <br>

      <a title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false" id='btn_simpan_modal'
        onclick="$('#window_button_simpan').window('open')"><img src="{{ asset('assets/images/simpan.png') }}"></a>


      <br><br>
      <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
        onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
    </div>
  </div>
  <div id="window_button_simpan" class="easyui-window" title="Konfirmasi" data-options="modal:true,closed:true"
    style="height:164cm;padding:15px 10px 10px 10px;top:20px">
    <center>
      <div id="button_simpan">

        <a title="Simpan" class="easyui-linkbutton button_add" id='simpan_saja' onclick="simpan(this.id)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan</a><br><br>
        <a title="Simpan & Cetak" class="easyui-linkbutton button_add_print" id='simpan_cetak'
          onclick="simpan(this.id)"
          style="height:40px;width:165px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan &
          Cetak</a>

        <div>
    </center>
  </div>

  <div id="form_cetak" title="Preview" style="width:660px; height:450px">
    <div id="area_cetak"></div>
  </div>
@endsection

@push('js')
  <script>
    var cekbtnsimpan = true;
    var row = {};
    var config = {};
    var idtrans = '';
    var row = {};
    $(document).ready(async function() {
      let check = false;
      await getConfig('KODESALDOSTOK', 'SALDOSTOK', 'bearer {{ session('TOKEN') }}',
        function(response) {
          if (response.success) {
            config = response.data;
            check = true;
          } else {
            if ((response.message ?? "").toLowerCase() == tokenTidakValid) {
              $.messager.alert('Error', "Sesi login telah habis. Silahkan logout dan login kembali", 'error');
            } else {
              $.messager.alert('Error', error, 'error');
            }
          }
        },
        function(error) {
          $.messager.alert('Error', "Request Config Error", 'error');
        });

      if (!check) return;

      if (config.value == "AUTO") {
        $('#KODESALDOSTOK').textbox({
          prompt: "Auto Generate",
          readonly: true,
          required: false
        });
      } else {
        $('#KODESALDOSTOK').textbox({
          prompt: "",
          readonly: false,
          required: true
        });
        $('#KODESALDOSTOK').textbox('clear').textbox('textbox').focus();
      }

      $("#form_cetak").window({
        collapsible: false,
        minimizable: false,
        tools: [{
          text: '',
          iconCls: 'icon-print',
          handler: function() {
            $("#area_cetak").printArea({
              mode: 'iframe'
            });

            $("#form_cetak").window({
              closed: true
            });
          }
        }, {
          text: '',
          iconCls: 'icon-excel',
          handler: function() {
            export_excel('Faktur Saldo Awal Stok', $("#area_cetak").html());
            return false;
          }
        }]
      }).window('close');

      var lebar = $('.panel').width();
      var tabsimpan = 50;
      var modalsimpan = 174;
      var spasi = 10;

      var left = lebar - (tabsimpan + modalsimpan) + spasi;

      $("#window_button_simpan").css({
        "width": modalsimpan
      });

      $("#window_button_simpan").window({
        collapsible: false,
        minimizable: false,
        maximizable: false,
        resizable: true,
        draggable: true,
        left: left
      });

      browse_data_lokasi('#IDLOKASI');

      buat_table_detail();

      @if ($mode == 'tambah')
        await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          var UT = data.data.cetak;
          if (UT == 1) {
            $('#simpan_cetak').css('filter', '');
          } else {
            $('#simpan_cetak').css('filter', 'grayscale(100%)');
            $('#simpan_cetak').removeAttr('onclick');
          }
        }, false);
        await tambah();
      @elseif ($mode == 'ubah')
        await ubah();
      @endif

      tutupLoader();

    })

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    async function cetak(uuidtrans) {
      try {
        $("#window_button_cetak").window('close');
        let url = link_api.cetakSaldoAwalStok + uuidtrans;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidsaldostok: uuidtrans,
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(
              `HTTP error! status: ${response.status} from ${url}`
            );
          }
          return response.text();
        })


        $("#area_cetak").html(response);
        $("#form_cetak").window('open');
      } catch (error) {
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
      }

    }

    async function tambah() {
      $('#mode').val('tambah');

      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#IDLOKASI').combogrid('readonly', false);
      $('#TGLTRANS').datebox('readonly', false);
      $('#IDLOKASI').combogrid('clear');
      idtrans = "";

      try {
        let url = link_api.getLokasiDefault;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({}),
        }).then(response => {
          if (!response.ok) {
            throw new Error(
              `HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })

        if (response.success) {
          var dataLokasi = response.data ?? {};
          if (!Array.isArray(dataLokasi))
            if ((dataLokasi.uuidlokasi ?? "") != "" && (dataLokasi.lokasidefault ?? 1) == 1) {
              $('#IDLOKASI').combogrid('setValue', dataLokasi.uuidlokasi);
              $("#KODELOKASI").val(dataLokasi.kodelokasi);
            }
        }
      } else {
        $.messager.alert('Error', response.message, 'error');
      }
    } catch (error) {
      var textError = getTextError(error);
      $.messager.alert('Error', getTextError(error), 'error');
    }

    clear_plugin();
    reset_detail();
    }

    async function ubah() {
      $('#mode').val('ubah');
      try {
        let url = link_api.loadDataHeaderSaldoAwalStok;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidsaldostok: '{{ $data }}',
            mode: "ubah",
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })
        if (response.success) {
          row = response.data;
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
      }
      if (row) {
        $("#form_input").form('load', row);
        $('#IDLOKASI').combogrid('readonly');
        $('#TGLTRANS').datebox('readonly', false);

        await load_data(row.uuidsaldostok);

        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);

        await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', async function(data) {
          var UT = data.data.cetak;
          if (UT == 1) {
            $('#simpan_cetak').css('filter', '');
          } else {
            $('#simpan_cetak').css('filter', 'grayscale(100%)');
            $('#simpan_cetak').removeAttr('onclick');
          }
          UT = data.data.ubah;

          var statusTrans = await getStatusTrans(link_api.getStatusTransSaldoAwalStok,
            'bearer {{ session('TOKEN') }}', {
              uuidsaldostok: row.uuidsaldostok
            });
          $(".form_status").html(status_transaksi(statusTrans));
          if (UT == 1 && statusTrans == 'I') {
            //document.getElementById('btn_simpan_all').onclick = simpan; 
            $('#btn_simpan_modal').css('filter', '');
            $('#mode').val('ubah');
          } else {
            document.getElementById('btn_simpan_modal').onclick = '';
            $('#btn_simpan_modal').css('filter', 'grayscale(100%)');
            $('#btn_simpan_modal').removeAttr('onclick');
          };
        });
      }
    }

    async function simpan(jenis_simpan) {
      var mode = $("#mode").val();

      // collapse row LO
      var rows = $('#table_data_detail').datagrid('getRows');
      for (var i = 0; i < rows.length; i++) {
        $('#table_data_detail').datagrid('collapseRow', i)
      }

      $('#data_detail').val(JSON.stringify($('#table_data_detail').datagrid('getRows')));

      var datanya = $("#form_input :input").serialize();
      var isValid = $('#form_input').form('validate');

      $('#window_button_simpan').window('close');

      // cek detail transaksi apakah ada barang yang sama, maka munculkan warning
      if (isValid) {
        var barang = [];
        var rows = $('#table_data_detail').datagrid('getRows');
        for (var i = 0; i < rows.length; i++) {
          var kode = rows[i].kodebarang;
          if ($.inArray(kode, barang) == -1) { // not found
            barang.push(kode);
          } else {
            $.messager.alert('Error', 'Ada Barang Yang Terinput 2x<br>Cek Barang ' + kode, 'error');
            isValid = false;
            break;
          }
        }
      }

      if (isValid) {
        isValid = cek_datagrid($('#table_data_detail'));
      }

      if (cekbtnsimpan && isValid && (mode == 'tambah' || mode == 'ubah')) {
        cekbtnsimpan = false;
        tampilLoaderSimpan();
        try {
          let headers = {
            'Authorization': 'bearer {{ session('TOKEN') }}',
          };
          let requestBody = null;
          var unindexed_array = $('#form_input :input').serializeArray();

          var body = {};
          $.map(unindexed_array, function(n, i) {
            if (n['name'] == "data_detail") {
              body[n['name']] = $('#table_data_detail').datagrid('getRows');
            } else {
              body[n['name']] = n['value'];
            }
          });
          body['jenis_simpan'] = jenis_simpan;
          // Cek apakah body adalah instance dari FormData
          if (body instanceof FormData) {
            // Jika FormData, jangan set 'Content-Type'. Browser akan melakukannya secara otomatis.
            requestBody = body;
          } else {
            // Default: Jika bukan FormData, asumsikan itu JSON.
            headers['Content-Type'] = 'application/json';
            requestBody = body ? JSON.stringify(body) : null;
          }
          let url = link_api.simpanSaldoAwalStok;
          const response = await fetch(url, {
            method: 'POST',
            headers: headers,
            body: requestBody,
          }).then(response => {
            if (!response.ok) {
              throw new Error(
                `HTTP error! status: ${response.status} from ${url}`);
            }
            return response.json();
          })
          if (response.success) {

            $('#form_input').form('clear');

            $.messager.show({
              title: 'Info',
              msg: 'Transaksi Sukses',
              showType: 'show'
            });
            if (mode == "tambah") {
              await tambah();
              $('#table_data_detail').datagrid('loadData', []);
            } else {
              await ubah();
            }
            if (jenis_simpan == 'simpan_cetak') {
              await cetak(response.data.uuidsaldostok);
            }
          } else {
            $.messager.alert('Error', response.message, 'error');
          }
        } catch (error) {
          console.log(error);
          var textError = getTextError(error);
          $.messager.alert('Error', getTextError(error), 'error');
        }
        cekbtnsimpan = true;
        tutupLoaderSimpan();
      }
    }

    function reset_detail() {
      $('#table_data_detail').datagrid('loadData', []);
    }

    async function load_data(idtrans) {
      try {
        let url = link_api.loadDataSaldoAwalStok;
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Authorization': 'bearer {{ session('TOKEN') }}',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            uuidsaldostok: idtrans,
            mode: "ubah",
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
          }
          return response.json();
        })
        if (response.success) {
          $('#table_data_detail').datagrid('loadData', response.data ?? []);
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
      }
    }

    /* ================== FUNGSI-FUNGSI YG BERHUBUNGAN DG JQUERYEASY UI ======================= */
    function browse_data_lokasi(id) {
      $(id).combogrid({
        panelWidth: 400,
        url: link_api.browseLokasi,
        idField: 'uuidlokasi',
        textField: 'nama',
        mode: 'local',
        sortName: 'nama',
        sortOrder: 'asc',
        required: true,
        selectFirstRow: true,
        columns: [
          [{
              field: 'uuidlokasi',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 150,
              sortable: true
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 200,
              sortable: true
            },
          ]
        ],
        onSelect: function(index, row) {
          $("#KODELOKASI").val(row.kode);
        },
        onLoadSuccess: function(data) {
          if (data.total == 1) {
            var rows = data.rows;
            $(this).combogrid('setValue', rows[0].kode).combogrid('readonly');
          }
        },
        onChange: function(newVal, oldVal) {
          if ($('#mode').val() != '') {
            reset_detail();
          }
        }
      });
    }

    function getRowIndex(target) {
      var tr = $(target).closest('tr.datagrid-row');
      return parseInt(tr.attr('datagrid-row-index'));
    }

    var indexDetail = 0; // UNTUK TOMBOL EDIT

    function buat_table_detail() {
      var dg = '#table_data_detail';

      $(dg).datagrid({
        clickToEdit: false,
        dblclickToEdit: true,
        showFooter: true,
        singleSelect: true,
        rownumbers: true,
        data: [],
        toolbar: [{
            text: 'Tambah',
            iconCls: 'icon-add',
            handler: function() {
              var index = $(dg).datagrid('getRows').length;
              $(dg).datagrid('appendRow', {
                kodebarang: '',
                subtotal: 0,
              }).datagrid('gotoCell', {
                index: index,
                field: 'kodebarang'
              });
            }
          }, {
            text: 'Hapus',
            iconCls: 'icon-remove',
            handler: function() {
              $(dg).datagrid('deleteRow', indexDetail);
              hitung_grandtotal();
            }
          }
          // ,{
          // text:'Ubah',
          // iconCls:'icon-edit',
          // handler:function(){
          // $(dg).datagrid('editCell', {
          // index: indexDetail,
          // field: 'kodebarang'
          // });
          // }
          // }
        ],
        columns: [
          [{
              field: 'uuidbarang',
              hidden: true
            },
            {
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 85,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 670,
                  mode: 'remote',
                  required: true,
                  idField: 'kode',
                  textField: 'kode',
                  onBeforeLoad: function(param) {
                    if ('undefined' === typeof param.q || param.q.length == 0) {
                      return false;
                    }
                  },
                  columns: [
                    [{
                        field: 'uuidbarang',
                        hidden: true
                      },
                      {
                        field: 'kode',
                        title: 'Kode',
                        width: 100
                      },
                      {
                        field: 'nama',
                        title: 'Nama',
                        width: 250
                      },
                      {
                        field: 'satuanutama',
                        title: 'Satuan',
                        width: 60
                      },
                      {
                        field: 'barcodesatuan1',
                        title: 'barcodesatuan1',
                        width: 120
                      },
                      {
                        field: 'partnumber',
                        title: 'Part Number',
                        width: 120
                      },
                      {
                        field: 'namamerk',
                        title: 'Merk',
                        width: 100
                      },
                      {
                        field: 'hargabeli',
                        title: 'Harga Beli',
                        align: 'right',
                        width: 80,
                        formatter: format_amount
                      },
                      {
                        field: 'kategori',
                        title: 'Kategori',
                        width: 200
                      },
                    ]
                  ],
                }
              }
            },
            {
              field: 'namabarang',
              title: 'Nama',
              width: 295,
            },
            @if (session('SHOWBARCODE') == 'YA')
              {
                field: 'barcodesatuan1',
                title: 'Barcode Sat. 1',
                width: 180
              },
            @endif
            @if (session('SHOWPARTNUMBER') == 'YA')
              {
                field: 'partnumber',
                title: 'Part Number',
                width: 180
              },
            @endif {
              field: 'jml',
              title: 'Jumlah',
              align: 'right',
              width: 80,
              formatter: format_qty,
              editor: {
                type: 'numberbox',
              }
            },
            {
              field: 'satuan_lama',
              title: 'Satuan',
              width: 40,
              align: 'center',
              hidden: true
            },
            {
              field: 'satuan',
              title: 'Satuan',
              width: 75,
              align: 'center',
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 100,
                  panelHeight: 130,
                  mode: 'remote',
                  required: true,
                  idField: 'satuan',
                  textField: 'satuan',
                  columns: [
                    [{
                      field: 'satuan',
                      title: 'Satuan',
                      width: 80
                    }, ]
                  ],
                }
              }
            },
            {
              field: 'harga',
              title: 'Harga',
              align: 'right',
              width: 85,
              formatter: format_amount
            },
            {
              field: 'subtotal',
              title: 'Subtotal',
              align: 'right',
              width: 95,
              formatter: format_amount
              @if (session('INPUTHARGA'))
                editor: {
                  type: 'numberbox',
                  options: {
                    required: true
                  }
                },
              @endif
            },
          ]
        ],
        //UNTUK TOMBOL EDIT
        onClickRow: function(index, row) {
          indexDetail = index;
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_detail', index, field);

          if (field == 'satuan') {
            ed.combogrid('grid').datagrid('options').url = link_api.loadSatuanBarang;
            ed.combogrid('grid').datagrid('load', {
              q: '',
              uuidbarang: row.uuidbarang
            });
            ed.combogrid('showPanel');
          } else if (field == 'kodebarang') {
            ed.combogrid('grid').datagrid('options').url = link_api.browseBarang;
            ed.combogrid('grid').datagrid('load', {
              q: ''
            });
            ed.combogrid('showPanel');
          }
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data_detail', index, cell.field);
          var row_update = {};

          switch (cell.field) {
            case 'kodebarang':
              var data = ed.combogrid('grid').datagrid('getSelected');

              var uuidbarang = data ? data.uuidbarang : '';
              var nama = data ? data.nama : '';
              var satuan = data ? data.satuanutama : '';
              var barcodesatuan1 = data.barcodesatuan1 ? data.barcodesatuan1 : '';
              var partnumber = data.partnumber ? data.partnumber : '';

              row_update = {
                uuidbarang: uuidbarang,
                namabarang: nama,
                barcodesatuan1: barcodesatuan1,
                partnumber: partnumber,
                satuan_lama: satuan,
                satuan: satuan,
                jml: 1,
              };
              break;
            case 'satuan':
              // get_konversi (ed.combogrid('grid').datagrid('getRows'), changes.satuan, row.satuan_lama);
              // if (satuan_baru != 0 || satuan_lama != 0 &&  changes.satuan) {
              // 	row_update = {
              // 		jml: (satuan_baru>satuan_lama) ? row.jml*konversi_baru : row.jml/konversi_lama,
              // 		//harga: (satuan_baru>satuan_lama) ? row.harga/konversi_baru : row.harga*konversi_lama,
              // 		// hargakurs: (satuan_baru>satuan_lama) ? row.hargakurs/konversi_baru : row.hargakurs*konversi_lama,
              // 		satuan_lama:changes.satuan
              // 	};
              // }
              break;
          }
          if (jQuery.isEmptyObject(row_update) == false) {
            $(this).datagrid('updateRow', {
              index: index,
              row: row_update
            });
          }
        },
        onLoadSuccess: function(data) {
          hitung_grandtotal();
        },
        onAfterDeleteRow: function(index, row) {
          hitung_grandtotal();
        },
        onAfterEdit: function(index, row, changes) {
          hitung_subtotal_detail(index, row);
          hitung_grandtotal();
        },
      }).datagrid('enableCellEditing');
    }

    function hitung_subtotal_detail(index, row) {
      // hitung diskon lebih dahulu
      var data = {};
      var subtotal = parseFloat(row.subtotal);
      var dg = $('#table_data_detail');

      row.jml = parseFloat(row.jml).toFixed({{ session('DECIMALDIGITQTY') }});
      data.harga = +((subtotal / row.jml).toFixed({{ session('DECIMALDIGITAMOUNT') }}));

      dg.datagrid('updateRow', {
        index: index,
        row: data
      });

      // cek jika ada barang yang sama
      var rows = dg.datagrid('getRows');

      for (var i = 0; i < rows.length; i++) {
        if (index != i && row.kodebarang == rows[i].kodebarang) {
          $.messager.show({
            title: 'Warning',
            msg: 'Barang Yang Diinput Tidak Boleh Sama Dalam Satu Detail Transaksi',
            timeout: {{ session('TIMEOUT') }},
          });
          dg.datagrid('deleteRow', index);
          break;
        }
      }
    }

    function hitung_grandtotal() {
      var data = $("#table_data_detail").datagrid('getRows');
      var footer = {
        subtotal: 0,
      }
      for (var i = 0; i < data.length; i++) {
        footer.subtotal += parseFloat(data[i].subtotal);
      }

      $('#table_data_detail').datagrid('reloadFooter', [footer]);
    }

    function clear_plugin() {
      $('.combogrid-f').each(function() {
        $(this).combogrid('grid').datagrid('load', {
          q: ''
        });
      });

      $('.number').numberbox('setValue', 0);

      $("#TGLTRANS").datebox('setValue', date_format());
    }
  </script>
@endpush
