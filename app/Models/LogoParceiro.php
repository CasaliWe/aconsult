<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogoParceiro extends Model
{
    protected $table = 'logos_parceiros';

    protected $fillable = [
        'nome',
        'imagem',
        'link',
        'ordem',
        'ativo',
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];
}
