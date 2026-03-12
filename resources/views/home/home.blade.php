@extends('layouts.app')

@section('titulo', 'Aconsult Contabilidade | Escritório de Contabilidade em Itajaí-SC')
@section('descricao', 'Aconsult Contabilidade: escritório de contabilidade em Itajaí-SC. Contabilidade e inteligência tributária para impulsionar negócios por todo o Brasil.')

@section('conteudo')
    <x-home.banner-principal />
    <x-home.parceiros />
    <x-home.servicos />
    <x-home.numeros />
    <x-home.aplicativo />
    <x-home.blog-preview />
    <x-home.cta-contato />
    <x-home.reels />
    <x-home.depoimentos />
    <x-home.cta-whatsapp />
    <x-home.faq />
@endsection
