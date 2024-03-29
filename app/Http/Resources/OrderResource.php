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
        return [
            'user_id'=>$this->resource->user_id,
            'product_id'=>$this->resource->product_id,
            'deliver'=>$this->resource->deliver,
            'service'=>new ServiceResource($this->resource->service),
            'user'=>new UserResource($this->resource->user),
        ];
    }
}
