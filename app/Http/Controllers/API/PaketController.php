<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BundlePenyewaanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class PaketController extends Controller
{
    public function index(Request $request)
    {
        $paketModel = new BundlePenyewaanModel();
        if ($request->isMethod('post')) {
            $lists = $paketModel->getDatatables($request);
            $data = [];
            $no = $request->input('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nama;
                $row[] = $list->deskripsi;
                $row[] = $list->total_harga;
                $row[] = '<button onClick="editPaket(' . $list->id . ')" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                          <button onClick="hapusPaket(' . $list->id . ')" class="btn btn-danger"><i class="fas fa-trash"></i></button>';
                $data[] = $row;
            }

            $output = [
                'draw' => $request->input('draw'),
                'recordsTotal' => $paketModel->countAll(),
                'recordsFiltered' => $paketModel->countFiltered($request),
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
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        DB::beginTransaction();

        try {
            $bundle = BundlePenyewaanModel::create([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'total_harga' => 0,
            ]);

            DB::commit();

            return response()->json(['msg' => 'Paket Berhasil Dibuat', 'data' => $bundle], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Paket Gagal Dibuat', 'error' => $e->getMessage()], 500);
        }
    }
    public function show($id)
    {
        $bundle = BundlePenyewaanModel::find($id);

        if (!$bundle) {
            return response()->json(['msg' => 'Paket Tidak Di Temukan'], 404);
        }

        return response()->json($bundle, 200);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        DB::beginTransaction();

        try {
            $bundle = BundlePenyewaanModel::findOrFail($id);

            $bundle->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'total_harga' => 0,
            ]);

            DB::commit();

            return response()->json(['msg' => 'Paket Berhasil Di Perbarui', 'data' => $bundle], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['msg' => 'Paket Gagal Di Perbarui', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $bundle = BundlePenyewaanModel::find($id);

        if (!$bundle) {
            return response()->json(['msg' => 'Paket Tidak Di Temukan'], 404);
        }

        DB::beginTransaction();

        try {
            $bundle->delete();
            DB::commit();

            return response()->json(['msg' => 'Paket Berhasil Di Hapus'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['msg' => 'Paket Gagal Di Hapus', 'error' => $e->getMessage()], 500);
        }
    }
}
