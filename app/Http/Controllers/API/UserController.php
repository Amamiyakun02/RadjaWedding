<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $userModel = new UserModel();

        if ($request->isMethod('post')) {
            $lists = $userModel->getDatatables($request);
            $data = [];
            $no = $request->input('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->username;
                $row[] = $list->nama;
                $row[] = $list->email;
                $row[] = $list->telepon;
                $row[] = $list->alamat;
                $row[] = $list->jenis_pengguna;
                $row[] = $list->jenis_kelamin;
                $row[] = $list->tanggal_lahir;
                $row[] = '
                        <button onClick="editPengguna(' . $list->id . ')" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>';
                $data[] = $row;
            }

            $output = [
                'draw' => $request->input('draw'),
                'recordsTotal' => $userModel->countAll(),
                'recordsFiltered' => $userModel->countFiltered($request),
                'data' => $data,
            ];

            return Response::json($output);
        }
    }

//    public function store(Request $request)
//    {
//        $validate = $request->validate([
//            'name' => 'required',
//            'email' => 'required',
//            'password' => 'required',
//
//        ]);
//
//        UserModel::create($request->all());
//        return response()->json('User created!',200);
//    }

    public function show($id)
    {
        $user = UserModel::find($id);
        if ($user) {
            return response()->json($user, 200);
        } else {
            return response()->json(['msg' => 'Data Pengguna Tidak Ditemukan'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'telepon' => 'required|numeric|digits_between:11,15',
            'alamat' => 'required|string|max:255',
            'jenis_pengguna' => 'required',
            'jenis_kelamin' => 'required|string|in:L,P',
            'tanggal_lahir' => 'required|date',
        ], [
            'username.required' => 'Username harus diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username maksimal 255 karakter.',
            'username.unique' => 'Username sudah digunakan.',
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.string' => 'Email harus berupa teks.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 255 karakter.',
            'email.unique' => 'Email sudah digunakan.',
            'telepon.required' => 'Nomor telepon harus diisi.',
            'telepon.numeric' => 'Nomor telepon harus berupa angka.',
            'telepon.digits_between' => 'Nomor telepon harus antara 11 hingga 15 digit.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
            'jenis_pengguna.required' => 'Jenis pengguna harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
            'jenis_kelamin.in' => 'Jenis kelamin harus salah satu dari Laki-laki atau Perempuan.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        DB::beginTransaction();

        try {
            $user = UserModel::findOrFail($id);

            $user->username = $request->username;
            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->telepon = $request->telepon;
            $user->alamat = $request->alamat;
            $user->jenis_pengguna = $request->jenis_pengguna;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->tanggal_lahir = $request->tanggal_lahir;

            $user->save();

            DB::commit();

            return response()->json(['msg' => 'Data Pengguna Berhasil Di Update'], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['msg' => 'Gagal Mengupdate Data Pengguna', 'error' => $e->getMessage()], 500);
        }
    }
    public function destroy($id)
    {
        $user = UserModel::find($id);

        if ($user) {
            $user->delete();
            return response()->json(null, 204);
        } else {
            return response()->json(['msg' => 'Data Pengguna Tidak Ditemukan'], 404);
        }
    }
}
