<?php

namespace App\Http\Requests;

use App\Enums\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
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
            'title' => ['required'],
            'description' => ['required'],
            'client_id' => ['required', Rule::exists('clients', 'id')],
            'user_id' => ['required', Rule::exists('users', 'id')],
            'project_id' => ['required', Rule::exists('projects', 'id')],
            'deadline_at' => ['required', 'date', 'after:yesterday'],
            'status' => ['required', Rule::enum(TaskStatus::class)],
        ];
    }
}
