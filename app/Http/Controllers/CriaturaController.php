<?php

namespace App\Http\Controllers;

use App\Models\Criatura;
use Illuminate\Http\Request;

class CriaturaController extends Controller
{
    // Lista todas as criaturas
    public function index()
    {
        $criaturas = Criatura::all();
        return view('criaturas.index', compact('criaturas'));
    }

    // Formulário de criação
    public function create()
    {
        return view('criaturas.create');
    }

    // Salva uma nova criatura
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'subtipo' => 'nullable|string|max:255',
            'alinhamento' => 'nullable|string|max:255',
            'classe_desafio' => 'nullable|string|max:255',
            'categoria_perigo' => 'nullable|string|max:255',
            'tamanho' => 'nullable|string|max:255',
            'velocidade' => 'nullable|string|max:255',
            'aparencia' => 'nullable|string',
            'peso_altura' => 'nullable|string|max:255',
            'localizacao_preferida' => 'nullable|string|max:255',
            'presenca_ambiental' => 'nullable|string',
            'for' => 'nullable|integer',
            'des' => 'nullable|integer',
            'con' => 'nullable|integer',
            'int' => 'nullable|integer',
            'sab' => 'nullable|integer',
            'car' => 'nullable|integer',
            'resistencias' => 'nullable|string',
            'imunidades' => 'nullable|string',
            'vulnerabilidades' => 'nullable|string',
            'resistencias_condicionais' => 'nullable|string',
            'pv' => 'nullable|string|max:255',
            'ca' => 'nullable|string|max:255',
            'reacoes' => 'nullable|string',
            'condicoes_infligidas' => 'nullable|string',
            'ataques_comuns' => 'nullable|string',
            'acoes_especiais' => 'nullable|string',
            'acoes_lendarias' => 'nullable|string',
            'origem' => 'nullable|string',
            'motivacoes' => 'nullable|string',
            'habito_social' => 'nullable|string',
            'misterios' => 'nullable|string',
            'rotina' => 'nullable|string',
            'impacto_mundo' => 'nullable|string',
            'descricao_estagios' => 'nullable|string',
            'condicoes_transicao' => 'nullable|string',
            'estagio_1' => 'nullable|string',
            'estagio_2' => 'nullable|string',
            'estagio_3' => 'nullable|string',
            'habilidades_passivas' => 'nullable|string',
            'habilidades_ativas' => 'nullable|string',
            'influencia_jogo' => 'nullable|string',
            'conexoes' => 'nullable|string',
            'detalhes_cinematicos' => 'nullable|string',
            'tesouro' => 'nullable|string',
            'componentes_alquimia' => 'nullable|string',
            'conhecimento' => 'nullable|string',
            'beneficios_temporarios' => 'nullable|string',
            'notas_opcionais' => 'nullable|string',
            'habilidades_variantes' => 'nullable|string',
            'evolucao' => 'nullable|string',
            'impacto_ambiente' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('criaturas', 'public');
        }

        Criatura::create($validated);

        return redirect()->route('criaturas.index')->with('success', 'Criatura criada com sucesso!');
    }

    // Exibe os detalhes de uma criatura
    public function show(Criatura $criatura)
    {
        return view('criaturas.show', compact('criatura'));
    }

    // Formulário para editar uma criatura
    public function edit(Criatura $criatura)
    {
        return view('criaturas.edit', compact('criatura'));
    }

    // Atualiza a criatura
    public function update(Request $request, Criatura $criatura)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'subtipo' => 'nullable|string|max:255',
            'alinhamento' => 'nullable|string|max:255',
            'classe_desafio' => 'nullable|string|max:255',
            'categoria_perigo' => 'nullable|string|max:255',
            'tamanho' => 'nullable|string|max:255',
            'velocidade' => 'nullable|string|max:255',
            'aparencia' => 'nullable|string',
            'peso_altura' => 'nullable|string|max:255',
            'localizacao_preferida' => 'nullable|string|max:255',
            'presenca_ambiental' => 'nullable|string',
            'for' => 'nullable|integer',
            'des' => 'nullable|integer',
            'con' => 'nullable|integer',
            'int' => 'nullable|integer',
            'sab' => 'nullable|integer',
            'car' => 'nullable|integer',
            'resistencias' => 'nullable|string',
            'imunidades' => 'nullable|string',
            'vulnerabilidades' => 'nullable|string',
            'resistencias_condicionais' => 'nullable|string',
            'pv' => 'nullable|string|max:255',
            'ca' => 'nullable|string|max:255',
            'reacoes' => 'nullable|string',
            'condicoes_infligidas' => 'nullable|string',
            'ataques_comuns' => 'nullable|string',
            'acoes_especiais' => 'nullable|string',
            'acoes_lendarias' => 'nullable|string',
            'origem' => 'nullable|string',
            'motivacoes' => 'nullable|string',
            'habito_social' => 'nullable|string',
            'misterios' => 'nullable|string',
            'rotina' => 'nullable|string',
            'impacto_mundo' => 'nullable|string',
            'descricao_estagios' => 'nullable|string',
            'condicoes_transicao' => 'nullable|string',
            'estagio_1' => 'nullable|string',
            'estagio_2' => 'nullable|string',
            'estagio_3' => 'nullable|string',
            'habilidades_passivas' => 'nullable|string',
            'habilidades_ativas' => 'nullable|string',
            'influencia_jogo' => 'nullable|string',
            'conexoes' => 'nullable|string',
            'detalhes_cinematicos' => 'nullable|string',
            'tesouro' => 'nullable|string',
            'componentes_alquimia' => 'nullable|string',
            'conhecimento' => 'nullable|string',
            'beneficios_temporarios' => 'nullable|string',
            'notas_opcionais' => 'nullable|string',
            'habilidades_variantes' => 'nullable|string',
            'evolucao' => 'nullable|string',
            'impacto_ambiente' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('criaturas', 'public');
        }

        $criatura->update($validated);

        return redirect()->route('criaturas.index')->with('success', 'Criatura atualizada com sucesso!');
    }

    // Remove a criatura
    public function destroy(Criatura $criatura)
    {
        $criatura->delete();

        return redirect()->route('criaturas.index')->with('success', 'Criatura excluída!');
    }
}
