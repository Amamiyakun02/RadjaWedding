<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LayananModel;
use App\Models\BundleLayananModel;
use Illuminate\Http\Request;

class LayananController extends Controller
{
        public function index()
    {
        $data = [
            'title' => 'DATA LAYANAN | RADJA WEDDING'
        ];
        return view('Admin.Layanan.index', $data);
    }

    public function create()
    {
    $data = [
            'title' => 'TAMBAH LAYANAN | RADJA WEDDING'
        ];
        return view('Admin.Layanan.create', $data);
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
