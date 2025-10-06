<?php

use Illuminate\Support\Facades\Route;

Route::prefix('atena/pembelian')
    ->name('atena.pembelian.')
    ->group(function () {
        // Pembelian - Permintaan Barang
        Route::prefix('permintaanbarang')
            ->name('permintaan_barang.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.pembelian.permintaan_barang.v_pembelian_list_permintaan_barang', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.pembelian.permintaan_barang.v_pembelian_form_permintaan_barang', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Pembelian - PO
        Route::prefix('pesananpembelian')
            ->name('pesanan_pembelian.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.pembelian.pesanan_pembelian.v_pembelian_list_pesanan_pembelian', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.pembelian.pesanan_pembelian.v_pembelian_form_pesanan_pembelian', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Pembelian
        Route::prefix('pembelian')
            ->name('pembelian.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.pembelian.pembelian.v_pembelian_list_pembelian', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.pembelian.pembelian.v_pembelian_form_pembelian', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Pembelian - Retur Pembelian
        Route::prefix('returpembelian')
            ->name('retur_pembelian.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.pembelian.retur_pembelian.v_pembelian_list_retur_pembelian', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.pembelian.retur_pembelian.v_pembelian_form_retur_pembelian', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Pembelian - Analisa Pesanan Pembelian
        Route::prefix('analisispo')
            ->name('analisispo.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.pembelian.analisa_pesanan_pembelian.v_pembelian_list_analisa_pesanan_pembelian', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.pembelian.analisa_pesanan_pembelian.v_pembelian_form_analisa_pemesanan_pembelian', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Pembelian - Uang Muka PO
        Route::prefix('uangmukapo')
            ->name('uang_muka_po.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.pembelian.uang_muka_po.v_pembelian_list_uang_muka_po', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');

                Route::get('form', function () {
                    return view('atena.pembelian.uang_muka_po.v_pembelian_form_uang_muka_po', [
                        'kodemenu' => request()->kode,
                        'datapo' => request()->datapo,
                        'datauangmukapo' => request()->datauangmukapo,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Pembelian - Tutup Permintaan Barang
        Route::prefix('tutuppermintaanbarang')
            ->name('tutup_permintaan_barang.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.pembelian.tutup_permintaan_barang.v_pembelian_list_tutup_permintaan_barang', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');
            });

        // Pembelian - Tutup Pesanan Pembelian
        Route::prefix('tutuppesananpembelian')
            ->name('tutup_pesanan_pembelian.')
            ->group(function () {
                Route::get('transaksi', function () {
                    return view('atena.pembelian.tutup_pesanan_pembelian.v_pembelian_list_tutup_pesanan_pembelian', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('transaksi');
            });
    });
