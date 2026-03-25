<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('ebook_cards', function (Blueprint $table) {
            $table->string('arquivo_ebook', 255)->nullable()->after('icone_classe');
        });
    }

    public function down(): void
    {
        Schema::table('ebook_cards', function (Blueprint $table) {
            $table->dropColumn('arquivo_ebook');
        });
    }
};
