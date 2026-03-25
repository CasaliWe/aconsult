<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NossoNumero extends Model
{
    protected $table = 'nossos_numeros';

    protected $fillable = [
        'ordem',
        'valor',
        'titulo',
    ];
}
