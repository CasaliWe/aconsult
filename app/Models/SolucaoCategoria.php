<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SolucaoCategoria extends Model
{
    protected $table = 'solucao_categorias';

    protected $fillable = [
        'nome',
        'slug',
        'icone_classe',
        'ordem',
        'ativo',
    ];

    protected $casts = [
        'ordem' => 'integer',
        'ativo' => 'boolean',
    ];

    public function cards(): HasMany
    {
        return $this->hasMany(SolucaoCard::class, 'solucao_categoria_id');
    }
}
