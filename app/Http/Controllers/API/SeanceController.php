<?php

namespace App\Http\Controllers\API;

use App\Models\Seance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\SeanceResource;
use App\Http\Resources\SeanceCollection;
use App\Http\Requests\SeanceUpdateRequest;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): SeanceCollection
    {
        $queryItems = [];
        if (count($queryItems) == 0) {
            return new SeanceCollection(Seance::paginate());
        } else {
            return new SeanceCollection(Seance::where($queryItems)->paginate());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seance = Seance::create($request->validated());
        return new SeanceResource($seance);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Seance $seance): SeanceResource
    {
        return new SeanceResource($seance);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeanceUpdateRequest $request, Seance $seance): JsonResponse|SeanceResource
    {
        $seance->update($request->validated());
        return new SeanceResource($seance);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Seance $seance): Response|JsonResponse
    {
        $seance->delete();
        return response()->noContent();
    }
}
