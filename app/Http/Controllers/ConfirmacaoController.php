<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ConfirmacaoEmailNotification;

class ConfirmacaoController extends Controller
{
    public function index() {
        return view('confirmacao');
    }

    public function verificar(Request $request) {
        $regras = [
            'token' => 'required|digits:6'
        ];

        $feedback = [
            'token.required' => 'O token é obrigatório',
            'token.digits' => 'O token deve ter exatamente 6 dígitos'
        ];

        $request->validate($regras, $feedback);

        $usuario = User::where('token_confirmacao', $request->token)
                  ->where('token_expira_em', '>', Carbon::now())
                  ->first();

        if (!$usuario) {
            return back()->withErrors([
                'token' => 'Token inválido ou expirado. Solicite um novo token.'
            ]);
        }

        $usuario->update([
            'email_confirmado' => true,
            'token_confirmacao' => null,
            'token_expira_em' => null
        ]);

        Auth::login($usuario);

        return redirect()->route('principal');
    }

    public function reenviar(Request $request) {
        $regras = [
            'email' => 'required|email'
        ];

        $request->validate($regras);

        $usuario = User::where('email', $request->email)
                  ->where('email_confirmado', false)
                  ->firstOrFail();

        $usuario->update([
            'token_confirmacao' => rand(100000, 999999),
            'token_expira_em' => Carbon::now()->addMinutes(10)
        ]);

        $usuario->notify(new ConfirmacaoEmailNotification($usuario->token_confirmacao));

        return back()->with([
            'resent' => true,
            'email' => $usuario->email
        ]);
    }
}
