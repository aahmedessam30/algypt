<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'number'     => $this->number,
            'type'       => $this->type,
            'is_primary' => $this->is_primary,
            'is_active'  => $this->is_active
        ];
    }
}
