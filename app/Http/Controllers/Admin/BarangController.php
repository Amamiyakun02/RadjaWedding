<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use App\Models\BundleBarangModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {      
        $data = [
           'title' => 'DAFTAR BARANG | RADJA WEDDING',
        ];
;
        return view('Admin.Barang.index',$data);
    }

    public function create(){
        return view('Admin.Barang.create');
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
