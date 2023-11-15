<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
            'brand' => ['required', 'string'],
            'model' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'price' => ['required'],
            'notes' => ['nullable', 'string'],
            'transmission' => ['nullable', 'in:automatic,manual'],
            'fuel_type' => ['nullable', 'in:diesel,petrol,electric,gpl,hybrid'],
            'seats' => ['nullable'],
        ];
    }
}
