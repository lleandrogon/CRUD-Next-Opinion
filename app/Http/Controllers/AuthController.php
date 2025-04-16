<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Models\User;
use Illuminate\Support\Facades\Hash;
Use Illuminate\Support\Str;
use App\Notifications\ConfirmacaoEmailNotification;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }

    public function autenticar(Request $request) {
        $regras = [
            'email' => 'email',
            'password' => 'required'
        ];

        $feedback = [
            'email.email' => 'Email inválido!',
            'password.required' => 'Senha é obrigatória!'
        ];

        $request->validate($regras, $feedback);

        $credenciais = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credenciais)) {
            return redirect()->route('principal');
        } else {
            return back()->withErrors(['auth' => 'Email e/ou senha incorretos!']);
        }
    }

    public function cadastro() {
        return view('cadastro');
    }

    public function store(Request $request) {
        $regras = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ];
        
        $feedback = [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O nome deve conter apenas letras.',
            
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
            'password.confirmed' => 'A confirmação de senha não corresponde.'
        ];

        $request->validate($regras, $feedback);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'token_confirmacao' => rand(100000, 999999),
            'token_expira_em' => now()->addMinutes(10),
            'email_confirmado' => false
        ]);

        $user->notify(new \App\Notifications\ConfirmacaoEmailNotification($user->token_confirmacao));

        session(['email' => $user->email]);

        return redirect()->route('confirmacao.index');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('login.index');
    }
}
