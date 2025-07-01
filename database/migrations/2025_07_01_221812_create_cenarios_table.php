<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cenarios', function (Blueprint $table) {
            $table->id();

            // Identificação
            $table->string('nome'); // Ex: Reino de Eldoria
            $table->string('tipo')->nullable(); // Mundo, Região, Cidade, Vila, Dungeon
            $table->string('ambientacao')->nullable(); // Fantasia medieval, Futurista, Apocalíptico
            $table->string('periodo_temporal')->nullable(); // Era atual, Idade Antiga, Futuro distante

            // Geografia e Ambiente
            $table->text('descricao_fisica')->nullable(); // Montanhas, florestas, desertos
            $table->string('clima')->nullable(); // Temperado, tropical, desértico
            $table->text('recursos_naturais')->nullable(); // Minérios, plantas medicinais, água
            $table->text('locais_importantes')->nullable(); // Cidades, fortalezas, ruínas

            // População e Cultura
            $table->text('racas_especies')->nullable(); // Humanos, elfos, anões
            $table->text('sociedade')->nullable(); // Monarquia, clãs, república
            $table->text('crencas_religiao')->nullable(); // Cultos, deuses, tabus
            $table->text('linguas_costumes')->nullable(); // Dialetos, festivais, vestimentas

            // História e Política
            $table->text('eventos_importantes')->nullable(); // Guerras, catástrofes, revoluções
            $table->text('conflitos_atuais')->nullable(); // Rivalidades, invasões, disputas
            $table->text('lideres_personagens')->nullable(); // Reis, generais, heróis
            $table->text('aliancas_inimizades')->nullable(); // Pactos, ódios históricos

            // Magia e Tecnologia
            $table->string('nivel_tecnologico')->nullable(); // Armas de fogo, steampunk, magia
            $table->string('presenca_magia')->nullable(); // Comum, rara, proibida
            $table->text('instituicoes_magicas_cientificas')->nullable(); // Guildas, universidades

            // Ameaças e Desafios
            $table->text('inimigos_comuns')->nullable(); // Bandidos, monstros, exércitos
            $table->text('perigos_naturais')->nullable(); // Terrenos traiçoeiros, tempestades
            $table->text('conflitos_internos')->nullable(); // Corrupção, traições, crises
            $table->text('misterios_segredos')->nullable(); // Ruínas, artefatos, profecias

            // Exploração e Interação
            $table->text('locais_aventuras')->nullable(); // Masmorras, mercados, florestas
            $table->text('npcs_importantes')->nullable(); // Mercadores, informantes, líderes
            $table->text('recursos_jogadores')->nullable(); // Pontos de interesse, mapas
            $table->text('recompensas_tesouros')->nullable(); // Itens raros, artefatos mágicos

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cenarios');
    }
};
