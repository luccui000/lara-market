<?php

namespace App\Http\Requests\Api\Seller;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email' => [
                'required',
                'email:rfc,dns'
            ],
            'password' => [
                'required',
                'min:6',
                'max:100'
            ],
            'name' => [
                'required'
            ],
            'phone_number' => [
               'required',
               'max:11'
            ],
            'avatar' => [
                'nullable',
            ],
            'address' => [
                'required',
                'string',
                'max:100'
            ],
            'description' => [
                'string',
                'max:500'
            ]
        ];
    }
}
