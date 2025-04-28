<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\PruebaDosController;


Route::get('/', [PruebaController::class, 'mostrarPaginaDeInicio']);

Route::get('/autos', [PruebaDosController::class, 'index']);
