<?php

use Illuminate\Support\Facades\Route;

Route::get('atena/akuntansi/kas/transaksi', function() {
    return view('atena.akuntansi.kas.v_akuntansi_list_kas', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.akuntansi.kas.transaksi');

Route::get('atena/akuntansi/kas/form', function() {
    return view('atena.akuntansi.kas.v_akuntansi_form_kas', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.akuntansi.kas.form');


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