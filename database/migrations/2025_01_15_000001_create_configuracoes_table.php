<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('configuracoes', function (Blueprint $table) {
            $table->id();

            // Contato
            $table->string('telefone')->default('(47) 2125-0281');
            $table->string('email')->default('contato@aconsultcontabilidade.com.br');
            $table->string('whatsapp_numero')->default('554721250281');
            $table->string('whatsapp_mensagem')->default('Olá! Bem-vindo à Aconsult! 👋 Como podemos ajudar?');

            // Horário
            $table->string('horario_atendimento')->default('Seg — Sex: 8h às 12h e 13h30 às 18h');

            // Endereço
            $table->string('endereco_rua')->default('Rua São Cristovão, 879');
            $table->string('endereco_bairro')->default('Cordeiros');
            $table->string('endereco_cidade')->default('Itajaí');
            $table->string('endereco_estado')->default('SC');
            $table->string('endereco_cep')->default('88310-161');

            // Mapa
            $table->text('mapa_embed_url')->nullable();
            $table->string('mapa_link_url')->nullable();

            // Redes sociais
            $table->string('social_instagram')->nullable();
            $table->string('social_facebook')->nullable();
            $table->string('social_linkedin')->nullable();
            $table->string('social_youtube')->nullable();

            // Links externos
            $table->string('link_area_cliente')->nullable();
            $table->string('link_app_store')->nullable();
            $table->string('link_google_play')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('configuracoes');
    }
};
