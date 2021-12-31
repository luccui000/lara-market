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
            'name' => [
                'required',
                'string',
                'min:10',
                'max:100'
            ],
            'description' => [
                'nullable',
                'max:255'
            ],
            'thumbnail' => [
                'nullable',
                'string'
            ],
            'category_id' => Rule::in(
                array_map(
                    fn($category) => $category['id'],
                    Category::select('id')->get()->toArray()
                )
            ),
        ];
    }
}
