<?php

namespace App\Http\Controllers;

use App\Models\Cenario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CenarioController extends Controller
{
    // Lista todos os cenários
    public function index()
    {
        $cenarios = Cenario::all();
        return view('cenarios.index', compact('cenarios'));
    }

    // Formulário de criação
    public function create()
    {
        return view('cenarios.create');
    }

    // Armazena novo cenário
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'ambientacao' => 'nullable|string|max:255',
            'periodo_temporal' => 'nullable|string|max:255',

            'descricao_fisica' => 'nullable|string',
            'clima' => 'nullable|string|max:255',
            'recursos_naturais' => 'nullable|string',
            'locais_importantes' => 'nullable|string',

            'racas_especies' => 'nullable|string',
            'sociedade' => 'nullable|string',
            'crencas_religiao' => 'nullable|string',
            'linguas_costumes' => 'nullable|string',

            'eventos_importantes' => 'nullable|string',
            'conflitos_atuais' => 'nullable|string',
            'lideres_personagens' => 'nullable|string',
            'aliancas_inimizades' => 'nullable|string',

            'nivel_tecnologico' => 'nullable|string|max:255',
            'presenca_magia' => 'nullable|string|max:255',
            'instituicoes_magicas_cientificas' => 'nullable|string',

            'inimigos_comuns' => 'nullable|string',
            'perigos_naturais' => 'nullable|string',
            'conflitos_internos' => 'nullable|string',
            'misterios_segredos' => 'nullable|string',

            'locais_aventuras' => 'nullable|string',
            'npcs_importantes' => 'nullable|string',
            'recursos_jogadores' => 'nullable|string',
            'recompensas_tesouros' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('cenarios', 'public');
        }

        Cenario::create($data);

        return redirect()->route('cenarios.index')->with('success', 'Cenário criado com sucesso!');
    }

    // Exibe detalhes de um cenário
    public function show(Cenario $cenario)
    {
        return view('cenarios.show', compact('cenario'));
    }

    // Formulário de edição
    public function edit(Cenario $cenario)
    {
        return view('cenarios.edit', compact('cenario'));
    }

    // Atualiza o cenário
    public function update(Request $request, Cenario $cenario)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'ambientacao' => 'nullable|string|max:255',
            'periodo_temporal' => 'nullable|string|max:255',

            'descricao_fisica' => 'nullable|string',
            'clima' => 'nullable|string|max:255',
            'recursos_naturais' => 'nullable|string',
            'locais_importantes' => 'nullable|string',

            'racas_especies' => 'nullable|string',
            'sociedade' => 'nullable|string',
            'crencas_religiao' => 'nullable|string',
            'linguas_costumes' => 'nullable|string',

            'eventos_importantes' => 'nullable|string',
            'conflitos_atuais' => 'nullable|string',
            'lideres_personagens' => 'nullable|string',
            'aliancas_inimizades' => 'nullable|string',

            'nivel_tecnologico' => 'nullable|string|max:255',
            'presenca_magia' => 'nullable|string|max:255',
            'instituicoes_magicas_cientificas' => 'nullable|string',

            'inimigos_comuns' => 'nullable|string',
            'perigos_naturais' => 'nullable|string',
            'conflitos_internos' => 'nullable|string',
            'misterios_segredos' => 'nullable|string',

            'locais_aventuras' => 'nullable|string',
            'npcs_importantes' => 'nullable|string',
            'recursos_jogadores' => 'nullable|string',
            'recompensas_tesouros' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            // Exclui imagem antiga se houver
            if ($cenario->imagem) {
                Storage::disk('public')->delete($cenario->imagem);
            }

            $data['imagem'] = $request->file('imagem')->store('cenarios', 'public');
        }

        $cenario->update($data);

        return redirect()->route('cenarios.show', $cenario)->with('success', 'Cenário atualizado com sucesso!');
    }

    // Exclui o cenário
    public function destroy(Cenario $cenario)
    {
        // Exclui imagem do storage
        if ($cenario->imagem) {
            Storage::disk('public')->delete($cenario->imagem);
        }

        $cenario->delete();

        return redirect()->route('cenarios.index')->with('success', 'Cenário excluído com sucesso!');
    }
}
