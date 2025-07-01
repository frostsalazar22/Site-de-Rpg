<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class SeederExecController extends Controller
{
    public function importarSeeder()
    {
        // Executa o seeder unificado
        Artisan::call('db:seed', ['--class' => 'GuiaRPGSeeder']);

        return redirect()->back()->with('success', 'Seeder importado com sucesso!');
    }
}
