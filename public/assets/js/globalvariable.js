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
  headerFormPerkiraan:`${base_url_api}atena/master/perkiraan/load-data-header`,
  browseHeaderPerkiraan:`${base_url_api}atena/master/perkiraan/browse-header`,
  simpanPerkiraan:`${base_url_api}atena/master/perkiraan/simpan`,
  getPerkiraanUser:`${base_url_api}atena/master/perkiraan/load-perkiraan-user`,
  getPerkiraanLokasi:`${base_url_api}`, //API belum dibuat
  browsePerkiraan:`${base_url_api}atena/master/perkiraan/browse`,
  //currency
  browseCurrency: `${base_url_api}atena/master/currency/browse`,
  loadDataGridCurrency: `${base_url_api}atena/master/currency/load-data-grid`,
  hapusCurrency: `${base_url_api}atena/master/currency/hapus`,
  loadHeaderCurrency:`${base_url_api}atena/master/currency/load-data-header`,
  simpanCurrency: `${base_url_api}atena/master/currency/simpan`,
  //user
  userGetAll:`${base_url_api}atena/master/user/load-all`,
  loadDataGridMasterUser: `${base_url_api}atena/master/user/load-data-grid`,
  simpanUser:`${base_url_api}atena/master/user/simpan`,
  treeGridUser:`${base_url_api}atena/master/user/load-tree-grid`,
  treeGridPosUser:`${base_url_api}atena/master/user/load-tree-grid-pos`,
  treeGridPosDesktopUser:`${base_url_api}atena/master/user/load-tree-grid-pos-desktop`,
  browseUser:`${base_url_api}atena/master/user/browse`,
  userGetDataPerkiraan:`${base_url_api}atena/master/user/load-data-perkiraan`,
  getJamAksesUser:`${base_url_api}atena/master/user/load-data-jam-akses`,
  getDahboardAksesUser:`${base_url_api}atena/master/user/load-data-akses-dashboard`,
  headerFormUser:`${base_url_api}atena/master/user/load-data-header`,
  //lokasi
  getLokasiAll:`${base_url_api}atena/master/lokasi/load-all`,
  getLokasiPerUser:`${base_url_api}atena/master/lokasi/load-lokasi-per-user`,
  getLokasiTransferPerUser:`${base_url_api}atena/master/lokasi/load-lokasi-transfer-per-user`,
  loadDataGridLokasi:`${base_url_api}atena/master/lokasi/load-data-grid`,
  hapusLokasi:`${base_url_api}atena/master/lokasi/hapus`,
  getHeaderLokasi:`${base_url_api}atena/master/lokasi/load-lokasi-header`,
  getLokasiDefault:`${base_url_api}atena/master/lokasi/cek-lokasi-default`,
  simpanLokasi:`${base_url_api}atena/master/lokasi/simpan`,
};

async function get_akses_user(kodeMenu, token, onSuccess, onError = null) {
  bukaLoader();
  try {
    const response = await fetch(link_api.getDataAkses, {
      method: 'POST',
      headers: {
        'Authorization': token,
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        "kodemenu":kodeMenu
      }),
    }).then(response => response.json())

    // Memeriksa apakah respons HTTP OK (status 200-299)
    if (!response.success) {
      const errorBody = await response.text(); // Ambil teks error dari server jika ada
      const errorMessage = `HTTP error! Status: ${response.status}. Message: ${errorBody || 'No specific error message.'}`;
      const error = new Error(errorMessage);

      if (onError && typeof onError === 'function') {
        onError(error); // Panggil onError jika disediakan
      } else {
        console.error('Error fetching data:', error);
      }
      return; // Hentikan eksekusi
    }

    // Parsing respons sebagai JSON
    // const data = await response.json();
    const data = response;

    // Panggil fungsi onSuccess dan teruskan data yang telah di-parse
    if (onSuccess && typeof onSuccess === 'function') {
      onSuccess(data);
    } else {
      console.warn('onSuccess callback not provided or not a function.');
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

async function getConfig(config,modul, token, onSuccess, onError = null) {
  bukaLoader();
  try {
    const response = await fetch(link_api.getConfig, {
      method: 'POST',
      headers: {
        'Authorization': token,
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        "modul":modul,
        "config":config,
      }),
    });

    // Memeriksa apakah respons HTTP OK (status 200-299)
    if (!response.ok) {
      const errorBody = await response.text(); // Ambil teks error dari server jika ada
      const errorMessage = `HTTP error! Status: ${response.status}. Message: ${errorBody || 'No specific error message.'}`;
      const error = new Error(errorMessage);

      if (onError && typeof onError === 'function') {
        onError(error); // Panggil onError jika disediakan
      } else {
        console.error('Error fetching data:', error);
      }

      tutupLoader();
      return; // Hentikan eksekusi
    }

    // Parsing respons sebagai JSON
    const data = await response.json();

    // Panggil fungsi onSuccess dan teruskan data yang telah di-parse
    if (onSuccess && typeof onSuccess === 'function') {
      if (!data.success) {
        $.messager.alert('error', data.message, 'error');
        tutupLoader();
        return null;
      } else {
        onSuccess(data);
        tutupLoader();
      }
    } else {
      tutupLoader();
      console.warn('onSuccess callback not provided or not a function.');
    }

  } catch (error) {
    console.log(error);

    tutupLoader();
  }
}

async function getConfig(config, modul, token,  onSuccess, onError = null) {
  bukaLoader();
  try {
    const response = await fetch(link_api.getConfig, {
      method: 'POST',
      headers: {
        'Authorization': token,
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        "modul": modul,
        "config": config,
      }),
    });

    // Memeriksa apakah respons HTTP OK (status 200-299)
    if (!response.ok) {
      const errorBody = await response.text(); // Ambil teks error dari server jika ada
      const errorMessage = `HTTP error! Status: ${response.status}. Message: ${errorBody || 'No specific error message.'}`;
      const error = new Error(errorMessage);

      if (onError && typeof onError === 'function') {
        onError(error); // Panggil onError jika disediakan
      } else {
        console.error('Error fetching data:', error);
      }

      tutupLoader();
      return; // Hentikan eksekusi
    }

    // Parsing respons sebagai JSON
    const data = await response.json();

    // Panggil fungsi onSuccess dan teruskan data yang telah di-parse
    if (onSuccess && typeof onSuccess === 'function') {
      if (!data.success) {
        $.messager.alert('error', data.message, 'error');
        tutupLoader();
        return null;
      } else {
        onSuccess(data);
      }
    } else {
      console.warn('onSuccess callback not provided or not a function.');
    }

    tutupLoader();
  } catch (error) {
    // Menangani error jaringan atau parsing JSON
    console.error('Network or parsing error:', error);
    if (onError && typeof onError === 'function') {
      onError(error); // Panggil onError jika disediakan
    } else {
      console.error('An unexpected error occurred:', error);
    }

    tutupLoader();
  }
}

