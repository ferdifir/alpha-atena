@extends('template.app')

@section('content')
  <style>
    .datagrid-row-selected {
      color: rgb(255, 255, 255) !important;
      background: rgb(108, 174, 245) !important;
    }

    .datagrid-row-over {
      color: #404040 !important;
      background: #9cc8f7 !important;
    }
  </style>

  <div id="mask-loader-simpan" hidden>
    <div style="text-align: center" class="wrapper">
      <div>
        <svg class="loader-spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
          <circle class="loader-path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33"
            r="30"></circle>
        </svg>

        <h1 style="font-size: 16px">Proses menyimpan ...</h1>
      </div>
    </div>
  </div>

  <div class="easyui-layout" fit="true">
    <div data-options="region: 'center'">
      <div id="tab_transaksi" class="easyui-tabs" style="width: 100%;height: 100%;">
        <div title="Berdasarkan Satuan">
          <div class="easyui-layout" style="width: 100%;height: 100%">
            <div data-options="region: 'center'">
              <div class="easyui-layout" style="width: 100%;height: 100%">
                <div data-options="region: 'north'" style="height: 250px">
                  <table>
                    <tr>
                      <td valign="top">
                        <fieldset style="display: inline-block;">
                          <legend>Filter</legend>

                          <div style="color: rgb(200, 0, 0);padding: 5px;background-color: #f5d1d6;font-weight: bold;">
                            Data barang yang tampil adalah barang yang berstatus aktif
                          </div>

                          <table>
                            <tr>
                              <td id="label_form">Supplier</td>
                              <td>
                                <input id="FILTER_SATUAN_SUPPLIER" style="width: 250px;">
                              </td>
                            </tr>
                            <tr>
                              <td id="label_form">Merk Barang</td>
                              <td>
                                <input id="FILTER_SATUAN_MERK" style="width: 250px">
                              </td>
                            </tr>
                            <tr>
                              <td id="label_form">Kategori</td>
                              <td>
                                <input id="FILTER_SATUAN_KATEGORI" style="width: 250px;">
                              </td>
                            </tr>
                            <tr>
                              <td id="label_form">Barang</td>
                              <td>
                                <input id="FILTER_SATUAN_BARANGAWAL" style="width: 114px;"> s/d <input
                                  id="FILTER_SATUAN_BARANGAKHIR" style="width: 114px;">
                              </td>
                            </tr>
                            <tr>
                              <td id="label_form">Berisi Kata</td>
                              <td>
                                <input class="label_input" id="FILTER_SATUAN_BERISIKATA" style="width: 250px;"
                                  data-options="prompt: 'Untuk kode barang/nama barang/partnumber/barcode'">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label id="label_form">Lokasi</label>
                              </td>
                              <td>
                                <input id="FILTER_SATUAN_IDLOKASI" style="width: 250px" required>
                                <a href="#" class="easyui-linkbutton"
                                  onclick="tampil_data_barang_berdasarkan_satuan(event)">Tampilkan</a>
                                <a href="#" class="easyui-linkbutton"
                                  onclick="tampil_copy_harga_jual_satuan(event)">Copy Harga Jual</a>
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
                                <input id="TGLAKTIF_SATUAN_HAPUS_HARGAJUAL" style="width: 100px;">
                              </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>
                                <div
                                  style="color: rgb(200, 0, 0);padding: 5px;background-color: #f5d1d6;font-weight: bold;margin: 5px 0">
                                  Aksi ini akan menghapus harga jual semua barang per satuan sesuai tanggal aktif yang
                                  dipilih
                                </div>
                                <a class="easyui-linkbutton" onclick="hapus_hargajual_satuan()">Hapus Harga Jual</a>
                              </td>
                            </tr>
                          </table>
                        </fieldset>
                      </td>
                    </tr>
                  </table>

                  <table>
                    <tr>
                      <td>
                        <label id="label_form">Tgl. Aktif Terbaru</label>
                        <input class="date" style="width: 100px" id="SATUAN_TGLAKTIF">

                        <input type="checkbox" id="SATUAN_CBPERSENTASEMENGIKUTI"> % Satuan tengah & kecil mengikuti satuan
                        besar
                      </td>
                    </tr>
                  </table>
                </div>

                <div data-options="region: 'center'">
                  <table id="table_detail_berdasarkan_satuan" fit="true"></table>
                </div>
              </div>
            </div>
            <div data-options="region: 'east',border: false"
              style="width:50px; padding:5px; border-left:1px solid #29b6f6;">
              <a title="Simpan" class="easyui-tooltip" data-options="plain:false" onclick="simpan_berdasarkan_satuan()">
                <img src="{{ asset('assets/images/simpan.png') }}">
              </a>
            </div>
          </div>
        </div>

        <div title="Berdasarkan Tipe Customer">
          <div class="easyui-layout" style="width: 100%;height: 100%">
            <div data-options="region: 'center'">
              <div class="easyui-layout" style="width: 100%;height: 100%">
                <div data-options="region: 'north'" style="height: 245px">
                  <table>
                    <tr>
                      <td valign="top">
                        <fieldset style="display: inline-block;">
                          <legend>Filter</legend>

                          <div style="color: rgb(200, 0, 0);padding: 5px;background-color: #f5d1d6;font-weight: bold;">
                            Data barang yang tampil adalah barang yang berstatus aktif
                          </div>

                          <table>
                            <tr>
                              <td id="label_form">Supplier</td>
                              <td>
                                <input id="FILTER_TIPECUSTOMER_SUPPLIER" style="width: 250px;">
                              </td>
                            </tr>
                            <tr>
                              <td id="label_form">Merk Barang</td>
                              <td>
                                <input id="FILTER_TIPECUSTOMER_MERK" style="width: 250px">
                              </td>
                            </tr>
                            <tr>
                              <td id="label_form">Kategori</td>
                              <td>
                                <input id="FILTER_TIPECUSTOMER_KATEGORI" style="width: 250px;">
                              </td>
                            </tr>
                            <tr>
                              <td id="label_form">Barang</td>
                              <td>
                                <input id="FILTER_TIPECUSTOMER_BARANGAWAL" style="width: 114px;"> s/d <input
                                  id="FILTER_TIPECUSTOMER_BARANGAKHIR" style="width: 114px;">
                              </td>
                            </tr>
                            <tr>
                              <td id="label_form">Berisi Kata</td>
                              <td>
                                <input class="label_input" id="FILTER_TIPECUSTOMER_BERISIKATA" style="width: 250px;"
                                  data-options="prompt: 'Untuk kode barang/nama barang/partnumber/barcode'">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label id="label_form">Lokasi</label>
                              </td>
                              <td>
                                <input id="FILTER_TIPECUSTOMER_IDLOKASI" style="width: 250px" required>
                                <a href="#" class="easyui-linkbutton"
                                  onclick="tampil_data_barang_berdasarkan_tipecustomer(event)">Tampilkan</a>
                                <a href="#" class="easyui-linkbutton"
                                  onclick="tampil_copy_harga_jual_tipecustomer(event)">Copy Harga Jual</a>
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
                                <input id="TGLAKTIF_TIPECUSTOMER_HAPUS_HARGAJUAL" style="width: 100px;">
                              </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>
                                <div
                                  style="color: rgb(200, 0, 0);padding: 5px;background-color: #f5d1d6;font-weight: bold;margin: 5px 0">
                                  Aksi ini akan menghapus harga jual semua barang dari semua tipe customer sesuai tanggal
                                  aktif yang dipilih
                                </div>
                                <a class="easyui-linkbutton" onclick="hapus_hargajual_tipecustomer()">Hapus Harga
                                  Jual</a>
                              </td>
                            </tr>
                          </table>
                        </fieldset>
                      </td>
                    </tr>
                  </table>

                  <table>
                    <tr>
                      <td>
                        <label id="label_form">Tgl. Aktif Terbaru</label>
                        <input class="date" style="width: 100px" id="TIPECUSTOMER_TGLAKTIF">
                        <input type="checkbox" id="TIPECUSTOMER_CBPERSENTASEMENGIKUTI"> % Satuan tengah & kecil
                        mengikuti satuan besar
                      </td>
                    </tr>
                  </table>
                </div>

                <div data-options="region: 'center'">
                  <table id="table_detail_berdasarkan_tipecustomer" fit="true"></table>
                </div>
              </div>
            </div>

            <div data-options="region: 'east',border: false"
              style="width:50px; padding:5px; border-left:1px solid #29b6f6;">
              <a title="Simpan" class="easyui-tooltip" data-options="plain:false"
                onclick="simpan_berdasarkan_tipecustomer()">
                <img src="{{ asset('assets/images/simpan.png') }}">
              </a>
            </div>
          </div>
        </div>

        <div title="Berdasarkan Customer">
          <div class="easyui-layout" style="width: 100%;height: 100%">
            <div data-options="region: 'center'">
              <div class="easyui-layout" style="width: 100%;height: 100%">
                <div data-options="region: 'north'" style="height: 305px">
                  <table>
                    <tr>
                      <td valign="top">
                        <fieldset style="display: inline-block;">
                          <legend>Filter</legend>

                          <table>
                            <tr>
                              <td style="width: 100px;" id="label_form">Barang</td>
                              <td>
                                <input id="FILTER_CUSTOMER_BARANG" style="width: 100px" required>
                                <input class="label_input" style="width: 200px;" id="FILTER_CUSTOMER_NAMABARANG"
                                  readonly>
                              </td>
                            </tr>
                            <tr>
                              <td style="width: 100px;" id="label_form">Customer</td>
                              <td>
                                <input id="FILTER_CUSTOMER_CUSTOMER" style="width: 200px">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label id="label_form">Lokasi</label>
                              </td>
                              <td>
                                <input id="FILTER_CUSTOMER_IDLOKASI" style="width: 200px" required>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">
                                <fieldset>
                                  <legend>Pembelian Terakhir</legend>

                                  <table>
                                    <tr>
                                      <td>
                                        <label id="label_form">Sat. Beli</label>
                                        <br>
                                        <input id="FILTER_CUSTOMER_SATUANBELITERAKHIR" class="label_input"
                                          style="width: 60px;" readonly>
                                      </td>
                                      <td>
                                        <label id="label_form">Tgl. Beli</label>
                                        <br>
                                        <input id="FILTER_CUSTOMER_TGLBELITERAKHIR" class="date" style="width: 100px"
                                          readonly>
                                      </td>
                                      <td>
                                        <label id="label_form">H. Beli</label>
                                        <br>
                                        <input id="FILTER_CUSTOMER_HARGABELITERAKHIR" class="number"
                                          style="width: 100px;" readonly>
                                      </td>
                                    </tr>
                                  </table>
                                </fieldset>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">
                                <label id="label_form">Tgl. Aktif Terbaru</label>
                                <input class="date" style="width: 100px" id="CUSTOMER_TGLAKTIF">

                                <input type="checkbox" id="CUSTOMER_CBPERSENTASEMENGIKUTI"> % Satuan tengah & kecil
                                mengikuti satuan besar
                                <br>
                                <input type="checkbox" id="CUSTOMER_HITUNGDARIMARGIN" checked> Hitung harga dari %
                                margin
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">
                                <table>
                                  <tr>
                                    <td id="label_form">Satuan Besar</td>
                                    <td id="label_form">Satuan Tengah</td>
                                    <td id="label_form">Satuan Kecil</td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <table>
                                        <tr>
                                          <td>
                                            <label id="label_form">Harga Beli</label>
                                            <br>
                                            <input class="number" id="CUSTOMER_HARGABELISATUAN" style="width: 65px;"
                                              readonly>
                                          </td>
                                          <td>
                                            <label id="label_form">% Mrgn Min</label>
                                            <br>
                                            <input class="number" id="CUSTOMER_PERSENTASEMINSATUAN"
                                              style="width: 65px;">
                                          </td>
                                          <td>
                                            <label id="label_form">Harga Jual Min</label>
                                            <br>
                                            <input class="number" id="CUSTOMER_HARGAJUALMINSATUAN" style="width: 90px;"
                                              readonly>
                                          </td>
                                          <td>
                                            <label id="label_form">% Mrgn Max</label>
                                            <br>
                                            <input class="number" id="CUSTOMER_PERSENTASEMAXSATUAN"
                                              style="width: 65px;">
                                          </td>
                                          <td>
                                            <label id="label_form">Harga Jual Max</label>
                                            <br>
                                            <input class="number" id="CUSTOMER_HARGAJUALMAXSATUAN" style="width: 90px;"
                                              readonly>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                    <td>
                                      <table>
                                        <tr>
                                          <td>
                                            <label id="label_form">Harga Beli</label>
                                            <br>
                                            <input class="number" id="CUSTOMER_HARGABELISATUAN2" style="width: 65px;"
                                              readonly>
                                          </td>
                                          <td>
                                            <label id="label_form">% Mrgn Min</label>
                                            <br>
                                            <input class="number" id="CUSTOMER_PERSENTASEMINSATUAN2"
                                              style="width: 65px;">
                                          </td>
                                          <td>
                                            <label id="label_form">Harga Jual Min</label>
                                            <br>
                                            <input class="number" id="CUSTOMER_HARGAJUALMINSATUAN2"
                                              style="width: 90px;" readonly>
                                          </td>
                                          <td>
                                            <label id="label_form">% Mrgn Max</label>
                                            <br>
                                            <input class="number" id="CUSTOMER_PERSENTASEMAXSATUAN2"
                                              style="width: 65px;">
                                          </td>
                                          <td>
                                            <label id="label_form">Harga Jual Max</label>
                                            <br>
                                            <input class="number" id="CUSTOMER_HARGAJUALMAXSATUAN2"
                                              style="width: 90px;" readonly>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                    <td>
                                      <table>
                                        <tr>
                                          <td>
                                            <label id="label_form">Harga Beli</label>
                                            <br>
                                            <input class="number" id="CUSTOMER_HARGABELISATUAN3" style="width: 65px;"
                                              readonly>
                                          </td>
                                          <td>
                                            <label id="label_form">% Mrgn Min</label>
                                            <br>
                                            <input class="number" id="CUSTOMER_PERSENTASEMINSATUAN3"
                                              style="width: 65px;">
                                          </td>
                                          <td>
                                            <label id="label_form">Harga Jual Min</label>
                                            <br>
                                            <input class="number" id="CUSTOMER_HARGAJUALMINSATUAN3"
                                              style="width: 90px;" readonly>
                                          </td>
                                          <td>
                                            <label id="label_form">% Mrgn Max</label>
                                            <br>
                                            <input class="number" id="CUSTOMER_PERSENTASEMAXSATUAN3"
                                              style="width: 65px;">
                                          </td>
                                          <td>
                                            <label id="label_form">Harga Jual Max</label>
                                            <br>
                                            <input class="number" id="CUSTOMER_HARGAJUALMAXSATUAN3"
                                              style="width: 90px;" readonly>
                                            <a href="#" class="easyui-linkbutton"
                                              onclick="tambah_harga_jual_customer(event)">Tambahkan</a>
                                            <a href="#" class="easyui-linkbutton"
                                              onclick="tampil_copy_harga_jual_customer(event)">Copy Harga Jual</a>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
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
                                <input id="TGLAKTIF_CUSTOMER_HAPUS_HARGAJUAL" style="width: 100px;">
                              </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>
                                <div
                                  style="color: rgb(200, 0, 0);padding: 5px;background-color: #f5d1d6;font-weight: bold;margin: 5px 0">
                                  Aksi ini akan menghapus harga jual semua barang dari semua customer sesuai tanggal aktif
                                  yang dipilih
                                </div>
                                <a class="easyui-linkbutton" onclick="hapus_hargajual_customer()">Hapus Harga Jual</a>
                              </td>
                            </tr>
                          </table>
                        </fieldset>
                      </td>
                    </tr>
                  </table>
                </div>

                <div data-options="region: 'center'">
                  <table id="table_detail_berdasarkan_customer" fit="true"></table>
                </div>
              </div>
            </div>

            <div data-options="region: 'east',border: false"
              style="width:50px; padding:5px; border-left:1px solid #29b6f6;">
              <a title="Simpan" class="easyui-tooltip" data-options="plain:false"
                onclick="simpan_berdasarkan_customer()">
                <img src="{{ asset('assets/images/simpan.png') }}">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="dialog_history_berdasarkan_satuan" title="History Harga Jual Berdasarkan Satuan"
    style="width: 1000px; height: 300px">
    <div class="easyui-layout" style="width: 100%; height: 100%">
      <div data-options="region: 'north'" style="height: 40px;padding: 5px">
        <a href="#" class="easyui-linkbutton" onclick="hapus_harga_berdasarkan_satuan()">Hapus</a>
      </div>

      <div data-options="region: 'center'">
        <table id="table_history_berdasarkan_satuan" fit="true"></table>
      </div>
    </div>
  </div>

  <div id="dialog_history_berdasarkan_tipecustomer" title="History Harga Jual Berdasarkan Tipe Customer"
    style="width: 1000px; height: 300px">
    <div class="easyui-layout" style="width: 100%; height: 100%">
      <div data-options="region: 'north'" style="height: 40px;padding: 5px">
        <a href="#" class="easyui-linkbutton" onclick="hapus_harga_berdasarkan_tipecustomer()">Hapus</a>
      </div>

      <div data-options="region: 'center'">
        <table id="table_history_berdasarkan_tipecustomer" fit="true"></table>
      </div>
    </div>
  </div>

  <div id="dialog_history_berdasarkan_customer" title="History Harga Jual Berdasarkan Customer"
    style="width: 1000px; height: 300px">
    <div class="easyui-layout" style="width: 100%; height: 100%">
      <div data-options="region: 'north'" style="height: 40px;padding: 5px">
        <a href="#" class="easyui-linkbutton" onclick="hapus_harga_berdasarkan_customer()">Hapus</a>
      </div>

      <div data-options="region: 'center'">
        <table id="table_history_berdasarkan_customer" fit="true"></table>
      </div>
    </div>
  </div>

  <div id="dialog_copy_harga_jual_satuan" title="Copy Harga Jual Berdasarkan Satuan"
    style="width: 400px; height: 150px">
    <div class="easyui-layout" style="width: 100%; height: 100%">
      <div data-options="region: 'center'">
        <table>
          <tr>
            <td>
              <label id="label_form">Lokasi Asal Harga</label>
            </td>
            <td>
              <input id="COPY_SATUAN_IDLOKASIASAL" style="width: 200px" required>
            </td>
          </tr>
          <tr>
            <td>
              <label id="label_form">Tgl Aktif Yang Digunakan</label>
            </td>
            <td>
              <input id="COPY_SATUAN_TGLAKTIF" class="date" style="width: 100px" required>
            </td>
          </tr>
          <tr>
            <td>
              <label id="label_form">Lokasi Copy Harga</label>
            </td>
            <td>
              <input id="COPY_SATUAN_IDLOKASICOPY" style="width: 200px" required>
            </td>
          </tr>
          <tr>
            <td>
            </td>
            <td>
              <a href="#" class="easyui-linkbutton" onclick="copy_harga_jual_satuan(event)">Copy Harga</a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div id="dialog_copy_harga_jual_tipecustomer" title="Copy Harga Jual Berdasarkan Tipe Customer"
    style="width: 400px; height: 150px">
    <div class="easyui-layout" style="width: 100%; height: 100%">
      <div data-options="region: 'center'">
        <table>
          <tr>
            <td>
              <label id="label_form">Lokasi Asal Harga</label>
            </td>
            <td>
              <input id="COPY_TIPECUSTOMER_IDLOKASIASAL" style="width: 200px" required>
            </td>
          </tr>
          <tr>
            <td>
              <label id="label_form">Tgl Aktif Yang Digunakan</label>
            </td>
            <td>
              <input id="COPY_TIPECUSTOMER_TGLAKTIF" class="date" style="width: 100px" required>
            </td>
          </tr>
          <tr>
            <td>
              <label id="label_form">Lokasi Copy Harga</label>
            </td>
            <td>
              <input id="COPY_TIPECUSTOMER_IDLOKASICOPY" style="width: 200px" required>
            </td>
          </tr>
          <tr>
            <td>
            </td>
            <td>
              <a href="#" class="easyui-linkbutton" onclick="copy_harga_jual_tipecustomer(event)">Copy Harga</a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div id="dialog_copy_harga_jual_customer" title="Copy Harga Jual Berdasarkan Customer"
    style="width: 400px; height: 150px">
    <div class="easyui-layout" style="width: 100%; height: 100%">
      <div data-options="region: 'center'">
        <table>
          <tr>
            <td>
              <label id="label_form">Lokasi Asal Harga</label>
            </td>
            <td>
              <input id="COPY_CUSTOMER_IDLOKASIASAL" style="width: 200px" required>
            </td>
          </tr>
          <tr>
            <td>
              <label id="label_form">Tgl Aktif Yang Digunakan</label>
            </td>
            <td>
              <input id="COPY_CUSTOMER_TGLAKTIF" class="date" style="width: 100px" required>
            </td>
          </tr>
          <tr>
            <td>
              <label id="label_form">Lokasi Copy Harga</label>
            </td>
            <td>
              <input id="COPY_CUSTOMER_IDLOKASICOPY" style="width: 200px" required>
            </td>
          </tr>
          <tr>
            <td>
            </td>
            <td>
              <a href="#" class="easyui-linkbutton" onclick="copy_harga_jual_customer(event)">Copy Harga</a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extra/plugins/datagrid-filter.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extra/plugins/jquery.datagrid-detailview.js') }}">
  </script>
  <script>
    const loaderfitur = {
      supplier: false,
      merk: false,
      kategori: false,
      barang: false,
      lokasi: false,
      tglaktif: false
    };

    function closeLoader() {
      if (loaderfitur.supplier && loaderfitur.merk && loaderfitur.kategori && loaderfitur.barang && loaderfitur.lokasi &&
        loaderfitur.tglaktif) {
        tutupLoader();
      }
    }

    $(function() {
      browse_data_lokasi('#COPY_SATUAN_IDLOKASIASAL');
      browse_data_lokasi('#COPY_SATUAN_IDLOKASICOPY');
      browse_data_lokasi('#COPY_TIPECUSTOMER_IDLOKASIASAL');
      browse_data_lokasi('#COPY_TIPECUSTOMER_IDLOKASICOPY');
      browse_data_lokasi('#COPY_CUSTOMER_IDLOKASIASAL');
      browse_data_lokasi('#COPY_CUSTOMER_IDLOKASICOPY');

      $('#dialog_copy_harga_jual_satuan, #dialog_copy_harga_jual_tipecustomer, #dialog_copy_harga_jual_customer')
        .window({
          closed: true,
          collapsible: false,
          minimizable: false,
        })

      // berdasarkan barang
      browse_data_supplier('#FILTER_SATUAN_SUPPLIER');
      browse_data_merk('#FILTER_SATUAN_MERK');
      browse_data_kategori('#FILTER_SATUAN_KATEGORI');
      browse_data_barang('#FILTER_SATUAN_BARANGAWAL');
      browse_data_barang('#FILTER_SATUAN_BARANGAKHIR');
      browse_data_lokasi('#FILTER_SATUAN_IDLOKASI');
      browse_data_tglaktif_satuan('#TGLAKTIF_SATUAN_HAPUS_HARGAJUAL');

      buat_table_detail_berdasarkan_satuan();
      buat_table_history_berdasarkan_satuan();

      $('#SATUAN_CBPERSENTASEMENGIKUTI').change(function() {
        var checked = $(this).prop('checked');

        if (checked) {
          var rows = $('#table_detail_berdasarkan_satuan').datagrid('getRows');

          for (var i = 0; i < rows.length; i++) {
            var row = JSON.parse(JSON.stringify(rows[i]));
            var hargabelisatuanbesar = parseFloat(row.hargabelisatuan);
            var hargabelisatuansedang = parseFloat(row.hargabelisatuan2);
            var hargabelisatuankecil = parseFloat(row.hargabelisatuan3);

            if (row.satuan2 != '' && row.satuan2 != null) {
              row.persentaseminsatuan2 = row.persentaseminsatuan;
              row.hargajualminsatuan2 = Math.round(hargabelisatuansedang + (row.persentaseminsatuan2 / 100 *
                hargabelisatuansedang));

              row.persentasemaxsatuan2 = row.persentasemaxsatuan;
              row.hargajualmaxsatuan2 = Math.round(hargabelisatuansedang + (row.persentasemaxsatuan2 / 100 *
                hargabelisatuansedang));
            }

            if (row.satuan3 != '' && row.satuan3 != null) {
              row.persentaseminsatuan3 = row.persentaseminsatuan;
              row.hargajualminsatuan3 = Math.round(hargabelisatuankecil + (row.persentaseminsatuan3 / 100 *
                hargabelisatuansedang));

              row.persentasemaxsatuan3 = row.persentasemaxsatuan;
              row.hargajualmaxsatuan3 = Math.round(hargabelisatuankecil + (row.persentasemaxsatuan3 / 100 *
                hargabelisatuansedang));
            }

            $('#table_detail_berdasarkan_satuan').datagrid('updateRow', {
              index: i,
              row: row
            });
          }
        }
      });

      $('#dialog_history_berdasarkan_satuan').window({
        closed: true,
        collapsible: false,
        minimizable: false,
      })

      // berdasarkan tipe customer
      browse_data_supplier('#FILTER_TIPECUSTOMER_SUPPLIER');
      browse_data_merk('#FILTER_TIPECUSTOMER_MERK');
      browse_data_kategori('#FILTER_TIPECUSTOMER_KATEGORI');
      browse_data_barang('#FILTER_TIPECUSTOMER_BARANGAWAL');
      browse_data_barang('#FILTER_TIPECUSTOMER_BARANGAKHIR');
      browse_data_lokasi('#FILTER_TIPECUSTOMER_IDLOKASI');
      browse_data_tglaktif_tipecustomer('#TGLAKTIF_TIPECUSTOMER_HAPUS_HARGAJUAL');

      buat_table_detail_berdasarkan_tipecustomer();
      buat_table_history_berdasarkan_tipecustomer();

      $('#TIPECUSTOMER_CBPERSENTASEMENGIKUTI').change(function() {
        var checked = $(this).prop('checked');

        if (checked) {
          var rows_barang = $('#table_detail_berdasarkan_tipecustomer').datagrid('getRows');

          for (var i = 0; i < rows_barang.length; i++) {
            $('#table_detail_berdasarkan_tipecustomer').datagrid('collapseRow', i);
          }

          for (var i = 0; i < rows_barang.length; i++) {
            var row_barang = rows_barang[i];
            var detailharga = JSON.parse(rows_barang[i].detailharga);

            for (var j = 0; j < detailharga.length; j++) {
              var row = JSON.parse(JSON.stringify(detailharga[j]));
              var hargabelisatuanbesar = parseFloat(row_barang.hargabelisatuan);
              var hargabelisatuansedang = parseFloat(row_barang.hargabelisatuan2);
              var hargabelisatuankecil = parseFloat(row_barang.hargabelisatuan3);

              if (row.satuan2 != '' && row.satuan2 != null) {
                row.persentaseminsatuan2 = row.persentaseminsatuan;
                row.hargajualminsatuan2 = Math.round(hargabelisatuansedang + (row.persentasemaxsatuan2 / 100 *
                  hargabelisatuansedang));

                row.persentasemaxsatuan2 = row.persentasemaxsatuan;
                row.hargajualmaxsatuan2 = Math.round(hargabelisatuansedang + (row.persentasemaxsatuan2 / 100 *
                  hargabelisatuansedang));
              }

              if (row.satuan3 != '' && row.satuan3 != null) {
                row.persentaseminsatuan3 = row.persentaseminsatuan;
                row.hargajualminsatuan3 = Math.round(hargabelisatuankecil + (row.persentasemaxsatuan3 / 100 *
                  hargabelisatuansedang));

                row.persentasemaxsatuan3 = row.persentasemaxsatuan;
                row.hargajualmaxsatuan3 = Math.round(hargabelisatuankecil + (row.persentasemaxsatuan3 / 100 *
                  hargabelisatuansedang));
              }

              detailharga[j] = row;
            }

            $('#table_detail_berdasarkan_tipecustomer').datagrid('updateRow', {
              index: i,
              row: {
                detailharga: JSON.stringify(detailharga)
              }
            });
          }
        }
      });

      // berdasarkan customer
      browse_data_barang('#FILTER_CUSTOMER_BARANG');
      browse_data_customer('#FILTER_CUSTOMER_CUSTOMER');
      browse_data_lokasi('#FILTER_CUSTOMER_IDLOKASI');
      browse_data_tglaktif_customer('#TGLAKTIF_CUSTOMER_HAPUS_HARGAJUAL');

      buat_table_detail_berdasarkan_customer();
      buat_table_history_berdasarkan_customer();

      $('#CUSTOMER_CBPERSENTASEMENGIKUTI').change(function() {
        toggle_readonly_hargajual_customer();
      });

      $('#CUSTOMER_HITUNGDARIMARGIN').change(function() {
        toggle_readonly_hargajual_customer();
      })

      $('#CUSTOMER_PERSENTASEMINSATUAN').numberbox({
        onChange: function(newValue, oldValue) {
          if (!$('#CUSTOMER_HITUNGDARIMARGIN').prop('checked')) {
            return false;
          }

          var persentasemengikuti = $('#CUSTOMER_CBPERSENTASEMENGIKUTI').prop('checked');
          var hargabelisatuanbesar = parseFloat($('#CUSTOMER_HARGABELISATUAN').numberbox('getValue'));;
          var hargabelisatuansedang = parseFloat($('#CUSTOMER_HARGABELISATUAN2').numberbox('getValue'));;
          var hargabelisatuankecil = parseFloat($('#CUSTOMER_HARGABELISATUAN3').numberbox('getValue'));;
          var hargajualmin = Math.round(hargabelisatuanbesar + (parseFloat(newValue) / 100 *
            hargabelisatuanbesar));

          if (persentasemengikuti) {
            $('#CUSTOMER_PERSENTASEMINSATUAN2').numberbox('setValue', newValue);
            $('#CUSTOMER_HARGAJUALMINSATUAN2').numberbox('setValue', Math.round(hargabelisatuansedang + (
              newValue / 100 * hargabelisatuansedang)));

            $('#CUSTOMER_PERSENTASEMINSATUAN3').numberbox('setValue', newValue);
            $('#CUSTOMER_HARGAJUALMINSATUAN3').numberbox('setValue', Math.round(hargabelisatuankecil + (
              newValue / 100 * hargabelisatuankecil)));
          }

          $('#CUSTOMER_HARGAJUALMINSATUAN').numberbox('setValue', hargajualmin);
        }
      })

      $('#CUSTOMER_HARGAJUALMINSATUAN').numberbox({
        onChange: function(newValue, oldValue) {
          if ($('#CUSTOMER_HITUNGDARIMARGIN').prop('checked')) {
            return false;
          }

          var persentasemengikuti = $('#CUSTOMER_CBPERSENTASEMENGIKUTI').prop('checked');
          var hargabelisatuanbesar = parseFloat($('#CUSTOMER_HARGABELISATUAN').numberbox('getValue'));
          var hargabelisatuansedang = parseFloat($('#CUSTOMER_HARGABELISATUAN2').numberbox('getValue'));
          var hargabelisatuankecil = parseFloat($('#CUSTOMER_HARGABELISATUAN3').numberbox('getValue'));
          var hargajualminsatuan = Math.round(parseFloat(newValue));
          var persentaseminsatuan = (hargajualminsatuan - hargabelisatuanbesar) / hargabelisatuanbesar * 100;

          $('#CUSTOMER_PERSENTASEMINSATUAN').numberbox('setValue', persentaseminsatuan);

          if (persentasemengikuti) {
            $('#CUSTOMER_PERSENTASEMINSATUAN2').numberbox('setValue', persentaseminsatuan);
            $('#CUSTOMER_HARGAJUALMINSATUAN2').numberbox('setValue', Math.round(hargabelisatuansedang + (
              persentaseminsatuan / 100 * hargabelisatuansedang)));

            $('#CUSTOMER_PERSENTASEMINSATUAN3').numberbox('setValue', persentaseminsatuan);
            $('#CUSTOMER_HARGAJUALMINSATUAN3').numberbox('setValue', Math.round(hargabelisatuankecil + (
              persentaseminsatuan / 100 * hargabelisatuankecil)));
          }
        }
      })

      $('#CUSTOMER_PERSENTASEMAXSATUAN').numberbox({
        onChange: function(newValue, oldValue) {
          if (!$('#CUSTOMER_HITUNGDARIMARGIN').prop('checked')) {
            return false;
          }

          var barang = $('#FILTER_CUSTOMER_BARANG').combogrid('grid').datagrid('getSelected');
          var persentasemengikuti = $('#CUSTOMER_CBPERSENTASEMENGIKUTI').prop('checked');
          var satuanbeliterakhir = $('#FILTER_CUSTOMER_SATUANBELITERAKHIR').textbox('getValue');
          var hargabeliterakhir = $('#FILTER_CUSTOMER_HARGABELITERAKHIR').textbox('getValue');

          var hargabelisatuanbesar = parseFloat($('#CUSTOMER_HARGABELISATUAN').numberbox('getValue'));
          var hargabelisatuansedang = parseFloat($('#CUSTOMER_HARGABELISATUAN2').numberbox('getValue'));
          var hargabelisatuankecil = parseFloat($('#CUSTOMER_HARGABELISATUAN3').numberbox('getValue'));
          var hargajualmin = Math.round(hargabelisatuanbesar + (parseFloat(newValue) / 100 *
            hargabelisatuanbesar));

          if (persentasemengikuti) {
            $('#CUSTOMER_PERSENTASEMAXSATUAN2').numberbox('setValue', newValue);
            $('#CUSTOMER_HARGAJUALMAXSATUAN2').numberbox('setValue', Math.round(hargabelisatuansedang + (
              newValue / 100 * hargabelisatuansedang)));

            $('#CUSTOMER_PERSENTASEMAXSATUAN3').numberbox('setValue', newValue);
            $('#CUSTOMER_HARGAJUALMAXSATUAN3').numberbox('setValue', Math.round(hargabelisatuankecil + (
              newValue / 100 * hargabelisatuankecil)));
          }

          $('#CUSTOMER_HARGAJUALMAXSATUAN').numberbox('setValue', hargajualmin);
        }
      })

      $('#CUSTOMER_HARGAJUALMAXSATUAN').numberbox({
        onChange: function(newValue, oldValue) {
          if ($('#CUSTOMER_HITUNGDARIMARGIN').prop('checked')) {
            return false;
          }

          var persentasemengikuti = $('#CUSTOMER_CBPERSENTASEMENGIKUTI').prop('checked');
          var hargabelisatuanbesar = parseFloat($('#CUSTOMER_HARGABELISATUAN').numberbox('getValue'));
          var hargabelisatuansedang = parseFloat($('#CUSTOMER_HARGABELISATUAN2').numberbox('getValue'));
          var hargabelisatuankecil = parseFloat($('#CUSTOMER_HARGABELISATUAN3').numberbox('getValue'));
          var hargajualmaxsatuan = Math.round(parseFloat(newValue));
          var persentasemaxsatuan = (hargajualmaxsatuan - hargabelisatuanbesar) / hargabelisatuanbesar * 100;

          $('#CUSTOMER_PERSENTASEMAXSATUAN').numberbox('setValue', persentasemaxsatuan);

          if (persentasemengikuti) {
            $('#CUSTOMER_PERSENTASEMAXSATUAN2').numberbox('setValue', persentasemaxsatuan);
            $('#CUSTOMER_HARGAJUALMAXSATUAN2').numberbox('setValue', Math.round(hargabelisatuansedang + (
              persentasemaxsatuan / 100 * hargabelisatuansedang)));

            $('#CUSTOMER_PERSENTASEMAXSATUAN3').numberbox('setValue', persentasemaxsatuan);
            $('#CUSTOMER_HARGAJUALMAXSATUAN3').numberbox('setValue', Math.round(hargabelisatuankecil + (
              persentasemaxsatuan / 100 * hargabelisatuankecil)));
          }
        }
      })

      $('#CUSTOMER_PERSENTASEMINSATUAN2').numberbox({
        onChange: function(newValue, oldValue) {
          if (!$('#CUSTOMER_HITUNGDARIMARGIN').prop('checked')) {
            return false;
          }

          var hargabelisatuansedang = parseFloat($('#CUSTOMER_HARGABELISATUAN3').numberbox('getValue'));;

          var hargajualmin = Math.round(hargabelisatuansedang + (parseFloat(newValue) / 100 *
            hargabelisatuansedang));

          $('#CUSTOMER_HARGAJUALMINSATUAN2').numberbox('setValue', hargajualmin);
        }
      })

      $('#CUSTOMER_HARGAJUALMINSATUAN2').numberbox({
        onChange: function(newValue, oldValue) {
          if ($('#CUSTOMER_HITUNGDARIMARGIN').prop('checked')) {
            return false;
          }

          var persentasemengikuti = $('#CUSTOMER_CBPERSENTASEMENGIKUTI').prop('checked');

          if (persentasemengikuti) {
            return false;
          }

          var hargabelisatuansedang = parseFloat($('#CUSTOMER_HARGABELISATUAN2').numberbox('getValue'));;
          var hargajualminsatuan = Math.round(parseFloat(newValue));
          var persentaseminsatuan = (hargajualminsatuan - hargabelisatuansedang) / hargabelisatuansedang * 100;

          $('#CUSTOMER_PERSENTASEMINSATUAN2').numberbox('setValue', persentaseminsatuan);
        }
      })

      $('#CUSTOMER_PERSENTASEMAXSATUAN2').numberbox({
        onChange: function(newValue, oldValue) {
          if (!$('#CUSTOMER_HITUNGDARIMARGIN').prop('checked')) {
            return false;
          }

          var hargabelisatuansedang = parseFloat($('#CUSTOMER_HARGABELISATUAN2').numberbox('getValue'));;
          var hargajualmin = Math.round(hargabelisatuansedang + (parseFloat(newValue) / 100 *
            hargabelisatuansedang));

          $('#CUSTOMER_HARGAJUALMAXSATUAN2').numberbox('setValue', hargajualmin);
        }
      })

      $('#CUSTOMER_HARGAJUALMAXSATUAN2').numberbox({
        onChange: function(newValue, oldValue) {
          if ($('#CUSTOMER_HITUNGDARIMARGIN').prop('checked')) {
            return false;
          }

          var hargabelisatuansedang = parseFloat($('#CUSTOMER_HARGABELISATUAN2').numberbox('getValue'));;
          var hargajualmaxsatuan = Math.round(parseFloat(newValue));
          var persentasemaxsatuan = (hargajualmaxsatuan - hargabelisatuansedang) / hargabelisatuansedang * 100;

          $('#CUSTOMER_PERSENTASEMAXSATUAN2').numberbox('setValue', persentasemaxsatuan);
        }
      })

      $('#CUSTOMER_PERSENTASEMINSATUAN3').numberbox({
        onChange: function(newValue, oldValue) {
          if (!$('#CUSTOMER_HITUNGDARIMARGIN').prop('checked')) {
            return false;
          }

          var hargabelisatuankecil = parseFloat($('#CUSTOMER_HARGABELISATUAN3').numberbox('getValue'));;
          var hargajualmin = Math.round(hargabelisatuankecil + (parseFloat(newValue) / 100 *
            hargabelisatuankecil));

          $('#CUSTOMER_HARGAJUALMINSATUAN3').numberbox('setValue', hargajualmin);
        }
      })

      $('#CUSTOMER_HARGAJUALMINSATUAN3').numberbox({
        onChange: function(newValue, oldValue) {
          if ($('#CUSTOMER_HITUNGDARIMARGIN').prop('checked')) {
            return false;
          }

          var persentasemengikuti = $('#CUSTOMER_CBPERSENTASEMENGIKUTI').prop('checked');

          if (persentasemengikuti) {
            return false;
          }

          var hargabelisatuankecil = parseFloat($('#CUSTOMER_HARGABELISATUAN3').numberbox('getValue'));;
          var hargajualminsatuan = Math.round(parseFloat(newValue));
          var persentaseminsatuan = (hargajualminsatuan - hargabelisatuankecil) / hargabelisatuankecil * 100;

          $('#CUSTOMER_PERSENTASEMINSATUAN3').numberbox('setValue', persentaseminsatuan);
        }
      })

      $('#CUSTOMER_PERSENTASEMAXSATUAN3').numberbox({
        onChange: function(newValue, oldValue) {
          if (!$('#CUSTOMER_HITUNGDARIMARGIN').prop('checked')) {
            return false;
          }

          var hargabelisatuankecil = parseFloat($('#CUSTOMER_HARGABELISATUAN3').numberbox('getValue'));;
          var hargajualmin = Math.round(hargabelisatuankecil + (parseFloat(newValue) / 100 *
            hargabelisatuankecil));

          $('#CUSTOMER_HARGAJUALMAXSATUAN3').numberbox('setValue', hargajualmin);
        }
      })

      $('#CUSTOMER_HARGAJUALMAXSATUAN3').numberbox({
        onChange: function(newValue, oldValue) {
          if ($('#CUSTOMER_HITUNGDARIMARGIN').prop('checked')) {
            return false;
          }

          var hargabelisatuankecil = parseFloat($('#CUSTOMER_HARGABELISATUAN3').numberbox('getValue'));
          var hargajualmaxsatuan = Math.round(parseFloat(newValue));
          var persentasemaxsatuan = (hargajualmaxsatuan - hargabelisatuankecil) / hargabelisatuankecil * 100;

          $('#CUSTOMER_PERSENTASEMAXSATUAN3').numberbox('setValue', persentasemaxsatuan);
        }
      })
    })

    function toggle_readonly_hargajual_customer() {
      var barang = $('#FILTER_CUSTOMER_BARANG').combogrid('grid').datagrid('getSelected');
      var adasatuan2 = (barang.satuansedang != '' && barang.satuansedang != null);
      var adasatuan3 = (barang.satuankecil != '' && barang.satuankecil != null);
      var hitungdarimargin = $('#CUSTOMER_HITUNGDARIMARGIN').prop('checked');
      var persentasemengikuti = $('#CUSTOMER_CBPERSENTASEMENGIKUTI').prop('checked');

      $(`
			#CUSTOMER_HARGAJUALMINSATUAN,
			#CUSTOMER_HARGAJUALMAXSATUAN
		`).numberbox({
        readonly: hitungdarimargin
      });

      $(`
			#CUSTOMER_PERSENTASEMINSATUAN,
			#CUSTOMER_PERSENTASEMAXSATUAN
		`).numberbox({
        readonly: !hitungdarimargin
      });

      $(`
			#CUSTOMER_HARGAJUALMINSATUAN2,
			#CUSTOMER_HARGAJUALMAXSATUAN2
		`).numberbox({
        readonly: !adasatuan2 || hitungdarimargin || persentasemengikuti
      });

      $(`
			#CUSTOMER_PERSENTASEMINSATUAN2,
			#CUSTOMER_PERSENTASEMAXSATUAN2
		`).numberbox({
        readonly: !adasatuan2 || !hitungdarimargin || persentasemengikuti
      });

      $(`
			#CUSTOMER_HARGAJUALMINSATUAN3,
			#CUSTOMER_HARGAJUALMAXSATUAN3
		`).numberbox({
        readonly: !adasatuan3 || hitungdarimargin || persentasemengikuti
      });

      $(`
			#CUSTOMER_PERSENTASEMINSATUAN3,
			#CUSTOMER_PERSENTASEMAXSATUAN3
		`).numberbox({
        readonly: !adasatuan3 || !hitungdarimargin || persentasemengikuti
      });
    }

    function buat_table_detail_berdasarkan_satuan() {
      $('#table_detail_berdasarkan_satuan').datagrid({
        RowAdd: true,
        RowDelete: true,
        clickToEdit: false,
        dblclickToEdit: true,
        columns: [
          [{
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 100,
              align: 'left',
              rowspan: 2,
              editor: {
                type: 'combogrid',
                options: {
                  panelWidth: 790,
                  mode: 'remote',
                  required: true,
                  idField: 'kode',
                  textField: 'kode',
                  columns: [
                    [{
                        field: 'id',
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
                        field: 'satuan',
                        title: 'Satuan',
                        width: 60
                      },
                      {
                        field: 'catatan',
                        title: 'Catatan',
                        width: 250
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
              title: 'Nama Barang',
              width: 250,
              align: 'left',
              rowspan: 2
            },
            {
              field: 'partnumber',
              title: 'Part Number',
              width: 120,
              align: 'left',
              rowspan: 2
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
              title: 'Sat.<br>Besar',
              width: 50,
              align: 'center',
              rowspan: 2,
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'hargabelisatuan',
              title: 'Harga Beli',
              width: 80,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'persentaseminsatuan',
              title: '% Mrgn<br>Min',
              width: 50,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 2
                }
              },
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
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
              },
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'persentasemaxsatuan',
              title: '% Mrgn<br>Max',
              width: 50,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 2
                }
              },
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
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
              },
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'satuan2',
              title: 'Sat.<br>Tengah',
              width: 50,
              align: 'center',
              rowspan: 2,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'konversi1',
              title: 'Konv. 1',
              width: 50,
              align: 'center',
              rowspan: 2,
              formatter: format_qty,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'hargabelisatuan2',
              title: 'Harga Beli',
              width: 80,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'persentaseminsatuan2',
              title: '% Mrgn<br>Min',
              width: 50,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 2
                }
              },
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
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
              },
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'persentasemaxsatuan2',
              title: '% Mrgn<br>Max',
              width: 50,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 2
                }
              },
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
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
              },
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'satuan3',
              title: 'Sat.<br>Kecil',
              width: 50,
              align: 'center',
              rowspan: 2,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'konversi2',
              title: 'Konv. 2',
              width: 50,
              align: 'center',
              rowspan: 2,
              formatter: format_qty,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'hargabelisatuan3',
              title: 'Harga Beli',
              width: 80,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'persentaseminsatuan3',
              title: '% Mrgn<br>Min',
              width: 50,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 2
                }
              },
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
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
              },
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'persentasemaxsatuan3',
              title: '% Mrgn<br>Max',
              width: 50,
              align: 'right',
              rowspan: 2,
              formatter: format_amount,
              editor: {
                type: 'numberbox',
                options: {
                  precision: 2
                }
              },
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
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
              },
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
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
        ],
        onBeforeCellEdit: function(index, field) {
          var row = $(this).datagrid('getRows')[index];

          if ($('#SATUAN_CBPERSENTASEMENGIKUTI').prop('checked')) {
            if (['persentaseminsatuan2', 'hargajualminsatuan2', 'persentasemaxsatuan2', 'hargajualmaxsatuan2',
                'persentaseminsatuan3', 'hargajualminsatuan3', 'persentasemaxsatuan3', 'hargajualmaxsatuan3'
              ].indexOf(field) >= 0) {
              return false;
            }
          } else if (['persentaseminsatuan2', 'hargajualminsatuan2', 'persentasemaxsatuan2', 'hargajualmaxsatuan2']
            .indexOf(field) >= 0 && (row.satuan2 == null || row.satuan2 == '')) {
            return false;
          } else if (['persentaseminsatuan3', 'hargajualminsatuan3', 'persentasemaxsatuan3', 'hargajualmaxsatuan3']
            .indexOf(field) >= 0 && (row.satuan3 == null || row.satuan3 == '')) {
            return false;
          } else if (field == 'kodebarang' && $('#FILTER_SATUAN_IDLOKASI').combogrid('getValue') == '') {
            $.messager.alert('Peringatan', 'Data lokasi belum dipilih', 'warning');

            if (row.kodebarang == '' || row.kodebarang == undefined) {
              $(this).datagrid('deleteRow', index);
            }

            return false;
          }
        },
        onCellEdit: function(index, field, val) {
          var row = $(this).datagrid('getRows')[index];
          var ed = get_editor('#table_detail_berdasarkan_satuan', index, field);

          if (field == 'kodebarang') {
            ed.combogrid('grid').datagrid('options').url = link_api.browseBarang;
            ed.combogrid('grid').datagrid('load');
            ed.combogrid('showPanel');
          }
        },
        rowStyler: function(index, row) {
          if (row.edit == 1) {
            return 'background-color: lightgreen';
          }
        },
        onEndEdit: function(index, row, changes) {
          var cell = $(this).datagrid('cell');
          var ed = get_editor('#table_detail_berdasarkan_satuan', index, cell.field);
          var row_update = {};
          var persentasemengikuti = $('#SATUAN_CBPERSENTASEMENGIKUTI').prop('checked');
          let edit = 0;

          if (cell.field == 'kodebarang') {
            let data = ed.combogrid('grid').datagrid('getSelected');
            let idlokasi = $('#FILTER_SATUAN_IDLOKASI').combogrid('getValue');
            let hargajualterakhir = {};

            $.ajax({
              url: link_api.loadHargaJualTerakhirPerSatuan,
              type: 'POST',
              data: {
                uuidlokasi: idlokasi,
                uuidbarang: data.id
              },
              dataType: 'JSON',
              async: false,
              success: function(response) {
                hargajualterakhir = response
              }
            });

            row_update = {
              idbarang: data.id,
              namabarang: data.nama,
              partnumber: data.partnumber,
              tglaktif: hargajualterakhir.tglaktif,
              satuan: hargajualterakhir.satuan,
              persentaseminsatuan: hargajualterakhir.persentaseminsatuan,
              hargajualminsatuan: hargajualterakhir.hargajualminsatuan,
              persentasemaxsatuan: hargajualterakhir.persentasemaxsatuan,
              hargajualmaxsatuan: hargajualterakhir.hargajualmaxsatuan,
              satuan2: hargajualterakhir.satuan2,
              persentaseminsatuan2: hargajualterakhir.persentaseminsatuan2,
              hargajualminsatuan2: hargajualterakhir.hargajualminsatuan2,
              persentasemaxsatuan2: hargajualterakhir.persentasemaxsatuan2,
              hargajualmaxsatuan2: hargajualterakhir.hargajualmaxsatuan2,
              satuan3: hargajualterakhir.satuan3,
              persentaseminsatuan3: hargajualterakhir.persentaseminsatuan3,
              hargajualminsatuan3: hargajualterakhir.hargajualminsatuan3,
              persentasemaxsatuan3: hargajualterakhir.persentasemaxsatuan3,
              hargajualmaxsatuan3: hargajualterakhir.hargajualmaxsatuan3,
              satuanbeliterakhir: hargajualterakhir.satuanbeliterakhir,
              tglbeliterakhir: hargajualterakhir.tglbeliterakhir,
              hargabeliterakhir: hargajualterakhir.hargabeliterakhir
            };
          } else {
            edit = Object.keys(changes).length > 0 || row.edit == 1 ? 1 : 0;

            var hargabelisatuanbesar = parseFloat(row.hargabelisatuan);
            var hargabelisatuansedang = parseFloat(row.hargabelisatuan2);
            var hargabelisatuankecil = parseFloat(row.hargabelisatuan3);

            // satuan besar
            if (cell.field == 'persentaseminsatuan') {
              if (changes.persentaseminsatuan == '' || changes.persentaseminsatuan == undefined) {
                changes.persentaseminsatuan = 0;
              }

              var hargajualmin = Math.round(hargabelisatuanbesar + (parseFloat(changes.persentaseminsatuan) / 100 *
                hargabelisatuanbesar));

              if (persentasemengikuti) {
                row_update.persentaseminsatuan2 = changes.persentaseminsatuan;
                row_update.hargajualminsatuan2 = Math.round(hargabelisatuansedang + (row_update
                  .persentaseminsatuan2 / 100 * hargabelisatuansedang));

                row_update.persentaseminsatuan3 = changes.persentaseminsatuan;
                row_update.hargajualminsatuan3 = Math.round(hargabelisatuankecil + (row_update
                  .persentaseminsatuan3 / 100 * hargabelisatuankecil));
              }

              row_update.hargajualminsatuan = hargajualmin;
            } else if (cell.field == 'hargajualminsatuan') {
              var hargajualminsatuan = Math.round(parseFloat(changes.hargajualminsatuan));
              var persentaseminsatuan = (hargajualminsatuan - hargabelisatuanbesar) / hargabelisatuanbesar * 100;

              if (hargabelisatuanbesar == 0) {
                persentaseminsatuan = 0;
              }

              row_update = {
                hargajualminsatuan: hargajualminsatuan,
                persentaseminsatuan: persentaseminsatuan
              };

              if (persentasemengikuti) {
                row_update.persentaseminsatuan2 = persentaseminsatuan;
                row_update.hargajualminsatuan2 = Math.round(hargabelisatuansedang + (row_update
                  .persentaseminsatuan2 / 100 * hargabelisatuansedang));

                row_update.persentaseminsatuan3 = persentaseminsatuan;
                row_update.hargajualminsatuan3 = Math.round(hargabelisatuankecil + (row_update
                  .persentaseminsatuan3 / 100 * hargabelisatuankecil));
              }
            } else if (cell.field == 'persentasemaxsatuan') {
              if (changes.persentasemaxsatuan == '' || changes.persentasemaxsatuan == undefined) {
                changes.persentasemaxsatuan = 0;
              }

              if (persentasemengikuti) {
                row_update.persentasemaxsatuan2 = changes.persentasemaxsatuan;
                row_update.hargajualmaxsatuan2 = Math.round(hargabelisatuansedang + (row_update
                  .persentasemaxsatuan2 / 100 * hargabelisatuansedang));

                row_update.persentasemaxsatuan3 = changes.persentasemaxsatuan;
                row_update.hargajualmaxsatuan3 = Math.round(hargabelisatuankecil + (row_update
                  .persentasemaxsatuan3 / 100 * hargabelisatuankecil));
              }

              var hargajualmax = Math.round(hargabelisatuanbesar + (parseFloat(changes.persentasemaxsatuan) / 100 *
                hargabelisatuanbesar));

              row_update.hargajualmaxsatuan = hargajualmax
            } else if (cell.field == 'hargajualmaxsatuan') {
              var hargajualmaxsatuan = Math.round(parseFloat(changes.hargajualmaxsatuan));
              var persentasemaxsatuan = (hargajualmaxsatuan - hargabelisatuanbesar) / hargabelisatuanbesar * 100;

              if (hargabelisatuanbesar == 0) {
                persentasemaxsatuan = 0;
              }

              row_update = {
                hargajualmaxsatuan: hargajualmaxsatuan,
                persentasemaxsatuan: persentasemaxsatuan
              };

              if (persentasemengikuti) {
                row_update.persentasemaxsatuan2 = persentasemaxsatuan;
                row_update.hargajualmaxsatuan2 = Math.round(hargabelisatuansedang + (row_update
                  .persentasemaxsatuan2 / 100 * hargabelisatuansedang));

                row_update.persentasemaxsatuan3 = persentasemaxsatuan;
                row_update.hargajualmaxsatuan3 = Math.round(hargabelisatuankecil + (row_update
                  .persentasemaxsatuan3 / 100 * hargabelisatuankecil));
              }
            }

            // satuan sedang
            if (cell.field == 'persentaseminsatuan2') {
              if (changes.persentaseminsatuan2 == '' || changes.persentaseminsatuan2 == undefined) {
                changes.persentaseminsatuan2 = 0;
              }

              var hargajualmin = Math.round(hargabelisatuansedang + (parseFloat(changes.persentaseminsatuan2) /
                100 * hargabelisatuansedang));

              row_update = {
                hargajualminsatuan2: hargajualmin
              }
            } else if (cell.field == 'hargajualminsatuan2') {
              var hargajualminsatuan2 = Math.round(parseFloat(changes.hargajualminsatuan2));
              var persentaseminsatuan2 = (hargajualminsatuan2 - hargabelisatuansedang) / hargabelisatuansedang *
                100;

              if (hargabelisatuansedang == 0) {
                persentaseminsatuan2 = 0;
              }

              row_update = {
                hargajualminsatuan2: hargajualminsatuan2,
                persentaseminsatuan2: persentaseminsatuan2
              };
            } else if (cell.field == 'persentasemaxsatuan2') {
              if (changes.persentasemaxsatuan2 == '' || changes.persentasemaxsatuan2 == undefined) {
                changes.persentasemaxsatuan2 = 0;
              }

              var hargajualmax = Math.round(hargabelisatuansedang + (parseFloat(changes.persentasemaxsatuan2) /
                100 * hargabelisatuansedang));

              row_update = {
                hargajualmaxsatuan2: hargajualmax
              }
            } else if (cell.field == 'hargajualmaxsatuan2') {
              var hargajualmaxsatuan2 = Math.round(parseFloat(changes.hargajualmaxsatuan2));
              var persentasemaxsatuan2 = (hargajualmaxsatuan2 - hargabelisatuansedang) / hargabelisatuansedang *
                100;

              if (hargabelisatuansedang == 0) {
                persentasemaxsatuan2 = 0;
              }

              row_update = {
                hargajualmaxsatuan2: hargajualmaxsatuan2,
                persentasemaxsatuan2: persentasemaxsatuan2
              };
            }

            // satuan kecil
            if (cell.field == 'persentaseminsatuan3') {
              if (changes.persentaseminsatuan3 == '' || changes.persentaseminsatuan3 == undefined) {
                changes.persentaseminsatuan3 = 0;
              }

              var hargajualmin = Math.round(hargabelisatuankecil + (parseFloat(changes.persentaseminsatuan3) / 100 *
                hargabelisatuankecil));

              row_update = {
                hargajualminsatuan3: hargajualmin
              }
            } else if (cell.field == 'hargajualminsatuan3') {
              var hargajualminsatuan3 = Math.round(parseFloat(changes.hargajualminsatuan3));
              var persentaseminsatuan3 = (hargajualminsatuan3 - hargabelisatuankecil) / hargabelisatuankecil * 100;

              if (hargabelisatuankecil == 0) {
                persentaseminsatuan3 = 0;
              }

              row_update = {
                hargajualminsatuan3: hargajualminsatuan3,
                persentaseminsatuan3: persentaseminsatuan3
              };
            } else if (cell.field == 'persentasemaxsatuan3') {
              if (changes.persentasemaxsatuan3 == '' || changes.persentasemaxsatuan3 == undefined) {
                changes.persentasemaxsatuan3 = 0;
              }

              var hargajualmax = Math.round(hargabelisatuankecil + (parseFloat(changes.persentasemaxsatuan3) / 100 *
                hargabelisatuankecil));

              row_update = {
                hargajualmaxsatuan3: hargajualmax
              }
            } else if (cell.field == 'hargajualmaxsatuan3') {
              var hargajualmaxsatuan3 = Math.round(parseFloat(changes.hargajualmaxsatuan3));
              var persentasemaxsatuan3 = (hargajualmaxsatuan3 - hargabelisatuankecil) / hargabelisatuankecil * 100;

              if (hargabelisatuankecil == 0) {
                persentasemaxsatuan3 = 0;
              }

              row_update = {
                hargajualmaxsatuan3: hargajualmaxsatuan3,
                persentasemaxsatuan3: persentasemaxsatuan3
              };
            }
          }

          if (jQuery.isEmptyObject(row_update) == false) {
            row_update.edit = edit;

            $(this).datagrid('updateRow', {
              index: index,
              row: row_update
            });
          }
        },
        onDblClickRow: function(index, row) {
          tampil_dialog_history_berdasarkan_satuan(row);
        },
      }).datagrid('enableCellEditing');
    }

    function buat_table_history_berdasarkan_satuan() {
      $('#table_history_berdasarkan_satuan').datagrid({
        singleSelect: true,
        frozenColumns: [
          [{
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 100,
              align: 'left',
            },
            {
              field: 'namabarang',
              title: 'Nama Barang',
              width: 200,
              align: 'left',
            },
            {
              field: 'namalokasi',
              title: 'Lokasi',
              width: 150,
              align: 'left'
            },
          ]
        ],
        columns: [
          [{
              field: 'partnumber',
              title: 'Part Number',
              width: 120,
              align: 'left',
            },
            {
              field: 'tglaktif',
              title: 'Tgl. Aktif<br>Terakhir',
              width: 80,
              align: 'center',
            },
            {
              field: 'satuan',
              title: 'Sat.<br>Besar',
              width: 50,
              align: 'center',
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'persentaseminsatuan',
              title: '% Mrgn<br>Min',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'hargajualminsatuan',
              title: 'H. Jual Min',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'persentasemaxsatuan',
              title: '% Mrgn<br>Max',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'hargajualmaxsatuan',
              title: 'H. Jual Max',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'satuan2',
              title: 'Sat.<br>Tengah',
              width: 50,
              align: 'center',
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'konversi1',
              title: 'Konv. 1',
              width: 50,
              align: 'center',
              formatter: format_qty,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'persentaseminsatuan2',
              title: '% Mrgn<br>Min',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'hargajualminsatuan2',
              title: 'H. Jual Min',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'persentasemaxsatuan2',
              title: '% Mrgn<br>Max',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'hargajualmaxsatuan2',
              title: 'H. Jual Max',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'satuan3',
              title: 'Sat.<br>Kecil',
              width: 50,
              align: 'center',
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'konversi2',
              title: 'Konv. 2',
              width: 50,
              align: 'center',
              formatter: format_qty,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'persentaseminsatuan3',
              title: '% Mrgn<br>Min',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'hargajualminsatuan3',
              title: 'H. Jual Min',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'persentasemaxsatuan3',
              title: '% Mrgn<br>Max',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'hargajualmaxsatuan3',
              title: 'H. Jual Max',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
          ]
        ],
      });
    }

    function buat_table_detail_berdasarkan_tipecustomer() {
      $('#table_detail_berdasarkan_tipecustomer').datagrid({
        RowAdd: false,
        RowDelete: false,
        view: detailview,
        detailFormatter: function(index, row) {
          return '<div class="table-wrapper" style="padding:2px;position:relative;"><table class="ddv"></table></div>';
        },
        columns: [
          [{
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 100,
              align: 'left',
              rowspan: 2
            },
            {
              field: 'namabarang',
              title: 'Nama Barang',
              width: 250,
              align: 'left',
              rowspan: 2
            },
            {
              field: 'partnumber',
              title: 'Part Number',
              width: 120,
              align: 'left',
              rowspan: 2
            },
            {
              field: 'pembelianterakhir',
              title: 'Pembelian Terakhir',
              colspan: 3,
              align: 'center'
            },
          ],
          [{
              field: 'satuanbeliterakhir',
              title: 'Sat. Beli',
              width: 80,
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
        ],
        onExpandRow: function(index, row_parent) {
          let ddv = $(this).datagrid('getRowDetail', index).find('table.ddv');

          ddv.datagrid({
            RowAdd: false,
            RowDelete: false,
            dblclickToEdit: true,
            clickToEdit: false,
            columns: [
              [{
                  field: 'kodetipecustomer',
                  title: 'Kode<br>Tipe Customer',
                  width: 90,
                  align: 'left',
                  rowspan: 2
                },
                {
                  field: 'namatipecustomer',
                  title: 'Tipe Customer',
                  width: 100,
                  align: 'left',
                  rowspan: 2
                },
                {
                  field: 'satuan',
                  title: 'Sat.<br>Besar',
                  width: 50,
                  align: 'center',
                  styler: function(value, row, index) {
                    return 'background-color: lightyellow; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'hargabelisatuan',
                  title: 'Harga Beli',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  styler: function(value, row, index) {
                    return 'background-color: lightyellow; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'persentaseminsatuan',
                  title: '% Mrgn<br>Min',
                  width: 50,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 2
                    }
                  },
                  styler: function(value, row, index) {
                    return 'background-color: lightyellow; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'hargajualminsatuan',
                  title: 'H. Jual Min',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 0
                    }
                  },
                  styler: function(value, row, index) {
                    return 'background-color: lightyellow; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'persentasemaxsatuan',
                  title: '% Mrgn<br>Max',
                  width: 50,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 2
                    }
                  },
                  styler: function(value, row, index) {
                    return 'background-color: lightyellow; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'hargajualmaxsatuan',
                  title: 'H. Jual Max',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 0
                    }
                  },
                  styler: function(value, row, index) {
                    return 'background-color: lightyellow; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'satuan2',
                  title: 'Sat.<br>Tengah',
                  width: 50,
                  align: 'center',
                  styler: function(value, row, index) {
                    return 'background-color: lightblue; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'konversi1',
                  title: 'Konv. 1',
                  width: 50,
                  align: 'center',
                  formatter: format_qty,
                  styler: function(value, row, index) {
                    return 'background-color: lightblue; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'hargabelisatuan2',
                  title: 'Harga Beli',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  styler: function(value, row, index) {
                    return 'background-color: lightblue; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'persentaseminsatuan2',
                  title: '% Mrgn<br>Min',
                  width: 50,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 2
                    }
                  },
                  styler: function(value, row, index) {
                    return 'background-color: lightblue; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'hargajualminsatuan2',
                  title: 'H. Jual Min',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 0
                    }
                  },
                  styler: function(value, row, index) {
                    return 'background-color: lightblue; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'persentasemaxsatuan2',
                  title: '% Mrgn<br>Max',
                  width: 50,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 2
                    }
                  },
                  styler: function(value, row, index) {
                    return 'background-color: lightblue; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'hargajualmaxsatuan2',
                  title: 'H. Jual Max',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 0
                    }
                  },
                  styler: function(value, row, index) {
                    return 'background-color: lightblue; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'satuan3',
                  title: 'Sat.<br>Kecil',
                  width: 50,
                  align: 'center',
                  styler: function(value, row, index) {
                    return 'background-color: #f3c7ff; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'konversi2',
                  title: 'Konv. 2',
                  width: 50,
                  align: 'center',
                  rowspan: 2,
                  formatter: format_qty,
                  styler: function(value, row, index) {
                    return 'background-color: #f3c7ff; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'hargabelisatuan3',
                  title: 'Harga Beli',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  styler: function(value, row, index) {
                    return 'background-color: #f3c7ff; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'persentaseminsatuan3',
                  title: '% Mrgn<br>Min',
                  width: 50,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 2
                    }
                  },
                  styler: function(value, row, index) {
                    return 'background-color: #f3c7ff; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'hargajualminsatuan3',
                  title: 'H. Jual Min',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 0
                    }
                  },
                  styler: function(value, row, index) {
                    return 'background-color: #f3c7ff; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'persentasemaxsatuan3',
                  title: '% Mrgn<br>Max',
                  width: 50,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 2
                    }
                  },
                  styler: function(value, row, index) {
                    return 'background-color: #f3c7ff; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'hargajualmaxsatuan3',
                  title: 'H. Jual Max',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 0
                    }
                  },
                  styler: function(value, row, index) {
                    return 'background-color: #f3c7ff; color: #000000';
                  },
                  rowspan: 2
                },
              ],
              [

              ]
            ],
            rowStyler: function(index, row) {
              if (row.edit == 1) {
                return 'background-color: lightgreen';
              }
            },
            onBeforeCellEdit: function(index, field) {
              var row = $(this).datagrid('getRows')[index];

              if ($('#TIPECUSTOMER_CBPERSENTASEMENGIKUTI').prop('checked')) {
                if (['persentaseminsatuan2', 'hargajualminsatuan2', 'persentasemaxsatuan2',
                    'hargajualmaxsatuan2', 'persentaseminsatuan3', 'hargajualminsatuan3',
                    'persentasemaxsatuan3', 'hargajualmaxsatuan3'
                  ].indexOf(field) >= 0) {
                  return false;
                }
              } else if (['persentaseminsatuan2', 'hargajualminsatuan2', 'persentasemaxsatuan2',
                  'hargajualmaxsatuan2'
                ].indexOf(field) >= 0 && (row.satuan2 == null || row.satuan2 == '')) {
                return false;
              } else if (['persentaseminsatuan3', 'hargajualminsatuan3', 'persentasemaxsatuan3',
                  'hargajualmaxsatuan3'
                ].indexOf(field) >= 0 && (row.satuan3 == null || row.satuan3 == '')) {
                return false;
              }
            },
            onEndEdit: function(index, row, changes) {
              var cell = $(this).datagrid('cell');
              var ed = get_editor(ddv, index, cell.field);
              var row_update = {};
              var persentasemengikuti = $('#TIPECUSTOMER_CBPERSENTASEMENGIKUTI').prop('checked');
              let edit = 0;

              edit = Object.keys(changes).length > 0 || row.edit == 1 ? 1 : 0;

              var hargabelisatuanbesar = parseFloat(row.hargabelisatuan);
              var hargabelisatuansedang = parseFloat(row.hargabelisatuan2);
              var hargabelisatuankecil = parseFloat(row.hargabelisatuan3);

              if (cell.field == 'persentaseminsatuan') {
                if (changes.persentaseminsatuan == '' || changes.persentaseminsatuan == undefined) {
                  changes.persentaseminsatuan = 0;
                }

                var hargajualmin = Math.round(hargabelisatuanbesar + (parseFloat(changes
                  .persentaseminsatuan) / 100 * hargabelisatuanbesar));

                if (persentasemengikuti) {
                  row_update.persentaseminsatuan2 = changes.persentaseminsatuan;
                  row_update.hargajualminsatuan2 = Math.round(hargabelisatuansedang + (row_update
                    .persentaseminsatuan2 / 100 * hargabelisatuansedang));

                  row_update.persentaseminsatuan3 = changes.persentaseminsatuan;
                  row_update.hargajualminsatuan3 = Math.round(hargabelisatuankecil + (row_update
                    .persentaseminsatuan3 / 100 * hargabelisatuankecil));
                }

                row_update.hargajualminsatuan = hargajualmin;
              } else if (cell.field == 'hargajualminsatuan') {
                var hargajualminsatuan = Math.round(parseFloat(changes.hargajualminsatuan));
                var persentaseminsatuan = (hargajualminsatuan - hargabelisatuanbesar) / hargabelisatuanbesar *
                  100;

                row_update = {
                  hargajualminsatuan: hargajualminsatuan,
                  persentaseminsatuan: persentaseminsatuan
                };

                if (persentasemengikuti) {
                  row_update.persentaseminsatuan2 = persentaseminsatuan;
                  row_update.hargajualminsatuan2 = Math.round(hargabelisatuansedang + (row_update
                    .persentaseminsatuan2 / 100 * hargabelisatuansedang));

                  row_update.persentaseminsatuan3 = persentaseminsatuan;
                  row_update.hargajualminsatuan3 = Math.round(hargabelisatuankecil + (row_update
                    .persentaseminsatuan3 / 100 * hargabelisatuankecil));
                }
              } else if (cell.field == 'persentasemaxsatuan') {
                if (changes.persentasemaxsatuan == '' || changes.persentasemaxsatuan == undefined) {
                  changes.persentasemaxsatuan = 0;
                }

                if (persentasemengikuti) {
                  row_update.persentasemaxsatuan2 = changes.persentasemaxsatuan;
                  row_update.hargajualmaxsatuan2 = Math.round(hargabelisatuansedang + (row_update
                    .persentasemaxsatuan2 / 100 * hargabelisatuansedang));

                  row_update.persentasemaxsatuan3 = changes.persentasemaxsatuan;
                  row_update.hargajualmaxsatuan3 = Math.round(hargabelisatuankecil + (row_update
                    .persentasemaxsatuan3 / 100 * hargabelisatuankecil));
                }

                var hargajualmax = Math.round(hargabelisatuanbesar + (parseFloat(changes
                  .persentasemaxsatuan) / 100 * hargabelisatuanbesar));

                row_update.hargajualmaxsatuan = hargajualmax
              } else if (cell.field == 'hargajualmaxsatuan') {
                var hargajualmaxsatuan = Math.round(parseFloat(changes.hargajualmaxsatuan));
                var persentasemaxsatuan = (hargajualmaxsatuan - hargabelisatuanbesar) / hargabelisatuanbesar *
                  100;

                row_update = {
                  hargajualmaxsatuan: hargajualmaxsatuan,
                  persentasemaxsatuan: persentasemaxsatuan
                };

                if (persentasemengikuti) {
                  row_update.persentasemaxsatuan2 = persentasemaxsatuan;
                  row_update.hargajualmaxsatuan2 = Math.round(hargabelisatuansedang + (row_update
                    .persentasemaxsatuan2 / 100 * hargabelisatuansedang));

                  row_update.persentasemaxsatuan3 = persentasemaxsatuan;
                  row_update.hargajualmaxsatuan3 = Math.round(hargabelisatuankecil + (row_update
                    .persentasemaxsatuan3 / 100 * hargabelisatuankecil));
                }
              }

              if (cell.field == 'persentaseminsatuan2') {
                if (changes.persentaseminsatuan2 == '' || changes.persentaseminsatuan2 == undefined) {
                  changes.persentaseminsatuan2 = 0;
                }

                var hargajualmin = Math.round(hargabelisatuansedang + (parseFloat(changes
                  .persentaseminsatuan2) / 100 * hargabelisatuansedang));

                row_update = {
                  hargajualminsatuan2: hargajualmin
                }
              } else if (cell.field == 'hargajualminsatuan2') {
                var hargajualminsatuan2 = Math.round(parseFloat(changes.hargajualminsatuan2));
                var persentaseminsatuan2 = (hargajualminsatuan2 - hargabelisatuansedang) /
                  hargabelisatuansedang * 100;

                row_update = {
                  hargajualminsatuan2: hargajualminsatuan2,
                  persentaseminsatuan2: persentaseminsatuan2
                };
              } else if (cell.field == 'persentasemaxsatuan2') {
                if (changes.persentasemaxsatuan2 == '' || changes.persentasemaxsatuan2 == undefined) {
                  changes.persentasemaxsatuan2 = 0;
                }

                var hargajualmax = Math.round(hargabelisatuansedang + (parseFloat(changes
                  .persentasemaxsatuan2) / 100 * hargabelisatuansedang));

                row_update = {
                  hargajualmaxsatuan2: hargajualmax
                }
              } else if (cell.field == 'hargajualmaxsatuan2') {
                var hargajualmaxsatuan2 = Math.round(parseFloat(changes.hargajualmaxsatuan2));
                var persentasemaxsatuan2 = (hargajualmaxsatuan2 - hargabelisatuansedang) /
                  hargabelisatuansedang * 100;

                row_update = {
                  hargajualmaxsatuan2: hargajualmaxsatuan2,
                  persentasemaxsatuan2: persentasemaxsatuan2
                };
              }

              if (cell.field == 'persentaseminsatuan3') {
                if (changes.persentaseminsatuan3 == '' || changes.persentaseminsatuan3 == undefined) {
                  changes.persentaseminsatuan3 = 0;
                }

                var hargajualmin = Math.round(hargabelisatuankecil + (parseFloat(changes
                  .persentaseminsatuan3) / 100 * hargabelisatuankecil));

                row_update = {
                  hargajualminsatuan3: hargajualmin
                }
              } else if (cell.field == 'hargajualminsatuan3') {
                var hargajualminsatuan3 = Math.round(parseFloat(changes.hargajualminsatuan3));
                var persentaseminsatuan3 = (hargajualminsatuan3 - hargabelisatuankecil) /
                  hargabelisatuankecil * 100;

                row_update = {
                  hargajualminsatuan3: hargajualminsatuan3,
                  persentaseminsatuan3: persentaseminsatuan3
                };
              } else if (cell.field == 'persentasemaxsatuan3') {
                if (changes.persentasemaxsatuan3 == '' || changes.persentasemaxsatuan3 == undefined) {
                  changes.persentasemaxsatuan3 = 0;
                }

                var hargajualmax = Math.round(hargabelisatuankecil + (parseFloat(changes
                  .persentasemaxsatuan3) / 100 * hargabelisatuankecil));

                row_update = {
                  hargajualmaxsatuan3: hargajualmax
                }
              } else if (cell.field == 'hargajualmaxsatuan3') {
                var hargajualmaxsatuan3 = Math.round(parseFloat(changes.hargajualmaxsatuan3));
                var persentasemaxsatuan3 = (hargajualmaxsatuan3 - hargabelisatuankecil) /
                  hargabelisatuankecil * 100;

                row_update = {
                  hargajualmaxsatuan3: hargajualmaxsatuan3,
                  persentasemaxsatuan3: persentasemaxsatuan3
                };
              }

              if (jQuery.isEmptyObject(row_update) == false) {
                row_update.edit = edit;

                $(this).datagrid('updateRow', {
                  index: index,
                  row: row_update
                });
              }
            },
            onResize: function() {
              $('#table_detail_berdasarkan_tipecustomer').datagrid('fixDetailRowHeight', index);
            },
            onLoadSuccess: function() {
              setTimeout(function() {
                $('#table_detail_berdasarkan_tipecustomer').datagrid('fixDetailRowHeight', index);
              }, 0);
            },
            onAfterEdit: function(index, row, changes) {
              row_parent.detailharga = JSON.stringify(ddv.datagrid('getRows'));
            },
            onDblClickRow: function(index, row) {
              tampil_dialog_history_berdasarkan_tipecustomer(row_parent.uuidbarang, row);
            }
          })

          ddv.datagrid('disableCellEditing');
          ddv.datagrid('enableCellEditing');

          ddv.datagrid('loadData', row_parent.detailharga);

          $('#table_detail_berdasarkan_tipecustomer').datagrid('fixDetailRowHeight', index);
        }
      });
    }

    function buat_table_history_berdasarkan_tipecustomer() {
      $('#table_history_berdasarkan_tipecustomer').datagrid({
        singleSelect: true,
        frozenColumns: [
          [{
              field: 'uuidbarang',
              hidden: true
            }, {
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 100,
              align: 'left',
            },
            {
              field: 'namabarang',
              title: 'Nama Barang',
              width: 200,
              align: 'left',
            },
            {
              field: 'namalokasi',
              title: 'Lokasi',
              width: 150,
              align: 'left'
            },
          ]
        ],
        columns: [
          [{
              field: 'kodetipecustomer',
              title: 'Kode<br>Tipe Customer',
              width: 90,
              align: 'left',
            },
            {
              field: 'namatipecustomer',
              title: 'Tipe Customer',
              width: 100,
              align: 'left',
            },
            {
              field: 'partnumber',
              title: 'Part Number',
              width: 120,
              align: 'left',
            },
            {
              field: 'tglaktif',
              title: 'Tgl. Aktif<br>Terakhir',
              width: 80,
              align: 'center',
            },
            {
              field: 'satuan',
              title: 'Sat.<br>Besar',
              width: 50,
              align: 'center',
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'persentaseminsatuan',
              title: '% Mrgn<br>Min',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'hargajualminsatuan',
              title: 'H. Jual Min',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'persentasemaxsatuan',
              title: '% Mrgn<br>Max',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'hargajualmaxsatuan',
              title: 'H. Jual Max',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'satuan2',
              title: 'Sat.<br>Tengah',
              width: 50,
              align: 'center',
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'konversi1',
              title: 'Konv. 1',
              width: 50,
              align: 'center',
              formatter: format_qty,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'persentaseminsatuan2',
              title: '% Mrgn<br>Min',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'hargajualminsatuan2',
              title: 'H. Jual Min',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'persentasemaxsatuan2',
              title: '% Mrgn<br>Max',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'hargajualmaxsatuan2',
              title: 'H. Jual Max',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'satuan3',
              title: 'Sat.<br>Kecil',
              width: 50,
              align: 'center',
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'konversi2',
              title: 'Konv. 2',
              width: 50,
              align: 'center',
              formatter: format_qty,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'persentaseminsatuan3',
              title: '% Mrgn<br>Min',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'hargajualminsatuan3',
              title: 'H. Jual Min',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'persentasemaxsatuan3',
              title: '% Mrgn<br>Max',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'hargajualmaxsatuan3',
              title: 'H. Jual Max',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
          ]
        ],
      });
    }

    function buat_table_detail_berdasarkan_customer() {
      $('#table_detail_berdasarkan_customer').datagrid({
        RowAdd: false,
        RowDelete: false,
        view: detailview,
        detailFormatter: function(index, row) {
          return '<div style="padding:2px;position:relative;"><table class="ddv"></table></div>';
        },
        columns: [
          [{
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 100,
              align: 'left',
              rowspan: 2
            },
            {
              field: 'namabarang',
              title: 'Nama Barang',
              width: 250,
              align: 'left',
              rowspan: 2
            },
            {
              field: 'partnumber',
              title: 'Part Number',
              width: 120,
              align: 'left',
              rowspan: 2
            },
            {
              field: 'pembelianterakhir',
              title: 'Pembelian Terakhir',
              colspan: 3,
              align: 'center'
            }
          ],
          [{
              field: 'satuanbeliterakhir',
              title: 'Sat. Beli',
              width: 80,
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
        ],
        onExpandRow: function(index, row_parent) {
          let ddv = $(this).datagrid('getRowDetail', index).find('table.ddv');

          ddv.datagrid({
            RowAdd: false,
            RowDelete: false,
            dblclickToEdit: true,
            clickToEdit: false,
            columns: [
              [{
                  field: 'kodecustomer',
                  title: 'Kode<br>Customer',
                  width: 80,
                  align: 'left',
                  rowspan: 2
                },
                {
                  field: 'namacustomer',
                  title: 'Customer',
                  width: 200,
                  align: 'left',
                  rowspan: 2
                },
                {
                  field: 'satuan',
                  title: 'Sat.<br>Besar',
                  width: 50,
                  align: 'center',
                  rowspan: 2,
                  styler: function(value, row, index) {
                    return 'background-color: lightyellow; color: #000000';
                  },
                },
                {
                  field: 'hargabelisatuan',
                  title: 'Harga Beli',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  styler: function(value, row, index) {
                    return 'background-color: lightyellow; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'persentaseminsatuan',
                  title: '% Mrgn<br>Min',
                  width: 50,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 2
                    }
                  },
                  rowspan: 2,
                  styler: function(value, row, index) {
                    return 'background-color: lightyellow; color: #000000';
                  },
                },
                {
                  field: 'hargajualminsatuan',
                  title: 'H. Jual Min',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 0
                    }
                  },
                  rowspan: 2,
                  styler: function(value, row, index) {
                    return 'background-color: lightyellow; color: #000000';
                  },
                },
                {
                  field: 'persentasemaxsatuan',
                  title: '% Mrgn<br>Max',
                  width: 50,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 2
                    }
                  },
                  rowspan: 2,
                  styler: function(value, row, index) {
                    return 'background-color: lightyellow; color: #000000';
                  },
                },
                {
                  field: 'hargajualmaxsatuan',
                  title: 'H. Jual Max',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 0
                    }
                  },
                  rowspan: 2,
                  styler: function(value, row, index) {
                    return 'background-color: lightyellow; color: #000000';
                  },
                },
                {
                  field: 'satuan2',
                  title: 'Sat.<br>Tengah',
                  width: 80,
                  align: 'center',
                  rowspan: 2,
                  styler: function(value, row, index) {
                    return 'background-color: lightblue; color: #000000';
                  },
                },
                {
                  field: 'konversi1',
                  title: 'Konv. 1',
                  width: 50,
                  align: 'center',
                  formatter: format_qty,
                  styler: function(value, row, index) {
                    return 'background-color: lightblue; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'hargabelisatuan2',
                  title: 'Harga Beli',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  styler: function(value, row, index) {
                    return 'background-color: lightblue; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'persentaseminsatuan2',
                  title: '% Mrgn<br>Min',
                  width: 50,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 2
                    }
                  },
                  rowspan: 2,
                  styler: function(value, row, index) {
                    return 'background-color: lightblue; color: #000000';
                  },
                },
                {
                  field: 'hargajualminsatuan2',
                  title: 'H. Jual Min',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 0
                    }
                  },
                  rowspan: 2,
                  styler: function(value, row, index) {
                    return 'background-color: lightblue; color: #000000';
                  },
                },
                {
                  field: 'persentasemaxsatuan2',
                  title: '% Mrgn<br>Max',
                  width: 50,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 2
                    }
                  },
                  rowspan: 2,
                  styler: function(value, row, index) {
                    return 'background-color: lightblue; color: #000000';
                  },
                },
                {
                  field: 'hargajualmaxsatuan2',
                  title: 'H. Jual Max',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 0
                    }
                  },
                  rowspan: 2,
                  styler: function(value, row, index) {
                    return 'background-color: lightblue; color: #000000';
                  },
                },
                {
                  field: 'satuan3',
                  title: 'Sat.<br>Kecil',
                  width: 50,
                  align: 'center',
                  rowspan: 2,
                  styler: function(value, row, index) {
                    return 'background-color: #f3c7ff; color: #000000';
                  },
                },
                {
                  field: 'konversi2',
                  title: 'Konv. 2',
                  width: 50,
                  align: 'center',
                  rowspan: 2,
                  formatter: format_qty,
                  styler: function(value, row, index) {
                    return 'background-color: #f3c7ff; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'hargabelisatuan3',
                  title: 'Harga Beli',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  styler: function(value, row, index) {
                    return 'background-color: #f3c7ff; color: #000000';
                  },
                  rowspan: 2
                },
                {
                  field: 'persentaseminsatuan3',
                  title: '% Mrgn<br>Min',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 2
                    }
                  },
                  rowspan: 2,
                  styler: function(value, row, index) {
                    return 'background-color: #f3c7ff; color: #000000';
                  },
                },
                {
                  field: 'hargajualminsatuan3',
                  title: 'H. Jual Min',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 0
                    }
                  },
                  rowspan: 2,
                  styler: function(value, row, index) {
                    return 'background-color: #f3c7ff; color: #000000';
                  },
                },
                {
                  field: 'persentasemaxsatuan3',
                  title: '% Mrgn<br>Max',
                  width: 50,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 2
                    }
                  },
                  rowspan: 2,
                  styler: function(value, row, index) {
                    return 'background-color: #f3c7ff; color: #000000';
                  },
                },
                {
                  field: 'hargajualmaxsatuan3',
                  title: 'H. Jual Max',
                  width: 80,
                  align: 'right',
                  formatter: format_amount,
                  editor: {
                    type: 'numberbox',
                    options: {
                      precision: 0
                    }
                  },
                  rowspan: 2,
                  styler: function(value, row, index) {
                    return 'background-color: #f3c7ff; color: #000000';
                  },
                },
              ],
              [
                //
              ]
            ],
            onBeforeCellEdit: function(index, field) {
              var row = $(this).datagrid('getRows')[index];

              if ($('#CUSTOMER_CBPERSENTASEMENGIKUTI').prop('checked')) {
                if (['persentaseminsatuan2', 'hargajualminsatuan2', 'persentasemaxsatuan2',
                    'hargajualmaxsatuan2', 'persentaseminsatuan3', 'hargajualminsatuan3',
                    'persentasemaxsatuan3', 'hargajualmaxsatuan3'
                  ].indexOf(field) >= 0) {
                  return false;
                }
              } else if (['persentaseminsatuan2', 'hargajualminsatuan2', 'persentasemaxsatuan2',
                  'hargajualmaxsatuan2'
                ].indexOf(field) >= 0 && (row.satuan2 == null || row.satuan2 == '')) {
                return false;
              } else if (['persentaseminsatuan3', 'hargajualminsatuan3', 'persentasemaxsatuan3',
                  'hargajualmaxsatuan3'
                ].indexOf(field) >= 0 && (row.satuan3 == null || row.satuan3 == '')) {
                return false;
              }
            },
            onEndEdit: function(index, row, changes) {
              var cell = $(this).datagrid('cell');
              var ed = get_editor(ddv, index, cell.field);
              var row_update = {};
              var persentasemengikuti = $('#CUSTOMER_CBPERSENTASEMENGIKUTI').prop('checked');

              var hargabelisatuanbesar = parseFloat(row.hargabelisatuan);
              var hargabelisatuansedang = parseFloat(row.hargabelisatuan2);
              var hargabelisatuankecil = parseFloat(row.hargabelisatuan3);

              if (cell.field == 'persentaseminsatuan') {
                if (changes.persentaseminsatuan == '' || changes.persentaseminsatuan == undefined) {
                  changes.persentaseminsatuan = 0;
                }

                var hargajualmin = Math.round(hargabelisatuanbesar + (parseFloat(changes
                  .persentaseminsatuan) / 100 * hargabelisatuanbesar));

                if (persentasemengikuti) {
                  row_update.persentaseminsatuan2 = changes.persentaseminsatuan;
                  row_update.hargajualminsatuan2 = Math.round(hargabelisatuansedang + (row_update
                    .persentaseminsatuan2 / 100 * hargabelisatuansedang));

                  row_update.persentaseminsatuan3 = changes.persentaseminsatuan;
                  row_update.hargajualminsatuan3 = Math.round(hargabelisatuankecil + (row_update
                    .persentaseminsatuan3 / 100 * hargabelisatuankecil));
                }

                row_update.hargajualminsatuan = hargajualmin;
              } else if (cell.field == 'hargajualminsatuan') {
                var hargajualminsatuan = Math.round(parseFloat(changes.hargajualminsatuan));
                var persentaseminsatuan = (hargajualminsatuan - hargabelisatuanbesar) / hargabelisatuanbesar *
                  100;

                if (hargabelisatuanbesar == 0) {
                  persentaseminsatuan = 0;
                }

                row_update = {
                  hargajualminsatuan: hargajualminsatuan,
                  persentaseminsatuan: persentaseminsatuan
                };
              } else if (cell.field == 'persentasemaxsatuan') {
                if (changes.persentasemaxsatuan == '' || changes.persentasemaxsatuan == undefined) {
                  changes.persentasemaxsatuan = 0;
                }

                if (persentasemengikuti) {
                  row_update.persentasemaxsatuan2 = changes.persentasemaxsatuan;
                  row_update.hargajualmaxsatuan2 = Math.round(hargabelisatuansedang + (row_update
                    .persentasemaxsatuan2 / 100 * hargabelisatuansedang));

                  row_update.persentasemaxsatuan3 = changes.persentasemaxsatuan;
                  row_update.hargajualmaxsatuan3 = Math.round(hargabelisatuankecil + (row_update
                    .persentasemaxsatuan3 / 100 * hargabelisatuankecil));
                }

                var hargajualmax = Math.round(hargabelisatuanbesar + (parseFloat(changes
                  .persentasemaxsatuan) / 100 * hargabelisatuanbesar));

                row_update.hargajualmaxsatuan = hargajualmax
              } else if (cell.field == 'hargajualmaxsatuan') {
                var hargajualmaxsatuan = Math.round(parseFloat(changes.hargajualmaxsatuan));
                var persentasemaxsatuan = (hargajualmaxsatuan - hargabelisatuanbesar) / hargabelisatuanbesar *
                  100;

                if (hargabelisatuanbesar == 0) {
                  persentasemaxsatuan = 0;
                }

                row_update = {
                  hargajualmaxsatuan: hargajualmaxsatuan,
                  persentasemaxsatuan: persentasemaxsatuan
                };
              }

              if (cell.field == 'persentaseminsatuan2') {
                if (changes.persentaseminsatuan2 == '' || changes.persentaseminsatuan2 == undefined) {
                  changes.persentaseminsatuan2 = 0;
                }

                var hargajualmin = Math.round(hargabelisatuansedang + (parseFloat(changes
                  .persentaseminsatuan2) / 100 * hargabelisatuansedang));

                row_update = {
                  hargajualminsatuan2: hargajualmin
                }
              } else if (cell.field == 'hargajualminsatuan2') {
                var hargajualminsatuan2 = Math.round(parseFloat(changes.hargajualminsatuan2));
                var persentaseminsatuan2 = (hargajualminsatuan2 - hargabelisatuansedang) /
                  hargabelisatuansedang * 100;

                if (hargabelisatuansedang == 0) {
                  persentaseminsatuan2 = 0;
                }

                row_update = {
                  hargajualminsatuan2: hargajualminsatuan2,
                  persentaseminsatuan2: persentaseminsatuan2
                };
              } else if (cell.field == 'persentasemaxsatuan2') {
                if (changes.persentasemaxsatuan2 == '' || changes.persentasemaxsatuan2 == undefined) {
                  changes.persentasemaxsatuan2 = 0;
                }

                var hargajualmax = Math.round(hargabelisatuansedang + (parseFloat(changes
                  .persentasemaxsatuan2) / 100 * hargabelisatuansedang));

                row_update = {
                  hargajualmaxsatuan2: hargajualmax
                }
              } else if (cell.field == 'hargajualmaxsatuan2') {
                var hargajualmaxsatuan2 = Math.round(parseFloat(changes.hargajualmaxsatuan2));
                var persentasemaxsatuan2 = (hargajualmaxsatuan2 - hargabelisatuansedang) /
                  hargabelisatuansedang * 100;

                if (hargabelisatuankecil == 0) {
                  persentasemaxsatuan2 = 0;
                }

                row_update = {
                  hargajualmaxsatuan2: hargajualmaxsatuan2,
                  persentasemaxsatuan2: persentasemaxsatuan2
                };
              }

              if (cell.field == 'persentaseminsatuan3') {
                if (changes.persentaseminsatuan3 == '' || changes.persentaseminsatuan3 == undefined) {
                  changes.persentaseminsatuan3 = 0;
                }

                var hargajualmin = Math.round(hargabelisatuankecil + (parseFloat(changes
                  .persentaseminsatuan3) / 100 * hargabelisatuankecil));

                row_update = {
                  hargajualminsatuan3: hargajualmin
                }
              } else if (cell.field == 'hargajualminsatuan3') {
                var hargajualminsatuan3 = Math.round(parseFloat(changes.hargajualminsatuan3));
                var persentaseminsatuan3 = (hargajualminsatuan3 - hargabelisatuankecil) /
                  hargabelisatuankecil * 100;

                if (hargabelisatuankecil == 0) {
                  persentaseminsatuan3 = 0;
                }

                row_update = {
                  hargajualminsatuan3: hargajualminsatuan3,
                  persentaseminsatuan3: persentaseminsatuan3
                };
              } else if (cell.field == 'persentasemaxsatuan3') {
                if (changes.persentasemaxsatuan3 == '' || changes.persentasemaxsatuan3 == undefined) {
                  changes.persentasemaxsatuan3 = 0;
                }

                var hargajualmax = Math.round(hargabelisatuankecil + (parseFloat(changes
                  .persentasemaxsatuan3) / 100 * hargabelisatuankecil));

                row_update = {
                  hargajualmaxsatuan3: hargajualmax
                }
              } else if (cell.field == 'hargajualmaxsatuan3') {
                var hargajualmaxsatuan3 = Math.round(parseFloat(changes.hargajualmaxsatuan3));
                var persentasemaxsatuan3 = (hargajualmaxsatuan3 - hargabelisatuankecil) /
                  hargabelisatuankecil * 100;

                if (hargabelisatuankecil == 0) {
                  persentasemaxsatuan3 = 0;
                }

                row_update = {
                  hargajualmaxsatuan3: hargajualmaxsatuan3,
                  persentasemaxsatuan3: persentasemaxsatuan3
                };
              }

              if (jQuery.isEmptyObject(row_update) == false) {
                $(this).datagrid('updateRow', {
                  index: index,
                  row: row_update
                });
              }
            },
            onResize: function() {
              $('#table_detail_berdasarkan_customer').datagrid('fixDetailRowHeight', index);
            },
            onLoadSuccess: function() {
              setTimeout(function() {
                $('#table_detail_berdasarkan_customer').datagrid('fixDetailRowHeight', index);
              }, 0);
            },
            onAfterEdit: function(index, row, changes) {
              row_parent.detailharga = JSON.stringify(ddv.datagrid('getRows'));
            },
            onDblClickRow: function(index, row) {
              tampil_dialog_history_berdasarkan_customer(row_parent.uuidbarang, row);
            }
          });

          ddv.datagrid('disableCellEditing');
          ddv.datagrid('enableCellEditing');

          ddv.datagrid('loadData', JSON.parse(row_parent.detailharga));

          $('#table_detail_berdasarkan_customer').datagrid('fixDetailRowHeight', index);
        }
      });
    }

    function buat_table_history_berdasarkan_customer() {
      $('#table_history_berdasarkan_customer').datagrid({
        singleSelect: true,
        frozenColumns: [
          [{
              field: 'kodebarang',
              title: 'Kode Barang',
              width: 100,
              align: 'left',
            },
            {
              field: 'namabarang',
              title: 'Nama Barang',
              width: 200,
              align: 'left',
            },
            {
              field: 'namalokasi',
              title: 'Lokasi',
              width: 150,
              align: 'left'
            },
          ]
        ],
        columns: [
          [{
              field: 'kodecustomer',
              title: 'Kode<br> Customer',
              width: 90,
              align: 'left',
            },
            {
              field: 'namacustomer',
              title: 'Customer',
              width: 150,
              align: 'left',
            },
            {
              field: 'partnumber',
              title: 'Part Number',
              width: 120,
              align: 'left',
            },
            {
              field: 'tglaktif',
              title: 'Tgl. Aktif<br>Terakhir',
              width: 80,
              align: 'center',
            },
            {
              field: 'satuan',
              title: 'Sat.<br>Besar',
              width: 50,
              align: 'center',
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'persentaseminsatuan',
              title: '% Mrgn<br>Min',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'hargajualminsatuan',
              title: 'H. Jual Min',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'persentasemaxsatuan',
              title: '% Mrgn<br>Max',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'hargajualmaxsatuan',
              title: 'H. Jual Max',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightyellow; color: #000000';
              }
            },
            {
              field: 'satuan2',
              title: 'Sat.<br>Tengah',
              width: 50,
              align: 'center',
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'konversi1',
              title: 'Konv. 1',
              width: 50,
              align: 'center',
              formatter: format_qty,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'persentaseminsatuan2',
              title: '% Mrgn<br>Min',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'hargajualminsatuan2',
              title: 'H. Jual Min',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'persentasemaxsatuan2',
              title: '% Mrgn<br>Max',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'hargajualmaxsatuan2',
              title: 'H. Jual Max',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: lightblue; color: #000000';
              }
            },
            {
              field: 'satuan3',
              title: 'Sat.<br>Kecil',
              width: 50,
              align: 'center',
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'konversi2',
              title: 'Konv. 2',
              width: 50,
              align: 'center',
              formatter: format_qty,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'persentaseminsatuan3',
              title: '% Mrgn<br>Min',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'hargajualminsatuan3',
              title: 'H. Jual Min',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'persentasemaxsatuan3',
              title: '% Mrgn<br>Max',
              width: 50,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
            {
              field: 'hargajualmaxsatuan3',
              title: 'H. Jual Max',
              width: 80,
              align: 'right',
              formatter: format_amount,
              styler: function(value, row, index) {
                return 'background-color: #f3c7ff; color: #000000';
              }
            },
          ]
        ],
      });
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
        onBeforeLoad: function(param) {
          loaderfitur.supplier = false;
        },
        onLoadSuccess: function(data) {
          loaderfitur.supplier = true;
          closeLoader();
        },
        // required: true,
        columns: [
          [{
              field: 'uuidsupplier',
              hidden: true
            }, {
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
        onBeforeLoad: function(param) {
          loaderfitur.merk = false;
        },
        onLoadSuccess: function(data) {
          loaderfitur.merk = true;
          closeLoader();
        },
        columns: [
          [{
              field: 'ck',
              checkbox: true
            },
            {
              field: 'uuidmerk',
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
        onBeforeLoad: function(param) {
          loaderfitur.kategori = false;
        },
        onLoadSuccess: function(data) {
          loaderfitur.kategori = true;
          closeLoader();
        },
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
        onBeforeLoad: function(param) {
          loaderfitur.barang = false;
        },
        onLoadSuccess: function(data) {
          loaderfitur.barang = true;
          closeLoader();
        },
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
        onSelect: function(index, row) {
          if (id == '#FILTER_CUSTOMER_BARANG') {
            $('#FILTER_CUSTOMER_NAMABARANG').textbox('setValue', row.nama);

            tampil_harga_jual_terakhir_customer();
          }
        }
      });
    }

    function browse_data_customer(id) {
      $(id).combogrid({
        panelWidth: 600,
        url: link_api.browseCustomer,
        idField: 'uuidcustomer',
        textField: 'kode',
        mode: 'remote',
        sortName: 'nama',
        sortOrder: 'asc',
        required: true,
        columns: [
          [{
              field: 'uuidcustomer',
              hidden: true
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
            },
            {
              field: 'idsyaratbayar',
              hidden: true
            }
          ]
        ],
        onSelect: function(index, row) {
          if (id == '#FILTER_CUSTOMER_CUSTOMER') {
            tampil_harga_jual_terakhir_customer();
          }
        }
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
        onBeforeLoad: function(param) {
          loaderfitur.lokasi = false;
        },
        onLoadSuccess: function(data) {
          loaderfitur.lokasi = true;
          closeLoader();
        },
        columns: [
          [{
              field: 'uuidlokasi',
              hidden: true
            }, {
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
          if (id == '#FILTER_CUSTOMER_IDLOKASI') {
            tampil_harga_jual_terakhir_customer();
          }
        }
      });
    }

    function tampil_data_barang_berdasarkan_satuan(event) {
      event.preventDefault();

      var idsupplier = $('#FILTER_SATUAN_SUPPLIER').combogrid('getValue');
      var idmerk = $('#FILTER_SATUAN_MERK').combogrid('getValues');
      var kategori = $('#FILTER_SATUAN_KATEGORI').combogrid('getValues');
      var kodebarangawal = $('#FILTER_SATUAN_BARANGAWAL').combogrid('getValue');
      var kodebarangakhir = $('#FILTER_SATUAN_BARANGAKHIR').combogrid('getValue');
      var idlokasi = $('#FILTER_SATUAN_IDLOKASI').combogrid('getValue');
      var berisikata = $('#FILTER_SATUAN_BERISIKATA').textbox('getValue');

      if (idlokasi == '') {
        $.messager.alert('Peringatan', 'Data lokasi belum diisi', 'warning');

        return false;
      }

      if (idsupplier == '') {
        $.messager.alert('Peringatan', 'Data supplier belum diisi', 'warning');

        return false;
      }

      $.ajax({
        url: link_api.loadDataBarangBerdasarkanSatuan,
        type: 'POST',
        dataType: 'JSON',
        data: {
          uuidsupplier: idsupplier,
          daftarmerk: idmerk,
          daftarkategori: kategori,
          kodebarangawal: kodebarangawal,
          kodebarangakhir: kodebarangakhir,
          uuidlokasi: idlokasi,
          berisikata: berisikata
        },
        beforeSend: function() {
          $('#table_detail_berdasarkan_satuan').datagrid('loading');
        },
        success: function(data) {
          $('#table_detail_berdasarkan_satuan').datagrid('loaded');
          $('#table_detail_berdasarkan_satuan').datagrid('loadData', data);
        }
      })
    }

    function tampil_data_barang_berdasarkan_tipecustomer(event) {
      event.preventDefault();

      var idsupplier = $('#FILTER_TIPECUSTOMER_SUPPLIER').combogrid('getValue');
      var idmerk = $('#FILTER_TIPECUSTOMER_MERK').combogrid('getValues');
      var kategori = $('#FILTER_TIPECUSTOMER_KATEGORI').combogrid('getValues');
      var kodebarangawal = $('#FILTER_TIPECUSTOMER_BARANGAWAL').combogrid('getValue');
      var kodebarangakhir = $('#FILTER_TIPECUSTOMER_BARANGAKHIR').combogrid('getValue');
      var idlokasi = $('#FILTER_TIPECUSTOMER_IDLOKASI').combogrid('getValue');
      var berisikata = $('#FILTER_TIPECUSTOMER_BERISIKATA').textbox('getValue');

      if (idlokasi == '') {
        $.messager.alert('Peringatan', 'Data lokasi belum diisi', 'warning');

        return false;
      }

      if (idsupplier == '') {
        $.messager.alert('Peringatan', 'Data supplier belum diisi', 'warning');

        return false;
      }

      $.ajax({
        url: link_api.loadDataBarangBerdasarkanTipeCustomer,
        type: 'POST',
        dataType: 'JSON',
        data: {
          uuidsupplier: idsupplier,
          daftarmerk: idmerk,
          daftarkategori: kategori,
          kodebarangawal: kodebarangawal,
          kodebarangakhir: kodebarangakhir,
          uuidlokasi: idlokasi,
          berisikata: berisikata
        },
        beforeSend: function() {
          $('#table_detail_berdasarkan_tipecustomer').datagrid('loading');
        },
        success: function(data) {
          $('#table_detail_berdasarkan_tipecustomer').datagrid('loaded');
          $('#table_detail_berdasarkan_tipecustomer').datagrid('loadData', data);
        }
      })
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

    async function simpan_berdasarkan_satuan() {
      var idlokasi = $('#FILTER_SATUAN_IDLOKASI').combogrid('getValue');
      var tglaktif = $('#SATUAN_TGLAKTIF').datebox('getValue');
      var dataDetail = $('#table_detail_berdasarkan_satuan').datagrid('getRows');
      var detail = dataDetail.filter(function(item) {
        return item.edit !== undefined;
      });

      try {
        const payload = {
          uuidlokasi: idlokasi,
          tglaktif: tglaktif,
          detail: detail
        };

        tampilLoaderSimpan();
        const response = await fetchData(link_api.simpanHargaJualBerdasarkanSatuan, payload);
        tutupLoaderSimpan();
        if (response.success) {
          $.messager.alert('Info', 'Data Harga Jual Berhasil Disimpan', 'info');
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        tutupLoaderSimpan();
        $.messager.alert('Error', 'Terjadi kesalahan saat menyimpan data', 'error');
      }
    }

    async function simpan_berdasarkan_tipecustomer() {
      var idlokasi = $('#FILTER_TIPECUSTOMER_IDLOKASI').combogrid('getValue');
      var tglaktif = $('#TIPECUSTOMER_TGLAKTIF').datebox('getValue');
      var dataDetail = $('#table_detail_berdasarkan_tipecustomer').datagrid('getRows');
      let detail = dataDetail.map(parentItem => {
        if (typeof parentItem.detailharga === 'string') {
          parentItem.detailharga = JSON.parse(parentItem.detailharga);
        }
        if (parentItem.detailharga) {
          parentItem.detailharga = parentItem.detailharga.filter(childItem => childItem.edit !== undefined);
        }
        return parentItem;
      }).filter(parentItem => {
        return parentItem.detailharga && parentItem.detailharga.length > 0;
      });

      try {
        const payload = {
          uuidlokasi: idlokasi,
          tglaktif: tglaktif,
          detail: detail
        };
        tampilLoaderSimpan();
        const response = await fetchData(link_api.simpanHargaJualBerdasarkanTipeCustomer, payload);
        tutupLoaderSimpan();
        if (response.success) {
          $.messager.alert('Info', 'Data Harga Jual Berhasil Disimpan', 'info');
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        tutupLoaderSimpan();
        console.error("Terjadi kesalahan:", error);
        $.messager.alert('Error', 'Terjadi kesalahan saat menyimpan data', 'error');
      }
    }

    async function tampil_harga_jual_terakhir_customer() {
      var barang = $('#FILTER_CUSTOMER_BARANG').combogrid('grid').datagrid('getSelected');
      var idcustomer = $('#FILTER_CUSTOMER_CUSTOMER').combogrid('getValue');
      var idlokasi = $('#FILTER_CUSTOMER_IDLOKASI').combogrid('getValue');

      if (barang != null && idcustomer > 0 && idlokasi > 0) {
        const payload = {
          uuidbarang: barang.id,
          uuidlokasi: idlokasi,
          uuidcustomer: idcustomer
        };
        tampilLoaderSimpan();
        const response = await fetchData(link_api.loadHargaJualTerakhirCustomer, payload);
        tutupLoaderSimpan();
        $('#FILTER_CUSTOMER_SATUANBELITERAKHIR').textbox('setValue', response.data.satuanbeliterakhir);
        $('#FILTER_CUSTOMER_TGLBELITERAKHIR').datebox('setValue', response.data.tglbeliterakhir);
        $('#FILTER_CUSTOMER_HARGABELITERAKHIR').numberbox('setValue', response.data.hargabeliterakhir);

        $('#CUSTOMER_PERSENTASEMINSATUAN').numberbox('setValue', response.data.persentaseminsatuan);
        $('#CUSTOMER_HARGAJUALMINSATUAN').numberbox('setValue', response.data.hargajualminsatuan);
        $('#CUSTOMER_PERSENTASEMAXSATUAN').numberbox('setValue', response.data.persentasemaxsatuan);
        $('#CUSTOMER_HARGAJUALMAXSATUAN').numberbox('setValue', response.data.hargajualmaxsatuan);

        $('#CUSTOMER_PERSENTASEMINSATUAN2').numberbox('setValue', response.data.persentaseminsatuan2);
        $('#CUSTOMER_HARGAJUALMINSATUAN2').numberbox('setValue', response.data.hargajualminsatuan2);
        $('#CUSTOMER_PERSENTASEMAXSATUAN2').numberbox('setValue', response.data.persentasemaxsatuan2);
        $('#CUSTOMER_HARGAJUALMAXSATUAN2').numberbox('setValue', response.data.hargajualmaxsatuan2);

        $('#CUSTOMER_PERSENTASEMINSATUAN3').numberbox('setValue', response.data.persentaseminsatuan3);
        $('#CUSTOMER_HARGAJUALMINSATUAN3').numberbox('setValue', response.data.hargajualminsatuan3);
        $('#CUSTOMER_PERSENTASEMAXSATUAN3').numberbox('setValue', response.data.persentasemaxsatuan3);
        $('#CUSTOMER_HARGAJUALMAXSATUAN3').numberbox('setValue', response.data.hargajualmaxsatuan3);

        $('#CUSTOMER_HARGABELISATUAN').numberbox('setValue', response.data.hargabelisatuan);
        $('#CUSTOMER_HARGABELISATUAN2').numberbox('setValue', response.data.hargabelisatuan2);
        $('#CUSTOMER_HARGABELISATUAN3').numberbox('setValue', response.data.hargabelisatuan3);

        toggle_readonly_hargajual_customer();
      }
    }

    function tambah_harga_jual_customer(event) {
      event.preventDefault();

      var barang = $('#FILTER_CUSTOMER_BARANG').combogrid('grid').datagrid('getSelected');
      var customer = $('#FILTER_CUSTOMER_CUSTOMER').combogrid('grid').datagrid('getSelected');
      var idlokasi = $('#FILTER_CUSTOMER_IDLOKASI').combogrid('getValue');

      if (barang == null) {
        $.messager.alert('Peringatan', 'Data barang belum dipilih', 'warning');

        return false;
      }
      console.log('barang', barang);

      if (customer == null) {
        $.messager.alert('Peringatan', 'Data customer belum dipilih', 'warning');

        return false;
      }

      if (idlokasi == '' || idlokasi == 0 || idlokasi == null) {
        $.messager.alert('Peringatan', 'Data lokasi belum dipilih', 'warning');

        return false;
      }

      var rows = $('#table_detail_berdasarkan_customer').datagrid('getRows');
      console.log('rows', rows);

      var index_barang = -1;

      for (var i = 0; i < rows.length; i++) {
        if (rows[i].uuidbarang == barang.uuidbarang) {
          index_barang = i;

          break;
        }
      }
      console.log('index_barang', index_barang);

      if (index_barang < 0) {
        console.log('barang belum ada');
        $('#table_detail_berdasarkan_customer').datagrid('appendRow', {
          // idlokasi: idlokasi,
          uuidbarang: barang.uuidbarang,
          kodebarang: barang.kode,
          namabarang: barang.nama,
          partnumber: barang.partnumber,
          satuan: barang.satuanbesar,
          satuan2: barang.satuansedang,
          satuan3: barang.satuankecil,
          konversi1: barang.konversi,
          konversi2: barang.konversi,
          tglbeliterakhir: $('#FILTER_CUSTOMER_TGLBELITERAKHIR').datebox('getValue'),
          satuanbeliterakhir: $('#FILTER_CUSTOMER_SATUANBELITERAKHIR').textbox('getValue'),
          hargabeliterakhir: $('#FILTER_CUSTOMER_HARGABELITERAKHIR').numberbox('getValue'),
          hargabelisatuan: $('#CUSTOMER_HARGABELISATUAN').numberbox('getValue'),
          hargabelisatuan2: $('#CUSTOMER_HARGABELISATUAN2').numberbox('getValue'),
          hargabelisatuan3: $('#CUSTOMER_HARGABELISATUAN3').numberbox('getValue'),
          detailharga: JSON.stringify([])
        });

        tambah_harga_jual_customer(event);
      } else {
        console.log('barang sudah ada');
        var row_barang = rows[index_barang];
        var detailharga = JSON.parse(row_barang.detailharga);

        // memastikan customer belum ada atas barang yang dipilih
        var check = detailharga.filter(function(item) {
          return item.uuidcustomer == customer.uuidcustomer;
        })

        if (check.length > 0) {
          console.log('customer sudah ada');
          $.messager.alert('Peringatan', 'Sudah terdapat customer ' + customer.nama + ' untuk barang ' + row_barang
            .namabarang, 'warning');

          return false;
        }

        detailharga.push({
          uuidcustomer: customer.uuidcustomer,
          kodecustomer: customer.kode,
          namacustomer: customer.nama,
          idtipecustomer: 0,
          satuan: row_barang.satuan,
          hargabelisatuan: $('#CUSTOMER_HARGABELISATUAN').numberbox('getValue'),
          persentaseminsatuan: $('#CUSTOMER_PERSENTASEMINSATUAN').numberbox('getValue'),
          hargajualminsatuan: $('#CUSTOMER_HARGAJUALMINSATUAN').numberbox('getValue'),
          persentasemaxsatuan: $('#CUSTOMER_PERSENTASEMAXSATUAN').numberbox('getValue'),
          hargajualmaxsatuan: $('#CUSTOMER_HARGAJUALMAXSATUAN').numberbox('getValue'),
          satuan2: row_barang.satuan2,
          konversi1: row_barang.konversi1,
          hargabelisatuan2: $('#CUSTOMER_HARGABELISATUAN2').numberbox('getValue'),
          persentaseminsatuan2: $('#CUSTOMER_PERSENTASEMINSATUAN2').numberbox('getValue'),
          hargajualminsatuan2: $('#CUSTOMER_HARGAJUALMINSATUAN2').numberbox('getValue'),
          persentasemaxsatuan2: $('#CUSTOMER_PERSENTASEMAXSATUAN2').numberbox('getValue'),
          hargajualmaxsatuan2: $('#CUSTOMER_HARGAJUALMAXSATUAN2').numberbox('getValue'),
          satuan3: row_barang.satuan3,
          konversi2: row_barang.konversi2,
          hargabelisatuan3: $('#CUSTOMER_HARGABELISATUAN3').numberbox('getValue'),
          persentaseminsatuan3: $('#CUSTOMER_PERSENTASEMINSATUAN3').numberbox('getValue'),
          hargajualminsatuan3: $('#CUSTOMER_HARGAJUALMINSATUAN3').numberbox('getValue'),
          persentasemaxsatuan3: $('#CUSTOMER_PERSENTASEMAXSATUAN3').numberbox('getValue'),
          hargajualmaxsatuan3: $('#CUSTOMER_HARGAJUALMAXSATUAN3').numberbox('getValue'),
        });

        $('#table_detail_berdasarkan_customer').datagrid('updateRow', {
          index: index_barang,
          row: {
            detailharga: JSON.stringify(detailharga)
          }
        });
      }
    }

    async function simpan_berdasarkan_customer() {
      var idlokasi = $('#FILTER_CUSTOMER_IDLOKASI').combogrid('getValue');
      var tglaktif = $('#CUSTOMER_TGLAKTIF').datebox('getValue');
      var detail = $('#table_detail_berdasarkan_customer').datagrid('getRows');
      for (var i = 0; i < detail.length; i++) {
        if (typeof detail[i].detailharga === 'string') {
          detail[i].detailharga = JSON.parse(detail[i].detailharga);
        }
      }

      try {
        tampilLoaderSimpan();
        const payload = {
          uuidlokasi: idlokasi,
          tglaktif: tglaktif,
          detail: detail
        };
        console.log(payload);
        const response = await fetchData(link_api.simpanHargaJualBerdasarkanCustomer, payload);
        tutupLoaderSimpan();
        if (response.success) {
          $.messager.alert('Info', 'Data Harga Jual Berhasil Disimpan', 'info');
        } else {
          $.messager.alert('Error', response.message, 'error');
        }
      } catch (error) {
        tutupLoaderSimpan();
        console.log(error);
        $.messager.alert('Error', 'Terdapat Kesalahan Ketika Menyimpan Data', 'error');
      }
    }

    function tampil_dialog_history_berdasarkan_satuan(row) {
      $('#dialog_history_berdasarkan_satuan').window({
        closed: false
      })

      $.ajax({
        url: link_api.loadHistoryHargaJualBerdasarkanSatuan,
        data: {
          uuidbarang: row.uuidbarang
        },
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function() {
          $('#table_history_berdasarkan_satuan').datagrid('loading');
        },
        success: function(data) {
          $('#table_history_berdasarkan_satuan').datagrid('loaded');
          $('#table_history_berdasarkan_satuan').datagrid('loadData', data);
        }
      })
    }

    function tampil_dialog_history_berdasarkan_tipecustomer(idbarang, row) {
      $('#dialog_history_berdasarkan_tipecustomer').window({
        closed: false
      })

      $.ajax({
        url: link_api.loadHistoryHargaJualBerdasarkanTipeCustomer,
        data: {
          uuidbarang: idbarang,
          uuidtipecustomer: row.uuidtipecustomer
        },
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function() {
          $('#table_history_berdasarkan_tipecustomer').datagrid('loading');
        },
        success: function(data) {
          $('#table_history_berdasarkan_tipecustomer').datagrid('loaded');
          $('#table_history_berdasarkan_tipecustomer').datagrid('loadData', data);
        }
      })
    }

    function tampil_dialog_history_berdasarkan_customer(idbarang, row) {
      $('#dialog_history_berdasarkan_customer').window({
        closed: false
      })

      $.ajax({
        url: link_api.loadHistoryHargaJualBerdasarkanCustomer,
        data: {
          uuidbarang: idbarang,
          uuidcustomer: row.uuidcustomer
        },
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function() {
          $('#table_history_berdasarkan_customer').datagrid('loading');
        },
        success: function(data) {
          $('#table_history_berdasarkan_customer').datagrid('loaded');
          $('#table_history_berdasarkan_customer').datagrid('loadData', data);
        }
      })
    }

    function hapus_harga_berdasarkan_satuan() {
      var selected = $('#table_history_berdasarkan_satuan').datagrid('getSelected');
      var index = $('#table_history_berdasarkan_satuan').datagrid('getRowIndex');

      if (selected) {
        $.messager.confirm('Konfirmasi', 'Apakah anda yakin akan menghapus harga jual yang dipilih?', async function(
          confirm) {
          if (confirm) {
            const response = await fetchData(link_api.hapusHargaJual, {
              uuidhargajual: selected.uuidhargajual
            });
            if (response.success) {
              $.messager.show({
                title: 'Info',
                msg: 'Data Harga Jual Berhasil Dihapus',
                showType: 'show'
              });

              $('#table_history_berdasarkan_satuan').datagrid('deleteRow', index);
            } else {
              $.messager.alert('Error', response.message, 'error');
            }
          }
        });
      } else {
        $.messager.alert('Peringatan', 'Anda belum memilih data untuk dihapus', 'error');
      }
    }

    function hapus_harga_berdasarkan_tipecustomer() {
      var selected = $('#table_history_berdasarkan_tipecustomer').datagrid('getSelected');
      var index = $('#table_history_berdasarkan_tipecustomer').datagrid('getRowIndex');

      if (selected) {
        $.messager.confirm('Konfirmasi', 'Apakah anda yakin akan menghapus harga jual yang dipilih?', async function(
          confirm) {
          if (confirm) {
            const response = await fetchData(link_api.hapusHargaJual, {
              uuidhargajual: selected.uuidhargajual
            });
            if (response.success) {
              $.messager.show({
                title: 'Info',
                msg: 'Data Harga Jual Berhasil Dihapus',
                showType: 'show'
              });

              $('#table_history_berdasarkan_tipecustomer').datagrid('deleteRow', index);
            } else {
              $.messager.alert('Error', response.message, 'error');
            }
          }
        });
      } else {
        $.messager.alert('Peringatan', 'Anda belum memilih data untuk dihapus', 'error');
      }
    }

    function hapus_harga_berdasarkan_customer() {
      var selected = $('#table_history_berdasarkan_customer').datagrid('getSelected');
      var index = $('#table_history_berdasarkan_customer').datagrid('getRowIndex');

      if (selected) {
        $.messager.confirm('Konfirmasi', 'Apakah anda yakin akan menghapus harga jual yang dipilih?', async function(
          confirm) {
          if (confirm) {
            const response = await fetchData(link_api.hapusHargaJual, {
              uuidhargajual: selected.uuidhargajual
            })
            if (response.success) {
              $.messager.show({
                title: 'Info',
                msg: 'Data Harga Jual Berhasil Dihapus',
                showType: 'show'
              });

              $('#table_history_berdasarkan_customer').datagrid('deleteRow', index);
            } else {
              $.messager.alert('Error', response.message, 'error');
            }
          }
        });
      } else {
        $.messager.alert('Peringatan', 'Anda belum memilih data untuk dihapus', 'error');
      }
    }

    function tampil_copy_harga_jual_satuan(event) {
      event.preventDefault();

      $('#dialog_copy_harga_jual_satuan').window({
        closed: false
      })
    }

    function copy_harga_jual_satuan(event) {
      event.preventDefault();

      var idlokasiasal = $('#COPY_SATUAN_IDLOKASIASAL').combogrid('getValue');
      var tglaktif = $('#COPY_SATUAN_TGLAKTIF').datebox('getValue');
      var idlokasicopy = $('#COPY_SATUAN_IDLOKASICOPY').combogrid('getValue');

      if (idlokasiasal == '') {
        $.messager.alert('Peringatan', 'Lokasi Asal Harga Belum Diisi', 'warning');

        return false;
      }

      if (tglaktif == '') {
        $.messager.alert('Peringatan', 'Tgl. Aktif Yang Digunakan Belum Diisi');

        return false;
      }

      if (idlokasicopy == '') {
        $.messager.alert('Peringatan', 'Lokasi Copy Harga Belum Diisi', 'warning');

        return false;
      }

      var lokasiasal = $('#COPY_SATUAN_IDLOKASIASAL').combogrid('grid').datagrid('getSelected');
      var lokasicopy = $('#COPY_SATUAN_IDLOKASICOPY').combogrid('grid').datagrid('getSelected');

      $.messager.confirm('Konfirmasi',
        `Apakah anda yakin akan melakukan copy harga jual dari ${lokasiasal.nama} ke ${lokasicopy.nama}`,
        async function(confirm) {
          if (!confirm) {
            return false;
          }
          const response = await fetchData(link_api.copyHargaBerdasarkanSatuan, {
            uuidlokasiasal: idlokasiasal,
            tglaktif: tglaktif,
            uuidlokasicopy: idlokasicopy
          });

          if (response.success) {
            $.messager.alert('Berhasil', 'Berhasil melakukan copy harga jual', 'info');

            $('#dialog_copy_harga_jual_satuan').window({
              closed: true
            })
          } else {
            $.messager.alert('Error', response.message, 'error');
          }
        });
    }

    function tampil_copy_harga_jual_tipecustomer(event) {
      event.preventDefault();

      $('#dialog_copy_harga_jual_tipecustomer').window({
        closed: false
      })
    }

    function copy_harga_jual_tipecustomer(event) {
      event.preventDefault();

      var idlokasiasal = $('#COPY_TIPECUSTOMER_IDLOKASIASAL').combogrid('getValue');
      var tglaktif = $('#COPY_TIPECUSTOMER_TGLAKTIF').datebox('getValue');
      var idlokasicopy = $('#COPY_TIPECUSTOMER_IDLOKASICOPY').combogrid('getValue');

      if (idlokasiasal == '') {
        $.messager.alert('Peringatan', 'Lokasi Asal Harga Belum Diisi', 'warning');

        return false;
      }

      if (tglaktif == '') {
        $.messager.alert('Peringatan', 'Tgl. Aktif Yang Digunakan Belum Diisi');

        return false;
      }

      if (idlokasicopy == '') {
        $.messager.alert('Peringatan', 'Lokasi Copy Harga Belum Diisi', 'warning');

        return false;
      }

      var lokasiasal = $('#COPY_TIPECUSTOMER_IDLOKASIASAL').combogrid('grid').datagrid('getSelected');
      var lokasicopy = $('#COPY_TIPECUSTOMER_IDLOKASICOPY').combogrid('grid').datagrid('getSelected');

      $.messager.confirm('Konfirmasi',
        `Apakah anda yakin akan melakukan copy harga jual dari ${lokasiasal.nama} ke ${lokasicopy.nama}`,
        async function(confirm) {
          if (!confirm) {
            return false;
          }

          const response = await fetchData(link_api.copyHargaBerdasarkanTipeCustomer, {
            uuidlokasiasal: idlokasiasal,
            tglaktif: tglaktif,
            uuidlokasicopy: idlokasicopy
          })

          if (response.success) {
            $.messager.alert('Berhasil', 'Berhasil melakukan copy harga jual', 'info');

            $('#dialog_copy_harga_jual_tipecustomer').window({
              closed: true
            })
          } else {
            $.messager.alert('Error', response.message, 'error');
          }

        });
    }

    function tampil_copy_harga_jual_customer(event) {
      event.preventDefault();

      $('#dialog_copy_harga_jual_customer').window({
        closed: false
      })
    }

    function copy_harga_jual_customer(event) {
      event.preventDefault();

      var idlokasiasal = $('#COPY_CUSTOMER_IDLOKASIASAL').combogrid('getValue');
      var tglaktif = $('#COPY_CUSTOMER_TGLAKTIF').datebox('getValue');
      var idlokasicopy = $('#COPY_CUSTOMER_IDLOKASICOPY').combogrid('getValue');

      if (idlokasiasal == '') {
        $.messager.alert('Peringatan', 'Lokasi Asal Harga Belum Diisi', 'warning');

        return false;
      }

      if (tglaktif == '') {
        $.messager.alert('Peringatan', 'Tgl. Aktif Yang Digunakan Belum Diisi');

        return false;
      }

      if (idlokasicopy == '') {
        $.messager.alert('Peringatan', 'Lokasi Copy Harga Belum Diisi', 'warning');

        return false;
      }

      var lokasiasal = $('#COPY_CUSTOMER_IDLOKASIASAL').combogrid('grid').datagrid('getSelected');
      var lokasicopy = $('#COPY_CUSTOMER_IDLOKASICOPY').combogrid('grid').datagrid('getSelected');

      $.messager.confirm('Konfirmasi',
        `Apakah anda yakin akan melakukan copy harga jual dari ${lokasiasal.nama} ke ${lokasicopy.nama}`,
        async function(confirm) {
          if (!confirm) {
            return false;
          }

          const response = await fetchData(link_api.copyHargaBerdasarkanCustomer, {
            uuidlokasiasal: idlokasiasal,
            tglaktif: tglaktif,
            uuidlokasicopy: idlokasicopy
          });
          if (response.success) {
            $.messager.alert('Berhasil', 'Berhasil melakukan copy harga jual', 'info');

            $('#dialog_copy_harga_jual_customer').window({
              closed: true
            })
          } else {
            $.messager.alert('Error', response.message, 'error');
          }
        });
    }

    function browse_data_tglaktif_satuan(id) {
      $(id).combogrid({
        url: link_api.browseTglAktifSatuan,
        panelWidth: 130,
        idField: 'tglaktif',
        textField: 'tglaktif',
        onBeforeLoad: function(param) {
          loaderfitur.tglaktif = false;
        },
        onLoadSuccess: function(data) {
          loaderfitur.tglaktif = true;
          closeLoader();
        },
        columns: [
          [{
            field: 'tglaktif',
            title: 'Tgl. Aktif',
            width: 100
          }]
        ]
      });
    }

    function browse_data_tglaktif_tipecustomer(id) {
      $(id).combogrid({
        url: link_api.browseTglAktifTipeCustomer,
        panelWidth: 130,
        idField: 'tglaktif',
        textField: 'tglaktif',
        columns: [
          [{
            field: 'tglaktif',
            title: 'Tgl. Aktif',
            width: 100
          }]
        ]
      });
    }

    function browse_data_tglaktif_customer(id) {
      $(id).combogrid({
        url: link_api.browseTglAktifCustomer,
        panelWidth: 130,
        idField: 'tglaktif',
        textField: 'tglaktif',
        columns: [
          [{
            field: 'tglaktif',
            title: 'Tgl. Aktif',
            width: 100
          }]
        ]
      });
    }

    function hapus_hargajual_satuan() {
      var tglaktif = $('#TGLAKTIF_SATUAN_HAPUS_HARGAJUAL').combogrid('getValue');

      if (tglaktif == '') {
        $.messager.alert('Peringatan', 'Tgl Aktif belum dipilih', 'warning');

        return false;
      }

      $.messager.confirm('Konfirmasi',
        'Apakah anda yakin untuk menghapus harga jual? Anda akan menghapus harga jual semua barang per satuan dengan tanggal aktif ' +
        tglaktif,
        async function(confirm) {
          if (confirm) {
            const response = await fetchData(link_api.hapusHargaJualSatuan, {
              tglaktif: tglaktif
            });

            if (response.success) {
              $.messager.alert('Info', 'Data Harga Jual Berhasil Dihapus', 'info');

              $('#TGLAKTIF_SATUAN_HAPUS_HARGAJUAL').combogrid('clear');
              $('#TGLAKTIF_SATUAN_HAPUS_HARGAJUAL').combogrid('grid').datagrid('load');
            } else {
              $.messager.alert('Error', response.message, 'error');
            }

          }
        });
    }

    function hapus_hargajual_tipecustomer() {
      var tglaktif = $('#TGLAKTIF_TIPECUSTOMER_HAPUS_HARGAJUAL').combogrid('getValue');

      if (tglaktif == '') {
        $.messager.alert('Peringatan', 'Tgl Aktif belum dipilih', 'warning');

        return false;
      }

      $.messager.confirm('Konfirmasi',
        'Apakah anda yakin untuk menghapus harga jual? Anda akan menghapus harga jual semua barang dari semua tipe customer dengan tanggal aktif ' +
        tglaktif,
        async function(confirm) {
          if (confirm) {
            const response = await fetchData(link_api.hapusHargaJualTipeCustomer, {
              tglaktif: tglaktif
            });
            if (response.success) {
              $.messager.alert('Info', 'Data Harga Jual Berhasil Dihapus', 'info');

              $('#TGLAKTIF_TIPECUSTOMER_HAPUS_HARGAJUAL').combogrid('clear');
              $('#TGLAKTIF_TIPECUSTOMER_HAPUS_HARGAJUAL').combogrid('grid').datagrid('load');
            } else {
              $.messager.alert('Error', response.message, 'error');
            }
          }
        });
    }

    function hapus_hargajual_customer() {
      var tglaktif = $('#TGLAKTIF_CUSTOMER_HAPUS_HARGAJUAL').combogrid('getValue');

      if (tglaktif == '') {
        $.messager.alert('Peringatan', 'Tgl Aktif belum dipilih', 'warning');

        return false;
      }

      $.messager.confirm('Konfirmasi',
        'Apakah anda yakin untuk menghapus harga jual? Anda akan menghapus harga jual semua barang dari semua customer dengan tanggal aktif ' +
        tglaktif,
        async function(confirm) {
          if (confirm) {
            const response = await fetchData(link_api.hapusHargaJualCustomer, {
              tglaktif: tglaktif
            });

            if (response.success) {
              $.messager.alert('Info', 'Data Harga Jual Berhasil Dihapus', 'info');

              $('#TGLAKTIF_CUSTOMER_HAPUS_HARGAJUAL').combogrid('clear');
              $('#TGLAKTIF_CUSTOMER_HAPUS_HARGAJUAL').combogrid('grid').datagrid('load');
            } else {
              $.messager.alert('Error', response.message, 'error');
            }
          }
        });
    }
  </script>
@endpush
