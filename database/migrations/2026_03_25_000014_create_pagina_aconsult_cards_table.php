<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pagina_aconsult_cards', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 30);
            $table->string('titulo', 160);
            $table->string('texto', 1500);
            $table->string('icone_classe', 120);
            $table->unsignedInteger('ordem')->default(0);
            $table->boolean('ativo')->default(true);
            $table->timestamps();

            $table->index(['tipo', 'ordem']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagina_aconsult_cards');
    }
};