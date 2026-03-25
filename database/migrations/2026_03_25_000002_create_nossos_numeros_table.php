<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('nossos_numeros', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('ordem')->unique();
            $table->unsignedInteger('valor');
            $table->string('titulo', 120);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nossos_numeros');
    }
};
