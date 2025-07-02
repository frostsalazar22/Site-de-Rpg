<?php

namespace App\Http\Controllers;

use App\Models\Criatura;
use App\Models\Equipamento;
use App\Models\Player;
use App\Models\Magia;       // Singular, não Magias
use App\Models\Habilidade;  // Singular, confirmando com seu model (pode ser Habilidades)
use App\Models\Cenario;     // Singular, confirmando com seu model

class HomeController extends Controller
{
    public function index()
    {
        $criaturas = Criatura::all();
        $equipamentos = Equipamento::all();
        $players = Player::all();
        $magias = Magia::all();            // Singular
        $habilidades = Habilidade::all(); // Singular
        $cenarios = Cenario::all();        // Singular

        return view('home', compact('criaturas', 'equipamentos', 'players', 'magias', 'habilidades', 'cenarios'));
    }
}
