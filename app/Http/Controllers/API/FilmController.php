<?php

namespace App\Http\Controllers\API;

use App\Models\Film;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\FilmResource;
use App\Http\Resources\FilmCollection;
use App\Http\Requests\FilmUpdateRequest;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): FilmCollection
    {
        $queryItems = [];
        if (count($queryItems) == 0) {
            return new FilmCollection(Film::paginate());
        } else {
            return new FilmCollection(Film::where($queryItems)->paginate());
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
        $film = Film::create($request->validated());
        return new FilmResource($film);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film): FilmResource
    {
        return new FilmResource($film);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilmUpdateRequest $request, Film $film): JsonResponse|FilmResource
    {
        $film->update($request->validated());
        return new FilmResource($film);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Film $film): Response|JsonResponse
    {
        $film->delete();
        return response()->noContent();
    }
}
