<?php

namespace App\Http\Controllers;

use App\Http\Requests\FriandiseStoreRequest;
use App\Http\Requests\FriandiseUpdateRequest;
use App\Http\Resources\FriandiseCollection;
use App\Http\Resources\FriandiseResource;
use App\Models\Friandise;
use Illuminate\Http\Request;

class FriandiseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\FriandiseCollection
     */
    public function index(Request $request)
    {
        $friandises = Friandise::all();

        return new FriandiseCollection($friandises);
    }

    /**
     * @param \App\Http\Requests\FriandiseStoreRequest $request
     * @return \App\Http\Resources\FriandiseResource
     */
    public function store(FriandiseStoreRequest $request)
    {
        $friandise = Friandise::create($request->validated());

        return new FriandiseResource($friandise);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Friandise $friandise
     * @return \App\Http\Resources\FriandiseResource
     */
    public function show(Request $request, Friandise $friandise)
    {
        return new FriandiseResource($friandise);
    }

    /**
     * @param \App\Http\Requests\FriandiseUpdateRequest $request
     * @param \App\Models\Friandise $friandise
     * @return \App\Http\Resources\FriandiseResource
     */
    public function update(FriandiseUpdateRequest $request, Friandise $friandise)
    {
        $friandise->update($request->validated());

        return new FriandiseResource($friandise);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Friandise $friandise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Friandise $friandise)
    {
        $friandise->delete();

        return response()->noContent();
    }
}
