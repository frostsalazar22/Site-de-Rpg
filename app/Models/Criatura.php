<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criatura extends Model
{
    use HasFactory;

    protected $fillable = [
        // Identificação
        'nome', 'tipo', 'subtipo', 'alinhamento', 'classe_desafio', 'categoria_perigo',

        // Características físicas
        'tamanho', 'velocidade', 'aparencia', 'peso_altura', 'localizacao_preferida', 'presenca_ambiental',

        // Atributos
        'for', 'des', 'con', 'int', 'sab', 'car',

        // Resistências
        'resistencias', 'imunidades', 'vulnerabilidades', 'resistencias_condicionais',

        // Estatísticas de combate
        'pv', 'ca', 'reacoes', 'condicoes_infligidas',

        // Ações
        'ataques_comuns', 'acoes_especiais', 'acoes_lendarias',

        // Comportamento e Lore
        'origem', 'motivacoes', 'habito_social', 'misterios', 'rotina', 'impacto_mundo',

        // Estágios
        'descricao_estagios', 'condicoes_transicao', 'estagio_1', 'estagio_2', 'estagio_3',

        // Habilidades
        'habilidades_passivas', 'habilidades_ativas',

        // Interações Narrativas
        'influencia_jogo', 'conexoes', 'detalhes_cinematicos',

        // Recompensas
        'tesouro', 'componentes_alquimia', 'conhecimento', 'beneficios_temporarios',

        // Notas adicionais
        'notas_opcionais', 'habilidades_variantes', 'evolucao', 'impacto_ambiente',

        // Imagem
        'imagem',
    ];
}
