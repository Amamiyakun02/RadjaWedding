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
            'password' => 'required|string|min:8|confirmed',
            'telepon' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|string|max:10',
            'tanggal_lahir' => 'nullable|date',
        ]);

//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator)->withInput();
//        }
        dd($request->all());
        DB::beginTransaction();
        try {
            $data = $this->user->create([
                'username' => $request->username,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'jenis_pengguna' => 'pelanggan',
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
            ]);

            DB::commit();

            return redirect()->route('login')->with('success', 'User registered successfully, please login.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Registration failed, please try again.')->withInput();
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
