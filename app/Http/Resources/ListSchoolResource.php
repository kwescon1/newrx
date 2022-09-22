<?php

namespace App\Http\Resources;

use App\Http\Resources\HostelResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ListSchoolResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'hostels' => HostelResource::collection($this->hostels),
        ];
    }
}
