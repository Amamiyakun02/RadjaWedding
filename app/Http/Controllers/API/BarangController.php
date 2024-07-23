<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    private BarangModel $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }
    public function encodeImage($filename)
    {
        // Path ke gambar di folder public/images
        $path = public_path('images/' . $filename);

        if (!File::exists($path)) {
            return response()->json(['message' => 'File not found'], 404);
        }

        // Membaca file gambar
        $image = File::get($path);

        // Mendapatkan tipe MIME dari gambar
        $type = File::mimeType($path);

        // Encode ke base64
        $base64 = base64_encode($image);

        // Format base64 untuk digunakan di HTML atau API
        $base64Image = 'data:' . $type . ';base64,' . $base64;
        return $base64Image;
    }
    public function index(Request $request)
    {
        $barangModel = new BarangModel;
        if ($request->isMethod('post')) {
            $lists = $barangModel->getDatatables($request);
            $data = [];
            $no = $request->input('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nama;
                $row[] = $list->kategori;
                $row[] = $list->deskripsi;
                $row[] = $list->harga;
                $row[] = $list->stok;
//                $row[] = '<img src="{{ asset() }}" alt="'. $list->nama .'" style="width: 25px; height: 25px;">';
                $row[] = '<button onClick="editBarang(' . $list->id . ')" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>';
                $row[] = $this->encodeImage('barang.png');

                $data[] = $row;
            }

            $output = [
                'draw' => $request->input('draw'),
                'recordsTotal' => $barangModel->countAll(),
                'recordsFiltered' => $barangModel->countFiltered($request),
                'data' => $data,
            ];

            return Response::json($output);
        }
    }

    public function store(Request $request)
    {

    }


    public function show($id)
    {
        $barang = $this->barangModel->find($id);
        $barang['gambar'] = $this->encodeImage('barang.png');
        return response()->json($barang,200);
    }

    public function update(Request $request, $id)
    {

    }
    public function destroy($id){
        $barang = $this->barangModel->find($id);

        if ($barang) {
            $barang->delete();
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }
}
