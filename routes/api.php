<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\productController;
use App\Http\Controllers\Api\shoppingcartController;
use App\Models\shoppingcart;
use App\Http\Controllers\Api\usuariosController;

//Productos

//Administrador
Route::get('/products', [productController::class, 'index']); //muestra todos los productos

Route::get('/products/{id}', [productController::class, 'show']); //muestra un producto ne específico

Route::post('/products', [productController::class, 'store']); // Agregar producto al carrito

Route::delete('/products/{id}', [productController::class, 'destroy']); // Eliminar producto del carrito

Route::put('/products/{id}', [productController::class, 'update']); //actualiza el producto

//Cliente



//Carrito de compras
Route::post('/cart', [shoppingcartController::class, 'store']); // Agregar producto al carrito

Route::get('/cart', [shoppingcartController::class, 'index']);

Route::delete('/cart/{product_id}', [shoppingcartController::class, 'destroy']); // Eliminar producto del carrito

Route::post('/checkout', [shoppingcartController::class, 'checkout']); // Finalizar compra y generar factura


//Usuarios
Route::get('/Usuarios', [usuariosController::class, 'mostrar']);

Route::post('/Usuarios/{id}',[usuariosController::class,'buscar']);

Route::post('/Usuarios', [usuariosController::class, 'registrar']);

