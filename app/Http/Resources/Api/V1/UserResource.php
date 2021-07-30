<?php

namespace App\Http\Resources\Api\V1;

use App\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'fname' => $this->fname,
            'lname' => $this->lname,
            'no_code' => $this->no_code ? 'ایرانی' : 'غیر ایرانی',
            'national_code' => $this->national_code,
            'mobile' => $this->mobile,
            'phone' => $this->phone,
            'birthday' => $this->birthday,
            'gender' => $this->gender ? 'زن' : 'مرد',
            'state' => $this->state,
            'city' => $this->city,
            'bank_number' => $this->bank_number,
            'username' => $this->username,
            'email' => $this->email,
            'roles'=> User::find($this->id)->roles() ,
            'created_at' => (String)Verta::instance($this->created_at)
        ];
    }
}
