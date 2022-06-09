<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public $preserveKeys = true;

    public function toArray($request): array
    {
        return [
            'id'       => $this->id,
            'title'    => $this->name,
            'image'    => $this->attachment()->first()?->url() ?: '/assets/img/noImage.jpg',
            'compound' => $this->composition,
            'active'   => false,
            'products' => count($this->products) ? ProductResource::collection($this->products->keyBy('id')) : []
        ];
    }
}
