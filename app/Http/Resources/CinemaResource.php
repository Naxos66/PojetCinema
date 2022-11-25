<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CinemaResource extends JsonResource
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
            'address' => $this->address,
            'city' => $this->city,
            'zipcode' => $this->zipcode,
            'phone' => $this->phone,
            'email' => $this->email,
            'salles' => SalleCollection::make($this->whenLoaded('salles')),
            'friandises' => FriandiseCollection::make($this->whenLoaded('friandises')),
        ];
    }
}
