<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipamentoController extends Controller
{
    // Lista todos os equipamentos
    public function index()
    {
        $equipamentos = Equipamento::all();
        return view('equipamentos.index', compact('equipamentos'));
    }

    // Formulário para criar novo equipamento
    public function create()
    {
        return view('equipamentos.create');
    }

    // Armazena novo equipamento
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'tipo_uso' => 'nullable|string|max:255',
            'classe_necessaria' => 'nullable|string|max:255',
            'requisitos' => 'nullable|string',
            'peso' => 'nullable|numeric',
            'local_origem' => 'nullable|string|max:255',
            'bonus' => 'nullable|string',
            'habilidades_passivas' => 'nullable|string',
            'habilidades_ativas' => 'nullable|string',
            'durabilidade' => 'nullable|integer',
            'afinidade_elemental' => 'nullable|string|max:255',
            'encantamentos' => 'nullable|string',
            'historia' => 'nullable|string',
            'curiosidades' => 'nullable|string',
            'conexoes' => 'nullable|string',
            'preco' => 'nullable|integer',
            'raridade' => 'nullable|string|max:255',
            'restricao_uso' => 'nullable|string',
            'evolucoes' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('equipamentos', 'public');
        }

        Equipamento::create($validated);

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento criado com sucesso!');
    }

    // Exibe detalhes do equipamento
    public function show(Equipamento $equipamento)
    {
        return view('equipamentos.show', compact('equipamento'));
    }

    // Formulário para editar equipamento
    public function edit(Equipamento $equipamento)
    {
        return view('equipamentos.edit', compact('equipamento'));
    }

    // Atualiza o equipamento
    public function update(Request $request, Equipamento $equipamento)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'tipo_uso' => 'nullable|string|max:255',
            'classe_necessaria' => 'nullable|string|max:255',
            'requisitos' => 'nullable|string',
            'peso' => 'nullable|numeric',
            'local_origem' => 'nullable|string|max:255',
            'bonus' => 'nullable|string',
            'habilidades_passivas' => 'nullable|string',
            'habilidades_ativas' => 'nullable|string',
            'durabilidade' => 'nullable|integer',
            'afinidade_elemental' => 'nullable|string|max:255',
            'encantamentos' => 'nullable|string',
            'historia' => 'nullable|string',
            'curiosidades' => 'nullable|string',
            'conexoes' => 'nullable|string',
            'preco' => 'nullable|integer',
            'raridade' => 'nullable|string|max:255',
            'restricao_uso' => 'nullable|string',
            'evolucoes' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('equipamentos', 'public');
        }

        $equipamento->update($validated);

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento atualizado com sucesso!');
    }

    // Excluir equipamento
    public function destroy(Equipamento $equipamento)
    {
        $equipamento->delete();

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento excluído com sucesso!');
    }
}
