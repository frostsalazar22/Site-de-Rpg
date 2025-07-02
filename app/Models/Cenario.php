<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cenario extends Model
{
    use HasFactory;

    protected $fillable = [
        // Identificação
        'nome',
        'tipo',
        'ambientacao',
        'periodo_temporal',

        // Geografia e Ambiente
        'descricao_fisica',
        'clima',
        'recursos_naturais',
        'locais_importantes',

        // População e Cultura
        'racas_especies',
        'sociedade',
        'crencas_religiao',
        'linguas_costumes',

        // História e Política
        'eventos_importantes',
        'conflitos_atuais',
        'lideres_personagens',
        'aliancas_inimizades',

        // Magia e Tecnologia
        'nivel_tecnologico',
        'presenca_magia',
        'instituicoes_magicas_cientificas',

        // Ameaças e Desafios
        'inimigos_comuns',
        'perigos_naturais',
        'conflitos_internos',
        'misterios_segredos',

        // Exploração e Interação
        'locais_aventuras',
        'npcs_importantes',
        'recursos_jogadores',
        'recompensas_tesouros',
        'imagem',
    ];
}
