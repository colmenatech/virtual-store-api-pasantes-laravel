<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        // Obtener todos los productos
        $invoice = Invoice::all();

        // Verificar si no se encontraron productos
        if ($invoice->isEmpty()) {
            $errorResponse = [
                'status' => 'error',
                'code' => 404,
                'message' => 'No se encuentra historial de compras'
            ];
            return response()->json($errorResponse, 404);
        }

        // Preparar la respuesta
        $successResponse = [
            'products' => $invoice,
            'status' => 200
        ];
        
        return response()->json($successResponse, 200);
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            $data = [
                'message' => 'Producto NO encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'products' => $invoice,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
