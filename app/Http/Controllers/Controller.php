<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    public function __construct()
    {
        //
    }

    public function saveSession(Request $request)
    {
        $daftar_menu = $request->daftar_menu;

        Session::put('daftar_menu', $daftar_menu);
    }

    public function homePage()
    {
        return view('home', [
            'daftar_menu' => session('daftar_menu')
        ]);
    }
}
