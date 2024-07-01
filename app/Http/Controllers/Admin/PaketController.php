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
        return view('Admin.Paket.index');
    }

    public function create(){
        return view('Admin.Paket.create');
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
