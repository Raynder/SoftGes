<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = $request->input('erro');
        return view('auth.login', compact('erro'));
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('home');
        }

        return redirect()->route('login', ['erro' => 'Usuário ou senha inválidos']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function register(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();
            return redirect()->route('login');
        }

        return view('auth.register');
    }
}
