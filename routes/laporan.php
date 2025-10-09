<?php

use Illuminate\Support\Facades\Route;

Route::prefix('atena/laporan')
    ->name('atena.laporan.')
    ->group(function () {

        Route::prefix('laporanmaster')
            ->name('laporanmaster.')
            ->group(function () {

                Route::get('laporancustomer', function () {
                    return view('atena.laporan.master.v_master_laporan_customer', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporancustomer');

                Route::get('laporanuser', function () {
                    return view('atena.laporan.master.v_master_laporan_user', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanuser');

                Route::get('laporanlokasi', function () {
                    return view('atena.laporan.master.v_master_laporan_lokasi', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanlokasi');

                Route::get('laporanmerk', function () {
                    return view('atena.laporan.master.v_master_laporan_merk', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanmerk');

                Route::get('laporanbarang', function () {
                    return view('atena.laporan.master.v_master_laporan_barang', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanbarang');

                Route::get('laporanbarcodebarang', function () {
                    $menu = preg_replace_callback('/\b([a-z])/', function ($matches) {
                        return strtoupper($matches[1]);
                    }, request()->menu);
                    return view('atena.laporan.master.v_master_laporan_barcode_barang', [
                        'kodemenu' => request()->kode,
                        'menu' => $menu,
                        'jenis' => request()->jenis
                    ]);
                })->name('laporanbarcodebarang');

                Route::get('laporansyaratbayar', function () {
                    return view('atena.laporan.master.v_master_laporan_syarat_bayar', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporansyaratbayar');

                Route::get('laporansupplier', function () {
                    return view('atena.laporan.master.v_master_laporan_supplier', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporansupplier');

                Route::get('laporanekspedisi', function () {
                    return view('atena.laporan.master.v_master_laporan_ekspedisi', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanekspedisi');

                Route::get('laporankaryawan', function () {
                    return view('atena.laporan.master.v_master_laporan_karyawan', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporankaryawan');

                Route::get('laporansopir', function () {
                    return view('atena.laporan.master.v_master_laporan_sopir', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporansopir');

                Route::get('laporankendaraan', function () {
                    return view('atena.laporan.master.v_master_laporan_kendaraan', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporankendaraan');

                Route::get('laporanproduksi2', function () {
                    return view('atena.laporan.master.v_master_laporan_produksi2', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanproduksi2');

                Route::get('laporanperkiraan', function () {
                    return view('atena.laporan.master.v_master_laporan_perkiraan', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanperkiraan');

                Route::get('laporancurrency', function () {
                    return view('atena.laporan.master.v_master_laporan_currency', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporancurrency');

                Route::get('laporanhistory', function () {
                    return view('atena.laporan.master.v_master_laporan_history', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanhistory');

                // atena/laporan/laporanmaster/laporanalatbayar
                Route::get('laporanalatbayar', function () {
                    return view('atena.laporan.master.v_master_laporan_alat_bayar', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanalatbayar');

                // atena/laporan/laporanmaster/laporandepartemenkerja
                Route::get('laporandepartemenkerja', function () {
                    return view('atena.laporan.master.v_master_laporan_departemen_kerja', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporandepartemenkerja');

                // atena/laporan/laporanmaster/laporankomposisi
                Route::get('laporankomposisi', function () {
                    return view('atena.laporan.master.v_master_laporan_komposisi', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporankomposisi');

                // atena/laporan/laporanmaster/laporantipecustomer
                Route::get('laporantipecustomer', function () {
                    return view('atena.laporan.master.v_master_laporan_tipe_customer', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporantipecustomer');
            });


        Route::prefix('laporanpembelian')
            ->name('laporanpembelian.')
            ->group(function () {

                // Laporan Pembelian - Permintaan Barang
                // atena/laporan/laporanpembelian/laporanpr
                Route::get('laporanpr', function () {
                    return view('atena.laporan.pembelian.v_pembelian_laporan_pr', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanpr');

                // Laporan Pembelian - Pesanan Pembelian
                // atena/laporan/laporanpembelian/laporanpo
                Route::get('laporanpo', function () {
                    return view('atena.laporan.pembelian.v_pembelian_laporan_po', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanpo');

                // Laporan Pembelian - Pembelian/Retur
                // atena/laporan/laporanpembelian/laporanpembelian
                Route::get('laporanpembelian', function () {
                    return view('atena.laporan.pembelian.v_pembelian_laporan_pembelian', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                });

                // Laporan Pembelian - Analisis PO
                // atena/laporan/laporanpembelian/analisispo
                Route::get('analisispo', function () {
                    return view('atena.laporan.pembelian.v_pembelian_laporan_analisis_po', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('analisispo');
            });

        Route::prefix('laporanpenjualan')
            ->name('laporanpenjualan.')
            ->group(function () {

                // Laporan Penjualan - Pesanan Penjualan
                // atena/laporan/laporanpenjualan/laporansalesorder
                Route::get('laporansalesorder', function () {
                    return view('atena.laporan.penjualan.v_penjualan_laporan_sales_order', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporansalesorder');

                // Laporan Penjualan - Pesanan Pengiriman
                // atena/laporan/laporanpenjualan/laporandeliveryorder
                Route::get('laporandeliveryorder', function () {
                    return view('atena.laporan.penjualan.v_penjualan_laporan_delivery_order', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporandeliveryorder');

                // Laporan Penjualan - Penjualan
                // atena/laporan/laporanpenjualan/laporanpenjualan
                Route::get('laporanpenjualan', function () {
                    return view('atena.laporan.penjualan.v_penjualan_laporan_penjualan', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanpenjualan');
            });

        Route::prefix('laporaninventori')
            ->name('laporaninventori.')
            ->group(function () {

                // Laporan Inventori - Transfer
                // atena/laporan/laporaninventori/laporantransferpersediaan
                Route::get('laporantransferpersediaan', function () {
                    return view('atena.laporan.inventori.v_inventori_laporan_transfer', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporantransferpersediaan');

                // Laporan Inventori - Terima Transfer
                // atena/laporan/laporaninventori/laporanterimatransferpersediaan
                Route::get('laporanterimatransferpersediaan', function () {
                    return view('atena.laporan.inventori.v_inventori_laporan_terima_transfer', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanterimatransferpersediaan');

                // Laporan Inventori - Bukti Penerimaan
                // atena/laporan/laporaninventori/laporanbuktipenerimaanpersediaan
                Route::get('laporanbuktipenerimaanpersediaan', function () {
                    return view('atena.laporan.inventori.v_inventori_laporan_bukti_penerimaan', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanbuktipenerimaanpersediaan');

                // Laporan Inventori - Bukti Pengeluaran
                // atena/laporan/laporaninventori/laporanbuktipengeluaranpersediaan
                Route::get('laporanbuktipengeluaranpersediaan', function () {
                    return view('atena.laporan.inventori.v_inventori_laporan_bukti_pengeluaran', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanbuktipengeluaranpersediaan');

                // Laporan Inventori - Repacking
                // atena/laporan/laporaninventori/laporanrepacking
                Route::get('laporanrepacking', function () {
                    return view('atena.laporan.inventori.v_inventori_laporan_repacking', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanrepacking');

                // Laporan Inventori - Pemakaian Bahan
                // atena/laporan/laporaninventori/laporanpemakaianbahan
                Route::get('laporanpemakaianbahan', function () {
                    return view('atena.laporan.inventori.v_inventori_laporan_pemakaian_bahan', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanpemakaianbahan');

                // Laporan Inventori - Saldo Awal Stok
                // atena/laporan/laporaninventori/laporansaldoawal
                Route::get('laporansaldoawal', function () {
                    return view('atena.laporan.inventori.v_inventori_laporan_saldo_awal', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporansaldoawal');

                // Laporan Inventori - Opname Stok
                // atena/laporan/laporaninventori/laporanopnamestok
                Route::get('laporanopnamestok', function () {
                    return view('atena.laporan.inventori.v_inventori_laporan_opname_stok', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanopnamestok');

                // Laporan Inventori - Penyesuaian Stok
                // atena/laporan/laporaninventori/laporanpenyesuaianstok
                Route::get('laporanpenyesuaianstok', function () {
                    return view('atena.laporan.inventori.v_inventori_laporan_penyesuaian_stok', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanpenyesuaianstok');

                // Laporan Inventori - Kartu Stok
                // atena/laporan/laporaninventori/laporankartustok
                Route::get('laporankartustok', function () {
                    return view('atena.laporan.inventori.v_inventori_laporan_kartu_stok', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporankartustok');

                // Laporan Inventori - Posisi Stok
                // atena/laporan/laporaninventori/laporanposisistok
                Route::get('laporanposisistok', function () {
                    return view('atena.laporan.inventori.v_inventori_laporan_posisi_stok', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanposisistok');

                // Laporan Inventori - Mutasi Stok
                // atena/laporan/laporaninventori/laporanmutasistok
                Route::get('laporanmutasistok', function () {
                    return view('atena.laporan.inventori.v_inventori_laporan_mutasi_stok', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanmutasistok');
            });

        Route::prefix('laporankeuangan')
            ->name('laporankeuangan.')
            ->group(function () {

                // Laporan Keuangan - Uang Muka Pembelian
                // atena/laporan/laporankeuangan/laporanuangmukapembelian
                Route::get('laporanuangmukapembelian', function () {
                    return view('atena.laporan.keuangan.v_keuangan_laporan_uangmuka_pembelian', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanuangmuka');

                // Laporan Keuangan - Uang Muka Penjualan
                // atena/laporan/laporankeuangan/laporanuangmukapenjualan
                Route::get('laporanuangmukapenjualan', function () {
                    return view('atena.laporan.keuangan.v_keuangan_laporan_uangmuka_penjualan', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanuangmuka');

                // Laporan Keuangan - Potongan Pembelian
                // atena/laporan/laporankeuangan/laporandebetnote
                Route::get('laporandebetnote', function () {
                    return view('atena.laporan.keuangan.v_keuangan_laporan_debet_note', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporandebetnote');

                // Laporan Keuangan - Potongan Penjualan
                // atena/laporan/laporankeuangan/laporancreditnote
                Route::get('laporancreditnote', function () {
                    return view('atena.laporan.keuangan.v_keuangan_laporan_credit_note', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporancreditnote');

                // Laporan Keuangan - Tanda Terima Pemasok
                // atena/laporan/laporankeuangan/laporantandaterimatagihansupplier
                Route::get('laporantandaterimatagihansupplier', function () {
                    return view('atena.laporan.keuangan.v_keuangan_laporan_tanda_terima_tagihan_supplier', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporantandaterimatagihansupplier');

                // Laporan Keuangan - Tagihan Pelanggan
                // atena/laporan/laporankeuangan/laporantagihancustomer
                Route::get('laporantagihancustomer', function () {
                    return view('atena.laporan.keuangan.v_keuangan_laporan_tagihan_customer', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporantagihancustomer');

                // Laporan Keuangan - Hutang dan Pelunasan Hutang
                // atena/laporan/laporankeuangan/laporanhutang
                Route::get('laporanhutang', function () {
                    return view('atena.laporan.keuangan.v_keuangan_laporan_hutang', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanhutang');

                // Laporan Keuangan - Piutang dan Pelunasan Piutang
                // atena/laporan/laporankeuangan/laporanpiutang
                Route::get('laporanpiutang', function () {
                    return view('atena.laporan.keuangan.v_keuangan_laporan_piutang', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanpiutang');


                // Laporan Keuangan - Piutang Karyawan dan Pelunasan
                // atena/laporan/laporankeuangan/laporanpiutangkaryawan
                Route::get('laporanpiutangkaryawan', function () {
                    return view('atena.laporan.keuangan.v_keuangan_laporan_piutang_karyawan', [
                        'kodemenu' => request()->kode,
                        'menu' => ucwords(request()->menu)
                    ]);
                })->name('laporanpiutangkaryawan');
            });
    });
