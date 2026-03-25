@props([
    'categorias' => collect(),
])

@php
    $categoriasExibicao = $categorias->filter(function ($categoria) {
        return isset($categoria->cards) && $categoria->cards->count() > 0;
    })->values();

    if ($categoriasExibicao->isEmpty()) {
        $categoriasExibicao = collect([
            (object) [
                'id' => 1,
                'nome' => 'Contabilidade para Empresas',
                'icone_classe' => 'fa-solid fa-building',
                'cards' => collect([
                    (object) ['titulo' => 'BPO Fiscal e Financeiro', 'descricao' => 'Servicos terceirizados das areas fiscais e financeiras para otimizar operacoes, reduzir custos e melhorar a eficiencia.', 'icone_classe' => 'fa-solid fa-file-invoice-dollar'],
                    (object) ['titulo' => 'Contabilidade Inteligente', 'descricao' => 'Servicos tecnologicos integrados ao seu sistema financeiro, garantindo precisao em lancamentos e conciliacoes.', 'icone_classe' => 'fa-solid fa-lightbulb'],
                    (object) ['titulo' => 'Gestao de Dept. Pessoal', 'descricao' => 'Da admissao a administracao mensal da folha de pagamento, garantindo eficiencia e conformidade.', 'icone_classe' => 'fa-solid fa-users'],
                    (object) ['titulo' => 'Gestao Fiscal e Tributaria', 'descricao' => 'Planejamentos tributarios para reduzir impostos e maximizar beneficios fiscais com seguranca.', 'icone_classe' => 'fa-solid fa-scale-balanced'],
                    (object) ['titulo' => 'Gestao Societaria', 'descricao' => 'Auxiliamos empresarios e investidores no inicio de novos negocios com gestao societaria solida.', 'icone_classe' => 'fa-solid fa-handshake'],
                    (object) ['titulo' => 'Beneficios Fiscais de SC', 'descricao' => 'Incentivos estrategicos que reduzem a carga do ICMS para competitividade e crescimento.', 'icone_classe' => 'fa-solid fa-award'],
                ]),
            ],
            (object) [
                'id' => 2,
                'nome' => 'Comercio Exterior',
                'icone_classe' => 'fa-solid fa-globe',
                'cards' => collect([
                    (object) ['titulo' => 'Assessoria Comercio Exterior', 'descricao' => 'Regimes especiais, analise fiscal, suporte RADAR, consultoria tributaria e custos de importacao.', 'icone_classe' => 'fa-solid fa-ship'],
                    (object) ['titulo' => 'Revisao e RADAR', 'descricao' => '99% de sucesso nas solicitacoes de habilitacao RADAR nas modalidades Limitada e Ilimitada.', 'icone_classe' => 'fa-solid fa-satellite-dish'],
                ]),
            ],
        ]);
    }

    $categoriaInicial = $categoriasExibicao->first();
@endphp

{{-- Seção Serviços - Toggle entre categorias --}}
<section class="py-20 md:py-28 bg-white relative overflow-hidden" id="secao-servicos">
    {{-- Decoração de fundo --}}
    <div class="absolute top-20 right-0 w-80 h-80 bg-marca/3 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 left-0 w-60 h-60 bg-marca-escura/3 rounded-full blur-3xl"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
        {{-- Cabeçalho --}}
        <div class="text-center max-w-2xl mx-auto mb-14 animar-entrada">
            <span class="text-marca text-sm font-bold uppercase tracking-widest">O que fazemos</span>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-neutral-900 mt-3 mb-4">
                Conheça as <span class="text-marca">soluções</span> da Aconsult
            </h2>
            <p class="text-neutral-500 text-base font-normal leading-relaxed">
                Com mais de 350 clientes atendidos em 10 estados diferentes, oferecemos diversas soluções contábeis que geram valor ao seu negócio.
            </p>
        </div>

        {{-- Toggler de categorias --}}
        <div class="flex justify-center mb-12 animar-entrada atraso-2">
            <div class="bg-neutral-100 rounded-2xl p-1.5 inline-flex gap-1">
                @foreach ($categoriasExibicao as $indice => $categoria)
                    @php $categoriaId = 'cat-' . ($categoria->id ?? $indice + 1); @endphp
                    <button
                        class="toggler-servico px-6 md:px-10 py-3 rounded-xl text-base font-bold transition-all duration-400 cursor-pointer {{ $indice === 0 ? 'bg-marca text-white shadow-lg shadow-marca/20' : 'text-neutral-500 hover:text-neutral-700' }}"
                        data-categoria="{{ $categoriaId }}">
                        <i class="{{ $categoria->icone_classe ?: 'fa-solid fa-layer-group' }} mr-2 text-sm"></i>
                        {{ $categoria->nome }}
                    </button>
                @endforeach
            </div>
        </div>

        @foreach ($categoriasExibicao as $indice => $categoria)
            @php
                $categoriaId = 'cat-' . ($categoria->id ?? $indice + 1);
                $classeGrid = $categoria->cards->count() >= 3 ? 'grid-cols-1 md:grid-cols-2 xl:grid-cols-3' : 'grid-cols-1 md:grid-cols-2';
            @endphp
            <div id="servicos-{{ $categoriaId }}" class="{{ $indice === 0 ? '' : 'hidden ' }}grid {{ $classeGrid }} gap-6">
                @foreach ($categoria->cards as $indiceCard => $card)
                    <div class="group bg-white rounded-2xl border border-neutral-100 p-7 hover:border-marca/20 hover:shadow-xl hover:shadow-marca/5 transition-all duration-500 animar-entrada relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-marca/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-150 transition-transform duration-500"></div>
                        <div class="relative z-10">
                            <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-marca/10 text-marca mb-5 group-hover:bg-marca group-hover:text-white transition-all duration-500">
                                <i class="{{ $card->icone_classe ?: 'fa-solid fa-layer-group' }} text-xl"></i>
                            </div>
                            <h3 class="text-lg font-black text-neutral-900 mb-3 group-hover:text-marca transition-colors duration-300">{{ $card->titulo }}</h3>
                            <p class="text-neutral-500 text-base font-normal leading-relaxed transition-transform duration-300 group-hover:scale-105 origin-top-left">
                                {{ $card->descricao }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const togglers = document.querySelectorAll('.toggler-servico');
        const categorias = @json($categoriasExibicao->map(function ($categoria, $indice) {
            return 'cat-' . ($categoria->id ?? $indice + 1);
        })->values());

        if (togglers.length === 0 || categorias.length === 0) {
            return;
        }

        togglers.forEach(toggler => {
            toggler.addEventListener('click', () => {
                const categoria = toggler.dataset.categoria;

                /* Atualiza visual dos togglers */
                togglers.forEach(t => {
                    t.classList.remove('bg-marca', 'text-white', 'shadow-lg', 'shadow-marca/20');
                    t.classList.add('text-neutral-500');
                });
                toggler.classList.add('bg-marca', 'text-white', 'shadow-lg', 'shadow-marca/20');
                toggler.classList.remove('text-neutral-500');

                categorias.forEach((idCategoria) => {
                    const painel = document.getElementById('servicos-' + idCategoria);
                    if (!painel) return;
                    if (idCategoria === categoria) {
                        painel.classList.remove('hidden');
                    } else {
                        painel.classList.add('hidden');
                    }
                });

                /* Re-animar os cards que aparecem */
                const painelAtivo = document.getElementById('servicos-' + categoria);
                const cardsVisiveis = painelAtivo ? painelAtivo.querySelectorAll('.animar-entrada') : [];
                cardsVisiveis.forEach(card => {
                    card.classList.remove('animado');
                    setTimeout(() => card.classList.add('animado'), 50);
                });
            });
        });
    });
</script>