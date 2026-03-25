<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EbookDownload extends Model
{
    protected $table = 'ebook_downloads';

    protected $fillable = [
        'ebook_card_id',
        'nome',
        'email',
        'whatsapp',
        'ip',
        'user_agent',
    ];

    protected $casts = [
        'ebook_card_id' => 'integer',
    ];

    public function ebookCard(): BelongsTo
    {
        return $this->belongsTo(EbookCard::class, 'ebook_card_id');
    }
}
