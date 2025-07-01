<?php

namespace App\Http\Controllers;
use App\Models\Criatura;
use App\Models\Equipamento;

class HomeController extends Controller
{
    public function index()
    {
        $criaturas = Criatura::all();
        $equipamentos = Equipamento::all();

        return view('home', compact('criaturas', 'equipamentos'));
    }
}