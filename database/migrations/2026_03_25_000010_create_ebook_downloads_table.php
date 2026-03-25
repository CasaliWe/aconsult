<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ebook_downloads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ebook_card_id')->constrained('ebook_cards')->cascadeOnDelete();
            $table->string('nome', 120);
            $table->string('email', 180);
            $table->string('whatsapp', 30)->nullable();
            $table->string('ip', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ebook_downloads');
    }
};
