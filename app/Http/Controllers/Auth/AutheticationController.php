<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Faker\Guesser\Name;
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

    }

    public function forgot_password()
    {
        return view('Authentication.reset_password');

    }
    public function reset_password()
    {
    }

}
