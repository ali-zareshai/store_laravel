<?php

namespace App\Http\Requests;

use App\Rules\CardNumberRole;
use App\Rules\MobileRole;
use App\Rules\NationalCodeRole;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fname'=>'String',
            'lname'=>'String',
            'no_code'=>'numeric',
            'gender'=>'numeric',
            'national_code'=> 'national_code',new NationalCodeRole(),
            'password'=>['string','min:8'],
            'username' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'state'=>'numeric',
            'city'=>'numeric',
            'mobile'=>['mobile',new MobileRole()],
            'bank_number'=>['bank_number',new CardNumberRole()],
        ];
    }
}
