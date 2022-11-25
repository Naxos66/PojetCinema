<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeanceStoreRequest;
use App\Http\Requests\SeanceUpdateRequest;
use App\Http\Resources\SeanceCollection;
use App\Http\Resources\SeanceResource;
use App\Models\Seance;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\SeanceCollection
     */
    public function index(Request $request)
    {
        $seances = Seance::all();

        return new SeanceCollection($seances);
    }

    /**
     * @param \App\Http\Requests\SeanceStoreRequest $request
     * @return \App\Http\Resources\SeanceResource
     */
    public function store(SeanceStoreRequest $request)
    {
        $seance = Seance::create($request->validated());

        return new SeanceResource($seance);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Seance $seance
     * @return \App\Http\Resources\SeanceResource
     */
    public function show(Request $request, Seance $seance)
    {
        return new SeanceResource($seance);
    }

    /**
     * @param \App\Http\Requests\SeanceUpdateRequest $request
     * @param \App\Models\Seance $seance
     * @return \App\Http\Resources\SeanceResource
     */
    public function update(SeanceUpdateRequest $request, Seance $seance)
    {
        $seance->update($request->validated());

        return new SeanceResource($seance);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Seance $seance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Seance $seance)
    {
        $seance->delete();

        return response()->noContent();
    }
}
