<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\productController;
use App\Http\Controllers\Api\usuariosController;

//Productos

//Administrador

Route::get('/products', [productController::class, 'index']); //muestra todos los productos

Route::post('/products', [productController::class, 'store']); // Agregar o crea producto 

Route::delete('/products/{id}', [productController::class, 'destroy']); // Eliminar producto 

Route::put('/products/{id}', [productController::class, 'update']); //actualiza el producto

//Cliente

 Route::get('/products', [productController::class, 'index']); //muestra todos los productos

 Route::get('/products/{id}', [productController::class, 'show']); //muestra un producto ne específico o el detalle de este


 
//Usuarios
  Route::get('/Usuarios', [usuariosController::class, 'mostrar']);

 Route::post('/Usuarios/{id}',[usuariosController::class,'buscar']);

Route::post('/Usuarios', [usuariosController::class, 'registrar']);


