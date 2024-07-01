<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LayananController extends Controller
{

    public function index(){
        return view('Admin.Layanan.index');
    }
}
