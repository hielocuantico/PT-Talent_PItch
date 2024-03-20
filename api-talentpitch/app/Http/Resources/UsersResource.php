<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property \App\Models\Users $resource
 */

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $dataUsers = [
            'id'            =>   $this->resource->id,
            'name'          =>   $this->resource->name,
            'email'         =>   $this->resource->email,
            'image_patch'   =>   $this->resource->image_patch,
        ];
        
        return $dataUsers;
    }
}
