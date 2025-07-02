<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidade extends Model
{
    use HasFactory;

    protected $fillable = [
        // Identificação
        'nome',
        'tipo',
        'classe_usuario',
        'nivel_necessario',

        // Efeitos
        'descricao',
        'dano_beneficio',
        'area_acao',
        'duracao',

        // Detalhes Avançados
        'condicoes_ativacao',
        'interacoes',
        'aprimoramentos',
        'restricoes',

        // Riscos e Consequências
        'custo_adicional',
        'falha',
        'contraindicacoes',

        'imagem',
    ];
}
