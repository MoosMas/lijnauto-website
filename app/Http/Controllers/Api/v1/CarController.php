<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Resources\CarCollection;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CarCollection(Car::paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $car = Car::create($request->validated());

        return response()->json(['success' => true, 'message' => 'Auto succesvol toegevoegd'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        $logs = $car->logs()->paginate(15);
        return new CarResource($car->setRelation('logs', $logs));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCarRequest $request, string $id)
    {
        $car = Car::findOrFail($id)->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Auto succesvol aangepast'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
