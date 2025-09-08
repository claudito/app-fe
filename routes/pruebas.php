<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/pruebas/hola-mundo', function () {
    dd('Hola mundo desde rutas pruebas');
});


Route::get('/pruebas/operacion', function () {
    $numero1 = 10;
    $numero2 = 20;
    $suma = $numero1 + $numero2;
    dd("La suma de $numero1 y $numero2 es: $suma"); 
});