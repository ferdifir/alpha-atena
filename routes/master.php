<?php

use Illuminate\Support\Facades\Route;

Route::prefix('atena/master')
    ->name('atena.master.')
    ->group(function () {
        // Master - Perkiraan
        Route::prefix('perkiraan')
            ->name('perkiraan.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.perkiraan.v_master_list_perkiraan', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.perkiraan.v_master_form_perkiraan', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - User
        Route::prefix('user')
            ->name('user.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.user.v_master_list_user', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.user.v_master_form_user', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Depo
        Route::prefix('depo')
            ->name('depo.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.depo.v_master_list_depo', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.depo.v_master_form_depo', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Currency
        Route::prefix('currency')
            ->name('currency.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.currency.v_master_list_currency', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.currency.v_master_form_currency', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Lokasi
        Route::prefix('lokasi')
            ->name('lokasi.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.lokasi.v_master_list_lokasi', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.lokasi.v_master_form_lokasi', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Merk
        Route::prefix('merk')
            ->name('merk.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.merk.v_master_list_merk', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.merk.v_master_form_merk', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Syarat Bayar
        Route::prefix('syaratbayar')
            ->name('syarat_bayar.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.syarat_bayar.v_master_list_syarat_bayar', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('list');

                Route::get('form', function () {
                    return view('atena.master.syarat_bayar.v_master_form_syarat_bayar', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Departemen Kerja
        Route::prefix('departemenkerja')
            ->name('departemen_kerja.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.departemen_kerja.v_master_list_departemen_kerja', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('list');

                Route::get('form', function () {
                    return view('atena.master.departemen_kerja.v_master_form_departemen_kerja', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Karyawan
        Route::prefix('karyawan')
            ->name('karyawan.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.karyawan.v_master_list_karyawan', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('list');

                Route::get('form', function () {
                    return view('atena.master.karyawan.v_master_form_karyawan', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Pemasok
        Route::prefix('supplier')
            ->name('supplier.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.supplier.v_master_list_supplier', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.supplier.v_master_form_supplier', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Customer
        Route::prefix('customer')
            ->name('customer.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.customer.v_master_list_customer', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.customer.v_master_form_customer', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Ekspedisi
        Route::prefix('ekspedisi')
            ->name('ekspedisi.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.ekspedisi.v_master_list_ekspedisi', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.ekspedisi.v_master_form_ekspedisi', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Harga Jual
        Route::prefix('hargajual')
            ->name('hargajual.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.harga_jual.v_master_list_harga_jual', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');
            });

        // Master - Harga Jual Berdasarkan Jumlah
        Route::prefix('hargajualberdasarkanjumlah')
            ->name('hargajualberdasarkanjumlah.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.harga_jual_berdasarkan_jumlah.v_master_list_harga_jual_berdasarkan_jumlah', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');
            });

        // Master - Sopir
        Route::prefix('sopir')
            ->name('sopir.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.sopir.v_master_list_sopir', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.sopir.v_master_form_sopir', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Kendaraan
        Route::prefix('kendaraan')
            ->name('kendaraan.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.kendaraan.v_master_list_kendaraan', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.kendaraan.v_master_form_kendaraan', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Jenis Pemakaian
        Route::prefix('jenispemakaian')
            ->name('jenis_pemakaian.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.jenis_pemakaian.v_master_list_jenis_pemakaian', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.jenis_pemakaian.v_master_form_jenis_pemakaian', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Tipe Customer
        Route::prefix('tipecustomer')
            ->name('tipe_customer.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.tipe_customer.v_master_list_tipe_customer', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.tipe_customer.v_master_form_tipe_customer', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Alat Bayar
        Route::prefix('alatbayar')
            ->name('alat_bayar.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.alat_bayar.v_master_list_alat_bayar', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.alat_bayar.v_master_form_alat_bayar', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Servis
        Route::prefix('servis')
            ->name('servis.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.servis.v_master_list_servis', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.servis.v_master_form_servis', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Alat Bayar Non Tunai
        Route::prefix('alatbayarnontunai')
            ->name('alat_bayar_non_tunai.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.alat_bayar_non_tunai.v_master_list_alat_bayar_non_tunai', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.alat_bayar_non_tunai.v_master_form_alat_bayar_non_tunai', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Satuan
        Route::prefix('satuan')
            ->name('satuan.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.satuan.v_master_list_satuan', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.satuan.v_master_form_satuan', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Harga Beli
        Route::prefix('hargabeli')
            ->name('harga_beli.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.harga_beli.v_master_list_harga_beli', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');
            });

        // Master - PPN
        Route::prefix('ppn')
            ->name('ppn.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.ppn.v_master_list_ppn', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.ppn.v_master_form_ppn', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Barang
        Route::prefix('barang')
            ->name('barang.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.barang.v_master_list_barang', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.barang.v_master_form_barang', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Promo
        Route::prefix('promo')
            ->name('promo.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.promo.v_master_list_promo', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('form', function () {
                    return view('atena.master.promo.v_master_form_promo', [
                        'kodemenu' => request()->kode,
                        'data' => request()->data,
                        'mode' => request()->mode,
                    ]);
                })->name('form');
            });

        // Master - Pengaturan
        Route::prefix('pengaturan')
            ->name('pengaturan.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.pengaturan.v_master_form_pengaturan', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');

                Route::get('view-master-perusahaan', function () {
                    return view('atena.master.pengaturan.v_master_frame_perusahaan', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('frame-master-perusahaan');

                Route::get('view-master-global', function () {
                    return view('atena.master.pengaturan.v_master_frame_global', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('frame-master-global');

                Route::get('view-master-master', function () {
                    return view('atena.master.pengaturan.v_master_frame_master', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('frame-master-master');

                Route::get('view-master-pembelian', function () {
                    return view('atena.master.pengaturan.v_master_frame_pembelian', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('frame-master-pembelian');

                Route::get('view-master-penjualan', function () {
                    return view('atena.master.pengaturan.v_master_frame_penjualan', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('frame-master-penjualan');

                Route::get('view-master-inventori', function () {
                    return view('atena.master.pengaturan.v_master_frame_inventori', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('frame-master-inventori');

                Route::get('view-master-aset', function () {
                    return view('atena.master.pengaturan.v_master_frame_aset', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('frame-master-aset');

                Route::get('view-master-produksi', function () {
                    return view('atena.master.pengaturan.v_master_frame_produksi', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('frame-master-produksi');

                Route::get('view-master-keuangan', function () {
                    return view('atena.master.pengaturan.v_master_frame_keuangan', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('frame-master-keuangan');

                Route::get('view-master-akuntansi', function () {
                    return view('atena.master.pengaturan.v_master_frame_akuntansi', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('frame-master-akuntansi');
            });

        // Master - Jurnal Link
        Route::prefix('jurnallink')
            ->name('jurnal_link.')
            ->group(function () {
                Route::get('data', function () {
                    return view('atena.master.jurnal_link.v_master_list_jurnal_link', [
                        'kodemenu' => request()->kode,
                    ]);
                })->name('data');
            });
    });
