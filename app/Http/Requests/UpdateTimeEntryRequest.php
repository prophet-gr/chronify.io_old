<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTimeEntryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'project_id' => ['sometimes', 'exists:projects,id'],
            'task_id' => ['nullable', 'exists:tasks,id'],
            'started_at' => ['sometimes', 'date'],
            'ended_at' => ['nullable', 'date', 'after:started_at'],
            'is_billable' => ['sometimes', 'boolean'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ];
    }
}
