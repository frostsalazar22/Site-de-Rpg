<?php

namespace App\Http\Controllers;

use App\Models\Habilidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HabilidadeController extends Controller
{
    // Lista todas as habilidades
    public function index()
    {
        $habilidades = Habilidade::all();
        return view('habilidades.index', compact('habilidades'));
    }

    // Formulário para criar nova habilidade
    public function create()
    {
        return view('habilidades.create');
    }

    // Armazena nova habilidade
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'classe_usuario' => 'nullable|string|max:255',
            'nivel_necessario' => 'nullable|integer|min:0',
            'descricao' => 'required|string',
            'dano_beneficio' => 'nullable|string|max:255',
            'area_acao' => 'nullable|string|max:255',
            'duracao' => 'nullable|string|max:255',
            'condicoes_ativacao' => 'nullable|string',
            'interacoes' => 'nullable|string',
            'aprimoramentos' => 'nullable|string',
            'restricoes' => 'nullable|string',
            'custo_adicional' => 'nullable|string|max:255',
            'falha' => 'nullable|string',
            'contraindicacoes' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('habilidades', 'public');
        }

        Habilidade::create($data);

        return redirect()->route('habilidades.index')->with('success', 'Habilidade criada com sucesso!');
    }

    // Exibe os detalhes de uma habilidade
    public function show(Habilidade $habilidade)
    {
        return view('habilidades.show', compact('habilidade'));
    }

    // Formulário para editar habilidade
    public function edit(Habilidade $habilidade)
    {
        return view('habilidades.edit', compact('habilidade'));
    }

    // Atualiza uma habilidade
    public function update(Request $request, Habilidade $habilidade)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'classe_usuario' => 'nullable|string|max:255',
            'nivel_necessario' => 'nullable|integer|min:0',
            'descricao' => 'required|string',
            'dano_beneficio' => 'nullable|string|max:255',
            'area_acao' => 'nullable|string|max:255',
            'duracao' => 'nullable|string|max:255',
            'condicoes_ativacao' => 'nullable|string',
            'interacoes' => 'nullable|string',
            'aprimoramentos' => 'nullable|string',
            'restricoes' => 'nullable|string',
            'custo_adicional' => 'nullable|string|max:255',
            'falha' => 'nullable|string',
            'contraindicacoes' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('habilidades', 'public');
        }

        $habilidade->update($validated);

        return redirect()->route('habilidades.index')->with('success', 'Habilidade atualizada com sucesso!');
    }
    // Remove a criatura
    public function destroy(Habilidade $habilidade)
    {
        $habilidade->delete();

        return redirect()->route('habilidades.index')->with('success', 'Habilidade excluída!');
    }
}