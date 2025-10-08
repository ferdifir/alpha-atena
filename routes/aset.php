<?php

use Illuminate\Support\Facades\Route;

Route::prefix('atena/aset')
    ->name('atena.aset.')
    ->group(function () {
        // Aset - Pembelian Aset
        Route::prefix('saldoawalaset')
            ->name('saldoawalaset.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.aset.saldo_awal_aset.v_aset_list_saldo_awal_aset', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.aset.saldo_awal_aset.v_aset_form_saldo_awal_aset', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Aset - Pembelian Aset
        Route::prefix('pembelianaset')
            ->name('pembelianaset.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.aset.pembelian_aset.v_aset_list_pembelian_aset', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.aset.pembelian_aset.v_aset_form_pembelian_aset', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Aset - Penghapusan Aset
        Route::prefix('penghapusanaset')
            ->name('penghapusanaset.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.aset.penghapusan_aset.v_aset_list_penghapusan_aset', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.aset.penghapusan_aset.v_aset_form_penghapusan_aset', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Aset - Penjualan Aset
        Route::prefix('penjualanaset')
            ->name('penjualanaset.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.aset.penjualan_aset.v_aset_list_penjualan_aset', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.aset.penjualan_aset.v_aset_form_penjualan_aset', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Aset - Penyusutan Aset
        Route::prefix('penyusutanaset')
            ->name('penyusutanaset.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.aset.penyusutan_aset.v_aset_list_penyusutan_aset', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.aset.penyusutan_aset.v_aset_form_penyusutan_aset', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Aset - Retur Pembelian Aset
        Route::prefix('returpembelianaset')
            ->name('returpembelianaset.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.aset.retur_pembelian_aset.v_aset_list_retur_pembelian_aset', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.aset.retur_pembelian_aset.v_aset_form_retur_pembelian_aset', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Aset - Transfer Aset
        Route::prefix('transferaset')
            ->name('transferaset.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.aset.transfer_aset.v_aset_list_transfer_aset', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.aset.transfer_aset.v_aset_form_transfer_aset', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });
    });
