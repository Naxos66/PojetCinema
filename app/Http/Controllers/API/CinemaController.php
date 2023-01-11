<?php

namespace App\Http\Controllers\API;

use App\Models\Cinema;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CinemaResource;
use App\Http\Resources\CinemaCollection;
use App\Http\Requests\CinemaUpdateRequest;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): CinemaCollection
    {
        $queryItems = [];
        if (count($queryItems) == 0) {
            return new CinemaCollection(Cinema::paginate());
        } else {
            return new CinemaCollection(Cinema::where($queryItems)->paginate());
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
        $cinema = Cinema::create($request->validated());
        return new CinemaResource($cinema);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cinema $cinema): CinemaResource
    {
        return new CinemaResource($cinema);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CinemaUpdateRequest $request, Cinema $cinema): JsonResponse|CinemaResource
    {
        $cinema->update($request->validated());
        return new CinemaResource($cinema);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cinema $cinema): Response|JsonResponse
    {
        $cinema->delete();
        return response()->noContent();
    }
}
