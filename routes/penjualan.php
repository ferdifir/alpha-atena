<?php

use Illuminate\Support\Facades\Route;

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
Route::get('atena/penjualan/returpenjualan/transaksi', function () {
    return view('atena.penjualan.retur_penjualan.v_penjualan_list_retur_penjualan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.penjualan.returpenjualan.transaksi');

Route::get('atena/penjualan/returpenjualan/form', function () {
    return view('atena.penjualan.retur_penjualan.v_penjualan_form_retur_penjualan', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.penjualan.returpenjualan.form');

// Uang Muka SO
Route::get('atena/penjualan/uangmukaso/transaksi', function () {
    return view('atena.penjualan.uang_muka.v_penjualan_list_uang_muka', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.penjualan.uangmuka.transaksi');

Route::get('atena/penjualan/uangmukaso/form', function () {
    return view('atena.penjualan.uang_muka.v_penjualan_form_uang_muka', [
        'kodemenu' => request()->kode,
        'data' => request()->data,
        'mode' => request()->mode,
    ]);
})->name('atena.penjualan.uangmuka.form');

// Sinkronisasi Bukti Pengeluaran
Route::get('atena/penjualan/sinkronisasibuktipengeluaran/transaksi', function () {
    return view('atena.penjualan.sinkronisasi_bukti_pengeluaran.v_penjualan_list_sinkronisasi_bukti_pengeluaran', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.penjualan.sinkronisasibuktipengeluaran.transaksi');

// Sinkronisasi Penjualan
Route::get('atena/penjualan/sinkronisasipenjualan/transaksi', function () {
    return view('atena.penjualan.sinkronisasi_penjualan.v_penjualan_list_sinkronisasi_penjualan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.penjualan.sinkronisasipenjualan.transaksi');

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
