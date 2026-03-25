<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqItem extends Model
{
    protected $table = 'faq_items';

    protected $fillable = [
        'pergunta',
        'resposta',
        'ordem',
        'ativo',
    ];

    protected $casts = [
        'ordem' => 'integer',
        'ativo' => 'boolean',
    ];
}
