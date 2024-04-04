<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $order_sum = null;
        foreach ($this->resource->products as $product) {
            $order_sum += $product->price * $product->pivot->quantity;
        }
        return [

            'id' => $this->resource->id,
            'products'=>ProductResource::collection($this->resource->products),
            'deliver'=>$this->resource->deliver,
            'order_sum'=> $order_sum,
            'service_id'=>$this->resource->service_id,
//            'user'=>new UserResource($this->resource->user),
            'user_id'=>$this->resource->user_id,
        ];
    }
}
