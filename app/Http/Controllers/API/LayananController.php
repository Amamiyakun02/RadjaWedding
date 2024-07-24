<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LayananController extends Controller
{
    private function deleteOldImage($url_gambar)
    {
        $fullPath = public_path('images/layanan/' . $url_gambar);

        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }
    }

    private function decodeImage($base64String, $namaLayanan)
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
        $filename = Str::slug($namaLayanan) . '-' . Str::random(10) . '.jpg'; // Adjust extension based on image type
        $path = public_path('images/layanan/' . $filename);

        // Save the image
        File::put($path, $imageData);

        return $filename;
    }

    public function index(Request $request)
    {
        $layananModel = new LayananModel();
        if ($request->isMethod('post')) {
            $lists = $layananModel->getDatatables($request);
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
                'recordsTotal' => $layananModel->countAll(),
                'recordsFiltered' => $layananModel->countFiltered($request),
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
            'base64_image' => 'required|string',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'base64_image.required' => 'Gambar Tidak Boleh Kosong.',
            'base64_image.string' => 'Base64 image string harus berupa teks.',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        DB::beginTransaction();

        try {
            // Decode base64 image and save
            $filename = $this->decodeImage($request->base64_image, $request->nama);

            // Create layanan
            $layanan = LayananModel::create([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'url_gambar' => $filename,
            ]);

            DB::commit();

            return response()->json(['msg' => 'Layanan Berhasil Di Buat'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['msg' => 'Layanan Gagal Di Buat', 'error' => $e->getMessage()], 500);
        }
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'base64_image' => 'sometimes|nullable|string',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'base64_image.sometimes' => 'Base64 image string harus diisi jika ada.',
            'base64_image.string' => 'Base64 image string harus berupa teks.',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        DB::beginTransaction();

        $layanan = LayananModel::findOrFail($id);

        if ($layanan) {
            try {
                // Decode base64 image and save if provided
                if ($request->has('base64_image') && !empty($request->base64_image)) {
                    // Delete the old image if it exists
                    $this->deleteOldImage($layanan->url_gambar);

                    $url_gambar = $this->decodeImage($request->base64_image, $request->nama);
                } else {
                    $url_gambar = $layanan->url_gambar; // Keep the existing image URL if no new image is provided
                }

                // Update layanan
                $layanan->update([
                    'nama' => $request->nama,
                    'deskripsi' => $request->deskripsi,
                    'url_gambar' => $url_gambar,
                ]);

                DB::commit();

                return response()->json(['msg' => 'Layanan Berhasil Diperbarui'], 200);

            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['msg' => 'Layanan gagal diperbarui', 'error' => $e->getMessage()], 500);
            }
        }
        return response()->json(['msg' => 'Layanan tidak ditemukan'], 404);
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
