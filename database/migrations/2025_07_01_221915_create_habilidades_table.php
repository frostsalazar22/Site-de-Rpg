<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('habilidades', function (Blueprint $table) {
            $table->id();

            // Identificação
            $table->string('nome'); // Nome da habilidade, ex: Ataque Furtivo
            $table->string('tipo')->nullable(); // Tipo: Passiva, Ativa, Reação
            $table->string('classe_usuario')->nullable(); // Ex: Ladinos, Guerreiros
            $table->integer('nivel_necessario')->nullable(); // Ex: Disponível a partir do nível 5

            // Efeitos
            $table->text('descricao'); // O que a habilidade faz detalhadamente
            $table->string('dano_beneficio')->nullable(); // Ex: 3d6 dano extra, vantagem em testes
            $table->string('area_acao')->nullable(); // Ex: Um alvo, inimigos em 5 metros ao redor
            $table->string('duracao')->nullable(); // Ex: Instantâneo, dura 1 rodada, efeito passivo

            // Detalhes Avançados
            $table->text('condicoes_ativacao')->nullable(); // Ex: Usada uma vez por combate, com descanso
            $table->text('interacoes')->nullable(); // Ex: Combina com furtividade, não com armadura pesada
            $table->text('aprimoramentos')->nullable(); // Ex: Melhorias com níveis, equipamentos ou talentos
            $table->text('restricoes')->nullable(); // Ex: Só fora de combate, requer concentração

            // Riscos e Consequências
            $table->string('custo_adicional')->nullable(); // Ex: Causa exaustão, perda temporária de atributos
            $table->text('falha')->nullable(); // Ex: Perde o turno, alerta inimigos, efeitos adversos
            $table->text('contraindicacoes')->nullable(); // Ex: Não funciona contra certos inimigos ou condições

            $table->string('imagem')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('habilidades');
    }
};