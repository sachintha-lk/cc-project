<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class QuizCreationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:5|max:255',
            'description' => 'nullable|string|min:5|max:255',
            'module_id' => 'required|integer|exists:modules,id',
            'total_marks' => 'nullable|numeric|min:0',
            'pass_marks' => 'nullable|numeric|min:0',
            'max_attempts' => 'nullable|integer|min:0',
            'is_published' => 'boolean',
            'media_url' => 'nullable|string',
            'media_type' => 'nullable|string',
            'duration' => 'nullable|integer|min:0',
            'valid_from' => 'nullable|date',
            'valid_upto' => 'nullable|date',
            'time_between_attempts' => 'nullable|integer|min:0',
        ];
    }

    public function validationData()
    {
        $data = $this->all();

        if (!empty($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        return $data;
    }

    public function authorize(): bool
    {
        return true;
    }
}
