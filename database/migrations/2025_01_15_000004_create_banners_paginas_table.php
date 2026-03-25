<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banners_paginas', function (Blueprint $table) {
            $table->id();
            $table->string('pagina', 50)->unique();       // slug: aconsult, solucoes-empresas, etc.
            $table->string('nome_exibicao', 100);          // nome legível: "Aconsult (Sobre Nós)"
            $table->string('super_titulo', 100)->nullable();
            $table->string('titulo', 500);
            $table->text('descricao')->nullable();
            $table->string('imagem', 255);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banners_paginas');
    }
};
