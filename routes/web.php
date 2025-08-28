<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UrlAPI;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $link = UrlAPI::getAllUrl();
    return view('v_login');
});

Route::post('save-session', function () {
    $data = request("data");
    foreach ($data as $dataSesion) {
        session([$dataSesion['keySession'] => $dataSesion['valueSession']]);
    }
    return true;
})->name('save.session');

Route::get('/dashboard', function () {
    return view('v_dashboard');
});

Route::get('/home', function () {
    return view('v_home');
});

Route::get('/session', function () {
    dd(session()->all());
    return view('v_home');
});

Route::get('/hompage-perusahaan', function () {
    return view('v_perusahaan');
})->name('homepage.perusahaan');


//Master Perkiraan
Route::get('atena/master/perkiraan/data',function (){
    return view('atena.master.perkiraan.v_master_list_perkiraan',[
        'kodemenu'=>request()->kode,
    ]);
})->name('atena.master.perkiraan.data');

Route::get('atena/master/perkiraan/form',function (){
    return view('atena.master.perkiraan.v_master_form_perkiraan',[
        'kodemenu'=>request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.perkiraan.form');

// Master User
Route::get('atena/master/user/data',function (){
    return view('atena.master.user.v_master_list_user',[
        'kodemenu'=>request()->kode,
    ]);
})->name('atena.master.user.data');

Route::get('atena/master/user/form',function (){
    return view('atena.master.user.v_master_form_user',[
        'kodemenu'=>request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.user.form');

//Master Currency
Route::get('atena/master/currency/data',function (){
    return view('atena.master.currency.v_master_list_currency',[
        'kodemenu'=>request()->kode,
    ]);
})->name('atena.master.currency.data');

Route::get('atena/master/currency/form',function (){
    return view('atena.master.currency.v_master_form_currency',[
        'kodemenu'=>request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.currency.form');

//Master Lokasi
Route::get('atena/master/lokasi/data',function (){
    return view('atena.master.lokasi.v_master_list_lokasi',[
        'kodemenu'=>request()->kode,
    ]);
})->name('atena.master.lokasi.data');

Route::get('atena/master/lokasi/form',function (){
    return view('atena.master.lokasi.v_master_form_lokasi',[
        'kodemenu'=>request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.lokasi.form');

//Master Merk
Route::get('atena/master/merk/data',function (){
    return view('atena.master.merk.v_master_list_merk',[
        'kodemenu'=>request()->kode,
    ]);
})->name('atena.master.merk.data');

Route::get('atena/master/merk/form',function (){
    return view('atena.master.merk.v_master_form_merk',[
        'kodemenu'=>request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.merk.form');

// Master Syarat Bayar
Route::get('atena/master/syaratbayar/data',function (){
    return view('atena.master.syarat_bayar.v_master_list_syarat_bayar',[
        'kodemenu'=>request()->kode,
    ]);
})->name('atena.master.syarat_bayar.list');

Route::get('atena/master/syaratbayar/form',function (){
    return view('atena.master.syarat_bayar.v_master_form_syarat_bayar',[
        'kodemenu'=>request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.syarat_bayar.form');

// Master Departemen Kerja
Route::get('atena/master/departemenkerja/data',function (){
    return view('atena.master.departemen_kerja.v_master_list_departemen_kerja',[
        'kodemenu'=>request()->kode,
    ]);
})->name('atena.master.departemen_kerja.list');

Route::get('atena/master/departemenkerja/form',function (){
    return view('atena.master.departemen_kerja.v_master_form_departemen_kerja',[
        'kodemenu'=>request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.departemen_kerja.form');


// Master Karyawan
Route::get('atena/master/karyawan/data',function (){
    return view('atena.master.karyawan.v_master_list_karyawan',[
        'kodemenu'=>request()->kode,
    ]);
})->name('atena.master.karyawan.list');

Route::get('atena/master/karyawan/form',function (){
    return view('atena.master.karyawan.v_master_form_karyawan',[
        'kodemenu'=>request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.karyawan.form');
// Master Pemasok
Route::get('atena/master/supplier/data', function() {
    return view('atena.master.supplier.v_master_list_supplier', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.supplier.data');

Route::get('atena/master/supplier/form', function() {
    return view('atena.master.supplier.v_master_form_supplier', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.supplier.form');

// Master Customer
Route::get('atena/master/customer/data', function() {
    return view('atena.master.customer.v_master_list_customer', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.customer.data');

Route::get('atena/master/customer/form', function() {
    return view('atena.master.customer.v_master_form_customer', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.customer.form');

// Master Ekspedisi
Route::get('atena/master/ekspedisi/data', function() {
    return view('atena.master.ekspedisi.v_master_list_ekspedisi', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.ekspedisi.data');

Route::get('atena/master/ekspedisi/form', function() {
    return view('atena.master.ekspedisi.v_master_form_ekspedisi', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.ekspedisi.form');

// Harga Jual
Route::get('atena/master/hargajual/data', function() {
    return view('atena.master.harga_jual.v_master_list_harga_jual', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.hargajual.data');

// Harga Jual Berdasarkan Jumlah
Route::get('atena/master/hargajualberdasarkanjumlah/data', function() {
    return view('atena.master.harga_jual_berdasarkan_jumlah.v_master_list_harga_jual_berdasarkan_jumlah', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.hargajualberdasarkanjumlah.data');

// Master sopir
Route::get('atena/master/sopir/data', function() {
    return view('atena.master.sopir.v_master_list_sopir', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.sopir.data');

Route::get('atena/master/sopir/form', function() {
    return view('atena.master.sopir.v_master_form_sopir', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.sopir.form');

// Master kendaraan
Route::get('atena/master/kendaraan/data', function() {
    return view('atena.master.kendaraan.v_master_list_kendaraan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.kendaraan.data');

Route::get('atena/master/kendaraan/form', function() {
    return view('atena.master.kendaraan.v_master_form_kendaraan', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.kendaraan.form');

// Master jenis pemakaian
Route::get('atena/master/jenispemakaian/data', function() {
    return view('atena.master.jenis_pemakaian.v_master_list_jenis_pemakaian', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.jenis_pemakaian.data');

Route::get('atena/master/jenispemakaian/form', function() {
    return view('atena.master.jenis_pemakaian.v_master_form_jenis_pemakaian', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.jenis_pemakaian.form');

// Master tipe customer
Route::get('atena/master/tipecustomer/data', function() {
    return view('atena.master.tipe_customer.v_master_list_tipe_customer', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.tipe_customer.data');

Route::get('atena/master/tipecustomer/form', function() {
    return view('atena.master.tipe_customer.v_master_form_tipe_customer', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.tipe_customer.form');

// Master alat bayar
Route::get('atena/master/alatbayar/data', function() {
    return view('atena.master.alat_bayar.v_master_list_alat_bayar', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.alat_bayar.data');

Route::get('atena/master/alatbayar/form', function() {
    return view('atena.master.alat_bayar.v_master_form_alat_bayar', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.alat_bayar.form');

// Master alat bayar non tunai
Route::get('atena/master/alatbayarnontunai/data', function() {
    return view('atena.master.alat_bayar_non_tunai.v_master_list_alat_bayar_non_tunai', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.alat_bayar_non_tunai.data');

Route::get('atena/master/alatbayarnontunai/form', function() {
    return view('atena.master.alat_bayar_non_tunai.v_master_form_alat_bayar_non_tunai', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.alat_bayar_non_tunai.form');

// Master satuan
Route::get('atena/master/satuan/data', function() {
    return view('atena.master.satuan.v_master_list_satuan', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.satuan.data');

Route::get('atena/master/satuan/form', function() {
    return view('atena.master.satuan.v_master_form_satuan', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.satuan.form');

// Master harga beli
Route::get('atena/master/hargabeli/data', function() {
    return view('atena.master.harga_beli.v_master_list_harga_beli', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.harga_beli.data');

// Master ppn
Route::get('atena/master/ppn/data', function() {
    return view('atena.master.ppn.v_master_list_ppn', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.ppn.data');

Route::get('atena/master/ppn/form', function() {
    return view('atena.master.ppn.v_master_form_ppn', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.ppn.form');

// Barang
Route::get('atena/master/barang/data', function() {
    return view('atena.master.barang.v_master_list_barang', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.barang.data');

Route::get('atena/master/barang/form', function() {
    return view('atena.master.barang.v_master_form_barang', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.barang.form');

// Promo
Route::get('atena/master/promo/data', function() {
    return view('atena.master.promo.v_master_list_promo', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.promo.data');

Route::get('atena/master/promo/form', function() {
    return view('atena.master.promo.v_master_form_promo', [
        'kodemenu' => request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.promo.form');

// Jurnal Link
Route::get('atena/master/jurnallink/data', function() {
    return view('atena.master.jurnal_link.v_master_list_jurnal_link', [
        'kodemenu' => request()->kode,
    ]);
})->name('atena.master.jurnal_link.data');
