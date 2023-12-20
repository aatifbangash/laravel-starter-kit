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
            'id' => $this->whenNotNull($this->id),
            'name' => $this->whenNotNull($this->name),
            'email' => $this->whenNotNull($this->email),
            'created_at' => $this->whenNotNull($this->created_at->format('Y-m-d H:i:s')),
            'updated_at' => $this->whenNotNull($this->updated_at->format('Y-m-d H:i:s')),
            'profile' => $this->whenLoaded('profile', fn() => ProfileResource::make($this->profile))
        ];
    }
}
