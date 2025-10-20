// var base_url_api = "http://192.168.1.45:8000/api/";
var base_url_api = "https://api.atena.id/api/";
var tokenTidakValid = "invalid_token";
var link_api = {
    //login
    login: `${base_url_api}auth/login`,
    loginPerusahaan: `${base_url_api}auth/login-perusahaan`,
    getDaftarMenu: `${base_url_api}atena/master/user/get-daftar-menu`,
    getDetailPerusahaan: `${base_url_api}auth/get-perusahaan`,
    getConfigGlobal: `${base_url_api}atena/master/config/get-config-global`,
    getConfig: `${base_url_api}atena/master/config/get-config`,
    getDataAkses: `${base_url_api}atena/master/user/get-user-akses`,
    browseJenisTrans: `${base_url_api}atena/master/perusahaan/browse-jenis-trans`,
    laporanHistoryProgram: `${base_url_api}atena/master/history-program/laporan`,
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
    laporanPerkiraan: `${base_url_api}atena/master/perkiraan/laporan`,
    //currency
    browseCurrency: `${base_url_api}atena/master/currency/browse`,
    loadDataGridCurrency: `${base_url_api}atena/master/currency/load-data-grid`,
    hapusCurrency: `${base_url_api}atena/master/currency/hapus`,
    loadHeaderCurrency: `${base_url_api}atena/master/currency/load-data-header`,
    simpanCurrency: `${base_url_api}atena/master/currency/simpan`,
    getRateCurrency: `${base_url_api}atena/master/currency/get-rate`,
    laporanCurrency: `${base_url_api}atena/master/currency/laporan`,
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
    laporanUser: `${base_url_api}atena/master/user/laporan`,
    simpanProfile: `${base_url_api}atena/master/user/simpan-profile`,
    //depo
    loadDataGridDepo: `${base_url_api}atena/master/depo/load-data-grid`,
    browseDepo: `${base_url_api}atena/master/depo/browse`,
    headerFormDepo: `${base_url_api}atena/master/depo/load-data-header`,
    simpanDepo: `${base_url_api}atena/master/depo/simpan`,
    hapusDepo: `${base_url_api}atena/master/depo/hapus`,
    //dashboard
    loadOmzetBulanan: `${base_url_api}atena/dashboard/load-omzet-bulanan`,
    loadOmzetTahunan: `${base_url_api}atena/dashboard/load-omzet-tahunan`,
    loadDataChartPenjualan: `${base_url_api}atena/dashboard/load-data-chart-penjualan`,
    loadPesananPenjualanBelumTuntas: `${base_url_api}atena/dashboard/load-pesanan-penjualan-belum-tuntas`,
    loadPesananPembelianBelumTuntas: `${base_url_api}atena/dashboard/load-pesanan-pembelian-belum-tuntas`,
    loadJumlahBBKBelumLanjut: `${base_url_api}atena/dashboard/load-jumlah-bukti-pengeluaran-barang-belum-berlanjut`,
    loadJumlahBBMBelumLanjut: `${base_url_api}atena/dashboard/load-jumlah-bukti-penerimaan-barang-belum-berlanjut`,
    loadPiutangCustJatuhTempo: `${base_url_api}atena/dashboard/load-daftar-piutang-customer-jatuh-tempo`,
    loadHutangJatuhTempo: `${base_url_api}atena/dashboard/load-daftar-hutang-jatuh-tempo`,
    loadBarangStokBawahLimit: `${base_url_api}atena/dashboard/load-barang-stok-dibawah-limit`,
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
    laporanLokasi: `${base_url_api}atena/master/lokasi/laporan`,
    browseJenisLokasi: `${base_url_api}atena/master/lokasi/browse-jenis-lokasi`,
    //Merk
    hapusMerk: `${base_url_api}atena/master/merk/hapus`,
    loadDataGridMerk: `${base_url_api}atena/master/merk/load-data-grid`,
    simpanMerk: `${base_url_api}atena/master/merk/simpan`,
    getHeaderMerk: `${base_url_api}atena/master/merk/load-data-header`,
    laporanMerk: `${base_url_api}atena/master/merk/laporan`,
    //Servis
    loadDataGridServis: `${base_url_api}atena/master/servis/load-data-grid`,
    hapusServis: `${base_url_api}atena/master/servis/hapus`,
    loadDataHeaderServis: `${base_url_api}atena/master/servis/load-data-header`,
    simpanServis: `${base_url_api}atena/master/servis/simpan`,
    //supplier
    loadDataGridMasterSupplier: `${base_url_api}atena/master/supplier/load-data-grid`,
    hapusSupplier: `${base_url_api}atena/master/supplier/hapus`,
    browseBadanUsaha: `${base_url_api}atena/master/supplier/browse-badan-usaha`,
    getHutangBelumLunas: `${base_url_api}atena/master/supplier/load-data-hutang-belum-lunas`,
    simpanSupplier: `${base_url_api}atena/master/supplier/simpan`,
    headerFormSupplier: `${base_url_api}atena/master/supplier/load-data-header`,
    laporanSupplier: `${base_url_api}atena/master/supplier/laporan`,
    templateExcelSupplier: `${base_url_api}atena/master/supplier/template-excel`,
    importExcelSupplier: `${base_url_api}atena/master/supplier/import-excel`,
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
    browseKotaCustomer: `${base_url_api}atena/master/customer/browse-kota`,
    browsePropinsiCustomer: `${base_url_api}atena/master/customer/browse-propinsi`,
    laporanCustomer: `${base_url_api}atena/master/customer/laporan`,
    browsePajakCustomer: `${base_url_api}atena/master/customer/browse-pajak`,
    browseGridIdentitasCustomer: `${base_url_api}atena/master/customer/browse-identitas`,
    //ekspedisi
    loadDataGridMasterEkspedisi: `${base_url_api}atena/master/ekspedisi/load-data-grid`,
    browseBadanUsahaEkspedisi: `${base_url_api}atena/master/ekspedisi/browse-badan-usaha`,
    headerFormEkspedisi: `${base_url_api}atena/master/ekspedisi/load-data-header`,
    simpanEkspedisi: `${base_url_api}atena/master/ekspedisi/simpan`,
    hapusEkspedisi: `${base_url_api}atena/master/ekspedisi/hapus`,
    browseEkspedisi: `${base_url_api}atena/master/ekspedisi/browse`,
    laporanEkspedisi: `${base_url_api}atena/master/ekspedisi/laporan`,
    //tipe customer
    browseTipeCustomer: `${base_url_api}atena/master/tipecustomer/browse`,
    simpanTipeCustomer: `${base_url_api}atena/master/tipecustomer/simpan`,
    getHeaderTipeCustomer: `${base_url_api}atena/master/tipecustomer/load-data-header`,
    loadDataGridTipeCustomer: `${base_url_api}atena/master/tipecustomer/load-data-grid`,
    hapusTipeCustomer: `${base_url_api}atena/master/tipecustomer/hapus`,
    laporanTipeCustomer: `${base_url_api}atena/master/tipecustomer/laporan`,
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
    laporanSyaratBayar: `${base_url_api}atena/master/syaratbayar/laporan`,
    //Departemen Kerja
    loadDataGridDepartemenKerja: `${base_url_api}atena/master/departemenkerja/load-data-grid`,
    hapusDepartemenKerja: `${base_url_api}atena/master/departemenkerja/hapus`,
    getHeaderDepartemenKerja: `${base_url_api}atena/master/departemenkerja/load-data-header`,
    simpanDepartemenKerja: `${base_url_api}atena/master/departemenkerja/simpan`,
    browseDataDepartemenKerja: `${base_url_api}atena/master/departemenkerja/browse`,
    browseSyaratBayar: `${base_url_api}atena/master/syaratbayar/browse`,
    laporanDepartemenKerja: `${base_url_api}atena/master/departemenkerja/laporan`,
    //Karyawan
    hapusKaryawan: `${base_url_api}atena/master/karyawan/hapus`,
    loadDataGridKaryawan: `${base_url_api}atena/master/karyawan/load-data-grid`,
    simpanKaryawan: `${base_url_api}atena/master/karyawan/simpan`,
    getHeaderKaryawan: `${base_url_api}atena/master/karyawan/load-data-header`,
    browseKaryawan: `${base_url_api}atena/master/karyawan/browse`,
    laporanKaryawan: `${base_url_api}atena/master/karyawan/laporan`,
    //sopir
    hapusSopir: `${base_url_api}atena/master/sopir/hapus`,
    simpanSopir: `${base_url_api}atena/master/sopir/simpan`,
    getHeaderSopir: `${base_url_api}atena/master/sopir/load-data-header`,
    loadDataGridSopir: `${base_url_api}atena/master/sopir/load-data-grid`,
    laporanSopir: `${base_url_api}atena/master/sopir/laporan`,
    //marketing
    browseMarketing: `${base_url_api}atena/master/marketing/browse-marketing`,
    //kendaraan
    simpanKendaraan: `${base_url_api}atena/master/kendaraan/simpan`,
    getHeaderKendaraan: `${base_url_api}atena/master/kendaraan/load-data-header`,
    loadDataGridKendaraan: `${base_url_api}atena/master/kendaraan/load-data-grid`,
    hapusKendaraan: `${base_url_api}atena/master/kendaraan/hapus`,
    browseKendaraan: `${base_url_api}atena/master/kendaraan/browse`,
    laporanKendaraan: `${base_url_api}atena/master/kendaraan/laporan`,
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
    browseNonTunai: `${base_url_api}atena/master/alat-bayar-non-tunai/browse`,
    browseNonTunaiAkunBank: `${base_url_api}atena/master/alat-bayar-non-tunai/browse-akun-bank`,
    //alat bayar
    simpanAlatBayar: `${base_url_api}atena/master/alatbayar/simpan`,
    setUrutanAlatBayar: `${base_url_api}atena/master/alatbayar/set-urutan`,
    getHeaderAlatBayar: `${base_url_api}atena/master/alatbayar/load-data-header`,
    loadDataGridAlatBayar: `${base_url_api}atena/master/alatbayar/load-data-grid`,
    hapusAlatBayar: `${base_url_api}atena/master/alatbayar/hapus`,
    browseAlatBayar: `${base_url_api}atena/master/alatbayar/browse`,
    laporanAlatBayar: `${base_url_api}atena/master/alatbayar/laporan`,
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
    browseBarangJual: `${base_url_api}atena/master/barang/browse-jual`,
    hargaJualTerakhir: `${base_url_api}atena/master/barang/harga-jual-terakhir`,
    cekCollie: `${base_url_api}atena/master/barang/cek-collie`,
    getDaftarBarangDiskon: `${base_url_api}atena/master/barang/load-daftar-diskon`,
    browseBarangNonStok: `${base_url_api}atena/master/barang/browse-non-stok`,
    browseBarangKategoriLaporan: `${base_url_api}atena/master/barang/browse-barang-kategori-laporan`,
    laporanBarang: `${base_url_api}atena/master/barang/laporan`,
    loadDataGridSimbolHarga: `${base_url_api}atena/master/simbol-harga/load-data-grid`,
    simpanSimbolHarga: `${base_url_api}atena/master/simbol-harga/simpan`,
    laporanBarcodeBarang: `${base_url_api}atena/master/barang/laporan-barcode-barang`,
    browseGridBarcodeBarang: `${base_url_api}atena/master/barang/browse-barcode`,
    browseGridPartNumber: `${base_url_api}atena/master/barang/browse-part-number`,
    templateExcelBarang: `${base_url_api}atena/master/barang/template-excel`,
    importExcelBarang: `${base_url_api}atena/master/barang/import-excel`,
    //Promo
    loadDataGridPromo: `${base_url_api}atena/master/promo/load-data-grid`,
    simpanPromo: `${base_url_api}atena/master/promo/simpan`,
    hapusPromo: `${base_url_api}atena/master/promo/hapus`,
    browseBarangPromo: `${base_url_api}atena/master/promo/browse-barang`,
    loadDataPromo: `${base_url_api}atena/master/promo/load-data`,
    headerFormPromo: `${base_url_api}atena/master/promo/load-data-header`,
    //Produksi2
    browseProduksi: `${base_url_api}atena/master/produksi2/browse`,
    laporanProduksi: `${base_url_api}atena/master/produksi2/laporan`,
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
    browseTransferPersediaan: `${base_url_api}atena/inventori/transfer-persediaan/browse-transfer`,
    laporanTransferPersediaan: `${base_url_api}atena/inventori/transfer-persediaan/laporan`,
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
    browseTerimaTransferPersediaan: `${base_url_api}atena/inventori/terima-transfer-persediaan/browse-terima-transfer`,
    laporanTerimaTransfer: `${base_url_api}atena/inventori/terima-transfer-persediaan/laporan`,
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
    browsePemakaianBahan: `${base_url_api}atena/inventori/pemakaian-bahan/browse-pemakaian-bahan`,
    laporanPemakaianBahan: `${base_url_api}atena/inventori/pemakaian-bahan/laporan`,
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
    browseRepacking: `${base_url_api}atena/inventori/repacking/browse-repacking`,
    laporanRepacking: `${base_url_api}atena/inventori/repacking/laporan`,
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
    browseSaldoAwalStok: `${base_url_api}atena/inventori/saldo-awal-stok/browse-saldo-stok`,
    laporanSaldoAwalStok: `${base_url_api}atena/inventori/saldo-awal-stok/laporan`,
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
    browseOpnameStokInventori: `${base_url_api}atena/inventori/opname-stok/browse-opname-stok`,
    laporanOpnameStok: `${base_url_api}atena/inventori/opname-stok/laporan`,
    //Inventory Penyesuaian Stok
    loadDataGridInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/load-data-grid`,
    batalTransaksiInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/batal-trans`,
    ubahStatusJadiSlipInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/ubah-status-jadi-slip`,
    cetakInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/cetak/`,
    ubahStatusJadiInputInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/ubah-status-jadi-input`,
    loadDataInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/load-data`,
    simpanInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/simpan`,
    loadDataHeaderInventoryPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/load-data-header`,
    browsePenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/browse-penyesuaian-stok`,
    laporanPenyesuaianStok: `${base_url_api}atena/inventori/penyesuaian-stok/laporan`,
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
    browseBBK: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/browse-bukti-pengeluaran-barang`,
    laporanBuktiPengeluaranBarang: `${base_url_api}atena/inventori/bukti-pengeluaran-barang/laporan`,
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
    browsePermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/browse`,
    laporanPermintaanBarang: `${base_url_api}atena/pembelian/permintaan-barang/laporan`,
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
    browseBBMPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/browse-bukti-penerimaan-barang`,
    cekBisaBerlanjutPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/cek-bisa-berlanjut`,
    loadDataBBMPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/load-data-bukti-penerimaan-barang`,
    browseBarangPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/browse-barang`,
    browsePesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/browse-pesanan-pembelian`,
    laporanPesananPembelian: `${base_url_api}atena/pembelian/pesanan-pembelian/laporan`,

    //pembelian
    loadDataHeaderPembelian: `${base_url_api}atena/pembelian/pembelian/load-data-header`,
    loadConfigPembelian: `${base_url_api}atena/pembelian/pembelian/load-config`,
    loadDataGridPembelian: `${base_url_api}atena/pembelian/pembelian/load-data-grid`,
    loadDataGridPendingPembelian: `${base_url_api}atena/pembelian/pembelian/load-data-grid-pending`,
    batalTransPembelian: `${base_url_api}atena/pembelian/pembelian/batal-trans`,
    ubahStatusJadiInputPembelian: `${base_url_api}atena/pembelian/pembelian/ubah-status-jadi-input`,
    ubahStatusJadiSlipPembelian: `${base_url_api}atena/pembelian/pembelian/ubah-status-jadi-slip`,
    cetakPembelian: `${base_url_api}atena/pembelian/pembelian/cetak/`,
    getStatusTransPembelian: `${base_url_api}atena/pembelian/pembelian/get-status-trans`,
    simpanPembelian: `${base_url_api}atena/pembelian/pembelian/simpan`,
    loadDataPembelian: `${base_url_api}atena/pembelian/pembelian/load-data`,
    loadDataDetailBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/load-data-detail`,
    browseBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/browse`,
    browseBeliBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/browse-beli`,
    loadDataUangMukaPOBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/load-data-uang-muka-pesanan-pembelian`,
    loadDataHeaderSyaratBayar: `${base_url_api}atena/master/syaratbayar/load-data-header`,
    browseNonStokBarang: `${base_url_api}atena/master/barang/browse-non-stok`,
    cekBisaBerlanjutBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/cek-bisa-berlanjut`,
    browseBeliPembelian: `${base_url_api}atena/pembelian/pembelian/browse-beli`,
    loadDataDetailBarcodePembelian: `${base_url_api}atena/pembelian/pembelian/load-data-detail-barcode`,
    laporanPembelian: `${base_url_api}atena/pembelian/pembelian/laporan`,
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
    browsePesananPenjualan: `${base_url_api}atena/penjualan/pesanan-penjualan/browse-pesanan-penjualan`,
    laporanPenjualanSalesOrder: `${base_url_api}atena/penjualan/pesanan-penjualan/laporan`,
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
    browsePesananPengiriman: `${base_url_api}atena/penjualan/pesanan-pengiriman/browse-pesanan-pengiriman`,
    laporanPenjualanDeliveryOrder: `${base_url_api}atena/penjualan/pesanan-pengiriman/laporan`,
    //Retur Pembelian
    cekBisaBerlanjutReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/cek-bisa-berlanjut`,
    browseBBKReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/browse-bukti-pengeluaran-barang`,
    loadDataDetailReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/load-data-detail`,
    loadDataHeaderReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/load-data-header`,
    browseBarangBBKReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/browse-barang-bukti-pengeluaran-barang`,
    browseReturBeli: `${base_url_api}atena/pembelian/retur-pembelian/browse-retur-beli`,
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
    loadTransaksiDataGridKas: `${base_url_api}atena/akuntansi/kas/load-data-grid`,
    loadTransaksiDataHeaderKas: `${base_url_api}atena/akuntansi/kas/load-data-header`,
    loadTransaksiDataDetailKas: `${base_url_api}atena/akuntansi/kas/load-data`,
    loadGiroBelumCair: `${base_url_api}atena/akuntansi/kas/get-giro-belum-cair`,
    loadJurnalLinkKas: `${base_url_api}atena/akuntansi/kas/get-jurnal-link/`,
    loadJurnalGiro: `${base_url_api}atena/akuntansi/kas/load-jurnal-giro`,
    simpanTransaksiKas: `${base_url_api}atena/akuntansi/kas/simpan/`,
    batalTransaksiKas: `${base_url_api}atena/akuntansi/kas/batal-trans`,
    ubahStatusjadiInputKas: `${base_url_api}atena/akuntansi/kas/ubah-status-jadi-input`,
    ubahStatusjadiSlipKas: `${base_url_api}atena/akuntansi/kas/ubah-status-jadi-slip`,
    cetakTransaksiKas: `${base_url_api}atena/akuntansi/kas/cetak/`,
    getStatusTransaksiKas: `${base_url_api}atena/akuntansi/kas/get-status-trans`,
    browseKasPelunasan: `${base_url_api}atena/akuntansi/kas/browse-for-pelunasan`,
    browseDaftarGiro: `${base_url_api}atena/akuntansi/giro/browse-daftar-giro`,
    // simpanTransaksiKas: `${base_url_api}atena/akuntansi/kas/simpan`,
    //Saldo Awal Perkiraan
    loadDataGridSaldoAwalPerkiraan: `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/load-data-grid`,
    loadDataHeaderSaldoAwalPerkiraan: `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/load-data-header`,
    simpanSaldoAwalPerkiraan: `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/simpan`,
    loadDataSaldoAwalPerkiraan: `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/load-data`,
    cetakSaldoAwalPerkiraan: `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/cetak/`,
    batalSaldoAwalPerkiraan: `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/batal-trans`,
    ubahStatusjadiInputSaldoAwalPerkiraan: `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/ubah-status-jadi-input`,
    ubahStatusjadiSlipSaldoAwalPerkiraan: `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/ubah-status-jadi-slip`,
    getStatusSaldoAwalPerkiraan: `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/get-status-trans`,
    browseJurnal: `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/browse-jurnal`,
    browseSaldoPerkiraan: `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/browse-saldo-perkiraan`,
    //Tutup Periode Akuntansi
    simpanTutupPeriodeAkuntansi: `${base_url_api}atena/akuntansi/tutup-periode-akuntansi/simpan`,
    batalTutupPeriodeAkuntansi: `${base_url_api}atena/akuntansi/tutup-periode-akuntansi/batal-trans`,
    browseTutupPeriodeAkuntansi: `${base_url_api}atena/akuntansi/tutup-periode-akuntansi/browse`,
    //Hitung HPP
    browseHitungHPP: `${base_url_api}atena/akuntansi/hitung-hpp/browse`,
    batalHitungHPP: `${base_url_api}atena/akuntansi/hitung-hpp/batal-trans`,
    simpanHitungHPP: `${base_url_api}atena/akuntansi/hitung-hpp/simpan`,
    cekAdjustmentHitungHPP: `${base_url_api}atena/akuntansi/hitung-hpp/cek-adjustment`,
    //Faktur Pajak
    loadTransaksiDataGridFakturPajak: `${base_url_api}atena/akuntansi/faktur-pajak/load-data-grid`,
    loadTransaksiDataHeaderFakturPajak: `${base_url_api}atena/akuntansi/faktur-pajak/load-data-header`,
    batalFakturPajak: `${base_url_api}atena/akuntansi/faktur-pajak/batal-trans`,
    ubahStatusjadiSlipFakturPajak: `${base_url_api}atena/akuntansi/faktur-pajak/ubah-status-jadi-slip`,
    ubahStatusjadiInputFakturPajak: `${base_url_api}atena/akuntansi/faktur-pajak/ubah-status-jadi-input`,
    cetakFakturPajak: `${base_url_api}atena/akuntansi/faktur-pajak/cetak/`,
    eksporCSVFakturPajak: `${base_url_api}atena/akuntansi/faktur-pajak/eksporCSV/`,
    ekporXMLFakturPajak: `${base_url_api}atena/akuntansi/faktur-pajak/eksporXML/`,
    eksporXMLRetailFakturPajak: `${base_url_api}atena/akuntansi/faktur-pajak/eksporXML-retail/`,
    getStatusFakturPajak: `${base_url_api}atena/akuntansi/faktur-pajak/get-status-trans`,
    simpanFakturPajak: `${base_url_api}atena/akuntansi/faktur-pajak/simpan`,
    loadDataFakturPajak: `${base_url_api}atena/akuntansi/faktur-pajak/load-data`,
    tampilTransaksiFakturPajak: `${base_url_api}atena/akuntansi/faktur-pajak/tampil-transaksi`,
    cekNoFakturPajak: `${base_url_api}atena/akuntansi/faktur-pajak/cek-no-faktur`,
    //Inventori Bukti Penerimaan Barang
    loadDataBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/load-data`,
    loadDataGridBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/load-data-grid`,
    loadDataGridPendingBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/load-data-grid-pending`,
    loadDataHeaderBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/load-data-header`,
    loadDataUangMukaPOBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/load-data-uang-muka-pesanan-pembelian`,
    loadDataBarcodeBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/load-data-barcode`,
    loadDataRekapBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/load-data-rekap`,
    ubahStatusJadiSlipBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/ubah-status-jadi-slip`,
    cetakBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/cetak/`,
    ubahStatusJadiInputBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/ubah-status-jadi-input`,
    batalTransaksiBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/batal-trans`,
    simpanBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/simpan`,
    passingHargaBeliTerakhir: `${base_url_api}atena/inventori/bukti-penerimaan-barang/passing-harga-beli-terakhir`,
    browseBBM: `${base_url_api}atena/inventori/bukti-penerimaan-barang/browse-bukti-penerimaan-barang`,
    loadDataDetailBarcodeBBM: `${base_url_api}atena/inventori/bukti-penerimaan-barang/load-data-detail-barcode`,
    laporanBuktiPenerimaanBarang: `${base_url_api}atena/inventori/bukti-penerimaan-barang/laporan`,
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
    loadDataHeaderPenjualanPenjualan: `${base_url_api}atena/penjualan/penjualan/load-data-header`,
    browseGridJual: `${base_url_api}atena/penjualan/penjualan/browse-jual`,
    laporanPenjualan: `${base_url_api}atena/penjualan/penjualan/laporan`,
    // pembelian retur pembelian
    loadDataHeaderReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/load-data-header`,
    loadConfigReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/load-config`,
    loadDataGridReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/load-data-grid`,
    batalTransaksiReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/batal-trans`,
    ubahStatusJadiInputReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/ubah-status-jadi-input`,
    ubahStatusJadiSlipReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/ubah-status-jadi-slip`,
    cetakReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/cetak/`,
    getStatusTransaksiReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/get-status-trans`,
    simpanReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/simpan`,
    loadDataReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/load-data`,
    cekTransaksiSudahAdaReturPembelian: `${base_url_api}atena/pembelian/retur-pembelian/cek-transaksi-sudah-ada-retur`,
    browsePembelian: `${base_url_api}atena/pembelian/pembelian/browse`,
    browseBarangPembelian: `${base_url_api}atena/pembelian/pembelian/browse-barang`,
    loadDataDetailBuktiPengeluaranBarang: `${base_url_api}atena/pembelian/bukti-pengeluaran-barang/load-data-detail`,
    browseReturBuktiPengeluaranBarang: `${base_url_api}atena/pembelian/bukti-pengeluaran-barang/browse-retur`,
    browsePenjualan: `${base_url_api}atena/penjualan/penjualan/browse`,
    browseBarangPenjualan: `${base_url_api}atena/penjualan/penjualan/browse-barang`,
    // Retur Penjualan
    loadDataGridReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/load-data-grid`,
    batalTransaksiReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/batal-trans`,
    ubahStatusJadiInputReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/ubah-status-jadi-input`,
    ubahStatusJadiSlipReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/ubah-status-jadi-slip`,
    cetakReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/cetak/`,
    cetakKecilReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/cetak-kecil/`,
    loadConfigReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/load-config`,
    loadDataTagihanReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/load-data-tagihan`,
    loadDataReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/load-data`,
    cekTransaksiSudahAdaReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/cek-transaksi-sudah-ada-retur`,
    simpanReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/simpan`,
    loadDataHeaderPenjualanReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/load-data-header`,
    browseBBMReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/browse-bukti-penerimaan-barang`,
    cekBisaBerlanjutReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/cek-bisa-berlanjut`,
    browseBarangReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/browse-barang-bukti-penerimaan-barang`,
    loadDataBBMReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/load-data-bukti-penerimaan-barang`,
    browseGridReturPenjualan: `${base_url_api}atena/penjualan/retur-penjualan/browse-retur-jual`,
    //Uang Muka SO
    loadDataGridUangMukaSO: `${base_url_api}atena/penjualan/uang-muka-pesanan-penjualan/load-data-grid`,
    loadDaftarUangMukaSO: `${base_url_api}atena/penjualan/uang-muka-pesanan-penjualan/load-daftar-uang-muka`,
    hapusUangMukaSO: `${base_url_api}atena/penjualan/uang-muka-pesanan-penjualan/hapus`,
    loadDataHeaderUangMukaSO: `${base_url_api}atena/penjualan/uang-muka-pesanan-penjualan/load-data-header`,
    simpanUangMukaSO: `${base_url_api}atena/penjualan/uang-muka-pesanan-penjualan/simpan`,
    // Sinkronisasi Bukti Pengeluaran
    tampilDataSBP: `${base_url_api}atena/penjualan/sinkronisasi-bukti-pengeluaran/tampil-data-sinkronisasi-bukti-pengeluaran`,
    kalkulasiRekapSBP: `${base_url_api}atena/penjualan/sinkronisasi-bukti-pengeluaran/kalkulasi-rekap-sinkronisasi-bukti-pengeluaran`,
    simpanDataSBP: `${base_url_api}atena/penjualan/sinkronisasi-bukti-pengeluaran/simpan-sinkronisasi-bukti-pengeluaran`,
    // Sinkronisasi Penjualan
    tampilDataSPJ: `${base_url_api}atena/penjualan/sinkronisasi-penjualan/tampil-data-sinkronisasi-penjualan`,
    simpanDataSPJ: `${base_url_api}atena/penjualan/sinkronisasi-penjualan/simpan-sinkronisasi-penjualan`,
    // Analisis Pesanan Pembelian
    loadDataHeaderAnalisisPesananPembelian: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/load-data-header`,
    loadConfigAnalisisPesananPembelian: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/load-config`,
    loadDataGridAnalisisPesananPembelian: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/load-data-grid`,
    batalTransAnalisiPesananPembelian: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/batal-trans`,
    ubahStatusJadiInputAnalisiPesananPembelian: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/ubah-status-jadi-input`,
    ubahStatusJadiSlipAnalisiPesananPembelian: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/ubah-status-jadi-slip`,
    cetakAnalisiPesananPembelian: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/cetak/`,
    getStatusTransAnalisiPesananPembelian: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/get-status-trans`,
    simpanAnalisisPesananPembelian: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/simpan`,
    loadDataAnalisisPesananPembelian: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/load-data`,
    loadBarangAnalisisPesananPembelian: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/load-barang`,
    loadBarangAnalisisPesananPembelianBySupplier: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/load-barang-by-supplier`,
    laporanAnalisisPesananPembelian: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/laporan`,
    browseLaporanAnalisisPesananPembelian: `${base_url_api}atena/pembelian/analisis-pesanan-pembelian/browse-laporan`,
    // uang muka PO
    loadDataHeaderUangMukaPO: `${base_url_api}atena/pembelian/uang-muka-pesanan-pembelian/load-data-header`,
    loadDataGridUangMukaPO: `${base_url_api}atena/pembelian/uang-muka-pesanan-pembelian/load-data-grid`,
    loadDaftarUangMukaPO: `${base_url_api}atena/pembelian/uang-muka-pesanan-pembelian/load-daftar-uang-muka`,
    hapusUangMukaPO: `${base_url_api}atena/pembelian/uang-muka-pesanan-pembelian/hapus`,
    simpanUangMukaPO: `${base_url_api}atena/pembelian/uang-muka-pesanan-pembelian/simpan`,
    //Keuangan
    //Saldo Awal Hutang
    loadDataGridSaldoAwalHutang: `${base_url_api}atena/keuangan/saldo-awal-hutang/load-data-grid`,
    loadDataHeaderSaldoAwalHutang: `${base_url_api}atena/keuangan/saldo-awal-hutang/load-data-header`,
    simpanSaldoAwalHutang: `${base_url_api}atena/keuangan/saldo-awal-hutang/simpan`,
    batalSaldoAwalHutang: `${base_url_api}atena/keuangan/saldo-awal-hutang/batal-trans`,
    getStatusSaldoAwalHutang: `${base_url_api}atena/keuangan/saldo-awal-hutang/get-status-trans`,
    //Saldo Awal Piutang
    loadDataGridSaldoAwalPiutang: `${base_url_api}atena/keuangan/saldo-awal-piutang/load-data-grid`,
    loadDataHeaderSaldoAwalPiutang: `${base_url_api}atena/keuangan/saldo-awal-piutang/load-data-header`,
    simpanSaldoAwalPiutang: `${base_url_api}atena/keuangan/saldo-awal-piutang/simpan`,
    batalSaldoAwalPiutang: `${base_url_api}atena/keuangan/saldo-awal-piutang/batal-trans`,
    getStatusSaldoAwalPiutang: `${base_url_api}atena/keuangan/saldo-awal-piutang/get-status-trans`,
    //Debet Note
    loadConfigDebetNote: `${base_url_api}atena/keuangan/nota-debit/load-config`,
    loadDataGridDebetNote: `${base_url_api}atena/keuangan/nota-debit/load-data-grid`,
    loadDataHeaderDebetNote: `${base_url_api}atena/keuangan/nota-debit/load-data-header`,
    simpanDebetNote: `${base_url_api}atena/keuangan/nota-debit/simpan`,
    batalDebetNote: `${base_url_api}atena/keuangan/nota-debit/batal-trans`,
    getStatusDebetNote: `${base_url_api}atena/keuangan/nota-debit/get-status-trans`,
    //Kredit Note
    loadConfigCreditNote: `${base_url_api}atena/keuangan/nota-kredit/load-config`,
    loadDataGridCreditNote: `${base_url_api}atena/keuangan/nota-kredit/load-data-grid`,
    loadDataHeaderCreditNote: `${base_url_api}atena/keuangan/nota-kredit/load-data-header`,
    simpanCreditNote: `${base_url_api}atena/keuangan/nota-kredit/simpan`,
    loadDataCreditNote: `${base_url_api}atena/keuangan/nota-kredit/load-data`,
    batalCreditNote: `${base_url_api}atena/keuangan/nota-kredit/batal-trans`,
    getStatusCreditNote: `${base_url_api}atena/keuangan/nota-kredit/get-status-trans`,
    //Pelunasan Hutang
    loadConfigPelunasanHutang: `${base_url_api}atena/keuangan/pelunasan-hutang/load-config`,
    loadDataGridPelunasanHutang: `${base_url_api}atena/keuangan/pelunasan-hutang/load-data-grid`,
    loadDataHeaderPelunasanHutang: `${base_url_api}atena/keuangan/pelunasan-hutang/load-data-header`,
    simpanPelunasanHutang: `${base_url_api}atena/keuangan/pelunasan-hutang/simpan`,
    loadDataPelunasanHutang: `${base_url_api}atena/keuangan/pelunasan-hutang/load-data`,
    cetakPelunasanHutang: `${base_url_api}atena/keuangan/pelunasan-hutang/cetak/`,
    batalPelunasanHutang: `${base_url_api}atena/keuangan/pelunasan-hutang/batal-trans`,
    ubahStatusjadiInputPelunasanHutang: `${base_url_api}atena/keuangan/pelunasan-hutang/ubah-status-jadi-input`,
    ubahStatusjadiSlipPelunasanHutang: `${base_url_api}atena/keuangan/pelunasan-hutang/ubah-status-jadi-slip`,
    getStatusPelunasanHutang: `${base_url_api}atena/keuangan/pelunasan-hutang/get-status-trans`,
    getJurnalLinkPelunasanHutang: `${base_url_api}atena/keuangan/pelunasan-hutang/get-jurnal-link`,
    browseTandaTerimaPelunasan: `${base_url_api}atena/keuangan/tanda-terima/browse-for-pelunasan`,
    loadHutangPelunasanHutang: `${base_url_api}atena/keuangan/pelunasan-hutang/load-hutang`,
    //Aset - Saldo Awal Aset
    loadDataGridSaldoAwalAset: `${base_url_api}atena/aset/saldo-awal-aset/load-data-grid`,
    getStatusSaldoAwalAset: `${base_url_api}atena/aset/saldo-awal-aset/get-status-trans`,
    batalTransSaldoAwalAset: `${base_url_api}atena/aset/saldo-awal-aset/batal-trans`,
    ubahStatusJadiInputSaldoAwalAset: `${base_url_api}atena/aset/saldo-awal-aset/ubah-status-jadi-input`,
    ubahStatusJadiSlipSaldoAwalAset: `${base_url_api}atena/aset/saldo-awal-aset/ubah-status-jadi-slip`,
    cetakSaldoAwalAset: `${base_url_api}atena/aset/saldo-awal-aset/cetak/`,
    loadConfigSaldoAwalAset: `${base_url_api}atena/aset/saldo-awal-aset/load-config`,
    loadDataSaldoAwalAset: `${base_url_api}atena/aset/saldo-awal-aset/load-data`,
    loadSatuanSaldoAwalAset: `${base_url_api}atena/aset/saldo-awal-aset/load-satuan`,
    loadDataHeaderSaldoAwalAset: `${base_url_api}atena/aset/saldo-awal-aset/load-data-header`,
    simpanSaldoAwalAset: `${base_url_api}atena/aset/saldo-awal-aset/simpan`,
    browseSaldoAset: `${base_url_api}atena/aset/saldo-awal-aset/browse-saldo-aset`,
    laporanSaldoAwalAset: `${base_url_api}atena/aset/saldo-awal-aset/laporan`,
    //Aset - Pembelian Aset
    loadConfigPembelianAset: `${base_url_api}atena/aset/pembelian-aset/load-config`,
    loadDataGridPembelianAset: `${base_url_api}atena/aset/pembelian-aset/load-data-grid`,
    loadDataPembelianAset: `${base_url_api}atena/aset/pembelian-aset/load-data`,
    loadDataHeaderPembelianAset: `${base_url_api}atena/aset/pembelian-aset/load-data-header`,
    cetakPembelianAset: `${base_url_api}atena/aset/pembelian-aset/cetak/`,
    batalTransPembelianAset: `${base_url_api}atena/aset/pembelian-aset/batal-trans`,
    ubahStatusJadiInputPembelianAset: `${base_url_api}atena/aset/pembelian-aset/ubah-status-jadi-input`,
    ubahStatusJadiSlipPembelianAset: `${base_url_api}atena/aset/pembelian-aset/ubah-status-jadi-slip`,
    browseAsetLaporan: `${base_url_api}atena/aset/pembelian-aset/browse-aset-laporan`,
    laporanPembelianAset: `${base_url_api}atena/aset/pembelian-aset/laporan`,
    //Pelunasan Piutang
    loadConfigPelunasanPiutang: `${base_url_api}atena/keuangan/pelunasan-piutang/load-config`,
    loadDataGridPelunasanPiutang: `${base_url_api}atena/keuangan/pelunasan-piutang/load-data-grid`,
    loadDataHeaderPelunasanPiutang: `${base_url_api}atena/keuangan/pelunasan-piutang/load-data-header`,
    simpanPelunasanPiutang: `${base_url_api}atena/keuangan/pelunasan-piutang/simpan`,
    loadDataPelunasanPiutang: `${base_url_api}atena/keuangan/pelunasan-piutang/load-data`,
    cetakPelunasanPiutang: `${base_url_api}atena/keuangan/pelunasan-piutang/cetak/`,
    batalPelunasanPiutang: `${base_url_api}atena/keuangan/pelunasan-piutang/batal-trans`,
    ubahStatusjadiInputPelunasanPiutang: `${base_url_api}atena/keuangan/pelunasan-piutang/ubah-status-jadi-input`,
    ubahStatusjadiSlipPelunasanPiutang: `${base_url_api}atena/keuangan/pelunasan-piutang/ubah-status-jadi-slip`,
    getStatusPelunasanPiutang: `${base_url_api}atena/keuangan/pelunasan-piutang/get-status-trans`,
    getJurnalLinkPelunasanPiutang: `${base_url_api}atena/keuangan/pelunasan-piutang/get-jurnal-link`,
    browseTandaTerimaPelunasan: `${base_url_api}atena/keuangan/tanda-terima/browse-for-pelunasan`,
    loadPiutangPelunasanPiutang: `${base_url_api}atena/keuangan/pelunasan-piutang/load-piutang`,
    //Tagihan Pelanggan
    loadConfigTagihanPelanggan: `${base_url_api}atena/keuangan/tagihan-pelanggan/load-config`,
    loadDataGridTagihanPelanggan: `${base_url_api}atena/keuangan/tagihan-pelanggan/load-data-grid`,
    loadDataHeaderTagihanPelanggan: `${base_url_api}atena/keuangan/tagihan-pelanggan/load-data-header`,
    simpanTagihanPelanggan: `${base_url_api}atena/keuangan/tagihan-pelanggan/simpan`,
    loadDataTagihanPelanggan: `${base_url_api}atena/keuangan/tagihan-pelanggan/load-data`,
    cetakTagihanPelanggan: `${base_url_api}atena/keuangan/tagihan-pelanggan/cetak/`,
    cetakF4TagihanPelanggan: `${base_url_api}atena/keuangan/tagihan-pelanggan/cetak-f4/`,
    batalTagihanPelanggan: `${base_url_api}atena/keuangan/tagihan-pelanggan/batal-trans`,
    ubahStatusjadiInputTagihanPelanggan: `${base_url_api}atena/keuangan/tagihan-pelanggan/ubah-status-jadi-input`,
    ubahStatusjadiSlipTagihanPelanggan: `${base_url_api}atena/keuangan/tagihan-pelanggan/ubah-status-jadi-slip`,
    getStatusTagihanPelanggan: `${base_url_api}atena/keuangan/tagihan-pelanggan/get-status-trans`,
    loadPiutangUangMukaTagihanPelanggan: `${base_url_api}atena/keuangan/tagihan-pelanggan/load-piutang-uang-muka`,
    //Tanda Terima
    loadConfigTandaTerima: `${base_url_api}atena/keuangan/tanda-terima/load-config`,
    loadDataGridTandaTerima: `${base_url_api}atena/keuangan/tanda-terima/load-data-grid`,
    loadDataGridApproveTandaTerima: `${base_url_api}atena/keuangan/tanda-terima/load-data-grid-approve`,
    loadDataHeaderTandaTerima: `${base_url_api}atena/keuangan/tanda-terima/load-data-header`,
    simpanTandaTerima: `${base_url_api}atena/keuangan/tanda-terima/simpan`,
    loadDataTandaTerima: `${base_url_api}atena/keuangan/tanda-terima/load-data`,
    cetakTandaTerima: `${base_url_api}atena/keuangan/tanda-terima/cetak/`,
    batalTandaTerima: `${base_url_api}atena/keuangan/tanda-terima/batal-trans`,
    ubahStatusjadiInputTandaTerima: `${base_url_api}atena/keuangan/tanda-terima/ubah-status-jadi-input`,
    ubahStatusjadiSlipTandaTerima: `${base_url_api}atena/keuangan/tanda-terima/ubah-status-jadi-slip`,
    getStatusTandaTerima: `${base_url_api}atena/keuangan/tanda-terima/get-status-trans`,
    loadHutangUangMukaTandaTerima: `${base_url_api}atena/keuangan/tanda-terima/load-hutang-uang-muka`,
    approveTandaTerima: `${base_url_api}atena/keuangan/tanda-terima/approve`,
    batalApproveTandaTerima: `${base_url_api}atena/keuangan/tanda-terima/batal-approve`,
    //Pelunasan Piutang Karyawan
    loadConfigPelunasanPiutangKaryawan: `${base_url_api}atena/keuangan/pelunasan-piutang-karyawan/load-config`,
    loadDataGridPelunasanPiutangKaryawan: `${base_url_api}atena/keuangan/pelunasan-piutang-karyawan/load-data-grid`,
    loadDataGridApprovePelunasanPiutangKaryawan: `${base_url_api}atena/keuangan/pelunasan-piutang-karyawan/load-data-grid-approve`,
    loadDataHeaderPelunasanPiutangKaryawan: `${base_url_api}atena/keuangan/pelunasan-piutang-karyawan/load-data-header`,
    simpanPelunasanPiutangKaryawan: `${base_url_api}atena/keuangan/pelunasan-piutang-karyawan/simpan`,
    loadDataPelunasanPiutangKaryawan: `${base_url_api}atena/keuangan/pelunasan-piutang-karyawan/load-data`,
    cetakPelunasanPiutangKaryawan: `${base_url_api}atena/keuangan/pelunasan-piutang-karyawan/cetak/`,
    batalPelunasanPiutangKaryawan: `${base_url_api}atena/keuangan/pelunasan-piutang-karyawan/batal-trans`,
    ubahStatusjadiInputPelunasanPiutangKaryawan: `${base_url_api}atena/keuangan/pelunasan-piutang-karyawan/ubah-status-jadi-input`,
    ubahStatusjadiSlipPelunasanPiutangKaryawan: `${base_url_api}atena/keuangan/pelunasan-piutang-karyawan/ubah-status-jadi-slip`,
    getStatusPelunasanPiutangKaryawan: `${base_url_api}atena/keuangan/pelunasan-piutang-karyawan/get-status-trans`,
    loadPiutangPelunasanPiutangKaryawan: `${base_url_api}atena/keuangan/pelunasan-piutang-karyawan/load-piutang`,
    getJurnalLinkPelunasanPiutangKaryawan: `${base_url_api}atena/keuangan/pelunasan-piutang-karyawan/get-jurnal-link`,
    //
    getStatusTransPembelianAset: `${base_url_api}atena/aset/pembelian-aset/get-status-trans`,
    browsePajak: `${base_url_api}atena/master/pajak/browse`,
    browseAsetPembelianAset: `${base_url_api}atena/aset/pembelian-aset/browse-aset`,
    browseReturPembelianAset: `${base_url_api}atena/aset/pembelian-aset/browse-retur-pembelian-aset`,
    browseAsetBeliPembelianAset: `${base_url_api}atena/aset/pembelian-aset/browse-aset-beli`,
    simpanPembelianAset: `${base_url_api}atena/aset/pembelian-aset/simpan`,
    //Aset - Retur Pembelian Aset
    loadDataGridReturPembelianAset: `${base_url_api}atena/aset/retur-pembelian-aset/load-data-grid`,
    loadConfigReturPembelianAset: `${base_url_api}atena/aset/retur-pembelian-aset/load-config`,
    loadDataReturPembelianAset: `${base_url_api}atena/aset/retur-pembelian-aset/load-data`,
    loadDataHeaderReturPembelianAset: `${base_url_api}atena/aset/retur-pembelian-aset/load-data-header`,
    getStatusTransReturPembelianAset: `${base_url_api}atena/aset/retur-pembelian-aset/get-status-trans`,
    batalTransReturPembelianAset: `${base_url_api}atena/aset/retur-pembelian-aset/batal-trans`,
    ubahStatusJadiInputReturPembelianAset: `${base_url_api}atena/aset/retur-pembelian-aset/ubah-status-jadi-input`,
    ubahStatusJadiSlipReturPembelianAset: `${base_url_api}atena/aset/retur-pembelian-aset/ubah-status-jadi-slip`,
    cetakReturPembelianAset: `${base_url_api}atena/aset/retur-pembelian-aset/cetak/`,
    simpanReturPembelianAset: `${base_url_api}atena/aset/retur-pembelian-aset/simpan`,
    browseAsetReturPembelianAset: `${base_url_api}atena/aset/retur-pembelian-aset/browse-aset`,
    browseAsetReturBeli: `${base_url_api}atena/aset/retur-pembelian-aset/browse-aset-retur-beli`,
    laporanReturPembelianAset: `${base_url_api}atena/aset/retur-pembelian-aset/laporan`,
    //Aset - Transfer Aset
    getStatusTransTransferAset: `${base_url_api}atena/aset/transfer-aset/get-status-trans`,
    cetakTransferAset: `${base_url_api}atena/aset/transfer-aset/cetak/`,
    batalTransTransferAset: `${base_url_api}atena/aset/transfer-aset/batal-trans`,
    ubahStatusJadiInputTransferAset: `${base_url_api}atena/aset/transfer-aset/ubah-status-jadi-input`,
    ubahStatusJadiSlipTransferAset: `${base_url_api}atena/aset/transfer-aset/ubah-status-jadi-slip`,
    loadDataGridTransferAset: `${base_url_api}atena/aset/transfer-aset/load-data-grid`,
    loadConfigTransferAset: `${base_url_api}atena/aset/transfer-aset/load-config`,
    loadDataHeaderTransferAset: `${base_url_api}atena/aset/transfer-aset/load-data-header`,
    simpanTransferAset: `${base_url_api}atena/aset/transfer-aset/simpan`,
    loadDataTransferAset: `${base_url_api}atena/aset/transfer-aset/load-data`,
    browseAsetTransferAset: `${base_url_api}atena/aset/transfer-aset/browse-aset`,
    browseAsetTransfer: `${base_url_api}atena/aset/transfer-aset/browse-aset-transfer`,
    laporanTransferAset: `${base_url_api}atena/aset/transfer-aset/laporan`,
    //Aset - Penghapusan Aset
    getStatusTransPenghapusanAset: `${base_url_api}atena/aset/penghapusan-aset/get-status-trans`,
    loadDataGridPenghapusanAset: `${base_url_api}atena/aset/penghapusan-aset/load-data-grid`,
    loadConfigPenghapusanAset: `${base_url_api}atena/aset/penghapusan-aset/load-config`,
    loadDataPenghapusanAset: `${base_url_api}atena/aset/penghapusan-aset/load-data`,
    batalTransPenghapusanAset: `${base_url_api}atena/aset/penghapusan-aset/batal-trans`,
    ubahStatusJadiInputPenghapusanAset: `${base_url_api}atena/aset/penghapusan-aset/ubah-status-jadi-input`,
    ubahStatusJadiSlipPenghapusanAset: `${base_url_api}atena/aset/penghapusan-aset/ubah-status-jadi-slip`,
    cetakPenghapusanAset: `${base_url_api}atena/aset/penghapusan-aset/cetak/`,
    simpanPenghapusanAset: `${base_url_api}atena/aset/penghapusan-aset/simpan`,
    browseAsetPenghapusanAset: `${base_url_api}atena/aset/penghapusan-aset/browse-aset`,
    hitungNilaiAsetPenghapusanAset: `${base_url_api}atena/aset/penghapusan-aset/hitung-nilai-aset`,
    browseAsetPenghapusan: `${base_url_api}atena/aset/penghapusan-aset/browse-aset-hapus`,
    laporanPenghapusanAset: `${base_url_api}atena/aset/penghapusan-aset/laporan`,
    //Aset - Penjualan Aset
    getStatusTransPenjualanAset: `${base_url_api}atena/aset/penjualan-aset/get-status-trans`,
    cetakPenjualanAset: `${base_url_api}atena/aset/penjualan-aset/cetak/`,
    batalTransPenjualanAset: `${base_url_api}atena/aset/penjualan-aset/batal-trans`,
    ubahStatusJadiInputPenjualanAset: `${base_url_api}atena/aset/penjualan-aset/ubah-status-jadi-input`,
    ubahStatusJadiSlipPenjualanAset: `${base_url_api}atena/aset/penjualan-aset/ubah-status-jadi-slip`,
    loadDataGridPenjualanAset: `${base_url_api}atena/aset/penjualan-aset/load-data-grid`,
    loadConfigPenjualanAset: `${base_url_api}atena/aset/penjualan-aset/load-config`,
    loadDataPenjualanAset: `${base_url_api}atena/aset/penjualan-aset/load-data`,
    loadDataHeaderPenjualanAset: `${base_url_api}atena/aset/penjualan-aset/load-data-header`,
    simpanPenjualanAset: `${base_url_api}atena/aset/penjualan-aset/simpan`,
    browseAsetPenjualanAset: `${base_url_api}atena/aset/penjualan-aset/browse-aset`,
    browseAsetPenjualan: `${base_url_api}atena/aset/penjualan-aset/browse-aset-jual`,
    laporanPenjualanAset: `${base_url_api}atena/aset/penjualan-aset/laporan`,
    //Aset - Penyusutan Aset
    loadDataGridPenyusutanAset: `${base_url_api}atena/aset/penyusutan-aset/load-data-grid`,
    loadConfigPenyusutanAset: `${base_url_api}atena/aset/penyusutan-aset/load-config`,
    loadDataHeaderPenyusutanAset: `${base_url_api}atena/aset/penyusutan-aset/load-data-header`,
    loadDataPenyusutanAset: `${base_url_api}atena/aset/penyusutan-aset/load-data`,
    getStatusTransPenyusutanAset: `${base_url_api}atena/aset/penyusutan-aset/get-status-trans`,
    cetakPenyusutanAset: `${base_url_api}atena/aset/penyusutan-aset/cetak/`,
    batalTransPenyusutanAset: `${base_url_api}atena/aset/penyusutan-aset/batal-trans`,
    ubahStatusJadiInputPenyusutanAset: `${base_url_api}atena/aset/penyusutan-aset/ubah-status-jadi-input`,
    ubahStatusJadiSlipPenyusutanAset: `${base_url_api}atena/aset/penyusutan-aset/ubah-status-jadi-slip`,
    hitungPenyusutanAset: `${base_url_api}atena/aset/penyusutan-aset/hitung-aset`,
    simpanPenyusutanAset: `${base_url_api}atena/aset/penyusutan-aset/simpan`,
    browseAsetPenyusutanAset: `${base_url_api}atena/aset/penyusutan-aset/browse-aset-susut`,
    laporanPenyusutanAset: `${base_url_api}atena/aset/penyusutan-aset/laporan`,
    // SETORAN PENJUALAN PER KASIR
    simpanSetorPenjualanPerKasir: `${base_url_api}atena/keuangan/setoran-penjualan-per-kasir/simpan`,
    tampilDataSetorPenjualanPerKasir: `${base_url_api}atena/keuangan/setoran-penjualan-per-kasir/tampil-data`,
    cekSudahPostingSetorPenjualanPerKasir: `${base_url_api}atena/keuangan/setoran-penjualan-per-kasir/cek-sudah-posting`,
    tampilDataSetoranSetorPenjualanPerKasir: `${base_url_api}atena/keuangan/setoran-penjualan-per-kasir/tampil-data-setoran`,
    hapusSetoranSetorPenjualanPerKasir: `${base_url_api}atena/keuangan/setoran-penjualan-per-kasir/hapus-setoran`,
    simpanDetailSetorPenjualanPerKasir: `${base_url_api}atena/keuangan/setoran-penjualan-per-kasir/simpan-detail-setoran`,
    tampilDataNonTunaiSetorPenjualanPerKasir: `${base_url_api}atena/keuangan/setoran-penjualan-per-kasir/tampil-data-non-tunai`,
    //Pelunasan Uang Muka SO
    loadConfigPelunasanUangMukaSO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-penjualan/load-config`,
    loadDataGridPelunasanUangMukaSO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-penjualan/load-data-grid`,
    loadDataGridApprovePelunasanUangMukaSO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-penjualan/load-data-grid-approve`,
    loadDataHeaderPelunasanUangMukaSO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-penjualan/load-data-header`,
    simpanPelunasanUangMukaSO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-penjualan/simpan`,
    loadDataPelunasanUangMukaSO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-penjualan/load-data`,
    cetakPelunasanUangMukaSO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-penjualan/cetak/`,
    batalPelunasanUangMukaSO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-penjualan/batal-trans`,
    ubahStatusjadiInputPelunasanUangMukaSO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-penjualan/ubah-status-jadi-input`,
    ubahStatusjadiSlipPelunasanUangMukaSO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-penjualan/ubah-status-jadi-slip`,
    getStatusPelunasanUangMukaSO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-penjualan/get-status-trans`,
    loadKartuUangMukaPelunasanUangMukaSO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-penjualan/load-kartu-uang-muka`,
    getJurnalLinkPelunasanUangMukaSO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-penjualan/get-jurnal-link`,
    //Pelunasan Uang Muka PO
    loadConfigPelunasanUangMukaPO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-pembelian/load-config`,
    loadDataGridPelunasanUangMukaPO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-pembelian/load-data-grid`,
    loadDataGridApprovePelunasanUangMukaPO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-pembelian/load-data-grid-approve`,
    loadDataHeaderPelunasanUangMukaPO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-pembelian/load-data-header`,
    simpanPelunasanUangMukaPO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-pembelian/simpan`,
    loadDataPelunasanUangMukaPO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-pembelian/load-data`,
    cetakPelunasanUangMukaPO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-pembelian/cetak/`,
    batalPelunasanUangMukaPO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-pembelian/batal-trans`,
    ubahStatusjadiInputPelunasanUangMukaPO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-pembelian/ubah-status-jadi-input`,
    ubahStatusjadiSlipPelunasanUangMukaPO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-pembelian/ubah-status-jadi-slip`,
    getStatusPelunasanUangMukaPO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-pembelian/get-status-trans`,
    loadKartuUangMukaPelunasanUangMukaPO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-pembelian/load-kartu-uang-muka`,
    getJurnalLinkPelunasanUangMukaPO: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-pembelian/get-jurnal-link`,
    //HUTANG LAIN
    loadDataGridHutangLain: `${base_url_api}atena/keuangan/hutang-lain/load-data-grid`,
    loadDataHeaderHutangLain: `${base_url_api}atena/keuangan/hutang-lain/load-data-header`,
    simpanHutangLain: `${base_url_api}atena/keuangan/hutang-lain/simpan`,
    batalHutangLain: `${base_url_api}atena/keuangan/hutang-lain/batal-trans`,
    getStatusHutangLain: `${base_url_api}atena/keuangan/hutang-lain/get-status-trans`,
    //PIUTANG LAIN
    loadDataGridPiutangLain: `${base_url_api}atena/keuangan/piutang-lain/load-data-grid`,
    loadDataHeaderPiutangLain: `${base_url_api}atena/keuangan/piutang-lain/load-data-header`,
    simpanPiutangLain: `${base_url_api}atena/keuangan/piutang-lain/simpan`,
    batalPiutangLain: `${base_url_api}atena/keuangan/piutang-lain/batal-trans`,
    getStatusPiutangLain: `${base_url_api}atena/keuangan/piutang-lain/get-status-trans`,
    //Laporan
    laporanKartuStok: `${base_url_api}atena/inventori/kartu-stok/laporan`,
    laporanMutasiStok: `${base_url_api}atena/inventori/mutasi-stok/laporan`,
    laporanPosisiStok: `${base_url_api}atena/inventori/posisi-stok/laporan`,
    laporanCreditNote: `${base_url_api}atena/keuangan/nota-kredit/laporan`,
    laporanDebitNote: `${base_url_api}atena/keuangan/nota-debit/laporan`,
    laporanHutang: `${base_url_api}atena/keuangan/hutang/laporan`,
    laporanPiutangKaryawan: `${base_url_api}atena/keuangan/pelunasan-piutang-karyawan/laporan`,
    laporanPiutang: `${base_url_api}atena/keuangan/pelunasan-piutang/laporan`,
    laporanTagihanCustomer: `${base_url_api}atena/keuangan/tagihan-pelanggan/laporan`,
    laporanUangMukaPembelian: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-pembelian/laporan`,
    laporanUangMukaPenjualan: `${base_url_api}atena/keuangan/pelunasan-uang-muka-pesanan-penjualan/laporan`,
    laporanTandaTerimaSupplier: `${base_url_api}atena/keuangan/tanda-terima/laporan`,
    //Akuntansi Laporan
    laporanBukuBesar: `${base_url_api}atena/akuntansi/buku-besar/laporan`,
    laporanDaftarGiro: `${base_url_api}atena/akuntansi/giro/laporan`,
    laporanJurnalTransaksi: `${base_url_api}atena/akuntansi/jurnal-transaksi/laporan`,
    laporanKas: `${base_url_api}atena/akuntansi/kas/laporan`,
    laporanLabaRugi: `${base_url_api}atena/akuntansi/laba-rugi/laporan`,
    laporanNeracaMutasi: `${base_url_api}atena/akuntansi/neraca-mutasi/laporan`,
    laporanNeraca: `${base_url_api}atena/akuntansi/neraca/laporan`,
    laporanSaldoAwalPerkiraan: `${base_url_api}atena/akuntansi/saldo-awal-perkiraan/laporan`,
    //Aset Laporan
    laporanAset: `${base_url_api}atena/aset/aset/laporan`,

};

var modul_kode = {
    pembelian: "B93JH",
    penjualan: "OI02K",
    inventori: "92DXS",
    produksi: "3K93J",
    aset: "93JK4",
    keuangan: "L03KD",
    akuntansi: "P02MS",
};

const operatorData = {
    String: [
        { value: "ADALAH", text: "Adalah" },
        { value: "TIDAK MENCAKUP", text: "Tidak Mencakup" },
        { value: "BERISI KATA", text: "Berisi kata" },
        { value: "TIDAK BERISI KATA", text: "Tidak berisi kata" },
        { value: "DIMULAI DENGAN", text: "Dimulai dengan" },
        { value: "TIDAK DIMULAI DENGAN", text: "Tidak dimulai dengan" },
        { value: "DIAKHIRI DENGAN", text: "Diakhiri dengan" },
        { value: "TIDAK DIAKHIRI DENGAN", text: "Tidak diakhiri dengan" },
        { value: "LEBIH DARI SAMA DENGAN", text: "Lebih dari sama dengan" },
        { value: "KURANG DARI SAMA DENGAN", text: "Kurang dari sama dengan" },
        { value: "KOSONG", text: "Kosong" },
        { value: "TIDAK KOSONG", text: "Tidak kosong" },
    ],
    Number: [
        { value: "SAMA DENGAN", text: "Sama dengan" },
        { value: "TIDAK MENCAKUP", text: "Tidak sama dengan" },
        { value: "LEBIH BESAR DARI", text: "Lebih besar dari" },
        { value: "LEBIH BESAR SAMA DENGAN", text: "Lebih besar sama dengan" },
        { value: "LEBIH KECIL DARI", text: "Lebih kecil dari" },
        { value: "LEBIH KECIL SAMA DENGAN", text: "Lebih kecil sama dengan" },
        { value: "NOL", text: "Nol" },
        { value: "TIDAK NOL", text: "Tidak nol" },
    ],
};

function getDateMinusDays(days) {
    const today = new Date();
    today.setDate(today.getDate() - days);

    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, "0"); // bulan dimulai dari 0
    const day = String(today.getDate()).padStart(2, "0");

    return `${year}-${month}-${day}`;
}

function getTextError(error) {
    return `Kami mengalami sedikit masalah dalam memproses permintaan Anda.<br>
                        Detail: ${error}<br> Harap ambil tangkapan layar lalu hubungi administrator.`;
}

async function set_ppn_aktif(tanggal, token, onSuccess) {
    if (tanggal == "") {
        return false;
    }
    try {
        let url = link_api.getPPNAktif;
        const response = await fetch(url, {
            method: "POST",

            headers: {
                Authorization: token,
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                tglaktif: tanggal,
            }),
        }).then((response) => {
            if (!response.ok) {
                throw new Error(
                    `HTTP error! status: ${response.status} from ${url}`
                );
            }
            return response.json();
        });
        if (response.success && onSuccess) {
            await onSuccess(response);
        } else {
            $.messager.alert("Error", response.message, "error");
        }
    } catch (error) {
        console.log(error);
        var textError = getTextError(error);
        $.messager.alert("Error", getTextError(error), "error");
    }
}

async function get_akses_user(
    kodeMenu,
    token,
    onSuccess,
    useLoader = true,
    onError = null
) {
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
            const errorMessage = `HTTP error! Status: ${
                response.status
            }. Message: ${errorBody || "No specific error message."}`;
            const error = new Error(errorMessage);

            if (onError && typeof onError === "function") {
                onError(error); // Panggil onError jika disediakan
            } else {
                if (errorBody.toLowerCase() == tokenTidakValid) {
                    $.messager.alert(
                        "Error",
                        "Sesi login telah habis. Silahkan logout dan login kembali",
                        "error"
                    );
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
                if ((data.message ?? "").toLowerCase() == tokenTidakValid) {
                    texterror = "Sesi login telah habis. Silahkan login ulang";
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
            const errorMessage = `HTTP error! Status: ${
                response.status
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
                if ((data.message ?? "").toLowerCase() == tokenTidakValid) {
                    texterror = "Sesi login telah habis. Silahkan login ulang";
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
            method: "POST",
            headers: {
                Authorization: token,
                "Content-Type": "application/json",
            },
            body: JSON.stringify(param),
        }).then((response) => {
            if (!response.ok) {
                throw new Error(
                    `HTTP error! status: ${response.status} from ${url}`
                );
            }
            return response.json();
        });

        if (response.success) {
            status = response.data.status;
        } else {
            if (response.message.toLowerCase() == tokenTidakValid) {
                $.messager.alert(
                    "Error",
                    "Sesi login telah habis. Silahkan logout dan login kembali",
                    "error"
                );
            } else {
                $.messager.alert("Error", response.message, "error");
            }
        }
    } catch (error) {
        var textError = getTextError(error);
        $.messager.alert("Error", getTextError(error), "error");
    }
    return status;
};

async function downloadXML(apiUrl, uuid, token = null) {
    try {
        const url = apiUrl + uuid;

        const authToken = token;

        const response = await fetch(url, {
            method: "POST",
            headers: {
                Authorization: `bearer ${authToken}`,
                "Content-Type": "application/json",
            },
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const xmlText = await response.text();

        // Ambil filename dari Content-Disposition header
        const contentDisposition = response.headers.get("Content-Disposition");
        let filename = "download.xml"; // fallback filename

        if (contentDisposition) {
            const filenameMatch = contentDisposition.match(
                /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/
            );
            if (filenameMatch && filenameMatch[1]) {
                filename = filenameMatch[1].replace(/['"]/g, "");
            }
        }

        const blob = new Blob([xmlText], { type: "application/xml" });
        const downloadUrl = window.URL.createObjectURL(blob);

        const a = document.createElement("a");
        a.href = downloadUrl;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.URL.revokeObjectURL(downloadUrl);

        return true;
    } catch (error) {
        console.error("Error download XML:", error);
        alert("Gagal mengunduh file XML: " + error.message);
        return false;
    }
}

async function downloadCSV(apiUrl, uuid, token = null) {
    try {
        const url = apiUrl + uuid;

        // Gunakan token yang diberikan atau ambil dari session
        const authToken = token;

        const response = await fetch(url, {
            method: "POST",
            headers: {
                Authorization: `bearer ${authToken}`,
                "Content-Type": "application/json",
            },
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const csvText = await response.text();

        // Ambil filename dari Content-Disposition header
        const contentDisposition = response.headers.get("Content-Disposition");
        let filename = "download.csv"; // fallback filename

        if (contentDisposition) {
            const filenameMatch = contentDisposition.match(
                /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/
            );
            if (filenameMatch && filenameMatch[1]) {
                filename = filenameMatch[1].replace(/['"]/g, "");
            }
        }

        const blob = new Blob([csvText], { type: "text/csv" });
        const downloadUrl = window.URL.createObjectURL(blob);

        const a = document.createElement("a");
        a.href = downloadUrl;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.URL.revokeObjectURL(downloadUrl);

        return true;
    } catch (error) {
        console.error("Error download CSV:", error);
        alert("Gagal mengunduh file CSV: " + error.message);
        return false;
    }
}

/**
 * Mengunduh file berdasarkan url yang diberikan.
 * Method ini akan mengembalikan string isi dari file yang diunduh.
 * Jika terjadi error, maka akan menampilkan alert error dan mengembalikan null.
 *
 * @param {string} url - url untuk mengunduh file
 * @param {string} token - token untuk autentikasi
 * @param {object} body - data yang akan dikirim dalam bentuk JSON
 * @return {Promise<string|null>} - string isi dari file yang diunduh atau null jika terjadi error
 */
async function getCetakDocument(url, token, body) {
    try {
        const response = await fetch(url, {
            method: "POST",
            headers: {
                Authorization: "Bearer " + token,
                "Content-Type": "application/json",
            },
            body: body ? JSON.stringify(body) : null,
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        return await response.text();
    } catch (e) {
        showErrorAlert(e);
        return null;
    }
}

/**
 * Menampilkan pesan error menggunakan jQuery Messager.
 * Jika error adalah token tidak valid, maka akan menampilkan pesan
 * "Sesi login telah habis. Silahkan login ulang".
 *
 * @param {Error} e - Error yang terjadi
 */
function showErrorAlert(e) {
    let error;

    if (typeof e === "string") {
        error = e;
    } else if (e && e.message) {
        error = e.message;
    } else if (e) {
        error = String(e);
    } else {
        error = "Terdapat kesalahan dalam memproses data.";
    }

    let textError = getTextError(error);
    if (textError.includes(tokenTidakValid)) {
        textError = "Sesi login telah habis. Silahkan login ulang";
    }
    $.messager.alert("Error", textError, "error");
}

/**
 * Mengambil data operator berdasarkan tipe data dan mengisi elemen <select> yang dituju.
 * @param {string} tipeData - Tipe data yang dicari ("String" atau "Number").
 * @param {string} selectId - ID dari elemen <select> yang akan diisi.
 */
function isiOperatorLaporan(tipeData, selectId) {
    const selectElement = document.getElementById(selectId);

    // Validasi elemen dan data
    if (!selectElement) {
        console.error(
            `Elemen <select> dengan ID: ${selectId} tidak ditemukan.`
        );
        return;
    }
    const operators = operatorData[tipeData];
    if (!operators) {
        console.error(`Operator untuk tipe data: ${tipeData} tidak ditemukan.`);
        return;
    }

    // Kosongkan elemen select yang sudah ada
    selectElement.innerHTML = "";

    // Membuat dan menambahkan opsi
    // Menggunakan DocumentFragment untuk meminimalkan manipulasi DOM
    const fragment = document.createDocumentFragment();

    operators.forEach((operator) => {
        const option = document.createElement("option");
        option.value = operator.value;
        option.textContent = operator.text;
        fragment.appendChild(option);
    });

    // Masukkan semua opsi ke dalam <select> hanya dalam satu operasi DOM
    selectElement.appendChild(fragment);

    $("#" + selectId).combobox("loadData", operators);
}

/**
 * Mengisi elemen <select> dengan kode lokasi berdasarkan token yang diberikan.
 * Method ini akan mengembalikan array kode lokasi yang diambil dari API.
 * Jika terjadi error, maka akan menampilkan alert error dan mengembalikan null.
 *
 * @param {string} token - token untuk autentikasi
 * @param {string[]} ids - array ID dari elemen <select> yang akan diisi
 * @return {Promise<string[]>} - array kode lokasi yang diambil dari API atau null jika terjadi error
 */
async function setLokasiCombogrid(token, ids = []) {
    try {
        const response = await fetch(link_api.browseLokasi, {
            method: "POST",
            headers: {
                "Authorization": "Bearer " + token,
                "Content-Type": "application/json",
            },
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const res = await response.json();
        if (res.success) {
            var arrayLokasi = [];

            for (var i = 0; i < res.data.length; i++) {
                arrayLokasi.push(res.data[i].kode);
            }

            for (var i = 0; i < ids.length; i++) {
                $(ids[i]).combogrid("setValue", arrayLokasi);
            }
        }
    } catch (e) {
        showErrorAlert(e);
    }
}
