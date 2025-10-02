<?php

use Illuminate\Support\Facades\Route;

// Aset - Saldo Awal Aset
Route::get('atena/aset/saldoawalaset/transaksi', function () {
    return view('atena.aset.saldo_awal_aset.v_aset_list_saldo_awal_aset', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.aset.saldoawalaset.transaksi');

Route::get('atena/aset/saldoawalaset/form', function () {
    return view('atena.aset.saldo_awal_aset.v_aset_form_saldo_awal_aset', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.aset.saldoawalaset.form');

// Aset - Pembelian Aset
Route::get('atena/aset/pembelianaset/transaksi', function () {
    return view('atena.aset.pembelian_aset.v_aset_list_pembelian_aset', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.aset.pembelianaset.transaksi');

Route::get('atena/aset/pembelianaset/form', function () {
    return view('atena.aset.pembelian_aset.v_aset_form_pembelian_aset', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.aset.pembelianaset.form');

// Aset - Retur Pembelian Aset
Route::get('atena/aset/returpembelianaset/transaksi', function () {
    return view('atena.aset.retur_pembelian_aset.v_aset_list_retur_pembelian_aset', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.aset.returpembelianaset.transaksi');

Route::get('atena/aset/returpembelianaset/form', function () {
    return view('atena.aset.retur_pembelian_aset.v_aset_form_retur_pembelian_aset', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.aset.returpembelianaset.form');

// Aset - Transfer Aset
Route::get('atena/aset/transferaset/transaksi', function () {
    return view('atena.aset.transfer_aset.v_aset_list_transfer_aset', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.aset.transferaset.transaksi');

Route::get('atena/aset/transferaset/form', function () {
    return view('atena.aset.transfer_aset.v_aset_form_transfer_aset', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.aset.transferaset.form');

// Aset - Penghapusan Aset
Route::get('atena/aset/penghapusanaset/transaksi', function () {
    return view('atena.aset.penghapusan_aset.v_aset_list_penghapusan_aset', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.aset.penghapusanaset.transaksi');

Route::get('atena/aset/penghapusanaset/form', function () {
    return view('atena.aset.penghapusan_aset.v_aset_form_penghapusan_aset', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.aset.penghapusanaset.form');

// Aset - Penjualan Aset
Route::get('atena/aset/penjualanaset/transaksi', function () {
    return view('atena.aset.penjualan_aset.v_aset_list_penjualan_aset', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.aset.penjualanaset.transaksi');

Route::get('atena/aset/penjualanaset/form', function () {
    return view('atena.aset.penjualan_aset.v_aset_form_penjualan_aset', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.aset.penjualanaset.form');

// Aset - Penyusutan Aset
Route::get('atena/aset/penyusutanaset/transaksi', function () {
    return view('atena.aset.penyusutan_aset.v_aset_list_penyusutan_aset', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.aset.penyusutanaset.transaksi');

Route::get('atena/aset/penyusutanaset/form', function () {
    return view('atena.aset.penyusutan_aset.v_aset_form_penyusutan_aset', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.aset.penyusutanaset.form');
