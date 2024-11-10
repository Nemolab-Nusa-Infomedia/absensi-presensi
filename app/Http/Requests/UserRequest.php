<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'email_verified_at' => 'nullable|date',
            'password' => 'nullable|string|min:8',
            'phone' => 'nullable|numeric',
            'is_changed' => 'nullable|boolean',
            'gender' => 'nullable|in:male,female',
            'divisi_id' => 'nullable|exists:divisis,id',
            'address' => 'nullable|string',
            'role_user' => 'nullable|string'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Sudah ada email yang terdaftar',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Kata sandi harus diisi',
            'password.min' => 'Kata sandi minimal 8 karakter',
            'phone.numeric' => 'Nomor telepon harus berupa angka',
            'gender.in' => 'Jenis kelamin tidak valid',
            'divisi_id.exists' => 'Divisi tidak ada',
        ];
    }
}
