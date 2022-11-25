<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalleResource extends JsonResource
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
            'number' => $this->number,
            'places' => $this->places,
            'cinema_id' => $this->cinema_id,
            'seances' => SeanceCollection::make($this->whenLoaded('seances')),
        ];
    }
}
