<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMailRequest extends FormRequest
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nama lengkap tidak boleh kosong.',
            'name.min' => 'Nama minimal dari 3 karakter.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Email tidak valid.',
            'phone.required' => 'Telp. tidak boleh kosong.',
            'phone.numeric' => 'Telp. harus numerik.',
            'phone.min' => 'Telp. minimal 7 karakter.',
            'subject.required' => 'Judul pesan tidak boleh kosong.',
            'subject.min' => 'Judul minimal dari 5 karakter.',
            'message.required' => 'Pesan tidak boleh kosong.',
            'message.min' => 'Pesan minimal 10 karakter.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:9',
            'subject' => 'required|min:5',
            'message' => 'required|min:10'
        ];
    }
}