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
    public function index()
    {
        $cinemas = Cinema::paginate(10);
        return view('cinemas/index',compact('cinemas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cinemas/create');
    }
    /**
     * @param \App\Http\Requests\CinemaStoreRequest $request
     * @return \App\Http\Resources\CinemaResource
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cinema::create($request->all());
        return redirect()->route('cinemas.index')->with('info', 'Le cinéma a bien été créé');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cinema $cinemas
     * @return \App\Http\Resources\CinemaResource
     */
    public function show(Cinema $cinemas)
    {
        return view('show', compact('cinemas'));
    }

    /**
     * @param \App\Http\Requests\CinemaUpdateRequest $request
     * @param \App\Models\Cinema $cinema
     * @return \App\Http\Resources\CinemaResource
     */
    public function update(CinemaUpdateRequest $request, Cinema $cinema)
    {
        $cinema->update($request->all());
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
