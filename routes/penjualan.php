<?php

use Illuminate\Support\Facades\Route;

Route::prefix('atena/penjualan')
    ->name('atena.penjualan.')
    ->group(function () {
        // Penjualan - Sales Order
        Route::prefix('salesorder')
            ->name('salesorder.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.penjualan.sales_order.v_penjualan_list_sales_order', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.penjualan.sales_order.v_penjualan_form_sales_order', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Penjualan
        Route::prefix('penjualan')
            ->name('penjualan.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.penjualan.penjualan.v_penjualan_list_penjualan', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.penjualan.penjualan.v_penjualan_form_penjualan', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                        'dataref' => request()->dataref,
                    ]);
                })->name('form');
            });

        // Penjualan - Retur Penjualan
        Route::prefix('returpenjualan')
            ->name('returpenjualan.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.penjualan.retur_penjualan.v_penjualan_list_retur_penjualan', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.penjualan.retur_penjualan.v_penjualan_form_retur_penjualan', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Penjualan - Uang Muka SO
        Route::prefix('uangmukaso')
            ->name('uangmuka.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.penjualan.uang_muka.v_penjualan_list_uang_muka', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.penjualan.uang_muka.v_penjualan_form_uang_muka', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Penjualan - Sinkronisasi Bukti Pengeluaran
        Route::prefix('sinkronisasibuktipengeluaran')
            ->name('sinkronisasibuktipengeluaran.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.penjualan.sinkronisasi_bukti_pengeluaran.v_penjualan_list_sinkronisasi_bukti_pengeluaran', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');
            });

        // Penjualan - Sinkronisasi Penjualan
        Route::prefix('sinkronisasipenjualan')
            ->name('sinkronisasipenjualan.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.penjualan.sinkronisasi_penjualan.v_penjualan_list_sinkronisasi_penjualan', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');
            });

        // Penjualan - Pesanan Pengiriman
        Route::prefix('deliveryorder')
            ->name('deliveryorder.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.penjualan.delivery_order.v_penjualan_list_delivery_order', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.penjualan.delivery_order.v_penjualan_form_delivery_order', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'dataref' => request()->dataref,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Penjualan - Tutup Pesanan Penjualan
        Route::prefix('tutupsalesorder')
            ->name('tutuppesananpenjualan.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.penjualan.tutup_pesanan_penjualan.v_penjualan_list_tutup_pesanan_penjualan', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');
            });
    });
