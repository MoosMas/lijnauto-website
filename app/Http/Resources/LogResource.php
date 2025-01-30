<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            /** ID of the log */
            'id' => $this->id,
            /** Car associated with the log */
            'car' => new CarResource($this->whenLoaded('car')),
            /** Log level */
            'level' => $this->level,
            /** Log message */
            'message' => $this->message,
            /** Timestamp the log was created */
            'timestamp' => $this->timestamp,
        ];
    }
}
