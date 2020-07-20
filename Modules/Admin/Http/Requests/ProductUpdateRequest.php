<?php

namespace Modules\Admin\Http\Requests;

use App\Utilities\Generator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|' . Rule::unique('products', 'name')
                ->ignore(Generator::crypt($this->id, 'decrypt')),
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'subCategory' => 'required',
            'series' => 'nullable',
            'supplier' => 'required',
            'inverter' => 'required',
            'type' => 'required',
            'tags' => 'required',
            'features' => 'required',
            'description' => 'required|min:10',
            'spesification' => 'nullable|min:10'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}