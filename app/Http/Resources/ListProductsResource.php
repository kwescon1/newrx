<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListProductsResource extends JsonResource
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
            'name' => $this->product_name,
            'category' => new CategoryResource($this->category),
            'stock' => $this->stock_level == "instock"  ? "In Stock" : "Out of Stock",
            "image" => $this->image
        ];
    }
}
