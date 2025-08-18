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

Route::get('/master/perkiraan/form',function (){
    return view('atena.master.perkiraan.v_master_form_perkiraan',[
        'kodemenu'=>request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.perkiraan.form');

//Master Pengaturan
Route::get('atena/master/pengaturan/data',function (){
    return view('atena.master.pengaturan.v_master_form_pengaturan',[
        'kodemenu'=>request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
    ]);
})->name('atena.master.perkiraan.form');

Route::get('atena/master/data/pengaturan/view-master-perusahaan',function (){
    $issignup = count(session('LISTPERUSAHAAN')) == 0;
    return view('atena.master.pengaturan.v_master_frame_perusahaan',[
        'kodemenu'=>request()->kode,
        'data'=>request()->data,
        'mode'=>request()->mode,
        'issignup'=>$issignup
    ]);
})->name('atena.master.perkiraan.form');
