<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmStoreRequest;
use App\Http\Requests\FilmUpdateRequest;
use App\Http\Resources\FilmCollection;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\FilmCollection
     */
    public function index(Request $request)
    {
        $films = Film::all();

        return new FilmCollection($films);
    }

    /**
     * @param \App\Http\Requests\FilmStoreRequest $request
     * @return \App\Http\Resources\FilmResource
     */
    public function store(FilmStoreRequest $request)
    {
        $film = Film::create($request->validated());

        return new FilmResource($film);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Film $film
     * @return \App\Http\Resources\FilmResource
     */
    public function show(Request $request, Film $film)
    {
        return new FilmResource($film);
    }

    /**
     * @param \App\Http\Requests\FilmUpdateRequest $request
     * @param \App\Models\Film $film
     * @return \App\Http\Resources\FilmResource
     */
    public function update(FilmUpdateRequest $request, Film $film)
    {
        $film->update($request->validated());

        return new FilmResource($film);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Film $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Film $film)
    {
        $film->delete();

        return response()->noContent();
    }
}
