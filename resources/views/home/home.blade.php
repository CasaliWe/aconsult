@extends('layouts.app')

@section('titulo', 'Aconsult Contabilidade | Escritório de Contabilidade em Itajaí-SC')
@section('descricao', 'Aconsult Contabilidade: escritório de contabilidade em Itajaí-SC. Contabilidade e inteligência tributária para impulsionar negócios por todo o Brasil.')

@section('conteudo')
    <x-home.banner-principal :banners="$banners ?? collect()" />
    <x-home.parceiros :logos="$logosParceiros ?? collect()" />
    <x-home.servicos :categorias="$categoriasSolucoes ?? collect()" />
    <x-home.numeros />
    <x-home.aplicativo />
    <x-home.blog-preview :noticias="$noticiasPreview ?? collect()" />
    <x-home.cta-contato />
    <x-home.reels :reels="$reels ?? collect()" :instagramMarcaId="$instagramMarcaId ?? 'aconsultcontabilidade'" />
    <x-home.depoimentos :avaliacoes="$avaliacoes ?? collect()" />
    <x-home.cta-whatsapp />
    <x-home.faq :faqItens="$faqItens ?? collect()" />
@endsection
