<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use App\Models\BundleBarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        $data = [
           'title' => 'DAFTAR BARANG | RADJA WEDDING',
        ];
        return view('Admin.Barang.index',$data);
    }

    public function create(){
        $data = [
            'title' => 'TAMBAH BARANG | RADJA WEDDING'
            ];
        return view('Admin.Barang.create',$data);
    }
    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'kategori' => 'required',
            'url_gambar' => 'required|url',
        ]);
        DB::table('barang')->insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori' => $request->kategori,
            'url_gambar' => $request->url_gambar,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('barang')->with('success', 'Produk created successfully.');
    }

    public function show($id){

    }

    public function edit($id){
       $barang = BarangModel::findOrFail($id);
        return view('Admin.Barang.edit', compact('barang'));
    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
