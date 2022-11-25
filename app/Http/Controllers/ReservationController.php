<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationStoreRequest;
use App\Http\Requests\ReservationUpdateRequest;
use App\Http\Resources\ReservationCollection;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ReservationCollection
     */
    public function index(Request $request)
    {
        $reservations = Reservation::all();

        return new ReservationCollection($reservations);
    }

    /**
     * @param \App\Http\Requests\ReservationStoreRequest $request
     * @return \App\Http\Resources\ReservationResource
     */
    public function store(ReservationStoreRequest $request)
    {
        $reservation = Reservation::create($request->validated());

        return new ReservationResource($reservation);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reservation $reservation
     * @return \App\Http\Resources\ReservationResource
     */
    public function show(Request $request, Reservation $reservation)
    {
        return new ReservationResource($reservation);
    }

    /**
     * @param \App\Http\Requests\ReservationUpdateRequest $request
     * @param \App\Models\Reservation $reservation
     * @return \App\Http\Resources\ReservationResource
     */
    public function update(ReservationUpdateRequest $request, Reservation $reservation)
    {
        $reservation->update($request->validated());

        return new ReservationResource($reservation);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Reservation $reservation)
    {
        $reservation->delete();

        return response()->noContent();
    }
}
