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
})->name('dashboard');

Route::get('/home', function () {
    if (!session()->has('TOKEN')) {
        return view('v_login');
    }
    return view('v_home');
});

Route::post('/profile', function () {
    $oldUserData = session('DATAUSER', []);
    $newUserData = array_merge($oldUserData, request('data'));
    session(['DATAUSER' => $newUserData]);
    return json_encode(['success' => true, 'message' => 'Berhasil update data user']);
});

Route::get('/session', function () {
    dd(session()->all());
    return view('v_home');
});

Route::get('/homepage-perusahaan', function () {
    if (!session()->has('DATAUSER') && !session()->has('LISTPERUSAHAAN')) {
        return view('v_login');
    }
    return view('v_perusahaan');
})->name('homepage.perusahaan');

require __DIR__ . '/akuntansi.php';
require __DIR__ . '/keuangan.php';
require __DIR__ . '/master.php';
require __DIR__ . '/inventori.php';
require __DIR__ . '/penjualan.php';
require __DIR__ . '/pembelian.php';
require __DIR__ . '/aset.php';
require __DIR__ . '/laporan.php';
