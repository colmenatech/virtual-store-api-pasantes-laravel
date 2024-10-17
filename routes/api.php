<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\productController;
use App\Models\shoppingcart;

Route::get("/products", [productController::class, "index"]);

Route::get("/products/{id}", [productController::class, "show"]);

Route::post("/products", [productController::class, "store"]); // Agregar producto al carrito

Route::delete("/products/{id}", [productController::class, "destroy"]); // Eliminar producto del carrito

Route::put("/products/{id}", [productController::class, "update"]);

//Route::post('/products', [productController::class, 'checkout']); // Finalizar compra y generar factura
