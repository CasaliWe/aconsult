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
                <button id="toggler-cat-1"
                        class="toggler-servico px-6 md:px-10 py-3 rounded-xl text-base font-bold transition-all duration-400 bg-marca text-white shadow-lg shadow-marca/20 cursor-pointer"
                        data-categoria="1">
                    <i class="fa-solid fa-building mr-2 text-sm"></i>
                    Contabilidade para Empresas
                </button>
                <button id="toggler-cat-2"
                        class="toggler-servico px-6 md:px-10 py-3 rounded-xl text-base font-bold transition-all duration-400 text-neutral-500 hover:text-neutral-700 cursor-pointer"
                        data-categoria="2">
                    <i class="fa-solid fa-globe mr-2 text-sm"></i>
                    Comércio Exterior
                </button>
            </div>
        </div>

        {{-- Cards Categoria 1 - Contabilidade para Empresas --}}
        <div id="servicos-cat-1" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            {{-- BPO Fiscal e Financeiro --}}
            <div class="group bg-white rounded-2xl border border-neutral-100 p-7 hover:border-marca/20 hover:shadow-xl hover:shadow-marca/5 transition-all duration-500 animar-entrada atraso-1 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-marca/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-marca/10 text-marca mb-5 group-hover:bg-marca group-hover:text-white transition-all duration-500">
                        <i class="fa-solid fa-file-invoice-dollar text-xl"></i>
                    </div>
                    <h3 class="text-lg font-black text-neutral-900 mb-3 group-hover:text-marca transition-colors duration-300">BPO Fiscal e Financeiro</h3>
                    <p class="text-neutral-500 text-base font-normal leading-relaxed transition-transform duration-300 group-hover:scale-105 origin-top-left">
                        Serviços terceirizados das áreas fiscais e financeiras para otimizar operações, reduzir custos e melhorar a eficiência.
                    </p>
                </div>
            </div>

            {{-- Contabilidade Inteligente --}}
            <div class="group bg-white rounded-2xl border border-neutral-100 p-7 hover:border-marca/20 hover:shadow-xl hover:shadow-marca/5 transition-all duration-500 animar-entrada atraso-2 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-marca/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-marca/10 text-marca mb-5 group-hover:bg-marca group-hover:text-white transition-all duration-500">
                        <i class="fa-solid fa-lightbulb text-xl"></i>
                    </div>
                    <h3 class="text-lg font-black text-neutral-900 mb-3 group-hover:text-marca transition-colors duration-300">Contabilidade Inteligente</h3>
                    <p class="text-neutral-500 text-base font-normal leading-relaxed transition-transform duration-300 group-hover:scale-105 origin-top-left">
                        Serviços tecnológicos integrados ao seu sistema financeiro, garantindo precisão em lançamentos e conciliações.
                    </p>
                </div>
            </div>

            {{-- Gestão de Departamento Pessoal --}}
            <div class="group bg-white rounded-2xl border border-neutral-100 p-7 hover:border-marca/20 hover:shadow-xl hover:shadow-marca/5 transition-all duration-500 animar-entrada atraso-3 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-marca/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-marca/10 text-marca mb-5 group-hover:bg-marca group-hover:text-white transition-all duration-500">
                        <i class="fa-solid fa-users text-xl"></i>
                    </div>
                    <h3 class="text-lg font-black text-neutral-900 mb-3 group-hover:text-marca transition-colors duration-300">Gestão de Dept. Pessoal</h3>
                    <p class="text-neutral-500 text-base font-normal leading-relaxed transition-transform duration-300 group-hover:scale-105 origin-top-left">
                        Da admissão à administração mensal da folha de pagamento, garantindo eficiência e conformidade.
                    </p>
                </div>
            </div>

            {{-- Gestão Fiscal e Tributária --}}
            <div class="group bg-white rounded-2xl border border-neutral-100 p-7 hover:border-marca/20 hover:shadow-xl hover:shadow-marca/5 transition-all duration-500 animar-entrada atraso-4 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-marca/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-marca/10 text-marca mb-5 group-hover:bg-marca group-hover:text-white transition-all duration-500">
                        <i class="fa-solid fa-scale-balanced text-xl"></i>
                    </div>
                    <h3 class="text-lg font-black text-neutral-900 mb-3 group-hover:text-marca transition-colors duration-300">Gestão Fiscal e Tributária</h3>
                    <p class="text-neutral-500 text-base font-normal leading-relaxed transition-transform duration-300 group-hover:scale-105 origin-top-left">
                        Planejamentos tributários para reduzir impostos e maximizar benefícios fiscais com segurança.
                    </p>
                </div>
            </div>

            {{-- Gestão Societária --}}
            <div class="group bg-white rounded-2xl border border-neutral-100 p-7 hover:border-marca/20 hover:shadow-xl hover:shadow-marca/5 transition-all duration-500 animar-entrada atraso-5 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-marca/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-marca/10 text-marca mb-5 group-hover:bg-marca group-hover:text-white transition-all duration-500">
                        <i class="fa-solid fa-handshake text-xl"></i>
                    </div>
                    <h3 class="text-lg font-black text-neutral-900 mb-3 group-hover:text-marca transition-colors duration-300">Gestão Societária</h3>
                    <p class="text-neutral-500 text-base font-normal leading-relaxed transition-transform duration-300 group-hover:scale-105 origin-top-left">
                        Auxiliamos empresários e investidores no início de novos negócios com gestão societária sólida.
                    </p>
                </div>
            </div>

            {{-- Benefícios Fiscais de SC --}}
            <div class="group bg-white rounded-2xl border border-neutral-100 p-7 hover:border-marca/20 hover:shadow-xl hover:shadow-marca/5 transition-all duration-500 animar-entrada atraso-6 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-marca/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-marca/10 text-marca mb-5 group-hover:bg-marca group-hover:text-white transition-all duration-500">
                        <i class="fa-solid fa-award text-xl"></i>
                    </div>
                    <h3 class="text-lg font-black text-neutral-900 mb-3 group-hover:text-marca transition-colors duration-300">Benefícios Fiscais de SC</h3>
                    <p class="text-neutral-500 text-base font-normal leading-relaxed transition-transform duration-300 group-hover:scale-105 origin-top-left">
                        Incentivos estratégicos que reduzem a carga do ICMS para competitividade e crescimento.
                    </p>
                </div>
            </div>
        </div>

        {{-- Cards Categoria 2 - Comércio Exterior --}}
        <div id="servicos-cat-2" class="hidden grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Assessoria para Comércio Exterior --}}
            <div class="group bg-white rounded-2xl border border-neutral-100 p-7 hover:border-marca/20 hover:shadow-xl hover:shadow-marca/5 transition-all duration-500 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-marca/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-marca/10 text-marca mb-5 group-hover:bg-marca group-hover:text-white transition-all duration-500">
                        <i class="fa-solid fa-ship text-xl"></i>
                    </div>
                    <h3 class="text-lg font-black text-neutral-900 mb-3 group-hover:text-marca transition-colors duration-300">Assessoria Comércio Exterior</h3>
                    <p class="text-neutral-500 text-base font-normal leading-relaxed transition-transform duration-300 group-hover:scale-105 origin-top-left">
                        Regimes especiais, análise fiscal, suporte RADAR, consultoria tributária e custos de importação.
                    </p>
                </div>
            </div>

            {{-- Revisão e Solicitação de RADAR --}}
            <div class="group bg-white rounded-2xl border border-neutral-100 p-7 hover:border-marca/20 hover:shadow-xl hover:shadow-marca/5 transition-all duration-500 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-marca/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-marca/10 text-marca mb-5 group-hover:bg-marca group-hover:text-white transition-all duration-500">
                        <i class="fa-solid fa-satellite-dish text-xl"></i>
                    </div>
                    <h3 class="text-lg font-black text-neutral-900 mb-3 group-hover:text-marca transition-colors duration-300">Revisão e RADAR</h3>
                    <p class="text-neutral-500 text-base font-normal leading-relaxed transition-transform duration-300 group-hover:scale-105 origin-top-left">
                        99% de sucesso nas solicitações de habilitação RADAR nas modalidades Limitada e Ilimitada.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const togglers = document.querySelectorAll('.toggler-servico');
        const cat1 = document.getElementById('servicos-cat-1');
        const cat2 = document.getElementById('servicos-cat-2');

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

                /* Alterna categorias com fade */
                if (categoria === '1') {
                    cat2.classList.add('hidden');
                    cat1.classList.remove('hidden');
                } else {
                    cat1.classList.add('hidden');
                    cat2.classList.remove('hidden');
                }

                /* Re-animar os cards que aparecem */
                const cardsVisiveis = (categoria === '1' ? cat1 : cat2).querySelectorAll('.animar-entrada');
                cardsVisiveis.forEach(card => {
                    card.classList.remove('animado');
                    setTimeout(() => card.classList.add('animado'), 50);
                });
            });
        });
    });
</script>