<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    private BarangModel $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }
    public function encodeImage($fileName)
    {
        // Path ke gambar di folder public/images
        $path = 'barang/' . $fileName;

        if (!Storage::exists($path)) {
            return response()->json(['message' => 'File not found'], 404);
        }

        // Membaca file gambar
        $image = Storage::get($path);

        // Mendapatkan tipe MIME dari gambar
//        $type = File::mimeType($path);

        // Encode ke base64
        $base64 = base64_encode($image);

        // Format base64 untuk digunakan di HTML atau API
//        $base64Image = 'data:' . $type . ';base64,' . $base64;
//        return $base64Image;
        return $base64;
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
                $row[] = '<img src="' . Storage::url('barang/barang.png') . '" alt="' . $list->nama . '" style="width: 25px; height: 25px;">';
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
        if ($barang) {
//            $barang['gambar'] = $this->encodeImage('barang.png');
            return response()->json($barang, 200);
        }
        return response()->json(['msg' => 'Data Pengguna Tidak Ditemukan'], 404);

    }

    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {
        $barang = $this->barangModel->find($id);

        if ($barang) {
            $barang->delete();
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }
}
