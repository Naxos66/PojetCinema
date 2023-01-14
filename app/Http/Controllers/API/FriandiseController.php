<?php

namespace App\Http\Controllers\API;

use App\Models\Friandise;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\FriandiseResource;
use App\Http\Resources\FriandiseCollection;
use App\Http\Requests\FriandiseUpdateRequest;

class FriandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): FriandiseCollection
    {
        $queryItems = [];
        if (count($queryItems) == 0) {
            return new FriandiseCollection(Friandise::paginate());
        } else {
            return new FriandiseCollection(Friandise::where($queryItems)->paginate());
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
        $friandise = Friandise::create($request->validated());
        return new FriandiseResource($friandise);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Friandise $friandise): FriandiseResource
    {
        return new FriandiseResource($friandise);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FriandiseUpdateRequest $request, Friandise $friandise): JsonResponse|FriandiseResource
    {
        $friandise->update($request->validated());
        return new FriandiseResource($friandise);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Friandise $friandise): Response|JsonResponse
    {
        $friandise->delete();
        return response()->noContent();
    }
}
