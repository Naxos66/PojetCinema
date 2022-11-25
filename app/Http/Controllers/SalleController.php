<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalleStoreRequest;
use App\Http\Requests\SalleUpdateRequest;
use App\Http\Resources\SalleCollection;
use App\Http\Resources\SalleResource;
use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\SalleCollection
     */
    public function index(Request $request)
    {
        $salles = Salle::all();

        return new SalleCollection($salles);
    }

    /**
     * @param \App\Http\Requests\SalleStoreRequest $request
     * @return \App\Http\Resources\SalleResource
     */
    public function store(SalleStoreRequest $request)
    {
        $salle = Salle::create($request->validated());

        return new SalleResource($salle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @return \App\Http\Resources\SalleResource
     */
    public function show(Request $request, Salle $salle)
    {
        return new SalleResource($salle);
    }

    /**
     * @param \App\Http\Requests\SalleUpdateRequest $request
     * @param \App\Models\Salle $salle
     * @return \App\Http\Resources\SalleResource
     */
    public function update(SalleUpdateRequest $request, Salle $salle)
    {
        $salle->update($request->validated());

        return new SalleResource($salle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Salle $salle)
    {
        $salle->delete();

        return response()->noContent();
    }
}
