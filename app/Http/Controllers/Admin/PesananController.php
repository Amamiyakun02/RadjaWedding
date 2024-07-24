<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PesananController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'PAKET PEMESANAN | RADJA WEDDING',
            'breadcrumb' => 'Data Booking',
        ];
        return view('Admin.Paket.index', $data);
    }
}
