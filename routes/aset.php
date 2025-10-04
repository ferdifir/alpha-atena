<?php

use Illuminate\Support\Facades\Route;

// // Aset - Saldo Awal Aset
// Route::get('atena/aset/saldoawalaset/transaksi', function () {
//     return view('atena.aset.saldo_awal_aset.v_aset_list_saldo_awal_aset', [
//         'kodemenu' => request()->kode,
//     ]);
// })->name('atena.aset.saldoawalaset.transaksi');

// Route::get('atena/aset/saldoawalaset/form', function () {
//     return view('atena.aset.saldo_awal_aset.v_aset_form_saldo_awal_aset', [
//         'kodemenu' => request()->kode,
//         'data' => request()->data,
//         'mode' => request()->mode,
//     ]);
// })->name('atena.aset.saldoawalaset.form');

// // Aset - Pembelian Aset
// Route::get('atena/aset/pembelianaset/transaksi', function () {
//     return view('atena.aset.pembelian_aset.v_aset_list_pembelian_aset', [
//         'kodemenu' => request()->kode,
//     ]);
// })->name('atena.aset.pembelianaset.transaksi');

// Route::get('atena/aset/pembelianaset/form', function () {
//     return view('atena.aset.pembelian_aset.v_aset_form_pembelian_aset', [
//         'kodemenu' => request()->kode,
//         'data' => request()->data,
//         'mode' => request()->mode,
//     ]);
// })->name('atena.aset.pembelianaset.form');

// // Aset - Retur Pembelian Aset
// Route::get('atena/aset/returpembelianaset/transaksi', function () {
//     return view('atena.aset.retur_pembelian_aset.v_aset_list_retur_pembelian_aset', [
//         'kodemenu' => request()->kode,
//     ]);
// })->name('atena.aset.returpembelianaset.transaksi');

// Route::get('atena/aset/returpembelianaset/form', function () {
//     return view('atena.aset.retur_pembelian_aset.v_aset_form_retur_pembelian_aset', [
//         'kodemenu' => request()->kode,
//         'data' => request()->data,
//         'mode' => request()->mode,
//     ]);
// })->name('atena.aset.returpembelianaset.form');

// // Aset - Transfer Aset
// Route::get('atena/aset/transferaset/transaksi', function () {
//     return view('atena.aset.transfer_aset.v_aset_list_transfer_aset', [
//         'kodemenu' => request()->kode,
//     ]);
// })->name('atena.aset.transferaset.transaksi');

// Route::get('atena/aset/transferaset/form', function () {
//     return view('atena.aset.transfer_aset.v_aset_form_transfer_aset', [
//         'kodemenu' => request()->kode,
//         'data' => request()->data,
//         'mode' => request()->mode,
//     ]);
// })->name('atena.aset.transferaset.form');

// // Aset - Penghapusan Aset
// Route::get('atena/aset/penghapusanaset/transaksi', function () {
//     return view('atena.aset.penghapusan_aset.v_aset_list_penghapusan_aset', [
//         'kodemenu' => request()->kode,
//     ]);
// })->name('atena.aset.penghapusanaset.transaksi');

// Route::get('atena/aset/penghapusanaset/form', function () {
//     return view('atena.aset.penghapusan_aset.v_aset_form_penghapusan_aset', [
//         'kodemenu' => request()->kode,
//         'data' => request()->data,
//         'mode' => request()->mode,
//     ]);
// })->name('atena.aset.penghapusanaset.form');

// // Aset - Penjualan Aset
// Route::get('atena/aset/penjualanaset/transaksi', function () {
//     return view('atena.aset.penjualan_aset.v_aset_list_penjualan_aset', [
//         'kodemenu' => request()->kode,
//     ]);
// })->name('atena.aset.penjualanaset.transaksi');

// Route::get('atena/aset/penjualanaset/form', function () {
//     return view('atena.aset.penjualan_aset.v_aset_form_penjualan_aset', [
//         'kodemenu' => request()->kode,
//         'data' => request()->data,
//         'mode' => request()->mode,
//     ]);
// })->name('atena.aset.penjualanaset.form');

// // Aset - Penyusutan Aset
// Route::get('atena/aset/penyusutanaset/transaksi', function () {
//     return view('atena.aset.penyusutan_aset.v_aset_list_penyusutan_aset', [
//         'kodemenu' => request()->kode,
//     ]);
// })->name('atena.aset.penyusutanaset.transaksi');

// Route::get('atena/aset/penyusutanaset/form', function () {
//     return view('atena.aset.penyusutan_aset.v_aset_form_penyusutan_aset', [
//         'kodemenu' => request()->kode,
//         'data' => request()->data,
//         'mode' => request()->mode,
//     ]);
// })->name('atena.aset.penyusutanaset.form');

// --------- START REFACTOR CODE ---------
Route::prefix('atena/aset') // Prefix URI untuk semua rute di bawah
    ->name('atena.aset.')   // Prefix Nama Rute untuk semua rute di bawah
    ->group(function () {
        // Aset - Pembelian Aset
        Route::prefix('saldoawalaset') // Tambahkan /saldoawalaset ke URI
            ->name('saldoawalaset.')    // Tambahkan saldoawalaset. ke nama rute
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
        Route::prefix('pembelianaset') // Tambahkan /pembelianaset ke URI
            ->name('pembelianaset.')    // Tambahkan pembelianaset. ke nama rute
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
        Route::prefix('penghapusanaset') // Tambahkan /penghapusanaset ke URI
            ->name('penghapusanaset.')    // Tambahkan penghapusanaset. ke nama rute
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
        Route::prefix('penjualanaset') // Tambahkan /penjualanaset ke URI
            ->name('penjualanaset.')    // Tambahkan penjualanaset. ke nama rute
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
        Route::prefix('penyusutanaset') // Tambahkan /penyusutanaset ke URI
            ->name('penyusutanaset.')    // Tambahkan penyusutanaset. ke nama rute
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
        Route::prefix('returpembelianaset') // Tambahkan /returpembelianaset ke URI
            ->name('returpembelianaset.')    // Tambahkan returpembelianaset. ke nama rute
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
        Route::prefix('transferaset') // Tambahkan /transferaset ke URI
            ->name('transferaset.')    // Tambahkan transferaset. ke nama rute
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
