<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaginaAconsultCard extends Model
{
    protected $table = 'pagina_aconsult_cards';

    protected $fillable = [
        'tipo',
        'titulo',
        'texto',
        'icone_classe',
        'ordem',
        'ativo',
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];
}