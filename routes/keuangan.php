<?php

use Illuminate\Support\Facades\Route;

// SALDO AWAL HUTANG
Route::get('atena/keuangan/saldoawalhutang/transaksi', function() {
    return view('atena.keuangan.saldoawalhutang.v_keuangan_list_saldoawalhutang', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.saldoawalhutang.transaksi');

Route::get('atena/keuangan/saldoawalhutang/form', function() {
    return view('atena.keuangan.saldoawalhutang.v_keuangan_form_saldoawalhutang', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.saldoawalhutang.form');

// SALDO AWAL PIUTANG
Route::get('atena/keuangan/saldoawalpiutang/transaksi', function() {
    return view('atena.keuangan.saldoawalpiutang.v_keuangan_list_saldoawalpiutang', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.saldoawalpiutang.transaksi');

Route::get('atena/keuangan/saldoawalpiutang/form', function() {
    return view('atena.keuangan.saldoawalpiutang.v_keuangan_form_saldoawalpiutang', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.saldoawalpiutang.form');

// POTONGAN PEMBELIAN
Route::get('atena/keuangan/debetnote/transaksi', function() {
    return view('atena.keuangan.debet_note.v_keuangan_list_debet_note', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.debet_note.transaksi');

Route::get('atena/keuangan/debetnote/form', function() {
    return view('atena.keuangan.debet_note.v_keuangan_form_debet_note', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.debet_note.form');

// POTONGAN PENJUALAN
Route::get('atena/keuangan/creditnote/transaksi', function() {
    return view('atena.keuangan.credit_note.v_keuangan_list_credit_note', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.credit_note.transaksi');

Route::get('atena/keuangan/creditnote/form', function() {
    return view('atena.keuangan.credit_note.v_keuangan_form_credit_note', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.credit_note.form');

// PELUNASAN HUTANG
Route::get('atena/keuangan/pelunasanhutang/transaksi', function() {
    return view('atena.keuangan.pelunasan_hutang.v_keuangan_list_pelunasan_hutang', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.pelunasan_hutang.transaksi');

Route::get('atena/keuangan/pelunasanhutang/form', function() {
    return view('atena.keuangan.pelunasan_hutang.v_keuangan_form_pelunasan_hutang', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.pelunasan_hutang.form');

// PELUNASAN PIUTANG
Route::get('atena/keuangan/pelunasanpiutang/transaksi', function() {
    return view('atena.keuangan.pelunasan_piutang.v_keuangan_list_pelunasan_piutang', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.pelunasan_piutang.transaksi');

Route::get('atena/keuangan/pelunasanpiutang/form', function() {
    return view('atena.keuangan.pelunasan_piutang.v_keuangan_form_pelunasan_piutang', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.pelunasan_piutang.form');

// TANDA TERIMA
Route::get('atena/keuangan/tandaterima/transaksi', function() {
    if(request()->kode == 'yuq25') {
        return view('atena.keuangan.tanda_terima.v_keuangan_list_approve_tanda_terima', [
            'kodemenu' => request()->kode,
            'jenis'    => request()->jenis,
        ]);
    }
    return view('atena.keuangan.tanda_terima.v_keuangan_list_tanda_terima', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.tanda_terima.transaksi');

Route::get('atena/keuangan/tandaterima/form', function() {
    return view('atena.keuangan.tanda_terima.v_keuangan_form_tanda_terima', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.tanda_terima.form');

// TAGIHAN PIUTANG
Route::get('atena/keuangan/tagihanpiutang/transaksi', function() {
    return view('atena.keuangan.tagihan_pelanggan.v_keuangan_list_tagihan_pelanggan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.tagihan_pelanggan.transaksi');

Route::get('atena/keuangan/tagihanpelanggan/form', function() {
    return view('atena.keuangan.tagihan_pelanggan.v_keuangan_form_tagihan_pelanggan', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.tagihan_pelanggan.form');

// TAGIHAN PIUTANG
Route::get('atena/keuangan/pelunasanpiutangkaryawan/transaksi', function() {
    return view('atena.keuangan.pelunasan_piutang_karyawan.v_keuangan_list_pelunasan_piutang_karyawan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.pelunasan_piutang_karyawan.transaksi');

Route::get('atena/keuangan/pelunasanpiutangkaryawan/form', function() {
    return view('atena.keuangan.pelunasan_piutang_karyawan.v_keuangan_form_pelunasan_piutang_karyawan', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.pelunasan_piutang_karyawan.form');

// SETORAN PENJUALAN PER KASIR
Route::get('atena/keuangan/setoranpenjualanperkasir/transaksi', function() {
    return view('atena.keuangan.setoran_penjualan_kasir.v_keuangan_list_setoran_penjualan_kasir', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.setoran_penjualan_kasir.transaksi');

// PELUNASAN UANG MUKA SO
Route::get('atena/keuangan/pelunasanuangmukaso/transaksi', function() {
    return view('atena.keuangan.pelunasan_uangmukaso.v_keuangan_list_pelunasan_uangmukaso', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.pelunasan_uangmukaso.transaksi');

Route::get('atena/keuangan/pelunasanuangmukaso/form', function() {
    return view('atena.keuangan.pelunasan_uangmukaso.v_keuangan_form_pelunasan_uangmukaso', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.pelunasan_uangmukaso.form');

// PELUNASAN UANG MUKA PO
Route::get('atena/keuangan/pelunasanuangmukapo/transaksi', function() {
    return view('atena.keuangan.pelunasan_uangmukapo.v_keuangan_list_pelunasan_uangmukapo', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.pelunasan_uangmukapo.transaksi');

Route::get('atena/keuangan/pelunasanuangmukapo/form', function() {
    return view('atena.keuangan.pelunasan_uangmukapo.v_keuangan_form_pelunasan_uangmukapo', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.pelunasan_uangmukapo.form');

// HUTANG LAIN
Route::get('atena/keuangan/hutanglain/transaksi', function() {
    return view('atena.keuangan.hutang_lain.v_keuangan_list_hutang_lain', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.hutang_lain.transaksi');

Route::get('atena/keuangan/hutanglain/form', function() {
    return view('atena.keuangan.hutang_lain.v_keuangan_form_hutang_lain', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.hutang_lain.form');

// PIUTANG LAIN
Route::get('atena/keuangan/piutanglain/transaksi', function() {
    return view('atena.keuangan.piutang_lain.v_keuangan_list_piutang_lain', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.keuangan.piutang_lain.transaksi');

Route::get('atena/keuangan/piutanglain/form', function() {
    return view('atena.keuangan.piutang_lain.v_keuangan_form_piutang_lain', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.keuangan.piutang_lain.form');