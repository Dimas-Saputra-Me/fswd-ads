<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreCutisRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'employees_nomor_induk' => [
                'required',
                Rule::exists('employees', 'nomor_induk'),
            ],
            'tanggal_cuti' => ['required', 'date', 'date_format:Y-m-d'],
            'lama_cuti' => 'required|numeric',
            'keterangan' => 'required|string',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'employees_nomor_induk.exists' => 'Nomor Induk does not exist in the employee table.',
        ];
    }
}
