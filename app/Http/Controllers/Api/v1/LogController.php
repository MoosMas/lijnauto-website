<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLogRequest;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logs = Log::all();
        return response()->json($logs, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLogRequest $request)
    {
        $log = Log::create($request->validated());

        return response()->json(['success' => true, 'message' => 'Log succesvol toegevoegd'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $log = Log::findOrFail($id)->load('car');

        return response()->json($log, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
