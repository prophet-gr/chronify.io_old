<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrganizationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'slug' => ['sometimes', 'string', 'max:255', 'alpha_dash:ascii', Rule::unique('organizations', 'slug')->ignore($this->route('organization'))],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
