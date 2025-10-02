<?php

use Illuminate\Support\Facades\Route;

Route::get('atena/Laporan/LaporanMaster/LaporanCustomer', function () {
    return view('atena.laporan.master.v_laporan_customer', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.laporan.master.customer');
