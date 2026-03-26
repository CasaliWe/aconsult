<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model
{
    protected $table = 'configuracoes';

    protected $fillable = [
        'telefone',
        'email',
        'email_admin',
        'whatsapp_numero',
        'whatsapp_mensagem',
        'horario_atendimento',
        'endereco_rua',
        'endereco_bairro',
        'endereco_cidade',
        'endereco_estado',
        'endereco_cep',
        'mapa_embed_url',
        'mapa_link_url',
        'social_instagram',
        'social_facebook',
        'social_linkedin',
        'social_youtube',
        'link_area_cliente',
        'link_app_store',
        'link_google_play',
        'email_notificacao_ebook',
    ];
}
