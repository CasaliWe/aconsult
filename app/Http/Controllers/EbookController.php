<?php

namespace App\Http\Controllers;

use App\Models\EbookCard;
use App\Models\Configuracao;
use App\Models\EbookDownload;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\View\View;
use Throwable;

class EbookController extends Controller
{
    /* Página de ebooks */
    public function index(): View
    {
        try {
            $ebookCards = EbookCard::where('ativo', true)
                ->orderBy('ordem')
                ->orderByDesc('id')
                ->get();

            return view('ebook.index', compact('ebookCards'));
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar a pagina de ebooks.', [
                'mensagem' => $erro->getMessage(),
            ]);

            abort(500, 'Pagina em construção.');
        }
    }

    public function registrarDownload(Request $request): JsonResponse
    {
        $validador = Validator::make($request->all(), [
            'ebook_card_id' => 'required|integer|exists:ebook_cards,id',
            'nome' => 'required|string|max:120',
            'email' => 'required|email|max:180',
            'whatsapp' => 'nullable|string|max:30',
        ], [
            'ebook_card_id.required' => 'Nao foi possivel identificar o ebook selecionado.',
            'ebook_card_id.integer' => 'O ebook selecionado e invalido.',
            'ebook_card_id.exists' => 'O ebook selecionado nao existe ou foi removido.',
            'nome.required' => 'Informe seu nome.',
            'email.required' => 'Informe seu e-mail.',
            'email.email' => 'Informe um e-mail valido.',
            'whatsapp.max' => 'WhatsApp invalido.',
        ]);

        if ($validador->fails()) {
            return response()->json([
                'ok' => false,
                'mensagem' => $validador->errors()->first(),
                'erros' => $validador->errors(),
            ], 422);
        }

        $dados = $validador->validated();

        try {
            $card = EbookCard::where('ativo', true)->findOrFail((int) $dados['ebook_card_id']);

            if (empty($card->arquivo_ebook) || !file_exists(public_path($card->arquivo_ebook))) {
                return response()->json([
                    'ok' => false,
                    'mensagem' => 'Este ebook ainda nao esta disponivel para download.',
                ], 422);
            }

            $download = EbookDownload::create([
                'ebook_card_id' => $card->id,
                'nome' => trim($dados['nome']),
                'email' => trim($dados['email']),
                'whatsapp' => !empty($dados['whatsapp']) ? trim($dados['whatsapp']) : null,
                'ip' => $request->ip(),
                'user_agent' => Str::limit((string) $request->userAgent(), 2000, ''),
            ]);

            $configuracao = Configuracao::firstOrCreate(['id' => 1]);
            $emailNotificacao = trim((string) ($configuracao->email_notificacao_ebook ?: $configuracao->email));

            if (!empty($emailNotificacao) && filter_var($emailNotificacao, FILTER_VALIDATE_EMAIL)) {
                try {
                    $assunto = 'Novo lead de ebook - ' . $card->titulo;
                    $mensagem =
                        "Novo download de ebook registrado.\n\n" .
                        "Ebook: {$card->titulo}\n" .
                        "Nome: {$download->nome}\n" .
                        "E-mail: {$download->email}\n" .
                        "WhatsApp: " . ($download->whatsapp ?: '-') . "\n" .
                        "IP: " . ($download->ip ?: '-') . "\n" .
                        "Data: " . now()->format('d/m/Y H:i:s') . "\n";

                    Mail::raw($mensagem, function ($mail) use ($emailNotificacao, $assunto): void {
                        $mail->to($emailNotificacao)->subject($assunto);
                    });
                } catch (Throwable $erroEmail) {
                    Log::error('Erro ao enviar e-mail de notificacao de ebook.', [
                        'mensagem' => $erroEmail->getMessage(),
                    ]);
                }
            }

            $urlDownload = URL::temporarySignedRoute(
                'ebook.download.arquivo',
                now()->addMinutes(10),
                ['download' => $download->id]
            );

            return response()->json([
                'ok' => true,
                'mensagem' => 'Cadastro realizado com sucesso.',
                'download_url' => $urlDownload,
            ]);
        } catch (Throwable $erro) {
            Log::error('Erro ao registrar lead de ebook.', [
                'mensagem' => $erro->getMessage(),
            ]);

            return response()->json([
                'ok' => false,
                'mensagem' => 'Nao foi possivel processar sua solicitacao agora.',
            ], 500);
        }
    }

    public function baixarArquivo(Request $request, int $download): BinaryFileResponse
    {
        abort_unless($request->hasValidSignature(), 403);

        $lead = EbookDownload::with('ebookCard')->findOrFail($download);
        $card = $lead->ebookCard;

        abort_if(!$card || empty($card->arquivo_ebook), 404);

        $caminhoRelativo = ltrim((string) $card->arquivo_ebook, '/\\');
        $caminhoAbsoluto = public_path($caminhoRelativo);

        abort_if(!file_exists($caminhoAbsoluto), 404);

        $extensao = pathinfo($caminhoAbsoluto, PATHINFO_EXTENSION);
        $nomeArquivo = Str::slug($card->titulo ?: 'ebook') . ($extensao ? '.' . strtolower($extensao) : '');

        return response()->download($caminhoAbsoluto, $nomeArquivo);
    }
}
