<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananModel;
class LayananController extends Controller
{
    public function index(){
        $layanan = LayananModel::all();
        return response()->json($layanan);
    }
}
