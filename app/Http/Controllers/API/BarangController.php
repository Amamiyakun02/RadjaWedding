<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BarangController extends Controller
{
    private BarangModel $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }
    private function deleteOldImage($url_gambar)
    {
        $fullPath = storage_path('app/public/' . $url_gambar);

        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }
    }

    private function encodeImage($fileName)
    {
        // Path ke gambar di folder public/images
        $path = 'barang/' . $fileName;

        if (!Storage::exists($path)) {
            return response()->json(['message' => 'File not found'], 404);
        }

        // Membaca file gambar
        $image = Storage::get($path);

        // Mendapatkan tipe MIME dari gambar
        $type = File::mimeType($path);

        // Encode ke base64
        $base64 = base64_encode($image);

        return $base64;
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
        $path = public_path('storage/barang/' . $filename);

        // Save the image
        File::put($path, $imageData);

        return 'storage/barang/' . $filename;

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
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'base64_image' => 'required|string',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'harga.required' => 'Harga harus diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'stok.required' => 'Stok harus diisi.',
            'stok.integer' => 'Stok harus berupa angka bulat.',
            'kategori.required' => 'Kategori harus diisi.',
            'kategori.string' => 'Kategori harus berupa teks.',
            'kategori.max' => 'Kategori maksimal 255 karakter.',
            'base64_image.required' => 'Base64 image string harus diisi.',
            'base64_image.string' => 'Base64 image string harus berupa teks.',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        DB::beginTransaction();

        try {
            // Decode base64 image and save
            $filename = $this->decodeImage($request->base64_image, $request->nama);

            // Create produk
            $produk = BarangModel::create([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'kategori' => $request->kategori,
                'url_gambar' => $filename,
            ]);

            DB::commit();

            return response()->json(['msg' => 'Produk created successfully'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['msg' => 'Produk creation failed', 'error' => $e->getMessage()], 500);
        }
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'base64_image' => 'sometimes|required|string',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'harga.required' => 'Harga harus diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'stok.required' => 'Stok harus diisi.',
            'stok.integer' => 'Stok harus berupa angka bulat.',
            'kategori.required' => 'Kategori harus diisi.',
            'kategori.string' => 'Kategori harus berupa teks.',
            'kategori.max' => 'Kategori maksimal 255 karakter.',
            'base64_image.required' => 'Base64 image string harus diisi.',
            'base64_image.string' => 'Base64 image string harus berupa teks.',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        DB::beginTransaction();

        try {
            $barang = BarangModel::findOrFail($id);

            // Decode base64 image and save if provided
            if ($request->has('base64_image')) {
                // Delete the old image if it exists
                $this->deleteOldImage($barang->url_gambar);

                $url_gambar = $this->decodeImage($request->base64_image, $request->nama);
            } else {
                $url_gambar = $barang->url_gambar; // Keep the existing image URL if no new image is provided
            }

            // Update produk
            $barang->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'kategori' => $request->kategori,
                'url_gambar' => $url_gambar,
            ]);

            DB::commit();

            return response()->json(['msg' => 'Produk updated successfully'], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['msg' => 'Produk update failed', 'error' => $e->getMessage()], 500);
            }
    }
    public function destroy($id)
    {
    $barang = $this->barangModel->find($id);

    if ($barang) {
        // Hapus gambar dari storage
        $this->deleteOldImage($barang->url_gambar);
        // Hapus entri dari database
        $barang->delete();

        return response()->json(null, 204);
    } else {
        return response()->json(['message' => 'Barang not found'], 404);
    }
    }
}
