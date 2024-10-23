<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class categoriesController extends Controller
{
    // MÉTODO PARA OBTENER TODAS LAS CATEGORIAS
   public function index()
   {
       // Obtener todas las categorías
       $categories = Categories::all();

       // Verificar si no se encontraron categorías
       if ($categories->isEmpty()) {
           return response()->json(['message' => 'No se encontraron categorías', 'status' => 404], 404);
       }

       // Preparar la respuesta
       $data = [
           'categories' => $categories,
           'status' => 200
       ];

       // Retornar la respuesta en formato JSON con código 200 OK
       return response()->json($data, 200);
   }



   // MÉTODO PARA CREAR UNA NUEVA CATEGORIA
   public function store(Request $request)
   {
       // Validar los datos del request
       $validator = Validator::make($request->all(), [
           'NameCategory' => 'required|string|max:50',
       ]);

       // Verificar si la validación falla
       if ($validator->fails()) {
           $data = [
               'message' => 'Error en la validación de los datos',
               'errors' => $validator->errors(),
               'status' => 400
           ];
           // Retornar respuesta de error en formato JSON con código 400 Bad Request
           return response()->json($data, 400);
       }

       // Crear la nueva categoría
       $category = Categories::create([
           'NameCategory' => $request->NameCategory,
       ]);

       // Verificar si la creación falla
       if (!$category) {
        $data = [
            'message' => 'Error al crear la categoría',
            'status' => 500
        ];
        // Retornar respuesta de error en formato JSON con código 500 Internal Server Error
        return response()->json($data, 500);
    }

    // Preparar la respuesta exitosa
    $data = [
        'category' => $category,
        'status' => 201
    ];

    // Retornar la respuesta en formato JSON con código 201 Created
    return response()->json($data, 201);
    }



     /* MÉTODO PARA OBTENER UNA CATEGORIA POR SU ID
     public function show($id)
     {
         // Buscar la categoría por ID
         $category = Category::find($id);

         // Verificar si la categoría no se encuentra
         if (!$category) {
             $data = [
                 'message' => 'Categoría no encontrada',
                 'status' => 404
             ];
             // Retornar respuesta de error en formato JSON con código 404 Not Found
             return response()->json($data, 404);
         }

         // Preparar la respuesta exitosa
         $data = [
             'category' => $category,
             'status' => 200
         ];

         // Retornar la respuesta en formato JSON con código 200 OK
         return response()->json($data, 200);

        }
        */




    // MÉTODO PARA ACTUALIZAR UNA CATEGORIA
    public function update(Request $request, $id)
    {
        // Buscar la categoría por ID
        $category = Categories::find($id);

        // Verificar si la categoría no se encuentra
        if (!$category) {
            $data = [
                'message' => 'Categoría no encontrada',
                'status' => 404
            ];
            // Retornar respuesta de error en formato JSON con código 404 Not Found
            return response()->json($data, 404);
        }

        // Validar los datos del request
        $validator = Validator::make($request->all(), [
            'NameCategory' => 'required|string|max:50',
        ]);

        // Verificar si la validación falla
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            // Retornar respuesta de error en formato JSON con código 400 Bad Request
            return response()->json($data, 400);
        }

        // Actualizar los datos de la categoría
        $category->NameCategory = $request->NameCategory;
        $category->save();

        // Preparar la respuesta exitosa
        $data = [
            'message' => 'Categoría actualizada',
            'category' => $category,
            'status' => 200
        ];

        // Retornar la respuesta en formato JSON con código 200 OK
        return response()->json($data, 200);
    }


     // MÉTODO PARA ELIMINAR UNA CATEGORIA
     public function destroy($id)
     {
         // Buscar la categoría por ID
         $category = Categories::find($id);

         // Verificar si la categoría no se encuentra
         if (!$category) {
             $data = [
                 'message' => 'Categoría no encontrada',
                 'status' => 404
             ];
             // Retornar respuesta de error en formato JSON con código 404 Not Found
             return response()->json($data, 404);
         }

         // Eliminar la categoría
         $category->delete();

         // Preparar la respuesta exitosa
         $data = [
             'message' => 'Categoría eliminada',
             'status' => 200
         ];

         // Retornar la respuesta en formato JSON con código 200 OK
         return response()->json($data, 200);
        }
}
