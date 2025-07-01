<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Nome básico do equipamento
            $table->string('categoria')->nullable();
            $table->string('tipo_uso')->nullable();
            $table->string('classe_necessaria')->nullable();
            $table->text('requisitos')->nullable(); // antes json, agora texto
            $table->float('peso')->nullable();
            $table->string('local_origem')->nullable();
            $table->text('bonus')->nullable(); // antes json, agora texto
            $table->text('habilidades_passivas')->nullable(); // antes json, texto
            $table->text('habilidades_ativas')->nullable(); // antes json, texto
            $table->integer('durabilidade')->nullable();
            $table->string('afinidade_elemental')->nullable();
            $table->text('encantamentos')->nullable(); // antes json, texto
            $table->text('historia')->nullable();
            $table->text('curiosidades')->nullable();
            $table->text('conexoes')->nullable();
            $table->integer('preco')->nullable();
            $table->string('raridade')->nullable();
            $table->text('restricao_uso')->nullable();
            $table->text('evolucoes')->nullable();
            $table->string('imagem')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipamentos');
    }
};
