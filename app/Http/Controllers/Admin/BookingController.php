<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingModel;
use App\Models\DetailBookingModel;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'PAKET PEMESANAN | RADJA WEDDING',
            'breadcrumb' => 'Paket Pemesanan',
        ];
        return view('Admin.Paket.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'TAMBAH PAKET PEMESANAN | RADJA WEDDING',
            'breadcrumb' => 'Tambah Paket Pemesanan',
        ];
        return view('Admin.Paket.create', $data);
    }

    public function store(Request $request){

    }

    public function show($id){

    }


    public function edit($id){

    }

    public function update(Request $request, $id){

    }


    public function destroy($id){

    }
}
