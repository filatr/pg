<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function index()
    {

        return view('admin.login');
    }

    public function validationUsers()
    {
        session_start();
        $user = User::where('name', '=', Input::get('username'))->first();
        if (!$user) {
            return back()->withErrors(['Wrong login or password!']);
        }
        if ($user->role === 'admin' && Hash::check(Input::get('password'), $user->password)) {
            $_SESSION['user'] = 'admin';
            return redirect()->intended('/articles');
        }
        return back()->withErrors(['Wrong login or password!']);

    }
}
