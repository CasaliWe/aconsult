<?php

namespace App\Http\Controllers;

use App\Models\BannerHome;
use App\Models\BannerPagina;
use App\Models\EbookCard;
use App\Models\EbookDownload;
use App\Models\FaqItem;
use App\Models\Configuracao;
use App\Models\LogoParceiro;
use App\Models\Noticia;
use App\Models\NossoNumero;
use App\Models\Avaliacao;
use App\Models\SolucaoCard;
use App\Models\SolucaoCategoria;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

class AdminController extends Controller
{
    /* ══════════════════════════════════════════════
     *  CONFIGURAÇÕES
     * ══════════════════════════════════════════════ */

    public function configuracoes(): View
    {
        $config = Configuracao::firstOrCreate(['id' => 1]);
        return view('admin.paginas.configuracoes', compact('config'));
    }

    public function configuracoesSalvar(Request $request): RedirectResponse
    {
        try {
            $dados = $request->validate([
                'telefone'            => 'required|string|max:30',
                'email'               => 'required|email|max:100',
                'whatsapp_numero'     => 'required|string|max:20',
                'whatsapp_mensagem'   => 'nullable|string|max:255',
                'horario_atendimento' => 'nullable|string|max:100',
                'endereco_rua'        => 'nullable|string|max:150',
                'endereco_bairro'     => 'nullable|string|max:80',
                'endereco_cidade'     => 'nullable|string|max:80',
                'endereco_estado'     => 'nullable|string|max:2',
                'endereco_cep'        => 'nullable|string|max:10',
                'mapa_embed_url'      => 'nullable|string|max:1000',
                'mapa_link_url'       => 'nullable|string|max:500',
                'social_instagram'    => 'nullable|string|max:255',
                'social_facebook'     => 'nullable|string|max:255',
                'social_linkedin'     => 'nullable|string|max:255',
                'social_youtube'      => 'nullable|string|max:255',
                'link_area_cliente'   => 'nullable|string|max:255',
                'link_app_store'      => 'nullable|string|max:255',
                'link_google_play'    => 'nullable|string|max:255',
            ]);

            $dados['telefone'] = $this->normalizarTelefone($dados['telefone']);
            $dados['whatsapp_numero'] = $this->normalizarWhatsappNumero($dados['whatsapp_numero']);
            $dados['endereco_cep'] = $this->normalizarCep($dados['endereco_cep'] ?? null);
            $dados['mapa_embed_url'] = $this->extrairSrcMapa($dados['mapa_embed_url'] ?? null);

            $config = Configuracao::firstOrCreate(['id' => 1]);
            $config->update($dados);

            return redirect()->route('admin.configuracoes')->with('sucesso', 'Configurações salvas com sucesso!');
        } catch (Throwable $erro) {
            Log::error('Erro ao salvar configurações.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->withInput()->with('erro', 'Erro ao salvar as configurações.');
        }
    }

    /* ══════════════════════════════════════════════
     *  BANNERS HOME
     * ══════════════════════════════════════════════ */

    public function banners(): View
    {
        $banners = BannerHome::orderBy('ordem')->get();
        $bannersPaginas = BannerPagina::orderBy('nome_exibicao')->get();
        return view('admin.paginas.banners', compact('banners', 'bannersPaginas'));
    }

    public function bannerSalvar(Request $request): RedirectResponse
    {
        try {
            $dirBanners = $this->caminhoUploadPublic('banners');

            $dados = $request->validate([
                'id'                     => 'nullable|exists:banners_home,id',
                'super_titulo'           => 'nullable|string|max:100',
                'titulo'                 => 'required|string|max:500',
                'descricao'              => 'nullable|string|max:500',
                'imagem'                 => ($request->id ? 'nullable' : 'required') . '|image|mimes:jpg,jpeg,png,webp|max:10240',
                'botao_primario_texto'   => 'nullable|string|max:50',
                'botao_primario_link'    => 'nullable|string|max:255',
                'botao_secundario_texto' => 'nullable|string|max:50',
                'botao_secundario_link'  => 'nullable|string|max:255',
                'ordem'                  => 'required|integer|min:0',
                'ativo'                  => 'nullable',
            ]);

            $dados['ativo'] = $request->has('ativo');

            if ($request->hasFile('imagem')) {
                $arquivo = $request->file('imagem');
                $nome = 'banner-' . time() . '-' . mt_rand(100, 999) . '.' . $arquivo->getClientOriginalExtension();
                $arquivo->move($dirBanners, $nome);
                $dados['imagem'] = 'uploads/banners/' . $nome;
            } else {
                unset($dados['imagem']);
            }

            if ($request->id) {
                $banner = BannerHome::findOrFail($request->id);
                // Se nova imagem foi enviada, remove a antiga
                if (isset($dados['imagem']) && $banner->imagem && file_exists(public_path($banner->imagem))) {
                    // Não remove imagens do diretório 'arquivos/' (são originais do site)
                    if (str_starts_with($banner->imagem, 'uploads/')) {
                        @unlink(public_path($banner->imagem));
                    }
                }
                $banner->update($dados);
                $msg = 'Banner atualizado com sucesso!';
            } else {
                unset($dados['id']);
                BannerHome::create($dados);
                $msg = 'Banner criado com sucesso!';
            }

            return redirect()->route('admin.banners')->with('sucesso', $msg);
        } catch (Throwable $erro) {
            Log::error('Erro ao salvar banner.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->withInput()->with('erro', 'Erro ao salvar o banner.');
        }
    }

    public function bannerExcluir(int $id): RedirectResponse
    {
        try {
            $banner = BannerHome::findOrFail($id);
            if ($banner->imagem && str_starts_with($banner->imagem, 'uploads/') && file_exists(public_path($banner->imagem))) {
                @unlink(public_path($banner->imagem));
            }
            $banner->delete();

            return redirect()->route('admin.banners')->with('sucesso', 'Banner excluído com sucesso!');
        } catch (Throwable $erro) {
            Log::error('Erro ao excluir banner.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->with('erro', 'Erro ao excluir o banner.');
        }
    }

    public function bannerPaginaSalvar(Request $request): RedirectResponse
    {
        try {
            $dirBanners = $this->caminhoUploadPublic('banners');

            $dados = $request->validate([
                'id'            => 'required|exists:banners_paginas,id',
                'super_titulo'  => 'nullable|string|max:100',
                'titulo'        => 'required|string|max:500',
                'descricao'     => 'nullable|string|max:500',
                'imagem'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            ]);

            $bannerPagina = BannerPagina::findOrFail($request->id);

            if ($request->hasFile('imagem')) {
                $arquivo = $request->file('imagem');
                $nome = 'pagina-' . $bannerPagina->pagina . '-' . time() . '.' . $arquivo->getClientOriginalExtension();
                $arquivo->move($dirBanners, $nome);

                // Remove imagem anterior se era upload
                if ($bannerPagina->imagem && str_starts_with($bannerPagina->imagem, 'uploads/') && file_exists(public_path($bannerPagina->imagem))) {
                    @unlink(public_path($bannerPagina->imagem));
                }

                $dados['imagem'] = 'uploads/banners/' . $nome;
            } else {
                unset($dados['imagem']);
            }

            unset($dados['id']);
            $bannerPagina->update($dados);

            return redirect()->route('admin.banners')->with('sucesso', 'Banner da página "' . $bannerPagina->nome_exibicao . '" atualizado!');
        } catch (Throwable $erro) {
            Log::error('Erro ao salvar banner de página.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->withInput()->with('erro', 'Erro ao salvar o banner da página.');
        }
    }

    /* ══════════════════════════════════════════════
     *  LOGOS PARCEIROS
     * ══════════════════════════════════════════════ */

    public function logos(): View
    {
        $logos = LogoParceiro::orderBy('ordem')->get();
        return view('admin.paginas.logos', compact('logos'));
    }

    public function logoSalvar(Request $request): RedirectResponse
    {
        try {
            $dirLogos = $this->caminhoUploadPublic('logos');

            $dados = $request->validate([
                'id'     => 'nullable|exists:logos_parceiros,id',
                'nome'   => 'required|string|max:100',
                'imagem' => ($request->id ? 'nullable' : 'required') . '|image|mimes:jpg,jpeg,png,webp,svg|max:5120',
                'link'   => 'nullable|string|max:255',
                'ordem'  => 'required|integer|min:0',
                'ativo'  => 'nullable',
            ]);

            $dados['ativo'] = $request->has('ativo');

            if ($request->hasFile('imagem')) {
                $arquivo = $request->file('imagem');
                $nome = 'logo-' . time() . '-' . mt_rand(100, 999) . '.' . $arquivo->getClientOriginalExtension();
                $arquivo->move($dirLogos, $nome);
                $dados['imagem'] = 'uploads/logos/' . $nome;
            } else {
                unset($dados['imagem']);
            }

            if ($request->id) {
                $logo = LogoParceiro::findOrFail($request->id);
                if (isset($dados['imagem']) && $logo->imagem && str_starts_with($logo->imagem, 'uploads/') && file_exists(public_path($logo->imagem))) {
                    @unlink(public_path($logo->imagem));
                }
                $logo->update($dados);
                $msg = 'Logo atualizado com sucesso!';
            } else {
                unset($dados['id']);
                LogoParceiro::create($dados);
                $msg = 'Logo adicionado com sucesso!';
            }

            return redirect()->route('admin.logos')->with('sucesso', $msg);
        } catch (Throwable $erro) {
            Log::error('Erro ao salvar logo.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->withInput()->with('erro', 'Erro ao salvar o logo.');
        }
    }

    public function logoExcluir(int $id): RedirectResponse
    {
        try {
            $logo = LogoParceiro::findOrFail($id);
            if ($logo->imagem && str_starts_with($logo->imagem, 'uploads/') && file_exists(public_path($logo->imagem))) {
                @unlink(public_path($logo->imagem));
            }
            $logo->delete();

            return redirect()->route('admin.logos')->with('sucesso', 'Logo excluído com sucesso!');
        } catch (Throwable $erro) {
            Log::error('Erro ao excluir logo.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->with('erro', 'Erro ao excluir o logo.');
        }
    }

    /* ══════════════════════════════════════════════
     *  PÁGINAS PLACEHOLDER (Em Desenvolvimento)
     * ══════════════════════════════════════════════ */

    public function solucoes(): View
    {
        $this->garantirDadosPadraoSolucoes();

        $categorias = SolucaoCategoria::with(['cards' => function ($query) {
            $query->orderBy('ordem')->orderByDesc('id');
        }])->orderBy('ordem')->orderByDesc('id')->get();

        $icones = $this->iconesDisponiveis();

        return view('admin.paginas.solucoes', compact('categorias', 'icones'));
    }

    public function solucaoCategoriaSalvar(Request $request): RedirectResponse
    {
        try {
            $dados = $request->validate([
                'id' => 'nullable|exists:solucao_categorias,id',
                'nome' => 'required|string|max:120',
                'slug' => 'nullable|string|max:120',
                'icone_classe' => 'required|string|in:' . implode(',', array_keys($this->iconesDisponiveis())),
                'ordem' => 'required|integer|min:0|max:9999',
                'ativo' => 'nullable',
            ]);

            $dados['nome'] = trim($dados['nome']);
            $dados['slug'] = !empty($dados['slug']) ? Str::slug($dados['slug']) : Str::slug($dados['nome']);
            $dados['ativo'] = $request->has('ativo');

            if ($request->id) {
                $categoria = SolucaoCategoria::findOrFail($request->id);
                $categoria->update($dados);
                $msg = 'Categoria de solucao atualizada com sucesso!';
            } else {
                unset($dados['id']);
                SolucaoCategoria::create($dados);
                $msg = 'Categoria de solucao criada com sucesso!';
            }

            return redirect()->route('admin.solucoes')->with('sucesso', $msg);
        } catch (Throwable $erro) {
            Log::error('Erro ao salvar categoria de solucao.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->withInput()->with('erro', 'Erro ao salvar a categoria de solucao.');
        }
    }

    public function solucaoCategoriaExcluir(int $id): RedirectResponse
    {
        try {
            SolucaoCategoria::findOrFail($id)->delete();
            return redirect()->route('admin.solucoes')->with('sucesso', 'Categoria de solucao excluida com sucesso!');
        } catch (Throwable $erro) {
            Log::error('Erro ao excluir categoria de solucao.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->with('erro', 'Erro ao excluir a categoria de solucao.');
        }
    }

    public function solucaoCardSalvar(Request $request): RedirectResponse
    {
        try {
            $dados = $request->validate([
                'id' => 'nullable|exists:solucao_cards,id',
                'solucao_categoria_id' => 'required|exists:solucao_categorias,id',
                'titulo' => 'required|string|max:160',
                'descricao' => 'required|string|max:1200',
                'icone_classe' => 'required|string|in:' . implode(',', array_keys($this->iconesDisponiveis())),
                'ordem' => 'required|integer|min:0|max:9999',
                'ativo' => 'nullable',
            ]);

            $dados['titulo'] = trim($dados['titulo']);
            $dados['descricao'] = trim($dados['descricao']);
            $dados['ativo'] = $request->has('ativo');

            if ($request->id) {
                $card = SolucaoCard::findOrFail($request->id);
                $card->update($dados);
                $msg = 'Card de solucao atualizado com sucesso!';
            } else {
                unset($dados['id']);
                SolucaoCard::create($dados);
                $msg = 'Card de solucao criado com sucesso!';
            }

            return redirect()->route('admin.solucoes')->with('sucesso', $msg);
        } catch (Throwable $erro) {
            Log::error('Erro ao salvar card de solucao.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->withInput()->with('erro', 'Erro ao salvar o card de solucao.');
        }
    }

    public function solucaoCardExcluir(int $id): RedirectResponse
    {
        try {
            SolucaoCard::findOrFail($id)->delete();
            return redirect()->route('admin.solucoes')->with('sucesso', 'Card de solucao excluido com sucesso!');
        } catch (Throwable $erro) {
            Log::error('Erro ao excluir card de solucao.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->with('erro', 'Erro ao excluir o card de solucao.');
        }
    }

    public function numeros(): View
    {
        $defaults = [
            ['ordem' => 1, 'valor' => 7, 'titulo' => 'Anos de história'],
            ['ordem' => 2, 'valor' => 30, 'titulo' => 'Colaboradores'],
            ['ordem' => 3, 'valor' => 350, 'titulo' => 'Clientes atendidos'],
            ['ordem' => 4, 'valor' => 10, 'titulo' => 'Estados diferentes'],
        ];

        foreach ($defaults as $item) {
            NossoNumero::firstOrCreate(['ordem' => $item['ordem']], $item);
        }

        $numeros = NossoNumero::orderBy('ordem')->get();

        return view('admin.paginas.numeros', compact('numeros'));
    }

    public function numerosSalvar(Request $request): RedirectResponse
    {
        try {
            $dados = $request->validate([
                'numeros' => 'required|array|size:4',
                'numeros.*.id' => 'required|exists:nossos_numeros,id',
                'numeros.*.valor' => 'required|integer|min:0|max:999999',
                'numeros.*.titulo' => 'required|string|max:120',
            ]);

            foreach ($dados['numeros'] as $numero) {
                NossoNumero::where('id', $numero['id'])->update([
                    'valor' => (int) $numero['valor'],
                    'titulo' => trim($numero['titulo']),
                ]);
            }

            return redirect()->route('admin.numeros')->with('sucesso', 'Nossos números atualizados com sucesso!');
        } catch (Throwable $erro) {
            Log::error('Erro ao salvar nossos números.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->withInput()->with('erro', 'Erro ao salvar os nossos números.');
        }
    }

    public function news(): View
    {
        $noticias = Noticia::orderByDesc('data_publicacao')->orderByDesc('id')->get();
        return view('admin.paginas.news', compact('noticias'));
    }

    public function newsSalvar(Request $request): RedirectResponse
    {
        try {
            $dirThumb = $this->caminhoUploadPublic('news/thumbs');
            $this->caminhoUploadPublic('news/conteudo');

            $dados = $request->validate([
                'id' => 'nullable|exists:noticias,id',
                'categoria' => 'required|string|max:60',
                'titulo' => 'required|string|max:220',
                'mini_descricao' => 'required|string|max:320',
                'conteudo' => 'required|string',
                'thumb' => ($request->id ? 'nullable' : 'required') . '|image|mimes:jpg,jpeg,png,webp|max:10240',
                'tempo_leitura' => 'required|integer|min:1|max:120',
                'data_publicacao' => 'required|date',
                'ativo' => 'nullable',
            ]);

            $dados['categoria'] = trim($dados['categoria']);
            $dados['titulo'] = trim($dados['titulo']);
            $dados['mini_descricao'] = trim($dados['mini_descricao']);
            $dados['ativo'] = $request->has('ativo');

            if ($request->hasFile('thumb')) {
                $arquivo = $request->file('thumb');
                $nome = 'thumb-' . time() . '-' . mt_rand(100, 999) . '.' . $arquivo->getClientOriginalExtension();
                $arquivo->move($dirThumb, $nome);
                $dados['thumb'] = 'uploads/news/thumbs/' . $nome;
            } else {
                unset($dados['thumb']);
            }

            if ($request->id) {
                $noticia = Noticia::findOrFail($request->id);

                if (isset($dados['thumb']) && $noticia->thumb && str_starts_with($noticia->thumb, 'uploads/') && file_exists(public_path($noticia->thumb))) {
                    @unlink(public_path($noticia->thumb));
                }

                $noticia->update($dados);
                $msg = 'Notícia atualizada com sucesso!';
            } else {
                unset($dados['id']);
                Noticia::create($dados);
                $msg = 'Notícia criada com sucesso!';
            }

            return redirect()->route('admin.news')->with('sucesso', $msg);
        } catch (Throwable $erro) {
            Log::error('Erro ao salvar notícia.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->withInput()->with('erro', 'Erro ao salvar a notícia.');
        }
    }

    public function newsExcluir(int $id): RedirectResponse
    {
        try {
            $noticia = Noticia::findOrFail($id);

            if ($noticia->thumb && str_starts_with($noticia->thumb, 'uploads/') && file_exists(public_path($noticia->thumb))) {
                @unlink(public_path($noticia->thumb));
            }

            $noticia->delete();

            return redirect()->route('admin.news')->with('sucesso', 'Notícia excluída com sucesso!');
        } catch (Throwable $erro) {
            Log::error('Erro ao excluir notícia.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->with('erro', 'Erro ao excluir a notícia.');
        }
    }

    public function newsUploadImagem(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'file' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:10240',
            ]);

            $dir = $this->caminhoUploadPublic('news/conteudo');

            $arquivo = $request->file('file');
            $ext = $arquivo->getClientOriginalExtension();
            $nome = 'conteudo-' . time() . '-' . Str::lower(Str::random(6)) . '.' . $ext;
            $arquivo->move($dir, $nome);

            return response()->json([
                'location' => asset('uploads/news/conteudo/' . $nome),
            ]);
        } catch (Throwable $erro) {
            Log::error('Erro no upload de imagem da notícia.', ['mensagem' => $erro->getMessage()]);
            return response()->json(['error' => 'Falha no upload da imagem.'], 422);
        }
    }

    private function caminhoUploadPublic(string $subpasta): string
    {
        $base = rtrim(public_path(), DIRECTORY_SEPARATOR);
        $subpastaNormalizada = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, trim($subpasta, " /\\"));
        $caminho = $base . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $subpastaNormalizada;

        if (!is_dir($caminho)) {
            @mkdir($caminho, 0777, true);
        }

        return $caminho;
    }

    public function reels(): View
    {
        return view('admin.paginas.reels');
    }

    public function avaliacoes(): View
    {
        $avaliacoes = Avaliacao::orderBy('ordem')->orderByDesc('id')->get();
        return view('admin.paginas.avaliacoes', compact('avaliacoes'));
    }

    public function avaliacaoSalvar(Request $request): RedirectResponse
    {
        try {
            $dados = $request->validate([
                'id' => 'nullable|exists:avaliacoes,id',
                'nome' => 'required|string|max:120',
                'cargo_empresa' => 'nullable|string|max:160',
                'texto' => 'required|string|max:3000',
                'nota' => 'required|integer|min:1|max:5',
                'ordem' => 'required|integer|min:0|max:9999',
                'ativo' => 'nullable',
            ]);

            $dados['nome'] = trim($dados['nome']);
            $dados['cargo_empresa'] = trim($dados['cargo_empresa'] ?? '');
            $dados['texto'] = trim($dados['texto']);
            $dados['ativo'] = $request->has('ativo');

            if ($request->id) {
                $avaliacao = Avaliacao::findOrFail($request->id);
                $avaliacao->update($dados);
                $msg = 'Avaliacao atualizada com sucesso!';
            } else {
                unset($dados['id']);
                Avaliacao::create($dados);
                $msg = 'Avaliacao criada com sucesso!';
            }

            return redirect()->route('admin.avaliacoes')->with('sucesso', $msg);
        } catch (Throwable $erro) {
            Log::error('Erro ao salvar avaliacao.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->withInput()->with('erro', 'Erro ao salvar a avaliacao.');
        }
    }

    public function avaliacaoExcluir(int $id): RedirectResponse
    {
        try {
            Avaliacao::findOrFail($id)->delete();
            return redirect()->route('admin.avaliacoes')->with('sucesso', 'Avaliacao excluida com sucesso!');
        } catch (Throwable $erro) {
            Log::error('Erro ao excluir avaliacao.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->with('erro', 'Erro ao excluir a avaliacao.');
        }
    }

    public function faq(): View
    {
        $faqItens = FaqItem::orderBy('ordem')->orderByDesc('id')->get();
        return view('admin.paginas.faq', compact('faqItens'));
    }

    public function faqSalvar(Request $request): RedirectResponse
    {
        try {
            $dados = $request->validate([
                'id' => 'nullable|exists:faq_items,id',
                'pergunta' => 'required|string|max:220',
                'resposta' => 'required|string|max:5000',
                'ordem' => 'required|integer|min:0|max:9999',
                'ativo' => 'nullable',
            ]);

            $dados['pergunta'] = trim($dados['pergunta']);
            $dados['resposta'] = trim($dados['resposta']);
            $dados['ativo'] = $request->has('ativo');

            if ($request->id) {
                $faq = FaqItem::findOrFail($request->id);
                $faq->update($dados);
                $msg = 'FAQ atualizado com sucesso!';
            } else {
                unset($dados['id']);
                FaqItem::create($dados);
                $msg = 'FAQ criado com sucesso!';
            }

            return redirect()->route('admin.faq')->with('sucesso', $msg);
        } catch (Throwable $erro) {
            Log::error('Erro ao salvar FAQ.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->withInput()->with('erro', 'Erro ao salvar o FAQ.');
        }
    }

    public function faqExcluir(int $id): RedirectResponse
    {
        try {
            FaqItem::findOrFail($id)->delete();
            return redirect()->route('admin.faq')->with('sucesso', 'FAQ excluido com sucesso!');
        } catch (Throwable $erro) {
            Log::error('Erro ao excluir FAQ.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->with('erro', 'Erro ao excluir o FAQ.');
        }
    }

    public function ebook(): View
    {
        $this->garantirDadosPadraoEbook();

        $configuracao = Configuracao::firstOrCreate(['id' => 1]);
        if (empty($configuracao->email_notificacao_ebook) && !empty($configuracao->email)) {
            $configuracao->email_notificacao_ebook = $configuracao->email;
            $configuracao->save();
        }

        $ebookCards = EbookCard::withCount('downloads')->orderBy('ordem')->orderByDesc('id')->get();
        $ebookDownloads = EbookDownload::with('ebookCard')->orderByDesc('id')->get();
        $icones = $this->iconesDisponiveis();

        return view('admin.paginas.ebook', compact('ebookCards', 'ebookDownloads', 'icones', 'configuracao'));
    }

    public function ebookConfiguracaoSalvar(Request $request): RedirectResponse
    {
        try {
            $dados = $request->validate([
                'email_notificacao_ebook' => 'required|email|max:180',
            ]);

            $config = Configuracao::firstOrCreate(['id' => 1]);
            $config->email_notificacao_ebook = trim($dados['email_notificacao_ebook']);
            $config->save();

            return redirect()->route('admin.ebook')->with('sucesso', 'E-mail de notificacao de ebook atualizado com sucesso!');
        } catch (Throwable $erro) {
            Log::error('Erro ao salvar configuracao de ebook.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->withInput()->with('erro', 'Erro ao salvar o e-mail de notificacao de ebook.');
        }
    }

    public function ebookCardSalvar(Request $request): RedirectResponse
    {
        try {
            $dirEbooks = $this->caminhoUploadPublic('ebooks');

            $dados = $request->validate([
                'id' => 'nullable|exists:ebook_cards,id',
                'categoria' => 'required|string|max:100',
                'titulo' => 'required|string|max:200',
                'descricao' => 'required|string|max:1200',
                'capa_titulo' => 'required|string|max:120',
                'capa_subtitulo' => 'nullable|string|max:120',
                'icone_classe' => 'required|string|in:' . implode(',', array_keys($this->iconesDisponiveis())),
                'arquivo_ebook' => ($request->id ? 'nullable' : 'required') . '|file|mimes:pdf,zip,doc,docx,ppt,pptx,xls,xlsx|max:30720',
                'ordem' => 'required|integer|min:0|max:9999',
                'ativo' => 'nullable',
            ]);

            $dados['categoria'] = trim($dados['categoria']);
            $dados['titulo'] = trim($dados['titulo']);
            $dados['descricao'] = trim($dados['descricao']);
            $dados['capa_titulo'] = trim($dados['capa_titulo']);
            $dados['capa_subtitulo'] = trim($dados['capa_subtitulo'] ?? '');
            $dados['ativo'] = $request->has('ativo');

            if ($request->hasFile('arquivo_ebook')) {
                $arquivo = $request->file('arquivo_ebook');
                $nome = 'ebook-' . time() . '-' . mt_rand(100, 999) . '.' . $arquivo->getClientOriginalExtension();
                $arquivo->move($dirEbooks, $nome);
                $dados['arquivo_ebook'] = 'uploads/ebooks/' . $nome;
            } else {
                unset($dados['arquivo_ebook']);
            }

            if ($request->id) {
                $ebookCard = EbookCard::findOrFail($request->id);

                if (isset($dados['arquivo_ebook']) && !empty($ebookCard->arquivo_ebook) && str_starts_with($ebookCard->arquivo_ebook, 'uploads/') && file_exists(public_path($ebookCard->arquivo_ebook))) {
                    @unlink(public_path($ebookCard->arquivo_ebook));
                }

                $ebookCard->update($dados);
                $msg = 'Card de ebook atualizado com sucesso!';
            } else {
                unset($dados['id']);
                EbookCard::create($dados);
                $msg = 'Card de ebook criado com sucesso!';
            }

            return redirect()->route('admin.ebook')->with('sucesso', $msg);
        } catch (Throwable $erro) {
            Log::error('Erro ao salvar card de ebook.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->withInput()->with('erro', 'Erro ao salvar o card de ebook.');
        }
    }

    public function ebookCardExcluir(int $id): RedirectResponse
    {
        try {
            $ebookCard = EbookCard::findOrFail($id);

            if (!empty($ebookCard->arquivo_ebook) && str_starts_with($ebookCard->arquivo_ebook, 'uploads/') && file_exists(public_path($ebookCard->arquivo_ebook))) {
                @unlink(public_path($ebookCard->arquivo_ebook));
            }

            $ebookCard->delete();
            return redirect()->route('admin.ebook')->with('sucesso', 'Card de ebook excluido com sucesso!');
        } catch (Throwable $erro) {
            Log::error('Erro ao excluir card de ebook.', ['mensagem' => $erro->getMessage()]);
            return redirect()->back()->with('erro', 'Erro ao excluir o card de ebook.');
        }
    }

    private function iconesDisponiveis(): array
    {
        return [
            'fa-solid fa-file-invoice-dollar' => 'BPO Fiscal e Financeiro',
            'fa-solid fa-lightbulb' => 'Contabilidade Inteligente',
            'fa-solid fa-users' => 'Gestao de Departamento Pessoal',
            'fa-solid fa-scale-balanced' => 'Gestao Fiscal e Tributaria',
            'fa-solid fa-handshake' => 'Gestao Societaria',
            'fa-solid fa-award' => 'Beneficios Fiscais',
            'fa-solid fa-ship' => 'Comercio Exterior',
            'fa-solid fa-satellite-dish' => 'RADAR / Habilitacao',
            'fa-solid fa-building' => 'Empresas',
            'fa-solid fa-globe' => 'Global / Comex',
            'fa-solid fa-cart-shopping' => 'E-commerce',
            'fa-solid fa-book-open' => 'Ebook / Material',
        ];
    }

    private function garantirDadosPadraoSolucoes(): void
    {
        if (SolucaoCategoria::count() > 0) {
            return;
        }

        $categoriaEmpresas = SolucaoCategoria::create([
            'nome' => 'Contabilidade para Empresas',
            'slug' => 'contabilidade-para-empresas',
            'icone_classe' => 'fa-solid fa-building',
            'ordem' => 1,
            'ativo' => true,
        ]);

        $categoriaComex = SolucaoCategoria::create([
            'nome' => 'Comercio Exterior',
            'slug' => 'comercio-exterior',
            'icone_classe' => 'fa-solid fa-globe',
            'ordem' => 2,
            'ativo' => true,
        ]);

        $cardsEmpresas = [
            ['titulo' => 'BPO Fiscal e Financeiro', 'descricao' => 'Servicos terceirizados das areas fiscais e financeiras para otimizar operacoes, reduzir custos e melhorar a eficiencia.', 'icone_classe' => 'fa-solid fa-file-invoice-dollar', 'ordem' => 1],
            ['titulo' => 'Contabilidade Inteligente', 'descricao' => 'Servicos tecnologicos integrados ao seu sistema financeiro, garantindo precisao em lancamentos e conciliacoes.', 'icone_classe' => 'fa-solid fa-lightbulb', 'ordem' => 2],
            ['titulo' => 'Gestao de Dept. Pessoal', 'descricao' => 'Da admissao a administracao mensal da folha de pagamento, garantindo eficiencia e conformidade.', 'icone_classe' => 'fa-solid fa-users', 'ordem' => 3],
            ['titulo' => 'Gestao Fiscal e Tributaria', 'descricao' => 'Planejamentos tributarios para reduzir impostos e maximizar beneficios fiscais com seguranca.', 'icone_classe' => 'fa-solid fa-scale-balanced', 'ordem' => 4],
            ['titulo' => 'Gestao Societaria', 'descricao' => 'Auxiliamos empresarios e investidores no inicio de novos negocios com gestao societaria solida.', 'icone_classe' => 'fa-solid fa-handshake', 'ordem' => 5],
            ['titulo' => 'Beneficios Fiscais de SC', 'descricao' => 'Incentivos estrategicos que reduzem a carga do ICMS para competitividade e crescimento.', 'icone_classe' => 'fa-solid fa-award', 'ordem' => 6],
        ];

        foreach ($cardsEmpresas as $card) {
            SolucaoCard::create(array_merge($card, [
                'solucao_categoria_id' => $categoriaEmpresas->id,
                'ativo' => true,
            ]));
        }

        $cardsComex = [
            ['titulo' => 'Assessoria Comercio Exterior', 'descricao' => 'Regimes especiais, analise fiscal, suporte RADAR, consultoria tributaria e custos de importacao.', 'icone_classe' => 'fa-solid fa-ship', 'ordem' => 1],
            ['titulo' => 'Revisao e RADAR', 'descricao' => '99% de sucesso nas solicitacoes de habilitacao RADAR nas modalidades Limitada e Ilimitada.', 'icone_classe' => 'fa-solid fa-satellite-dish', 'ordem' => 2],
        ];

        foreach ($cardsComex as $card) {
            SolucaoCard::create(array_merge($card, [
                'solucao_categoria_id' => $categoriaComex->id,
                'ativo' => true,
            ]));
        }
    }

    private function garantirDadosPadraoEbook(): void
    {
        if (EbookCard::count() > 0) {
            return;
        }

        $cards = [
            ['categoria' => 'Tributario', 'titulo' => 'Reforma Tributaria 2026: Guia Completo', 'descricao' => 'Tudo sobre IBS, CBS e como preparar sua empresa para as mudancas fiscais de 2026.', 'capa_titulo' => 'Reforma Tributaria 2026', 'capa_subtitulo' => 'Guia completo', 'icone_classe' => 'fa-solid fa-scale-balanced', 'ordem' => 1],
            ['categoria' => 'E-commerce', 'titulo' => 'Contabilidade para E-commerce: Do Zero ao Lucro', 'descricao' => 'Tributacao, regimes fiscais e estrategias para lojistas virtuais e marketplaces.', 'capa_titulo' => 'Contabilidade para E-commerce', 'capa_subtitulo' => 'Do zero ao lucro', 'icone_classe' => 'fa-solid fa-cart-shopping', 'ordem' => 2],
            ['categoria' => 'Comercio Exterior', 'titulo' => 'RADAR Siscomex: Passo a Passo para Habilitar', 'descricao' => 'Como habilitar sua empresa para importar e exportar com seguranca e agilidade.', 'capa_titulo' => 'RADAR Siscomex', 'capa_subtitulo' => 'Passo a passo', 'icone_classe' => 'fa-solid fa-ship', 'ordem' => 3],
        ];

        foreach ($cards as $card) {
            EbookCard::create(array_merge($card, ['ativo' => true]));
        }
    }

    public function paginaAconsult(): View
    {
        return view('admin.paginas.pagina-aconsult');
    }

    public function paginaSolucoes(): View
    {
        return view('admin.paginas.pagina-solucoes');
    }

    private function normalizarTelefone(string $valor): string
    {
        $digitos = preg_replace('/\D+/', '', $valor);

        if (strlen($digitos) <= 10) {
            return preg_replace('/(\d{2})(\d{4})(\d{0,4})/', '($1) $2-$3', $digitos) ?: $valor;
        }

        return preg_replace('/(\d{2})(\d{5})(\d{0,4})/', '($1) $2-$3', $digitos) ?: $valor;
    }

    private function normalizarWhatsappNumero(string $valor): string
    {
        $digitos = preg_replace('/\D+/', '', $valor);

        if (str_starts_with($digitos, '55')) {
            return $digitos;
        }

        if (strlen($digitos) === 10 || strlen($digitos) === 11) {
            return '55' . $digitos;
        }

        return $digitos;
    }

    private function normalizarCep(?string $valor): ?string
    {
        if (empty($valor)) {
            return null;
        }

        $digitos = preg_replace('/\D+/', '', $valor);
        return preg_replace('/(\d{5})(\d{0,3})/', '$1-$2', $digitos) ?: $valor;
    }

    private function extrairSrcMapa(?string $valor): ?string
    {
        if (empty($valor)) {
            return null;
        }

        $conteudo = trim($valor);

        if (preg_match('/src=["\']([^"\']+)["\']/i', $conteudo, $match)) {
            return html_entity_decode($match[1], ENT_QUOTES, 'UTF-8');
        }

        return html_entity_decode($conteudo, ENT_QUOTES, 'UTF-8');
    }
}
