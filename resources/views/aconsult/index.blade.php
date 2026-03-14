@extends('layouts.app')

@section('titulo', 'A Consult | Aconsult Contabilidade - Sobre Nós')
@section('descricao', 'Conheça a Aconsult Contabilidade: um escritório comprometido em oferecer soluções contábeis e tributárias para impulsionar o crescimento e o sucesso dos negócios por todo o Brasil.')

@section('conteudo')
    <x-aconsult.banner />
    <x-aconsult.sobre />
    <x-aconsult.valores />
    <x-aconsult.diferenciais />
    <x-aconsult.missao />
    <x-aconsult.depoimentos />
    <x-aconsult.cta />
    <x-aconsult.faq />
@endsection
