<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();

            // 1. Identificação
            $table->string('nome');
            $table->string('raca')->nullable();
            $table->string('classe')->nullable();
            $table->string('alinhamento')->nullable();
            $table->integer('idade')->nullable();
            $table->string('genero')->nullable();
            $table->string('altura')->nullable();
            $table->string('peso')->nullable();
            $table->text('aparencia')->nullable();

            // 2. Atributos
            $table->integer('forca')->nullable();
            $table->integer('destreza')->nullable();
            $table->integer('constituicao')->nullable();
            $table->integer('inteligencia')->nullable();
            $table->integer('sabedoria')->nullable();
            $table->integer('carisma')->nullable();
            $table->integer('pontos_vida_max')->nullable();
            $table->integer('pontos_vida_atual')->nullable();
            $table->integer('classe_armadura')->nullable();
            $table->integer('iniciativa')->nullable();
            $table->string('velocidade')->nullable();

            // 3. Habilidades e Poderes (armazenando JSON como texto)
            $table->text('habilidades_passivas')->nullable();
            $table->text('habilidades_ativas')->nullable();
            $table->text('magias_conhecidas')->nullable();
            $table->text('slots_magia')->nullable();
            $table->text('magias_preparadas')->nullable();
            $table->text('talentos_proficiências')->nullable();

            // 4. Inventário (armazenando JSON como texto)
            $table->text('equipamentos_basicos')->nullable();
            $table->text('itens_utilizaveis')->nullable();
            $table->text('recursos')->nullable();

            // 5. Personalidade
            $table->text('motivacoes')->nullable();
            $table->text('medos_fraquezas')->nullable();
            $table->text('traços_personalidade')->nullable();
            $table->text('ideais')->nullable();
            $table->text('vinculos')->nullable();
            $table->text('defeitos')->nullable();

            // 6. História
            $table->text('background')->nullable();
            $table->text('eventos_marcantes')->nullable();
            $table->text('conexoes')->nullable();
            $table->text('segredos')->nullable();

            // 7. Estatísticas de Combate (armazenando JSON como texto)
            $table->text('ataques_magias')->nullable();
            $table->text('resistencias')->nullable();
            $table->text('fraquezas')->nullable();
            $table->text('testes_resistencia')->nullable();

            // 8. Notas Adicionais
            $table->text('frases_efeito')->nullable();

            $table->string('imagem')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personagens');
    }
}
