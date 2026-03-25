<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SolucaoCard extends Model
{
    protected $table = 'solucao_cards';

    protected $fillable = [
        'solucao_categoria_id',
        'titulo',
        'descricao',
        'icone_classe',
        'ordem',
        'ativo',
    ];

    protected $casts = [
        'solucao_categoria_id' => 'integer',
        'ordem' => 'integer',
        'ativo' => 'boolean',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(SolucaoCategoria::class, 'solucao_categoria_id');
    }
}
