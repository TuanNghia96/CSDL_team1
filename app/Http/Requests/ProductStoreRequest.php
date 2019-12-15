<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required',
            'image_font' => 'image|' . (($this->method() == 'POST') ? 'required' : 'nullable'),
            'image_back' => 'image|' . (($this->method() == 'POST') ? 'required' : 'nullable'),
            'image_up' => 'image|' . (($this->method() == 'POST') ? 'required' : 'nullable'),
            'sex' => 'in:0, 1',
            'price' => 'min:10000|numeric|required',
            'category_id' => 'in:' . Category::pluck('id')->implode(','),
            'size' => 'max:10|min:0',
            'status' => 'in:0, 1'
        ];
    }
}
