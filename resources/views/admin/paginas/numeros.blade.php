{{-- Página: Nossos Números --}}
@extends('admin.layout')

@section('titulo', 'Nossos Números')

@section('conteudo')
    <style>
        .admin-card { background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 28px; margin-bottom: 24px; }
        .admin-label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .admin-input {
            width: 100%; padding: 10px 14px; background: #f8fafc; border: 1.5px solid #e2e8f0;
            border-radius: 10px; font-size: 14px; color: #1e293b; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s; font-family: inherit;
        }
        .admin-input:focus { border-color: #e21850; box-shadow: 0 0 0 3px rgba(226,24,80,0.08); }
        .admin-input::placeholder { color: #94a3b8; }
        .admin-grid { display: grid; grid-template-columns: 1fr; gap: 16px; }
        @media (min-width: 768px) { .admin-grid-2 { grid-template-columns: 1fr 1fr; } }
        .admin-alert { padding: 12px 16px; border-radius: 10px; font-size: 13px; font-weight: 600; margin-bottom: 20px; }
        .admin-alert-sucesso { background-color: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; }
        .admin-alert-erro { background-color: #fef2f2; border: 1px solid #fecaca; color: #dc2626; }
        .admin-btn-salvar {
            display: inline-flex; align-items: center; gap: 8px; padding: 10px 24px;
            background-color: #e21850; color: #fff; font-weight: 700; font-size: 14px;
            border: none; border-radius: 10px; cursor: pointer; transition: background-color 0.2s;
        }
        .admin-btn-salvar:hover { background-color: #c91545; }
        .numero-box {
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            border-radius: 12px;
            padding: 18px;
        }
        .numero-topo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }
        .numero-ordem {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 26px;
            height: 26px;
            border-radius: 999px;
            background: rgba(226,24,80,0.12);
            color: #e21850;
            font-size: 12px;
            font-weight: 700;
        }
        .numero-preview {
            font-size: 12px;
            color: #64748b;
            background: #fff;
            border: 1px dashed #cbd5e1;
            border-radius: 8px;
            padding: 8px 10px;
            margin-top: 10px;
        }
    </style>

    <div style="margin-bottom: 24px;">
        <p style="font-size: 13px; color: #64748b; margin: 0;">Edite os 4 números exibidos na seção "Nossos números" da home</p>
    </div>

    @if (session('sucesso'))
        <div class="admin-alert admin-alert-sucesso">{{ session('sucesso') }}</div>
    @endif
    @if (session('erro'))
        <div class="admin-alert admin-alert-erro">{{ session('erro') }}</div>
    @endif

    <form action="{{ route('admin.numeros.salvar') }}" method="POST">
        @csrf

        <div class="admin-card">
            <div class="admin-grid admin-grid-2">
                @foreach($numeros as $index => $numero)
                    <div class="numero-box">
                        <div class="numero-topo">
                            <strong style="font-size: 14px; color: #1e293b;">Card {{ $loop->iteration }}</strong>
                            <span class="numero-ordem">{{ $numero->ordem }}</span>
                        </div>

                        <input type="hidden" name="numeros[{{ $index }}][id]" value="{{ $numero->id }}">

                        <div style="margin-bottom: 12px;">
                            <label class="admin-label">Número</label>
                            <input
                                type="number"
                                min="0"
                                max="999999"
                                name="numeros[{{ $index }}][valor]"
                                value="{{ old('numeros.' . $index . '.valor', $numero->valor) }}"
                                class="admin-input"
                                required>
                        </div>

                        <div>
                            <label class="admin-label">Título abaixo do número</label>
                            <input
                                type="text"
                                name="numeros[{{ $index }}][titulo]"
                                value="{{ old('numeros.' . $index . '.titulo', $numero->titulo) }}"
                                class="admin-input"
                                maxlength="120"
                                required>
                        </div>

                        <p class="numero-preview">Preview: + {{ old('numeros.' . $index . '.valor', $numero->valor) }} — {{ old('numeros.' . $index . '.titulo', $numero->titulo) }}</p>
                    </div>
                @endforeach
            </div>

            <div style="margin-top: 20px; display: flex; justify-content: flex-end;">
                <button type="submit" class="admin-btn-salvar">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Salvar números
                </button>
            </div>
        </div>
    </form>
@endsection
