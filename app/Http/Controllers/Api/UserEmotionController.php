<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserEmotion;
use Illuminate\Http\Request;

class UserEmotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user_id)
    {
        $userEmotions = UserEmotion::where('user_id', $user_id)->get();
        return response()->json(['user_emotions' => $userEmotions], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'user_id' => 'required|integer',
    //         'emotion_id' => 'required|integer',
    //         'intensity' => 'required|in:alta,media,baja', // Valida la intensidad
    //         'journal_date' => 'required|date',
    //     ]);

    //     $userEmotion = UserEmotion::create($request->all());
    //     return response()->json(['user_emotion' => $userEmotion], 201);
    // }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'emotion_id' => 'required|integer',
            'intensity' => 'required|in:alta,media,baja', // Valida la intensidad
            'journal_date' => 'required|date',
        ]);
    
        $userEmotion = UserEmotion::create($request->all());
        return response()->json(['user_emotion' => $userEmotion], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'intensity' => 'required|in:alta,media,baja', // Valida la intensidad
        ]);

        $userEmotion = UserEmotion::findOrFail($id);
        $userEmotion->update(['intensity' => $request->input('intensity')]);
        return response()->json(['user_emotion' => $userEmotion], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $userEmotion = UserEmotion::findOrFail($id);
        $userEmotion->delete();
        return response()->json(['message' => 'User emotion deleted successfully'], 204);
    }
}
