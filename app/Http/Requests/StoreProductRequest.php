<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'qty'         => 'required|integer|min:0',
            'price'       => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
        ];
    }

    /**
     * Pesan error kustom dalam Bahasa Indonesia.
     */
    public function messages(): array
    {
        return [
            'name.required'  => 'Nama produk wajib diisi.',
            'name.string'    => 'Nama produk harus berupa teks.',
            'name.max'       => 'Nama produk maksimal 255 karakter.',
            'qty.required'   => 'Jumlah (qty) wajib diisi.',
            'qty.integer'    => 'Jumlah (qty) harus berupa angka bulat.',
            'qty.min'        => 'Jumlah (qty) tidak boleh kurang dari 0.',
            'price.required' => 'Harga wajib diisi.',
            'price.numeric'  => 'Harga harus berupa angka.',
            'price.min'      => 'Harga tidak boleh kurang dari 0.',
        ];
    }
}
