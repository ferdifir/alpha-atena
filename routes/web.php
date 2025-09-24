<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UrlAPI;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $link = UrlAPI::getAllUrl();
    return view('v_login');
});

Route::post('save-session', function () {
    $data = request("data");
    foreach ($data as $dataSesion) {
        session([$dataSesion['keySession'] => $dataSesion['valueSession']]);
    }
    return true;
})->name('save.session');

Route::get('/dashboard', function () {
    return view('v_dashboard');
});

Route::get('/home', function () {
    return view('v_home');
});

Route::get('/session', function () {
    dd(session()->all());
    return view('v_home');
});

Route::get('/hompage-perusahaan', function () {
    return view('v_perusahaan');
})->name('homepage.perusahaan');

require __DIR__ . '/akuntansi.php';

//Master Perkiraan
Route::get('atena/master/perkiraan/data', function () {
    return view('atena.master.perkiraan.v_master_list_perkiraan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.perkiraan.data');

Route::get('atena/master/perkiraan/form', function () {
    return view('atena.master.perkiraan.v_master_form_perkiraan', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.perkiraan.form');

// Master User
Route::get('atena/master/user/data', function () {
    return view('atena.master.user.v_master_list_user', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.user.data');

Route::get('atena/master/user/form', function () {
    return view('atena.master.user.v_master_form_user', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.user.form');

//Master Currency
Route::get('atena/master/currency/data', function () {
    return view('atena.master.currency.v_master_list_currency', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.currency.data');

Route::get('atena/master/currency/form', function () {
    return view('atena.master.currency.v_master_form_currency', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.currency.form');

//Master Lokasi
Route::get('atena/master/lokasi/data', function () {
    return view('atena.master.lokasi.v_master_list_lokasi', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.lokasi.data');

Route::get('atena/master/lokasi/form', function () {
    return view('atena.master.lokasi.v_master_form_lokasi', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.lokasi.form');

//Master Merk
Route::get('atena/master/merk/data', function () {
    return view('atena.master.merk.v_master_list_merk', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.merk.data');

Route::get('atena/master/merk/form', function () {
    return view('atena.master.merk.v_master_form_merk', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.merk.form');

// Master Syarat Bayar
Route::get('atena/master/syaratbayar/data', function () {
    return view('atena.master.syarat_bayar.v_master_list_syarat_bayar', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.syarat_bayar.list');

Route::get('atena/master/syaratbayar/form', function () {
    return view('atena.master.syarat_bayar.v_master_form_syarat_bayar', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.syarat_bayar.form');

// Master Departemen Kerja
Route::get('atena/master/departemenkerja/data', function () {
    return view('atena.master.departemen_kerja.v_master_list_departemen_kerja', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.departemen_kerja.list');

Route::get('atena/master/departemenkerja/form', function () {
    return view('atena.master.departemen_kerja.v_master_form_departemen_kerja', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.departemen_kerja.form');


// Master Karyawan
Route::get('atena/master/karyawan/data', function () {
    return view('atena.master.karyawan.v_master_list_karyawan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.karyawan.list');

Route::get('atena/master/karyawan/form', function () {
    return view('atena.master.karyawan.v_master_form_karyawan', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.karyawan.form');
// Master Pemasok
Route::get('atena/master/supplier/data', function () {
    return view('atena.master.supplier.v_master_list_supplier', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.supplier.data');

Route::get('atena/master/supplier/form', function () {
    return view('atena.master.supplier.v_master_form_supplier', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.supplier.form');

// Master Customer
Route::get('atena/master/customer/data', function () {
    return view('atena.master.customer.v_master_list_customer', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.customer.data');

Route::get('atena/master/customer/form', function () {
    return view('atena.master.customer.v_master_form_customer', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.customer.form');

// Master Ekspedisi
Route::get('atena/master/ekspedisi/data', function () {
    return view('atena.master.ekspedisi.v_master_list_ekspedisi', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.ekspedisi.data');

Route::get('atena/master/ekspedisi/form', function () {
    return view('atena.master.ekspedisi.v_master_form_ekspedisi', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.ekspedisi.form');

// Harga Jual
Route::get('atena/master/hargajual/data', function () {
    return view('atena.master.harga_jual.v_master_list_harga_jual', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.hargajual.data');

// Harga Jual Berdasarkan Jumlah
Route::get('atena/master/hargajualberdasarkanjumlah/data', function () {
    return view('atena.master.harga_jual_berdasarkan_jumlah.v_master_list_harga_jual_berdasarkan_jumlah', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.hargajualberdasarkanjumlah.data');

// Master sopir
Route::get('atena/master/sopir/data', function () {
    return view('atena.master.sopir.v_master_list_sopir', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.sopir.data');

Route::get('atena/master/sopir/form', function () {
    return view('atena.master.sopir.v_master_form_sopir', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.sopir.form');

// Master kendaraan
Route::get('atena/master/kendaraan/data', function () {
    return view('atena.master.kendaraan.v_master_list_kendaraan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.kendaraan.data');

Route::get('atena/master/kendaraan/form', function () {
    return view('atena.master.kendaraan.v_master_form_kendaraan', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.kendaraan.form');

// Master jenis pemakaian
Route::get('atena/master/jenispemakaian/data', function () {
    return view('atena.master.jenis_pemakaian.v_master_list_jenis_pemakaian', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.jenis_pemakaian.data');

Route::get('atena/master/jenispemakaian/form', function () {
    return view('atena.master.jenis_pemakaian.v_master_form_jenis_pemakaian', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.jenis_pemakaian.form');

// Master tipe customer
Route::get('atena/master/tipecustomer/data', function () {
    return view('atena.master.tipe_customer.v_master_list_tipe_customer', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.tipe_customer.data');

Route::get('atena/master/tipecustomer/form', function () {
    return view('atena.master.tipe_customer.v_master_form_tipe_customer', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.tipe_customer.form');

// Master alat bayar
Route::get('atena/master/alatbayar/data', function () {
    return view('atena.master.alat_bayar.v_master_list_alat_bayar', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.alat_bayar.data');

Route::get('atena/master/alatbayar/form', function () {
    return view('atena.master.alat_bayar.v_master_form_alat_bayar', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.alat_bayar.form');

// Master servis
Route::get('atena/master/servis/data', function() {
    return view('atena.master.servis.v_master_list_servis', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.servis.data');

Route::get('atena/master/servis/form', function() {
    return view('atena.master.servis.v_master_form_servis', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.servis.form');

// Master alat bayar non tunai
Route::get('atena/master/alatbayarnontunai/data', function () {
    return view('atena.master.alat_bayar_non_tunai.v_master_list_alat_bayar_non_tunai', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.alat_bayar_non_tunai.data');

Route::get('atena/master/alatbayarnontunai/form', function () {
    return view('atena.master.alat_bayar_non_tunai.v_master_form_alat_bayar_non_tunai', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.alat_bayar_non_tunai.form');

// Master satuan
Route::get('atena/master/satuan/data', function () {
    return view('atena.master.satuan.v_master_list_satuan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.satuan.data');

Route::get('atena/master/satuan/form', function () {
    return view('atena.master.satuan.v_master_form_satuan', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.satuan.form');

// Master harga beli
Route::get('atena/master/hargabeli/data', function () {
    return view('atena.master.harga_beli.v_master_list_harga_beli', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.harga_beli.data');

// Master ppn
Route::get('atena/master/ppn/data', function () {
    return view('atena.master.ppn.v_master_list_ppn', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.ppn.data');

Route::get('atena/master/ppn/form', function () {
    return view('atena.master.ppn.v_master_form_ppn', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.ppn.form');

// Barang
Route::get('atena/master/barang/data', function () {
    return view('atena.master.barang.v_master_list_barang', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.barang.data');

Route::get('atena/master/barang/form', function () {
    return view('atena.master.barang.v_master_form_barang', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.barang.form');

// Promo
Route::get('atena/master/promo/data', function () {
    return view('atena.master.promo.v_master_list_promo', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.promo.data');

Route::get('atena/master/promo/form', function () {
    return view('atena.master.promo.v_master_form_promo', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.master.promo.form');

// Pengaturan
Route::get('atena/master/pengaturan/data', function () {
    return view('atena.master.pengaturan.v_master_form_pengaturan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.pengaturan.data');

Route::get('atena/master/pengaturan/view-master-perusahaan', function () {
    return view('atena.master.pengaturan.v_master_frame_perusahaan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.pengaturan.frame-master-perusahaan');

Route::get('atena/master/pengaturan/view-master-global', function () {
    return view('atena.master.pengaturan.v_master_frame_global', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.pengaturan.frame-master-global');

Route::get('atena/master/pengaturan/view-master-master', function () {
    return view('atena.master.pengaturan.v_master_frame_master', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.pengaturan.frame-master-master');

Route::get('atena/master/pengaturan/view-master-pembelian', function () {
    return view('atena.master.pengaturan.v_master_frame_pembelian', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.pengaturan.frame-master-pembelian');

Route::get('atena/master/pengaturan/view-master-penjualan', function () {
    return view('atena.master.pengaturan.v_master_frame_penjualan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.pengaturan.frame-master-penjualan');

Route::get('atena/master/pengaturan/view-master-inventori', function () {
    return view('atena.master.pengaturan.v_master_frame_inventori', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.pengaturan.frame-master-inventori');

Route::get('atena/master/pengaturan/view-master-aset', function () {
    return view('atena.master.pengaturan.v_master_frame_aset', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.pengaturan.frame-master-aset');

Route::get('atena/master/pengaturan/view-master-produksi', function () {
    return view('atena.master.pengaturan.v_master_frame_produksi', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.pengaturan.frame-master-produksi');

Route::get('atena/master/pengaturan/view-master-keuangan', function () {
    return view('atena.master.pengaturan.v_master_frame_keuangan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.pengaturan.frame-master-keuangan');

Route::get('atena/master/pengaturan/view-master-akuntansi', function () {
    return view('atena.master.pengaturan.v_master_frame_akuntansi', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.pengaturan.frame-master-akuntansi');


// Jurnal Link
Route::get('atena/master/jurnallink/data', function () {
    return view('atena.master.jurnal_link.v_master_list_jurnal_link', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.jurnal_link.data');

// Inventory Transfer
Route::get('atena/inventori/transferpersediaan/transaksi', function () {
    return view('atena.inventori.transfer.v_inventori_list_transfer', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.inventory.transfer.transaksi');

Route::get('atena/inventori/transferpersediaan/form', function () {
    return view('atena.inventori.transfer.v_inventori_form_transfer', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.inventori.transfer.form');

// Inventory Terima Transfer
Route::get('atena/inventori/terimatransferpersediaan/transaksi', function () {
    return view('atena.inventori.terima_transfer.v_inventori_list_terima_transfer', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.inventory.terima_transfer.transaksi');

Route::get('atena/inventori/terimatransferpersediaan/form', function () {
    return view('atena.inventori.terima_transfer.v_inventori_form_terima_transfer', [
        "transaksi" => "HEADER",
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.inventori.terima_transfer.form');

// Inventori/Validasi Kirim
Route::get('atena/inventori/validasikirim/transaksi', function () {
    return view('atena.inventori.validasi_kirim.v_inventori_list_validasi_kirim', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.inventori.validasi_kirim.transaksi');

// Inventori/Kirim Ekspedisi
Route::get('atena/inventori/kirimekspedisi/transaksi', function () {
    return view('atena.inventori.kirim_ekspedisi.v_inventori_list_kirim_ekspedisi', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.inventori.kirim_ekspedisi.transaksi');

Route::get('atena/inventori/kirimekspedisi/form', function () {
    return view('atena.inventori.kirim_ekspedisi.v_inventori_form_kirim_ekspedisi', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.inventori.kirim_ekspedisi.form');


// Inventory Pemakaian Bahan
Route::get('atena/inventori/pemakaianbahan/transaksi', function () {
    return view('atena.inventori.pemakaian_bahan.v_inventori_list_pemakaian_bahan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.inventory.pemakaian_bahan.transaksi');

Route::get('atena/inventori/pemakaianbahan/form', function () {
    return view('atena.inventori.pemakaian_bahan.v_inventori_form_pemakaian_bahan', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.inventori.pemakaian_bahan.form');


// Inventory Repacking
Route::get('atena/inventori/repacking/transaksi', function () {
    return view('atena.inventori.repacking.v_inventori_list_repacking', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.inventory.repacking.transaksi');

Route::get('atena/inventori/repacking/form', function () {
    return view('atena.inventori.repacking.v_inventori_form_repacking', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.inventori.repacking.form');

// Inventory Saldo Awal Stok
Route::get('atena/inventori/saldoawalstok/transaksi', function () {
    return view('atena.inventori.saldo_awal_stok.v_inventori_list_saldo_awal_stok', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.inventory.saldo_awal_stok.transaksi');

Route::get('atena/inventori/saldoawalstok/form', function () {
    return view('atena.inventori.saldo_awal_stok.v_inventori_form_saldo_awal_stok', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.inventori.saldo_awal_stok.form');


// Inventory Pemakaian Bahan
Route::get('atena/inventori/pemakaianbahan/transaksi', function () {
    return view('atena.inventori.pemakaian_bahan.v_inventori_list_pemakaian_bahan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.inventory.pemakaian_bahan.transaksi');

Route::get('atena/inventori/pemakaianbahan/form', function () {
    return view('atena.inventori.pemakaian_bahan.v_inventori_form_pemakaian_bahan', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.inventori.pemakaian_bahan.form');


// Inventory Repacking
Route::get('atena/inventori/repacking/transaksi', function () {
    return view('atena.inventori.repacking.v_inventori_list_repacking', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.inventory.repacking.transaksi');

Route::get('atena/inventori/repacking/form', function () {
    return view('atena.inventori.repacking.v_inventori_form_repacking', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.inventori.repacking.form');

// Inventory Saldo Awal Stok
Route::get('atena/inventori/saldoawalstok/transaksi', function () {
    return view('atena.inventori.saldo_awal_stok.v_inventori_list_saldo_awal_stok', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.inventory.saldo_awal_stok.transaksi');

Route::get('atena/inventori/saldoawalstok/form', function () {
    return view('atena.inventori.saldo_awal_stok.v_inventori_form_saldo_awal_stok', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.inventori.saldo_awal_stok.form');

// Inventory Opname Stok
Route::get('atena/inventori/opnamestok/transaksi', function () {
    return view('atena.inventori.opname_stok.v_inventori_list_opname_stok', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.inventory.opnamestok.transaksi');

Route::get('atena/inventori/opnamestok/form', function () {
    return view('atena.inventori.opname_stok.v_inventori_form_opname_stok', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.inventori.opnamestok.form');

// Inventory Penyesuaian Stok
Route::get('atena/inventori/penyesuaianstok/transaksi', function () {
    return view('atena.inventori.penyesuaian_stok.v_inventori_list_penyesuaian_stok', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.inventori.penyesuaianstok.transaksi');

Route::get('atena/inventori/penyesuaianstok/form', function () {
    return view('atena.inventori.penyesuaian_stok.v_inventori_form_penyesuaian_stok', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.inventori.penyesuaianstok.form');

// Inventory Bukti Pengeluaran
Route::get('atena/inventori/barangkeluar/transaksi', function () {
    return view('atena.inventori.bukti_pengeluaran.v_inventori_list_bukti_pengeluaran', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.inventory.buktipengeluaran.transaksi');

Route::get('atena/inventori/barangkeluar/form', function () {
    return view('atena.inventori.bukti_pengeluaran.v_inventori_form_bukti_pengeluaran', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
        'dataref' => request()->dataref,
        'jenistransref' => request()->jenistransref,
    ]);
})->name('atena.inventori.buktipengeluaran.form');

// Penjualan Sales Order
Route::get('atena/penjualan/salesorder/transaksi', function () {
    return view('atena.penjualan.sales_order.v_penjualan_list_sales_order', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.penjualan.salesorder.transaksi');

Route::get('atena/penjualan/salesorder/form', function () {
    return view('atena.penjualan.sales_order.v_penjualan_form_sales_order', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.penjualan.salesorder.form');

// Penjualan
Route::get('atena/penjualan/penjualan/transaksi', function () {
    return view('atena.penjualan.penjualan.v_penjualan_list_penjualan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.penjualan.penjualan.transaksi');

Route::get('atena/penjualan/penjualan/form', function () {
    return view('atena.penjualan.penjualan.v_penjualan_form_penjualan', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
        'dataref' => request()->dataref,
    ]);
})->name('atena.penjualan.penjualan.form');

// Retur Penjualan
Route::get('atena/penjualan/returpenjualan/transaksi', function() {
    return view('atena.penjualan.retur_penjualan.v_penjualan_list_retur_penjualan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.penjualan.returpenjualan.transaksi');

Route::get('atena/penjualan/returpenjualan/form', function() {
    return view('atena.penjualan.retur_penjualan.v_penjualan_form_retur_penjualan', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.penjualan.returpenjualan.form');

// Pembelian Permintaan Barang
Route::get('atena/pembelian/permintaanbarang/transaksi', function () {
    return view('atena.pembelian.permintaan_barang.v_pembelian_list_permintaan_barang', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.pembelian.permintaan_barang.transaksi');

Route::get('atena/pembelian/permintaanbarang/form', function () {
    return view('atena.pembelian.permintaan_barang.v_pembelian_form_permintaan_barang', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.pembelian.permintaan_barang.form');

// Pembelian PO
Route::get('atena/pembelian/pesananpembelian/transaksi', function () {
    return view('atena.pembelian.pesanan_pembelian.v_pembelian_list_pesanan_pembelian', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.pembelian.pesanan_pembelian.transaksi');

Route::get('atena/pembelian/pesananpembelian/form', function () {
    return view('atena.pembelian.pesanan_pembelian.v_pembelian_form_pesanan_pembelian', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.pembelian.pesanan_pembelian.form');

// Pembelian
Route::get('atena/pembelian/pembelian/transaksi', function () {
    return view('atena.pembelian.pembelian.v_pembelian_list_pembelian', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.pembelian.pembelian.transaksi');

Route::get('atena/pembelian/pembelian/form', function () {
    return view('atena.pembelian.pembelian.v_pembelian_form_pembelian', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.pembelian.pembelian.form');

// Retur Pembelian
Route::get('atena/pembelian/returpembelian/transaksi', function () {
    return view('atena.pembelian.retur_pembelian.v_pembelian_list_retur_pembelian', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.pembelian.retur_pembelian.transaksi');

Route::get('atena/pembelian/returpembelian/form', function () {
    return view('atena.pembelian.retur_pembelian.v_pembelian_form_retur_pembelian', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.pembelian.retur_pembelian.form');

// Tutup Permintaan Barang
Route::get('atena/pembelian/tutuppermintaanbarang/transaksi', function () {
    return view('atena.pembelian.tutup_permintaan_barang.v_pembelian_list_tutup_permintaan_barang', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.pembelian.tutup_permintaan_barang.transaksi');

// Tutup Pesanan Pembelian
Route::get('atena/pembelian/tutuppesananpembelian/transaksi', function () {
    return view('atena.pembelian.tutup_pesanan_pembelian.v_pembelian_list_tutup_pesanan_pembelian', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.pembelian.tutup_pesanan_pembelian.transaksi');

// Pesanan Pengiriman
Route::get('atena/penjualan/deliveryorder/transaksi', function () {
    return view('atena.penjualan.delivery_order.v_penjualan_list_delivery_order', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.penjualan.deliveryorder.transaksi');

Route::get('atena/penjualan/deliveryorder/form', function () {
    return view('atena.penjualan.delivery_order.v_penjualan_form_delivery_order', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'dataref' => request()->dataref,
        'mode' => request()->mode,
    ]);
})->name('atena.penjualan.deliveryorder.form');

// Tutup Pesanan Penjualan
Route::get('atena/penjualan/tutupsalesorder/transaksi', function () {
    return view('atena.penjualan.tutup_pesanan_penjualan.v_penjualan_list_tutup_pesanan_penjualan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.penjualan.tutuppesananpenjualan.transaksi');
