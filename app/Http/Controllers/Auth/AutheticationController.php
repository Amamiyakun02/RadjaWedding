<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\View\View;

class AutheticationController extends Controller
{
    public function __construct()
    {
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
            'password' => 'required|string|min:8|confirmed',
            'telepon' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'jenis_pengguna' => 'required|string|max:255',
            'jenis_kelamin' => 'nullable|string|max:10',
            'tanggal_lahir' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'jenis_pengguna' => $request->jenis_pengguna,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return view('Authentication.login');
    }

    public function forgot_password()
    {
        return view('Authentication.reset_password');

    }
    public function reset_password()
    {

    }

}
