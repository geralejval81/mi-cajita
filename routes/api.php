<?php

use App\Http\Controllers\Api\SocioController;
use Illuminate\Support\Facades\Route;

Route::get('socios/buscar', [SocioController::class, 'buscarPorCedula']);

Route::apiResource('socios', SocioController::class)
    ->except(['destroy']);

