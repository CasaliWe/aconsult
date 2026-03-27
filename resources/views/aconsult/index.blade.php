@extends('layouts.app')

@section('titulo', 'Aconsult | Aconsult Contabilidade - Sobre Nós')
@section('descricao', 'Conheça a Aconsult Contabilidade: um escritório comprometido em oferecer soluções contábeis e tributárias para impulsionar o crescimento e o sucesso dos negócios por todo o Brasil.')

@section('conteudo')
    <x-aconsult.banner />
    <x-aconsult.sobre :sobre="$sobreAconsult" />
    <x-aconsult.valores :cards="$valoresAconsult ?? collect()" />
    <x-aconsult.diferenciais :cards="$diferenciaisAconsult ?? collect()" />
    <x-aconsult.missao :cards="$missaoAconsult ?? collect()" />
    <x-home.depoimentos :avaliacoes="$avaliacoes ?? collect()" />
    <x-aconsult.cta />
    <x-home.faq :faqItens="$faqItens ?? collect()" />
@endsection
