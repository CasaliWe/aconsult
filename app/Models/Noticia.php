<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = 'noticias';

    protected $fillable = [
        'categoria',
        'titulo',
        'mini_descricao',
        'conteudo',
        'thumb',
        'tempo_leitura',
        'data_publicacao',
        'ativo',
    ];

    protected $casts = [
        'data_publicacao' => 'date',
        'ativo' => 'boolean',
    ];
}
