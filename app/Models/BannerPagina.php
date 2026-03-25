<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerPagina extends Model
{
    protected $table = 'banners_paginas';

    protected $fillable = [
        'pagina',
        'nome_exibicao',
        'super_titulo',
        'titulo',
        'descricao',
        'imagem',
    ];
}
