<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => 'required|string',
            'photo' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama kategori harus diisi',
            'photo.image' => 'Foto kategori harus berupa format gambar'
        ];
    }
}
