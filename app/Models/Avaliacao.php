<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $table = 'avaliacoes';

    protected $fillable = [
        'nome',
        'cargo_empresa',
        'texto',
        'nota',
        'ordem',
        'ativo',
    ];

    protected $casts = [
        'nota' => 'integer',
        'ordem' => 'integer',
        'ativo' => 'boolean',
    ];
}
