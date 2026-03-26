<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reel extends Model
{
    protected $table = 'reels';

    protected $fillable = [
        'capa',
        'video',
        'ordem',
        'ativo',
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];
}