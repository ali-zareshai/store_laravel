<?php

namespace App\Http\Requests;

use App\Rules\CardNumberRole;
use App\Rules\MobileRole;
use App\Rules\NationalCodeRole;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'national_code'=> 'unique:users,national_code',new NationalCodeRole(),
            'password'=>['required','string','min:8'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'state'=>'numeric',
            'city'=>'numeric',
            'mobile'=>['required','unique:users,mobile',new MobileRole()],
            'bank_number'=>['unique:users,bank_number',new CardNumberRole()],
            'phone'=>['numeric']
        ];
    }
}
