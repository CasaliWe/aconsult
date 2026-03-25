<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('categoria', 60);
            $table->string('titulo', 220);
            $table->string('mini_descricao', 320);
            $table->longText('conteudo');
            $table->string('thumb', 255);
            $table->unsignedSmallInteger('tempo_leitura')->default(5);
            $table->date('data_publicacao');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
