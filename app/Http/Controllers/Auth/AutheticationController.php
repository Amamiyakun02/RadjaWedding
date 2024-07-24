<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class AutheticationController extends Controller
{
    protected UserModel $user;
    public function __construct()
    {
//        $this->middleware('auth')->except('logout');
        $this->user = new UserModel();
    }

    public function login_user(): View
    {
        return view('Authentication.login');
    }
    public function register_user()
    {
        return view('Authentication.register');
    }

    public function login(Request $request)
    {

    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/', // huruf besar, angka, dan simbol
            ],
            'repassword' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/', // huruf besar, angka, dan simbol
            ],
            'telepon' => 'required|numeric|digits_between:11,15',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|in:L,P', // misalnya untuk Laki-laki atau Perempuan
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
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.regex' => 'Password harus mengandung setidaknya satu huruf besar, satu angka, dan satu simbol.',
            'repassword.required' => 'Password harus diisi.',
            'repassword.string' => 'Password harus berupa teks.',
            'repassword.min' => 'Password minimal 8 karakter.',
            'repassword.regex' => 'Password harus mengandung setidaknya satu huruf besar, satu angka, dan satu simbol.',
            'telepon.required' => 'Nomor telepon harus diisi.',
            'telepon.numeric' => 'Nomor telepon harus berupa angka.',
            'telepon.digits_between' => 'Nomor telepon harus antara 11 hingga 15 digit.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
            'jenis_kelamin.string' => 'Jenis kelamin harus berupa teks.',
            'jenis_kelamin.in' => 'Jenis kelamin harus salah satu dari Laki-laki atau Perempuan.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422); // Menggunakan withInput() untuk mengembalikan input lama
        }
        DB::beginTransaction();
        try {
            $data = [
            'username' => $request->username,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Simpan password yang sudah di-hash
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'jenis_pengguna' => 'pelanggan',
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
        ];
            $user = new UserModel($data);

            $user->save();
            DB::commit();

            return response()->json(['message' => 'User created successfully'], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'User creation failed', 'error' => $e->getMessage()], 500);
        }
    }

    public function forgot_password()
    {
        return view('Authentication.reset_password');

    }
    public function reset_password()
    {

    }

    public function logout()
    {
//        Auth::logout();
//
//        $request->session()->invalidate();
//
//        $request->session()->regenerateToken();

        return redirect(route('register'));
    }
}
