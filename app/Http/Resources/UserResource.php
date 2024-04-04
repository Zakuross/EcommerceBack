<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'first_name'=>$this->resource->first_name,
            'last_name'=>$this->resource->last_name,
            'email'=>$this->resource->email,
            'password'=>$this->resource->password,
//            'address'=>$this->resource->address,
            'role'=>$this->resource->role,
        ];
    }
}