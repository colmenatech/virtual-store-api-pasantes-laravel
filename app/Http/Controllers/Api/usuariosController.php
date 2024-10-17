<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class usuariosController extends Controller
{
   // Mostrar todos los usuarios
   public function mostrar()
   {
       // Obtener todos los usuarios
       $Usuarios = Usuarios::all(); 
       if ($Usuarios->isEmpty()) {
           return response()->json(['message' => 'No hay usuarios registrados'], 404);
       }

       $data = [
           'Usuarios' => $Usuarios,
           'status' => 200
       ];

       return response()->json($data, 200);
   }

   // Registrar un nuevo usuario
   public function registrar(Request $request)
   {
       // Validar los datos
       $validator = Validator::make($request->all(), [
           'id' => 'required|id|unique:usuarios,id',
           'name' => 'required',
           'email' => 'required|email|unique:usuarios,email',
           'password' => 'required|min:8', 
           'role' => 'required|in:Administrator,Client'
       ]);

       // Si la validación falla
       if ($validator->fails()) {
           $data = [
               'message' => 'Error en la validación de datos',
               'errors' => $validator->errors(),
               'status' => 400
           ];
           return response()->json($data, 400);
       }

       // Crear el usuario
       $Usuarios = Usuarios::create([
           'id' => $request->id,
           'name' => $request->name,
           'email' => $request->email,
           'password' => bcrypt($request->password), // Encriptar la contraseña
           'role' => $request->role
       ]);

       // Si ocurre un error al crear el usuario
       if (!$Usuarios) {
           $data = [
               'message' => 'Error al ingresar usuario',
               'status' => 500
           ];
           return response()->json($data, 500);
       }

       // Retornar éxito
       $data = [
           'Usuarios' => $Usuarios,
           'status' => 201
       ];
       return response()->json($data, 201);
   }

   // Buscar un usuario por login
   public function buscar($login)
   {
       // Usar where en lugar de find porque 'find' busca por el ID, no por login
       $Usuarios = Usuarios::where('login', $login)->first();

       if (!$Usuarios) {
           $data = [
               'message' => 'Usuario no encontrado',
               'status' => 404
           ];
           return response()->json($data, 404);
       }

       $data = [
           'Usuarios' => $Usuarios,
           'status' => 200
       ];

       return response()->json($data, 200);
   }
}
