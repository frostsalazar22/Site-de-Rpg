<?php

namespace App\Http\Controllers;
use App\Models\Criatura;

class HomeController extends Controller
{
    public function index()
    {
        $criaturas = Criatura::all();
        return view('home', compact('criaturas'));
    }
}
