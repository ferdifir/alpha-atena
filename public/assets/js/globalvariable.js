var base_url_api = "http://192.168.1.43:8000/api/";
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
    //ekspedisi
    loadDataGridMasterEkspedisi: `${base_url_api}atena/master/ekspedisi/load-data-grid`,
    browseBadanUsahaEkspedisi: `${base_url_api}atena/master/ekspedisi/browse-badan-usaha`,
    headerFormEkspedisi: `${base_url_api}atena/master/ekspedisi/load-data-header`,
    simpanEkspedisi: `${base_url_api}atena/master/ekspedisi/simpan`,
    hapusEkspedisi: `${base_url_api}atena/master/ekspedisi/hapus`,
    //tipe customer
    browseTipeCustomer: `${base_url_api}atena/master/tipecustomer/browse`,
    simpanTipeCustomer: `${base_url_api}atena/master/tipecustomer/simpan`,
    //harga jual
    browseBarang: `${base_url_api}atena/master/barang/browse`,
    browseBarangAll: `${base_url_api}atena/master/barang/browse-all`,
    loadHargaJualTerakhirPerSatuan: `${base_url_api}atena/master/hargajual/load-harga-jual-terakhir-per-satuan`,
    browseSupplier: `${base_url_api}atena/master/supplier/browse`,
    browseFilterMerk: `${base_url_api}atena/master/hargajual/browse-daftar-filter-merk`,
    browseFilterKategori: `${base_url_api}atena/master/hargajual/browse-daftar-filter-kategori`,
    browseLokasi: `${base_url_api}atena/master/lokasi/browse`,
    browseTglAktifSatuan: `${base_url_api}atena/master/hargajual/browse-tgl-aktif-satuan`,
    browseTglAktifTipeCustomer: `${base_url_api}atena/master/hargajual/browse-tgl-aktif-tipe-customer`,
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
    browseCustomer: `${base_url_api}atena/master/customer/browse`,
};

async function get_akses_user(kodeMenu, token, onSuccess, onError = null) {
    bukaLoader();
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
            return; // Hentikan eksekusi
        }

        // Parsing respons sebagai JSON
        // const data = await response.json();
        const data = response;

        // Panggil fungsi onSuccess dan teruskan data yang telah di-parse
        if (onSuccess && typeof onSuccess === "function") {
            onSuccess(data);
        } else {
            console.warn("onSuccess callback not provided or not a function.");
        }
    } catch (error) {
        console.log(error);
        // Menangani error jaringan atau parsing JSON
        // console.error('Network or parsing error:', error);
        // if (onError && typeof onError === 'function') {
        //   onError(error); // Panggil onError jika disediakan
        // } else {
        //   console.error('An unexpected error occurred:', error);
        // }
    }
    tutupLoader();
}

async function getConfig(config, modul, token, onSuccess, onError = null) {
    bukaLoader();
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

            tutupLoader();
            return; // Hentikan eksekusi
        }

        // Parsing respons sebagai JSON
        const data = await response.json();

        // Panggil fungsi onSuccess dan teruskan data yang telah di-parse
        if (onSuccess && typeof onSuccess === "function") {
            if (!data.success) {
                $.messager.alert("error", data.message, "error");
                tutupLoader();
                return null;
            } else {
                onSuccess(data);
                tutupLoader();
            }
        } else {
            tutupLoader();
            console.warn("onSuccess callback not provided or not a function.");
        }
    } catch (error) {
        console.log(error);

        tutupLoader();
    }
}

async function getConfig(config, modul, token, onSuccess, onError = null) {
    bukaLoader();
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

            tutupLoader();
            return; // Hentikan eksekusi
        }

        // Parsing respons sebagai JSON
        const data = await response.json();

        // Panggil fungsi onSuccess dan teruskan data yang telah di-parse
        if (onSuccess && typeof onSuccess === "function") {
            if (!data.success) {
                $.messager.alert("error", data.message, "error");
                tutupLoader();
                return null;
            } else {
                onSuccess(data);
            }
        } else {
            console.warn("onSuccess callback not provided or not a function.");
        }

        tutupLoader();
    } catch (error) {
        // Menangani error jaringan atau parsing JSON
        console.error("Network or parsing error:", error);
        if (onError && typeof onError === "function") {
            onError(error); // Panggil onError jika disediakan
        } else {
            console.error("An unexpected error occurred:", error);
        }

        tutupLoader();
    }
}
