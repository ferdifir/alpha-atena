<?php

use Illuminate\Support\Facades\Route;

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

// Analisa Pesanan Pembelian
Route::get('atena/pembelian/analisispo/transaksi', function () {
    return view('atena.pembelian.analisa_pesanan_pembelian.v_pembelian_list_analisa_pesanan_pembelian', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.pembelian.analisispo.transaksi');

Route::get('atena/pembelian/analisispo/form', function () {
    return view('atena.pembelian.analisa_pesanan_pembelian.v_pembelian_form_analisa_pemesanan_pembelian', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.pembelian.analisispo.form');

// Uang Muka PO
Route::get('atena/pembelian/uangmukapo/transaksi', function () {
    return view('atena.pembelian.uang_muka_po.v_pembelian_list_uang_muka_po', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.pembelian.uang_muka_po.transaksi');

Route::get('atena/pembelian/uangmukapo/form', function () {
    return view('atena.pembelian.uang_muka_po.v_pembelian_form_uang_muka_po', [
        'kodemenu' => request()->kode,
        'datapo' => request()->datapo,
        'datauangmukapo' => request()->datauangmukapo,
        'mode' => request()->mode,
    ]);
})->name('atena.pembelian.uang_muka_po.form');

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
