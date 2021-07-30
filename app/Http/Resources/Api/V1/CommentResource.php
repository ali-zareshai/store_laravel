<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Hekmatinasser\Verta\Verta;


class CommentResource extends JsonResource
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
            'user_name'=>$this->user_name,
            'user_email'=>$this->user_email,
            'score'=>$this->score,
            'title'=>$this->title,
            'text'=>$this->text,
            'status'=>$this->status,
            'created_at'=>(String)Verta::instance($this->created_at)

        ];
    }
}
