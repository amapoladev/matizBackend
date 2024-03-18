<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { {
            try {
                $users = User::with('emotions')->get();
                return response()->json(['status' => 200, 'data' => $users]);
            } catch (Exception $e) {
                return response()->json(['status' => 204, 'message' => $e->getMessage()], 204);
            }
        }

    }


    public function getEmotions($id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json(['emotions' => $user->emotions]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function assignEmotion(Request $request, $id)
    {
        $emotionId = $request->input('emotion_id');

        try {
            $user = User::findOrFail($id);
            $user->emotions()->attach($emotionId);
            return response()->json(['message' => 'Emotion assigned successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function removeEmotion(Request $request, $id)
    {
        $emotionId = $request->input('emotion_id');

        try {
            $user = User::findOrFail($id);
            $user->emotions()->detach($emotionId);
            return response()->json(['message' => 'Emotion removed successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validar los datos recibidos en la solicitud
            $request->validate([
                'name' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

            // Crear un nuevo usuario
            $user = new User;
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password); // Hash the password
            $user->save();

            // Retornar la respuesta JSON con el usuario creado y código 201 (creado)
            return response()->json($user, 201);
        } catch (\Exception $e) {
            // En caso de error, retornar una respuesta de error con el mensaje del error y código 500 (error interno del servidor)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // Buscar el usuario por su ID
            $user = User::with('emotions')->find($id);

            // Verificar si el usuario existe
            if (!$user) {
                // Si el usuario no se encuentra, retornar una respuesta de error con el código 404 (no encontrado)
                return response()->json(['error' => 'User not found'], Response::HTTP_NOT_FOUND);
            }

            // Si el usuario se encuentra, retornar una respuesta JSON con el usuario y código 200 (éxito)
            return response()->json($user, Response::HTTP_OK);
        } catch (\Exception $e) {
            // En caso de error, retornar una respuesta de error con el mensaje del error y código 500 (error interno del servidor)
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Buscar el usuario por su ID
            $user = User::find($id);

            // Verificar si el usuario existe
            if (!$user) {
                // Si el usuario no se encuentra, retornar una respuesta de error con el código 404 (no encontrado)
                return response()->json(['error' => 'User not found'], 404);
            }

            // Validar los datos recibidos en la solicitud
            $request->validate([
                'name' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'nullable|min:6',
            ]);

            // Actualizar los datos del usuario
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            if ($request->has('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            // Retornar la respuesta JSON con el usuario actualizado y código 200 (éxito)
            return response()->json($user, 200);
        } catch (\Exception $e) {
            // En caso de error, retornar una respuesta de error con el mensaje del error y código 500 (error interno del servidor)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Buscar el usuario por su ID
            $user = User::find($id);

            // Verificar si el usuario existe
            if (!$user) {
                // Si el usuario no se encuentra, retornar una respuesta de error con el código 404 (no encontrado)
                return response()->json(['error' => 'User not found'], 404);
            }

            // Eliminar el usuario
            $user->delete();

            // Retornar una respuesta JSON con un mensaje de éxito y código 204 (sin contenido)
            return response()->json(['message' => 'User deleted successfully'], 204);
        } catch (\Exception $e) {
            // En caso de error, retornar una respuesta de error con el mensaje del error y código 500 (error interno del servidor)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
