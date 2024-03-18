<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserEmotion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserEmotionController extends Controller
{
    public function index()
    {
        try {
            $userEmotions = UserEmotion::with('user', 'emotion')->get();
            return response()->json(['userEmotions' => $userEmotions]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $userEmotion = UserEmotion::with('user', 'emotion')->find($id);
            return response()->json(['userEmotion' => $userEmotion]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
