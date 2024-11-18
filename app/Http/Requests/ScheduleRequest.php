<?php

namespace App\Http\Requests;

use App\Rules\TimeFormat;
use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'hari' => 'string|required',
            'jam_masuk' => ['required', new TimeFormat],
            'jam_keluar' => ['required', new TimeFormat],
        ];
    }

    public function messages(): array {
        return [
            'hari.required' => 'Hari harus diisi',
            'jam_masuk.required' => 'Jam Masuk harus diisi',
            'jam_keluar.required' => 'Jam Keluar harus diisi',
        ];
    }
}
