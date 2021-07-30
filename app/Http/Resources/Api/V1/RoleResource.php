<?php

namespace App\Http\Resources\Api\V1;

use App\Role;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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
            'users'=>Role::find($this->id)->user,
            'label'=>$this->label,
            'name'=>$this->name
        ];
    }
}
