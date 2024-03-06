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
        return parent::toArray([
            // 'id' => $this->id,
            // 'barcode' => $request->barcode,
            // 'productName' => $request->productName,
            // 'partNumber' => $request->partNumber,
            // 'specifications' => $request->specifications,
            // 'description' => $request->description,
            // 'price' => $request->price,
            // 'discount' => $request->discount,
            // 'warranty' => $request->warranty,
            // 'subCategoryId' => $request->subCategoryId,
            // 'brand' => $request->brand,
            'data' => parent::toArray($request),
            'images' =>  $this->productImg
        ]);
        // return ['products'=>$this,'mainImage' => $this->getAllProduct];
        //return parent::toArray($request);
    }
}
