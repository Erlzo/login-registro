<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $username = $request->input('username');
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $password = $request->input('password');

        // Ver si ya existe
        $existe = User::where('email', $email)->first();
        if ($existe) {
            return back()->with('error', 'Email ya registrado');
        }

        // Crear usuario
        $user = new User();
        $user->username = $username;
        $user->name = $name;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->role = 'user';
        $user->save();

        return redirect('/login')->with('success', 'Usuario registrado');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Buscar usuario
        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);
            return redirect('/dashboard')->with('success', 'Login ok');
        } else {
            return back()->with('error', 'Email o contraseña incorrectos');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('success', 'Sesión cerrada');
    }
}
