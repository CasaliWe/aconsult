{{-- Página: Banners --}}
@extends('admin.layout')

@section('titulo', 'Banners')

@section('conteudo')
    <div style="margin-bottom: 24px;">
        <p style="font-size: 13px; color: #64748b; margin: 0;">Gerencie os banners exibidos no site</p>
    </div>

    <div style="background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 32px;">
        <div style="text-align: center; padding: 40px 20px;">
            <div style="width: 56px; height: 56px; border-radius: 50%; background-color: rgba(226,24,80,0.08); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                <svg width="24" height="24" fill="none" stroke="#e21850" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <h2 style="font-size: 18px; font-weight: 700; color: #1e293b; margin: 0 0 8px;">Em Desenvolvimento</h2>
            <p style="font-size: 14px; color: #64748b; max-width: 420px; margin: 0 auto 16px; line-height: 1.6;">
                Esta seção permitirá gerenciar os <strong style="color: #334155;">banners principais</strong> do site,
                incluindo imagens, textos, links e ordem de exibição.
            </p>
            <span style="display: inline-block; font-size: 11px; font-weight: 600; color: #e21850; background-color: rgba(226,24,80,0.08); padding: 4px 12px; border-radius: 20px;">Em breve</span>
        </div>
    </div>
@endsection
