<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            /** ID of the car */
            'id' => $this->id,
            /** Name of the car */
            'name' => $this->name,
            /** Description of the car */
            'description' => $this->description,
            /** Logs associated with the car */
            'logs' => new LogCollection($this->whenLoaded('logs')),
            /** Timestamp the car was created */
            'created_at' => $this->created_at,
            /** Timestamp the car was last updated */
            'updated_at' => $this->updated_at,
        ];
    }
}
