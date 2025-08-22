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
