<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IzinRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'jenis_izin' => 'required|in:izin,cuti',
            'keterangan' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'nullable|date',
            'is_accepted' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'User ID harus diisi.',
            'user_id.exists' => 'User ID tidak ditemukan.',
            'jenis_izin.required' => 'Jenis izin harus diisi.',
            'jenis_izin.in' => 'Jenis izin harus "izin" atau "cuti".',
            'keterangan.required' => 'Keterangan harus diisi.',
            'tanggal_mulai.required' => 'Tanggal mulai harus diisi.',
            'tanggal_mulai.date' => 'Tanggal mulai harus berformat tanggal.',
            'tanggal_akhir.date' => 'Tanggal akhir harus berformat tanggal.',
        ];
    }
}
