<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\LayananModel;
use App\Models\BarangModel;
use App\Models\BundlePenyewaanModel;

class MainController extends Controller
{
    private UserModel $UserModel;
    private BarangModel $BarangModel;
    private LayananModel $LayananModel;
    private BundlePenyewaanModel $BundlePenyewaanModel;


    public function __construct(){
        $this->middleware('auth');
        $this->UserModel = new UserModel();
        $this->LayananModel = new LayananModel();
        $this->BarangModel = new BarangModel();
        $this->BundlePenyewaanModel = new BundlePenyewaanModel();
    }

    public function index(){
        return view('Customers.Content.landing-page');
    }

    public function dashboard(){
        return view('Content.Dashboard');
    }


}
