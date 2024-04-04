<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->resource->id,
            'category_id'=>new CategoryResource($this->resource->user),
            'name'=>$this->resource->name,
            'price'=>$this->resource->price,
            'Description'=>$this->resource->Description,
            'quantity' => $this->whenPivotLoaded('order_product', function () {
                return $this->pivot->quantity;
            }),
            'sum_products' => $this->whenPivotLoaded('order_product', function () {
                return $this->pivot->quantity * $this->resource->price;
            })

        ];
    }
}
