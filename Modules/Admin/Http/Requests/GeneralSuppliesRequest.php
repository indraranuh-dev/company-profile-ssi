<?php

namespace Modules\Admin\Http\Requests;

use App\Utilities\Generator as G;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class GeneralSuppliesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|' . Rule::unique('general_supplies', 'name')
                ->ignore(G::crypt($this->_id, 'decrypt')),
            'supplier' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'nullable'
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