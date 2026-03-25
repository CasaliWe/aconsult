<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banners_home', function (Blueprint $table) {
            $table->id();
            $table->string('super_titulo')->nullable();
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->string('imagem');
            $table->string('botao_primario_texto')->nullable();
            $table->string('botao_primario_link')->nullable();
            $table->string('botao_secundario_texto')->nullable();
            $table->string('botao_secundario_link')->nullable();
            $table->unsignedSmallInteger('ordem')->default(0);
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banners_home');
    }
};
