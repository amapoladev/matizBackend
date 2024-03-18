<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Journal;
use Illuminate\Support\Facades\Validator;


class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $journals = Journal::all();
            return response()->json(['journals' => $journals], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $journal = Journal::findOrFail($id);
            return response()->json(['journal' => $journal], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Journal not found'], 404);
        }
    }

    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'user_id' => 'required|integer',
    //         'feelingsnotes' => 'required|string',
    //         'date' => 'required|date',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()->first()], 400);
    //     }

    //     try {
    //         $journal = Journal::create($request->all());
    //         return response()->json(['journal' => $journal], 201);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'feelingsnotes' => 'required|string',
            'journal_date' => 'required|date|unique:journals,user_id,NULL,id,journal_date,' . $request->input('journal_date'),
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        try {
            $journal = Journal::create($request->all());
            return response()->json(['journal' => $journal], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'user_id' => 'required|integer',
    //         'feelingsnotes' => 'required|string',
    //         'date' => 'required|date',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()->first()], 400);
    //     }

    //     try {
    //         $journal = Journal::findOrFail($id);
    //         $journal->update($request->all());
    //         return response()->json(['journal' => $journal], 200);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'user_id' => 'required|integer',
        'feelingsnotes' => 'required|string',
        'journal_date' => 'required|date|unique:journals,user_id,' . $id . ',id',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()->first()], 400);
    }

    try {
        $journal = Journal::findOrFail($id);
        $journal->update($request->all());
        return response()->json(['journal' => $journal], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


    public function destroy($id)
    {
        try {
            $journal = Journal::findOrFail($id);
            $journal->delete();
            return response()->json(['message' => 'Journal deleted successfully'], 204);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}