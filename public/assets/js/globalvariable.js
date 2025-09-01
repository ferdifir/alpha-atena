var base_url_api = "http://192.168.1.45:8000/api/";
function getDateMinusDays(days) {
    const today = new Date();
    today.setDate(today.getDate() - days);

    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0'); // bulan dimulai dari 0
    const day = String(today.getDate()).padStart(2, '0');

    return `${year}-${month}-${day}`;
}
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
    getLokasiDefault: `${base_url_api}atena/master/lokasi/cek-lokasi-default`,
    simpanLokasi: `${base_url_api}atena/master/lokasi/simpan`,
    browseLokasi: `${base_url_api}atena/master/lokasi/browse`,
    //Merk
    hapusMerk: `${base_url_api}atena/master/merk/hapus`,
    loadDataGridMerk: `${base_url_api}atena/master/merk/load-data-grid`,
    simpanMerk: `${base_url_api}atena/master/merk/simpan`,
    getHeaderMerk: `${base_url_api}atena/master/merk/load-data-header`,
    //supplier
    loadDataGridMasterSupplier: `${base_url_api}atena/master/supplier/load-data-grid`,
    hapusSupplier: `${base_url_api}atena/master/supplier/hapus`,
    browseSyaratBayar: `${base_url_api}atena/master/syaratbayar/browse`,
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
    //jenis pemakaian
    simpanJenisPemakaian: `${base_url_api}atena/master/jenispemakaian/simpan`,
    getHeaderJenisPemakaian: `${base_url_api}atena/master/jenispemakaian/load-data-header`,
    loadDataGridJenisPemakaian: `${base_url_api}atena/master/jenispemakaian/load-data-grid`,
    hapusJenisPemakaian: `${base_url_api}atena/master/jenispemakaian/hapus`,
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
    simpanSettingAset: `${base_url_api}atena/master/pengaturan/aset/simpan`,
    loadConfigMaster: `${base_url_api}atena/master/pengaturan/master/load-data-config`,
    loadConfigPembelian: `${base_url_api}atena/master/pengaturan/pembelian/load-data-config`,
    loadConfigPenjualan: `${base_url_api}atena/master/pengaturan/penjualan/load-data-config`,
    loadConfigInventori: `${base_url_api}atena/master/pengaturan/inventori/load-data-config`,
    loadConfigAset: `${base_url_api}atena/master/pengaturan/aset/load-data-config`,
    generateCodeMaster: `${base_url_api}atena/master/pengaturan/master/generate-kode`,
    generateCodePembelian: `${base_url_api}atena/master/pengaturan/pembelian/generate-kode`,
    generateCodePenjualan: `${base_url_api}atena/master/pengaturan/penjualan/generate-kode`,
    generateCodeInventori: `${base_url_api}atena/master/pengaturan/inventori/generate-kode`,
    generateCodeAset: `${base_url_api}atena/master/pengaturan/aset/generate-kode`,
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
    loadDataDetailInventoryTransfer: `${base_url_api}atena/pembelian/permintaan-barang/load-data-detail-transfer`,
    brosweInventoryTransfer: `${base_url_api}atena/pembelian/permintaan-barang/browse-transfer`,
    hitungStokInventoryTransfer: `${base_url_api}atena/master/barang/hitung-stok-transaksi`,
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

function getTextError(error) {
    return `Kami mengalami sedikit masalah dalam memproses permintaan Anda.\n
                        Detail: ${error}\n Harap ambil tangkapan layar lalu hubungi administrator.`;
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
            status=response.data.status;
        } else {
            $.messager.alert('Error', response.message, 'error');
        }
    } catch (error) {
        var textError = getTextError(error);
        $.messager.alert('Error', getTextError(error), 'error');
    }
    return status;
}
