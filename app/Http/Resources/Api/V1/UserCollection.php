<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
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
            'data'=>UserResource::collection($this->collection),
            'meta'=>[
                'count'=>count($this->collection),
                'total_page'=>$this->lastPage(),
                'current_page'=>$this->currentPage()
            ]
        ];
    }
}
