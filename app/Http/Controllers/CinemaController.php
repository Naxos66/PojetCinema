<?php

namespace App\Http\Controllers;

use App\Http\Requests\CinemaStoreRequest;
use App\Http\Requests\CinemaUpdateRequest;
use App\Http\Resources\CinemaCollection;
use App\Http\Resources\CinemaResource;
use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\CinemaCollection
     */
    public function index(Request $request)
    {
        $cinemas = Cinema::all();

        return new CinemaCollection($cinemas);
    }

    /**
     * @param \App\Http\Requests\CinemaStoreRequest $request
     * @return \App\Http\Resources\CinemaResource
     */
    public function store(CinemaStoreRequest $request)
    {
        $cinema = Cinema::create($request->validated());

        return new CinemaResource($cinema);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cinema $cinema
     * @return \App\Http\Resources\CinemaResource
     */
    public function show(Request $request, Cinema $cinema)
    {
        return new CinemaResource($cinema);
    }

    /**
     * @param \App\Http\Requests\CinemaUpdateRequest $request
     * @param \App\Models\Cinema $cinema
     * @return \App\Http\Resources\CinemaResource
     */
    public function update(CinemaUpdateRequest $request, Cinema $cinema)
    {
        $cinema->update($request->validated());

        return new CinemaResource($cinema);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cinema $cinema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cinema $cinema)
    {
        $cinema->delete();

        return response()->noContent();
    }
}
