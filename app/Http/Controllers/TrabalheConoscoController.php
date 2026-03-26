<?php

namespace App\Http\Controllers;

use App\Models\Configuracao;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Throwable;

class TrabalheConoscoController extends Controller
{
    public function index(): View
    {
        try {
            return view('trabalhe-conosco.index');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar a pagina trabalhe conosco.', [
                'mensagem' => $erro->getMessage(),
            ]);

            abort(500, 'Pagina em construção.');
        }
    }

    public function enviar(Request $request): RedirectResponse
    {
        try {
            $dados = $request->validate([
                'nome' => 'required|string|max:150',
                'email' => 'required|email|max:180',
                'whatsapp' => 'required|string|max:20',
                'vaga' => 'required|string|max:100',
                'linkedin' => 'nullable|url|max:255',
                'apresentacao' => 'required|string|max:6000',
                'curriculo' => 'required|file|mimes:pdf|max:5120',
            ], [
                'nome.required' => 'Informe seu nome completo.',
                'email.required' => 'Informe seu e-mail.',
                'email.email' => 'Informe um e-mail valido.',
                'whatsapp.required' => 'Informe seu WhatsApp.',
                'vaga.required' => 'Selecione a area de interesse.',
                'apresentacao.required' => 'Escreva sua apresentacao profissional.',
                'curriculo.required' => 'Anexe seu curriculo em PDF.',
                'curriculo.mimes' => 'O curriculo deve ser enviado em PDF.',
                'curriculo.max' => 'O curriculo deve ter no maximo 5MB.',
            ]);

            $config = Configuracao::firstOrCreate(['id' => 1]);
            $emailDestino = trim((string) ($config->email_admin ?: $config->email));

            if (empty($emailDestino) || !filter_var($emailDestino, FILTER_VALIDATE_EMAIL)) {
                return redirect()->back()->withInput()->with('erro_trabalhe', 'O e-mail de destino nao esta configurado no admin.');
            }

            $arquivo = $request->file('curriculo');
            $nomeOriginal = (string) $arquivo->getClientOriginalName();
            $nomeBase = pathinfo($nomeOriginal, PATHINFO_FILENAME);
            $nomeSeguro = Str::slug($nomeBase ?: 'curriculo') . '.pdf';

            Mail::send('emails.trabalhe-conosco', [
                'nome' => trim($dados['nome']),
                'email' => trim($dados['email']),
                'whatsapp' => trim($dados['whatsapp']),
                'vaga' => trim($dados['vaga']),
                'linkedin' => trim((string) ($dados['linkedin'] ?? '')),
                'apresentacao' => trim($dados['apresentacao']),
            ], function ($mail) use ($emailDestino, $dados, $arquivo, $nomeSeguro): void {
                $mail->to($emailDestino)
                    ->replyTo($dados['email'], $dados['nome'])
                    ->subject('Nova candidatura - Trabalhe Conosco (Aconsult)')
                    ->attach($arquivo->getRealPath(), [
                        'as' => $nomeSeguro,
                        'mime' => 'application/pdf',
                    ]);
            });

            return redirect()->back()->with('sucesso_trabalhe', 'Curriculo enviado com sucesso! Nosso time avaliara seu perfil.');
        } catch (ValidationException $erro) {
            throw $erro;
        } catch (Throwable $erro) {
            Log::error('Erro ao enviar formulario trabalhe conosco.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->withInput()->with('erro_trabalhe', 'Nao foi possivel enviar sua candidatura agora. Tente novamente em instantes.');
        }
    }
}
