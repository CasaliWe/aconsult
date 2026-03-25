<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('solucao_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solucao_categoria_id')->constrained('solucao_categorias')->cascadeOnDelete();
            $table->string('titulo', 160);
            $table->text('descricao');
            $table->string('icone_classe', 120);
            $table->unsignedInteger('ordem')->default(0);
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solucao_cards');
    }
};
