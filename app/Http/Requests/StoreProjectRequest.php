<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'color' => ['nullable', 'string', 'regex:/^#[0-9a-fA-F]{6}$/'],
            'is_billable' => ['sometimes', 'boolean'],
            'hourly_rate' => ['nullable', 'numeric', 'min:0', 'max:9999.99'],
            'status' => ['sometimes', 'string', 'in:active,archived'],
        ];
    }
}
