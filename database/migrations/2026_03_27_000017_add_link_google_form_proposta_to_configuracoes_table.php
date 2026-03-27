<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('configuracoes', function (Blueprint $table) {
            $table->string('link_google_form_proposta', 500)->nullable()->after('link_google_play');
        });
    }

    public function down(): void
    {
        Schema::table('configuracoes', function (Blueprint $table) {
            $table->dropColumn('link_google_form_proposta');
        });
    }
};
