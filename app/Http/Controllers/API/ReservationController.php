<?php

namespace App\Http\Controllers\API;

use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ReservationResource;
use App\Http\Resources\ReservationCollection;
use App\Http\Requests\ReservationUpdateRequest;
use LDAP\Result;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): ReservationCollection
    {
        $queryItems = [];
        if (count($queryItems) == 0) {
            return new ReservationCollection(Reservation::paginate());
        } else {
            return new ReservationCollection(Reservation::where($queryItems)->paginate());
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
        $reservation = Reservation::create($request->validated());
        return new ReservationResource($reservation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation): ReservationResource
    {
        return new ReservationResource($reservation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationUpdateRequest $request, Reservation $reservation): JsonResponse|ReservationResource
    {
        $reservation->update($request->validated());
        return new ReservationResource($reservation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Reservation $reservation): Response|JsonResponse
    {
        $reservation->delete();
        return response()->noContent();
    }
}
