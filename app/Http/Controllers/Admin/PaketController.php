<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PaketModel;
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

    public function show(PaketModel $barangModel){

    }
    public function edit(PaketModel $barangModel){

    }

    public function update(Request $request, PaketModel $barangModel){

    }
    public function destroy(PaketModel $barangModel){

    }
    public function getBarang(request $request){

    }
}
