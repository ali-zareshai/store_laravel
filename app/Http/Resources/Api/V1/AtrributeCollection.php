<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AtrributeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         return  [
            'data'=>AtrributeResource::collection($this->collection),
              'meta'=>[
                  'count'=>count($this->collection),
              ]
          ];
    }
}
