@extends('layouts.app')

@section('titulo', $solucao['titulo'] . ' | Aconsult Contabilidade')
@section('descricao', 'Conheça as ' . $solucao['titulo'] . ' da Aconsult Contabilidade. ' . $solucao['subtitulo'] . ' para impulsionar o crescimento do seu negócio.')

@section('conteudo')
    <x-solucoes.banner :solucao="$solucao" />
    <x-solucoes.conteudo :solucao="$solucao" :conteudoPrincipal="$conteudoPrincipal ?? ''" />
    <x-solucoes.cta />
    <x-solucoes.faq :solucao="$solucao" />
@endsection
