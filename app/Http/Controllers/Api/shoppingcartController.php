<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shoppingcart;

class shoppingcartController extends Controller
{
     // Método para obtener todos los carritos
     public function index()
     {
         // Obtener todos los carritos de compras
         $cart = shoppingCart::all();
 
         // Verificar si no se encontraron carritos
         if ($cart->isEmpty()) {
             return response()->json(['message' => 'No se encontró su carrito de compras'], 404);
         }
 
         // Preparar la respuesta
         $data =['shoppingcarts' => $cart,
             'status' => 200
     ];
             
     return response()->json($data, 200);
     }
 
     public function store(Request $request)
     {
 
         $validator = Validator::make($request->all(), [
             'id' => 'required',
             'user_id' => 'required',
             'product_id' => 'required',
             'quantity' => 'required|integer|min:1'
         ]);
 
         if ($validator->fails()) {
             $data = [
                 'message' => 'Error en la validación de los datos',
                 'errors' => $validator->errors(),
                 'status' => 400
             ];
             return response()->json($data, 400);
         }
 
         $cart = shoppingCart::create([
             'id' => $request->id,
             'user_id' => $request->user_id,
             'product_id' => $request->product_id,
             'quantity' => $request->quantity
         ]);
 
         return response()->json(['shoppingcart' => $cart, 'status' => 201], 201);
 
         if (!$cart) {
             $data = [
                 'message' => 'Error al crear el carrito',
                 'status' => 500
             ];
             return response()->json($data, 500);
         }
 
         $data = [
             'shoppingcart' => $cart,
             'status' => 201
         ];
 
         return response()->json($data, 201);
     }
 
     public function show($id)
     {
         $cart = ShoppingCart::find($id);
 
         if (!$cart) {
             $data = [
                 'message' => 'Carrito no encontrado',
                 'status' => 404
             ];
             return response()->json($data, 404);
         }
 
         $data = [
             'shoppingcart' => $cart,
             'status' => 200
         ];
 
         return response()->json($data, 200);
     }
 
     public function destroy($id)
     {
         $cart= shoppingcart::find($id);
 
         if (!$cart) {
             $data = [
                 'message' => 'Estudiante no encontrado',
                 'status' => 404
             ];
             return response()->json($data, 404);
         }
         
         $cart->delete();
 
         $data = [
             'message' => 'Estudiante eliminado',
             'status' => 200
         ];
 
         return response()->json($data, 200);
     }
 
     public function update(Request $request, $id)
     {
         $cart = shoppingcart::find($id);
 
         if (!$cart) {
             $data = [
                 'message' => 'Carrito no encontrado',
                 'status' => 404
             ];
             return response()->json($data, 404);
         }
 
         $validator = Validator::make($request->all(), [
             'id' => $request->id,
             'user_id' => $request->user_id,
             'product_id' => $request->product_id,
             'quantity' => $request->quantity
         ]);
 
         if ($validator->fails()) {
             $data = [
                 'message' => 'Error en la validación de los datos',
                 'errors' => $validator->errors(),
                 'status' => 400
             ];
             return response()->json($data, 400);
         }
 
         $cart->id = $request->id;
         $cart->user_id = $request->user_id;
         $cart->product_id = $request->product_id;
         $cart->quantity = $request->quantity;
 
         $cart->save();
 
         $data = [
             'message' => 'Carrito actualizado',
             'shoppingcart' => $cart,
             'status' => 200
         ];
 
         return response()->json($data, 200);
 
     }
 
     // public function updatePartial(Request $request, $id)
     // {
     //     $cart = shoppingcart::find($id);
 
     //     if (!$cart) {
     //         $data = [
     //             'message' => 'Carrito no encontrado',
     //             'status' => 404
     //         ];
     //         return response()->json($data, 404);
     //     }
 
     //     $validator = Validator::make($request->all(), [
     //         'id' => $request->id,
     //         'user_id' => $request->user_id,
     //         'product_id' => $request->product_id,
     //         'quantity' => $request->quantity
     //     ]);
 
     //     if ($validator->fails()) {
     //         $data = [
     //             'message' => 'Error en la validación de los datos',
     //             'errors' => $validator->errors(),
     //             'status' => 400
     //         ];
     //         return response()->json($data, 400);
     //     }
 
     //     if ($request->has('id')) {
     //         $cart->id = $request->id;
     //     }
 
     //     if ($request->has('user_id')) {
     //         $cart->user_id = $request->user_id;
     //     }
 
     //     if ($request->has('product_id')) {
     //         $cart->product_id = $request->product_id;
     //     }
 
     //     if ($request->has('quantity')) {
     //         $cart->quantity= $request->quantity;
     //     }
 
     //     $cart->save();
 
     //     $data = [
     //         'message' => 'carrito actualizado',
     //         'shoppingcart' => $cart,
     //         'status' => 200
     //     ];
 
     //     return response()->json($data, 200);
     // }
 
     
     // POST /checkout: Finalizar compra y generar factura
     public function checkout(Request $request)
     {
         // Implementar lógica para finalizar la compra y generar factura
 
         // Aquí se puede agregar la lógica para procesar el pago y generar la factura.
 
         return response()->json(['message' => 'Compra finalizada y factura generada', 'status' => 201], 201);
     }
}
