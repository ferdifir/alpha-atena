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

// POTONGAN PEMBELIAN
Route::get('atena/keuangan/debetnote/transaksi', function() {
    return view('atena.keuangan.debet_note.v_keuangan_list_debet_note', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.debet_note.transaksi');

Route::get('atena/keuangan/debetnote/form', function() {
    return view('atena.keuangan.debet_note.v_keuangan_form_debet_note', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.debet_note.form');

// PELUNASAN HUTANG
Route::get('atena/keuangan/pelunasanhutang/transaksi', function() {
    return view('atena.keuangan.pelunasan_hutang.v_keuangan_list_pelunasan_hutang', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.pelunasan_hutang.transaksi');

Route::get('atena/keuangan/pelunasanhutang/form', function() {
    return view('atena.keuangan.pelunasan_hutang.v_keuangan_form_pelunasan_hutang', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.pelunasan_hutang.form');

// PELUNASAN PIUTANG
Route::get('atena/keuangan/pelunasanpiutang/transaksi', function() {
    return view('atena.keuangan.pelunasan_piutang.v_keuangan_list_pelunasan_piutang', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.pelunasan_piutang.transaksi');

Route::get('atena/keuangan/pelunasanpiutang/form', function() {
    return view('atena.keuangan.pelunasan_piutang.v_keuangan_form_pelunasan_piutang', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.pelunasan_piutang.form');