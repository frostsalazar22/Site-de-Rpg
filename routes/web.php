<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CriaturaController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\ExportSeederController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeederExecController;





Route::get('/', [HomeController::class, 'index'])->name('home');

// Recursos
Route::resource('criaturas', CriaturaController::class);
Route::resource('equipamentos', EquipamentoController::class);

// Rota para exportar Seeder de criaturas
Route::get('/exportar-seeder', [ExportSeederController::class, 'exportar'])->name('criaturas.exportarSeeder');
Route::get('/importar-seeder', [SeederExecController::class, 'importarSeeder'])->name('importar.seeder');
