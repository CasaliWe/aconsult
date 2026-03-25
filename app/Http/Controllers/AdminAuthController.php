<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class AdminAuthController extends Controller
{
    /**
     * Exibe a tela de login do admin.
     */
    public function loginForm(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('admin.configuracoes');
        }

        return view('admin.login');
    }

    /**
     * Processa o login do admin.
     */
    public function login(Request $request): RedirectResponse
    {
        try {
            $credenciais = $request->validate([
                'login' => 'required|string',
                'senha' => 'required|string',
            ]);

            if (Auth::attempt(['login' => $credenciais['login'], 'password' => $credenciais['senha']], $request->boolean('lembrar'))) {
                $request->session()->regenerate();

                return redirect()->intended(route('admin.configuracoes'));
            }

            return back()->withErrors([
                'login' => 'Credenciais inválidas.',
            ])->onlyInput('login');
        } catch (Throwable $erro) {
            Log::error('Erro ao processar login do admin.', [
                'mensagem' => $erro->getMessage(),
            ]);

            return back()->withErrors([
                'login' => 'Ocorreu um erro ao processar o login. Tente novamente.',
            ])->onlyInput('login');
        }
    }

    /**
     * Faz logout do admin.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
