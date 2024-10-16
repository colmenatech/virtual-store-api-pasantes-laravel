<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;

class productController extends Controller
{
    public function index()
    {
        $product = Products::all();

        /*if ($product->isEmpty()){
           $data = ['message' => 'Productos no encontrado',
           'status' => 200
        ];
           return  response()-> json($data,404);
        } */

        $data = ['product' =>  $product,
         'status' => 200];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required| max:10',
                'stock' => 'required',
                'category_id' => 'required',
                'status' => 'required'
            ]);

            if ($validator-> fails() )
            {
                $data = [ 
                    'message' =>  'Error en la validación de los datos',
                    'errors' =>  $validator->errors(),
                    'status' => 400
                ];
                return response()->json($data,400);
            }

            $product = Products::create([
                'name' =>  $request -> name,
                'description' => $request -> description,
                'price' => $request -> price,
                'stock' => $request -> stock,
                'category_id' => $request -> category_id,
                'status' => $request -> status
            ]);

            if (!$product) {
                $data = [
                   'message' =>  'Error al crear el producto',
                   'status' => 500
                ];
                return  response()->json($data,500);
            }

            $data = [
                'product' => $product,
                'status' => 201
            ];
            return  response()->json($data,201); 
    }

}
