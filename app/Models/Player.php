<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        // 1. Identificação
        'nome', 'raca', 'classe', 'alinhamento', 'idade', 'genero',
        'altura', 'peso', 'aparencia',

        // 2. Atributos
        'forca', 'destreza', 'constituicao', 'inteligencia', 'sabedoria', 'carisma',
        'pontos_vida_max', 'pontos_vida_atual', 'classe_armadura', 'iniciativa', 'velocidade',

        // 3. Habilidades e Poderes
        'habilidades_passivas', 'habilidades_ativas', 'magias_conhecidas', 'slots_magia',
        'magias_preparadas', 'talentos_proficiências',

        // 4. Inventário
        'equipamentos_basicos', 'itens_utilizaveis', 'recursos',

        // 5. Personalidade
        'motivacoes', 'medos_fraquezas', 'traços_personalidade', 'ideais',
        'vinculos', 'defeitos',

        // 6. História
        'background', 'eventos_marcantes', 'conexoes', 'segredos',

        // 7. Estatísticas de Combate
        'ataques_magias', 'resistencias', 'fraquezas', 'testes_resistencia',

        // 8. Notas Adicionais
        'frases_efeito',

        'imagem',
    ];
}
