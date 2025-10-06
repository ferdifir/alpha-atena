<?php

use Illuminate\Support\Facades\Route;

Route::prefix('atena/laporan')
    ->name('atena.laporan.')
    ->group(function () {

        Route::prefix('laporanmaster')
            ->name('laporanmaster.')
            ->group(function () {

                Route::get('laporancustomer', function () {
                    return view('atena.laporan.master.v_laporan_customer', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporancustomer');

                Route::get('laporanuser', function () {
                    return view('atena.laporan.master.v_laporan_user', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanuser');

                Route::get('laporanlokasi', function () {
                    return view('atena.laporan.master.v_laporan_lokasi', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanlokasi');

                Route::get('laporanmerk', function () {
                    return view('atena.laporan.master.v_laporan_merk', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanmerk');

                Route::get('laporanbarang', function () {
                    return view('atena.laporan.master.v_laporan_barang', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanbarang');

                Route::get('laporanbarcodebarang', function () {
                    $menu = preg_replace_callback('/\b([a-z])/', function ($matches) {
                        return strtoupper($matches[1]);
                    }, request()->menu);
                    return view('atena.laporan.master.v_laporan_barcode_barang', [
                        'kodemenu' => request()->kode,
                        'menu' => $menu,
                        'jenis' => request()->jenis
                    ]);
                })->name('laporanbarcodebarang');

                Route::get('laporansyaratbayar', function () {
                    return view('atena.laporan.master.v_laporan_syarat_bayar', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporansyaratbayar');

                Route::get('laporansupplier', function () {
                    return view('atena.laporan.master.v_laporan_supplier', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporansupplier');

                Route::get('laporanekspedisi', function () {
                    return view('atena.laporan.master.v_laporan_ekspedisi', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanekspedisi');

                Route::get('laporankaryawan', function () {
                    return view('atena.laporan.master.v_laporan_karyawan', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporankaryawan');

                Route::get('laporansopir', function () {
                    return view('atena.laporan.master.v_laporan_sopir', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporansopir');

                Route::get('laporankendaraan', function () {
                    return view('atena.laporan.master.v_laporan_kendaraan', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporankendaraan');

                Route::get('laporanproduksi2', function () {
                    return view('atena.laporan.master.v_laporan_produksi2', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanproduksi2');

                Route::get('laporanperkiraan', function () {
                    return view('atena.laporan.master.v_laporan_perkiraan', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanperkiraan');

                Route::get('laporancurrency', function () {
                    return view('atena.laporan.master.v_laporan_currency', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporancurrency');

                Route::get('laporanhistory', function () {
                    return view('atena.laporan.master.v_laporan_history', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanhistory');
            });


        Route::prefix('laporanpembelian')
            ->name('laporanpembelian.')
            ->group(function () {

                Route::get('laporanpr', function () {
                    return view('atena.laporan.pembelian.v_laporan_pr', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanpr');

                Route::get('laporanpo', function () {
                    return view('atena.laporan.pembelian.v_laporan_po', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanpo');

                Route::get('laporanpembelian', function () {
                    return view('atena.laporan.pembelian.v_laporan_pembelian', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                });
            });
    });
