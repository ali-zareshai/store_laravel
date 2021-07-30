<?php

namespace App\Http\Resources\Api\V1;

use App\Category;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'=>ProductResource::collection($this->collection)
        ];
    }
}
