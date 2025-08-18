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
  //currency
  browseCurrency: `${base_url_api}atena/master/currency/browse`,
  loadDataGridCurrency: `${base_url_api}atena/master/currency/load-data-grid`,
  hapusCurrency: `${base_url_api}atena/master/currency/`,
  loadHeaderCurrency:`${base_url_api}atena/master/currency/load-data-header`,
  simpanCurrency: `${base_url_api}atena/master/currency/simpan`,
  //user
  userGetAll: `${base_url_api}atena/master/user/load-all`,
  //lokasi
  getLokasiAll: `${base_url_api}atena/master/lokasi/get-all`,

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
        "kodemenu": kodeMenu
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

