<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
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
            'name' => $this->name,
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
            'date_order' => $this->date_order,
            'email' => $this->email,
            'phone' => $this->phone,
            'seance_id' => $this->seance_id,
            'user_id' => $this->user_id,
        ];
    }
}
