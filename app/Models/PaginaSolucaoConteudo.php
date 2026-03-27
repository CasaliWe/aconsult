<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaginaSolucaoConteudo extends Model
{
    protected $table = 'pagina_solucoes_conteudos';

    protected $fillable = [
        'tipo',
        'nome_menu',
        'mini_descricao',
        'icone_classe',
        'breadcrumb',
        'banner_super_titulo',
        'banner_titulo',
        'banner_descricao',
        'banner_imagem',
        'ordem',
        'ativo',
        'conteudo_html',
    ];

    protected $casts = [
        'ordem' => 'integer',
        'ativo' => 'boolean',
    ];
}
