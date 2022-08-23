<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListInventoryResource extends JsonResource
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
            "id" => $this->id,
            "product_name" => $this->product_name,
            "category" => $this->category->name,
            // "quantity" => $this->quantity,
            "image" => $this->image,
            "status" => $this->status,
            "amount" => $this->amount

        ];
    }
}
