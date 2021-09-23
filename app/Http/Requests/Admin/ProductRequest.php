<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:255|min:5',
            'users_id' => 'required|exists:users,id', 
            'categories_id' => 'required|exists:categories,id',
            'price' => 'required|integer', 
            'description' => 'required', 
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama produk harus diisi ',
            'name.min' => 'Nama produk harus minimal 5 karakter ',
            'name.max' => 'Nama produk tidak boleh lebih dari 255 karakter. ',

            'users_id.required' => 'Pemilik produk harus diisi',

            'categories_id.required' => 'Kategori produk harus diisi',

            'price.required' => 'Harga produk harus diisi',
            'price.integer' => 'Harga produk harus berupa angka',

            'description.required' => 'Deskripsi produk harus diisi',
        ];
    }
}
