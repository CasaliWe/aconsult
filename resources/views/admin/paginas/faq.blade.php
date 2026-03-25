{{-- Página: Perguntas Frequentes --}}
@extends('admin.layout')

@section('titulo', 'Perguntas Frequentes')

@section('conteudo')
    <div style="margin-bottom: 24px;">
        <p style="font-size: 13px; color: #64748b; margin: 0;">Gerencie o FAQ exibido no site</p>
    </div>

    <div style="background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 32px;">
        <div style="text-align: center; padding: 40px 20px;">
            <div style="width: 56px; height: 56px; border-radius: 50%; background-color: rgba(226,24,80,0.08); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                <svg width="24" height="24" fill="none" stroke="#e21850" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h2 style="font-size: 18px; font-weight: 700; color: #1e293b; margin: 0 0 8px;">Em Desenvolvimento</h2>
            <p style="font-size: 14px; color: #64748b; max-width: 420px; margin: 0 auto 16px; line-height: 1.6;">
                Esta seção permitirá criar, editar e excluir as <strong style="color: #334155;">perguntas frequentes</strong> (FAQ),
                controlando as perguntas, respostas e ordem de exibição.
            </p>
            <span style="display: inline-block; font-size: 11px; font-weight: 600; color: #e21850; background-color: rgba(226,24,80,0.08); padding: 4px 12px; border-radius: 20px;">Em breve</span>
        </div>
    </div>
@endsection
