<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pagina_solucoes_conteudos', function (Blueprint $table) {
            $table->string('nome_menu', 120)->nullable()->after('tipo');
            $table->string('mini_descricao', 255)->nullable()->after('nome_menu');
            $table->string('icone_classe', 120)->nullable()->after('mini_descricao');
            $table->string('breadcrumb', 120)->nullable()->after('icone_classe');
            $table->string('banner_super_titulo', 120)->nullable()->after('breadcrumb');
            $table->string('banner_titulo', 500)->nullable()->after('banner_super_titulo');
            $table->string('banner_descricao', 500)->nullable()->after('banner_titulo');
            $table->string('banner_imagem', 255)->nullable()->after('banner_descricao');
            $table->unsignedSmallInteger('ordem')->default(0)->after('banner_imagem');
            $table->boolean('ativo')->default(true)->after('ordem');

            $table->index(['ativo', 'ordem'], 'idx_pagina_solucoes_ativo_ordem');
        });
    }

    public function down(): void
    {
        Schema::table('pagina_solucoes_conteudos', function (Blueprint $table) {
            $table->dropIndex('idx_pagina_solucoes_ativo_ordem');
            $table->dropColumn([
                'nome_menu',
                'mini_descricao',
                'icone_classe',
                'breadcrumb',
                'banner_super_titulo',
                'banner_titulo',
                'banner_descricao',
                'banner_imagem',
                'ordem',
                'ativo',
            ]);
        });
    }
};
