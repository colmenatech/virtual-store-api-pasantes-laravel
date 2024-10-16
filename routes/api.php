<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\productController;

Route::get('/products',[productController::class, 'index']);

Route::get('/products/{id}',[productController::class, 'show']);

Route::post('/products',[productController::class, 'store']);

Route::put('/products/{id}', function(){
    return "Actualizando productos";
});

Route::delete('/products/{id}', function(){
    return "Eliminando productos";
});