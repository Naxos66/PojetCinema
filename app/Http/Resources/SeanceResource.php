<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'price' => $this->price,
            'salle_id' => $this->salle_id,
            'film_id' => $this->film_id,
            'reservations' => ReservationCollection::make($this->whenLoaded('reservations')),
        ];
    }
}
