<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaginaAconsultSobre extends Model
{
    protected $table = 'pagina_aconsult_sobre';

    protected $fillable = [
        'imagem',
        'estados_atendidos',
        'texto',
    ];
}