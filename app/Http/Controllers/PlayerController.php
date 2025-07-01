<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    // Listar todos os players
    public function index()
    {
        $players = Player::paginate(10); // paginar de 10 em 10
        return view('players.index', compact('players'));
    }

    // Form para criar novo Player
    public function create()
    {
        return view('players.create');
    }

    // Salvar novo Player
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'raca' => 'nullable|string|max:255',
            'classe' => 'nullable|string|max:255',
            'alinhamento' => 'nullable|string|max:255',
            'idade' => 'nullable|integer',
            'genero' => 'nullable|string|max:255',
            'altura' => 'nullable|string|max:255',
            'peso' => 'nullable|string|max:255',
            'aparencia' => 'nullable|string',
            'forca' => 'nullable|integer',
            'destreza' => 'nullable|integer',
            'constituicao' => 'nullable|integer',
            'inteligencia' => 'nullable|integer',
            'sabedoria' => 'nullable|integer',
            'carisma' => 'nullable|integer',
            'pontos_vida_max' => 'nullable|integer',
            'pontos_vida_atual' => 'nullable|integer',
            'classe_armadura' => 'nullable|integer',
            'iniciativa' => 'nullable|integer',
            'velocidade' => 'nullable|string|max:255',
            'habilidades_passivas' => 'nullable|string',
            'habilidades_ativas' => 'nullable|string',
            'magias_conhecidas' => 'nullable|string',
            'slots_magia' => 'nullable|string',
            'magias_preparadas' => 'nullable|string',
            'talentos_proficiências' => 'nullable|string',
            'equipamentos_basicos' => 'nullable|string',
            'itens_utilizaveis' => 'nullable|string',
            'recursos' => 'nullable|string',
            'motivacoes' => 'nullable|string',
            'medos_fraquezas' => 'nullable|string',
            'traços_personalidade' => 'nullable|string',
            'ideais' => 'nullable|string',
            'vinculos' => 'nullable|string',
            'defeitos' => 'nullable|string',
            'background' => 'nullable|string',
            'eventos_marcantes' => 'nullable|string',
            'conexoes' => 'nullable|string',
            'segredos' => 'nullable|string',
            'ataques_magias' => 'nullable|string',
            'resistencias' => 'nullable|string',
            'fraquezas' => 'nullable|string',
            'testes_resistencia' => 'nullable|string',
            'frases_efeito' => 'nullable|string',
            'imagem' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('players', 'public');
        }

        Player::create($data);

        return redirect()->route('players.index')->with('success', 'Player criado com sucesso!');
    }

    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }


    // Form para editar Player
    public function edit(Player $player)
    {
        return view('players.edit', compact('player'));
    }

    // Atualizar Player
    public function update(Request $request, Player $player)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'raca' => 'nullable|string|max:255',
            'classe' => 'nullable|string|max:255',
            'alinhamento' => 'nullable|string|max:255',
            'idade' => 'nullable|integer',
            'genero' => 'nullable|string|max:255',
            'altura' => 'nullable|string|max:255',
            'peso' => 'nullable|string|max:255',
            'aparencia' => 'nullable|string',
            'forca' => 'nullable|integer',
            'destreza' => 'nullable|integer',
            'constituicao' => 'nullable|integer',
            'inteligencia' => 'nullable|integer',
            'sabedoria' => 'nullable|integer',
            'carisma' => 'nullable|integer',
            'pontos_vida_max' => 'nullable|integer',
            'pontos_vida_atual' => 'nullable|integer',
            'classe_armadura' => 'nullable|integer',
            'iniciativa' => 'nullable|integer',
            'velocidade' => 'nullable|string|max:255',
            'habilidades_passivas' => 'nullable|string',
            'habilidades_ativas' => 'nullable|string',
            'magias_conhecidas' => 'nullable|string',
            'slots_magia' => 'nullable|string',
            'magias_preparadas' => 'nullable|string',
            'talentos_proficiências' => 'nullable|string',
            'equipamentos_basicos' => 'nullable|string',
            'itens_utilizaveis' => 'nullable|string',
            'recursos' => 'nullable|string',
            'motivacoes' => 'nullable|string',
            'medos_fraquezas' => 'nullable|string',
            'traços_personalidade' => 'nullable|string',
            'ideais' => 'nullable|string',
            'vinculos' => 'nullable|string',
            'defeitos' => 'nullable|string',
            'background' => 'nullable|string',
            'eventos_marcantes' => 'nullable|string',
            'conexoes' => 'nullable|string',
            'segredos' => 'nullable|string',
            'ataques_magias' => 'nullable|string',
            'resistencias' => 'nullable|string',
            'fraquezas' => 'nullable|string',
            'testes_resistencia' => 'nullable|string',
            'frases_efeito' => 'nullable|string',
            'imagem' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            if ($player->imagem) {
                Storage::disk('public')->delete($player->imagem);
            }
            $data['imagem'] = $request->file('imagem')->store('players', 'public');
        }

        $player->update($data);

        return redirect()->route('players.show', $player)->with('success', 'Player atualizado com sucesso!');
    }

    // Deletar Player
    public function destroy(Player $player)
    {
        if ($player->imagem) {
            Storage::disk('public')->delete($player->imagem);
        }

        $player->delete();

        return redirect()->route('players.index')->with('success', 'Player excluído com sucesso!');
    }
}
