@extends('layouts.app')

@section('titulo', ($solucao->nome_menu ?: $solucao->breadcrumb ?: 'Soluções') . ' | Aconsult Contabilidade')
@section('descricao', 'Conheça as ' . ($solucao->nome_menu ?: 'soluções da Aconsult Contabilidade') . '. ' . ($solucao->mini_descricao ?: 'Conteúdo especializado para impulsionar o crescimento do seu negócio.'))

@section('conteudo')
    <x-solucoes.banner :solucao="$solucao" />
    <x-solucoes.conteudo :solucao="$solucao" :conteudoPrincipal="$solucao->conteudo_html ?? ''" :solucoesAtivas="$solucoesAtivas" />
    <x-solucoes.cta />
    <x-solucoes.faq :solucao="['slug' => $solucao->tipo, 'titulo' => $solucao->nome_menu]" />
@endsection
