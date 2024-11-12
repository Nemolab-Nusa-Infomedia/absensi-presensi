<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
            'image_header' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'body' => 'required',
            'writter' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'image.image' => 'Harus berupa gambar.',
            'image.mimes' => 'Tidak bisa selain file jpeg, png, jpg, gif.',
            'image.max' => 'Ukuran gambar tidak boleh melebihi 2MB.',
            'title.required' => 'Judul harus diisi',
            'body.required' => 'Isi harus diisi',
        ];
    }
}
