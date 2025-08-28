@extends('template.form')

@section('content')
  <form id="form_input" enctype="multipart/form-data" class="easyui-layout" fit="true">
    <div data-options="region:'center',border:false">
      <div class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false">
          <div class="easyui-layout" style="height:100%" id="trans_layout">
            <input type="hidden" id="mode" name="mode">
            <input type="hidden" id="IDBARANG" name="uuidbarang">
            <input type="hidden" id="uuidmerk" name="uuidmerk">
            <input type="hidden" id="data_barangkategori" name="data_barangkategori">
            <input type="hidden" id="data_barangset" name="data_barangset">
            <input type="hidden" id="data_supplier" name="data_supplier">
            <input type="hidden" id="data_lokasi" name="data_lokasi">
            <input type="hidden" name="gambar">

            <div data-options="region:'center',border:false">
              <table style="padding:5px" id="label_form">
                <tr>
                  <td valign="top">
                    <fieldset>
                      <legend id="label_laporan">Info Barang</legend>
                      <table>
                        <tbody>
                          <tr>
                            <td>
                              <table border="0">
                                <tr>
                                  <td style="width:100px" align="right" id="label_form">Kode Barang</td>
                                  <td>
                                    <input id="KODEBARANG" name="kodebarang" style="width:110px" class="label_input">
                                    <label id="label_form"><input type="checkbox" id="STATUS" name="status"
                                        value="1"> Aktif</label>
                                    <!--<label id="label_form"><input type="checkbox" id="SET" name="set" value="1"> Set</label>!-->
                                  </td>
                                  <td rowspan = "5">
                                    <div style="width:100px; height:100px">
                                      <img id="preview-image" style="width:100%; height:100%;cursor:pointer"
                                        onclick="previewGambar()" />
                                    </div>
                                    <input id="FILEGAMBAR" name="filegambar" class="easyui-filebox"
                                      data-options="required:false,buttonText:'Gambar'" style="width:100px">
                                  </td>
                                </tr>
                                <tr>
                                  <td style="width:100px" align="right" id="label_form">Kode Barang Pajak</td>
                                  <td>
                                    <input id="KODEBARANGPAJAK" name="kodebarangpajak" style="width:110px"
                                      class="label_input">
                                  </td>
                                </tr>
                                <tr>
                                  <td align="right" id="label_form">Nama Barang</td>
                                  <td>
                                    <input name="namabarang" style="width:250px" class="label_input" required="true"
                                      validType='length[0,200]'>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="width:100px" align="right" id="label_form"></td>
                                  <td>
                                    <label id="label_form"><input type="checkbox" id="STOK" name="stok"
                                        value="1"> Barang Stok</label>
                                    <label id="label_form"><input type="checkbox" id="JUAL" name="jual"
                                        value="1"> Barang Jual</label>
                                    <label id="label_form"><input type="checkbox" id="PRODUKSI" name="produksi"
                                        value="1"> Barang Produksi</label>
                                    <label id="label_form"><input type="checkbox" id="PPN" name="ppn"
                                        value="1"> Barang PPN</label>
                                    <label id="label_form"><input type="checkbox" id="POIN" name="poin"
                                        value="1"> Barang Poin</label>
                                  </td>
                                </tr>
                                <tr>
                                  <td align="right" id="label_form">Merk</td>
                                  <td><input id="KODEMERKBARANG" name="kodemerk" style="width:130px"
                                      class="label_input" required>
                                    <a id="tambah_merk" title="Input Merk Baru"
                                      class="easyui-tooltip easyui-linkbutton" plain="true" iconCls="icon-add"
                                      onclick="pilih_merk()"></a>
                                  </td>
                                </tr>
                                <tr>
                                  <td align="right" id="label_form">Part Number</td>
                                  <td>
                                    <input name="partnumber" style="width:250px" class="label_input"
                                      validType='length[0,200]'>
                                  </td>
                                </tr>
                                <tr>
                                  <td align="right" id="label_form">Isi Collie</td>
                                  <td>
                                    <input name="isicollie" id="ISICOLLIE" style="width:250px;" class="number"
                                      min="0">
                                  </td>
                                </tr>
                                <tr>
                                  <td align="right" valign="top" id="label_form">Kategori Barang</td>
                                  <td valign="top" colspan="2">
                                    <span id="label_form">Merupakan Hal Penting Dalam Penggunaan Aplikasi Atena Pos.
                                      <br>Harap Mengisi Minimal 1 Kategori Dan Menentukan Kategori Utama.</span>
                                    <div id="daftar_kategori">
                                      <div id="kategori_1"><input id="nama_kategori_1" style="font-size: 18px;"><a
                                          class="easyui-linkbutton" plain="true" iconCls="icon-remove"
                                          onclick="hapusKategori(1)"></a><input type="checkbox" id="cb_kategori_1"
                                          name="cb_kategori_utama" value="1" checked></div>
                                      <div id="kategori_2"><input id="nama_kategori_2" style="font-size: 18px;"><a
                                          class="easyui-linkbutton" plain="true" iconCls="icon-remove"
                                          onclick="hapusKategori(2)"></a><input type="checkbox" id="cb_kategori_2"
                                          name="cb_kategori_utama" value="2"></div>
                                      <div id="kategori_3"><input id="nama_kategori_3" style="font-size: 18px;"><a
                                          class="easyui-linkbutton" plain="true" iconCls="icon-remove"
                                          onclick="hapusKategori(3)"></a><input type="checkbox" id="cb_kategori_3"
                                          name="cb_kategori_utama" value="3"></div>
                                      <div id="kategori_4"><input id="nama_kategori_4" style="font-size: 18px;"><a
                                          class="easyui-linkbutton" plain="true" iconCls="icon-remove"
                                          onclick="hapusKategori(4)"></a><input type="checkbox" id="cb_kategori_4"
                                          name="cb_kategori_utama" value="4"></div>
                                      <input id="nama_kategori" style="font-size: 18px;">
                                      <a class="easyui-linkbutton" plain="true" iconCls="icon-add"
                                        onclick="tambahKategori()"></a>
                                    </div>
                                  </td>
                                  <td hidden>
                                    <div class="easyui-layout" style="width:250px;height:170px; display: inline-block;">
                                      <table id="table_data_barangkategori" name="table_data_barangkategori">
                                      </table>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top">
                                    <b>Contoh Input Satuan </b>
                                  </td>
                                  <td>
                                    <textarea id="CONTOHSATUAN" style="width:310px; height:95px" class="label_input" multiline="true"
                                      validType='length[0,300]' readonly></textarea>
                                  </td>
                                </tr>
                                <tr id="satuanbarangtranskasi" hidden>
                                  <td></td>
                                  <td style="color:red; font-style:italic;">Satuan tidak dapat dirubah, karena barang
                                    sudah ditransaksikan atau memiliki harga jual per satuan</td>
                                </tr>
                                <tr>
                                  <td align="right" id="label_form">Satuan 1</td>
                                  <td>
                                    <input id="SATUAN" name="satuan" style="width:40px"
                                      class="easyui-validatebox label_input" validType='length[0,100]' required="true">
                                    <span id="label_form">Barcode Satuan 1</span>
                                    <input name="barcodesatuan1" style="width:120px" class="label_input"
                                      validType='length[0,200]'>
                                    <a id="tambah_satuan_1" class="easyui-linkbutton" plain="true"
                                      iconCls="icon-add" onclick="tambahSatuan()"></a>
                                  </td>
                                </tr>
                                <tr id="satuan_field2">
                                  <td align="right" id="label_form">Konversi 1</td>
                                  <td>
                                    <input id="KONVERSI1" name="konversi1" style="width:40px;"
                                      class="number label_input" min="0" validType='length[0,14]'
                                      min="0" required="true">
                                    <span id="label_form">Satuan 2</span>
                                    <input id="SATUAN2" name="satuan2" style="width:60px"
                                      class="easyui-validatebox label_input" validType='length[0,100]'>
                                    <span id="label_form">Barcode Satuan 2</span>
                                    <input name="barcodesatuan2" style="width:100px" class="label_input"
                                      validType='length[0,200]'>
                                    <a id="tambah_satuan_2" class="easyui-linkbutton" plain="true"
                                      iconCls="icon-add" onclick="tambahSatuan()"></a>
                                    <a id="hapus_satuan_2" class="easyui-linkbutton" plain="true"
                                      iconCls="icon-remove" onclick="hapusSatuan()"></a>
                                  </td>
                                </tr>
                                <tr id="satuan_field3">
                                  <td align="right" id="label_form">Konversi 2</td>
                                  <td>
                                    <input id="KONVERSI2" name="konversi2" style="width:40px;"
                                      class="number label_input" min="0" validType='length[0,14]'
                                      min="0">
                                    <span id="label_form">Satuan 3</span>
                                    <input id="SATUAN3" name="satuan3" style="width:60px"
                                      class="easyui-validatebox label_input" validType='length[0,100]'>
                                    <span id="label_form">Barcode Satuan 3</span>
                                    <input name="barcodesatuan3" style="width:100px" class="label_input"
                                      validType='length[0,200]'>
                                    <a id="hapus_satuan_3" class="easyui-linkbutton" plain="true"
                                      iconCls="icon-remove" onclick="hapusSatuan()"></a>
                                  </td>
                                </tr>
                                <tr>
                                  <td align="right" id="label_form">Harga Beli</td>
                                  <td><input name="hargabeli" id="HARGABELI" style="width:100px;" class="number"></td>
                                </tr>
                                <tr>
                                  <td align="right" id="label_form">Harga Jual Berdasarkan</td>
                                  <td>
                                    <input type="radio" name="jenishargajual" id="HARGAJUALSATUAN" value="SATUAN">
                                    Satuan
                                    <input type="radio" name="jenishargajual" id="HARGAJUALJUMLAH" value="JUMLAH">
                                    Jumlah
                                  </td>
                                </tr>
                                <tr hidden>
                                  <td align="right" id="label_form">Harga Jual Min</td>
                                  <td id="label_form">
                                    <input name="hargajualmin" id="HARGAJUALMIN" style="width:100px;" class="number"
                                      min="0" readonly>
                                    &nbsp;&nbsp;Max
                                    <input name="hargajualmax" id="HARGAJUALMAX" style="width:100px;" class="number"
                                      min="0" readonly>
                                  </td>
                                </tr>
                                <tr>
                                  <td align="right" id="label_form">Limit Min</td>
                                  <td id="label_form">
                                    <input name="limitmin" id="LIMITMIN" style="width:100px;" class="number"
                                      min="0">
                                    &nbsp;&nbsp;Max
                                    <input name="limitmax" id="LIMITMAX" style="width:100px;" class="number"
                                      min="0">
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>

                      <div id="akseshargajualsatuan" hidden>
                        <div class="easyui-tabs" style="width: 612px;height: 230px">
                          <div title="Harga Jual per Satuan">
                            <div id="toolbar-hargajual">
                              <div style="padding: 5px" id="ubahhargajualsatuan" hidden>
                                <a id="btn_ubah_hargajual" href="#" class="easyui-linkbutton"
                                  onclick="tampil_window_ubah_hargajual(event)">Ubah Harga Jual</a>
                              </div>
                            </div>

                            <table id="table_hargajual_berdasarkan_satuan" fit="true"></table>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                  </td>
                  <td valign="top">
                    <fieldset style="height:650px;">
                      <legend id="label_laporan">Field Lain</legend>
                      <table border="0">
                        <tr>
                          <td align="right" id="label_form" valign="top">Detail Barang Set</td>
                          <td id="label_form">
                            <input type="checkbox" name="detailsetubah" id="detailsetubah" value="1"> Detail Set
                            Dapat Diubah
                            <br>
                            Jumlah Hasil (Satuan Terkecil) :&nbsp;<input name="jmlhasilset" id="JMLHASILSET"
                              style="width:80px;" class="number" min="0">
                          </td>
                        </tr>
                        <tr>
                          <td align="right" id="label_form" valign="top"></td>
                          <td>
                            <div class="easyui-layout" data-options="region:'north',border:false"
                              style="width:400px; height:180px;">
                              <table id="table_data_barangset" name="table_data_barangset"></table>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td align="right" id="label_form"></td>
                          <td>
                            <input type="checkbox" name="scanbarcodebbk" id="scanbarcodebbk" value="1"> Scan
                            Barcode Pada Pengeluaran Barang
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form" valign="top">Pemasok</td>
                          <td>
                            <table id="table_data_supplier"></table>
                          </td>
                        </tr>
                        <tr>
                          <td id="label_form" valign="top">Lokasi</td>
                          <td>
                            <table id="table_data_lokasi"></table>
                          </td>
                        </tr>
                        <tr>
                          <td align="right" id="label_form">Akun Persediaan</td>
                          <td>
                            <input id="KODEPERKIRAANPERSEDIAAN" name="kodeperkiraanpersediaan" style="width:250px">
                            <input type="hidden" name="uuidperkiraanpersediaan" id="IDPERKIRAANPERSEDIAAN">
                          </td>
                        </tr>
                        <tr>
                          <td align="right" id="label_form">Akun HPP</td>
                          <td>
                            <input id="KODEPERKIRAANHPP" name="kodeperkiraanhpp" style="width:250px">
                            <input type="hidden" name="uuidperkiraanhpp" id="IDPERKIRAANHPP">
                          </td>
                        </tr>
                        <tr>
                          <td align="right" valign="top" id="label_form">Catatan</td>
                          <td>
                            <textarea name="catatan" style="width:310px; height:60px" class="label_input" multiline="true"
                              validType='length[0,300]'></textarea>
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </td>
                </tr>
              </table>
              <div id="dlg-buttons" style="position: fixed;bottom:0;background-color: white;width:100%;">
                <table cellpadding="0" cellspacing="0" style="width:100%">
                  <tr>
                    <td align="left" id="label_form"><label style="font-weight:normal" id="label_form">User Input
                        :</label> <label id="lbl_kasir"></label> <label style="font-weight:normal" id="label_form">|
                        Tgl
                        Input :</label> <label id="lbl_tanggal"></label></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6;">
      <br>
      <a title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false" id='btn_simpan'
        onclick="javascript:simpan()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
      <br><br>
      <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
        onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
    </div>
  </form>

  <div id="form_merk" title="Input Merk Baru">
    <table style="padding:5px">
      <tr>
        <td>
          <table>
            <tr>
              <td align="right" id="label_form">Kode</td>
              <td><input id="KODEMERK" name="kodemerk" style="width:200px" class="label_input">
              </td>
            </tr>
            <tr>
              <td align="right" id="label_form">Nama</td>
              <td><input id="NAMAMERK" name="namamerk" style="width:200px" class="label_input" required="true"
                  validType='length[0,100]'></td>
            </tr>
            <tr>
              <td align="right" id="label_form">Disc Min</td>
              <td>
                <input id="DISCOUNTMINMERK" name="discountmin" style="width:70px;" class="label_input"
                  validType='length[0,14]' data-options="required:true,precision:2,decimalSeparator:'.',suffix:'%'">
                &nbsp;&nbsp;<span id="label_form">Disc Max</span>
                <input id="DISCOUNTMAXMERK" name="discountmax" style="width:70px;" class="label_input"
                  validType='length[0,14]' data-options="required:true,precision:2,decimalSeparator:'.',suffix:'%'">
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
                  onclick="javascript:simpan_merk()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
                <br>
                <br>
                <br>
                <a title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
                  onclick="javascript:tutup_merk()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </div>

  <div id="window_ubah_hargajual" title="Ubah Harga Jual" style="width: 370px; height: 250px">

    <div class="easyui-layout" style="width: 100%;height: 100%">
      <div data-options="region: 'center'">
        <div class="easyui-layout" style="width: 100%; height: 100%">
          <div data-options="region: 'north'" style="height: 60px;">
            <table>
              <tbody>
                <tr>
                  <td id="label_form">Tanggal Aktif</td>
                  <td>
                    <input class="date" style="width: 100px" id="TANGGALAKTIF" readonly>
                  </td>
                </tr>
                <tr>
                  <td id="label_form">Lokasi</td>
                  <td>
                    <input id="LOKASIHARGAJUAL" style="width: 200px">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div data-options="region: 'center'">

            <p style="padding: 5px; background-color: pink;margin: 0;font-weight: bold">Harga yang ditampilkan adalah
              harga jual dengan tanggal aktif terdekat pada lokasi terpilih</p>

            <table>
              <tr>
                <th id="label_form">Satuan</th>
                <th id="label_form">Harga Jual Min</th>
                <th id="label_form">Harga Jual Max</th>
              </tr>
              <tr>
                <td id="label_form">
                  <span id="LABEL_HARGAJUAL_SATUAN">CRT</span>
                </td>
                <td id="label_form">
                  <input id="HARGAJUALMIN_SATUAN" class="number" style="width: 100px">
                </td>
                <td id="label_form">
                  <input id="HARGAJUALMAX_SATUAN" class="number" style="width: 100px">
                </td>
              </tr>
              <tr id="HARGAJUAL_SATUAN2_WRAPPER">
                <td id="label_form">
                  <span id="LABEL_HARGAJUAL_SATUAN2">LSN</span>
                </td>
                <td id="label_form">
                  <input id="HARGAJUALMIN_SATUAN2" class="number" style="width: 100px">
                </td>
                <td id="label_form">
                  <input id="HARGAJUALMAX_SATUAN2" class="number" style="width: 100px">
                </td>
              </tr>
              <tr id="HARGAJUAL_SATUAN3_WRAPPER">
                <td id="label_form">
                  <span id="LABEL_HARGAJUAL_SATUAN3">PCS</span>
                </td>
                <td id="label_form">
                  <input id="HARGAJUALMIN_SATUAN3" class="number" style="width: 100px">
                </td>
                <td id="label_form">
                  <input id="HARGAJUALMAX_SATUAN3" class="number" style="width: 100px">
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div data-options="region: 'east'" style="width: 50px;padding: 5px">
        <a title="Simpan" class="easyui-tooltip" data-options="plain: false" onclick="simpan_hargajual()">
          <img src="{{ asset('assets/images/simpan.png') }}">
        </a>
      </div>
    </div>
  </div>

  <div id="toolbar-barangset" style="display: flex; align-items: center">
    <a class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-add'"
      onclick="tambah_detail_barangset()">Tambah</a>
    <a class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-remove'"
      onclick="hapus_detail_barangset()">Hapus</a>
  </div>

  <div id="toolbar-supplier" style="display: flex; align-items: center">
    <a class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-add'"
      onclick="tambah_detail_supplier()">Tambah</a>
    <a class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-remove'"
      onclick="hapus_detail_supplier()">Hapus</a>
  </div>
@endsection

@push('js')
  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-filter/datagrid-filter.js') }}">
  </script>
  <script>
    var indexSatuan = 1;
    var indexKategori = 1;
    var oldvalue = '';
    var indexCbKategori = 1;
    var indexSelectedBarangset = -1;
    var indexSelectedSupplier = -1;

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

    $(function() {
      $('#window_ubah_hargajual').window({
        closed: true,
        collapsible: false,
        minimizable: false,
        maximizable: false
      })

      $("input[type=checkbox][name=cb_kategori_utama]").on("click", function() {

        for (var i = 1; i <= 4; i++) {
          if (($(this).attr("id").split("_")[2]) != i) {
            $('#cb_kategori_' + i).prop('checked', false);
          } else {
            indexCbKategori = i;
          }
        }

      });

      $('#nama_kategori').textbox({
        width: 170,
      });

      buat_table_data_supplier('#table_data_supplier');
      buat_table_data_lokasi('#table_data_lokasi');
      buat_table_hargajual_berdasarkan_satuan('#table_hargajual_berdasarkan_satuan');

      browse_data_lokasi('#LOKASIHARGAJUAL');

      $("#table_data_barangset").datagrid({
        width: '100%',
        fit: true,
        clickToEdit: false,
        dblclickToEdit: true,
        singleSelect: true,
        rownumbers: true,
        showFooter: true,
        data: [],
        toolbar: '#toolbar-barangset',
        columns: [
          [{
              field: 'uuidbarangset',
              hidden: true
            },
            {
              field: 'kode',
              title: 'Kode',
              width: 115,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 720,
                  sortName: 'nama',
                  idField: 'kode',
                  textField: 'kode',
                  mode: 'remote',
                  columns: [
                    [{
                        field: 'uuidbarang',
                        hidden: true
                      },
                      {
                        field: 'kode',
                        title: 'Kode Barang',
                        width: 70
                      },
                      {
                        field: 'nama',
                        title: 'Nama Barang',
                        width: 220
                      },
                      {
                        field: 'barcodesatuan1',
                        title: 'Barcode Satuan 1',
                        width: 150
                      },
                      {
                        field: 'barcodesatuan2',
                        title: 'Barcode Satuan 2',
                        width: 150
                      },
                      {
                        field: 'barcodesatuan3',
                        title: 'Barcode Satuan 3',
                        width: 150
                      },
                      {
                        field: 'partnumber',
                        title: 'Part Number',
                        width: 150
                      },
                      {
                        field: 'namamerk',
                        title: 'Merk',
                        width: 100
                      },
                    ]
                  ],
                }
              }
            },
            {
              field: 'nama',
              title: 'Nama',
              width: 210
            },
            {
              field: 'jml',
              title: 'Jumlah',
              align: 'right',
              width: 60,
              editor: {
                type: 'numberbox'
              },
              formatter: function(val) {
                return parseInt(val)
              }
            },
            {
              field: 'satuanutama',
              align: 'center',
              title: 'Satuan',
              width: 60
            },
            {
              field: 'partnumber',
              title: 'Part Number',
              width: 150
            },
            {
              field: 'barcodesatuan1',
              title: 'Barcode Satuan 1',
              width: 150
            },
            {
              field: 'barcodesatuan2',
              title: 'Barcode Satuan 2',
              width: 150
            },
            {
              field: 'barcodesatuan3',
              title: 'Barcode Satuan 3',
              width: 150
            },
            {
              field: 'namamerk',
              title: 'Merk',
              width: 100
            },
          ]
        ],
        onClickRow: function(index, row) {
          indexSelectedBarangset = index;
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_data_barangset', index, field);
          if (field == 'kode') {
            ed.combogrid('grid').datagrid('options').url = link_api.browseBarang;
            ed.combogrid('grid').datagrid('load', {
              q: ''
            });
            ed.combogrid('showPanel');
          }
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_data_barangset', index, cell.field);
          var row_update = {};
          switch (cell.field) {
            case 'kode':
              var e_kodebarang = get_editor('#table_data_barangset', index, 'kode');

              e_kodebarang.combogrid('textbox').focus();

              var save = true;
              var rows = $('#table_data_barangset').datagrid('getRows');
              if (rows.length > 1) {
                for (var i = 0; i < rows.length; i++) {
                  if (i != index && e_kodebarang.combogrid('getValue') == rows[i].kode) {

                    $.messager.alert('Error', 'Barang tidak boleh kembar', 'error', function() {
                      e_kodebarang.combogrid('textbox').focus();
                    });

                    return false;
                    break;
                  }
                }
              }

              var data = ed.combogrid('grid').datagrid('getSelected');
              console.log('data on end edit', data);
              console.log('changes on end edit', changes);
              var nama = data ? data.nama : changes.nama.toUpperCase();
              var id = data ? data.uuidbarang : changes.uuidbarang;
              var barcodesatuan1 = data ? data.barcodesatuan1 : changes.barcodesatuan1.toUpperCase();
              var barcodesatuan2 = data ? data.barcodesatuan2 : changes.barcodesatuan2.toUpperCase();
              var barcodesatuan3 = data ? data.barcodesatuan3 : changes.barcodesatuan3.toUpperCase();
              var partnumber = data ? data.partnumber : changes.partnumber.toUpperCase();
              var namamerk = data ? data.namamerk : changes.namamerk.toUpperCase();
              var jml = data ? data.jml : '';
              row_update = {
                uuidbarangset: id,
                nama: nama,
                barcodesatuan1: barcodesatuan1,
                partnumber: partnumber,
                namamerk: namamerk,
                satuanutama: data.satuanutama,
                jml: jml
              };
          }
          if (jQuery.isEmptyObject(row_update) == false) {
            $(this).datagrid('updateRow', {
              index: index,
              row: row_update
            });
          }
        },
        onLoadSuccess: function(data) {
          hitung_total_barang();
        },
        onAfterDeleteRow: function(index, row) {
          hitung_total_barang();
        },
        onAfterEdit: function(index, row, changes) {
          hitung_total_barang();
        }
      }).datagrid('enableCellEditing');

      //untuk macam kategori
      for (var i = 1; i <= 7; i++) {
        $('#nama_kategori_' + i).combogrid({
          panelWidth: 170,
          mode: 'remote',
          idField: 'namakategori',
          textField: 'namakategori',
          sortName: 'kode',
          sortOrder: 'asc',
          url: link_api.browseBarangKategori,
          columns: [
            [{
              field: 'namakategori',
              title: 'Kategori',
              width: 150,
            }, ]
          ],
          onChange: function(newVal, oldVal) {
            oldvalue = oldVal;
          },
          onSelect: function(index, row) {
            var jmlKembar = 0;
            var indexberubah = 0;
            for (var a = 1; a <= indexKategori; a++) {
              if ($('#nama_kategori_' + a).combogrid('getValue') == row.namakategori) {
                jmlKembar++;
                indexberubah = a;
              }
            }

            if (jmlKembar > 1) {
              $.messager.alert('Warning', 'Kategori Tidak Boleh Kembar', 'warning');
              $('#nama_kategori_' + indexberubah).combogrid('setValue', oldvalue)
            }
          },
        });

        $('#kategori_' + i).hide();
      }

      $("#form_merk").dialog({
        onOpen: function() {
          $("#NAMAMERK").textbox('clear');
          $("#DISCOUNT").textbox('setValue', '0.00%');
          $("#CATATAN").textbox('clear');
        },
      }).dialog('close');

      $('#KODEMERKBARANG').combogrid({
        required: true,
        panelWidth: 330,
        mode: 'remote',
        idField: 'kode',
        textField: 'nama',
        sortName: 'kode',
        sortOrder: 'asc',
        url: link_api.browseMerk,
        onSelect: function(index, row) {
          $('#uuidmerk').val(row.uuidmerk);
        },
        columns: [
          [{
              field: 'uuidmerk',
              title: 'ID Merk',
              hidden: true
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
      });

      $('#nama_kategori').combogrid({
        panelWidth: 170,
        mode: 'remote',
        idField: 'namakategori',
        textField: 'namakategori',
        sortName: 'kode',
        sortOrder: 'asc',
        url: link_api.browseBarangKategori,
        columns: [
          [{
            field: 'namakategori',
            title: 'Kategori',
            width: 150,
          }, ]
        ]
      });

      $('#KODEPERKIRAANPERSEDIAAN').combogrid({
        required: true,
        panelWidth: 330,
        mode: 'remote',
        idField: 'kode',
        textField: 'nama',
        sortName: 'kode',
        sortOrder: 'asc',
        url: link_api.browsePerkiraan,
        onBeforeLoad: function(param) {
          param.jenis = 'detail';
          param.aktif = 1;
        },
        columns: [
          [{
              field: 'uuidperkiraan',
              title: 'ID Akun',
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
            }
          ]
        ],
        onSelect: function(index, row) {
          $('#IDPERKIRAANPERSEDIAAN').val(row.uuidperkiraan);
        }
      });

      $('#KODEPERKIRAANHPP').combogrid({
        required: true,
        panelWidth: 330,
        mode: 'remote',
        idField: 'kode',
        textField: 'nama',
        sortName: 'kode',
        sortOrder: 'asc',
        url: link_api.browsePerkiraan,
        onBeforeLoad: function(param) {
          param.jenis = 'detail';
          param.aktif = 1;
        },
        columns: [
          [{
              field: 'uuidperkiraan',
              title: 'ID Akun',
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
            }
          ]
        ],
        onSelect: function(index, row) {
          $('#IDPERKIRAANHPP').val(row.uuidperkiraan);
        }
      });

      $('#form_input').form({
        url: link_api.simpanBarang,
        ajax: true,
        iframe: false,
        success: function(data) {
          $.messager.progress('close');
          var msg = JSON.parse(data);

          var mode = $('#mode').val();

          if (msg.success) {
            if (mode == 'tambah') {
              $.messager.show({
                title: 'Info',
                msg: 'Simpan Data Sukses',
                showType: 'show'
              });
              tambah();
            } else {
              //tutup tab dan refresh data di function
              $.messager.alert('Info', 'Simpan Data Sukses', 'info');
            }
            // parent.reload();
          } else {
            $.messager.alert('Error', msg.errorMsg, 'error');
          }
        },
      });

      $('#FILEGAMBAR').filebox({
        accept: 'image/*',
        onChange: function(newVal, oldVal) {
          var input = $(this).next().find('.textbox-value')[0];

          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#preview-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
          }
        }
      });

      if ("{{ $mode }}" == "tambah") {
        tambah();
      } else if ("{{ $mode }}" == "ubah") {
        ubah();
      }
    })

    $("#table_data_barangkategori").datagrid({
      width: '100%',
      fit: true,
      clickToEdit: false,
      dblclickToEdit: true,
      // singleSelect: true,
      rownumbers: true,
      data: [],
      columns: [
        [{
          field: 'namakategori',
          title: 'Nama Kategori',
          width: 200,
          editor: {
            type: 'combogrid',
            options: {
              panelWidth: 240,
              mode: 'remote',
              sortName: 'namakategori',
              idField: 'namakategori',
              textField: 'namakategori',
              columns: [
                [{
                  field: 'namakategori',
                  title: 'Nama Kategori',
                  width: 230
                }]
              ],
            }
          }
        }, ]
      ],
      onCellEdit: function(index, field, val) {
        var row = $(this).datagrid('getRows')[index];
        var ed = get_editor('#table_data_barangkategori', index, field);
        if (field == 'namakategori') {
          ed.combogrid('grid').datagrid('options').url = link_api.browseBarangKategori;
          ed.combogrid('grid').datagrid('load', {
            q: ''
          });
          ed.combogrid('showPanel');
        }
      },
      onEndEdit: function(index, row, changes) {
        var cell = $(this).datagrid('cell');
        var ed = get_editor('#table_data_barangkategori', index, cell.field);
        var row_update = {};

        switch (cell.field) {
          case 'namakategori':
            var data = ed.combogrid('grid').datagrid('getSelected');
            var nama = data ? data.namakategori : changes.namakategori.toUpperCase();
            //var jml = data ? data.JML : '';
            row_update = {
              namakategori: nama,
            };
        }
        if (jQuery.isEmptyObject(row_update) == false) {
          $(this).datagrid('updateRow', {
            index: index,
            row: row_update
          });
        }
      },
    }).datagrid('enableCellEditing');

    shortcut.add('F8', function() {
      simpan();
    });

    function tutup() {
      parent.tutupTab();
    }

    function tambah() {
      get_akses_user('QTIO7', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        const akseshargajualsatuan = data.hakakses == 1;
        const ubahhargajualsatuan = data.ubah == 1 || data.tambah == 1;
        if (akseshargajualsatuan) $('#akseshargajualsatuan').show();
        if (ubahhargajualsatuan) $('#ubahhargajualsatuan').show();
        tutupLoader();
      });
      $('#form_input').form('clear');

      $("#CONTOHSATUAN").textbox('setValue',
        ' Satuan 1 = DOS, Satuan 2 = PACK, Satuan 3 = PCS \n Konversi 1 = 10, Konversi 2 = 12 \n\n Cara Membacanya: \n 1 DOS Berisi 10 PACK, 1 PACK Berisi 12 PCS'
      );

      $('#mode').val('tambah');

      $('#table_data_lokasi').datagrid('checkAll');

      $('#cb_kategori_1').prop('checked', true);
      $('#STATUS').prop('checked', true);
      $('#STOK').prop('checked', true);
      $('#PPN').prop('checked', true);

      $('#table_data_barangset').datagrid('loadData', []);
      $('#table_data_barangkategori').datagrid('loadData', []);
      $('#table_data_supplier').datagrid('loadData', []);

      $('#btn_ubah_hargajual').hide();

      $("#satuan_field2").hide();
      $("#satuan_field3").hide();

      $("#KONVERSI1").textbox('setValue', 1);
      $("#KONVERSI2").textbox('setValue', 1);

      $("#SATUAN").textbox('readonly', false);
      $("#KONVERSI1").textbox('readonly', false);
      $("#SATUAN2").textbox('readonly', false);
      $("#KONVERSI2").textbox('readonly', false);
      $("#SATUAN3").textbox('readonly', false);

      $("#barcodesatuan1").textbox('readonly', false);
      $("#barcodesatuan2").textbox('readonly', false);
      $("#barcodesatuan3").textbox('readonly', false);

      $('#lbl_kasir, #lbl_tanggal').html('');

      $('#HARGAJUALSATUAN').prop('checked', true);

      $('#KODEMERK').textbox({
        prompt: "Auto Generate",
        readonly: true,
        required: false
      });

      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link_api.loadLastPerkiraan,
        cache: false,
        success: function(msg) {
          console.log('loadLastPerkiraan', msg);
          if (msg.tglentry != null) {
            $('#KODEPERKIRAANPERSEDIAAN').combogrid('setValue', {
              kode: msg.kodeperkiraanpersediaan,
              nama: msg.namaperkiraanpersediaan
            });
            $('#KODEPERKIRAANHPP').combogrid('setValue', {
              kode: msg.kodeperkiraanhpp,
              nama: msg.namaperkiraanhpp
            });

            $('#IDPERKIRAANPERSEDIAAN').val(msg.uuidperkiraanpersediaan);
            $('#IDPERKIRAANHPP').val(msg.uuidperkiraanhpp);
          }
        }
      });

      getConfig("KODEBARANG", "MBARANG", 'bearer {{ session('TOKEN') }}',
        function(response) {
          if (response.success) {
            const kode = response.data.value;
            if (kode == 'AUTO') {
              $('#KODEBARANG').textbox({
                prompt: "Auto Generate",
                readonly: true,
                required: false
              });
            } else {
              $('#KODEBARANG').textbox({
                prompt: "",
                readonly: false,
                required: true
              });
              $('#KODEBARANG').textbox('clear').textbox('textbox').focus();
            }
          } else {
            $.messager.alert('Error', response.message, 'error');
          }
        },
        function(error) {
          $.messager.alert('Error', "Request Config Error", 'error');
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

    async function ubah() {
      $('#mode').val('ubah');
      const response = await fetchData(link_api.headerFormBarang, {
        uuidbarang: '{{ $data }}'
      });
      const data = response.data;
      const row = data.row;

      const akseshargajualsatuan = data.akseshargajualsatuan;
      const ubahhargajualsatuan = data.ubahhargajualsatuan;
      if (akseshargajualsatuan) $('#akseshargajualsatuan').show();
      if (ubahhargajualsatuan) $('#ubahhargajualsatuan').show();
      tutupLoader();

      if (row) {

        $('#KODEMERK').textbox({
          prompt: "Auto Generate",
          readonly: true,
          required: false
        });

        $("#CONTOHSATUAN").textbox('setValue',
          ' Satuan 1 = DOS, Satuan 2 = PACK, Satuan 3 = PCS \n Konversi 1 = 10, Konversi 2 = 12 \n\n Cara Membacanya: \n 1 DOS Berisi 10 PACK, 1 PACK Berisi 12 PCS'
        );

        $('#form_input').form('load', row);
        $('#mode').val('ubah');

        $.ajax({
          type: 'POST',
          dataType: 'json',
          url: link_api.cekTransaksiBarang,
          data: {
            uuidbarang: row.uuidbarang
          },
          async: false,
          cache: false,
          success: function(msg) {
            opt = msg.ada_transaksi;

            $("#SATUAN").add($("#KONVERSI1")).add($("#SATUAN2")).add($("#KONVERSI2")).add($("#SATUAN3")).textbox(
              'readonly', opt);

            if (opt) {
              $('#tambah_satuan_1').linkbutton('disable');
              $('#tambah_satuan_2').linkbutton('disable');
              $('#tambah_satuan_3').linkbutton('disable');
              $('#hapus_satuan_2').linkbutton('disable');
              $('#hapus_satuan_3').linkbutton('disable');
              $("#satuanbarangtranskasi").show();
            }
          }
        });

        $('#scanbarcodebbk').prop('checked', row.scanbarcodebbk == 1);
        $('#detailsetubah').prop('checked', row.detailsetubah == 1);

        $('#btn_ubah_hargajual').show();

        $("#satuan_field1").show();
        $("#satuan_field2").show();
        $("#satuan_field3").show();

        $("#barcodesatuan1").show();
        $("#barcodesatuan2").show();
        $("#barcodesatuan3").show();

        $("#tambah_satuan_1").show();
        $("#tambah_satuan_2").show();

        $("#hapus_satuan_1").show();
        $("#hapus_satuan_2").show();
        $("#hapus_satuan_3").show();

        // load gambar
        var gambar = row.gambar;

        if (row.gambar != 'NO_IMAGE.jpg') {
          $('#preview-image').attr('src', base_url + 'assets/foto_barang/{{ session('IDPERUSAHAAN') }}/' +
            row.gambar);
        } else {
          $('#preview-image').attr('src', base_url + 'assets/foto_barang/NO_IMAGE.jpg');
        }

        if (row.satuan2 == null || row.satuan2 == "") {
          indexSatuan = 1;
          $("#satuan_field2").hide();
          $("#satuan_field3").hide();

          $("#barcodesatuan2").hide();
          $("#barcodesatuan3").hide();

          $("#tambah_satuan_2").hide();

          $("#hapus_satuan_2").hide();
          $("#hapus_satuan_3").hide();
        } else if (row.satuan3 == null || row.satuan3 == "") {
          indexSatuan = 2;
          $("#satuan_field3").hide();

          $("#tambah_satuan_1").hide();

          $("#barcodesatuan1").hide();
          $("#barcodesatuan3").hide();

          $("#hapus_satuan_1").hide();
          $("#hapus_satuan_3").hide();
        } else {
          indexSatuan = 3;

          $("#tambah_satuan_1").hide();
          $("#tambah_satuan_2").hide();

          $("#barcodesatuan1").hide();
          $("#barcodesatuan2").hide();

          $("#hapus_satuan_1").hide();
          $("#hapus_satuan_2").hide();
        }

        load_data_barangkategori(row.uuidbarang);
        load_data_barangset(row.uuidbarang);
        load_data_supplier(row.uuidbarang);
        load_data_lokasi(row.uuidbarang);

        tampil_hargajual_berdasarkan_satuan(row.uuidbarang);

        $('#JMLHASILSET').numberbox('setValue', row.jmlhasilset);
        $('#KODEPERKIRAANPERSEDIAAN').combogrid('setValue', {
          id: row.uuidperkiraanpersediaan,
          kode: row.kodeperkiraanpersediaan,
          nama: row.namaperkiraanpersediaan
        });
        $('#KODEPERKIRAANHPP').combogrid('setValue', {
          id: row.uuidperkiraanhpp,
          kode: row.kodeperkiraanhpp,
          nama: row.namaperkiraanhpp
        });
        $('#KODEMERKBARANG').combogrid('setValue', {
          kode: row.kodemerk,
          nama: row.namamerk
        });
        $('#lbl_kasir').html(row.userbuat);
        $('#lbl_tanggal').html(row.tglentry);
        $('#KODEBARANG').textbox('readonly', true);

        get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
          data = data.data;
          if (data.ubah != 1) {
            $('#btn_simpan').css('filter', 'grayscale(100%)').removeAttr('onclick');
          }
        });
      }
    }

    async function simpan() {
      $('#data_barangset').val(JSON.stringify($('#table_data_barangset').datagrid('getRows')));
      $('#data_lokasi').val(JSON.stringify($('#table_data_lokasi').datagrid('getChecked')));

      $('#table_data_barangkategori').datagrid('loadData', []);
      for (var i = 1; i <= indexKategori; i++) {
        if ($('#nama_kategori_' + i).textbox('getValue') != "") {
          var kategoriutama = 0;
          if (indexCbKategori == i) {
            kategoriutama = 1;
          }
          $('#table_data_barangkategori').datagrid('appendRow', {
            namakategori: $('#nama_kategori_' + i).textbox('getValue'),
            kategoriutama: kategoriutama,
          });
        }
      }

      if (!isTokenExpired()) {

        $('#data_barangkategori').val(JSON.stringify($('#table_data_barangkategori').datagrid('getRows')));

        var isValid = $('#form_input').form('validate');

        if ($("#KONVERSI1").val() > 1 && $("#SATUAN2").val() == "") {
          $.messager.alert('Warning', "Satuan 2 Belum Diisi", 'warning');
          isValid = false;
        }
        if ($("#KONVERSI2").val() > 1 && $("#SATUAN3").val() == "") {
          $.messager.alert('Warning', "Satuan 3 Belum Diisi", 'warning');
          isValid = false;
        }

        if (isValid) {
          mode = $('[name=mode]').val();

          tampilLoaderSimpan();

          const datasupplier = $('#table_data_supplier').datagrid('getRows');
          const filteredData = datasupplier.filter(row => Object.values(row).some(val => val !== null && val !==
            undefined));
          $('#data_supplier').val(JSON.stringify(filteredData));

          const data = $('#form_input').serializeArray();
          const payload = {};
          for (let i = 0; i < data.length; i++) {
            if (typeof data[i].value === 'string' && data[i].name.startsWith('data_')) {
              data[i].value = JSON.parse(data[i].value);
            }
            payload[data[i].name] = data[i].value;
          }
          if ('{{ $mode }}' == 'ubah') {
            const barangset = payload.data_barangset;
            for (let i = 0; i < barangset.length; i++) {
              barangset[i].uuidbarangset = payload.uuidbarang;
            }
            payload.data_barangset = barangset;
          }

          try {
            const response = await fetchData(link_api.simpanBarang, payload);
            tutupLoaderSimpan();
            if (response.success) {
              $.messager.alert('Info', 'Simpan Data Sukses', 'info');
              if (mode == 'tambah') {
                tambah();
              }
            } else {
              $.messager.alert('Error', response.message, 'error');
            }
          } catch (error) {
            tutupLoaderSimpan();
            console.log(error);
            $.messager.alert('Error', 'Terjadi kesalahan saat menyimpan data', 'error');
            return;
          }
        }
      } else {
        $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
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
        console.error('Gagal mendekode token JWT:', e);
        return true;
      }
    }

    function load_data_barangset(idbarang) {
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link_api.loadBarangSet,
        data: {
          uuidbarang: idbarang
        },
        cache: false,
        beforeSend: function() {
          $('#table_data_barangset').datagrid('loading');
        },
        success: function(msg) {
          $('#table_data_barangset').datagrid('loaded');
          for (var i = 0; i < msg.length; i++) {
            msg[i].kode = msg[i].kodebarang;
            msg[i].nama = msg[i].namabarang;
            msg[i].jml = msg[i].jmldibutuhkan;
          }
          $('#table_data_barangset').datagrid('loadData', msg);
        }
      });
    }

    function load_data_supplier(idbarang) {
      $.ajax({
        url: link_api.loadDataSupplier,
        type: 'POST',
        data: {
          uuidbarang: idbarang
        },
        dataType: 'JSON',
        beforeSend: function() {
          $('#table_data_supplier').datagrid('loading');
        },
        success: function(response) {
          $('#table_data_supplier').datagrid('loaded');
          $('#table_data_supplier').datagrid('loadData', response);
        }
      })
    }

    function load_data_lokasi(idbarang) {
      $.ajax({
        url: link_api.loadDataLokasi,
        type: 'POST',
        data: {
          uuidbarang: idbarang
        },
        dataType: 'JSON',
        success: function(response) {
          var daftarlokasi = $('#table_data_lokasi').datagrid('getRows');

          for (var i = 0; i < response.length; i++) {
            for (var j = 0; j < daftarlokasi.length; j++) {
              if (response[i].uuidlokasi == daftarlokasi[j].uuidlokasi) {
                $('#table_data_lokasi').datagrid('checkRow', j);
              }
            }
          }
        }
      })
    }

    function load_data_barangkategori(idbarang) {
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link_api.loadDaftarKategori,
        data: {
          uuidbarang: idbarang
        },
        cache: false,
        success: function(msg) {
          $('#table_data_barangkategori').datagrid('loadData', msg);

          var rows = $('#table_data_barangkategori').datagrid('getRows');

          for (var i = 0; i < rows.length; i++) {

            $('#kategori_' + indexKategori).show();
            $('#nama_kategori_' + indexKategori).textbox('setValue', rows[i].namakategori);

            var index = (i + 1);
            if (rows[i].kategoriutama == "1") {

              $('#cb_kategori_' + index).prop('checked', true);
            } else {
              $('#cb_kategori_' + index).prop('checked', false);
            }

            indexKategori++;

          }
        }
      });
    }

    function previewGambar() {
      if (row.gambar != 'NO_IMAGE.jpg') {
        window.open(base_url + 'assets/foto_barang/{{ session('IDPERUSAHAAN') }}/' + row.gambar, 'Gambar',
          'resizable,scrollbars,status');
      } else {
        window.open(base_url + 'assets/foto_barang/NO_IMAGE.jpg', 'Gambar', 'resizable,scrollbars,status');
      }
    }

    function pilih_merk() {
      @php
        $kodemenumerk = null;
        $menus = session('array_menu');
        $stack = [];

        foreach ($menus as $menu) {
            $stack[] = $menu;
        }

        while (!empty($stack)) {
            $current = array_pop($stack);

            if (is_array($current) && isset($current['namamenu']) && $current['namamenu'] === 'Merk' && $current['namainduk'] === 'Data') {
                $kodemenumerk = $current['kodemenu'];
                break;
            }

            if (isset($current['children']) && is_array($current['children'])) {
                foreach ($current['children'] as $child) {
                    $stack[] = $child;
                }
            }
        }
      @endphp

      get_akses_user('{{ $kodemenumerk }}', 'bearer {{ session('TOKEN') }}', function(data) {
        data = data.data;
        if (data.tambah == 1) {
          $("#form_merk").dialog('open');
        } else {
          $.messager.alert('Warning', 'Anda Tidak Memiliki Hak Akses', 'warning');
        }
      });
    }

    function simpan_merk() {

      var cekDiskon = cek_format($('#DISCOUNTMINMERK').textbox('getValue'));

      if (cekDiskon == "error") {
        $.messager.alert('Peringatan', 'Discount Hanya Boleh Berisi + . Dan Angka Saja', 'error');

        return false;
      }

      var cekDiskon = cek_format($('#DISCOUNTMAXMERK').textbox('getValue'));

      if (cekDiskon == "error") {
        $.messager.alert('Peringatan', 'Discount Hanya Boleh Berisi + . Dan Angka Saja', 'error');

        return false;
      }

      var diskonmin = hitungAkumulasiDiskonPersen($('#DISCOUNTMINMERK').textbox('getValue'));
      var diskonmax = hitungAkumulasiDiskonPersen($('#DISCOUNTMAXMERK').textbox('getValue'));

      if (diskonmin > diskonmax) {
        $.messager.alert('Peringatan', 'Disc Min harus lebih kecil dari Disc Max', 'error');

        return false;
      }

      $.ajax({
        type: 'POST',
        url: link_api.simpanMerk,
        data: $('#form_merk :input').serialize() + "&mode=tambah&aktif=1",
        dataType: 'json',
        success: function(msg) {
          if (msg.success) {
            $.messager.alert('Info', 'Simpan Data Sukses', 'info');
            $("#form_merk").dialog('close');
            $('#KODEMERKBARANG').combogrid('grid').datagrid('reload');
            $('#KODEMERKBARANG').combogrid('setValue', {
              kode: msg.kodemerk,
              nama: msg.namamerk
            });
          } else {
            $.messager.alert('Error', msg.errorMsg, 'error');
          }
        }
      });

    }

    function tutup_merk() {
      $("#form_merk").dialog('close');
    }

    function tambahKategori() {
      if (indexKategori < 8) {
        var nama_kategori = $('#nama_kategori').textbox('getValue');

        if (nama_kategori == '') {
          return;
        }

        var ada = false;
        for (var i = 1; i <= indexKategori; i++) {
          if ($('#nama_kategori_' + i).combogrid('getValue') == nama_kategori) {
            ada = true;
          }
        }

        if (!ada) {
          $('#kategori_' + indexKategori).show();
          $('#nama_kategori_' + indexKategori).combogrid('setValue', nama_kategori);

          indexKategori++;
        } else {
          $.messager.alert('Warning', 'Kategori Tidak Boleh Kembar', 'warning');
        }
      } else {
        $.messager.alert('Warning', 'Kategori Maksimal 7 Macam', 'warning');
      }

      $('#nama_kategori').combogrid('clear');
    }


    function hapusKategori(i) {
      indexKategori--;
      $("#kategori_" + i).hide();
      $('#nama_kategori_' + i).textbox('clear');
    }

    function tambahSatuan() {
      // cek jika sudah barang adalah barang set
      var rows = $('#table_data_barangset').datagrid('getRows');

      indexSatuan++;
      if (indexSatuan == 2) {
        $("#satuan_field2").show();
        $("#tambah_satuan_2").show();
        $("#tambah_satuan_1").hide();
        $("#barcodesatuan2").show();
        $("#barcodesatuan1").hide();
        $("#barcodesatuan3").hide();
        $("#hapus_satuan_2").show();
        $("#hapus_satuan_3").hide();
      } else if (indexSatuan == 3) {
        $("#satuan_field3").show();
        $("#tambah_satuan_2").hide();
        $("#tambah_satuan_1").hide();
        $("#barcodesatuan2").hide();
        $("#barcodesatuan1").hide();
        $("#barcodesatuan3").show();
        $("#hapus_satuan_2").hide();
        $("#hapus_satuan_3").show();
      } else {
        $.messager.alert('Warning', 'Maksimal Hingga Satuan 3', 'warning');
      }
    }

    function hapusSatuan() {
      indexSatuan--;
      if (indexSatuan == 1) {
        $("#satuan_field2").hide();
        $("#tambah_satuan_1").show();
        $("#tambah_satuan_2").hide();
        $("#barcodesatuan1").show();
        $("#barcodesatuan2").hide();
        $("#barcodesatuan3").hide();
        $("#hapus_satuan_1").show();
        $("#hapus_satuan_2").hide();
        $("#hapus_satuan_3").hide();
        $("#SATUAN2").textbox('setValue', '');
        $("#KONVERSI1").textbox('setValue', 1.00);

      } else if (indexSatuan == 2) {
        $("#satuan_field3").hide();
        $("#tambah_satuan_2").show();
        $("#tambah_satuan_1").hide();
        $("#barcodesatuan2").show();
        $("#barcodesatuan1").hide();
        $("#barcodesatuan3").hide();
        $("#hapus_satuan_2").show();
        $("#hapus_satuan_3").hide();
        $("#SATUAN3").textbox('setValue', '');
        $("#KONVERSI2").textbox('setValue', 1.00);
      } else {
        $.messager.alert('Warning', 'Maksimal Hingga Satuan 3', 'warning');
      }
    }

    function hitung_total_barang() {
      var data = $("#table_data_barangset").datagrid('getRows');

      var footer = {
        jml: 0,
        kode: "Jumlah Detail Barang",
        nama: data.length
      }
      for (var i = 0; i < data.length; i++) {
        footer.jml += parseFloat(data[i].jml);
      }
      $('#table_data_barangset').datagrid('reloadFooter', [footer]);
    }

    function buat_table_data_supplier(id) {
      $(id).datagrid({
        height: '140px',
        rownumbers: true,
        singleSelect: true,
        toolbar: '#toolbar-supplier',
        columns: [
          [{
            field: 'namasupplier',
            title: 'Supplier',
            width: 200,
            editor: {
              type: 'combogrid',
              options: {
                panelWidth: 380,
                mode: 'remote',
                required: true,
                idField: 'nama',
                textField: 'nama',
                url: link_api.browseSupplier,
                columns: [
                  [{
                      field: 'kode',
                      title: 'Kode',
                      width: 100
                    },
                    {
                      field: 'nama',
                      title: 'Nama',
                      width: 250
                    },
                  ]
                ],
              }
            }
          }, ]
        ],
        onClickRow: function(index, row) {
          indexSelectedSupplier = index;
        },
        onCellEdit: function(index, field, val) {
          var ed = get_editor(id, index, field);

          ed.combogrid('showPanel');
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor(id, index, cell.field);
          var row_update = {};

          switch (cell.field) {
            case 'namasupplier':
              var data = ed.combogrid('grid').datagrid('getSelected');

              row_update = {
                uuidsupplier: data.uuidsupplier
              };
              break;
          }

          if (jQuery.isEmptyObject(row_update) == false) {
            $(this).datagrid('updateRow', {
              index: index,
              row: row_update
            });
          }
        }
      }).datagrid('enableCellEditing');
    }

    function buat_table_data_lokasi(id) {
      $(id).datagrid({
        height: '110px',
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
        onLoadSuccess: function() {
          if ($('#mode').val() == 'tambah') {
            $('#table_data_lokasi').datagrid('checkAll');
          }
        }
      });
    }

    function buat_table_hargajual_berdasarkan_satuan() {
      $('#table_hargajual_berdasarkan_satuan').datagrid({
        toolbar: '#toolbar-hargajual',
        columns: [
          [{
              field: 'kodelokasi',
              title: 'Lokasi',
              width: 60,
              align: 'center',
              rowspan: 2,
            },
            {
              field: 'namalokasi',
              title: 'Nama Lokasi',
              width: 150,
              align: 'left',
              rowspan: 2,
            },
            {
              field: 'pembelianterakhir',
              title: 'Pembelian Terakhir',
              colspan: 3,
              align: 'center'
            },
            {
              field: 'tglaktif',
              title: 'Tgl. Aktif<br>Terakhir',
              width: 80,
              align: 'center',
              rowspan: 2
            },
            {
              field: 'satuan',
              title: 'Sat. Besar',
              width: 80,
              align: 'center',
              rowspan: 2,
            },
            {
              field: 'persentaseminsatuan',
              title: '% Mrgn Min',
              width: 80,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 2
                }
              }
            },
            {
              field: 'hargajualminsatuan',
              title: 'H. Jual Min',
              width: 80,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 0
                }
              }
            },
            {
              field: 'persentasemaxsatuan',
              title: '% Mrgn Max',
              width: 80,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 2
                }
              }
            },
            {
              field: 'hargajualmaxsatuan',
              title: 'H. Jual Max',
              width: 80,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 0
                }
              }
            },
            {
              field: 'satuan2',
              title: 'Sat. Tengah',
              width: 80,
              align: 'center',
              rowspan: 2,
            },
            {
              field: 'persentaseminsatuan2',
              title: '% Mrgn Min',
              width: 80,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 2
                }
              }
            },
            {
              field: 'hargajualminsatuan2',
              title: 'H. Jual Min',
              width: 80,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 0
                }
              }
            },
            {
              field: 'persentasemaxsatuan2',
              title: '% Mrgn Max',
              width: 80,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 2
                }
              }
            },
            {
              field: 'hargajualmaxsatuan2',
              title: 'H. Jual Max',
              width: 80,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 0
                }
              }
            },
            {
              field: 'satuan3',
              title: 'Sat. Kecil',
              width: 80,
              align: 'center',
              rowspan: 2,
            },
            {
              field: 'persentaseminsatuan3',
              title: '% Mrgn Min',
              width: 80,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 2
                }
              }
            },
            {
              field: 'hargajualminsatuan3',
              title: 'H. Jual Min',
              width: 80,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 0
                }
              }
            },
            {
              field: 'persentasemaxsatuan3',
              title: '% Mrgn Max',
              width: 80,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 2
                }
              }
            },
            {
              field: 'hargajualmaxsatuan3',
              title: 'H. Jual Max',
              width: 80,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 0
                }
              }
            },
          ],
          [{
              field: 'satuanbeliterakhir',
              title: 'Sat. Beli',
              width: 60,
              align: 'center'
            },
            {
              field: 'tglbeliterakhir',
              title: 'Tgl. Beli',
              width: 80,
              align: 'center'
            },
            {
              field: 'hargabeliterakhir',
              title: 'Harga Beli',
              width: 100,
              align: 'right',
              formatter: format_amount
            },
          ]
        ]
      });
    }

    function tampil_hargajual_berdasarkan_satuan(idbarang) {
      $.ajax({
        url: link_api.loadHargaJualTerakhirBerdasarkanSatuan,
        data: {
          uuidbarang: idbarang
        },
        type: 'POST',
        dataType: 'JSON',
        success: function(response) {
          $('#table_hargajual_berdasarkan_satuan').datagrid('loadData', response);
        }
      });
    }

    function tampil_window_ubah_hargajual(event) {
      event.preventDefault();

      $('#TANGGALAKTIF').datebox('setValue', date_format());

      $('#window_ubah_hargajual').window({
        closed: false
      });

      $('#HARGAJUAL_SATUAN_WRAPPER').show();
      $('#HARGAJUAL_SATUAN2_WRAPPER').show();
      $('#HARGAJUAL_SATUAN3_WRAPPER').show();

      $('#LABEL_HARGAJUAL_SATUAN').text($('#SATUAN').textbox('getValue'));

      if ($('#SATUAN2').textbox('getValue') == '') {
        $('#HARGAJUAL_SATUAN2_WRAPPER').hide();
      } else {
        $('#LABEL_HARGAJUAL_SATUAN2').text($('#SATUAN2').textbox('getValue'));
      }

      if ($('#SATUAN3').textbox('getValue') == '') {
        $('#HARGAJUAL_SATUAN3_WRAPPER').hide();
      } else {
        $('#LABEL_HARGAJUAL_SATUAN3').text($('#SATUAN3').textbox('getValue'));
      }
    }

    function browse_data_lokasi(id) {
      $(id).combogrid({
        panelWidth: 380,
        url: link_api.browseLokasi,
        idField: 'id',
        textField: 'nama',
        mode: 'local',
        sortName: 'nama',
        sortOrder: 'asc',
        multiple: false,
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
        onSelect: function(index, row) {
          $.ajax({
            url: link_api.loadHargaJual,
            type: 'POST',
            dataType: 'JSON',
            data: {
              uuidbarang: $('#IDBARANG').val(),
              uuidlokasi: row.uuidlokasi
            },
            success: function(data) {
              $('#LABEL_HARGAJUAL_SATUAN').text(data[0].satuan);
              $('#HARGAJUALMIN_SATUAN').numberbox('setValue', data[0].hargajualmin);
              $('#HARGAJUALMAX_SATUAN').numberbox('setValue', data[0].hargajualmax);

              if (data.length > 1) {
                $('#LABEL_HARGAJUAL_SATUAN2').text(data[1].satuan);
                $('#HARGAJUALMIN_SATUAN2').numberbox('setValue', data[1].hargajualmin);
                $('#HARGAJUALMAX_SATUAN2').numberbox('setValue', data[1].hargajualmax);
              }

              if (data.length == 3) {
                $('#LABEL_HARGAJUAL_SATUAN3').text(data[2].satuan);
                $('#HARGAJUALMIN_SATUAN3').numberbox('setValue', data[2].hargajualmin);
                $('#HARGAJUALMAX_SATUAN3').numberbox('setValue', data[2].hargajualmax);
              }
            }
          })
        }
      });
    }

    function simpan_hargajual() {
      if ($('#LOKASIHARGAJUAL').combogrid('getValue') == '') {
        $.messager.alert('Peringatan', 'Lokasi belum dipilih', 'warning');

        return false;
      }

      $.ajax({
        url: link_api.simpanHargaJual,
        type: 'POST',
        dataType: 'JSON',
        data: {
          uuidbarang: $('#IDBARANG').val(),
          hargajualminmsatuan: $('#HARGAJUALMIN_SATUAN').numberbox('getValue'),
          hargajualmaxsatuan: $('#HARGAJUALMAX_SATUAN').numberbox('getValue'),
          hargajualminmsatuan2: $('#HARGAJUALMIN_SATUAN2').numberbox('getValue'),
          hargajualmaxsatuan2: $('#HARGAJUALMAX_SATUAN2').numberbox('getValue'),
          hargajualminmsatuan3: $('#HARGAJUALMIN_SATUAN3').numberbox('getValue'),
          hargajualmaxsatuan3: $('#HARGAJUALMAX_SATUAN3').numberbox('getValue'),
          uuidlokasi: $('#LOKASIHARGAJUAL').combogrid('getValue')
        },
        success: function(response) {
          if (response.success) {
            $.messager.show({
              title: 'Info',
              msg: 'Simpan Harga Jual Sukses',
              showType: 'show'
            });

            $('#window_ubah_hargajual').window({
              closed: true
            });

            tampil_hargajual_berdasarkan_satuan($('#IDBARANG').val());
          } else {
            $.messager.alert('Error', response.errorMsg, 'error');
          }
        }
      })
    }

    function tambah_detail_barangset() {
      $('#table_data_barangset').datagrid('appendRow', {})
    }

    function hapus_detail_barangset() {
      if (indexSelectedBarangset >= 0) {
        $('#table_data_barangset').datagrid('deleteRow', indexSelectedBarangset);

        indexSelectedBarangset = -1;
      }
    }

    function tambah_detail_supplier() {
      $('#table_data_supplier').datagrid('appendRow', {})
    }

    function hapus_detail_supplier() {
      if (indexSelectedSupplier >= 0) {
        $('#table_data_supplier').datagrid('deleteRow', indexSelectedSupplier);

        indexSelectedSupplier = -1;
      }
    }
  </script>
@endpush
