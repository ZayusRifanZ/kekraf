<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email'=> 'required|email|unique:users', 
            'password' => 'required|min:5',
            'roles' => 'required|nullable|string|in:ADMIN,USER'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama pengguna harus diisi',
            'name.max' => 'Nama Pengguna tidak boleh lebih dari 50 karakter',
            'email.required' => 'Email pengguna harus diisi',
            'email.email' => 'Email yang diisi tidak sesuai alamat email',
            'email.unique' => 'Email yang diisi sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password miniman 5 karaker',
            'roles' => 'Role pengguna harus diisi',
        ]; 
    }
}
