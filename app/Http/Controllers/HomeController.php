<?php

namespace App\Http\Controllers;

use App\Models\Criatura;
use App\Models\Equipamento;
use App\Models\Player;

class HomeController extends Controller
{
    public function index()
    {
        $criaturas = Criatura::all();
        $equipamentos = Equipamento::all();
        $players = Player::all();

        return view('home', compact('criaturas', 'equipamentos', 'players'));
    }
}
