<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
class BarangController extends Controller
{
    public function index()
    {
        return view('Admin.Barang.index');
    }
}
