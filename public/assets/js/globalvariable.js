// var base_url_api = "http://192.168.1.45:8000/api/";
var base_url_api = "https://api.atena.id/api/";
var link_api = {
    //login
    login: `${base_url_api}auth/login`,
    loginPerusahaan: `${base_url_api}auth/login-perusahaan`,
    getDaftarMenu: `${base_url_api}atena/master/user/get-daftar-menu`,
    getDetailPerusahaan: `${base_url_api}auth/get-perusahaan`,
    getConfigGlobal: `${base_url_api}atena/master/config/get-config-global`,
    getConfig: `${base_url_api}atena/master/config/get-config`,
    getDataAkses: `${base_url_api}atena/master/user/get-user-akses`,
    //perkiraan
    hapusPerkiraan: `${base_url_api}atena/master/perkiraan/hapus`,
    loadDataGridMasterPerkiraan: `${base_url_api}atena/master/perkiraan/load-data-grid`,
    treeMasterPerkiraan: `${base_url_api}atena/master/perkiraan/tree`,
    headerFormPerkiraan: `${base_url_api}atena/master/perkiraan/load-data-header`,
    browseHeaderPerkiraan: `${base_url_api}atena/master/perkiraan/browse-header`,
    simpanPerkiraan: `${base_url_api}atena/master/perkiraan/simpan`,
    getPerkiraanUser: `${base_url_api}atena/master/perkiraan/load-perkiraan-user`,
    getPerkiraanLokasi: `${base_url_api}`, //API belum dibuat
    browsePerkiraan: `${base_url_api}atena/master/perkiraan/browse`,
    //currency
    browseCurrency: `${base_url_api}atena/master/currency/browse`,
    loadDataGridCurrency: `${base_url_api}atena/master/currency/load-data-grid`,
    hapusCurrency: `${base_url_api}atena/master/currency/hapus`,
    loadHeaderCurrency: `${base_url_api}atena/master/currency/load-data-header`,
    simpanCurrency: `${base_url_api}atena/master/currency/simpan`,
    getRateCurrency: `${base_url_api}atena/master/currency/get-rate`,
    //user
    userGetAll: `${base_url_api}atena/master/user/load-all`,
    loadDataGridMasterUser: `${base_url_api}atena/master/user/load-data-grid`,
    simpanUser: `${base_url_api}atena/master/user/simpan`,
    treeGridUser: `${base_url_api}atena/master/user/load-tree-grid`,
    treeGridPosUser: `${base_url_api}atena/master/user/load-tree-grid-pos`,
    treeGridPosDesktopUser: `${base_url_api}atena/master/user/load-tree-grid-pos-desktop`,
    browseUser: `${base_url_api}atena/master/user/browse`,
    userGetDataPerkiraan: `${base_url_api}atena/master/user/load-data-perkiraan`,
    getJamAksesUser: `${base_url_api}atena/master/user/load-data-jam-akses`,
    getDahboardAksesUser: `${base_url_api}atena/master/user/load-data-akses-dashboard`,
    headerFormUser: `${base_url_api}atena/master/user/load-data-header`,
    hapusUser: `${base_url_api}atena/master/user/hapus`,
    //lokasi
    getLokasiAll: `${base_url_api}atena/master/lokasi/load-all`,
    getLokasiPerUser: `${base_url_api}atena/master/lokasi/load-lokasi-per-user`,
    getLokasiTransferPerUser: `${base_url_api}atena/master/lokasi/load-lokasi-transfer-per-user`,
    loadDataGridLokasi: `${base_url_api}atena/master/lokasi/load-data-grid`,
    hapusLokasi: `${base_url_api}atena/master/lokasi/hapus`,
    getHeaderLokasi: `${base_url_api}atena/master/lokasi/load-lokasi-header`,
    checkLokasiDefault: `${base_url_api}atena/master/lokasi/cek-lokasi-default`,
    getLokasiDefault: `${base_url_api}atena/master/lokasi/get-lokasi-default`,
    simpanLokasi: `${base_url_api}atena/master/lokasi/simpan`,
    browseLokasi: `${base_url_api}atena/master/lokasi/browse`,
    browseLokasiTransfer: `${base_url_api}atena/master/lokasi/browse-transfer`,
    //Merk
    hapusMerk: `${base_url_api}atena/master/merk/hapus`,
    loadDataGridMerk: `${base_url_api}atena/master/merk/load-data-grid`,
    simpanMerk: `${base_url_api}atena/master/merk/simpan`,
    getHeaderMerk: `${base_url_api}atena/master/merk/load-data-header`,
    //supplier
    loadDataGridMasterSupplier: `${base_url_api}atena/master/supplier/load-data-grid`,
    hapusSupplier: `${base_url_api}atena/master/supplier/hapus`,
    browseBadanUsaha: `${base_url_api}atena/master/supplier/browse-badan-usaha`,
    getHutangBelumLunas: `${base_url_api}atena/master/supplier/load-data-hutang-belum-lunas`,
    simpanSupplier: `${base_url_api}atena/master/supplier/simpan`,
    headerFormSupplier: `${base_url_api}atena/master/supplier/load-data-header`,
    //customer
    loadDataGridMasterCustomer: `${base_url_api}atena/master/customer/load-data-grid`,
    browseBadanUsahaCustomer: `${base_url_api}atena/master/customer/browse-badan-usaha`,
    browseKaryawanMarketing: `${base_url_api}atena/master/karyawan/browse-marketing`,
    getAksesFitur: `${base_url_api}atena/master/user/get-akses-fitur`,
    browseCustomerInduk: `${base_url_api}atena/master/customer/browse-induk`,
    simpanUbahStatusPiutang: `${base_url_api}atena/master/customer/simpan-ubah-status-piutang`,
    loadDataUbahStatusPiutang: `${base_url_api}atena/master/customer/load-data-ubah-status-piutang`,
    batalUbahStatusPiutang: `${base_url_api}atena/master/customer/batal-ubah-status-piutang`,
    simpanCustomer: `${base_url_api}atena/master/customer/simpan`,
    loadDataPiutangBelumLunas: `${base_url_api}atena/master/customer/load-data-piutang-belum-lunas`,
    headerFormCustomer: `${base_url_api}atena/master/customer/load-data-header`,
    hapusCustomer: `${base_url_api}atena/master/customer/hapus`,
    browseCustomer: `${base_url_api}atena/master/customer/browse`,
    //ekspedisi
    loadDataGridMasterEkspedisi: `${base_url_api}atena/master/ekspedisi/load-data-grid`,
    browseBadanUsahaEkspedisi: `${base_url_api}atena/master/ekspedisi/browse-badan-usaha`,
    headerFormEkspedisi: `${base_url_api}atena/master/ekspedisi/load-data-header`,
    simpanEkspedisi: `${base_url_api}atena/master/ekspedisi/simpan`,
    hapusEkspedisi: `${base_url_api}atena/master/ekspedisi/hapus`,
    browseEkspedisi: `${base_url_api}atena/master/ekspedisi/browse`,
    //tipe customer
    browseTipeCustomer: `${base_url_api}atena/master/tipecustomer/browse`,
    simpanTipeCustomer: `${base_url_api}atena/master/tipecustomer/simpan`,
    getHeaderTipeCustomer: `${base_url_api}atena/master/tipecustomer/load-data-header`,
    loadDataGridTipeCustomer: `${base_url_api}atena/master/tipecustomer/load-data-grid`,
    hapusTipeCustomer: `${base_url_api}atena/master/tipecustomer/hapus`,
    //harga jual
    browseBarang: `${base_url_api}atena/master/barang/browse`,
    browseBarangAll: `${base_url_api}atena/master/barang/browse-all`,
    loadHargaJualTerakhirPerSatuan: `${base_url_api}atena/master/hargajual/load-harga-jual-terakhir-per-satuan`,
    browseSupplier: `${base_url_api}atena/master/supplier/browse`,
    browseFilterMerk: `${base_url_api}atena/master/hargajual/browse-daftar-filter-merk`,
    browseFilterKategori: `${base_url_api}atena/master/hargajual/browse-daftar-filter-kategori`,
    browseTglAktifSatuan: `${base_url_api}atena/master/hargajual/browse-tgl-aktif-satuan`,
    browseTglAktifTipeCustomer: `${base_url_api}atena/master/hargajual/browse-tgl-aktif-tipe-customer`,
    browseTglAktifCustomer: `${base_url_api}atena/master/hargajual/browse-tgl-aktif-customer`,
    loadDataBarangBerdasarkanSatuan: `${base_url_api}atena/master/hargajual/load-data-barang-bedasarkan-satuan`,
    loadDataBarangBerdasarkanTipeCustomer: `${base_url_api}atena/master/hargajual/load-data-barang-bedasarkan-tipe-customer`,
    simpanHargaJualBerdasarkanSatuan: `${base_url_api}atena/master/hargajual/simpan-bedasarkan-satuan`,
    simpanHargaJualBerdasarkanCustomer: `${base_url_api}atena/master/hargajual/simpan-bedasarkan-customer`,
    simpanHargaJualBerdasarkanTipeCustomer: `${base_url_api}atena/master/hargajual/simpan-bedasarkan-tipe-customer`,
    loadHargaJualTerakhirCustomer: `${base_url_api}atena/master/hargajual/load-harga-jual-terakhir-customer`,
    loadHistoryHargaJualBerdasarkanSatuan: `${base_url_api}atena/master/hargajual/load-history-bedasarkan-satuan`,
    loadHistoryHargaJualBerdasarkanCustomer: `${base_url_api}atena/master/hargajual/load-history-bedasarkan-customer`,
    loadHistoryHargaJualBerdasarkanTipeCustomer: `${base_url_api}atena/master/hargajual/load-history-bedasarkan-tipe-customer`,
    copyHargaBerdasarkanSatuan: `${base_url_api}atena/master/hargajual/copy-harga-bedasarkan-satuan`,
    copyHargaBerdasarkanCustomer: `${base_url_api}atena/master/hargajual/copy-harga-bedasarkan-customer`,
    copyHargaBerdasarkanTipeCustomer: `${base_url_api}atena/master/hargajual/copy-harga-bedasarkan-tipe-customer`,
    hapusHargaJual: `${base_url_api}atena/master/hargajual/hapus`,
    hapusHargaJualSatuan: `${base_url_api}atena/master/hargajual/hapus-harga-jual-satuan`,
    hapusHargaJualCustomer: `${base_url_api}atena/master/hargajual/hapus-harga-jual-customer`,
    hapusHargaJualTipeCustomer: `${base_url_api}atena/master/hargajual/hapus-harga-jual-tipe-customer`,
    //Syarat Bayar
    hapusSyaratBayar: `${base_url_api}atena/master/syaratbayar/hapus`,
    loadDataGridSyaratBayar: `${base_url_api}atena/master/syaratbayar/load-data-grid`,
    getHeaderSyaratBayar: `${base_url_api}atena/master/syaratbayar/load-data-header`,
    simpanSyaratBayar: `${base_url_api}atena/master/syaratbayar/simpan`,
    //Departemen Kerja
    loadDataGridDepartemenKerja: `${base_url_api}atena/master/departemenkerja/load-data-grid`,
    hapusDepartemenKerja: `${base_url_api}atena/master/departemenkerja/hapus`,
    getHeaderDepartemenKerja: `${base_url_api}atena/master/departemenkerja/load-data-header`,
    simpanDepartemenKerja: `${base_url_api}atena/master/departemenkerja/simpan`,
    browseDataDepartemenKerja: `${base_url_api}atena/master/departemenkerja/browse`,
    browseSyaratBayar: `${base_url_api}atena/master/syaratbayar/browse`,
    //Karyawan
    hapusKaryawan: `${base_url_api}atena/master/karyawan/hapus`,
    loadDataGridKaryawan: `${base_url_api}atena/master/karyawan/load-data-grid`,
    simpanKaryawan: `${base_url_api}atena/master/karyawan/simpan`,
    getHeaderKaryawan: `${base_url_api}atena/master/karyawan/load-data-header`,
    browseKaryawan: `${base_url_api}atena/master/karyawan/browse`,
    //sopir
    hapusSopir: `${base_url_api}atena/master/sopir/hapus`,
    simpanSopir: `${base_url_api}atena/master/sopir/simpan`,
    getHeaderSopir: `${base_url_api}atena/master/sopir/load-data-header`,
    loadDataGridSopir: `${base_url_api}atena/master/sopir/load-data-grid`,
    //kendaraan
    simpanKendaraan: `${base_url_api}atena/master/kendaraan/simpan`,
    getHeaderKendaraan: `${base_url_api}atena/master/kendaraan/load-data-header`,
    loadDataGridKendaraan: `${base_url_api}atena/master/kendaraan/load-data-grid`,
    hapusKendaraan: `${base_url_api}atena/master/kendaraan/hapus`,
    browseKendaraan: `${base_url_api}atena/master/kendaraan/browse`,
    //jenis pemakaian
    simpanJenisPemakaian: `${base_url_api}atena/master/jenispemakaian/simpan`,
    getHeaderJenisPemakaian: `${base_url_api}atena/master/jenispemakaian/load-data-header`,
    loadDataGridJenisPemakaian: `${base_url_api}atena/master/jenispemakaian/load-data-grid`,
    hapusJenisPemakaian: `${base_url_api}atena/master/jenispemakaian/hapus`,
    browseJenisPemakaian: `${base_url_api}atena/master/jenispemakaian/browse`,
    //Harga Jual Berdasarkan Jumlah
    loadHargaAktifTerakhir: `${base_url_api}atena/master/hargajualberdasarkanjumlah/load-harga-aktif-terakhir`,
    browseTglAktif: `${base_url_api}atena/master/hargajualberdasarkanjumlah/browse-tgl-aktif`,
    browseTglAktfiGlobal: `${base_url_api}atena/master/hargajualberdasarkanjumlah/browse-tgl-aktif-global`,
    loadHargaByTanggalAktif: `${base_url_api}atena/master/hargajualberdasarkanjumlah/load-harga-by-tanggal-aktif`,
    loadDataBarang: `${base_url_api}atena/master/hargajualberdasarkanjumlah/load-data-barang`,
    hapusHargaJualBerdasarkanJumlah: `${base_url_api}atena/master/hargajualberdasarkanjumlah/hapus`,
    hapusHargaJualBerdasarkanJumlahPerTglAktif: `${base_url_api}atena/master/hargajualberdasarkanjumlah/hapus-per-tanggal-aktif`,
    simpanHargaJualBerdasarkanJumlah: `${base_url_api}atena/master/hargajualberdasarkanjumlah/simpan`,
    //Master alat bayar non tunai
    getHeaderNonTunai: `${base_url_api}atena/master/alat-bayar-non-tunai/load-data-header`,
    loadConfigNonTunai: `${base_url_api}atena/master/alat-bayar-non-tunai/load-config`,
    hapusNonTunai: `${base_url_api}atena/master/alat-bayar-non-tunai/hapus`,
    loadDataGridNonTunai: `${base_url_api}atena/master/alat-bayar-non-tunai/load-data-grid`,
    simpanNonTunai: `${base_url_api}atena/master/alat-bayar-non-tunai/simpan`,
    loadLokasiNonTunai: `${base_url_api}atena/master/alat-bayar-non-tunai/load-data-lokasi`,
    //alat bayar
    simpanAlatBayar: `${base_url_api}atena/master/alatbayar/simpan`,
    setUrutanAlatBayar: `${base_url_api}atena/master/alatbayar/set-urutan`,
    getHeaderAlatBayar: `${base_url_api}atena/master/alatbayar/load-data-header`,
    loadDataGridAlatBayar: `${base_url_api}atena/master/alatbayar/load-data-grid`,
    hapusAlatBayar: `${base_url_api}atena/master/alatbayar/hapus`,
    //satuan
    simpanSatuan: `${base_url_api}atena/master/satuan/simpan`,
    getHeaderSatuan: `${base_url_api}atena/master/satuan/load-data-header`,
    loadDataGridSatuan: `${base_url_api}atena/master/satuan/load-data-grid`,
    hapusSatuan: `${base_url_api}atena/master/satuan/hapus`,
    //harga beli
    loadHargaBeliSupplierBarang: `${base_url_api}atena/master/harga-beli/load-supplier-barang`,
    loadHargaBeli: `${base_url_api}atena/master/harga-beli/load-harga-beli`,
    hapusHargaBeli: `${base_url_api}atena/master/harga-beli/hapus-harga-beli`,
    updateHargaBeli: `${base_url_api}atena/master/harga-beli/update-harga-beli`,
    //PPN
    simpanPPN: `${base_url_api}atena/master/ppn/simpan`,
    getHeaderPPN: `${base_url_api}atena/master/ppn/load-data-header`,
    loadDataGridPPN: `${base_url_api}atena/master/ppn/load-data-grid`,
    hapusPPN: `${base_url_api}atena/master/ppn/hapus`,
    getPPNAktif: `${base_url_api}atena/master/ppn/get-ppn-aktif`,
    //Barang
    loadDataGridBarang: `${base_url_api}atena/master/barang/load-data-grid`,
    simpanBarang: `${base_url_api}atena/master/barang/simpan`,
    hapusBarang: `${base_url_api}atena/master/barang/hapus`,
    browseBarangKategori: `${base_url_api}atena/master/barang/browse-barang-kategori`,
    browseMerk: `${base_url_api}atena/master/merk/browse`,
    loadLastPerkiraan: `${base_url_api}atena/master/barang/load-last-perkiraan`,
    cekTransaksiBarang: `${base_url_api}atena/master/barang/cek-transaksi-barang`,
    loadBarangSet: `${base_url_api}atena/master/barang/load-data-barang-set`,
    loadDataSupplier: `${base_url_api}atena/master/barang/load-data-supplier`,
    loadDataLokasi: `${base_url_api}atena/master/barang/load-data-lokasi`,
    loadDaftarKategori: `${base_url_api}atena/master/barang/load-daftar-kategori`,
    loadHargaJualTerakhirBerdasarkanSatuan: `${base_url_api}atena/master/barang/load-harga-jual-terakhir-bedasarkan-satuan`,
    loadHargaJual: `${base_url_api}atena/master/barang/load-harga-jual`,
    simpanHargaJual: `${base_url_api}atena/master/barang/simpan-harga-jual`,
    headerFormBarang: `${base_url_api}atena/master/barang/load-data-header`,
    getStokBarangSatuan: `${base_url_api}atena/master/barang/get-stok-barang-satuan`,
    loadDataBarangBarcode: `${base_url_api}atena/master/barang/load-data-barang-barcode`,
    loadSatuanBarang: `${base_url_api}atena/master/barang/load-satuan-barang`,
    getStokBarang: `${base_url_api}atena/master/barang/get-stok`,
    hitungStokTransaksiBarang: `${base_url_api}atena/master/barang/hitung-stok-transaksi`,
    hargaBeliTerakhir: `${base_url_api}atena/master/barang/harga-beli-terakhir`,
    getHargaBarang: `${base_url_api}atena/master/barang/get-harga-barang`,
    browseBarangJualAll: `${base_url_api}atena/master/barang/browse-jual-all`,
    hargaJualTerakhir: `${base_url_api}atena/master/barang/harga-jual-terakhir`,
    cekCollie: `${base_url_api}atena/master/barang/cek-collie`,
    getDaftarBarangDiskon: `${base_url_api}atena/master/barang/load-daftar-diskon`,
    browseBarangNonStok: `${base_url_api}atena/master/barang/browse-non-stok`,
    //Promo
    loadDataGridPromo: `${base_url_api}atena/master/promo/load-data-grid`,
    simpanPromo: `${base_url_api}atena/master/promo/simpan`,
    hapusPromo: `${base_url_api}atena/master/promo/hapus`,
    browseBarangPromo: `${base_url_api}atena/master/promo/browse-barang`,
    loadDataPromo: `${base_url_api}atena/master/promo/load-data`,
    headerFormPromo: `${base_url_api}atena/master/promo/load-data-header`,
    //Jurnal Link
    simpanJurnalLink: `${base_url_api}atena/master/jurnal-link/simpan`,
    loadAllJurnalLink: `${base_url_api}atena/master/jurnal-link/load-all`,
    //Inventori-Validasi Kirim
    loadDataGridValidasiKirim: `${base_url_api}atena/inventori/validasi-kirim/load-data-grid`,
    validasiValidasiKirim: `${base_url_api}atena/inventori/validasi-kirim/validasi`,
    cetakValidasiKirim: `${base_url_api}atena/inventori/validasi-kirim/cetak`,
    browseSopir: `${base_url_api}atena/master/sopir/browse`,
    //Pengaturan
    loadSettingPerusahaan: `${base_url_api}atena/master/pengaturan/load-setting-perusahaan`,
    loadSettingGlobal: `${base_url_api}atena/master/pengaturan/load-setting-global`,
    loadSettingMaster: `${base_url_api}atena/master/pengaturan/load-setting-master`,
    loadSettingPembelian: `${base_url_api}atena/master/pengaturan/load-setting-pembelian`,
    loadSettingPenjualan: `${base_url_api}atena/master/pengaturan/load-setting-penjualan`,
    loadSettingInventori: `${base_url_api}atena/master/pengaturan/load-setting-inventori`,
    loadSettingAset: `${base_url_api}atena/master/pengaturan/load-setting-aset`,
    loadSettingProduksi: `${base_url_api}atena/master/pengaturan/load-setting-produksi`,
    loadSettingKeuangan: `${base_url_api}atena/master/pengaturan/load-setting-keuangan`,
    loadSettingAkuntansi: `${base_url_api}atena/master/pengaturan/load-setting-akuntansi`,
    simpanSettingPerusahaan: `${base_url_api}atena/master/perusahaan/simpan`,
    simpanSettingGlobal: `${base_url_api}atena/master/setting-global/simpan`,
    simpanSettingMaster: `${base_url_api}atena/master/pengaturan/master/simpan`,
    simpanSettingPembelian: `${base_url_api}atena/master/pengaturan/pembelian/simpan`,
    simpanSettingPenjualan: `${base_url_api}atena/master/pengaturan/penjualan/simpan`,
    simpanSettingInventori: `${base_url_api}atena/master/pengaturan/inventori/simpan`,
    simpanSettingProduksi: `${base_url_api}atena/master/pengaturan/produksi/simpan`,
    simpanSettingAset: `${base_url_api}atena/master/pengaturan/aset/simpan`,
    simpanSettingKeuangan: `${base_url_api}atena/master/pengaturan/keuangan/simpan`,
    simpanSettingAkuntansi: `${base_url_api}atena/master/pengaturan/akuntansi/simpan`,
    loadConfigMaster: `${base_url_api}atena/master/pengaturan/master/load-data-config`,
    loadConfigPembelian: `${base_url_api}atena/master/pengaturan/pembelian/load-data-config`,
    loadDataConfigPenjualan: `${base_url_api}atena/master/pengaturan/penjualan/load-data-config`,
    loadConfigInventori: `${base_url_api}atena/master/pengaturan/inventori/load-data-config`,
    loadConfigAset: `${base_url_api}atena/master/pengaturan/aset/load-data-config`,
    loadConfigKeuangan: `${base_url_api}atena/master/pengaturan/keuangan/load-data-config`,
    loadConfigAkuntansi: `${base_url_api}atena/master/pengaturan/akuntansi/load-data-config`,
    generateCodeMaster: `${base_url_api}atena/master/pengaturan/master/generate-kode`,
    generateCodePembelian: `${base_url_api}atena/master/pengaturan/pembelian/generate-kode`,
    generateCodePenjualan: `${base_url_api}atena/master/pengaturan/penjualan/generate-kode`,
    generateCodeInventori: `${base_url_api}atena/master/pengaturan/inventori/generate-kode`,
    generateCodeAset: `${base_url_api}atena/master/pengaturan/aset/generate-kode`,
    generateCodeKeuangan: `${base_url_api}atena/master/pengaturan/keuangan/generate-kode`,
    generateCodeAkuntansi: `${base_url_api}atena/master/pengaturan/akuntansi/generate-kode`,
    //Inventory Transfer
    batalTransaksiInventoryTransfer: `${base_url_api}atena/inventori/transfer-persediaan/batal-trans`,
    loadDataHeaderInventoryTransfer: `${base_url_api}atena/inventori/transfer-persediaan/load-data-header`,
    cetakInventoryTransfer: `${base_url_api}atena/inventori/transfer-persediaan/cetak/`,
    getStatusTransaksiInventoryTransfer: `${base_url_api}atena/inventori/transfer-persediaan/get-status-trans`,
    ubahStatusJadiInputInventoryTransfer: `${base_url_api}atena/inventori/transfer-persediaan/ubah-status-jadi-input`,
    ubahStatusJadiSlipInventoryTransfer: `${base_url_api}atena/inventori/transfer-persediaan/ubah-status-jadi-slip`,
    loadDataGridInventoryTransfer: `${base_url_api}atena/inventori/transfer-persediaan/load-data-grid`,
    simpanInventoryTransfer: `${base_url_api}atena/inventori/transfer-persediaan/simpan/`,
    loadDataInventoryTransfer: `${base_url_api}atena/inventori/transfer-persediaan/load-data`,
    // Inventori Terima Transaksi
    batalTransaksiInventoryTerimaTransfer: `${base_url_api}atena/inventori/terima-transfer-persediaan/batal-trans`,
    loadDataHeaderInventoryTerimaTransfer: `${base_url_api}atena/inventori/terima-transfer-persediaan/load-data-header`,
    cetakInventoryTerimaTransfer: `${base_url_api}atena/inventori/terima-transfer-persediaan/cetak/`,
    getStatusTransaksiInventoryTerimaTransfer: `${base_url_api}atena/inventori/terima-transfer-persediaan/get-status-trans`,
    ubahStatusJadiInputInventoryTerimaTransfer: `${base_url_api}atena/inventori/terima-transfer-persediaan/ubah-status-jadi-input`,
    ubahStatusJadiSlipInventoryTerimaTransfer: `${base_url_api}atena/inventori/terima-transfer-persediaan/ubah-status-jadi-slip`,
    loadDataGridInventoryTerimaTransfer: `${base_url_api}atena/inventori/terima-transfer-persediaan/load-data-grid`,
    simpanInventoryTerimaTransfer: `${base_url_api}atena/inventori/terima-transfer-persediaan/simpan`,
    loadDataInventoryTerimaTransfer: `${base_url_api}atena/inventori/terima-transfer-persediaan/load-data`,
    loadDataDetailInventoryTerimaTransfer: `${base_url_api}atena/inventori/transfer-persediaan/load-data-detail-terima-transfer`,
    browseInventoriTerimaTransfer: `${base_url_api}atena/inventori/transfer-persediaan/browse-terima-transfer`,
    //Inventori Pemakaian Bahan
    batalTransaksiPemakaianBahan: `${base_url_api}atena/inventori/pemakaian-bahan/batal-trans`,
    loadDataHeaderPemakaianBahan: `${base_url_api}atena/inventori/pemakaian-bahan/load-data-header`,
    cetakPemakaianBahan: `${base_url_api}atena/inventori/pemakaian-bahan/cetak/`,
    getStatusTransaksiPemakaianBahan: `${base_url_api}atena/inventori/pemakaian-bahan/get-status-trans`,
    ubahStatusJadiInputPemakaianBahan: `${base_url_api}atena/inventori/pemakaian-bahan/ubah-status-jadi-input`,
    ubahStatusJadiSlipPemakaianBahan: `${base_url_api}atena/inventori/pemakaian-bahan/ubah-status-jadi-slip`,
    loadDataGridPemakaianBahan: `${base_url_api}atena/inventori/pemakaian-bahan/load-data-grid`,
    simpanPemakaianBahan: `${base_url_api}atena/inventori/pemakaian-bahan/simpan`,
    loadDataDetailPemakaianBahan: `${base_url_api}atena/inventori/pemakaian-bahan/load-data-detail`,
    //Inventori Repacking
    loadDataPenjualanLangsung: `${base_url_api}atena/inventori/repacking/load-data-penjualan-langsung`,
    batalTransRepacking: `${base_url_api}atena/inventori/repacking/batal-trans`,
    loadDataHeaderRepacking: `${base_url_api}atena/inventori/repacking/load-data-header`,
    cetakRepacking: `${base_url_api}atena/inventori/repacking/cetak/`,
    getStatusTransRepacking: `${base_url_api}atena/inventori/repacking/get-status-trans`,
    ubahStatusJadiInputRepacking: `${base_url_api}atena/inventori/repacking/ubah-status-jadi-input`,
    ubahStatusJadiSlipRepacking: `${base_url_api}atena/inventori/repacking/ubah-status-jadi-slip`,
    loadDataGridRepacking: `${base_url_api}atena/inventori/repacking/load-data-grid`,
    simpanRepacking: `${base_url_api}atena/inventori/repacking/simpan`,
    loadDataRepacking: `${base_url_api}atena/inventori/repacking/load-data`,
    loadDataBarangSetRepacking: `${base_url_api}atena/master/barang/load-data-barang-set`,
    browseSetBarang: `${base_url_api}atena/master/barang/browse-set`,
    browseSalesOrderRepacking: `${base_url_api}atena/penjualan/pesanan-penjualan/browse-repacking`,
    browseBarangSalesOrderRepacking: `${base_url_api}atena/penjualan/pesanan-penjualan/browse-barang-repacking`,
    browsePenjualanLangsungRepacking: `${base_url_api}atena/inventori/repacking/browse-penjualan-langsung`,
    //Inventori Saldo Awal Stok
    batalTransSaldoAwalStok: `${base_url_api}atena/inventori/saldo-awal-stok/batal-trans`,
    loadDataHeaderSaldoAwalStok: `${base_url_api}atena/inventori/saldo-awal-stok/load-data-header`,
    cetakSaldoAwalStok: `${base_url_api}atena/inventori/saldo-awal-stok/cetak/`,
    getStatusTransSaldoAwalStok: `${base_url_api}atena/inventori/saldo-awal-stok/get-status-trans`,
    ubahStatusJadiInputSaldoAwalStok: `${base_url_api}atena/inventori/saldo-awal-stok/ubah-status-jadi-input`,
    ubahStatusJadiSlipSaldoAwalStok: `${base_url_api}atena/inventori/saldo-awal-stok/ubah-status-jadi-slip`,
    loadDataGridSaldoAwalStok: `${base_url_api}atena/inventori/saldo-awal-stok/load-data-grid`,
    simpanSaldoAwalStok: `${base_url_api}atena/inventori/saldo-awal-stok/simpan`,
    loadDataSaldoAwalStok: `${base_url_api}atena/inventori/saldo-awal-stok/load-data`,
    //Inventori Penyesuaian Stok
    loadDataPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/load-data`,
    //Inventori Opname Stok
    browseOpnameStok: `${base_url_api}atena/inventori/opname-stok/browse`,
    //pembelian - permintaan barang
    loadDataDetailPermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/load-data-detail-transfer`,
    broswePermintaanBarangTransfer: `${base_url_api}atena/pembelian/permintaan-barang/browse-transfer`,
    browseFilterPermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/browse-filter`,
    //Inventory Kirim Ekspedisi
    ubahStatusJadiSlipInventoryKirimEkspedisi: `${base_url_api}atena/inventori/kirim-ekspedisi/ubah-status-jadi-slip`,
    cetakInventoryKirimEkspedisi: `${base_url_api}atena/inventori/kirim-ekspedisi/cetak/`,
    batalTransaksiInventoryKirimEkspedisi: `${base_url_api}atena/inventori/kirim-ekspedisi/batal-trans`,
    ubahStatusjadiInputInventoryKirimEkspedisi: `${base_url_api}atena/inventori/kirim-ekspedisi/ubah-status-jadi-input`,
    loadDataGridInventoryKirimEkspedisi: `${base_url_api}atena/inventori/kirim-ekspedisi/load-data-grid`,
    getStatusTransaksiInventoryKirimEkspedisi: `${base_url_api}atena/inventori/kirim-ekspedisi/get-status-trans`,
    simpanInventoryKirimEkspedisi: `${base_url_api}atena/inventori/kirim-ekspedisi/simpan/`,
    loadDataInventoryKirimEkspedisi: `${base_url_api}atena/inventori/kirim-ekspedisi/load-data`,
    loadDataDetailKirimBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/load-data-detail-kirim`,
    // browsePenjualanBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/browse-penjualan`,
    browseKirimBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/browse-kirim`,
    browseBarangBBMBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/browse-barang-bbm`,
    loadDataHeaderInventoryKirimEkspedisi: `${base_url_api}atena/inventori/kirim-ekspedisi/load-data-header`,
    //Inventory Opname Stok
    batalTransaksiInventoryOpnameStok: `${base_url_api}atena/inventori/opname-stok/batal-trans`,
    ubahStatusJadiInputInventoryOpnameStok: `${base_url_api}atena/inventori/opname-stok/ubah-status-jadi-input`,
    ubahStatusJadiSlipInventoryOpnameStok: `${base_url_api}atena/inventori/opname-stok/ubah-status-jadi-slip`,
    loadDataGridInventoryOpnameStok: `${base_url_api}atena/inventori/opname-stok/load-data-grid`,
    loadDataInventoryOpnameStok: `${base_url_api}atena/inventori/opname-stok/load-data`,
    simpanInventoryOpnameStok: `${base_url_api}atena/inventori/opname-stok/simpan`,
    loadDataHeaderInventoryOpnameStok: `${base_url_api}atena/inventori/opname-stok/load-data-header`,
    cetakInventoryOpnameStok: `${base_url_api}atena/inventori/opname-stok/cetak/`,
    loadDataOpnamePenyesuaian: `${base_url_api}atena/inventori/opname-stok/load-data-opname-penyesuaian`,
    browseOpnameStok: `${base_url_api}atena/inventori/opname-stok/browse`,
    //Inventory Penyesuaian Stok
    loadDataGridInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/load-data-grid`,
    batalTransaksiInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/batal-trans`,
    ubahStatusJadiSlipInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/ubah-status-jadi-slip`,
    cetakInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/cetak/`,
    ubahStatusJadiInputInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/ubah-status-jadi-input`,
    loadDataInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/load-data`,
    simpanInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/simpan`,
    loadDataHeaderInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/load-data-header`,
    //Inventory Barang Keluar
    loadDataGridInventoryBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/load-data-grid`,
    batalTransaksiInventoryBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/batal-trans`,
    loadDataGridPendingInventoryBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/load-data-grid-pending`,
    ubahStatusJadiInputInventoryBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/ubah-status-jadi-input`,
    ubahStatusJadiSlipInventoryBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/ubah-status-jadi-slip`,
    cetakInventoryBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/cetak/`,
    cetakCollieInventoryBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/cetak-collie/`,
    cetakEkspedisiInventoryBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/cetak-ekspedisi/`,
    loadDataBarangKeluarBarcode: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/load-data-barcode`,
    browseBBKInventoryBarangKeluar: `${base_url_api}atena/penjualan/pesanan-penjualan/browse-bukti-pengeluaran-barang`,
    cekValidUangMuka: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/cek-valid-uang-muka`,
    simpanInventoryBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/simpan`,
    loadDataHeaderInventoryBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/load-data-header`,
    loadDataInventoryBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/load-data`,
    loadDataRekapInventoryBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/load-data-rekap`,
    loadDataDetailTransInventoryBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/load-data-detail-trans`,
    browsePenjualanBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/browse-penjualan`,
    cekBisaBerlanjutInventoryBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/cek-bisa-berlanjut`,
    loadDataUangMukaSO: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/load-data-uang-muka-pesanan-penjualan`,
    loadDataPenjualanBarangKeluar: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/load-data-penjualan`,
    //Pembelian Permintaan Barang
    loadDataHeaderPermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/load-data-header`,
    loadConfigPermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/load-config`,
    loadDataGridPermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/load-data-grid`,
    batalTransPermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/batal-trans`,
    ubahStatusJadiInputPermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/ubah-status-jadi-input`,
    ubahStatusJadiSlipPermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/ubah-status-jadi-slip`,
    cetakPermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/cetak/`,
    getStatusTransPermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/get-status-trans`,
    simpanPermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/simpan`,
    loadDataDetailPermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/load-data-detail`,
    //Pesanan Pembelian
    loadDataHeaderPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/load-data-header`,
    loadConfigPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/load-config`,
    loadDataGridPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/load-data-grid`,
    batalTransPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/batal-trans`,
    ubahStatusJadiInputPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/ubah-status-jadi-input`,
    ubahStatusJadiSlipPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/ubah-status-jadi-slip`,
    cetakPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/cetak/`,
    cetakHargaPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/cetak-harga/`,
    getStatusTransPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/get-status-trans`,
    simpanPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/simpan`,
    loadDataPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/load-data`,
    loadDataRekapPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/load-data-rekap`,
    loadDataPembayaranPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/load-data-pembayaran`,
    loadDataDetailPermintaanBarangPesananPembelian: `${base_url_api}atena/pembelian/permintaan-barang/load-data-detail-pesanan-pembelian`,
    browsePermintaanBarangPesananPembelian: `${base_url_api}atena/pembelian/permintaan-barang/browse-pesanan-pembelian`,
    browseBarangPermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/browse-barang`,
    loadDataDetailAnalisisPesananPembelian: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/load-data-detail-pesanan-pembelian`,
    browseAnalisisPesananPembelianPO: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/browse-pesanan-pembelian`,
    browseBarangBySupplier: `${base_url_api}atena/master/barang/browse-by-supplier`,
    informasiTransRefBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/informasi-trans-referensi`,
    //pembelian
    browseBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/browse`,
    //Penjualan Sales Order
    loadDataGridPenjualanSalesOrder: `${base_url_api}atena/penjualan/pesanan-penjualan/load-data-grid`,
    browseTokoSinkronisasi: `${base_url_api}atena/penjualan/penjualan/browse-toko-sinkronisasi`,
    ubahStatusJadiInputPenjualanSalesOrder: `${base_url_api}atena/penjualan/pesanan-penjualan/ubah-status-jadi-input`,
    ubahStatusJadiSlipPenjualanSalesOrder: `${base_url_api}atena/penjualan/pesanan-penjualan/ubah-status-jadi-slip`,
    cetakPenjualanSalesOrder: `${base_url_api}atena/penjualan/pesanan-penjualan/cetak/`,
    cetakLandscapePenjualanSalesOrder: `${base_url_api}atena/penjualan/pesanan-penjualan/cetak-landscape/`,
    batalTransaksiPenjualanSalesOrder: `${base_url_api}atena/penjualan/pesanan-penjualan/batal-trans`,
    loadDataPenjualanSalesOrder: `${base_url_api}atena/penjualan/pesanan-penjualan/load-data`,
    getDataSO: `${base_url_api}atena/penjualan/pesanan-penjualan/load-data-pesanan-penjualan`,
    getDataPotensiSO: `${base_url_api}atena/penjualan/pesanan-penjualan/load-data-potensi-pesanan-penjualan`,
    simpanPenjualanSalesOrder: `${base_url_api}atena/penjualan/pesanan-penjualan/simpan`,
    loadDataPembayaranPenjualanSalesOrder: `${base_url_api}atena/penjualan/pesanan-penjualan/load-data-pembayaran`,
    browseAlamatSalesOrder: `${base_url_api}atena/penjualan/pesanan-penjualan/browse-alamat`,
    informasiSO: `${base_url_api}atena/penjualan/pesanan-pengiriman/informasi-pesanan-penjualan`,
    loadDataHeaderPenjualanSalesOrder: `${base_url_api}atena/penjualan/pesanan-penjualan/load-data-header`,
    tampilDataSinkronisasiSO: `${base_url_api}atena/penjualan/pesanan-penjualan/tampil-data-sinkronisasi`,
    simpanDataSinkronisasiSO: `${base_url_api}atena/penjualan/pesanan-penjualan/simpan-data-sinkronisasi`,
    cekBisaBerlanjutSO: `${base_url_api}atena/inventori/pesanan-penjualan/cek-bisa-lanjut`,
    browseSO: `${base_url_api}atena/penjualan/pesanan-penjualan/browse`,
    loadDataDetailPenjualanSalesOrder: `${base_url_api}atena/penjualan/pesanan-penjualan/load-data-detail`,
    browseBarangPenjualanSalesOrder: `${base_url_api}atena/penjualan/pesanan-penjualan/browse-barang`,
    browseBarangSO: `${base_url_api}atena/penjualan/pesanan-penjualan/browse-barang`,
    loadDataRekapPenjualanSalesOrder: `${base_url_api}atena/penjualan/pesanan-penjualan/load-data-rekap`,
    //Penjualan Delivery Order
    loadDataGridPenjualanDeliveryOrder: `${base_url_api}atena/penjualan/pesanan-pengiriman/load-data-grid`,
    loadDataGridPendingPenjualanDeliveryOrder: `${base_url_api}atena/penjualan/pesanan-pengiriman/load-data-grid-pending`,
    cetakPenjualanDeliveryOrder: `${base_url_api}atena/penjualan/pesanan-pengiriman/cetak/`,
    batalTransaksiPenjualanDeliveryOrder: `${base_url_api}atena/penjualan/pesanan-pengiriman/batal-trans`,
    ubahStatusjadiInputPenjualanDeliveryOrder: `${base_url_api}atena/penjualan/pesanan-pengiriman/ubah-status-jadi-input`,
    ubahStatusjadiSlipPenjualanDeliveryOrder: `${base_url_api}atena/penjualan/pesanan-pengiriman/ubah-status-jadi-slip`,
    simpanPenjualanDeliveryOrder: `${base_url_api}atena/penjualan/pesanan-pengiriman/simpan`,
    loadDataPenjualanDeliveryOrder: `${base_url_api}atena/penjualan/pesanan-pengiriman/load-data`,
    informasiTransReferensi: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/informasi-trans-referensi`,
    loadDataHeaderPenjualanDeliveryOrder: `${base_url_api}atena/penjualan/pesanan-pengiriman/load-data-header`,
    cekBisaBerlanjutDO: `${base_url_api}atena/inventori/pesanan-pengiriman/cek-bisa-lanjut`,
    browseBarangDO: `${base_url_api}atena/penjualan/pesanan-pengiriman/browse-barang`,
    loadDataDetailPenjualanDeliveryOrder: `${base_url_api}atena/penjualan/pesanan-pengiriman/load-data-detail`,
    browseBBKPenjualanDeliveryOrder: `${base_url_api}atena/penjualan/pesanan-pengiriman/browse-bukti-pengeluaran-barang`,
    //Retur Pembelian
    cekBisaBerlanjutReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/cek-bisa-berlanjut`,
    browseBBKReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/browse-bukti-pengeluaran-barang`,
    loadDataDetailReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/load-data-detail`,
    loadDataHeaderReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/load-data-header`,
    //Tutup Permintaan Barang
    loadDataGridTutupPermintaanBarang: `${base_url_api}atena/pembelian/tutup-permintaan-barang/load-data-grid`,
    tutupTransaksiPermintaanBarang: `${base_url_api}atena/pembelian/tutup-permintaan-barang/tutup-trans`,
    tutupTransaksiBarangPermintaanBarang: `${base_url_api}atena/pembelian/tutup-permintaan-barang/tutup-trans-barang`,
    loadDataTutupPermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/load-data-tutup-permintaan-barang`,
    //Tutup Pesanan Pembelian
    loadDataGridTutupPesananPembelian: `${base_url_api}atena/pembelian/tutup-pesanan-pembelian/load-data-grid`,
    browseFilterPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/browse-filter`,
    tutupTransaksiPesananPembelian: `${base_url_api}atena/pembelian/tutup-pesanan-pembelian/tutup-trans`,
    tutupTransaksiBarangPesananPembelian: `${base_url_api}atena/pembelian/tutup-pesanan-pembelian/tutup-trans-barang`,
    //Tutup Pesanan Penjualan
    loadDataGridTutupPesananPenjualan: `${base_url_api}atena/penjualan/tutup-pesanan-penjualan/load-data-grid`,
    browseFilterPesananPenjualan: `${base_url_api}atena/penjualan/pesanan-penjualan/browse-filter`,
    tutupTransaksiPesananPenjualan: `${base_url_api}atena/penjualan/tutup-pesanan-penjualan/tutup-trans`,
    tutupTransaksiBarangPesananPenjualan: `${base_url_api}atena/penjualan/tutup-pesanan-penjualan/tutup-trans-barang`,

    //Kas
    loadTransaksiDataGridKas  : `${base_url_api}atena/akuntansi/kas/load-data-grid`,
    loadTransaksiDataHeaderKas: `${base_url_api}atena/akuntansi/kas/load-data-header`,
    loadTransaksiDataDetailKas: `${base_url_api}atena/akuntansi/kas/load-data`,
    loadGiroBelumCair         : `${base_url_api}atena/akuntansi/kas/get-giro-belum-cair`,
    loadJurnalLinkKas         : `${base_url_api}atena/akuntansi/kas/get-jurnal-link/`,
    loadJurnalGiro            : `${base_url_api}atena/akuntansi/kas/load-jurnal-giro`,
    simpanTransaksiKas        : `${base_url_api}atena/akuntansi/kas/simpan/`,
    batalTransaksiKas         : `${base_url_api}atena/akuntansi/kas/batal-trans`,
    ubahStatusjadiInputKas    : `${base_url_api}atena/akuntansi/kas/ubah-status-jadi-input`,
    ubahStatusjadiSlipKas     : `${base_url_api}atena/akuntansi/kas/ubah-status-jadi-slip`,
    cetakTransaksiKas         : `${base_url_api}atena/akuntansi/kas/cetak/`,
    getStatusTransaksiKas     : `${base_url_api}atena/akuntansi/kas/get-status-trans`,
    // simpanTransaksiKas: `${base_url_api}atena/akuntansi/kas/simpan`,

    //Saldo Awal Perkiraan
    loadDataGridSaldoAwalPerkiraan       : `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/load-data-grid`,
    loadDataHeaderSaldoAwalPerkiraan     : `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/load-data-header`,
    simpanSaldoAwalPerkiraan             : `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/simpan`,
    loadDataSaldoAwalPerkiraan           : `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/load-data`,
    cetakSaldoAwalPerkiraan              : `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/cetak/`,
    batalSaldoAwalPerkiraan              : `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/batal-trans`,
    ubahStatusjadiInputSaldoAwalPerkiraan: `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/ubah-status-jadi-input`,
    ubahStatusjadiSlipSaldoAwalPerkiraan : `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/ubah-status-jadi-slip`,
    getStatusSaldoAwalPerkiraan          : `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/get-status-trans`,

    //Tutup Periode Akuntansi
    simpanTutupPeriodeAkuntansi: `${base_url_api}atena/akuntansi/tutup-periode-akuntansi/simpan`,
    batalTutupPeriodeAkuntansi : `${base_url_api}atena/akuntansi/tutup-periode-akuntansi/batal-trans`,
    browseTutupPeriodeAkuntansi: `${base_url_api}atena/akuntansi/tutup-periode-akuntansi/browse`,

    //Faktur Pajak
    loadTransaksiDataGridFakturPajak  : `${base_url_api}atena/akuntansi/faktur-pajak/load-data-grid`,
    loadTransaksiDataHeaderFakturPajak: `${base_url_api}atena/akuntansi/faktur-pajak/load-data-header`,
    batalFakturPajak                  : `${base_url_api}atena/akuntansi/faktur-pajak/batal-trans`,
    ubahStatusjadiSlipFakturPajak     : `${base_url_api}atena/akuntansi/faktur-pajak/ubah-status-jadi-slip`,
    ubahStatusjadiInputFakturPajak    : `${base_url_api}atena/akuntansi/faktur-pajak/ubah-status-jadi-input`,
    cetakFakturPajak                  : `${base_url_api}atena/akuntansi/faktur-pajak/cetak/`,
    eksporCSVFakturPajak              : `${base_url_api}atena/akuntansi/faktur-pajak/eksporCSV/`,
    ekporXMLFakturPajak               : `${base_url_api}atena/akuntansi/faktur-pajak/eksporXML/`,
    eksporXMLRetailFakturPajak        : `${base_url_api}atena/akuntansi/faktur-pajak/eksporXML-retail/`,
    getStatusFakturPajak              : `${base_url_api}atena/akuntansi/faktur-pajak/get-status-trans`,
    simpanFakturPajak                 : `${base_url_api}atena/akuntansi/faktur-pajak/simpan`,
    loadDataFakturPajak               : `${base_url_api}atena/akuntansi/faktur-pajak/load-data`,
    tampilTransaksiFakturPajak        : `${base_url_api}atena/akuntansi/faktur-pajak/tampil-transaksi`,
    cekNoFakturPajak                  : `${base_url_api}atena/akuntansi/faktur-pajak/cek-no-faktur`,

    //Penjualan
    loadConfigPenjualan: `${base_url_api}atena/penjualan/penjualan/load-config`,
    loadDataGridPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/load-data-grid`,
    loadDataGridPendingPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/load-data-grid-pending`,
    loadDataCetakPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/load-data-cetak`,
    loadDataTagihanPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/load-data-tagihan`,
    batalTransaksiPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/batal-trans`,
    ubahStatusJadiInputPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/ubah-status-jadi-input`,
    ubahStatusJadiSlipPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/ubah-status-jadi-slip`,
    ubahStatusJadiSlipFilterPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/ubah-status-jadi-slip-filter`,
    cetakPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/cetak/`,
    cetakBanyakPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/cetak-banyak/`,
    cetakKecilPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/cetak-kecil/`,
    cetakSJPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/cetak-surat-jalan/`,
    cetakBanyakSJPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/cetak-banyak-surat-jalan/`,
    tampilDataSinkronisasiPenjualan: `${base_url_api}atena/penjualan/penjualan/tampil-data-sinkronisasi`,
    simpanDataSinkronisasiPenjualan: `${base_url_api}atena/penjualan/penjualan/simpan-data-sinkronisasi`,
    loadDataPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/load-data`,
    loadDataOrderPenjualanPenjualan: `${base_url_api}atena/penjualan/order-penjualan/load-data`,
    simpanPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/simpan`,
    loadDataRekapPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/load-data-rekap`,
    browseOrderJual: `${base_url_api}atena/penjualan/order-penjualan/browse`,
};

var modul_kode = {
    pembelian: 'B93JH',
    penjualan: 'OI02K',
    inventori: '92DXS',
    produksi: '3K93J',
    aset: '93JK4',
    keuangan: 'L03KD',
    akuntansi: 'P02MS'
};


function getDateMinusDays(days) {
    const today = new Date();
    today.setDate(today.getDate() - days);

    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0'); // bulan dimulai dari 0
    const day = String(today.getDate()).padStart(2, '0');

    return `${year}-${month}-${day}`;
}

function getTextError(error) {
    return `Kami mengalami sedikit masalah dalam memproses permintaan Anda.<br>
                        Detail: ${error}<br> Harap ambil tangkapan layar lalu hubungi administrator.`;
}

async function set_ppn_aktif(tanggal, token, onSuccess) {
    if (tanggal == '') {
        return false;
    }
    try {
        let url = link_api.getPPNAktif;
        const response = await fetch(url, {
            method: 'POST',

            headers: {
                'Authorization': token,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                tglaktif: tanggal,
            }),
        }).then(response => {
            if (!response.ok) {
                throw new Error(
                    `HTTP error! status: ${response.status} from ${url}`);
            }
            return response.json();
        })
        if (response.success&&onSuccess) {
            await onSuccess(response);
        } else {
            $.messager.alert('Error', response.message, 'error');
        }
    } catch (error) {
        console.log(error);
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
    }
}

async function get_akses_user(kodeMenu, token, onSuccess, useLoader = true, onError = null) {
    if (useLoader) {
        bukaLoader();
    }
    try {
        const response = await fetch(link_api.getDataAkses, {
            method: "POST",
            headers: {
                Authorization: token,
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                kodemenu: kodeMenu,
            }),
        }).then((response) => response.json());

        // Memeriksa apakah respons HTTP OK (status 200-299)
        if (!response.success) {
            const errorBody = response.message; // Ambil teks error dari server jika ada
            const errorMessage = `HTTP error! Status: ${response.status
                }. Message: ${errorBody || "No specific error message."}`;
            const error = new Error(errorMessage);

            if (onError && typeof onError === "function") {
                onError(error); // Panggil onError jika disediakan
            } else {
                if (errorBody.toLowerCase() == "token tidak valid.") {
                    $.messager.alert('Error', errorBody + " Silahkan logout dan login kembali", 'error');
                }
                console.error("Error fetching data:", error);
            }
            if (useLoader) {
                tutupLoader();
            }
            return; // Hentikan eksekusi
        }

        // Parsing respons sebagai JSON
        // const data = await response.json();
        const data = response;

        // Panggil fungsi onSuccess dan teruskan data yang telah di-parse
        if (onSuccess && typeof onSuccess === "function") {
            if (!data.success) {
                var texterror = data.message ?? "";
                if ((data.message ?? "").toLowerCase() == "token tidak valid.") {
                    texterror += " Silahkan login ulang";
                }
                $.messager.alert("error", texterror, "error");
                // tutupLoader();
                // return null;
            } else {
                await onSuccess(data);
            }
        } else {
            console.warn("onSuccess callback not provided or not a function.");
        }
    } catch (error) {
        console.log(error);
        $.messager.alert("error", getTextError(error), "error");
        // Menangani error jaringan atau parsing JSON
        // console.error('Network or parsing error:', error);
        // if (onError && typeof onError === 'function') {
        //   onError(error); // Panggil onError jika disediakan
        // } else {
        //   console.error('An unexpected error occurred:', error);
        // }
    }
    if (useLoader) {
        tutupLoader();
    }
}

async function getConfig(config, modul, token, onSuccess, onError = null) {
    // bukaLoader();
    try {
        const response = await fetch(link_api.getConfig, {
            method: "POST",
            headers: {
                Authorization: token,
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                modul: modul,
                config: config,
            }),
        });

        // Memeriksa apakah respons HTTP OK (status 200-299)
        if (!response.ok) {
            const errorBody = await response.text(); // Ambil teks error dari server jika ada
            const errorMessage = `HTTP error! Status: ${response.status
                }. Message: ${errorBody || "No specific error message."}`;
            const error = new Error(errorMessage);

            if (onError && typeof onError === "function") {
                onError(error); // Panggil onError jika disediakan
            } else {
                console.error("Error fetching data:", error);
            }

            // tutupLoader();
            return; // Hentikan eksekusi∂
        }

        // Parsing respons sebagai JSON
        const data = await response.json();

        // Panggil fungsi onSuccess dan teruskan data yang telah di-parse
        if (onSuccess && typeof onSuccess === "function") {
            if (!data.success) {
                var texterror = data.message ?? "";
                if ((data.message ?? "").toLowerCase() == "token tidak valid.") {
                    texterror += " Silahkan login ulang";
                }
                $.messager.alert("error", texterror, "error");
                // tutupLoader();
                return null;
            } else {
                onSuccess(data);
                // tutupLoader();
            }
        } else {
            // tutupLoader();
            console.warn("onSuccess callback not provided or not a function.");
        }
    } catch (error) {
        console.log(error);
        $.messager.alert("error", getTextError(error), "error");
        // tutupLoader();
    }
}

const getStatusTrans = async (url, token, param) => {
    var status = "-";
    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Authorization': token,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(param),
        }).then(response => {
            if (!response.ok) {
                throw new Error(
                    `HTTP error! status: ${response.status} from ${url}`);
            }
            return response.json();
        })

        if (response.success) {
            status = response.data.status;
        } else {
            $.messager.alert('Error', response.message, 'error');
        }
    } catch (error) {
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
    }
    return status;
}

async function downloadXML(apiUrl, uuid, token = null) {
    try {
        const url = apiUrl + uuid;
        
        const authToken = token;

        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Authorization': `bearer ${authToken}`,
                'Content-Type': 'application/json',
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const xmlText = await response.text();
        
        // Ambil filename dari Content-Disposition header
        const contentDisposition = response.headers.get('Content-Disposition');
        let filename = 'download.xml'; // fallback filename
        
        if (contentDisposition) {
            const filenameMatch = contentDisposition.match(/filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/);
            if (filenameMatch && filenameMatch[1]) {
                filename = filenameMatch[1].replace(/['"]/g, '');
            }
        }
        
        const blob = new Blob([xmlText], { type: 'application/xml' });
        const downloadUrl = window.URL.createObjectURL(blob);
        
        const a = document.createElement('a');
        a.href = downloadUrl;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.URL.revokeObjectURL(downloadUrl);
        
        return true;
        
    } catch (error) {
        console.error('Error download XML:', error);
        alert('Gagal mengunduh file XML: ' + error.message);
        return false;
    }
}

async function downloadCSV(apiUrl, uuid, token = null) {
    try {
        const url = apiUrl + uuid;
        
        // Gunakan token yang diberikan atau ambil dari session
        const authToken = token;

        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Authorization': `bearer ${authToken}`,
                'Content-Type': 'application/json',
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const csvText = await response.text();
        
        // Ambil filename dari Content-Disposition header
        const contentDisposition = response.headers.get('Content-Disposition');
        let filename = 'download.csv'; // fallback filename
        
        if (contentDisposition) {
            const filenameMatch = contentDisposition.match(/filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/);
            if (filenameMatch && filenameMatch[1]) {
                filename = filenameMatch[1].replace(/['"]/g, '');
            }
        }
        
        const blob = new Blob([csvText], { type: 'text/csv' });
        const downloadUrl = window.URL.createObjectURL(blob);
        
        const a = document.createElement('a');
        a.href = downloadUrl;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.URL.revokeObjectURL(downloadUrl);
        
        return true;
        
    } catch (error) {
        console.error('Error download CSV:', error);
        alert('Gagal mengunduh file CSV: ' + error.message);
        return false;
    }
}