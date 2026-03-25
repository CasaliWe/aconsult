<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerHome extends Model
{
    protected $table = 'banners_home';

    protected $fillable = [
        'super_titulo',
        'titulo',
        'descricao',
        'imagem',
        'botao_primario_texto',
        'botao_primario_link',
        'botao_secundario_texto',
        'botao_secundario_link',
        'ordem',
        'ativo',
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];
}
