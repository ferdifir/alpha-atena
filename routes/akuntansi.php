<?php

use Illuminate\Support\Facades\Route;

// KAS-BANK
Route::get('atena/akuntansi/kas/transaksi', function() {
    return view('atena.akuntansi.kas.v_akuntansi_list_kas', [
        'kodemenu' => request()->kode,
        'jenis'    => request()->jenis,
    ]);
})->name('atena.akuntansi.kas.transaksi');

Route::get('atena/akuntansi/kas/form', function() {
    return view('atena.akuntansi.kas.v_akuntansi_form_kas', [
        'kodemenu' => request()->kode,
        'data'     => request()->data,
        'mode'     => request()->mode,
        'jenis'    => request()->jenis,
    ]);
})->name('atena.akuntansi.kas.form');

// SALDO AWAL PERKIRAAN
Route::get('atena/akuntansi/saldoawalperkiraan/transaksi', function() {
    return view('atena.akuntansi.saldoawalperkiraan.v_akuntansi_list_saldoawalperkiraan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.akuntansi.saldoawalperkiraan.transaksi');

Route::get('atena/akuntansi/saldoawalperkiraan/form', function() {
    return view('atena.akuntansi.saldoawalperkiraan.v_akuntansi_form_saldoawalperkiraan', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.akuntansi.saldoawalperkiraan.form');

// TUTUP PERIODE AKUNTANSI
Route::get('atena/akuntansi/tutupperiodeakuntansi/transaksi', function() {
    return view('atena.akuntansi.tutupperiodeakuntansi.v_akuntansi_list_tutupperiodeakuntansi', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.akuntansi.tutupperiodeakuntansi.transaksi');

// FAKTUR PAJAK
Route::get('atena/akuntansi/fakturpajak/transaksi', function() {
    return view('atena.akuntansi.fakturpajak.v_akuntansi_list_fakturpajak', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.akuntansi.fakturpajak.transaksi');

Route::get('atena/akuntansi/fakturpajak/form', function() {
    return view('atena.akuntansi.fakturpajak.v_akuntansi_form_fakturpajak', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.akuntansi.fakturpajak.form');

// HITUNG HPP
Route::get('atena/akuntansi/hitunghpp/transaksi', function() {
    return view('atena.akuntansi.hitunghpp.v_akuntansi_list_hitunghpp', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.akuntansi.hitunghpp.transaksi');
