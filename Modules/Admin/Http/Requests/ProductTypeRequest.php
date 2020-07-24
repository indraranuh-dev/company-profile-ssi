<?php

namespace Modules\Admin\Http\Requests;

use App\Utilities\Generator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductTypeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|' . Rule::unique('product_types', 'name')
                ->ignore(Generator::crypt($this->id, 'decrypt')),
            'supplier' => 'required'
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