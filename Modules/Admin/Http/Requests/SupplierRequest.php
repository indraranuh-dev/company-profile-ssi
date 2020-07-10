<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|unique:suppliers,name,' . $this->name,
            'address' => 'required|min:3',
            'email' => 'required|email|unique:suppliers,email,' . $this->email,
            'phone' => 'required|numeric|min:4',
            'dealer_contact' => 'required|numeric|min:4',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
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