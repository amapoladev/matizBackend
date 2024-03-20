<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Emotion;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmotionController extends Controller
{
    public function index()
    {
        try {
            $emotions = Emotion::all();
            return response()->json(['emotions' => $emotions]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getUsers($id)
    {
        try {
            $emotion = Emotion::findOrFail($id);
            return response()->json(['users' => $emotion->users]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function show($id)
    {
        try {
            $emotion = Emotion::with('users')->find($id);
            return response()->json(['emotion' => $emotion]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Emotion not found'], 404);
        }
    }

    public function store(Request $request)
    {
        try {

        $validator = Validator::make($request->all(), [
            'emotion' => 'required|string',
            'image' => 'required|image',
        ]);
    
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    
        $file = $request->file('image');
        $cloudinaryUpload = Cloudinary::upload($file->getRealPath(), ['folder' => 'matizemotionary']);
    
                // Verificar la carga exitosa
                if (!$cloudinaryUpload->getSecurePath() || !$cloudinaryUpload->getPublicId()) {
                    throw new \Exception('No se ha podido almacenar correctamente la emoción');
                }
    
                // Crear la emoción con la URL de Cloudinary
                $newemotion = Emotion::create([
                    'emotion' => $request->input('emotion'),
                    'emotion_url' => $cloudinaryUpload->getSecurePath(),
                    'public_id' => $cloudinaryUpload->getPublicId(),
                ]);
    
                return response()->json($newemotion, 201);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'emotion' => 'required|string',
            'emotion_url' => 'nullable|url', // Asegúrate de validar el campo emotion_url
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        try {
            $emotion = Emotion::findOrFail($id);
            $emotion->update($request->only('emotion', 'emotion_url')); // Incluye emotion_url
            return response()->json(['emotion' => $emotion]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $emotion = Emotion::findOrFail($id);
            $emotion->delete();
            return response()->json(['message' => 'Emotion deleted successfully'], 204);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
