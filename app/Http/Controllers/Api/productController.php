<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class productController extends Controller
{

    //ADMINISTRADOR

    // Método para obtener todos los productos
    public function index()
    {
        // Obtener todas los productos
        $products = Products::all();

        // Verificar si no se encontraron productos
        if ($products->isEmpty()) {
            return response()->json(['message' => 'No se encontró el producto'], 404);
        }

        // Preparar la respuesta
        $data =[
            'products' => $products,
            'status' => 200
    ];
            
    return response()->json($data, 200);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'NameProduct' => 'required',
            'Description' => 'required',
            'Price' => 'required| max:10',
            'Stock' => 'required',
            'IdCategory' => 'required',
            'Status' => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $products = Products::create([
           'NameProduct' => $request->NameProduct,
           'Description' => $request->Description,
           'Price' => $request->Price,
           'Stock' => $request->Stock,
           'IdCategory' => $request->IdCategory,
           'Status' => $request->Status
        ]);

        //return response()->json(['products' => $products , 'status' => 201], 201);

        if (!$products) {
            $data = [
                'message' => 'Error al crear el producto',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'products' => $products,
            'status' => 201
        ];

        return response()->json($data, 201);
    }


    public function destroy($id)
    {
        $product= Products::find($id);

        if (!$product) {
            $data = [
                'message' => 'Producto NO encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $product->delete();

        $data = [
            'message' => 'Producto eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $product = Products::find($id);

        if (!$product) {
            $data = [
                'message' => 'Producto NO encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

       $validator = Validator::make($request->all(), [
            'NameProduct' => 'required',
            'Description' => 'required',
            'Price' => 'required| max:10',
            'Stock' => 'required',
            'IdCategory' => 'required',
            'Status' => 'required'
       ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $product->NameProduct = $request->NameProduct;
        $product->Description = $request->Description;
        $product->Price = $request->Price;
        $product->Stock = $request->Stock;
        $product->IdCategory = $request->IdCategory;
        $product->Status = $request->Status;

        $product->save();

        $data = [
            'message' => 'Producto actualizado',
            'products' => $product,
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

    //CLIENTE

    // Método para obtener todos los productos
     public function indexcliente()
     {
         // Obtener todas los productos
         $products = Products::all();
 
         // Verificar si no se encontraron productos
         if ($products->isEmpty()) {
             return response()->json(['message' => 'No se encontró el producto'], 404);
         }
 
         // Preparar la respuesta
         $data =[
             'products' => $products,
             'status' => 200
     ];
    }

    public function show($id)
    {
        $product = Products::find($id);

        if (!$product) {
            $data = [
                'message' => 'Producto NO encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'products' => $product,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    
    // POST /checkout: Finalizar compra y generar factura
    public function checkout(Request $request)
    {
        // Implementar lógica para finalizar la compra y generar factura

        // Aquí se puede agregar la lógica para procesar el pago y generar la factura.

        return response()->json(['message' => 'Producto Finalizado en Orden', 'status' => 201], 201);
    }
}
