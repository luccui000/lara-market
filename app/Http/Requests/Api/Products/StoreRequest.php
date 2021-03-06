<?php

namespace App\Http\Requests\Api\Products;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:10',
                'max:200'
            ],
            'description' => [
                'nullable',
            ],
            'thumbnail' => [
                'nullable',
                'string'
            ],
            'category_id' => 'exists:categories,id',
        ];
    }
}
