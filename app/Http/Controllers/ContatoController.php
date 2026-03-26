<?php

namespace App\Http\Controllers;

use App\Models\Configuracao;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

class ContatoController extends Controller
{
    public function index(): View
    {
        try {
            return view('contato.contato');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar a pagina contato.', [
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
                'empresa' => 'nullable|string|max:180',
                'assunto' => 'required|string|max:80',
                'mensagem' => 'required|string|max:5000',
            ], [
                'nome.required' => 'Informe seu nome completo.',
                'email.required' => 'Informe seu e-mail.',
                'email.email' => 'Informe um e-mail valido.',
                'whatsapp.required' => 'Informe seu WhatsApp.',
                'assunto.required' => 'Selecione o assunto.',
                'mensagem.required' => 'Escreva sua mensagem.',
            ]);

            $config = Configuracao::firstOrCreate(['id' => 1]);
            $emailDestino = trim((string) ($config->email_admin ?: $config->email));

            if (empty($emailDestino) || !filter_var($emailDestino, FILTER_VALIDATE_EMAIL)) {
                return redirect()->back()->withInput()->with('erro_contato', 'O e-mail de destino nao esta configurado no admin.');
            }

            Mail::send('emails.contato', [
                'nome' => trim($dados['nome']),
                'email' => trim($dados['email']),
                'whatsapp' => trim($dados['whatsapp']),
                'empresa' => trim((string) ($dados['empresa'] ?? '')),
                'assunto' => trim($dados['assunto']),
                'mensagemConteudo' => trim($dados['mensagem']),
            ], function ($mail) use ($emailDestino, $dados): void {
                $mail->to($emailDestino)
                    ->replyTo($dados['email'], $dados['nome'])
                    ->subject('Novo contato pelo site - Aconsult');
            });

            return redirect()->back()->with('sucesso_contato', 'Mensagem enviada com sucesso! Em breve entraremos em contato.');
        } catch (ValidationException $erro) {
            throw $erro;
        } catch (Throwable $erro) {
            Log::error('Erro ao enviar formulario de contato.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->withInput()->with('erro_contato', 'Nao foi possivel enviar sua mensagem agora. Tente novamente em instantes.');
        }
    }
}
