<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LogCollection extends ResourceCollection
{    
    /**
     * Transform the resource collection into an array.
     * @todo Zorgen dat de pagination info ook wordt meegegeven als logs ingeladen worden bij een auto
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
