@extends('template.form')

@section('content')
  <style>
    .numberbox .textbox-text {
      text-align: left !important;
    }
  </style>
  <div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">

            <input type="hidden" name="mode" id="mode">
            <input type="hidden" name="uuidcustomer" id="IDCUSTOMER">
            <input type="hidden" name="tglentry" id="tglentry">
            <input type="hidden" id="data_custlokasi" name="data_custlokasi">
            <input type="hidden" id="data_custbarang" name="data_custbarang">
            <input type="hidden" id="data_custnpwp" name="data_custnpwp">

            <div id="tabs" class="easyui-tabs" style="width:100%;height:550px;" plain='true'>
              <div title="Customer Information">
                <table style="padding:5px" border="0">
                  <tr>
                    <td align="right" id="label_form" style='width: 100px'>Kode Customer</td>
                    <td><input id="KODECUSTOMER" name="kodecustomer" style="width:100px" class="label_input"
                        validType='length[0,20]'></input>
                      <label id="label_form"><input type="checkbox" id="STATUS" name="status" value="1">
                        Aktif</label>
                      <!--<input type="hidden" name="idkategoribarang" style="width:250px" class="label_input" required="true" validType='length[0,100]' hidden>-->
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Nama</td>
                    <td><input id="BADANUSAHA" name="badanusaha" style="width:100px" prompt="BADAN USAHA">
                      <input id="NAMACUSTOMER" name="namacustomer" style="width:250px" class="label_input"
                        validType='length[0,100]' required>
                    </td>
                  </tr>
                  <tr hidden>
                    <td align="right" id="label_form">Induk / Subinduk</td>
                    <td>
                      <select id="JENISCUSTOMER" name="jeniscustomer" style="width:100px"
                        class="easyui-combobox label_input" data-options="panelHeight:'auto'">
                        <option value="PARENT">INDUK</option>
                        <option value="CHILD">SUBINDUK</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Tipe Customer</td>
                    <td>
                      <input id="KODETIPECUSTOMERMASTER" name="kodetipecustomer" style="width: 100px;">
                      <a id="tambah_tipe_customer" title="Input Tipe Customer Baru"
                        class="easyui-linkbutton easyui-tooltip " plain="true" iconCls="icon-add"
                        onclick="pilih_tipe_customer()">
                    </td>
                  </tr>
                  <tr id="v-cust-induk">
                    <td align="right" id="label_form">Customer Induk</td>
                    <td><input name="uuidinduk" id="IDINDUK" style="width:250px"></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Alamat</td>
                    <td id="label_form">
                      <input name="alamat" style="width:355px" class="label_input" validType='length[0,300]'>
                      &nbsp; Kode Pos
                      <input name="kodepos" style="width:150px" class="label_input easyui-numberbox" validType='length[0,100]'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Kota</td>
                    <td id="label_form">
                      <input name="kota" style="width:150px" class="label_input" validType='length[0,100]'>
                      &nbsp; Propinsi
                      <input name="propinsi" style="width:150px" class="label_input" validType='length[0,100]'>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Negara
                      <input name="negara" style="width:150px" class="label_input" validType='length[0,100]'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Telp</td>
                    <td id="label_form">
                      <input name="telp" style="width:150px" class="label_input easyui-numberbox" validType='length[0,50]'>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fax
                      <input name="fax" style="width:150px" class="label_input easyui-numberbox" validType='length[0,50]'>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; HP
                      <input name="hp" style="width:150px" class="label_input easyui-numberbox" validType='length[0,50]'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">E-mail</td>
                    <td id="label_form"><input name="email" style="width:225px" class="label_input"
                        validType="email">
                      &nbsp;&nbsp;&nbsp; Website
                      <input name="website" style="width:225px" class="label_input" validType='url'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Syarat Bayar</td>
                    <td align="left" id="label_form">
                      <input name="uuidsyaratbayar" id="UUIDSYARATBAYAR" style="width:150px">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Disc Min
                      <input id="DISCOUNTMIN" name="discountmin" style="width:70px;" class="label_input easyui-numberbox"
                        validType='length[0,14]'
                        data-options="precision:2,decimalSeparator:'.',required:true,suffix:'%'">
                      &nbsp;&nbsp;<span id="label_form">Disc Max</span>
                      <input id="DISCOUNTMAX" name="discountmax" style="width:70px;" class="label_input easyui-numberbox"
                        validType='length[0,14]'
                        data-options="precision:2,decimalSeparator:'.',required:true,suffix:'%'">
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Marketing</td>
                    <td id="label_form">
                      <input name="uuidmarketing" id="IDMARKETING" style="width:150px">
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Limit Piutang</td>
                    <td id="label_form">
                      <input name="maxcredit" style="width:150px;" class="number" validType='length[0,50]'
                        data-options="required:true, min:'0', value:'0',precision:2,decimalSeparator:'.',prefix:'Rp.'">
                      &nbsp; Jml Maksimum Nota Belum Terbayar
                      <input name="maxnota" style="width:50px;" class="number" validType='length[0,18]'
                        data-options="required:true, min:'0', value:'0'">
                    <td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form"></td>
                    <td id="label_form">

                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form"></td>
                    <td>
                      <label id="label_form"><input type="checkbox" id="CEKNOTAJATUHTEMPO" name="ceknotajatuhtempo"
                          value="1">Jika ada piutang atas pelanggan ini yang sudah lewat jatuh tempo, transaksi
                        tidak dapat dilakukan</label>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">No Rekening</td>
                    <td id="label_form">
                      <input name="norek" style="width:150px;" class="label_input easyui-numberbox" validType='length[0,100]'>
                      Virtual Acc
                      <input name="virtualaccount" style="width:2150px25px;" class="label_input easyui-numberbox"
                        validType='length[0,100]'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Latitude</td>
                    <td id="label_form">
                      <input name="latitude" class="label_input easyui-numberbox" style="width:150px;" type="text"
                        data-options="precision:10">
                      Longitude <input name="longitude" class="label_input easyui-numberbox" style="width:150px;"
                        type="text" data-options="precision:10">
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form"></td>
                    <td id="label_form">
                      Informasi Latitude dan Longitude untuk keperluan penggunaan aplikasi Atena Distro
                    </td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" id="label_form">Catatan</td>
                    <td>
                      <textarea name="catatan" style="width:325px; height:60px;  display: inline-block;" class="label_input"
                        multiline='true' validType='length[0,300]'></textarea>
                    </td>
                  </tr>
                </table>
              </div>
              <div title="Pajak">
                <table style="padding:5px" border="0">
                  <tr>
                    <td align="right" id="label_form">Nama di Faktur Pajak</td>
                    <td><input name="namafakturpajak" style="width:400px" class="label_input"
                        validType='length[0,300]'></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Alamat di Faktur Pajak</td>
                    <td><input name="alamatfakturpajak" style="width:400px" class="label_input"
                        validType='length[0,500]'></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">No. KTP</td>
                    <td><input name="noktp" style="width:400px" class="label_input easyui-numberbox" validType='length[0,100]'></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">NPWP</td>
                    <td><input name="npwp" id="NPWP" style="width:400px" class="label_input"
                        validType='length[0,100]'></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">NITKU</td>
                    <td><input name="nitku" id="NITKU" style="width:400px" class="label_input"
                        validType='length[0,100]'></td>
                  </tr>
                  <tr hidden>
                    <td align="right" id="label_form">NPWP</td>
                    <td><input type="checkbox" id="ADANPWP" name="adanpwp" value="1"></td>
                  </tr>
                  <tr hidden>
                    <td></td>
                    <td>
                      <div style="width:100%;height:200px">
                        <table id="table_data_custnpwp" name="table_data_custnpwp" fit="true"></table>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
              <div title="Contact Person">
                <table style="padding:5px">
                  <tr>
                    <td align="right" id="label_form" style='width: 100px'>Nama</td>
                    <td><input name="contactperson" style="width:250px" class="label_input" validType='length[0,50]'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Telp/HP</td>
                    <td><input name="telpcontactperson" style="width:250px" class="label_input easyui-numberbox"
                        validType='length[0,50]'></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">E-mail</td>
                    <td><input name="emailcontactperson" style="width:250px" class="label_input" validType="email">
                    </td>
                  </tr>
                </table>
              </div>
              <div title="Informasi Piutang">
                <fieldset style="height: 160px">
                  <legend>Riwayat Approve Limit Piutang</legend>
                  <table id="table_data_ubah_status_piutang" style="height: 150px"></table>
                </fieldset>
                <fieldset style="height: 310px;">
                  <legend>Riwayat Piutang</legend>
                  <table id="table_data_riwayat_piutang" style="height: 300px"></table>
                </fieldset>
              </div>
            </div>
            <div id="dlg-buttons" style="position: fixed;bottom:0;background-color: white;width:100%;">
              <table cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input
                      :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">| Tgl
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
      <a title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false" id='btn_simpan'
        onclick="javascript:simpan()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
      <br><br>
      <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
        onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
    </div>
  </div>


  <div id="form_tipe_customer" title="Input Tipe Customer Baru">
    <table style="padding:5px">
      <tr>
        <td>
          <table>
            <tr>
              <td align="right" id="label_form">Kode</td>
              <td><input id="KODETIPECUSTOMER" name="kodetipecustomer" style="width:200px" class="label_input">
              </td>
            </tr>
            <tr>
              <td align="right" id="label_form">Nama</td>
              <td><input id="NAMATIPECUSTOMER" name="namatipecustomer" style="width:200px" class="label_input"
                  required="true" validType='length[0,100]'></td>
            </tr>
            <tr>
              <td align="right" id="label_form">Disc Min</td>
              <td><input id="DISCOUNTMINTIPE" name="discountmin" style="width:70px;" class="label_input easyui-numberbox"
                  validType='length[0,14]' data-options="precision:2,required:true,decimalSeparator:'.',suffix:'%'">
                &nbsp;&nbsp;<span id="label_form">Disc Max</span>
                <input id="DISCOUNTMAXTIPE" name="discountmax" style="width:70px;" class="label_input easyui-numberbox"
                  validType='length[0,14]' data-options="precision:2,required:true,decimalSeparator:'.',suffix:'%'">
              </td>
            </tr>
            <tr>
              <td valign="top" align="right" id="label_form">Catatan</td>
              <td>
                <textarea id="CATATAN" name="catatan" style="width:200px; height:50px" class="label_input" multiline="true"
                  validType='length[0,300]'></textarea>
              </td>
            </tr>
          </table>
        </td>

        <td valign="top">
          <table>
            <tr>
              <td style="text-align:right">
                <a title="Simpan" class="easyui-tooltip "iconCls="" data-options="plain:false" id='btn_simpan'
                  onclick="javascript:simpan_tipe_customer()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
                <br>
                <br>
                <br>
                <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
                  onclick="javascript:tutup_tipe_customer()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </div>

  <div id="form_plafonoverdue" title="Approve Limit Piutang">
    <table style="padding:5px">
      <tr>
        <td>
          <table>
            <tr>
              <td align="right" id="label_form">Kd. Customer</td>
              <td><input id="KODECUSTOMERUBAHSTATUSPIUTANG" name="kodecustomerubahstatuspiutang" style="width:200px"
                  class="label_input" required="true" validType='length[0,100]' readonly></td>
            </tr>
            <tr>
              <td align="right" id="label_form">Nama Customer</td>
              <td><input id="NAMACUSTOMERUBAHSTATUSPIUTANG" name="namacustomerubahstatuspiutang" style="width:200px"
                  class="label_input" required="true" validType='length[0,100]' readonly></td>
            </tr>
            <tr>
              <td align="right" valign="top" id="label_form">Tgl. Jual</td>
              <td>
                <input class="date" name="tgljualubahstatuspiutang" id="TGLJUALUBAHSTATUSPIUTANG"
                  style="width: 100px;">
              </td>
            </tr>
            <tr>
              <td align="right" valign="top" id="label_form">Approve Limit</td>
              <td>
                <label id="label_form"><input type="checkbox" id="SEMUAUBAHSTATUSPIUTANG"
                    name="semuaubahstatuspiutang" value="1"> Semua</label><br>
                <label id="label_form"><input type="checkbox" id="PLAFONUBAHSTATUSPIUTANG"
                    name="plafonubahstatuspiutang" value="1"> Plafon</label><br>
                <label id="label_form"><input type="checkbox" id="JUMLAHNOTAUBAHSTATUSPIUTANG"
                    name="jumlahnotaubahstatuspiutang" value="1"> Limit Jumlah Nota</label><br>
                <label id="label_form"><input type="checkbox" id="JATUHTEMPOUBAHSTATUSPIUTANG"
                    name="jatuhtempoubahstatuspiutang" value="1"> Lewat Jatuh Tempo</label>
              </td>
            </tr>
          </table>
        </td>

        <td valign="top">
          <table>
            <tr>
              <td style="text-align:right">
                <a title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false" id='btn_simpan'
                  onclick="simpan_ubah_status_piutang()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </div>

  <div id="alasan_pembatalan" title="Alasan Pembatalan">
    <table style="padding:5px">
      <tr>
        <td>
          <textarea prompt="Alasan Pembatalan" name="alasanpembatalan" class="label_input" id="ALASANPEMBATALAN"
            multiline="true" style="width:300px; height:55px" data-options="validType:'length[0, 500]'"></textarea>
        </td>
      </tr>
    </table>
    <input id="IDPEMBATALANUBAHSTATUSPIUTANG" name="idpembatalanubahstatuspiutang" type="hidden">
  </div>

  <div id="alasan_pembatalan-buttons">
    <table cellpadding="0" cellspacing="0" style="width:100%">
      <tr>
        <td style="text-align:right">
          <a class="easyui-linkbutton" iconCls="icon-save" id='btn_ubah_perusahaan'
            onclick="javascript:batal_trans_ubah_status_trans()">Batal</a>
        </td>
      </tr>
    </table>
  </div>

  <div id="toolbar-statuspiutang">
    <a href="#" class="easyui-linkbutton" onclick="tampilFormUbahStatusPiutang()">Tambah</a>
    <a href="#" class="easyui-linkbutton" onclick="batal_trans_ubah_status_trans()">Batal</a>
  </div>
@endsection

@push('js')
  <script>
    var idbatalstatuspiutang;

    function tutup_tipe_customer() {
      $("#form_tipe_customer").dialog('close');
    }

    $(document).ready(function() {

      browse_tipe_customer('#KODETIPECUSTOMERMASTER');

      buat_table_informasi_piutang();

      $('#v-cust-induk').hide();

      $('[name=uuidsyaratbayar]').combogrid({
        required: true,
        panelWidth: 335,
        mode: 'local',
        idField: 'uuidsyaratbayar',
        textField: 'nama',
        sortName: 'kode',
        sortOrder: 'asc',
        url: link_api.browseSyaratBayar,
        columns: [
          [{
              field: 'uuidsyaratbayar',
              title: 'ID',
              width: 80,
              hidden: 'true'
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 80
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 250
            }
          ]
        ]
      });

      $('#BADANUSAHA').combogrid({
        panelWidth: 120,
        mode: 'remote',
        idField: 'badanusaha',
        textField: 'badanusaha',
        sortName: 'badanusaha',
        sortOrder: 'asc',
        url: link_api.browseBadanUsahaCustomer,
        columns: [
          [{
            field: 'badanusaha',
            title: 'Badan Usaha',
            width: 100
          }]
        ]
      });

      $('#IDMARKETING').combogrid({
        required: true,
        panelWidth: 225,
        mode: 'remote',
        idField: 'uuidkaryawan',
        textField: 'nama',
        sortName: 'kode',
        sortOrder: 'asc',
        url: link_api.browseKaryawanMarketing,
        onBeforeLoad: function(param) {
          param.divisi = "marketing";
        },
        columns: [
          [{
              field: 'uuidkaryawan',
              title: 'ID',
              width: 80,
              hidden: 'true'
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 70
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 150
            }
          ]
        ]
      });

      $('#JENISCUSTOMER').combobox({
        onChange: function(newVal, oldVal) {
          if (newVal == "PARENT") {
            $("#v-cust-induk").hide();
            //$("IDINDUK").combogrid().required = false;
          } else if (newVal == "CHILD") {
            $("#v-cust-induk").show();
            //$("IDINDUK").combogrid().required = true;
          }
        }
      });

      $('#IDINDUK').combogrid({
        //required:true,
        panelWidth: 225,
        mode: 'remote',
        idField: 'uuidcustomer',
        textField: 'nama',
        sortName: 'kode',
        sortOrder: 'asc',
        url: link_api.browseCustomerInduk,
        columns: [
          [{
              field: 'uuidcustomer',
              title: 'ID',
              width: 80,
              hidden: 'true'
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 70
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 150
            }
          ]
        ]
      });

      $("#table_data_custlokasi").datagrid({
        height: '100%',
        rownumbers: true,
        singleSelect: true,
        checkOnSelect: false,
        selectOnCheck: false,
        url: link_api.getLokasiAll,
        columns: [
          [{
              field: 'idlokasi',
              hidden: true
            },
            {
              field: 'namalokasi',
              title: 'Nama Lokasi',
              width: 150
            },
            {
              field: 'ck',
              title: '',
              width: 30,
              checkbox: true
            },
          ]
        ],
        onCheck: function(index, row) {
          $(this).datagrid('updateRow', {
            index: index,
            row: {
              status: 1,
            }
          });
        },
        onUncheck: function(index, row) {
          $(this).datagrid('updateRow', {
            index: index,
            row: {
              status: 0,
            }
          });
        },
        onCheckAll: function(rows) {
          for (var i = 0; i < rows.length; i++) {
            $(this).datagrid('updateRow', {
              index: i,
              row: {
                status: 1,
              }
            });
          }
        },
        onUncheckAll: function(rows) {
          for (var i = 0; i < rows.length; i++) {
            $(this).datagrid('updateRow', {
              index: i,
              row: {
                status: 0,
              }
            });
          }
        },
      });

      $("#form_tipe_customer").dialog({
        onOpen: function() {
          $("#NAMATIPECUSTOMER").textbox('clear');
          $("#DISCOUNT").textbox('setValue', '0');
          $("#CATATAN").textbox('clear');
        },
      }).dialog('close');

      $("#table_data_custnpwp").datagrid({
        width: '100%',
        fit: true,
        clickToEdit: false,
        dblclickToEdit: true,
        rownumbers: true,
        data: [],
        columns: [
          [
            //{field:'IDCUSTOMER',hidden:true},
            {
              field: 'npwp',
              title: 'NPWP',
              width: 250,
              editor: {
                type: 'textbox'
              }
            },
            {
              field: 'tglaktif',
              title: 'Tanggal Aktif',
              align: 'center',
              width: 115,
              editor: {
                type: 'datebox',
              }
            },
          ]
        ],
        onCellEdit: function(index, field, val) {
          /*
          var row = $(this).datagrid('getRows')[index];
          var ed  = get_editor ('#table_data_custbarang', index, field);
          if (field == 'KODEBARANG') {
          	ed.combogrid('grid').datagrid('options').url = base_url+'atena/Master/Data/Barang/comboGrid';
          	ed.combogrid('grid').datagrid('load', {q:''});
          	ed.combogrid('showPanel');
          }
          */
        },
        onEndEdit: function(index, row, changes) {
          /*
          var cell = $(this).datagrid('cell');
          var ed = get_editor ('#table_data_custbarang', index, cell.field);
          var row_update = {};
          switch(cell.field) {
          	case 'KODEBARANG':
          		var data = ed.combogrid('grid').datagrid('getSelected');
          		var id = data ? data.ID : '';
          		var nama = data ? data.NAMA : '';
          		//var jml = data ? data.JML : '';
          		row_update = {
          			IDBARANG:id,
          			NAMABARANG:nama,
          			JML:1,
          		};
          }
          if (jQuery.isEmptyObject(row_update) == false) {
          	$(this).datagrid('updateRow',{
          		index: index,
          		row: row_update
          	});
          }
          */
        },
      }).datagrid('enableCellEditing');

      $("#form_plafonoverdue").dialog({}).dialog('close')

      $("#alasan_pembatalan").dialog({
        onOpen: function() {
          $('#alasan_pembatalan').form('clear');
        },
        buttons: '#alasan_pembatalan-buttons',
      }).dialog('close');

      // Mekanisme checkbox "Semua" pada form_plafonoverdue
      $('#SEMUAUBAHSTATUSPIUTANG').on('change', function() {
        if ($(this).is(':checked')) {
          $('#PLAFONUBAHSTATUSPIUTANG').prop('checked', true);
          $('#JUMLAHNOTAUBAHSTATUSPIUTANG').prop('checked', true);
          $('#JATUHTEMPOUBAHSTATUSPIUTANG').prop('checked', true);
        } else {
          $('#PLAFONUBAHSTATUSPIUTANG').prop('checked', false);
          $('#JUMLAHNOTAUBAHSTATUSPIUTANG').prop('checked', false);
          $('#JATUHTEMPOUBAHSTATUSPIUTANG').prop('checked', false);
        }
      });

      $('#PLAFONUBAHSTATUSPIUTANG, #JUMLAHNOTAUBAHSTATUSPIUTANG, #JATUHTEMPOUBAHSTATUSPIUTANG').on('change',
        function() {
          var plafonChecked = $('#PLAFONUBAHSTATUSPIUTANG').is(':checked');
          var jumlahNotaChecked = $('#JUMLAHNOTAUBAHSTATUSPIUTANG').is(':checked');
          var jatuhTempoChecked = $('#JATUHTEMPOUBAHSTATUSPIUTANG').is(':checked');

          if (plafonChecked && jumlahNotaChecked && jatuhTempoChecked) {
            $('#SEMUAUBAHSTATUSPIUTANG').prop('checked', true);
          } else {
            $('#SEMUAUBAHSTATUSPIUTANG').prop('checked', false);
          }
        })

      if ("{{ $mode }}" == "tambah") {
        tambah();
      } else if ("{{ $mode }}" == "ubah") {
        ubah();
      }
    })

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    async function tambah() {
      try {
        // Clear form dan set nilai default
        $('#form_input').form('clear');
        $('#mode').val('tambah');
        $('#STATUS').prop('checked', true);
        $('#lbl_kasir, #lbl_tanggal').empty();
        $("#v-cust-induk").hide();
        $('.number').numberbox('setValue', 0);
        $('#DISCOUNTMIN, #DISCOUNTMAX').textbox('setValue', '0');

        const [aksesResponse, configResponse] = await Promise.all([
          fetchData(link_api.getAksesFitur, {
            uuiduser: "{{ session('DATAUSER')['uuid'] }}",
            kodemenu: "I8KJS"
          }),
          fetchData(link_api.getConfig, {
            modul: 'MCUSTOMER',
            config: 'KODECUSTOMER',
          })
        ]);

        if (aksesResponse.success && !aksesResponse.data.akses) {
          $('#tabs').tabs('disableTab', 3);
        }

        const isAuto = configResponse.data.value === 'AUTO';
        $('#KODECUSTOMER').textbox({
          prompt: isAuto ? "Auto Generate" : "",
          readonly: isAuto,
          required: !isAuto
        });

        if (!isAuto) {
          $('#KODECUSTOMER').textbox('clear').textbox('textbox').focus();
        }

        $('#KODETIPECUSTOMER').textbox({
          prompt: "Auto Generate",
          readonly: true,
          required: false
        });

        reset_detail();
        tutupLoader();

      } catch (error) {
        const e = (typeof error === 'string') ? error : error.message;
        $.messager.alert('Error', getTextError(e), 'error');
        tutupLoader();
      }
    }

    async function ubah() {
      try {
        $('#mode').val('ubah');

        const response = await fetchData(link_api.headerFormCustomer, {
          uuidcustomer: '{{ $data }}'
        });

        if (!response.success) {
          throw new Error('Gagal mengambil data customer');
        }

        const row = response.data.row;

        $('#form_input').form('load', row);
        $('[name=mode]').val('ubah');

        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);
        $('#KODECUSTOMER').textbox('readonly', true);

        $('#KODETIPECUSTOMERMASTER').combogrid('setValue', row.kodetipecustomer);
        $('#KODETIPECUSTOMER').textbox({
          prompt: "Auto Generate",
          readonly: true,
          required: false
        });

        $('#IDMARKETING').combogrid('setValue', {
          uuidkaryawan: row.uuidmarketing,
          nama: row.namamarketing
        });

        if (!response.data.FITURINFORASIPIUTANGPELANGGAN) {
          $('#tabs').tabs('disableTab', 3);
        }

        await Promise.all([
          new Promise((resolve) => {
            get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
              if (data.data.ubah != 1) {
                $('#btn_simpan').css('filter', 'grayscale(100%)').removeAttr('onclick');
              }
              resolve();
            });
          }),
          load_data_piutang_belum_lunas(row.uuidcustomer),
          load_data_ubah_status_piutang(row.uuidcustomer)
        ]);

      } catch (error) {
        const e = (typeof error === 'string') ? error : error.message;
        $.messager.alert('Error', getTextError(e), 'error');
      } finally {
        tutupLoader();
      }
    }

    async function load_data_piutang_belum_lunas(idcustomer) {
      const url = link_api.loadDataPiutangBelumLunas;
      const data = {
        uuidcustomer: idcustomer
      };
      try {
        const response = await fetchData(url, data);
        if (response.success) {
          $('#table_data_riwayat_piutang').datagrid('loadData', response.data);
        } else {
          throw new Error(response.message);
        }
      } catch (error) {
        throw error;
      }
    }

    async function load_data_ubah_status_piutang(idcustomer) {
      const url = link_api.loadDataUbahStatusPiutang;
      const data = {
        uuidcustomer: idcustomer
      };
      try {
        const reponse = await fetchData(url, data);
        if (reponse.success) {
          $('#table_data_ubah_status_piutang').datagrid('loadData', reponse.data);
        } else {
          throw new Error(reponse.message);
        }
      } catch (error) {
        throw error;
      }
    }

    async function simpan() {
      $('#data_custnpwp').val(JSON.stringify($('#table_data_custnpwp').datagrid('getRows')));

      var cekDiskon = cek_format($('#DISCOUNTMIN').textbox('getValue'));

      if (cekDiskon == "error") {
        $.messager.alert('Peringatan', 'Discount Hanya Boleh Berisi + . Dan Angka Saja', 'error');
        return false;
      }

      var cekDiskon = cek_format($('#DISCOUNTMAX').textbox('getValue'));

      if (cekDiskon == "error") {
        $.messager.alert('Peringatan', 'Discount Hanya Boleh Berisi + . Dan Angka Saja', 'error');
        return false;
      }

      var diskonmin = hitungAkumulasiDiskonPersen($('#DISCOUNTMIN').textbox('getValue'));
      var diskonmax = hitungAkumulasiDiskonPersen($('#DISCOUNTMAX').textbox('getValue'));

      if (diskonmin > diskonmax) {
        $.messager.alert('Peringatan', 'Disc Min harus lebih kecil dari Disc Max', 'error');
        return false;
      }

      var isValid = $('#form_input').form('validate');

      if (isValid && !isTokenExpired()) {
        mode = $('[name=mode]').val();
        try {
          tampilLoaderSimpan();
          const data = $('#form_input :input').serializeArray();
          const num = ['maxnota'];
          const payload = {};
          for (let i = 0; i < data.length; i++) {
            if (num.includes(data[i].name)) {
              payload[data[i].name] = parseInt(data[i].value);
            } else {
              payload[data[i].name] = data[i].value;
            }
          }
          const response = await fetchData(link_api.simpanCustomer, payload);
          tutupLoaderSimpan();
          if (response.success) {
            $.messager.alert('Info', 'Simpan Data Sukses', 'info');
            if (mode == 'tambah') {
              tambah();
            } else if (mode == 'ubah') {
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
      reset_detail();
    }

    function pilih_tipe_customer() {
      const kodemenu = '{{ $kodemenu }}';
      get_akses_user(kodemenu, 'bearer {{ session('TOKEN') }}', function(data) {
        if (data.data.tambah == 1) {
          $("#form_tipe_customer").dialog('open');
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    async function simpan_tipe_customer() {
      var cekDiskon = cek_format($('#DISCOUNTMINTIPE').textbox('getValue'));

      if (cekDiskon == "error") {
        $.messager.alert('Peringatan', 'Discount Hanya Boleh Berisi + . Dan Angka Saja', 'error');
        return false;
      }

      var cekDiskon = cek_format($('#DISCOUNTMAXTIPE').textbox('getValue'));

      if (cekDiskon == "error") {
        $.messager.alert('Peringatan', 'Discount Hanya Boleh Berisi + . Dan Angka Saja', 'error');
        return false;
      }

      var diskonmin = hitungAkumulasiDiskonPersen($('#DISCOUNTMINTIPE').textbox('getValue'));
      var diskonmax = hitungAkumulasiDiskonPersen($('#DISCOUNTMAXTIPE').textbox('getValue'));

      if (diskonmin > diskonmax) {
        $.messager.alert('Peringatan', 'Disc Min harus lebih kecil dari Disc Max', 'error');

        return false;
      }

      try {
        const data = $('#form_tipe_customer :input').serializeArray();
        const form = new FormData();
        for (const item of data) {
          form.append(item.name, item.value);
        }
        form.append('status', '1');
        form.append('mode', 'tambah');
        const response = await fetchData(link_api.simpanTipeCustomer, form);

        if (response.success) {
          $.messager.alert('Info', 'Simpan Data Sukses', 'info');
          $("#form_tipe_customer").dialog('close');
          $('#KODETIPECUSTOMERMASTER').combogrid('grid').datagrid('reload');
          $('#KODETIPECUSTOMERMASTER').combogrid('setValue', {
            kode: response.kodetipecustomer,
            nama: response.namatipecustomer
          });
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        const e = (typeof error === 'string') ? error : error.message;
        var textError = getTextError(e);
        $.messager.alert('Error', textError, 'error');
      }
    }

    function tutup_merk() {
      $("#form_tipe_customer").dialog('close');
    }

    function load_data_mcustomernpwp(idcustomer) {
      //   $.ajax({
      //     type: 'POST',
      //     dataType: 'json',
      //     url: base_url + "atena/Master/Data/Customer/customerNPWP",
      //     data: "id=" + idcustomer,
      //     cache: false,
      //     beforeSend: function() {
      //       $.messager.progress();
      //     },
      //     success: function(msg) {
      //       $.messager.progress('close');
      //       if (msg.success) {
      //         $('#table_data_custnpwp').datagrid('loadData', msg.detail);
      //       }
      //     }
      //   });
    }

    function hitungAkumulasiDiskonPersen(str_diskon) {
      str_diskon = str_diskon.toString();
      var akumulasi = 0;
      var daftar_diskon = str_diskon.split('+');

      for (var i = 0; i < daftar_diskon.length; i++) {
        var diskon = parseFloat(daftar_diskon[i]);
        akumulasi += (diskon / 100) * (100 - akumulasi);
      }

      return akumulasi;
    }

    function reset_detail() {
      $('#table_data_custbarang').datagrid('loadData', []);
      $('#table_data_custnpwp').datagrid('loadData', []);
    }

    function browse_tipe_customer(id) {
      $(id).combogrid({
        panelWidth: 200,
        url: link_api.browseTipeCustomer,
        idField: 'kode',
        textField: 'nama',
        mode: 'local',
        editable: false,
        required: true,
        columns: [
          [{
              field: 'kode',
              title: 'Kode'
            },
            {
              field: 'nama',
              title: 'Nama Tipe Customer'
            }
          ]
        ]
      });
    }

    function buat_table_informasi_piutang() {
      $('#table_data_ubah_status_piutang').datagrid({
        rownumbers: true,
        fit: true,
        singleSelect: true,
        toolbar: '#toolbar-statuspiutang',
        height: 150,
        columns: [
          [{
              field: 'uuidubahstatuspiutang',
              hidden: true
            },
            {
              field: 'tgltrans',
              title: 'Tgl Trans',
              align: 'center',
              width: 80,
            },
            {
              field: 'tgljual',
              title: 'Tgl Jual',
              align: 'center',
              width: 80,
            },
            {
              field: 'plafon',
              title: 'Plafon',
              align: 'center',
              width: 50,
              formatter: function(value) {
                return `<input type="checkbox" disabled ${value == 1 ? 'checked' : ''}>`;
              }
            },
            {
              field: 'limitnota',
              title: 'Limit Nota',
              align: 'center',
              width: 80,
              formatter: function(value) {
                return `<input type="checkbox" disabled ${value == 1 ? 'checked' : ''}>`;
              }
            },
            {
              field: 'jatuhtempo',
              title: 'Jatuh Tempo',
              align: 'center',
              width: 80,
              formatter: function(value) {
                return `<input type="checkbox" disabled ${value == 1 ? 'checked' : ''}>`;
              }
            },
            {
              field: 'tglentry',
              title: 'Tgl. Input',
              width: 120,
              formatter: ubah_tgl_indo,
              align: 'center',
            },
            {
              field: 'userbuat',
              title: 'User Entry',
              width: 70,
            },
          ]
        ],
        onClickRow: function(index, row) {
          indexdataubahstatuspiutang = index;
        }
      });

      $('#table_data_riwayat_piutang').datagrid({
        rownumbers: true,
        fit: true,
        singleSelect: true,
        height: 300,
        columns: [
          [{
              field: 'tgltrans',
              title: 'Tgl Trans',
              align: 'center',
              width: 85,
            },
            {
              field: 'tgljatuhtempo',
              title: 'Jatuh Tempo',
              align: 'center',
              width: 80,
            },
            {
              field: 'tglpelunasan',
              title: 'Tgl. Bayar Terakhir',
              align: 'center',
              width: 100,
            },
            {
              field: 'kodetrans',
              title: 'No. Trans.',
              width: 150,
              align: 'center'
            },
            {
              field: 'total',
              title: 'Total',
              align: 'right',
              width: 95,
              formatter: format_amount
            },
            {
              field: 'grandtotal',
              title: 'Grand Total',
              align: 'right',
              width: 95,
              formatter: format_amount
            },
            {
              field: 'pelunasan',
              title: 'Pelunasan',
              align: 'right',
              width: 95,
              formatter: format_amount
            },
            {
              field: 'saldonota',
              title: 'Saldo Nota',
              align: 'right',
              width: 95,
              formatter: format_amount
            },
          ]
        ],
        rowStyler: function(index, row) {
          if (getTodayDateFormatted() > row.tgljatuhtempo) {
            return `background-color: {{ session('WARNA_STATUS_D') }}`;
          }
        },
      });
    }

    function tampilFormUbahStatusPiutang() {
      $('#TGLJUALUBAHSTATUSPIUTANG').datebox('setValue', date_format());
      $('#SEMUAUBAHSTATUSPIUTANG').prop('checked', true);
      $('#PLAFONUBAHSTATUSPIUTANG').prop('checked', true);
      $('#JUMLAHNOTAUBAHSTATUSPIUTANG').prop('checked', true);
      $('#JATUHTEMPOUBAHSTATUSPIUTANG').prop('checked', true);

      // Automatically fill customer code and name
      $('#KODECUSTOMERUBAHSTATUSPIUTANG').textbox('setValue', $('#KODECUSTOMER').textbox('getValue'));
      $('#NAMACUSTOMERUBAHSTATUSPIUTANG').textbox('setValue', $('[name=namacustomer]').val());

      $("#form_plafonoverdue").dialog('open');
    }

    async function simpan_ubah_status_piutang() {
      const url = link_api.simpanUbahStatusPiutang;
      const data = {
        uuidcustomer: $('#IDCUSTOMER').val(),
        kodecustomer: $('#KODECUSTOMER').textbox('getValue'),
        iddivisi: $('#IDDIVISIUBAHSTATUSPIUTANG').val(),
        tgljual: $('#TGLJUALUBAHSTATUSPIUTANG').datebox('getValue'),
        plafonubahstatuspiutang: $('#PLAFONUBAHSTATUSPIUTANG').prop('checked') ? 1 : 0,
        jumlahnotaubahstatuspiutang: $('#JUMLAHNOTAUBAHSTATUSPIUTANG').prop('checked') ? 1 : 0,
        jatuhtempoubahstatuspiutang: $('#JATUHTEMPOUBAHSTATUSPIUTANG').prop('checked') ? 1 : 0,
      };
      const form = new FormData();
      for (const key in data) {
        form.append(key, data[key]);
      }
      try {
        tampilLoaderSimpan();
        const response = await fetchData(url, form);
        tutupLoaderSimpan();
        if (response.success) {
          load_data_ubah_status_piutang($('#IDCUSTOMER').val());
          $('#form_plafonoverdue').dialog('close');
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        tutupLoaderSimpan();
        const e = (typeof error === 'string') ? error : error.message;
        const textError = getTextError(e);
        $.messager.alert('Error', textError, 'error');
      }
    }

    function batal_trans_ubah_status_trans() {
      var row = $('#table_data_ubah_status_piutang').datagrid('getRows')[indexdataubahstatuspiutang];

      if (row) {
        $.messager.confirm('Konfirmasi', 'Apakah anda yakin akan membatalkan transaksi tersebut?', async function(
          confirm) {
          if (confirm) {
            const url = link_api.batalUbahStatusPiutang;
            const data = {
              uuidubahstatuspiutang: row.uuidubahstatuspiutang,
            };
            try {
              const response = await fetchData(url, data);
              if (response.success) {
                load_data_ubah_status_piutang($('#IDCUSTOMER').val());
                $('#alasan_pembatalan').dialog('close');
              }
            } catch (error) {
              const e = (typeof error === 'string') ? error : error.message;
              const textError = getTextError(e);
              $.messager.alert('Error', textError, 'error');
            }
          }
        });
      }
    }

    function getTodayDateFormatted() {
      const today = new Date();
      const year = today.getFullYear();
      const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed, so add 1
      const day = String(today.getDate()).padStart(2, '0');

      return `${year}-${month}-${day}`;
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

    function isTokenExpired() {
      const token = '{{ session('TOKEN') }}';
      if (!token) {
        return true;
      }

      try {
        const payloadBase64 = token.split('.')[1];
        const decodedPayload = atob(payloadBase64);
        const payload = JSON.parse(decodedPayload);

        const expirationTime = payload.exp;
        const currentTime = Math.floor(Date.now() / 1000);

        return expirationTime < currentTime;
      } catch (e) {
        return true;
      }
    }
  </script>
@endpush
