<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Institution extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'organization' => $this->organization,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'location' => $this->location,            
            'created_at' => $this->created_at
        ];
    }
}
