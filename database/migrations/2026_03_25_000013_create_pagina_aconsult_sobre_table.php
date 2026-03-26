<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pagina_aconsult_sobre', function (Blueprint $table) {
            $table->id();
            $table->string('imagem', 255)->nullable();
            $table->unsignedSmallInteger('estados_atendidos')->default(10);
            $table->longText('texto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagina_aconsult_sobre');
    }
};