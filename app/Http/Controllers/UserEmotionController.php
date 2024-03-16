<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserEmotion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserEmotionController extends Controller
{
    public function index()
    {
        try {
            $userEmotions = UserEmotion::all();
            return response()->json(['userEmotions' => $userEmotions]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($user_id, $emotion_id)
    {
        try {
            $userEmotion = UserEmotion::where(['user_id' => $user_id, 'emotion_id' => $emotion_id])->firstOrFail();
            return response()->json(['userEmotion' => $userEmotion]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'User emotion not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|exists:users,id',
                'emotion_id' => 'required|exists:emotions,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()], 400);
            }

            $userEmotion = UserEmotion::create($request->all());
            return response()->json(['userEmotion' => $userEmotion], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $user_id, $emotion_id)
    {
        try {
            $userEmotion = UserEmotion::where(['user_id' => $user_id, 'emotion_id' => $emotion_id])->firstOrFail();
            
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|exists:users,id',
                'emotion_id' => 'required|exists:emotions,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()], 400);
            }

            $userEmotion->update($request->all());
            return response()->json(['userEmotion' => $userEmotion]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'User emotion not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($user_id, $emotion_id)
    {
        try {
            $userEmotion = UserEmotion::where(['user_id' => $user_id, 'emotion_id' => $emotion_id])->firstOrFail();
            $userEmotion->delete();
            return response()->json(['message' => 'User emotion deleted successfully'], 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'User emotion not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
