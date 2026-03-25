{{-- Página: Pág. Soluções --}}
@extends('admin.layout')

@section('titulo', 'Pág. Soluções')

@section('conteudo')
    <div style="margin-bottom: 24px;">
        <p style="font-size: 13px; color: #64748b; margin: 0;">Gerencie o conteúdo das 3 páginas de soluções</p>
    </div>

    <div style="background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 32px;">
        <div style="text-align: center; padding: 40px 20px;">
            <div style="width: 56px; height: 56px; border-radius: 50%; background-color: rgba(226,24,80,0.08); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                <svg width="24" height="24" fill="none" stroke="#e21850" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
            <h2 style="font-size: 18px; font-weight: 700; color: #1e293b; margin: 0 0 8px;">Em Desenvolvimento</h2>
            <p style="font-size: 14px; color: #64748b; max-width: 420px; margin: 0 auto 16px; line-height: 1.6;">
                Esta seção permitirá gerenciar o conteúdo das <strong style="color: #334155;">3 páginas de soluções</strong>:
                Empresas, E-commerce e Comércio Exterior — incluindo textos, imagens e informações de cada solução.
            </p>
            <span style="display: inline-block; font-size: 11px; font-weight: 600; color: #e21850; background-color: rgba(226,24,80,0.08); padding: 4px 12px; border-radius: 20px;">Em breve</span>
        </div>
    </div>
@endsection
