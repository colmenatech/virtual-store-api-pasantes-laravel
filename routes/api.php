<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\productController;
use App\Http\Controllers\Api\shoppingcartController;
use App\Models\shoppingcart;

Route::get('/products', [productController::class, 'index']);

Route::get('/products/{id}', [productController::class, 'show']);

Route::post('/products', [productController::class, 'store']); // Agregar producto al carrito

Route::delete('/products/{id}', [productController::class, 'destroy']); // Eliminar producto del carrito

Route::put('/products/{id}', [productController::class, 'update']);

//Route::post('/products', [productController::class, 'checkout']); // Finalizar compra y generar factura

Route::post('/cart', [shoppingcartController::class, 'store']); // Agregar producto al carrito

Route::get('/cart', [shoppingcartController::class, 'index']);

Route::delete('/cart/{product_id}', [shoppingcartController::class, 'destroy']); // Eliminar producto del carrito

Route::post('/checkout', [shoppingcartController::class, 'checkout']); // Finalizar compra y generar factura