<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    

public function index()
    {
        return view('usuario.login');
    }

    public function cadastrar()
    {
        return view('usuario.cadastrar');
    }

    public function cadastro(Request $request)
    {
        $usuario = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($usuario);

        return redirect('/home');
    }

    public function autenticar(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect('/roupas');
        } else {
            return back()->withErrors([
                'email' => 'Usuário ou senha inválidos.'
            ]);
        }
    }

    public function sair()
    {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect('/usuario/login');
    }

}
