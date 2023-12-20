<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->whenNotNull($this->id),
            "first_name" => $this->whenNotNull($this->first_name),
            "last_name" => $this->whenNotNull($this->last_name),
            "phone_number" => $this->whenNotNull($this->phone_number),
            "website" => $this->whenNotNull($this->website),
            "dob" => $this->whenNotNull($this->dob),
            "gender" => $this->whenNotNull($this->gender),
            "city" => $this->whenNotNull($this->city),
            "country" => $this->whenNotNull($this->country),
            "about_me" => $this->whenNotNull($this->about_me)
        ];
    }
}
