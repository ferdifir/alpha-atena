<?php

use Illuminate\Support\Facades\Route;

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

// Inventory Bukti Penerimaan
Route::get('atena/inventori/barangmasuk/transaksi', function () {
    return view('atena.inventori.bukti_penerimaan.v_inventori_list_bukti_penerimaan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.inventory.buktipenerimaan.transaksi');

Route::get('atena/inventori/barangmasuk/form', function () {
    return view('atena.inventori.bukti_penerimaan.v_inventori_form_bukti_penerimaan', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
        'dataref' => request()->dataref,
        'jenistransref' => request()->jenistransref,
    ]);
})->name('atena.inventori.buktipenerimaan.form');
