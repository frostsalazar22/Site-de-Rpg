<?php

namespace App\Http\Controllers;

use App\Models\Magia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MagiaController extends Controller
{
    // Lista todas as magias
    public function index()
    {
        $magias = Magia::all();
        return view('magias.index', compact('magias'));
    }

    // Formulário para criar uma nova magia
    public function create()
    {
        return view('magias.create');
    }

    // Armazena nova magia no banco
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'escola' => 'required|string|max:255',
            'nivel' => 'required|integer|min:0',
            'classe_usuario' => 'required|string|max:255',
            'verbais' => 'boolean',
            'somaticos' => 'boolean',
            'materiais' => 'nullable|string',
            'area_efeito' => 'nullable|string|max:255',
            'duracao' => 'nullable|string|max:255',
            'descricao' => 'required|string',
            'dano_beneficio' => 'nullable|string|max:255',
            'alvo' => 'nullable|string|max:255',
            'ritual' => 'boolean',
            'resistencia' => 'nullable|string',
            'interrupcoes' => 'nullable|string|max:255',
            'aprimoramento' => 'nullable|string',
            'custo_conjuracao' => 'nullable|string|max:255',
            'falhas_criticas' => 'nullable|string',
            'contraindicacoes' => 'nullable|string',
            'variacoes_regionais' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('magias', 'public');
        }

        Magia::create($data);

        return redirect()->route('magias.index')->with('success', 'Magia criada com sucesso!');
    }

    // Exibe detalhes de uma magia
    public function show(Magia $magia)
    {
        return view('magias.show', compact('magia'));
    }

    // Formulário para editar uma magia
    public function edit(Magia $magia)
    {
        return view('magias.edit', compact('magia'));
    }

    // Atualiza uma magia
    public function update(Request $request, Magia $magia)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'escola' => 'required|string|max:255',
            'nivel' => 'required|integer|min:0',
            'classe_usuario' => 'required|string|max:255',
            'verbais' => 'boolean',
            'somaticos' => 'boolean',
            'materiais' => 'nullable|string',
            'area_efeito' => 'nullable|string|max:255',
            'duracao' => 'nullable|string|max:255',
            'descricao' => 'required|string',
            'dano_beneficio' => 'nullable|string|max:255',
            'alvo' => 'nullable|string|max:255',
            'ritual' => 'boolean',
            'resistencia' => 'nullable|string',
            'interrupcoes' => 'nullable|string|max:255',
            'aprimoramento' => 'nullable|string',
            'custo_conjuracao' => 'nullable|string|max:255',
            'falhas_criticas' => 'nullable|string',
            'contraindicacoes' => 'nullable|string',
            'variacoes_regionais' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            // Exclui imagem antiga se houver
            if ($magia->imagem) {
                Storage::disk('public')->delete($magia->imagem);
            }

            $data['imagem'] = $request->file('imagem')->store('magias', 'public');
        }

        $magia->update($data);

        return redirect()->route('magias.show', $magia)->with('success', 'Magia atualizada com sucesso!');
    }

    // Remove uma magia
    public function destroy(Magia $magia)
    {
        // Exclui imagem do storage
        if ($magia->imagem) {
            Storage::disk('public')->delete($magia->imagem);
        }

        $magia->delete();

        return redirect()->route('magias.index')->with('success', 'Magia excluída!');
    }
}
