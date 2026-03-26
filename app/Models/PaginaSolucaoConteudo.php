<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaginaSolucaoConteudo extends Model
{
    protected $table = 'pagina_solucoes_conteudos';

    protected $fillable = [
        'tipo',
        'conteudo_html',
    ];
}
