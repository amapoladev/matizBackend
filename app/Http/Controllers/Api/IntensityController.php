<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Intensity;
use Illuminate\Http\Request;
use FFI\Exception;

class IntensityController extends Controller
{
    public function index()
    {
        try {
            $intensities = Intensity::all();
            return response()->json(['intensities' => $intensities]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $intensity = Intensity::findOrFail($id);
            return response()->json(['intensity' => $intensity]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Intensity not found'], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'intensity' => 'required|string',
            ]);

            $intensity = Intensity::create($request->only('intensity'));
            return response()->json(['intensity' => $intensity], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'intensity' => 'required|string',
            ]);

            $intensity = Intensity::findOrFail($id);
            $intensity->update($request->only('intensity'));
            return response()->json(['intensity' => $intensity]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $intensity = Intensity::findOrFail($id);
            $intensity->delete();
            return response()->json(['message' => 'Intensity deleted successfully'], 204);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
