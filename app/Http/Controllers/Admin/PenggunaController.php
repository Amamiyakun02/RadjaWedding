<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request){
        // Definisikan aturan validasi
        $rules = [
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'level' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ];

        // Pesan kesalahan kustom (opsional)
        $messages = [
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah terdaftar',
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password harus memiliki setidaknya 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi',
            'no_hp.required' => 'No handphone wajib diisi',
        ];

        // Lakukan validasi
        $validator = Validator::make($request->all(), $rules, $messages);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, lanjutkan dengan transaksi database
        DB::transaction(function () use ($request) {
            $password = bcrypt($request->password);

            $id_akun = DB::table('users')->insertGetId([
                'username' => $request->username,
                'nama' => $request->nama,
                'email' => $request->email,
                'telepon' => $request->no_hp,
                'jenis_pengguna' => 'pelanggan',
                'password' => $password,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
            ]);
        });

        return redirect()->to('/login')->with('success', 'Registrasi Berhasil');
    }

    public function show($id){

    }


    public function edit($id){

    }

    public function update(Request $request, $id){

    }


    public function destroy($id){

    }
}
