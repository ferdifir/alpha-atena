<?php

use Illuminate\Support\Facades\Route;

// SALDO AWAL HUTANG
Route::get('atena/keuangan/saldoawalhutang/transaksi', function() {
    return view('atena.keuangan.saldoawalhutang.v_keuangan_list_saldoawalhutang', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.saldoawalhutang.transaksi');

Route::get('atena/keuangan/saldoawalhutang/form', function() {
    return view('atena.keuangan.saldoawalhutang.v_keuangan_form_saldoawalhutang', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.saldoawalhutang.form');

// SALDO AWAL PIUTANG
Route::get('atena/keuangan/saldoawalpiutang/transaksi', function() {
    return view('atena.keuangan.saldoawalpiutang.v_keuangan_list_saldoawalpiutang', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.saldoawalpiutang.transaksi');

Route::get('atena/keuangan/saldoawalpiutang/form', function() {
    return view('atena.keuangan.saldoawalpiutang.v_keuangan_form_saldoawalpiutang', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.saldoawalpiutang.form');