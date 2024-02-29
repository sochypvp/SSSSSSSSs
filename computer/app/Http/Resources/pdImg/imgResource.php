<?php

namespace App\Http\Resources\pdImg;

use Illuminate\Http\Resources\Json\JsonResource;

class imgResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'barcode' => $this->barcode,
            'productName' => $this->productName,
            'mainImage' => $this->getAllProduct
        ];
    }
}
