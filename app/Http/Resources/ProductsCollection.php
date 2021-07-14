<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($element){
                return [
                    'id' => $element->id,
                    'title' => $element->title,
                    'description' => $element->description,
                    'humanPrice' => "$".($element->price / 100),
                    'numberPrice' => $element->price,
                    'image' => $element->image_url
                ];
            }),
        ];
    }
}