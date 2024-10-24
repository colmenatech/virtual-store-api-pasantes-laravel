<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\productController;
use App\Http\Controllers\Api\usuariosController;
use App\Http\Controllers\Api\categoriesController;
use App\Http\Controllers\Api\InvoiceController;

//Productos

//Administrador
// Grupo de rutas CRUD para Administrador
//Route::group(['prefix' => 'admin'], function () 
//{
  // Ruta para crear un nuevo producto (solo administrador)
  Route::post('/products', [productController::class, 'store']);
  
  // Ruta para actualizar un producto existente (solo administrador)
  Route::put('/products/{id}', [productController::class, 'update']);
  
  // Ruta para eliminar un producto existente (solo administrador)
  Route::delete('/products/{id}', [productController::class, 'destroy']);
  
  // Ruta para listar todos los productos (administrador)
  Route::get('/products', [productController::class, 'index']);
  
  // Ruta para obtener los detalles de un producto específico (administrador)
  Route::get('/products/{id}', [productController::class, 'show']);
//});

// Grupo de rutas CRUD para Cliente
//Route::group(['prefix' => 'client'], function ()
 //{
  // Ruta para listar todos los productos (cliente)
  Route::get('/products', [productController::class, 'index']);
  
  // Ruta para obtener los detalles de un producto específico (cliente)
  Route::get('/products/{id}', [productController::class, 'show']);
//});

// Grupo de rutas CRUD para Administrador
//Route::group(['prefix' => 'admin'], function () {
  // Ruta para crear una nueva categoría (solo administrador)
  Route::post('/categories', [categoriesController::class, 'store']);
  
  // Ruta para actualizar una categoría existente (solo administrador)
  Route::put('/categories/{id}', [categoriesController::class, 'update']);
  
  // Ruta para eliminar una categoría existente (solo administrador)
  Route::delete('/categories/{id}', [categoriesController::class, 'destroy']);
  
  // Ruta para listar todas las categorías (administrador)
  Route::get('/categories', [categoriesController::class, 'index']);
//});


//Factura 
  // Ruta para listar todas las facturas
  Route::get('/invoice', [InvoiceController::class, 'index']);

  // Ruta para obtener los detalles de una facura en específico
  Route::get('/invoice/{id}', [InvoiceController::class, 'show']);