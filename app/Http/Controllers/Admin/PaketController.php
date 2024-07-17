<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\BundlePenyewaanModel;
use App\Models\BundleBarangModel;
use App\Models\BundleLayananModel;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'PAKET PEMESANAN | RADJA WEDDING'
        ];
        return view('Admin.Paket.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'TAMBAH PAKET PEMESANAN | RADJA WEDDING'
        ];
        return view('Admin.Paket.create', $data);
    }

    public function store(Request $request){

    }

    public function edit($id){

    }

    public function update(Request $request){

    }
    public function destroy($id){

    }
    public function getPaket(request $request){

    }
}
