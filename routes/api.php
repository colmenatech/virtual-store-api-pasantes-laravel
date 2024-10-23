<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\productController;
use App\Http\Controllers\Api\shoppingcartController;
use App\Models\shoppingcart;
use App\Http\Controllers\Api\usuariosController;
use App\Http\Controllers\Api\categoriesController;


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


//CATEGORIAS
//Route::middleware(['role:admin'])->group(function () {
    // Rutas CRUD para categorías

    // Ruta para crear una nueva categoría
    Route::post('/categories', [CategoryController::class, 'store']);

    // Ruta para actualizar una categoría existente por su ID
    Route::put('/categories/{id}', [CategoryController::class, 'update']);

    // Ruta para eliminar una categoría por su ID
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

    // Ruta para listar todas las categorías
    Route::get('/categories', [CategoryController::class, 'index']);

    // Ruta para obtener los detalles de una categoría específica por su ID
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
//});
