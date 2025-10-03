<?php

use Illuminate\Support\Facades\Route;

Route::get('atena/laporan/laporanmaster/laporancustomer', function () {
    return view('atena.laporan.master.v_laporan_customer', [
        'kodemenu' => request()->kode,
        'menu' => ucwords(request()->menu)
    ]);
})->name('atena.laporan.master.customer');

Route::get('atena/laporan/laporanmaster/laporanuser', function () {
    return view('atena.laporan.master.v_laporan_user', [
        'kodemenu' => request()->kode,
        'menu' => ucwords(request()->menu)
    ]);
})->name('atena.laporan.master.user');

//
