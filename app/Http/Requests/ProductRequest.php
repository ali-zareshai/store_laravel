<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'cat_id'=>['required'],
            'count'=>['required'],
            'name'=>['required','string'],
            'description'=>['required'],
            'price'=>['required'],
            'products_label'=>['required'],
        ];
    }
}
