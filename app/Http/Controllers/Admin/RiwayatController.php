<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class RiwayatController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Pengguna | RADJA WEDDING',
            'breadcrumb' => 'Pengguna'
        ];
//        $users = $this->userModel->paginate(10);
        return view('Admin.Riwayat.index', $data, compact(''));
    }

    public function create()
    {

    }

    public function show($id){

    }

    public function edit($id){

    }

    public function destroy($id){

    }
}
