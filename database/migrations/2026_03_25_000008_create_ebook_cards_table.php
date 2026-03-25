<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ebook_cards', function (Blueprint $table) {
            $table->id();
            $table->string('categoria', 100);
            $table->string('titulo', 200);
            $table->text('descricao');
            $table->string('capa_titulo', 120);
            $table->string('capa_subtitulo', 120)->nullable();
            $table->string('icone_classe', 120);
            $table->unsignedInteger('ordem')->default(0);
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ebook_cards');
    }
};
