@extends('template.form')

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

  <!--FORM INPUT -->
  <form id="form_input" class="easyui-layout" enctype="multipart/form-data" method="post" style="width:100%; height:100%;">
    <div data-options="region:'center', border:false">

      <input type="hidden" name="act">
      <input type="hidden" id="mode" name="mode">
      <input type="hidden" name="gambar" id="gambar">
      <input type="hidden" name="tglentry">
      <input type="hidden" id="uuiduser" name="uuiduser">
      <input type="hidden" name="fingerprint1">
      <input type="hidden" name="fingerprint2">
      <input type="hidden" id="data_detail" name="data_detail">
      <input type="hidden" id="data_akses_pos" name="data_akses_pos">
      <input type="hidden" id="data_akses_pos_desktop" name="data_akses_pos_desktop">
      <input type="hidden" id="data_lokasi" name="data_lokasi">
      <input type="hidden" id="data_lokasi_transfer" name="data_lokasi_transfer">
      <input type="hidden" id="data_perkiraan" name="data_perkiraan">
      <input type="hidden" id="data_jamakses" name="data_jamakses">
      <input type="hidden" id="data_dashboard" name="data_dashboard">

      <div class="easyui-layout" style="width: 100%;height: 100%">
        <div data-options="region: 'north'" style="height: 190px">
          <table style="padding:2px" border="0">
            <tbody>
              <tr>
                <td align="right" id="label_form">E-mail</td>
                <td id="label_form">
                  <input id="EMAIL" class="label_input" name="email" style="width:200px" validType="email" required>
                  <label id="label_form">
                    <input type="checkbox" id="STATUS" name="status" value="1"> Aktif</label>
                </td>
              </tr>
              <tr hidden>
                <td align="right" id="label_form" style="width:100px">User ID</td>
                <td>
                  <input id="UUIDUSER" name="uuiduser" style="width:200px" class="label_input"
                    data-options="fontTransform:'normal', prompt: 'Auto generate'" placeholder="Auto Generate" readonly>
                </td>
              </tr>
              <tr>
                <td align="right" id="label_form">Nama User</td>
                <td><input id="USERNAME" name="username" style="width:200px" class="label_input" required="true"
                    validType='length[0,50]'></td>
              </tr>
              <tr>
                <td align="right" id="label_form">Password</td>
                <td><input name="pass" type="password" class="label_input"
                    data-options="required:true,fontTransform:'normal'" validType='length[0,50]' style="width:200px" />
                  <label id="label_laporan">Perhatikan huruf kecil dan besar</label>
                </td>
              </tr>
              <tr>
                <td align="right" id="label_form">Ulangi Password</td>
                <td><input id="RE_PASS" name="re_pass" type="password" class="label_input"
                    data-options="required:true,fontTransform:'normal'" validType="equals['[name=pass]']"
                    style="width:200px" /> <label id="label_laporan">Perhatikan huruf kecil dan besar</label></td>
              </tr>
              <tr>
                <td style="width:120px" align="right" id="label_form">Akun Kas Kasir</td>
                <td><input id="UUIDPERKIRAAN" name="uuidperkiraan" style="width: 200px" class="label_input"></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div data-options="region: 'center',split: false" style="width: 100%;height: 200px">
          <div class="easyui-tabs" style="width: 100%;height: 100%" plain="true">
            <div title="Umum">
              <table>
                <tbody>
                  <tr>
                    <td valign="top">
                      <table style="padding:2px" border="0">
                        <tr>
                          <td align="right" id="label_form" width="100px">HP</td>
                          <td id="label_form"><input name="hp" style="width:200px" class="label_input"
                              validType='length[0,50]'></td>
                        </tr>
                        <tr>
                          <td align="right" id="label_form" valign="top">Catatan</td>
                          <td colspan="2">
                            <textarea name="catatan" style="width:200px; height:50px" class="label_input" multiline="true"
                              validType='length[0,300]'>
													</textarea>
                          </td>
                        </tr>
                      </table>
                    </td>
                    <td>
                      <div style="width:100px; height:100px">
                        <img id="preview-image" style="width:100%; height:100%" />
                      </div>
                      <input id="FILEGAMBAR" name="filegambar" class="easyui-filebox"
                        data-options="required:false,buttonIcon:'icon-man',buttonText:'Foto'" style="width:100px">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label id="label_form">Hak Akses Lokasi</label>
                      <table id="table_data_lokasi"></table>
                    </td>
                    <td colspan="2">
                      <label id="label_form">Hak Akses Lokasi Tujuan Transfer</label>
                      <table id="table_data_lokasi_transfer"></table>
                    </td>
                  </tr>
                </tbody>
              </table>

            </div>
            <div title="Hak Akses">
              <div class="easyui-layout" style="height:100%">
                <div data-options="region: 'north'" style="height: 30px;">
                  <div id="toolbar-copy-perkiraan">
                    <input id="USERCOPY" style="width:200px"> <a class="easyui-linkbutton"
                      data-options="iconCls:'icon-save', plain:false" onclick="copyData()">Copy Hak Akses</a>
                  </div>
                </div>
                <div data-options="region: 'center'">
                  <div id="menu_tree" fit="true"></div>
                </div>
              </div>
            </div>
            <div title="Hak Akses POS">
              <div class="easyui-layout" style="height:100%">
                <div data-options="region: 'north'" style="height: 30px;">
                  <input id="USERCOPYAKSESPOS" style="width:200px"> <a class="easyui-linkbutton"
                    data-options="iconCls:'icon-save', plain:false" onclick="copyDataAksesPOS()">Copy Hak Akses POS</a>
                </div>
                <div data-options="region: 'center'">
                  <div id="menu_tree_pos" fit="true"></div>
                </div>
              </div>
            </div>
            <div title="Hak Akses POS Desktop">
              <div class="easyui-layout" style="height:100%">
                <div data-options="region: 'north'" style="height: 30px;">
                  <input id="USERCOPYAKSESPOSDESKTOP" style="width:200px"> <a class="easyui-linkbutton"
                    data-options="iconCls:'icon-save', plain:false" onclick="copyDataAksesPOSDesktop()">Copy Hak Akses
                    POS
                    Desktop</a>
                </div>
                <div data-options="region: 'center'">
                  <div id="menu_tree_pos_desktop" fit="true"></div>
                </div>
              </div>
            </div>
            <div title="Jam Akses">
              <div class="easyui-layout" style="height:100%">
                <div data-options="region: 'north'" style="height: 30px;">
                  <div id="toolbar-copy-perkiraan">
                    <input id="USERCOPYJAMAKSES" style="width:200px"> <a class="easyui-linkbutton"
                      data-options="iconCls:'icon-save', plain:false" onclick="copyDataJamAkses()">Copy Jam Akses</a>
                  </div>
                </div>
                <div data-options="region: 'center'">
                  <table id="table_data_jamakses" fit="true"></table>
                </div>
              </div>
            </div>
            <div title="Dashboard">
              <div class="easyui-layout" style="height:100%">
                <div data-options="region: 'north'" style="height: 30px;">
                  <div id="toolbar-copy-dashboard">
                    <input id="USERCOPYDASHBOARD" style="width:200px"> <a class="easyui-linkbutton"
                      data-options="iconCls:'icon-save', plain:false" onclick="copyDataDashboard()">Copy Hak Akses
                      Dashboard</a>
                  </div>
                </div>
                <div data-options="region: 'center'">
                  <div id="table_data_akses_dashboard" fit="true"></div>
                </div>
              </div>
            </div>
            <div title="Perkiraan">
              <div class="easyui-layout" style="height:100%">
                <div data-options="region: 'north'" style="height: 30px;">
                  <div id="toolbar-copy-perkiraan">
                    <input id="USERCOPYPERKIRAAN" style="width:200px"> <a class="easyui-linkbutton"
                      data-options="iconCls:'icon-save', plain:false" onclick="copyDataPerkiraan()">Copy Hak Akses
                      Perkiraan</a>
                  </div>
                </div>
                <div data-options="region: 'center'">
                  <div id="datagrid_perkiraan" fit="true"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6;">
      <br>
      <a title="Simpan" class="easyui-tooltip" data-options="plain:false" id='btn_simpan'
        onclick="javascript:simpan()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
      <br><br>
      <a title="Tutup" class="easyui-tooltip" data-options="plain:false" onclick="javascript:tutup()"><img
          src="{{ asset('assets/images/cancel.png') }}"></a>
    </div>
  </form>
@endsection

@push('js')
  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-filter/datagrid-filter.js') }}">
  </script>
  <script>
    let fileGambar = null;
    var loaded = {
      menu: false,
      menu_pos: false,
      menu_pos_desktop: false,
      lokasi: false,
      dashboard: false,
      jam: false,
      perkiraan: false
    };

    function tutup() {
      parent.tutupTab();
    }

    $(function() {
      browse_data_perkiraan('#UUIDPERKIRAAN');
      buat_table_perkiraan();
      buat_table_jamakses();
      buat_table_akses_dashboard();

      $("#table_data_lokasi").datagrid({
        height: '190px',
        rownumbers: true,
        singleSelect: true,
        checkOnSelect: false,
        selectOnCheck: false,
        url: link_api.getLokasiAll,
        columns: [
          [{
              field: 'ck',
              title: '',
              width: 30,
              checkbox: true
            },
            {
              field: 'uuidlokasi',
              hidden: true
            },
            {
              field: 'kodelokasi',
              title: 'Kode',
              width: 80
            },
            {
              field: 'namalokasi',
              title: 'Nama',
              width: 250
            },
          ]
        ],
      });

      $("#table_data_lokasi_transfer").datagrid({
        height: '190px',
        width: '420px',
        rownumbers: true,
        singleSelect: true,
        checkOnSelect: false,
        selectOnCheck: false,
        url: link_api.getLokasiAll,
        columns: [
          [{
              field: 'ck',
              title: '',
              width: 30,
              checkbox: true
            },
            {
              field: 'uuidlokasi',
              hidden: true
            },
            {
              field: 'kodelokasi',
              title: 'Kode',
              width: 80
            },
            {
              field: 'namalokasi',
              title: 'Nama',
              width: 250
            },
          ]
        ],
      });

      $('#menu_tree').treegrid({
        height: '100%',
        lines: true,
        url: link_api.treeGridUser,
        rownumbers: true,
        idField: 'kodemenu',
        treeField: 'namamenu',
        columns: [
          [{
              field: 'namamenu',
              title: '',
              width: 220
            },
            {
              field: 'cbakses',
              title: 'Hak Akses',
              align: 'center',
              width: 70,
              formatter: function(val, row) {
                return buatCheckbox(row, row.hakakses, 'hakakses');
              }
            },
            {
              field: 'cbtambah',
              title: 'Tambah',
              align: 'center',
              width: 60,
              formatter: function(val, row) {
                return buatCheckbox(row, row.tambah, 'tambah');
              }
            },
            {
              field: 'cbubah',
              title: 'Ubah',
              align: 'center',
              width: 60,
              formatter: function(val, row) {
                return buatCheckbox(row, row.ubah, 'ubah');
              }
            },
            {
              field: 'cbhapus',
              title: 'Hapus',
              align: 'center',
              width: 60,
              formatter: function(val, row) {
                return buatCheckbox(row, row.hapus, 'hapus');
              }
            },
            {
              field: 'cbcetak',
              title: 'Cetak',
              align: 'center',
              width: 60,
              formatter: function(val, row) {
                return buatCheckbox(row, row.cetak, 'cetak');
              }
            },
            {
              field: 'cbbatalcetak',
              title: 'Batal Cetak',
              align: 'center',
              width: 70,
              formatter: function(val, row) {
                return buatCheckbox(row, row.batalcetak, 'batalcetak');
              }
            },
            {
              field: 'cbinputharga',
              title: 'Input Harga',
              align: 'center',
              width: 70,
              formatter: function(val, row) {
                return buatCheckbox(row, row.inputharga, 'inputharga');
              }
            },
            {
              field: 'cblihatharga',
              title: 'Lihat Harga',
              align: 'center',
              width: 70,
              formatter: function(val, row) {
                return buatCheckbox(row, row.lihatharga, 'lihatharga');
              }
            },
            {
              field: 'cblihathargabeli',
              title: 'Lihat Harga Beli',
              align: 'center',
              width: 100,
              formatter: function(val, row) {
                return buatCheckbox(row, row.lihathargabeli, 'lihathargabeli');
              }
            },
            {
              field: 'cbinputaterial',
              title: 'Input Material',
              align: 'center',
              width: 70,
              formatter: function(val, row) {
                return buatCheckbox(row, row.inputmaterial, 'inputmaterial');
              }
            },
            {
              field: 'cbinputbiaya',
              title: 'Input Biaya',
              align: 'center',
              width: 70,
              formatter: function(val, row) {
                return buatCheckbox(row, row.inputbiaya, 'inputbiaya');
              }
            },
            {
              field: 'cblihatsemuatrans',
              title: 'Lihat Semua',
              align: 'center',
              width: 75,
              formatter: function(val, row) {
                return buatCheckbox(row, row.lihatsemuatrans, 'lihatsemuatrans');
              }
            },
          ]
        ]
      });

      $('#menu_tree_pos').treegrid({
        height: '100%',
        lines: true,
        url: link_api.treeGridPosUser,
        rownumbers: true,
        idField: 'kodemenu',
        treeField: 'namamenu',
        columns: [
          [{
              field: 'namamenu',
              title: '',
              width: 220
            },
            {
              field: 'cbakses',
              title: 'Hak Akses',
              align: 'center',
              width: 70,
              formatter: function(val, row) {
                return buatCheckboxPOS(row, row.hakakses, 'hakakses');
              }
            },
            {
              field: 'cbtambah',
              title: 'Tambah',
              align: 'center',
              width: 60,
              formatter: function(val, row) {
                return buatCheckboxPOS(row, row.tambah, 'tambah');
              }
            },
            {
              field: 'cbubah',
              title: 'Ubah',
              align: 'center',
              width: 60,
              formatter: function(val, row) {
                return buatCheckboxPOS(row, row.ubah, 'ubah');
              }
            },
            {
              field: 'cblihatharga',
              title: 'Lihat Harga',
              align: 'center',
              width: 80,
              formatter: function(val, row) {
                return buatCheckboxPOS(row, row.lihatharga, 'lihatharga');
              }
            },
            {
              field: 'cbinputharga',
              title: 'Input Harga',
              align: 'center',
              width: 80,
              formatter: function(val, row) {
                return buatCheckboxPOS(row, row.inputharga, 'inputharga');
              }
            }
          ]
        ]
      });

      $('#menu_tree_pos_desktop').treegrid({
        height: '100%',
        lines: true,
        url: link_api.treeGridPosDesktopUser,
        rownumbers: true,
        idField: 'kodemenu',
        treeField: 'namamenu',
        columns: [
          [{
              field: 'namamenu',
              title: '',
              width: 220
            },
            {
              field: 'hakakses',
              title: 'Hak Akses',
              align: 'center',
              width: 70,
              formatter: function(val, row) {
                return buatCheckboxPOSDesktop(row, row.hakakses, 'hakakses');
              }
            }
          ]
        ]
      });

      $('#FILEGAMBAR').filebox({
        accept: 'image/*',
        onChange: function(newVal, oldVal) {
          var input = $(this).next().find('.textbox-value')[0];
          $('#gambar').val(newVal);

          if (input.files && input.files[0]) {
            fileGambar = input.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
      });

      $(
          '#USERCOPY, #USERCOPYAKSESPOS, #USERCOPYAKSESPOSDESKTOP, #USERCOPYPERKIRAAN, #USERCOPYJAMAKSES, #USERCOPYDASHBOARD'
        )
        .combogrid({
          panelWidth: 220,
          url: link_api.browseUser,
          idField: 'uuiduser',
          textField: 'nama',
          mode: 'remote',
          columns: [
            [{
                field: 'uuiduser',
                title: 'User ID',
                width: 220,
                sortable: true,
                hidden: true
              },
              {
                field: 'nama',
                title: 'User Name',
                width: 200,
                sortable: true
              },
            ]
          ],
        });

      if ("{{ $mode }}" == "tambah") {
        tambah();
        tutupLoader();
      } else if ("{{ $mode }}" == "ubah") {
        ubah();
      }
    })

    function tambah() {
      $('#form_input').form('clear');
      $('[name=act]').val('insert');
      $('#STATUS').prop('checked', true);
      $('#UUIDUSER').textbox('readonly', true);
      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#menu_tree').treegrid('load', {
        kode: ''
      });

      $('#menu_tree_pos').treegrid('load', {
        kode: ''
      });

      $('#menu_tree_pos_desktop').treegrid('load', {
        kode: ''
      });

      $('#datagrid_perkiraan').datagrid('load');
      $('#table_data_jamakses').datagrid('load');
      $('#table_data_akses_dashboard').datagrid('load');

      $('#mode').val('tambah');
      $('[name=authentication]').add($('[name=priority]'))
        .add($('[name=aksesutama]')).prop('checked', true)

      $('#preview-image').attr('src', "{{ asset('assets/foto_user/NO_IMAGE.jpg') }}");
    }

    async function ubah() {
      const form = new FormData();
      form.append('uuiduser', "{{ $data }}");
      const response = await fetchData(link_api.headerFormUser, form);
      const row = response.data;
      if (row) {
        $('#form_input').form('load', row);
        $('[name=act]').val('edit');
        $('#UUIDUSER').textbox('readonly');
        $('#RE_PASS').textbox('setValue', row.pass);
        $('#EMAIL').textbox('readonly', true);

        load_akses_lokasi();

        load_akses_lokasi_transfer();

        $('#menu_tree').treegrid('load', {
          kode: '{{ $data }}'
        });

        $('#menu_tree_pos').treegrid('load', {
          kode: '{{ $data }}'
        });

        $('#menu_tree_pos_desktop').treegrid('load', {
          kode: '{{ $data }}'
        });

        $('#datagrid_perkiraan').datagrid('load', {
          uuiduser: '{{ $data }}'
        });
        $('#table_data_jamakses').datagrid('load', {
          uuiduser: '{{ $data }}'
        });
        $('#table_data_akses_dashboard').datagrid('load', {
          uuiduser: '{{ $data }}'
        });

        // remove image
        // $('#preview-image').removeAttr('src').replaceWith($('#preview-image').clone());

        // load gambar
        var gambar = row.gambar_full_path;

        if (gambar && gambar != "") {
          $('#preview-image').attr('src', gambar);
        }

        $('#UUIDPERKIRAAN').combogrid('setValue', {
          uuidperkiraan: row.uuidperkiraan,
          nama: row.namaperkiraan
        });

        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          if (data.success && data.data.ubah != 1) {
            $('#btn_simpan').css('filter', 'grayscale(100%)').removeAttr('onclick');
          }
        });

        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);
        $('#mode').val('ubah');
      }
    }

    function cek_menu_pos(a, kodemenu) {
      var check = $('#cb-' + a + '-' + kodemenu).prop('checked') ? 1 : 0;

      var tg = $('#menu_tree_pos');

      var row = tg.treegrid('find', kodemenu);

      if (typeof row.hakakses == 'undefined') {
        row.hakakses = 0;
      }

      if (typeof row.tambah == 'undefined') {
        row.tambah = 0;
      }

      if (typeof row.ubah == 'undefined') {
        row.ubah = 0;
      }

      if (typeof row.inputharga == 'undefined') {
        row.inputharga = 0;
      }

      if (typeof row.lihatharga == 'undefined') {
        row.lihatharga = 0;
      }

      if (a == 'hakakses') {
        row.hakakses = row.tambah = row.ubah =
          row.inputharga = row.lihatharga = check;
      }

      if (a == 'tambah') {
        row.tambah = check;
      }

      if (a == 'ubah') {
        row.ubah = check;
      }

      if (a == 'inputharga') {
        row.inputharga = check;
      }

      if (a == 'lihatharga') {
        row.lihatharga = check;
      }

      $('#menu_tree_pos').treegrid('update', {
        id: kodemenu,
        row: row
      });

      tg.treegrid('showLines');
    }

    function cek_detail(a, kodemenu) {
      var check = $('#cb-' + a + '-' + kodemenu).prop('checked') ? 1 : 0;

      var tg = $('#menu_tree');

      var row = tg.treegrid('find', kodemenu);

      if (typeof row.hakakses == 'undefined') {
        row.hakakses = 0;
      }

      if (typeof row.tambah == 'undefined') {
        row.tambah = 0;
      }

      if (typeof row.ubah == 'undefined') {
        row.ubah = 0;
      }

      if (typeof row.hapus == 'undefined') {
        row.hapus = 0;
      }

      if (typeof row.cetak == 'undefined') {
        row.cetak = 0;
      }

      if (typeof row.batalcetak == 'undefined') {
        row.batalcetak = 0;
      }

      if (typeof row.inputharga == 'undefined') {
        row.inputharga = 0;
      }

      if (typeof row.lihatharga == 'undefined') {
        row.lihatharga = 0;
      }

      if (typeof row.lihathargabeli == 'undefined') {
        row.lihathargabeli = 0;
      }

      if (typeof row.lihatsemuatrans == 'undefined') {
        row.lihatsemuatrans = 0;
      }

      if (typeof row.inputmaterial == 'undefined') {
        row.inputmaterial = 0;
      }

      if (typeof row.inputbiaya == 'undefined') {
        row.inputbiaya = 0;
      }

      if (a == 'hakakses') {
        row.hakakses = row.tambah = row.ubah =
          row.hapus = row.cetak = row.batalcetak =
          row.inputharga = row.lihatharga = row.lihathargabeli = row.lihatsemuatrans = check;
      }

      if (a == 'tambah') {
        row.tambah = check;
      }

      if (a == 'ubah') {
        row.ubah = check;
      }

      if (a == 'hapus') {
        row.hapus = check;
      }

      if (a == 'cetak') {
        row.cetak = check;
      }

      if (a == 'batalcetak') {
        row.batalcetak = check;
      }

      if (a == 'inputharga') {
        row.inputharga = check;
      }

      if (a == 'lihatharga') {
        row.lihatharga = check;
      }

      if (a == 'lihathargabeli') {
        row.lihathargabeli = check;
      }

      if (a == 'lihatsemuatrans') {
        row.lihatsemuatrans = check;
      }

      if (a == 'inputmaterial') {
        row.inputmaterial = check;
      }

      if (a == 'inputbiaya') {
        row.inputbiaya = check;
      }

      $('#menu_tree').treegrid('update', {
        id: kodemenu,
        row: row
      });

      tg.treegrid('showLines');
    }

    function cek_menu_pos_desktop(a, kodemenu) {
      var check = $('#cb-' + a + '-' + kodemenu).prop('checked') ? 1 : 0;

      var tg = $('#menu_tree_pos_desktop');

      var row = tg.treegrid('find', kodemenu);

      if (typeof row.hakakses == 'undefined') {
        row.hakakses = 0;
      }

      if (typeof row.tambah == 'undefined') {
        row.tambah = 0;
      }

      if (a == 'hakakses') {
        row.hakakses = check;
      }

      if (a == 'tambah') {
        row.tambah = check;
      }

      $('#menu_tree_pos_desktop').treegrid('update', {
        id: kodemenu,
        row: row
      });

      tg.treegrid('showLines');
    }

    async function simpan() {
      var isValid = $('#form_input').form('validate');
      if (isValid) {
        tampilLoaderSimpan();
        const formData = new FormData();
        const data = $('#form_input :input').serializeArray();

        const data_array = ['data_detail', 'data_akses_pos', 'data_akses_pos_desktop', 'data_jamakses', 'data_lokasi',
          'data_lokasi_transfer', 'data_perkiraan', 'data_dashboard'
        ];

        for (const item of data) {
          if (!data_array.includes(item.name)) {
            formData.append(item.name, item.value);
          }
        }

        if (fileGambar) {
          formData.append('filegambar', fileGambar);
        }
        formData.append('data_detail', JSON.stringify($('#menu_tree').treegrid('getData')));
        formData.append('data_akses_pos', JSON.stringify($('#menu_tree_pos').treegrid('getData')));
        formData.append('data_akses_pos_desktop', JSON.stringify($('#menu_tree_pos_desktop').treegrid('getData')));
        formData.append('data_jamakses', JSON.stringify($('#table_data_jamakses').datagrid('getRows')));
        formData.append('data_lokasi', JSON.stringify($('#table_data_lokasi').datagrid('getChecked')));
        formData.append('data_lokasi_transfer', JSON.stringify($('#table_data_lokasi_transfer').datagrid(
          'getChecked')));
        formData.append('data_perkiraan', JSON.stringify($('#datagrid_perkiraan').datagrid('getChecked')));
        formData.append('data_dashboard', JSON.stringify($('#table_data_akses_dashboard').datagrid('getChecked')));

        try {
          const response = await fetchData(link_api.simpanUser, formData);
          tutupLoaderSimpan();
          var mode = $('#mode').val();
          if (response.success) {
            if (mode == 'tambah') {
              $.messager.alert(
                'Info',
                'Berhasil menyimpan data. Segera melakukan verifikasi melalui email yang telah kami kirim',
                'info',
              );
              tambah();
            } else {
              $.messager.alert('Info', 'Simpan Data Sukses', 'info');
              ubah();
            }
          } else {
            $.messager.alert('Error', response.message, 'error');
          }
        } catch (error) {
          tutupLoaderSimpan();
          const e = (typeof error === 'string') ? error : error.message;
          var textError = getTextError(e);
          $.messager.alert('Error', textError, 'error');
        }
      }
    }

    async function load_akses_lokasi() {
      try {
        const form = new FormData();
        form.append('uuiduser', "{{ $data }}");
        const response = await fetchData(link_api.getLokasiPerUser, form);
        var rows = $('#table_data_lokasi').datagrid('getRows');
        var ln = rows.length;

        for (var i = 0; i < ln; i++) {

          var data = response.data;
          var ln1 = data.length;

          for (var j = 0; j < ln1; j++) {
            if (rows[i].uuidlokasi == data[j].uuidlokasi) {
              $('#table_data_lokasi').datagrid('checkRow', i);
              break;
            }
          }
        }
        loaded.lokasi = true;
        close_loading();
      } catch (error) {
        const e = (typeof error === 'string') ? error : error.message;
        var textError = getTextError(e);
        $.messager.alert('Error', textError, 'error');
      }
    }

    async function load_akses_lokasi_transfer() {
      try {
        const form = new FormData();
        form.append('uuiduser', "{{ $data }}");
        const response = await fetchData(link_api.getLokasiTransferPerUser, form);
        var rows = $('#table_data_lokasi_transfer').datagrid('getRows');
        var ln = rows.length;

        for (var i = 0; i < ln; i++) {

          var data = response.data;
          var ln1 = data.length;

          for (var j = 0; j < ln1; j++) {
            if (rows[i].uuidlokasi == data[j].uuidlokasi) {
              $('#table_data_lokasi_transfer').datagrid('checkRow', i);
              break;
            }
          }
        }
        loaded.lokasi = true;
        close_loading();
      } catch (error) {
        console.error('Erro Get Lokasi Transfer Per User:', error);
        const e = (typeof error === 'string') ? error : error.message;
        var textError = getTextError(e);
        $.messager.alert('Error', textError, 'error');
      }
    }

    function buatCheckboxPOSDesktop(row, check, a) {
      var tipe = row.tipe;
      var kodemenu = row.kodemenu;
      var kodeinduk = row.kodeinduk;

      // if (daftar_akses[row.namamenu]) {
      // 	if (daftar_akses[row.namamenu].indexOf(a) > -1) {
      return '<input type="checkbox" ' + (check == 0 ? '' : 'checked') + ' id="cb-' + a + '-' + kodemenu +
        '" class="cb-' + a + '-' + kodeinduk + '" onchange="cek_menu_pos_desktop(\'' + a + '\', \'' + kodemenu +
        '\')" value="' + kodemenu + '">';
      // 	}
      // }
    }

    function buatCheckboxPOS(row, check, a) {
      var tipe = row.tipe;
      var kodemenu = row.kodemenu;
      var kodeinduk = row.kodeinduk;

      var daftar_akses = {
        'Antrian': [
          'hakakses', 'tambah', 'ubah', 'tambah', 'lihatharga', 'inputharga'
        ],
        'Penjualan': [
          'hakakses', 'tambah', 'ubah', 'tambah', 'lihatharga', 'inputharga'
        ],
        'Batal Pembayaran': [
          'hakakses'
        ],
        'Tutup Transaksi Harian': [
          'hakakses'
        ],
        'Batal Tutup Transaksi Harian': [
          'hakakses'
        ],
        'Pelanggan': [
          'hakakses', 'tambah'
        ],
        'Laporan Penjualan': [
          'hakakses', 'lihatharga'
        ]
      };

      if (daftar_akses[row.namamenu]) {
        if (daftar_akses[row.namamenu].indexOf(a) > -1) {
          return '<input type="checkbox" ' + (check == 0 ? '' : 'checked') + ' id="cb-' + a + '-' + kodemenu +
            '" class="cb-' + a + '-' + kodeinduk + '" onchange="cek_menu_pos(\'' + a + '\', \'' + kodemenu +
            '\')" value="' + kodemenu + '">';
        }
      }
    }

    function buat_table_perkiraan() {
      $("#datagrid_perkiraan").datagrid({
        rownumbers: true,
        checkOnSelect: false,
        selectOnCheck: false,
        url: link_api.userGetDataPerkiraan,
        columns: [
          [{
              field: 'akses',
              title: '',
              width: 30,
              checkbox: true
            },
            {
              field: 'kodeperkiraan',
              title: 'Kode Akun',
              width: 100
            },
            {
              field: 'namaperkiraan',
              title: 'Akun',
              width: 250
            }
          ]
        ],
        onUncheck: function(index, data) {
          $(this).datagrid('updateRow', {
            index: index,
            row: {
              akses: 0
            }
          });
        },
        onCheck: function(index, data) {
          $(this).datagrid('updateRow', {
            index: index,
            row: {
              akses: 1
            }
          });
        },
        onUncheckAll: function(data) {
          for (var i = 0; i < data.length; i++) {
            $(this).datagrid('updateRow', {
              index: i,
              row: {
                akses: 0
              }
            });
          }
        },
        onCheckAll: function(data) {
          for (var i = 0; i < data.length; i++) {
            $(this).datagrid('updateRow', {
              index: i,
              row: {
                akses: 1
              }
            });
          }
        },
        onLoadSuccess: function(data) {
          for (var i = 0; i < data.rows.length; i++) {
            if (data.rows[i].akses == 1) {
              $(this).datagrid('checkRow', i);
            }
          }
        }
      });
    }

    function buat_table_jamakses() {
      $("#table_data_jamakses").datagrid({
        rownumbers: true,
        singleSelect: true,
        url: link_api.getJamAksesUser,
        clickToEdit: true,
        RowAdd: false,
        RowDelete: false,
        columns: [
          [{
              field: 'hari',
              title: 'Hari',
              width: 80,
              formatter: function(data) {
                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

                return hari[data - 1];
              }
            },
            {
              field: 'jamaksesawal',
              title: 'Dari',
              width: 80,
              editor: {
                type: 'timespinner',
                options: {
                  showSeconds: true
                }
              }
            },
            {
              field: 'jamaksesakhir',
              title: 'Sampai',
              width: 80,
              editor: {
                type: 'timespinner',
                options: {
                  showSeconds: true
                }
              }
            },
          ]
        ],
        onLoadSuccess: function() {
          loaded.jam = true;
          close_loading();
        }
      }).datagrid('enableCellEditing');
    }

    function buat_table_akses_dashboard() {
      $("#table_data_akses_dashboard").datagrid({
        rownumbers: true,
        checkOnSelect: false,
        selectOnCheck: false,
        url: link_api.getDahboardAksesUser,
        columns: [
          [{
              field: 'hakakses',
              title: '',
              width: 30,
              checkbox: true
            },
            {
              field: 'namadashboard',
              title: 'Dashboard',
              width: 300
            },
          ]
        ],
        onUncheck: function(index, data) {
          $(this).datagrid('updateRow', {
            index: index,
            row: {
              hakakses: 0
            }
          });
        },
        onCheck: function(index, data) {
          $(this).datagrid('updateRow', {
            index: index,
            row: {
              hakakses: 1
            }
          });
        },
        onUncheckAll: function(data) {
          for (var i = 0; i < data.length; i++) {
            $(this).datagrid('updateRow', {
              index: i,
              row: {
                hakakses: 0
              }
            });
          }
        },
        onCheckAll: function(data) {
          for (var i = 0; i < data.length; i++) {
            $(this).datagrid('updateRow', {
              index: i,
              row: {
                hakakses: 1
              }
            });
          }
        },
        onLoadSuccess: function(data) {
          for (var i = 0; i < data.rows.length; i++) {
            if (data.rows[i].hakakses == 1) {
              $(this).datagrid('checkRow', i);
            }
          }
          loaded.dashboard = true;
          close_loading();
        }
      });
    }

    function browse_data_perkiraan(id) {
      $(id).combogrid({
        required: false,
        panelWidth: 330,
        mode: 'remote',
        idField: 'uuidperkiraan',
        textField: 'nama',
        sortName: 'kode',
        sortOrder: 'asc',
        url: link_api.browsePerkiraan,
        onBeforeLoad: async function(param) {
          param.jenis = 'kas';
          param.aktif = 1;
        },
        columns: [
          [{
              field: 'uuidperkiraan',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode Akun',
              width: 80
            },
            {
              field: 'nama',
              title: 'Nama Akun',
              width: 235
            },
          ]
        ]
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

    function copyData() {
      var id = $('#USERCOPY').combogrid('getValue')

      $('#menu_tree').treegrid('load', {
        kode: id
      });

      $.messager.alert('Info', 'Hak Akses Sukses Dicopy', 'info');
    }

    function copyDataAksesPOS() {
      var id = $('#USERCOPYAKSESPOS').combogrid('getValue')

      $('#menu_tree_pos').treegrid('load', {
        kode: id
      });

      $.messager.alert('Info', 'Hak Akses POS Sukses Dicopy', 'info');
    }

    function copyDataAksesPOSDesktop() {
      var id = $('#USERCOPYAKSESPOSDESKTOP').combogrid('getValue')

      $('#menu_tree_pos_desktop').treegrid('load', {
        kode: id
      });

      $.messager.alert('Info', 'Hak Akses POS Desktop Sukses Dicopy', 'info');
    }

    function copyDataPerkiraan() {
      var id = $('#USERCOPYPERKIRAAN').combogrid('getValue');

      $('#datagrid_perkiraan').datagrid('load', {
        uuiduser: id
      });

      $.messager.alert('Info', 'Hak Akses Perkiraan Sukses Dicopy', 'info');
    }

    function copyDataDashboard() {
      var id = $('#USERCOPYDASHBOARD').combogrid('getValue');

      $('#table_data_akses_dashboard').datagrid('load', {
        uuiduser: id
      });

      $.messager.alert('Info', 'Hak Akses Dashboard Sukses Dicopy', 'info');
    }

    function copyDataJamAkses() {
      var id = $('#USERCOPYJAMAKSES').combogrid('getValue');

      $('#table_data_jamakses').datagrid('load', {
        uuiduser: id
      });

      $.messager.alert('Info', 'Jam Akses Sukses Dicopy', 'info');
    }

    function buatCheckbox(row, check, a) {
      var tipe = row.tipe;
      var kodemenu = row.kodemenu;
      var kodeinduk = row.kodeinduk;

      if (a == 'lihatsemuatrans' && (row.namainduk.includes('Pesanan Penjualan (SO)') || row.namamenu.includes(
          'Pesanan Penjualan (SO)'))) {
        if ((tipe == 'HEADER' && (kodeinduk == null || kodeinduk == ''))) {
          return '';
        } else if (tipe == 'DETAIL') {
          return '<input type="checkbox" ' + (check == 0 ? '' : 'checked') + ' id="cb-' + a + '-' + kodemenu +
            '" class="cb-' + a + '-' + kodeinduk + '" onchange="cek_detail(\'' + a + '\', \'' + kodemenu +
            '\')" value="' + kodemenu + '">';
        } else {
          return '<input type="checkbox" id="cb-' + a + '-' + kodemenu + '" onchange="cek_header(\'' + a + '\', \'' +
            kodemenu + '\')">';
        }
      } else if ((a == 'inputmaterial' || a == 'inputbiaya') && row.namainduk.includes('Master') && row.namamenu.includes(
          'Komposisi') && !row.namainduk.includes('Laporan')) {
        return '<input type="checkbox" ' + (check == 0 ? '' : 'checked') + ' id="cb-' + a + '-' + kodemenu +
          '" class="cb-' + a + '-' + kodeinduk + '" onchange="cek_detail(\'' + a + '\', \'' + kodemenu + '\')" value="' +
          kodemenu + '">';
      } else if (row.namainduk == 'Master') {
        // jika merupakan menu master
        // maka cukup ditampilkan opsi hakakses, tambah, ubah, dan hapus saja
        let arr = [
          'hakakses',
          'tambah',
          'ubah',
          'hapus'
        ];

        if (tipe == 'DETAIL') {
          if (arr.indexOf(a) > -1) {
            return '<input type="checkbox" ' + (check == 0 ? '' : 'checked') + ' id="cb-' + a + '-' + kodemenu +
              '" class="cb-' + a + '-' + kodeinduk + '" onchange="cek_detail(\'' + a + '\', \'' + kodemenu +
              '\')" value="' + kodemenu + '">';
          } else {
            return '';
          }
        }

        return '';
      } else if (row.namainduk.includes('Laporan') || row.namamenu.includes('Laporan')) {
        if ((tipe == 'HEADER' && (kodeinduk == null || kodeinduk == '')) || (a != 'exportexcel' && a != 'hakakses' && a !=
            'lihatharga')) {
          return '';
        } else if (tipe == 'DETAIL') {
          return '<input type="checkbox" ' + (check == 0 ? '' : 'checked') + ' id="cb-' + a + '-' + kodemenu +
            '" class="cb-' + a + '-' + kodeinduk + '" onchange="cek_detail(\'' + a + '\', \'' + kodemenu +
            '\')" value="' + kodemenu + '">';
        } else {
          return '<input type="checkbox" id="cb-' + a + '-' + kodemenu + '" onchange="cek_header(\'' + a + '\', \'' +
            kodemenu + '\')">';
        }
      } else if (row.namainduk == 'Fitur' || row.namamenu == 'Fitur') {
        if (a == 'hakakses') {
          return '<input type="checkbox" ' + (check == 0 ? '' : 'checked') + ' id="cb-' + a + '-' + kodemenu +
            '" class="cb-' + a + '-' + kodeinduk + '" onchange="cek_detail(\'' + a + '\', \'' + kodemenu +
            '\')" value="' + kodemenu + '">';
        } else {
          return '';
        }
      } else if (['lihatsemuatrans', 'inputmaterial', 'inputbiaya', 'lihathargabeli'].indexOf(a) == -1) {
        if (row.namamenu == 'Master') {
          return '';
        } else if (tipe == 'HEADER' && (kodeinduk == null || kodeinduk == '')) {
          return '<input type="checkbox" id="cb-' + a + '-' + kodemenu + '" onchange="cek_header(\'' + a + '\', \'' +
            kodemenu + '\')">';
        } else if (tipe == 'DETAIL') {
          return '<input type="checkbox" ' + (check == 0 ? '' : 'checked') + ' id="cb-' + a + '-' + kodemenu +
            '" class="cb-' + a + '-' + kodeinduk + '" onchange="cek_detail(\'' + a + '\', \'' + kodemenu +
            '\')" value="' + kodemenu + '">';
        }
      } else if (a == 'lihathargabeli') {
        if (row.tipe == 'DETAIL' && (row.namamenu == 'Pesanan Penjualan (SO)' || row.namamenu == 'Penjualan')) {
          return '<input type="checkbox" ' + (check == 0 ? '' : 'checked') + ' id="cb-' + a + '-' + kodemenu +
            '" class="cb-' + a + '-' + kodeinduk + '" onchange="cek_detail(\'' + a + '\', \'' + kodemenu +
            '\')" value="' + kodemenu + '">';
        } else {
          return '';
        }
      }
    }

    function cek_header(a, induk) {
      var check = $('#cb-' + a + '-' + induk).prop('checked') ? 1 : 0;

      var tg = $('#menu_tree');

      $('.cb-' + a + '-' + induk).each(function() {
        var kodemenu = $(this).val();

        var row = tg.treegrid('find', kodemenu);

        if (typeof row.hakakses == 'undefined')
          row.hakakses = 0;
        if (typeof row.tambah == 'undefined')
          row.tambah = 0;
        if (typeof row.ubah == 'undefined')
          row.ubah = 0;
        if (typeof row.hapus == 'undefined')
          row.hapus = 0;
        if (typeof row.cetak == 'undefined')
          row.cetak = 0;
        if (typeof row.batalcetak == 'undefined')
          row.batalcetak = 0;
        if (typeof row.inputharga == 'undefined')
          row.inputharga = 0;
        if (typeof row.lihatharga == 'undefined')
          row.lihatharga = 0;
        if (typeof row.lihatsemuatrans == 'undefined')
          row.lihatsemuatrans = 0;

        if (a == 'hakakses')
          row.hakakses = check;
        if (a == 'tambah')
          row.tambah = check;
        if (a == 'ubah')
          row.ubah = check;
        if (a == 'hapus')
          row.hapus = check;
        if (a == 'cetak')
          row.cetak = check;
        if (a == 'batalcetak')
          row.batalcetak = check;
        if (a == 'inputharga')
          row.inputharga = check;
        if (a == 'lihatharga')
          row.lihatharga = check;
        if (a == 'lihatsemuatrans')
          row.lihatsemuatrans = check;

        $('#menu_tree').treegrid('update', {
          id: kodemenu,
          row: row
        });
      });

      tg.treegrid('showLines');
    }

    function is_loaded() {
      for (var i in loaded) {
        if (loaded[i] === false) {
          return false;
        }
      }
      return true;
    }

    function close_loading() {
      if (is_loaded()) {
        $.messager.progress('close');
      }
    }
  </script>
@endpush
