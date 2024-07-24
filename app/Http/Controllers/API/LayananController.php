<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class LayananController extends Controller
{
    private function deleteOldImage($url_gambar)
    {
        $fullPath = public_path('images/barang/' . $url_gambar);

        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }
    }

    private function decodeImage($base64String, $namaBarang)
    {
        $base64String = preg_replace('/^data:image\/\w+;base64,/', '', $base64String);
        $imageData = base64_decode($base64String);

        if ($imageData === false) {
            throw new \Exception('Invalid base64 string');
        }

        // Check image size
        $imageSize = strlen($imageData);
        $maxSize = 1 * 1024 * 1024; // 1 MB

        if ($imageSize > $maxSize) {
            throw new \Exception('Image size exceeds 1 MB');
        }

        // Generate a unique filename
        $filename = Str::slug($namaBarang) . '-' . Str::random(10) . '.jpg'; // Adjust extension based on image type
        $path = public_path('images/barang/' . $filename);

        // Save the image
        File::put($path, $imageData);

        return $filename;
    }

    public function index(Request $request)
    {
        $barangModel = new LayananModel();
        if ($request->isMethod('post')) {
            $lists = $barangModel->getDatatables($request);
            $data = [];
            $no = $request->input('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nama;
                $row[] = $list->deskripsi;
                $row[] = '<img src="' . asset($list->url_gambar) . '" alt="' . $list->url_gambar . '" style="width: 70px; height: 70px;">';
                $row[] = '<button onClick="editLayanan(' . $list->id . ')" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                          <button onClick="hapusLayanan(' . $list->id . ')" class="btn btn-danger"><i class="fas fa-trash"></i></button>';
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
        $layanan = LayananModel::find($id);
        if ($layanan) {
            return response()->json($layanan, 200);
        }
        return response()->json(['msg' => 'Data Barang Tidak Ditemukan'], 404);
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $layanan = LayananModel::findOrFail($id);

        if ($layanan) {
            // Hapus gambar dari storage
            $this->deleteOldImage($layanan->url_gambar);
            // Hapus entri dari database
            $layanan->delete();

            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Layanan Tidak di Temukan'], 404);
        }
    }
}
