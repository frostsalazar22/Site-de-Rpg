<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('criaturas', function (Blueprint $table) {
            $table->id();

            // Identificação
            $table->string('nome');
            $table->string('tipo')->nullable();
            $table->string('subtipo')->nullable();
            $table->string('alinhamento')->nullable();
            $table->string('classe_desafio')->nullable();
            $table->string('categoria_perigo')->nullable();

            // Características físicas
            $table->string('tamanho')->nullable();
            $table->string('velocidade')->nullable(); // Ex: "Terrestre 9m, Voo 18m"
            $table->text('aparencia')->nullable();
            $table->string('peso_altura')->nullable();
            $table->string('localizacao_preferida')->nullable();
            $table->text('presenca_ambiental')->nullable();

            // Atributos
            $table->integer('for')->nullable();
            $table->integer('des')->nullable();
            $table->integer('con')->nullable();
            $table->integer('int')->nullable();
            $table->integer('sab')->nullable();
            $table->integer('car')->nullable();

            // Resistências
            $table->text('resistencias')->nullable();         // Ex: "Fogo, Veneno"
            $table->text('imunidades')->nullable();           // Ex: "Sono, Controle Mental"
            $table->text('vulnerabilidades')->nullable();     // Ex: "Gelo, Prata"
            $table->text('resistencias_condicionais')->nullable();

            // Estatísticas de combate
            $table->string('pv')->nullable(); // Ex: "8d10+16"
            $table->string('ca')->nullable(); // Ex: "17"
            $table->text('reacoes')->nullable();
            $table->text('condicoes_infligidas')->nullable();

            // Ações
            $table->text('ataques_comuns')->nullable();
            $table->text('acoes_especiais')->nullable();
            $table->text('acoes_lendarias')->nullable();

            // Comportamento e Lore
            $table->text('origem')->nullable();
            $table->text('motivacoes')->nullable();
            $table->text('habito_social')->nullable();
            $table->text('misterios')->nullable();
            $table->text('rotina')->nullable();
            $table->text('impacto_mundo')->nullable();

            // Estágios
            $table->text('descricao_estagios')->nullable();
            $table->text('condicoes_transicao')->nullable();
            $table->text('estagio_1')->nullable();
            $table->text('estagio_2')->nullable();
            $table->text('estagio_3')->nullable();

            // Habilidades
            $table->text('habilidades_passivas')->nullable();
            $table->text('habilidades_ativas')->nullable();

            // Interações Narrativas
            $table->text('influencia_jogo')->nullable();
            $table->text('conexoes')->nullable();
            $table->text('detalhes_cinematicos')->nullable();

            // Recompensas
            $table->text('tesouro')->nullable();
            $table->text('componentes_alquimia')->nullable();
            $table->text('conhecimento')->nullable();
            $table->text('beneficios_temporarios')->nullable();

            // Notas adicionais
            $table->text('notas_opcionais')->nullable();
            $table->text('habilidades_variantes')->nullable();
            $table->text('evolucao')->nullable();
            $table->text('impacto_ambiente')->nullable();

            // Imagem (opcional)
            $table->string('imagem')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('criaturas');
    }
};
