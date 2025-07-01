<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CriaturaController;
use App\Http\Controllers\ExportSeederController;


Route::get('/', function () {
    return view('home');
});

Route::resource('criaturas', CriaturaController::class);
Route::resource('criaturas', 'App\Http\Controllers\CriaturaController');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('/exportar-seeder', [ExportSeederController::class, 'exportar'])->name('criaturas.exportarSeeder');
