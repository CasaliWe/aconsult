{{-- Página: Configurações --}}
@extends('admin.layout')

@section('titulo', 'Configurações')

@section('conteudo')
    <!-- Cabeçalho da página -->
    <div style="margin-bottom: 24px;">
        <p style="font-size: 13px; color: #64748b; margin: 0;">Gerencie contatos, endereço e informações da empresa</p>
    </div>

    <!-- Card principal -->
    <div style="background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 32px;">
        <div style="text-align: center; padding: 40px 20px;">
            <div style="width: 56px; height: 56px; border-radius: 50%; background-color: rgba(226,24,80,0.08); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                <svg width="24" height="24" fill="none" stroke="#e21850" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <h2 style="font-size: 18px; font-weight: 700; color: #1e293b; margin: 0 0 8px;">Em Desenvolvimento</h2>
            <p style="font-size: 14px; color: #64748b; max-width: 420px; margin: 0 auto 16px; line-height: 1.6;">
                Esta seção permitirá atualizar os dados de <strong style="color: #334155;">contatos</strong>, <strong style="color: #334155;">endereço</strong>,
                <strong style="color: #334155;">telefones</strong>, <strong style="color: #334155;">e-mails</strong>, <strong style="color: #334155;">redes sociais</strong> e demais
                informações gerais da empresa exibidas no site.
            </p>
            <span style="display: inline-block; font-size: 11px; font-weight: 600; color: #e21850; background-color: rgba(226,24,80,0.08); padding: 4px 12px; border-radius: 20px;">Em breve</span>
        </div>
    </div>
@endsection
