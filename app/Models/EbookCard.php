<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EbookCard extends Model
{
    protected $table = 'ebook_cards';

    protected $fillable = [
        'categoria',
        'titulo',
        'descricao',
        'capa_titulo',
        'capa_subtitulo',
        'icone_classe',
        'arquivo_ebook',
        'ordem',
        'ativo',
    ];

    protected $casts = [
        'ordem' => 'integer',
        'ativo' => 'boolean',
    ];

    public function downloads(): HasMany
    {
        return $this->hasMany(EbookDownload::class, 'ebook_card_id');
    }
}
