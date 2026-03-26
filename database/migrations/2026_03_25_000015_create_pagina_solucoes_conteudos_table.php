<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pagina_solucoes_conteudos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 30)->unique();
            $table->longText('conteudo_html')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagina_solucoes_conteudos');
    }
};
