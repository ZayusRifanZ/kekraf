<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|max:50', 
            'email'=> 'required|email', 
            'roles' => 'nullable|string|in:ADMIN,USER'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama pengguna harus diisi',
            'name.max' => 'Nama Pengguna tidak boleh lebih dari 50 karakter',
            'email.required' => 'Email pengguna harus diisi',
            'email.email' => 'Email yang diisi tidak sesuai alamat email',
        ];
    }
}
