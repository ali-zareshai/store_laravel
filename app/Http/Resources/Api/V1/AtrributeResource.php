<?php

namespace App\Http\Resources\Api\V1;

use App\Attribute;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class AtrributeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'label'=>$this->label,
            'value'=>$this->value,
            'product'=>DB::table('attribute_product')->where('attribute_id',$this->id)->get(),
        ];
    }
}
