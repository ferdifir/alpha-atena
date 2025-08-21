@extends('template.form')

@section('content')
  <div id="form_input" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false ">
          <div class="easyui-layout" style="height:100%" id="trans_layout">

            <input type="hidden" name="mode" id="mode">
            <input type="hidden" name="idcustomer" id="IDCUSTOMER">
            <input type="hidden" id="data_custlokasi" name="data_custlokasi">
            <input type="hidden" id="data_custbarang" name="data_custbarang">
            <input type="hidden" id="data_custnpwp" name="data_custnpwp">

            <div class="easyui-tabs" style="width:100%;height:500px;" plain='true'>
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
                      <input name="namacustomer" style="width:250px" class="label_input" validType='length[0,100]'
                        required>
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
                      <input id="KODETIPECUSTOMERMASTER" name="kodetipecustomermaster" style="width: 100px;">
                      <a id="tambah_tipe_customer" title="Input Tipe Customer Baru"
                        class="easyui-linkbutton easyui-tooltip " plain="true" iconCls="icon-add"
                        onclick="pilih_tipe_customer()">
                    </td>
                  </tr>
                  <tr id="v-cust-induk">
                    <td align="right" id="label_form">Customer Induk</td>
                    <td><input name="idinduk" id="IDINDUK" style="width:250px"></td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Alamat</td>
                    <td id="label_form">
                      <input name="alamat" style="width:355px" class="label_input" validType='length[0,300]'>
                      &nbsp; Kode Pos
                      <input name="kodepos" style="width:150px" class="label_input" validType='length[0,100]'>
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
                      <input name="telp" style="width:150px" class="label_input" validType='length[0,50]'>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fax
                      <input name="fax" style="width:150px" class="label_input" validType='length[0,50]'>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; HP
                      <input name="hp" style="width:150px" class="label_input" validType='length[0,50]'>
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
                      <input name="idsyaratbayar" id="IDSYARATBAYAR" style="width:150px">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Disc Min
                      <input id="DISCOUNTMIN" name="discountmin" style="width:70px;" class="label_input"
                        validType='length[0,14]'
                        data-options="precision:2,decimalSeparator:'.',required:true,suffix:'%'">
                      &nbsp;&nbsp;<span id="label_form">Disc Max</span>
                      <input id="DISCOUNTMAX" name="discountmax" style="width:70px;" class="label_input"
                        validType='length[0,14]'
                        data-options="precision:2,decimalSeparator:'.',required:true,suffix:'%'">
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Marketing</td>
                    <td id="label_form">
                      <input name="idmarketing" id="IDMARKETING" style="width:150px">
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
                      <input name="norek" style="width:150px;" class="label_input" validType='length[0,100]'>
                      Virtual Acc
                      <input name="virtualaccount" style="width:2150px25px;" class="label_input"
                        validType='length[0,100]'>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" id="label_form">Latitude</td>
                    <td id="label_form">
                      <input name="latitude" class="label_input" style="width:150px;" type="text">
                      Longitude <input name="longitude" class="label_input" style="width:150px;" type="text">
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
                    <td><input name="noktp" style="width:400px" class="label_input" validType='length[0,100]'></td>
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
                    <td><input name="telpcontactperson" style="width:250px" class="label_input"
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
              <td><input id="DISCOUNTMINTIPE" name="discountmin" style="width:70px;" class="label_input"
                  validType='length[0,14]' data-options="precision:2,required:true,decimalSeparator:'.',suffix:'%'">
                &nbsp;&nbsp;<span id="label_form">Disc Max</span>
                <input id="DISCOUNTMAXTIPE" name="discountmax" style="width:70px;" class="label_input"
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
    $(function() {
      tutupLoader()
    })
  </script>
@endpush
