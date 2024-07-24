<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BundlePenyewaanModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BundlePenywaanController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'total_harga' => 'required|numeric',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'total_harga.required' => 'Total harga harus diisi.',
            'total_harga.numeric' => 'Total harga harus berupa angka.',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        DB::beginTransaction();

        try {
            $bundle = BundlePenyewaanModel::create([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'total_harga' => $request->total_harga,
            ]);

            DB::commit();

            return response()->json(['message' => 'Bundle created successfully', 'data' => $bundle], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Bundle creation failed', 'error' => $e->getMessage()], 500);
        }
    }
    public function show($id)
    {
                $bundle = BundlePenyewaanModel::find($id);

        if (!$bundle) {
            return response()->json(['message' => 'Bundle not found'], 404);
        }

        return response()->json($bundle, 200);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'total_harga' => 'required|numeric',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'total_harga.required' => 'Total harga harus diisi.',
            'total_harga.numeric' => 'Total harga harus berupa angka.',
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
                'total_harga' => $request->total_harga,
            ]);

            DB::commit();

            return response()->json(['message' => 'Bundle updated successfully', 'data' => $bundle], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Bundle update failed', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $bundle = BundlePenyewaanModel::find($id);

        if (!$bundle) {
            return response()->json(['message' => 'Bundle not found'], 404);
        }

        DB::beginTransaction();

        try {
            $bundle->delete();
            DB::commit();

            return response()->json(['message' => 'Bundle deleted successfully'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Bundle deletion failed', 'error' => $e->getMessage()], 500);
        }
    }
}
