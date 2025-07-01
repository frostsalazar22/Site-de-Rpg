<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipamentoController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::all();
        return view('equipamentos.index', compact('equipamentos'));
    }

    public function create()
    {
        return view('equipamentos.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
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
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $dados['imagem'] = $request->file('imagem')->store('equipamentos', 'public');
        }

        Equipamento::create($dados);

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento criado com sucesso.');
    }

    public function show(Equipamento $equipamento)
    {
        return view('equipamentos.show', compact('equipamento'));
    }

    public function edit(Equipamento $equipamento)
    {
        return view('equipamentos.edit', compact('equipamento'));
    }

    public function update(Request $request, Equipamento $equipamento)
    {
        $dados = $request->validate([
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
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            if ($equipamento->imagem) {
                Storage::disk('public')->delete($equipamento->imagem);
            }
            $dados['imagem'] = $request->file('imagem')->store('equipamentos', 'public');
        }

        $equipamento->update($dados);

        return redirect()->route('equipamentos.show', $equipamento)->with('success', 'Equipamento atualizado com sucesso.');
    }

    public function destroy(Equipamento $equipamento)
    {
        if ($equipamento->imagem) {
            Storage::disk('public')->delete($equipamento->imagem);
        }

        $equipamento->delete();

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento excluído com sucesso.');
    }
}
